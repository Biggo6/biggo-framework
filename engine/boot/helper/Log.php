<?php

class Log {

private static $bugs = array();
private static $debug = 0;

public function __construct($d){
	self::$debug = $d;
	self::getDebugStatus();
}

public static function collect($bug){
	self::$bugs[] = $bug;
	//exit;
}

public static function getDebugStatus(){
	if(self::$debug == 1){
		self::emit();
	}else{
		//self::wrong();
	}
}

public static function wrong(){
	echo "Ooooop!!! Something went WRONG";
}

public static function emit(){
	foreach(self::$bugs as $key => $value){
		echo $value; die();
	}
}

}