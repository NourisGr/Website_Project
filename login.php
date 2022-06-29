<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='include/css/main.css?t=<?= time(); ?>'>
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
  
    <h1>Login to make an oreder</h1>

    <h2></h2>
    <div>
    <?php
    if ($_SESSION["UserLoggedIn"]) {

    ?>

    <?php
    } 
    else {
    ?>
        <form METHOD="POST" >
            <input type="text" name="User" placeholder="User Name">
            <input type="password" name="psw" placeholder="Password">
            <input type="submit" name="Login" value="Login">
        </form>

    <?php
    }
    ?>
</div>
    <p>Click <a href="register_login.php">Here</a> to register</p>
</body>

</html>