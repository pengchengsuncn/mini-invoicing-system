<?php
 	include_once("chk_permission.php");
	$_goods_typeId= $_GET["goods_typeId"];
	include_once("sql/db_conn.php");
	$dQuery = "DELETE FROM goods_type WHERE type_id = " .$_goods_typeId. "";
	mysql_query($dQuery);
	mysql_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>更新类别成功</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<p align="center">删除成功！<a href="show_goods_type.php">查看商品类别</a> | <a href="main.php">返回首页</a></p>
</body>
</html>