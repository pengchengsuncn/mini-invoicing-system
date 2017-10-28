<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			保存商品信息
		</title>
		<link rel="stylesheet" href="style/css.css" type="text/css" />
	</head>
	<body>
		<?php
			include_once("chk_permission.php");
			include_once( "sql/db_conn.php");
			$_bar_code = $_POST["bar_code"];
			$_goods_name = $_POST["goods_name"];
			$_goods_type = $_POST["goods_type"];
			$_goods_price = $_POST["goods_price"]; 
			$_sell_price = $_POST["sell_price"];
			$_goods_amount = $_POST["goods_amount"];
			$_goods_vendor = $_POST["goods_vendor"]; 
			$_sell_flag = $_POST["sell_flag"];
			$_goods_desc = $_POST["goods_desc"];
			$_goods_unit = $_POST["goods_unit"];
			$_goods_size = $_POST["goods_size"];

			
			$iQuery="insert into goods(
				bar_code,
				gods_name,
				gods_type,
				gods_price,
				sell_price,
				gods_amount,
				gods_vendor,
				in_operator,
				in_date,
				sell_flag,
				gods_unit,
				gods_size,
				gods_desc
			) values (
				'".$_bar_code."',
				'".$_goods_name."',
				".$_goods_type.",
				".$_goods_price.",
				".$_sell_price.",
				".$_goods_amount.",
				".$_goods_vendor.",
				".$_SESSION['uId'].",
				'".date('Y-m-d H:i:s')."',
				'".$_sell_flag."',
				".$_goods_unit.",
				'".$_goods_size."',
				'".$_goods_desc."'
			)";

			mysql_query($iQuery);
			mysql_close($conn);
		?>
		<p align="center">录入成功！<a href="add_goods.php">继续录入</a> | <a href="show_goods.php">查看商品</a></p>
	</body>
</html>