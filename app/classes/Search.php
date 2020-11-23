<?php 


namespace App\classes;

use App\models\User;
use App\models\Lead;
use App\models\Customer;

class Search{
	private static $searchResult;


	public function __construct(){


	}


	public static function searchQuery($searchData){
		
		$searchWord = $searchData->searchWord;
		$table  = $searchData->search_btn;
		// pnd($searchData->searchWord);

		if ($searchWord !== '') {
			// $searchResult;

			switch ($table) {
			case 'leads':

				$searchResult = Customer::where([['company', 'LIKE', "%$searchWord%"],['leads','=',1]])
                ->orWhere([['phone', 'LIKE', "%$searchWord%"],['leads','=',1]])
                ->orWhere([['email', 'LIKE', "%$searchWord%"], ['leads','=',1]]	)
                ->with('lead')->get();
// pnd($searchResult);
                // if (!count($searchResult)) {
                // 	$searchResult = Lead::where('contact_name', 'LIKE', "%$searchWord%")
                //     ->orWhere('contact_phone', 'LIKE', "%$searchWord%")
                //     ->orWhere('contact_email', 'LIKE', "%$searchWord%")
                //     ->orWhere('contact_designation', 'LIKE', "%$searchWord%")
                //     ->orWhere('lead_assigned', 'LIKE', "%$searchWord%")
                //     ->with('customer')
                //     ->get();
                // }

				return $searchResult;
				break;

			case 'customers':
				$searchResult = Customer::where([['company', 'LIKE', "%$searchWord%"],['leads','=',0]])
	                ->orWhere([['phone', 'LIKE', "%$searchWord%"],['leads','=',0]])
	                ->orWhere([['email', 'LIKE', "%$searchWord%"], ['leads','=',0]]	)
	                ->with('lead')->get();

	                return $searchResult;
			break;
			
			default:
				# code...
				break;
			}

			

		}

		return [];
		// pnd($searchResult);

		
		


	}


}









 ?>