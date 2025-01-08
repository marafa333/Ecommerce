<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

if (isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    
}



// getting total items and total price of all items
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$cart_result_price = mysqli_query($conn, $cart_query_price);
$count_products=mysqli_num_rows($cart_result_price);
while ($row_price=mysqli_fetch_assoc($cart_result_price)){
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $run_price = mysqli_query($conn, $select_product);
    while ($row_product_price = mysqli_fetch_assoc($run_price)){
        $product_price =array($row_product_price['product_price']);
        $product_values= array_sum($product_price);
        $total_price += $product_values;
    }
}
?>