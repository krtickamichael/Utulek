<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "includes/config_session.inc.php";
require_once "database_conn.php";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    try {
        $data = [
            "name_dog" => $_POST["name_dog"],
            "sex_dog" => $_POST["sex_dog"],
            "age_dog" => $_POST["age_dog"],
            "size_dog" => $_POST["size_dog"],
            "breed_dog" => $_POST["breed_dog"],
            "description_dog" => $_POST["description_dog"],
            "img_dog" => "img\FNKD.png"
        ];

        $db = Db::getInstance();
        $db->setTable("dog");

        if ($db->insert($data)) {
            $error = "Data byla úspěšně vložena.";
        } else {
            $error = 'Chyba při vkládání dat.';
        }
    } catch (Exception $e) {
        echo 'Chyba: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="body">
        <div class="container" name="edit_menu">
            <h2>Formulář pro vložení záznamu o psovi</h2>
            <form action="test.php" method="post">
                <div class="form-group">
                    <label for="name_dog">Jméno psa:</label>
                    <input type="text" class="form-control" id="name_dog" name="name_dog">
                </div>
                <div class="form-group">
                    <label for="sex_dog">Pohlaví psa:</label>
                    <select class="form-control" id="sex_dog" name="sex_dog">
                        <option value="Pes">Pes</option>
                        <option value="Fena">Fena</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="age_dog">Věk psa:</label>
                    <input type="number" class="form-control" id="age_dog" name="age_dog">
                </div>
                <div class="form-group">
                    <label for="size_dog">Velikost psa:</label>
                    <select class="form-control" id="size_dog" name="size_dog">
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Big">Big</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="breed_dog">Plemeno psa:</label>
                    <input type="text" class="form-control" id="breed_dog" name="breed_dog">
                </div>
                <div class="form-group">
                    <label for="description_dog">Popis psa:</label>
                    <textarea class="form-control" id="description_dog" name="description_dog"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Odeslat</button>
            </form>
            <?php echo $error; ?>
        </div>
    </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>