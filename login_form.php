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
    <div class="body">
        <div class="login_form">

            <h3>
                <?php
                output_username();
                ?>
            </h3>
            <?php
            if (!isset($_SESSION["user_id"])) { ?>

                <h3>Login</h3>
                <form action="includes/login.inc.php" method="post" class="row g-3 mt-1">
                    <div class="col-auto">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="col-auto">
                        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Login</button>
                    </div>
                </form>

            <?php } ?>



        </div>

        <div class="errors">
            <?php
            check_login_errors();
            ?>
        </div>

        <div class="signup_form">
            <h3>Signup</h3>
            <form action="includes/signup.inc.php" method="post" class="row g-3 mt-1">
                <div class="col-auto">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>
                <div class="col-auto">
                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
                </div>
                <div class="col-auto">
                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Signup</button>
                </div>
            </form>
        </div>
        <div class="errors">
            <?php
            check_signup_errors();
            ?>
        </div>

        <div class="logout_form">
            <h3>Logout</h3>
            <form action="includes/logout.inc.php" method="post" class="row g-3 mt-1">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Logout</button>
                </div>
            </form>
        </div>

    </div>

    <?php include("footer.php"); ?>
</body>

</html>