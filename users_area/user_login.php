<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Login</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-secondary">
    <div class="container-fluid my-3">
        <h3 class="text-center">User Login</h3>
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
                <!-- password feield -->
                <div class="form-outline mb-3">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter your password" id="user_password"
                        name="user_password" required>
                    <a class="small" href="">Forget password?</a>

                </div>
                <!-- Login feield -->
                <div class=" mb-3">
                    <input type="submit" class="btn btn-warning" value="Login" name="user_login">
                    <p class="d-flex small fw-bold mt-2">Don't have an account? <a href="user_registration.php"
                            class="text-danger nav-link">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>