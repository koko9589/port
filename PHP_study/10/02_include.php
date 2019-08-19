<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_include</title>
</head>
<body>
    <h1>02_include</h1>
<?
    $aa = 100;
    echo "메인 - \$aa: $aa <br>";
    include "a.php";
    require "b.php";
    
//    require "abcd.php";
//    echo "require 에러 이후 작업<br>";
//    include "abcd.php";
//    echo "include 에러 이후 작업<br>";
    
    echo "메인 - \$aa: $aa , \$bb : $bb <br>"; 
?>    
</body>
</html>