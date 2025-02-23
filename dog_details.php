<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("database_conn.php");
require_once "includes/config_session.inc.php";

$id_dog = isset($_GET['id']) ? (int) $_GET['id'] : header("dog.php");

$dog = Db::getInstance()->setTable("dog")->select(["*"], ["id_dog" => $id_dog])->results();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_dog = $_POST['name_dog'];
    $breed_dog = $_POST['breed_dog'];
    $sex_dog = $_POST['sex_dog'];
    $age_dog = $_POST['age_dog'];
    $size_dog = $_POST['size_dog'];
    $description_dog = $_POST['description_dog'];

    Db::getInstance()->setTable("dog")->update(
        $id_dog,
        [
            "name_dog" => $name_dog,
            "breed_dog" => $breed_dog,
            "sex_dog" => $sex_dog,
            "age_dog" => $age_dog,
            "size_dog" => $size_dog,
            "description_dog" => $description_dog
        ]
    );

    header("Location: dog_details.php?id=$id_dog");
    die();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Details</title>
</head>

<body>
    <?php
    require("navbar.php");
    ?>
    <div class="body">
        <?php
        if (!empty($dog)) {
            foreach ($dog as $row) {
                $row->description_dog = htmlspecialchars($row->description_dog ?? '');
        ?>
                <img src=" <?php echo htmlspecialchars($row->img_dog) ?>" class="card-img-top" name="dog_details_img">
                <div class="container" name="dog_details_text">

                    <?php
                    if (isset($_SESSION["user_id"])) { ?>
                        <form method="POST" action="dog_details.php?id=<?php echo htmlspecialchars($row->id_dog) ?>" class="edit-form">
                            <div class="container" name="dog_details_title">
                                <input class="form-control" type="text" id="name_dog" name="name_dog" value="<?php echo htmlspecialchars($row->name_dog); ?>">
                            </div>
                            <div class="form-group">
                                <label for="breed_dog">Breed: </label>
                                <input class="form-control" type="text" id="breed_dog" name="breed_dog" value="<?php echo htmlspecialchars($row->breed_dog); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="sex_dog">Sex: </label>
                                <input class="form-control" type="text" id="sex_dog" name="sex_dog" value="<?php echo htmlspecialchars($row->sex_dog); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="age_dog">Age: </label>
                                <input class="form-control" type="text" id="age_dog" name="age_dog" value="<?php echo htmlspecialchars($row->age_dog); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="size_dog">Size: </label>
                                <input class="form-control" type="text" id="size_dog" name="size_dog" value="<?php echo htmlspecialchars($row->size_dog); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="Description_dog">Description: </label>
                                <textarea class="form-control" id="description_dog" name="description_dog"><?php echo htmlspecialchars($row->description_dog); ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    <?php
                    } else { ?>
                        <?php
                        echo htmlspecialchars($row->name_dog);
                        ?>
                        </br>
                        <label>Breed:</label>
                        <?php echo htmlspecialchars($row->breed_dog); ?>
                        </br>

                        <label>Sex:</label>
                        <?php echo htmlspecialchars($row->sex_dog); ?>
                        </br>

                        <label>Age:</label>
                        <?php echo htmlspecialchars($row->age_dog); ?>
                        </br>

                        <label>Size:</label>
                        <?php echo htmlspecialchars($row->size_dog); ?>
                        </br>

                        <label>Description:</label>
                        <?php echo htmlspecialchars($row->description_dog); ?>
                        </br>
                    <?php } ?>
                </div>

    </div>
    <div class="body">
        <div class="dog_content">

        </div>
    </div>
<?php
            }
        }
        include("footer.php");
?>
</body>

</html>