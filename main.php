<?php
	include_once("chk_permission.php");
	include_once("sql/db_conn.php");
	$_keyWords = "";
	if(isset($_POST['submitBtn'])){
		$_keyWords = trim($_POST['keyWords']);
		$sQuery = "SELECT * FROM goods
			WHERE bar_code like '%".trim($_POST['keyWords'])."%'
			OR gods_name like '%".trim($_POST['keyWords'])."%'";
		$godsList = mysql_query($sQuery);
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
                <th colspan="3" style="height: 23px">
                    商品销售与入库操作
                </th>
            </tr>
            <tr bgcolor="#DEE5FA"><td colspan="3" align="center" class="txlrow">&nbsp;</td></tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					请输入商品条码或者商品名称
				</td>
				<td>
					<input type="text" id="keyWords" name="keyWords" style="width:300px;" value="<?php echo $_keyWords; ?>" />
					<label for="keyWords" class="error" style="display:none;">查询关键字不能为空</label>
				</td>
				<td class="txlHeaderBackgroundAlternate">
					<input type="submit" name="submitBtn" value="查找" />
				</td>
			</tr>
		</table>
	</form>
	<br>
	
	<?php
		if(isset($_POST['submitBtn'])){
			echo '<table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">';
			echo '<tr bgcolor="#DEE5FA">';
			echo '<td align="center" class="txlHeaderBackgroundAlternate">商品条码</td>';
			echo '<td align="center" class="txlHeaderBackgroundAlternate">商品名称</td>';
			echo '<td align="center" class="txlHeaderBackgroundAlternate">当前库存数</td>';
			echo '<td align="center" class="txlHeaderBackgroundAlternate">符号</td>';
			echo '<td align="center" class="txlHeaderBackgroundAlternate">数量</td>';
			echo '<td align="center" class="txlHeaderBackgroundAlternate">操作</td>';
			echo '</tr>';
			if(mysql_num_rows($godsList)){
				while($goods = mysql_fetch_array($godsList)){
					echo "<tr bgcolor='#DEE5FA'>";
					echo "<td align='center'>".$goods['bar_code']."</td>";
					echo "<td>".$goods['gods_name']."</td>";
					echo "<td align='right' id='cur_".$goods['gods_id']."'>".$goods['gods_amount']."</td>";
					echo "<td align='center'><select id='sel_".$goods['gods_id']."'><option value='+'>入库</option><option value='-' selected>销售</option></select></td>";
					echo "<td align='center'><input type='text' id='num_".$goods['gods_id']."' style='width:30px'></td>";
					echo "<td align='center'><a href='javascript:uptAmount(".$goods['gods_id'].");'>更新</a></td>";
					echo "</tr>";
				}
			}else{
				echo "<tr bgcolor='#DEE5FA'>";
				echo "<td colspan='6' align='center'>没有找到符合条件的商品</td>";
				echo "</tr>";
			}
			echo '</table>';
			mysql_free_result($godsList);
			mysql_close();
		}
	?>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate-1.9.0.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("form").validate({
				rules: {
		            keyWords: {
		                required: true
		            }
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		});

		function uptAmount(_gid){
			var _sign = $("#sel_" + _gid).val();
			var _num = $("#num_" + _gid).val();
			var _curV = $.trim($("#cur_" + _gid).text());
			_curV = eval(_curV + _sign + _num);
			if($.trim(_num) == ""){
				alert("数量不能为空!");
			}else{
				var reg = new RegExp("^([0-9]{1,}\.[0-9]{1,}|[0-9]{1,})$");
				if(!reg.test(_num)){
					alert("数量必须为数字!");
				}else{
					var _data = {
						gid:_gid,
						sign:_sign,
						num:_num
					}
					$.post( "update_amount.php", _data, function( reTxt ) {
						$("#cur_" + _gid).text(_curV);
						alert(reTxt);
					});
				}
			}
			
		}
	</script>
</body>
</html>