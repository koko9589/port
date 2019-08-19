<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_file1</title>
</head>
<body>
    <h1>01_file1</h1>
<?
    $dd = file_get_contents('../src/aaa.txt');
    
    echo nl2br($dd)."<br>";
    
    file_put_contents('../src/bbb.txt','아기상어');
    file_put_contents('../src/bbb.txt','엄마상어');
    file_put_contents('../src/bbb.txt',"아빠상어\n");
    file_put_contents('../src/bbb.txt',"할머니상어\n",FILE_APPEND);
    
    //////////////////////////////////////////////////////////////////
    $ss = filesize('../src/aaa.txt');
    echo $ss . "<br>";
    
    $ff = fopen('../src/aaa.txt', 'r');
    $dd2 = fread($ff, $ss);
    fclose($ff);
    
    echo nl2br($dd2)."<br>";
    
    
    $ff = fopen('../src/ccc.txt', 'w');
    
    fwrite($ff, "아기상어\n");
    fwrite($ff, "엄마상어\n");
    fwrite($ff, "아빠상어\n");
    fwrite($ff, "할머니상어\n");
    
    fclose($ff);
    
    $ff = fopen('../src/ddd.txt', 'a');
    
    fwrite($ff, "아기상어\n");
    fwrite($ff, "엄마상어\n");
    fwrite($ff, "아빠상어\n");
    fwrite($ff, "할머니상어\n");
    
    fclose($ff);
?>
</body>
</html>