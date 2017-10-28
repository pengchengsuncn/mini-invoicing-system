<?php
	$_rs = mysql_fetch_array(mysql_query($_Qry));
	/* 总记录数 */
	$_totalNum = $_rs['i'];
	/* 每页记录数 */
	$_numPerPage = 10;
	/* 总页码 */
	$_totalPageNo = ceil($_totalNum / $_numPerPage);
	/* 显示的页码块的数量，默认5，如果总页码小于默认的5,则显示的页码块的数量就等于总页码 */
	$_pageNoNum = 5;
	if($_totalPageNo < $_pageNoNum){
		$_pageNoNum = $_totalPageNo;
	}
	/* 当前页码 */
	$_pageNo = 1;
	/* 起始记录数，默认0，当前页码等于1，起始数等于0，当前页码不等于1，起始数等于当前页码*每页记录数 */
	$_startPoint = 0;
	/* 序号 */
	$_num = 1;
	if(isset($_GET['pageNo']) && $_GET['pageNo'] != 1){
		$_pageNo = $_GET['pageNo'];
		$_startPoint = $_numPerPage * ($_pageNo-1);
		$_num = $_startPoint + 1;
	}

	if(($_pageNoNum % 2) > 0){
		$_i = 0;
	}else{
		$_i = 1;
	}
	if($_pageNo > ($_totalPageNo-floor($_pageNoNum/2) + $_i)){
		$_startPageNoNum = $_totalPageNo-$_pageNoNum + 1;
		$_endPageNoNum = $_totalPageNo;
	}else{
		$_startPageNoNum = 1;
		$_endPageNoNum = $_pageNoNum;
	}
?>

