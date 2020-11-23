<?php

namespace App\controllers;

use App\classes\Redirect;
use App\models\Customer;
use App\models\Lead;

class IndexController{

	public function __construct(){
		// middleWare();
	}


	public function welcome(){
        
        return view('welcome');
    }


	public function home(){

		$customers = Customer::where('leads', 0)->with('lead')->orderBy('id','desc')->limit(5)->get();

		$leads = Customer::where('leads', 1)->with('lead')->orderBy('id','desc')->limit(5)->get();

		$contacts = Lead::orderBy('id', 'desc')->with('customer')->limit(5)->get();
		
		
		return view('home', compact('customers', 'leads', 'contacts'));
	}


	public function homeDashboard(){
		$customers = Customer::where('leads', 0)->get()->count();

		$leads = Customer::where('leads', 1)->get()->count();

		$contacts = Lead::all()->count();

		echo json_encode(compact('customers', 'leads', 'contacts'));exit();
		// pnd($contacts);
	}


	// public function homeDashboardDetails(){
	// 	$customers = Customer::where('leads', 0)->with('lead')->orderBy('id','desc')->limit(5)->get();

	// 	$leads = Customer::where('leads', 1)->with('lead')->orderBy('id','desc')->limit(5)->get();

	// 	$contacts = Lead::orderBy('id', 'desc')->limit(5)->get();
	// 	echo json_encode(compact('customers', 'leads', 'contacts'));exit();
	// }


	public function contactUs($param){

		return view('contact');
	}

}



?>