<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>로그인 메인</title>
</head>
<body>
    <h1>로그인 메인</h1>
    
    <? if( isset($_COOKIE['pid']) )   { ?>
       
        <?=$_COOKIE['pname']?>님 안녕하세요 
        <a href="logout.php">로그아웃</a>
        
    <? } else { ?>
    
        <form action="loginReg.php">
            아이디:<input type="text" name="pid">
            암호:<input type="text" name="pw">
            <input type="submit" value="로그인">
        </form>
    
    <? } ?>
    
    
    
    
    
</body>
</html>