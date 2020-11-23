<?php 

namespace App\controllers;

use App\models\User;
use App\classes\Redirect;
use App\classes\Session;
use App\classes\Request;
use App\classes\CSRFToken;
use App\classes\ValidateRequest;


class StaffController{
	private $staff;

	public function __construct(){
		$this->staff = User::where('id', user()->id)->first();
		

		if (isAuthenticated() && $this->staff->role != 'admin') {
			
			Redirect::to('/home');
		}

	}


	public function manageStaff(){

		$staffs = User::all();

		return view('/staffs/staff', compact('staffs'));
	}


	public function addStaff(){

		if (Request::exist('post')) {
			$req = Request::get('post');
// pnd($req);
			if (CSRFToken::checkToken($req->token, false)) {
				$rules = [
                    
                    'phone'                 => ['required'=>true, 'mixed'=>true],
                    'email'                 => ['required'=>true, 'email'=>true],
                    'address'               => ['mixed'=>true, 'required'=>true,],
                    'city'                  => ['strings'=>true, 'required'=>true,],
                    'state'                 => [ 'strings'=>true, 'required'=>true,],
                    'designation'			=> [ 'strings'=>true, 'required'=>true,],
                    'username'           	=> [ 'strings'=>true, 'required'=>true,],
                    'password'         		=> ['required'=>true, 'mixed'=>true],
                    'fullname'           	=> [ 'strings'=>true, 'required'=>true,],
                    'role'					=> [ 'strings'=>true, 'required'=>true,],
                ];

                $validate = new ValidateRequest();
                $validate->abide($_POST, $rules);

                
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
  
                    Session::flash('error', '', $errors);
                    Redirect::to('/staff');exit();
                 
                }

                $user = User::orderBy('id','desc')->limit(1)->first();
                $emp = (int)$user->id+1;

                $user = User::create([

                	'username' 	=> $req->username,
                    'email'       	=> $req->email,
                    'password'      => password_hash($req->password, PASSWORD_BCRYPT),
                    'fullname'     	=> $req->fullname,
                    'phone' 		=> $req->phone,
                    'city' 			=> $req->city,
                    'state' 		=> $req->state,
                    'address' 		=> $req->address,
                    'member_id' 	=> 'emp_00'.$emp,
                    'role' 			=> $req->role,
                    'designation' 	=> $req->designation,
                   
                ]);

                if ($user) {
                	Session::flash('success', 'New staff has been added succesfully. New Password is '.$req->password);
                     Redirect::to('/staff');
                }else{
                	Session::flash('error', 'New staff has not been added succesfully');
                     Redirect::to('/staff');
                }


			}
		}

	}



	public function editStaff($param){
		$id = $param['get'];

		$staff = User::where('id', $id)->first();
		return view('/staffs/edit_staff', compact('staff'));
		

	}


	public function updateStaff(){
		if (Request::exist('post')) {
			$req = Request::get('post');
// pnd($req);
			if (CSRFToken::checkToken($req->token, false)) {
				

				$rules = [
                    
                    'phone'                 => ['required'=>true, 'mixed'=>true],
                    'email'                 => ['required'=>true, 'email'=>true],
                    'address'               => ['mixed'=>true, 'required'=>true,],
                    'city'                  => ['strings'=>true, 'required'=>true,],
                    'state'                 => [ 'strings'=>true, 'required'=>true,],
                    'designation'			=> [ 'strings'=>true, 'required'=>true,],
                    'username'           	=> [ 'strings'=>true, 'required'=>true,],
                    'password'         		=> ['required'=>true, 'mixed'=>true],
                    'fullname'           	=> [ 'strings'=>true, 'required'=>true,],
                    'role'					=> [ 'strings'=>true, 'required'=>true,],
                ];

                $validate = new ValidateRequest();
                $validate->abide($_POST, $rules);

                
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
  
                    Session::flash('error', '', $errors);
                    Redirect::to('/staff/edit?id='.$req->id);exit();
                 
                }



                $user = User::where('id', $req->id)->update([

                	'username' 		=> $req->username,
                    'email'       	=> $req->email,
                    'password'      => password_hash($req->password, PASSWORD_BCRYPT),
                    'fullname'     	=> $req->fullname,
                    'phone' 		=> $req->phone,
                    'city' 			=> $req->city,
                    'state' 		=> $req->state,
                    'address' 		=> $req->address,
                    'role' 			=> $req->role,
                    'designation' 	=> $req->designation,
                   
                ]);

                if ($user) {
                	Session::flash('success', 'Staff has been updated succesfully. New Password is '.$req->password);
                     Redirect::to('/staff/edit?id='.$req->id);
                }else{
                	Session::flash('error', 'Staff has failed to updat succesfully');
                     Redirect::to('/staff/edit?id='.$req->id);
                }





			}
		}
	}


	public function deleteStaff(){
		 if (Request::exist('post')) {
            $req = Request::get('post');
            
            if (CSRFToken::checkToken($req->token, true)) {
                $staff = User::find($req->id);

                 if ($staff) {
                   
                    $delete = User::where('id', $req->id)->delete();
                    if ($delete) {
                        Session::flash('success', 'Staff has been deleted successfully');
                        echo json_encode(['id'=>$req->id]); exit();
                        // Redirect::to('/leads');                
                    }else{
                        Session::flash('error', 'Problem deleting Staff. Please try again later');
                        echo json_encode(['id'=>$req->id]); exit();
                        // Redirect::to('/leads');
                    }
                }
                
                
            }
        }
	}



}


 ?>