<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>03_str3</title>
</head>
<body>
    <h1>03_str3</h1>
<?
    $a = '     asdf qw ert     ';
    echo $a . strlen($a)."<br>";
    
    $at = trim($a);
    echo $at . strlen($at)."<br>";
    
    $ext = 'sAdF Rtg';
    echo "$ext<br>";
    echo strtoupper($ext)."<br>";
    echo strtolower($ext)."<br>";
    
    $b = "<h1>목이 아파요</h1>";
    $c = "<script>alert('살려줘')</script>";
    
    echo "$b<br>";
    echo strip_tags($b)."<br>";
    //echo "$c<br>";
    echo htmlspecialchars($c, ENT_QUOTES)."<br>";
    
    
    echo ord('a')."<br>";
    echo chr(100)."<br>";
    
    $msg = 'i love you';
    
    
    function encry($ori, $num){
        $newMsg = '';
        for($i=0; $i<strlen($ori);$i++){
        
            $newTT = ord($ori[$i])+$num;

            $newMsg .= chr($newTT); 
            //echo $msg[$i] . chr($newTT) . "<br>";
        }
        return $newMsg;
    }
    
    
     function decry($ori, $num){
        $newMsg = '';
        for($i=0; $i<strlen($ori);$i++){
        
            $newTT = ord($ori[$i])-$num;

            $newMsg .= chr($newTT); 
            //echo $msg[$i] . chr($newTT) . "<br>";
        }
        return $newMsg;
    }
    
    
    echo "$msg<br>";
    
    $ee = encry($msg,3);
    echo $ee."<br>";
    echo decry($ee,3)."<br>";
?>    
</body>
</html>






