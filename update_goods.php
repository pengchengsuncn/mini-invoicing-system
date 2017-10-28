<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>更新商品信息</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>

<?php
	include_once("chk_permission.php");
	$_goodsId = $_POST["goodsId"];
	$_bar_code = $_POST["bar_code"];
	$_goods_name = $_POST["goods_name"];
	$_goods_type = $_POST["goods_type"];
	$_goods_price = $_POST["goods_price"];
	$_sell_price = $_POST["goods_price"];
	$_goods_unit = $_POST["goods_unit"];
	$_goods_size = $_POST["goods_size"];
	$_goods_vendor = $_POST[ "goods_vendor"];
	$_goods_desc = $_POST["goods_desc"];

	include_once( "sql/db_conn.php");
	$uQuery = "UPDATE goods SET
				bar_code = '".$_bar_code."',
				gods_name = '".$_goods_name."',
				gods_type = ".$_goods_type.",
				gods_price = ".$_goods_price.",
				sell_price = ".$_sell_price.",
				gods_unit = ".$_goods_unit.",
				gods_size = '".$_goods_size."',
				gods_vendor = ".$_goods_vendor.",
				gods_desc='".$_goods_desc."'
			WHERE gods_id = ".$_goodsId. "";
	mysql_query($uQuery);
	mysql_close();
?>

<p align="center">修改成功！<a href="edit_goods.php?goodsId=<?php echo $_goodsId ?>">返回</a> | <a href="show_goods.php">查看所有商品</a></p>

</body>
</html>