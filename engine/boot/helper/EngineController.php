<?php



class EngineController {


	public function __construct(){

		$this->autoModel();

		$db = $this->lib('DB');
		//$db->connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	}

	public function autoModel(){
		function __autoload($class){
			$file =  ROOT_PATH . DS ."..".DS . "app" . DS . "models" . DS . $class .  ".php";
			if(file_exists($file)){
				include_once $file;
			}else{
				include SYS_INIT;
			}
		}
	}


	public function lib($lib){
		$lb = ROOT_PATH . DS . ".." . DS . "app" . DS ."libs" . DS . $lib .".php";
		if(!file_exists($lb)){
			ErrorBag::collect("<b>LibError : fail to load library <i style='color: red'>". $lib."</i> <@class __::__ missingLib @></b>"); 
		}else{
			include $lb;
			return new $lib();
		}
	}


	public function model($model){


		$m =  getcwd() . DS . ".." . DIRECTORY_SEPARATOR . "app" .DIRECTORY_SEPARATOR. "models" . DIRECTORY_SEPARATOR . $model . ".php";
		if(file_exists($m)){
		

			include_once $m;
			
			$eM = get_parent_class($model);
			
			if($eM == "EngineModel"){
				return new $model();
			}else{
				ErrorBag::collect("<b>ParentModel: please extends EngineModel on model: ___model__<i style='color: red'>". $model."</i> <@class __::__ EngineModel @></b>"); 
			}
		}else{
			return ErrorBag::collect("<b>ModelError: model is not there <@class __::__ ".$model." @></b>"); 
		}
	}
	
    public function view($fv, $data = array() ) {
        $view = getcwd() . DS. "..".DS."app".DS."views". DS . $fv . ".php";
        if(file_exists($view)){

	            if(!empty($data)) 
	            	extract($data);
				include_once $view;

        }else{

        	$view = getcwd() . DS. "..".DS."app".DS."views". DS . $fv . ".ebig";

        	if(file_exists($view)){

        		

        	}else{
        	   ErrorBag::collect("<b>Error: View is not there <@class __::__ ".$view." @></b>"); 
        	}

            
        }
    }

}
