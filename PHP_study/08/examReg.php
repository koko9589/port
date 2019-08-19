<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>examReg</title>
</head>
<body>
    <h1>examReg</h1>
<?
    extract($_REQUEST);    
    
    function exam($nn, ...$jum){
        
        //$sum = $kk+$ee+$mm;
        //$avg = $sum / 3;
        
        //return "$nn , $kk, $ee, $mm, $sum , $avg";
        
        $res = $nn . ",";
        
        $sum = 0;
        foreach ($jum as $j){
            $sum += $j;
            $res .= $j .",";
        }
        
        $avg = $sum / sizeof($jum);
        $res .= $sum . "," . $avg;
        
        return $res;
        
        
    }
    
    echo exam($name, $kor, $eng, $mat, $sci, $his);
    
?>    
</body>
</html>