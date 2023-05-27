<?php
   session_start();
   if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
   
   // Làm rỗng giỏ hàng
   if (isset($_GET['delcart']) && ($_GET['delcart'] == 1)) unset($_SESSION['giohang']);
   
   // Xóa sản phẩm trong giỏ hàng
   if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
       array_splice($_SESSION['giohang'], $_GET['delid'], 1);
   }
   
   // Lấy dữ liệu từ form
   if (isset($_POST['addcart']) && ($_POST['addcart'])) {
       $hinh = $_POST['hinhsp'];
       $tensp = $_POST['tensp'];
       $gia = $_POST['giasp'];
       $mau = $_POST['selectedColor'];
       $size = $_POST['selectedSize'];
       $soluong = $_POST['quantity'];
   
       // Kiểm tra sản phẩm có trong giỏ hàng hay không?
       $fl = 0; // Kiểm tra sản phẩm có trùng trong giỏ hàng không?
       for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        if ($_SESSION['giohang'][$i][1] == $tensp && $_SESSION['giohang'][$i][3] == $mausp && $_SESSION['giohang'][$i][4] == $sizesp) {
               $fl = 1;
               $soluongnew = $soluong + $_SESSION['giohang'][$i][5];
               $_SESSION['giohang'][$i][5] = $soluongnew;
               break;
           }
       }
   
       // Nếu không trùng sản phẩm trong giỏ hàng thì thêm mới
       if ($fl == 0) {
           // Thêm mới sản phẩm vào giỏ hàng
           $sp = [$hinh, $tensp, $gia, $mau, $size, $soluong];
           $_SESSION['giohang'][] = $sp;
       }
   
       // Chuyển hướng đến trang cart.php sau khi xử lý form
       header('Location: cart.php');
       exit(); // Đảm bảo kết thúc kịch bản sau khi chuyển hướng
   }
   
   // Xử lý cập nhật số lượng sản phẩm
   if (isset($_POST['update_quantity_id']) && isset($_POST['updated_quantity'])) {
       $id = $_POST['update_quantity_id'];
       $updatedQuantity = $_POST['updated_quantity'];
   
       // Kiểm tra giá trị hợp lệ của số lượng (ví dụ: không âm)
       if ($updatedQuantity >= 1) {
           $_SESSION['giohang'][$id][5] = $updatedQuantity;
       }
   }
   
 
    

    function showgiohang(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][5];
                    $tong+=$tt;
                    echo '<tr>
                           
                            <td><img src="'.$_SESSION['giohang'][$i][0].'" alt=""></td>
                            <td>'.$_SESSION['giohang'][$i][1].'</td>
                            <td><span>$</span>'.$_SESSION['giohang'][$i][2].'</td>
                            <td>'.$_SESSION['giohang'][$i][3].'</td>
                            <td>'.$_SESSION['giohang'][$i][4].'</td>
                            <td>
                            <form method="post" action="cart.php">
                            <input type="hidden" name="update_quantity_id" value="'.$i.'">
                            <div class="quantity" style="display: flex; align-items: center;">
                                <button type="button" class="quantity-minus">-</button>
                                <input type="text" id="quantityInput'.$i.'" name="updated_quantity" value="'.$_SESSION['giohang'][$i][5].'" min="1" style="width: 100px; height: 35px; border: 1px solid #dddddd; margin-right: 0; background: #fff; text-align:center">

                                <button type="button" class="quantity-plus">+</button>
                                
                            </div>
                            </form>                        
                            </td>
                            
                            <td style="border: none;">
  <a href="cart.php?delid='.$i.'">
    <img src="https://i.imgur.com/Gm3ZgCd.png" alt="Xóa" style="width: 27px; height: 27px;">
  </a>
</td>



                        </tr>';
                }
                echo '<tr>
                <th class="tongdonhang" colspan="5" style="text-align: right;">Total</th>

                <th class="tongdonhang">
                    <div id="tongdonhang"><span>$</span>'.$tong.'</div>
                </th>
            </tr>';
            }else{
                
            }    
        }
    }
    
   

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    
    <title>Shopping Cart | View Cart</title>
    <link rel="stylesheet" href="stylecart.css">
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <!-- Thanh Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top " style="height:100px">
    <div class="container-fluid ">
        <!-- Brand logo -->      
        <a class="navbar-brand ml-10" href="index.php">
    <img src="https://i.imgur.com/FyDYwin.png" style="height:100px">
</a>
       
        <button id="navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- nav item -->
        <!-- nav item -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- Shop -->
                <li class="nav-item ml-5 dropdown">
                    <a class="nav-link header-menu-title dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                    <div class="dropdown-menu custom-mega-menu" style="border:none; " aria-labelledby="navbarDropdown">
                        <div class="container container-shop mt-3 mb-3 " >
                            <div class="row row-shop ml-0 " >
                                <div class="col-lg-12 mega-menu menu-index-2 mega-menu-san-pham"  >
                                    <div class="mega-menu-inner d-flex flex-wrap    ">
                                        <!-- Thêm class "flex-wrap" để các cột được xuống dòng khi không đủ không gian -->
                                        <div class="item-mega-menu col-lg-4 col-md-6  ">
                                        <h3><a href="filter.php?biglabel=Top%20Wear">TOP WEAR</a></h3>
                                            <ul>
                                                <li><a href="filter.php?category=T-shirts">T-shirts</a></li>
                                                <li><a href="filter.php?category=Sweaters">Sweaters</a></li>
                                                <li><a href="filter.php?category=Blouses">Blouses</a></li>
                                            </ul>
                                        </div>
                                        <div class="item-mega-menu col-lg-4 col-md-6">
                                            <h3><a href="filter.php?biglabel=Bottom%20Wear">BOTTOM WEAR</a></h3>
                                            <ul>
                                                <li><a href="filter.php?category=Pants">Pants</a></li>
                                                <li><a href="filter.php?category=Shorts">Shorts</a></li>
                                                <li><a href="filter.php?category=Skirts">Skirts</a></li>
                                            </ul>
                                        </div>
                                        <div class="item-mega-menu col-lg-4 col-md-6">
                                            <h3><a href="filter.php?biglabel=Full%20Body%20Wear">FULL BODY WEAR</a></h3>
                                            <ul>
                                                <li><a href="filter.php?category=Dresses">Dresses</a></li>
                                                <li><a href="filter.php?category=Jumpsuits">Jumpsuits</a></li>
                                            </ul>
                                        </div>
                                
                                    </div>
                    <!-- Đóng thẻ div class="mega-menu-inner" -->
                </div>
            </div>
            <!-- Đóng thẻ div class="row" -->
        </div>
        <!-- Đóng thẻ div class="container-fluid mt-3 mb-3" -->
    </div>
    <!-- Đóng thẻ div class="shadow dropdown-menu custom-mega-menu" -->
</li>

                <!-- About Us -->
                <li class="nav-item ml-5">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="#">Policies</a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="#">Stores</a>
                </li>
            </ul>
        </div>
        <!-- thanh search -->
        <div class="search-container "> 
       
        <form id="searchForm" action="filter.php" method="GET" class="d-flex mr-2 no-collapse">
                <input type="hidden" name="type" value="product">
                <input id="searchInput" type="text" class="w-100" name="q" value="" placeholder="Search" style="border: 0; height: 24px; border-bottom: 1px solid #AFAFAF; outline: none; background: transparent;">
            </form>
        
        <a href="#" class="header-link__display no-collapse">
            <svg id="searchIcon" width="23" height="23" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 23">
                <defs>
                    <style>.cls-1,.cls-2{fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:1.26px;}.cls-2{stroke-linecap:round;}</style>
                </defs>
                <circle class="cls-1" cx="7.53" cy="7.64" r="6.77"></circle>
                <line class="cls-2" x1="19.15" y1="19.23" x2="12.47" y2="12.54"></line>
            </svg>
        </a>
        <script>
                      function performSearch() {
                        // Lấy giá trị từ ô input
                        var searchValue = document.getElementById("searchInput").value;
                        // Kiểm tra nếu giá trị không rỗng thì submit form
                        if (searchValue.trim() !== "") {
                          document.getElementById("searchForm").submit();
                        }
                      }
                      document.getElementById("searchIcon").addEventListener("click", function(event) {
                      event.preventDefault(); // Ngăn chặn chuyển hướng khi nhấn vào biểu tượng
                      performSearch(); // Gọi hàm thực hiện tìm kiếm
                    });
             </script>
        </div>
        <!-- Icon user -->
  <a class="icon-right-header1 d-inline-block text-decoration-none  customer-name" href="/account">
			
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M43,31a12,12,0,1,0-20.092,8.852.779.779,0,0,0,.139.123,11.968,11.968,0,0,0,15.905,0,.777.777,0,0,0,.138-.122A11.97,11.97,0,0,0,43,31ZM20.558,31a10.442,10.442,0,1,1,18.109,7.078,9.133,9.133,0,0,0-3.5-3.118,9.241,9.241,0,0,0-1.025-.443,5.454,5.454,0,1,0-6.285,0,9.167,9.167,0,0,0-4.526,3.559A10.4,10.4,0,0,1,20.558,31Zm6.545-.935a3.9,3.9,0,1,1,3.9,3.9A3.9,3.9,0,0,1,27.1,30.065Zm-2.61,9.093a7.638,7.638,0,0,1,13.013,0,10.41,10.41,0,0,1-13.013,0Z" transform="translate(-19 -19)"></path></svg>
			
		</a>
        <!-- icon giỏ hàng -->
        <a class="icon-right-header2 d-inline-block text-decoration-none position-relative ml-4 no-collapse" href="cart.php">
           
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 27 23">
                <g transform="translate(17220.5 23152.5)">
                    <path d="M1.857,22A1.861,1.861,0,0,1,0,20.138V1.862A1.861,1.861,0,0,1,1.857,0H24.143A1.861,1.861,0,0,1,26,1.862V20.138A1.861,1.861,0,0,1,24.143,22Zm-.169-1.862a.169.169,0,0,0,.169.169H24.143a.169.169,0,0,0,.169-.169V5.754H1.688Zm0-18.277v2.2H24.312v-2.2a.169.169,0,0,0-.169-.169H1.857A.169.169,0,0,0,1.688,1.862Zm5.4,7.108a.844.844,0,1,1,1.688,0,4.221,4.221,0,1,0,8.441,0,.844.844,0,1,1,1.688,0,5.909,5.909,0,1,1-11.818,0Z" transform="translate(-17220 -23152)"></path>
                    <path d="M24.143,22.5H1.857A2.362,2.362,0,0,1-.5,20.138V1.862A2.362,2.362,0,0,1,1.857-.5H24.143A2.362,2.362,0,0,1,26.5,1.862V20.138A2.362,2.362,0,0,1,24.143,22.5ZM1.857.5A1.361,1.361,0,0,0,.5,1.862V20.138A1.361,1.361,0,0,0,1.857,21.5H24.143A1.361,1.361,0,0,0,25.5,20.138V1.862A1.361,1.361,0,0,0,24.143.5ZM24.143,20.808H1.857a.67.67,0,0,1-.669-.669V5.254H24.812V20.138A.67.67,0,0,1,24.143,20.808Zm-21.955-1H23.812V6.254H2.188ZM13,15.392A6.423,6.423,0,0,1,6.591,8.969a1.344,1.344,0,1,1,2.688,0,3.721,3.721,0,1,0,7.441,0,1.344,1.344,0,1,1,2.688,0A6.423,6.423,0,0,1,13,15.392ZM7.935,8.623a.346.346,0,0,0-.344.346,5.409,5.409,0,1,0,10.818,0,.344.344,0,1,0-.688,0,4.721,4.721,0,1,1-9.441,0A.346.346,0,0,0,7.935,8.623ZM24.812,4.562H1.188v-2.7a.67.67,0,0,1,.669-.669H24.143a.67.67,0,0,1,.669.669Zm-22.623-1H23.812V2.192H2.188Z" transform="translate(-17220 -23152)"></path>
                </g>
            </svg>
        </a>
    </div>
</nav>



                <div class="row shoppingcart">
                    <h1>SHOPPING CART</h1>
                   
                    <table>
                        <tr>
                            
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th class="quantity-header">Quantity</th>
                             
                        </tr>
                        <?php showgiohang(); ?>
                        <!-- <tr>
                            <td>1</td>
                            <td><img src="images/1.jpg" alt=""></td>
                            <td>Đồng hồ</td>
                            <td>10</td>
                            <td>1</td>
                            <td>
                                <div>10</div>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <th colspan="5">Tổng đơn hàng</th>
                            <th>
                                <div>10</div>
                            </th>

                        </tr> -->
                    </table>
                    
                </div>
                <div class="row mb" style="border:0px; display: flex; justify-content: center; align-items: center; margin-bottom: 815px; font-family: Inter, sans-serif;">
                <input type="submit" value="PLACE ORDER" name="dongydathang" style="border: 2px solid black; width: 200px; height: 50px; background-color: black; margin-right: 80px; color:white;font-weight: bold; ">


                <a href="cart.php?delcart=1" style="display: inline-block; border: 2px solid black; width: 200px; height: 50px; background-color: white; margin-right: 15px; text-decoration: none; text-align: center; line-height: 50px; color: black; ">DELETE CART</a>

                    
                </div>
            </div>
            
        
<!-- Footer -->
<div class="container-fluid footer-container  ">
    <div class="row ">
        <div class="col-12 col-lg-4 justify-content-center" style="font-family: 'Inter', sans-serif;">
          <h5 class="ten-sp">ADDRESS</h5>
          <p>170 Nguyễn Trãi, P. Bến Thành, Quận 1</p>
          <p>The New Playground, 26 Lý Tự Trọng, Quận 1</p>
          <p>502 CMT8, Phường 11, Quận 3</p> 
        </div>
        <div class="col-12 col-lg-4 justify-content-center" style="font-family: 'Inter', sans-serif;">
          <h5 class="ten-sp">CUSTOMER SERVICE</h5> 
          <p>(+84) 909 400 569</p>
          <p>support@ador.clothing</p>
        </div>
        <div class="col-12 col-lg-4 justify-content-center" style="font-family: 'Inter', sans-serif;">
          <h5 class="">© A'DOR</h5> 
          <p>A'dor Fashion Company Business Registration No. 0315840235 issued on 09/08/2019 by the Department of Planning and Investment HCMC.</p>
          <img src="https://file.hstatic.net/1000300454/file/logo_bct_019590229b4c4dfda690236b67f7aff4.png" width="150px" height="auto">
        </div>
      </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script type="text/javascript" src="detail.js"></script>
</html>






