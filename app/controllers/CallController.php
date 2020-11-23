<?php 


namespace App\controllers;

use App\models\Call;
use App\models\Customer;
use App\models\Lead;
use App\classes\Request;
use App\classes\CSRFToken;
use App\classes\Session;
use App\classes\Redirect;
use App\classes\ValidateRequest;

class CallController{

	public function __construct(){
		middleWare();
	}


	public function leadsCalls($param){
		$customer_id = $param['get'];

		$customer = Customer::findOrFail($customer_id);
		$leads = Lead::where('customer_id',$customer_id)->get();

		$callLogs = Call::where('customer_id', $customer_id)->with('customer', 'lead', 'user')->orderBy('ID','DESC')->get(); 
		
		return view('leads/leads_calls', compact('callLogs', 'customer', 'leads'));
	}


	public function addCall(){
		if (Request::exist('post')) {
			$req = Request::get('post');
// pnd($req);
// pnd(user());
			if(CSRFToken::checkToken($req->token)){

				$rules = [
                    'call_date'          => ['required'=>true, 'mixed'=>true],
                    'call_lead'         => ['required'=>true, 'numbers'=>true],
                    'call_description'   => ['required'=>true, 'mixed'=>true],
                    
                ];

                $validate = new ValidateRequest();
                $validate->abide($_POST, $rules);

                
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
              
                    Session::flash('error', '', $errors);
                    Redirect::to('/profile/calls?id='.$req->id);
                 
                }



                $call = Call::create(
                    ['customer_id' 	=> $req->id,
                                        
                    'lead_id'       => $req->call_lead,
                    'user_id'       => user()->id,
                    'call_date'     => $req->call_date,
                    'description' 	=> $req->call_description,
                    
                    ]
                );

                if ( $call ) {
                     Session::flash('success', 'New call log has been added succesfully');
                     Redirect::to('/profile/calls?id='.$req->id);
                    
                }


			}
		}

	}


}



 ?>