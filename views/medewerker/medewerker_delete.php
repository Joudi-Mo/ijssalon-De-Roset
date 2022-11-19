<?php
require "../../Classes/Database.php";

$id = $_GET['id'];

$sql = "DELETE FROM `users` WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("location: ../login.php");
}