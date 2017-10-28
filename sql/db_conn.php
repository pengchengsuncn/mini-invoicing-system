<?php
	
	//error_reporting(0);
	
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','l4abd5oFt');
	define('DB_NAME','ioss');

	$conn=@mysql_connect(DB_HOST,DB_USER,DB_PWD)or die(mysql_error());
	mysql_query("set names 'utf8'");
	mysql_select_db(DB_NAME,$conn)or die(mysql_error());

?>
