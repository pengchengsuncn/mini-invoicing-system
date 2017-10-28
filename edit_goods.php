<?php
	include_once("chk_permission.php");
	include_once( "sql/db_conn.php");
	$_goodsId = $_GET["goodsId"];
	$sQuery = "SELECT * FROM goods WHERE gods_id = " .$_goodsId. "";
	$_goodsList = mysql_query($sQuery);
	$goods = mysql_fetch_array($_goodsList);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>
		修改商品信息
	</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	<form action="update_goods.php" method="post">
		<table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
            <tr>
                <th colspan="2" style="height: 23px">
                    修改商品信息
                </th>
            </tr>
            <tr bgcolor="#DEE5FA"><td colspan="2" align="center" class="txlrow">&nbsp;</td></tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					条码号
				</td>
				<td>
					<input type="text" name="bar_code" style="width:150px;" value="<?php echo $goods['bar_code'] ?>">
					<label for="bar_code" style="display:none;" class="error">请输入商品条码！</label>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					商品名
				</td>
				<td>
					<input type="text" name="goods_name" style="width:250px;" value="<?php echo $goods['gods_name'] ?>">
					<label for="goods_name" style="display:none;" class="error">商品名称不能为空！</label>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					进价
				</td>
				<td>
					<input type="text" name="goods_price" value="<?php echo $goods['gods_price'] ?>">
					<label for="goods_price" style="display:none;" class="error">格式不正确！</label>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					售价
				</td>
				<td>
					<input type="text" name="sell_price" value="<?php echo $goods['sell_price'] ?>">
					<label for="sell_price" style="display:none;" class="error">格式不正确！</label>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
                <td align="right" class="txlHeaderBackgroundAlternate">
                    计量单位
                </td>
                <td>
                    <select id="goods_unit" name="goods_unit">
						<?php
                            $sQuery = "SELECT * FROM units";
                            $unitList = mysql_query($sQuery);
                            while($unit = mysql_fetch_array($unitList)){
                            	if($unit[ "un_id"] == $goods['gods_unit']){
                            		echo "<option value =".$unit[ "un_id"]. " selected>".$unit[ "un_name"]."</option>";
                            	}else{
						        	echo "<option value =".$unit[ "un_id"]. ">".$unit[ "un_name"]."</option>";
                            	}
                            }
                            mysql_free_result($unitList);
                        ?>
					</select>
                </td>
            </tr>
			<tr bgcolor="#DEE5FA">
                <td align="right" class="txlHeaderBackgroundAlternate">
                    供应商
                </td>
                <td>
                    <select id="goods_vendor" name="goods_vendor">
                        <?php
                            $sQuery = "SELECT * FROM supplier";
                            $supList = mysql_query($sQuery);
                            while($sup = mysql_fetch_array($supList)){
                            	if($sup[ "sup_id"] == $goods['gods_vendor']){
                            		echo "<option value =".$sup[ "sup_id"]. " selected>".$sup[ "sup_name"]."</option>";
                            	}else{
						        	echo "<option value =".$sup[ "sup_id"]. ">".$sup[ "sup_name"]."</option>";
						        }
                            }
                            mysql_free_result($supList);
                        ?>                     
                    </select>
                </td>
            </tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					商品类型
				</td>
				<td>
					<select id="goods_type" name="goods_type">
						<?php
							$sQuery = "SELECT * FROM goods_type";
							$typeList = mysql_query($sQuery);
							while($type = mysql_fetch_array($typeList)){
								if($type["type_id"] == $goods["gods_type"]){
									echo "<option value =".$type["type_id"]." selected>".$type["type_name"]."</option>";
								}else{
									echo "<option value =".$type["type_id"].">".$type["type_name"]."</option>";
								}
							}
							mysql_free_result($typeList);
							mysql_close();
						?>
					</select>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					<label for="goods_size">规格</label>
				</td>
				<td>
					<input id="goods_size" name="goods_size" type="text" value="<?php echo $goods['gods_size'] ?>" />
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td align="right" class="txlHeaderBackgroundAlternate">
					商品描述
				</td>
				<td>
					<textarea id="goods_desc" name="goods_desc" rows="5" style="width:300px;"><?php echo $goods['gods_desc'] ?></textarea>
				</td>
			</tr>
			<tr bgcolor="#DEE5FA">
				<td colspan="2" align="center" class="txlHeaderBackgroundAlternate">
					<input type="hidden" name="goodsId" value="<?php echo $goods['gods_id'] ?>" />
					<input type="submit" value="修改" />
					<input type="button" value="返回" onclick="javascript:window.location.href = 'show_goods.php'" />
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
					bar_code: {
		                required: true,
		                digits: true
		            },
					goods_name: "required",
					goods_price: {
		                required: true,
		                number: true
		            },
		            sell_price: {
		                required: true,
		                number: true
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