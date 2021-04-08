<?php
session_start();

if (!isset($_SESSION['sesionActiva']) || $_SESSION['sesionActiva'] != "1" || $_SESSION['tipoUsuario'] != "admin") {
    header("Location: /CensoDeGobierno");
    exit;
} else {
    require_once("views/templates/components/modals.php");
    echo '
        <script>
            const
                idUsuario = ' . $_SESSION['idUsuario'] . ',
                tipoUsuario = "' . $_SESSION['tipoUsuario'] . '";
        </script>
    ';
?>
    <!-- Main Admin JS -->
    <script src="views\templates\js\admin\admin.js"></script>
    <script src="views\templates\js\admin\users.js"></script>
    <script src="views\templates\js\admin\dependencies.js"></script>
    <script src="views\templates\js\admin\graphs.js"></script>
    <!-- Main Admin CSS -->
    <link rel="stylesheet" href="views\templates\css\footer.css">

    <div id="generalContainer" class="pb-1" style="min-height: 100vh;">
        <!-- Nav bar -->
        <?php require_once("views/templates/components/adminNavbar.php"); ?>

        <div class="tab-content m-4" id="tabNavigationContent">
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
            <div class="tab-pane fade p-3 shadow rounded" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                <div class="table-responsive p-1" id="contenedorTablaUsuarios"></div>
            </div>
            <div class="tab-pane fade p-3 shadow rounded" id="dependencias" role="tabpanel" aria-labelledby="dependencias-tab">
                <div class="table-responsive p-1" id="contenedorTablaDependencias"></div>
            </div>
            <div class="tab-pane fade" id="reportes" role="tabpanel" aria-labelledby="reportes-tab">Reportes</div>
            <div class="tab-pane fade p-3 shadow rounded" id="graficador" role="tabpanel" aria-labelledby="graficador-tab">
                <!-- Controles -->
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-lg-8 col-sm-7 col-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="preguntaGrafica">Pregunta</label>
                            </div>
                            <select class="custom-select" id="preguntaGrafica">
                                <option value="3" selected>
                                    3. Anote la cantidad total de personal que tenía la Administración Pública de su entidad federativa al cierre del año, especificando si se encontraba en instituciones de la Administración Central o Paraestatal.
                                </option>
                                <option value="4">
                                    4. De acuerdo con la cantidad total de personal que registró en la respuesta de la pregunta anterior, anote el personal especificando el régimen de contratación y sexo.
                                </option>
                                <option value="5">
                                    5. De acuerdo con la cantidad total de personal que registró en la respuesta de la pregunta 3, anote el personal especificando la institución de seguridad social en la que se encontraba registrado, según su sexo.
                                </option>
                                <option value="6">
                                    6. De acuerdo con la cantidad total de personal que registró en la respuesta a la pregunta 3, anote el personal especificando el rango de edad y sexo.
                                </option>
                                <option value="7">
                                    7. De acuerdo con la cantidad total de personal que registró en la respuesta de la pregunta 3, anote el personal especificando el rango de ingresos mensual y sexo.
                                </option>
                                <option value="9">
                                    9. De acuerdo con la respuesta de la pregunta 3, en la siguiente tabla anote la cantidad de personal con el que contaron cada una de las instituciones de la Administración Pública de su entidad federativa para el ejercicio de sus funciones, especificando su sexo.
                                </option>
                                <option value="15">
                                    15. Anote la cantidad total de bienes inmuebles que tenía la Administración Pública de la entidad federativa al cierre del año, especificando su tipo de posesión y si se encontraban asignados a instituciones de la Administración Central o Paraestatal.
                                </option>
                                <option value="16">
                                    16. De acuerdo con la respuesta de la pregunta 15, en la siguiente tabla anote la cantidad total de bienes inmuebles con los que contaron cada una de las instituciones de la Administración Pública de su entidad federativa para el ejercicio de sus funciones, especificando el tipo de posesión.
                                </option>
                                <option value="17">
                                    17. Anote la cantidad total de vehículos en funcionamiento, por tipo, que conformaron el parque vehicular de la Administración Pública de su entidad federativa al cierre del año, especificando si se encontraban asignados a instituciones de la Administración Central o Paraestatal.
                                </option>
                                <option value="18">
                                    18. De acuerdo con la respuesta de la pregunta anterior, en la siguiente tabla anote la cantidad total de vehículos con los que contaron cada una de las instituciones de la Administración Pública de su entidad federativa para el ejercicio de sus funciones, especificando el tipo de los mismos.
                                </option>
                                <option value="19">
                                    19. Anote la cantidad total de líneas y aparatos telefónicos en funcionamiento que tenía la Administración Pública de su entidad federativa al cierre del año 2018, especificando si se encontraban asignados a instituciones de la Administración Central o Paraestatal.
                                </option>
                                <option value="20">
                                    20. De acuerdo con la respuesta de la pregunta 19, en la siguiente tabla anote la cantidad total de líneas y aparatos telefónicos con los que contaron cada una de las instituciones de la Administración Pública de su entidad federativa para el ejercicio de sus funciones, especificando el tipo de los mismos.
                                </option>
                                <option value="21">
                                    21. Anote la cantidad total de computadoras por tipo, impresoras por tipo, multifuncionales, servidores y tabletas electrónicas en funcionamiento que tenía la Administración Pública de su entidad federativa, al cierre del año 2018, especificando si se encontraban asignadas a instituciones de la Administración Central o Paraestatal.
                                </option>
                                <option value="22">
                                    22. De acuerdo con la respuesta de la pregunta 21, en la siguiente tabla anote la cantidad total de computadoras por tipo, impresoras por tipo, multifuncionales, servidores y tabletas electrónicas con las que contaron cada una de las instituciones de la Administración Pública de su entidad federativa para el ejercicio de sus funciones.
                                </option>
                            </select>
                            <div class="input-group-prepend">
                                <button id="popoverPreguntas" tabindex="0" class="btn btn-sm btn-outline-secondary" type="button" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Pregunta 3" data-bs-content="Anote la cantidad total de personal que tenía la Administración Pública de su entidad federativa al cierre del año, especificando si se encontraba en instituciones de la Administración Central o Paraestatal.">
                                    <i class="far fa-2x fa-question-circle"></i>
                                </button>
                            </div>
                            <div class="input-group-prepend ml-2">
                                <button id="btnTabular" class="btn btn-sm btn-outline-secondary" type="button" data-toggle="tooltip" data-placement="bottom" title="Comparación anual">
                                    <i class="fas fa-2x fa-table"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto d-flex">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Año</label>
                            </div>
                            <div id="contenedorAnioGrafica">
                                <select class="custom-select" id="anioGrafica"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contenedor graficas -->
                <div class="row px-2 mt-2">
                    <div id="container" class="col-lg-6 col-md-6 col-sm-12 col-12"></div>
                    <div id="secondContainer" class="col-lg-6 col-md-6 col-sm-12 col-12 d-none" style="z-index: 0;"></div>
                </div>
                <!-- Contenedor tablas -->
                <div id="tablesContainer"></div>
            </div>
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