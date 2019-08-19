<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_func</title>
</head>
<body>
    <h1>01_func</h1>
    
<?
    function fn_1(){   ////함수의 정의  param X, ret X
        echo "와 함수 fn_1() 이다<br>";
        echo "와 함수 fn_1() 이지롱<br>";
        echo "와 함수 fn_1() ㅇㄹㄷㅈㄹㅈㄷㄹ<br>";
    }
    
    function fn_2($a, $b){  ////param O, ret X
        echo "와 함수 fn_2() 이다 $a, $b <br>";
        
        return;
    }
    
    function fn_3(){   //// param X, ret O
        echo "와 함수 fn_3() 이다<br>";
        
        //return 123 ,456;  return 은 한개 혹은 없음 만 허용
        //return 123;
        return [123, 456];
    }
    
    function fn_4($a, $b, $c){  ////param O, ret O
        echo "와 함수 fn_4() 이다 $a, $b, $c <br>";
        
        return $a+ $b+ $c;
    }
    
    
    fn_1();   ///함수의 호출
    fn_1(); 
    $r1 = fn_1(); 
    $r2 = fn_2(100, 200);  ///$a = 100,  $b = 200
    fn_2(111,222,333,444);  
    //fn_2(1357);  
    $r3 = fn_3();
    
    echo "--------------------------<br>";
    echo "\$r1: $r1 <br>";
    echo "\$r2: $r2 <br>";
    echo "\$r3: $r3[0], $r3[1] <br>";
    echo "결과: " . fn_4(10,20,30) . "<br>";
    
    
    
    ////// 이름, 국어, 영어, 수학을 입력받아 
    ///  이름, 국어, 영어, 수학, 총점, 평균을 출력하는 함수를 만들어 실행하세요
    
    
    
    
?>    
</body>
</html>














