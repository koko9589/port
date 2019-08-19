<?
    extract($_REQUEST);

    $today = mktime(0,0,0, date('n'), 1, date('Y') ) ;

    if( isset($now) ){
        
        $arr = explode("_", $now);
        
        $today = mktime(0,0,0, $arr[1], 1, $arr[0] ) ;
    }

    
    $before = mktime(0,0,0, date('n', $today)-1, 1, date('Y', $today) ) ;
    $after = mktime(0,0,0, date('n', $today)+1, 1, date('Y', $today) ) ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_diary</title>
</head>
<body>
    <h1>달력</h1>
    <table border="">
        <tr align = "center">
           <td><a href="?now=<?=date('Y', $before)?>_<?=date('m', $before)?>"> <- </a></td>
            <td colspan="5"><?=date('Y 년 n월', $today)?></td>
            <td><a href="?now=<?=date('Y', $after)?>_<?=date('m', $after)?>"> -> </a></td>
        </tr>
        <tr  align = "center">
            <td>일</td>
            <td>월</td>
            <td>화</td>
            <td>수</td>
            <td>목</td>
            <td>금</td>
            <td>토</td>
        </tr>
        <tr>
<?
    $first = date('w', $today);
    
    for($i = 0 ; $i < $first ; $i++){
        echo "<td></td>";
    }
    
    
    for($i = 1; $i <= date('t', $today) ; $i++) { ?>                 
            <td><?=$i?></td>
<?
    $today = mktime(0,0,0, date('n', $today), $i, date('Y', $today) );
    $day = date('w', $today );
    if($day == 6){
        echo "</tr><tr>";
    }
                                       
} ?>
        </tr>
    </table>
</body>
</html>




