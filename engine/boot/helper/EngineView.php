<?php


class EngineView {

	public static function make($fv, $data=array()){
		$view = getcwd() . DS. "..".DS."app".DS."views". DS . $fv . ".php";
        if(file_exists($view)){

	            if(!empty($data)) 
	            	extract($data);
				return include_once $view;

        }else{

        	$view = getcwd() . DS. "..".DS."app".DS."views". DS . $fv . ".ebig";

        	if(file_exists($view)){

        		

        	}else{
        	   ErrorBag::collect("<b>Error: View is not there <@class __::__ ".$view." @></b>"); 
        	}

            
        }
	}
}