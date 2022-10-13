<?php
require '../../Classes/Database.php';

$product_name = $_POST["product_name"];
$price_per_kg = trim($_POST["price_per_kg"]);
$flexRadioDefault = trim($_POST["flexRadioDefault"]);
$category = $_POST["category"];
$submit = $_POST["submit"];

if (
    isset($submit)
    && !empty($product_name)
    && !empty($price_per_kg)
    && !empty($flexRadioDefault)
    && !empty($category)
) {
    // var_dump($_POST);die;
    if ($flexRadioDefault == "true") {
        $flexRadioDefault = true;
    }
    else{
        $flexRadioDefault = false;
    }
    $sql = "INSERT INTO `products`(`name`, `price_per_kg`, `is_flavor_of_week`, `category`)
    VALUES ('$product_name', '$price_per_kg', '$flexRadioDefault','$category')";

    // Voer de "INSERT INTO" STATEMENT uit
    mysqli_query($conn, $sql);

    mysqli_close($conn); // Sluit de database verbinding
    header("location: producten_overzicht.php");
}
