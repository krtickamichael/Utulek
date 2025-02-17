<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {

        require_once "../database_conn.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";
        require_once "config_session.inc.php";

        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($username);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "incorrect login info!";
        }
        if (!is_username_wrong($result) && is_password_wrong($pwd, $result[0]->password_user)) {
            $errors["login_incorrect"] = "incorrect login info!";
        }

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("location: ../login_form.php");
            die();
        }

        /*   $newSessionId = session_create_id();
        $session_id = $newSessionId . "_" . $result[0]->id_user;
        session_id($session_id); */

        $_SESSION["user_id"] = $result[0]->id_user;
        $_SESSION["user_username"] = htmlspecialchars($result[0]->username_user);
        $_SESSION["last_regeneration"] = time();

        header("location: ../login_form.php?login=success");

        die();
    } catch (PDOException $e) {
        die("quary failed: " . $e->getMessage());
    }
} else {
    header("location: ../login_form.php");
    die();
}
