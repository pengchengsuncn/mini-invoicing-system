<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加系统用户</title>
</head>
<body>
<link rel="stylesheet" href="style/css.css" type="text/css" />
<?php
	include_once("chk_permission.php");
	if($_SESSION['uRole'] != "adm"){
		include_once( "donot_access.php");
	}
	if(isset($_POST['submitBtn'])){
		include_once( "sql/db_conn.php");
		$iQuery = "INSERT INTO users (
			usr_name,
			sign_pwd,
			usr_role,
			create_date
		) values (
			'".trim($_POST['user_name'])."',
			'".trim($_POST['init_pwd'])."',
			'".trim($_POST['user_role'])."',
			'".date('Y-m-d H:i:s')."'
		)";
		mysql_query($iQuery);
		mysql_close();
	}else{
		include_once( "donot_access.php");
	}
?>
<p align="center">添加成功！<a href="add_user.php">继续添加</a> | <a href="show_user.php">查看所有用户</a></p>
</body>
</html>