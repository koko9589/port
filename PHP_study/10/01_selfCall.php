<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_selfCall</title>
</head>
<body>
    <h1>01_selfCall</h1>
<?
    $GLOBALS['pre'] = "";
   
   
    function fn($i){
       
       $my = $GLOBALS['pre'];
       $GLOBALS['pre'] .= "&nbsp;&nbsp;&nbsp;";
       
       $i -= $i%2;
        
       $res = $i;
       
       echo "$my fn( $i ) 시작 $res <br>";
       
       if($i>0)
         $res += fn($i-2);    //증감
       
       echo "$my fn( $i ) 끝 $res <br>";
       
       return $res;
    } 
    
    $rr = fn(9);  //초기값
    
    echo "\$rr : $rr <br>";
    
    
    //// 숫자 입력시 0-> 숫자까지 짝수들의 합을 구하세요
    
?>    
</body>
</html>