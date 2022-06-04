<?php
function navbar($activePage, $URL, $buttontext, $lang)

{

?>

    <div class="navbar">
        <a href="index<?= $lang ?>.php" <?php if ($activePage == "index") {
                                            print("class= 'active'");
                                        } ?>><?= $buttontext[0] ?> <i class="fa fa-fw fa-home"></i></a>

        <a href="about<?= $lang ?>.php" <?php if ($activePage == "about") {
                                            print("class= 'active'");
                                        } ?>><?= $buttontext[1] ?> <i class="fa fa-fw fa-info"></i></a>
             
<?php 
    if ( $_SESSION["UserLoggedIn"])
    {
        ?>
        <a href="ShopingCart.php">Shoping cart</a>
        <?php
    }
?>                          
        <div class="links">
            <a href="#"><?= $buttontext[2] ?> <i class="fa fa-fw fa-envelope"></i></a>
            <div class="dropdown">
                <a href="Email<?= $lang ?>.php" <?php if ($activePage == "email") {
                                                    print("class= 'active'");
                                                } ?>><?= $buttontext[3] ?> <i class="fa-regular fa-envelope"></i></a>

                <a href="phone<?= $lang ?>.php" <?php if ($activePage == "phone") {
                                                    print("class= 'active'");
                                                } ?>><?= $buttontext[4] ?> <i class="fa-solid fa-phone"></i></a>

                <a href="Address<?= $lang ?>.php" <?php if ($activePage == "address") {
                                                        print("class= 'active'");
                                                    } ?>><?= $buttontext[5] ?> <i class="fa fa-map-marker"></i></a>
            </div>
        </div>
        <a href="products<?= $lang ?>.php" <?php if ($activePage == "products") {
                                                print("class= 'active'");
                                            } ?>><?= $buttontext[6] ?> <i class="fa fa-fw fa-shopping-basket"></i></a>

        <a href="register_login<?= $lang ?>.php" <?php if ($activePage == "register_login") {
                                                        print("class= 'active'");
                                                    } ?>><?= $buttontext[7] ?><i class="fa-solid fa-registered"></i></a>

        <?php
        if ($lang == "") {
        ?>
            <a href="<?= $URL ?>"> <i class="fa fa-language">  </i> <img src="include/images/FlagofGreece.png" class="imgsize" alt="GR"></a>
        <?php } else { ?>
            <a href="<?= $URL ?>"><i class="fa fa-language"></i><img src="include/images/FlagofBritain.png" class="imgsize" alt="UK"></a>
        <?php } ?>

    </div>

<?php
}
?>
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

    if (isset($_POST["User"]))
    {
        $sqlSearchUser = $connection->prepare("SELECT * from USERS where UserName = ?");
        $sqlSearchUser->bind_param("s",$_POST["User"]);
        $sqlSearchUser->execute();
        $result = $sqlSearchUser->get_result();
        if ($result->num_rows>0)
        {
            $row = $result->fetch_assoc();
            $_SESSION["UserLoggedIn"] = true;
            $_SESSION["ShoppingCart"] = [];
            $_SESSION["User"] = $_POST["User"];
            $_SESSION["UserId"] = $row["UserId"];
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

