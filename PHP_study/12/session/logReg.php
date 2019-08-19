<?
    session_start();

    extract($_REQUEST);

    $members = ['aaa'=> ['1111', '장동건'],
                'bbb'=> ['2222', '장서건'],
                'ccc'=> ['3333', '장남건'],
                'ddd'=> ['4444', '장중건'],
                'eee'=> ['3333', '북두신건']
      ];

    
    $msg = '로그인 실패';

    
    if(array_key_exists($pid, $members) && $pw == $members[$pid][0] ){
        
        $_SESSION['mem'] = ['id'=>$pid, 'name'=>$members[$pid][1]];
        
        $msg = $_SESSION['mem']['name'] . '님 로그인 성공';
        
        
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>logReg</title>
</head>
<body>
<script>
    alert('<?=$msg?>');
    location.href = "loginMain.php";
</script>    
</body>
</html>