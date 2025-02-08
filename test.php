<?php
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
        <div class="col-8">
            <?php
            $result = Db::getInstance()->setTable("user")->select(["*"], ["username_user" => $username])->results();
            var_dump($result);
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