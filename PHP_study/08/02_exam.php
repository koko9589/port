<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_exam</title>
</head>
<body>
    <h1>02_exam</h1>
    <form action="examReg.php" method="post">
        <table border="">
            <tr>
                <td>이름</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>국어</td>
                <td><input type="text" name="kor"></td>
            </tr>
            <tr>
                <td>영어</td>
                <td><input type="text" name="eng"></td>
            </tr>
            <tr>
                <td>수학</td>
                <td><input type="text" name="mat"></td>
            </tr>
            <tr>
                <td>과학</td>
                <td><input type="text" name="sci"></td>
            </tr>
            <tr>
                <td>국사</td>
                <td><input type="text" name="his"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="입력">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>