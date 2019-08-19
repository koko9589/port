<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_funcCall</title>
</head>
<body>
    <h1>01_funcCall</h1>
<?
    $ss = 1234; //지역변수
    $GLOBALS['zz'] = 1010; 
    
    function fn_1(){
        
        $a = 10;  //지역변수 
        $in = '아기상어';
        global $gg;
        $gg = 9876;
        
        //echo "fn_1() 시작 : $a, $ss <br>";
        
        echo "fn_1() 시작 : $a, $in, $gg  , " . $GLOBALS['zz'] . "<br>";
        fn_2($in); ///매개변수로 넣는 것은 지역변수의 값임
        // $pp = $in;
        // $pp = '엄마상어';
        
        echo "fn_1() 끝 : $a, $in, $gg <br>"; //$in 이 변경되지 않음
        //echo "fn_1() 끝 : $a, $pp <br>";
        //echo "fn_1() 끝 : $a, $b <br>";
    }
    
    function fn_2($pp){ //$pp  매개변수는 지역변수
        global $gg;
        $b = 2000;
       // echo "&nbsp;&nbsp;&nbsp;&nbsp; fn_2() 시작 : $a <br>";
         echo "&nbsp;&nbsp;&nbsp;&nbsp; fn_2() 시작 :
         $pp, $b, $gg , " . $GLOBALS['zz'] . " <br>";
        $gg = 6543;
        $pp = '엄마상어';
        $GLOBALS['zz'] = 1080;
        fn_3();
        echo "&nbsp;&nbsp;&nbsp;&nbsp; fn_2() 끝 : $pp, $b <br>";
    }
    
    function fn_3(){
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        fn_3()  , " . $GLOBALS['zz'] . " 시작<br>";
       // fn_1();
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        fn_3() 끝<br>";
    }
    echo "main : $ss , " . $GLOBALS['zz'] . "<br>";
    
    fn_1();
    
?>    
</body>
</html>




