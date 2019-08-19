<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>06_array</title>
</head>
<body>
<h1>06_array</h1>
<?
    $a = [111,222,333,444];  ///배열의 선언
    ///    0,  1 , 2,  3
    
    $a[1] = 2345;   ///배열 원소 대입
    
    echo "$a<br>";  ///배열 호출
    echo "$a[1]<br>";  ///배열원소 호출
    echo "$a[3]<br>";  ///배열원소 호출
    echo "$a[4]<br>";  ///배열원소 호출
    
    $a[4] = 4040;
    echo "$a[4]<br>";  ///배열원소 호출
    
    $a[] = 5050;   ///배열 원소 추가
    echo "$a[5]<br>";  ///배열원소 호출
    
    //remove($a[4]);
    
    echo sizeof($a)."<br>";
    
    for($i =0 ; $i < sizeof($a) ; $i++){
        echo "$i : $a[$i] <br>";
    }
    
    echo "-------------------<br>";
    
    foreach($a as $i => $e){
        echo "$i : $e <br>";
    }
    
?>    
</body>
</html>














