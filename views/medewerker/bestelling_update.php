<?php
session_start();
// var_dump($_SESSION["is_logged_in"]);die;
// var_dump($_GET);die;
require "../../Classes/Database.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `orders` where id = $id";

if ($result = mysqli_query($conn, $sql)) {
    $product = mysqli_fetch_assoc($result);
    if (is_null($product)) {
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
        <form action="product_update_verwerk.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
            <div class="mb-3">
                <label class="form-label" for="name">Product name:</label>
                <input value="<?php echo $product['name'] ?>" class="form-control" type="text" name="name">
            </div>

            <div class="mb-3">
                <label class="form-label" for="price_per_kg">price_per_kg:</label>
                <input value="<?php echo $product['price_per_kg'] ?>" class="form-control" type="text" name="price_per_kg">
            </div>

            <label class="form-label" for="">Is flavor of the week?</label>
            <div class="form-check">
                <input value="true" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input value="false" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    No
                </label>
            </div>

            <label class="form-label" for="category">Category:</label>
            <select name="category" class="form-select mb-2" aria-label="Default select example">
                <option value="schepijs">Schepijs</option>
                <option value="softijs">Softijs</option>
                <option value="waterijs">Waterijs</option>
            </select>

            <button class="btn btn-warning mt-2" name="submit">Update</button>
            <a class="btn btn-primary mt-2" href="producten_overzicht.php">Cancel</a>
        </form>
    </div>

</body>

</html>