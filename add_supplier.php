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
		添加供应商
	</title>
    <link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
		<div>
			<form action="save_supplier.php" method="post">
				<table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
                    <tr>
                        <th colspan="2" style="height: 23px">
                            添加供应商
                        </th>
                    </tr>
                    <tr bgcolor="#DEE5FA"><td colspan="2" align="center" class="txlrow">&nbsp;</td></tr>
                    <tr bgcolor="#DEE5FA">
                        <td align="right" class="txlHeaderBackgroundAlternate">
                            <label for="sup_name">供应商名称</label>
                        </td>
                        <td>
                            <input id="sup_name" name="sup_name" type="text" />
                            <label for="sup_name" style="display:none;" class="error">供应商名称不能为空！</label>
                        </td>
                    </tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							<label for="sup_tel">联系电话</label>
						</td>
						<td>
							<input id="sup_tel" name="sup_tel" type="text" />
							<label for="sup_tel" style="display:none;" class="error">电话号码格式不正确！</label>
						</td>
					</tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							<label for="sup_addr">联系地址</label>
						</td>
						<td>
							<input id="sup_addr" name="sup_addr" style="width:300px;" type="text" />
						</td>
					</tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							<label for="sup_desc">备注</label>
						</td>
						<td>
							<textarea id="sup_desc" name="sup_desc" rows="5" style="width:300px;"></textarea>
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
                    sup_name: "required",
                    sup_tel: {
		                required: true,
		                digits: true,
		                rangelength: [7,12]
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