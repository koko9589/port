<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_cal2</title>
</head>
<body>
    <h1>01_cal2</h1>
<?
    echo "<h2>2. 비교연산자</h2>";
    
    ///결과가 참 : 1, 거짓 : 0 혹은 없음
    
    $x = 10; $y = 20;
    
    $x = "원빈"; $y = "원";
    
    echo "$x > $y : " . ($x > $y) . "<br>";
    echo "$x >= $y : " . ($x >= $y) . "<br>";
    echo "$x <= $y : " . ($x <= $y) . "<br>";
    echo "$x < $y : " . ($x < $y) . "<br>";
    echo "$x == $y : " . ($x == $y) . "<br>";
    echo "$x != $y : " . ($x != $y) . "<br>";
    
    
     echo "<h2>3. 논리연산자</h2>";
    $x = true ; $y = false;   ///true : 1, 참, "내용"  false : 거짓 , 0 ,""
    
    echo "$x && $y : " . ($x && $y) . "<br>";
    echo "$x and $y : " . ($x and $y) . "<br>";
    echo "$x || $y : " . ($x || $y) . "<br>";
    echo "$x or $y : " . ($x or $y) . "<br>";
    echo "$x xor $y : " . ($x xor $y) . "<br>";
    echo "!$x : " . !$x . "<br>";
    
    $age = 29;  $color = "빨강";
    
    //$ageChk = $age <= 25+10;
   // $colorChk = $color == "빨강";
    
   /* echo "And 클럽 : " . ($ageChk && $colorChk) . "<br>";
    echo "Or 클럽 : " . ($ageChk || $colorChk) . "<br>";
    echo "Xor 클럽 : " . ($ageChk xor $colorChk) . "<br>";*/
    
    echo "And 클럽 : " . ($age <= 25+10 && $color == "빨강") . "<br>";
    echo "Or 클럽 : " . ($age <= 25+10 || $color == "빨강") . "<br>";
    echo "Xor 클럽 : " . ($age <= 25+10 xor $color == "빨강") . "<br>";
    
    echo "<h2>4. 증감연산자</h2>";
    $x = 5;
    echo "\$x : $x <br>";
    //$x = $x+1;
    $x++;
    echo "\$x : $x <br>";
    $x--;
    echo "\$x : $x <br>";
    //$x//;
    //$x**;
    //$x%%;
    echo "\$x : $x <br>";
   // $x++;
   //  ++$x;
   echo "\$x 후치 : " . $x++ ."<br>";
   //  echo "\$x 전치 : " . ++$x ."<br>";
    echo "\$x : $x <br>";
    
    $a=5; $b = 6; $c = 10;
  
    $d = $a++ + ++$c - $b-- * --$a  + $a++;
//        5   +   11  -  6  *  5    +  5
//        5   +   11  -  30    +  5    
    
        //$a : 6   ------------> 5   --> 6
        //     $c : 11
        //              $b : 5
        
     echo "\$a:".$a.'<br>';  // 6
     echo "\$b:".$b.'<br>';  // 5
     echo "\$c:".$c.'<br>';  // 11
     echo "\$d:".$d.'<br>';  // -9  
    
     echo "<h2>5. 대입연산자</h2>";
    $x = 5;
    echo "\$x : $x <br>";
    //$x = $x +3;
    $x+= 3;
    echo "\$x+= 3 : $x <br>";
    $x-= 2;
    echo "\$x-= 2 : $x <br>";
    $x*= 4;
    echo "\$x*= 4 : $x <br>";
    $x%= 9;
    echo "\$x%= 9 : $x <br>";
    $x**= 2;
    echo "\$x**= 2 : $x <br>";
    $x/= 3;
    echo "\$x/= 3 : $x <br>";
    
    echo "<h2>6. 3항연산자</h2>";
    echo (false ? "난 참이야" : "난 거짓 ") . "<br>";
    
    $jum = 58;
    $res = $jum >= 80 ? "합격" : "불합격";
    
    echo "$jum : $res <br>";
    
    $res = $jum >= 80 ? "우수" : ($jum >= 60 ? "정상" : "미달");
    
    echo "$jum : $res <br>";
?>    
</body>
</html>












