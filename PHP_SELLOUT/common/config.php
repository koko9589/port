<?
session_set_cookie_params(0, "/");
ini_set("session.cookie_domain","");
ini_set("session.gc_maxlifetime", "86400");
session_start();
session_register("philips_mkt");

if($_SESSION[ss_idx] == ""){
	echo "<script>alert('로그인 후에 이용하세요.');location.replace('../');</script>";
	exit;
}

$section = time();

// 텍스트 자르기
function CUT_STRING($str,$length,$dot_cnt){
	if(strlen($str) > $length){
		for($i=0;$i<$length;$i++){
			if(ord($str[$i])>127){
				$over++;
			}
		}
		$dot="";
		if($dot_cnt==""){
			$dot="...";
		}else{
			for($t=0;$t<$dot_cnt;$t++){
				$dot.=".";
			}
		}
		$str=chop(substr($str,0,$length-$over%2)).$dot;
	}
	return $str;
}


function str_clear($str){
	$str = str_replace("'","",$str);
	$str = str_replace("\"","",$str);
	$str = trim($str);

	return $str;
}

// 쿠키 세팅
function here_setcookie($name, $value, $expire, $path='/'){
    if (headers_sent()) {
        $cookie = $name.'='.urlencode($value).';';
        if ($expire) $cookie .= ' expires='.gmdate('D, d M Y H:i:s', $expire).' GMT';
        echo '<script language="javascript">document.cookie="'.$cookie.'";</script>';
    } else {
        setcookie($name, $value, $expire, $path);
    }

}

function month_chk($y,$month){
    $yn = 0;
    if(!($y%4)) $yn = 1;              //4로 나누어 떨어지면 윤년
    if(!($y%100)) $yn = 0;       //100으로 나누어 떨어지면 평년
    if(!($y%400)) $yn = 1;       //400으로 나누어 떨어지면 윤년
    if(!($y%4000)) $yn = 0;       //4000으로 나누어 떨어지면 평년
    
    $M[1] = 31;
    $M[2] = 28;
    $M[3] = 31;
    $M[4] = 30;
    $M[5] = 31;
    $M[6] = 30;
    $M[7] = 31;
    $M[8] = 31;
    $M[9] = 30;
    $M[10] = 31;
    $M[11] = 30;
    $M[12] = 31;
	if($yn)$M[2] = 29;
    
    $month_cnt = $M[$month];
    return $month_cnt;
}

function month_chk2($y,$month){
	global $last_update;
    $yn = 0;
    if(!($y%4)) $yn = 1;              //4로 나누어 떨어지면 윤년
    if(!($y%100)) $yn = 0;       //100으로 나누어 떨어지면 평년
    if(!($y%400)) $yn = 1;       //400으로 나누어 떨어지면 윤년
    if(!($y%4000)) $yn = 0;       //4000으로 나누어 떨어지면 평년
    
    $M[1] = 31;
    $M[2] = 28;
    $M[3] = 31;
    $M[4] = 30;
    $M[5] = 31;
    $M[6] = 30;
    $M[7] = 31;
    $M[8] = 31;
    $M[9] = 30;
    $M[10] = 31;
    $M[11] = 30;
    $M[12] = 31;
	if($yn)$M[2] = 29;
    
    $month_cnt = $M[$month];

	if($month == date("n")){
		$month_cnt = number_format(substr($last_update,8,2));
	}

    return $month_cnt;
}

function month_array($s_year,$s_month,$e_year,$e_month){
	$s_month = number_format($s_month);	
	$e_month = number_format($e_month);
	if($s_year == $e_year){
		for($i = $s_month; $i <= $e_month; $i++){
			if($i < 10) $z = 0; else $z = "";
			$month_arr[] = $s_year."-".$z.$i;
		}
	}
	if($s_year < $e_year && ($e_year - $s_year) == 1){
		for($i = $s_month; $i <= 12; $i++){
			if($i < 10) $z = 0; else $z = "";
			$month_arr[] = $s_year."-".$z.$i;
		}
		for($i = 1; $i <= $e_month; $i++){
			if($i < 10) $z = 0; else $z = "";
			$month_arr[] = $e_year."-".$z.$i;
		}
	}
	if($s_year < $e_year && ($e_year - $s_year) > 1){
		for($t = $s_year; $t <= $e_year; $t++){
			if($t == $s_year){
				for($i = $s_month; $i <= 12; $i++){
					if($i < 10) $z = 0; else $z = "";
					$month_arr[] = $s_year."-".$z.$i;
				}
			}
			if($t > $s_year && $t < $e_year){
				for($i = 1; $i <= 12; $i++){
					if($i < 10) $z = 0; else $z = "";
					$month_arr[] = $t."-".$z.$i;
				}
			}
			if($t == $e_year){
				for($i = 1; $i <= $e_month; $i++){
					if($i < 10) $z = 0; else $z = "";
					$month_arr[] = $e_year."-".$z.$i;
				}	
			}
		}
	}

	return $month_arr;
}

function search_day_arr($search_date1,$search_date2){
	$s_year1 =  date("Y",strtotime($search_date1));
	$s_month1 =  date("n",strtotime($search_date1));
	$s_year2 =  date("Y",strtotime($search_date2));
	$s_month2 =  date("n",strtotime($search_date2));

	$month_cnt = ($s_year2 - $s_year1)*12 + ($s_month2 - $s_month1) + 1;
	$yearmonth = array();

	for($i = 0; $i <= ($month_cnt-1); $i++){
		$year =  date("Y",strtotime($search_date1." +".$i." months"));
		$month = date("n",strtotime($search_date1)) + $i;
		if($month > 12) $month = $month - 12;
		if(strlen($month) == 1) $month_tmp = "0".$month;
		else $month_tmp = $month;		
		$last_day = month_chk($year,$month);
		if($i == 0 && $i != $month_cnt-1){ // 맨 앞에 월
			$tmp_day = date("j",strtotime($search_date1));
			for($day = $tmp_day; $day <= $last_day; $day++){
				if(strlen($day) == 1) $day_tmp = "0".$day;
				else $day_tmp = $day;
				$s_date[] = $year."-".$month_tmp."-".$day_tmp;
			}
		}elseif($i == 0 && $i == $month_cnt-1){ // 1개월 안으로
			$tmp_day1 = date("j",strtotime($search_date1));
			$tmp_day2 = date("j",strtotime($search_date2));
			for($day = $tmp_day1; $day <= $tmp_day2; $day++){
				if(strlen($day) == 1) $day_tmp = "0".$day;
				else $day_tmp = $day;
				$s_date[] = $year."-".$month_tmp."-".$day_tmp;
			}
		}else if($i == $month_cnt-1){ // 마지막 월
			$tmp_day = date("j",strtotime($search_date2));
			for($day = 1; $day <= $tmp_day; $day++){
				if(strlen($day) == 1) $day_tmp = "0".$day;
				else $day_tmp = $day;
				$s_date[] = $year."-".$month_tmp."-".$day_tmp;				
			}			
		}else{ // 1개월 안으로
			for($day = 1; $day <= $last_day; $day++){
				if(strlen($day) == 1) $day_tmp = "0".$day;
				else $day_tmp = $day;
				$s_date[] = $year."-".$month_tmp."-".$day_tmp;
			}
		}
	}
	return $s_date;
}


function week_find($date){
	$week = date("w",strtotime($date));

	switch($week){
		case "0" : $value = "SUN"; break;
		case "1" : $value = "MON"; break;
		case "2" : $value = "TUE"; break;
		case "3" : $value = "WED"; break;
		case "4" : $value = "THU"; break;
		case "5" : $value = "FRI"; break;
		case "6" : $value = "SAT"; break;
	}
	return $value;
}

function number_value($val){
	if($val == "" || $val == "0"){
		$str = "-";
	}else{
		$str = number_format($val);
	}
	return $str;
}

function number_1000($val){
	if($val == "" || $val == "0"){
		$str = "-";
	}else{
		$str = number_format($val/1000);
	}
	return $str;
}

function number_mil($val){
	if($val == "" || $val == "0"){
		$str = "-";
	}else{
		$str = number_format($val/1000000);
	}
	return $str;
}

function colchg($str,$tp){
	if($tp == "alpha"){
		switch($str){
			case "1" : $val = "A"; break;
			case "2" : $val = "B"; break;
			case "3" : $val = "C"; break;
			case "4" : $val = "D"; break;
			case "5" : $val = "E"; break;
			case "6" : $val = "F"; break;
			case "7" : $val = "G"; break;
			case "8" : $val = "H"; break;
			case "9" : $val = "I"; break;
			case "10" : $val = "J"; break;
			case "11" : $val = "K"; break;
			case "12" : $val = "L"; break;
			case "13" : $val = "M"; break;
			case "14" : $val = "N"; break;
			case "15" : $val = "O"; break;
			case "16" : $val = "P"; break;
			case "17" : $val = "Q"; break;
			case "18" : $val = "R"; break;
			case "19" : $val = "S"; break;
			case "20" : $val = "T"; break;
			case "21" : $val = "U"; break;
			case "22" : $val = "V"; break;
			case "23" : $val = "W"; break;
			case "24" : $val = "X"; break;
			case "25" : $val = "Y"; break;
			case "26" : $val = "Z"; break;
			case "27" : $val = "AA"; break;
			case "28" : $val = "AB"; break;
			case "29" : $val = "AC"; break;
			case "30" : $val = "AD"; break;
			case "31" : $val = "AE"; break;
			case "32" : $val = "AF"; break;
			case "33" : $val = "AG"; break;
			case "34" : $val = "AH"; break;
			case "35" : $val = "AI"; break;
			case "36" : $val = "AJ"; break;
			case "37" : $val = "AK"; break;
			case "38" : $val = "AL"; break;
			case "39" : $val = "AM"; break;
			case "40" : $val = "AN"; break;
			case "41" : $val = "AO"; break;
			case "42" : $val = "AP"; break;
			case "43" : $val = "AQ"; break;
			case "44" : $val = "AR"; break;
			case "45" : $val = "AS"; break;
			case "46" : $val = "AT"; break;
			case "47" : $val = "AU"; break;
			case "48" : $val = "AV"; break;
			case "49" : $val = "AW"; break;
			case "50" : $val = "AX"; break;
		}
	}
	if($tp == "number"){
		$str = strtoupper($str);
		switch($str){
			case "A" : $val = "1"; break;
			case "B" : $val = "2"; break;
			case "C" : $val = "3"; break;
			case "D" : $val = "4"; break;
			case "E" : $val = "5"; break;
			case "F" : $val = "6"; break;
			case "G" : $val = "7"; break;
			case "H" : $val = "8"; break;
			case "I" : $val = "9"; break;
			case "J" : $val = "10"; break;
			case "K" : $val = "11"; break;
			case "L" : $val = "12"; break;
			case "M" : $val = "13"; break;
			case "N" : $val = "14"; break;
			case "O" : $val = "15"; break;
			case "P" : $val = "16"; break;
			case "Q" : $val = "17"; break;
			case "R" : $val = "18"; break;
			case "S" : $val = "19"; break;
			case "T" : $val = "20"; break;
			case "U" : $val = "21"; break;
			case "V" : $val = "22"; break;
			case "W" : $val = "23"; break;
			case "X" : $val = "24"; break;
			case "Y" : $val = "25"; break;
			case "Z" : $val = "26"; break;
			case "AA" : $val = "27"; break;
			case "AB" : $val = "28"; break;
			case "AC" : $val = "29"; break;
			case "AD" : $val = "30"; break;
			case "AE" : $val = "31"; break;
			case "AF" : $val = "32"; break;
			case "AG" : $val = "33"; break;
			case "AH" : $val = "34"; break;
			case "AI" : $val = "35"; break;
			case "AJ" : $val = "36"; break;
			case "AK" : $val = "37"; break;
			case "AL" : $val = "38"; break;
			case "AM" : $val = "39"; break;
			case "AN" : $val = "40"; break;
			case "AO" : $val = "41"; break;
			case "AP" : $val = "42"; break;
			case "AQ" : $val = "43"; break;
			case "AR" : $val = "44"; break;
			case "AS" : $val = "45"; break;
			case "AT" : $val = "46"; break;
			case "AU" : $val = "47"; break;
			case "AV" : $val = "48"; break;
			case "AW" : $val = "49"; break;
			case "AX" : $val = "50"; break;
		}
	}
	return $val;
}


function col_name($num,$channel){
	global $connect;

	$sql = "select * from master_account where raw_channel = '$channel' limit 0, 1";
	$rs = mysql_query($sql,$connect);
	$data = mysql_fetch_array($rs);

	if($num == $data[account_sec]) $col_name = "백화점구분";
	if($num == $data[sale_date]) $col_name = "날짜";
	if($num == $data[sale_area]) $col_name = "지역";
	if($num == $data[sale_shop]) $col_name = "매장";
	if($num == $data[sale_shop_code]) $col_name = "매장코드";
	if($num == $data[sale_type]) $col_name = "매출유형";
	if($num == $data[sale_code]) $col_name = "상품판매코드";
	if($num == $data[sale_product_name]) $col_name = "상품명";
	if($num == $data[sale_cnt]) $col_name = "수량";
	if($num == $data[sale_amt]) $col_name = "기준금액";
	if($num == $data[sale_section]) $col_name = "판매구분";

	if($col_name != "") $col_name = " : ".$col_name;
	else $col_name = "";

	return $col_name;
}

// 프론트 페이징	
function paging($page_name,$page_query){
		global $page,$num_record,$paging_num_inpage,$paging_now_page;	 		
		$i = 1;
		
		if(($num_record % $paging_num_inpage) != 0)
			$num = (int)($num_record / $paging_num_inpage) + 1;
		else 
			$num = ($num_record / $paging_num_inpage);
		
		if(($page % 10) == 0){
			$now_sec = (int)($page/10);		
		}else{
			$now_sec = (int)($page/10) + 1;
		}
		
		if($num > $now_sec*10){
			$start = $now_sec*10-9;
			$last=$now_sec*10;
			if($now_sec != 1){
				$front_page=($now_sec-1)*10-9;
				echo " <a href='".$page_name."?page=1".$page_query."'><img src='../images/btn_pre_end.gif' alt='맨 처음으로' align='absmiddle' /></a> <a href='".$page_name."?page=$front_page".$page_query."'><img src='../images/btn_pre.gif' alt='이전' align='absmiddle' /></a> ";
			}else{
				echo "";
			}						
			while($start <= $last){
		   		if($start == $page){
					echo " <strong style='padding:3px 5px;border:1px solid #666;background-color:#999;color:#fff;font-size:14px'>".$start."</strong> ";
				}else{
					echo " <a href='".$page_name."?page=$start".$page_query."' style='padding:3px 5px;border:1px solid #999;background-color:#fff;font-size:14px'>".$start."</a> ";
				}	
				$start++;
			}
			if($now_sec >= 1 or ($now_sec*10) != $num){
				$back_page=$now_sec*10+1;
				echo " <a href='".$page_name."?page=$back_page".$page_query."'><img src='../images/btn_next.gif' alt='다음' align='absmiddle' /></a> <a href='".$page_name."?page=$num".$page_query."'><img src='../images/btn_next_end.gif' alt='맨 끝으로' align='absmiddle' /></a> ";
			}else{
				echo "";
			}		
		}elseif($num <= $now_sec*10){
			$start = $now_sec*10-9;
			$last=$num;
			if($now_sec != 1){
				$front_page=($now_sec-1)*10-9;
				echo " <a href='".$page_name."?page=1".$page_query."'><img src='../images/btn_pre_end.gif' alt='맨 처음으로' align='absmiddle' /></a> <a href='".$page_name."?page=$front_page".$page_query."'><img src='../images/btn_pre.gif' alt='이전' align='absmiddle' /></a> ";
			}else{
				echo "";
			}						
			while($start <= $last){
		   		if($start == $page){
					echo " <strong style='padding:3px 5px;border:1px solid #666;background-color:#999;color:#fff;font-size:14px'>".$start."</strong> ";
				}else{
					echo " <a href='".$page_name."?page=$start".$page_query."' style='padding:3px 5px;border:1px solid #999;background-color:#fff;font-size:14px'>".$start."</a> ";
				}	
				$start++;
			}			
				echo "";
		}
	}
###################################################################### 페이징 ############################################################################






########### Account 설정 ###############
function account_info($raw_channel,$str1,$str2){
	global $connect;

	if($raw_channel == "Direct DS"){
		$sql = "select channel, account1, account2 from master_account where raw_channel = 'Direct DS' and account_sec_txt = '$str1'";
	}else if($raw_channel == "Lotte DS"){
		$sql = "select channel, account1, account2 from master_account where raw_channel = 'Lotte DS'";
	}else if($raw_channel == "Emart"){
		$sql = "select account1 from master_account_area where account2 = 'Emart' and sale_shop = '$str2'";
		$account1 = mysql_result(mysql_query($sql,$connect),0,0);
		$sql = "select channel, account1, account2 from master_account where account1 = '$account1' and account2 = 'Emart'";
	}else if($raw_channel == "Online"){
		switch($str1){
			case "Naver" : $str1 = "Nshop"; break;
			case "Naver_Avent" : $str1 = "Nshop_Avent"; break;
			case "Wemakeprice_Avent1" : $str1 = "Wemakeprice_Avent"; break;
			case "Wemakeprice_Avent2" : $str1 = "Wemakeprice_Avent"; break;
			case "Homeplus_HC" : $str1 = "Homeplus"; break;
			case "Homeplus_HS" : $str1 = "Homeplus"; break;
		}
		$sql = "select channel, account1, account2 from master_account where raw_channel = 'Online' and account1 = '$str1'";
	}else{
		$sql = "select channel, account1, account2 from master_account where raw_channel = '$raw_channel'";
	}

	@$channel = mysql_result(mysql_query($sql,$connect),0,0);
	@$account1 = mysql_result(mysql_query($sql,$connect),0,1);
	@$account2 = mysql_result(mysql_query($sql,$connect),0,2);

	$account_info = array();
	$account_info["channel"] = $channel;
	$account_info["account1"] = $account1;
	$account_info["account2"] = $account2;

	return $account_info;
}


// 성장률
function gr($val1, $val2){
	$gr = @round(($val2/$val1 - 1) * 100,2);
	if($val2 > $val1 && $gr < 0) $gr = $gr * -1;
	if($gr < 0) {
		$gr = "<span style='color:#f00'>".$gr."%</span>";
	}else{
		$gr = $gr."%";
	}
	if($val1 == "" || $val2 == "") $gr = "-";
	return $gr;
}

// 성장률 소수점 제외
function gr_zero($val1, $val2){
	$gr = @round(($val2/$val1 - 1) * 100,0);
	if($val2 > $val1 && $gr < 0) $gr = $gr * -1;
	if($gr < 0) {
		$gr = "<span style='color:#f00'>".$gr."%</span>";
	}else{
		$gr = $gr."%";
	}
	if($val1 == "" || $val2 == "") $gr = "-";
	return $gr;
}

// 성장률 그래프용
function gr_graph($val1, $val2){
	$gr = @round(($val2/$val1 - 1) * 100,0);
	if($val2 > $val1 && $gr < 0) $gr = $gr * -1;

	if($val1 == "" || $val2 == "") $gr = "0";

	return $gr;
}

//영문 월
function month_eng($num){
	switch($num){
		case "1" : $eng = "Jan"; break;
		case "2" : $eng = "Feb"; break;
		case "3" : $eng = "Mar"; break;
		case "4" : $eng = "Apr"; break;
		case "5" : $eng = "May"; break;
		case "6" : $eng = "Jun"; break;
		case "7" : $eng = "Jul"; break;
		case "8" : $eng = "Aug"; break;
		case "9" : $eng = "Sep"; break;
		case "10" : $eng = "Oct"; break;
		case "11" : $eng = "Nov"; break;
		case "12" : $eng = "Dec"; break;
	}
	return $eng;
}

//channel
$basic_channel_arr = array();
$basic_channel_arr[] = "Department Store";
$basic_channel_arr[] = "Electronics Specialist";
$basic_channel_arr[] = "Mass Merchant";
$basic_channel_arr[] = "Online";
//$basic_channel_arr[] = "MCC";
//$basic_channel_arr[] = "H&B";

//channel 일반 순서
$normal_channel_arr = array();
$normal_channel_arr[] = "Department Store";
$normal_channel_arr[] = "Electronics Specialist";
$normal_channel_arr[] = "Mass Merchant";
$normal_channel_arr[] = "Online";
$normal_channel_arr[] = "MCC";
$normal_channel_arr[] = "H&B";


//category bg
$basic_bg_arr = array();
$basic_bg_arr[] = "PC";
$basic_bg_arr[] = "DA";
$basic_bg_arr[] = "Coffee";
$basic_bg_arr[] = "H&W";
$basic_bg_arr[] = "S&RC";


//bu 순서
$align_bu_arr["PC"][] = "MG";
$align_bu_arr["PC"][] = "BT";
$align_bu_arr["DA"][] = "KA";
$align_bu_arr["DA"][] = "GC";
$align_bu_arr["DA"][] = "FC";
$align_bu_arr["Coffee"][] = "Espresso";
$align_bu_arr["Coffee"][] = "R&G";
$align_bu_arr["H&W"][] = "OHC";
$align_bu_arr["H&W"][] = "M&CC";
$align_bu_arr["H&W"][] = "H&W Und.";
$align_bu_arr[S&RC][] = "HSS";


//category bu
$basic_bu_arr = array();
$basic_bu_arr[] = "MG";
$basic_bu_arr[] = "BT";
$basic_bu_arr[] = "KA";
$basic_bu_arr[] = "GC";
$basic_bu_arr[] = "FC";
$basic_bu_arr[] = "Espresso";
$basic_bu_arr[] = "R&G";
$basic_bu_arr[] = "OHC";
//$basic_bu_arr[] = "M&CC";
//$basic_bu_arr[] = "H&W Und.";
//$basic_bu_arr[] = "HSS";

//channel short 써머리
$short_channel_arr = array();
$short_channel_arr[] = "Department Store";
$short_channel_arr[] = "Electronics Specialist";
$short_channel_arr[] = "Mass Merchant";
$short_channel_arr[] = "Online";
//$short_channel_arr[] = "New Channel";

//channel short conv
$short_channel_conv["Department Store"] = "Department Store";
$short_channel_conv["Electronics Specialist"] = "Electronics Specialist";
$short_channel_conv["Mass Merchant"] = "Mass Merchant";
$short_channel_conv["Online"] = "Online";
$short_channel_conv["MCC"] = "New Channel";
$short_channel_conv["H&B"] = "New Channel";

//channel short name conv
$short_name_channel_conv["Department Store"] = "DS";
$short_name_channel_conv["Electronics Specialist"] = "ES";
$short_name_channel_conv["Mass Merchant"] = "MM";
$short_name_channel_conv["Online"] = "Online";
$short_name_channel_conv["MCC"] = "MCC";
$short_name_channel_conv["H&B"] = "H&B";


//account 순서
function account_align($channel,$account){
	if($channel == "Department Store"){
		switch($account){
			case "롯데백화점" : $align = "0"; break;
			case "현대백화점" : $align = "1"; break;
			case "신세계백화점" : $align = "2"; break;
			case "DS Others" : $align = "3"; break;
		}
	}
	if($channel == "Electronics Specialist"){
		switch($account){
			case "Hi Mart" : $align = "0"; break;
			case "ET Land" : $align = "1"; break;
		}
	}
	if($channel == "Mass Merchant"){
		switch($account){
			case "Emart" : $align = "0"; break;
			case "Homeplus" : $align = "1"; break;
		}
	}

	return $align;
}
?>