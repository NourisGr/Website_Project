<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='include/css/main.css?t=<?=time();?>'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once("navbar.php");
 
    navbar("logigGR","login.php", ["Αρχική","Σχετικά","Τρόποι Επικοινωνιάς","Email","Κινήτο","Διεύθυνση","Προϊόντα","Εγγραφή"],"GR")    ?>

<?php 
session_start();
$_SESSION['Userloged']=false
?>

<h1> Σύνδεση</h1>

    <form method="post">
        Your Username:<input type="text" name="user"> Password:<input type="password" name="password">
        <input type="submit" value="Login">
    </form>

    <?php
    if (isset($_POST["user"], $_POST["password"])) {
        $filename = "Users.txt";
        $NameExistsCheck = fopen($filename, "r");
        $UserNameFound = false;
        while (($line = fgets($NameExistsCheck)) !== false) {
            $Userandpasswordarray = explode(";", $line);
            if ($_POST["user"] == $Userandpasswordarray[0] && $_POST["password"] == $Userandpasswordarray[1]) {
                $UserNameFound = true;
                print("<script>alert('Welcome');</script>");
            }
        }
        if($UserNameFound == false){
            print("<script>alert('This user does not exists');</script>");
        }
        fclose($NameExistsCheck);
    }

    ?>
</body>

</html>