<?php
session_start();
ob_start();
// Kết nối đến database và model tài khoản
include './models/db.php';
include './models/taikhoan.php';
include './models/Product.php';
include './models/user.php';
include './models/category.php';
include './models/giohang.php';

// Include header một lần duy nhất
include "views/header.php";
// Điều hướng theo biến `$act`
$act = isset($_GET['act']) ? $_GET['act'] : '/';
// echo $act; die;
switch ($act) {
    case '/':
        $product = getProduct();
        include_once "./views/main.php";
        break;
    case 'about':
        include_once './views/about.php';
        break;

    case 'contact':
        include_once './views/contact.php';
        break;
    case 'details':
        if (isset($_GET['idpro']) && $_GET['idpro'] > 0) {
            $id = $_GET['idpro'];
            $product = loadOneProduct($id);
        }
        include_once './views/detail.php';

        break;

    case 'viewCart':


        include_once './views/giohang/giohang.php';
        break;
    case 'addToCart':
        if (isset($_GET['id'])) {
            $id = $_GET['id']; // Lấy ID sản phẩm từ URL
            $product_quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 1; // Số lượng mặc định là 1

            // Lấy thông tin sản phẩm từ cơ sở dữ liệu
            $product = getProductById($id);
            if ($product) {
                // Kiểm tra nếu giỏ hàng đã có sản phẩm này chưa
                $isExist = false;
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    foreach ($_SESSION['cart'] as $key => $cartItem) {
                        if ($cartItem[0] == $product['id']) {
                            // Sản phẩm đã có trong giỏ hàng, cập nhật số lượng
                            $_SESSION['cart'][$key][2] += $product_quantity;
                            $isExist = true;
                            break;
                        }
                    }
                }

                // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới
                if (!$isExist) {
                    $price = $product['product_price']; // Lấy giá sản phẩm
                    $totalPrice = $price * $product_quantity; // Tính tổng tiền cho số lượng sản phẩm
                    $cartItem = [
                        $product['id'],
                        $price,
                        $product_quantity,
                        $product['product_name'],
                        $product['product_img'],
                        $totalPrice
                    ];

                    // Thêm sản phẩm vào giỏ hàng
                    $_SESSION['cart'][] = $cartItem;
                }

                // In thông tin sản phẩm đã thêm vào giỏ hàng
                header('Location: index.php?act=viewCart');
            } else {
                echo "Sản phẩm không tồn tại.";
            }
        }
        break;
    case 'deleteProductInCart':
        if (isset($_GET['idProductInCart'])) {
            // xoa mang session cart tu vi tri idCart va cat 1 phan tu
            array_splice($_SESSION['cart'], $_GET['idProductInCart'], 1);
        } else {
            $_SESSION['cart'] = [];
        }
        header('Location: index.php?act=viewCart');
        break;


    case 'checkout':

        $name = '';
        $phone = '';
        $address = '';
        $email = '';

        $errName = '';
        $errPhone = "";
        $errAddress = '';
        $errEmail = '';
        $errPay = '';



        if (isset($_SESSION['user'])) {
            $name = $_SESSION['user']['user_name'];
            $phone = $_SESSION['user']['user_phone'];
            $address = $_SESSION['user']['user_address'];
            $email = $_SESSION['user']['user_email'];
            $user_id = $_SESSION['user']['user_id'];
        }
        if (isset($_SESSION['cart'])) {
            $productPrice = $_SESSION['cart'];
        }
        include 'views/giohang/checkout.php';
        break;


        // Phần xử lý checkoutConfirm trong index.php
    case 'confirmCheckout':

        $name = '';
        $phone = '';
        $address = '';
        $email = '';
        $user_id = '';


        $errName = '';
        $errPhone = "";
        $errAddress = '';
        $errEmail = '';
        if (isset($_POST['thanhtoannhanhang'])) {

            $name = trim($_POST['name']);
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']);
            $email = trim($_POST['email']);
            $ghichu = trim(string: $_POST['ghichu']);
            $user_id = trim($_POST['user_id']);

            $totalPrice = totalPriceOrders() ? totalPriceOrders() : 0;
            echo "Total price 1: $totalPrice";
            if ($totalPrice == 0) {
                echo "Giỏ hàng trống hoặc tổng tiền không hợp lệ.";
                exit;
            }

            $check = true;

            if (!$name) {
                $errName = "Nhập tên người mua hàng";
                $check = false;
            }
            if (!$phone) {
                $errPhone = "Nhập số điện thoại";
                $check = false;
            }
            if (!$address) {
                $errAddress = "Nhập địa chỉ nhận hàng";
                $check = false;
            }
            if (!$email) {
                $errEmail = "Nhập email";
                $check = false;
            }
            if ($check) {
                if (isset($_POST['thanhtoannhanhang'])) {
                    $bill_id = creatOrder($name, $phone, $address, $email, $totalPrice, $ghichu, $user_id);
                    foreach ($_SESSION['cart'] as $cartItem) {
                        $product_id = $cartItem[0];
                        $price = $cartItem[1];
                        $quantity = $cartItem[2];
                        $total = $cartItem[5];

                        if ($total === null || $total === '') {
                            $total = 0;  // Gán giá trị mặc định nếu tổng tiền không hợp lệ
                        }
                        addOrderDetails($bill_id, $product_id, $price, $quantity, $total);
                    }
                    unset($_SESSION['cart']);
                    header('Location: http://localhost/DuAn-main/views/camondathang.php');
                }
            } else {
                include 'views/giohang/checkout.php';
            }
        }

        // include 'views/giohang/checkout.php';
        break;
    case 'dangky':
        $user_name = "";
        $user_email = "";
        $user_password = "";
        $user_phone = "";
        $user_address = "";
        $user_role = 0; // Default role for a new user
        $user_img = "default.png"; // 


        if (isset($_POST['dangky']) && ($_POST['dangky'])) {
            $user_name = $_POST["user_name"];
            $user_email = $_POST["user_email"];
            $user_password = $_POST["user_password"];
            $user_phone = $_POST["user_phone"];
            $user_address = $_POST["user_address"];

            $isCheck = true;

            if ($isCheck) {

                if (isset($_FILES['user_img']) && $_FILES['user_img']['error'] == 0) {
                    $user_img = './uploads/' . $_FILES['user_img']['name'];
                    move_uploaded_file($_FILES['user_img']['tmp_name'], $user_img);
                }


                // Insert account with user_role and user_img
                insert_taikhoan($user_name, $user_email, $user_password, $user_role, $user_img, $user_address, $user_phone);
                header('Location: index.php?act=dangnhap');
            }
        }
        include "views/taikhoan/dangky.php";
        break;


    case 'dangnhap':
        $user_name = "";
        $user_password = "";

        if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
            $user_name = $_POST["user_name"];
            $user_password = $_POST["user_password"];
            $checkuser = checkuser($user_name, $user_password);


            $isCheck = true;


            if ($isCheck) {
                if (is_array($checkuser)) {
                    if ($checkuser['user_role'] == 0) {
                        $_SESSION['user'] = $checkuser;

                        header('Location: index.php');
                    }
                    if ($checkuser['user_role'] == 1) {
                        $_SESSION['user'] = $checkuser;

                        header('Location: ./admin/index.php');
                    }
                }
            }
        }
        include "views/taikhoan/dangnhap.php";
        break;
    case 'thoat':
        unset($_SESSION['user']); // Xóa toàn bộ thông tin người dùng
        header('Location: index.php'); // Chuyển hướng về trang chủ
        exit(); // Ngăn các mã tiếp theo chạy
        break;

    case 'bill':
        if (isset($_SESSION['user'])) {
            $listBill = getBillInfo($_SESSION['user']['user_id']);
            // var_dump($listBill);
            // die;
        }
        include './views/bill.php';
        break;

    case 'detail':
        if (isset($_GET['id'])) {  // Đảm bảo sử dụng 'id' thay vì 'detail'
            $idDh = $_GET['id'];
            $billInfo = getBillInfoById($idDh);
            $billDetails = getBillDetails($idDh);
        }
        include './views/billDetail.php';
        break;
    case 'cancelOrder':
        if (isset($_POST['bill_id'])) {
            $id = $_POST['bill_id'];
            // echo $id;
            // die;
            $listBill = cancelOrder($id);
        }
        $listBill = getBillInfo($_SESSION['user']['user_id']);
        include './views/bill.php';
        break;
    default:
        include "views/main.php";
        break;
}

// Include footer một lần duy nhất
include_once "views/footer.php";
