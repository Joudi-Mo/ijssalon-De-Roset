<?php
// require_once "../Classes/Database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Producten</title>
    <?php include '../head.php'; ?>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    include 'medewerker_header.php';
    ?>
    <div class="container">
        <a class="btn btn-primary" href="product_maak.php">Add product</a>
    </div>
    <div class="">
        <?php
        require "../../Classes/Database.php";

        $sql = "SELECT * FROM `products`";

        if ($result = mysqli_query($conn, $sql)) {

            $producten = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        ?>
        <div class="container">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Smaak</th>
                        <th>Price per kg</th>
                        <th>Flavor of week</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    //var_dump($users); die;
                    foreach ($producten as $product) : ?>
                        <tr>
                            <td></td>
                            <td><?php echo $product["id"] ?></td>
                            <td><a href="../product.php?id=<?php echo $product["id"] ?>"><?php echo $product["name"] ?></a></td>
                            <td><?php echo $product["price_per_kg"] ?></td>
                            <td><?php echo $product["is_flavor_of_week"] ?></td>
                            <td><?php echo $product["category"] ?></td>
                            <td><a href="product_delete.php?id=<?php echo $product["id"] ?>"><i class="fa-solid fa-trash text-danger"></i></a> </td>
                            <td><a class="btn btn-warning" href="product_update.php?id=<?php echo $product["id"] ?>">Update</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>