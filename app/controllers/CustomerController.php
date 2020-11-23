<?php 

namespace App\controllers;


use App\classes\Request;
use App\models\Customer;
use App\classes\Redirect;
use App\classes\Session;
use App\classes\CSRFToken;
use App\classes\UploadFile;
use App\classes\ValidateRequest;
use App\controllers\Leads;
use App\models\Lead;
use App\models\AddressDetail;


class CustomerController{

	public function __construct(){
		middleWare();
	}


	public function manageCustomers($search=[]){
        // pnd($search == []);
		if($search == []){
            $this->customers = Customer::where('leads',0)->with( 'address_detail', 'lead')->orderBy('ID','DESC')->limit(7)->get(); 
            $customers = $this->customers;
        }elseif (isset($search['post'])) {
             $this->customers = Customer::where('leads',0)->with( 'address_detail', 'lead')->orderBy('ID','DESC')->limit(7)->get(); 
            $customers = $this->customers;
        }else{
            $customers = $search;
        }


        
        $searchByLetter = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

		return view('customers/customers', compact('customers', 'searchByLetter'));
	}


	public function status(){
		if (Request::exist('post')) {
			$req = Request::get('post');

			Customer::where('id', $req->id)->update(['leads'=> 0]);
			$status = Customer::findOrFail($req->id)->leads;
// pnd($status);
			if ($status == 0) {
				Session::flash('success', 'You have gained a new Customer');
				echo json_encode(['redirect'=>true]); exit();
			}else{
				Session::flash('error', 'Problem gaining a new Customer');
				echo json_encode(['redirect'=>false]); exit();
			}

			
		}
	}


public function addNewCustomersForm(){

		return view('customers/add_new_customer');
	}


public function addNewCustomers(){

		if (Request::exist('post')){
			$req = Request::get('post');
            

			if(CSRFToken::checkToken($req->token, false)){
               // pnd($req->contact_email);
				//VALIDATE INPUT 
                $file = Request::get('file'); 
                $data = $this->createOrUpdateCustomers($req, $file); 

                if ($data) {
                    
                    if ($req->company_details_btn == 'Save') {
                        # code...
                        Session::flash('success', 'New lead has been created successfully');
                        Redirect::to('/customers');
                    }elseif($req->company_details_btn == 'Update'){
                        
                        Session::flash('success', 'Lead has been updated successfully');
                        Redirect::to('/customers');
                    }
                    
                }

               
                // Session::flash('error', 'Problem  creating new lead please try again later');
                // Redirect::to('/leads');
                              
			}

		}

	}



 public function detailsCustomers($params){
        $id = $params['get'];
        

        $this->editCustomers = Customer::where('id', $id)->with( 'address_detail', 'lead')->first();
         $customer = $this->editCustomers;
         if ($customer) {
             return view('customers/detail_customers', compact('customer'));
         }else{
            Session::flash('error', 'No customer to edit. Please edit an available customer');
            Redirect::to('/customers');
         }


    }




 public function editCustomers($params){
        $id = $params['get'];
         $this->editCustomers = Customer::where('id', $id)->with( 'address_detail', 'lead')->first();
         $customer = $this->editCustomers;
         if ($customer) {
             return view('customers/edit_customers', compact('customer'));
         }else{
            Session::flash('error', 'No leads to edit. Please edit an available lead');
            Redirect::to('/customers');
         }

       
    }
 public function deleteCustomers($params){
       
        if (Request::exist('post')) {
            $req = Request::get('post');
            
            if (CSRFToken::checkToken($req->token, true)) {
                $customer = Customer::find($req->id);

                $leads = Lead::where('customer_id', $req->id)->get();
                
                if ($customer && $leads) {


                    foreach ($leads as $lead) {
                        $lead->delete();
                    }

                    $delete = Customer::where('id', $req->id)->delete();
                    if ($delete) {
                        Session::flash('success', 'Lead has been deleted successfully');
                        echo json_encode(['id'=>$req->id]); exit();
                        // Redirect::to('/leads');                
                    }else{
                        Session::flash('error', 'Problem deleting Lead. Please try again later');
                        echo json_encode(['id'=>$req->id]); exit();
                        // Redirect::to('/leads');
                    }
                }
                
                
            }
        }
    }



    public function updateCustomers(){
        
        if (Request::exist('post')) {
            $req = Request::get('post');
        
            if (CSRFToken::checkToken($req->token)) {
                 $rules = [
                    // 'company'               => ['required'=>true, 'mixed'=>true, 'unique'=>'customers'],
                    'phone'                 => ['required'=>true, 'mixed'=>true],
                    // 'email'                 => ['required'=>true, 'email'=>true],
                    'address'               => ['mixed'=>true],
                    'city'                  => ['strings'=>true],
                    'state'                 => [ 'strings'=>true],
                    'website'               => [ 'strings'=>true],
                    'country'               => [ 'strings'=>true],
                    'contact_name'          => ['required'=>true, 'strings'=>true],
                    'contact_phone'         => ['required'=>true, 'numbers'=>true],
                    'contact_email'         => ['required'=>true, 'email'=>true],
                    'contact_designation'   => [ 'strings'=>true],
                    'lead_source'           => [ 'strings'=>true],
                    'lead_assigned'         => ['required'=>true, 'mixed'=>true],
                    'lead_comment'          => [ 'strings'=>true],
                    'lead_status'           => [ 'strings'=>true],
                ];


                $fileError = [];
                $file = Request::get('file'); 

                 //Validate the files and return error if any
                CustomerController::validateFile($file, $req->company) == '' ? '' :  $fileError['image'] = CustomerController::validateFile($file, $req->company);

                //INSERT IMAGE PATH INTO DATABASE
                $imagePath = CustomerController::processImage($file, $req->company);

                $validate = new ValidateRequest();
                $validate->abide($_POST, $rules);

                
                if($validate->hasError() || count($fileError)){
                    $res = $validate->getErrorMessages();

                    count($fileError)>0 ? $errors = array_merge($res, $fileError) : $errors = $res;

                    $customers = Customer::where('company', $req->company)->first();
                        
                    Session::flash('error', '', $errors);
                    Redirect::to('/customers/edit?id='.$customers->id); exit();
                 
                }

                // pnd($req);

                $customers = Customer::updateOrCreate(
                    ['company' => $req->company, 'email' => $req->email],
                    [
                    
                    'phone'    => $req->phone,
                    'address'  => strtolower($req->address),
                    'leads'    => 0
                    ]
                );


                $leads = Lead::updateOrCreate(
                    ['customer_id' => $customers->id],
                    [
                    
                    'contact_name'        => strtolower($req->contact_name),
                    'contact_phone'       => $req->contact_phone,
                    'contact_email'       => strtolower($req->contact_email),
                    'contact_designation' => strtolower($req->contact_designation),
                    'lead_source'         => strtolower($req->lead_source),
                    'lead_assigned'       => strtolower($req->lead_assigned),
                    'lead_comment'        => strtolower($req->lead_comment),
                    'lead_status'         => strtolower($req->lead_status),
                    'image_path'          => $imagePath
                    ]
                );


                
                $address = AddressDetail::updateOrCreate(
                    ['customer_id' => $customers->id],
                    [
    
                    'lead_id'       => $leads->id,
                    'address'       => strtolower($req->address),
                    'city'          => strtolower($req->city),
                    'state'         => strtolower($req->state),
                    'website'       => strtolower($req->website),
                    'country'       => strtolower($req->country)
                    ]
                );

                if ($customers || $leads || $address) {
                
                    Session::flash('success', 'Customer has been updated successfully');
                    Redirect::to('/customers/edit?id='.$customers->id); exit();
                    
                }



            }
        }
    }


    public function createOrUpdateCustomers($req, $file=''){
        $rules = [
                    'company'               => ['required'=>true, 'mixed'=>true, 'unique'=>'customers'],
                    'phone'                 => ['required'=>true, 'mixed'=>true],
                    'email'                 => ['required'=>true, 'email'=>true],
                    'address'               => ['mixed'=>true],
                    'city'                  => ['strings'=>true],
                    'state'                 => [ 'strings'=>true],
                    'website'               => [ 'strings'=>true],
                    'country'               => [ 'strings'=>true],
                    'contact_name'          => ['required'=>true, 'strings'=>true],
                    'contact_phone'         => ['required'=>true, 'numbers'=>true],
                    'contact_email'         => ['required'=>true, 'email'=>true],
                    'contact_designation'   => [ 'strings'=>true],
                    'lead_source'           => [ 'strings'=>true],
                    'lead_assigned'         => ['required'=>true, 'mixed'=>true],
                    'lead_comment'          => [ 'strings'=>true],
                    'lead_status'           => [ 'strings'=>true],
                ];

                 $fileError = [];
      
                              
                //Validate the files and return error if any
                CustomerController::validateFile($file, $req->company) == '' ? '' :  $fileError['image'] = CustomerController::validateFile($file, $req->company);

                //INSERT IMAGE PATH INTO DATABASE
                $imagePath = CustomerController::processImage($file, $req->company);
               

                $validate = new ValidateRequest();
                $validate->abide($_POST, $rules);

                
                if($validate->hasError() || count($fileError)){
                    $res = $validate->getErrorMessages();

                    count($fileError)>0 ? $errors = array_merge($res, $fileError) : $errors = $res;  
                    
                    return view('customers/add_new_customer', compact('errors'));
                }

                
                
                // INSERT DETAILS INTO DATABASE
                $customers = Customer::updateOrCreate(
                    ['company' => $req->company, 'email' => $req->email],
                    [
                    
                    'phone'    => $req->phone,
                    'address'  => strtolower($req->address),
                    'leads'    => 0
                    ]
                );


                $leads = Lead::updateOrCreate(
                    ['customer_id' => $customers->id],
                    [
                    
                    'contact_name'        => strtolower($req->contact_name),
                    'contact_phone'       => $req->contact_phone,
                    'contact_email'       => strtolower($req->contact_email),
                    'contact_designation' => strtolower($req->contact_designation),
                    'lead_source'         => strtolower($req->lead_source),
                    'lead_assigned'       => strtolower($req->lead_assigned),
                    'lead_comment'        => strtolower($req->lead_comment),
                    'lead_status'         => strtolower($req->lead_status),
                    'image_path'          => $imagePath
                    ]
                );


                
                $address = AddressDetail::updateOrCreate(
                    ['customer_id' => $customers->id],
                    [
    
                    'lead_id'       => $leads->id,
                    'address'       => strtolower($req->address),
                    'city'          => strtolower($req->city),
                    'state'         => strtolower($req->state),
                    'website'       => strtolower($req->website),
                    'country'       => strtolower($req->country)
                    ]
                );



                if ($customers || $leads || $address) {
                    # code...
                    return true;
                }
                return false;
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












}









 ?>