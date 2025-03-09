<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

</head>

<body>
    <div class="menu navbar_background" style="margin:0 0 0 0;">
        <div class="row" style="margin:0 0 0 0;">
            <div class="col-3">
                <a class="navbar-brand" href="home.php" style="margin:0 0 0 0; padding:0 0 0 0; color: white;">
                    <img src="img\logo1.png" alt="Logo" width="auto" height="90" class="d-inline-block align-text-center" style="margin-top: 10px; margin-bottom: 10px;">
                    Voříškov
                </a>
            </div>
            <div class="col-6 d-flex justify-content-center">
                <nav class="navbar navbar-expand-lg bg-body-tertiary align-items-center">
                    <div class="collapse navbar-collapse mx-auto" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link fs-2" style="margin-right: 30px; text-decoration: none;" href="home.php">Home</a>
                            <a class="nav-link fs-2" style="margin-right: 30px; text-decoration: none;" href="dog.php">Dogs</a>
                            <a class="nav-link fs-2" style="margin-right: 30px; text-decoration: none;" href="cat.php">Cats</a>
                            <a class="nav-link fs-2" style="margin-right: 30px; text-decoration: none;" href="about.php">About us</a>
                            <a class="nav-link fs-2" style="margin-right: 30px; text-decoration: none;" href="team.php">Team</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <?php if (!isset($_SESSION["user_id"])) { ?>
                    <a href="login_form.php" class="btn custom_btn" role="button" style="margin: 30px 0 30px 0; padding: 0 30px 0 30px; display: flex; justify-content: center; align-items: center; ">Login</a>
                <?php } else { ?>
                    <a href="includes/logout.inc.php" class="btn custom_btn" role="button" style="margin: 30px 0 30px 0; padding: 0 30px 0 30px; display: flex; justify-content: center; align-items: center; ">Logout</a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>