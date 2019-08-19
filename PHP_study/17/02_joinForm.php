<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>02_joinForm</title>
</head>
<body>
    <h1>02_joinForm</h1>
    <form action="joinReg.php">
        <table border="">
            <tr>
                <td>id</td>
                <td><input type="text" name="pid"></td>
            </tr>
            <tr>
                <td>이름</td>
                <td><input type="text" name="pname"></td>
            </tr>
            <tr>
                <td>암호</td>
                <td><input type="text" name="pw"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="등록">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>