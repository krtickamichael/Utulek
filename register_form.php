<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("login.php");


$login_message = "";
if (isset($_POST['submit'])) {
    $login_message = Login::getLoginInstance()->webRegister();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <?php include("navbar.php"); ?>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="row">
                <div class="container" name="register_form">
                    <h2>Registration:</h2>
                    <table class="table table-borderless">
                        <form action="register_form.php" method="POST">
                            <tr>
                                <th>
                                    <label class="form-label">Login:</label>
                                </th>
                                <th>
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label class="form-label">Password:</label>
                                </th>
                                <th>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <th>
                                    <div class="login-message">
                                        <?php echo $login_message; ?>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>
                                    <input class="btn btn-primary mb-3" type="submit" name="submit" value="Submit">
                                </th>
                            </tr>
                        </form>
                    </table>

                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>