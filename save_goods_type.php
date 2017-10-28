<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加商品类型成功</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<?php
		include_once("chk_permission.php");
		include_once("sql/db_conn.php");
		
		$_type_name = $_POST["type_name"];
		$_type_desc= $_POST["type_desc"];
		$iQuery = "insert into goods_type(
			type_name,
			type_desc
		) values (
			'".$_type_name."',
			'".$_type_desc."'
		)";
		mysql_query($iQuery);
		mysql_close($conn);
	?>
	<p align="center">添加成功！ <a href="add_goods_type.php">继续添加</a> | <a href="/show_goods_type.php">查看所有类别</a></p>
</body>
</html>