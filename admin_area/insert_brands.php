<?php
include("../includes/connect.php");
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];

    // select data from database
    $select_query="select * from `brands` where brand_title='$brand_title'";
    $result_select=mysqli_query($conn,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number> 0){
        echo "<script>alert('This brand is present inside database')</script>";
    }else{
        $inser_query="insert into `brands` (brand_title) values('$brand_title')";
        $result=mysqli_query($conn,$inser_query);
        if($result){
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
    }    
}
?>
<h3 class="text-center my-2">Insert Brand</h3>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title"
         placeholder="Insert Brands" aria-label="brands"
         aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
    <input type="submit" class="btn btn-warning  mb-3" name="insert_brand" value="Insert brands">
      </div>
</form>