<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>05_getExam</title>
</head>
<body>
<?
    $title=['kor'=>'국어','eng'=>'영어','mat'=>'수학'];
    
    $subject = [ '아이디'=>$_GET['id'] ];
    $sum =0;
    foreach($title as $tt => $v){
        
        $subject[$v] = $_GET[$tt];
        $sum +=$subject[$v];
    }
    $subject['총점'] = $sum;
    $subject['평균'] = $sum/sizeof($title);
    
    
?>
<table border="">
    
    <? foreach($subject as $tt => $v){?>
    <tr>
        <td><?=$tt?></td>
        <td><?=$v?></td>
    </tr>
    <? } ?>
</table>
        
</body>
</html>