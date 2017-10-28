<?php
	include_once("chk_permission.php");
	include_once( "sql/db_conn.php");
	if(isset($_GET['supId'])){
		$sQuery = "SELECT * FROM supplier WHERE sup_id = ".$_GET['supId']."";
		$supList = mysql_query($sQuery);
		$sup = mysql_fetch_array($supList);
	}else{
		include_once( "donot_access.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>
		修改供应商资料
	</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<form action="update_supplier.php" method="post">
		<table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
            <tr>
                <th colspan="2" style="height: 23px">
                    修改供应商资料
                </th>
            </tr>
            <tr bgcolor="#DEE5FA"><td colspan="2" align="center" class="txlrow">&nbsp;</td></tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					供应商名称
				</td>
				<td>
					<input type="text" name="sup_name" style="width:150px;" value="<?php echo $sup['sup_name']; ?>">
					<label for="sup_name" style="display:none;" class="error">供应商名称不能为空！</label>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					电话
				</td>
				<td>
					<input type="text" name="sup_tel" style="width:150px;" value="<?php echo $sup['sup_tel']; ?>">
					<label for="sup_tel" style="display:none;" class="error">电话号码格式不正确！</label>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					地址
				</td>
				<td>
					<input type="text" name="sup_addr" style="width:300px;" value="<?php echo $sup['sup_addr']; ?>">
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					描述
				</td>
				<td>
					<textarea id="sup_desc" name="sup_desc" rows="5" style="width:300px;"><?php echo $sup['sup_desc']; ?></textarea>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
                <td colspan="2" align="center" class="txlHeaderBackgroundAlternate">
                	<input type="hidden" name="supId" value="<?php echo $_GET['supId']; ?>" />
                    <input type="submit" name="submitBtn" value="修改" />
                </td>
            </tr>
		</table>
	</form>
	<?php mysql_free_result($supList); mysql_close();?>

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