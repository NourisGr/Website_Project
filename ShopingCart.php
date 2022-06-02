<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='include/css/main.css?t=<?=time();?>'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style> 
</Style>
</head>
<body>
    
<?php 
      include_once("navbar.php");
      navbar("products","productsGR.php", ["Home ","About ","Contact ","Email ","Phone ","Address ","Products ","Register "],"")
?>

<section class="section10">

<?php
include_once("commoncode.php");

if(!$_SESSION["UserLoggedIn"])
{
    header("location: products.php");
    die;
}
?>

 <h1>Here is the list with the products</h1>
<ul>
<?php 
$TotalPrice = 0;
foreach($_SESSION["ShoppingCart"] as $key=>$value) 
{
    $sql = $connection->prepare("Select * from Products where PID=?");
    $sql ->bind_param("s",$key);
    $sql -> execute();
    $result = $sql ->get_result();
    $row = $result->fetch_assoc();
    
?>
<li >You want this item : <?= $row["ProductsName"] ?>, <img src="include/images/<?= $row["img"] ?>">, <?= $value?> times. It will cost you <?= $row["ProductsPrice"]*$value ?></li>
<?php
$TotalPrice+=$row["ProductsPrice"]*$value;
}



 ?>
<h2>You have to pay <?= $TotalPrice?></h2>
 </ul>  
 </section>
</body>
</html>