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
    include_once("navbar.php");
    navbar("products", "productsGR.php", ["Home ", "About ", "Contact ", "Email ", "Phone ", "Address ", "Products ", "Register "], "")
    ?>

    <section class="section10">

        <?php
        include_once("commoncode.php");

        if (isset($_POST["BuyAll"])) 
        {
            if (count($_SESSION["ShoppingCart"]) == 0) 
            {
                print("You cannot place empty orders");
            } else 
            {
                $uniqueOrderId = time() . $_SESSION["User"];
                // start inserting
                $sqlInsert = $connection->prepare("INSERT into Orders(OrderId,UserId) VALUES(?,?)");
                $sqlInsert->bind_param("si", $uniqueOrderId, $_SESSION["UserId"]);
                $sqlInsert->execute();
    
                // insert items in to the list table
    
                foreach ($_SESSION["ShoppingCart"] as $key => $value) 
                {
                    $sqlInsert = $connection->prepare("INSERT into List(PID,NumberOfItems,OrderId) VALUES(?,?,?)");
                    $sqlInsert->bind_param("iis",$key,$value,$uniqueOrderId);
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

        <h1>Here is the list with the products</h1>
        <ul>

            <?php
            $TotalPrice = 0;
            foreach ($_SESSION["ShoppingCart"] as $key => $value) {
                $sql = $connection->prepare("Select * from Products where PID=?");
                $sql->bind_param("s", $key);
                $sql->execute();
                $result = $sql->get_result();
                $row = $result->fetch_assoc();

            ?>

                <div class="">

                    <li>You want this item : <?= $row["ProductsName"] ?>, <img src="include/images/<?= $row["img"] ?>">, <?= $value ?> times. It will cost you <?= $row["ProductsPrice"] * $value ?>€</li>

                    <form method="POST">
                        <input type="hidden" name="ProductToDelete" value="<?= $row["PID"] ?>">
                        <input type="submit" name="removeItem" value="Remove">
                    </form>
                </div>
            <?php
                $TotalPrice += $row["ProductsPrice"] * $value;
            }

            ?>
            <h2>You have to pay <?= $TotalPrice ?> €</h2>
        </ul>

        <form method="POST">
            <input type="submit" name="BuyAll" value="Finish Order">
        </form>
    </section>
</body>

</html>