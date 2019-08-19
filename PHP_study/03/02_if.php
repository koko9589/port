<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_if</title>
</head>
<body>
    <h1>02_if</h1>
<?
    if(true){
        echo "와 참이다1<br>";
        echo "와 참이다2<br>";
        echo "와 참이다3<br>";
        echo "와 참이다4<br>";
    }else{
        echo "난 거짓이여<br>";
    }
    
    echo "if문 종료<br>";
    
    $jum = 77;
    
    if($jum >= 80){
        echo "우수네<br>";
    }
    
    else if($jum >= 60){
        echo "정상이네<br>";
        
        if($jum%2){
            echo "홀수<br>";
        }else{
            echo "짝수<br>";
        }
    } 
    
     else if($jum >= 40){
        echo "걱정이네<br>";
    } 
        
    else{
        echo "불합격이여<br>";
    }
    
    
?>    
</body>
</html>