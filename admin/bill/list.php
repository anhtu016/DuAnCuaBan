<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 mt-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Bill</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <h1>Tất cả đơn hàng</h1>
                </div>
                <div class="card-body">
                    <table class="table table-responsive" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Action</th> <!-- Cột cho nút xem chi tiết -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($billInfo as $b): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($b['bill_id']); ?></td>
                                    <td><?php echo htmlspecialchars($b['product_name']); ?></td>
                                    <td><?php echo htmlspecialchars($b['name']); ?></td>
                                    <td><?php echo htmlspecialchars($b['email']); ?></td>
                                    <td><?php echo htmlspecialchars($b['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($b['address']); ?></td>
                                    <td><?php echo htmlspecialchars($b['status_name']); ?></td>
                                    <td><?php echo htmlspecialchars(number_format(floatval($b['total_price']), 0, ".", ",")); ?> đ</td>
                                    <td>
                                        <a href="index.php?act=billdetail&bill_id=<?php echo $b['bill_id']; ?>" class="btn btn-info">Xem Chi Tiết</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>