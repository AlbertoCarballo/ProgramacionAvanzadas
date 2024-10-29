<?php
require_once 'app/ProductsController.php';
$controller = new controllerProducts();
$product = $controller->getDetailProduct();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle de Producto</title>
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

            <!-- Main Content -->
            <div class="col-10">
                <div class="main p-2">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <!-- Detalle del producto -->
                                <h2>Detalle del Producto</h2>
                                <?php if (!empty($product)) { ?>
                                    <div class="row">
                                        <div class="col-4">
                                            <div id="carouselExample" class="carousel slide">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                    <img src="<?php echo htmlspecialchars($product->cover); ?>" class="card-img-top" 
                                                        alt="Imagen de <?php echo htmlspecialchars($product->name); ?>" 
                                                        onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=<?php echo urlencode($product->name); ?>';">
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($product->name); ?>" class="d-block w-100" alt="Imagen del producto">
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($product->name); ?>" class="d-block w-100" alt="Imagen del producto">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                                </div>

                                        </div>
                                        <div class="col-4">
                                            <div class="card" style="width: 80vh;">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $product->name; ?></h5>
                                                    <p class="card-text"><?php echo $product->description; ?></p>
                                                    <p class="card-text"><?php echo $product->features; ?></p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Precio: $<?php echo $product->presentations[0]->price[0]->amount; ?></li>
                                                <li class="list-group-item">Categorias:<br>

                                                <?php 
                                                echo '<button type="button" class="btn  btn-success btn-sm me-1">' . htmlspecialchars($product->brand->name) . '</button>';
                                                $buttonClasses = ['btn-primary', 'btn-secondary', 'btn-success', 'btn-danger', 'btn-info', 'btn-light', 'btn-dark'];
                                                
                                                if (!empty($product->tags)) {
                                                    foreach ($product->tags as $index => $tag) {
                                                        $buttonClass = $buttonClasses[$index % count($buttonClasses)];
                                                        echo '<button type="button" class="btn ' . $buttonClass . ' btn-sm me-1">' . htmlspecialchars($tag->name) . '</button>';
                                                    }
                                                } else {
                                                    echo "No hay tags disponibles.";
                                                };
                                                echo '<button type="button" class="btn  btn-warning btn-sm me-1"> go somewhere</button>';
                                                ?>
                                            </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <p>No se encontró el producto.</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- Tablas (sección adicional) -->
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <!-- Puedes agregar contenido extra aquí -->
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
