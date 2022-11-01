<?php
//  include 'database.php';
if (isset($_POST["submit"])) { // als submit gevult is en niet staat aan NULL voert hij de statement uit
    if (
        !empty($_POST["date"])     // ze moeten allemaal true zijn aka ze moeten niet leeg zijn
        // && !empty($_POST["achternaam"])
        // && !empty($_POST["email"])
        // && !empty($_POST["wachtwoord"])
        // && !empty($_POST["telefoonnummer"])
        // && !empty($_POST["date"])
        // && !empty($_POST["adress"])
        // && !empty($_POST["zipcode"])
        // && !empty($_POST["city"])

    ) {
       
        // variabeles aan het zetten door post method te gebruiken
        $id = $_SESSION['id'];
        $date = $_POST["date"];
        $method = $_POST["method"];
        $recieved = "no";
        $name = $_POST["name"];
        $adress = $_POST["adress"];
        $zipcode = $_POST["zipcode"];
        $city = $_POST["city"];
        $phonenumber = $_POST["phonenumber"];



        $products = $_POST["productid"];
        
        $product = explode(",", $products);

        foreach ($product as $prod) : 

            $sql = "INSERT INTO orders (user_id, product_id, date, ordermethod, isRecieved, username, adress, zipcode, city, phonenumber)
            VALUES ('$id', '$prod','$date', '$method', '$recieved','$name', '$adress','$zipcode', '$city', '$phonenumber')";

            // Voer de INSERT INTO STATEMENT uit/ execute de query in het database
            mysqli_query($conn, $sql);
        endforeach;
        //database connectie
        


      

        echo "Inserted successfully";
        mysqli_close($conn); // Sluit de database verbinding want er hoeven geen queries meer uitgevoerd te worden
        header("location: http://localhost/deroset/bestellen.php");
    }
}