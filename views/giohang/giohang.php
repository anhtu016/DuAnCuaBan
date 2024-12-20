<style>
  .table__price {
    display: none;
    /* Ẩn giá trên ảnh nếu có */
  }
</style>
<?php if (count($_SESSION['cart']) > 0) { ?>
  <section class="cartPageSection woocommerce">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="cartHeader">
            <h3>Sản phẩm trong giỏ hàng</h3>
          </div>
        </div>
        <div class="col-lg-12">
          <table class="shop_table cart_table">
            <thead>
              <tr>
                <th class="product-image">Ảnh sản phẩm</th>
                <th class="product-thumbnail">Tên sản phẩm</th>
                <th class="product-quantity">số lượng</th>
                <th class="">Giá sản phẩm</th>

                <th class="product-subtotal">Total</th>

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
                  <img src="' . $hinh . '" alt="" class="table__img" height="100px">
                </td>
        
        
                <td>
                <h3 class="table__title">' . $value[3] . '</h3>
                
        
                <td class="table__quantity"><input type="number" min="1" step="1" value="' . $value[2] . '" class="quantity" readonly></td>

                </td><span class="table__price">' . number_format(floatval($value[1]), 0, ".", ",") . ' vnđ</span>
        
                <td>
                  <span>
                    <div class="table__subtotal">' . number_format(floatval($thanhtien), 0, ".", ",") . 'vnđ </div>
                  </span>
                </td>
        
                <td><a class="removeProduct" href="index.php?act=deleteProductInCart&idProductInCart=' . $key . '"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
                ';
              }
              ?>
            </tbody>
            <tfoot>
              <tr class="actions">

                <td colspan="2" class="text-start">
                  <a href="index.php" class="ulinaBTN"><span>Tiếp tục mua sắm !</span></a>
                </td>
                <td colspan="2" class="text-end">
                  <br>
                  <span class="priceOrders"><?= number_format(floatval($priceOrders), 0, ".", ",") ?>vnđ</span>
                  <div class="totalProductPrice">
                    <h3 class="totalPrice">Tổng thành tiền</h3>
                    <a href="<?= $priceOrders ? 'index.php?act=checkout' : "" ?>" class="ulinaBTN2">Thanh Toán</a>
                  </div>
                </td>

              </tr>
            </tfoot>
          </table>
        </div>
      </div>

    </div>
  </section>
<?php } else { ?>
  <section class="cart section--lg container emptyCart">
    <h3>Bạn chưa chọn sản phẩm nào</h3>
    <div class="imgEmpty">
      <img src="./assets/img/emptycart.png" alt="emptyImage">
    </div>
    <span>Hãy nhanh tay chọn ngay những sản phẩm yêu thích. </span><a class="back" href="index.php">Tiếp tục mua hàng</a>

  </section>

<?php } ?>

