<?php include('../includes/connect.php') ?>
<?php include('../functions/common_function.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Registration</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-secondary-subtle">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img src="../images/shopping-cart.png" alt="logo"
                    style="width:65px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./user_registration.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user_login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Registration -->
    <div class="container-fluid my-3">
        <h3 class="text-center">New User Registration</h3>
    </div>
    <div class="row container-fluid">
        <div class="col-lg-12 col-xl-6 mx-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Username feield -->
                <div class="form-outline mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Enter your name" id="username" name="username"
                        required>
                </div>
                <!-- email feield -->
                <div class="form-outline mb-3">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter your email" id="user_email"
                        name="user_email" required>
                </div>
                <!-- image feield -->
                <div class="form-outline mb-3">
                    <label for="user_image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="user_image" name="user_image" required>
                </div>
                <!-- password feield -->
                <div class="form-outline mb-3">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter your password" id="user_password"
                        name="user_password" required>
                </div>
                <!-- Confirm Password feield -->
                <div class="form-outline mb-3">
                    <label for="cuser_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" id="cuser_password"
                        name="cuser_password" required>
                </div>
                <!-- address feield -->
                <div class="form-outline mb-3">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" class="form-control" placeholder="Enter your address" id="user_address"
                        name="user_address" required></i>
                </div>
                <!-- mobile feield -->
                <div class="form-outline mb-3">
                    <label for="user_mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" placeholder="Enter your mobile" id="user_mobile"
                        name="user_mobile" required>
                </div>
                <!-- Register feield -->
                <div class=" mb-3">
                    <input type="submit" class="btn btn-warning" value="Register" name="user_register">
                    <p class="d-flex small fw-bold mt-2">Already have an account?<a href="user_login.php"
                            class="text-danger nav-link"> Login</a>
                    </p>
                </div>
            </form>
            <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- PHP coad -->
<?php
if (isset($_POST['user_register'])) {
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $cuser_password = $_POST['cuser_password'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");

    //select query
    
    $select_query = "SELECT * FROM `user_table` WHERE username='$username' or user_email='$user_email'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        echo "<script>alert('Username and email already exists')</script>";
    }elseif($user_password != $cuser_password){
        echo "<script>alert('Password and Confirm Password does not match')</script>";
    }
    else {
        // insert query
    
    $insert_query = "INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
    VALUES ('$username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_mobile')";
    $sql_execute = mysqli_query($conn, $insert_query);
    if ($sql_execute) {
        echo "<script>alert('Registration Successfull')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    } else {
        echo "<script>alert('Registration Failed')</script>";
    }
    }

    // Select cart itme
    $select_cart_item = "SELECT * FROM `cart_detalis` WHERE ip_address='$user_ip'";
    $cart_result = mysqli_query($conn, $select_cart_item);
    $rows_count = mysqli_num_rows($cart_result);
    if($rows_count > 0){
        $_SESSION['username'] = $username;
        echo "<script>alert('You have $rows_count items in your cart')</script>";
        echo "<script>window.open('./checkout.php','_self')</script>";
    }else{
        $_SESSION['username'] = $username;
        echo "<script>window.open('../index.php','_self')</script>";
    }
    
}



?>