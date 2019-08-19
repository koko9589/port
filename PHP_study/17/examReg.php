<?
    extract($_REQUEST);
    
    $sum = $kor + $eng +$mat;
    $avg = round($sum  / 3 , 2);

    $res = $pname . "," . $kor . "," . $eng . "," . $mat . "," . $sum . "," . $avg;
    
    file_put_contents('../src/exam.txt',$res);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>examReg</title>
</head>
<body>
    <h1>examReg</h1>
<table border="">
        <tr>
            <td>이름</td>
            <td><?=$pname?></td>
        </tr>
        <tr>
            <td>국어</td>
            <td><?=$kor?></td>
        </tr>
        <tr>
            <td>영어</td>
            <td><?=$eng?></td>
        </tr>
        <tr>
            <td>수학</td>
            <td><?=$mat?></td>
        </tr>
        <tr>
            <td>총점</td>
            <td><?=$sum?></td>
        </tr>
        <tr>
            <td>평균</td>
            <td><?=$avg?></td>
        </tr>
    </table>      
</body>
</html>