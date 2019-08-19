<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_arrGall</title>
</head>
<body>
    <h1>01_arrGall</h1>
    
<?
    $arr = ['aaa','bbb','ccc','ddd','eee','fff'];
    
    foreach($arr as $i => $v){
?>
<?=$i?><img src="../fff/<?=$v?>.jpg" width="200px" alt="">
<? } ?>    
</body>
</html>