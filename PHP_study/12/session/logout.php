<?
    session_start();

   $msg = $_SESSION['mem']['name'] . '님 로그아웃 되었습니다.';

    session_destroy();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>logout</title>
</head>
<body>
<script>
    alert('<?=$msg?>');
    location.href = "loginMain.php";
</script>    
</body>
</html>