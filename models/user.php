<?php
function taikhoan($user_name, $user_email, $user_password, $user_role, $user_img, $user_address, $user_phone)
{
    $sql = "INSERT INTO user(user_name,user_email,user_password,ho_va_ten,so_dien_thoai,dia_chi)
                VALUES ('$user_name','$user_email','$user_password','$user_role','$user_img','$user_address','$user_phone')";
    // echo $sql;
    pdo_execute($sql);
}

function getUser()
{
    $sql = "SELECT * FROM user";
    $list_user = pdo_query($sql);
    return $list_user;
}