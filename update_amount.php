<?php
	include_once( "chk_permission.php");
	if(isset($_POST['gid'])){
		include_once("sql/db_conn.php");
		$uQuery = "UPDATE goods SET gods_amount = gods_amount ".$_POST['sign']." ".$_POST['num']." WHERE gods_id = ".$_POST["gid"]."";
		mysql_query($uQuery);
		mysql_close($conn);
		echo "更新成功！";
	}else{
		include_once( "donot_access.php");
	}
?>