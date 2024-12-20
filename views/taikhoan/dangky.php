<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #f4f7fc;
        
      }

      .form-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
      }

      .form-container h2 {
        font-family: 'Arial', sans-serif;
        color: #333;
        margin-bottom: 20px;
      }

      .form-container .form-control {
        border-radius: 20px;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease;
      }

      .form-container .form-control:focus {
        border-color: #5c9e5e;
        box-shadow: 0 0 5px rgba(92, 158, 92, 0.4);
      }

      .form-container .btn {
        border-radius: 20px;
        width: 100%;
        margin-top: 10px;
      }

      .form-container .btn-warning, 
      .form-container .btn-danger {
        width: 48%;
        display: inline-block;
      }

      .form-container .btn-warning {
        margin-right: 4%;
      }

      .form-container .btn:hover {
        opacity: 0.9;
      }

      .form-container a {
        text-decoration: none;
      }
      a {
        text-decoration: none;
      }
    </style>


  </head>
  <body>
    <div class="form-container mt-4 mb-4">
      <h2>Đăng ký tài khoản</h2>  
    <form id="" action="index.php?act=dangky" method="post" enctype="multipart/form-data">  

<div class="mb-3">
        <label for="user_name"class="form-label">Tên người dùng:</label>  
        <input type="text" id="user_name" class="form-control" name="user_name" >  
  
</div>
<div class="mb-3">
        <label for="user_password" class="form-label">Mật khẩu:</label>  
        <input type="password" id="user_password" class="form-control" name="user_password" > 
      
</div>
<div class="mb-3">
        <label for="user_email" class="form-label">Email:</label>  
        <input type="text" id="user_email" class="form-control" name="user_email" >  
    
</div>
<div class="mb-3">
        <label for="user_address" class="form-label">Địa chỉ:</label>  
        <input type="text" id="user_address" class="form-control" name="user_address" >
      
</div>

<div class="mb-3">
        <label for="user_phone" class="form-label">Số điện thoại:</label>  
        <input type="text" id="user_phone" class="form-control" name="user_phone" > 
     
</div>
<div class="mb-3">
        <label for="user_img">Hình ảnh cá nhân:</label>  
        <input type="file" id="user_img"  name="user_img" >  
</div>


        <input class="btn btn-success" type="submit" name="dangky" value="Đăng ký"></input>  
    </form> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
