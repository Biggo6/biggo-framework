<?php

	

class Route {
	
	private static $_url = array();

	
	public static function add($url){
		self::$_url[] = rtrim($url, "/");
	}
	
	public static function map($method, $url, $alias = null){


		if($alias == null){

			$server_method = $_SERVER['REQUEST_METHOD'];
			if($server_method == strtoupper($method)){
				self::add($url);
			}else{
				ErrorBag::collect("<b>RouteCollection <@routeServerMethod __::__ Route::mismap @></b>");
			}	
					
		}else{
			
		}

	}
	
	public function __get($par){
		return $par . " not defined";
	}
	
	public function __call($call, $arg){
		return $call;
	}
	
	public static function get(){
		var_dump(self::$_url);
	}
	
	public static function action(){
		
 		
 		$url = isset($_GET['action']) ? $_GET['action'] : "home/index";

		if($url === "home/index"){
		 	return explode("/", DEFAULT_CONTROLLER);
		}else{	
			foreach(self::$_url as $key => $value){
				 if($value === $url){
				 	return explode("/",$url);
				 }else{
				 	ErrorBag::collect("<b>Error: Route Collection <@routeNotFound __::__ ".$url." @></b>"); 
			     }
			}		
		}

	}
	
}