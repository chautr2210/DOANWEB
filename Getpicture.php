<?php
require_once "config.php";
require_once "db_module.php";

// Thiết lập kết nối đến cơ sở dữ liệu
taoKetNoi($link);

// Lấy ID sản phẩm từ URL
$productId = $_GET['id'];

// Truy vấn cơ sở dữ liệu để lấy thông tin hình ảnh của sản phẩm
$sql = "SELECT picture FROM ProductDetail WHERE id_product = '$productId'";
$result = chayTruyVanTraVeDL($link, $sql);

// Kiểm tra và lặp qua kết quả truy vấn
if ($result->num_rows > 0) {
    $imagePaths = array();

    // Lặp qua các hàng dữ liệu
    while ($row = $result->fetch_assoc()) {
        // Lưu đường dẫn hình ảnh vào mảng
        $imagePaths[] = $row["picture"];
    }
} else {
    echo "Không có dữ liệu hình ảnh trong cơ sở dữ liệu.";
}
?>


    <div class="carousel-inner">
        <?php
        // Kiểm tra và hiển thị các hình ảnh
        if (!empty($imagePaths)) {
            foreach ($imagePaths as $index => $imagePath) {
                $activeClass = ($index == 0) ? "active" : "";
                ?>
                <div class="carousel-item <?php echo $activeClass; ?>">
                    <img src="<?php echo $imagePath; ?>" class="d-block w-100" alt="slide <?php echo ($index + 1); ?>">
                </div>
                <?php
            }
        } else {
            echo '<div class="carousel-item active">Không có hình ảnh.</div>';
        }
        ?>
    </div>

    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>


    

