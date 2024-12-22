<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Area</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css style -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
    .admin_image {
        width: 130px;
    }

    .footer {
        width: 100%;
    }
    </style>
</head>

<body class="bg-secondary">
    <div class="container-fluid p-0">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <img src="../images/shopping-cart.png" alt="logo" style="width:70px;">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- Title -->
        <div class="">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
    </div>
    <!-- Controller -->
    <div class="row container-fluid m-0 p-0">
        <div class="col-md-12 bg-warning py-2 d-flex align-items-center">
            <div class="">
                <a href="#"><img src="../images/shopping-cart.png" class="admin_image" alt=""></a>
                <p class="text-center">Admin Name</p>
            </div>
            <div class="text-center">
                <button class="btn btn-dark m-1">
                    <a href="index.php?insert_product" class="nav-link text-warning my-2 ">Insert Products</a>
                </button>
                <button class="btn btn-dark m-1">
                    <a href="" class="nav-link text-warning my-2 ">View Products</a>
                </button>
                <button class="btn btn-dark m-1">
                    <a href="index.php?insert_category" class="nav-link text-warning my-2 ">Insert Categories</a>
                </button>
                <button class="btn btn-dark m-1">
                    <a href="" class="nav-link text-warning my-2 ">View Categories</a>
                </button>
                <button class="btn btn-dark m-1">
                    <a href="index.php?insert_brand" class="nav-link text-warning my-2 ">Insert Brands</a>
                </button>
                <button class="btn btn-dark m-1">
                    <a href="" class="nav-link text-warning my-2 ">View Brands</a>
                </button>
                <button class="btn btn-dark m-1">
                    <a href="" class="nav-link text-warning my-2 ">All Orders</a>
                </button>
                <button class="btn btn-dark m-1">
                    <a href="" class="nav-link text-warning my-2 ">All Payments</a>
                </button>
                <button class="btn btn-dark m-1">
                    <a href="" class="nav-link text-warning my-2 ">List Users</a>
                </button>
                <button class="btn btn-dark m-1">
                    <a href="" class="nav-link text-warning my-2 ">Logout</a>
                </button>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <?php
            if(isset($_GET['insert_category'])){
                include('./insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('./insert_brands.php');
            }
            if(isset($_GET['insert_product'])){
                include('./insert_product.php');
            }
            ?>
    </div>
    <!-- Footer -->
    <div class="container-fluid p-0">
        <footer class="py-3 footer bg-dark" data-bs-theme="dark">
            <p class="text-center text-body-secondary">All rights reserved © Designed by Mo.Arafa-2024 </p>
        </footer>

    </div>


    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>