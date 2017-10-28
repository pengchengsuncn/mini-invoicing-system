<?php
	include_once( "chk_permission.php");
	if(isset($_GET['supId'])){
		include_once("sql/db_conn.php");
		$dQuery = "DELETE FROM supplier WHERE sup_id = ".$_GET["supId"]."";
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
	<title>删除供应商</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<p align="center">删除成功！<a href="show_supplier.php">查看所有供应商</a> | <a href="main.php">返回首页</a></p>
</body>
</html>