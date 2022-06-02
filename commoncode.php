<?php
    session_start();
    if (!isset($_SESSION["UserLoggedIn"]))
    {
        $_SESSION["UserLoggedIn"] = false;        
    }

    $host = "localhost";
    $username="root";
    $psw = "";
    $database = "Shop";
    $portNo = 3306;

    $connection = new mysqli($host,$username,$psw,$database,$portNo);

    if (isset($_POST["User"])){
        $sqlSearchUser = $connection->prepare("SELECT * from USERS where UserName = ?");
        $sqlSearchUser->bind_param("s",$_POST["User"]);
        $sqlSearchUser->execute();
        $result = $sqlSearchUser->get_result();
        if ($result->num_rows>0)
        {
            $_SESSION["UserLoggedIn"] = true;
            $_SESSION["ShoppingCart"] = [];
            $_SESSION["User"] = $_POST["User"];
        }
        else
        {
            print("Your name is not in our DB");
        }
    }

    if (isset($_POST["Logout"]))
    {
        session_unset();
        session_destroy();
        header("Refresh:0");
        die();
    }



    if ($_SESSION["UserLoggedIn"])
    {
        print ("Welcome ".$_SESSION["User"]);
        ?>
        <form METHOD="POST">
            <input type="submit" name="Logout" value="Logout">
        </form>

        <?php
    }
    else
    {
    ?>

    <form METHOD="POST">
        <input type="text" name="User">
        <input type="submit" name="Login" value="Login">
    </form>

<?php 
    }
?>

<a href="products.php">Products page</a>
<?php 
    if ( $_SESSION["UserLoggedIn"])
    {
        ?>
        <a href="ShopingCart.php">Shoping cart</a>
        <?php
    }
?>