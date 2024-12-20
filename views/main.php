<!-- BEGIN: Search Popup Section -->
<section class="popup_search_sec">
    <div class="popup_search_overlay"></div>
    <div class="pop_search_background">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="popup_logo">
                        <a href="index.html"><img src="views/images/logo2.png" alt="Ulina"></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <a href="javascript:void(0);" id="search_Closer" class="search_Closer"></a>
                </div>
            </div>
        </div>
        <div class="middle_search">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="popup_search_form">
                            <form method="get" action="#">
                                <input type="search" name="s" id="s" placeholder="Type Words and Hit Enter">
                                <button type="submit"><i class="fa-solid fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: Search Popup Section -->

<!-- BEGIN: Slider Section -->
<section class="sliderSection01">
    <div class="rev_slider_wrapper pd-4">
        <div id="rev_slider_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
            <ul>
                <li>
                    <img src="views/images/banner-thoi-trang-nam.jpg" alt="">
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- END: Slider Section -->


<!-- BEGIN: Latest Arrival Section -->
<section class="latestArrivalSection">
    <div class="container  mt-4">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="secTitle">Sản Phẩm</h2>
                <p class="secDesc">Showing our latest arrival on this summer</p>
            </div>
        </div>
        <div class="row">
            
    <?php
    if (!empty($product)) {  
        foreach ($product as $pro) {  
            if (isset($pro['id'])) { 
                $id = $pro['id'];  
                $linkPro = "index.php?act=details&idpro=".$id;  
                extract($pro);
                echo '
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="">
                        <div class="pi01Thumb">
                            
                            <img src="./uploads/'.$product_img.'" alt="Ulina Product" / height=400px>
                        
                            <div class="productLabels clearfix">
                                <span class="plDis">HOT</span>
                            </div>
                        </div>
                        <div class="pi01Details">
                            <h3><a href="views/shop_details1.php">'.$product_name.'</a></h3>
                            <div class="pi01Price">
                                <ins>'.number_format(floatval($product_price), 0, ".", ",").' đ</ins>
                            </div>
                        </div>   
                        <a href="index.php?act=addToCart&id='.$id.'"><button class="btn btn-success">Thêm vào giỏ hàng</button></a>
                        <a href="'.$linkPro.'"><button class="btn btn-warning">xem thêm</button></a>
                        
                    </div>
                </div>';
            } else {  
                echo "Sản phẩm không có ID."; // Xử lý trường hợp không có ID  
            }  
        }  
    } else {  
        echo "Không có sản phẩm nào để hiển thị."; // Xử lý trường hợp mảng $product rỗng  
    }
    ?>
</div>

        </div>

    </div>
</section>
<!-- END: Latest Arrival Section -->