<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "includes/config_session.inc.php";

require_once "database_conn.php";

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
            $_SESSION["errors_dog"] = "Data was successfully inserted.";
        } else {
            $_SESSION["errors_dog"] = 'Error while inserting data';
        }
    } catch (Exception $e) {
        echo 'Chyba: ' . $e->getMessage();
    }
    header("location: ../edit.php");
    die();
}
