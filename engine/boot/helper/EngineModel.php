<?php

class EngineModel  {

	protected static $table;

	public static function getExtended(){
		return isset(get_class_vars(get_called_class())["table"]) ? get_class_vars(get_called_class())["table"] : strtolower(get_called_class()) . "s";
	}

	public static function queryBuilder($column = null){
		if($column == "null"){
		   return "SELECT * FROM " . self::getExtended() ;
		}
	}

	public static function where($key, $value){
		$query = self::queryBuilder() . " WHERE " . $key . "="  . $value ;
		return $query;
	}

	public static function all(){
		$query = self::queryBuilder();
		$result = DB::query($query);
		return $result; //DB::fetch($result);
	}


	
}