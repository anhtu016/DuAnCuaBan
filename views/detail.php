<!-- BEGIN: Shop Details Section -->
<?php
if (!empty($product)) {
    $product_price = $product['product_price'] ?? 'Giá chưa xác định';
    $product_description = $product['product_description'] ?? 'Mô tả chưa có';
    $product_name = $product['product_name'] ?? 'Tên sản phẩm chưa có';
    $product_img = $product['product_img'] ?? 'Tên sản phẩm chưa có';

    echo '<section class="shopDetailsPageSection">  
            <div class="container">  
                <div class="row">  
                    <div class="col-lg-6">  
                        <div class="productGalleryWrap">  
                            <div class="productGallery">  
                                <div class="pgImage">  
                                   <img src="./uploads/' . $product_img . '" alt="Product Image" />
                                </div>  
                            </div>  
                        </div>  
                    </div>  
                    <div class="col-lg-6">  
                        <div class="productContent">  
                            <div class="pcCategory">  
                                <a href="views/shop_right_sidebar.html">Fashion</a>, <a href="views/shop_left_sidebar.html">Sports</a>  
                            </div>  
                            <h2>' . $product_name . '</h2>  
                            <div class="pi01Price">  
                                <ins>' . $product_price . 'vnđ</ins>  
                            </div>  
                            <div class="pcExcerpt">  
                                ' . $product_description . '  
                            </div>  
                            <form action="index.php?act=addToCart&id='.$id.'" method="post">
                            <div class="pcBtns">  
                                <div class="quantity clearfix">  
                                        <input type="number" name="quantity" id="" class="quantity" min="1" max="10" step="1" value="1">
                                        <input type="hidden" name="product_name" id="" class="quantity" min="1" step="1" value="' . $product_name . '">
                                        <input type="hidden" name="product_price" id="" class="quantity" min="1" step="1" value="' . $product_price . '">
                                        <input type="hidden" name="product_description" id="" class="quantity" min="1" step="1" value="' . $product_description . '">
                                </div>  
                                     <input type="submit" class="btn btn-sm" value="Thêm vào giỏ hàng" name="addToCart" >
                                <a href="views/wishlist.html" class="pcWishlist"><i class="fa-solid fa-heart"></i></a>  
                                <a href="javascript:void(0);" class="pcCompare"><i class="fa-solid fa-right-left"></i></a>  
                            </div>  
                            </form>
                        </div>  
                    </div>  
                          <div class="row productTabRow">
                    <div class="col-lg-12">
                        <ul class="nav productDetailsTab" id="productDetailsTab" role="tablist">
                            <li role="presentation">
                                <button class="active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                            </li>
                            <li role="presentation">
                                <button id="additionalinfo-tab" data-bs-toggle="tab" data-bs-target="#additionalinfo" type="button" role="tab" aria-controls="additionalinfo" aria-selected="false" tabindex="-1">Additional Information</button>
                            </li>
                            <li role="presentation">
                                <button id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false" tabindex="-1">Item Review</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="desInfoRev_content">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
                                <div class="productDescContentArea">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="descriptionContent">
                                                <h3>Product Details</h3>
                                                <p>
                                                    Desectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ma na alihote pare ei gansh es gan qua. 
                                                </p>
                                                <p>
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi uet aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volupteat velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupiatat non proiden re dolor in reprehend.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="descriptionContent featureCols">
                                                <h3>Product Features</h3>
                                                <ul>
                                                    <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </li>
                                                    <li>Letotam rem aperiam, eaque ipsa quae ab illo inventore veritatis</li>
                                                    <li>Vitae dicta sunt explicabo. Nemo enim ipsam volupta aut odit aut fugit </li>
                                                    <li>Lesed quia consequuntur magni dolores eos qui ratione voluptate.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="additionalinfo" role="tabpanel" aria-labelledby="additionalinfo-tab" tabindex="0">
                                <div class="additionalContentArea">
                                    <h3>Additional Information</h3>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Item Code</th>
                                                <td>AB42 - 2394 - DS023</td>
                                            </tr>
                                            <tr>
                                                <th>Brand</th>
                                                <td>Ulina</td>
                                            </tr>
                                            <tr>
                                                <th>Dimention</th>
                                                <td>12 Cm x 42 Cm x 20 Cm</td>
                                            </tr>
                                            <tr>
                                                <th>Specification</th>
                                                <td>1pc dress, 1 pc soap, 1 cleaner</td>
                                            </tr>
                                            <tr>
                                                <th>Weight</th>
                                                <td>2 kg</td>
                                            </tr>
                                            <tr>
                                                <th>Warranty</th>
                                                <td>1 year</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                                <div class="productReviewArea">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h3>10 Reviews</h3>
                                            <div class="reviewList">
                                                <ol>
                                                    <li>
                                                        <div class="postReview">
                                                            <img src="images/author/7.jpg" alt="Post Review">
                                                            <h2>Greaet product. Packaging was also good!</h2>
                                                            <div class="postReviewContent">
                                                                Desectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ma na alihote pare ei gansh es gan quim veniam, quis nostr udg exercitation ullamco laboris nisi ut aliquip
                                                            </div>
                                                            <div class="productRatingWrap">
                                                                <div class="star-rating"><span></span></div>
                                                            </div>
                                                            <div class="reviewMeta">
                                                                <h4>John Manna</h4>
                                                                <span>on June 10, 2022</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="postReview">
                                                            <img src="images/author/8.jpg" alt="Post Review">
                                                            <h2>The item is very comfortable and soft!</h2>
                                                            <div class="postReviewContent">
                                                                Desectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ma na alihote pare ei gansh es gan quim veniam, quis nostr udg exercitation ullamco laboris nisi ut aliquip
                                                            </div>
                                                            <div class="productRatingWrap">
                                                                <div class="star-rating"><span></span></div>
                                                            </div>
                                                            <div class="reviewMeta">
                                                                <h4>Robert Thomas</h4>
                                                                <span>on June 10, 2022</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="postReview">
                                                            <img src="images/author/9.jpg" alt="Post Review">
                                                            <h2>I liked the product, it is awesome.</h2>
                                                            <div class="postReviewContent">
                                                                Desectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ma na alihote pare ei gansh es gan quim veniam, quis nostr udg exercitation ullamco laboris nisi ut aliquip
                                                            </div>
                                                            <div class="productRatingWrap">
                                                                <div class="star-rating"><span></span></div>
                                                            </div>
                                                            <div class="reviewMeta">
                                                                <h4>Ken Williams</h4>
                                                                <span>on June 10, 2022</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="commentFormArea">
                                                <h3>Add A Review</h3>
                                                <div class="reviewFrom">
                                                    <form method="post" action="#" class="row">
                                                        <div class="col-lg-12">
                                                            <div class="reviewStar">
                                                                <label>Your Rating</label>
                                                                <div class="rsStars"><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <input type="text" name="comTitle" placeholder="Review title">
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <textarea name="comComment" placeholder="Write your review here"></textarea>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="comName" placeholder="Your name">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="email" name="comEmail" placeholder="Your email">
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <button type="submit" name="reviewtSubmit" class="ulinaBTN"><span>Submit Now</span></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>  
            </div>  
        </section>';
        
} else {
    echo '<p>Không tìm thấy sản phẩm nào.</p>'; // Thông báo khi không có sản phẩm  
}
?>