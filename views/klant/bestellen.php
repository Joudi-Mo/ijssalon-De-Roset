<?php
session_start();
// $_SESSION = [];
// SESSION_destroy();
// $_SESSION["is_logged_in"] = false;
// $_SESSION["id"] = null;
// $_SESSION["username"] = null;
// $_SESSION["role"] = null;
if ($_SESSION["is_logged_in"]) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellen</title>
    <link rel="stylesheet" href="../styles/bestellen.css">
    <link rel="icon" type="image/x-icon" href="../../Assets/ice-cream_3.png">
    <!-- Fontawesoe icons -->
    <script src="https://kit.fontawesome.com/a333f4247d.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require "../../Classes/Database.php";
    $sql = "SELECT * FROM `products`";

    if ($result = mysqli_query($conn, $sql)) {

        $producten = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>
    <!-- Navigatiebar -->
    <div class="header">
        <nav>
            <label for="" class="logo"><i class="fa-solid fa-ice-cream"></i>De Roset</label>
            <ul class="list">
                <li><a href="bestellen.php" class="active">Bestellen</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="over-ons.php">Over ons</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></li>
                <?php
                if (!$_SESSION["is_logged_in"]) {
                ?>
                    <li><a href="../login.php">Inloggen</a></li>
            </ul>
                <?php
                        } else {
                ?>
                    </ul>
                    <a href="account.php" class="cta"><img class="account" src="../../Assets/smileXD.jpg" alt=""></a>
                <?php
                        }
                ?>

        <label for="check" class="checkbtn">
            <span></span>
            <span></span>
            <span></span>
        </label>
        </nav>
    </div>

    <section class="content">
        <div class="container">
            <!-- Hoofd content -->
            <div class="main">
                <h1 class="title">Smaken</h1>
                <div class="smaken_container">
                    <!-- <div class="smaakcard">
                        <div class="smaak">
                            <div class="smaak_kleur"></div>
                            <span class="smaaknaam">Mango</span>
                        </div>
                        <div class="info">
                            <span class="prijs">9.50€</span>
                            <a class="bestel" href="#">Bestel</a>
                        </div>
                    </div>
                    <div class="smaakcard">
                        <div class="smaak">
                            <div class="smaak_kleur"></div>
                            <span class="smaaknaam">Mango</span>
                        </div>
                        <div class="info">
                            <span class="prijs">9.50€</span>
                            <a class="bestel" href="#">Bestel</a>
                        </div>
                    </div> -->

                    <?php
                    if ($_SESSION["is_logged_in"]) {


                        //var_dump($users); die;
                        foreach ($producten as $product) : ?>
                            <div class="smaakcard">
                                <div class="smaak">
                                    <div class="smaak_kleur" style="background-color:<?php echo $product["smaak_kleur"] ?> ;"></div>
                                    <span class="smaaknaam"><?php echo $product["name"] ?></span>
                                </div>
                                <div class="info">
                                    <span class="prijs"><?php echo $product["price_per_kg"] ?>€</span>
                                    <a class="bestel" href="#.php?id=<?php echo $product["id"] ?>">Bestel</a>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    } else { ?>

                        <h2 class="notlog"> U moet eerst ingelogd zijn om bestellingen te plaatsen</h2>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <!-- Smaak van de dag -->
            <div class="dag">
                <h3>Smaak van de dag</h3>
                <div class="smaak_img"></div>
                <span class="smaak__naam">Aarbei</span>
                <a class="bestel" href="">Bestel</a>
            </div>

            <!-- Populaire smaken -->
            <div class="populaire">
                <h3>Populaire smaken</h3>
                <div class="smaak_img1"></div>
                <span class="smaak__naam">Vanille</span>
                <div class="smaak_img2"></div>
                <span class="smaak__naam">Smurf</span>
                <div class="smaak_img3"></div>
                <span class="smaak__naam">Chocolade</span>

            </div>
        </div>

    </section>

    <div class="footer_outside">
        <footer>
            <div class="adres">
                <span class="heading">Overtoom 17</span>
                <span>2013 AB</span>
                <span>Noord-Holland</span>
                <span>Nederland</span>
            </div>
            <div class="bezorg">
                <span class="heading">Vijfhuizen</span>
                <span>Haarlem</span>
                <span>Heemstede</span>
                <span>Overveen</span>
            </div>
            <div class="voorwaarden">Voorwaarden</div>
        </footer>
    </div>

    <!-- Koppeling aan JavaScript -->
    <script src="../main.js"></script>
</body>

</html>