<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>05_arrayBaseBall</title>
</head>
<body>
    <h1>05_arrayBaseBall</h1>
<?
    $hit = '2,4,7,8,1,2,4,7,4,7,8,1,7,5';
    $arr = explode(',', $hit);
    $res = [];
    foreach($arr as $i){
        //echo "$i<br>";
        if( isset($res[$i]) )
            $res[$i]++;
        else
            $res[$i] = 1;
    }
    
    
    foreach($res as $i => $v){
        echo "$i => $v<br>";
    }
?>
</body>
</html>