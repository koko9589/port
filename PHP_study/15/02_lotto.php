<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_lotto</title>
</head>
<body>
    <h1>02_lotto</h1>
<?
    $lotto = [];
    
    while(true){
        
        $no = rand(1,45);
        if( !in_array($no, $lotto) )
        $lotto[] = $no;
        
        if(sizeof($lotto) ==7 )
            break;
    }
    
    echo implode(',', $lotto);
    
?>    
</body>
</html>