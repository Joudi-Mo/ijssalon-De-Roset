<?php
// require_once "../Classes/Database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orders</title>
    <?php include '../head.php'; ?>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    include 'medewerker_header.php';

    require "../../Classes/Database.php";

    // $sql = "SELECT * FROM `orders`";
    $sql = "SELECT orders.id as 'orders_id', firstname, name, amount, pickup, delivery, is_Recieved FROM `orders`
    JOIN users on users.id = orders.user_id
    JOIN products on products.id = orders.product_id";

    if ($result = mysqli_query($conn, $sql)) {

        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>
    <div class="container">
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Flavor</th>
                    <th>Kg/L</th>
                    <th>Pickup_time</th>
                    <th>Delivery_time</th>
                    <th>Recieved</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                //var_dump($users); die;
                foreach ($orders as $order) : ?>
                    <tr>
                        <td></td>
                        <td><?php echo $order["orders_id"] ?></td>
                        <td><?php echo $order["firstname"] ?></td>
                        <td><?php echo $order["name"] ?></td>
                        <td><?php echo $order["amount"] ?></td>
                        <td><?php echo $order["pickup"] ?></td>
                        <td><?php echo $order["delivery"] ?></td>
                        <td><?php echo $order["is_Recieved"] ?></td>
                        <td><a href="bestelling_delete.php?id=<?php echo $order["orders_id"] ?>"><i class="fa-solid fa-trash text-danger"></i></a> </td>
                        <td><a class="btn btn-warning" href="bestelling_update.php?id=<?php echo $order["orders_id"] ?>">Update</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>