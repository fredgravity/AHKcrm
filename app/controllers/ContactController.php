<?php

namespace App\controllers;


use App\classes\Request;
use App\classes\CSRFToken;
use App\classes\ValidateRequest;
use App\classes\UploadFile;
use App\models\Customer;
use App\models\Lead;
use App\models\AddressDetail;
use App\classes\Session;
use App\classes\Redirect;


class ContactController
{
	
	function __construct()
	{
		middleWare();
	}



    public function leadsContact($params){
        $id = $params['get'];
         $leads = Lead::where('customer_id', $id)->orderBy('ID', 'DESC')->get(); 
        // pnd($leads);
         $this->editCustomers = Customer::where('id', $id)->with( 'address_detail', 'lead')->first();
         $customer = $this->editCustomers;

         if (count($leads)) {
         		$errors = Session::get('error');
// pnd($errors);
             return view('leads/leads_contact', compact('leads', 'customer', 'errors'));
         }else{

            Session::flash('error', 'No leads to edit. Please edit an available lead');
            Redirect::to('/leads/');
         }

    }



    public function addContact(){
        if (Request::exist('post')) {
            $req = Request::get('post');
            $company = Customer::findOrFail($req->id)->company;

            if (CSRFToken::checkToken($req->token, true)) {
                

                 $rules = [
                    // 'company'               => ['required'=>true, 'mixed'=>true, 'unique'=>'customers'],
                    
                    'contact_name'          => ['required'=>true, 'strings'=>true],
                    'contact_phone'         => ['required'=>true, 'numbers'=>true],
                    'contact_email'         => ['required'=>true, 'email'=>true, 'unique'=>'leads'],
                    'contact_designation'   => ['mixed'=>true],
                    'lead_assigned'         => ['required'=>true, 'mixed'=>true],
                    'lead_comment'          => ['mixed'=>true],
                    'lead_status'           => ['strings'=>true],
                    'lead_source'			=> ['required'=>true, 'mixed'=>true],
                    'lead_assigned'			=> ['required'=>true, 'mixed'=>true]
                ];


                $fileError = [];
                $file = Request::get('file'); 

                 //Validate the files and return error if any
                ContactController::validateFile($file) == '' ? '' :  $fileError['image'] = ContactController::validateFile($file);

                //INSERT IMAGE PATH INTO DATABASE
                $imagePath = ContactController::processImage($file, $company);

                $validate = new ValidateRequest();
                $validate->abide($_POST, $rules);

                
                if($validate->hasError() || count($fileError)){
                    $res = $validate->getErrorMessages();

                    count($fileError)>0 ? $errors = array_merge($res, $fileError) : $errors = $res;

                    $customer = Customer::where('id', $req->id)->with( 'address_detail', 'lead')->first();
                    $leads = Lead::where('id', $req->id)->get();
                        
                    // return view('leads/leads_contact', compact('errors', 'customer', 'leads'));
                    Session::flash('error', '', $errors);
                    Redirect::to('/profile/contact?id='.$req->id);
                 
                }

            
                $leads = Lead::create(
                    ['customer_id' => $req->id,
                                        
                    'contact_name'        => strtolower($req->contact_name),
                    'contact_phone'       => $req->contact_phone,
                    'contact_email'       => strtolower($req->contact_email),
                    'contact_designation' => strtolower($req->contact_designation),
                    'lead_comment'        => strtolower($req->lead_comment),
                    'lead_status'         => strtolower($req->lead_status),
                    'image_path'          => $imagePath
                    ]
                );


               

                if ( $leads ) {
                     Session::flash('success', 'New lead contact has been added succesfully');
                     Redirect::to('/profile/contact?id='.$req->id);
                    
                }
            }
           
        }
    }



    public function editContactLeads(){
    	if (Request::exist('post')) {
    		$req = Request::get('post'); 
    		// pnd($req);
    		 $company = Customer::findOrFail($req->id)->company;
    		
    		if (CSRFToken::checkToken($req->token, true)) {

    		 $rules = [
                    'contact_name'          => ['required'=>true, 'strings'=>true],
                    'contact_phone'         => ['required'=>true, 'numbers'=>true],
                    'contact_email'         => ['required'=>true, 'email'=>true],
                    'contact_designation'   => [ 'strings'=>true],
                    'lead_assigned'         => ['required'=>true, 'mixed'=>true],
                    'lead_comment'          => [ 'strings'=>true],
                    'lead_status'           => [ 'strings'=>true],
                ];
// pnd('hi');

                $fileError = [];
                $file = Request::get('file'); 

                 //Validate the files and return error if any
                ContactController::validateFile($file) == '' ? '' :  $fileError['image'] = ContactController::validateFile($file);

                //INSERT IMAGE PATH INTO DATABASE
                $imagePath = ContactController::processImage($file, $company);

                $validate = new ValidateRequest();
                $validate->abide($_POST, $rules);

                
                if($validate->hasError() || count($fileError)){
                    $res = $validate->getErrorMessages();

                    count($fileError)>0 ? $errors = array_merge($res, $fileError) : $errors = $res;

                    $customer = Customer::where('id', $req->id)->with( 'address_detail', 'lead')->first();
                    $leads = Lead::where('id', $req->id)->get();

                    
                    Session::flash('error', '', $errors);
                    Redirect::to('/profile/contact?id='.$req->id);
                    // return view('leads/leads_contact', compact('errors', 'customer', 'leads'));
                 
                }

                // pnd($req->contact_email);

                 $leads = Lead::updateOrCreate(
                    ['customer_id' => $req->id, 'contact_email' => $req->contact_email],
                                        
                   ['contact_name'        => strtolower($req->contact_name),
                    'contact_phone'       => $req->contact_phone,
                    'contact_designation' => strtolower($req->contact_designation),
                    'lead_comment'        => strtolower($req->lead_comment),
                    'lead_status'         => strtolower($req->lead_status),
                    'image_path'          => $imagePath
                    ]
                );


                if ( $leads ) {
                     Session::flash('success', 'Lead contact has been editted succesfully');
                     Redirect::to('/profile/contact?id='.$req->id);   
                }
    				

    		}
    	}
    	
    	// return view();
    }



 	public static function validateFile($file, $request=''){

        if (isset($file)) {
            foreach ($file as  $key => $value) {

                //validate file if its ready for upload
                if(file_exists($value->tmp_name)){

                    if (empty($value->name)) {
                     if($key == 'company_logo'){
                        return ['The company logo is required'];
                    }elseif ($key == 'leads_card') {
                     
                        return ['The business card is required'];
                    }

                    }
                  
                    if(!empty($value->name)){
                
                        if(!UploadFile::isImage($value->name)){
                         if($key == 'company_logo'){
                            return ['The company logo is not an Image'];
                        }else{
                            return ['The business card is is not an Image'];
                        }
                    }

                    if(UploadFile::getFileSize($value->size)){
                       
                         if($key == 'company_logo'){

                            return ['The company logo is more than 5mb'];

                        }else{

                            return ['The business card is is more than 5mb'];

                        }
                     }

                 
                 }



                }
         
            };
            }
        }



	public static function processImage($file, $request=''){
	        $jsonFile = json_encode($file);
	        $fileKeys = array_keys(json_decode($jsonFile, true));
	       
	       foreach (json_decode($jsonFile) as $key => $value) {
	           $tmpLocation = $value->tmp_name;
	           $toFolder = 'public'.DS.'images'.DS.'leads_card'; 
	       }
	       
	       
	        return UploadFile::move($tmpLocation, $toFolder, $value->name, $newFileName=$request);
	        
	}




	public function deleteContactLeads($params){
       
        if (Request::exist('post')) {
            $req = Request::get('post');
            
            if (CSRFToken::checkToken($req->token, true)) {
                $lead = Lead::find($req->id);
                $customer_id = $lead->customer_id;
// pnd($lead);
                if ($lead) {
                    $delete = Lead::where('id', $req->id)->delete();
                    if ($delete) {
                        Session::flash('success', 'Lead contact has been deleted succesfully');
                        echo json_encode(['id'=>$customer_id]);
                        exit();
                     	// Redirect::to("/leads/contact?id=".$customer_id);               
                    }else{
                        Session::flash('error', 'Problem deleting Lead. Please try again later');
                        echo json_encode(['id'=>$customer_id]);
                        exit();
                        // Redirect::to('/leads/contact?id='.$customer_id);
                    }
                }
                
                
            }
        }
    }


    public function axiosGetLeads(){
    	if (Request::exist('post')) {
    		$req = Request::get('post');

    		if (is_numeric($req->id)) {
    			$leads = Lead::findOrFail($req->id);

    			echo json_encode(['leads'=>$leads]); exit();
    			
    		}
    	}
    }


    public function editContactLeadsForm($params){

    	$id = $params['get'];
    	$leads = Lead::where('id',$id)->first();
        if ($leads) {
            $customers = Customer::findOrFail($leads->customer_id);
            return view('/forms/edit_leads/edit_contact_leads_form', compact('leads', 'customers'));
        }
    	
        Redirect::to('/leads');
    }




}























?>