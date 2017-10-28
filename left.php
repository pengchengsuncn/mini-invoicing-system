<?php include_once("chk_permission.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
	<HEAD>
		<TITLE>
			管理页面
		</TITLE>
		<STYLE type=text/css>
			BODY { BACKGROUND: #799ae1; MARGIN: 0px; FONT: 9pt 宋体 } TABLE { BORDER-RIGHT:
			0px; BORDER-TOP: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px } TD { FONT:
			12px 宋体 } IMG { BORDER-RIGHT: 0px; BORDER-TOP: 0px; VERTICAL-ALIGN: bottom;
			BORDER-LEFT: 0px; BORDER-BOTTOM: 0px } A { FONT: 12px 宋体; COLOR: #000000;
			TEXT-DECORATION: none } A:hover { COLOR: #428eff; TEXT-DECORATION: underline
			} .sec_menu { BORDER-RIGHT: white 1px solid; BACKGROUND: #d6dff7; OVERFLOW:
			hidden; BORDER-LEFT: white 1px solid; BORDER-BOTTOM: white 1px solid }
			.menu_title { } .menu_title SPAN { FONT-WEIGHT: bold; LEFT: 7px; COLOR:
			#215dc6; POSITION: relative; TOP: 2px } .menu_title2 { } .menu_title2 SPAN
			{ FONT-WEIGHT: bold; LEFT: 8px; COLOR: #428eff; POSITION: relative; TOP:
			2px }
		</STYLE>
		<SCRIPT language=javascript1.2>
			function showsubmenu(sid) {
				whichEl = eval("submenu" + sid);
				if (whichEl.style.display == "none") {
					eval("submenu" + sid + ".style.display=\"\";");
				} else {
					eval("submenu" + sid + ".style.display=\"none\";");
				}
			}
		</SCRIPT>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<META content="MSHTML 6.00.2900.2180" name=GENERATOR>
	</HEAD>
	<BODY leftMargin="0" topMargin="0" marginwidth="0" marginheight="0">
		<TABLE cellSpacing="0" cellPadding="0" width="100%" align="left" border="0">
			<TBODY>
				<TR>
					<TD vAlign="top" bgColor="#799ae1">
						<TABLE cellSpacing="0" cellPadding="0" width="158" align="center">
							<TBODY>
								<TR>
									<TD vAlign="bottom">
										<IMG src="images/title.gif" width="158">
									</TD>
								</TR>
							</TBODY>
						</TABLE>
						<TABLE cellSpacing="0" cellPadding="0" width="158" align="center">
							<TBODY>
								<TR>
									<TD class="menu_title" onMouseOver="this.className='menu_title2';" onmouseout="this.className='menu_title';"
									background="" height="25">
										&nbsp;
									</TD>
								</TR>
							</TBODY>
						</TABLE>
						<TABLE cellSpacing="0" cellPadding="0" width="158" align="center">
							<TBODY>
								<TR>
									<TD class="menu_title" id=menuTitle1 onmouseover="this.className='menu_title2';"
									onclick=showsubmenu(0) onmouseout="this.className='menu_title';" background="images/admin_left_1.gif"
									height="25">
										<span>
											<B>
												用户管理
											</B>
										</span>
									</TD>
								</TR>
								<TR>
									<TD id="submenu0">
										<DIV class="sec_menu" style="width: 158px ">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
															<A href="edit_profile.php" target="mainFrame">维护个人资料</A>
														</TD>
													</TR>
													<TR>
														<TD height="20">
															<a href="change_pwd.php" target="mainFrame">修改登录密码</a>
														</TD>
													</TR>
													<?php
														if($_SESSION['uRole'] == "adm"){
															echo '<TR><TD height="20"><A href="show_user.php" target="mainFrame">浏览维护用户</A></TD></TR>';
															echo '<TR><TD height="20"><A href="add_user.php" target="mainFrame">添加系统用户</A></TD></TR>';
														}
													?>													
												</TBODY>
											</TABLE>
										</DIV>
										<DIV style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
									</TD>
								</TR>
							</TBODY>
						</TABLE>
						<TABLE cellSpacing="0" cellPadding="0" width="158" align="center">
							<TBODY>
								<TR>
									<TD class="menu_title" id="menuTitle1" onmouseover="this.className='menu_title2';"
									onclick=showsubmenu(1) onmouseout="this.className='menu_title';" background="images/admin_left_2.gif"
									height="25">
										<SPAN>
											商品管理
										</SPAN>
									</TD>
								</TR>
								<TR>
									<TD id="submenu1">
										<DIV class="sec_menu" style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<td height="20">
															<a href="main.php" target="mainFrame">商品销售入库</a>
														</td>
													</TR>
													<TR>
														<TD height="20">
															<a href="show_goods.php" target="mainFrame">浏览维护商品</a>
														</TD>
													</TR>
													<TR>
														<TD height="20">
															<a href="add_goods.php" target="mainFrame">添加新的商品</a>
														</TD>
													</TR>
													<TR>
														<TD height="20">
															<a href="show_goods_type.php" target="mainFrame">浏览维护类别</a>
														</TD>
													</TR>
													<TR>
														<td height="20">
															<a href="add_goods_type.php" target="mainFrame">添加新的类别</a>
														</td>
													</TR>
													<TR>
														<td height="20">
															<a href="show_supplier.php" target="mainFrame">浏览维护供货商</a>
														</td>
													</TR>
													<TR>
														<td height="20">
															<a href="add_supplier.php" target="mainFrame">添加新的供货商</a>
														</td>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
										<DIV style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
									</TD>
								</TR>
							</TBODY>
						</TABLE>
						<TABLE cellSpacing="0" cellPadding="0" width="158" align="center">
							<TBODY>
								<TR>
									<TD class="menu_title" id="menuTitle1" onmouseover="this.className='menu_title2';" onclick=showsubmenu(2) onmouseout="this.className='menu_title';" background="images/admin_left_2.gif" height="25">
										<SPAN>
											员工管理
										</SPAN>
									</TD>
								</TR>
								<TR>
									<TD id="submenu2">
										<DIV class="sec_menu" style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
															<a href="javascript:void(0);" target="mainFrame">
																维护员工信息
															</a>
														</TD>
													</TR>
													<TR>
														<TD height="20">
															<a href="javascript:void(0);" target="mainFrame">
																添加新的员工
															</a>
														</TD>
													</TR>
													<TR>
														<TD height="20">
															<a href="javascript:void(0);" target="mainFrame">
																员工绩效考核
															</a>
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
										<DIV style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
									</TD>
								</TR>
							</TBODY>
						</TABLE>
						<TABLE cellSpacing="0" cellPadding="0" width="158" align="center">
							<TBODY>
								<TR>
									<TD class="menu_title" id="menuTitle1" onmouseover="this.className='menu_title2';"
									onclick=showsubmenu(3) onmouseout="this.className='menu_title';" background="images/admin_left_2.gif"
									height="25">
										<SPAN>
											财务管理
										</SPAN>
									</TD>
								</TR>
								<TR>
									<TD id="submenu3">
										<DIV class="sec_menu" style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
															<a href="javascript:void(0);" target="mainFrame">
																财务管理帮助
															</a>
														</TD>
													</TR>
													<TR>
														<TD height="20">
															<a href="javascript:void(0);" target="mainFrame">
																月结帐单浏览
															</a>
														</TD>
													</TR>
													<TR>
														<TD height="20">
															<A href="javascript:void(0);" target="mainFrame">
																年度帐单报表
															</A>
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
										<DIV style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
									</TD>
								</TR>
							</TBODY>
						</TABLE>
						<TABLE cellSpacing="0" cellPadding="0" width="158" align="center">
							<TBODY>
								<TR>
									<TD class="menu_title" id="menuTitle1" onmouseover="this.className='menu_title2';"
									onclick=showsubmenu(4) onmouseout="this.className='menu_title';" background="images/admin_left_2.gif"
									height="25">
										<SPAN>
											统计数据
										</SPAN>
									</TD>
								</TR>
								<TR>
									<TD id="submenu4">
										<DIV class="sec_menu" style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
															<a href="javascript:void(0);" target="mainFrame">
																销售数量统计
															</a>
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
										<DIV style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
									</TD>
								</TR>
							</TBODY>
						</TABLE>
						<TABLE cellSpacing="0" cellPadding="0" width="158" align="center">
							<TBODY>
								<TR>
									<TD class="menu_title" id="menuTitle1" onmouseover="this.className='menu_title2';"
									onclick=showsubmenu(5) onmouseout="this.className='menu_title';" background="images/admin_left_2.gif"
									height="25">
										<SPAN>
											系统设置
										</SPAN>
									</TD>
								</TR>
								<TR>
									<TD id="submenu5">
										<DIV class="sec_menu" style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
															<a href="javascript:void(0);" target="mainFrame">
																数据字典设置
															</a>
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
										<DIV style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20">
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
									</TD>
								</TR>
							</TBODY>
						</TABLE>
						<TABLE cellSpacing="0" cellPadding="0" width="158" align="center">
							<TBODY>
								<TR>
									<TD class="menu_title" id="menuTitle1" onmouseover="this.className='menu_title2';"
									onmouseout="this.className='menu_title';" background="images/admin_left_9.gif"
									height="25">
										<SPAN>
											版权信息
										</SPAN>
									</TD>
								</TR>
								<TR>
									<TD>
										<DIV class="sec_menu" style="width: 158px">
											<TABLE cellSpacing="0" cellPadding="0" width="135" align="center">
												<TBODY>
													<TR>
														<TD height="20" bgcolor="#D6DFF7" style="LINE-HEIGHT: 150%">
															&copy;2010-2014 ladsoft
														</TD>
													</TR>
													<TR>
														<TD height="20" bgcolor="#D6DFF7" style="LINE-HEIGHT: 150%">
															Version 1.8
														</TD>
													</TR>
													<TR>
														<TD height="20" bgcolor="#D6DFF7" style="LINE-HEIGHT: 150%">
															<a href="mailto:services@ladsoft.com">services@ladsoft.com</a>
														</TD>
													</TR>
												</TBODY>
											</TABLE>
										</DIV>
									</TD>
								</TR>
							</TBODY>
						</TABLE>
				</TR>
			</TBODY>
		</TABLE>
	</BODY>
</HTML>