<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='include/css/main.css?t=<?=time();?>'>
    <script src="https://kit.fontawesome.com/a2f6705154.js" crossorigin="anonymous"></script>
    <title>About</title>
</head>
<body>
<?php 
      include_once("commoncode.php");
      navbar("email","emailGR.php", ["Home ","About ","Contact ","Email ","Phone ","Address ","Products ","Register "],"")?>

<img src="include/images/contactus.png" class="contactimg" alt="contact us">
<div class="contactpage">
        <h2>Our Email is</h2>
        <h4><a href="https://mail.yahoo.com/d/compose/5479476841" target="blank">
        <li class="fa fa-fw fw fa-at"></li>emilemetz@yahoo.com</a></h4>
</div>
</body>
</html>