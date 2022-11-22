<?php
require "../../Classes/Database.php";

if (isset($_POST["submit"])) { // als submit gevult is en niet staat aan NULL voert hij de statement uit

    $id = $_POST["id"];
    // var_dump($_POST);die;
    // var_dump($_POST["bestelling"]);die;


    $bestelling = trim($_POST["bestelling"]);
    // $amount = trim($_POST["zipcode"]);
    $submit = $_POST["submit"];

    if (
        !empty($_POST["bestelling"])
        // && !empty($_POST["achternaam"])
    ) {

        // variabeles aan het zetten door post method te gebruiken
        // $name = $_POST["name"];
        if($bestelling == 'afhalen'){
            $afhalen = date('d-m-y h:i:s');
            $bezorgen = null;
        }
        else{
            $afhalen = null;
            $bezorgen = date('d-m-y h:i:s');
        }
// var_dump($id);die;
        // var_dump('echo');
        // die;
        $products = $_POST["smaken_id"];

        $product = explode(",", $products);
// var_dump($product);die;
        foreach ($product as $prod) :
            // var_dump($prod);die;
            // $i = 1;
            // $sql = "INSERT INTO orders (user_id, product_id, date, ordermethod, isRecieved, username, adress, zipcode, city, phonenumber)
            // VALUES ('$id', '$prod','$date', '$method', '$recieved','$name', '$adress','$zipcode', '$city', '$phonenumber')";
            $sql = "INSERT INTO `orders`(`user_id`, `product_id`, `amount`, `pickup`, `delivery`, `is_Recieved`) 
                    VALUES ($id, $prod, 1, '2022-11-24', '2022-11-24','0')";

            // Voer de INSERT INTO STATEMENT uit/ execute de query in het database
            if (mysqli_query($conn, $sql)) {
                // header("location: account.php");
            }
        endforeach;
        //database connectie





        echo "Inserted successfully";
        mysqli_close($conn); // Sluit de database verbinding want er hoeven geen queries meer uitgevoerd te worden
        header("location: bestellen.php");
    }
}
