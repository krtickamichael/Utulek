<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "includes/config_session.inc.php";
require_once "database_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn_dog_delete'])) {

        $selected_option = $_POST['selected_option'];

        if (!empty($selected_option)) {
            $db = Db::getInstance()->setTable('dog');
            if ($db->delete((int)$selected_option)) {
                $_SESSION["errors_dog"] = "Record deleted from database";
            } else {
                $_SESSION["errors_dog"] = "Deletion error";
            }
        } else {
            $_SESSION["errors_dog"] = "Select a valid option";
        }
    }
    header("location: ../edit.php");
    die();
}

function dog_delete_option()
{
    $db = Db::getInstance()->setTable('dog');
    $results = $db->select(['name_dog', 'breed_dog'])->results();

    foreach ($results as $row) {
        echo '<option>' . $row->name_dog . '</option>';
    }
}

function check_dog_errors()
{
    if (isset($_SESSION["errors_dog"])) {

        echo $_SESSION["errors_dog"];

        unset($_SESSION["errors_dog"]);
    }
}
