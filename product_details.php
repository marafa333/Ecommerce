<?php
include("./includes/connect.php");
include("./functions/common_function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css style -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>
    .card-img-top {
        width: 100%;
        height: 200px;
        /* object-fit: contain; */
    }
    </style>
</head>

<body class="bg-secondary">
    <div class="container-fluid p-0">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="images/shopping-cart.png" alt="logo"
                        style="width:70px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
                                <sup><?php cart_item(); ?> </sup>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data"
                            aria-label="Search">
                        <input type="submit" class="btn btn-outline-warning" name="search_data_product" value="Search">
                    </form>
                </div>
            </div>
        </nav>
        <!-- Calling cart fun -->
        <?php
        cart();
        ?>
        <!-- Second-Navbar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!-- Title -->
        <div class="bg-secondary">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communications is at the heart of e-commerce and community</p>
        </div>

        <!-- Content -->
        <div class="row container-fluid">
            <div class="col-md-10">
                <!-- Products -->
                <div class="row">
                    <?php
                    // calling function
                    view_details() ;
                   get_unique_categories() ;
                   get_unique_brands() ;
                    ?>
                </div>
            </div>
            <!-- Sidenav -->
            <div class="col-md-2 p-0 m-0 bg-warning ">
                <!-- Brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-dark ">
                        <a href="#" class="nav-link text-warning">
                            <h4>Delivery Brands</h4>
                        </a>
                    </li>
                    <?php
                    // calling function
                    getBrands();
                    ?>
                </ul>

                <!-- Categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-dark ">
                        <a href="#" class="nav-link text-warning">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                    // calling function
                        getCategories();
                    ?>
                </ul>
            </div>
        </div>

        <!-- Footer -->

        <?php  include("./includes/footer.php");  ?>


    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>