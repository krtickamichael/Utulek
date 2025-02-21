<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "includes/config_session.inc.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog</title>
</head>

<body>
    <?php
    require("navbar.php");
    include("database_conn.php");
    ?>
    <div class="body">
        <div class="dog_content">
            <?php
            $result = Db::getInstance()->setTable("dog")->select(["*"])->results();
            if (!empty($result)) {
                foreach ($result as $row) {
            ?>

                    <div class="card">
                        <img src="<?php echo htmlspecialchars($row->img_dog) ?>" class="img-fluid" name="dog_img">
                        <div class=" card-body">
                            <h3 class="card-title">
                                <?php echo htmlspecialchars($row->name_dog) ?>
                            </h3>
                            <p class="card-text">
                            <h6>
                                <?php echo htmlspecialchars($row->breed_dog) ?>
                            </h6>
                            </p>
                            <a href="dog_details.php?id=<?php echo htmlspecialchars($row->id_dog) ?>" class="btn btn-primary detail_btn">Detail</a>
                        </div>
                        <div class="card_delete_btn">
                            <a href="delete_dog.php?id=<?php echo htmlspecialchars($row->id_dog) ?>" style="color: rgb(239, 214, 191);" class="bi bi-x-square" onclick="return confirm('Opravdu chcete smazat tohoto psa?');"></a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <?php if (isset($_SESSION["user_id"])) { ?>

                <div class="card" name="edit_card">
                    <div class="card-body">
                        <a class="bi bi-plus-square" style="color: rgb(83, 164, 147);" data-bs-toggle="modal" data-bs-target="#add_dog"></a>
                    </div>
                </div>

                <!-- Modal add -->
                <div class="modal fade" id="add_dog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Dog record entry form:</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="add_dog.php" method="post">
                                    <div class="form-group">
                                        <label for="name_dog">Dog name:</label>
                                        <input type="text" class="form-control" id="name_dog" name="name_dog">
                                    </div>
                                    <div class="form-group">
                                        <label for="sex_dog">Dog sex:</label>
                                        <select class="form-control" id="sex_dog" name="sex_dog">
                                            <option value="Pes">Pes</option>
                                            <option value="Fena">Fena</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="age_dog">Dog age:</label>
                                        <input type="number" class="form-control" id="age_dog" name="age_dog">
                                    </div>
                                    <div class="form-group">
                                        <label for="size_dog">Dog size:</label>
                                        <select class="form-control" id="size_dog" name="size_dog">
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Big">Big</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="breed_dog">Dog Breed:</label>
                                        <input type="text" class="form-control" id="breed_dog" name="breed_dog">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_dog">Dog description:</label>
                                        <textarea class="form-control" id="description_dog" name="description_dog"></textarea>
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal add -->

        </div>
    </div>
<?php
            }
            include("footer.php");
?>
</body>

</html>