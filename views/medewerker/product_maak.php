<?php
// session_start();
// if (!$_SESSION['is_logged_in']) {
//     header("location: ../login.php");
// }

// require '../database.php';
// $sql = "SELECT * FROM gebruikers";
// $result = mysqli_query($conn, $sql);
// $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add product</title>
    <?php include '../head.php'; ?>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="container mt-3">
        <h1>Add a product</h1>
        <form action="product_registreer_verwerk.php" method="POST">
            <div class="mb-3">
                <label class="form-label" for="product_name">Product name:</label>
                <input class="form-control" type="text" name="product_name">
            </div>

            <div class="mb-3">
                <label class="form-label" for="price_per_kg">Price per kg:</label>
                <input class="form-control" type="number" name="price_per_kg">
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

            <div class="mb-3">
                <button class="btn btn-primary mt-2" name="submit">Add product</button>
                <a class="btn btn-success mt-2" href="producten_overzicht.php">Products</a>
            </div>
        </form>
    </div>
</body>

</html>