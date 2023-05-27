<?php
require_once "config.php";
require_once "db_module.php";
// Thiết lập kết nối đến cơ sở dữ liệu
taoKetNoi($link);
// Lấy ID sản phẩm từ URL
$productId = $_GET['id'];

// Truy vấn dữ liệu từ cơ sở dữ liệu
$sql = "SELECT Product.*, Category.name_category from Product join Category on Product.id_category=Category.id_category
WHERE id_product = $productId";
$result = chayTruyVanTraVeDL($link, $sql);

// Kiểm tra và lấy thông tin sản phẩm
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tensp = $row["name_product"];
    $phanloaisp = $row["name_category"];
} else {
    $tensp = null;
    $phanloaisp = null;
}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="filter.php?category=<?php echo $phanloaisp; ?>"><?php echo ucfirst(strtolower($phanloaisp)); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $tensp; ?></li>
  </ol>
</nav>