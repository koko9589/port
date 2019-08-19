<?php

$date1 = $_GET[date1];
$date2 = $_GET[date2];

if($date2 == "") $date2 = date("Y-m-d");
if($date1 == "") $date1 = date("Y-m-d",strtotime(date("Y-m-d")." -1 months +1 days"));

header( "Content-type: application/vnd.ms-excel;charset=KSC5601" );
header( "Content-charset=utf-8" );
header( "Content-Disposition: attachment; filename=Freewill_B2B_report(".$date1."~".$date2.").xls" );
header( "Content-Description: Gamza Excel Data" );

include_once "../common/dbconn.php";

$start = strtotime($date1);
$end = strtotime($date2);



rsort($day_arr);

//$sql = "select sec from log_deal where ((start_date <= '$date1' and finish_date >= '$date1') or (start_date <= '$date2' and finish_date >= '$date2')) and showhide = 'Y' order by sec_align asc";

$sql = "select sec from log_deal where ((start_date <= '$date1' and finish_date >= '$date1') or (start_date <= '$date2' and finish_date >= '$date2') or (start_date >= '$date1' and finish_date <= '$date2')) and showhide = 'Y' order by sec_align asc";
$rs = mysql_query($sql,$connect);
$i = 0;
$add_query = " and ( ";
while($data = mysql_fetch_array($rs)){
	$sec = $data[sec];
	if($i != 0) $add_query .= " or ";
	$add_query .= " sec = '$sec' ";
	$i++;

	$sec_arr[] = $sec;
}
$add_query .= " ) ";

?>

<style>

input, select, textarea { border:1px solid #ccc;}

.a_confirm { display:inline-block; width:55px; border:1px solid #999; border-radius:5px; padding:1px 0; background-color:#666; color:#fff; font-size:11px; font-weight:bold; }
.a_confirm_cancel { display:inline-block; width:100px; border:1px solid #999; border-radius:5px; padding:1px 0; background-color:#cc3333; color:#fff; font-size:11px; font-weight:bold; }
.a_save { display:inline-block; width:140px; border:1px solid #999; border-radius:5px; padding:7px 0; background-color:#cc3333; color:#fff; font-size:16px; font-weight:bold; }
.a_cancel { display:inline-block; width:140px; border:1px solid #666; border-radius:5px; padding:7px 0; background-color:#999; color:#fff; font-size:16px; font-weight:bold; }

.log_form th { background-color:#ccc; }
.log_form .blue { background-color:#ddebf7; font-weight:bold; }
.log_form .gray { background-color:#ebebeb; }
</style>



<?
$sql = "select substr(s_date,1,7) as month,substr(s_date,1,4) as year, sum(cost) as cost, sum(qty) as qty, sum(amt) as amt  from log_sales where s_date >= '$date1' and d_date <= '$date2' $add_query  group by month order by substr(s_date,1,7) asc";
$rs = mysql_query($sql,$connect);
while($data = mysql_fetch_array($rs)){


	$month = $data[month];
	$year = $data[year];
	$qty = $data[qty];	
	$amt = $data[amt];
	$cost = $data[cost];

	$month_arr[] = $month;
	$month_qty_arr[$month]=$qty; 
	$month_amt_arr[$month]=$amt;	
	$month_cost_arr[$month]=$cost;



	
	$sql = "select sec, s_date, sum(qty) as qty, sum(amt) as amt, sum(cost) as cost from log_sales  where s_date >= '$date1' and d_date <= '$date2' $add_query and substr(s_date,1,7) = '".$month."' group by sec";
	$sub_rs = mysql_query($sql,$connect);
	while($sub_data = mysql_fetch_array($sub_rs)){
		$sec = $sub_data[sec];
		$qty = $sub_data[qty];
		$amt = $sub_data[amt];
		$cost = $sub_data[cost];

		$sec_arr[$month][] = $sec;
		$sec_qty_arr[$month][$sec] =$qty;
		$sec_cost_arr[$month][$sec] =$cost;
		$sec_amt_arr[$month][$sec] =$amt;
		

		$sql = "select sec, productid, sum(qty) as qty, sum(amt) as amt, sum(cost) as cost from log_sales where sec = '".$sec."' and s_date >= '$date1' and d_date <= '$date2' $add_query group by productid";
		$sub1_rs = mysql_query($sql,$connect);
		while($sub1_data = mysql_fetch_array($sub1_rs)){
			$productid = $sub1_data[productid];
			$qty = $sub1_data[qty];
			$amt = $sub1_data[amt];
			$cost = $sub1_data[cost];
		
			$productid_arr[$month][$sec][] = $productid;
			$qty_arr[$month][$sec][$productid] = $qty;
			$amt_arr[$month][$sec][$productid] = $amt;
			$cost_arr[$month][$sec][$productid] = $cost;


	
		}

	}
}
?>
<table>
<tr>
<td valign="top">
	<table class="log_form">
		<tr>
		<th>Month</th>
			<th>Customer</th>
			<th>운영기간</th>
			<th>접속수</th>
			<th>전환율</th>
			<th>Item</th>
			<!--<th>제품유입</th>-->			
			<th>Qty</th>
			<th>Sell out(+)</th>
			<th>Sell in(+)</th>
			<th>Sell out(-)</th>
			<th>Sell in(-)</th>
			<th style="width:20px;border:none;background-color:#fff;"></th>
		</tr>

<?
$sql = "select sum(qty),sum(cost),sum(amt) from log_sales";
$data1 = mysql_result(mysql_query($sql,$connect),0,0);
$data2 = mysql_result(mysql_query($sql,$connect),0,1);
$data3 = mysql_result(mysql_query($sql,$connect),0,2);
$sql = "select count(idx) from log_confirm_com where s_ip !='218.154.1.50' and s_date >= '$date1' and s_date <= '$date2' and success = 'Y' $add_query";
$data4 = mysql_result(mysql_query($sql,$connect),0,0);
?>
		
		<tr>
			<td class="blue">TTL(value)</td>
			<td class="blue"></td>
			<td class="blue" style="padding-right:10px;text-align:right;"></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($data4)?></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=round($date1/$data4,2)?></td>
			<td class="blue" style="padding-right:10px;text-align:right;">TTL</td>
			<!--<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($data3)?></td>-->
			<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($data1)?></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($data3)?></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($data2)?></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($data3/1.1)?></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($data2/1.1)?></td>
			
		</tr>
		<tr>
			<td class="blue">TTL(%)</td>
			<td class="blue"></td>
			<td class="blue" style="padding-right:10px;text-align:right;"></td>
			<td class="blue" style="padding-right:10px;text-align:right;"></td>
			<td class="blue" style="padding-right:10px;text-align:right;"></td>
			<td class="blue" style="padding-right:10px;text-align:right;"></td>
			<!--<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($data3)?></td>-->
			<td class="blue" style="padding-right:10px;text-align:right;"></td>
			<td class="blue" style="padding-right:10px;text-align:right;"></td>
			<td class="blue" style="padding-right:10px;text-align:right;"></td>
			<td class="blue" style="padding-right:10px;text-align:right;"></td>
			<td class="blue" style="padding-right:10px;text-align:right;"></td>
			
		</tr>

<?
for($m = 0; $m < count($month_arr); $m++){
	$month = $month_arr[$m]; 	
	$basic_date = $month."-01";
	$date1 = date("Y-m-d",strtotime($basic_date." -30 days"));
	$date2 = date("Y-m-d",strtotime($basic_date." +80 days"));

$sql = "select count(idx) from log_confirm_com where s_ip !='218.154.1.50' and substr(s_date,1,7) = '".$month."' and   s_date >= '$date1' and s_date <= '$date2' and success = 'Y' $add_query";
$confirm = mysql_result(mysql_query($sql,$connect),0,0);
?>
		<tr>
			<td class="gray"><?=$month?></td>
			<td class="gray"></td>
			<td class="gray" style="padding-right:10px;text-align:right;"></td>
			<td class="gray" style="padding-right:10px;text-align:right;"><?=number_format($confirm)?></td>
			<td class="gray" style="padding-right:10px;text-align:right;"><?=round($month_qty_arr[$month]/$confirm,2)?></td>
			<td class="gray" style="padding-right:10px;text-align:right;">SUM</td>
			<!--<td class="gray" style="padding-right:10px;text-align:right;"><?=number_format(array_sum($log_product[$day_arr[$d]]))?></td>-->
			<td class="gray" style="padding-right:10px;text-align:right;"><?=$month_qty_arr[$month]?></td>
			<td class="gray" style="padding-right:10px;text-align:right;"><?=number_format($month_amt_arr[$month])?></td>
			<td class="gray" style="padding-right:10px;text-align:right;"><?=number_format($month_cost_arr[$month])?></td>
			<td class="gray" style="padding-right:10px;text-align:right;"><?=number_format($month_amt_arr[$month]/1.1)?></td>
			<td class="gray" style="padding-right:10px;text-align:right;"><?=number_format($month_cost_arr[$month]/1.1)?></td>
			
		</tr>	
		

<?

		for($s = 0; $s < count($sec_arr[$month]); $s++){
			$sec = $sec_arr[$month][$s];		
			
			$sql = "select sec, company  from log_sales where substr(s_date,1,7) = '".$month."'and  sec = '".$sec."' and s_date >= '$date1' and d_date <= '$date2' $add_query group by sec";
			$company= mysql_result(mysql_query($sql,$connect),0,1);

		
			$sql = "select  start_date, finish_date  from log_deal  where   sec = '".$sec."' and start_date >= '$date1' and finish_date <= '$date2' $add_query";
			
			
			$start_date= mysql_result(mysql_query($sql,$connect),0,0);
			$finish_date= mysql_result(mysql_query($sql,$connect),0,1);

			$start_date1=substr($start_date,-5);
			$finish_date1=substr($finish_date,-5);

			
			$sql = " select sum(qty) as qty, sum(amt) as amt, sum(cost) as cost from log_sales  where s_date >= '$date1' and d_date <= '$date2' $add_query and substr(s_date,1,7) = '".$month."' and sec = '".$sec."' $add_query  group by sec";
			$qty1= mysql_result(mysql_query($sql,$connect),0,0);
			$cost1= mysql_result(mysql_query($sql,$connect),0,2);
			$amt1= mysql_result(mysql_query($sql,$connect),0,1);

			$sql = "select count(idx) from log_confirm_com where s_ip !='218.154.1.50' and substr(s_date,1,7) = '".$month."' and sec = '".$sec."' and s_date >= '$date1' and s_date <= '$date2' and success = 'Y' $add_query";
			$confirm1 = mysql_result(mysql_query($sql,$connect),0,0);
?>
		<tr>
			<td class="blue"></td>
			<td class="blue"><?=$company?></td>
			<td class="blue" style="padding-right:1px;text-align:right;"><?=$start_date1?>~<?=$finish_date1?></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=$confirm1?> </td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=round($qty1/$confirm1,2)?></td>
			<td class="blue" style="padding-right:10px;text-align:right;">s_sum</td>
			<!--<td class="gray" style="padding-right:10px;text-align:right;"><?=number_format(array_sum($log_product[$day_arr[$d]]))?></td>-->
			<td class="blue" style="padding-right:10px;text-align:right;"><?=$qty1?></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($amt1)?></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($cost1)?></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($amt1/1.1)?></td>
			<td class="blue" style="padding-right:10px;text-align:right;"><?=number_format($cost1/1.1)?></td>
			
		</tr>	

<?

	for($p = 0; $p < count($productid_arr[$month][$sec]); $p++){
		$productid = $productid_arr[$month][$sec][$p];
		$qty = $qty_arr[$month][$sec][$productid];
		$amt = $amt_arr[$month][$sec][$productid];
		$cost = $cost_arr[$month][$sec][$productid];

	$sql = "select  productid, sum(qty) as qty, sum(amt) as amt, sum(cost) as cost from log_sales where substr(s_date,1,7) = '".$month."'and sec = '".$sec."' and s_date >= '$date1' and d_date <= '$date2' $add_query  and productid = '".$productid."' group by productid";
		$qty2= mysql_result(mysql_query($sql,$connect),0,1);
		$amt2= mysql_result(mysql_query($sql,$connect),0,2);
		$cost2= mysql_result(mysql_query($sql,$connect),0,3);

	if($qty2!='0' && $qty2!=''){

?>	
			
			<tr>
			<td class="white"></td>
			<td class="white"></td>
			<td class="white" style="padding-right:10px;text-align:right;"></td>
			<td class="white" style="padding-right:10px;text-align:right;"></td>
			<td class="white" style="padding-right:10px;text-align:right;"></td>
			<td class="white" style="padding-right:10px;text-align:right;"><?=$productid?></td>
			<!--<td class="gray" style="padding-right:10px;text-align:right;"><?=number_format(array_sum($log_product[$day_arr[$d]]))?></td>-->
			<td class="white" style="padding-right:10px;text-align:right;"><?=$qty2?></td>
			<td class="white" style="padding-right:10px;text-align:right;"><?=number_format($amt2)?></td>
			<td class="white" style="padding-right:10px;text-align:right;"><?=number_format($cost2)?></td>
			<td class="white" style="padding-right:10px;text-align:right;"><?=number_format($amt2/1.1)?></td>
			<td class="white" style="padding-right:10px;text-align:right;"><?=number_format($cost2/1.1)?></td>
			
		</tr>	

<?
			}
		}
	}
}
?>
    </table>

<table>
