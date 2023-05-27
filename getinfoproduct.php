<?php
require_once "config.php";
require_once "db_module.php";

// Thiết lập kết nối đến cơ sở dữ liệu
taoKetNoi($link);

// Lấy ID sản phẩm từ URL
$productId = $_GET['id'];

// Truy vấn dữ liệu từ cơ sở dữ liệu để lấy thông tin sản phẩm
$sql = "SELECT * FROM Product WHERE id_product = $productId";
$result = chayTruyVanTraVeDL($link, $sql);

// Kiểm tra và lấy thông tin sản phẩm
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tensp = $row["name_product"];
    $dessp = $row["description"];
    $thumsp = $row["thumbnail"];
} else {
    $tensp = null;
    $dessp = "";
    $thumsp = null;
}

// Truy vấn dữ liệu từ cơ sở dữ liệu để lấy giá sản phẩm
$sql = "SELECT p.*, pr.price
        FROM Product AS p
        LEFT JOIN (
            SELECT id_product, MAX(datetime) AS max_datetime
            FROM Price
            GROUP BY id_product
        ) AS latest_price ON p.id_product = latest_price.id_product
        LEFT JOIN Price AS pr ON latest_price.id_product = pr.id_product AND latest_price.max_datetime = pr.datetime
        WHERE p.id_product = $productId";
$result = chayTruyVanTraVeDL($link, $sql);

// Kiểm tra và lấy thông tin giá sản phẩm
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $giasp = $row["price"];
} else {
    $giasp = null;
}

// Truy vấn dữ liệu từ cơ sở dữ liệu để lấy thông tin màu sản phẩm
$sql = "SELECT name_color
        FROM ProductDetail join Color on ProductDetail.id_color=Color.id_color
        WHERE id_product = $productId";
$result = chayTruyVanTraVeDL($link, $sql);
// Mảng để lưu trữ tất cả các màu sản phẩm
$mauspArray = array();

// Kiểm tra và lấy thông tin màu sản phẩm
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Thêm màu vào mảng
        $mauspArray[] = $row["name_color"];
    }
} else {
    $mausp = null;
}

// Truy vấn dữ liệu từ cơ sở dữ liệu để lấy thông tin size sản phẩm
$sql = "SELECT name_size FROM Size";
$result = chayTruyVanTraVeDL($link, $sql);
// Mảng để lưu trữ tất cả các size sản phẩm
$sizespArray = array();

// Kiểm tra và lấy thông tin size sản phẩm
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Thêm size vào mảng
        $sizespArray[] = $row["name_size"];
    }
} else {
    $sizesp = null;
}
?>


    <div class="row">
        <div class="tensp col-lg-12 col-12 d-flex align-items-center" style="height: 100px; border-bottom: 1px solid #e5e5e5;">
            <h2 style="margin-bottom: 1rem; text-align: center;"><?php echo $tensp; ?></h2>
        </div>
        <div class="giasp col-lg-12 col-12 d-flex align-items-center" style="height: 100px; border-bottom: 1px solid #e5e5e5;">
            <h4 style="margin-top: 1rem;"><?php echo "$" . $giasp; ?></h4>
        </div>
        <div class="mausp col-lg-12 col-12 d-flex align-items-center" style="height: 150px; border-bottom: 1px solid #e5e5e5;">
            <?php
            if (!empty($mauspArray)) {
                foreach ($mauspArray as $mausp) {
                    echo '<button class="color-button" style="background-color: ' . $mausp . ';" onclick="selectButtonColor(this)"></button>';
                }
            }
            ?>
        </div>
        <div class="sizesp col-lg-12 col-12 d-flex align-items-center" style="height: 100px; border-bottom: 1px solid #e5e5e5;">
            <?php
            if (!empty($sizespArray)) {
                foreach ($sizespArray as $sizesp) {
                    echo '<button class="size-button" onclick="selectButtonSize(this)">' . $sizesp . '</button>';
                }
            }
            ?>
        </div>
        <div class="soluongsp col-lg-12 col-12 d-flex align-items-center" style="height: 100px">
            <input type="button" value="-" onclick="minusQuantity()" class="qty-btn">
            <input type="text" id="quantity" name="quantity" value="1" min="1" class="quantity-selector" style="text-align: center;">
            <input type="button" value="+" onclick="plusQuantity()" class="qty-btn">
        </div>

        <div class="btnaddtocart col-lg-12 col-12" style="height: 100px;">
        <form action="cart.php" method="POST" onsubmit="return validateForm();">
    <input type="hidden" name="hinhsp" value="<?php echo $thumsp; ?>">
    <input type="hidden" name="tensp" value="<?php echo $tensp; ?>">
    <input type="hidden" name="giasp" value="<?php echo $giasp; ?>">
    <input type="hidden" id="selectedColorInput" name="selectedColor" value="">
    <input type="hidden" id="selectedSizeInput" name="selectedSize" value="">
    <!-- Thêm một input ẩn để lưu giá trị quantity -->
    <input type="hidden" id="quantityInput" name="quantity" value="1">

    <input type="submit" name="addcart" class="btn add-to-cart-button" style="border: 2px solid black; width: 200px; height: 50px" value="ADD TO CART">
</form>

        </div>
        <div class="detailsp col-lg-12 col-12" style="height: 200px; text-align: justify;">
            <span style="font-family: 'font-size:Noto Sans' sans-serif; font-size: 20px; font-weight: bold;">DESCRIPTION</span>
            <h6 style="font-family: 'font-size:LB-sans' sans-serif; font-size: 18px; font-weight: normal;"><?php echo $dessp; ?></h6>
        </div>
    </div>

