<?php
require_once 'app/ProductsController.php';
$controller = new controllerProducts();
$products = array_reverse($controller->getProducts());
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex flex-column">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar scroll</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
                            style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Link</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-disabled="true">Link</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="col-2 flex-grow-1 g-0">
                <div class="d-flex flex-column min-vh-100 flex-shrink-0 p-3 text-white bg-dark">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4">Sidebar</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">Orders</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">Products</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">Customers</a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>mdo</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-10">
                <div class="main p-2">
                    <div class="row">
                        <div class="mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addProductModal">
                                Agregar
                            </button>
                        </div>

                        <!-- Modal para agregar producto -->
                        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addProductModalLabel">Agregar Producto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="app/ProductsController.php" >
                                            <div class="mb-3">
                                                <label for="productName" class="form-label">Nombre del Producto</label>
                                                <input name="name" type="text" class="form-control" id="productName" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="productDescription" class="form-label">slug</label>
                                                <input  name="slug" class="form-control" id="productDescription" rows="3" required></input>
                                            </div>
                                            <div class="mb-3">
                                                <label for="productDescription" class="form-label">Descripción</label>
                                                <textarea name="description" class="form-control" id="productDescription" rows="3" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="productDescription" class="form-label">features</label>
                                                <textarea name="features" class="form-control" id="productDescription" rows="3" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                            <input type="hidden" name="action" value="add_product">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="row">
                                <?php foreach ($products as $product): ?>
                                    <div class="col-4">
                                        <div class="card mb-3" style="width: 100%;">
                                        <img src="<?php echo htmlspecialchars($product->cover); ?>" class="card-img-top" 
                                            alt="Imagen de <?php echo htmlspecialchars($product->name); ?>" 
                                            onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=<?php echo urlencode($product->name); ?>';">                                                <div class="card-body">
                                                <h5 class="card-title"><?php echo htmlspecialchars($product->name); ?></h5>
                                                <p class="card-text"><?php echo htmlspecialchars($product->description); ?></p>
                                                <a href="detail.php?slug=<?php echo $product->id; ?>" class="btn btn-primary">Ver Detalles</a>
                                            </div>
                                            <div class="card-body d-flex justify-content-between">
                                                <a href="#" class="btn btn-danger">Eliminar</a>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editProductModal<?php echo $product->id; ?>">
                                                    Editar
                                                </button>
                                                <!-- Modal para editar producto -->
                                                <div class="modal fade" id="editProductModal<?php echo $product->id; ?>" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="editProductModalLabel">Editar Producto</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="mb-3">
                                                                        <label for="editProductName<?php echo $product->id; ?>" class="form-label">Nombre del Producto</label>
                                                                        <input type="text" class="form-control" id="editProductName<?php echo $product->id; ?>" value="<?php echo htmlspecialchars($product->name); ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editProductDescription<?php echo $product->id; ?>" class="form-label">Descripción</label>
                                                                        <textarea class="form-control" id="editProductDescription<?php echo $product->id; ?>" rows="3" required><?php echo htmlspecialchars($product->description); ?></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>