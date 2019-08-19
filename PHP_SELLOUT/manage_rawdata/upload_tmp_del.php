<?
include_once "../common/config.php";
include_once "../common/dbconn.php";

$times = $_GET[times];
$channel = $_GET[channel];

$sql = "delete from raw_origin_tmp where times = '$times'";
$rs = mysql_query($sql,$connect);

$sql = "delete from raw_title where times = '$times'";
$rs = mysql_query($sql,$connect);

if($rs){
	echo "<script>alert('삭제 완료'); history.go(-2);</script>";
}else{
	echo $sql;
}
?>