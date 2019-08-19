<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_joinForm</title>
</head>
<body>
    <h1>01_joinForm</h1>
<form action="joinReg.php" method="post">
    <table border="">
        <tr>
            <td>아이디</td>
            <td>
               <input type="text" name="pid" value="aaa">
               <input type="button" value="중복확인">
            </td>
        </tr>
        <tr>
            <td>암호</td>
            <td><input type="password" name="pw"></td>
        </tr>
        <tr>
            <td>성별</td>
            <td>
                <input type="radio" name="gender" value="m">남자
                <input type="radio" name="gender" value="f" checked>여자
                <input type="radio" name="gender" value="it">it인
            </td>
        </tr>
        <tr>
            <td>취미</td>
            <td>
                <input type="checkbox" name="hobby[]" value="fish" checked>낚시
                <input type="checkbox" name="hobby[]" value="swim">수영
                <input type="checkbox" name="hobby[]" value="climb" checked>등산
            </td>
        </tr>
        <tr>
            <td>이메일</td>
            <td><input type="text" name="email1">@
                <select name="email2">
                    <option value="google.com">구글</option>
                    <option value="naver.com">네이버</option>
                    <option value="daum.net" selected>다음</option>
                    <option value="nate.com">네이트</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>파일</td>
            <td><input type="file" name="upfile"></td>
        </tr>
        <tr>
            <td>자기 소개</td>
            <td><textarea name="content" cols="50" rows="5">내 소는 황소에요
내 개는 흰둥이?
야옹야옹
            </textarea></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="가입">
                <input type="reset" value="초기화">
            </td>
        </tr>
    </table>
</form> 
</body>
</html>