<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "includes/config_session.inc.php";

require_once "database_conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $data = [
            "name_dog" => $_POST["name_dog"],
            "sex_dog" => $_POST["sex_dog"],
            "age_dog" => $_POST["age_dog"],
            "size_dog" => $_POST["size_dog"],
            "breed_dog" => $_POST["breed_dog"],
            "description_dog" => $_POST["description_dog"],
            "img_dog" => "img/FNKD.png"
        ];

        if (!empty($_FILES["dog_img"]["name"])) {
            // Zpracování nahrání souboru
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["dog_img"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Kontrola, zda je soubor skutečně obrázek
            $check = getimagesize($_FILES["dog_img"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $_SESSION["errors_dog"] = "Chyba v kontrole, zda je soubor skutečně obrázek";
                $uploadOk = 0;
            }

            // Kontrola, zda soubor již existuje
            if (file_exists($target_file)) {
                $data["img_dog"] = $target_file;
            } else {

                // Kontrola velikosti souboru
                if ($_FILES["dog_img"]["size"] > 5000000) {
                    $_SESSION["errors_dog"] = "Chyba v kontrole velikosti souboru";
                    $uploadOk = 0;
                }

                // Povolení určitých formátů souborů
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $_SESSION["errors_dog"] = "Chyba v kontrole povolení určitých formátů souborů";
                    $uploadOk = 0;
                }

                // Nahrání souboru
                if ($uploadOk == 0) {
                    echo $_SESSION["errors_dog"];
                } else {
                    if (move_uploaded_file($_FILES["dog_img"]["tmp_name"], $target_file)) {
                        $data["img_dog"] = $target_file;
                    } else {
                        $_SESSION["errors_dog"] = "Došlo k chybě při nahrávání souboru.";
                    }
                }
            }
        }

        $db = Db::getInstance();
        $db->setTable("dog");

        if ($db->insert($data)) {
        } else {
            $_SESSION["errors_dog"] = 'Chyba při vkládání dat';
        }
    } catch (Exception $e) {
        echo $_SESSION["errors_dog"];
    }
    header("location: ../dog.php");
    die();
}
