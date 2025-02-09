<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

    <div class="body_background">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img\uvod5.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img\uvod6.jpeg" class="d-block w-100">
                </div>
                <div class=" carousel-item">
                    <img src="img\uvod4.jpeg" class="d-block w-100">
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel_layout">
            <a href="https://example.com/umistit" class="button_field" style="margin-right: 20px;">Umístit do útulku</a>
            <a href="" class="button_field middle_button_field" data-bs-toggle="modal" data-bs-target="#exampleModal">Pospořit náš útulek</a>
            <a href=" https://example.com/dobrovolnik" class="button_field" style="margin-left: 20px;">Stát se dobrovolníkem</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bez vaší podpory to nezvládneme!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Náš transparentní účet: <a href="https://ib.fio.cz/ib/transparent?a=2500648929">2500648929/2010</a></p>
                    <p>Načtěte QR kód pomocí bankovní aplikace pro rychlou platbu.</p>
                    <img src="img\qrkod.png">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->



    <?php
    include("footer.php");
    ?>
</body>

</html>