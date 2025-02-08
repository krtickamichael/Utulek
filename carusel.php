<?php
require("database_conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="container" name="carousel">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img\carousel_1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img\carousel_2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class=" carousel-item">
                        <img src="img\carousel_3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class=" carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
</body>