<?php
	include_once( "chk_permission.php");
	include_once( "sql/db_conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			添加新商品
		</title>
        <link rel="stylesheet" href="style/css.css" type="text/css" />
	</head>
	<body>
		<div>
			<form action="save_goods.php" method="post">
				<table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
                    <tr>
                        <th colspan="2" style="height: 23px">
                            添加商品信息
                        </th>
                    </tr>
                    <tr bgcolor="#DEE5FA"><td colspan="2" align="center" class="txlrow">&nbsp;</td></tr>
                    <tr bgcolor="#DEE5FA">
                        <td align="right" class="txlHeaderBackgroundAlternate">
                            <label for="bar_code">条码号</label>
                        </td>
                        <td>
                            <input id="bar_code" name="bar_code" type="text" style="width:150px;" />
                            <label for="bar_code" style="display:none;" class="error">请输入商品条码！</label>
                        </td>
                    </tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							<label for="goods_name">商品名</label>
						</td>
						<td>
							<input id="goods_name" name="goods_name" type="text" style="width:250px;" />
							<label for="goods_name" style="display:none;" class="error">商品名称不能为空！</label>
						</td>
					</tr>
                    <tr bgcolor="#DEE5FA">
                        <td align="right" class="txlHeaderBackgroundAlternate">
                            <label for="goods_price">进价</label>
                        </td>
                        <td>
                            <input id="goods_price" name="goods_price" type="text" />
                        	<label for="goods_price" style="display:none;" class="error">格式不正确！</label>
                        </td>
                    </tr>
                    <tr bgcolor="#DEE5FA">
                        <td align="right" class="txlHeaderBackgroundAlternate">
                            <label for="sell_price">售价</label>
                        </td>
                        <td>
                            <input id="sell_price" name="sell_price" type="text" />
                        	<label for="sell_price" style="display:none;" class="error">格式不正确！</label>
                        </td>
                    </tr>
                    <tr bgcolor="#DEE5FA">
                        <td align="right" class="txlHeaderBackgroundAlternate">
                            <label for="goods_amount">初始库存</label>
                        </td>
                        <td>
                            <input id="goods_amount" name="goods_amount" type="text" />
                        	<label for="goods_amount" style="display:none;" class="error">格式不正确！</label>
                        </td>
                    </tr>
                    <tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							<label for="goods_unit">计量单位</label>
						</td>
						<td>
							<select id="goods_unit" name="goods_unit">
								<?php
                                    $sQuery = "SELECT * FROM units";
                                    $unitList = mysql_query($sQuery);
                                    while($unit = mysql_fetch_array($unitList)){
								        echo "<option value =".$unit[ "un_id"]. ">".$unit[ "un_name"]."</option>";
                                    }
                                    mysql_free_result($unitList);
                                ?>
							</select>
						</td>
					</tr>
                    <tr bgcolor="#DEE5FA">
                        <td align="right" class="txlHeaderBackgroundAlternate">
                            <label for="goods_vendor">供应商</label>
                        </td>
                        <td>
                            <select id="goods_vendor" name="goods_vendor">
                                <?php
                                    $sQuery = "SELECT * FROM supplier";
                                    $supList = mysql_query($sQuery);
                                    while($sup = mysql_fetch_array($supList)){
								        echo "<option value =".$sup[ "sup_id"]. ">".$sup[ "sup_name"]."</option>";
                                    }
                                    mysql_free_result($supList);
                                ?>                     
                            </select>
                        </td>
                    </tr>
                    <tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							<label for="goods_size">规格</label>
						</td>
						<td>
							<input id="goods_size" name="goods_size" type="text" />
						</td>
					</tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							<label for="goods_type">商品类型</label>
						</td>
						<td>
							<select id="goods_type" name="goods_type">
								<?php
                                    $sQuery = "SELECT * FROM goods_type";
                                    $typeList = mysql_query($sQuery);
                                    while($type = mysql_fetch_array($typeList)){
								        echo "<option value =".$type[ "type_id"]. ">".$type[ "type_name"]."</option>";
                                    }
                                    mysql_free_result($typeList);
                                    mysql_close();
                                ?>
							</select>
						</td>
					</tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							是否销售
						</td>
						<td>
							<input id="sell_flag_y" name="sell_flag" type="radio" value="Y" checked="checked" />
							<label for="sell_flag_y">是</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
							<input id="sell_flag_n" name="sell_flag" type="radio" value="N" />
							<label for="sell_flag_n">否</label>
						</td>
					</tr>
					<tr bgcolor="#DEE5FA">
						<td align="right" class="txlHeaderBackgroundAlternate">
							<label id="goods_desc">商品描述</label>
						</td>
						<td>
							<textarea id="goods_desc" name="goods_desc" rows="5" style="width:300px;"></textarea>
						</td>
					</tr>
					<tr bgcolor="#DEE5FA">
						<td colspan="2" align="center" class="txlHeaderBackgroundAlternate">
							<input type="submit" value="入库" />
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
		            },
					goods_amount: {
		                required: true,
		                number: true
		            },
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		});
	</script>
	</body>
</html>