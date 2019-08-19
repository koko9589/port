<?php
    include_once "../../dbconn.php";

    $idx = $_POST['idx'];
    $sql = "update product set del_yn = 'Y' WHERE idx='$idx'";
    $result = mysql_query($sql,$connect);
 ?>
