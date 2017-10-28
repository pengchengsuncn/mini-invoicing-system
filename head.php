<?php include_once("chk_permission.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
	<HEAD>
		<link rel="stylesheet" href="style/css.css" type="text/css">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	</HEAD>
	<BODY bgColor="#d6dff7" leftMargin="0" topMargin="0" marginwidth="0" marginheight="0">
		<TABLE cellSpacing="0" cellPadding="0" width="100%" align="center" border="0">
			<TBODY>
				<TR>
					<TD class="txlHeaderBackgroundAlternate" id="TableTitleLink" vAlign="center" width="43%" height="23">
						→ 欢迎 [<?php if($_SESSION['uRole'] == "adm"){ echo "管理员"; }else{ echo "操作员"; } ?>]
						<span style="padding:5px; color:yellow; font-weight:bold;"><?php echo ($_SESSION["uName"]); ?></span>进入进销存管理系统
					</TD>
					<TD class="txlHeaderBackgroundAlternate" id="TableTitleLink" vAlign="center" width="21%">
						<span id="localtime"></span>
					</TD>
					<TD class="txlHeaderBackgroundAlternate" id="TableTitleLink" vAlign="center" align="right" width="35%">
						<A href="javascript:void(0);" target="mainFrame">系统使用帮助 </A>
						 | 
						<A href="logout.php" target="mainFrame">退出系统 </A>
					</TD>
					<TD class="txlHeaderBackgroundAlternate" id="TableTitleLink" vAlign="center" align="right" width="1%"></TD>
				</TR>
			</TBODY>
		</TABLE>
		<script type="text/javascript" src="js/systime.js"></script>
	</BODY>
</HTML>