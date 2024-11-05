<?php 

  include "../../app/config.php";
  require_once '../../app/ProductsController.php';
  include_once "../../app/BrandsController.php";
  $controller = new controllerProducts();
  $products = array_reverse($controller->getProducts());
  $brand=new brandsController();
  $brands= $brand->get();
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <?php include "../layouts/head.php" ?>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
    data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <!-- [ Pre-loader ] End -->
    <?php include "../layouts/sidebar.php" ?>
    <?php include "../layouts/navbar.php" ?>

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                                <li class="breadcrumb-item" aria-current="page">Add New Product</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Add New Product</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5> Create a Product</h5>
                        </div>
                        <form class="card-body" enctype="multipart/form-data" method="POST"
                            action="<?= BASE_PATH ?>app/ProductsController.php">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input name="name" type="text" class="form-control" id="productName" required>
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">slug</label>
                                <input name="slug" class="form-control" id="productDescription" rows="3"
                                    required></input>
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Descripción</label>
                                <textarea name="description" class="form-control" id="productDescription" rows="3"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">features</label>
                                <textarea name="features" class="form-control" id="productDescription" rows="3"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <select name="id_brand" class=" form-control">
                                    <?php if(isset($brands)&& count($brands)):?>
                                    <?php foreach($brands as $brand): ?>
                                    <option value="<?=$brand->id?>">
                                        <?=$brand->name?>
                                    </option>
                                    <?php endforeach ?>
                                    <?php endif?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="productImage" class="form-label">Imagen del Producto</label>
                                <input name="cover" type="file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Agregar
                            </button>
                            <input type="hidden" name="action" value="add_product">
                            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                        </form>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <?php include "../layouts/footer.php" ?>

    <?php include "../layouts/scripts.php" ?>

    <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>