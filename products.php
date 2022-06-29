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
    navbar("products", "productsGR.php", ["Home ", "About ", "Contact ", "Email ", "Phone ", "Address ", "Products ","ShopingCart", "Register "], "")

    ?>

    <section class="section10">

        <?php

        if (isset($_POST["BuyProduct"])) {

            if (isset($_SESSION["ShoppingCart"][$_POST["BuyProduct"]])) {
                $_SESSION["ShoppingCart"][$_POST["BuyProduct"]]++;
            } else {
                $_SESSION["ShoppingCart"][$_POST["BuyProduct"]] = 1;
            }
        }

        if ($_SESSION["UserLoggedIn"]) {
        }
        ?>

        <h1>Products for sale</h1>
        <div class="allpro">



        <?php

            $sqlProducts = $connection->prepare("SELECT * From Products join Descriptions using (PID)  where LID=1");
            $sqlProducts->execute();
            $result = $sqlProducts->get_result();
            while ($row = $result->fetch_assoc()) 
            {
        ?>
                <div class="column">
                    <h2><?= $row["ProductsName"] ?></h2>
                    <p<a href="Showdetail.php?PID=<?= $row["PID"] ?>">
                        <img src="include/images/<?= $row["img"] ?>">
                        </a></p>
                        <h5><?= $row["DescText"] ?> </h5>
                        <h4> <?= $row["ProductsPrice"] ?>€</h4>

                        <form method="POST">
                            <input type="hidden" name="BuyProduct" value="<?= $row["PID"] ?>">
                            <input type="submit" value="BUY" class="buybutton">
                        </form>

                </div>

            <?php
            }
            ?>
        </div>
    </section>
</body>

</html>