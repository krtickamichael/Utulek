<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("database_conn.php");

$return_url = isset($_GET['return_url']) ? $_GET['return_url'] : 'home.php';

// Získání názvu URL bez přípony ".php"
$current_table_name = str_replace('.php', '', basename($return_url));

if (isset($_GET['id'])) {
    $id_card = htmlspecialchars($_GET['id']);
    $db = Db::getInstance()->setTable($current_table_name);
    if ($db->delete($id_card)) {
        $_SESSION["errors_dog"] = "Record deleted from database";
    } else {
        $_SESSION["errors_dog"] = "Deletion error";
    }
}

header("location: " . $return_url);
die();
