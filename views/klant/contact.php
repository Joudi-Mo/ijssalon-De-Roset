<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../styles/contact.css">
    <!-- Fontawesoe icons -->
    <script src="https://kit.fontawesome.com/a333f4247d.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigatiebar -->
    <div class="header">
        <nav>
            <label for="" class="logo"><i class="fa-solid fa-ice-cream"></i>De Roset</label>
            <ul class="list">
                <li><a href="bestellen.php">Bestellen</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="over-ons.php">Over ons</a></li>
                <li><a href="contact.php" class="active">Contact</a></li>
                <li><a href=""><i class="fa-solid fa-cart-shopping"></i></a></li>
                <?php if (!$_SESSION["is_logged_in"]) { ?>
                    <li><a href="../login.php">Inloggen</a></li>
            </ul><?php } else { ?>
            </ul>
            <a href="account.php" class="cta"><img class="account" src="../../Assets/smileXD.jpg" alt="account"></a>
        <?php } ?>

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
                <!-- <h1 class="title">Contact</h1> -->
                <h2 class="title">Ijssalon De Roset</h2>
                <div class="contact2">
                    <div class="adres">
                        <h3>Adres 1:</h3>
                        <span>Burgemeester Mooijstraat 17</span>
                        <span>1901 EP, Castricum</span>
                        <span>T 0212 - 345 678</span>
                    </div>
                    <div class="adres">
                        <h3>Adres 2:</h3>
                        <span>Middenwaard 44</span>
                        <span>1703 SH Heerhugowaard</span>
                        <span>T 0287 - 654 321</span>
                    </div>
                    <div class="adres">
                        <h3>Openingstijden:</h3>
                        <span>maandag t/m vrijdag</span>
                        <span>8:00 - 20:00</span>
                        <span>zaterdag en zondag</span>
                        <span>12:00 - 17:00</span>
                        <span class="read">contact@roset.nl</span>
                    </div>
                </div>
            </div>

            <!-- Smaak van de dag -->
            <div class="dag">
                <?php
                require "../../Classes/Database.php";
                $sql = "SELECT * FROM `products` where is_flavor_of_week = 1";

                if ($result = mysqli_query($conn, $sql)) {

                    $product = mysqli_fetch_assoc($result);
                }
                ?>
                <h3>Smaak van de dag</h3>
                <div class="smaak_img" style="background-color: <?php echo $product['smaak_kleur'] ?> ;"></div>
                <span class="smaak__naam"><?php echo $product['name'] ?></span>
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