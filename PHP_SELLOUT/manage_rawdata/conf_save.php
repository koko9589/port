<?
include_once "../common/config.php";
include_once "../common/dbconn.php";

$title_row = $_POST[title_row];
$start_row = $_POST[start_row];
$account_sec = colchg(trim($_POST[account_sec]),"number");
$sale_date = trim($_POST[sale_date]);
if($sale_date != "none") $sale_date = colchg($sale_date,"number");
$sale_area = colchg(trim($_POST[sale_area]),"number");
$sale_shop = colchg(trim($_POST[sale_shop]),"number");
$sale_shop_code = colchg(trim($_POST[sale_shop_code]),"number");
$sale_type = colchg(trim($_POST[sale_type]),"number");
$sale_code = colchg(trim($_POST[sale_code]),"number");
$sale_product_name = colchg(trim($_POST[sale_product_name]),"number");
$sale_cnt = colchg(trim($_POST[sale_cnt]),"number");
$sale_amt = trim($_POST[sale_amt]);
if($sale_amt != "LRRP") $sale_amt = colchg($sale_amt,"number");
$sale_section = colchg(trim($_POST[sale_section]),"number");
$raw_channel = addslashes(trim($_POST[raw_channel]));

$sql = "update master_account set
		title_row = '$title_row',
		start_row = '$start_row',
		account_sec = '$account_sec',
		sale_date = '$sale_date',
		sale_area = '$sale_area',
		sale_shop = '$sale_shop',
		sale_shop_code = '$sale_shop_code',
		sale_type = '$sale_type',
		sale_code = '$sale_code',
		sale_product_name = '$sale_product_name',
		sale_cnt = '$sale_cnt',
		sale_amt = '$sale_amt',
		sale_section = '$sale_section'
		where raw_channel = '$raw_channel'";
$rs = mysql_query($sql,$connect);

if($rs){
	echo "<script>alert('수정 완료'); history.go(-1);</script>";
}else{
	echo $sql;
}
?>