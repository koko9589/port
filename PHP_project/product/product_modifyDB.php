<?php


include_once "../../dbconn.php";


$idx = $_POST['modify_idx'];
$num = $_POST['modify_num'];
$category = iconv("UTF-8","EUC-KR",$_POST["modify_select"]);
$category = explode(";",$category); //

$pcode = iconv("UTF-8","EUC-KR",$_POST["modify_pcode"]);
$qty = str_replace(",","",$_POST["modify_qty"]);
$price = str_replace(",","",$_POST["modify_price"]);
$memo = iconv("UTF-8","EUC-KR",$_POST["modify_memo"]);
$recommend = $_POST['modify_recommend'];
$del_yn = $_POST['del_yn'];
$align = $_POST['modify_align'];

// $tel = iconv("UTF-8","EUC-KR",$_POST["modify_tel"]);


$sql = "UPDATE product SET category1='$category[0]',category2='$category[1]', pcode='$pcode',qty='$qty',price='$price', recommend='$recommend', del_yn = '$del_yn', align='$align' WHERE idx='$idx'";
$result = mysql_query($sql,$connect);

$sql = "SELECT * FROM product WHERE idx='$idx'";
$result = mysql_query($sql,$connect);
$data = mysql_fetch_array($result);
 ?>
<td><?=$data['idx']?></td>
<td><?=$data['align']?></td>
<td><?=$data['del_yn']?></td>
<td class="img_td" style="height:40px;"  onclick="modal(<?=$data['idx']?>,<?=$num?>,'목록')" title="크게보기"><img src="/product_img/<?=iconv("EUC-KR","UTF-8",$data['thumbnail1'])?>" style="height:100%;padding-bottom:5px;"  alt="" id="myImg_<?=$num?>" onerror="this.src='/product_img/preparing.jpg'"/></td>
<td><?=iconv("EUC-KR","UTF-8",$data['category1'])?></td>
<td><?=iconv("EUC-KR","UTF-8",$data['category2'])?></td>
<td><a href="view.html?idx=<?=$data[idx]?>" class="ellis" title="<?=$data['pcode']?>"><?=iconv("EUC-KR","UTF-8",$data['pcode'])?></a></td>
<td><?=number_format($data['qty'])?></td>
<td><?=number_format($data['price'])?></td>
<td><?=$data['recommend']?></td>
<td  onclick="hide(<?=$num?>,'<?=iconv("EUC-KR","UTF-8",$data['category1'])?>','<?=iconv("EUC-KR","UTF-8",$data['category2'])?>');" ><img src="../images/btn_edit.gif" ></td>
<td onclick="deleteRow('<?=$data['idx']?>',<?=$num?>);"><img src="../images/btn_del.gif" ></td>
