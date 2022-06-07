<?php
function navbar($activePage, $URL, $buttontext, $lang)

{
?>

    <div class="navbar">
        <?php
        if ($_SESSION["UserLoggedIn"]) {
            print("<div class='malaka'>Welcome " . $_SESSION["User"] . "</div>");
        ?>
            <form METHOD="POST" class="logoutbutton">
                <input type="submit" name="Logout" value="Logout">
            </form>
        <?php
        }
        ?>
        <a href="index.php" <?php if ($activePage == "index") {
                                            print("class= 'active'");
                                        } ?>><?= $buttontext[0] ?> <i class="fa fa-fw fa-home"></i></a>

        <a href="about.php" <?php if ($activePage == "about") {
                                            print("class= 'active'");
                                        } ?>><?= $buttontext[1] ?> <i class="fa fa-fw fa-info"></i></a>


        <div class="links">
            <a href="#"><?= $buttontext[2] ?> <i class="fa fa-fw fa-envelope"></i></a>
            <div class="dropdown">
                <a href="Email.php" <?php if ($activePage == "email") {
                                                    print("class= 'active'");
                                                } ?>><?= $buttontext[3] ?> <i class="fa-regular fa-envelope"></i></a>

                <a href="phone.php" <?php if ($activePage == "phone") {
                                                    print("class= 'active'");
                                                } ?>><?= $buttontext[4] ?> <i class="fa-solid fa-phone"></i></a>

                <a href="Address.php" <?php if ($activePage == "address") {
                                                        print("class= 'active'");
                                                    } ?>><?= $buttontext[5] ?> <i class="fa fa-map-marker"></i></a>
            </div>
        </div>
        <a href="products.php" <?php if ($activePage == "products") {
                                                print("class= 'active'");
                                            } ?>><?= $buttontext[6] ?> <i class="fa-solid fa-shop"></i></a>
        <?php
        if ($_SESSION["UserLoggedIn"]) {
        ?>
            <a href="shopingcart.php" <?php if ($activePage == "ShopingCart") {
                                                        print("class= 'active'");
                                                    } ?>><?= $buttontext[7] ?> <i class="fa fa-fw fa-shopping-basket"></i></a>
        <?php
        }
        ?>

        <a href="register_login.php" <?php if ($activePage == "register_login") {
                                                        print("class= 'active'");
                                                    } ?>><?= $buttontext[8] ?><i class="fa-solid fa-registered"></i></a>

        <?php
        if ($lang == "EN") {
        ?>
            <a href="<?= $URL ?>?lang=GR"> <i class="fa fa-language"></i> <img src="include/images/FlagofGreece.png" class="imgsize" alt="GR"></a>
        <?php } else { ?>
            <a href="<?= $URL ?>?lang=EN"><i class="fa fa-language"></i> <img src="include/images/FlagofBritain.png" class="imgsize" alt="UK"></a>
        <?php } ?>

    </div>

<?php
}
?>
<?php
session_start();
if (!isset($_SESSION["UserLoggedIn"])) {
    $_SESSION["UserLoggedIn"] = false;
}
if(!isset($_SESSION["Language"])){
    $_SESSION["Language"] = "EN";
}
if(isset($_GET["lang"])){
    $_SESSION["Language"] = $_GET["lang"];
}

$host = "localhost";
$username = "root";
$psw = "";
$database = "Shop";
$portNo = 3306;

$connection = new mysqli($host, $username, $psw, $database, $portNo);



if (isset($_POST["User"])) {
    $sqlSearchUser = $connection->prepare("SELECT * from USERS where UserName = ?");
    $sqlSearchUser->bind_param("s", $_POST["User"]);
    $sqlSearchUser->execute();
    $result = $sqlSearchUser->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($_POST["psw"] == $row["UserPassword"]) {
            $_SESSION["UserLoggedIn"] = true;
            $_SESSION["ShoppingCart"] = [];
            $_SESSION["User"] = $_POST["User"];
            $_SESSION["UserId"] = $row["UserId"];
        } else {
            //if $_SESSION["Language"]
            print "<script>alert('Wrong Password!!!.')</script>";
        }
    } else {
        print "<script>alert('Your name is not in our DB.')</script>";
    }
}

if (isset($_POST["Logout"])) {
    session_unset();
    session_destroy();
    header("Refresh:0");
    die();
}

/*INSERTING USERS WITH PASSWORD INTO THE DATABASE*/

mysqli_report(MYSQLI_REPORT_OFF);
if (isset($_POST["UserName"], $_POST["psw"], $_POST["pswver"])) {
    if ($_POST["psw"] == $_POST["pswver"]) {
        $sqlInsert = $connection->prepare("INSERT INTO USERS(UserName,UserPassword) VALUES(?,?)");
        $sqlInsert->bind_param("ss", $_POST["UserName"], $_POST["psw"]);
        if (!$sqlInsert->execute()) {
            print("<div class='frasch'>User already exists!</div>");
        } else {
            print("You have been registered successfully");
        }
    } else {
        print("Password don`t match");
    }
}



if (isset($_POST["BuyAll"])) {
    if (count($_SESSION["ShoppingCart"]) == 0) {
        print "<script>alert('You cannot place empty orders .')</script>";
    } else {
        $uniqueOrderId = time() . $_SESSION["User"];
        // start inserting
        $sqlInsert = $connection->prepare("INSERT into Orders(OrderId,UserId) VALUES(?,?)");
        $sqlInsert->bind_param("si", $uniqueOrderId, $_SESSION["UserId"]);
        $sqlInsert->execute();

        // insert items in to the list table

        foreach ($_SESSION["ShoppingCart"] as $key => $value) {
            $sqlInsert = $connection->prepare("INSERT into List(PID,NumberOfItems,OrderId) VALUES(?,?,?)");
            $sqlInsert->bind_param("iis", $key, $value, $uniqueOrderId);
            $sqlInsert->execute();
        }

        $_SESSION["ShoppingCart"]  = [];
    }

    if (!$_SESSION["UserLoggedIn"]) {
        header("location: products.php");
        die;
    }

    if (isset($_POST["ProductToDelete"])) {
        unset($_SESSION["ShoppingCart"][$_POST["ProductToDelete"]]);
    }
}
?>