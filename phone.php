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
      navbar("phone","phoneGR.php", ["Home ","About ","Contact ","Email ","Phone ","Address ","Products ","Register "],"")?>


<img src="include/images/contactus.png" class="contactimg" alt="contact us">
    <div class="contactpage">
        <h2>Our telephone number is:</h2>
        <h4><a href="https://www.yellow.lu/en/reverse-search" target="blank">
            <li class="fa fa-fw fw fa-phone"></li>+352691258241
        </a></h4> 


        <iframe src="https://discord.com/widget?id=697162177873707018&theme=dark" width="800" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>

    </div>
</body>
</html>