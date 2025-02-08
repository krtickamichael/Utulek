<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php include("navbar.php"); ?>
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4">

            <h3>Login</h3>

            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <button>Login</button>
            </form>

            <?php
            check_login_errors();
            ?>

            <h3>Signup</h3>

            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="text" name="email" placeholder="E-Mail">
                <button>Signup</button>
            </form>

            <?php
            check_signup_errors();
            ?>

        </div>
        <div class="col-4">
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>