<?php
session_start();
$id = $_SESSION["id"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap new link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- fontawesome.com -->
    <script src="https://kit.fontawesome.com/a333f4247d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/producten_overzicht.css">
</head>

<body>
    <?php
    include 'medewerker_header.php';
    require "../../Classes/Database.php";

    // var_dump($id);die;
    $sql = "SELECT * FROM `users` where id = $id";

    if ($result = mysqli_query($conn, $sql)) {
        $user = mysqli_fetch_assoc($result);
    }
    ?>
    <div class="container mt-3">
        <form action="medewerker_update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">

            <div class="mb-3">
                <label class="form-label" for="fname">Firstname:</label>
                <input class="form-control" id="fname" type="text" name="firstname" value="<?php echo $user['firstname'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="lname">Lastname:</label>
                <input class="form-control" id="lname" type="text" name="lastname" value="<?php echo $user['lastname'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" id="email" type="text" name="email" value="<?php echo $user['email'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="pass">Password:</label>
                <input class="form-control" id="pass" type="password" name="pass" value="<?php echo $user['password'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="verjaardag">Birth date:</label>
                <input class="form-control" id="verjaardag" type="date" name="birthday" value="<?php echo $user['date_of_birth'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="pnummer">Phonenumber:</label>
                <input class="form-control" id="pnummer" type="text" name="pnummer" value="<?php echo $user['phonenumber'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="adres">Adres:</label>
                <input class="form-control" id="adres" type="text" name="adres" value="<?php echo $user['address'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="postcode">Postcode:</label>
                <input class="form-control" id="postcode" type="text" name="zipcode" value="<?php echo $user['zipcode'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="stad">Stad:</label>
                <input class="form-control" id="stad" type="text" name="city" value="<?php echo $user['city'] ?>">
            </div>

            <div class="mb-3">
                <button class="btn btn-warning mt-2" name="submit">Update</button>
                <a class="btn btn-danger mt-2" href="medewerker_delete.php?id=<?php echo $user["id"] ?>">Delete account</a>
            </div>
        </form>
    </div>

</body>

</html>