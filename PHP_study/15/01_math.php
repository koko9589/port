<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_math</title>
</head>
<body>
    <h1>수학함수</h1>
<?
    echo "number_format-----------------------<br>";
    $no = 12345678.87654321;
    echo "$no<br>";
    echo number_format($no) . "<br>";
    echo number_format($no,    2,       ".",       ",") . "<br>";
                    //숫자, 소수점자리, 소수점표시,  천단위표시
    echo number_format($no,    2,       "점",       "콤마") . "<br>";
    
    echo "abs-----------------------<br>";
    echo abs(123.456) . "<br>";
    echo abs(-123.456) . "<br>";
    
    echo "ceil-----------------------<br>";
    echo ceil(123.456) . "<br>";
    echo ceil(123.987) . "<br>";
    echo ceil(-123.456) . "<br>";
    echo ceil(-123.987) . "<br>";
    echo "floor-----------------------<br>";
    echo floor(123.456) . "<br>";
    echo floor(123.987) . "<br>";
    echo floor(-123.456) . "<br>";
    echo floor(-123.987) . "<br>";
    
    echo "round-----------------------<br>";
    echo round(123.432,2) . "<br>";
    echo round(123.987,2) . "<br>";
    echo round(-123.432,2) . "<br>";
    echo round(-123.987,2) . "<br>";
    echo "-----------------------<br>";
    echo pow(2,4) . "<br>";
    echo sqrt(2) . "<br>";
    echo log(23,5) . "<br>";
    echo log10(23) . "<br>";
    echo pi() . "<br>";
    echo "-----------------------<br>";
    echo 10 .",". dechex(10) ."<br>";
    echo "a ,". hexdec("a") ."<br>";
    echo 10 .",". decoct(10) ."<br>";
    echo 12 . " ,". octdec(12) ."<br>";
    echo "-----------------------<br>";
    echo max(123,567,34,89,345,56) . "<br>";
    echo min(123,567,34,89,345,56) . "<br>";
    echo "-----------------------<br>";
    echo rand() . "<br>";
    echo rand(5,10) . "<br>";
    $arr = [34,5,23,78];
    
    echo in_array(50, $arr) . "<br>";
    
    
?>    
</body>
</html>
