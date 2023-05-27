<?php
// Kết nối đến cơ sở dữ liệu
require_once "config.php";
require_once "db_module.php";
taoKetNoi($link);


if (!empty($_POST['color'])) {
    $selectedColor = mysqli_real_escape_string($link, $_POST['color']);;
   
    if (!empty($selectedColor)) {
        // Truy vấn để lấy id_category tương ứng với tên category
        $colorQuery = "SELECT id_color FROM Color WHERE name_color = '$selectedColor'";
        $colorResult = chayTruyVanTraVeDL($link, $colorQuery);


        if ($colorResult->num_rows > 0) {
        $row = $colorResult->fetch_assoc();
        $selectedColorId = $row['id_color'];
        $selectedColor = mysqli_real_escape_string($link, $selectedColor);}
       
$query = "SELECT final.*, COUNT(pd.id_product) AS color_total
FROM ProductDetail AS pd
INNER JOIN (
    SELECT p.*, pr.price, pd.picture
    FROM Product AS p
    LEFT JOIN ProductDetail AS pd ON p.id_product = pd.id_product
    LEFT JOIN (
        SELECT id_product, MAX(datetime) AS max_datetime
        FROM Price
        GROUP BY id_product
    ) AS latest_price ON p.id_product = latest_price.id_product
    LEFT JOIN Price AS pr ON latest_price.id_product = pr.id_product AND latest_price.max_datetime = pr.datetime
    LEFT JOIN Color AS c ON pd.id_color = c.id_color
    WHERE pd.id_color = $selectedColorId
    GROUP BY p.id_product
) AS final ON pd.id_product = final.id_product GROUP BY pd.id_product";
 
 if (isset($_POST['filterprice'])) {
    $filterprice = $_POST['filterprice'];
    
    if (!empty($filterprice)) { // Kiểm tra xem giá trị tìm kiếm có rỗng hay không
       $filterprice = mysqli_real_escape_string($link, $filterprice); // Bảo mật giá trị tìm kiếm trước khi sử dụng 
       if ($filterprice === "LowtoHigh") {
        $query .= " ORDER BY final.price ASC";
     } elseif ($filterprice === "HightoLow") {
        $query .= " ORDER BY final.price DESC";
     }
    }
}

$result = chayTruyVanTraVeDL($link, $query);
if (!$result) {
   die("Lỗi truy vấn cơ sở dữ liệu");
}

// Đếm số lượng kết quả
$resultCount = mysqli_num_rows($result);

// Tạo hàm để tạo mã HTML cho mỗi sản phẩm
function generateProductHTMLNew($thumbnail, $name, $price, $colorCount) {
    $html = '<div class="col">';
   $html .= '<img src="' . $thumbnail . '" class="img-fluid" alt="Product Image" style="width: 352px; height: 439.26px;">';
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
   $thumbnail = $row['picture'];
   $name = $row['name_product'];
   $price = $row['price'];
   $colorCount = $row['color_total'];
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

<div class="result col-lg-12 col-12" style="height:100px">
<?php if (!empty($selectedColor)) {
echo '<h3 class="search-result">' . $resultCount . ' Results for "' . $selectedColor . '"</h3>';
}?>
</div>

<!-- Sử dụng biến $productHTML để hiển thị danh sách sản phẩm -->
<div class="new-arrival-inner">
   <div class="row new-arrival" style="font-family: 'Inter', sans-serif;">
   <?php if (isset($productHTML)) { echo $productHTML; } ?>
   </div>
</div>
