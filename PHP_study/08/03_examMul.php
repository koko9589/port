<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>03_examMul</title>
</head>
<body>
    <h1>03_examMul</h1>
    <form action="examMulReg.php" method="post">
        <table border="">
           <tr  align="center">
               <td>이름</td>
               <td>국어</td>
               <td>영어</td>
               <td>수학</td>
           </tr>
<? for($i =0 ; $i <5; $i++)  { ?>           
            <tr>
                <td><input type="text" name="name[]"></td>
                <td><input type="text" name="kor[]"></td>
                <td><input type="text" name="eng[]"></td>
                <td><input type="text" name="mat[]"></td>
            </tr>
<? } ?>            
            <tr>
               <td colspan="4" align="center">
                   <input type="submit" value="입력">
               </td>
           </tr>
        </table>
    </form>
    
</body>
</html>