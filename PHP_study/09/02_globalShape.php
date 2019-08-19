<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_globalShape</title>
</head>
<body>
    <h1>02_globalShape</h1>
<?
    function circle($r){
        $area = $r * $r * 3.14;
        $GLOBALS['sum'] += $area;
       // return $area;
    }
    
    function rectanlge($w, $h){
        $area = $w * $h;
        $GLOBALS['sum'] += $area;
      //  return $area;
    }
    
    $sum = 0;
    
    //$sum += circle(5);
    //$sum += rectanlge(5,6);
    //echo "합계: $sum <br>";
    $GLOBALS['sum'] =0;
    
    circle(5);
    rectanlge(5,6);

    echo "합계: ". $GLOBALS['sum'] ." <br>";
    
    
    ////학생 점수를 입력받아 평균 점수를 계산하여 최고 최대 점수를 출력하세요
    /// 학생 : 4명 , 점수 : 국어, 영어, 수학
    
    $GLOBALS['max'] =-1;
    $GLOBALS['min'] =101;
    
    function exam($name, ...$jum){
        
        $sum = 0;
        foreach ($jum as $j){
            $sum += $j;
        }
        $avg = $sum / sizeof($jum);
        if( $GLOBALS['max'] < $avg) $GLOBALS['max'] = $avg;
        if( $GLOBALS['min'] > $avg) $GLOBALS['min'] = $avg;
        //echo "$avg <br>";
    }
    
    exam("장동건",77,76,79);
    exam("장서건",87,86,89);
    exam("장남건",57,56,59);
    exam("북두신건",67,86,79);
    
    echo "최대 : " . $GLOBALS['max'] . "<br>";
    echo "최소 : " . $GLOBALS['min'] . "<br>";
    
?>
</body>
</html>






