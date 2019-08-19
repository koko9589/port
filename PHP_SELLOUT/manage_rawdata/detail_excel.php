<?
include_once "../common/config.php";
include_once "../common/dbconn.php";
$times = $_GET[times];

$sql = "select file_name from raw_title where times = '$times'";
@$file_name = mysql_result(mysql_query($sql,$connect),0,0);

header( "Content-type: application/vnd.ms-excel;charset=KSC5601" );
header( "Content-Disposition: attachment; filename=".$file_name );
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
<?=$file_name?>
<table>
			<tr>
				<th>Channel</th>
				<th>Account1</th>
				<th>Account2</th>
				<th>Year</th>
				<th>Month</th>
				<th>Week</th>
				<th>Day</th>
				<th>지역</th>
				<th>매장</th>
				<th>매장코드</th>
				<th>판매구분</th>
				<th>운영형태</th>
				<th>점등급</th>
				<th>Qty</th>
				<th>Amount</th>
				<th>BG</th>
				<th>BG Disc</th>
				<th>BU</th>
				<th>BU Disc</th>
				<th>MAG</th>
				<th>MAG Disc</th>
				<th>AG</th>
				<th>AG Disc</th>
				<th>공통 Material</th>
				<th>공통 Model</th>
			</tr>
<?
$sql = "select * from raw_use where times = '$times'";
$rs = mysql_query($sql,$connect);
while($data = mysql_fetch_array($rs)){
?>
			<tr>
				<td><?=$data[channel]?></td>
				<td><?=$data[account1]?></td>
				<td><?=$data[account2]?></td>
				<td><?=$data[sale_year]?></td>
				<td><?=$data[sale_month]?></td>
				<td><?=$data[sale_week]?></td>
				<td><?=$data[sale_date]?></td>
				<td><?=$data[sale_area]?></td>
				<td><?=$data[sale_shop]?></td>
				<td><?=$data[sale_shop_code]?></td>
				<td><?=$data[sale_section]?></td>
				<td><?=$data[oper_mode]?></td>
				<td><?=$data[sale_level]?></td>
				<td><?=number_format($data[sale_cnt])?></td>
				<td><?=number_format($data[sale_amt])?></td>
				<td>="<?=$data[bg]?>"</td>
				<td><?=$data[bg_disc]?></td>
				<td>="<?=$data[bu]?>"</td>
				<td><?=$data[bu_disc]?></td>
				<td>="<?=$data[mag]?>"</td>
				<td><?=$data[mag_disc]?></td>
				<td>="<?=$data[ag]?>"</td>
				<td><?=$data[ag_disc]?></td>
				<td>="<?=$data[nc]?>"</td>
				<td><?=$data[model_name]?></td>
			</tr>
<?
}
?>
		</table>
</body>
</html>
