<?php
function check_errors()
{
    if (isset($_SESSION["errors_dog"])) {

        echo $_SESSION["errors_dog"];

        unset($_SESSION["errors_dog"]);
    }
}
