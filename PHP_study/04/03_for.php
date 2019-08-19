<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>03_for</title>
</head>
<body>
    <h1>03_for</h1>
<?
    $i=5;
    
    $sum = 0;
    for($i = 0 ; $i<=10 ; $i++){
        //초기값;  조건   ; 증감
        
        //$sum = $sum + $i;
        $sum += $i;
        echo "for문 이다 $i, $sum<br>";
    }
    
    
    echo "for문 종료 $i, $sum<br>";
    
    
    /// 1 -> 100 짝수들의 합
    
    $sum = 0;
    for($i = 1 ; $i<=100 ; $i++){
        //초기값;  조건   ; 증감
        
        if($i%2==0){
            $sum += $i;
        }
        echo "for문 이다 $i, $sum<br>";
    }
    
    
    echo "for문 종료 $i, $sum<br>";
    
    echo "-------------------------------<br>";
     $sum = 0;
    for($i = 0 ; $i<=100 ; $i+=2){
        //초기값;  조건   ; 증감
        $sum += $i;
        echo "$i, $sum<br>";
    }
    
    
    echo "for문 종료 $i, $sum<br>";
    
    echo "-------------------------------<br>";
     $sum = 0;
    for($i = 1 ; $i<=100 ; $i+=2){
        //초기값;  조건   ; 증감
        
        $i += $i%2;
        
        $sum += $i;
        echo "$i, $sum<br>";
    }
    
    
    echo "for문 종료 $i, $sum<br>";
    
    echo "-------------------------------<br>";
     $sum = 0;
    for($i = 1 ; $i*2<=100 ; $i++){
        //초기값;  조건   ; 증감
        
        $sum += $i*2;
        echo "$i, $sum<br>";
    }
    
    
    echo "for문 종료 $i, $sum<br>";
    
?>    
</body>
</html>


















