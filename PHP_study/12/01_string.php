<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>문자열</title>
</head>
<body>
    <h1>문자열</h1>
<?
    $a = 'as 아기상어qw';
    
    echo "$a<br>";
    
    echo strlen($a)."<br>";
    echo strlen('한글')."<br>";
    echo mb_strlen($a)."<br>";
    
    //   %EC%9E%A5  %EB%8F%99   %EA%B1%B4
    $a = 'aBcD Efg 그린 Green com GegEo';
    ///   0123456789 25678901234567890
    //             9~11
    //               12~14
    echo "$a<br>";
    echo $a[2]."<br>";
    echo $a[9]."<br>";
    echo substr($a,2,5)."<br>";
    echo substr($a,9,3)."<br>";
    echo substr($a,2)."<br>";
    echo substr($a,2,-2)."<br>";
    echo "<br>";
    echo strstr($a,'e')."<br>";
    echo strstr($a,'en')."<br>";
    echo stristr($a,'e')."<br>";
    //echo strrstr($a,'e')."<br>";
    
    echo "<br>";
    echo strchr($a,'e')."<br>";
    echo strchr($a,'en')."<br>";
    //echo strichr($a,'e')."<br>";
    echo strrchr($a,'e')."<br>";
    
    echo "<br>";
    echo strpos($a,'e')."<br>";
    echo strpos($a,'en')."<br>";
    echo stripos($a,'e')."<br>";
    echo strrpos($a,'e')."<br>";
    echo strripos($a,'e')."<br>";
    
    
    $ff = "aaaa.bb.cccc.ddd.eeeee.txt";
    
    echo substr(strrchr($ff,'.'),1)."<br>";
    
?>
    
    
</body>
</html>