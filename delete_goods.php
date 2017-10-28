<?php
	include_once( "chk_permission.php");
	include_once("sql/db_conn.php");
	if(isset($_GET['goodsId'])){
		$dQuery = "DELETE FROM goods WHERE gods_id = ".$_GET['goodsId'])."";
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
	<title>删除商品</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<p align="center">删除成功！<a href="show_goods.php">查看商品</a> | <a href="main.php">返回首页</a></p>
</body>
</html>
