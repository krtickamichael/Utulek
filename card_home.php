<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("database_conn.php");

$db = Db::getInstance();


$dogs = $db->query("SELECT id_dog AS id, 'dog' AS type, name_dog AS name, breed_dog AS breed, img_dog AS image_url FROM dog ORDER BY RAND() LIMIT 3")->results();
$cats = $db->query("SELECT id_cat AS id, 'cat' AS type, name_cat AS name, breed_cat AS breed, img_cat AS image_url FROM cat ORDER BY RAND() LIMIT 3")->results();

$animals = array_merge($dogs, $cats);
shuffle($animals);
$animals = array_slice($animals, 0, 3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Zvířata</title>
</head>

<body>
    <div class="card_content">
        <?php foreach ($animals as $animal): ?>
            <div class="card" style="margin-left: 25px; margin-right: 25px;">
                <img class="img-fluid" name="card_img" src="<?= $animal->image_url ?>" alt="<?= $animal->name ?>">
                <div class="card-body">
                    <h4 class="card-title"><?= $animal->name ?></h4>
                    <p class="card-text"><strong>Breed:</strong> <?= $animal->breed ?></p>
                </div>
                <?php if ($animal->type == "dog") { ?>
                    <a href="dog_details.php?id=<?= $animal->id ?>" class="btn btn-primary detail_btn">Detail</a>
                <?php } else { ?>
                    <a href="cat_details.php?id=<?= $animal->id ?>" class="btn btn-primary detail_btn">Detail</a>
                <?php } ?>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>