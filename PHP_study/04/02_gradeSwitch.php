<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_gradeSwitch</title>
</head>
<body>
<h1>02_gradeSwitch</h1>    
<?
    $kor = 98;
    $eng = 89;
    $mat = 92;
    $sum = $kor + $eng + $mat;
    
    $sum2 = $sum - $sum%3;
    
    $jum = $sum2 / 3;
    $jj = $jum - $jum%10;
    
    
    switch($jj){
        case 100:    
        case 90:
            $grade = "수";
             if($kor >=90 && $eng >=90 && $mat >=90)
                $grade .= "(우등생)";
            break;
        case 80:
            $grade = "우";
            break;
        case 70:
            $grade = "미";
            break;
        case 60:
            $grade = "양";
            break;
        default:
            $grade = "가";
            break;
    }
    echo "$jum : $jj -> $grade<br>";
?>
</body>
</html>