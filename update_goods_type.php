<?php
	include_once("chk_permission.php");
	$_goods_typeID = $_POST["goods_typeID"];
	$_goods_type_name = $_POST["goods_type_name"];
	$_goods_type_type = $_POST["goods_type_type"];
	include_once("sql/db_conn.php");
	$uQuery = "UPDATE goods_type SET type_name='".$_goods_type_name."',type_desc='".$_goods_type_type."' WHERE type_id = ".$_goods_typeID."";
	mysql_query($uQuery);
	mysql_close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>更新类别成功</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<p align="center">修改成功！ <a href="edit_goods_type.php?goods_typeID=<?php echo $_goods_typeID ?>">返回</a> | <a href="show_goods_type.php">查看所有类别</a></p>
</body>
</html>