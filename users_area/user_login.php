<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Login</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
    body {
        overflow-x: hidden;
    }
    </style>
</head>

<body class="bg-secondary-subtle">
    <!-- Login -->
    <div class="container-fluid my-3">
        <h3 class="text-center">User Login</h3>
    </div>
    <div class="row container-fluid">
        <div class="col-lg-12 col-xl-6 mx-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Username feield -->
                <div class="form-outline mb-3"><label for="username" class="form-label">Username</label><input
                        type="text" class="form-control" placeholder="Enter your name" id="username" name="username"
                        required></div>
                <!-- password feield -->
                <div class="form-outline mb-3"><label for="user_password" class="form-label">Password</label><input
                        type="password" class="form-control" placeholder="Enter your password" id="user_password"
                        name="user_password" required><a class="small" href="">Forget password?</a></div>
                <!-- Login feield -->
                <div class=" mb-3"><input type="submit" class="btn btn-warning" value="Login" name="user_login">
                    <p class="d-flex small fw-bold mt-2">Don't have an account? <a href="user_registration.php"
                            class="text-danger nav-link">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html><?php
        if (isset($_POST['user_login'])) {
            $username = $_POST['username'];
            $user_password = $_POST['user_password'];
            $select_query = "SELECT * FROM `user_table` WHERE username = '$username'";
            $result = mysqli_query($conn, $select_query);
            $row_count = mysqli_num_rows($result);
            $row_data = mysqli_fetch_assoc($result);
            $user_ip = getIPAddress();


            //cart item
            $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
            $result_cart = mysqli_query($conn, $select_query_cart);
            $row_count_cart = mysqli_num_rows($result_cart);

            if ($row_count > 0) {
                $_SESSION['username'] = $username;
                if (password_verify($user_password, $row_data['user_password'])) {
                    if ($row_count == 1 && $row_count_cart == 0) {
                        $_SESSION['username'] = $username;
                        echo "<script>alert('Login Successfully')</script>";
                        echo "<script>window.open('./profile.php','_self')</script>";
                    } else {
                        $_SESSION['username'] = $username;
                        echo "<script>alert('Login Successfully')</script>";
                        echo "<script>window.open('./checkout.php','_self')</script>";
                    }
                } else {
                    echo "<script>alert('Invalid Credentials')</script>";
                }
            } else {
                echo "<script>alert('Invalid Credentials')</script>";
            }
        }




        ?>