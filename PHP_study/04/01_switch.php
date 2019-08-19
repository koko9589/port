<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_switch</title>
</head>
<body>
<h1>01_switch</h1>
<?
    switch(20.123){
        case 10:
            echo "난 10이야<br>";
            break;
        default:
            echo "난 기본값이야<br>";
            break;
        case 8:
            echo "난 8이야<br>";
            echo "난 8이지롱<br>";
            echo "난 8일껄요?<br>";
            break;
        case 20:
            echo "난 20이야<br>";
            break;
        case 5:
            echo "난 5야<br>";
            break;
    }
    
    
    ///인사부 - 바다, 영업부 - 산, 부부 - 안방, 두부 - 콩밭
    
    $buseo = "생산부";
    
    switch($buseo){
        case "인사부":
            $mt = "바다";
            break;
        case "영업부":
            $mt = "산";
            break;
        case "부부":
            $mt = "안방";
            break;
        case "두부":
            $mt = "콩밭";
            break;
        default:
            $mt = "야근";
            break;
    }
    
    echo "$buseo : $mt <br>";
?>    
</body>
</html>




















