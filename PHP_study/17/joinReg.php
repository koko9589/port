<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>joinReg</title>
</head>
<body>
    <h1>joinReg</h1>
<?
    extract($_REQUEST);
    
    $mem = $pid . "," . $pname . "," . $pw;
    
    file_put_contents('../src/members.csv',$mem);
    
    
    //// 이름, 국어, 영어, 수학을 입력 받는 폼 파일 을 만들고
    ///  입력 처리하는 reg 파일을 만들어서 ../src/exam.txt 파일로 저장해 주세요
    //// 저장내용 : 이름,국어,영어,수학,총점,평균
?>

    <table border="">
        <tr>
            <td>id</td>
            <td><?=$pid?></td>
        </tr>
        <tr>
            <td>이름</td>
            <td><?=$pname?></td>
        </tr>
        <tr>
            <td>암호</td>
            <td><?=$pw?></td>
        </tr>
    </table>   
        
</body>
</html>