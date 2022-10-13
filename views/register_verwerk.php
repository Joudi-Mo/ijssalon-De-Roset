<?php
require '../Classes/Database.php';

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$birthday = $_POST["birthday"];
$pnumber = $_POST["pnumber"];
$adres = $_POST["adres"];
$zipcode = $_POST["zipcode"];
$city = $_POST["city"];
$role = $_POST["role"];
$submit = $_POST["submit"];


if (
    isset($submit)
    && !empty($firstname)
    && !empty($lastname)
    && !empty($email)
    && !empty($pass)
    && !empty($birthday)
    && !empty($pnumber)
    && !empty($adres)
    && !empty($zipcode)
    && !empty($city)
    && !empty($role)
) {
    // K-422-HZ

    $sql = "INSERT INTO 
    `users`(`firstname`, `lastname`, `email`, `password`, `date_of_birth`, `phonenumber`, `address`, `zipcode`, `city`, `role`)

     VALUES ('$firstname','$lastname','$email','$pass','$birthday','$pnumber','$adres','$zipcode','$city','$role')";

    // Voer de "INSERT INTO" STATEMENT uit
    mysqli_query($conn, $sql);
    mysqli_close($conn); // Sluit de database verbinding
    header("location: login.php");
}
else{
    echo 'Er is iets fout gegaan';
}
