<?php
include("../includes/connect.php");
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status="true";

    // accessing image name
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    // accessing image tmp_name
    $tmp_image1=$_FILES['product_image1']['tmp_name'];
    $tmp_image2=$_FILES['product_image2']['tmp_name'];
    $tmp_image3=$_FILES['product_image3']['tmp_name'];

    // checking empty condition
    if($product_title=='' || $product_description=='' || $product_keywords=='' || $product_category=='' 
    || $product_brand=='' || $product_price==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($tmp_image1,"./product_images/$product_image1");
        move_uploaded_file($tmp_image2,"./product_images/$product_image2");
        move_uploaded_file($tmp_image3,"./product_images/$product_image3");

        // insert query
        $insert_products = "insert into `products` (product_title,product_description,product_keywords,category_id,
        brand_id,product_image1,product_image2,product_image3,product_price,date,status) 
        values ('$product_title','$product_description','$product_keywords','$product_category','$product_brand',
        '$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query = mysqli_query($conn,$insert_products);
        if($result_query){
        echo "<script>alert('successful inserted the products')</script>";
        }
    }
}
?>


<h3 class="text-center my-2">Insert Product</h3>
<form action="" method="post" enctype="multipart/form-data" class="bg-dark w-75 m-auto mb-2 rounded-2"
    data-bs-theme="dark">

    <!-- Title -->
    <div class="form-outline w-75 mb-2 m-auto">
        <label for="product_title" class="form-label text-warning mt-2">Product title</label>
        <input type="text" class="form-control" name="product_title" id="product_title" aria-describedby="product_title"
            placeholder="Enter product title" autocomplete="off" required="required">
    </div>

    <!-- Description -->
    <div class="form-outline w-75 mb-2 m-auto">
        <label for="product_description" class="form-label text-warning mt-2">Product description</label>
        <input type="text" class="form-control" name="product_description" id="product_description"
            aria-describedby="product_description" placeholder="Enter product description" autocomplete="off"
            required="required">
    </div>

    <!-- Keywords -->
    <div class="form-outline w-75 mb-2 m-auto">
        <label for="product_keywords" class="form-label text-warning mt-2">Product keywords</label>
        <input type="text" class="form-control" name="product_keywords" id="product_keywords"
            aria-describedby="product_keywords" placeholder="Enter product keywords" autocomplete="off"
            required="required">
    </div>

    <!-- Category -->
    <div class="form-outline w-75 mb-2 m-auto">
        <label for="category_id" class="form-label text-warning mt-2">Category</label>
        <select class="form-select" name="product_category" aria-label="Default select example" required="required">
            <option selected>Select category</option>
            <?php
                    $select_query = "select * from `categories`";
                    $result_query = mysqli_query($conn,$select_query);
                    while($row=mysqli_fetch_array($result_query)){
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
        </select>
    </div>

    <!-- Brand -->
    <div class="form-outline w-75 mb-2 m-auto">
        <label for="brand_id" class="form-label text-warning mt-2">Brand</label>
        <select class="form-select" name="product_brand" aria-label="Default select example" required="required">
            <option selected>Select brand</option>
            <?php
                    $select_query = "select * from `brands`";
                    $result_query = mysqli_query($conn,$select_query);
                    while($row=mysqli_fetch_array($result_query)){
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
        </select>
    </div>

    <!-- Image1 -->
    <div class="form-outline w-75 mb-2 m-auto">
        <label for="product_image1" class="form-label text-warning mt-2">Product Image1</label>
        <input type="file" class="form-control" name="product_image1" id="product_image1"
            aria-describedby="product_image1" placeholder="Enter product image1" autocomplete="off" required="required">
    </div>

    <!-- Image2 -->
    <div class="form-outline w-75 mb-2 m-auto">
        <label for="product_image2" class="form-label text-warning mt-2">Product Image2</label>
        <input type="file" class="form-control" name="product_image2" id="product_image2"
            aria-describedby="product_image2" placeholder="Enter product image2" autocomplete="off" required="required">
    </div>

    <!-- Image3 -->
    <div class="form-outline w-75 mb-2 m-auto">
        <label for="product_image3" class="form-label text-warning mt-2">Product Image3</label>
        <input type="file" class="form-control" name="product_image3" id="product_image3"
            aria-describedby="product_image3" placeholder="Enter product image3" autocomplete="off" required="required">
    </div>

    <!-- Price -->
    <div class="form-outline w-75 mb-2 m-auto">
        <label for="product_price" class="form-label text-warning mt-2">Product price</label>
        <input type="text" class="form-control" name="product_price" id="product_price" aria-describedby="product_price"
            placeholder="Enter product price" autocomplete="off" required="required">
    </div>

    <!-- Submit -->
    <div class="input-group mb-2">
        <input type="submit" class="btn btn-warning m-auto px-5 my-3" name="insert_product" value="Insert Product">
    </div>
</form>