<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cookie / set2</title>
</head>
<body>
    <h3>cookie / set2</h3>
<?
    
    $now = time()+60*60*24*5;
    $now =0;
    echo date('Y-m-d H:i:s', $now);
   //setcookie('title','bbb',   -1,    '/');
            //쿠키이름, 쿠키값, 유효시간, 경로
    setcookie('title','bbb',  time()+5,    '/');  ///유효시간 5초
?>    
</body>
</html>