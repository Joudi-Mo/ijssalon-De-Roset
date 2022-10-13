<?php
require "../../Classes/Database.php";

$id = $_GET['id'];

$sql = "DELETE FROM `orders` WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("location: medewerker_bestellingen.php");
}