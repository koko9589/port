<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>03_static</title>
</head>
<body>
    <h1>03_static</h1>
<?
    
    function fn_1(){
     static $a = 10;
        $b = 10;
        
        $a += 10;
        $b += 10;
        
        echo "fn_1() \$a : $a, \$b : $b <br>";
        
    }
    
    function fn_2(){
     static $a = 1000;
        $b = 1000;
        
        $a += 1000;
        $b += 1000;
        
        echo "fn_2() \$a : $a, \$b : $b <br>";
        
    }
    
    fn_1();
    fn_1();
    fn_1();
    fn_1();
    echo "--------------<br>";
    fn_2();
    fn_2();
    fn_2();
    fn_2();
    
    //echo "main \$a : $a<br>";
?>    
</body>
</html>