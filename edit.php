<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "includes/config_session.inc.php";
require_once "delete_dog.php";
require_once "includes/login_view.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="CSS.css">
    <title>Edit</title>

</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="body">
        <div class="card" name="main_edit_card">
            <div class="card-body">
                <h5 class="card-title">Dog form</h5>
                <p class="card-text">
                    <?php
                    check_dog_errors();
                    ?>
                </p>
                <div class="d-flex flex-row">
                    <div class="card" name="edit_card">
                        <div class="card-body">
                            <a class="bi bi-plus-square" style="color: green;" data-bs-toggle="modal" data-bs-target="#add_dog"></a>
                        </div>
                    </div>

                    <div class="card" name="edit_card">
                        <div class="card-body">
                            <a class="bi bi-pencil-square" style="color: blue;" data-bs-toggle="modal" data-bs-target="#exampleModal"></a>
                        </div>
                    </div>

                    <div class="card" name="edit_card">
                        <div class="card-body">
                            <a class="bi bi-x-square" style="color: red;" data-bs-toggle="modal" data-bs-target="#delete_dog"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal add -->
    <div class="modal fade" id="add_dog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Dog record entry form:</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_dog.php" method="post">
                        <div class="form-group">
                            <label for="name_dog">Dog name:</label>
                            <input type="text" class="form-control" id="name_dog" name="name_dog">
                        </div>
                        <div class="form-group">
                            <label for="sex_dog">Dog sex:</label>
                            <select class="form-control" id="sex_dog" name="sex_dog">
                                <option value="Pes">Pes</option>
                                <option value="Fena">Fena</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="age_dog">Dog age:</label>
                            <input type="number" class="form-control" id="age_dog" name="age_dog">
                        </div>
                        <div class="form-group">
                            <label for="size_dog">Dog size:</label>
                            <select class="form-control" id="size_dog" name="size_dog">
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Big">Big</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="breed_dog">Dog Breed:</label>
                            <input type="text" class="form-control" id="breed_dog" name="breed_dog">
                        </div>
                        <div class="form-group">
                            <label for="description_dog">Dog description:</label>
                            <textarea class="form-control" id="description_dog" name="description_dog"></textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal delete -->
    <div class="modal fade" id="delete_dog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Dog record deletion form:</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="delete_dog.php" method="post">
                        <select class="form-select" name="selected_option" aria-label="Default select example">
                            <option selected>Choose one of the options:</option>
                            <?php
                            dog_delete_option();
                            ?>
                        </select>

                        <br>
                        <button type="submit" class="btn btn-primary" name="btn_dog_delete">Delete</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
</body>

</html>