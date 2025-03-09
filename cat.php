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
    <title>Cat</title>
</head>

<body>
    <?php
    require("navbar.php");
    include("database_conn.php");
    ?>
    <div class="content">
        <div class="card_content">
            <?php
            $result = Db::getInstance()->setTable("cat")->select(["*"])->results();
            if (!empty($result)) {
                foreach ($result as $row) {
            ?>

                    <div class="card">
                        <img src="<?php echo htmlspecialchars($row->img_cat) ?>" class="img-fluid" name="card_img">
                        <div class=" card-body">
                            <h3 class="card-title">
                                <?php echo htmlspecialchars($row->name_cat) ?>
                            </h3>
                            <p class="card-text">
                            <h6>
                                <?php echo htmlspecialchars($row->breed_cat) ?>
                            </h6>
                            </p>
                            <a href="cat_details.php?id=<?php echo htmlspecialchars($row->id_cat) ?>" class="btn btn-primary detail_btn">Detail</a>
                        </div>
                        <?php if (isset($_SESSION["user_id"])) { ?>
                            <div class="card_delete_btn">
                                <a href="delete_card.php?id=<?php echo htmlspecialchars($row->id_cat); ?>&return_url=<?php echo urlencode('cat.php'); ?>" style="color: rgb(239, 214, 191);" class="bi bi-x-square" onclick="return confirm('Opravdu chcete smazat tuto kočku?');"></a>
                            </div>
                        <?php } ?>
                    </div>
            <?php
                }
            }
            ?>

            <?php if (isset($_SESSION["user_id"])) { ?>
                <!-- ADD CARD -->
                <div class="card" name="edit_card">
                    <div class="card-body">
                        <a class="bi bi-plus-square" style="color: rgb(83, 164, 147);" data-bs-toggle="modal" data-bs-target="#add_cat"></a>
                    </div>
                </div>
            <?php } ?>
            <!-- Modal ADD CARD -->
            <div class="modal fade" id="add_cat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cat record entry form:</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="add_cat.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cat_img">Cat picture:</label>
                                    <input type="file" class="form-control" id="cat_img_input" name="cat_img" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label for="name_dog">Cat name:</label>
                                    <input type="text" class="form-control" id="name_cat" name="name_cat" required>
                                </div>
                                <div class="form-group">
                                    <label for="sex_cat">Cat sex:</label>
                                    <select class="form-control" id="sex_cat" name="sex_cat" required>
                                        <option value="Kocour">Kocour</option>
                                        <option value="Kočka">Kočka</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="age_cat">Cat age:</label>
                                    <input type="number" class="form-control" id="age_cat" name="age_cat" required>
                                </div>
                                <div class="form-group">
                                    <label for="size_cat">Cat size:</label>
                                    <select class="form-control" id="size_cat" name="size_cat" required>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Big">Big</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="breed_cat">Cat Breed:</label>
                                    <input type="text" class="form-control" id="breed_cat" name="breed_cat" required>
                                </div>
                                <div class="form-group">
                                    <label for="description_cat">Cat description:</label>
                                    <textarea class="form-control" id="description_cat" name="description_cat"></textarea>
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
        </div>
    </div>
    <?php

    include("footer.php");
    ?>


</body>

</html>