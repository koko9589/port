<?
include_once "../common/config.php";
include_once "../common/dbconn.php";
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="euc-kr">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="../common/style.css">
<style>
*{margin:0;padding:0}
body, div{font-size:12px;}
a{font-size:12px;font-weight:bold;color:#333;text-decoration:none;}
.container{padding:30px 0 0 30px;}
.menu{position:fixed;top:0;left:0;width:250px;z-index:1000;background-color:#eee;border:2px solid #999; border-left:none; border-radius:0 0 20px 0;}
.menu a{display:block;margin-bottom:1px;padding-left:25px;height:50px;line-height:45px;border-bottom:1px solid #ddd;}
.menu a.tab{padding-left:50px;color:#666;font-weight:normal;}
#menu_show_btn {position:fixed;top:140px;left:252px;z-index:1000;}
#menu_hide {position:fixed;top:140px;left:0;z-index:1000;}


h1 { padding:8px 8px; margin-bottom:10px; background-color:#666; box-shadow: 0px 3px 3px #ccc; color:#fff;font:bold normal 14px "klavika-web", "Helvetica Neue", Helvetica, Arial, Geneva, sans-serif; }
h2 { padding-left:30px;font:bold normal 14px "klavika-web", "Helvetica Neue", Helvetica, Arial, Geneva, sans-serif; }
</style>

<title>Sell Out Report</title>
<script>
function num_chk(str){
	if(str) {
		for(var i=0; i<str.length; i++){
			var chr = str.substr(i,1);
			if(chr < '0' || chr > '9'){
				return false;
			}
		}
		return true;
	}
}

function char_chk(str){
	if(str) {
		for(var i=0; i<str.length; i++){
			var chr = str.substr(i,1);
			if(chr < 'A' || chr > 'z'){
				return false;
			}
		}
		return true;
	}
}

function str_trim(str){
      return str.replace(/\s/g, "");
}
</script>
</head>