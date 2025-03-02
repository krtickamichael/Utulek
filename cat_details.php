<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("database_conn.php");
require_once "includes/config_session.inc.php";

$id_cat = isset($_GET['id']) ? (int) $_GET['id'] : header("cat.php");

$cat = Db::getInstance()->setTable("cat")->select(["*"], ["id_cat" => $id_cat])->results();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_cat = $_POST['name_cat'];
    $breed_cat = $_POST['breed_cat'];
    $sex_cat = $_POST['sex_cat'];
    $age_cat = $_POST['age_cat'];
    $size_cat = $_POST['size_cat'];
    $description_cat = $_POST['description_cat'];

    Db::getInstance()->setTable("cat")->update(
        $id_cat,
        [
            "name_cat" => $name_cat,
            "breed_cat" => $breed_cat,
            "sex_cat" => $sex_cat,
            "age_cat" => $age_cat,
            "size_cat" => $size_cat,
            "description_cat" => $description_cat
        ]
    );

    header("Location: cat.php");
    die();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Details</title>
</head>

<body>
    <?php
    require("navbar.php");
    ?>
    <div class="body">
        <?php
        if (!empty($cat)) {
            foreach ($cat as $row) {
                $row->description_cat = htmlspecialchars($row->description_cat ?? ''); ?>
                <div class="card-container">
                    <img src=" <?php echo htmlspecialchars($row->img_cat) ?>" class="card-img-top" name="card_details_img">


                    <?php if (isset($_SESSION["user_id"])) { ?>

                        <form method="POST" action="cat_details.php?id=<?php echo htmlspecialchars($row->id_cat) ?>" class="edit-form">

                            <div class="container" name="card_details_text">

                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td style="width: 70px;"> <label for="title_cat">Name:</label> </td>
                                            <td style="width: 700px;"><input class="form-control" type="text" id="name_cat" name="name_cat" value="<?php echo htmlspecialchars($row->name_cat); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="breed_cat">Breed: </label></td>
                                            <td><input class="form-control" type="text" id="breed_cat" name="breed_cat" value="<?php echo htmlspecialchars($row->breed_cat); ?>" required></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sex_cat">Sex: </label></td>
                                            <td><select class="form-control" id="sex_cat" name="sex_cat" required>
                                                    <option value="Kocour" <?php if ($row->sex_cat == 'Kocour') echo 'selected'; ?>>Kocour</option>
                                                    <option value="Kočka" <?php if ($row->sex_cat == 'Kočka') echo 'selected'; ?>>Kočka</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><label for="age_cat">Age: </label></td>
                                            <td><input class="form-control" type="number" id="age_cat" name="age_cat" value="<?php echo htmlspecialchars($row->age_cat); ?>" required></td>
                                        </tr>
                                        <tr>
                                            <td> <label for="size_cat">Size: </label></td>
                                            <td><select class="form-control" id="size_cat" name="size_cat" required>
                                                    <option value="Small" <?php if ($row->size_cat == 'Small') echo 'selected'; ?>>Small</option>
                                                    <option value="Medium" <?php if ($row->size_cat == 'Medium') echo 'selected'; ?>>Medium</option>
                                                    <option value="Big" <?php if ($row->size_cat == 'Big') echo 'selected'; ?>>Big</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><label for="Description_cat">Description: </label></td>
                                            <td><textarea class="form-control" id="description_cat" name="description_cat" rows="5"><?php echo htmlspecialchars($row->description_cat); ?></textarea></td>
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
                        <div class="container" name="card_details_text">
                            <h1>
                                <?php
                                echo htmlspecialchars($row->name_cat);
                                ?>
                                </br>
                            </h1>
                            <label>Breed:</label>
                            <?php echo htmlspecialchars($row->breed_cat); ?>
                            </br>

                            <label>Sex:</label>
                            <?php echo htmlspecialchars($row->sex_cat); ?>
                            </br>

                            <label>Age:</label>
                            <?php echo htmlspecialchars($row->age_cat); ?>
                            </br>

                            <label>Size:</label>
                            <?php echo htmlspecialchars($row->size_cat); ?>
                            </br>

                            <label>Description:</label>
                            </br>
                            <?php echo htmlspecialchars($row->description_cat); ?>
                            </br>
                        </div>
                    <?php } ?>
                </div>


    </div>
    </div>


    <div class="body">
        <div class="card_content">

        </div>
    </div>

<?php
            }
        }
        include("footer.php");
?>
</body>

</html>