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
      navbar("aboutGR","about.php", ["Αρχική","Σχετικά","Τρόποι Επικοινωνιάς","Email","Κινήτο","Διεύθυνση","Προϊόντα","Εγγραφή"],"GR")?>

    <h1>HTSTA & WSERS</h1>

    <ul class="aboutetext">
        <li>Στην τάξη HTSTA μαθαίνουμε πώς να χτίζουμε έναν Ιστότοπο χρησιμοποιώντας HTML και CSS.</li>
        <li>Αυτός ο ιστότοπος είναι το έργο μας για το HTSTA και πρέπει να εκτελεστεί έως τις 21 Απριλίου 2020.</li>
        <li>Το έργο συνεχίζεται στην πορεία του WSERS 2021. Ο στόχος φέτος είναι να ξαναχτίσουμε τον ιστότοπο χρησιμοποιώντας php και να δημιουργήσουμε μια πλήρη λειτουργική σελίδα προϊόντος χρησιμοποιώντας μόνο κώδικα php.</li>
    </ul>
    <img src="include/images/html.gif" class="aboutimg" alt="html">
    <img src="include/images/php.gif" class="aboutimg" alt="html">

</body>
</html>