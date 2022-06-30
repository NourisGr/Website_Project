
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/a2f6705154.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='include/css/main.css?t=<?= time(); ?>'>

    <title>Document</title>
    <style>
    </Style>
</head>

<body>

    <?php
    include_once("commoncode.php");
        navbar("ShopingCart", "productsGR.php", ["Home ", "About ", "Contact ", "Email ", "Phone ", "Address ", "Products ", "ShopingCart", "Register "], "")
    ?>
<?php
if ($_SESSION["UserLoggedIn"] == false) {
        header("location: products.php");
        die();
    }
?>
    <section class="section10">

        <div>
            <h1>Payment</h1>
        </div>
        <main class="page payment-page">
            <section class="payment-form dark">
                <div class="container">
                    <div class="products">
                        <h3 class="title">Checkout</h3>

                        <?php
                        $TotalPrice = 0;
                        foreach ($_SESSION["ShoppingCart"] as $key => $value) {
                            $sql = $connection->prepare("Select * from Products where PID=?");
                            $sql->bind_param("s", $key);
                            $sql->execute();
                            $result = $sql->get_result();
                            $row = $result->fetch_assoc();

                        ?>
                            <div class="item">
                                <p class="item-name"><?= $row["ProductsName"] ?></p>
                                <p class="item-description"> <img src="include/images/<?= $row["img"] ?>"></p>
                                <span class="price"><?= $row["ProductsPrice"] * $value ?>€</span>
                                <form method="POST">
                                    <input type="hidden" name="ProductToDelete" value="<?= $row["PID"] ?>">
                                    <input type="submit" name="removeItem" value="Remove" >
                                </form>
                            </div>



                        <?php
                            $TotalPrice += $row["ProductsPrice"] * $value;
                        }

                        ?>
                        <div class="total">Total<span class="price">You have to pay <?= $TotalPrice ?> €</span></div>
                    </div>
                </div>
            </section>
        </main>

        <form method="POST">
            <input type="submit" name="BuyAll" value="Finish Order">
        </form>
    </section>
</body>

</html>