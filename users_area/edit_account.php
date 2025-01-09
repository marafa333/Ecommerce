<?php
if (isset($_GET['edit_account'])) {
    $username = $_SESSION['username'];
    $user_data = "SELECT * FROM `user_table` WHERE username='$username'";
    $user_data = mysqli_query($conn, $user_data);
    $row_data = mysqli_fetch_assoc($user_data);
    $user_id = $row_data['user_id'];
    $username = $row_data['username'];
    $user_email = $row_data['user_email'];
    $user_address = $row_data['user_address'];
    $user_mobile = $row_data['user_mobile'];
    $existing_image = $row_data['user_image'];
}
    if (isset($_POST['user_update'])) {
        $update_id = $user_id;
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        if(!empty($user_image)){
            if(!empty($existing_image) && file_exists("./user_images/$existing_image")){
                unlink("./user_images/$existing_image");
            }
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        }else{
            $user_image = $existing_image;
        }
        // update query
        $update_query = "UPDATE `user_table` 
        SET
        username='$username',user_email='$user_email',user_image='$user_image',user_address='$user_address',
        user_mobile='$user_mobile' WHERE user_id='$update_id'";
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            echo "<script>alert('Account Updated')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        } else {
            echo "<script>alert('Account Not Updated')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>

<body>
    <h3 class="text-center text-success mb-3">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Username feield -->
        <div class="form-outline mb-3 w-50 mx-auto">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Enter your name" value="<?= $username ?>" id="username"
                name="username" required>
        </div>
        <!-- email feield -->
        <div class="form-outline mb-3 w-50 mx-auto">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Enter your email" value="<?= $user_email ?>"
                id="user_email" name="user_email" required>
        </div>
        <!-- image feield -->
        <div class="form-outline mb-3 w-50 mx-auto">
            <label for="user_image" class="form-label">Image</label>
            <div class="d-flex">
                <input type="file" class="form-control m-auto" id="user_image" name="user_image" required>
                <img src="./user_images/<?= $user_image ?>" class="edit_img" alt="">
            </div>
        </div>
        <!-- address feield -->
        <div class="form-outline mb-3 w-50 mx-auto">
            <label for="user_address" class="form-label">Address</label>
            <input type="text" class="form-control" placeholder="Enter your address" value="<?= $user_address ?>"
                id="user_address" name="user_address" required></i>
        </div>
        <!-- mobile feield -->
        <div class="form-outline mb-3 w-50 mx-auto">
            <label for="user_mobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" placeholder="Enter your mobile" id="user_mobile"
                value="<?= $user_mobile ?>" name="user_mobile" required>
        </div>
        <!-- Update feield -->
        <div class=" mb-3 w-50 mx-auto">
            <input type="submit" class="btn btn-warning" value="Update" name="user_update">
            </p>
        </div>
    </form>
</body>

</html>