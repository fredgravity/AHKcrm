<?php


namespace App\classes;

class Request{


	public function __construct(){
	
	}

	//ALL REQ
	public static function all($isArray = false){
	
		$result = [];
		//store get req is its > 0
		if(count($_GET) > 0) $result['get'] = $_GET;

		//store post req is its > 0
		if(count($_POST) > 0) $result['post'] = $_POST;

		//store file req is its > 0
		$result['file'] = $_FILES;

		$jsonData = json_encode($result);
		
		//return an assoc array
		return json_decode($jsonData, $isArray);
	}


	//REQ TYPE OR METHOD
	public static function get($method){
		//$obj = new static;
		//$data = $obj->all();
		$data2 = self::all();

		return $data2->$method;
	}

	//REQ AVAILABILITY
	public static function exist($method){

		 return ( array_key_exists($method, self::all(true)) )? true : false;

	}

	//REQ DATA
	public static function oldData($method, $postKey){
        $obj = new static;
        $data2 = $obj->all();
		$data = self::all();
//        pnd($data->$method);
		return isset($data2->$method->$postKey)? $data2->$method->$postKey : '';
	}

	//REFRESH require 
	public static function refresh(){
		$_GET = [];
		$_POST = [];
		$_FILES = [];
	}

	//GET INPUT REQ
	public static function getInputValue($key){
		if(isset($_POST[$key])){
			return $_POST[$key];
		}elseif ($_GET[$key]) {
			return $_GET[$key];
		}else{
			return '';
		}

	}



}















?>