<?php
	include_once( "chk_permission.php");
	if($_SESSION['uRole'] != "adm"){
		include_once( "donot_access.php");
	}
	if(isset($_GET['userId'])){
		include_once("sql/db_conn.php");
		$dQuery = "DELETE FROM users WHERE usr_id = ".$_GET["userId"]."";
		mysql_query($dQuery);
		mysql_close($conn);
	}else{
		include_once( "donot_access.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>删除用户</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<p align="center">删除成功！<a href="show_user.php">查看所有用户</a> | <a href="main.php">返回首页</a></p>
</body>
</html>