<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>04_while</title>
</head>
<body>
    <H1>04_while</H1>
<?
    $i = 0;
    
    while($i <10){
        echo "while 문이다 $i<br>";
        $i++;
    }
    
    echo "---------------------<br>";
    
    $i = 1;
    
    while($i <=20){
        
        $ret = $i;
        
        $one = $i%10;
        
        if($one%3==0 && $one!=0)
            $ret = "짝";
        
        
        echo "$ret<br>";
        $i++;
    }
    
?>    
</body>
</html>
