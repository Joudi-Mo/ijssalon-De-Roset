<?php
if (isset($_POST["submit"])) {

    $id = $_POST["id"];
    // var_dump($_POST);die;

    $amount = $_POST["amount"];
    $recieved = $_POST["recieved"];
// var_dump($_POST);die;
    if (
        !empty($amount)
        && !empty($recieved)
    ) {
        require "../../Classes/Database.php";

        if ($recieved == "true") {
            $recieved = true;
        }
        else{
            $recieved = false;
        }

        $sql = "UPDATE `orders` SET
        `amount`='$amount',
        `is_Recieved`='$recieved' WHERE id = $id";

        // Voer de INSERT INTO STATEMENT uit
        if (mysqli_query($conn, $sql)) {
            header("location: medewerker_bestellingen.php");
        }


        echo "Inserted successfully";
        mysqli_close($conn); // Sluit de database verbinding

    } else {
        header("location: bestelling_update_verwerk.php?id=$id");
    }
}
