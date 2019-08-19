<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>examMulReg</title>
</head>
<body>
    <h1>examMulReg</h1>
<?
    extract($_REQUEST);    
    
    function exam($nn, $kk, $ee, $mm){
        
        $sum = $kk+$ee+$mm;
        $avg = $sum / 3;
        
        //return "$nn , $kk, $ee, $mm, $sum , $avg";
        return "<tr><td>$nn</td><td>$kk</td><td>$ee</td><td>$mm</td><td>$sum</td><td>$avg</td></tr>";
        
    }
    
    //echo exam($name, $kor, $eng, $mat);
    
?>
<table border="">
   <tr  align="center">
       <td>이름</td>
       <td>국어</td>
       <td>영어</td>
       <td>수학</td>
       <td>총점</td>
       <td>평균</td>
   </tr>
<? foreach($name as $i => $nnn){
    
    echo exam($nnn, $kor[$i], $eng[$i], $mat[$i]);
}?>   
 </table>        
</body>
</html>
















