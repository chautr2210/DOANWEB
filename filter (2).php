<html>
<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   
   <link rel="stylesheet" type="text/css" href="filter.css">
   <link rel="icon" type="image/png" href="https://i.imgur.com/m1KNhDR.png" sizes="64x64">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>
<body>
<!-- Thanh Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top" style="height:100px">
   <div class="container-fluid">
       <!-- Brand logo -->
       <a class="navbar-brand mr-10" href="index.php">
           <img src="https://i.imgur.com/FyDYwin.png" style="height:100px">
       </a>
       <button id="navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <!-- nav item -->
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-aut/i/tAi.svgo">
               
           <!-- Shop -->
           <li class="nav-item ml-5 dropdown">
                   <a class="nav-link header-menu-title dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                   <div class="shadow dropdown-menu custom-mega-menu" aria-labelledby="navbarDropdown">
                       <div class="container mt-3 mb-3">
                           <div class="row">
                               <div class="col-lg-12 mega-menu menu-index-2 mega-menu-san-pham">
                                   <div class="mega-menu-inner d-flex flex-wrap"> <!-- Thêm class "flex-wrap" để các cột được xuống dòng khi không đủ không gian -->
                                   <div class="item-mega-menu col-lg-4 col-md-6">
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
                                   </div> <!-- Đóng thẻ div class="mega-menu-inner" -->
                               </div>
                           </div> <!-- Đóng thẻ div class="row" -->
                       </div> <!-- Đóng thẻ div class="container-fluid mt-3 mb-3" -->
                   </div> <!-- Đóng thẻ div class="shadow dropdown-menu custom-mega-menu" -->
               </li>
               <script>








                // Sự kiện của Thanh Shop
                var spans = document.querySelectorAll('ul li span');
                for (var i = 0; i < spans.length; i++) {
                  spans[i].addEventListener('click', function() {
                    // Lấy giá trị của mục được chọn
                    var selectedCategory = this.textContent;


                    // Tạo một đối tượng FormData để chứa dữ liệu gửi đi
                    var formData = new FormData();
                    formData.append('category', selectedCategory);


                    // Tạo một yêu cầu AJAX để gửi dữ liệu đến filter_category.php
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'filter_category.php', true);
                    xhr.onload = function() {
                      // Xử lý kết quả trả về từ filter_category.php (nếu cần)
                      if (xhr.status === 200) {
                        // Xử lý kết quả trả về từ filter_category.php (nếu cần)
                        // Ví dụ: cập nhật nội dung trang
                        document.getElementById('category-display').innerHTML = "";
                        document.getElementById('color-display').innerHTML = "";
                        document.getElementById('new-arrival-inner').innerHTML = "";
                        document.querySelector('.new-arrival-inner').innerHTML = xhr.responseText;
                      }
                    };
                    xhr.send(formData);
                  });
                }
              </script>








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
           <input id="searchInput" type="text" class="w-100" name="q" value="" placeholder="Tìm kiếm sản phẩm" style="border: 0; height: 24px; border-bottom: 1px solid #AFAFAF; outline: none; background: transparent;">
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
           <a class="icon-right-header d-inline-block text-decoration-none position-relative ml-4 no-collapse" href="cart.php">
               
               <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 27 23">
                   <g transform="translate(17220.5 23152.5)">
                       <path d="M1.857,22A1.861,1.861,0,0,1,0,20.138V1.862A1.861,1.861,0,0,1,1.857,0H24.143A1.861,1.861,0,0,1,26,1.862V20.138A1.861,1.861,0,0,1,24.143,22Zm-.169-1.862a.169.169,0,0,0,.169.169H24.143a.169.169,0,0,0,.169-.169V5.754H1.688Zm0-18.277v2.2H24.312v-2.2a.169.169,0,0,0-.169-.169H1.857A.169.169,0,0,0,1.688,1.862Zm5.4,7.108a.844.844,0,1,1,1.688,0,4.221,4.221,0,1,0,8.441,0,.844.844,0,1,1,1.688,0,5.909,5.909,0,1,1-11.818,0Z" transform="translate(-17220 -23152)"></path>
                       <path d="M24.143,22.5H1.857A2.362,2.362,0,0,1-.5,20.138V1.862A2.362,2.362,0,0,1,1.857-.5H24.143A2.362,2.362,0,0,1,26.5,1.862V20.138A2.362,2.362,0,0,1,24.143,22.5ZM1.857.5A1.361,1.361,0,0,0,.5,1.862V20.138A1.361,1.361,0,0,0,1.857,21.5H24.143A1.361,1.361,0,0,0,25.5,20.138V1.862A1.361,1.361,0,0,0,24.143.5ZM24.143,20.808H1.857a.67.67,0,0,1-.669-.669V5.254H24.812V20.138A.67.67,0,0,1,24.143,20.808Zm-21.955-1H23.812V6.254H2.188ZM13,15.392A6.423,6.423,0,0,1,6.591,8.969a1.344,1.344,0,1,1,2.688,0,3.721,3.721,0,1,0,7.441,0,1.344,1.344,0,1,1,2.688,0A6.423,6.423,0,0,1,13,15.392ZM7.935,8.623a.346.346,0,0,0-.344.346,5.409,5.409,0,1,0,10.818,0,.344.344,0,1,0-.688,0,4.721,4.721,0,1,1-9.441,0A.346.346,0,0,0,7.935,8.623ZM24.812,4.562H1.188v-2.7a.67.67,0,0,1,.669-.669H24.143a.67.67,0,0,1,.669.669Zm-22.623-1H23.812V2.192H2.188Z" transform="translate(-17220 -23152)"></path>
                   </g>
               </svg>
           </a>
   </div>
</nav>




</div>
        <div class="menu-sort" style = "height: 38px">
        <div class="row">
                    <div class="bestseller-container col-4 col-lg-4">
                    <button class="bestseller" style="text-align: center; font-family: 'Inter', sans-serif;">Best Seller</button>
                    </div>
                    <div class="newarrival-container col-4 col-lg-4 ">
                    <button class="newarrival" style="text-align: center; font-family: 'Inter', sans-serif;">New Arrival</button>
                    </div>
                    <div class="price col-4 col-lg-4 ">
                    
                      <p class="price-label" style="font-family: 'Inter', sans-serif;">Price <></p>
                      
                        <div class="rectangle">
                        <div class="price-slider">
                            <ul>
                              <li><input type="radio" name="filterprice" value="LowtoHigh"> Low to High</li>
                              <li><input type="radio" name="filterprice" value="HightoLow"> High to Low</li>
                            </ul>
                        </div>
                          </div>
                    </div>
                  </div>      
                  </div>
                 
        <div class="row">
                <div class="filter-container col-lg-2 col-4">
               <div class="filter">
                <h1 class="label-category">Category</h1>
            <ul>
            <form id="filterForm" action="filter.php" method="POST">
              <li class="biglabel">TOP WEAR
                <ul>
                  <li><input type="radio" name="category" value="T-shirts"> T-shirts</li>
                  <li><input type="radio" name="category" value="Sweaters"> Sweaters</li>
                  <li><input type="radio" name="category" value="Blouses"> Blouses</li>
                </ul>
              </li>
              <li class="biglabel">BOTTOM WEAR
                <ul>
                  <li><input type="radio" name="category" value="Pants"> Pants</li>
                  <li><input type="radio" name="category" value="Shorts"> Shorts</li>
                  <li><input type="radio" name="category" value="Skirts"> Skirts</li>
                </ul>
              </li>
              <li class="biglabel">FULL BODY WEAR
                <ul>
                  <li><input type="radio" name="category" value="Dresses"> Dresses</li>
                  <li><input type="radio" name="category" value="Jumpsuits"> Jumpsuits</li>
                </ul>
              </li>
              </form>
            </ul>
               
            <script>
            // Sự kiện của filter category
            var radioButtons = document.querySelectorAll('input[type="radio"]');
            for (var i = 0; i < radioButtons.length; i++) {
                radioButtons[i].addEventListener('change', function() {
                    // Lấy giá trị của radio button được chọn
                    var selectedCategory = document.querySelector('input[name="category"]:checked').value;


                    // Tạo một đối tượng FormData để chứa dữ liệu gửi đi
                    var formData = new FormData();
                    formData.append('category', selectedCategory);


                    // Tạo một yêu cầu AJAX để gửi dữ liệu đến filter_category.php
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'filter_category.php', true);
                    xhr.onload = function() {
                        // Xử lý kết quả trả về từ filter_category.php (nếu cần)
                        if (xhr.status === 200) {
                            // Xử lý kết quả trả về từ filter_category.php (nếu cần)
                            // Ví dụ: cập nhật nội dung trang
                             // Xóa dữ liệu của button "newarrival"
                            document.getElementById('bestsellerContent').innerHTML = "";
                            document.getElementById('newarrivalContent').innerHTML = "";
                            document.getElementById('color-display').innerHTML = "";
                            document.getElementById('new-arrival-inner').innerHTML = "";
                            document.querySelector('.category-display').innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send(formData);
                });
            }
       
        </script>


<h2 class="label-color">Color</h2>
            <div class="color-swatches">
               
                  <div class="row color">
                  <li class="colorlabel col-6 col-lg-6" >
                  <ul>
                  <li><div class="ovanwhite"><input type="radio" name="color" id= "white" value="White"> White</div></li>
                  <li><div class="ovanblack"><input type="radio" name="color" id= "black" value="Black"> Black</div></li>
                  <li><div class="ovangreen"><input type="radio" name="color" id= "green" value="Green"> Green</div></li>
                  <li><div class="ovanbeige"><input type="radio" name="color" id= "beige" value="Beige"> Beige</div></li>
                </ul>
              </li>
                  <li class="colorlabel col-6 col-lg-6" >
                <ul>
                  <li><div class="ovanblue"><input type="radio" id= "blue" name="color" value="Blue"> Blue</div></li>
                  <li><div class="ovanyellow"><input type="radio" id= "yellow" name="color" value="Yellow"> Yellow</div></li>
                  <li><div class="ovangrey"><input type="radio" id= "grey" name="color" value="Grey"> Grey</div></li>
                  <li><div class="ovanbrown"><input type="radio" id= "brown" name="color" value="Brown"> Brown</div></li>
                </ul>
                </li>
                  </div>          
               
            </div>
           
            <script>
            // Sự kiện của filter_color
            var radioButtons = document.querySelectorAll('input[type="radio"]');
            for (var i = 0; i < radioButtons.length; i++) {
                radioButtons[i].addEventListener('change', function() {
                    // Lấy giá trị của radio button được chọn
                    var selectedColor = document.querySelector('input[name="color"]:checked').value;




                    // Tạo một đối tượng FormData để chứa dữ liệu gửi đi
                    var formData = new FormData();
                    formData.append('color', selectedColor);




                    // Tạo một yêu cầu AJAX để gửi dữ liệu đến filter_category.php
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'filter_color.php', true);
                    xhr.onload = function() {
                        // Xử lý kết quả trả về từ filter_category.php (nếu cần)
                        if (xhr.status === 200) {
                            // Xử lý kết quả trả về từ filter_category.php (nếu cần)
                            // Ví dụ: cập nhật nội dung trang
                            document.getElementById('new-arrival-inner').innerHTML = "";
                            document.getElementById('bestsellerContent').innerHTML = "";
                            document.getElementById('newarrivalContent').innerHTML = "";
                            document.getElementById('category-display').innerHTML = "";
                            document.querySelector('.color-display').innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send(formData);
                });
            }
        </script>




<script>
    // Lắng nghe sự kiện khi radio button được chọn
    var categoryRadioButtons = document.querySelectorAll('input[name="category"]');
    var colorRadioButtons = document.querySelectorAll('input[name="color"]');
    
    for (var i = 0; i < categoryRadioButtons.length; i++) {
        categoryRadioButtons[i].addEventListener('change', handleFilterChange);
    }
   
    for (var j = 0; j < colorRadioButtons.length; j++) {
        colorRadioButtons[j].addEventListener('change', handleFilterChange);
    }
   
    
    function handleFilterChange() {
        var selectedCategory = document.querySelector('input[name="category"]:checked').value;
        var selectedColor = document.querySelector('input[name="color"]:checked').value;
    


        if (selectedCategory && selectedColor) {
          var formData = new FormData();
                formData.append('category', selectedCategory);
                formData.append('color', selectedColor);
                sendRequest(formData, 'filter_mix.php');
        } else {
            
                // Tiếp tục xử lý khi không chọn category và color
                if (selectedColor) {
                    var formData = new FormData();
                    formData.append('color', selectedColor);
                    sendRequest(formData, 'filter_color.php');
                }
            }
        };
    

    function sendRequest(formData, url) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.onload = function() {
            if (xhr.status === 200) {

                document.getElementById('mix-display').innerHTML = "";
                document.getElementById('sortbyprice').innerHTML = "";
                document.querySelector('.mix-display').innerHTML = xhr.responseText;
            }
        };
        xhr.send(formData);
    }
</script>


<script>
    // Lắng nghe sự kiện khi radio button được chọn
    var categoryRadioButtons = document.querySelectorAll('input[name="category"]');
    var colorRadioButtons = document.querySelectorAll('input[name="color"]');
    var priceSlider = document.querySelector('.price-slider');
            var radioButtons = priceSlider.querySelectorAll('input[type="radio"]');

    for (var i = 0; i < categoryRadioButtons.length; i++) {
        categoryRadioButtons[i].addEventListener('change', handleFilterChange);
    }
   
    for (var j = 0; j < colorRadioButtons.length; j++) {
        colorRadioButtons[j].addEventListener('change', handleFilterChange);
    }
   
    for (var k = 0; k < radioButtons.length; k++) {
                radioButtons[k].addEventListener('change', handleFilterChange) }

    
    function handleFilterChange() {
        var selectedCategory = document.querySelector('input[name="category"]:checked').value;
        var selectedColor = document.querySelector('input[name="color"]:checked').value;
        var selectedfilterPrice = document.querySelector('input[name="filterprice"]:checked').value;

    


        if (selectedCategory && selectedColor && selectedfilterPrice) {
          var formData = new FormData();
                formData.append('category', selectedCategory);
                formData.append('color', selectedColor);
                formData.append('filterprice', selectedfilterPrice);
                sendRequest(formData, 'filter_mix.php');
        } 
        };
    

    function sendRequest(formData, url) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.onload = function() {
            if (xhr.status === 200) {

                document.getElementById('mix-display').innerHTML = "";
                document.getElementById('sortbyprice').innerHTML = "";
                document.querySelector('.sortbyprice').innerHTML = xhr.responseText;
            }
        };
        xhr.send(formData);
    }
</script>



<script>
            // Sự kiện của filter price
             var colorRadioButtons = document.querySelectorAll('input[name="color"]');


            var priceSlider = document.querySelector('.price-slider');
            var radioButtons = priceSlider.querySelectorAll('input[type="radio"]');
           
            for (var i = 0; i < colorRadioButtons.length; i++) {
            colorRadioButtons[i].addEventListener('change', handleFilterChange);
            }




           
            for (var j = 0; j < radioButtons.length; j++) {
                radioButtons[j].addEventListener('change', handleFilterChange) }
                    // Lấy giá trị của radio button được chọn
                   
                    function handleFilterChange() {


                      var selectedColor = document.querySelector('input[name="color"]:checked').value;

                    var selectedfilterPrice = document.querySelector('input[name="filterprice"]:checked').value;




                  if(selectedColor && selectedfilterPrice) {


                    // Tạo một đối tượng FormData để chứa dữ liệu gửi đi
                    var formData = new FormData();
                    formData.append('color', selectedColor);
                    formData.append('filterprice', selectedfilterPrice);
                  }


                    // Tạo một yêu cầu AJAX để gửi dữ liệu đến filter_category.php
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'filter_color.php', true);
                    xhr.onload = function() {
                        // Xử lý kết quả trả về từ filter_category.php (nếu cần)
                        if (xhr.status === 200) {
                            // Xử lý kết quả trả về từ filter_category.php (nếu cần)
                            // Ví dụ: cập nhật nội dung trang
                             // Xóa dữ liệu của button "newarrival"
                             document.getElementById('color-display').innerHTML = "";
                            document.querySelector('.color-display').innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send(formData);
                };
           
       
        </script>


<script>
            // Sự kiện của filter price
            var categoryRadioButtons = document.querySelectorAll('input[name="category"]');


            var priceSlider = document.querySelector('.price-slider');
            var radioButtons = priceSlider.querySelectorAll('input[type="radio"]');
           
            for (var j = 0; j < colorRadioButtons.length; j++) {
        categoryRadioButtons[j].addEventListener('change', handleFilterChange);
    }
    
            for (var j = 0; j < radioButtons.length; j++) {
                radioButtons[j].addEventListener('change', handleFilterChange) }
                    // Lấy giá trị của radio button được chọn
                   
                    function handleFilterChange() {


                      var selectedCategory = document.querySelector('input[name="category"]:checked').value;


                    var selectedfilterPrice = document.querySelector('input[name="filterprice"]:checked').value;




                  if(selectedCategory && selectedfilterPrice) {


                    // Tạo một đối tượng FormData để chứa dữ liệu gửi đi
                    var formData = new FormData();
                    formData.append('category', selectedCategory);
                    formData.append('filterprice', selectedfilterPrice);
                  }


                    // Tạo một yêu cầu AJAX để gửi dữ liệu đến filter_category.php
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'filter_category.php', true);
                    xhr.onload = function() {
                        // Xử lý kết quả trả về từ filter_category.php (nếu cần)
                        if (xhr.status === 200) {
                            // Xử lý kết quả trả về từ filter_category.php (nếu cần)
                            // Ví dụ: cập nhật nội dung trang
                             // Xóa dữ liệu của button "newarrival"
                             document.getElementById('category-display').innerHTML = "";
                            document.querySelector('.category-display').innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send(formData);
                };
           
       
        </script>
           
           




               </div>
            </div>




   <!-- New Arrival -->
   
   <div class="content-wrapper col-lg-10 col-8">
    
       <div class="new-arrival-inner" id="new-arrival-inner">
          <?php include 'biglabel.php'; ?>
          <?php include 'shop_category.php'; ?>
          <?php include 'searchview.php'; ?>
          <?php include 'viewall.php'; ?>
          </div>
         
      <div class="bsl" id="bestsellerContent"></div>
      <div class="na" id="newarrivalContent"></div>
      <div class="sortbyprice" id="sortbyprice"></div>



         
      <script>
    // Lắng nghe sự kiện click vào button class "bestseller"
    document.querySelector('.bestseller').addEventListener('click', function() {
        // Xóa dữ liệu của button "newarrival"
        document.getElementById('newarrivalContent').innerHTML = "";
        document.getElementById('color-display').innerHTML = "";
        document.getElementById('category-display').innerHTML = "";
       document.getElementById('new-arrival-inner').innerHTML = "";
        // Sử dụng AJAX để tải nội dung từ filter_bestseller.php
        var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Chèn nội dung từ filter_bestseller.php vào phần tử #bestsellerContent
                document.getElementById('bestsellerContent').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "filter_bestseller.php", true);
        xhttp.send();
    });








    // Lắng nghe sự kiện click vào button class "newarrival"
    document.querySelector('.newarrival').addEventListener('click', function() {
        // Xóa dữ liệu của button "bestseller"
        document.getElementById('bestsellerContent').innerHTML = "";
        document.getElementById('color-display').innerHTML = "";
        document.getElementById('category-display').innerHTML = "";
        document.getElementById('new-arrival-inner').innerHTML = "";
        // Sử dụng AJAX để tải nội dung từ filter_newarrival.php
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Chèn nội dung từ filter_newarrival.php vào phần tử #newarrivalContent
                document.getElementById('newarrivalContent').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "filter_newarrival.php", true);
        xhttp.send();
    });
</script>
<div class="mix-display" id="mix-display">
      <div class="color-display" id="color-display"></div>
     
      <div class="category-display" id="category-display"></div>
  </div>
   </div>
   </div>
   </div>
   </div>
   
     <!-- Footer -->
     <div class="container-fluid footer-container d-flex">
            <div class="row footer">
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
        </div>
     
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script type="text/javascript" src="homepage.js"></script>
</html>