<?php

include 'helper/InitApp.php';



class  App {
    private $action;
    private $method;
    public function run(){


	
	   if(count(Route::action()) == 1){
		   $classname = Route::action()[0] . "Controller";
		   //create object
		   $controllerFile = ROOT_PATH . DS ."..". DS. "app" . DS . "controllers" . DS . $classname . ".php";
		   
		   if(file_exists($controllerFile)){
			   include_once  $controllerFile;

			   $obj      = new $classname();
			   $eC = get_parent_class($obj);
			   if($eC != "EngineController"){
				  ErrorBag::collect("<b>Please Extends Parent Controller <@class __::__ EngineController @></b>") ; 
			   }else{
	               $methods = get_class_methods($classname);
					 if(in_array('index', $methods)){
						$obj->index();
					 }else{
						  ErrorBag::collect("<b>Error: Method <@class __::__  @></b>");  
					}				 
	            } 		
		   }else{
		   		ErrorBag::collect("<b> create file <i style='color:red'>".$classname."</i> in controllers folder <@class __::__ ControllerNotFound @></b>");
		   }

		}else if(count(Route::action()) == 2) {
		   $classname = Route::action()[0] . "Controller";
		   //create object
		   $controllerFile = ROOT_PATH . DS ."..". DS. "app" . DS . "controllers" . DS . $classname . ".php";
		   if(file_exists($controllerFile)){
				   $obj      = new $classname();
				   $eC = get_parent_class($obj);
				   if($eC != "EngineController"){
					    ErrorBag::collect("<b>Please Extends Parent Controller <@class __::__ EngineController @></b>"); 
				   }else{
		               $methods = get_class_methods($classname);
						 if(in_array(Route::action()[1], $methods)){
							$meth = Route::action()[1];
							$obj->$meth();
						 }else{
							ErrorBag::collect("<b>Error: Method <@methodNotFound __::__  @></b>") ; 
						}				 
		            }
		   }else{
		   		ErrorBag::collect("<b> create file <i style='color:red'>".$classname."</i> in controllers folder <@class __::__ ControllerNotFound @></b>");
		   }

		}		


	   	   
		new ErrorBag(DEBUG_STATUS);
	     
    }
}

