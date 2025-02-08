<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("database_conn.php");

$id_dog = isset($_GET['id']) ? (int) $_GET['id'] : header("dog.php");

$dog = Db::getInstance()->setTable("dog")->select(["*"], ["id_dog" => $id_dog])->results();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Details</title>
</head>

<body>
    <div class="body">
        <?php
        require("navbar.php");
        if (!empty($dog)) {
            foreach ($dog as $row) {
                $row->description_dog = htmlspecialchars($row->description_dog ?? '');
        ?>
                <img src=" <?php echo htmlspecialchars($row->img_dog) ?>" class="card-img-top" name="dog_details_img">
                <div class="container" name="dog_details_title">
                    <?php echo htmlspecialchars($row->name_dog) ?>
                </div>
                <div class="container" name="dog_details_text">
                    <strong>Breed:</strong> <?php echo htmlspecialchars($row->breed_dog) ?><br>
                    <strong>Sex:</strong> <?php echo htmlspecialchars($row->sex_dog) ?><br>
                    <strong>Age:</strong> <?php echo htmlspecialchars($row->age_dog) ?><br>
                    <strong>Size:</strong> <?php echo htmlspecialchars($row->size_dog) ?><br>
                    <strong>Description:</strong> <?php echo htmlspecialchars($row->description_dog) ?>
                </div>
    </div>
<?php
            }
        }
        include("footer.php");
?>
</body>

</html>