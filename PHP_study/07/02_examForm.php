<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_examForm</title>
</head>
<body>
    <h1>02_examForm</h1>
    <form action="examReg.php" method="post">
        <table border="">
            <tr>
                <td>이름</td>
                <td>국어</td>
                <td>영어</td>
                <td>수학</td>
            </tr>
<? for($i =0; $i<5; $i++) { ?>            
            <tr>
                <td><input type="text" name="pname[]"></td>
                <td><input type="text" name="kor[]"></td>
                <td><input type="text" name="eng[]"></td>
                <td><input type="text" name="mat[]"></td>
            </tr>
<? } ?>            
            <tr>
                <td colspan="4" align="right">
                    <input type="submit" value="등록">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>