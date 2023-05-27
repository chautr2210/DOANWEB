<?php
// Kết nối đến cơ sở dữ liệu
require_once "config.php";
require_once "db_module.php";
taoKetNoi($link);
if (isset($_POST['filterprice'])) {
   $filterprice = $_POST['filterprice'];
   
   if (!empty($filterprice)) { // Kiểm tra xem giá trị tìm kiếm có rỗng hay không
      $filterprice = mysqli_real_escape_string($link, $filterprice); // Bảo mật giá trị tìm kiếm trước khi sử dụng    

 
 
 $query = "SELECT p.*, pr.price, COUNT(pd.id_color) AS color_count
 FROM Product AS p
 LEFT JOIN ProductDetail AS pd ON p.id_product = pd.id_product
 LEFT JOIN (
     SELECT id_product, MAX(datetime) AS max_datetime
     FROM Price
     GROUP BY id_product
 ) AS latest_price ON p.id_product = latest_price.id_product
 LEFT JOIN Price AS pr ON latest_price.id_product = pr.id_product AND latest_price.max_datetime = pr.datetime

 GROUP BY p.id_product
 ";
if ($filterprice === "LowtoHigh") {
   $query .= " ORDER BY pr.price ASC";
} elseif ($filterprice === "HightoLow") {
   $query .= " ORDER BY pr.price DESC";
}
$result = chayTruyVanTraVeDL($link, $query);
if (!$result) {
   die("Lỗi truy vấn cơ sở dữ liệu");
}
// Tạo hàm để tạo mã HTML cho mỗi sản phẩm
function generateProductHTMLNew($thumbnail, $name, $price, $colorCount) {
    $html = '<div class="col-12 col-lg-4">';
    $html .= '<img src="' . $thumbnail . '" class="img" style="width: 352px; height: 439.26px;">';
    $html .= '<h3 class="ten-sp">' . $name . '</h3>';
    $html .= '<p class="giasp">$' . number_format($price) . ' </p>';
    $html .= '<p>' . $colorCount . ' Colors</p>';
    $html .= '</div>';
    return $html;
 }
 // Tạo một biến để lưu trữ mã HTML tạo ra
$productHTML = '';


// Lặp qua các kết quả và tạo mã HTML tương ứng
while ($row = mysqli_fetch_assoc($result)) {
   $thumbnail = $row['thumbnail'];
   $name = $row['name_product'];
   $price = $row['price'];
   $colorCount = $row['color_count'];
   $productId = $row['id_product'];
 
   $productHTML .= '<div class="col-12 col-lg-4">';
   $productHTML .= '<a href="detail.php?id=' . $productId . '" class="product-link">' . generateProductHTMLNew($thumbnail, $name, $price, $colorCount) . '</a>';
   $productHTML .= '</div>';




}
    
// Giải phóng bộ nhớ và đóng kết nối cơ sở dữ liệu
giaiPhongBoNho($link, $result);
}
}
?>


<!-- Sử dụng biến $productHTML để hiển thị danh sách sản phẩm -->
<div class="new-arrival-inner">
   <div class="row new-arrival" style="font-family: 'Inter', sans-serif;">
   <?php if (isset($productHTML)) { echo $productHTML; } ?>
   </div>
</div>