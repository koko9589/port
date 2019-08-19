<?
    extract($_REQUEST);

    if( !isset($main) ){
        $main = 'info';
    }

    if( !isset($gg) ){
        $gg = 'spring';
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>03_template</title>
</head>
<body>
    <h1>03_template</h1>
    <table width="600px">
        <tr>
            <td><? include "inc/header.php"; ?></td>
        </tr>
        <tr  align="center">
            <td><? include "main/$main.php"; ?></td>
        </tr>
        <tr  align="center">
            <td><? include "inc/footer.php"; ?></td>
        </tr>
    </table>
</body>
</html>