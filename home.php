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
    <title>Home</title>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="body_background">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img\uvod_carousel_3.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img\uvod_carousel_2.png" class="d-block w-100">
                </div>
                <div class=" carousel-item">
                    <img src="img\uvod_carousel_1.png" class="d-block w-100">
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel_layout">
            <a href="https://example.com/umistit" class="button_field" data-bs-toggle="modal" data-bs-target="#Modal2" style="margin-right: 20px;">Umístit do útulku</a>
            <a href="" class="button_field middle_button_field" data-bs-toggle="modal" data-bs-target="#exampleModal">Pospořit náš útulek</a>
            <a href=" https://example.com/dobrovolnik" class="button_field" data-bs-toggle="modal" data-bs-target="#Modal3" style="margin-left: 20px;">Stát se dobrovolníkem</a>
        </div>
    </div>

    <!-- Modal 1 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bez vaší podpory to nezvládneme!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Náš transparentní účet: <a href="https://ib.fio.cz/ib/transparent?a=2500648929">2500648929/2010</a></p>
                    <p>Načtěte QR kód pomocí bankovní aplikace pro rychlou platbu.</p>
                    <img src="img\qrkod.png">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 1 -->

    <!-- Modal 2 -->
    <div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chci umístit svého psa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Někteří si řeknou „To mně by se stát nemohlo! Vždyť pes je důležitý člen rodiny, nemohu ho jen tak odkopnout“.
                        Ovšem jak se říká, nikdy neříkej nikdy. Nemůžeme tušit v jak tíživé situaci se právě majitel nachází.</p>
                </div>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Je Váš problém jen výchovný?</h1>
                </div>
                <div class="modal-body">
                    <p>Můžeme Vám doporučit trenéra, který Vás naučí zvládat a vycvičit Vašeho psa nebo jej k nám můžete dočasně
                        ubytovat na hotel a to třeba i s výcvikem a socializací. My s pejskem budeme pracovat a vy si trochu
                        odpočinete a promyslíte, co dál.</p>
                </div>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Našel jsem psa</h1>
                </div>
                <div class="modal-body">
                    <p>1. Je pejsek označený? Podívejte se na kontakt na známce.</p>
                    <p>2. Jestliže žádný kontakt nenajdete, zavolejte městskou policii, městský úřad nebo městský útulek.</p>
                    <p> <strong>Do našeho útulku musí nalezeného psa umístit policie!</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 2 -->

    <!-- Modal 3 -->
    <div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Než najdeme domov, vyvenči nás</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Proč tedy přijít venčit?</strong></p>
                    <p>Protože je to skvělá příležitost provětrat sebe i chlupáče, který neměl v životě tolik štěstí. Krom pohybu a relaxu v přírodě se také můžete něčemu kolem psů přiučit.
                        Mimo to, pro naše svěřence je to skvělá socializace a šance zjistit, že lidé jsou i hodní a není třeba mít z nich obavy.</p>
                    <ul>
                        <li>
                            <p>Rezervace provádějte v odkazu výše, na jedno venčení jsou vyhrazeny 2 hodiny. Můžete pro pejsky přijít a vrátit jej kdykoli v daném 2 hodinovém rozmezí. Minimální doba procházky je 30 min, tak aby se pes měl šanci provětrat.</p>
                        </li>
                        <li>
                            <p>Pejsky půjčujeme po jednom, takže i přesto, že je vás více a chcete jít na procházku společně rezervujte si pouze jeden 2 hodinový úsek / 1pejska.</p>
                        </li>
                    </ul>

                    <p>Není možné si psa na venčení vybrat, bude vám přidělen podle vašich zkušeností. Můžete však svou preferenci před venčením sdělit a pokud to půjde vyjdeme vám vstříc.</p>
                    <p>Venčení je u nás možné pouze pro osoby starší 18-ti let. Děti a mládež musí být v doprovodu dospělého.
                        Chcete-li přijít s dětmi mladšími než 10 let, rezervujte si termín a napište ještě e-mail večer předem na voriskov@gmail.com.</p>
                    <p>Pokud nemůžete na rezervovaný termín dorazit, prosím zrušte svou rezervaci, nebudete tak blokovat termín ostatním zájemcům o venčení. Děkujeme.</p>
                </div>

                <a href="https://voriskov-z-s.reenio.cz/cs/terms/2025-03-11;viewMode=day" class="btn btn-primary" style="margin: 0px 70px 30px 70px;">Rezervovat</a>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 3 -->


    <div class="content">

        <h1 style="text-align: center; margin-top:80px; margin-bottom:50px; color:rgb(249, 113, 117);">Čekají na nový domov</h1>

        <div class="home_carousel">
            <?php
            require_once "card_home.php";
            ?>
        </div>

        <h1 style="text-align: center; margin-top:150px; color:rgb(249, 113, 117);">Napsali o nás</h1>

        <div class="container text-center">
            <div class="row g-2">
                <div class="col-6">
                    <div class="p-3 d-flex flex-column align-items-center justify-content-center" style="height: 300px;">
                        <div class="p-3 d-flex flex-column align-items-center justify-content-center" style="height: 200px;">
                            <img src="img\Sponsors\cnn.png" alt="">
                        </div>
                        <div class="p-3 d-flex flex-column align-items-center justify-content-center">
                            <a href="https://cnn.iprima.cz/co-majitele-psu-pokazili-napravuji-utulky-jak-se-pracuje-s-agresivni-smeckou-21514" class="btn" style="background-color:rgb(249, 113, 117);color:white;border-radius:40px; font-size:20px;height:50px; width:170px;"><strong>Přečíst článek</strong></a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 d-flex flex-column align-items-center justify-content-center" style="height: 300px;">
                        <div class="p-3 d-flex flex-column align-items-center justify-content-center" style="height: 200px;">
                            <img src="img\Sponsors\stream.png" alt="">
                        </div>
                        <div class="p-3 d-flex flex-column align-items-center justify-content-center">
                            <a href="https://www.stream.cz/packa-pro-utulkace/miniazyl-voriskov-neni-jen-pro-vorisky-domov-tu-hleda-brit-i-snoopy-64144977" class="btn" style="background-color:rgb(249, 113, 117);color:white;border-radius:40px; font-size:20px;height:50px; width:210px;"><strong>Zhlédnout video</strong></a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 d-flex flex-column align-items-center justify-content-center" style="height: 300px;">
                        <div class="p-3 d-flex flex-column align-items-center justify-content-center" style="height: 200px;">
                            <img src="img\Sponsors\ivysilani.png" alt="">
                        </div>
                        <div class="p-3 d-flex flex-column align-items-center justify-content-center">
                            <a href="https://www.ceskatelevize.cz/porady/1148499747-sama-doma/216562220600016/" class="btn" style="background-color:rgb(249, 113, 117);color:white;border-radius:40px; font-size:20px;height:50px; width:210px;"><strong>Zhlédnout záznam</strong></a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 d-flex flex-column align-items-center justify-content-center" style="height: 300px;">
                        <div class="p-3 d-flex flex-column align-items-center justify-content-center" style="height: 200px;">
                            <img src="img\Sponsors\laskavec.png" alt="">
                        </div>
                        <div class="p-3 d-flex flex-column align-items-center justify-content-center">
                            <a href="https://www.facebook.com/nadacekj/videos/477797732423631/" class="btn" style="background-color:rgb(249, 113, 117);color:white;border-radius:40px; font-size:20px;height:50px; width:230px;"><strong>Zhlédnout nominaci</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <h1 style="text-align: center; margin-top:150px; margin-bottom:50px; color:rgb(249, 113, 117);">Jsme vděční našim partnerům</h1>

        <table class="table table-borderless">
            <div class="logo-container">
                <a href="https://www.pesweb.cz/"><img src="img\Sponsors\1.png" alt="Logo sponzora 1"></a>
                <a href="https://www.behproutulky.cz/"><img src="img\Sponsors\2.png" alt="Logo sponzora 2" style="height:120px;"></a>
                <a href="https://www.juko-krmiva.cz/cz/"><img src="img\Sponsors\3.png" alt="Logo sponzora 3"></a>
                <a href="https://www.pucalka.cz/krmiva/"><img src="img\Sponsors\4.jpg" alt="Logo sponzora 4"></a>
                <a href="https://www.krmiva-pucalka.cz/vyrobce/marp-variety"><img src="img\Sponsors\5.png" alt="Logo sponzora 5" style="height:235px;"></a>
                <a href="https://radio-relax.cz/"><img src="img\Sponsors\6.png" alt="Logo sponzora 6"></a>
                <a href="https://www.kudyznudy.cz/?utm_source=kzn&utm_medium=partneri_kzn&utm_campaign=banner"><img src="img\Sponsors\7.jpg" alt="Logo sponzora 7"></a>
                <a href="https://www.emanek.cz/"><img src="img\Sponsors\8.png" alt="Logo sponzora 8" style="height:235px;"></a>
                <a href="https://www.posledniveta.cz/"><img src="img\Sponsors\9.png" alt="Logo sponzora 9" style="height:235px;"></a>
                <a href="https://najdimazlicka.cz/"><img src="img\Sponsors\10.svg" alt="Logo sponzora 10"></a>
                <a href="https://www.ketris.cz/"><img src="img\Sponsors\11.jpg" alt="Logo sponzora 11"></a>
                <a href="https://www.mavio.cz/"><img src="img\Sponsors\12.png" alt="Logo sponzora 12"></a>
            </div>
        </table>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>