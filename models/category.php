<?php
require_once 'db.php';

function getCategory()
{
    $sql = "SELECT * FROM product_category";
    $category = pdo_query($sql);
    return $category;
}

function addCategory($name)
{
    $sql = "INSERT INTO product_category(product_category_name) VALUES ('$name')";
    pdo_query($sql);
}

function deleteCategory($id)
{
    $sql = "DELETE FROM `product_category` WHERE id = $id";
    pdo_query($sql);
}

function editCategory($id)
{
    $sql = "SELECT * FROM `product_category` WHERE id = $id";
    $dm = pdo_query_one($sql);
    return $dm;
}

function updateCategory($id, $name)
{
    $sql = "UPDATE `product_category` 
            SET `product_category_name`='$name' WHERE id = $id";
    pdo_query($sql);
}