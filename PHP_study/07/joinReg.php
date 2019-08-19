<?
    extract($_REQUEST);


    $hh = "";

    foreach($hobby as $v){
        $hh .= "$v,";
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>joinReg</title>
</head>

<body>
    <h1>joinReg</h1>

    <table border="">
        <tr>
            <td>아이디</td>
            <td><?=$_GET["pid"]?></td>
        </tr>
        <tr>
            <td>암호</td>
            <td><?=$_REQUEST["pw"]?></td>
        </tr>
        <tr>
            <td>성별</td>
            <td><?=$_POST["gender"]?></td>
        </tr>
        <tr>
            <td>취미</td>
            <td><?=$hh?></td>
        </tr>
        <tr>
            <td>이메일</td>
            <td><?=$email1 ?>@<?=$email2 ?></td>
        </tr>
        <tr>
            <td>파일</td>
            <td><?=$upfile?></td>
        </tr>
        <tr>
            <td>자기 소개</td>
            <td><?=nl2br($content)?></td>
        </tr>
        
    </table>
 
</body>
</html>