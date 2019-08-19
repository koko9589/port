<script>
function menu(num){
	if($(".menu" + num).css("display") == "none"){
		for(var i = 1; i <= 4; i++){
			$(".menu" + i).hide();
		}
		$(".menu" + num).show();
	}else{
		$(".menu" + num).hide();
	}
}
</script>
<div id="menu_show" class="menu" style="top:32px;display:none;">
	<div style="height:1000px;padding-top:10px;">
		<a href="../main/"><img src="../images/icon_dashboard.png" />&nbsp;&nbsp; Dashboard</a>

		<a href="javascript:menu('1')"><img src="../images/icon_account.png" />&nbsp;&nbsp; Sell out data All Accounts</a>
		<a style="display:none;" href="../all_account/" class="tab menu1">Weekly</a>
		<a style="display:none;" href="../all_account/month.html" class="tab menu1">Monthly</a>
		
		<a href="javascript:menu('2')"><img src="../images/icon_product.png" />&nbsp;&nbsp; Sell out data Products</a>
		<a style="display:none;" href="../product/" class="tab menu2">Weekly</a>
		<a style="display:none;" href="../product/month.html" class="tab menu2">Monthly</a>
		
		<a href="javascript:menu('3')"><img src="../images/icon_report.png" />&nbsp;&nbsp; Weekly Sell out</a>
		<a style="display:none;" href="../sellout-summary/" class="tab menu3">Sell-out Summary</a>
		<a style="display:none;" href="../sellout-mag/" class="tab menu3">Sell-out Summary by MAG</a>
		<a style="display:none;" href="../sellout-by/" class="tab menu3">Sell-out Summary by Account</a>
		<a style="display:none;" href="../sellout-by/category.html" class="tab menu3">Sell-out Summary by Category</a>
		<!--<a style="display:none;" href="../sellout-by/ka.html" class="tab menu3">Sell-out Summary by KA Detail</a>-->
		<a style="display:none;" href="../weekly_rawdata/" class="tab menu3">Raw Data</a>

<? if($_SESSION["ss_level"] == "M"){ ?>
		<a href="javascript:menu('4')"><img src="../images/icon_master.png" />&nbsp;&nbsp; MANAGE</a>
		<a style="display:none;" href="../manage_product/" class="tab menu4">Product Master</a>
		<a style="display:none;" href="../manage_acount/" class="tab menu4">Acount Master</a>
		<a style="display:none;" href="../manage_acount_product/" class="tab menu4">Acount Product Master</a>
		<a style="display:none;" href="../manage_acount_area/" class="tab menu4">Acount Area Master</a>
		<a style="display:none;" href="../manage_rawdata/" class="tab menu4">Raw Data</a>
<? } ?>
		<a href="../user/"><img src="../images/icon_passwd.png" />&nbsp;&nbsp; PASSWORD</a>
		<a href="../logout.php" style="border:none;"><img src="../images/icon_logout.png" />&nbsp;&nbsp; LOG OUT</a>
	</div>
</div>
<div id="menu_show_btn" style="display:none;">
	<a href="javascript:void(document.getElementById('menu_show').style.display='none');void(document.getElementById('menu_show_btn').style.display='none');void(document.getElementById('menu_hide').style.display='');"><img src="../images/hide_menu.png" /></a>
</div>

<div id="menu_hide">
	<a href="javascript:void(document.getElementById('menu_show').style.display='');void(document.getElementById('menu_show_btn').style.display='');void(document.getElementById('menu_hide').style.display='none');"><img src="../images/show_menu.png" /></a>
</div>