<?
//클릭시 정렬
$align_idx = $_GET['align_idx'];
$align_category1 = $_GET['align_category1'];
$align_category2 = $_GET['align_category2'];
$align_pcode = $_GET['align_pcode'];
$align_qty = $_GET['align_qty'];
$align_price = $_GET['align_price'];
$align_recommend = $_GET['align_recommend'];
$align_align = $_GET['align_align']; 

if($align_idx == "desc")$sql = "SELECT * FROM product ORDER BY idx DESC LIMIT $pages,$view_page";
else if($align_idx=="asc")$sql = "SELECT * FROM product ORDER BY idx ASC LIMIT $pages,$view_page";

if($align_align == "desc")$sql = "SELECT * FROM product ORDER BY align DESC LIMIT $pages,$view_page";
else if($align_align=="asc")$sql = "SELECT * FROM product ORDER BY align ASC LIMIT $pages,$view_page";


if($align_category1 == "desc")$sql = "SELECT * FROM product ORDER BY category1 DESC LIMIT $pages,$view_page";
else if($align_category1=="asc")$sql = "SELECT * FROM product ORDER BY category1 ASC LIMIT $pages,$view_page";

if($align_category2 == "desc")$sql = "SELECT * FROM product ORDER BY category2 DESC LIMIT $pages,$view_page";
else if($align_category2=="asc")$sql = "SELECT * FROM product ORDER BY category2 ASC LIMIT $pages,$view_page";

if($align_pcode == "desc")$sql = "SELECT * FROM product ORDER BY pcode DESC LIMIT $pages,$view_page";
else if($align_pcode=="asc")$sql = "SELECT * FROM product ORDER BY pcode ASC LIMIT $pages,$view_page";

if($align_qty == "desc")$sql = "SELECT * FROM product ORDER BY qty DESC LIMIT $pages,$view_page";
else if($align_qty=="asc")$sql = "SELECT * FROM product ORDER BY qty ASC LIMIT $pages,$view_page";

if($align_price == "desc")$sql = "SELECT * FROM product ORDER BY price DESC LIMIT $pages,$view_page";
else if($align_price=="asc")$sql = "SELECT * FROM product ORDER BY price ASC LIMIT $pages,$view_page";

if($align_recommend == "desc")$sql = "SELECT * FROM product ORDER BY recommend DESC LIMIT $pages,$view_page";
else if($align_recommend=="asc")$sql = "SELECT * FROM product ORDER BY recommend ASC LIMIT $pages,$view_page";



if($search_value != "") {
// 검색된 개수 찾기
$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY idx asc, date asc ";
$result = mysql_query($sql,$connect);
$search_total = mysql_num_rows($result);

// 검색된 결과
$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY idx asc, date asc LIMIT $pages,$view_page";

// 검색후 정렬 sql
if($align_idx == "desc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY idx DESC LIMIT $pages,$view_page";
else if($align_idx=="asc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY idx ASC LIMIT $pages,$view_page";

if($align_category1 == "desc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY category1 DESC LIMIT $pages,$view_page";
else if($align_category1=="asc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY category1 ASC LIMIT $pages,$view_page";

if($align_category2 == "desc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY category2 DESC LIMIT $pages,$view_page";
else if($align_category2 == "asc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY category2 ASC LIMIT $pages,$view_page";

if($align_pcode == "desc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY pcode DESC LIMIT $pages,$view_page";
else if($align_pcode=="asc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY pcode ASC LIMIT $pages,$view_page";

if($align_qty == "desc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY qty DESC LIMIT $pages,$view_page";
else if($align_qty=="asc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY qty ASC LIMIT $pages,$view_page";

if($align_price == "desc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY price DESC LIMIT $pages,$view_page";
else if($align_price=="asc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY price ASC LIMIT $pages,$view_page";

if($align_recommend == "desc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY recommend DESC LIMIT $pages,$view_page";
else if($align_recommend=="asc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY recommend ASC LIMIT $pages,$view_page";

if($align_align == "desc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY align DESC LIMIT $pages,$view_page";
else if($align_align=="asc")$sql = "SELECT * FROM product WHERE category1 LIKE '%$search_value%' or category2 LIKE '%$search_value%' or pcode LIKE '%$search_value%' or recommend LIKE '%$search_value%' ORDER BY align ASC LIMIT $pages,$view_page";


//총 페이지
$search_page = ceil($search_total/$view_page); // 70개 / 10 = 7개
$search_block = ceil($search_page/$b_page);

if ($b_end_page > $search_page)$b_end_page = $search_page;

$result = mysql_query($sql,$connect);
}



?>
