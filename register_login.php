<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='include/css/main.css?t=<?= time(); ?>'>
    <link href="include/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src='include/bootstrap/js/bootstrap.bundle.min.js'></script>
    <script src="https://kit.fontawesome.com/a2f6705154.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </Style>
</head>

<body>
    <?php
    include_once("commoncode.php");
    navbar("register_login", "register_loginGR.php", ["Home ", "About ", "Contact ", "Email ", "Phone ", "Address ", "Products ", "ShopingCart", "Register "], "")
    ?>

    <div class="loginpage">

        <?php
        if ($_SESSION["UserLoggedIn"]) {

        ?>


        <?php
        } else {
        ?>

            <!--
                <h1>User regisatration form.</h1>

                <h2>Please fill in the following to signup with our website:</h2>

                <form method=" POST">
        <input type="text" name="UserName" placeholder="User Name">
        <input type="password" name="psw" placeholder="Password">
        <input type="password" name="pswver" placeholder="Confirm Password">
        <input type="submit" name="Go" value="Register">
        </form>

        <p>Click <a href="login.php">Here</a> to login</p>
        -->


            <form METHOD="POST">

                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h1 class="fw-bold mb-2 text-uppercase">Register to our website!!!</h1>
                                    <p class="text-white-50 mb-5">Please fill the information below!</p>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeEmailX">User Name</label>
                                        <input type="text" name="UserName" placeholder="User Name" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Type your password</label>
                                        <input type="password" name="psw" placeholder="Password" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Retype your password</label>
                                        <input type="password" name="pswver" placeholder="Confirm Password" class="form-control form-control-lg" />
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="Go" value="Login">Login</button>
                                </div>

                                <div>
                                    <p class="mb-0">You are already registered? <a href="login.php" class="text-white-50 fw-bold">Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
    </div>
</body>
</body>

<?php
        }
?>
</div>
</body>

</html>