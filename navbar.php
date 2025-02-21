<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS.css">

</head>

<body>
    <div class="navbar_background">
        <div class="body">
            <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top">
                <div class=" container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dog.php">Dogs</a>
                            </li>
                        </ul>
                    </div>
                    <?php if (!isset($_SESSION["user_id"])) { ?>
                        <a href="login_form.php" class="btn custom_btn" role="button">Login</a>
                    <?php } else { ?>
                        <a href="includes/logout.inc.php" class="btn custom_btn">Logout</a>
                    <?php } ?>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>