<?
header( "Content-type: application/vnd.ms-excel;charset=KSC5601" );
header( "Content-Disposition: attachment; filename=RawData_tmp.xls" );
header( "Content-Description: Gamza Excel Data" );
header( "Content-charset=euc-kr" );

include_once "../common/config.php";
include_once "../common/dbconn.php";

$times = $_GET[times];

$sql = "select * from raw_title where times = '$times'";
$rs = mysql_query($sql,$connect);
$data = mysql_fetch_array($rs);

$sql = "select * from master_account where raw_channel = '$data[channel]' limit 0, 1";
$rs = mysql_query($sql,$connect);
$conf = mysql_fetch_array($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>접속통계</title>
<style type="text/css">

/* Data field style*/

div, td, a{font-size:12px;}
</style>


</head>

<body>
<table>
			<tr>
				<th rowspan="2" style="background-color:#f8edcd;">채널구분</th>
				<th rowspan="2" style="background-color:#f8edcd;">Account1</th>
				<th rowspan="2" style="background-color:#f8edcd;">Account2</th>
				<th rowspan="2" style="background-color:#f8edcd;">날짜</th>
				<th rowspan="2" style="background-color:#f8edcd;">모델명</th>
				<th rowspan="2" style="background-color:#f8edcd;">수량</th>
				<th rowspan="2" style="background-color:#f8edcd;">기준금액</th>
				<th rowspan="2" style="background-color:#f8edcd;">지역</th>
				<th rowspan="2" style="background-color:#f8edcd;">매장</th>
				<th rowspan="2" style="background-color:#f8edcd;">매장코드</th>
				<th rowspan="2" style="background-color:#f8edcd;">운영형태</th>
				<th rowspan="2" style="background-color:#f8edcd;">판매구분</th>
				<th rowspan="2" style="background-color:#f8edcd;">점포등급</th>
				<th rowspan="2" style="border-top:none;border-bottom:none;background-color:#fff;"></th>
				<th <? if(col_name("1",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>A<?=col_name("1",$data[channel])?></th>
				<th <? if(col_name("2",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>B<?=col_name("2",$data[channel])?></th>
				<th <? if(col_name("3",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>C<?=col_name("3",$data[channel])?></th>
				<th <? if(col_name("4",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>D<?=col_name("4",$data[channel])?></th>
				<th <? if(col_name("5",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>E<?=col_name("5",$data[channel])?></th>
				<th <? if(col_name("6",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>F<?=col_name("6",$data[channel])?></th>
				<th <? if(col_name("7",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>G<?=col_name("7",$data[channel])?></th>
				<th <? if(col_name("8",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>H<?=col_name("8",$data[channel])?></th>
				<th <? if(col_name("9",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>I<?=col_name("9",$data[channel])?></th>
				<th <? if(col_name("10",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>J<?=col_name("10",$data[channel])?></th>
				<th <? if(col_name("11",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>K<?=col_name("11",$data[channel])?></th>
				<th <? if(col_name("12",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>L<?=col_name("12",$data[channel])?></th>
				<th <? if(col_name("13",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>M<?=col_name("13",$data[channel])?></th>
				<th <? if(col_name("14",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>N<?=col_name("14",$data[channel])?></th>
				<th <? if(col_name("15",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>O<?=col_name("15",$data[channel])?></th>
				<th <? if(col_name("16",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>P<?=col_name("16",$data[channel])?></th>
				<th <? if(col_name("17",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>Q<?=col_name("17",$data[channel])?></th>
				<th <? if(col_name("18",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>R<?=col_name("18",$data[channel])?></th>
				<th <? if(col_name("19",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>S<?=col_name("19",$data[channel])?></th>
				<th <? if(col_name("20",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>T<?=col_name("20",$data[channel])?></th>
				<th <? if(col_name("21",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>U<?=col_name("21",$data[channel])?></th>
				<th <? if(col_name("22",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>V<?=col_name("22",$data[channel])?></th>
				<th <? if(col_name("23",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>W<?=col_name("23",$data[channel])?></th>
				<th <? if(col_name("24",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>X<?=col_name("24",$data[channel])?></th>
				<th <? if(col_name("25",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>Y<?=col_name("25",$data[channel])?></th>
				<th <? if(col_name("26",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>Z<?=col_name("26",$data[channel])?></th>
				<th <? if(col_name("27",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AA<?=col_name("27",$data[channel])?></th>
				<th <? if(col_name("28",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AB<?=col_name("28",$data[channel])?></th>
				<th <? if(col_name("29",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AC<?=col_name("29",$data[channel])?></th>
				<th <? if(col_name("30",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AD<?=col_name("30",$data[channel])?></th>
				<th <? if(col_name("31",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AE<?=col_name("31",$data[channel])?></th>
				<th <? if(col_name("32",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AF<?=col_name("32",$data[channel])?></th>
				<th <? if(col_name("33",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AG<?=col_name("33",$data[channel])?></th>
				<th <? if(col_name("34",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AH<?=col_name("34",$data[channel])?></th>
				<th <? if(col_name("35",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AI<?=col_name("35",$data[channel])?></th>
				<th <? if(col_name("36",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AJ<?=col_name("36",$data[channel])?></th>
				<th <? if(col_name("37",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AK<?=col_name("37",$data[channel])?></th>
				<th <? if(col_name("38",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AL<?=col_name("38",$data[channel])?></th>
				<th <? if(col_name("39",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AM<?=col_name("39",$data[channel])?></th>
				<th <? if(col_name("40",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AN<?=col_name("40",$data[channel])?></th>
				<th <? if(col_name("41",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AO<?=col_name("41",$data[channel])?></th>
				<th <? if(col_name("42",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AP<?=col_name("42",$data[channel])?></th>
				<th <? if(col_name("43",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AQ<?=col_name("43",$data[channel])?></th>
				<th <? if(col_name("44",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AR<?=col_name("44",$data[channel])?></th>
				<th <? if(col_name("45",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AS<?=col_name("45",$data[channel])?></th>
				<th <? if(col_name("46",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AT<?=col_name("46",$data[channel])?></th>
				<th <? if(col_name("47",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AU<?=col_name("47",$data[channel])?></th>
				<th <? if(col_name("48",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AV<?=col_name("48",$data[channel])?></th>
				<th <? if(col_name("49",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AW<?=col_name("49",$data[channel])?></th>
				<th <? if(col_name("50",$data[channel]) != "") echo "style='background-color:#c1d7f6;'"; ?>>AX<?=col_name("50",$data[channel])?></th>
			</tr>
			<tr>
				<th><?=$data[col1]?></th>
				<th><?=$data[col2]?></th>
				<th><?=$data[col3]?></th>
				<th><?=$data[col4]?></th>
				<th><?=$data[col5]?></th>
				<th><?=$data[col6]?></th>
				<th><?=$data[col7]?></th>
				<th><?=$data[col8]?></th>
				<th><?=$data[col9]?></th>
				<th><?=$data[col10]?></th>
				<th><?=$data[col11]?></th>
				<th><?=$data[col12]?></th>
				<th><?=$data[col13]?></th>
				<th><?=$data[col14]?></th>
				<th><?=$data[col15]?></th>
				<th><?=$data[col16]?></th>
				<th><?=$data[col17]?></th>
				<th><?=$data[col18]?></th>
				<th><?=$data[col19]?></th>
				<th><?=$data[col20]?></th>
				<th><?=$data[col21]?></th>
				<th><?=$data[col22]?></th>
				<th><?=$data[col23]?></th>
				<th><?=$data[col24]?></th>
				<th><?=$data[col25]?></th>
				<th><?=$data[col26]?></th>
				<th><?=$data[col27]?></th>
				<th><?=$data[col28]?></th>
				<th><?=$data[col29]?></th>
				<th><?=$data[col30]?></th>
				<th><?=$data[col31]?></th>
				<th><?=$data[col32]?></th>
				<th><?=$data[col33]?></th>
				<th><?=$data[col34]?></th>
				<th><?=$data[col35]?></th>
				<th><?=$data[col36]?></th>
				<th><?=$data[col37]?></th>
				<th><?=$data[col38]?></th>
				<th><?=$data[col39]?></th>
				<th><?=$data[col40]?></th>
				<th><?=$data[col41]?></th>
				<th><?=$data[col42]?></th>
				<th><?=$data[col43]?></th>
				<th><?=$data[col44]?></th>
				<th><?=$data[col45]?></th>
				<th><?=$data[col46]?></th>
				<th><?=$data[col47]?></th>
				<th><?=$data[col48]?></th>
				<th><?=$data[col49]?></th>
				<th><?=$data[col50]?></th>
			</tr>
<?
$model_not_exist = 0;
$account_not_exist = 0;
$model_info_not_exist = 0;
$area_not_exist = 0;
$sql = "select * from raw_origin_tmp where times = '$times' order by idx asc";
$rs = mysql_query($sql,$connect);
while($data = mysql_fetch_array($rs)){
	$tr_style = "";
	$account_info = account_info($data[channel],$data["col".$conf['account_sec']],$data["col".$conf['sale_shop']]);
	
	//날짜
	if($conf['sale_date'] == ""){
		$sale_date = $data[setdate];
	}else{
		$sale_date = $data["col".$conf['sale_date']];
	}
	if(!ereg("-",$sale_date)){
		$sale_date = substr($sale_date,0,4)."-".substr($sale_date,4,2)."-".substr($sale_date,6,2);
	}
	
	//모델명
	if($conf['sale_code'] == ""){
		$model_name = $data["col".$conf['sale_product_name']];
	}else{
		$sale_code = $data["col".$conf['sale_code']];
		$sql = "select model_name from master_account_product where (account1 = '".$account_info["account1"]."' or account1 = '".$account_info["account2"]."') and sale_code = '$sale_code'"; //echo $sql."<br>";
		@$model_name = mysql_result(mysql_query($sql,$connect),0,0);
	}


	$sale_cnt = $data["col".$conf['sale_cnt']];
	
	//기준금액
	if($conf['sale_amt'] != ""){
		$sale_amt = $data["col".$conf['sale_amt']];
	}else{
		$sql = "select lrrp from master_product where model_name = '$model_name'";
		@$sale_amt = mysql_result(mysql_query($sql,$connect),0,0);
	}

	//지역, 운영형태, 판매구분, 점등급
	if($conf['sale_shop'] != ""){
		$sale_shop = $data["col".$conf['sale_shop']];
		$sql = "select sale_area, oper_mode, sale_section, sale_level from master_account_area where account1 = '".$account_info["account1"]."' and account2 = '".$account_info["account2"]."' and sale_shop = '$sale_shop'";
		@$sale_area = mysql_result(mysql_query($sql,$connect),0,0);
		@$oper_mode = mysql_result(mysql_query($sql,$connect),0,1);
		@$sale_section = mysql_result(mysql_query($sql,$connect),0,2);
		@$sale_level = mysql_result(mysql_query($sql,$connect),0,3);

		if($sale_area == "온라인" || $sale_area == "인터넷"){
			$sale_section = "온라인";
		}
	}

	//매장코드
	$sale_shop_code = $data["col".$conf['sale_shop_code']];

	//판매구분이 로우데이터에 있는 경우
	if($conf['sale_section'] != ""){
		$sale_section = $data["col".$conf['sale_section']];
	}

	if($model_name == ""){		
		$model_not_exist++;
		$tr_style = " style='background-color:#ffcccc' ";
	}
	if($account_info["account1"] == ""){
		$account_not_exist++;
		$tr_style = " style='background-color:#ffcccc' ";
	}
	if($model_name != ""){	
		$sql = "select count(idx) from master_product where model_name = '$model_name'";
		@$model_exist = mysql_result(mysql_query($sql,$connect),0,0);
		if($model_exist == 0){
			$model_info_not_exist++;
			$tr_style = " style='background-color:#ffcccc' ";
		}
	}
	if($account_info["account1"] == "ET Land" || $account_info["account1"] == "Hi Mart" || $account_info["account1"] == "Emart" || $account_info["account1"] == "ElectroMart" || $account_info["account1"] == "Traders" || ($account_info["account1"] == "Homeplus" && $account_info["channel"] == "Mass Merchant") || $account_info["account1"] == "AK백화점" || $account_info["account1"] == "갤러리아백화점" || $account_info["account1"] == "현대백화점" || $account_info["account1"] == "신세계백화점" || $account_info["account1"] == "롯데백화점" || $account_info["account1"] == "" || $account_info["account1"] == "Lottemart"){
		if($sale_area == ""){
			$area_not_exist++;
			$tr_style = " style='background-color:#ffcccc' ";
		}
	}
?>
			<tr <?=$tr_style?>>
				<td><?=$account_info["channel"]?></td>
				<td><?=$account_info["account1"]?></td>
				<td><?=$account_info["account2"]?></td>
				<td><?=$sale_date?></td>
				<td><?=$model_name?></td>
				<td><?=$sale_cnt?></td>
				<td><?=$sale_amt?></td>
				<td><?=$sale_area?></td>
				<td><?=$sale_shop?></td>
				<td><?=$sale_shop_code?></td>
				<td><?=$oper_mode?></td>
				<td><?=$sale_section?></td>
				<td><?=$sale_level?></td>
				<td style="border-top:none;border-bottom:none;"></td>
				<td><?=$data[col1]?></td>
				<td><?=$data[col2]?></td>
				<td><?=$data[col3]?></td>
				<td><?=$data[col4]?></td>
				<td><?=$data[col5]?></td>
				<td><?=$data[col6]?></td>
				<td><?=$data[col7]?></td>
				<td><?=$data[col8]?></td>
				<td><?=$data[col9]?></td>
				<td><?=$data[col10]?></td>
				<td><?=$data[col11]?></td>
				<td><?=$data[col12]?></td>
				<td><?=$data[col13]?></td>
				<td><?=$data[col14]?></td>
				<td><?=$data[col15]?></td>
				<td><?=$data[col16]?></td>
				<td><?=$data[col17]?></td>
				<td><?=$data[col18]?></td>
				<td><?=$data[col19]?></td>
				<td><?=$data[col20]?></td>
				<td><?=$data[col21]?></td>
				<td><?=$data[col22]?></td>
				<td><?=$data[col23]?></td>
				<td><?=$data[col24]?></td>
				<td><?=$data[col25]?></td>
				<td><?=$data[col26]?></td>
				<td><?=$data[col27]?></td>
				<td><?=$data[col28]?></td>
				<td><?=$data[col29]?></td>
				<td><?=$data[col30]?></td>
				<td><?=$data[col31]?></td>
				<td><?=$data[col32]?></td>
				<td><?=$data[col33]?></td>
				<td><?=$data[col34]?></td>
				<td><?=$data[col35]?></td>
				<td><?=$data[col36]?></td>
				<td><?=$data[col37]?></td>
				<td><?=$data[col38]?></td>
				<td><?=$data[col39]?></td>
				<td><?=$data[col40]?></td>
				<td><?=$data[col41]?></td>
				<td><?=$data[col42]?></td>
				<td><?=$data[col43]?></td>
				<td><?=$data[col44]?></td>
				<td><?=$data[col45]?></td>
				<td><?=$data[col46]?></td>
				<td><?=$data[col47]?></td>
				<td><?=$data[col48]?></td>
				<td><?=$data[col49]?></td>
				<td><?=$data[col50]?></td>
			</tr>
<?
}
?>
		</table>
</body>
</html>
