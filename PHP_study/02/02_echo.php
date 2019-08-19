<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_echo</title>
</head>
<body>
    <h1>02_echo</h1>
<?
    $a = 123;
    $str = "아기상어 $a <br> 뚜루루뚜루 <br>";
    echo $str;
    
    $str2 = '아기상어 $a <br> 뚜루루뚜루 <br>';
    echo $str2;
    
    
    //// . 문자열 결합 연산자
    $str3 = '아기상어 ' . $a .' <br> 뚜루루뚜루 <br>';
    echo $str3;
    
    
    $name1 = "장서건";
    $name2 = "정좌성";
?>

<table border="">
    <tr>
        <td>이름</td>
        <td>나이</td>
    </tr>
    <tr>
        <td><? echo $name1; ?></td>
        <td><? echo 30+12; ?></td>
    </tr>
    <tr>
        <td><?=$name2?></td>
        <td><?=20+17 ?></td>
    </tr>
</table>    
        
                
</body>
</html>










