<?
include_once "../common/config.php";
include_once "../common/dbconn.php";

$id = $_POST["id"];
$bg = $_POST["bg"];
$bg_disc = $_POST["bg_disc"];
$bu = $_POST["bu"];
$bu_disc = $_POST["bu_disc"];
$mag = $_POST["mag"];
$mag_disc = $_POST["mag_disc"];
$ag = $_POST["ag"];
$ag_disc = $_POST["ag_disc"];
$model_name = addslashes(trim($_POST["model_name"]));
$nc = addslashes(trim($_POST["nc"]));
$lrrp = str_replace(",","",addslashes(trim($_POST["lrrp"])));

$sql = "update master_product set
		bg = '".$bg."',
		bg_disc = '".$bg_disc."',
		bu = '".$bu."',
		bu_disc = '".$bu_disc."',
		mag = '".$mag."',
		mag_disc = '".$mag_disc."',
		ag = '".$ag."',
		ag_disc = '".$ag_disc."',
		model_name = '".$model_name."',
		nc = '".$nc."',
		lrrp = '".$lrrp."',
		editdate = now()
		where idx = '".$id."'";
$rs = mysql_query($sql,$connect);

if($rs){
	echo "<script>alert('수정 완료'); history.go(-1);</script>";
}else{
	echo $sql;
}
?>