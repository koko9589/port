<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_str2</title>
</head>
<body>
    <h1>01_str2</h1>
<?
    $ttt = 'asdf aqw AA 그린 컴퓨 그린';
    ///     0123
    echo $ttt[2]. "<br>";
    $ttt[2] = 'k';
    echo $ttt. "<br>";
    
    $newTT = str_replace('a','하나',$ttt);
    echo $ttt. "<br>";
    echo $newTT. "<br>";
    
    $newiTT = str_ireplace('a','하나',$ttt);
    echo $newiTT. "<br>";
    
    $rrr = str_repeat('보라돌이',5);
    echo $rrr. "<br>";
    
    $line = '아기상어 \n뚜루루뚜루\n귀여운\n뚜루루뚜루';
    echo $line. "<br>";
    $line2 = "아기상어 \n뚜루루뚜루\n귀여운\n뚜루루뚜루";
    echo $line2. "<br>";
    $line3 = str_replace("\n",'<br>',$line2);
    echo $line3. "<br>";
    $line4 = nl2br($line2);
    echo $line4. "<br>";
    
    $names = '이효리,한가인,김태희,김혜수';
    $nameArr = explode(',', $names);
    
    echo $names."<br>";
    //echo $nameArr."<br>";
    
    foreach($nameArr as $nn){
        echo "$nn <br>";
    }
    
    $numArr = [111,22,444,77,33,555,22];
    $nums = implode('_',$numArr);
    
    echo "$nums<br>";
    
    
?>
</body>
</html>