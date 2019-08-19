<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>04_mulFor</title>
</head>
<body>
    <h1>04_mulFor</h1>
<?
    for($h=1; $h<=12; $h++){
        echo "<h3> $h 시 </h3>";
        
        for($m =0; $m<60; $m++){
            echo "$h : $m<br>";
        }
    }
?>    
</body>
</html>