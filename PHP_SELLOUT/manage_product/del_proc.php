<?
include_once "../common/config.php";
include_once "../common/dbconn.php";

$id = $_POST["id"];

$sql = "update master_product set del = 'Y', deldate = now() where idx = '".$id."'";
$rs = mysql_query($sql,$connect);

if($rs){
	echo "<script>alert('삭제 완료'); history.go(-1);</script>";
}else{
	echo $sql;
}
?>