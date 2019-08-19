<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_arrFunc3</title>
</head>
<body>
    <h1>02_arrFunc3</h1>
    <?
    $arr = [1111,2222,3333,4444,5555,6666];
    
    $en = each($arr);
    echo  "$en[0] : $en[1] <br>";
    
    $en = each($arr);
    echo  "$en[0] : $en[1] <br>";
    
    list($k, $v) = each($arr);
    echo  "each $k : $v <br>";
    
    $curr = current($arr);
    echo  "$curr <br>";
    
    $en = next($arr);   /// 다음으로 이동 -> 리턴이 없다
    echo  "$en[0] : $en[1] <br>";
    
    
    $kk = key($arr);
    $curr = current($arr);
    echo  "next $kk : $curr <br>";
    
    prev($arr);  /// 뒤로 이동 -> 리턴이 없다
    
    $kk = key($arr);
    $curr = current($arr);
    echo  "prev $kk : $curr <br>";
    
    
    reset($arr);  /// 초기화 맨 앞으로 이동 -> 리턴이 없다
    
    $kk = key($arr);
    $curr = current($arr);
    echo  "reset $kk : $curr <br>";
    
    end($arr);  /// 맨 뒤로 이동 -> 리턴이 없다
    
    $kk = key($arr);
    $curr = current($arr);
    echo  "end $kk : $curr <br>";
    
    $arr2 = [100,200,300];
    list($a, $b, $c) = $arr2;
    
    echo "$a, $b, $c <br>";
    
    array_push($arr2, 1234);
    
    echo implode(",",$arr2) . "<br>";
    
    $vv = array_pop($arr2);
    echo implode(",",$arr2) . "<br>";
    echo "$vv<br>";
    
    array_unshift($arr2,3456);
    echo implode(",",$arr2) . "<br>";
    
    $vv = array_shift($arr2);
    echo implode(",",$arr2) . "<br>";
    echo "$vv<br>";
    
    $arr3 = [200,300,400,500];
    
    $arr4 = array_merge($arr2, $arr3);
     echo implode(",",$arr4) . "<br>";
    
    $arr5 = $arr2 + $arr3;
     echo implode(",",$arr5) . "<br>";
    
    //100,200,300,200,300,400,500
    $arr6 = array_slice($arr4,2,4);
    echo implode(",",$arr6) . "<br>";
    
    $arr7 = array_unique($arr4);
    echo implode(",",$arr7) . "<br>";
    
    $arr8 = array_pad($arr7,10,1111);
    echo implode(",",$arr8) . "<br>";
    
    echo implode(",",$arr4) . "<br>";
    
    $res = in_array(400, $arr4);
    echo "in_array : $res <br>";
    
    $res = array_search(400, $arr4);
    echo "array_search : $res <br>";
    
    ?>
</body>
</html>