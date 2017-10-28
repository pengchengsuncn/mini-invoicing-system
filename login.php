<?php
	if(isset($_POST['usrName']) && isset($_POST['usrPwd'])){
		$_uName = trim($_POST['usrName']);
		$_uPwd = trim($_POST['usrPwd']);
		if($_uName == "" || $_uPwd== ""){
			echo "<script>";
			echo "alert('用户名或密码不能为空!')";
			echo "</script>";
		}else{
			include_once("sql/db_conn.php");
			$sQuery = "SELECT * FROM users WHERE usr_name = '".$_uName."' AND sign_pwd = '".$_uPwd."' AND usr_role <> 'emp'";
			$userList = mysql_query($sQuery);
			$num = mysql_num_rows($userList);
			if($num > 0){
				$user = mysql_fetch_array($userList);
				session_start();
				$_SESSION['uId'] = $user["usr_id"];
				$_SESSION['uName'] = $user["usr_name"];
				$_SESSION['uRole'] = $user["usr_role"];
				echo "<script>";
				echo "window.location.href = '/'";
				echo "</script>";
			}else{
				echo "<script>";
				echo "alert('用户名或密码错误，请重新登录!')";
				echo "</script>";
			}
			mysql_free_result($userList);
			mysql_close($conn);
		}
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
		<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<STYLE type=text/css>
			BODY { FONT-SIZE: 12px; COLOR: #ffffff; FONT-FAMILY: 宋体 }
			TD { FONT-SIZE: 12px; COLOR: #ffffff; FONT-FAMILY: 宋体 }
		</STYLE>
		<META content="MSHTML 6.00.6000.16809" name="GENERATOR">
	</HEAD>
	<BODY>
		<FORM id="form1" name="form1" onsubmit="javascript:return WebForm_OnSubmit();" action="" method="post">

			<DIV id="UpdatePanel1">
				<DIV id="div1" style="LEFT: 0px; POSITION: absolute; TOP: 0px; BACKGROUND-COLOR: #0066ff">
				</DIV>
				<DIV id="div2" style="LEFT: 0px; POSITION: absolute; TOP: 0px; BACKGROUND-COLOR: #0066ff">
				</DIV>
				<script type="text/javascript">
					var speed = 20;
					var temp = new Array();
					var clipright = document.body.clientWidth / 2, clipleft = 0;
					for (i = 1; i <= 2; i++) {
						temp[i] = eval("document.all.div" + i + ".style");
						temp[i].width = document.body.clientWidth / 2;
						temp[i].height = document.body.clientHeight;
						temp[i].left = (i - 1) * parseInt(temp[i].width);
					}
					function openit() {
						clipright -= speed;
						temp[1].clip = "rect(0 " + clipright + " auto 0)";
						clipleft += speed;
						temp[2].clip = "rect(0 auto auto " + clipleft + ")";
						if (clipright <= 0) clearInterval(tim);
					}
					tim = setInterval("openit()", 100);
				</script>
				<DIV>
					&nbsp;&nbsp;
				</DIV>
				<DIV>
					<TABLE cellSpacing="0" cellPadding="0" width="900" align="center" border="0">
						<TBODY>
							<TR>
								<TD style="HEIGHT: 105px"><IMG src="images/login_1.gif" border="0"></TD>
							</TR>
							<TR>
								<TD background="images/login_2.jpg" height="300">
									<TABLE height="300" cellPadding="0" width="900" border="0">
										<TBODY>
											<TR>
												<TD colSpan="2" height="35"></TD>
											</TR>
											<TR>
												<TD width="360">
												</TD>
												<TD>
													<TABLE cellSpacing="0" cellPadding="2" border="0">
														<TBODY>
															<TR>
																<TD style="HEIGHT: 28px" width="80">
																	登 录 名：
																</TD>
																<TD style="HEIGHT: 28px" width="150">
																	<INPUT type="text" id="usrName" name="usrName" style="WIDTH: 130px">
																</TD>
															</TR>
															<TR>
																<TD style="HEIGHT: 28px">
																	登录密码：
																</TD>
																<TD style="HEIGHT: 28px">
																	<INPUT type="password" id="usrPwd" name="usrPwd" style="WIDTH: 130px">
																</TD>
															</TR>
															<TR>
																<TD style="HEIGHT: 18px">
																</TD>
																<TD style="HEIGHT: 18px">
																</TD>
															</TR>
															<TR>
																<TD></TD>
																<TD>
																	<INPUT type="image" src="images/login_button.gif" name="submitBtn" style="border-top-width: 0px; border-left-width: 0px; border-bottom-width: 0px; border-right-width: 0px">
																</TD>
															</TR>
														</TBODY>
													</TABLE>
												</TD>
											</TR>
										</TBODY>
									</TABLE>
								</TD>
							</TR>
							<TR>
								<TD>
									<IMG src="images/login_3.jpg" border="0">
								</TD>
							</TR>
						</TBODY>
					</TABLE>
				</DIV>
			</DIV>
		</FORM>
	</BODY>
</HTML>