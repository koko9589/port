<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>03_keyArray</title>
</head>
<body>
    <h1>03_keyArray</h1>
<?
    $arr1 = ['red'=>"빨강", 'green'=>'초록','blue'=>'파랑',
            0 => '영이다', 3=>'사미다','green'=>'녹색'];   
    
    echo $arr1['red'] . "<br>";
    echo $arr1[0] . "<br>";
    echo $arr1['green'] . "<br>";
    
    echo "---------------------<br>";
    for($i =0; $i <sizeof($arr1); $i++){
        echo  "$i : $arr1[$i]<br>";
    }
    
    echo "---------------------<br>";
    
    $arr1['pink'] = '분홍';
    
    foreach($arr1 as $k => $v){
        echo  " $k : $v<br>";
    }
?>    
</body>
</html>










