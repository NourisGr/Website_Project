<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='include/css/main.css?t=<?= time(); ?>'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>About</title>
</head>

<body>
<?php 
      include_once("navbar.php");
      navbar("about","aboutGR.php", ["Home ","About ","Contact ","Email ","Phone ","Address ","Products ","Register "],"")?>

    <h1>HTSTA & WSERS</h1>
    <ul class="aboutetext">
        <li>In HTSTA class we are learning how to build a WebSite usning HTML and CSS.</li>
        <li>This WebSite is our project for HTSTA and has to be done until 21 of April 2020.</li>
        <li>Project continues in course WSERS 2021. The goal this year is to rebuild the website using php & to create a full functional product page using only php code.</li>
    </ul>
    <img src="include/images/html.gif" class="aboutimg" alt="html">
    <img src="include/images/php.gif" class="aboutimg" alt="html">
</body>

</html>