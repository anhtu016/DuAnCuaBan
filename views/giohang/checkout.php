<style>
    .table__price {
        display: none;
        /* Ẩn giá trên ảnh nếu có */
    }
</style>
<section class="checkoutPage">
    <div class="container">
        <form action="index.php?act=confirmCheckout" method="post" class="">
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkoutForm">
                        <h3>Thông tin người nhận</h3>
                        <div class="row">
                            <div class="col--lg-12">
                                <input type="text" name="user_id" hidden value="<?= $user_id ?>">
                            </div>
                            <div class="col--lg-12">
                                <input type="text" name="name" placeholder="Họ và tên" value="<?= $name ?>">
                                <span class="error"><?= $errName ?></span>
                            </div>
                            <div class="col--lg-12">
                                <input type="text" name="phone" placeholder="số điện thoại*" value="<?= $phone ?>">
                                <span class="error"><?= $errPhone ?></span>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="email" placeholder="email" value="<?= $email ?>">
                                <span class="error"><?= $errEmail ?></span>
                            </div>
                            <div class="col--lg-12">
                                <input type="text" name="address" placeholder="Địa chỉ" value="<?= $address ?>">
                                <span class="error"><?= $errAddress ?></span>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="ghichu" cols="30" rows="10" placeholder="ghi chú"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">F
                    <div class="orderReviewWrap">
                        <h3>Hóa đơn thanh toán</h3>
                        <div class="orderReview">
                            <table>
                                <thead>
                                    <tr>
                                        <th>sản phẩm</th>
                                        <th></th>
                                        <th>giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $priceOrders = null;
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        $hinh = "./uploads/" . $value[4];
                                        $thanhtien = $value[2] * $value[1];
                                        $priceOrders += $thanhtien;

                                        echo '
                <tr>
                <td  class="table__image">
                  <img src="' . $hinh . '" alt="" class="table__img" height="150px" width="150px">
                </td>
        
        
                <td>
                
                     <span class="table__price">' . number_format(floatval($value[1]), 0, ".", ",") . ' vnđ</span>

                </td>
        
                <td>
                  <span>
                    <div class="table__subtotal">' . number_format(floatval($thanhtien), 0, ".", ",") . 'vnđ </div>
                  </span>
                </td>
        
                </tr>
                ';
                                    }
                                    ?>
                                </tbody>

                                <tr>
                                    <td>
                                        <h2>Tổng tiền</h2>
                                    </td>
                                    <td></td>
                                    <td><span class="priceOrders"><?= number_format(floatval($priceOrders), 0, ".", ",") ?>vnđ</span></td>
                                </tr>
                            </table>

                            <div class="payment__methods">
                                <h3 class="checkout__title payment__title">Phương thức thanh toán</h3>
                                <button type="submit" class="btn btn-success" name="thanhtoannhanhang">Thanh toán khi
                                    nhận hàng</button>
                                <button type="submit" class="btn btn-success" name="vnpay">Thanh toán qua VNPAY</button>
                            </div>
                        </div>
                    </div>
                </div>

        </form>
    </div>
</section>
