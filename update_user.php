<?php
	include_once("chk_permission.php");
	if($_SESSION['uRole'] != "adm"){
		include_once( "donot_access.php");
	}
	if(isset($_POST['submitBtn']) && isset($_POST['userId'])){
		include_once("sql/db_conn.php");
		$uQuery = "UPDATE users SET
			usr_name='".trim($_POST['user_name'])."',
			usr_role='".$_POST['user_role']."'
			WHERE usr_id = ".$_POST['userId'].""
		;
		mysql_query($uQuery);
		mysql_close();
	}else{
		include_once( "donot_access.php");
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>用户资料更新成功</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<p align="center">修改成功！ <a href="edit_user.php?userId=<?php echo $_POST['userId']; ?>">返回</a> | <a href="show_user.php">查看所有用户</a></p>
</body>
</html>