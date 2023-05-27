<!DOCTYPE html>
<html>
  <head>
    <title>Chi tiết sản phẩm - ador</title>
    <meta charset="UTF-8">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="detail.js"></script>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="detailstyle.css">
    <link rel="icon" type="image/png" href="https://i.imgur.com/m1KNhDR.png" sizes="64x64">
  </head>
  <body>
    <!-- Thanh Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top " style="height:100px">
    <div class="container-fluid ">
        <!-- Brand logo -->      
        <a class="navbar-brand ml-10 " href="index.php">
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

<!--Thanh điều hướng -->
<div class="row" style="margin-left:65px">
<?php include 'navbar.php'; ?>
</div>
<!--Carousel hình ảnh và thông tin sản phẩm -->
<div class="container-fluid">
  <div class="row">
      <div id="carouselExampleControls" class="carousel slide col-lg-7 col-12  " style=" height:auto; " data-ride="carousel">
        <?php include 'Getpicture.php'; ?>
      </div> 
      <div class="infosp col-lg-5 col-12 " style="height:auto";>
      <?php include 'getinfoproduct.php'; ?>
      </div>
  </div>
</div>
<!--You may aslo like-->
<div class="also-like-wrapper">
        <div class="also-like-head">
            <div class="also-like-heading d-flex justify-content-between align-items-center">
                <h2 class="also-like-heading__title">You May Also Like</h2>
                <div class="also-like-heading__more">
                   
                </div>
            </div>
        </div>
        <div class="also-like-inner">
        <?php include 'also-like.php'; ?>
        </div>
        </div>
<!-- Footer -->
<div class="container-fluid footer-container d-flex">
    <div class="row">
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
</html>