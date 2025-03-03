<?php
// include("./includes/connect.php");

// getting products
function getProducts()
{
    global $conn;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand() limit 0,9";
            $result_query = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_array($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "
    <div class='col-md-4 mb-3'>
        <div class='card bg-dark' data-bs-theme='dark'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>See More</a>
            </div>
        </div>
</div>";
            }
        }
    }
}

// getting all products
function get_all_products()
{
    global $conn;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand()";
            $result_query = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_array($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "
    <div class='col-md-4 mb-3'>
        <div class='card bg-dark' data-bs-theme='dark'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>See More</a>
            </div>
        </div>
</div>";
            }
        }
    }
}

//getting unique categories
function get_unique_categories()
{
    global $conn;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_row = mysqli_num_rows($result_query);
        if ($num_of_row == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
        while ($row = mysqli_fetch_array($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "
    <div class='col-md-4 mb-3'>
        <div class='card bg-dark' data-bs-theme='dark'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>See More</a>
            </div>
        </div>
</div>";
        }
    }
}
//getting unique brands
function get_unique_brands()
{
    global $conn;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_row = mysqli_num_rows($result_query);
        if ($num_of_row == 0) {
            echo "<h2 class='text-center text-danger'>This brand is not available for service</h2>";
        }
        while ($row = mysqli_fetch_array($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "
        <div class='col-md-4 mb-3'>
            <div class='card bg-dark' data-bs-theme='dark'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>See More</a>
                </div>
            </div>
    </div>";
        }
    }
}

// Brands to be displayed 

function getBrands()
{
    global $conn;
    $select_brands = "select * from `brands`";
    $result_brands = mysqli_query($conn, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
    <a href='index.php?brand=$brand_id' class='nav-link'>
        <h5>$brand_title</h5>
    </a>
</li>";
    }
}

// Categories to be displayed 
function getCategories()
{
    global $conn;
    $select_categories = "select * from `categories`";
    $result_categories = mysqli_query($conn, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
                        <a href='index.php?category=$category_id' class='nav-link'>
                            <h5>$category_title</h5>
                        </a>
                    </li>";
    }
}

//search fun
function search_product()
{
    global $conn;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from  `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);
        $num_of_row = mysqli_num_rows($result_query);
        if ($num_of_row == 0) {
            echo "<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
        }
        while ($row = mysqli_fetch_array($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "
    <div class='col-md-4 mb-3'>
        <div class='card bg-dark' data-bs-theme='dark'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>See More</a>
            </div>
        </div>
</div>";
        }
    }
}

// view more fun
function view_details()
{
    global $conn;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_query = "select * from `products` where product_id=$product_id";
                $result_query = mysqli_query($conn, $select_query);
                while ($row = mysqli_fetch_array($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];

                    echo "
    <div class='col-md-4 mb-3'>
        <div class='card bg-dark' data-bs-theme='dark'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top object-fit-cover' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>See More</a>
            </div>
        </div>
</div>

<div class='col-md-8'>
                        <!-- realted image -->
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-warning'>Realted products</h4>
                            </div>
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image2' class='object-fit-fill rounded card-img-top'
                                    alt='$product_title'>
                            </div>
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image3' class='object-fit-fill rounded card-img-top'
                                    alt='$product_title'>
                            </div>
                        </div>
                    </div>";
                }
            }
        }
    }
}

//fun ip address
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 

// add to cart fun 
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from `cart_details` where ip_address='$get_ip_add' and product_id='$get_product_id' ";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_row = mysqli_num_rows($result_query);
        if ($num_of_row > 0) {
            echo "<script>alert ('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values ('$get_product_id','$get_ip_add',0)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script>alert ('Item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// add to cart item number fun 
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $get_ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $conn;
        $get_ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

//total price fun
function total_cart_price()
{
    global $conn;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
    $result = mysqli_query($conn, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row["product_id"];
        $select_product = "select * from `products` where product_id='$product_id'";
        $result_product = mysqli_query($conn, $select_product);
        while ($row_product_price = mysqli_fetch_array($result_product)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}
// get user order fun
function get_user_order_details()
{
    global $conn;
    $username = $_SESSION['username'];
    $get_details = "select * from `user_table` where username='$username'";
    $result_details = mysqli_query($conn, $get_details);
    while ($row = mysqli_fetch_array($result_details)) {
        $user_id = $row['user_id'];
        if (!isset($_GET['edit_account'])) { 
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "select * from `user_orders` where user_id='$user_id' and order_status='pending'";
                    $result_details_orders = mysqli_query($conn, $get_orders);
                    $row_count = mysqli_num_rows($result_details_orders);
                    if ($row_count > 0) {
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have 
                        <span class=' text-danger'>$row_count</span>
                        pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'=>Order Details</a></p>
                        ";
                    }else{
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have 
                        <span class=' text-danger'>No</span>
                        pending orders</h3>
                        <p class='text-center'><a href='../index.php' class='text-dark'=>Explore products</a></p>
                        ";
                    }
                }
            }
        }
    }
}

?>