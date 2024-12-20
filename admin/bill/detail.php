<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3>Thông Tin Đơn Hàng</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>ID Đơn Hàng:</strong> <?php echo htmlspecialchars($billInfo[0]['bill_id']); ?></p>
                            <p><strong>Trạng thái:</strong> <?php echo htmlspecialchars($billInfo[0]['status_name']); ?></p>
                            <p><strong>Tổng Giá:</strong> <?php echo htmlspecialchars(number_format(floatval($billInfo[0]['total_price']), 0, ".", ",")); ?> đ</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3>Thông Tin Khách Hàng</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Tên:</strong> <?php echo htmlspecialchars($billInfo[0]['name']); ?></p>
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($billInfo[0]['email']); ?></p>
                            <p><strong>Phone:</strong> <?php echo htmlspecialchars($billInfo[0]['phone']); ?></p>
                            <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($billInfo[0]['address']); ?></p>

                            <?php
                            // Kiểm tra trạng thái đơn hàng
                            if ($billInfo[0]['status_id'] == 4) {
                                echo '<p><strong>Trạng thái:</strong> <span class="text-success">Đơn hàng này đã giao thành công</span></p>';
                            } else if ($billInfo[0]['status_id'] == 5) {
                                echo '<p><strong>Trạng thái:</strong> <span class="text-danger">Đơn hàng này đã bị hủy</span></p>';
                            } else {
                            ?>
                                <form action="index.php?act=updateChiTietDonHang" method="post">
                                    <input type="hidden" name="bill_id" value="<?php echo htmlspecialchars($billInfo[0]['bill_id']); ?>">
                                    <div class="form-group">
                                        <label for="status">Cập nhật Trạng Thái Đơn Hàng:</label>
                                        <select id="status" name="status" class="form-control">
                                            <?php
                                            // Lấy trạng thái hiện tại
                                            $current_status = $billInfo[0]['status_id'];
                                            $status_options = [
                                                1 => 'Chờ xử lí',
                                                2 => 'Chờ lấy hàng',
                                                3 => 'Đang giao hàng',
                                                4 => 'Đã giao hàng',
                                                5 => 'Giao hàng thất bại'
                                            ];

                                            // Hiển thị trạng thái có thể chọn
                                            foreach ($status_options as $status_id => $status_name) {
                                                if ($status_id > $current_status && $current_status < 4) { // Chỉ cho phép chọn trạng thái tiếp theo và không cho chọn hủy nếu đã giao hàng
                                                    echo '<option value="' . $status_id . '">' . $status_name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Cập Nhật Trạng Thái</button>
                                </form>
                            <?php } // Kết thúc if kiểm tra trạng thái 
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Chi Tiết Sản Phẩm</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
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
            </div>
        </div>
    </main>