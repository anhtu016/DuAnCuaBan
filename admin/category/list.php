<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <a href="index.php?act=adddm" class="btn btn-primary">Add</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($category as $c) {
                                echo '<tr>
                                    <td>' . $c['id_category'] . '</td>
                                    <td>' . $c['product_category_name'] . '</td>
                                    <td>
                                        <a href="index.php?act=editdm&id=' . $c['id_category'] . '"><button class="btn btn-success">Edit</button></a>
                                        <a href="index.php?act=xoadm&id=' . $c['id_category'] . '" onclick="return confirm(\'Bạn muốn xóa ?\')" class="btn btn-danger">Xoá</a>
                                    </td>
                                </tr>';
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>