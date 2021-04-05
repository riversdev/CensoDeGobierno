<?php
session_start();

if (!isset($_SESSION['sesionActiva']) || $_SESSION['sesionActiva'] != "1" || $_SESSION['tipoUsuario'] != "admin") {
    header("Location: /CensoDeGobierno");
    exit;
} else {
    require_once 'views\templates\components\modals.php';
    echo '
        <script>
            const
                idUsuario = ' . $_SESSION['idUsuario'] . ',
                tipoUsuario = "' . $_SESSION['tipoUsuario'] . '";
        </script>
    ';
?>
    <!-- Main Admin JS -->
    <script src="views\templates\js\admin.js"></script>
    <!-- Main Admin CSS -->
    <link rel="stylesheet" href="views\templates\css\footer.css">
    <div style="min-height: 100vh;">
        <!-- Nav bar -->
        <?php require_once("views/templates/components/adminNavbar.php"); ?>

        <div class="tab-content row mx-2 my-3" id="tabNavigationContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="d-flex align-content-around flex-wrap w-100" style="min-height: 80vh;">
                    <span class="w-50 h-50 d-flex align-items-center justify-content-center px-5">
                        <button id="btnTabUsuarios" type="button" class="btn btn-outline-primary row d-flex align-items-center m-5 py-4">
                            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                                <i class="fas fa-9x fa-users-cog"></i>
                            </div>
                            <div class="col-lg-7 col-md-12 col-sm-12 col-12 text-justify">
                                <p class="text-center font-weight-bold">Usuarios</p>
                                <small>Manipula la información de los usuarios administradores</small>
                            </div>
                        </button>
                    </span>
                    <span class="w-50 h-50 d-flex align-items-center justify-content-center px-5">
                        <button id="btnTabDependencias" type="button" class="btn btn-outline-primary row d-flex align-items-center m-5 py-4">
                            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                                <i class="fas fa-9x fa-university"></i>
                            </div>
                            <div class="col-lg-7 col-md-12 col-sm-12 col-12 text-justify">
                                <p class="text-center font-weight-bold">Dependencias</p>
                                <small>Manipula la información de las dependencias y sus resultados</small>
                            </div>
                        </button>
                    </span>
                    <span class="w-50 h-50 d-flex align-items-center justify-content-center px-5">
                        <button id="btnTabReportes" type="button" class="btn btn-outline-primary row d-flex align-items-center m-5 py-4">
                            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                                <i class="fas fa-9x fa-newspaper"></i>
                            </div>
                            <div class="col-lg-7 col-md-12 col-sm-12 col-12 text-justify">
                                <p class="text-center font-weight-bold">Reportes</p>
                                <small>Genera reportes de los censos desde 2019 a la fecha</small>
                            </div>
                        </button>
                    </span>
                    <span class="w-50 h-50 d-flex align-items-center justify-content-center px-5">
                        <button id="btnTabGraficador" type="button" class="btn btn-outline-primary row d-flex align-items-center m-5 py-4">
                            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                                <i class="fas fa-9x fa-chart-bar"></i>
                            </div>
                            <div class="col-lg-7 col-md-12 col-sm-12 col-12 text-justify">
                                <p class="text-center font-weight-bold">Graficador</p>
                                <small>Vizualiza la información de los censos desde 2017 a la fecha</small>
                            </div>
                        </button>
                    </span>
                </div>
            </div>
            <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                <div class="col-12 table-responsive pt-2" id="contenedorTablaUsuarios"></div>
            </div>
            <div class="tab-pane fade" id="dependencias" role="tabpanel" aria-labelledby="dependencias-tab">Dependencias</div>
            <div class="tab-pane fade" id="reportes" role="tabpanel" aria-labelledby="reportes-tab">Reportes</div>
            <div class="tab-pane fade" id="graficador" role="tabpanel" aria-labelledby="graficador-tab">Graficador</div>
        </div>
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