<?php
session_start();
// if (!$_SESSION['is_logged_in']) {
//     header("location: login.php");
// }

// require_once "../Classes/Database.php";
// $sql = "SELECT * FROM user";
// $result = mysqli_query($conn, $sql);
// $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gebruikers registreren</title>
    <?php 
    include 'head.php' 
    ?>
</head>

<body id="body">
    <div class="flex-container">
        <div style="width: 40%;" class="registerClass2 mt-3">
            <h1>Sign up <i class="fa-solid fa-user-plus"></i></h1>
            <form action="register_verwerk.php" method="POST">
                <div class="mb-2">
                    <label class="form-label" for="firstname">Firstname:</label>
                    <input class="form-control" type="text" name="firstname">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="lastname">Lastname:</label>
                    <input class="form-control" type="text" name="lastname">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" type="email" name="email">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="pass">Password:</label>
                    <input class="form-control" type="password" name="pass">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="birthday">Date of birth:</label>
                    <input class="form-control" type="date" name="birthday" maxlength="10" min="1960-01-01" max="2010-01-01">
                </div>
                
                <div class="mb-2">
                    <label class="form-label" for="pnumber">Phonenumber</label>
                    <input class="form-control" type="text" name="pnumber" maxlength="10">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="adres">Address</label>
                    <input class="form-control" type="text" name="adres">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="zipcode">Zipcode:</label>
                    <input class="form-control" type="text" name="zipcode">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="city">City:</label>
                    <input class="form-control" type="text" name="city">
                </div>

                <label class="form-label" for="">Role:</label>
                <select name="role" class="form-select mb-2" aria-label="Default select example">
                    <option value="Klant">Klant</option>
                    <option value="Medewerker">Medewerker</option>
                    <option value="Manager">Manager</option>
                </select>

                <div class="mb-3">
                    <button id="button1" class="btn mt-2 btn-primary" name="submit">Sign up</button>
                    <a id="button2" class="btn mt-2 btn-primary" href="login.php">Back to Login</a>
                </div>
            </form>
        </div>

        <div style="width: 40%;" class="registerClass mt-3 ">
        </div>

    </div>
</body>

</html>