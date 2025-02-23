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
