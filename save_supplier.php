<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加供应商</title>
</head>
<body>
<link rel="stylesheet" href="style/css.css" type="text/css" />
<?php
	include_once("chk_permission.php");
	if(isset($_POST['submitBtn'])){
		include_once( "sql/db_conn.php");
		$iQuery = "INSERT INTO supplier (
			sup_name,
			sup_tel,
			sup_addr,
			sup_desc,
			create_date
		) values (
			'".trim($_POST['sup_name'])."',
			'".trim($_POST['sup_tel'])."',
			'".trim($_POST['sup_addr'])."',
			'".trim($_POST['sup_desc'])."',
			'".date('Y-m-d H:i:s')."'
		)";
		mysql_query($iQuery);
		mysql_close();
	}else{
		include_once( "donot_access.php");
	}
?>
<p align="center">添加成功！<a href="add_supplier.php">继续添加</a> | <a href="show_supplier.php">查看所有供应商</a></p>
</body>
</html>