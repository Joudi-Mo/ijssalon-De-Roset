<?php
session_start();
// $_SESSION = [];
// SESSION_destroy();
// $_SESSION["is_logged_in"] = false;
// $_SESSION["id"] = null;
$id = $_SESSION["id"];
// $_SESSION["username"] = null;
// $_SESSION["role"] = null;
if (!$_SESSION["is_logged_in"]) {
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../styles/account.css">
    <!-- Fontawesoe icons -->
    <script src="https://kit.fontawesome.com/a333f4247d.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require "../../Classes/Database.php";
    $sql = "SELECT * FROM `users` where id = $id";

    if ($result = mysqli_query($conn, $sql)) 
    {
        $user = mysqli_fetch_assoc($result);
    }
    ?>

    <!-- Navigatiebar -->
    <div class="header">
        <nav>
            <label for="" class="logo"><i class="fa-solid fa-ice-cream"></i>De Roset</label>
            <ul class="list">
                <li><a href="bestellen.php">Bestellen</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="over-ons.php">Over ons</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
            <a href="account.php" class="cta"><img class="account" src="../../Assets/smileXD.jpg" alt=""></a>
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
                <h2 class="title">Account</h2>
                <a class="uitloggen" href="../login.php">Uitloggen</a>
                <div class="edit">
                    <form action="account_update.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <div class="row">
                            <div class="column">
                                <label for="fname">Firstname</label>
                                <input name="firstname" type="text" id="fname" value="<?php echo $user['firstname'] ?>">
                            </div>
                            <div class="column">
                                <label for="lname">Lastname</label>
                                <input name="lastname" type="text" id="lname" value="<?php echo $user['lastname'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="email">Email</label>
                                <input name="email" type="text" id="email" value="<?php echo $user['email'] ?>">
                            </div>
                            <div class="column">
                                <label for="pass">Password</label>
                                <input name="pass" type="password" id="pass" value="<?php echo $user['password'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="verjaardag">Birth date</label>
                                <input name="birthday" type="date" id="verjaardag" value="<?php echo $user['date_of_birth'] ?>">
                            </div>
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
                        <div class="row">
                            <div class="column">
                                <label for="stad">Stad</label>
                                <input name="city" type="text" id="stad" value="<?php echo $user['city'] ?>">
                            </div>
                        </div>
                        <button name="submit">Update</button>
                        <!-- class="btn btn-warning" href="product_update.php?id=<?php echo $product["id"] ?>" -->
                    </form>
                    <a class="delete" href="account_delete.php?id=<?php echo $user["id"] ?>">Account permanent verwijderen</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Koppeling aan JavaScript -->
    <script src="../main.js"></script>
</body>

</html>