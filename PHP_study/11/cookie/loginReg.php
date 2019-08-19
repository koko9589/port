<?
    extract($_REQUEST);

    $msg = '로그인 실패';


    $members = [
         'aaa' => ['1111', '장동건'],
          'bbb'=> ['2222', '장서건'],
          'ccc'=> ['3333', '장남건'],
          'ddd'=> ['4444', '장중건'],
          'eee'=> ['3333', '북두신건']    
    ];


    if(array_key_exists($pid, $members) && $members[$pid][0] == $pw){
        $msg = '로그인 성공';
        
        setcookie('pid', $pid, -1, '/');
        setcookie('pname', $members[$pid][1], -1, '/');
    }


    /*
    $mid = 'aaa';
    $mpw = '1111';
    $mname = '장동건';

    if($mid == $pid && $mpw == $pw){
        $msg = '로그인 성공';
        
        setcookie('pid', $pid, -1, '/');
        setcookie('pname', $mname, -1, '/');
    }
*/

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>loginReg</title>
</head>
<body>
    <script>
        alert('<?=$msg?>');
        location.href = "loginMain.php";
    </script>
</body>
</html>