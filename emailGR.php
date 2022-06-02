<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='include/css/main.css?t=<?=time();?>'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>About</title>
</head>
<body>
<?php 
      include_once("navbar.php");
      navbar("emailGR","email.php", ["Αρχική","Σχετικά","Τρόποι Επικοινωνιάς","Email","Κινήτο","Διεύθυνση","Προϊόντα","Εγγραφή"],"GR")?>

<img src="include/images/contactus.png" class="contactimg" alt="contact us">
    <div class="contactpage">
        <h2>Το email μας είναι:</h2>
        <h4><a href="https://mail.yahoo.com/d/compose/5479476841" target="blank">
        <li class="fa fa-fw fw fa-at"></li>emilemetz@yahoo.com</a></h4>
    </div>
</body>
</html>