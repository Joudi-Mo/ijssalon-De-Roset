<?php
// require_once "../Classes/Database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klanten</title>
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

    $sql = "SELECT * FROM `users`";

    if ($result = mysqli_query($conn, $sql)) {

        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>

    <a class="btn btn-primary" href="product_maak.php">Add product</a>
    <!-- codepen.io -->
    <table>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Date Of Birth</th>
                <th scope="col">Address</th>
                <th scope="col">Role</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //var_dump($users); die;
            foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user["id"] ?></td>
                    <td><?php echo $user["firstname"] ?></td>
                    <td><?php echo $user["lastname"] ?></td>
                    <td><?php echo $user["email"] ?></td>
                    <td><?php echo $user["password"] ?></td>
                    <td><?php echo $user["phonenumber"] ?></td>
                    <td><?php echo $user["address"] ?></td>
                    <td><?php echo $user["role"] ?></td>
                    <td><a href="klant_delete.php?id=<?php echo $user["id"] ?>"><i class="fa-solid fa-trash text-danger"></i></a> </td>
                    <td><a class="btn btn-warning" href="klant_update.php?id=<?php echo $user["id"] ?>">Update</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>