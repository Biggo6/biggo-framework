<?php

class DB {

	public function connect($host,$user,$pass,$db){
		$con = mysql_connect($host, $user,$pass);
		if(!$con){
			Log::collect("<b>Error: connection failed </b>" . mysql_error());
		}else{
			$db = mysql_select_db($db);
			if(!$db){
				Log::collect("<b>Error: database failed </b>" . mysql_error());
			}else{
				return true;
			}
		}	
	}

	public static function query($sql){
		$result = mysql_query($sql);
		if($result){
			return $result;
		}else{
			Log::collect("<a>ErrorDB : error in db operation <i>".mysql_error()."</i></a> <@dbOperationError __::__@>");
		}
		
	}

	public static function fetch($rs){
		$data = mysql_fetch_array($rs);
		if($data){
			return $data;
		}else{
			Log::collect("<a>ErrorDB : error in db operation <i>".mysql_error()."</i></a> <@dbOperationError __::__@>");
		}

	}

}