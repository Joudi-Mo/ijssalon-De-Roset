<?php
require "../../Classes/Database.php";

$id = $_GET['id'];

$sql = "DELETE FROM `products` WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("location: producten_overzicht.php");
}