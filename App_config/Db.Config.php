<?php
// Db.Config.php
// Created By : Bikal Basnet, 2013-March-13
// This class contains the configuration sessttings for the database. If the databse is local i.e production period then the local settings is used else the remote settings are used. 
//Backward Trace : web.config.php : The status where local  machience or not  is defined in web.confi.php in root directory.
// Forward Trace : used by all DAO specific classes

if(LOCAL_MACHIENE){
	error_reporting("ALL");
	define("DB_SERVER","localhost");
	define("DB_USER","root");
	define("DB_PASS","root");
	define("DATABASE","login_test");
}else{
//	error_reporting(0);
	
	//parse the db settings
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
	$mysql_config = $services_json["mysql-5.1"][0]["credentials"];

	// define constants
	define("DB_SERVER",$mysql_config["hostname"].":".$mysql_config["port"]);
	define("DB_USER",$mysql_config["username"]);
	define("DB_PASS",$mysql_config["password"]);
	define("DATABASE",$mysql_config["name"]);
		
}

?>