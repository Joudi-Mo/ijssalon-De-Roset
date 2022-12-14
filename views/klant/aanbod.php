<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Aanbod</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

</head>

<body style="background-color: #EAEDED;">
    <?php
    include 'klant_header.php';
    require "../../Classes/Database.php";

    $sql = "SELECT * FROM `products`";

    if ($result = mysqli_query($conn, $sql)) {

        $producten = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    ?>
    <main>

        <div class="album py-5" style="background-color: #EAEDED;">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="background-color: #EAEDED;">

                    <!-- Start card -->
                    <?php
                    //var_dump($users); die;
                    foreach ($producten as $product) : ?>

                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="../../Assets/<?php echo $product["image"] ?>.jpg" alt="ijs smaken">

                                <div class="card-body border-top">
                                    <h2><?php echo $product["name"] ?></h2>
                                    <p class="card-text text-muted">De allelekkerste smaken vind je bij De Roset</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-primary"><?php echo $product["price_per_kg"] ?> ??? per liter</span>
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-sm btn-primary" href="product_update.php?id=<?php echo $product["id"] ?>">Bestel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <!-- End card -->
                </div>
            </div>
        </div>

    </main>

</body>

</html>