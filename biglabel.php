<?php
// Kết nối đến cơ sở dữ liệu
require_once "config.php";
require_once "db_module.php";
taoKetNoi($link);

if (isset($_GET['biglabel'])) {
    $selectedbiglabel = $_GET['biglabel'];
    
    if ($selectedbiglabel === "Top Wear") { // Kiểm tra xem giá trị tìm kiếm có rỗng hay không
        $selectedbiglabel = mysqli_real_escape_string($link, $selectedbiglabel); // Bảo mật giá trị tìm kiếm trước khi sử dụng    
$query = "SELECT p.*, pr.price, COUNT(pd.id_color) AS color_count
FROM Product AS p
LEFT JOIN ProductDetail AS pd ON p.id_product = pd.id_product
LEFT JOIN (
    SELECT id_product, MAX(datetime) AS max_datetime
    FROM Price
    GROUP BY id_product
) AS latest_price ON p.id_product = latest_price.id_product
LEFT JOIN Price AS pr ON latest_price.id_product = pr.id_product AND latest_price.max_datetime = pr.datetime
WHERE p.id_category = 1 OR p.id_category = 2 OR p.id_category = 3
GROUP BY p.id_product
        ";}
        else if ($selectedbiglabel === "Bottom Wear")
        {
            $query = "SELECT p.*, pr.price, COUNT(pd.id_color) AS color_count
            FROM Product AS p
            LEFT JOIN ProductDetail AS pd ON p.id_product = pd.id_product
            LEFT JOIN (
                SELECT id_product, MAX(datetime) AS max_datetime
                FROM Price
                GROUP BY id_product
            ) AS latest_price ON p.id_product = latest_price.id_product
            LEFT JOIN Price AS pr ON latest_price.id_product = pr.id_product AND latest_price.max_datetime = pr.datetime
            WHERE p.id_category = 4 OR p.id_category = 5 OR p.id_category = 6
            GROUP BY p.id_product
                    ";}
                    else if($selectedbiglabel === "Full Body Wear")
                    {
                        $query = "SELECT p.*, pr.price, COUNT(pd.id_color) AS color_count
                        FROM Product AS p
                        LEFT JOIN ProductDetail AS pd ON p.id_product = pd.id_product
                        LEFT JOIN (
                            SELECT id_product, MAX(datetime) AS max_datetime
                            FROM Price
                            GROUP BY id_product
                        ) AS latest_price ON p.id_product = latest_price.id_product
                        LEFT JOIN Price AS pr ON latest_price.id_product = pr.id_product AND latest_price.max_datetime = pr.datetime
                        WHERE p.id_category = 7 OR p.id_category = 8 
                        GROUP BY p.id_product
                                ";}
                        
                    


$result = chayTruyVanTraVeDL($link, $query);
if (!$result) {
   die("Lỗi truy vấn cơ sở dữ liệu");
}



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

if (!empty($selectedbiglabel)) {
    echo'<div class="result col-lg-12 col-12" style="height:100px">';
    echo '<h1 class="search-result" style="color: #000;  text-transform: uppercase;">' .$selectedbiglabel. '</h1>';
echo'</div>';}

if (isset($productHTML)) { 
    echo'<div class="new-arrival-inner">';
    echo'<div class="row new-arrival" style="font-family: "Inter", sans-serif;">';
    echo $productHTML; 
    echo'</div></div>';


    }
}
?>



