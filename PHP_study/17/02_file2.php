<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_file2</title>
</head>
<body>
    <h1>02_file2</h1>
<?
$dd1 = file_get_contents('../src/aaa.txt');    
file_put_contents('../dst/aaa_1.txt', $dd1);
    
$ss = filesize('../src/aaa.txt');    
$ff = fopen('../src/aaa.txt','r');
$dd2 = fread($ff, $ss);    
fclose($ff);
    

$ff = fopen('../dst/aaa_2.txt','w');
fwrite($ff, $dd2);    
fclose($ff);
    
////////////////////////////////////////////////////////////////////
$dd1 = file_get_contents('../src/aaa.jpg');    
file_put_contents('../dst/aaa_1.jpg', $dd1);
//echo $dd1;
    
$ss = filesize('../src/aaa.jpg');    
$ff = fopen('../src/aaa.jpg','r');
$dd2 = fread($ff, $ss);    
fclose($ff);
    
//echo $dd2;
$ff = fopen('../dst/aaa_2.jpg','w');
fwrite($ff, $dd2);    
fclose($ff);    
?>    
    
</body>
</html>