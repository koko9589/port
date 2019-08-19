<?
$con_ip = $_SERVER["REMOTE_ADDR"];
if(substr($con_ip,0,11) != "165.225.116" && substr($con_ip,0,11) != "165.225.112" && $con_ip != "218.154.1.50") exit;

$connect_cl = mysql_connect("localhost","philipscl","zubu7693") or die("sql not connect!");
mysql_select_db("philipscl");
mysql_query('set names euckr');

$connect = mysql_connect("localhost","philipssellout","zubu7693") or die("sql not connect!");
mysql_select_db("philipssellout");
mysql_query('set names euckr');
?>