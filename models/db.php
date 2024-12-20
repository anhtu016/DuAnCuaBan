<?php
/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
//function connect database
function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=data_da1_fix2;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

//function sửa, thêm, xóa
function pdo_execute($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        echo "Data inserted successfully.";
    } catch (PDOException $e) {
        echo "SQL Error: " . $e->getMessage();
        throw $e;
    } finally {
        unset($conn);
    }
}


//Lay id don hang
function pdo_insert_order($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

function pdo_query($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

function pdo_query_one($sql, $args = []) {
    try {
        $conn = pdo_get_connection();  // Kết nối CSDL
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);  // Thực thi truy vấn

        // Trả về một dòng kết quả
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Lỗi truy vấn PDO: " . $e->getMessage());
        return null;
    }
}


function pdo_query_value($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}



