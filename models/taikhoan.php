<?php

function insert_taikhoan($user_name, $user_email, $user_password, $user_role, $user_img, $user_address, $user_phone) {
    $sql = "INSERT INTO user (user_name, user_email, user_password, user_role, user_img, user_address, user_phone)
            VALUES ('$user_name', '$user_email', '$user_password', '$user_role', '$user_img', '$user_address', '$user_phone')";

    pdo_execute($sql);

}

    function checkuser($user_name, $user_password){
        $sql = "SELECT * FROM user WHERE user_name='".$user_name."' AND user_password='".$user_password."'";
        
        $kq = pdo_query_one($sql);
        return $kq;
    }
    
    function email_da_ton_tai($user_email){
        $sql = "SELECT * FROM user WHERE user_email = '$user_email'";
        $em = pdo_query_one($sql);
        return $em;
    }
    function ten_dang_nhap_da_ton_tai($user_name) {
        $sql = "SELECT * FROM user WHERE user_name = '$user_name'";
        $user = pdo_query_one($sql);
        return $user;
    }

    function sdt_da_ton_tai($user_phone) {
        $sql = "SELECT * FROM user WHERE user_phone = '$user_phone'";
        $user = pdo_query_one($sql);
        return $user;
    }


?>