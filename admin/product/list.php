<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <a href="index.php?act=addsp" class="btn btn-success">Add</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>quantity</th>
                                <th>thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($product as $p) {

                                $img_path = "../uploads/" . $p['product_img'];
                                echo '<tr>
                            <td>' . $p['id'] . '</td>
                            <td>' . $p['product_name'] . '</td>
                            <td>' . $p['category_name'] . '</td>     
                            <td><img src="' . $img_path . '" alt="Product Image" style="width: 100px; height: auto;"></td>
            
                            <td>' . $p['product_price'] . '</td>
                            <td>' . $p['product_description'] . '</td>
                            <td>' . $p['product_quantity'] . '</td>
                            <td>
                            <a href="index.php?act=editsp&id=' . $p['id'] . '"><button class="btn btn-success">Edit</button></a>
                            <a href="index.php?act=xoasp&id=' . $p['id'] . '" onclick="return confirm(\'Bạn muốn xóa ?\')" class="btn btn-danger">Xoá</a>
                            </td>
                            </tr>';
                            } ?>
                        </tbody>

                    </table>
                    <p>
                        <?php
                        if (isset($thongbao) && $thongbao != "") {
                            echo $thongbao;
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </main>