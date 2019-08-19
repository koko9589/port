<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>04_arrayFunc</title>
</head>
<body>
    <h1>04_arrayFunc</h1>
<?
    $arr1 = [13,45,67,345,21,7,65,13,21,89];
    
    echo implode(",", $arr1) . "<br>";
    
    sort($arr1);
    echo implode(",", $arr1) . "<br>";
    
    shuffle($arr1);
    echo implode(",", $arr1) . "<br>";
    
    $arr2 = array_reverse($arr1);
    echo implode(",", $arr2) . "<br>";
    
    rsort($arr1);
    echo implode(",", $arr1) . "<br>";
    
    function arrPrint($keyArr){
        foreach($keyArr as $k => $v){
            echo "$k=>$v ,";
        }
        echo "<br>";
    }
    
    $arr3 = ['red' => '빨강', 'blue' => '파랑', 'yellow' =>'노랑','blue'=>'청색'
             ,'green'=>'초록'];
    //echo implode(",", $arr3) . "<br>";
    arrPrint($arr3);
    //sort($arr3);
    ksort($arr3);
    arrPrint($arr3);
    asort($arr3);
    arrPrint($arr3);
    krsort($arr3);
    arrPrint($arr3);
    arsort($arr3);
    arrPrint($arr3);
    $arrK = array_keys($arr3);
    echo implode(",", $arrK) . "<br>";
    $arrV = array_values($arr3);
    echo implode(",", $arrV) . "<br>";
?>    
</body>
</html>