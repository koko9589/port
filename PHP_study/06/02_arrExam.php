<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_arrExam</title>
</head>
<body>
    <h1>02_arrExam</h1>
<?
    $stud = [88,67,89,65,54];
    
    $sum =0;
    
    foreach($stud as $j){
        $sum += $j;
    }
    $avg = $sum / sizeof($stud);
    
    $stud[] = $sum;
    $stud[] = $avg;
    
    $index = ["국어","영어","수학","과학","국사","총점","평균"];
    
    //echo "총점 : $sum <br>";
    //echo "평균 : $avg <br>";
?> 
<table border="">
   <? foreach($index as $i => $title) {?>
    <tr>
        <td><?=$title?></td>
        <td><?=$stud[$i]?></td>
    </tr>
    <? } ?>
</table>
<?
//// 5명의 점수의 등급을 출력하세요
    //78,62,91,54,83
    //미, 양,수,가, 우
    
    $ppp = [78,62,91,54,83];
    $grade =[];
    
    foreach($ppp as $e){
        
        
        $grade[] = 
    ["가","가","가","가","가","가","양","미","우","수","수"][($e-$e%10)/10];
        
//        if ($e >=90)
//            $grade[] = "수";
//        else if ($e >=80)
//            $grade[] = "우";
//        else if ($e >=70)
//            $grade[] = "미";
//        else if ($e >=60)
//            $grade[] = "양";
//        else
//            $grade[] = "가";
    }    
?>
<table border="">
   <? foreach($ppp as $i => $e) {?>
    <tr>
        <td><?=$e?></td>
        <td><?=$grade[$i]?></td>
    </tr>
    <? } ?>
</table>          
          
           
         
</body>
</html>
















