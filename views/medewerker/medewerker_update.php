<?php
if (isset($_POST["submit"])) {

    $id = $_POST["id"];
    // var_dump($_POST);die;
    // var_dump($id);die;

    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $pass = trim($_POST["pass"]);
    $birthday = trim($_POST["birthday"]);
    $pnumber = trim($_POST["pnummer"]);
    $adres = trim($_POST["adres"]);
    $zipcode = trim($_POST["zipcode"]);
    $city = trim($_POST["city"]);
    $submit = $_POST["submit"];
    // var_dump($_POST);die;
    if (
        !empty($firstname)
        && !empty($lastname)
        && !empty($email)
        && !empty($birthday)
        && !empty($pnumber)
        && !empty($adres)
        && !empty($zipcode)
        && !empty($city)
    ) {
        // var_dump($_POST);die;
        require "../../Classes/Database.php";

        $sql = "UPDATE `users` SET
        `firstname`='$firstname',
        `lastname`='$lastname',
        `email`='$email',
        `password`='$pass',
        `date_of_birth`='$birthday',
        `phonenumber`='$pnumber',
        `address`='$adres',
        `zipcode`='$zipcode',
        `city`='$city' WHERE id = $id";


        // Voer de INSERT INTO STATEMENT uit
        if (mysqli_query($conn, $sql)) {
            header("location: medewerker_account.php");
        }


        echo "Inserted successfully";
        mysqli_close($conn); // Sluit de database verbinding

    } else {
        header("location: medewerker_account.php?id=$id");
    }
}
