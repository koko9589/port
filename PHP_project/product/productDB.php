<?php
    include_once "../../dbconn.php";
    // 배열로 값 가져옴
    $select = $_POST["product_select"];
    $pcode=$_POST["product_pcode"];
    $qty=str_replace(",","",$_POST["product_qty"]);
    $price=str_replace(",","",$_POST["product_price"]);
    $memo=$_POST["product_memo"];
    $recommend=$_POST['product_recommend'];


    // $tel=$_POST["product_tel"];
    // $image= $_FILES["product_file"];
    $date = date('Y-m-d H:i:s');
    $count=count($_POST["product_count"]);



    //이미지파일 타입검사
    $imageKind = array ('image/pjpeg', 'image/jpeg', 'image/JPG','image/jpg', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');




    for($i=0; $i<$count; $i++)
    {

        $file_num = $i+1;

        $file = $_FILES['product_file_'.$file_num];
        $file_name = $file['name'];
        $file_type = $file['type'];
        $file_tmp = $file['tmp_name'];


        // $image_name[$i] = str_replace('.',"_".date('H:i').".",$image_name[$i]); //파일중복 없애기 위해서 파일명_시간.jpg
        for($j=0; $j<count($file_name); $j++)
        {
            //한글파일 업로드 가능 $_FILES['product_file']['name']
            $file_name[$j] = iconv("EUC-KR","UTF-8",$file_name[$j]);

            if (move_uploaded_file($file_tmp[$j], '../../product_img/'.$file_name[$j]))
            {
                // DB 한글 저장
                $file_name[$j] = iconv("UTF-8","EUC-KR",$file_name[$j]);
            }
        }
                $category = explode(";",$select[$i]); // [0] 대분류 , [1] 중분류
                $sql = "INSERT INTO `product` (`idx`, `category1`,`category2`, `pcode`, `short_description`, `long_description`, `qty`, `price`, `memo`, `thumbnail1`, `thumbnail2`, `thumbnail3`, `thumbnail4`, `recommend`,`date`) VALUES (NULL,'$category[0]','$category[1]','$pcode[$i]', '', '', '$qty[$i]','$price[$i]','$memo[$i]', '$file_name[0]','$file_name[1]','$file_name[2]','$file_name[3]','$recommend[$i]','$date')";
                $result = mysql_query($sql,$connect);
                echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/><script>alert('추가하였습니다.');location.replace('add.html')</script>";

            // echo "<meta charset=utf-8\"/><script>alert('error');window.history.back();</script>";
    // }

}
 ?>
