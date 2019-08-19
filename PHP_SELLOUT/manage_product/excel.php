<?
include_once "../common/config.php";
include_once "../common/dbconn.php";

header( "Content-type: application/vnd.ms-excel;charset=KSC5601" );
header( "Content-Disposition: attachment; filename=Product_master.xls" );
header( "Content-Description: Gamza Excel Data" );
header( "Content-charset=euc-kr" );
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
				<th>BG</th>
				<th>BG_Disc</th>
				<th>BU</th>
				<th>BU_Disc</th>
				<th>MAG</th>
				<th>MAG_Disc</th>
				<th>AG</th>
				<th>AG_Disc</th>
				<th>Model Name</th>
				<th>12NC</th>
				<th>LRRP</th>
				<th>등록일</th>
				<th>수정일</th>
			</tr>
<?
$sql = "select * from master_product where del != 'Y' order by model_name asc";
$rs = mysql_query($sql,$connect);
while($data = mysql_fetch_array($rs)){
?>
			<tr>
				<td width="100">="<?=$data[bg]?>"</td>
				<td><?=$data[bg_disc]?></td>
				<td width="120">="<?=$data[bu]?>"</td>
				<td><?=$data[bu_disc]?></td>
				<td width="120">="<?=$data[mag]?>"</td>
				<td><?=$data[mag_disc]?></td>
				<td width="120">="<?=$data[ag]?>"</td>
				<td><?=$data[ag_disc]?></td>
				<td><?=$data[model_name]?></td>
				<td width="120">="<?=$data[nc]?>"</td>
				<td style="text-align:right;"><?=number_format($data[lrrp])?></td>
				<td><?=$data[adddate]?></td>
				<td><? if($data[editdate] != "0000-00-00") echo $data[editdate]; ?></td>
			</tr>
<?
}
?>
		</table>
</body>
</html>
