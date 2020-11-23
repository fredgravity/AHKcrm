<?php

namespace App\routing;

class RouteDispatcher{
	private $request, $mapArray=[], $get=[], $post=[], $params=[], $classMethod, $className;


	public function __construct($request){
		$this->request = $request;
		
	}

	public function getRoute(){
		$uri = rtrim($this->request, '/');
		$uri = explode('/', $this->request);
		array_shift($uri);
		$uri = implode('/', $uri);
		
		if($uri == ''){
			$uri = 'welcome';
			
		}
		
		//remove params if any and clean it
		$uri = $this->removeParams($uri);
		
		//pnd($uri);
		$this->callClass($uri);
		
		return $uri;

	}


	public function removeParams($uri){
		$uriParam = $uri; 

		if(strpos($uriParam, '?')){
			$uriParam = explode('?', $uri);
			array_pop($uriParam);
			$uriParam = implode('/', $uriParam);
		}

	
		if(isset($_GET) && $_GET != null){

			switch($_GET['id']){
				case is_numeric($_GET['id']):
					$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']);
					$this->params['get'] = $id;		
				break;
			}

		}elseif(isset($_POST)){
			$this->params['post'] = $_POST;
		}
	
		//pnd($this->params);
		 return rtrim($uriParam, '/');
	}


	public function map($routeArray){
		
		foreach($routeArray as  $arry){
			foreach($arry as $key=>$val){
				if(array_key_exists($key, $this->mapArray)){
				//TODO: display error page if online
					pnd($key. ' route name already exist in route map');
				}
				$this->mapArray[$key] = $val;
			}
		}
		
		return true;
	}
	

	public function callClass($uri){
	
		foreach($this->mapArray as $val){		
			//pr($this->mapArray);
			if($uri == ltrim($val[1],'/')){
				$controllers = explode('@', $val[2]);
					
				$this->className = $controllers[0];
				$this->classMethod  = $controllers[1];

			}
			//TODO: display error page if online
			//pnd($uri.' route class does not exist');
			
		}

		$this->callMethod();

	}

	public function callMethod(){
		
	
		//check if class and method exist
		if(is_callable([$this->className , $this->classMethod])){
			$call = call_user_func_array([new $this->className , $this->classMethod], [$this->params]); 
			
		}
	}






	



}


?>