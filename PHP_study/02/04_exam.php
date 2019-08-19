<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>04_exam</title>
</head>
<body>
    <h1>04_exam</h1>
<?
    //번호, 성명, 국어, 영어, 수학, 총점, 평균을 선언하고 출력하세요
    $no = 17;
    $pname = "현빈";
    $kor = 98;
    $eng = 99;
    $mat = 92;
    $sum = $kor + $eng + $mat;
    $avg = $sum / 3;
    
    $sum2 = $sum - $sum%3;
    $avg2 = $sum2 / 3;
    
    $grade = $avg >=90 ? "수" :
            ($avg >=80 ? "우" :
            ($avg >=70 ? "미" :
            ($avg >=60 ? "양" :"가")));

    
    if($avg >= 90){
        $grade2 = "수";
        
        if($kor >=90 && $eng >=90 && $mat >=90)
                $grade2 .= "(우등생)";
         
    }else if($avg >= 80){
        $grade2 = "우";
    }else if($avg >= 70){
        $grade2 = "미";
    }else if($avg >= 60){
        $grade2 = "양";
    }else{
        $grade2 = "가";
    }
    
    echo "번호: $no<br>";
    echo "이름: $pname<br>";
    echo "국어: $kor<br>";
    echo "영어: $eng<br>";
    echo "수학: $mat<br>";
    echo "총점: $sum<br>";
    echo "평균: $avg<br>";
    echo "총점2: $sum2<br>";
    echo "평균2: $avg2<br>";
    echo "등급: $grade<br>";
    echo "등급2: $grade2<br>";
    
?>    
</body>
</html>












