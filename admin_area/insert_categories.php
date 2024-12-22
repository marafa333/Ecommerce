<?php
include("../includes/connect.php");
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];

    // select data from database
    $select_query="select * from `categories` where category_title='$category_title'";
    $result_select=mysqli_query($conn,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number> 0){
        echo "<script>alert('This category is present inside database')</script>";
    }else{
        $inser_query="insert into `categories` (category_title) values('$category_title')";
        $result=mysqli_query($conn,$inser_query);
        if($result){
            echo "<script>alert('Category has been inserted successfully')</script>";
        }
    }    
}
?>
<h3 class="text-center my-2">Insert Category</h3>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title"
         placeholder="Insert Categories" aria-label="categories"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
    <input type="submit" class="btn btn-warning  mb-3" name="insert_cat" value="Insert Categories">
      </div>
</form>