<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>view</title>
</head>
<body>
     <h3>cookie / view</h3>
<?
    if( isset($_COOKIE['title']) ){
    
        echo "title : " . $_COOKIE['title'];

    } else {
        
        echo "title 이 없습니다.";
        
    }
?>     
</body>
</html>