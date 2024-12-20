<?php
session_start();


include "header.php";
include "../models/Product.php";
include "../models/category.php";
include "../models/taikhoan.php";
include "../models/giohang.php";

session_start();  
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {  
    echo "Bạn không có quyền truy cập vào trang này.";  
    exit();  
}
if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        
        case 'listsp':
            if (isset($_POST['update'])) {
                $category_id = $_POST['category_id'];
            } else {
                $category_id = "";
            }
            $category = getCategory();
            $product = loadAllProduct($category_id);
            include("product/list.php");
            break;
        case 'addsp':
            if (isset($_POST['themMoi'])) {
                $name = $_POST['nameSP'];
                $category = $_POST['categoryId'];
                $price = $_POST['priceSP'];
                $description = $_POST['description'];
                $product_quantity = $_POST['product_quantity'];
                $product_img = $_POST['img'];

                // Xử lý ảnh tải lên
                if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                    $target_dir = "../uploads/"; // Thư mục lưu ảnh
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Kiểm tra file ảnh
                    $check = getimagesize($_FILES["img"]["tmp_name"]);
                    if ($check !== false) {
                        // Kiểm tra định dạng ảnh
                        if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                            // Tải ảnh lên thư mục uploads
                            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                                // Đường dẫn ảnh sau khi tải lên thành công
                                $product_img = $target_file;
                                addProduct($name, $price, $category, $product_img, $description, $product_quantity);
                                $thongbao = "Thêm sản phẩm thành công";
                            } else {
                                $thongbao = "Có lỗi xảy ra khi tải ảnh lên";
                            }
                        } else {
                            $thongbao = "Chỉ cho phép các định dạng ảnh JPG, JPEG, PNG, và GIF";
                        }
                    } else {
                        $thongbao = "File không phải là ảnh";
                    }
                } else {
                    $thongbao = "Vui lòng chọn một ảnh để tải lên";
                }
            }
            $category = getCategory();
            include "product/add.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET["id"] > 0)) {
                $id = $_GET['id'];
                deleteProduct($id);
            }
            $product = getProduct();
            include "product/list.php";
            break;
        case 'editsp':
            if (isset($_GET['id']) && ($_GET["id"] > 0)) {
                $id = $_GET['id'];
                $sp = editProduct($id);
            }
            include "product/edit.php";
            break;
        case 'updatesp':
            if (isset($_POST['update'])) {
                $id = $_POST["id"];
                $name = $_POST['nameSP'];
                $price = $_POST['priceSP'];
                $description = $_POST['description'];
                updateProduct($id, $name, $price, $description);
                $thongbao = "Sửa thành công";
            }
            $product = getProduct();
            include "product/list.php";
            break;
        case 'listdm':
            $category = getCategory();
            include "category/list.php";
            break;
        case 'adddm':
            if (isset($_POST['themMoi'])) {
                $name = $_POST['nameDM'];
                addCategory($name);
                $thongbao = "Thêm thành công";
            }
            include "category/add.php";
            break;
        case 'xoadm':
            if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                deleteCategory($id);
            }
            $category = getCategory();
            include "category/list.php";
            break;
        case 'editdm':
            if (isset($_GET['id']) && ($_GET["id"] > 0)) {
                $id = $_GET['id'];
                $dm = editCategory($id);
            }
            include "category/edit.php";
            break;
        case 'updatedm':
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $name = $_POST['nameDM'];
                updateCategory($id, $name);
                $thongbao = "Sửa thành công";
            }
            $category = getCategory();
            include "category/list.php";
            break;
        case 'bill':
            if (isset($_SESSION['user'])) {
                $id = $_SESSION['user']['user_id'];
                $billInfo = getAllBill();
                include "bill/list.php";
            } else {
                echo "Vui long đăng nhập để xem đơn hàng";
            }
            break;
        case "billdetail":
            if (isset($_GET['bill_id']) && $_GET['bill_id'] > 0) {
                $id = $_GET['bill_id'];
                $billInfo = getBillInfoById($id);
                $billDetails = getBillDetails($id);
                include "bill/detail.php";
            } else {
                echo "Vui long đăng nhập để xem đơn hàng";
            }
            break;
        case "updateChiTietDonHang":
            if (isset($_POST['bill_id']) && $_POST['bill_id'] > 0) {
                $id = $_POST['bill_id'];
                $status = $_POST['status'];

                updateStatus($id, $status);
                header("Location: index.php?act=bill");
                exit();
            } else {
                echo "Vui lòng đăng nhập để xem đơn hàng.";
            }
            break;
    }
} else {
    include 'home.php';
}

include 'footer.php';
