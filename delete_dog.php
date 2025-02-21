<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("database_conn.php");

if (isset($_GET['id'])) {
    $id_dog = htmlspecialchars($_GET['id']);
    $db = Db::getInstance()->setTable('dog');
    if ($db->delete($id_dog)) {
        $_SESSION["errors_dog"] = "Record deleted from database";
    } else {
        $_SESSION["errors_dog"] = "Deletion error";
    }
}

header("location: ../dog.php");
die();
