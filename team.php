<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "includes/config_session.inc.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="content">
        <div class="container text-center" style="margin-top:100px;">
            <div class="row">
                <div class="col" style="margin-bottom: 30px; color:rgb(83, 164, 147);">
                    <h1>Náš tým</h1>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background-color: rgb(255, 243, 231); margin-right: 20px; border-radius: 15px; padding: 20px;">
                    <img src="img\Team\1.png" alt="" style="border-radius: 15px; margin-top:30px;margin-bottom:20px;">
                    <h1 style="color:rgb(249, 113, 117);font-family:Bebas Neue,sans-serif;">Petr Parožek</h1>
                    <p style="color:rgb(214, 40, 40);font-family:Bebas Neue,sans-serif; font-size: 20px;">
                        Zakladatel útulku, útulek tak jak ho dnes znáte vybudoval spolu s Anežkou z ničeho,
                        stále se stará o údržbu, opravy, inovace a další budování, ošetřovatel</p>
                </div>
                <div class="col" style="background-color: rgb(255, 243, 231); margin-left: 20px; border-radius: 15px; padding: 20px;">
                    <img src="img\Team\2.png" alt="" style="border-radius: 15px; margin-top:30px;margin-bottom:20px;">
                    <h1 style="color:rgb(249, 113, 117);font-family:Bebas Neue,sans-serif;">Anežka Jedličková</h1>
                    <p style="color:rgb(214, 40, 40);font-family:Bebas Neue,sans-serif; font-size: 20px;">
                        Zakladatelka spolku, předsedkyně spolku, ošetřovatelka, výcvik psů, odchyt zvířat,
                        péče o sociální sítě, fakturace, komunikace s veřejností, dočaskářka
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background-color: rgb(255, 243, 231); margin: 20px 200px 20px 200px; border-radius: 15px; padding: 20px;">
                    <img src="img\Team\3.png" alt="" style="border-radius: 15px; margin-top:30px;margin-bottom:20px;">
                    <h1 style="color:rgb(249, 113, 117);font-family:Bebas Neue,sans-serif;">Alena Jeřábková</h1>
                    <p style="color:rgb(214, 40, 40);font-family:Bebas Neue,sans-serif; font-size: 20px;">
                        Představujeme Alenu, která hraje klíčovou roli v našem útulku. Alena je zodpovědná za každodenní péči o zvířata, včetně jejich krmení,
                        čištění kotců a zdravotního dohledu. Díky svým zkušenostem ve výcviku psů pomáhá zvířatům připravit se na nový domov. Alena se rovněž
                        věnuje odchytu zvířat a zajišťuje jejich bezpečné umístění do útulku. Kromě toho je zodpovědná za správu našich sociálních sítí,
                        což zahrnuje sdílení příběhů našich zvířat a komunikaci s našimi podporovateli. Je také nepostradatelnou spojkou mezi útulkem a
                        veřejností, poskytuje informace a odpovídá na dotazy. S nadšením a empatií se věnuje dočasné péči o zvířata, čímž jim poskytuje
                        láskyplné prostředí před jejich adopcí.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col" style="margin-bottom: 30px; color:rgb(83, 164, 147);">
                    <h1>Dobrovolníci</h1>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background-color: rgb(255, 243, 231); margin-right: 20px; border-radius: 15px; padding: 20px;">
                    <img src="img\Team\4.png" alt="" style="border-radius: 15px; margin-top:30px;margin-bottom:20px;">
                    <h1 style="color:rgb(249, 113, 117);font-family:Bebas Neue,sans-serif;">Denisa Nováková</h1>
                    <p style="color:rgb(214, 40, 40);font-family:Bebas Neue,sans-serif; font-size: 20px;">
                        Denisa je charismatická a energická dvacet pět letá dobrovolnice, která zasvětila svůj život pomoci
                        opuštěným a týraným zvířatům v útulku. S veselým úsměvem na tváři se ráda věnuje ošetřování
                        zvířat a poskytování láskyplné péče, kterou potřebují, aby se zotavily a našly nové domovy.</p>
                </div>
                <div class="col" style="background-color: rgb(255, 243, 231); margin-left: 20px; border-radius: 15px; padding: 20px;">
                    <img src="img\Team\5.png" alt="" style="border-radius: 15px; margin-top:30px;margin-bottom:20px;">
                    <h1 style="color:rgb(249, 113, 117);font-family:Bebas Neue,sans-serif;">Tomáš Hradílek</h1>
                    <p style="color:rgb(214, 40, 40);font-family:Bebas Neue,sans-serif; font-size: 20px;">
                        Tomáš je energický třicetiletý dobrovolník, který hraje klíčovou roli v našem útulku.
                        S úsměvem na tváři a pohodlnou mikinou a džínami se věnuje ošetřování zvířat, jejich
                        výcviku a odchytu. Jeho empatický přístup a pozitivní energie mu pomáhají vytvořit
                        silné pouto se zvířaty, která se k němu láskyplně tisknou.
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>