<?php
session_start();
$id = $_SESSION["id"];
$pId = $_GET['id'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelmandje</title>
    <link rel="stylesheet" href="../styles/cart.css">
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
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php" class="active"><i class="fa-solid fa-cart-shopping"></i></a></li>
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
    <?php
    require "../../Classes/Database.php";
    $sql = "SELECT * FROM `users` where id = $id";

    if ($result = mysqli_query($conn, $sql)) {

        $user = mysqli_fetch_assoc($result);
    }
    ?>
    <section class="content">
        <div class="container">
            <!-- Hoofd content -->
            <div class="main">
                <h2 class="title">Winkelmandje</h2>
                <form action="cart_verwerk.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                    <div class="row">
                        <label for="afhalen">Afhalen</label>
                        <input type="radio" name="bestelling" id="afhalen" value="afhalen">
                        <label for="bezorgen">Bezorgen</label>
                        <input type="radio" name="bestelling" id="bezorgen" value="bezorgen">
                    </div>
                    <div class="row">
                        <div class="column">
                            <label for="lname">Firstname</label>
                            <input name="lastname" type="text" id="lname" value="<?php echo $user['firstname'] ?>">
                        </div>
                        <div class="column">
                            <label for="lname">Lastname</label>
                            <input name="lastname" type="text" id="lname" value="<?php echo $user['lastname'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                            <label for="pnummer">Phonenumber</label>
                            <input name="pnumber" type="text" id="pnummer" value="<?php echo $user['phonenumber'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <label for="adres">Adres</label>
                            <input name="adres" ype="text" id="adres" value="<?php echo $user['address'] ?>">
                        </div>
                        <div class="column">
                            <label for="postcode">Postcode</label>
                            <input name="zipcode" type="text" id="postcode" value="<?php echo $user['zipcode'] ?>">

                        </div>
                    </div>
                    <button name="submit">Bestel</button>
                    <!-- class="btn btn-warning" href="product_update.php?id=<?php echo $product["id"] ?>" -->
                </form>
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