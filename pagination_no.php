<div class="pagination">
	<span>共&nbsp;<?php echo $_totalPageNo; ?>&nbsp;页&nbsp;&nbsp;当前第&nbsp;<?php echo $_pageNo; ?>&nbsp;页</span>
	<span>
		<?php
			if($_pageNo > 1){
				echo "<a href='?pageNo=".($_pageNo - 1)."'>上一页</a>";
				echo "&nbsp;&nbsp;";
			}
			while($_startPageNoNum <= $_endPageNoNum){
				if($_startPageNoNum == $_pageNo){
					echo "<a style='color:red;' href='?pageNo=".$_startPageNoNum."'>";
				}else{
					echo "<a href='?pageNo=".$_startPageNoNum."'>";
				}
				echo $_startPageNoNum;
				echo "</a>";
				$_startPageNoNum += 1;
			}
			if($_pageNo < $_endPageNoNum){
				echo "&nbsp;&nbsp;";
				echo "<a href='?pageNo=".($_pageNo + 1)."'>下一页</a>";
			}
		?>
	</span>
</div>