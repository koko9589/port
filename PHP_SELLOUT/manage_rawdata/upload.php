<?
include_once "../common/config.php";
include_once "../common/dbconn.php";

require_once '../../phpExcelReader/Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();

$times = time();
$s_date = $_POST[s_date];
$channel = $_POST[channel];

$sql = "select start_row, title_row from master_account where raw_channel = '$channel'";
@$start_row = mysql_result(mysql_query($sql,$connect),0,0);
@$title_row = mysql_result(mysql_query($sql,$connect),0,1);


$file_name = $_FILES["xlsfile"]["name"];
if($file_name == ""){
	echo "<script>history.go(-1);</script>";
	exit;
}
$file_tmp = $_FILES["xlsfile"]["tmp_name"];
$tmp_xls = "sale_".time().".xls"; 

if($_FILES["xlsfile"]["type"] != "application/vnd.ms-excel" && $_FILES["xlsfile"]["type"] != "application/octet-stream" && $_FILES["xlsfile"]["type"] != "application/haansoftxls"){
	echo "<script>alert('업로드 불가한 파일입니다.');history.go(-1);</script>";
	exit;
}

$sql = "select count(idx) from raw_title where file_name = '".$file_name."' and channel = '$channel' and setdate = '$s_date'";
@$file_exist = mysql_result(mysql_query($sql,$connect),0,0);
if($file_exist > 0){
	echo "<script>alert('이미 업로드한 파일입니다.');history.go(-1);</script>";
	exit;
}

copy($file_tmp,"xls/".$tmp_xls); //csv 파일을 현재 디렉토리에 저장 시킨다 

// 여기 이부분에서 euc-kr 을 넣어 주면 한글을 이용할 수 있다.
$data->setOutputEncoding('euc-kr');
$data->setOutputEncoding('CP949');
$data->read("xls/".$tmp_xls);
error_reporting(E_ALL ^ E_NOTICE);

?>
<style>
th, td {font-size:12px;}
</style>
<?
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	
	if($i == $title_row){
		for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
			$arr_name = trim($data->sheets[0]['cells'][$i][$j]);
			$col[$j] = str_clear($arr_name);
		}
		
		$sql = "insert into raw_title set
				times = '$times',
				file_name = '$file_name',
				channel = '$channel',
				setdate = '$s_date',
				col1 = '$col[1]',col2 = '$col[2]',col3 = '$col[3]',col4 = '$col[4]',col5 = '$col[5]',col6 = '$col[6]',col7 = '$col[7]',col8 = '$col[8]',col9 = '$col[9]',col10 = '$col[10]',
				col11 = '$col[11]',col12 = '$col[12]',col13 = '$col[13]',col14 = '$col[14]',col15 = '$col[15]',col16 = '$col[16]',col17 = '$col[17]',col18 = '$col[18]',col19 = '$col[19]',col20 = '$col[20]',
				col21 = '$col[21]',col22 = '$col[22]',col23 = '$col[23]',col24 = '$col[24]',col25 = '$col[25]',col26 = '$col[26]',col27 = '$col[27]',col28 = '$col[28]',col29 = '$col[29]',col30 = '$col[30]',
				col31 = '$col[31]',col32 = '$col[32]',col33 = '$col[33]',col34 = '$col[34]',col35 = '$col[35]',col36 = '$col[36]',col37 = '$col[37]',col38 = '$col[38]',col39 = '$col[39]',col40 = '$col[40]',
				col41 = '$col[41]',col42 = '$col[42]',col43 = '$col[43]',col44 = '$col[44]',col45 = '$col[45]',col46 = '$col[46]',col47 = '$col[47]',col48 = '$col[48]',col49 = '$col[49]',col50 = '$col[50]',
				regdate = now()";
		mysql_query($sql,$connect);
	}

	if($i >= $start_row){
		for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
			$arr_name = trim($data->sheets[0]['cells'][$i][$j]);
			$col[$j] = str_clear($arr_name);
		}
		if($col[1] != "" || $col[2] != "" || $col[3] != "" || $col[4] != "" || $col[5] != ""){
			if($col[1] != "총합계" && $col[1] != "일합계" && $col[2] != "점합계" && $col[1] != "소계" && $col[1] != "합 계"){ 
				$sql = "insert into raw_origin_tmp set
						times = '$times',
						file_name = '$file_name',
						channel = '$channel',
						setdate = '$s_date',
						col1 = '$col[1]',col2 = '$col[2]',col3 = '$col[3]',col4 = '$col[4]',col5 = '$col[5]',col6 = '$col[6]',col7 = '$col[7]',col8 = '$col[8]',col9 = '$col[9]',col10 = '$col[10]',
						col11 = '$col[11]',col12 = '$col[12]',col13 = '$col[13]',col14 = '$col[14]',col15 = '$col[15]',col16 = '$col[16]',col17 = '$col[17]',col18 = '$col[18]',col19 = '$col[19]',col20 = '$col[20]',
						col21 = '$col[21]',col22 = '$col[22]',col23 = '$col[23]',col24 = '$col[24]',col25 = '$col[25]',col26 = '$col[26]',col27 = '$col[27]',col28 = '$col[28]',col29 = '$col[29]',col30 = '$col[30]',
						col31 = '$col[31]',col32 = '$col[32]',col33 = '$col[33]',col34 = '$col[34]',col35 = '$col[35]',col36 = '$col[36]',col37 = '$col[37]',col38 = '$col[38]',col39 = '$col[39]',col40 = '$col[40]',
						col41 = '$col[41]',col42 = '$col[42]',col43 = '$col[43]',col44 = '$col[44]',col45 = '$col[45]',col46 = '$col[46]',col47 = '$col[47]',col48 = '$col[48]',col49 = '$col[49]',col50 = '$col[50]',
						regdate = now()";
				mysql_query($sql,$connect);
			}
		}		
	}
}
@unlink("xls/".$tmp_xls);
?>
<script>location.replace("upload_pre.html?times=<?=$times?>");</script>