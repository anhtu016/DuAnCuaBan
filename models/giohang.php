<?php
// Hàm tính tổng giá trị đơn hàng từ giỏ hàng
function totalPriceOrders()
{
    $total = 0;
    // var_dump([$_SESSION['myCart']]);
    // die;
    foreach ($_SESSION['myCart'] as $product) {
        if (isset($product[5])) {
            $total += $product[5];
        } else {
            // Xử lý khi không có phần tử tại chỉ số 7
            echo "Lỗi: Thiếu thông tin giá trị tổng cho sản phẩm.";
        }
    }

    return $total > 0 ? $total : 0;
}

// Hàm tạo đơn hàng mới trong bảng bill
function creatOrder($name, $phone, $address, $email, $totalPrice, $ghichu, $user_id)
{
    $sql = "INSERT INTO bill(payment_id, name, email, phone, address, ghi_chu, total_price, status_id, user_id) 
            VALUES ('1','$name','$email','$phone','$address','$ghichu',$totalPrice,'1',$user_id)";
    $bill_id = pdo_insert_order($sql); // Hàm này trả về ID của đơn hàng vừa thêm
    return $bill_id;
}

// Hàm thêm chi tiết đơn hàng vào bảng bill_detail
function addOrderDetails($bill_id, $product_id, $product_price, $product_quantity, $total)
{
    $sql = "INSERT INTO bill_detail(bill_id, product_id, price, quantity, thanh_tien) 
            VALUES ('$bill_id', '$product_id', '$product_price', '$product_quantity', '$total')";
    pdo_execute($sql);
}

// function getOrder($status_id, $payment_id)
// {
//     $sql = "SELECT bill.bill_id, bill.name, bill.email, bill.phone, bill.address, bill.ghi_chu, bill.total_price, status.status_name AS status_name, payment.payment_name AS payment_name, product.product_name AS product_name, bill_detail.quantity AS quantity, bill.payment_id, bill.status_id
//             FROM bill
//             JOIN payment ON bill.payment_id = payment.payment_id
//             JOIN bill_detail ON bill.bill_id = bill_detail.bill_id
//             JOIN status ON bill.status_id = status.status_id
//             JOIN product ON product.id = bill_detail.product_id";
//     if ($status_id > 0) {
//         $sql .= "AND bill.status_id = " . $status_id;
//     }
//     if ($payment_id > 0) {
//         $sql .= "AND bill.payment_id = " . $payment_id;
//     }
//     $order = pdo_query($sql);
//     return $order;
// }

function getOrder()
{
    $sql = "SELECT * FROM `bill`";
    $order = pdo_query($sql);
    return $order;
}

function getStatus()
{
    $sql = "SELECT * FROM `status`";
    $status = pdo_query($sql);
    return $status;
}

function getPayment()
{
    $sql = "SELECT * FROM `payment`";
    $payment = pdo_query($sql);
    return $payment;
}
function getBillInfo($userId)
{

    // Truy vấn lấy thông tin đơn hàng
    $sql = "SELECT 
    b.bill_id, 
    b.name, 
    b.email, 
    b.phone, 
    b.address, 
    b.total_price, 
    s.status_name, 
    MIN(bd.bill_deltail_id) AS bill_deltail_id, 
    MIN(bd.product_id) AS product_id,
    MIN(p.product_name) AS product_name, 
    MIN(bd.price) AS price, 
    MIN(bd.quantity) AS quantity, 
    MIN(bd.thanh_tien) AS thanh_tien
FROM 
    bill b 
JOIN 
    bill_detail bd ON b.bill_id = bd.bill_id 
JOIN 
    product p ON bd.product_id = p.id 
JOIN 
    status s ON b.status_id = s.status_id 
WHERE 
    b.user_id = $userId
GROUP BY 
    b.bill_id, 
    b.name, 
    b.email, 
    b.phone, 
    b.address, 
    b.total_price, 
    s.status_name;";

    $billInfo = pdo_query($sql);

    return $billInfo;
}

function getBillInfoById($idDh)
{
    $sql = "SELECT 
                b.*, 
                s.status_name 
            FROM 
                `bill` b
            JOIN 
                `status` s ON b.status_id = s.status_id
            WHERE 
                b.bill_id = $idDh";
    $billInfo = pdo_query($sql);
    return $billInfo;
}

function getBillDetails($idDh)
{
    $sql = "SELECT 
            b.bill_id,
            b.name,
            b.email,
            b.phone,
            b.address,
            b.total_price,
            s.status_name,
            bd.bill_deltail_id,
            bd.product_id,
            p.product_name,
            bd.price,
            bd.quantity,
            bd.thanh_tien
        FROM 
            bill b
        JOIN 
            bill_detail bd ON b.bill_id = bd.bill_id
        JOIN 
            product p ON bd.product_id = p.id
        JOIN 
            status s ON b.status_id = s.status_id
        WHERE 
            b.bill_id =$idDh;";
    return pdo_query($sql);
}
function cancelOrder($id)
{
    $sql = "UPDATE `bill` 
SET 
    `status_id` = 5 
WHERE 
    `bill_id` = $id AND 
    `status_id` = 1;";
    $affected_rows = pdo_query($sql);
    return $affected_rows;
}
function getAllBill()
{
    $sql = "SELECT b.bill_id, b.name, b.email, b.phone, b.address, b.total_price, s.status_name, 
    MIN(bd.bill_deltail_id) AS bill_deltail_id, 
    MIN(bd.product_id) AS product_id, 
    MIN(p.product_name) AS product_name, 
    MIN(bd.price) AS price, 
    MIN(bd.quantity) AS quantity, 
    MIN(bd.thanh_tien) AS thanh_tien 
    FROM 
    bill b 
    JOIN bill_detail bd ON b.bill_id = bd.bill_id 
    JOIN product p ON bd.product_id = p.id 
    JOIN status s ON b.status_id = s.status_id 
    GROUP BY b.bill_id, b.name, b.email, b.phone, b.address, b.total_price, s.status_name;";
    return pdo_query($sql);
}
function canUpdateStatus($id, $new_status)
{
    // Lấy trạng thái hiện tại của đơn hàng
    $sql = "SELECT status_id FROM bill WHERE bill_id = $id";
    $current_status = pdo_query($sql);

    if ($current_status === false) {
        return false; // Đơn hàng không tồn tại
    }

    // Kiểm tra logic cập nhật trạng thái
    if ($current_status == 1 && $new_status == 2) return true; // Từ 1 sang 2
    if ($current_status == 2 && $new_status == 3) return true; // Từ 2 sang 3
    if ($current_status == 3 && $new_status == 4) return true; // Từ 3 sang 4
    if ($current_status == 4 && $new_status == 5) return true; // Từ 4 sang 5
    return false; // Không cho phép các trạng thái khác
}

function updateStatus($id, $status)
{
    $sql = "UPDATE `bill` SET `status_id` = $status WHERE `bill_id` = $id";
    $affected_rows = pdo_query($sql);
    return $affected_rows;
}
