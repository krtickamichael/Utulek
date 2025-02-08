<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once "../database_conn.php";
        require_once "signup_model_inc.php";
        require_once "signup_contr.inc.php";


        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_registered($email)) {
            $errors["email_used"] = "Email already registered!";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("location: ../login_form.php");
            die();
        }

        create_user($username, $pwd, $email);
        header("location: ../login_form.php?signup=success");

        die();
    } catch (PDOException $e) {
        die("quary failed: " . $e->getMessage());
    }
} else {
    header("location: ../login_form.php");
    die();
}
