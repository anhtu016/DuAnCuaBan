<!DOCTYPE html>
<html class="no-js" lang="en">
    
<!-- Mirrored from uiuxom.com/ulina/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 19:07:52 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Men - Prenium suit</title>
        <meta name="description" content="Fashion Ecommerce Responsive HTML Template.">
        <meta name="keywords" content="HTML, CSS, JavaScript, jQuery, Animation, Bootstrap, Font Awesome, Revolution Slider, Fasion, Ecommerce, Shop, WooCommerce">
        <meta name="author" content="uiuxom">

        <!-- BEGIN: CSS -->
        <link rel="stylesheet" href="views/css/bootstrap.css">
        <link rel="stylesheet" href="views/css/animate.css">
        <link rel="stylesheet" href="views/css/fontawesome-all.css">
        <link rel="stylesheet" href="views/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="views/css/owl.carousel.min.css">
        <link rel="stylesheet" href="views/css/lightcase.css">
        <link rel="stylesheet" href="views/css/slick.css">
        <link rel="stylesheet" href="views/css/nice-select.css">
        <link rel="stylesheet" href="views/css/settings.css">
        <link rel="stylesheet" href="views/css/ulina-icons.css">
        <link rel="stylesheet" href="views/css/ignore_for_wp.css">
        <link rel="stylesheet" href="views/css/preset.css">
        <link rel="stylesheet" href="views/css/theme.css">
        <link rel="stylesheet" href="views/css/responsive.css">
        <!-- END: CSS -->
         <style>
/* Bắt đầu trạng thái ẩn */
.hidden {
    opacity: 0;
    transform: translateY(-10px); /* Di chuyển dropdown lên một chút */
    pointer-events: none; /* Đảm bảo không nhận click khi ẩn */
    transition: opacity 0.3s ease, transform 0.3s ease; /* Thời gian chuyển động */
}

/* Khi hiển thị */
.visible {
    opacity: 1;
    transform: translateY(0); /* Di chuyển về vị trí ban đầu */
    pointer-events: auto;
    transition: opacity 0.3s ease, transform 0.3s ease;
}


         </style>
        <script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById("userDropdownButton");
    const dropdownMenu = document.getElementById("userDropdownMenu");

    dropdownButton.addEventListener("click", function(event) {
        event.stopPropagation();  // Ngăn chặn sự kiện click lan ra ngoài
        dropdownMenu.classList.toggle("hidden");
        dropdownMenu.classList.toggle("visible"); // Thêm hoặc xóa lớp visible
    });

    // Đóng dropdown nếu click ra bên ngoài
    document.addEventListener("click", function(event) {
        if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
            dropdownMenu.classList.remove("visible");
            dropdownMenu.classList.add("hidden");
        }
    });
});

</script>

        <!-- BEGIN: Favicon -->
        <link rel="icon"  type="image/png" href="views/images/favicon.png"> 
        <!-- END: Favicon -->
    </head>
    <body>
        <!-- BEGIN: PreLoder Section -->
        <section class="preloader" id="preloader">
            <div class="spinner-eff spinner-eff-1">
                <div class="bar bar-top"></div>
                <div class="bar bar-right"></div>
                <div class="bar bar-bottom"></div>
                <div class="bar bar-left"></div>
            </div>
        </section>
        <!-- END: PreLoder Section -->

        <!-- BEGIN: Header 01 Section -->
        <header class="header01 isSticky">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="headerInner01">
                            <div class="logo">
                                <a href="views/main.html">
                                    <img src="views/images/lgo1-removebg-preview.png" alt="Ulina" />
                                </a>
                            </div>
                            
                            <div class="mainMenu ">
                                <ul>
                                    <li>
                                        <a href="index.php">Trang chủ</a>
                                    </li>
                                    <li><a href="index.php?act=about">Giới Thiệu</a></li>
                                    <li><a href="index.php?act=contact">Liên Hệ</a></li>
                                    <li><a href="index.php?act=bill">Xem đơn hàng</a></li>
                                </ul>
                            </div>
                            <div class="accessNav">
                                <a href="views/javascript:void(0);" class="menuToggler"><i class="fa-solid fa-bars"></i> <span>Menu</span></a>
                                <div class="anSocial">
                                    <div class="ansWrap">
                                        <a class="fac" href="views/javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a class="twi" href="views/javascript:void(0);"><i class="fa-brands fa-twitter"></i></a>
                                        <a class="lin" href="views/javascript:void(0);"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a class="ins" href="views/javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                    </div>
                                    <a class="tog" href="views/javascript:void(0);"><i class="fa-solid fa-share-alt"></i></a>
                                </div>
                                <div class="anItems">
                                    <div class="anSearch"><a href="views/javascript:void(0);"><i class="fa-solid fa-search"></i></a></div>
    
                                    <div class="anCart">
                                        <a href="index.php?act=viewCart"><i class="fa-solid fa-shopping-cart"></i></a>
            
                                    </div>
                                    <div>
                                    <?php if (isset($_SESSION['user'])): 
    extract($_SESSION['user']);
    $isAdmin = ($user_role == 1);
?>
<div class="relative" onclick="toggleDropdown(event)">
    <div class="flex mr-4">
        <img class="mr-3" style="width:35px; height:35px; border-radius:50%" src="./uploads/<?= $user_img ?>" alt="">
        <p id="userDropdownButton" class="font-semibold text-green-400 cursor-pointer"><?= $user_name ?></p>
    
    <ul id="userDropdownMenu" class="absolute hidden w-32 bg-white rounded-md shadow-md z-10">
    <div class="grid-cols-1">
        <a class="block px-8 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=editmk">Đổi mật khẩu</a>
        <br>
        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=edit_taikhoan">Chỉnh sửa</a>
        <br>
        <?php if ($isAdmin): ?>
            <a href="admin/index.php">Đăng nhập vào admin</a>
        <?php endif; ?>
        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=thoat">Đăng xuất</a>
    </div>
    </ul></div>
</div>

<?php else: ?>
    <div class="m-7 mr-3 md:mr-7 md:m-0 flex">
        <a href="index.php?act=dangnhap" class="flex text-2xl text-green-500 hover:text-cyan-400 hover:underline transition duration-400 ease-in place-items-center cursor-pointer">
            <i class="fa-regular fa-user"></i>
        </a>
    </div>
<?php endif; ?>

                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END: Header 01 Section -->

        <!-- BEGIN: Search Popup Section -->
    
        <section class="sliderSection01">
            <div class="rev_slider_wrapper">
                <div id="rev_slider_1"> 
                    <img src="./views/images/bannerthoitrangnam.jpg" alt="" width="100%" height="600px">
                </div>

            </div>
        </section>
        <!-- END: Slider Section -->


        <!-- BEGIN: Latest Arrival Section -->
   
        <!-- END: Latest Arrival Section -->