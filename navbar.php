<?php
function navbar($activePage, $URL, $buttontext, $lang)

{
?>

    <div class="navbar">
        <a href="index<?= $lang ?>.php" <?php if ($activePage == "index") {
                                            print("class= 'active'");
                                        } ?>><?= $buttontext[0] ?> <i class="fa fa-fw fa-home"></i></a>

        <a href="about<?= $lang ?>.php" <?php if ($activePage == "about") {
                                            print("class= 'active'");
                                        } ?>><?= $buttontext[1] ?> <i class="fa fa-fw fa-info"></i></a>
                                        
        <div class="links">
            <a href="#"><?= $buttontext[2] ?> <i class="fa fa-fw fa-envelope"></i></a>
            <div class="dropdown">
                <a href="Email<?= $lang ?>.php" <?php if ($activePage == "email") {
                                                    print("class= 'active'");
                                                } ?>><?= $buttontext[3] ?> <i class="fa-regular fa-envelope"></i></a>

                <a href="phone<?= $lang ?>.php" <?php if ($activePage == "phone") {
                                                    print("class= 'active'");
                                                } ?>><?= $buttontext[4] ?> <i class="fa-solid fa-phone"></i></a>

                <a href="Address<?= $lang ?>.php" <?php if ($activePage == "address") {
                                                        print("class= 'active'");
                                                    } ?>><?= $buttontext[5] ?> <i class="fa fa-map-marker"></i></a>
            </div>
        </div>
        <a href="products<?= $lang ?>.php" <?php if ($activePage == "products") {
                                                print("class= 'active'");
                                            } ?>><?= $buttontext[6] ?> <i class="fa fa-fw fa-shopping-basket"></i></a>

        <a href="register_login<?= $lang ?>.php" <?php if ($activePage == "register_login") {
                                                        print("class= 'active'");
                                                    } ?>><?= $buttontext[7] ?><i class="fa-solid fa-registered"></i></a>

        <?php
        if ($lang == "") {
        ?>
            <a href="<?= $URL ?>"> <i class="fa fa-language">  </i> <img src="include/images/FlagofGreece.png" class="imgsize" alt="GR"></a>
        <?php } else { ?>
            <a href="<?= $URL ?>"><i class="fa fa-language"></i><img src="include/images/FlagofBritain.png" class="imgsize" alt="UK"></a>
        <?php } ?>

    </div>

<?php
}
?>