<?php

namespace App\controllers;

use App\classes\Redirect;
use App\models\Customer;
use App\models\Lead;
use App\classes\Search;
use App\classes\Request;
use App\controllers\LeadsController;
use App\controllers\CustomerController;

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


	public static function searchLeads(){

		if(Request::exist('post')){

			$req = Request::get('post');

			$result = Search::searchQuery($req);

			$leads = new LeadsController();
			$leads->manageLeads($result);




		}
		
	}


	public static function searchCustomers(){

		if(Request::exist('post')){

			$req = Request::get('post');

			$result = Search::searchQuery($req);

			$customers = new CustomerController();
			$customers->manageCustomers($result);




		}
		
	}


	public function contactUs($param){

		return view('contact');
	}

}



?>