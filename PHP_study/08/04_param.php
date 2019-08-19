<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>04_param</title>
</head>
<body>
    <h1>04_param</h1>
<?
    function fn_1($a, $b){
        echo "fn_1() 실행 $a, $b<br>";
    }
    
    function fn_2($a, $b = 2468){
        echo "fn_2() 실행 $a, $b<br>";
    }
    
    function fn_3($a, $b = 2468, $c  = 1357){
        echo "fn_3() 실행 $a, $b, $c<br>";
    }
    
    function fn_4($a, $b){
        echo "fn_4() 실행 $a --------<br>";
        
        foreach($b as $ee){
            echo "$ee,";
        }
        echo "<br>-----------<br>";
    }
    
    function fn_5($a, ...$b){
        echo "fn_5() 실행 $a --------<br>";
        
        foreach($b as $ee){
            echo "$ee,";
        }
        echo "<br>-----------<br>";
    }
    
//    function fn_6(...$b, $a){
//        echo "fn_6() 실행 $a --------<br>";
//        
//        foreach($b as $ee){
//            echo "$ee,";
//        }
//        echo "<br>-----------<br>";
//    }
    
    function fn_7($a, $b="초기B", ...$c){
        echo "fn_7() 실행 $a, $b --------<br>";
        
        foreach($c as $ee){
            echo "$ee,";
        }
        echo "<br>-----------<br>";
    }
    
//    function fn_8($a, ...$c, $b="초기B"){
//        echo "fn_8() 실행 $a, $b --------<br>";
//        
//        foreach($c as $ee){
//            echo "$ee,";
//        }
//        echo "<br>-----------<br>";
//    }
    
    fn_1(11,22);
    //fn_1(11);
    fn_2(99,88);
    fn_2(99);
    fn_3(100,200,300);
    fn_3(100,200);
    fn_3(100);
    //fn_3();
    
    fn_4("김태희",[56,67,78,89]);
    //fn_4("이효리",56,67,78,89);
    //fn_5("손예진",[56,67,78,89]);
    fn_5("한가인",56,67,78,89);
    fn_5("한가인",56,67,78);
    fn_5("한가인",56,67);
    fn_5("한가인",56);
    fn_5("한가인");
    //fn_6(56,67,78,89,"한채영");
    fn_7("추신수",56,67,78,89);
    fn_7("추신수",56,67,78);
    fn_7("추신수",56,67);
    fn_7("추신수",56);
    fn_7("추신수");
?>
</body>
</html>










