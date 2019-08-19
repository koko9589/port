<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>05_do_while</title>
</head>
<body>
    <h1>05_do_while</h1>
<?
    $i = 10;
    while ($i<5){
        echo "while $i <br>";
        $i++;
    }
    
    echo "-------------<br>";
    
    $i = 10;
    do{
        echo "do~while $i <br>";
        $i++;
    }while ($i<5);
?>    
</body>
</html>