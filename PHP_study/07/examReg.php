<?
    extract($_REQUEST);

    ///1. 원시 데이터 처리부
    $sum = [];    
    $avg = []; 

    for($i =0; $i<5; $i++) { 
            
        if(!$kor[$i] ) $kor[$i]  =0;
        if(!$eng[$i] ) $eng[$i]  =0;
        if(!$mat[$i] ) $mat[$i]  =0;
        
        $sum[$i] =$kor[$i] +$eng[$i]+$mat[$i];
        $avg[$i] = $sum[$i]/3;
    }

    ////2.등수 처리부
    $rank=[];
    foreach($avg as $me => $v){
        $rank[$me] = 1;
        
        foreach($avg as $you){
            if($v < $you)
                $rank[$me]++;
        }
    }
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
                <td>국어</td>
                <td>영어</td>
                <td>수학</td>
                <td>총점</td>
                <td>평균</td>
                <td>등수</td>
            </tr>
<? 
  for($r = 1; $r <=5 ; $r++){
    for($i =0; $i<5; $i++) { 
        if($r == $rank[$i]){
            
            ?>            
            <tr>
                <td><?=$pname[$i]?></td>
                <td><?=$kor[$i]?></td>
                <td><?=$eng[$i]?></td>
                <td><?=$mat[$i]?></td>
                <td><?=$sum[$i]?></td>
                <td><?=$avg[$i]?></td>
                <td><?=$rank[$i]?></td>
            </tr>
<? }}} ?>            
            
        </table>

</body>
</html>