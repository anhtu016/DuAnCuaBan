<?php

// xây dựng hàm truy vấn để lấy dữ liệu
function loadAllProduct($category_id)
{
    $sql = "SELECT DISTINCT product.id, product.product_name, product.category_id, product.product_img, product.product_price, product.product_description, product.product_quantity, product_category.product_category_name AS category_name
    FROM product
    JOIN product_category ON product.category_id = product_category.id_category";
    if ($category_id > 0) {
        $sql .= "AND product.category_id = " . $category_id;
    }
    $list = pdo_query($sql);
    return $list;
}

// File Product.php

// Lấy thông tin sản phẩm theo ID
function getProductById($id)
{
    $sql = "SELECT id, product_name, product_price, product_img FROM product WHERE id = :id LIMIT 1";
    $result = pdo_query_one($sql, ['id' => $id]);  // Truy vấn dữ liệu sản phẩm

    if ($result) {
        return $result;
    } else {
        return null;  // Nếu không tìm thấy sản phẩm, trả về null
    }
}


function updateQuantityProduct($id, $product_quantity)
{
    $sql = "UPDATE product SET product_quantity=product_quantity - $product_quantity WHERE id=$id";
    pdo_execute($sql);
}


function loadOneProduct($id)
{
    $sql = "SELECT * FROM product WHERE id = $id";
    $product = pdo_query_one($sql);
    return $product;
}
function getProduct()
{
    $sql = "SELECT * FROM product";
    $product = pdo_query($sql);
    return $product;
}

function addProduct($name, $price, $category, $product_img, $description, $product_quantity)
{
    $sql = "INSERT INTO `product`(`product_name`, `category_id`, `product_img`, `product_price`, `product_description`, `product_quantity`) 
            VALUES ('$name','$category','$product_img','$price','$description','$product_quantity')";
    pdo_query($sql);
}

function deleteProduct($id)
{
    $sql = "DELETE FROM `product` WHERE id = $id";
    pdo_query($sql);
}

function editProduct($id)
{
    $sql = "SELECT * FROM product WHERE id = $id";
    $sp = pdo_query_one($sql);
    return $sp;
}

function updateProduct($id, $name, $price, $description)
{
    $sql = "UPDATE `product` 
            SET product_name='$name',product_price='$price',product_description='$description' WHERE id = $id";
    pdo_query($sql);
}