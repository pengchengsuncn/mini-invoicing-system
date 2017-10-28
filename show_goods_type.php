<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>显示商品类型</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
	

<?php
	include_once("chk_permission.php");
	include_once("sql/db_conn.php");
	$_Qry = "SELECT count(*) i FROM goods_type";
	include_once( "pagination.php");
	$sQuery = "SELECT * FROM goods_type LIMIT " .$_startPoint.",".$_numPerPage."";
	$goods_typeList = mysql_query($sQuery);				
?>
	<table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
		<tr>
			<th colspan="4" style="height: 23px">
				商品类型展示
			</th>
		</tr>
		<tr bgcolor="#DEE5FA">
			<td colspan="4" align="center" class="txlrow">&nbsp;</td>
		</tr>
		<tr bgcolor="#799AE1">
			<td align="center" class="txlHeaderBackgroundAlternate">序号</td>
			<td align="center" class="txlHeaderBackgroundAlternate">类型名</td>
			<td align="center" class="txlHeaderBackgroundAlternate">类型描述</td>
			<td align="center" class="txlHeaderBackgroundAlternate">操作</td>
		</tr>
		<?php
			while($row = mysql_fetch_array($goods_typeList)){
				echo "<tr bgcolor='#DEE5FA'>";
				echo "<td align='center'>".$_num."</td>";
				echo "<td>".$row['type_name']."</td>";
				echo "<td>".$row['type_desc']."</td>";//注意接收数据库的id 大小写分清楚
				echo "<td align='center'><a href='edit_goods_type.php?goods_typeID=".$row['type_id']."'>修改</a> | <a href='delete_goods_type.php?goods_typeId=".$row['type_id']."'>删除</a></td>";
				echo "</tr>";
				$_num += 1;
			}
			if($_totalPageNo > 1){
				echo '<tr bgcolor="#DEE5FA"><td colspan="4" align="center" class="txlrow">';
				include_once( "pagination_no.php");
				echo '</td></tr>';
			}
			mysql_free_result($goods_typeList);
			mysql_close();
		?>
	</table>
</body>
</html>