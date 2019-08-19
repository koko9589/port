<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>주민번호</title>
</head>
<body>
    <h1>주민번호</h1>
    <form action="">
        <input type="text" name="jumin">
        <input type="submit" value="입력">
    </form>
    
<?
    extract($_REQUEST);
    
    if( isset($jumin) ){
        
        //910320-8234567
        echo "주민번호 : $jumin<br>"; 
        
        $p = $jumin[7];
        
        echo "성별:" . substr("여남" , $p%2*3, 3) . "<br>";
        
        echo "국적:" . substr("내외" , ($p-$p%5)/5*3, 3) . "국인<br>";
        
        $yy = ($p-1)%4;
        $yy-=$yy%2;
        $yy = $yy/2+19;
        
        echo "생년월일:". $yy . substr($jumin,0,2)."년". substr($jumin,2,2)."월". substr($jumin,4,2)."일<br>";
    }else{
        
        echo "입력된 주민번호가 없습니다.<br>";   
    }
?>
    
</body>
</html>