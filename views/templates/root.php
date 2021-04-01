<?php
session_start();

if (!isset($_SESSION['sesionActiva']) || $_SESSION['sesionActiva'] != "1" || $_SESSION['tipoUsuario'] != "admin") {
    header("Location: /CensoDeGobierno");
    exit;
} else {
    echo '
        <script>
            const
                idUsuario = ' . $_SESSION['idUsuario'] . ',
                tipoUsuario = "' . $_SESSION['tipoUsuario'] . '";
        </script>
    ';
?>
    <!-- Main Admin JS -->
    <!-- Main Admin CSS -->
    <link rel="stylesheet" href="views\templates\css\footer.css">

    <div style="min-height: 100vh;">
        <!-- Nav bar -->
        <?php require_once("views/templates/components/adminNavbar.php"); ?>

        <div class="tab-content row mx-2 my-3"></div>
    </div>

    <footer style="border-top: 1px solid white;">
        <div class="footer_info">
            <div class="footer_width about">
                <h5 class="mision text-center text-white">MISIÓN</h5>
                <p class="description text-justify text-secondary">
                    Ser una administración democrática y eficiente de los recursos que consolide un gobierno honesto, con los principios de eficiencia, eficacia, economía, transparencia, honradez y apego al marco normativo.
                </p>
                <div class="d-flex justify-content-around">
                    <a class="btn btn-outline-light" href="https://www.facebook.com/martinianovegao/"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a class="btn btn-outline-light" href="https://twitter.com/martinianovegao"><i class="fab fa-twitter fa-lg"></i></a>
                    <a class="btn btn-outline-light" href="https://web.whatsapp.com/"><i class="fab fa-whatsapp fa-lg"></i></a>
                </div>
            </div>
            <div class="footer_width link d-flex align-content-center flex-wrap justify-content-center">
                <img src="views/static/img/Oficialiia.png" alt="logo" height="70">
                <p class="mt-3">Oficialía Mayor © 2021
                </p>
            </div>
            <div class="footer_width contact">
                <h5 class="mision text-center text-white">CONTACTO</h5>
                <div class="row">
                    <div class="col-2 mb-3 d-flex align-items-center">
                        <i class="fas fa-lg fa-map-marker-alt"></i>
                    </div>
                    <div class="col-10 mb-3 d-flex align-items-center">
                        <span class="text-secondary text-justify">Belisario Domínguez No. 111, Col. Centro, C.P. 42080, Pachuca de Soto, Hidalgo</span>
                    </div>
                    <div class="col-2 my-3 d-flex align-items-center">
                        <i class="far fa-lg fa-envelope"></i>
                    </div>
                    <div class="col-10 my-3 d-flex align-items-center">
                        <span class="text-secondary">uriel.cervantes@hidalgo.gob.mx</span>
                    </div>
                    <div class="col-2 mt-3 d-flex align-items-center">
                        <i class="fas fa-lg fa-phone-volume"></i>
                    </div>
                    <div class="col-10 mt-3 d-flex align-items-center">
                        <span class="text-secondary">(771) 716 9344</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php
}
?>