﻿<?php
	include_once("chk_permission.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>
			进销存管理系统
		</title>
	</head>
	<frameset rows="*" cols="180,*" frameborder="no" border="0" framespacing="0">
		<frame src="Left.php" name="leftFrame" scrolling="auto" noresize="noresize" id="leftFrame" title="leftFrame" />
		<frameset rows="50,*" frameborder="no" border="0" framespacing="0">
			<frame src="head.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
			<frame src="<?php echo $goto; ?>" name="mainFrame" id="mainFrame" title="mainFrame" />
		</frameset>
	</frameset>
	<noframes>
		<body>
			<p>
				你的浏览器不支持框架，请升级你的浏览器
			</p>
		</body>
	</noframes>

</html>