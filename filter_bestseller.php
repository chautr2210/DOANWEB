<?php
// Kết nối đến cơ sở dữ liệu
require_once "config.php";
require_once "db_module.php";
taoKetNoi($link);


// Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm và số lượng màu
$query = "SELECT p.*, pr.price, COUNT(pd.id_color) AS color_count
         FROM Product AS p
         LEFT JOIN ProductDetail AS pd ON p.id_product = pd.id_product
         LEFT JOIN (
             SELECT id_product, MAX(datetime) AS max_datetime
             FROM Price
             GROUP BY id_product
         ) AS latest_price ON p.id_product = latest_price.id_product
         LEFT JOIN Price AS pr ON latest_price.id_product = pr.id_product AND latest_price.max_datetime = pr.datetime
         WHERE p.bestseller = '1'
         GROUP BY p.id_product
         LIMIT 8";
         


$result = chayTruyVanTraVeDL($link, $query);
if (!$result) {
   die("Lỗi truy vấn cơ sở dữ liệu");
}

// Đếm số lượng kết quả
$resultCount = mysqli_num_rows($result);

// Tạo hàm để tạo mã HTML cho mỗi sản phẩm
function generateProductHTML($thumbnail, $name, $price, $colorCount) {
   $html = '<div class="col">';
   $html .= '<img src="' . $thumbnail . '" class="img-fluid" alt="Product Image" style="width: 352px; height: 439.26px;" >';
   $html .= '<h3 class="ten-sp text-truncate" title="' . $name . '">' . $name . '</h3>';
   $html .= '<p class="giasp">$' .$price . ' </p>';
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
   $productHTML .= '<a href="detail.php?id=' . $productId . '" class="product-link">' . generateProductHTML($thumbnail, $name, $price, $colorCount) . '</a>';
   $productHTML .= '</div>';


}


// Giải phóng bộ nhớ và đóng kết nối cơ sở dữ liệu
giaiPhongBoNho($link, $result);
?>

<div class="result col-lg-12 col-12" style="height:100px">
<?php 
echo '<h3 class="search-result">' . $resultCount . ' Results for "Best Seller"</h3>';
?>
</div>

<!-- Sử dụng biến $productHTML để hiển thị danh sách sản phẩm -->
<div class="new-arrival-inner">
   <div class="row new-arrival" style="font-family: 'Inter', sans-serif;">
       <?php echo $productHTML; ?>
   </div>
</div>