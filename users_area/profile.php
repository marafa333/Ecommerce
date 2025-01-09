<?php
include("../includes/connect.php");
include("../functions/common_function.php");
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?= $_SESSION['username'] ?> </title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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

    body {
        overflow-x: hidden;
    }



    .edit_img {
        width: 20%;
        height: 100px;
        object-fit: contain;
    }

    .profile_img {
        width: 90%;
        margin: auto;
        display: block;
        height: 100%;
        object-fit: contain;
    }
    </style>
</head>

<body class="bg-secondary-subtle">
    <div class="container-fluid p-0">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php"><img src="../images/shopping-cart.png" alt="logo"
                        style="width:70px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./profile.php">My profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data"
                            aria-label="Search">
                        <input type="submit" class="btn btn-outline-warning" name="search_data_product" value="Search">
                    </form>
                </div>
            </div>
        </nav>
        <!-- Second-Navbar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link text-dark' href='#'>Welcome Guest</a>";
                } else {
                    echo "
                    <li class='nav-item'>
                    <a class='nav-link text-dark' href='#'>Welcome " . $_SESSION['username'] . "</a>
                </li>";
                }

                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link text-dark' href='./user_Login.php'>Login</a>";
                } else {
                    echo "
                    <li class='nav-item'>
                    <a class='nav-link text-dark' href='./logout.php'>Logout</a>
                </li>";
                } ?>

            </ul>
        </nav>

        <!-- Title -->
        <div>
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communications is at the heart of e-commerce and
                community</p>
        </div>

        <!-- Content -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav navbar-dark bg-warning text-center" style="height: 100%;">
                    <li class="nav-item  bg-dark">
                        <a href="#" class="nav-link  text-light">
                            <h5>Your porfile</h5>
                        </a>
                    </li>

                    <?php
                    $username = $_SESSION['username'];
                    $user_image = "SELECT * FROM `user_table` WHERE username='$username'";
                    $user_image = mysqli_query($conn, $user_image);
                    $row_image = mysqli_fetch_assoc($user_image);
                    $user_image = $row_image['user_image'];
                    echo "
                    <li class='nav-item pt-2'>
                        <img src='./user_images/$user_image' class='profile_img' alt='$username'>
                    </li>";

                    ?>

                    <li class="nav-item">
                        <a href="profile.php" class="nav-link  text-dark">
                            Pending orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?edit_account" class="nav-link  text-dark">
                            Edit Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?my_orders" class="nav-link  text-dark">
                            My orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?delete_account" class="nav-link  text-dark">
                            Delete Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link  text-dark">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php get_user_order_details();
                if (isset($_GET['edit_account'])) {
                    include("edit_account.php");
                }
                ?>
            </div>
            <!-- Footer -->

            <?php include("../includes/footer.php");  ?>


        </div>


        <script src=" ../js/bootstrap.bundle.min.js"></script>
</body>

</html>