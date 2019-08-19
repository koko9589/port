<?
include_once "../common/config.php";
include_once "../common/dbconn.php";

header( "Content-type: application/vnd.ms-excel;charset=KSC5601" );
header( "Content-Disposition: attachment; filename=Sellout-Data(All_accoount).xls" );
header( "Content-Description: Gamza Excel Data" );
header( "Content-charset=euc-kr" );

$year_arr = $_GET[year_arr];
if(count($year_arr) == 0){
	$year_arr[] = date("Y");
}

$last_year = $year_arr[(count($year_arr) - 1)];
$today = date("Y-m-d",strtotime(date("Y-m-d")." -7 days"));

$select_aq = $_GET[select_aq];
if($select_aq == "") $select_aq = "amt";

$week1 = $_GET[week1];
if($week1 == ""){
	$week1 = "01";
}
$week2 = $_GET[week2];
if($week2 == ""){
	$sql = "select week from conf_week where date1 <= '".$today."' and date2 >= '".$today."'";
	@$week2 = substr(mysql_result(mysql_query($sql,$connect),0,0),2,2);
}

$sql = "select * from conf_week where year = '".$last_year."' order by week asc";
$rs = mysql_query($sql,$connect);
while($data = mysql_fetch_array($rs)){
	$week_arr[] = substr($data[week],2,2);
	$date1_arr[] = str_replace("-","/",substr($data[date1],5,5));
	$date2_arr[] = str_replace("-","/",substr($data[date2],5,5));
}

for($y = 0; $y < count($year_arr); $y++){
	if($y != 0) $add_query .= " or ";
	
	$year_week1 = substr($year_arr[$y],2,2).$week1;
	$year_week2 = substr($year_arr[$y],2,2).$week2;
	$sql = "select date1 from conf_week where week = '$year_week1'";
	@$date1 = mysql_result(mysql_query($sql,$connect),0,0);
	$sql = "select date2 from conf_week where week = '$year_week2'";
	@$date2 = mysql_result(mysql_query($sql,$connect),0,0);

	for($w = $year_week1; $w <= $year_week2; $w++){
		$yw_arr[] = $w;
	}
	
	$add_query .= " ( sale_date >= '".$date1."' and sale_date <= '".$date2."' ) ";
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
			<th colspan="<?=number_format($week2)?>"><?=$year_arr[$y]?></th>
<? } ?>
		</tr>
		<tr style="background-color:#666;color:#fff;">
<? 
for($y = 0; $y < count($year_arr); $y++){
	for($w = $week1; $w <= $week2; $w++){ 
?>
			<th>W<? if(strlen($w) == 1){ echo "0".$w; }else{ echo $w; } ?></th>
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


$sql = "select channel, account2, account1, sale_week, sum(sale_cnt) as qty, sum(sale_amt) as amt from raw_use where $add_query group by channel, account2, account1, sale_week";
$rs = mysql_query($sql,$connect);
while($data = mysql_fetch_array($rs)){
	$channel = $data[channel];
	$account = $data[account2];
	$account_detail = $data[account1];
	if($account_detail == "ElectroMart") $account_detail = "Emart";
	$sale_week = $data[sale_week];
	$amt = $data[amt];
	$qty = $data[qty];

	$account_detail_qty_value[$sale_week][$channel][$account][$account_detail] = $qty;
	$channel_qty_value[$sale_week][$channel] = $channel_qty_value[$sale_week][$channel] + $qty;
	$account_qty_value[$sale_week][$channel][$account] = $account_qty_value[$sale_week][$channel][$account] + $qty;
	
	$account_detail_value[$sale_week][$channel][$account][$account_detail] = $amt;
	$channel_value[$sale_week][$channel] = $channel_value[$sale_week][$channel] + $amt;
	$account_value[$sale_week][$channel][$account] = $account_value[$sale_week][$channel][$account] + $amt;

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
for($yw = 0; $yw < count($yw_arr); $yw++){
?>
			<th style="text-align:right;font-size:11px;letter-spacing:-0.5px;">
<?	if($select_aq == "amt"){ ?><span class="span_amt"><? echo @number_value(array_sum($channel_value[$yw_arr[$yw]])) ?></span><? } ?>
<?	if($select_aq == "qty"){ ?><span class="span_qty"><? echo @number_value(array_sum($channel_qty_value[$yw_arr[$yw]])) ?></span><? } ?>
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
for($yw = 0; $yw < count($yw_arr); $yw++){
?>
			<td style="text-align:right;font-size:11px;letter-spacing:-0.5px;">
<?	if($select_aq == "amt"){ ?><span class="span_amt"><? echo @number_value($channel_value[$yw_arr[$yw]][$normal_channel_arr[$c]]) ?></span><? } ?>
<?	if($select_aq == "qty"){ ?><span class="span_qty"><? echo @number_value($channel_qty_value[$yw_arr[$yw]][$normal_channel_arr[$c]]) ?></span><? } ?>
			</td>
<?
}
?>
		</tr>
<?
	for($a = 0; $a < count($account_arr[$normal_channel_arr[$c]]); $a++){
		$account_detail_cnt = count($account_detail_arr[$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]]);

?>
		<tr style="background-color:#ebebeb;"  id="tr_<?=$normal_channel_arr[$c]?>_<?=$a+1?>">
			<td><?=$normal_channel_arr[$c]?></td>
			<td style="text-align:left;"><?=$account_arr[$normal_channel_arr[$c]][$a]?></td><td></td>
<? 
	for($yw = 0; $yw < count($yw_arr); $yw++){
?>
			<td style="text-align:right;font-size:11px;letter-spacing:-0.5px;">
<?	if($select_aq == "amt"){ ?><span class="span_amt"><? echo @number_value($account_value[$yw_arr[$yw]][$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]]) ?></span><? } ?>
<?	if($select_aq == "qty"){ ?><span class="span_qty"><? echo @number_value($account_qty_value[$yw_arr[$yw]][$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]]) ?></span><? } ?>
			</td>
<?
}
?>
		</tr>
<?
		$d2 = 1;
		for($d = 0; $d < count($account_detail_arr[$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]]); $d++){

?>
		<tr  id="tr_<?=$normal_channel_arr[$c]?>_<?=$a+1?>_<?=$d2?>">
			<td><?=$normal_channel_arr[$c]?></td>
			<td><?=$account_arr[$normal_channel_arr[$c]][$a]?></td>
			<td style="text-align:left"><?=$account_detail_arr[$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]][$d]?></td>
<? 
	for($yw = 0; $yw < count($yw_arr); $yw++){
?>
			<td style="text-align:right;font-size:11px;letter-spacing:-0.5px;">
<?	if($select_aq == "amt"){ ?><span class="span_amt"><? echo @number_value($account_detail_value[$yw_arr[$yw]][$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]][$account_detail_arr[$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]][$d]]) ?></span><? } ?>
<?	if($select_aq == "qty"){ ?><span class="span_qty"><? echo @number_value($account_detail_qty_value[$yw_arr[$yw]][$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]][$account_detail_arr[$normal_channel_arr[$c]][$account_arr[$normal_channel_arr[$c]][$a]][$d]]) ?></span><? } ?>
			</td>
<?
}
?>
		</tr>	
<?
			$d2++;
		}
	}
}		
?>



</table>
</body>
</html>
