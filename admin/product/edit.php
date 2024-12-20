<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Product</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    Edit product
                </div>
                <div class="card-body">
                    <form action="index.php?act=updatesp" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="nameSP"
                                value="<?php echo $sp['product_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Pice</label>
                            <input type="number" class="form-control" name="priceSP"
                                value="<?php echo $sp['product_price'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control"
                                name="description"><?= $sp['product_description'] ?></textarea>
                        </div>
                        <input type="text" hidden value="<?php echo $sp['id'] ?>" name="id">
                        <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        <a href="index.php?act=listsp" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </main>