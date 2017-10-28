<?php
	$url = $_SERVER['PHP_SELF']; 
	$pagecode_arr = explode('/',$url);
	$pagecode = end($pagecode_arr);
	session_start();
	if(!isset($_SESSION["uId"]) || !isset($_SESSION["uName"])){
		echo "<script>";
		if($pagecode == "index.php"){
			echo "window.location.href = 'login.php';";
		}else{
			echo "alert('会话超时或非法访问，请重新登录！');";
			echo "top.location.href = 'login.php';";
		}
		echo "</script>";
	}
	$goto = "main.php";
	if(isset($_SESSION["goto"])){
		$goto = $_SESSION["goto"];
		unset($_SESSION["goto"]);
	}
?>