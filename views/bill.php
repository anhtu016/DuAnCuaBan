<section class="container">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <p>Đơn hàng của tôi</p>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['user'])): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Đơn Hàng</th>
                        <th>Sản phẩm</th>
                        <th>Thông tin Khách Hàng</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // var_dump($listBill);
                    // die();
                    if(empty($listBill)){
                        echo "Giỏ hàng trống";
                    }
                    ?>
                    <?php foreach ($listBill as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['bill_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                            <td>
                                Email: <?php echo htmlspecialchars($row['email']); ?><br>
                                Phone: <?php echo htmlspecialchars($row['phone']); ?><br>
                                Address: <?php echo htmlspecialchars($row['address']); ?><br>
                            </td>
                            <td><?php echo htmlspecialchars($row['status_name']); ?></td>
                            <td>
                                <a class="text-primary" href="index.php?act=detail&id=<?php echo htmlspecialchars($row['bill_id']); ?>">Xem chi tiết</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <p class="alert alert-danger">Bạn chưa đăng nhập</p>
            <?php endif; ?>
        </div>
    </div>
</section>