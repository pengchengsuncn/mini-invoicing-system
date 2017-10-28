<?php
	include_once( "chk_permission.php");
	if($_SESSION['uRole'] != "adm"){
		include_once( "donot_access.php");
	}
	include_once( "sql/db_conn.php");
	$_Qry = "SELECT count(*) i FROM users WHERE usr_id <> ".$_SESSION['uId']." AND usr_role <> 'emp'";
	include_once( "pagination.php");
	$sQuery = "SELECT * FROM users WHERE usr_id <> ".$_SESSION['uId']." AND usr_role <> 'emp' LIMIT " .$_startPoint.",".$_numPerPage."";
	$userList = mysql_query($sQuery);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户信息</title>
	<link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>	
	
	<table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
		<tr>
			<th colspan="5" style="height: 23px">
				用户信息
			</th>
		</tr>
		<tr bgcolor="#DEE5FA">
			<td colspan="5" align="center" class="txlrow">
				&nbsp;
			</td>
		</tr>
		<tr align="center" bgcolor="#799AE1">
			<td align="center" class="txlHeaderBackgroundAlternate">
				序号
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				用户名
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				用户角色
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				创建日期
			</td>
			<td align="center" class="txlHeaderBackgroundAlternate">
				操作
			</td>
		</tr>
		<?php
			while($user = mysql_fetch_array($userList)){
				echo "<tr bgcolor='#DEE5FA'>";
				echo "<td align='center'>".$_num."</td>";
				echo "<td>".$user['usr_name']."</td>";
				if($user['usr_role'] == "adm"){
					echo "<td align='center'>管理员</td>";
				}else{
					echo "<td align='center'>操作员</td>";
				}
				echo "<td align='center'>".$user['create_date']."</td>";
				echo "<td align='center'><a href='edit_user.php?userId=".$user['usr_id']."'>修改</a> | <a href='delete_user.php?userId=".$user['usr_id']."'>删除</a></td>";
				echo "</tr>";
				$_num += 1;
			}
			if($_totalPageNo > 1){
				echo '<tr bgcolor="#DEE5FA"><td colspan="5" align="center" class="txlrow">';
				include_once( "pagination_no.php");
				echo '</td></tr>';
			}
			mysql_free_result($userList);
			mysql_close();
		?>
	</table>
</body>
</html>