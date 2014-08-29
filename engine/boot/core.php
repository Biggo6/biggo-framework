<?php

include 'helper/EngineController.php';
include 'helper/EngineModel.php';
include 'helper/Route.php';
include 'helper/Log.php';
include 'helper/SystemConstants.php';
include getcwd() . DIRECTORY_SEPARATOR .'routes.php';



class  App {
    private $action;
    private $method;
    public function run(){


	
	   if(count(Route::action()) == 1){
		   $classname = Route::action()[0] . "Controller";
		   //create object
		   include_once ROOT_PATH . DS ."..". DS. "app" . DS . "controllers" . DS . $classname . ".php"; 
		   $obj      = new $classname();
		   $eC = get_parent_class($obj);
		   if($eC != "EngineController"){
			  Log::collect("<b>Please Extends Parent Controller <@class __::__ EngineController @></b>") ; 
		   }else{
               $methods = get_class_methods($classname);
				 if(in_array('index', $methods)){
					$obj->index();
				 }else{
					  Log::collect("<b>Error: Method <@class __::__  @></b>");  
				}				 
            }
		}else if(count(Route::action()) == 2) {
		   $classname = Route::action()[0] . "Controller";
		   //create object
		   $obj      = new $classname();
		   $eC = get_parent_class($obj);
		   if($eC != "EngineController"){
			    Log::collect("<b>Please Extends Parent Controller <@class __::__ EngineController @></b>"); 
		   }else{
               $methods = get_class_methods($classname);
				 if(in_array(Route::action()[1], $methods)){
					$meth = Route::action()[1];
					$obj->$meth();
				 }else{
					Log::collect("<b>Error: Method <@methodNotFound __::__  @></b>") ; 
				}				 
            }
		}		


	   	   
		new Log(DEBUG_STATUS);
	     
    }
}

