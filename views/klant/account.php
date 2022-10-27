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
    <!-- Navigatiebar -->
    <div class="header">
        <nav>
            <label for="" class="logo"><i class="fa-solid fa-ice-cream"></i>De Roset</label>
            <ul class="list">
                <li><a href="bestellen.php">Bestellen</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="over-ons.php">Over ons</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href=""><i class="fa-solid fa-cart-shopping"></i></a></li>
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
                <a class="uitloggen" href="#">Uitloggen</a>
                <div class="edit">
                    <form action="">
                        <div class="row">
                            <div class="column">
                                <label for="fname">Firstname</label>
                                <input type="text" id="fname" placeholder="Joudi">
                            </div>
                            <div class="column">
                                <label for="lname">Lastname</label>
                                <input type="text" id="lname" placeholder="Mohamad">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="email">Email</label>
                                <input type="text" id="email" placeholder="Sales">
                            </div>
                            <div class="column">
                                <label for="pass">Password</label>
                                <input type="password" id="pass" placeholder="123">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="verjaardag">Birth date</label>
                                <input type="date" id="verjaardag">
                            </div>
                            <div class="column">
                                <label for="pnummer">Phonenumber</label>
                                <input type="text" id="pnummer" placeholder="0612345678">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="adres">Adres</label>
                                <input type="text" id="adres" placeholder="straatnaam 16">
                            </div>
                            <div class="column">
                                <label for="postcode">Postcode</label>
                                <input type="text" id="postcode" placeholder="1234 AB">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="stad">Stad</label>
                                <input type="text" id="stad" placeholder="Haarlem">
                            </div>
                            <div class="column">
                                <label for="rol">Rol</label>
                                <input type="text" id="rol" placeholder="Klant">
                            </div>
                        </div>
                        <button>Submit</button>
                        <a class="delete" href="#">Account permanent verwijderen</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Koppeling aan JavaScript -->
    <script src="../main.js"></script>
</body>

</html>