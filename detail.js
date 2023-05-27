function minusQuantity() {
    var quantityInput = document.getElementById("quantity");
    var currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
        updateQuantityInput();
    }
}

function plusQuantity() {
    var quantityInput = document.getElementById("quantity");
    var currentQuantity = parseInt(quantityInput.value);
    quantityInput.value = currentQuantity + 1;
    updateQuantityInput();
}

function updateQuantityInput() {
    var quantityInput = document.getElementById("quantity");
    var quantityValue = parseInt(quantityInput.value);
    document.getElementById("quantityInput").value = quantityValue;
}

function validateForm() {
  var selectedSize = document.getElementById("selectedSizeInput").value;
  var selectedColor = document.getElementById("selectedColorInput").value;

  if (selectedSize === "" || selectedColor === "") {
      alert("Please select a size and color.");
      return false; // Prevent form submission
  }

  return true; // Submit the form
}

document.addEventListener('DOMContentLoaded', function() {
  var quantityMinusButtons = document.querySelectorAll('.quantity-minus');
  var quantityPlusButtons = document.querySelectorAll('.quantity-plus');

  quantityMinusButtons.forEach(function(button) {
      button.addEventListener('click', decreaseQuantityAndSubmit);
  });

  quantityPlusButtons.forEach(function(button) {
      button.addEventListener('click', increaseQuantityAndSubmit);
  });

  function decreaseQuantityAndSubmit(event) {
      var input = event.target.parentNode.querySelector('input[name="updated_quantity"]');
      var currentValue = parseInt(input.value);
      if (currentValue > 1) {
          input.value = currentValue - 1;
          updateTotal();
          submitForm(event.target);
      }
  }

  function increaseQuantityAndSubmit(event) {
      var input = event.target.parentNode.querySelector('input[name="updated_quantity"]');
      var currentValue = parseInt(input.value);
      input.value = currentValue + 1;
      updateTotal();
      submitForm(event.target);
  }

  function submitForm(button) {
      var form = button.closest('form');
      form.submit();
  }

  function updateTotal() {
      // Cập nhật tổng số lượng trong giỏ hàng (nếu cần)
  }
});



function selectButtonColor(button) {
  var buttons = document.getElementsByClassName("color-button");
  for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove("selected");
      if (buttons[i] === button) {
          buttons[i].classList.add("selected");

          // Chuyển slide tương ứng với chỉ số đã lấy
          var carouselItems = document.getElementsByClassName("carousel-item");
          for (var j = 0; j < carouselItems.length; j++) {
              if (j === i) {
                  carouselItems[j].classList.add("active");
              } else {
                  carouselItems[j].classList.remove("active");
              }
          }
      }
  }
}




  function selectButtonColor(button) {
    var buttons = document.getElementsByClassName("color-button");
    var carouselItems = document.getElementsByClassName("carousel-item");
    var selectedColorInput = document.getElementById("selectedColorInput");
    
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove("selected");
      carouselItems[i].classList.remove("active");
      
      if (buttons[i] === button) {
        buttons[i].classList.add("selected");
        carouselItems[i].classList.add("active");
        
        var selectedColor = button.style.backgroundColor;
        selectedColorInput.value = selectedColor;
      }
    }
  }
  
  

  function selectButtonSize(button) {
    var buttons = document.getElementsByClassName("size-button");
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove("selected");
    }
    button.classList.add("selected");
    // Lấy giá trị của nút button được chọn
  var selectedSize = button.innerHTML;
  // Thêm giá trị vào thẻ input
  document.getElementById("selectedSizeInput").value = selectedSize;
  }
  
  

  document.getElementById("navbar-toggler").addEventListener("click", function() {
    this.setAttribute("aria-expanded", "true");
    this.classList.remove("collapsed");
});

var navbarCollapse = document.getElementById("navbarSupportedContent");
navbarCollapse.addEventListener("hidden.bs.collapse", function() {
    document.getElementById("navbar-toggler").setAttribute("aria-expanded", "false");
    document.getElementById("navbar-toggler").classList.add("collapsed");
});  

document.addEventListener("DOMContentLoaded", function() {
    // Lấy thẻ "Shop"
    var shopLink = document.querySelector(".nav-link.header-menu-title");
  
    // Lấy menu con của "Shop"
    var shopMenu = document.querySelector(".dropdown-menu.custom-mega-menu");
  
    // Sự kiện khi di chuột vào mục "Shop"
    shopLink.addEventListener("mouseenter", function() {
      if (window.innerWidth >= 768) {
        shopMenu.style.display = "block";
      }
    });
  
    // Sự kiện khi di chuột ra khỏi mục "Shop"
    shopLink.addEventListener("mouseleave", function() {
      if (window.innerWidth >= 768) {
        shopMenu.style.display = "none";
      }
    });
  
    // Sự kiện khi di chuột vào khung chứa menu con
    shopMenu.addEventListener("mouseenter", function() {
      if (window.innerWidth >= 768) {
        shopMenu.style.display = "block";
      }
    });
  
    // Sự kiện khi di chuột ra khỏi khung chứa menu con
    shopMenu.addEventListener("mouseleave", function() {
      if (window.innerWidth >= 768) {
        shopMenu.style.display = "none";
      }
    });
  });
  



// JavaScript for Mobile
document.addEventListener("DOMContentLoaded", function() {
// Lấy thẻ "Shop"
var shopLink = document.querySelector(".nav-link.header-menu-title");

// Lấy menu con của "Shop"
var shopMenu = document.querySelector(".dropdown-menu.custom-mega-menu");

// Ẩn menu con mặc định
shopMenu.style.display = "none";

// Thêm sự kiện click cho thẻ "Shop"
shopLink.addEventListener("click", function(e) {
  e.preventDefault();
  e.stopPropagation();

  if (window.innerWidth < 768) {
    // Toggle lớp 'show' để hiển thị hoặc ẩn menu con
    shopMenu.classList.toggle("show");
  }
});

// Ẩn menu con khi click bất kỳ nơi nào trên trang ngoại trừ mục "Shop" và menu con
document.addEventListener("click", function(e) {
  if (window.innerWidth < 768 && !e.target.matches(".nav-link.header-menu-title") && !e.target.closest(".dropdown-menu.custom-mega-menu")) {
    shopMenu.classList.remove("show");
  }
});
});
  