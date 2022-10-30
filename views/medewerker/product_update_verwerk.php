<?php
if (isset($_POST["submit"])) {

    $id = $_POST["id"];
    // var_dump($_POST);die;

    $product_name = $_POST["name"];
    $price_per_kg = trim($_POST["price_per_kg"]);
    $flexRadioDefault = trim($_POST["flexRadioDefault"]);
    $category = $_POST["category"];

    if (
        !empty($product_name)
        && !empty($price_per_kg)
        && !empty($flexRadioDefault)
        && !empty($category)
    ) {
        
        require "../../Classes/Database.php";

        if ($flexRadioDefault == "true") {
            $flexRadioDefault = true;
        }
        else{
            $flexRadioDefault = false;
        }

        $sql = "UPDATE `products` SET 
        `name`='$product_name',
        `price_per_kg`='$price_per_kg',
        `is_flavor_of_week`='$flexRadioDefault',
        `category`='$category' WHERE id = '$id'";

        // Voer de INSERT INTO STATEMENT uit
        if (mysqli_query($conn, $sql)) {
            header("location: producten_overzicht.php");
        }


        echo "Inserted successfully";
        mysqli_close($conn); // Sluit de database verbinding

    } else {
        header("location: product_update_verwerk.php?id=$id");
    }
}
