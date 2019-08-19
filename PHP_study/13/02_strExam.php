<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_strExam</title>
</head>
<body>
    <h1>02_strExam</h1>
<?
    $str = 
'장동건,67,68,61
장서건,87,88,81
장남건,57,58,51
장중건,97,98,91';
    
//echo "$str<br>";
$studArr = explode("\n",$str);
    
foreach($studArr as  $i => $st){
    //echo "$i : $st<br>";
    $jj = explode(",",$st);
    $sum = 0;
    $cnt =  sizeof($jj);
    for($k = 1 ; $k<$cnt; $k++){
       // echo "$jj[$k]";
        $sum += intval($jj[$k]);
    }
    $avg = $sum/($cnt-1);
   // echo "$sum, $avg<br>";
    
    ///점수를 구하여 더할 것
    $studArr[$i].= ",$sum,$avg";
   // echo $studArr[$i];
    
    
    ///출력물을 문자열로 만들어 주세요
'장동건,67,68,61,총점,평균
장서건,87,88,81
장남건,57,58,51
장중건,97,98,91';
    
}
    $res = implode("\n",$studArr);
    
    echo $res;
    ///impode
    /*foreach($studArr as   $st){
        echo $st;
    }*/
    
    
    
?>
</body>
</html>