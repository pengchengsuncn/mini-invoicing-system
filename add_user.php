<?php
	include_once("chk_permission.php");
	if($_SESSION['uRole'] != "adm"){
		include_once( "donot_access.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			添加系统用户
		</title>
        <link rel="stylesheet" href="style/css.css" type="text/css" />
	</head>
	<body>
		<div>
			<form action="save_user.php" method="post">
				<table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
                    <tr>
                        <th colspan="2" style="height: 23px">
                            添加系统用户
                        </th>
                    </tr>
                    <tr bgcolor="#DEE5FA"><td colspan="2" align="center" class="txlrow">&nbsp;</td></tr>
                    <tr bgcolor="#DEE5FA">
                        <td align="right" class="txlHeaderBackgroundAlternate">
                            <label for="user_name">用户名</label>
                        </td>
                        <td>
                            <input id="user_name" name="user_name" type="text" />
                            <label for="user_name" style="display:none;" class="error">用户名称不能为空！</label>
                        </td>
                    </tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							<label for="init_pwd">初始密码</label>
						</td>
						<td>
							<input id="init_pwd" name="init_pwd" type="password" />
							<label for="init_pwd" style="display:none;" class="error">请输入初始密码！</label>
						</td>
					</tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							角色
						</td>
						<td>
							<input id="user_role_u" name="user_role" type="radio" value="usr" checked="checked" />
							<label for="user_role_u">操作员</label>
							<input id="user_role_a" name="user_role" type="radio" value="adm" />
							<label for="user_role_a">管理员</label>
						</td>
					</tr>
					<tr bgcolor="#DEE5FA">
						<td colspan="2" align="center" class="txlHeaderBackgroundAlternate">
							<input type="submit" name="submitBtn" value="添加" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate-1.9.0.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("form").validate({
				rules: {
		            user_name: "required",
					init_pwd: "required"
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		});
	</script>
	</body>
</html>