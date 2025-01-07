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
                    <a class="nav-link text-dark" href="./users_area/user_login.php">Login</a>
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
                <form action="" method="post">
                    <table class="table table-dark table-hover text-center">

                        <!-- php code to display dynamic data -->
                        <?php
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
                        $result = mysqli_query($conn, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "
                                <thead>
                            <tr>
                                <th >Product Title</th>
                                <th >Product Image</th>
                                <th >Quantity</th>
                                <th >Total Price</th>
                                <th >Remove</th>
                                <th  colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                                ";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row["product_id"];
                                $select_product = "select * from `products` where product_id='$product_id'";
                                $result_product = mysqli_query($conn, $select_product);
                                while ($row_product_price = mysqli_fetch_array($result_product)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $table_price = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;
                        ?>
                        <tr>
                            <td><?= $product_title ?></td>
                            <td><img src='./admin_area/product_images/<?= $product_image1 ?>'
                                    class='img-thumbnail cart-img' alt='<?= $product_title ?>' />
                            </td>
                            <td><input class=' rounded form-input w-50' type='text' name='qty' min='1'></td>
                            <!-- Quantities -->
                            <?php
                                        $get_ip_add = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $quantities = is_numeric($quantities) ? intval($quantities) : 1; 
                                            $update_quantity = "update `cart_details` set quantity='$quantities' where ip_address='$get_ip_add'";
                                            $result_product_quantity = mysqli_query($conn, $update_quantity);
                                            $total_price = $total_price * $quantities;
                                        }
                                        
                                        

                                        ?>
                            <td><?= $table_price ?>/-</td>
                            <td><input type='checkbox' name='removeitem[]' value='<?= $product_id ?>'> </td>
                            <td>
                                <input type='submit' name='update_cart' value='Update' class='btn btn-warning'>
                                <input type='submit' name='remove_cart' value='Remove' class='btn btn-danger'>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        } else {
                            echo "<h3 class='text-center text-danger'>Cart is Empty</h3>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- Subtotal -->
                    <div class="d-flex mb-3">
                        <?php
                        $get_ip_add = getIPAddress();
                        $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
                        $result = mysqli_query($conn, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "
                        <h4 class='px-3'>Subtotal: <strong class='text-warning'>$total_price/-</strong>
                        </h4>
                         <input type='submit' name='Continue_Shopping' value='Continue Shopping' class='btn btn-warning mx-3'>
                        <button class='btn btn-dark'><a href='users_area/checkout.php' class='nav-link'>Checkout</a></button>
                        ";
                        } else {
                            echo "<input type='submit' name='Continue_Shopping' value='Continue Shopping' class='btn btn-warning mx-3'>";
                        }
                        if (isset($_POST['Continue_Shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>

                    </div>
            </div>
        </div>
        </form>
        <!-- Function to remove item -->
        <?php
        function remove_cart_item()
        {
            global $conn;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    $delete_query = "delete from `cart_details` where product_id='$remove_id'";
                    $result_delete = mysqli_query($conn, $delete_query);
                    if ($result_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = remove_cart_item();

        ?>



        <!-- Footer -->
        <?php include("./includes/footer.php");  ?>


    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>