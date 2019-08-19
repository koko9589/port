<?
include_once "../common/config.php";
include_once "../common/dbconn.php";

$times = $_POST['times'];

$sql = "select * from raw_title where times = '$times'";
$rs = mysql_query($sql,$connect);
$data = mysql_fetch_array($rs);

$file_name = $data['file_name'];

$sql = "select * from master_account where raw_channel = '$data[channel]' limit 0, 1";
$rs = mysql_query($sql,$connect);
$conf = mysql_fetch_array($rs);

$sql = "select * from raw_origin_tmp where times = '$times'";
$rs = mysql_query($sql,$connect);
while($data = mysql_fetch_array($rs)){
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
	$sale_amt = trim(ereg_replace(",", "",$sale_amt));

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

	//온라인 주문번호
	if($account_info["channel"] == "Online"){
		$order_num = $data['col9'];
	}

	$sql = "insert into raw_origin set
			times = '$times',
			file_name = '$file_name',
			channel = '".$account_info["channel"]."',
			account1 = '".$account_info["account1"]."',
			account2 = '".$account_info["account2"]."',
			sale_date = '".$sale_date."',
			model_name = '".$model_name."',
			sale_cnt = '".$sale_cnt."',
			sale_amt = '".$sale_amt."',
			sale_area = '".$sale_area."',
			sale_shop = '".$sale_shop."',
			sale_shop_code = '".$sale_shop_code."',
			oper_mode = '".$oper_mode."',
			sale_section = '".$sale_section."',
			sale_level = '".$sale_level."',
			order_num = '".$order_num."',
			setdate = '".$setdate."',
			col1 = '".$data["col1"]."',
			col2 = '".$data["col2"]."',
			col3 = '".$data["col3"]."',
			col4 = '".$data["col4"]."',
			col5 = '".$data["col5"]."',
			col6 = '".$data["col6"]."',
			col7 = '".$data["col7"]."',
			col8 = '".$data["col8"]."',
			col9 = '".$data["col9"]."',
			col10 = '".$data["col10"]."',
			col11 = '".$data["col11"]."',
			col12 = '".$data["col12"]."',
			col13 = '".$data["col13"]."',
			col14 = '".$data["col14"]."',
			col15 = '".$data["col15"]."',
			col16 = '".$data["col16"]."',
			col17 = '".$data["col17"]."',
			col18 = '".$data["col18"]."',
			col19 = '".$data["col19"]."',
			col20 = '".$data["col20"]."',
			col21 = '".$data["col21"]."',
			col22 = '".$data["col22"]."',
			col23 = '".$data["col23"]."',
			col24 = '".$data["col24"]."',
			col25 = '".$data["col25"]."',
			col26 = '".$data["col26"]."',
			col27 = '".$data["col27"]."',
			col28 = '".$data["col28"]."',
			col29 = '".$data["col29"]."',
			col30 = '".$data["col30"]."',
			col31 = '".$data["col31"]."',
			col32 = '".$data["col32"]."',
			col33 = '".$data["col33"]."',
			col34 = '".$data["col34"]."',
			col35 = '".$data["col35"]."',
			col36 = '".$data["col36"]."',
			col37 = '".$data["col37"]."',
			col38 = '".$data["col38"]."',
			col39 = '".$data["col39"]."',
			col40 = '".$data["col40"]."',
			col41 = '".$data["col41"]."',
			col42 = '".$data["col42"]."',
			col43 = '".$data["col43"]."',
			col44 = '".$data["col44"]."',
			col45 = '".$data["col45"]."',
			col46 = '".$data["col46"]."',
			col47 = '".$data["col47"]."',
			col48 = '".$data["col48"]."',
			col49 = '".$data["col49"]."',
			col50 = '".$data["col50"]."',
			regdate = '".$data["regdate"]."'";
	mysql_query($sql,$connect);
}

$sql = "select * from raw_origin where times = '$times'"; 
$rs = mysql_query($sql,$connect);
while($data = mysql_fetch_array($rs)){
	$channel = $data['channel'];
	$account1 = $data['account1'];
	$account2 = $data['account2'];
	$sale_date = $data['sale_date'];
	$sale_year = substr($sale_date,0,4);
	$sale_month = substr($sale_date,5,2);

	//주차 정보
	$sql = "select year, week from conf_week where date1 <= '$sale_date' and date2 >= '$sale_date'";
	@$sale_week_year = mysql_result(mysql_query($sql,$connect),0,0);
	@$sale_week = mysql_result(mysql_query($sql,$connect),0,1);

	$model_name = $data['model_name'];
	$sale_area = $data['sale_area'];
	$sale_shop = $data['sale_shop'];
	$sale_shop_code = $data['sale_shop_code'];
	$oper_mode = $data['oper_mode'];
	$sale_section = $data['sale_section'];
	$sale_level = $data['sale_level'];
	$qty = $data['sale_cnt'];
	$amt = $data['sale_amt'];
	$qtyamt = $qty * $amt;
	if($amt < 0 && $qtyamt > 0) $qtyamt = -1 * $qtyamt;

	$order_num = $data['order_num'];

	//제품 정보
	$sql = "select * from master_product where model_name = '$model_name'";
	$dt = mysql_fetch_array(mysql_query($sql,$connect));
	$bg = $dt['bg'];
	$bg_disc = addslashes(stripslashes($dt['bg_disc']));
	$bu = $dt['bu'];
	$bu_disc = addslashes(stripslashes($dt['bu_disc']));
	$mag = $dt['mag'];
	$mag_disc = addslashes(stripslashes($dt['mag_disc']));
	$ag = $dt['ag'];
	$ag_disc = addslashes(stripslashes($dt['ag_disc']));
	$nc = $dt['nc'];
	$champion = addslashes(stripslashes($dt['champion']));
	$lrrp = $dt['lrrp'];

	//금액 계산
	
	if($channel == "Online" || ($channel == "MCC" && $account2 == "B2C") || ($channel == "MCC" && $account2 == "C2C") || ($channel == "MCC" && $account2 == "Online")){
		$amt = $amt * 1.1 / 0.77;
	}else{
		switch($account1){
			case "AK백화점" : $amt = $amt; break;
			case "갤러리아백화점" : $amt = $amt; break;
			case "롯데백화점" : $amt = $amt; break;
			case "신세계백화점" : $amt = $amt; break;
			case "현대백화점" : $amt = $amt; break;
			case "ET Land" : $amt = $qty * $lrrp * 0.71; break;
			case "Hi Mart" : $amt = $qty * $lrrp * 0.71; break;
			case "Olive Young" : $amt = $amt; break;
			case "ElectroMart" : $amt = $amt * 1.3317 * 1.1; break;
			case "Emart" : $amt = $amt * 1.3317 * 1.1; break;
			case "Traders" : $amt = $amt * 1.3317 * 1.1; break;
			case "Homeplus" : $amt = $amt; break;
			case "Lottemart" : $amt = $amt; break;
		}
	}


	if($qy != 0 || $amt != 0 || $model_name != ""){
		$sql = "insert into raw_use set
				times = '".$times."',
				file_name = '$file_name',
				channel = '".$channel."',
				account1 = '".$account1."',
				account2 = '".$account2."',
				sale_year = '".$sale_year."',
				sale_month = '".$sale_month."',
				sale_week_year = '".$sale_week_year."',
				sale_week = '".$sale_week."',
				sale_date = '".$sale_date."',
				sale_area = '".$sale_area."',
				sale_shop = '".$sale_shop."',
				sale_shop_code = '".$sale_shop_code."',
				oper_mode = '".$oper_mode."',
				sale_section = '".$sale_section."',
				sale_level = '".$sale_level."',
				sale_cnt = '".$qty."',
				sale_amt = '".$amt."',
				model_name = '".$model_name."',
				bg = '".$bg."',
				bg_disc = '".$bg_disc."',
				bu = '".$bu."',
				bu_disc = '".$bu_disc."',
				mag = '".$mag."',
				mag_disc = '".$mag_disc."',
				ag = '".$ag."',
				ag_disc = '".$ag_disc."',
				nc = '".$nc."',
				lrrp = '".$lrrp."',
				champion = '".$champion."',
				order_num = '".$order_num."',
				regdate = now()";
		mysql_query($sql,$connect);
	}
}

$sql = "delete from raw_origin_tmp where times = '$times'";
mysql_query($sql,$connect);
?>
<script>history.go(-3);</script>