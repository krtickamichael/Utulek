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
    <title>Dog</title>
</head>

<body>
    <?php
    include_once("navbar.php");
    ?>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="dog_content col-8">
            <?php
            require "database_conn.php";
            $result = Db::getInstance()->setTable("dog")->select(["*"])->results();

            if (!empty($result)) {
                foreach ($result as $row) {
            ?>
                    <div class="card col-3">
                        <div class="container-sm">
                            <img src="<?php echo htmlspecialchars($row->img_dog) ?>" class="img-fluid" alt="..." style="border-radius: 10px;">
                            <div class=" card-body">
                                <h3 class="card-title"><?php echo htmlspecialchars($row->name_dog) ?></h3>
                                <p class="card-text">
                                <h6><?php echo htmlspecialchars($row->breed_dog) ?></h6>
                                </p>
                                <a href="dog_details.php?id=<?php echo htmlspecialchars($row->id_dog) ?>" class="btn btn-primary">Detail</a>

                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="col-2">
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>