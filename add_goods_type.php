<?php include_once( "chk_permission.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>
		添加商品类型
	</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
		<div>
			<form action="save_goods_type.php" method="post">
				<table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
					<tr>
						<th colspan="2" style="height: 23px">
							添加商品类型
						</th>
					</tr>
                    <tr bgcolor="#DEE5FA"><td colspan="2" align="center" class="txlrow">&nbsp;</td></tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							类型名
						</td>
						<td>
							<input id="type_name" name="type_name" style="width:160px;" type="text" />
							<label for="type_name" style="display:none;" class="error">类型名称不能为空！</label>
						</td>
					</tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							类型描述
						</td>
						<td>
							<textarea id="type_desc" name="type_desc" rows="5" style="width:300px;"></textarea>
						</td>
					</tr>
					<tr bgcolor="#DEE5FA">
						<td colspan="2" align="center" class="txlHeaderBackgroundAlternate">
							<input class="tiny button secondary" type="submit" value="添加类型" />
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
		            type_name: "required"
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		});
	</script>
</body>
</html>