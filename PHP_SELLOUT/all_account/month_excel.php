<?
include_once "../common/config.php";
include_once "../common/dbconn.php";

header( "Content-type: application/vnd.ms-excel;charset=KSC5601" );
header( "Content-Disposition: attachment; filename=Sellout-Data-monthly(All_accoount).xls" );
header( "Content-Description: Gamza Excel Data" );
header( "Content-charset=euc-kr" );

$year_arr = $_GET[year_arr];
if(count($year_arr) == 0){
	$year_arr[] = date("Y");
}

$month_all = $_GET[month_all];
$month_arr = $_GET[month_arr];
if(count($month_arr) == 0){
	for($m = 1; $m <= date("n"); $m++){
		$month_arr[] = $m;
	}
}

$select_aq = $_GET[select_aq];
if($select_aq == "") $select_aq = "amt";

for($y = 0; $y < count($year_arr); $y++){
	for($m = 0; $m < count($month_arr); $m++){
		if(strlen($month_arr[$m]) == 1) $ym_arr[] = $year_arr[$y]."0".$month_arr[$m];
		else $ym_arr[] = $year_arr[$y].$month_arr[$m];
	}
}

if(count($year_arr) > 1){
	$year_query = " ( ";
	for($y = 0; $y < count($year_arr); $y++){
		if($y != 0) $year_query .= " or ";
		$year_query .= " sale_year = '".$year_arr[$y]."' ";
	}
	$year_query .= " ) ";
}else if(count($year_arr) == 1){
	$year_query .= " sale_year = '".$year_arr[0]."' ";
}

$month_query = " and ";

if(count($month_arr) > 1){
	$month_query .= " ( ";
	for($m = 0; $m < count($month_arr); $m++){
		if($m != 0) $month_query .= " or ";
		$month_query .= " sale_month = '".$month_arr[$m]."' ";
	}
	$month_query .= " ) ";
}else if(count($month_arr) == 1){
	$month_query .= " sale_month = '".$month_arr[0]."' ";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>접속통계</title>
<style type="text/css">

/* Data field style*/

div, th, td, a{font-size:12px;}
</style>


</head>

<body>
<div style="padding:5px 0; font-size:11px;">
<? if($select_aq == "amt"){ ?>Amount : 1 KRW<? } ?>
<? if($select_aq == "qty"){ ?>Quantity : 1 EA<? } ?>
</div>

<table class="table1" border="1">

	<thead>
		<tr style="background-color:#666;color:#fff;">
			<th rowspan="2" width="130">Channel</th><th rowspan="2" width="120">Acount</th><th rowspan="2" width="130">Account detail</th>
<? for($y = 0; $y < count($year_arr); $y++){ ?>
			<th colspan="<?=count($month_arr)?>"><?=$year_arr[$y]?></th>
<? } ?>
		</tr>
		<tr style="background-color:#666;color:#fff;">
<? 
for($y = 0; $y < count($year_arr); $y++){
	for($m = 0; $m < count($month_arr); $m++){ 
?>
			<th><?=month_eng($month_arr[$m])?></th>
<?
	}
}
?>
		</tr>
	</thead>

<?
$channel_arr = array();
$account_arr = array();
$account_detail_arr = array();


$sql = "select channel, account2, account1, sale_year, sale_month, sum(sale_cnt) as qty, sum(sale_amt) as amt from raw_use where $year_query $month_query group by channel, account2, account1, sale_year, sale_month";
$rs = mysql_query($sql,$connect);
while($data = mysql_fetch_array($rs)){
	$channel = $data[channel];
	$account = $data[account2];
	$account_detail = $data[account1];
	if($account_detail == "ElectroMart") $account_detail = "Emart";
	$sale_year = $data[sale_year];
	$sale_month = $data[sale_month];
	if(strlen($sale_month) == 1) $ym = $sale_year."0".$sale_month;
	else $ym = $sale_year.$sale_month;
	$amt = $data[amt];
	$qty = $data[qty];

	$account_detail_qty_value[$ym][$channel][$account][$account_detail] = $qty;
	$channel_qty_value[$ym][$channel] = $channel_qty_value[$ym][$channel] + $qty;
	$account_qty_value[$ym][$channel][$account] = $account_qty_value[$ym][$channel][$account] + $qty;

	$account_detail_value[$ym][$channel][$account][$account_detail] = $amt;
	$channel_value[$ym][$channel] = $channel_value[$ym][$channel] + $amt;
	$account_value[$ym][$channel][$account] = $account_value[$ym][$channel][$account] + $amt;

	$align = account_align($channel,$account);

	if(@!in_array($channel,$channel_arr)) $channel_arr[] = $channel;
	if($align != ""){
		if(@!in_array($account,$account_arr[$channel])) $account_arr[$channel][$align] = $account;
	}else{
		if(@!in_array($account,$account_arr[$channel])) $account_arr[$channel][] = $account;
	}
	if(@!in_array($account_detail,$account_detail_arr[$channel][$account])) $account_detail_arr[$channel][$account][] = $account_detail;
}
?>
		<tr style="background-color:#999;color:#fff;">
			<th style="text-align:left;">SUM</th><th></th><th></th>
<? 
for($ym = 0; $ym < count($ym_arr); $ym++){
?>
			<th style="text-align:right;font-size:11px;letter-spacing:-0.5px;">
<?	if($select_aq == "amt"){ ?><span class="span_amt"><? echo @number_value(array_sum($channel_value[$ym_arr[$ym]])) ?></span><? } ?>
<?	if($select_aq == "qty"){ ?><span class="span_qty"><? echo @number_value(array_sum($channel_qty_value[$ym_arr[$ym]])) ?></span><? } ?>
			</th>
<?
}
?>
		</tr>
<?
for($c = 0; $c < count($normal_channel_arr); $c++){
?>
		<tr style="background-color:#ccc;">
			<td style="text-align:left;"><?=$normal_channel_arr[$c]?></td><td></td><td></td>
<? 
for($ym = 0; $ym < count($ym_arr); $ym++){
?>
			<td style="text-align:right;font-size:11px;letter-spacing:-0.5px;">
<?	if($select_aq == "amt"){ ?><span class="span_amt"><? echo @number_value($channel_value[$ym_arr[$ym]][$normal_channel_arr[$c]]) ?></span><? } ?>
<?	if($select_aq == "qty"){ ?><span class="span_qty"><? echo @number_value($channel_qty_value[$ym_arr[$ym]][$normal_channel_arr[$c]]) ?></span><? } ?>
			</td>
<?
}
?>
		</tr>
<?
	for($a = 0; $a < count($account_arr[$normal_channel_arr[$c]]); $a++){
		$account_detail_cnt = count($account_detail_arr[$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]]);

?>
		<tr style="background-color:#ebebeb;">
			<td><?=$normal_channel_arr[$c]?></td>
			<td style="text-align:left;"><?=$account_arr[$normal_channel_arr[$c]][$a]?></td><td></td>
<? 
for($ym = 0; $ym < count($ym_arr); $ym++){
?>
			<td style="text-align:right;font-size:11px;letter-spacing:-0.5px;">
<?	if($select_aq == "amt"){ ?><span class="span_amt"><? echo @number_value($account_value[$ym_arr[$ym]][$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]]) ?></span><? } ?>
<?	if($select_aq == "qty"){ ?><span class="span_qty"><? echo @number_value($account_qty_value[$ym_arr[$ym]][$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]]) ?></span><? } ?>
			</td>
<?
}
?>
		</tr>
<?
		for($d = 0; $d < count($account_detail_arr[$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]]); $d++){

?>
		<tr>
			<td><?=$normal_channel_arr[$c]?></td>
			<td><?=$account_arr[$normal_channel_arr[$c]][$a]?></td>
			<td style="text-align:left"><?=$account_detail_arr[$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]][$d]?></td>
<? 
for($ym = 0; $ym < count($ym_arr); $ym++){
?>
			<td style="text-align:right;font-size:11px;letter-spacing:-0.5px;">
<?	if($select_aq == "amt"){ ?><span class="span_amt"><? echo @number_value($account_detail_value[$ym_arr[$ym]][$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]][$account_detail_arr[$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]][$d]]) ?></span><? } ?>
<?	if($select_aq == "qty"){ ?><span class="span_qty"><? echo @number_value($account_detail_qty_value[$ym_arr[$ym]][$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]][$account_detail_arr[$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]][$d]]) ?></span><? } ?>
			</td>
<?
}
?>
		</tr>	
<?
		}
	}
}		
?>



</table>
</body>
</html>
