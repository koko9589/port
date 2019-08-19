<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_time</title>
</head>
<body>
<h1>01_time</h1>
<?
   echo "현재 timestamp : " . time() ." -> " . (time()/(60*60*24*365)+1970)  . "<br>";
    
   $birth = mktime(5,15,20,30,4,2013); 
   echo "생일 timestamp : " . $birth ." -> " . ($birth/(60*60*24*365)+1970)  . "<br>";
    
    
    echo "오늘 : " . date('Y-m-d (D)') . "<br>";
    echo "생일 : " . date('y-M-j (w)' , $birth) . "<br>";
    echo "시간 : " . date('a H:i:s') . "<br>";
    echo "생일시간 : " . date('A h:i:s') . "<br>";
    
    
    //  18 年 jun 17일 (月) 20:15:46  ---->  현재시간을 이 형태로 출력하세요
    
    
    $ddStr = date('y 年 M d일 (');
    
    $ddStr .= substr('日月火水木金土', date('w')*3, 3);
    
    $ddStr .= date(') H:i:s');
    echo $ddStr . "<br>";
    
    
    
?>
</body>
</html>