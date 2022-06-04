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
    navbar("products", "productsGR.php", ["Home ", "About ", "Contact ", "Email ", "Phone ", "Address ", "Products ", "Register "], "")
    ?>

    <section class="section10">

        <?php

        if (isset($_POST["BuyAll"])) {
            if (count($_SESSION["ShoppingCart"]) == 0) {
                print("You cannot place empty orders");
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
        }

        if (!$_SESSION["UserLoggedIn"]) {
            header("location: products.php");
            die;
        }

        if (isset($_POST["ProductToDelete"])) {
            unset($_SESSION["ShoppingCart"][$_POST["ProductToDelete"]]);
        }

        ?>

        <h1>Payment</h1>
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
                                <span class="price"><?= $row["ProductsPrice"] * $value ?>€</span>
                                <p class="item-name"><?= $row["ProductsName"] ?></p>
                                <p class="item-description"> <img src="include/images/<?= $row["img"] ?>"></p>
                                <form method="POST">
                                    <input type="hidden" name="ProductToDelete" value="<?= $row["PID"] ?>">
                                    <input type="submit" name="removeItem" value="Remove">
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