<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>04_dragonMoney</title>
</head>
<body>
    <h1>04_dragonMoney</h1>
<?
    $GLOBALS['mom'] = 100;
    
    
    function son($money){
        static $my = 0;
        $my += $money;
        $GLOBALS['mom'] -= $money;
        echo "아들 : $money ($my) <br>";
        echo "잔액 : ". $GLOBALS['mom'] ."<br>";
        echo "---------------<br>";
    }
    
    function dau($money){
        static $my = 0;
        $my += $money;
        $GLOBALS['mom'] -= $money;
        echo "딸 : $money ($my) <br>";
        echo "잔액 : ". $GLOBALS['mom'] ."<br>";
        echo "---------------<br>";
    }
    
    function scv($money){
        static $my = 0;
        $my += $money;
        $GLOBALS['mom'] += $money;
        echo "아빠 : $money ($my) <br>";
        echo "잔액 : ". $GLOBALS['mom'] ."<br>";
        echo "---------------<br>";
    }
    
    son(15);
    dau(10);
    dau(8);
    son(5);
    scv(50);
    son(13);
    dau(14);
    scv(40);
    
?>    
</body>
</html>