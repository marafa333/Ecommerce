<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
    body {
        overflow-x: hidden;
    }
    </style>
</head>

<body class="bg-secondary-subtle">
    <!-- PHP code to access user id -->
    <?php
    $user_ip = getIPAddress();
    $get_user="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
    $result=mysqli_query($conn,$get_user);
    $run_query=mysqli_fetch_assoc($result);
    $user_id=$run_query['user_id'];
    ?>
    <!-- Payment -->
    <div class="container">
        <h2 class="text-center text-warning my-2">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../admin_area/product_images/upi.jpg"
                        alt="upi"></a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <a href="order.php?user_id=<?= $user_id; ?>">
                    <h2>Pay offline</h2>
                </a>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>