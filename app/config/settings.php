<?php

$app = array (
	/**------------------------------------------------------
	* // 1:: default controller settings
	* -------------------------------------------------------
	* 
	*/ //Change default controller over here
	"default_controller" => "welcome",

    /**------------------------------------------------------
	* // 1:: Set debug to true if your in dev mode and false to production mode settings
	* -------------------------------------------------------
	* 
	*/ //Change debug to control errors
	"debug"              => true,

	/**------------------------------------------------------
	* // 2:: DB settings
	* -------------------------------------------------------
	* 
	*/ //change database name
	"database_name"      => "cass",
	   //change database host
	"database_host"      =>  "localhost",
	   //change database username
	"database_username"  =>  "root",
		// change database password
	"database_password"  => "",

	"root_path"          => getcwd(),

	"real_path"          => "http://localhost/biggo-framework/"  


);