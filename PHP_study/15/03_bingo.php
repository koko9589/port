<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>03_bingo</title>
</head>
<body>
    <h1>03_bingo</h1>
<?
    $bingo = [];
    
    while(true){
        
        $no = rand(1,100);
        if( !in_array($no, $bingo) )
        $bingo[] = $no;
        
        if(sizeof($bingo) == 25 )
            break;
    }
    /////빙고 게임 판을 출력해주세요 
    /// 5 x 5 
    /// 경우의 수 : 1-> 100
    /// 숫자는 중복불가
    
?>
    <table border="">
        <tr>
           <? foreach($bingo as $i => $v) {?>
                <td><?=$v?></td>
            <?
                if(($i+1)%5 ==0 ){
                    echo "</tr><tr>";
                }} ?>
        </tr>
    </table>
        
</body>
</html>