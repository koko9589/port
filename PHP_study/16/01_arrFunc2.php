<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_arrFunc2</title>
</head>
<body>
    <h1>01_arrFunc2</h1>
<?
    $exam = [
        ['한가인',66,68,61],
        ['한나인',26,48,81],
        ['한다인',96,88,51],
        ['한라인',96,98,91]
    ];
?>
<table border="">
   <? foreach($exam as $i => $ee){ ?>
    <tr>
       <td><?=$i?></td>
       <? foreach($ee as $v){ ?> 
            <td><?=$v?></td>
        <? } ?>
    </tr>
    <? } ?>
</table>
    
<?
/*    for($me = 0; $me<sizeof($exam); $me++){
        echo $exam[$me][0].":";
        
        for($you= $me ; $you <sizeof($exam); $you++){
             //echo $exam[$you][0].",";
            if($exam[$me][3]<$exam[$you][3]){ ///바꿔치기 조건
                $buf = $exam[$me];
                $exam[$me] = $exam[$you];
                $exam[$you] = $buf;
            }
        }
        
        echo "<br>";
    }
*/
   ////각 총점을 계산  
    
    for($i=0; $i<sizeof($exam); $i++){
       // list($name, $kor,$eng,$mat) = $exam[$i];
        list($kor,$eng,$mat) = array_slice($exam[$i],1,3);
        $exam[$i][] = $kor +$eng +$mat;
        //$exam[$i][] = $exam[$i][1] +$exam[$i][2] +$exam[$i][3];
    }
    
    
    function compare($me, $you){  ///총점을 비교
                            ///   음수면 앞에,  양수면 뒤에
        //return $me-$you;  ///값이 음수, 0, 양수 인지 중요
        return $you[4]-$me[4];
    }
    
    //echo compare($exam[0],$exam[2]);
    
    usort($exam,'compare');
    
?>
            
                        
                                    
<table border="">
   <? foreach($exam as $i => $ee){ ?>
    <tr>
       <td><?=$i?></td>
       <? foreach($ee as $v){ ?> 
            <td><?=$v?></td>
        <? } ?>
    </tr>
    <? } ?>
</table>            
</body>
</html>