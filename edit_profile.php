<?php
	include_once("chk_permission.php");
	include_once( "sql/db_conn.php");
	if(isset($_POST['submitBtn'])){
		$uQuery = "UPDATE users SET usr_name = '".trim($_POST['user_name'])."' WHERE usr_id = ".$_SESSION['uId']."";
		mysql_query($uQuery);
		$_SESSION['uName'] = trim($_POST['user_name']);
		$_SESSION['goto'] = "edit_profile.php";
		echo "<script>";
		echo "alert('您的个人资料已更新!');";
		echo "top.location.href = '/';";
		echo "</script>";
	}
	$sQuery = "SELECT * FROM users WHERE usr_id = ".$_SESSION['uId']."";
	$_userList = mysql_query($sQuery);
	$user = mysql_fetch_array($_userList);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>
		修改个人信息
	</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<form action="" method="post">
		<table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
            <tr>
                <th colspan="2" style="height: 23px">
                    修改个人资料
                </th>
            </tr>
            <tr bgcolor="#DEE5FA"><td colspan="2" align="center" class="txlrow">&nbsp;</td></tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					用户名
				</td>
				<td>
					<input type="text" name="user_name" style="width:150px;" value="<?php echo $user['usr_name'] ?>">
					<label for="user_name" style="display:none;" class="error">用户名称不能为空！</label>
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
		            user_name: "required"
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		});
	</script>
</body>
</html>