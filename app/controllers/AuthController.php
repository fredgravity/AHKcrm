<?php


namespace App\controllers;

use App\classes\Request;
use App\classes\CSRFToken;
use App\classes\ValidateRequest;
use App\models\User;
use App\classes\Session;
use App\classes\Redirect;


class AuthController{


	public function __construct(){
	   // middleWare();
	}


	public function loginForm(){
		if (isAuthenticated()) {
            Redirect::to('/home');
        }

		return view('auth/login');
	}

    
	public function login(){
      
		//GET REQUEST
		if(Request::exist('post')){
			$request = Request::get('post');
            $token = Request::getInputValue('token');
			$username = Request::getInputValue('username');
			$password = Request::getInputValue('password');

            //GET CSRF TOKEN AND VERIFY
            if(CSRFToken::checkToken($token, false)){
                //VALIDATE INPUT 
                $rules = [
                    'username' => ['required'=>true, 'mixed'=>true],
                    'password' => ['required'=>true, 'mixed'=>true],
                ];
                
                $validate = new ValidateRequest();
                $validate->abide($_POST, $rules);
                
                //get error if any
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    
                    return view('auth/login', compact('errors'));
                }
                
                
                //get user from db
                $user = User::where('username', $username)->first();
                
                if($user){
                    
                    if(!password_verify($password, $user->password)){
                        $errors = ['Username or Password not valid'];
                        return view('auth/login',compact('errors'));
                       
                    }else{
                        //remember me code here
                        if(!empty($_POST['remember_me'])){

                        }

                        //SET USER SESSIONS
                        Session::set('SESSION_USER_ID', $user->id);
                        Session::set('SESSION_USER_USERNAME', $user->username);

                        Redirect::to('/home');
                        }
                    
                    
                }else{
                    $errors = ['Username or Password not valid'];
                    return view('auth/login',compact('errors'));
                }
                
                
            }else{
            
                if (APP_ENV == 'local'){
                    throw new \Exception('Token mismatch');
                }else{
                    Redirect(404);
                }
            }

		}else{
            if (APP_ENV == 'local'){
                throw new \Exception('Token mismatch');
            }else{
                Redirect::to(404);
            }
        }

		
//		$x = Request::getInputValue('username');
//		pnd($x);

		//VALIDATE INPUT

		//pnd('posted login');
		return view('auth/login');
	}



    public function logout(){
        if (isAuthenticated()) {
            Session::delete('SESSION_USER_ID');
            Session::delete('SESSION_USER_USERNAME');
        }
        Redirect::to('/');
    }

}













?>