<?php
	define("DB_HOST","localhost");
	define("DB_NAME","radio");
	define("DB_USER","root");
	define("DB_PASSWORD","");
	define("BASE_PATH","http://localhost/radio");
	
        date_default_timezone_set("America/Chicago");
	$link = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Unable to connect to database");
	define("LINK", $link);
	mysql_select_db(DB_NAME,LINK) or die("Unable to Select Database");
?>