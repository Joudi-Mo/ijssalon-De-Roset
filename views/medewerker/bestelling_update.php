<?php
session_start();
// var_dump($_SESSION["is_logged_in"]);die;
// var_dump($_GET);die;
require "../../Classes/Database.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `orders` where id = $id";

if ($result = mysqli_query($conn, $sql)) {
    $order = mysqli_fetch_assoc($result);
    if (is_null($order)) {
        //header("location: ../home_personeel.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product update</title>
    <?php include '../head.php'; ?>
</head>

<body id="body">
    <div style="width: 50%;" class="updateForm container mt-5">
        <ul class="list-group">
            <li class="list-group-item">Order_id: <?php echo $order['id'] ?></li>
            <li class="list-group-item">Klant: <?php echo $order['user_id'] ?></li>
            <li class="list-group-item">Smaak: <?php echo $order['product_id'] ?></li>
            <li class="list-group-item">Afhaal tijd:  <?php echo $order['pickup'] ?></li>
            <li class="list-group-item">Ophaal tijd: <?php echo $order['delivery'] ?></li>
        </ul>
        <form action="bestelling_update_verwerk.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $order['id'] ?>">
            <div class="mb-3">
                <label class="form-label" for="amount">Hoeveelheid in liters:</label>
                <input value="<?php echo $order['amount'] ?>" class="form-control" type="number" name="amount">
            </div>

            <label class="form-label" for="category">Recieved:</label>
            <select name="recieved" class="form-select mb-2" aria-label="Default select example">
                <option value="true">Yes</option>
                <option value="false">Not</option>
            </select>

            <button class="btn btn-warning mt-2" name="submit">Update</button>
            <a class="btn btn-primary mt-2" href="medewerker_bestellingen.php">Cancel</a>
        </form>
    </div>

</body>

</html>