<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "includes/config_session.inc.php";

require_once "database_conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $data = [
            "name_cat" => $_POST["name_cat"],
            "sex_cat" => $_POST["sex_cat"],
            "age_cat" => $_POST["age_cat"],
            "size_cat" => $_POST["size_cat"],
            "breed_cat" => $_POST["breed_cat"],
            "description_cat" => $_POST["description_cat"],
            "img_cat" => "img/FNKD.png"
        ];

        if (!empty($_FILES["cat_img"]["name"])) {
            // Zpracování nahrání souboru
            $target_dir = "img/cat/";
            $target_file = $target_dir . basename($_FILES["cat_img"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Kontrola, zda je soubor skutečně obrázek
            $check = getimagesize($_FILES["cat_img"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $_SESSION["errors_dog"] = "Chyba v kontrole, zda je soubor skutečně obrázek";
                $uploadOk = 0;
            }

            // Kontrola, zda soubor již existuje
            if (file_exists($target_file)) {
                $data["img_cat"] = $target_file;
            } else {

                // Kontrola velikosti souboru
                if ($_FILES["cat_img"]["size"] > 5000000) {
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
                    if (move_uploaded_file($_FILES["cat_img"]["tmp_name"], $target_file)) {
                        $data["img_cat"] = $target_file;
                    } else {
                        $_SESSION["errors_dog"] = "Došlo k chybě při nahrávání souboru.";
                    }
                }
            }
        }

        $db = Db::getInstance();
        $db->setTable("cat");

        if ($db->insert($data)) {
        } else {
            $_SESSION["errors_dog"] = 'Chyba při vkládání dat';
        }
    } catch (Exception $e) {
        echo $_SESSION["errors_dog"];
    }
    header("location: ../cat.php");
    die();
}
