<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    Edit Category
                </div>
                <div class="card-body">
                    <form action="index.php?act=updatedm" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="nameDM"
                                value="<?php echo $dm['product_category_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" hidden value="<?php echo $dm['id'] ?>" name="id">
                            <button class="btn btn-primary" name="update" type="submit">Sửa</button>
                            <a href="index.php?act=listdm" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
                <!-- <p>
                    <?php
                    if (isset($thongbao) && $thongbao != "") {
                        echo $thongbao;
                    }
                    ?>
                </p> -->
            </div>
        </div>
    </main>