<?php
include("./includes/connect.php");
include("./functions/common_function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce-Cart details</title>
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

    .cart-img {
        width: 100px;
        height: 100px;
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
                            <a class="nav-link" href="index.php">Home</a>
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
                            <a class="nav-link active" aria-current="page" href="cart.php"><i
                                    class="fa-solid fa-cart-shopping"></i>
                                <sup>
                                    <?php cart_item(); ?> </sup>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>
                    </ul>
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
            <p class="text-center">Communications is at the heart of e-commerce and
                community</p>
        </div>

        <!-- cart table -->
        <div class=" container">
            <div class="row">
                <table class="table table-dark table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Product Title</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Remove</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php code to display dynamic data -->
                        <?php
                        cart_table();
                        ?>

                    </tbody>
                </table>
                <!-- Subtotal -->
                <div class="d-flex mb-3">
                    <h4 class="px-3">Subtotal: <strong class="text-warning"><?php total_cart_price(); ?>/-</strong></h4>
                    <a href="index.php"><button class="btn btn-warning mx-3">Continue Shopping</button></a>
                    <a href="#"><button class="btn btn-dark">Checkout</button></a>
                </div>

            </div>
        </div>

        <!-- Footer -->

        <?php  include("./includes/footer.php");  ?>


    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>