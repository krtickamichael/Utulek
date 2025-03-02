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
                $row->description_dog = htmlspecialchars($row->description_dog ?? ''); ?>
                <div class="dog-container">
                    <img src=" <?php echo htmlspecialchars($row->img_dog) ?>" class="card-img-top" name="dog_details_img">


                    <?php if (isset($_SESSION["user_id"])) { ?>

                        <form method="POST" action="dog_details.php?id=<?php echo htmlspecialchars($row->id_dog) ?>" class="edit-form">

                            <div class="container" name="dog_details_text">

                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td style="width: 70px;"> <label for="title_dog">Name:</label> </td>
                                            <td style="width: 700px;"><input class="form-control" type="text" id="name_dog" name="name_dog" value="<?php echo htmlspecialchars($row->name_dog); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="breed_dog">Breed: </label></td>
                                            <td><input class="form-control" type="text" id="breed_dog" name="breed_dog" value="<?php echo htmlspecialchars($row->breed_dog); ?>" required></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sex_dog">Sex: </label></td>
                                            <td><select class="form-control" id="sex_dog" name="sex_dog" required>
                                                    <option value="Pes" <?php if ($row->sex_dog == 'Pes') echo 'selected'; ?>>Pes</option>
                                                    <option value="Fena" <?php if ($row->sex_dog == 'Fena') echo 'selected'; ?>>Fena</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><label for="age_dog">Age: </label></td>
                                            <td><input class="form-control" type="number" id="age_dog" name="age_dog" value="<?php echo htmlspecialchars($row->age_dog); ?>" required></td>
                                        </tr>
                                        <tr>
                                            <td> <label for="size_dog">Size: </label></td>
                                            <td><select class="form-control" id="size_dog" name="size_dog" required>
                                                    <option value="Small" <?php if ($row->size_dog == 'Small') echo 'selected'; ?>>Small</option>
                                                    <option value="Medium" <?php if ($row->size_dog == 'Medium') echo 'selected'; ?>>Medium</option>
                                                    <option value="Big" <?php if ($row->size_dog == 'Big') echo 'selected'; ?>>Big</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><label for="Description_dog">Description: </label></td>
                                            <td><textarea class="form-control" id="description_dog" name="description_dog" rows="5"><?php echo htmlspecialchars($row->description_dog); ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><button type="submit" class="btn btn-primary">Save</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </form>
                    <?php
                    } else { ?>
                        <div class="container" name="dog_details_text">
                            <h1>
                                <?php
                                echo htmlspecialchars($row->name_dog);
                                ?>
                                </br>
                            </h1>
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
                            </br>
                            <?php echo htmlspecialchars($row->description_dog); ?>
                            </br>
                        </div>
                    <?php } ?>
                </div>


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