<?
    $msg = $_COOKIE['pname'] . '님 로그아웃 되었습니다.';

    setcookie('pid', '', 0, '/');
    setcookie('pname', '', 0, '/');
   
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>로그아웃</title>
</head>
<body>
    <script>
        alert('<?=$msg?>');
        location.href = "loginMain.php";
    </script>
</body>
</html>