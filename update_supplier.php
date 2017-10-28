<?php
	include_once("chk_permission.php");
	if(isset($_POST['submitBtn']) && isset($_POST['supId'])){
		include_once("sql/db_conn.php");
		$uQuery = "UPDATE supplier SET
			sup_name='".trim($_POST['sup_name'])."',
			sup_tel='".trim($_POST['sup_tel'])."',
			sup_addr='".trim($_POST['sup_addr'])."',
			sup_desc='".trim($_POST['sup_desc'])."'
			WHERE sup_id = ".$_POST['supId'].""
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
	<title>供应商资料更新成功</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<p align="center">修改成功！ <a href="edit_supplier.php?supId=<?php echo $_POST['supId']; ?>">返回</a> | <a href="show_supplier.php">查看所有供应商</a></p>
</body>
</html>