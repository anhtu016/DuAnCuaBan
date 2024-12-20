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
    <div class="form-container mb-4 mt-4">
      <h2 class="text-center">Đăng Nhập tài khoản</h2>  
      <form action="index.php?act=dangnhap" method="post">  
        <div class="mb-3">
          <label for="user_name" class="form-label">Tên Tài khoản</label>
          <input type="text" class="form-control" name="user_name" id="user_name" >
        </div>
        <div class="mb-3">
          <label for="user_password" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" name="user_password" id="user_password" >
        </div>
        <input class="btn btn-success" type="submit" name="dangnhap" value="Đăng nhập"></input>
        <div class="mt-3 d-flex justify-content-between">
          <a href="index.php?act=quenmk" class="btn btn-warning">Quên mật khẩu</a>
          <a href="index.php?act=dangky" class="btn btn-danger">Chưa có tài khoản? Đăng ký</a>
        </div>
      </form>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
