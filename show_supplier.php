<?php
	include_once( "chk_permission.php");
	include_once( "sql/db_conn.php");
	$_Qry = "SELECT count(*) i FROM supplier";
	include_once( "pagination.php");
	$sQuery = "SELECT * FROM supplier LIMIT " .$_startPoint.",".$_numPerPage."";
	$supList = mysql_query($sQuery);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>供应商信息</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>	
	
	<table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
		<tr>
			<th colspan="7" style="height: 23px">
				供应商信息
			</th>
		</tr>
		<tr bgcolor="#DEE5FA">
			<td colspan="7" align="center" class="txlrow">
				&nbsp;
			</td>
		</tr>
		<tr align="center" bgcolor="#799AE1">
			<td align="center" class="txlHeaderBackgroundAlternate">
				序号
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				供应商名称
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				电话
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				地址
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				描述
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				创建日期
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				操作
			</td>
		</tr>
		<?php
			while($sup = mysql_fetch_array($supList)){
				echo "<tr bgcolor='#DEE5FA'>";
				echo "<td align='center'>".$_num."</td>";
				echo "<td>".$sup['sup_name']."</td>";
				echo "<td>".$sup['sup_tel']."</td>";
				echo "<td>".$sup['sup_addr']."</td>";
				echo "<td>".$sup['sup_desc']."</td>";
				echo "<td align='center'>".$sup['create_date']."</td>";
				echo "<td align='center'><a href='edit_supplier.php?supId=".$sup['sup_id']."'>修改</a> | <a href='delete_supplier.php?supId=".$sup['sup_id']."'>删除</a></td>";
				echo "</tr>";
				$_num += 1;
			}
			if($_totalPageNo > 1){
				echo '<tr bgcolor="#DEE5FA"><td colspan="7" align="center" class="txlrow">';
				include_once( "pagination_no.php");
				echo '</td></tr>';
			}
			mysql_free_result($supList);
			mysql_close();
		?>
	</table>
</body>
</html>