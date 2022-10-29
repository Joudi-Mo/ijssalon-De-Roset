<?php
// require_once "../Classes/Database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap new link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- fontawesome.com -->
    <script src="https://kit.fontawesome.com/a333f4247d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/producten_overzicht.css">
</head>

<body>
    <?php
    include 'medewerker_header.php';
    require "../../Classes/Database.php";

    $sql = "SELECT * FROM `products`";

    if ($result = mysqli_query($conn, $sql)) {

        $producten = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>

    <a class="btn btn-primary" href="product_maak.php">Add product</a>
    <!-- codepen.io -->
    <table>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Smaak</th>
                <th scope="col">Price per kg</th>
                <th scope="col">Flavor of week</th>
                <th scope="col">Category</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //var_dump($users); die;
            foreach ($producten as $product) : ?>
                <tr>
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
</body>

</html>