<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>03_breakContinue</title>
</head>
<body>
    <h1>03_breakContinue</h1>
<?
    for($i = 0; $i<=10 ; $i++){
        echo "$i <br>";
        
        if($i==5)
            break;
    }
    
    echo "for - break 문 종료 <br>";
    
    
    for($i = 0; $i<=10 ; $i++){
        echo "$i 시작 <br>";
        
        if($i==5)
            continue;
        
        echo "$i 끝 <br>";
    }
    
    echo "for - continue문 종료 ---------<br>";
    
     for($i = 0; $i<=10 ; $i++){
        echo "$i 시작 <br>";
        
        if($i!=5)
            echo "$i 끝 <br>";
    }
    
    echo "for - if 문 종료 ---------<br>";
?>    
</body>
</html>