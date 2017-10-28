<?php
	include_once( "chk_permission.php");
	include_once( "sql/db_conn.php");

	$_Qry = "SELECT
		count(*) i
	FROM goods a
		INNER JOIN goods_type b
		ON a.gods_type = b.type_id
		INNER JOIN supplier c
		ON a.gods_vendor = c.sup_id
		INNER JOIN units d
		ON a.gods_unit = d.un_id
		INNER JOIN users e
		ON a.in_operator = e.usr_id
	";	
	include_once( "pagination.php");
	$sQuery = "SELECT
		a.gods_id,
		a.bar_code,
		a.gods_name,
		b.type_name,
		a.gods_price,
		a.sell_price,
		a.gods_amount,
		d.un_name,
		a.gods_size,
		c.sup_name,
		a.in_date,
		e.usr_name
	FROM goods a
		INNER JOIN goods_type b
		ON a.gods_type = b.type_id
		INNER JOIN supplier c
		ON a.gods_vendor = c.sup_id
		INNER JOIN units d
		ON a.gods_unit = d.un_id
		INNER JOIN users e
		ON a.in_operator = e.usr_id
	LIMIT $_startPoint, $_numPerPage";

	$goodsList = mysql_query($sQuery);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>商品信息</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>	
	
	<table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
		<tr>
			<th colspan="13" style="height: 23px">
				商品信息
			</th>
		</tr>
		<tr bgcolor="#DEE5FA">
			<td colspan="13" align="center" class="txlrow">
				&nbsp;
			</td>
		</tr>
		<tr align="center" bgcolor="#799AE1">
			<td align="center" class="txlHeaderBackgroundAlternate">
				序号
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				条码号
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				商品名
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				商品类型
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				进价
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				售价
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				库存数
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				计量单位
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				规格
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				供应商
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				入库日期
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				入库员
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				操作
			</td>
		</tr>
		<?php
			while($goods = mysql_fetch_array($goodsList)){
				echo "<tr bgcolor='#DEE5FA'>";
				echo "<td align='center'>".$_num."</td>";
				echo "<td align='center'>".$goods['bar_code']."</td>";
				echo "<td>".$goods['gods_name']."</td>";
				echo "<td>".$goods['type_name']."</td>";
				echo "<td align='right'>".$goods['gods_price']."</td>";
				echo "<td align='right'>".$goods['sell_price']."</td>";
				echo "<td align='right'>".$goods['gods_amount']."</td>";
				echo "<td>".$goods['un_name']."</td>";
				echo "<td>".$goods['gods_size']."</td>";
				echo "<td>".$goods['sup_name']."</td>";
				echo "<td align='center'>".$goods['in_date']."</td>";
				echo "<td>".$goods['usr_name']."</td>";
				echo "<td align='center'><a href='edit_goods.php?goodsId=".$goods['gods_id']."'>修改</a> | <a href='delete_goods.php?goodsId=".$goods['gods_id']."'>删除</a></td>";
				echo "</tr>";
				$_num += 1;
			}
			if($_totalPageNo > 1){
				echo '<tr bgcolor="#DEE5FA"><td colspan="13" align="center" class="txlrow">';
				include_once( "pagination_no.php");
				echo '</td></tr>';
			}
			mysql_free_result($goodsList);
			mysql_close();
		?>
	</table>
</body>
</html>