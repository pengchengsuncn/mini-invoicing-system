<?php
	include_once( "chk_permission.php");
	session_unset();
	session_destroy();
	echo "<script>";
	echo "alert('您已成功退出系统!');";
	echo "top.location.href = '/';";
	echo "</script>";
?>