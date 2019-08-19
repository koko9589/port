<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_forStar</title>
</head>
<body>
    <h1>02_forStar</h1>
<?
    for($line= 0 ; $line < 5 ; $line++){
        
        for($star=0; $star <= $line ; $star++){
            echo "*";
        }
        
        echo "<br>";
    }
    
    
    echo "--------------------------<br>";
    
    for($line= 0 ; $line < 5 ; $line++){
        
        for($star= $line; $star < 5 ; $star++){
            echo "*";
        }
        
        echo "<br>";
    }
    
    echo "--------------------------<br>";
    
    for($line= 0 ; $line < 5 ; $line++){
        
        for($star = $line; $star < 5-1 ; $star++){
            echo "&nbsp;";
        }
        
        for($star=0; $star <= $line ; $star++){
            echo "*";
        }
        
        echo "<br>";
    }
    
?>    
</body>
</html>