<section class="container">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <p class="h5">Chi tiết đơn hàng</p>
        </div>
        <div class="card-body">
            <?php if (!empty($billInfo)): ?>
                <h5>ID Đơn Hàng: <?php echo htmlspecialchars($billInfo[0]['bill_id']); ?></h5>
                <h6>Thông tin Khách Hàng</h6>
                <p>
                    Tên: <?php echo htmlspecialchars($billInfo[0]['name']); ?><br>
                    Email: <?php echo htmlspecialchars($billInfo[0]['email']); ?><br>
                    Phone: <?php echo htmlspecialchars($billInfo[0]['phone']); ?><br>
                    Địa chỉ: <?php echo htmlspecialchars($billInfo[0]['address']); ?><br>
                </p>
                <h6>Trạng thái: <?php echo htmlspecialchars($billInfo[0]['status_name']); ?></h6>
                <h6>Tổng giá: <?php echo htmlspecialchars(number_format(floatval($billInfo[0]['total_price']), 0, ".", ",")); ?> đ</h6>

                <h6>Sản phẩm trong đơn hàng:</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($billDetails as $detail): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($detail['product_id']); ?></td>
                                <td><?php echo htmlspecialchars($detail['product_name']); ?></td>
                                <td><?php echo htmlspecialchars(number_format(floatval($detail['price']), 0, ".", ",")); ?></td>
                                <td><?php echo htmlspecialchars($detail['quantity']); ?></td>
                                <td><?php echo htmlspecialchars(number_format(floatval($detail['thanh_tien']), 0, ".", ",")); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?php if ($billInfo[0]['status_id'] == 1): // Giả sử status_id = 1 là đơn hàng mới 
                ?>
                    <form action="index.php?act=cancelOrder" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">
                        <input type="hidden" name="bill_id" value="<?php echo htmlspecialchars($billInfo[0]['bill_id']); ?>">
                        <button type="submit" class="btn btn-danger">Hủy Đơn Hàng</button>
                    </form>
                <?php else: ?>
                    <p class="text-danger">Đơn hàng này không thể hủy.</p>
                <?php endif; ?>

            <?php else: ?>
                <p class="text-danger">Không tìm thấy thông tin đơn hàng.</p>
            <?php endif; ?>
        </div>
    </div>
</section>