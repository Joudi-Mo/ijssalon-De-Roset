<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen 2</title>

    <link rel="stylesheet" href="styles/login.css">

    <!-- fontawesome.com -->
    <script src="https://kit.fontawesome.com/a333f4247d.js" crossorigin="anonymous"></script>
</head>
<?php
// Initialize the session
session_start();
$_SESSION = [];
SESSION_destroy();
session_start();
$_SESSION["is_logged_in"] = false;
$_SESSION["id"] = null;
$_SESSION["username"] = null;
$_SESSION["rol"] = null;
// Include database file
$username = $password = $login_err = "";
require_once "../Classes/Database.php";

if (isset($_POST['submit']) && !empty(trim($_POST["email"])) && !empty(trim($_POST["pass"]))) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["pass"]);

    $sql = "SELECT id, firstname, password, email, role FROM `user` where email = '$email'";
    if ($result = mysqli_query($conn, $sql)) {

        $data = mysqli_fetch_assoc($result);
    }

    if ($email == $data['email'] && $password == $data['password']) {

        // Store data in session variables
        $_SESSION["is_logged_in"] = true;
        $_SESSION["id"] = $data['id'];
        $_SESSION["username"] = $data['firstname'];
        $_SESSION["role"] = $data['rol'];
        if ($data['role'] == 'gebruiker') {
            // header("location: meldingen/melding_maak.php");
        } elseif ($data['role'] == 'medewerker') {
            // header("location: home_medewerker.php");
        } else {
            // header("location: home_manager.php");
        }
    }

    mysqli_close($conn); // Sluit de database verbinding
} elseif (isset($_POST['submit'])) {
    $login_err = "Vul het formulier correct in!";
}

?>

<body id="body">
    <div class="wrapper">
        <h2>Inloggen</h2>
        <form action="#">
            <p class="err-text">
                <?php
                if (!empty($login_err)) {
                    echo $login_err;
                }
                ?>
            </p>
            <div class="input-box">
                <input name="email" type="text" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <input name="pass" type="password" placeholder="Enter your password" required>
            </div>

            <div class="input-box button">
                <input type="submit" value="Log in" name="submit">
            </div>
            <div class="text">
                <h3>Nieuw?<a href="register.php"> Registreer je je hier!</a></h3>
            </div>


            <!-- <div class="input-box">
                <input type="text" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Enter your password" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Enter your password" required>
            </div>
            <div class="policy">
                <input type="checkbox">
                <h3>I accept all terms & conditins</h3>
            </div>
            <div class="input-box button">
                <input type="submit" value="Registreer Nu">
            </div>
            <div class="text">
                <h3>Already have an acount? <a href="#">Login now</a></h3>
            </div> -->
        </form>
    </div>
</body>

</html>