<?php
	include_once("chk_permission.php");
	include_once( "sql/db_conn.php");
	if(isset($_POST['submitBtn'])){
		$sQuery = "SELECT sign_pwd FROM users WHERE usr_id = ".$_SESSION['uId']."";
		$userList = mysql_query($sQuery);
		$user = mysql_fetch_array($userList);
		if($_POST['old_pwd'] != $user['sign_pwd']){
			echo "<script>";
			echo "alert('修改失败，原密码输入不正确!');";
			echo "</script>";
		}else{
			if(trim($_POST['new_pwd']) == "" || trim($_POST['cfm_pwd']) == ""){
				echo "<script>";
				echo "alert('修改失败，新密码不能为空!');";
				echo "</script>";
			}else{
				if($_POST['new_pwd'] != $_POST['cfm_pwd']){
					echo "<script>";
					echo "alert('修改失败，新密码两次输入不一致!');";
					echo "</script>";
				}else{
					$uQuery = "UPDATE users SET sign_pwd = '".trim($_POST['new_pwd'])."' WHERE usr_id = ".$_SESSION['uId']."";
					mysql_query($uQuery);
					echo "<script>";
					echo "alert('密码修改成功!');";
					echo "</script>";
				}
			}
				
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>
		修改登录密码
	</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<form action="" method="post">
		<table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
            <tr>
                <th colspan="2" style="height: 23px">
                    修改登录密码
                </th>
            </tr>
            <tr bgcolor="#DEE5FA"><td colspan="2" align="center" class="txlrow">&nbsp;</td></tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					原始密码
				</td>
				<td>
					<input type="password" id="old_pwd" name="old_pwd" value="" />
					<label for="old_pwd" style="display:none;" class="error">密码至少6位！</label>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					新密码
				</td>
				<td>
					<input type="password" id="new_pwd" name="new_pwd" value="" />
					<label for="new_pwd" style="display:none;" class="error">密码至少6位！</label>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					确认密码
				</td>
				<td>
					<input type="password" id="cfm_pwd" name="cfm_pwd" value="" />
					<label for="cfm_pwd" style="display:none;" class="error">两次输入不一致！</label>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td colspan="2" align="center" class="txlHeaderBackgroundAlternate">
					<input type="submit" name="submitBtn" value="修改" />
				</td>
			</tr>
		</table>
	</form>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate-1.9.0.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("form").validate({
				rules: {
		            old_pwd: {
		                required: true,
		                rangelength:[6,12]
		            },
		            new_pwd: {
		            	required: true,
		                rangelength:[6,12]
		            },
		            cfm_pwd: {
		            	equalTo: "#new_pwd"
		            }
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		});
	</script>
</body>
</html>