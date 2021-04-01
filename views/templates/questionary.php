<?php
session_start();

if (!isset($_SESSION['sesionActiva']) || $_SESSION['sesionActiva'] != "1" || $_SESSION['tipoUsuario'] != "dependencia") {
    header("Location: /CensoDeGobierno");
    exit;
} else {
    echo '
        <script>
            const
                idInstitucion = ' . $_SESSION['idDependencia'] . ',
                nombreInstitucion = "' . $_SESSION['nombreDependencia'] . '",
                clasificacionInstitucion = "' . $_SESSION['clasificacionDependencia'] . '",
                anioInstitucion = "' . $_SESSION['anioDependencia'] . '";
        </script>
    ';
?>
    <!-- Main Questionary JS -->
    <script src="views\templates\js\questionary.js"></script>
    <!-- Main Questionary CSS -->
    <link rel="stylesheet" href="views\templates\css\questionary.css">
    <link rel="stylesheet" href="views\templates\css\footer.css">

    <div id="loaderContainer" class="d-flex justify-content-center align-items-center">
        <div id="loader" class="d-flex justify-content-center align-items-center">
            <i class="fas fa-2x fa-spin fa-spinner text-dark"></i>
        </div>
    </div>

    <div id="sidebar" class="bg-dark active">
        <a id="tituloNavbar" class="navbar-brand p-4 w-100 text-right d-flex justify-content-around align-items-center text-white" href="#">
            <img class="mt-1" src="views/static/img/h.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            <small id="textoOM">OFICIALÍA MAYOR</small>
        </a>

        <div class="accordion" id="accordionSideBar">
            <div id="contenedorItemsSeccionI" class="accordion-item">
                <h2 class="accordion-header" id="headingSeccionI">
                    <button id="btnCollapseSeccionI" class="accordion-button btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeccionI" aria-expanded="true" aria-controls="collapseSeccionI">
                        <span class="text-white h6 mb-0 expandList">SECCIÓN I</span>
                        <span class="text-white reduceList h6 mb-0 d-none">I</span>
                    </button>
                </h2>
                <div id="collapseSeccionI" class="accordion-collapse collapse show" aria-labelledby="headingSeccionI" data-bs-parent="#accordionSideBar">
                    <div class="accordion-body p-0">
                        <div class="list-group" id="questionList" role="tablist">
                            <a id="itemPregunta1s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 bg-transparent itemList active border-top-0" data-bs-toggle="list" href="#pregunta1s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 1</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 1</span>
                            </a>
                            <a id="itemPregunta2s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta2s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 2</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 2</span>
                            </a>
                            <a id="itemPregunta3s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta3s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 3</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 3</span>
                            </a>
                            <a id="itemPregunta4s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta4s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 4</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 4</span>
                            </a>
                            <a id="itemPregunta5s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta5s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 5</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 5</span>
                            </a>
                            <a id="itemPregunta6s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta6s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 6</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 6</span>
                            </a>
                            <a id="itemPregunta7s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta7s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 7</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 7</span>
                            </a>
                            <a id="itemPregunta8s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta8s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 8</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 8</span>
                            </a>
                            <a id="itemPregunta9s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta9s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 9</small>
                                <span class="badge bg-secondary  rounded-pill reduceList d-none">I, 9</span>
                            </a>
                            <a id="itemPregunta10s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta10s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 10</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 10</span>
                            </a>
                            <a id="itemPregunta11s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta11s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 11</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 11</span>
                            </a>
                            <a id="itemPregunta12s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta12s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 12</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 12</span>
                            </a>
                            <a id="itemPregunta13s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta13s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 13</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 13</span>
                            </a>
                            <a id="itemPregunta14s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta14s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 14</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 14</span>
                            </a>
                            <a id="itemPregunta15s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta15s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 15</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 15</span>
                            </a>
                            <a id="itemPregunta16s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta16s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 16</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 16</span>
                            </a>
                            <a id="itemPregunta17s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta17s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 17</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 17</span>
                            </a>
                            <a id="itemPregunta18s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta18s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 18</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 18</span>
                            </a>
                            <a id="itemPregunta19s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta19s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 19</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 19</span>
                            </a>
                            <a id="itemPregunta24s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta24s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 24</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 24</span>
                            </a>
                            <a id="itemPregunta25s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta25s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 25</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 25</span>
                            </a>
                            <a id="itemPregunta26s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta26s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 26</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 26</span>
                            </a>
                            <a id="itemPregunta27s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta27s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 27</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 27</span>
                            </a>
                            <a id="itemPregunta28s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta28s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 28</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 28</span>
                            </a>
                            <a id="itemPregunta29s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta29s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 29</small>
                                <span class="badge bg-secondary  rounded-pill reduceList d-none">I, 29</span>
                            </a>
                            <a id="itemPregunta30s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta30s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 30</small>
                                <span class="badge bg-secondary  rounded-pill reduceList d-none">I, 30</span>
                            </a>
                            <a id="itemPregunta31s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta31s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 31</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 31</span>
                            </a>
                            <a id="itemPregunta32s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta32s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 32</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 32</span>
                            </a>
                            <a id="itemPregunta33s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta33s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 33</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 33</span>
                            </a>
                            <a id="itemPregunta34s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta34s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 34</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 34</span>
                            </a>
                            <a id="itemPregunta35s1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta35s1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Pregunta 35</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, 35</span>
                            </a>
                            <a id="itemComplementoS1" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#complementoS1" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 1, Complemento</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">I, +</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="contenedorItemsSeccionXII" class="accordion-item">
                <h2 class="accordion-header" id="headingSeccionXII">
                    <button id="btnCollapseSeccionXII" class="accordion-button btn-sm collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeccionXII" aria-expanded="false" aria-controls="collapseSeccionXII">
                        <span class="text-dark h6 mb-0 expandList">SECCIÓN XII</span>
                        <span class="text-dark reduceList h6 mb-0 d-none">XII</span>
                    </button>
                </h2>
                <div id="collapseSeccionXII" class="accordion-collapse collapse" aria-labelledby="headingSeccionXII" data-bs-parent="#accordionSideBar">
                    <div class="accordion-body p-0">
                        <div class="list-group" id="questionList" role="tablist">
                            <a id="itemPregunta1s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList border-top-0" data-bs-toggle="list" href="#pregunta1s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 1</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 1</span>
                            </a>
                            <a id="itemPregunta2s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta2s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 2</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 2</span>
                            </a>
                            <a id="itemPregunta3s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta3s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 3</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 3</span>
                            </a>
                            <a id="itemPregunta4s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta4s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 4</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 4</span>
                            </a>
                            <a id="itemPregunta5s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta5s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 5</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 5</span>
                            </a>
                            <a id="itemPregunta6s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta6s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 6</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 6</span>
                            </a>
                            <a id="itemPregunta7s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta7s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 7</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 7</span>
                            </a>
                            <a id="itemPregunta8s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta8s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 8</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 8</span>
                            </a>
                            <a id="itemPregunta9s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta9s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 9</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 9</span>
                            </a>
                            <a id="itemPregunta10s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta10s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 10</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 10</span>
                            </a>
                            <a id="itemPregunta11s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta11s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 11</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 11</span>
                            </a>
                            <a id="itemPregunta12s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta12s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 12</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 12</span>
                            </a>
                            <a id="itemPregunta13s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta13s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 13</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 13</span>
                            </a>
                            <a id="itemPregunta14s12" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList" data-bs-toggle="list" href="#pregunta14s12" role="tab">
                                <small class="badge bg-secondary rounded-pill text-dark expandList">Sección 12, Pregunta 14</small>
                                <span class="badge bg-secondary rounded-pill reduceList d-none">XII, 14</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button id="btnCollapseFinCuestionario" class="accordion-button btn-sm collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFinCuestionario" aria-expanded="false" aria-controls="collapseFinCuestionario">
                        <span class="text-dark h6 mb-0 expandList">Fin del cuestionario</span>
                        <span class="text-dark reduceList h6 mb-0 d-none">FIN</span>
                    </button>
                </h2>
                <div id="collapseFinCuestionario" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionSideBar">
                    <div class="accordion-body p-0">
                        <div class="list-group" id="questionList" role="tablist">
                            <a id="itemFinCuestionario" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center py-2 px-2 bg-transparent itemList border-top-0" data-bs-toggle="list" href="#finCuestionario" role="tab">
                                <small class="badge bg-primary text-white rounded-pill expandList">Fin del cuestionario</small>
                                <span class="badge bg-primary text-white rounded-pill reduceList d-none">FIN</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="min-height: 100vh;">
        <!-- Nav bar -->
        <?php require_once("views/templates/components/questionaryNavbar.php"); ?>

        <div id="generalContainer">
            <div class="tab-content row mx-2 my-3" style="min-height: 90vh;">
                <div class="tab-pane fade show active" id="pregunta1s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.1 Estructura organizacional</h5>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">1.- </span>
                                Anote el nombre de cada una de las instituciones que conformaban la estructura orgánica de la Administración Pública de su entidad federativa al cierre del año 2020. Por cada una de estas, señale su clasificación administrativa, el tipo de institución del que se trate, la función principal ejercida y, de ser el caso, la o las funciones secundarias desarrolladas; utilizando para tal efecto el catálogo que se presenta en la barra de navegación superior. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP1S1" role="button" aria-expanded="false" aria-controls="collapseP1S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP1S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> Debe comenzar registrando aquellas instituciones correspondientes a la Administración Pública Estatal Centralizada, y posteriormente registrar las relacionadas con la Administración Pública Estatal Paraestatal.<br>
                                    <i class="fas fa-caret-right"></i> Para cada institución, en caso de que seleccione el código "1" en la columna "Clasificación administrativa", en la columna "Tipo de institución" únicamente puede seleccionar los códigos "1", "2", "3", "4" o "5", según corresponda.<br>
                                    <i class="fas fa-caret-right"></i> Para cada institución, en caso de que seleccione el código "2" en la columna "Clasificación administrativa", en la columna "Tipo de institución" únicamente puede seleccionar los códigos "6", "7", "8" o "9", según corresponda.<br>
                                    <i class="fas fa-caret-right"></i> En caso de que determinada institución haya desarrollado dos o más funciones establecidas en el catálogo, debe registrar la clave de la función que se considere más importante en la columna "Principal", y el resto en las columnas correspondientes a "Secundaria(s)", iniciando de izquierda a derecha.<br>
                                    <i class="fas fa-caret-right"></i> En caso de que en alguna columna del apartado "Función ejercida" señale el código 29, debe anotar el nombre de dicha(s) función(es) en el recuadro destinado para tal efecto que se encuentra al final de la tabla de respuesta.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta1" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="2">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" rowspan="2">Clasificación administrativa</td>
                                                <td class="text-center font-weight-bold" rowspan="2">Tipo de institución</td>
                                                <td class="text-center font-weight-bold" colspan="6">Función ejercida</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center">Principal</td>
                                                <td class="text-center font-weight-bold" colspan="5">Secundaria(s)</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucion" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtClasificacion" type="text" class="form-control" required readonly>
                                                </td>
                                                <td>
                                                    <select id="tipoInstitucion" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="funcionPrincipal" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Agricultura y desarrollo rural</option>
                                                        <option value="2">2.- Arte, cultura y otras manifestaciones sociales</option>
                                                        <option value="3">3.- Asuntos financieros y hacendarios</option>
                                                        <option value="4">4.- Asuntos indígenas</option>
                                                        <option value="5">5.- Asuntos jurídicos</option>
                                                        <option value="6">6.- Ciencia, tecnología e innovación</option>
                                                        <option value="7">7.- Combustibles y energía</option>
                                                        <option value="8">8.- Comunicaciones y transportes</option>
                                                        <option value="9">9.- Cultura física y/o deporte</option>
                                                        <option value="10">10.- Desarrollo agrario, territorial, urbano y vivienda</option>
                                                        <option value="11">11.- Desarrollo social</option>
                                                        <option value="12">12.- Despacho del ejecutivo</option>
                                                        <option value="13">13.- Economía</option>
                                                        <option value="14">14.- Educación</option>
                                                        <option value="15">15.- Función pública</option>
                                                        <option value="16">16.- Gobierno y política interior</option>
                                                        <option value="17">17.- Igualdad de género y/o derechos de las mujeres</option>
                                                        <option value="18">18.- Justicia</option>
                                                        <option value="19">19.- Medio ambiente y ecología</option>
                                                        <option value="20">20.- Protección civil</option>
                                                        <option value="21">21.- Protección y seguridad social</option>
                                                        <option value="22">22.- Reinserción social</option>
                                                        <option value="23">23.- Salud</option>
                                                        <option value="24">24.- Seguridad pública o seguridad ciudadana</option>
                                                        <option value="25">25.- Servicios públicos</option>
                                                        <option value="26">26.- Servicios registrales, administrativos y patrimoniales</option>
                                                        <option value="27">27.- Trabajo</option>
                                                        <option value="28">28.- Turismo</option>
                                                        <option value="29">29.- Otra función (especifique)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="funcionSecundariaUno" class="custom-select" required>
                                                        <option value="NO APLICA" selected>NO APLICA</option>
                                                        <option value="1">1.- Agricultura y desarrollo rural</option>
                                                        <option value="2">2.- Arte, cultura y otras manifestaciones sociales</option>
                                                        <option value="3">3.- Asuntos financieros y hacendarios</option>
                                                        <option value="4">4.- Asuntos indígenas</option>
                                                        <option value="5">5.- Asuntos jurídicos</option>
                                                        <option value="6">6.- Ciencia, tecnología e innovación</option>
                                                        <option value="7">7.- Combustibles y energía</option>
                                                        <option value="8">8.- Comunicaciones y transportes</option>
                                                        <option value="9">9.- Cultura física y/o deporte</option>
                                                        <option value="10">10.- Desarrollo agrario, territorial, urbano y vivienda</option>
                                                        <option value="11">11.- Desarrollo social</option>
                                                        <option value="12">12.- Despacho del ejecutivo</option>
                                                        <option value="13">13.- Economía</option>
                                                        <option value="14">14.- Educación</option>
                                                        <option value="15">15.- Función pública</option>
                                                        <option value="16">16.- Gobierno y política interior</option>
                                                        <option value="17">17.- Igualdad de género y/o derechos de las mujeres</option>
                                                        <option value="18">18.- Justicia</option>
                                                        <option value="19">19.- Medio ambiente y ecología</option>
                                                        <option value="20">20.- Protección civil</option>
                                                        <option value="21">21.- Protección y seguridad social</option>
                                                        <option value="22">22.- Reinserción social</option>
                                                        <option value="23">23.- Salud</option>
                                                        <option value="24">24.- Seguridad pública o seguridad ciudadana</option>
                                                        <option value="25">25.- Servicios públicos</option>
                                                        <option value="26">26.- Servicios registrales, administrativos y patrimoniales</option>
                                                        <option value="27">27.- Trabajo</option>
                                                        <option value="28">28.- Turismo</option>
                                                        <option value="29">29.- Otra función (especifique)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="funcionSecundariaDos" class="custom-select" required>
                                                        <option value="NO APLICA" selected>NO APLICA</option>
                                                        <option value="1">1.- Agricultura y desarrollo rural</option>
                                                        <option value="2">2.- Arte, cultura y otras manifestaciones sociales</option>
                                                        <option value="3">3.- Asuntos financieros y hacendarios</option>
                                                        <option value="4">4.- Asuntos indígenas</option>
                                                        <option value="5">5.- Asuntos jurídicos</option>
                                                        <option value="6">6.- Ciencia, tecnología e innovación</option>
                                                        <option value="7">7.- Combustibles y energía</option>
                                                        <option value="8">8.- Comunicaciones y transportes</option>
                                                        <option value="9">9.- Cultura física y/o deporte</option>
                                                        <option value="10">10.- Desarrollo agrario, territorial, urbano y vivienda</option>
                                                        <option value="11">11.- Desarrollo social</option>
                                                        <option value="12">12.- Despacho del ejecutivo</option>
                                                        <option value="13">13.- Economía</option>
                                                        <option value="14">14.- Educación</option>
                                                        <option value="15">15.- Función pública</option>
                                                        <option value="16">16.- Gobierno y política interior</option>
                                                        <option value="17">17.- Igualdad de género y/o derechos de las mujeres</option>
                                                        <option value="18">18.- Justicia</option>
                                                        <option value="19">19.- Medio ambiente y ecología</option>
                                                        <option value="20">20.- Protección civil</option>
                                                        <option value="21">21.- Protección y seguridad social</option>
                                                        <option value="22">22.- Reinserción social</option>
                                                        <option value="23">23.- Salud</option>
                                                        <option value="24">24.- Seguridad pública o seguridad ciudadana</option>
                                                        <option value="25">25.- Servicios públicos</option>
                                                        <option value="26">26.- Servicios registrales, administrativos y patrimoniales</option>
                                                        <option value="27">27.- Trabajo</option>
                                                        <option value="28">28.- Turismo</option>
                                                        <option value="29">29.- Otra función (especifique)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="funcionSecundariaTres" class="custom-select" required>
                                                        <option value="NO APLICA" selected>NO APLICA</option>
                                                        <option value="1">1.- Agricultura y desarrollo rural</option>
                                                        <option value="2">2.- Arte, cultura y otras manifestaciones sociales</option>
                                                        <option value="3">3.- Asuntos financieros y hacendarios</option>
                                                        <option value="4">4.- Asuntos indígenas</option>
                                                        <option value="5">5.- Asuntos jurídicos</option>
                                                        <option value="6">6.- Ciencia, tecnología e innovación</option>
                                                        <option value="7">7.- Combustibles y energía</option>
                                                        <option value="8">8.- Comunicaciones y transportes</option>
                                                        <option value="9">9.- Cultura física y/o deporte</option>
                                                        <option value="10">10.- Desarrollo agrario, territorial, urbano y vivienda</option>
                                                        <option value="11">11.- Desarrollo social</option>
                                                        <option value="12">12.- Despacho del ejecutivo</option>
                                                        <option value="13">13.- Economía</option>
                                                        <option value="14">14.- Educación</option>
                                                        <option value="15">15.- Función pública</option>
                                                        <option value="16">16.- Gobierno y política interior</option>
                                                        <option value="17">17.- Igualdad de género y/o derechos de las mujeres</option>
                                                        <option value="18">18.- Justicia</option>
                                                        <option value="19">19.- Medio ambiente y ecología</option>
                                                        <option value="20">20.- Protección civil</option>
                                                        <option value="21">21.- Protección y seguridad social</option>
                                                        <option value="22">22.- Reinserción social</option>
                                                        <option value="23">23.- Salud</option>
                                                        <option value="24">24.- Seguridad pública o seguridad ciudadana</option>
                                                        <option value="25">25.- Servicios públicos</option>
                                                        <option value="26">26.- Servicios registrales, administrativos y patrimoniales</option>
                                                        <option value="27">27.- Trabajo</option>
                                                        <option value="28">28.- Turismo</option>
                                                        <option value="29">29.- Otra función (especifique)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="funcionSecundariaCuatro" class="custom-select" required>
                                                        <option value="NO APLICA" selected>NO APLICA</option>
                                                        <option value="1">1.- Agricultura y desarrollo rural</option>
                                                        <option value="2">2.- Arte, cultura y otras manifestaciones sociales</option>
                                                        <option value="3">3.- Asuntos financieros y hacendarios</option>
                                                        <option value="4">4.- Asuntos indígenas</option>
                                                        <option value="5">5.- Asuntos jurídicos</option>
                                                        <option value="6">6.- Ciencia, tecnología e innovación</option>
                                                        <option value="7">7.- Combustibles y energía</option>
                                                        <option value="8">8.- Comunicaciones y transportes</option>
                                                        <option value="9">9.- Cultura física y/o deporte</option>
                                                        <option value="10">10.- Desarrollo agrario, territorial, urbano y vivienda</option>
                                                        <option value="11">11.- Desarrollo social</option>
                                                        <option value="12">12.- Despacho del ejecutivo</option>
                                                        <option value="13">13.- Economía</option>
                                                        <option value="14">14.- Educación</option>
                                                        <option value="15">15.- Función pública</option>
                                                        <option value="16">16.- Gobierno y política interior</option>
                                                        <option value="17">17.- Igualdad de género y/o derechos de las mujeres</option>
                                                        <option value="18">18.- Justicia</option>
                                                        <option value="19">19.- Medio ambiente y ecología</option>
                                                        <option value="20">20.- Protección civil</option>
                                                        <option value="21">21.- Protección y seguridad social</option>
                                                        <option value="22">22.- Reinserción social</option>
                                                        <option value="23">23.- Salud</option>
                                                        <option value="24">24.- Seguridad pública o seguridad ciudadana</option>
                                                        <option value="25">25.- Servicios públicos</option>
                                                        <option value="26">26.- Servicios registrales, administrativos y patrimoniales</option>
                                                        <option value="27">27.- Trabajo</option>
                                                        <option value="28">28.- Turismo</option>
                                                        <option value="29">29.- Otra función (especifique)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="funcionSecundariaCinco" class="custom-select" required>
                                                        <option value="NO APLICA" selected>NO APLICA</option>
                                                        <option value="1">1.- Agricultura y desarrollo rural</option>
                                                        <option value="2">2.- Arte, cultura y otras manifestaciones sociales</option>
                                                        <option value="3">3.- Asuntos financieros y hacendarios</option>
                                                        <option value="4">4.- Asuntos indígenas</option>
                                                        <option value="5">5.- Asuntos jurídicos</option>
                                                        <option value="6">6.- Ciencia, tecnología e innovación</option>
                                                        <option value="7">7.- Combustibles y energía</option>
                                                        <option value="8">8.- Comunicaciones y transportes</option>
                                                        <option value="9">9.- Cultura física y/o deporte</option>
                                                        <option value="10">10.- Desarrollo agrario, territorial, urbano y vivienda</option>
                                                        <option value="11">11.- Desarrollo social</option>
                                                        <option value="12">12.- Despacho del ejecutivo</option>
                                                        <option value="13">13.- Economía</option>
                                                        <option value="14">14.- Educación</option>
                                                        <option value="15">15.- Función pública</option>
                                                        <option value="16">16.- Gobierno y política interior</option>
                                                        <option value="17">17.- Igualdad de género y/o derechos de las mujeres</option>
                                                        <option value="18">18.- Justicia</option>
                                                        <option value="19">19.- Medio ambiente y ecología</option>
                                                        <option value="20">20.- Protección civil</option>
                                                        <option value="21">21.- Protección y seguridad social</option>
                                                        <option value="22">22.- Reinserción social</option>
                                                        <option value="23">23.- Salud</option>
                                                        <option value="24">24.- Seguridad pública o seguridad ciudadana</option>
                                                        <option value="25">25.- Servicios públicos</option>
                                                        <option value="26">26.- Servicios registrales, administrativos y patrimoniales</option>
                                                        <option value="27">27.- Trabajo</option>
                                                        <option value="28">28.- Turismo</option>
                                                        <option value="29">29.- Otra función (especifique)</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr id="contenedorFuncionesEspecificas" class="d-none">
                                                <td colspan="10">
                                                    <div class="form-row d-none" id="contenedorFuncPriEspecifica">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifica la función principal</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="funcPriEspecifica">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorPrimFuncSecundaria">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifica la primer función secundaria</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="secUnoEspecifica">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorSegFuncSecundaria">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifica la segunda función secundaria</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="secDosEspecifica">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorTerFuncSecundaria">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifica la tercera función secundaria</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="secTresEspecifica">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorCuarFuncSecundaria">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifica la cuarta función secundaria</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="secCuatroEspecifica">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorQuinFuncSecundaria">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifica la quinta función secundaria</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="secCincoEspecifica">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneral"></textarea>
                                                        <label for="txtComentarioGeneral">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 1</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta2s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.1 Estructura organizacional</h5>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">2.- </span>
                                Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, si al cierre del año 2020 contaba con alguna unidad de género y/o enlace de género. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP2S1" role="button" aria-expanded="false" aria-controls="collapseP2S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP2S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta2" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold w-50">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold">¿Cuenta con alguna unidad de género y/o enlace de género?</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP2" type="text" class="form-control" required readonly>
                                                </td>
                                                <td>
                                                    <select id="unidadGeneroP2" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP2"></textarea>
                                                        <label for="txtComentarioGeneralP2">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 2</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta3s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.1 Perfil de los titulares de las instituciones</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">3.- </span>
                                Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, los datos de su titular al cierre del año 2020, utilizando para tal efecto los catálogos que se presentan en la parte inferior de la siguiente tabla. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP3S1" role="button" aria-expanded="false" aria-controls="collapseP3S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP3S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.<br>
                                    <i class="fas fa-caret-right"></i> Los datos del numeral "0" deben corresponder a los del gobernador(a) o jefe(a) de gobierno de la entidad federativa.<br>
                                    <i class="fas fa-caret-right"></i> En caso de que al cierre del año 2020 no se hubiera realizado el nombramiento de determinado titular, o se encontrara vacante, debe anotar el código "8" en la celda correspondiente a "Sexo"; con lo cual se bloqueará automáticamente el resto de la fila.<br>
                                    <i class="fas fa-caret-right"></i> Para el caso de la edad, debe considerar los años cumplidos al 31 de diciembre de 2020.<br>
                                    <i class="fas fa-caret-right"></i> Para el caso de los ingresos brutos mensuales, únicamente debe considerar aquellos percibidos por el desempeño de sus funciones como titular de determinada institución. Estos ingresos deben anotarse en pesos mexicanos (no debe agregar la frase “miles o millones de pesos”) y solo deben desagregar dos decimales.<br>
                                    <i class="fas fa-caret-right"></i> Para el caso del último grado de estudios, seleccione en la primera columna el último nivel de escolaridad cursado de acuerdo con las opciones del catálogo. En la columna "Estatus" debe indicar la opción que corresponda de acuerdo con el tipo de conclusión de dicho nivel al 31 de diciembre de 2020.<br>
                                    <i class="fas fa-caret-right"></i> Para el caso del último grado de estudios, en caso de que registre el código "1" en la columna "Nivel de escolaridad", debe anotar el código "8" en la columna "Estatus".<br>
                                    <i class="fas fa-caret-right"></i> Para el caso del último grado de estudios, en caso de que registre el código "2", "3" o "4" en la columna "Nivel de escolaridad", no puede hacer uso del código "4" en la columna "Estatus".<br>
                                    <i class="fas fa-caret-right"></i> Para el caso de la antigüedad en el servicio público, debe considerar los años en el mismo al 31 de diciembre de 2020, aunque estos no hayan sido continuos y/o en la misma plaza. En caso de que determinado titular nunca haya trabajado en el servicio público, debe anotar "NA" (No aplica) en la columna "Antigüedad en el servicio público".<br>
                                    <i class="fas fa-caret-right"></i> Para el caso de la antigüedad en el cargo, debe considerar los años continuos en el mismo al 31 de diciembre de 2020.<br>
                                    <i class="fas fa-caret-right"></i> Para el numeral 0, seleccione el código "1" en la columna "Forma de designación".<br>
                                    <i class="fas fa-caret-right"></i> La columna "Afiliación partidista" únicamente se encuentra habilitada para el numeral "0". En esta se debe seleccionar el código del partido político al cual se encuentra afiliado el gobernador(a) o jefe(a) de gobierno de la entidad federativa.<br>
                                    <i class="fas fa-caret-right"></i> En caso de que seleccione el código "11" en la columna "Afiliación partidista", anote el nombre de dicho partido político en el recuadro destinado para tal efecto que se encuentra al final de la tabla de respuesta.<br>
                                    <i class="fas fa-caret-right"></i> Para el numeral 0, deje en blanco la columna "Institución con el mismo titular".<br>
                                    <i class="fas fa-caret-right"></i> Para cada institución, en caso de que su titular no sea el mismo que el de otra institución, deje en blanco la columna "Institución con el mismo titular"<br>
                                    <i class="fas fa-caret-right"></i> En caso de que por disposición normativa dos o más instituciones tengan el mismo titular, únicamente debe registrar la información del perfil de la persona titular en una de ellas. En el resto de instituciones relacionadas, en la columna "Institución con el mismo titular" anote el ID de la institución en la que reportó los datos del perfil de la persona titular y deje el resto de la fila en blanco.<br>
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta3" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="3">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="12">Perfil de los titulares de las instituciones de la Administración Pública de la entidad federativa</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="3">Institución con el mismo titular</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Sexo</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Edad</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Ingresos brutos mensuales</td>
                                                <td class="text-center font-weight-bold" colspan="2">Último grado de estudios</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Empleo anterior</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Antiguedad en el servicio público</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Antiguedad en el cargo</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Pertenencia a pueblo indígena</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Condición de discapacidad</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Forma de designación</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Afiliación partidista</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5">Nivel de escolaridad</td>
                                                <td class="text-center font-weight-bold px-5">Estatus</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP3" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <select id="txtSexoP3" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Hombre</option>
                                                        <option value="2">2.- Mujer</option>
                                                        <option value="8">8.- Vacante</option>
                                                        <option value="9">9.- No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input id="txtEdadP3" type="number" class="form-control" max="100" min="18" required>
                                                </td>
                                                <td>
                                                    <input id="txtIngresosP3" type="number" class="form-control" max="100000000" min="0" required>
                                                </td>
                                                <td>
                                                    <select id="txtNivEscolaridadP3" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Ninguno</option>
                                                        <option value="2">2.- Preescolar o primaria</option>
                                                        <option value="3">3.- Secundaria</option>
                                                        <option value="4">4.- Preparatoria</option>
                                                        <option value="5">5.- Carrera técnica o carrera comercial</option>
                                                        <option value="6">6.- Licenciatura</option>
                                                        <option value="7">7.- Maestría</option>
                                                        <option value="8">8.- Doctorado</option>
                                                        <option value="9">9.- No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="txtEstatusEscolaridadP3" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Cursando</option>
                                                        <option value="2">2.- Inconcluso</option>
                                                        <option value="3">3.- Concluido</option>
                                                        <option value="4">4.- Titulado</option>
                                                        <option value="8">8.- No aplica</option>
                                                        <option value="9">9.- No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="txtEmpleoAnteriorP3" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Gobierno federal</option>
                                                        <option value="2">2.- Gobierno estatal</option>
                                                        <option value="3">3.- Gobierno municipal</option>
                                                        <option value="4">4.- Negocio propio</option>
                                                        <option value="5">5.- Empleado sector privado</option>
                                                        <option value="6">6.- Cargo de elección popular</option>
                                                        <option value="7">7.- Representación sindical</option>
                                                        <option value="8">8.- Cargo en partido político</option>
                                                        <option value="9">9.- Sector social (Organizaciones de la sociedad civil)</option>
                                                        <option value="10">10.- Academia (Profesor / investigador de tiempo completo)</option>
                                                        <option value="11">11.- Es primer trabajo</option>
                                                        <option value="12">12.- Otro</option>
                                                        <option value="99">99.- No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input id="txtAntiguedadServicioP3" type="number" class="form-control" max="100" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtAntiguedadCargoP3" type="number" class="form-control" max="100" min="0" required>
                                                </td>
                                                <td>
                                                    <select id="txtPertenenciaIndigenaP3" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Chinanteco</option>
                                                        <option value="2">2.- Ch'ol</option>
                                                        <option value="3">3.- Cora</option>
                                                        <option value="4">4.- Huasteco</option>
                                                        <option value="5">5.- Huichol</option>
                                                        <option value="6">6.- Maya</option>
                                                        <option value="7">7.- Mayo</option>
                                                        <option value="8">8.- Mazahua</option>
                                                        <option value="9">9.- Mazateco</option>
                                                        <option value="10">10.- Mixe</option>
                                                        <option value="11">11.- Mixteco</option>
                                                        <option value="12">12.- Náhuatl</option>
                                                        <option value="13">13.- Otomí</option>
                                                        <option value="14">14.- Tarasco/Purépecha</option>
                                                        <option value="15">15.- Tarahumara</option>
                                                        <option value="16">16.- Tepehuano</option>
                                                        <option value="17">17.- Tlapaneco</option>
                                                        <option value="18">18.- Totonaco</option>
                                                        <option value="19">19.- Tseltal</option>
                                                        <option value="20">20.- Tsotsil</option>
                                                        <option value="21">21.- Yaqui</option>
                                                        <option value="22">22.- Zapoteco</option>
                                                        <option value="23">23.- Zoque</option>
                                                        <option value="24">24.- Otro</option>
                                                        <option value="25">25.- Ninguno</option>
                                                        <option value="99">99.- No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="txtCondicionDiscapacidadP3" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Dificultad o impedimento para caminar, subir o bajar escalones usando sus piernas</option>
                                                        <option value="2">2.- Dificultad o impedimento para ver, aún usando lentes</option>
                                                        <option value="3">3.- Dificultad o impedimento para mover o usar sus brazos o manos</option>
                                                        <option value="4">4.- Dificultad o impedimento para aprender, recordar o concentrarse por alguna condición intelectual, por ejemplo síndrome de Down</option>
                                                        <option value="5">5.- Dificultad o impedimento para oír, aún usando aparato auditivo</option>
                                                        <option value="6">6.- Dificultad o impedimento para hablar o comunicarse (entender o ser entendido(a) por otros)</option>
                                                        <option value="7">7.- Dificultad o impedimento para bañarse, vestirse o comer</option>
                                                        <option value="8">8.- Dificultad o impedimento para realizar sus actividades diarias por alguna condicional emocional o mental, por ejemplo esquizofrenia o depresión</option>
                                                        <option value="9">9.- Otra</option>
                                                        <option value="10">10.- Ninguna</option>
                                                        <option value="99">99.- No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="txtFormaDesignacionP3" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Elección popular</option>
                                                        <option value="2">2.- Gobernador(a) o Jefe(a) de Gobierno de la Ciudad de México</option>
                                                        <option value="3">3.- Gobernador(a) o Jefe(a) de Gobierno de la Ciudad de México, con aprobación del Congreso Estatal</option>
                                                        <option value="4">4.- Congreso Estatal</option>
                                                        <option value="5">5.- Congreso Estatal, a propuesta de alguna instancia del Poder Ejecutivo Estatal</option>
                                                        <option value="6">6.- Otra forma de designación</option>
                                                        <option value="9">9.- No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="txtAfiliacionPartidistaP3" class="custom-select" required disabled title="Habilitado solo para el numeral 0">
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Movimiento de Regeneración Nacional (MORENA)</option>
                                                        <option value="2">2.- Partido Acción Nacional (PAN)</option>
                                                        <option value="3">3.- Partido de la Revolución Democrática (PRD)</option>
                                                        <option value="4">4.- Partido del Trabajo (PT)</option>
                                                        <option value="5">5.- Partido Encuentro Social (PES)</option>
                                                        <option value="6">6.- Partido Movimiento Ciudadano (MC)</option>
                                                        <option value="7">7.- Partido Nueva Alianza (PANAL)</option>
                                                        <option value="8">8.- Partido Revolucionario Institucional (PRI)</option>
                                                        <option value="9">9.- Partido Verde Ecologista de México (PVEM)</option>
                                                        <option value="10">10.- Sin partido político</option>
                                                        <option value="11">11.- Otro partido político (especifique )</option>
                                                        <option value="99">99.- No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="txtMismoTitularP3" class="custom-select" required>
                                                        <option value="No" selected>No aplica</option>
                                                        <option value="Si">Otro</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorIdMismoTitularP3" class="d-none">
                                                <td colspan="10">
                                                    <div class="form-row">
                                                        <div class="col-md-10 col-8 text-right pt-3">
                                                            <span style="font-size: small;">Clave del mismo titular</span>
                                                        </div>
                                                        <div class="col-md-2 col-4">
                                                            <input id="txtClaveMismoTitularP3" type="number" class="form-control" min="0">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorCamposEspecificosP3" class="d-none">
                                                <td colspan="10">
                                                    <div class="form-row d-none" id="contenedorSexoEspecificoP3">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el sexo</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="sexoEspecificoP3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorNivelEscolaridadEspecificoP3">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el nivel de escolaridad</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="nivelEscolaridadEspecificoP3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorEstatusEstudioEspecificoP3">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el estatus de estudio</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="estatusEstudioEspecificoP3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorEmpleoAnteriorEspecificoP3">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el empleo anterior</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="empleoAnteriorEspecificoP3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorPertenenciaIndigenaEspecificoP3">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique la pertenencia a pueblo indígena</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="pertenenciaIndigenaEspecificoP3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorCondicionDiscapacidadEspecificoP3">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique la condicion de discapacidad</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="condicionDiscapacidadEspecificoP3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorFormaDesignacionEspecificaP3">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique la forma de designación</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="formaDesignacionEspecificaP3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-none" id="contenedorAfiliacionPartidistaEspecificaP3">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique la afiliación partidista</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="afiliacionPartidistaEspecificaP3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorArchivosTitularP3" class="form-row px-1 d-none">
                                                <div class="col-md-12">
                                                    <td colspan="10" class="text-center pt-4" style="font-size: small; width: 100%;">
                                                        <h6 class="text-warning">Archivos a subir</h6>
                                                        <small class="text-justify text-info">
                                                            <i class="fas fa-caret-right"></i> Verifique que el nombre de los archivos corresponda al nombre del titular de la institución SIN ESPACIOS Ejemplo: ManuelGarcíaRios.pdf
                                                        </small>
                                                    </td>
                                                </div>
                                                <div class="col-md-12">
                                                    <td colspan="5" class="text-center font-weight-bold" style="width: 50%; font-size: small;">Título</td>
                                                    <td colspan="5" class="text-center font-weight-bold" style="width: 50%; font-size: small;">Cédula profesional</td>
                                                </div>
                                                <div class="col-md-12">
                                                    <td colspan="5" style="width: 50%;">
                                                        <input class="form-control" type="file" id="txtTituloP3" accept="image/*,.pdf">
                                                        <div id="contenedorTituloP3" class="pt-3 text-center"></div>
                                                    </td>
                                                    <td colspan="5" style="width: 50%;">
                                                        <input class="form-control" type="file" id="txtCedulaP3" accept="image/*,.pdf">
                                                        <div id="contenedorCedulaP3" class="pt-3 text-center"></div>
                                                    </td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <td colspan="10">
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP3"></textarea>
                                                        <label for="txtComentarioGeneralP3">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 3</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta4s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">4.- </span>
                                Anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de personal adscrito al cierre del año 2020, según su sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP4S1" role="button" aria-expanded="false" aria-controls="collapseP4S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP4S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP4" class="text-danger d-none">
                                    Total de personal: <span id="infoTotalPersonalP4" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP4" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP4"></span>
                                </h6>
                                <form id="formPregunta4" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="2">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="3">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold">Total</td>
                                                <td class="text-center">Hombres</td>
                                                <td class="text-center">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP4" type="text" class="form-control" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalP4" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresP4" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresP4" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP4"></textarea>
                                                        <label for="txtComentarioGeneralP4">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 4</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta5s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">5.- </span>
                                De acuerdo con el total de personal que reportó como respuesta en la pregunta anterior, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su régimen de contratación y sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP5S1" role="button" aria-expanded="false" aria-controls="collapseP5S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP5S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP5" class="text-danger d-none">
                                    Total de personal: <span id="infoTotalPersonalP5" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP5" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP5"></span>
                                </h6>
                                <form id="formPregunta5" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="3">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="13">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según régimen de contratación y sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Total</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Hombres</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Mujeres</td>
                                                <td class="text-center font-weight-bold" colspan="2">Confianza</td>
                                                <td class="text-center font-weight-bold" colspan="2">Base o sindicalizado</td>
                                                <td class="text-center font-weight-bold" colspan="2">Eventual</td>
                                                <td class="text-center font-weight-bold" colspan="2">Honorarios</td>
                                                <td class="text-center font-weight-bold" colspan="2">Otro</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP5" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalP5" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresP5" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresP5" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresConfianzaP5" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresConfianzaP5" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresBaseP5" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresBaseP5" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresEventualP5" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresEventualP5" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresHonorariosP5" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresHonorariosP5" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresOtroP5" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresOtroP5" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorotroEspecificoP5" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el otro régimen de contratación</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="otroEspecificoP5">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP5"></textarea>
                                                        <label for="txtComentarioGeneralP5">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 5</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta6s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">6.- </span>
                                De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando la institución de seguridad social en la que se encontraba registrado y sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP6S1" role="button" aria-expanded="false" aria-controls="collapseP6S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP6S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP6" class="text-danger d-none">
                                    Total de personal: <span id="infoTotalPersonalP6" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP6" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP6"></span>
                                </h6>
                                <form id="formPregunta6" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="3">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="13">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según institución de seguridad social y sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Total</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Hombres</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Mujeres</td>
                                                <td class="text-center font-weight-bold" colspan="2">Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado (ISSSTE)</td>
                                                <td class="text-center font-weight-bold" colspan="2">Institución de Seguridad Social de la entidad federativa u homóloga</td>
                                                <td class="text-center font-weight-bold" colspan="2">Instituto Mexicano del Seguro Social (IMSS)</td>
                                                <td class="text-center font-weight-bold" colspan="2">Otra institución de seguridad social</td>
                                                <td class="text-center font-weight-bold" colspan="2">Sin seguridad social</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP6" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalP6" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresP6" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresP6" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresISSSTEP6" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresISSSTEP6" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresISSEFHP6" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresISSEFHP6" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresIMSSP6" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresIMSSP6" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresOtraP6" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresOtraP6" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresSinSeguridadP6" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresSinSeguridadP6" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtroYsinSeguridadEspecificoP6" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique la institución de seguridad social</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="otroYsinSeguridadEspecificoP6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP6"></textarea>
                                                        <label for="txtComentarioGeneralP6">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 6</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta7s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">7.- </span>
                                De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su rango de edad y sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP7S1" role="button" aria-expanded="false" aria-controls="collapseP7S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP7S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1. <br>
                                    <i class="fas fa-caret-right"></i> Debe considerar los años cumplidos al cierre del año 2020 del personal adscrito a las instituciones de la Administración Pública de su entidad federativa.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP7" class="text-danger d-none">
                                    Total de personal: <span id="infoTotalPersonalP7" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP7" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP7"></span>
                                </h6>
                                <form id="formPregunta7" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="3">Nombre de las instituciones</td>
                                                <td class="text-left pl-5 font-weight-bold" colspan="21">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según rango de edad y sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Total</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Hombres</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Mujeres</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 18 a 24 años</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 25 a 29 años</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 30 a 34 años</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 35 a 39 años</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 40 a 44 años</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 45 a 49 años</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 50 a 54 años</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 55 a 59 años</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 60 años o más</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP7" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalP7" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresP7" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresP7" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres18a24P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres18a24P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres25a29P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres25a29P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres30a34P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres30a34P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres35a39P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres35a39P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres40a44P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres40a44P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres45a49P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres45a49P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres50a54P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres50a54P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres55a59P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres55a59P7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres60yMasP7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres60yMasP7" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP7"></textarea>
                                                        <label for="txtComentarioGeneralP7">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 7</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta8s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">8.- </span>
                                De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su rango de ingresos y sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP8S1" role="button" aria-expanded="false" aria-controls="collapseP8S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP8S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> Debe considerar en pesos los ingresos brutos mensuales del personal adscrito a las instituciones de la Administración Pública de su entidad federativa.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP8" class="text-danger d-none">
                                    Total de personal: <span id="infoTotalPersonalP8" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP8" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP8"></span>
                                </h6>
                                <form id="formPregunta8" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="3">Nombre de las instituciones</td>
                                                <td class="text-left pl-5 font-weight-bold" colspan="35">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según rango de ingresos y sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Total</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Hombres</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Mujeres</td>
                                                <td class="text-center font-weight-bold" colspan="2">Sin paga</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 1 a 5,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 5,001 a 10,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 10,001 a 15,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 15,001 a 20,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 20,001 a 25,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 25,001 a 30,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 30,001 a 35,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 35,001 a 40,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 40,001 a 45,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 45,001 a 50,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 50,001 a 55,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 55,001 a 60,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 60,001 a 65,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">De 65,001 a 70,000 pesos</td>
                                                <td class="text-center font-weight-bold" colspan="2">Más de 70,000 pesos</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP8" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalP8" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresP8" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresP8" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresSinPagaP8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresSinPagaP8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres1a5000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres1a5000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres5001a10000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres5001a10000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres10001a15000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres10001a15000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres15001a20000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres15001a20000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres20001a25000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres20001a25000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres25001a30000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres25001a30000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres30001a35000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres30001a35000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres35001a40000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres35001a40000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres40001a45000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres40001a45000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres45001a50000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres45001a50000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres50001a55000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres50001a55000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres55001a60000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres55001a60000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres60001a65000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres60001a65000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombres65001a70000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeres65001a70000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresMasDe70000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresMasDe70000P8" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorSinPagaEspecificoP8" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el rango de ingresos mensual</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="sinPagaEspecificoP8">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP8"></textarea>
                                                        <label for="txtComentarioGeneralP8">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 8</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta9s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">9.- </span>
                                De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su nivel de escolaridad y sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP9S1" role="button" aria-expanded="false" aria-controls="collapseP9S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP9S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.<br>
                                    <i class="fas fa-caret-right"></i> Debe considerar el grado máximo de estudios del que hayan cursado todos los años al cierre del año 2020 el personal adscrito a las instituciones de la Administración Pública de su entidad federativa, independientemente de que se cuente con el título o certificado del mismo.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP9" class="text-danger d-none">
                                    Total de personal: <span id="infoTotalPersonalP9" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP9" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP9"></span>
                                </h6>
                                <form id="formPregunta9" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="3">Nombre de las instituciones</td>
                                                <td class="text-left pl-5 font-weight-bold" colspan="19">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según nivel de escolaridad y sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Total</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Hombres</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Mujeres</td>
                                                <td class="text-center font-weight-bold" colspan="2">Ninguno</td>
                                                <td class="text-center font-weight-bold" colspan="2">Preescolar o primaria</td>
                                                <td class="text-center font-weight-bold" colspan="2">Secundaria</td>
                                                <td class="text-center font-weight-bold" colspan="2">Preparatoria</td>
                                                <td class="text-center font-weight-bold" colspan="2">Carrera técnica o carrera comercial</td>
                                                <td class="text-center font-weight-bold" colspan="2">Licenciatura</td>
                                                <td class="text-center font-weight-bold" colspan="2">Maestría</td>
                                                <td class="text-center font-weight-bold" colspan="2">Doctorado</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP9" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalP9" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresP9" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresP9" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresNingunoP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresNingunoP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresPresPriP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresPresPriP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresSecuP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresSecuP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresPrepaP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresPrepaP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresTecnicaP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresTecnicaP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresLicenciaturaP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresLicenciaturaP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresMaestriaP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresMaestriaP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresDoctoradoP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresDoctoradoP9" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorNingunoEspecificoP9" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el nivel de escolaridad</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="ningunoEspecificoP9">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP9"></textarea>
                                                        <label for="txtComentarioGeneralP9">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 9</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta10s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">10.- </span>
                                De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su condición de pertenencia a algún pueblo indígena y sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP10S1" role="button" aria-expanded="false" aria-controls="collapseP10S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP10S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP10" class="text-danger d-none">
                                    Total de personal: <span id="infoTotalPersonalP10" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP10" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP10"></span>
                                </h6>
                                <h6 id="infoPersonalIndigenaP10" class="text-warning d-none">
                                    Total de personal perteneciente a algún pueblo indígena: <span id="infoTotalPersonalIndigenaP10" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresIndigenaP10" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresIndigenaP10"></span>
                                </h6>
                                <form id="formPregunta10" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="3">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="13">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según condición de pertenencia a algún pueblo indígena y sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Total</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Hombres</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Mujeres</td>
                                                <td class="text-center font-weight-bold" colspan="2">Pertenece a algún pueblo indígena</td>
                                                <td class="text-center font-weight-bold" colspan="2">No pertenece a algún pueblo indígena</td>
                                                <td class="text-center font-weight-bold" colspan="2">No identificado</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP10" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalP10" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresP10" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresP10" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresPertenecenP10" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresPertenecenP10" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresNoPertenecenP10" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresNoPertenecenP10" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresNoIdentificadoP10" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresNoIdentificadoP10" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorNoIdentificadoEspecificoP10" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique la condición de pertenencia a algún pueblo indígena</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="noIdentificadoEspecificoP10">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP10"></textarea>
                                                        <label for="txtComentarioGeneralP10">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 10</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta11s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">11.- </span>
                                De acuerdo con el total de personal que reportó como respuesta en el apartado “Pertenece a algún pueblo indígena” de la pregunta anterior, anote la cantidad del mismo especificando su pueblo indígena de pertenencia y sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP11S1" role="button" aria-expanded="false" aria-controls="collapseP11S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP11S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La suma de las cantidades registradas en la columna "Total" debe ser igual a la suma de las cantidades reportadas como respuesta en las columnas "Hombres" y "Mujeres" del apartado “Pertenece a algún pueblo indígena” de la pregunta anterior, así como corresponder a su desagregación por sexo.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP11" class="text-danger d-none">
                                    Total de personal perteneciente a algún pueblo indígena: <span id="infoTotalPersonalP11" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP11" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP11"></span>
                                </h6>
                                <form id="formPregunta11" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="5">Nombre de las instituciones</td>
                                                <td class="text-left pl-5 font-weight-bold" colspan="53">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa que pertenece a algún pueblo indígena, según sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" rowspan="4">Total</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="4">Hombres</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="4">Mujeres</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-left pl-5 font-weight-bold" colspan="50">Pueblo indígena de pertenencia</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" colspan="2">Chinanteco</td>
                                                <td class="text-center font-weight-bold" colspan="2">Ch'ol</td>
                                                <td class="text-center font-weight-bold" colspan="2">Cora</td>
                                                <td class="text-center font-weight-bold" colspan="2">Huasteco</td>
                                                <td class="text-center font-weight-bold" colspan="2">Huichol</td>
                                                <td class="text-center font-weight-bold" colspan="2">Maya</td>
                                                <td class="text-center font-weight-bold" colspan="2">Mayo</td>
                                                <td class="text-center font-weight-bold" colspan="2">Mazahua</td>
                                                <td class="text-center font-weight-bold" colspan="2">Mazateco</td>
                                                <td class="text-center font-weight-bold" colspan="2">Mixe</td>
                                                <td class="text-center font-weight-bold" colspan="2">Mixteco</td>
                                                <td class="text-center font-weight-bold" colspan="2">Náhuatl</td>
                                                <td class="text-center font-weight-bold" colspan="2">Otomí</td>
                                                <td class="text-center font-weight-bold" colspan="2">Tarasco/Purépecha</td>
                                                <td class="text-center font-weight-bold" colspan="2">Tarahumara</td>
                                                <td class="text-center font-weight-bold" colspan="2">Tepehuano</td>
                                                <td class="text-center font-weight-bold" colspan="2">Tlapaneco</td>
                                                <td class="text-center font-weight-bold" colspan="2">Totonaco</td>
                                                <td class="text-center font-weight-bold" colspan="2">Tseltal</td>
                                                <td class="text-center font-weight-bold" colspan="2">Tsotsil</td>
                                                <td class="text-center font-weight-bold" colspan="2">Yaqui</td>
                                                <td class="text-center font-weight-bold" colspan="2">Zapoteco</td>
                                                <td class="text-center font-weight-bold" colspan="2">Zoque</td>
                                                <td class="text-center font-weight-bold" colspan="2">Otro</td>
                                                <td class="text-center font-weight-bold" colspan="2">No identificado</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP11" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalP11" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresP11" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresP11" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresChinantecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresChinantecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresCholP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresCholP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresCoraP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresCoraP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresHuastecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresHuastecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresHuicholP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresHuicholP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresMayaP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresMayaP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresMayoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresMayoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresMazahuaP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresMazahuaP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresMazatecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresMazatecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresMixeP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresMixeP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresMixtecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresMixtecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresNahuatlP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresNahuatlP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresOtomiP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresOtomiP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresTarascoPurepechaP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresTarascoPurepechaP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresTarahumaraP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresTarahumaraP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresTepehuanoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresTepehuanoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresTlapanecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresTlapanecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresTotonacoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresTotonacoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresTseltalP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresTseltalP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresTsotsilP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresTsotsilP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresYaquiP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresYaquiP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresZapotecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresZapotecoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresZoqueP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresZoqueP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresOtroP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresOtroP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresNoIdentificadoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresNoIdentificadoP11" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtroNoIdentificadoEspecificoP11" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el pueblo indígena</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="otroNoIdentificadoEspecificoP11">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP11"></textarea>
                                                        <label for="txtComentarioGeneralP11">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 11</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta12s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">12.- </span>
                                De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de las mismas especificando su condición de discapacidad y sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP12S1" role="button" aria-expanded="false" aria-controls="collapseP12S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP12S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP12" class="text-danger d-none">
                                    Total de personal: <span id="infoTotalPersonalP12" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP12" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP12"></span>
                                </h6>
                                <h6 id="infoPersonalDiscapacitadoP12" class="text-warning d-none">
                                    Total de personal discapacitado: <span id="infoTotalPersonalDiscapacitadoP12" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresDiscapacitadoP12" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresDiscapacitadoP12"></span>
                                </h6>
                                <form id="formPregunta12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="3">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="13">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según condición de discapacidad y sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" rowspan="2">Total</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Hombres</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="2">Mujeres</td>
                                                <td class="text-center font-weight-bold" colspan="2">Con discapacidad</td>
                                                <td class="text-center font-weight-bold" colspan="2">Sin discapacidad</td>
                                                <td class="text-center font-weight-bold" colspan="2">No indentificado</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP12" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalP12" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresP12" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresP12" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresConDiscapacidadP12" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresConDiscapacidadP12" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresSinDiscapacidadP12" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresSinDiscapacidadP12" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresNoIdentificadoP12" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresNoIdentificadoP12" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorNoIdentificadoEspecificoP12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique la condición de discapacidad</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="noIdentificadoEspecificoP12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP12"></textarea>
                                                        <label for="txtComentarioGeneralP12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 12</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta13s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">13.- </span>
                                De acuerdo con el total de personal que reportó como respuesta en el apartado "Con discapacidad" de la pregunta anterior, anote la cantidad del mismo especificando su tipo de discapacidad y sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP13S1" role="button" aria-expanded="false" aria-controls="collapseP13S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP13S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La suma de las cantidades registradas en la columna "Total" debe ser igual o mayor a la suma de las cantidades reportadas como respuesta en las columnas "Hombres" y "Mujeres" del apartado "Con discapacidad" de la pregunta anterior, así como corresponder a su desagregación por sexo; toda vez que una persona puede contar con uno o más tipos de discapacidad.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP13" class="text-danger d-none">
                                    Total de personal discapacitado: <span id="infoTotalPersonalP13" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP13" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP13"></span>
                                </h6>
                                <form id="formPregunta13" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="5">Nombre de las instituciones</td>
                                                <td class="text-left font-weight-bold" colspan="23">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa que cuenta con alguna discapacidad, según sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" rowspan="4">Total</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="4">Hombres</td>
                                                <td class="text-center font-weight-bold px-4" rowspan="4">Mujeres</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-left font-weight-bold pl-5" colspan="20">Tipo de discapacidad</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" colspan="2">Dificultad o impedimento para caminar, subir o bajar escalones usando sus piernas</td>
                                                <td class="text-center font-weight-bold" colspan="2">Dificultad o impedimento para ver, aún usando lentes</td>
                                                <td class="text-center font-weight-bold" colspan="2">Dificultad o impedimento para mover o usar sus brazos o manos</td>
                                                <td class="text-center font-weight-bold" colspan="2">Dificultad o impedimento para aprender, recordar o concentrarse por alguna condición intelectual, por ejemplo síndrome de Down</td>
                                                <td class="text-center font-weight-bold" colspan="2">Dificultad o impedimento para oír, aún usando aparato auditivo</td>
                                                <td class="text-center font-weight-bold" colspan="2">Dificultad o impedimento para hablar o comunicarse (entender o ser entendido(a) por otros)</td>
                                                <td class="text-center font-weight-bold" colspan="2">Dificultad o impedimento para bañarse, vestirse o comer</td>
                                                <td class="text-center font-weight-bold" colspan="2">Dificultad o impedimento para realizar sus actividades diarias por alguna condicional emocional o mental, por ejemplo esquizofrenia o depresión</td>
                                                <td class="text-center font-weight-bold" colspan="2">Otro tipo de discapacidad</td>
                                                <td class="text-center font-weight-bold" colspan="2">No identificado</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                                <td class="text-center px-4">Hombres</td>
                                                <td class="text-center px-4">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP13" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalP13" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresP13" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresP13" type="number" class="form-control px-2 text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresCaminarP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresCaminarP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresVerP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresVerP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresBrazosP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresBrazosP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresAprenderP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresAprenderP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresOirP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresOirP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresHablarP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresHablarP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresBaniarseP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresBaniarseP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresDepresionP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresDepresionP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresOtroP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresOtroP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresNoIdentificadoP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresNoIdentificadoP13" type="number" class="form-control px-2 text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtroYnoIdentificadoEspecificoP13" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el tipo de discapacidad</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="otroYnoIdentificadoEspecificoP13">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP13"></textarea>
                                                        <label for="txtComentarioGeneralP13">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 13</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta14s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">14.- </span>
                                A partir de la información que reportó como respuesta para la(s) institución(es) de educación en la pregunta 4, señale si se contabilizó al personal que trabajaba en organismos descentralizados pagados con fondos federales. En caso afirmativo, anote la cantidad de este personal, según su sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP14S1" role="button" aria-expanded="false" aria-controls="collapseP14S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP14S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> En caso de que no se haya contabilizado al personal que trabajaba en organismos descentralizados pagados con fondos federales, o no cuente con información para determinarlo, indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-caret-right"></i> La cantidad registrada en la columna "Total" debe ser igual o menor a la suma de las cantidades reportadas como respuesta para las instituciones de educación en la columna "Total" de la pregunta 4, así como corresponder a su desagregación por sexo.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta14" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold w-50">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold">¿Se contabilizó al personal que trabajaba en organismos descentralizados pagados con fondos federales?</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center">
                                                    <input id="txtInstitucionP14" type="text" class="form-control" required readonly>
                                                </td>
                                                <td>
                                                    <div class="form-row d-flex align-items-center">
                                                        <div class="btn-group btn-group-sm w-100 mt-1" role="group" aria-label="">
                                                            <input type="radio" class="btn-check" name="btnRadioP14" id="btnRadioSiP14" value="si" autocomplete="off">
                                                            <label class="btn btn-outline-secondary" for="btnRadioSiP14">Sí</label>
                                                            <input type="radio" class="btn-check" name="btnRadioP14" id="btnRadioNoP14" value="no" autocomplete="off">
                                                            <label class="btn btn-outline-secondary" for="btnRadioNoP14">No</label>
                                                            <input type="radio" class="btn-check" name="btnRadioP14" id="btnRadioNoSeP14" value="noSe" autocomplete="off">
                                                            <label class="btn btn-outline-secondary" for="btnRadioNoSeP14">No se sabe</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorPersonalFederalP14" class="d-none" style="font-size: small;">
                                                <td class="text-center font-weight-bold">
                                                    <div class="form-row">
                                                        <div class="col-md-12 text-left">
                                                            <h6 id="infoPersonalP14" class="text-danger d-none">
                                                                Total de personal: <span id="infoTotalPersonalP14" class="pr-5"></span>
                                                                Hombres: <span id="infoTotalHombresP14" class="pr-5"></span>
                                                                Mujeres: <span id="infoTotalMujeresP14"></span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-12 py-2 border border-left-0 border-right-0">
                                                            <span>Personal pagado con fondos federales, según sexo</span>
                                                        </div>
                                                        <div class="col-md-4 my-3">
                                                            <span>Total</span>
                                                        </div>
                                                        <div class="col-md-4 my-3">
                                                            <span>Hombres</span>
                                                        </div>
                                                        <div class="col-md-4 my-3">
                                                            <span>Mujeres</span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input id="txtTotalPersonalP14" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input id="txtTotalHombresP14" type="number" class="form-control text-center" value="0" min="0" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input id="txtTotalMujeresP14" type="number" class="form-control text-center" value="0" min="0" required>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP14"></textarea>
                                                        <label for="txtComentarioGeneralP14">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 14</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta15s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.2 Características del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">15.- </span>
                                A partir de la información que reportó como respuesta para la(s) institución(es) de salud en la pregunta 4, señale si se contabilizó al personal que trabajaba en organismos descentralizados pagados con fondos federales. En caso afirmativo, anote la cantidad de este personal, según su sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP15S1" role="button" aria-expanded="false" aria-controls="collapseP15S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP15S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> En caso de que no se haya contabilizado al personal que trabajaba en organismos descentralizados pagados con fondos federales, o no cuente con información para determinarlo, indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-caret-right"></i> La cantidad registrada en la columna "Total" debe ser igual o menor a la suma de las cantidades reportadas como respuesta para las instituciones de salud en la columna "Total" de la pregunta 4, así como corresponder a su desagregación por sexo.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta15" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold w-50">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold">¿Se contabilizó al personal que trabajaba en organismos descentralizados pagados con fondos federales?</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center">
                                                    <input id="txtInstitucionP15" type="text" class="form-control" required readonly>
                                                </td>
                                                <td>
                                                    <select id="txtContabilizoPersonalP15" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="Si">Sí</option>
                                                        <option value="No">No</option>
                                                        <option value="No se sabe">No se sabe</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorPersonalFederalP15" class="d-none" style="font-size: small;">
                                                <td class="text-center font-weight-bold">
                                                    <div class="form-row">
                                                        <div class="col-md-12 text-left">
                                                            <h6 id="infoPersonalP15" class="text-danger d-none">
                                                                Total de personal: <span id="infoTotalPersonalP15" class="pr-5"></span>
                                                                Hombres: <span id="infoTotalHombresP15" class="pr-5"></span>
                                                                Mujeres: <span id="infoTotalMujeresP15"></span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-12 py-2 border border-left-0 border-right-0">
                                                            <span>Personal pagado con fondos federales, según sexo</span>
                                                        </div>
                                                        <div class="col-md-4 my-3">
                                                            <span>Total</span>
                                                        </div>
                                                        <div class="col-md-4 my-3">
                                                            <span>Hombres</span>
                                                        </div>
                                                        <div class="col-md-4 my-3">
                                                            <span>Mujeres</span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input id="txtTotalPersonalP15" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input id="txtTotalHombresP15" type="number" class="form-control text-center" value="0" min="0" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input id="txtTotalMujeresP15" type="number" class="form-control text-center" value="0" min="0" required>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP15"></textarea>
                                                        <label for="txtComentarioGeneralP15">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 15</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta16s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.3 Profesionalización del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">16.- </span>
                                Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, si al cierre del año 2020 contaba con elementos, mecanismos y/o esquemas de profesionalización para su personal. En caso afirmativo, especifique el nombre de la disposición normativa donde se encuentren regulados o, en su defecto, la no regulación de los mismos. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP16S1" role="button" aria-expanded="false" aria-controls="collapseP16S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP16S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.<br>
                                    <i class="fas fa-caret-right"></i> Para cada institución, en caso de que no haya contado con elementos, mecanismos y/o esquemas de profesionalización para su personal, o no cuente con información para determinarlo, indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-caret-right"></i> Para cada institución, en caso de que haya contado con elementos, mecanismos y/o esquemas de profesionalización para su personal, pero estos no se encuentren regulados en alguna disposición normativa, en la columna "Nombre de la disposición normativa donde se encuentran regulados" anote "NA" (No aplica).
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta16" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold w-50">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold">¿Contaba con elementos, mecanismos y/o esquemas de profesionalización para su personal?</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center">
                                                    <input id="txtInstitucionP16" type="text" class="form-control" required readonly>
                                                </td>
                                                <td>
                                                    <select id="txtElementosProfesionalizacionP16" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Sí</option>
                                                        <option value="2">2.- No</option>
                                                        <option value="9">9.- No se sabe</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorDisposicionNormativaP16" class="d-none" style="font-size: small;">
                                                <td class="text-center font-weight-bold">
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="txtDisposicionNormativaP16" placeholder="Nombre...">
                                                                <label for="txtDisposicionNormativaP16">Nombre de la disposición normativa donde se encuentran regulados</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP16"></textarea>
                                                        <label for="txtComentarioGeneralP16">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 16</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta17s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.3 Profesionalización del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">17.- </span>
                                Señale, por cada una de las instituciones de la Administración Pública de su entidad federativa, los elementos, mecanismos y/o esquemas de profesionalización considerados en la pregunta anterior. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP17S1" role="button" aria-expanded="false" aria-controls="collapseP17S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP17S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.<br>
                                    <i class="fas fa-caret-right"></i> Para cada institución, seleccione con una "X" la o las opciones que correspondan.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta17" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="2">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="13">Elementos, mecanismos y/o esquemas de profesionalización</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold">Servicio civil de carrera</td>
                                                <td class="text-center font-weight-bold">Reclutamiento, selección e inducción</td>
                                                <td class="text-center font-weight-bold">Diseño y selección de pruebas de ingreso</td>
                                                <td class="text-center font-weight-bold">Diseño curricular</td>
                                                <td class="text-center font-weight-bold">Actualización de perfiles de puesto</td>
                                                <td class="text-center font-weight-bold">Diseño y validación de competencias</td>
                                                <td class="text-center font-weight-bold">Concursos públicos y abiertos para la contratación</td>
                                                <td class="text-center font-weight-bold">Mecanismos de evaluación del desempeño</td>
                                                <td class="text-center font-weight-bold">Programas de capacitación</td>
                                                <td class="text-center font-weight-bold">Evaluación de impacto de la capacitación</td>
                                                <td class="text-center font-weight-bold">Programas de estímulos y recompensas</td>
                                                <td class="text-center font-weight-bold">Separación del servicio</td>
                                                <td class="text-center font-weight-bold">Otros</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP17" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkServicioP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkServicioP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkReclutamientoP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkReclutamientoP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkPruebasP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkPruebasP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkCurricularP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkCurricularP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkActualizacionP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkActualizacionP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkValidacionP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkValidacionP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkConcursosP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkConcursosP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismosP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismosP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkProgramasP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkProgramasP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEvaluacionP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEvaluacionP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEstimulosP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEstimulosP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkSeparacionP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkSeparacionP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkOtrosP17" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkOtrosP17"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtroEspecificoP17" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el elemento, mecanismo y/o esquema de profesionalización</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="otroEspecificoP17">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP17"></textarea>
                                                        <label for="txtComentarioGeneralP17">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 17</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta18s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.3 Profesionalización del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">18.- </span>
                                Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, si al cierre del año 2020 contaba con alguna unidad administrativa o área que coordinara los esfuerzos en materia de profesionalización del personal. En caso afirmativo, anote el nombre de la misma. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP18S1" role="button" aria-expanded="false" aria-controls="collapseP18S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP18S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.<br>
                                    <i class="fas fa-caret-right"></i> Para la respuesta de esta pregunta debe considerar la existencia de una unidad administrativa o área coordinadora que tenga procedimientos de profesionalización y no solo mecanismos de gestión del personal.<br>
                                    <i class="fas fa-caret-right"></i> Para cada institución, en caso de que no haya contado con alguna unidad administrativa o área coordinadora de los esfuerzos en materia de profesionalización del personal, o no cuente con información para determinarlo, indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta18" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold w-50">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold">¿Contaba con alguna unidad administrativa o área coordinadora de los esfuerzos en materia de profesionalización?</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center">
                                                    <input id="txtInstitucionP18" type="text" class="form-control" required readonly>
                                                </td>
                                                <td>
                                                    <select id="selectUnidadAdministrativaP18" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorUnidadAdministrativaP18" class="d-none" style="font-size: small;">
                                                <td class="text-center font-weight-bold">
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="txtUnidadAdministrativaP18" placeholder="Nombre...">
                                                                <label for="txtUnidadAdministrativaP18">Nombre de la unidad administrativa o área coordinadora en materia de profesionalización del personal</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP18"></textarea>
                                                        <label for="txtComentarioGeneralP18">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 18</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta19s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.2 Recursos humanos</h5>
                            <h6 class="text-primary">I.2.4 Capacitación del personal</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">19.- </span>
                                Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, si durante el año 2020 se impartieron acciones formativas al personal adscrito a la misma. En caso afirmativo, anote la cantidad de acciones formativas impartidas, así como la cantidad de servidores públicos capacitados, según su sexo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP18S1" role="button" aria-expanded="false" aria-controls="collapseP18S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP18S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.<br>
                                    <i class="fas fa-caret-right"></i> En caso de que al personal adscrito a determinada institución no se le hayan impartido acciones formativas, o no cuente con información para determinarlo,
                                    indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-caret-right"></i> En la columna "Acciones formativas impartidas" debe considerar las acciones formativas impartidas del 1 de enero al 31 de diciembre de 2020 al personal adscrito a las instituciones de la Administración Pública de su entidad federativa, independientemente de que hayan concluido durante el referido año. Debe considerar tanto las acciones impartidas por la propia institución como las realizadas por organizaciones externas.<br>
                                    <i class="fas fa-caret-right"></i> En la columna "Acciones formativas impartidas y concluidas" debe considerar las acciones formativas impartidas del 1 de enero al 31 de diciembre de 2020 al personal adscrito a las instituciones de la Administración Pública de su entidad federativa, y que además hayan concluido durante el referido año. Debe considerar tanto las acciones impartidas por la propia institución como las realizadas por organizaciones externas.<br>
                                    <i class="fas fa-caret-right"></i> Debe considerar al personal adscrito a las instituciones de la Administración Pública de su entidad federativa que haya concluido determinada acción formativa impartida y concluida entre el 1 de enero y el 31 de diciembre de 2020, independientemente de que, por cuestiones de temporalidad, cuente con el certificado, constancia, calificación aprobatoria o cualquier documento que lo acredite.<br>
                                    <i class="fas fa-caret-right"></i> En caso de que un servidor público haya concluido más de una acción formativa impartida y concluida entre el 1 de enero y el 31 de diciembre de 2020, debe ser considerado una sola vez en el registro de esta pregunta.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalP19" class="text-danger d-none">
                                    Total de personal: <span id="infoTotalPersonalP19" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresP19" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresP19"></span>
                                </h6>
                                <form id="formPregunta19" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;" class="w-100">
                                                <td class="text-center font-weight-bold w-50">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold w-50">
                                                    <span class="mx-5"></span>
                                                    <span>¿Se impartieron acciones formativas al personal?</span>
                                                    <span class="mx-5"></span>
                                                </td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center">
                                                    <input id="txtInstitucionP19" type="text" class="form-control w-100" required readonly>
                                                </td>
                                                <td>
                                                    <select id="selectAccionesFormativasP19" class="custom-select w-100" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorAccionesFormativasP19" class="d-none" style="font-size: small;">
                                                <td class="text-center font-weight-bold">
                                                    <div class="form-row">
                                                        <div class="col-md-5">
                                                            <div class="form-row">
                                                                <div class="col-6 border border-top-0 border-left-0 mb-2 mt-1 pt-3 pb-4"><span>Acciones formativas impartidas</span></div>
                                                                <div class="col-6 border border-top-0 border-left-0 mb-2 mt-1 pt-3 pb-4"><span>Acciones formativas impartidas y concluidas</span></div>
                                                                <div class="col-6">
                                                                    <input id="txtTotalImpartidasP19" type="number" class="form-control text-center" value="0" min="0" required>
                                                                </div>
                                                                <div class="col-6">
                                                                    <input id="txtTotalImpartidasConcluidasP19" type="number" class="form-control text-center" value="0" min="0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="form-row">
                                                                <div class="col-12 border border-top-0 border-right-0 border-left-0 pb-2">
                                                                    <span>Servidores públicos capacitados adscritos a las instituciones de la Administración Pública de la entidad federativa, según sexo</span>
                                                                </div>
                                                                <div class="col-4 border border-top-0 border-left-0 py-2 mb-2"><span class="font-weight-light">Total</span></div>
                                                                <div class="col-4 border border-top-0 border-left-0 py-2 mb-2"><span class="font-weight-light">Hombres</span></div>
                                                                <div class="col-4 border border-top-0 border-left-0 border-right-0 py-2 mb-2"><span class="font-weight-light">Mujeres</span></div>
                                                                <div class="col-4">
                                                                    <input id="txtTotalPersonalP19" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                                </div>
                                                                <div class="col-4">
                                                                    <input id="txtTotalHombresP19" type="number" class="form-control text-center" value="0" min="0" required>
                                                                </div>
                                                                <div class="col-4">
                                                                    <input id="txtTotalMujeresP19" type="number" class="form-control text-center" value="0" min="0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP19"></textarea>
                                                        <label for="txtComentarioGeneralP19">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 19</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta24s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.1 Bienes inmuebles</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">24.- </span>
                                Anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de bienes inmuebles con los que contaba al cierre del año 2020, según tipo de posesión. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP24S1" role="button" aria-expanded="false" aria-controls="collapseP24S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP24S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoInmueblesP24" class="text-danger d-none">
                                    Total de bienes inmuebles: <span id="infoTotalInmueblesP24" class="pr-5"></span>
                                    Propios: <span id="infoTotalPropiosP24" class="pr-5"></span>
                                    Rentados: <span id="infoTotalRentadosP24" class="pr-5"></span>
                                    Otro: <span id="infoTotalOtroP24"></span>
                                </h6>
                                <form id="formPregunta24" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="2">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="4">Bienes inmuebles, según tipo de posesión</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5">Total</td>
                                                <td class="text-center font-weight-bold px-5">Propios</td>
                                                <td class="text-center font-weight-bold px-5">Rentados</td>
                                                <td class="text-center font-weight-bold px-5">Otro tipo de posesión</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP24" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalInmueblesP24" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPropiosP24" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalRentadosP24" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalOtroP24" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtroEspecificoP24" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el otro tipo de posesión</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="otroEspecificoP24">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP24"></textarea>
                                                        <label for="txtComentarioGeneralP24">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 24</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta25s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.1 Bienes inmuebles</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">25.- </span>
                                A partir de la información que reportó como respuesta en la pregunta anterior, señale si se contabilizaron bienes inmuebles cuyo uso principal haya sido el apoyo a funciones educativas.
                            </label>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta25" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold w-50">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold">¿Se contabilizaron bienes inmuebles cuyo uso principal haya sido el apoyo a funciones educativas?</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP25" type="text" class="form-control w-100" required readonly>
                                                </td>
                                                <td>
                                                    <select id="selectApoyoEducativasP25" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP25"></textarea>
                                                        <label for="txtComentarioGeneralP25">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 25</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta26s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.1 Bienes inmuebles</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">26.- </span>
                                De acuerdo con el total de bienes inmuebles que reportó como respuesta en la pregunta 24, anote la cantidad de los mismos que tuvieron como uso principal el apoyo a funciones educativas. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP26S1" role="button" aria-expanded="false" aria-controls="collapseP26S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP26S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> Para el "Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones educativas" debe considerar los bienes inmuebles de las instituciones de la Administración Pública de su entidad federativa que tuvieron como uso principal el apoyo a dichas funciones, hayan pertenecido o no a instituciones cuya función principal reportada en la pregunta 1 fue "Educación"<br>
                                    <i class="fas fa-caret-right"></i> La cantidad registrada en el recuadro "Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones educativas" debe ser igual o menor a la suma de las cantidades reportadas como respuesta en la columna "Total" de la pregunta 24, así como corresponder a su desagregación por tipo de función principal de la institución de referencia.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoInmueblesP26" class="text-danger d-none">
                                    Total de bienes inmuebles: <span id="infoTotalInmueblesP26" class="pr-5"></span>
                                    Propios: <span id="infoTotalPropiosP26" class="pr-5"></span>
                                    Rentados: <span id="infoTotalRentadosP26" class="pr-5"></span>
                                    Otro: <span id="infoTotalOtroP26"></span>
                                </h6>
                                <form id="formPregunta26" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="5">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="6">Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones educativas (1. + 2.)</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td colspan="2"></td>
                                                <td colspan="2">
                                                    <input id="txtTotalInmueblesP26" type="number" value="0" min="0" class="form-control text-center w-100" required readonly>
                                                </td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td colspan="3">1. Bienes inmuebles registrados por instituciones con función principal "Educación" (1.1 + 1.2 + 1.3)</td>
                                                <td colspan="3">2. Bienes inmuebles registrados por instituciones con otro tipo de función principal (2.1 + 2.2 + 2.3)</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td colspan="1"></td>
                                                <td colspan="1">
                                                    <input id="txtTotalInmuebles1P26" type="number" value="0" min="0" class="form-control text-center w-100" required readonly>
                                                </td>
                                                <td colspan="1"></td>
                                                <td colspan="1"></td>
                                                <td colspan="1">
                                                    <input id="txtTotalInmuebles2P26" type="number" value="0" min="0" class="form-control text-center w-100" required readonly>
                                                </td>
                                                <td colspan="1"></td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5">1.1 Bienes inmuebles usados como escuelas</td>
                                                <td class="text-center font-weight-bold px-5">1.2 Bienes inmuebles usados para otro tipo de funciones educativas</td>
                                                <td class="text-center font-weight-bold px-5">1.3 Bienes inmuebles usados de forma mixta</td>
                                                <td class="text-center font-weight-bold px-5">2.1 Bienes inmuebles usados como escuelas</td>
                                                <td class="text-center font-weight-bold px-5">2.2 Bienes inmuebles usados para otro tipo de funciones educativas</td>
                                                <td class="text-center font-weight-bold px-5">2.3 Bienes inmuebles usados de forma mixta</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP26" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x1P26" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x2P26" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x3P26" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x1P26" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x2P26" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x3P26" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtraFuncionEspecificoP26" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el otro tipo de función educativa</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="otraFuncionEspecificoP26">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP26"></textarea>
                                                        <label for="txtComentarioGeneralP26">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 26</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta27s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.1 Bienes inmuebles</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">27.- </span>
                                A partir de la información que reportó como respuesta en la pregunta 24, señale si se contabilizaron bienes inmuebles cuyo uso principal fue el apoyo a funciones de salud.
                            </label>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta27" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold w-50">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold">¿Se contabilizaron bienes inmuebles cuyo uso principal fue el apoyo a funciones de salud?</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP27" type="text" class="form-control w-100" required readonly>
                                                </td>
                                                <td>
                                                    <select id="selectApoyoFuncionSaludP27" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP27"></textarea>
                                                        <label for="txtComentarioGeneralP27">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 27</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta28s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.1 Bienes inmuebles</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase front-weight-bold h5">28.-</span>
                                De acuerdo con el total de bienes inmuebles que reportó como respuesta en la pregunta 24, anote la cantidad de los mismos que tuvieron como uso principal el apoyo a funciones de salud. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP28S1" role="button" aria-expanded="false" aria-controls="collapseP28S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP28S1">
                                <small class="text-justify">
                                    <li class="fas fa-caret-right"></li> Para el "Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones salud" debe considerar los bienes inmuebles de las instituciones de la Administración Pública de su entidad federativa que tuvieron como uso principal el apoyo a dichas funciones, hayan pertenecido o no a instituciones cuya función principal reportada en la pregunta 1 fue "Salud".<br>
                                    <li class="fas fa-caret-right"></li> La cantidad registrada en la opción "Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones de salud" debe ser igual o menor a la suma de las cantidades reportadas como respuesta en la columna "Total" de la pregunta 24, así como corresponder a su desagregación por tipo de función principal de la institución de referencia.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoInmueblesP28" class="text-danger d-none">
                                    Total de bienes inmuebles: <span id="infoTotalInmueblesP28" class="pr-5"></span>
                                    Propios: <span id="infoTotalPropiosP28" class="pr-5"></span>
                                    Rentados: <span id="infoTotalRentadosP28" class="pr-5"></span>
                                    Otro: <span id="infoTotalOtroP28"></span>
                                </h6>
                                <form id="formPregunta28" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="5">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="10">Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones de salud (1. + 2.)</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td colspan="4"></td>
                                                <td colspan="2">
                                                    <input id="txtTotalInmueblesP28" type="number" value="0" min="0" class="form-control text-center w-100" required readonly>
                                                </td>
                                                <td colspan="4"></td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td colspan="5">1. Bienes inmuebles registrados por instituciones con función principal "Salud" (1.1 + 1.2 + 1.3 + 1.4 + 1.5)</td>
                                                <td colspan="5">2. Bienes inmuebles registrados por instituciones con otro tipo de función principal (2.1 + 2.2 + 2.3 + 2.4 + 2.5)</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td colspan="2"></td>
                                                <td colspan="1">
                                                    <input id="txtTotalInmuebles1P28" type="number" value="0" min="0" class="form-control text-center w-100" required readonly>
                                                </td>
                                                <td colspan="2"></td>
                                                <td colspan="2"></td>
                                                <td colspan="1">
                                                    <input id="txtTotalInmuebles2P28" type="number" value="0" min="0" class="form-control text-center w-100" required readonly>
                                                </td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5">1.1 Bienes inmuebles usados como clínicas</td>
                                                <td class="text-center font-weight-bold px-5">1.2 Bienes inmuebles usados como centros de salud</td>
                                                <td class="text-center font-weight-bold px-5">1.3 Bienes inmuebles usados como hospitales</td>
                                                <td class="text-center font-weight-bold px-5">1.4 Bienes inmuebles usados para otro tipo de apoyo a funciones de salud</td>
                                                <td class="text-center font-weight-bold px-5">1.5 Bienes inmuebles usados de forma mixta</td>

                                                <td class="text-center font-weight-bold px-5">2.1 Bienes inmuebles usados como clínicas</td>
                                                <td class="text-center font-weight-bold px-5">2.2 Bienes inmuebles usados como centros de salud</td>
                                                <td class="text-center font-weight-bold px-5">2.3 Bienes inmuebles usados como hospitales</td>
                                                <td class="text-center font-weight-bold px-5">2.4 Bienes inmuebles usados para otro tipo de apoyo a funciones de salud</td>
                                                <td class="text-center font-weight-bold px-5">2.5 Bienes inmuebles usados de forma mixta</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP28" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x1P28" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x2P28" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x3P28" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x4P28" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x5P28" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x1P28" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x2P28" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x3P28" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x4P28" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x5P28" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtraFuncionEspecificoP28" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el otro tipo de función de salud</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="otraFuncionEspecificoP28">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP28"></textarea>
                                                        <label for="txtComentarioGeneralP28">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 28</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta29s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.1 Bienes inmuebles</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">29.- </span>
                                A partir de la información que reportó como respuesta en la pregunta 24, señale si se contabilizaron bienes inmuebles cuyo uso principal fue la realización de activación física, cultura física y/o deporte.
                            </label>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta29" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold w-50">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold">¿Se contabilizaron bienes inmuebles cuyo uso principal fue la realización de activación física, cultura física y/o deporte?</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP29" type="text" class="form-control w-100" required readonly>
                                                </td>
                                                <td>
                                                    <select id="selectRealizacionDeporteP29" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP29"></textarea>
                                                        <label for="txtComentarioGeneralP29">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 29</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta30s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.1 Bienes inmuebles</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase front-weight-bold h5">30.-</span>
                                De acuerdo con el total de bienes inmuebles que reportó como respuesta en la pregunta 24, anote la cantidad de los mismos que tuvieron como uso principal la realización de activación física, cultura física y/o deporte. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP30S1" role="button" aria-expanded="false" aria-controls="collapseP30S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP30S1">
                                <small class="text-justify">
                                    <li class="fas fa-caret-right"></li> Para el "Total de bienes inmuebles que tuvieron como uso principal la realización de activación física, cultura física y/o deporte" debe considerar los bienes inmuebles de las instituciones de la Administración Pública de su entidad federativa que tuvieron como uso principal la realización de dichas actividades, hayan pertenecido o no a instituciones cuya función principal reportada en la pregunta 1 fue "Cultura física y/o deporte".<br>
                                    <li class="fas fa-caret-right"></li> La cantidad registrada en la opción "Total de bienes inmuebles que tuvieron como uso principal la realización de activación física, cultura física y deporte" debe ser igual o menor a la suma de las cantidades reportadas como respuesta en la columna "Total" de la pregunta 24, así como corresponder a su desagregación por tipo de función principal de la institución de referencia.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoInmueblesP30" class="text-danger d-none">
                                    Total de bienes inmuebles: <span id="infoTotalInmueblesP30" class="pr-5"></span>
                                    Propios: <span id="infoTotalPropiosP30" class="pr-5"></span>
                                    Rentados: <span id="infoTotalRentadosP30" class="pr-5"></span>
                                    Otro: <span id="infoTotalOtroP30"></span>
                                </h6>
                                <form id="formPregunta30" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="5">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="14">Total de bienes inmuebles que tuvieron como uso principal la realización de activación física, cultura física y/o deporte (1. + 2.)</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td colspan="6"></td>
                                                <td colspan="2">
                                                    <input id="txtTotalInmueblesP30" type="number" value="0" min="0" class="form-control text-center w-100" required readonly>
                                                </td>
                                                <td colspan="6"></td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td colspan="7">1. Bienes inmuebles registrados por instituciones con función principal "Cultura física y/o deporte" (1.1 + 1.2 + 1.3 + 1.4 + 1.5 + 1.6 + 1.7)</td>
                                                <td colspan="7">2. Bienes inmuebles registrados por instituciones con otro tipo de función principal (2.1 + 2.2 + 2.3 + 2.4 + 2.5 + 2.6 + 2.7)</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td colspan="3"></td>
                                                <td colspan="1">
                                                    <input id="txtTotalInmuebles1P30" type="number" value="0" min="0" class="form-control text-center w-100" required readonly>
                                                </td>
                                                <td colspan="3"></td>
                                                <td colspan="3"></td>
                                                <td colspan="1">
                                                    <input id="txtTotalInmuebles2P30" type="number" value="0" min="0" class="form-control text-center w-100" required readonly>
                                                </td>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5">1.1 Bienes inmuebles destinados a la realización de actividades físicas y/o activación física</td>
                                                <td class="text-center font-weight-bold px-5">1.2 Bienes inmuebles destinados a la realización de recreación física</td>
                                                <td class="text-center font-weight-bold px-5">1.3 Bienes inmuebles destinados a la realización de deporte y/o deporte social</td>
                                                <td class="text-center font-weight-bold px-5">1.4 Bienes inmuebles destinados a la realización de deporte de rendimiento y/o deporte de alto rendimiento</td>
                                                <td class="text-center font-weight-bold px-5">1.5 Bienes inmuebles destinados a la realización de eventos deportivos, eventos deportivos masivos y/o eventos deportivos con fines de espectáculo</td>
                                                <td class="text-center font-weight-bold px-5">1.6 Bienes inmuebles destinados a otro tipo de actividades de activación física, cultura física y deporte</td>
                                                <td class="text-center font-weight-bold px-5">1.7 Bienes inmuebles destinados indistintamente a las funciones establecidas con anterioridad</td>
                                                <td class="text-center font-weight-bold px-5">2.1 Bienes inmuebles destinados a la realización de actividades físicas y/o activación física</td>
                                                <td class="text-center font-weight-bold px-5">2.2 Bienes inmuebles destinados a la realización de recreación física</td>
                                                <td class="text-center font-weight-bold px-5">2.3 Bienes inmuebles destinados a la realización de deporte y/o deporte social</td>
                                                <td class="text-center font-weight-bold px-5">2.4 Bienes inmuebles destinados a la realización de deporte de rendimiento y/o deporte de alto rendimiento</td>
                                                <td class="text-center font-weight-bold px-5">2.5 Bienes inmuebles destinados a la realización de eventos deportivos, eventos deportivos masivos y/o eventos deportivos con fines de espectáculo</td>
                                                <td class="text-center font-weight-bold px-5">2.6 Bienes inmuebles destinados a otro tipo de actividades de activación física, cultura física y deporte</td>
                                                <td class="text-center font-weight-bold px-5">2.7 Bienes inmuebles destinados indistintamente a las funciones establecidas con anterioridad</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP30" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x1P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x2P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x3P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x4P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x5P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x6P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x7P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x1P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x2P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x3P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x4P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x5P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x6P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x7P30" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtraFuncionEspecificaP30" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el otro tipo de actividades de activación física, cultura física y/o deporte</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="otraFuncionEspecificaP30">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP30"></textarea>
                                                        <label for="txtComentarioGeneralP30">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 30</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta31s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.2 Parque vehicular</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">31.- </span>
                                Anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de vehículos en funcionamiento con los que contaba al cierre del año 2020, según tipo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP31S1" role="button" aria-expanded="false" aria-controls="collapseP31S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP31S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1. <br>
                                    <i class="fas fa-caret-right"></i> No debe considerar los vehículos que se encontraban fuera de servicio, o bien, no habían sido asignados para su uso u operación al cierre del año 2020.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta31" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="2">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="8">Vehículos en funcionamiento, según tipo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5">Total</td>
                                                <td class="text-center font-weight-bold px-5">Automóviles</td>
                                                <td class="text-center font-weight-bold px-5">Camiones y camionetas</td>
                                                <td class="text-center font-weight-bold px-5">Motocicletas</td>
                                                <td class="text-center font-weight-bold px-5">Bicicletas</td>
                                                <td class="text-center font-weight-bold px-5">Helicópteros</td>
                                                <td class="text-center font-weight-bold px-5">Drones</td>
                                                <td class="text-center font-weight-bold px-5">Otro tipo de vehículos</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP31" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalGeneralP31" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalAutomovilesP31" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalCamionesCamionetasP31" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMotocicletasP31" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalBicicletasP31" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHelicopterosP31" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalDronesP31" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalOtrosP31" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtroEspecificoP31" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el otro tipo de vehículo</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="otroEspecificoP31">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP31"></textarea>
                                                        <label for="txtComentarioGeneralP31">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 31</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta32s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.3 Líneas y aparatos telefónicos</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">32.- </span>
                                Anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de líneas telefónicas y aparatos telefónicos en funcionamiento con los que contaba al cierre del año 2020, según tipo. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP32S1" role="button" aria-expanded="false" aria-controls="collapseP32S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP32S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.<br>
                                    <i class="fas fa-caret-right"></i> No debe considerar los aparatos telefónicos que se encontraban fuera de servicio, o bien, no habían sido asignados para su uso u operación al cierre del año 2020.<br>
                                    <i class="fas fa-caret-right"></i> No debe considerar aparatos que tenían como único uso la radiocomunicación, o bien, números y aparatos que únicamente tienen función para enviar y recibir mensajes, u otro de características similares.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta32" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="2">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="3">Líneas telefónicas en funcionamiento, según tipo</td>
                                                <td class="text-center font-weight-bold" colspan="3">Aparatos telefónicos en funcionamiento, según tipo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5">Total</td>
                                                <td class="text-center px-5">Fijas</td>
                                                <td class="text-center px-5">Móviles</td>
                                                <td class="text-center font-weight-bold px-5">Total</td>
                                                <td class="text-center px-5">Fijos</td>
                                                <td class="text-center px-5">Móviles</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP32" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalLineasP32" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalLineasFijasP32" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalLineasMovilesP32" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalAparatosP32" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalAparatosFijosP32" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalAparatosMovilesP32" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP32"></textarea>
                                                        <label for="txtComentarioGeneralP32">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 32</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta33s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.4 Equipo informático</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">33.- </span>
                                Anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de computadoras e impresoras, según tipo, así como de multifuncionales, servidores y tabletas electrónicas con los que contaba al cierre del año 2020. Asimismo, indique si durante el referido año contó con servicios de conexión remota. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP33S1" role="button" aria-expanded="false" aria-controls="collapseP33S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP33S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.<br>
                                    <i class="fas fa-caret-right"></i> No debe considerar el equipo informático que se encontraba fuera de servicio, o bien, no había sido asignado para su uso u operación al cierre del año 2020.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta33" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="2">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="6">Computadoras, según tipo</td>
                                                <td class="text-center font-weight-bold" colspan="6">Impresoras, según tipo</td>
                                                <td class="text-center font-weight-bold" rowspan="2">Multifuncionales</td>
                                                <td class="text-center font-weight-bold" rowspan="2">Servidores</td>
                                                <td class="text-center font-weight-bold" rowspan="2">Tabletas electrónicas</td>
                                                <td class="text-center font-weight-bold px-5" rowspan="2">¿Contó con servicios de conexión remota?</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold px-5" colspan="2">Total</td>
                                                <td class="text-center px-5" colspan="2">Personales <small>(de escritorio)</small></td>
                                                <td class="text-center px-5" colspan="2">Portátiles</td>
                                                <td class="text-center font-weight-bold px-5" colspan="2">Total</td>
                                                <td class="text-center px-5" colspan="2">Para uso personal</td>
                                                <td class="text-center px-5" colspan="2">Para uso compartido</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP33" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td colspan="2">
                                                    <input id="txtTotalComputadorasP33" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td colspan="2">
                                                    <input id="txtTotalComputadoraPersonalP33" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td colspan="2">
                                                    <input id="txtTotalComputadoraPortatilP33" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td colspan="2">
                                                    <input id="txtTotalImpresorasP33" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td colspan="2">
                                                    <input id="txtTotalImpresoraPersonalP33" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td colspan="2">
                                                    <input id="txtTotalImpresoraCompartidaP33" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMultifuncionalesP33" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalServidoresP33" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalTabletasP33" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <select id="selectConexionRemotaP33" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Sí</option>
                                                        <option value="2">2.- No</option>
                                                        <option value="9">9.- No se sabe</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorConexionRemotaEspecificoP33" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique porque no o no sabe si contó con servicios de conexión remota</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="conexionRemotaEspecificoP33">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP33"></textarea>
                                                        <label for="txtComentarioGeneralP33">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 33</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta34s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.4 Equipo informático</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">34.- </span>
                                A partir de la información que reportó como respuesta en la pregunta anterior, señale si se contabilizaron computadoras, impresoras,multifuncionales, servidores y tabletas electrónicas asignadas a profesores y estudiantes exclusivamente para ser utilizadas con fines educativos y de enseñanza.
                            </label>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta34" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold w-50">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold">¿Se contabilizaron computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas asignadas a profesores y estudiantes exclusivamente para ser utilizadas con fines educativos y de enseñanza?</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP34" type="text" class="form-control w-100" required readonly>
                                                </td>
                                                <td>
                                                    <select id="selectSeContabilizaronP34" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1.- Sí</option>
                                                        <option value="2">2.- No</option>
                                                        <option value="9">9.- No se sabe</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP34"></textarea>
                                                        <label for="txtComentarioGeneralP34">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 34</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta35s1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I.4 Recursos materiales</h5>
                            <h6 class="text-primary">I.4.4 Equipo informático</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">35.- </span>
                                De acuerdo con el total de computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas que reportó como respuesta en la pregunta 33, anote la cantidad de las mismas que se asignaron exclusivamente para ser utilizadas con fines educativos y de enseñanza. <a class="text-warning" data-bs-toggle="collapse" href="#collapseP35S1" role="button" aria-expanded="false" aria-controls="collapseP35S1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP35S1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> El total de computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas utilizadas con fines educativos y de enseñanza debe considerar aquellas que tuvieron como uso dichas funciones, hayan pertenecido o no a instituciones cuya función principal reportada en la pregunta 1 fue "Educación".<br>
                                    <i class="fas fa-caret-right"></i> La cantidad registrada en el recuadro "Total de computadoras utilizadas exclusivamente con fines educativos y de enseñanza" debe ser igual o menor a la suma de las cantidades reportadas como respuesta en la columna "Total" de "Computadoras" de la pregunta 33, así como corresponder a su desagregación por tipo de función principal de la institución de referencia.<br>
                                    <i class="fas fa-caret-right"></i> La cantidad registrada en el recuadro "Total de impresoras utilizadas exclusivamente con fines educativos y de enseñanza" debe ser igual o menor a la suma de las cantidades reportadas como respuesta en la columna "Total" de "Impresoras" de la pregunta 33, así como corresponder a su desagregación por tipo de función principal de la institución de referencia.<br>
                                    <i class="fas fa-caret-right"></i> La cantidad registrada en el recuadro "Total de multifuncionales utilizadas exclusivamente con fines educativos y de enseñanza" debe ser igual o menor a la suma de las cantidades reportadas como respuesta en la columna "Multifuncionales" de la pregunta 33, así como corresponder a su desagregación por tipo de función principal de la institución de referencia.<br>
                                    <i class="fas fa-caret-right"></i> La cantidad registrada en la opción "Total de servidores utilizados exclusivamente con fines educativos y de enseñanza" debe ser igual o menor a la suma de las cantidades reportadas como respuesta en la columna "Servidores" de la pregunta 33, así como corresponder a su desagregación por tipo de función principal de la institución de referencia.<br>
                                    <i class="fas fa-caret-right"></i> La cantidad registrada en la opción "Total de tabletas electrónicas utilizadas exclusivamente con fines educativos y de enseñanza" debe ser igual o menor a la suma de las cantidades reportadas como respuesta en la columna "Tabletas electrónicas" de la pregunta 33, así como corresponder a su desagregación por tipo de función principal de la institución de referencia.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoEquipoInformaticoP35" class="text-danger d-none">
                                    Computadoras: <span id="infoTotalComputadorasP35" class="pr-5"></span>
                                    Impresoras: <span id="infoTotalImpresorasP35" class="pr-5"></span>
                                    Multifuncionales: <span id="infoTotalMultifuncionalesP35" class="pr-5"></span>
                                    Servidores: <span id="infoTotalServidoresP35" class="pr-5"></span>
                                    Tabletas: <span id="infoTotalTabletasP35"></span>
                                </h6>
                                <form id="formPregunta35" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="3">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="2">1. Total de computadoras utilizadas exclusivamente con fines educativos y de enseñanza (1.1 + 1.2)</td>
                                                <td class="text-center font-weight-bold" colspan="2">2. Total de impresoras utilizadas exclusivamente con fines educativos y de enseñanza (2.1 + 2.2)</td>
                                                <td class="text-center font-weight-bold" colspan="2">3. Total de multifuncionales utilizados exclusivamente con fines educativos y de enseñanza (3.1 + 3.2)</td>
                                                <td class="text-center font-weight-bold" colspan="2">4. Total de servidores utilizados exclusivamente con fines educativos y de enseñanza (4.1 + 4.2)</td>
                                                <td class="text-center font-weight-bold" colspan="2">5. Total de tabletas electrónicas utilizadas exclusivamente con fines educativos y de enseñanza (5.1 + 5.2)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input id="txtTotal1P35" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td colspan="2">
                                                    <input id="txtTotal2P35" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td colspan="2">
                                                    <input id="txtTotal3P35" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td colspan="2">
                                                    <input id="txtTotal4P35" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td colspan="2">
                                                    <input id="txtTotal5P35" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center px-5">1.1 Registradas por instituciones con función principal "Educación"</td>
                                                <td class="text-center px-5">1.2 Registradas por instituciones con otro tipo de función principal</td>
                                                <td class="text-center px-5">2.1 Registradas por instituciones con función principal "Educación"</td>
                                                <td class="text-center px-5">2.2 Registradas por instituciones con otro tipo de función principal</td>
                                                <td class="text-center px-5">3.1 Registradas por instituciones con función principal "Educación"</td>
                                                <td class="text-center px-5">3.2 Registradas por instituciones con otro tipo de función principal</td>
                                                <td class="text-center px-5">4.1 Registrados por instituciones con función principal "Educación básica"</td>
                                                <td class="text-center px-5">4.2 Registrados por instituciones con otro tipo de función principal</td>
                                                <td class="text-center px-5">5.1 Registrados por instituciones con función principal "Educación básica"</td>
                                                <td class="text-center px-5">5.2 Registrados por instituciones con otro tipo de función principal</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionP35" type="text" class="form-control w-auto" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x1P35" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal1x2P35" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x1P35" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal2x2P35" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal3x1P35" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal3x2P35" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal4x1P35" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal4x2P35" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal5x1P35" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotal5x2P35" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtraFuncionEspecificaP35" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Especifique el otro tipo de función educativa</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="..." id="txtOtraFuncionEspecificaP35">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP35"></textarea>
                                                        <label for="txtComentarioGeneralP35">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 35</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="complementoS1" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">I. Estructura organizacional y recursos</h5>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h6">Complemento.- </span>
                                Personal fallecido por COVID-19 adscrito a las instituciones de la Administración Pública de la entidad federativa. <a class="text-warning" data-bs-toggle="collapse" href="#collapseComplementoS1" role="button" aria-expanded="false" aria-controls="collapseComplementoS1">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseComplementoS1">
                                <small class="text-justify">
                                    <i class="fas fa-caret-right"></i> La lista de instituciones que se despliega corresponde a las que reportó como respuesta en la pregunta 1.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoPersonalComplementoS1" class="text-danger d-none">
                                    Total de personal: <span id="infoTotalPersonalComplementoS1" class="pr-5"></span>
                                    Hombres: <span id="infoTotalHombresComplementoS1" class="pr-5"></span>
                                    Mujeres: <span id="infoTotalMujeresComplementoS1"></span>
                                </h6>
                                <form id="formComplementoS1" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold" rowspan="2">Nombre de las instituciones</td>
                                                <td class="text-center font-weight-bold" colspan="3">Personal fallecido por COVID-19 adscrito a las instituciones de la Administración Pública de la entidad federativa, según sexo</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold">Total</td>
                                                <td class="text-center">Hombres</td>
                                                <td class="text-center">Mujeres</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input id="txtInstitucionComplementoS1" type="text" class="form-control" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalPersonalComplementoS1" type="number" class="form-control text-center" value="0" min="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalHombresComplementoS1" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtTotalMujeresComplementoS1" type="number" class="form-control text-center" value="0" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralComplementoS1"></textarea>
                                                        <label for="txtComentarioGeneralComplementoS1">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar complemento</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta1s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.1 Elementos y mecanismos institucionales para las contrataciones públicas</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">1.- </span>
                                Indique, por cada uno de los tipos de materia, si al cierre del año 2020 su entidad federativa contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Púbica Estatal. En caso afirmativo, anote el nombre de dicha(s) disposición(es).
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP1S12" role="button" aria-expanded="false" aria-controls="collapseP1S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP1S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> Para cada tipo de materia, en caso de que su entidad federativa no haya contado con alguna disposición normativa para la regulación de las contrataciones públicas de la Administración Pública Estatal, o no cuente con información para determinarlo, indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta1s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle" colspan="7" width="32%">Tipo de materia</td>
                                                <td class="text-justify font-weight-bold" colspan="4">¿Su entidad federativa contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal?
                                                    <span class="d-flex justify-content-center">(1. Sí / 2. No / 9. No se sabe)</span>
                                                </td>
                                                <td class="text-center font-weight-bold align-middle" colspan="6" width="37%">Nombre de la disposición normativa</td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">1</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Adquisiciones, arrendamientos y servicios</td>
                                                <td colspan="4" class="px-4 align-middle">
                                                    <select id="selectDisposicionNormativa1s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td colspan="12">
                                                    <textarea class="form-control" placeholder="Nombre de la disposición.." id="txtNombreNormativa1s12"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">2</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Obra pública y servicios relacionados con la misma</td>
                                                <td colspan="4" class="px-4 align-middle">
                                                    <select id="selectDisposicionNormativa2s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td colspan="12">
                                                    <textarea class="form-control" placeholder="Nombre de la disposición.." id="txtNombreNormativa2s12"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP1s12"></textarea>
                                                        <label for="txtComentarioGeneralP1s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 1</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta2s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.1 Elementos y mecanismos institucionales para las contrataciones públicas</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">2.- </span>
                                Indique, por cada uno de los tipos de materia, los procedimientos de contratación contemplados al cierre del año 2020 en la disposición normativa que regulaba las contrataciones públicas de la Administración Pública de su entidad federativa.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP2S12" role="button" aria-expanded="false" aria-controls="collapseP2S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP2S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> Para cada tipo de materia, en caso de que haya seleccionado el código "2" o "9" en la columna "¿Su entidad federativa contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal?" de la pregunta anterior, anote una "X" en la columna "No aplica" y deje el resto de la fila en blanco.<br>
                                    Para cada tipo de materia, seleccione con una "X" el o los procedimientos de contratación contemplados.<br>
                                    En caso de que seleccione la columna "Otro procedimiento", debe anotar el nombre de dicho(s) procedimiento(s) en el recuadro destinado para tal efecto que se encuentra al final de la tabla de respuesta.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta2s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle" colspan="7" rowspan="2" width="30%">Tipo de materia</td>
                                                <td class="text-center font-weight-bold align-middle" colspan="1" rowspan="2" width="10%">No aplica</td>
                                                <td class="text-center font-weight-bold" colspan="6" width="60%">Procedimientos de contratación
                                                </td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle">Adjudicación directa</td>
                                                <td class="text-center font-weight-bold align-middle" width="18%">Invitación a cuando menos tres personas o invitación restringida</td>
                                                <td class="text-center font-weight-bold align-middle">Licitación pública nacional</td>
                                                <td class="text-center font-weight-bold align-middle">Licitación pública internacional</td>
                                                <td class="text-center font-weight-bold align-middle">Otro procedimiento (especifique)</td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">1</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Adquisiciones, arrendamientos y servicios</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplica1P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplica1P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkAdjudicacion1P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkAdjudicacion1P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkInvitacion1P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkInvitacion1P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkLicitacionNacional1P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkLicitacionNacional1P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkLicitacionInternacional1P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkLicitacionInternacional1P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkOtroProcedimiento1P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkOtroProcedimiento1P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">2</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Obra pública y servicios relacionados con la misma</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplica2P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplica2P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkAdjudicacion2P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkAdjudicacion2P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkInvitacion2P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkInvitacion2P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkLicitacionNacional2P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkLicitacionNacional2P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkLicitacionInternacional2P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkLicitacionInternacional2P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkOtroProcedimiento2P2s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkOtroProcedimiento2P2s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtroProcedimiento1P2s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otro procedimiento (Adquisiciones,<br> arrendamientos y servicios):</span>
                                                                </div>
                                                                <textarea class="form-control" placeholder="(Especifique)" id="txtOtroProcedimiento1P2s12"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtroProcedimiento2P2s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otro procedimiento (Obra pública y<br> servicios relacionados con la misma):</span>
                                                                </div>
                                                                <textarea class="form-control" placeholder="(Especifique)" id="txtOtroProcedimiento2P2s12"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP2s12"></textarea>
                                                        <label for="txtComentarioGeneralP2s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 2</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta3s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.1 Elementos y mecanismos institucionales para las contrataciones públicas</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">3.- </span>
                                Indique, por cada uno de los tipos de materia, si al cierre del año 2020 la disposición normativa que regulaba las contrataciones públicas de la Administración Pública de su entidad federativa contaba con mecanismos de salvaguarda institucional. En caso afirmativo, señale los mecanismos de salvaguarda contemplados al cierre del referido año, utilizando para tal efecto el catálogo correspondiente.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP3S12" role="button" aria-expanded="false" aria-controls="collapseP3S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP3S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> Para cada tipo de materia, en caso de que haya seleccionado el código "2" o "9" en la columna "¿Su entidad federativa contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal?" de la pregunta 1, anote una "X" en la columna "No aplica" y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-cubes"></i> En caso de que la disposición normativa que regulaba las contrataciones públicas en determinada materia no haya contado con mecanismos de salvaguarda institucional, o no cuente con información para determinarlo, indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-cubes"></i> Para cada tipo de materia, seleccione con una "X" el o los mecanismos de salvaguarda institucional que corresponda.<br>
                                    <i class="fas fa-cubes"></i> En caso de que seleccione el código "16", debe anotar el nombre de dicho(s) mecanismo(s) de salvaguarda institucional en el recuadro destinado para tal efecto que se encuentra al final de la tabla de respuesta.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta3s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle" colspan="7" rowspan="2">Tipo de materia</td>
                                                <td class="text-center font-weight-bold align-middle" colspan="1" rowspan="2">No aplica</td>
                                                <td class="text-center font-weight-bold align-middle" colspan="1" rowspan="2">¿Contaba con mecanismos de salvaguarda institucional?
                                                    <span class="d-flex justify-content-center">(1. Sí / 2. No / 9. No se sabe)</span>
                                                </td>
                                                <td class="text-center font-weight-bold align-middle" colspan="16">Mecanismos de salvaguarda institucional(ver catálogo)</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle">1</td>
                                                <td class="text-center font-weight-bold align-middle">2</td>
                                                <td class="text-center font-weight-bold align-middle">3</td>
                                                <td class="text-center font-weight-bold align-middle">4</td>
                                                <td class="text-center font-weight-bold align-middle">5</td>
                                                <td class="text-center font-weight-bold align-middle">6</td>
                                                <td class="text-center font-weight-bold align-middle">7</td>
                                                <td class="text-center font-weight-bold align-middle">8</td>
                                                <td class="text-center font-weight-bold align-middle">9</td>
                                                <td class="text-center font-weight-bold align-middle">10</td>
                                                <td class="text-center font-weight-bold align-middle">11</td>
                                                <td class="text-center font-weight-bold align-middle">12</td>
                                                <td class="text-center font-weight-bold align-middle">13</td>
                                                <td class="text-center font-weight-bold align-middle">14</td>
                                                <td class="text-center font-weight-bold align-middle">15</td>
                                                <td class="text-center font-weight-bold align-middle">16</td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">1</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Adquisiciones, arrendamientos y servicios</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplica1P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplica1P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select id="selectContabaMecanismo1P3s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo11P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo11P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo21P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo21P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo31P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo31P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo41P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo41P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo51P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo51P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo61P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo61P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo71P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo71P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo81P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo81P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo91P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo91P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo101P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo101P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo111P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo111P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo121P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo121P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo131P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo131P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo141P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo141P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo151P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo151P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo161P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo161P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">2</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Obra pública y servicios relacionados con la misma</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplica2P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplica2P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select id="selectContabaMecanismo2P3s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo12P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo12P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo22P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo22P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo32P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo32P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo42P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo42P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo52P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo52P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo62P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo62P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo72P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo72P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo82P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo82P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo92P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo92P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo102P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo102P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo112P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo112P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo122P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo122P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo132P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo132P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo142P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo142P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo152P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo152P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkMecanismo162P3s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkMecanismo162P3s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtroMecanismo1P3s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otro mecanismo de salvaguarda institucional (Adquisiciones,<br> arrendamientos y servicios):</span>
                                                                </div>
                                                                <textarea class="form-control" placeholder="(Especifique)" id="txtOtroMecanismo1P3s12"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtroMecanismo2P3s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otro mecanismo de salvaguarda institucional (Obra pública y<br> servicios relacionados con la misma):</span>
                                                                </div>
                                                                <textarea class="form-control" placeholder="(Especifique)" id="txtOtroMecanismo2P3s12"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP3s12"></textarea>
                                                        <label for="txtComentarioGeneralP3s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 3</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta4s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.1 Elementos y mecanismos institucionales para las contrataciones públicas</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">4.- </span>
                                Indique si actualmente la Administración Pública de su entidad federativa cuenta con un sistema electrónico de contrataciones públicas. En caso afirmativo, especifique el lugar donde se encuentra disponible o, en su defecto, la no disponibilidad del mismo.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP4S12" role="button" aria-expanded="false" aria-controls="collapseP4S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP4S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> En caso de que la Administración Pública de su entidad federativa no cuente con un sistema electrónico de contrataciones públicas, o se encuentre en proceso de integración, o no cuente con información para determinarlo, indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-cubes"></i> En caso de que la Administración Pública de su entidad federativa cuente con un sistema electrónico de contrataciones públicas, pero este no se encuentre disponible en línea, en la columna "Sitio donde se encuentra disponible el sistema electrónico de contrataciones públicas (URL)" anote "NA" (No aplica).
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta4s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-justify font-weight-bold">¿La Administración Pública de su entidad federativa cuenta con un sistema electrónico de contrataciones públicas?
                                                    <span class="d-flex justify-content-center">(1. Sí / 2. En proceso de integración / 3. No / 9. No se sabe)</span>
                                                </td>
                                                <td class="text-center font-weight-bold align-middle" width="50%">Sitio donde se encuentra disponible el sistema electrónico de contrataciones públicas (URL):</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 align-middle">
                                                    <select id="selectCuentaSistema4s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">En proceso de integración</option>
                                                        <option value="3">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" placeholder="https://direccion" id="txtDireccionWeb4s12"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP4s12"></textarea>
                                                        <label for="txtComentarioGeneralP4s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 4</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta5s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.1 Elementos y mecanismos institucionales para las contrataciones públicas</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">5.- </span>
                                Señale las etapas de los procedimientos de contratación registradas en el sistema electrónico de contrataciones públicas de la Administración Pública de su entidad federativa.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP5S12" role="button" aria-expanded="false" aria-controls="collapseP5S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP5S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> En caso de haber seleccionado el código "2", "3" o "9" en la columna "¿La Administración Pública de su entidad federativa cuenta con un sistema electrónico de contrataciones públicas?" de la pregunta anterior, no puede contestar este reactivo.<br>
                                    <i class="fas fa-cubes"></i> Seleccione con una "X" el o los códigos que correspondan.<br>
                                    <i class="fas fa-cubes"></i> En caso de seleccionar el código "9" no puede seleccionar otro código.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta5s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr class="small">
                                                <td class="text-center font-weight-bold align-middle">1. Convocatoria pública e invitación</td>
                                                <td class="text-center font-weight-bold align-middle">2. Junta de aclaraciones</td>
                                                <td class="text-center font-weight-bold align-middle">3. Acto de presentación y apertura de proposiciones</td>
                                                <td class="text-center font-weight-bold align-middle">4. Declaración de licitación desierta</td>
                                                <td class="text-center font-weight-bold align-middle">5. Cancelación</td>
                                                <td class="text-center font-weight-bold align-middle">6. Emisión del fallo y adjudicación</td>
                                                <td class="text-center font-weight-bold align-middle">7. Contratación</td>
                                                <td class="text-center font-weight-bold align-middle">8. Otra etapa (especifique)</td>
                                                <td class="text-center font-weight-bold align-middle" width="10%">9. No se sabe</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEtapaProcedimiento1P5s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEtapaProcedimiento1P5s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEtapaProcedimiento2P5s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEtapaProcedimiento2P5s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEtapaProcedimiento3P5s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEtapaProcedimiento3P5s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEtapaProcedimiento4P5s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEtapaProcedimiento4P5s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEtapaProcedimiento5P5s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEtapaProcedimiento5P5s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEtapaProcedimiento6P5s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEtapaProcedimiento6P5s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEtapaProcedimiento7P5s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEtapaProcedimiento7P5s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEtapaProcedimiento8P5s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEtapaProcedimiento8P5s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkEtapaProcedimiento9P5s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkEtapaProcedimiento9P5s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtroProcedimientoP5s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Etapa de Procedimiento:</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputEtapaProcedimientoP5s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP5s12"></textarea>
                                                        <label for="txtComentarioGeneralP5s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 5</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta6s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.2 Sistemas de información</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">6.- </span>
                                Indique, por cada uno de los sistemas de información listados, si la Administración Pública de su entidad federativa contaba con él al cierre del año 2020. En caso afirmativo, señale el tipo de formato en el que se encontraba y la frecuencia de la actualización de la información contenida, utilizando para tal efecto los catálogos que se presentan al final de la siguiente tabla. Asimismo, anote la cantidad de proveedores, proveedores sancionados, contratistas, contratistas sancionados, testigos sociales y servidores públicos, según corresponda, registrados en cada uno de dichos sistemas.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP6S12" role="button" aria-expanded="false" aria-controls="collapseP6S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP6S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> En caso de que la Administración Pública de su entidad federativa no haya contado con determinado sistema, o no cuente con información para determinarlo, indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-cubes"></i> En caso de que seleccione el código "4" en la columna "Tipo de formato", debe anotar el nombre de dicho(s) tipo(s) de formato(s) en el recuadro destinado para tal efecto que se encuentra al final de la tabla de respuesta.<br>
                                    <i class="fas fa-cubes"></i> En caso de que seleccione el código "11" en la columna "Frecuencia de actualización de la información", debe anotar dicha(s) frecuencia(s) de actualización en el recuadro destinado para tal efecto que se encuentra al final de la tabla de respuesta.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta6s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle" colspan="7" width="25%">Tipo de sistemas</td>
                                                <td class="text-justify font-weight-bold" colspan="4" width="22%">¿La Administración Pública de su entidad federativa contaba con el sistema?
                                                    <span class="d-flex justify-content-center">(1. Sí / 2. No / 9. No se sabe)</span>
                                                </td>
                                                <td class="text-center font-weight-bold align-middle" width="18%">Tipo de formato(ver catálogo)</td>
                                                <td class="text-center font-weight-bold align-middle" width="20%">Frecuencia de actualización de la información(ver catálogo)</td>
                                                <td class="text-center font-weight-bold align-middle" colspan="6" width="15%">Cantidad registrada</td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">1</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Sistema de proveedores</td>
                                                <td colspan="4" class="px-3 align-middle">
                                                    <select id="selectContabaSistema16s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectTipoFormato16s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Libro o bitácora(papel)</option>
                                                        <option value="2">2. Hoja de cálculo</option>
                                                        <option value="3">3. Aplicación informática</option>
                                                        <option value="4">4. Otro formato(especifique)</option>
                                                        <option value="9">9. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectFrecuenciaActualizacion16s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Diario</option>
                                                        <option value="2">2. Semanal</option>
                                                        <option value="3">3. Quincenal</option>
                                                        <option value="4">4. Mensual</option>
                                                        <option value="5">5. Bimestral</option>
                                                        <option value="6">6. Trimestral</option>
                                                        <option value="7">7. Cuatrimestral</option>
                                                        <option value="8">8. Semestral</option>
                                                        <option value="9">9. Anual</option>
                                                        <option value="10">10. Periodos mayores a un año</option>
                                                        <option value="11">11. Otra frecuencia de actualización(especifique)</option>
                                                        <option value="99">99. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-4 align-middle">
                                                    <input id="txtCantidadRegistrada16s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">2</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Sistema de proveedores sancionados</td>
                                                <td colspan="4" class="px-3 align-middle">
                                                    <select id="selectContabaSistema26s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectTipoFormato26s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Libro o bitácora(papel)</option>
                                                        <option value="2">2. Hoja de cálculo</option>
                                                        <option value="3">3. Aplicación informática</option>
                                                        <option value="4">4. Otro formato(especifique)</option>
                                                        <option value="9">9. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectFrecuenciaActualizacion26s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Diario</option>
                                                        <option value="2">2. Semanal</option>
                                                        <option value="3">3. Quincenal</option>
                                                        <option value="4">4. Mensual</option>
                                                        <option value="5">5. Bimestral</option>
                                                        <option value="6">6. Trimestral</option>
                                                        <option value="7">7. Cuatrimestral</option>
                                                        <option value="8">8. Semestral</option>
                                                        <option value="9">9. Anual</option>
                                                        <option value="10">10. Periodos mayores a un año</option>
                                                        <option value="11">11. Otra frecuencia de actualización(especifique)</option>
                                                        <option value="99">99. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-4 align-middle">
                                                    <input id="txtCantidadRegistrada26s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">3</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Sistema de contratistas</td>
                                                <td colspan="4" class="px-3 align-middle">
                                                    <select id="selectContabaSistema36s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectTipoFormato36s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Libro o bitácora(papel)</option>
                                                        <option value="2">2. Hoja de cálculo</option>
                                                        <option value="3">3. Aplicación informática</option>
                                                        <option value="4">4. Otro formato(especifique)</option>
                                                        <option value="9">9. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectFrecuenciaActualizacion36s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Diario</option>
                                                        <option value="2">2. Semanal</option>
                                                        <option value="3">3. Quincenal</option>
                                                        <option value="4">4. Mensual</option>
                                                        <option value="5">5. Bimestral</option>
                                                        <option value="6">6. Trimestral</option>
                                                        <option value="7">7. Cuatrimestral</option>
                                                        <option value="8">8. Semestral</option>
                                                        <option value="9">9. Anual</option>
                                                        <option value="10">10. Periodos mayores a un año</option>
                                                        <option value="11">11. Otra frecuencia de actualización(especifique)</option>
                                                        <option value="99">99. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-4 align-middle">
                                                    <input id="txtCantidadRegistrada36s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">4</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Sistema de contratistas sancionados</td>
                                                <td colspan="4" class="px-3 align-middle">
                                                    <select id="selectContabaSistema46s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectTipoFormato46s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Libro o bitácora(papel)</option>
                                                        <option value="2">2. Hoja de cálculo</option>
                                                        <option value="3">3. Aplicación informática</option>
                                                        <option value="4">4. Otro formato(especifique)</option>
                                                        <option value="9">9. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectFrecuenciaActualizacion46s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Diario</option>
                                                        <option value="2">2. Semanal</option>
                                                        <option value="3">3. Quincenal</option>
                                                        <option value="4">4. Mensual</option>
                                                        <option value="5">5. Bimestral</option>
                                                        <option value="6">6. Trimestral</option>
                                                        <option value="7">7. Cuatrimestral</option>
                                                        <option value="8">8. Semestral</option>
                                                        <option value="9">9. Anual</option>
                                                        <option value="10">10. Periodos mayores a un año</option>
                                                        <option value="11">11. Otra frecuencia de actualización(especifique)</option>
                                                        <option value="99">99. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-4 align-middle">
                                                    <input id="txtCantidadRegistrada46s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">5</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Sistema de testigos sociales</td>
                                                <td colspan="4" class="px-3 align-middle">
                                                    <select id="selectContabaSistema56s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectTipoFormato56s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Libro o bitácora(papel)</option>
                                                        <option value="2">2. Hoja de cálculo</option>
                                                        <option value="3">3. Aplicación informática</option>
                                                        <option value="4">4. Otro formato(especifique)</option>
                                                        <option value="9">9. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectFrecuenciaActualizacion56s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Diario</option>
                                                        <option value="2">2. Semanal</option>
                                                        <option value="3">3. Quincenal</option>
                                                        <option value="4">4. Mensual</option>
                                                        <option value="5">5. Bimestral</option>
                                                        <option value="6">6. Trimestral</option>
                                                        <option value="7">7. Cuatrimestral</option>
                                                        <option value="8">8. Semestral</option>
                                                        <option value="9">9. Anual</option>
                                                        <option value="10">10. Periodos mayores a un año</option>
                                                        <option value="11">11. Otra frecuencia de actualización(especifique)</option>
                                                        <option value="99">99. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-4 align-middle">
                                                    <input id="txtCantidadRegistrada56s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">6</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="6">Sistema de servidores públicos que intervienen en procedimientos de contratación pública</td>
                                                <td colspan="4" class="px-3 align-middle">
                                                    <select id="selectContabaSistema66s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectTipoFormato66s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Libro o bitácora(papel)</option>
                                                        <option value="2">2. Hoja de cálculo</option>
                                                        <option value="3">3. Aplicación informática</option>
                                                        <option value="4">4. Otro formato(especifique)</option>
                                                        <option value="9">9. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-3 align-middle">
                                                    <select id="selectFrecuenciaActualizacion66s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">1. Diario</option>
                                                        <option value="2">2. Semanal</option>
                                                        <option value="3">3. Quincenal</option>
                                                        <option value="4">4. Mensual</option>
                                                        <option value="5">5. Bimestral</option>
                                                        <option value="6">6. Trimestral</option>
                                                        <option value="7">7. Cuatrimestral</option>
                                                        <option value="8">8. Semestral</option>
                                                        <option value="9">9. Anual</option>
                                                        <option value="10">10. Periodos mayores a un año</option>
                                                        <option value="11">11. Otra frecuencia de actualización(especifique)</option>
                                                        <option value="99">99. No se sabe</option>
                                                    </select>
                                                </td>
                                                <td class="px-4 align-middle">
                                                    <input id="txtCantidadRegistrada66s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr id="contenedorOtroFormatoTipo1P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otro Formato(1):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtroFormatoTipo1P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtraFrecuenciaTipo1P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otra frecuencia de actualización(1):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtraFrecuenciaTipo1P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtroFormatoTipo2P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otro Formato(2):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtroFormatoTipo2P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtraFrecuenciaTipo2P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otra frecuencia de actualización(2):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtraFrecuenciaTipo2P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtroFormatoTipo3P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otro Formato(3):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtroFormatoTipo3P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtraFrecuenciaTipo3P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otra frecuencia de actualización(3):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtraFrecuenciaTipo3P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtroFormatoTipo4P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otro Formato(4):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtroFormatoTipo4P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtraFrecuenciaTipo4P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otra frecuencia de actualización(4):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtraFrecuenciaTipo4P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtroFormatoTipo5P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otro Formato(5):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtroFormatoTipo5P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtraFrecuenciaTipo5P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otra frecuencia de actualización(5):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtraFrecuenciaTipo5P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtroFormatoTipo6P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otro Formato(6):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtroFormatoTipo6P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="contenedorOtraFrecuenciaTipo6P6s12" class="d-none">
                                                <td>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-sm mb-1">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Otra frecuencia de actualización(6):</span>
                                                                </div>
                                                                <input class="form-control" placeholder="(Especifique)" id="inputOtraFrecuenciaTipo6P6s12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP6s12"></textarea>
                                                        <label for="txtComentarioGeneralP6s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 6</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta7s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.3 Contratos</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">7.- </span>
                                Anote la cantidad de contratos realizados durante el año 2020 por la Administración Pública de su entidad federativa con proveedores y/o contratistas, según el tipo de procedimiento de contratación.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP7S12" role="button" aria-expanded="false" aria-controls="collapseP7S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP7S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> Para cada tipo de procedimiento de contratación, en caso de que en la pregunta 2 no lo haya seleccionado, anote una "X" en la columna "No aplica" y deje el resto de la fila en blanco.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoContratosP7" class="text-danger d-none">
                                    <u>Total de contratos: <span id="infoTotalContratosP7" class="pr-4"></span></u>
                                    1er Procedimiento: <span id="infoTotalContratos1P7" class="pr-4"></span>
                                    2do Procedimiento: <span id="infoTotalContratos2P7" class="pr-4"></span>
                                    3er Procedimiento: <span id="infoTotalContratos3P7"></span>
                                    <br>
                                    4to Procedimiento: <span id="infoTotalContratos4P7" class="pr-4"></span>
                                    5to Procedimiento: <span id="infoTotalContratos5P7"></span>
                                </h6>
                                <form id="formPregunta7s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle" colspan="3" width="45%">Tipo de procedimiento de contratación</td>
                                                <td class="text-center font-weight-bold align-middle" width="35%">No aplica
                                                </td>
                                                <td class="text-center font-weight-bold align-middle">Contratos realizados</td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">1</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Adjudicación directa</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo1P7s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo1P7s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtContratosRealizadosTipo1P7s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">2</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Invitación a cuando menos tres personas o invitación restringida</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo2P7s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo2P7s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtContratosRealizadosTipo2P7s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">3</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Licitación pública nacional</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo3P7s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo3P7s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtContratosRealizadosTipo3P7s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">4</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Licitación pública internacional</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo4P7s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo4P7s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtContratosRealizadosTipo4P7s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">5</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Otro procedimiento</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo5P7s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo5P7s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtContratosRealizadosTipo5P7s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td>
                                                    <input id="txtTotalContratosProcedimientosP7s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP7s12"></textarea>
                                                        <label for="txtComentarioGeneralP7s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 7</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta8s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.3 Contratos</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">8.- </span>
                                De acuerdo con el total de contratos que reportó como respuesta en la pregunta anterior, anote la cantidad de los mismos especificando el tipo de materia.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP8S12" role="button" aria-expanded="false" aria-controls="collapseP8S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP8S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> Para cada tipo de procedimiento de contratación, en caso de que en la pregunta 2 no lo haya seleccionado, anote una "X" en la columna "No aplica" y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-cubes"></i> La suma de las cantidades registradas en la columna "Total" debe ser igual a la suma de las cantidades reportadas como respuesta en la pregunta anterior, así como corresponder a su desagregación por tipo de procedimiento de contratación.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoContratosP8" class="text-danger d-none">
                                    <u>Total de contratos: <span id="infoTotalContratosP8" class="pr-4"></span></u>
                                    1er Procedimiento: <span id="infoTotalContratos1P8" class="pr-4"></span>
                                    2do Procedimiento: <span id="infoTotalContratos2P8" class="pr-4"></span>
                                    3er Procedimiento: <span id="infoTotalContratos3P8"></span>
                                    <br>
                                    4to Procedimiento: <span id="infoTotalContratos4P8" class="pr-4"></span>
                                    5to Procedimiento: <span id="infoTotalContratos5P8"></span>
                                </h6>
                                <form id="formPregunta8s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle" colspan="3" rowspan="2" width="50%">Tipo de procedimiento de contratación</td>
                                                <td class="text-center font-weight-bold align-middle" rowspan="2" width="20%">No aplica</td>
                                                <td class="text-center font-weight-bold align-middle" colspan="3">Contratos realizados, según tipo de materia</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle">Total</td>
                                                <td class="text-center font-weight-bold align-middle">Adquisiciones, arrendamientos y servicios</td>
                                                <td class="text-center font-weight-bold align-middle">Obra pública y servicios relacionados con la misma</td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">1</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Adjudicación directa</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo1P8s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo1P8s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtTotalContratosTipo1P8s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtContratosAdquisicionesTipo1P8s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtContratosObraPublicaTipo1P8s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">2</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Invitación a cuando menos tres personas o invitación restringida</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo2P8s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo2P8s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtTotalContratosTipo2P8s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtContratosAdquisicionesTipo2P8s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtContratosObraPublicaTipo2P8s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">3</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Licitación pública nacional</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo3P8s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo3P8s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtTotalContratosTipo3P8s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtContratosAdquisicionesTipo3P8s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtContratosObraPublicaTipo3P8s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">4</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Licitación pública internacional</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo4P8s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo4P8s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtTotalContratosTipo4P8s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtContratosAdquisicionesTipo4P8s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtContratosObraPublicaTipo4P8s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">5</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Otro procedimiento</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo5P8s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo5P8s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtTotalContratosTipo5P8s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtContratosAdquisicionesTipo5P8s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtContratosObraPublicaTipo5P8s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td>
                                                    <input id="txtTotalContratosGralP8s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalContratosGralAdquisicionesP8s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtTotalContratosGralObraPublicaP8s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP8s12"></textarea>
                                                        <label for="txtComentarioGeneralP8s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 8</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta9s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.3 Contratos</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">9.- </span>
                                Anote el monto asociado a los contratos realizados durante el año 2020 por la Administración Pública de su entidad federativa con proveedores y/o contratistas, según el tipo de procedimiento de contratación.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP9S12" role="button" aria-expanded="false" aria-controls="collapseP9S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP9S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> Para cada tipo de procedimiento de contratación, en caso de que en la pregunta 2 no lo haya seleccionado, anote una "X" en la columna "No aplica" y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-cubes"></i> Para cada tipo de procedimiento de contratación, la información debe ser consistente con la reportada como respuesta en la pregunta 7.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoMontosP9" class="text-danger d-none">
                                    <u>Monto total: <span id="infoTotalMontosP9" class="pr-4"></span></u>
                                    1er Procedimiento: <span id="infoTotalMontos1P9" class="pr-4"></span>
                                    2do Procedimiento: <span id="infoTotalMontos2P9" class="pr-4"></span>
                                    3er Procedimiento: <span id="infoTotalMontos3P9"></span>
                                    <br>
                                    4to Procedimiento: <span id="infoTotalMontos4P9" class="pr-4"></span>
                                    5to Procedimiento: <span id="infoTotalMontos5P9"></span>
                                </h6>
                                <form id="formPregunta9s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle" colspan="3" width="45%">Tipo de procedimiento de contratación</td>
                                                <td class="text-center font-weight-bold align-middle" width="28%">No aplica</td>
                                                <td class="text-center font-weight-bold align-middle">Monto asociado a los contratos realizados</td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">1</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Adjudicación directa</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo1P9s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo1P9s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtMontoContratosTipo1P9s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">2</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Invitación a cuando menos tres personas o invitación restringida</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo2P9s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo2P9s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtMontoContratosTipo2P9s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">3</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Licitación pública nacional</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo3P9s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo3P9s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtMontoContratosTipo3P9s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">4</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Licitación pública internacional</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo4P9s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo4P9s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtMontoContratosTipo4P9s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">5</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Otro procedimiento</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo5P9s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo5P9s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtMontoContratosTipo5P9s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td class="d-flex justify-content-center px-3">
                                                    <input id="txtMontoTotalContratosP9s12" type="text" class="form-control font-weight-bold text-center" value="0.00" required readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP9s12"></textarea>
                                                        <label for="txtComentarioGeneralP9s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 9</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta10s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.3 Contratos</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">10.- </span>
                                De acuerdo con el monto que reportó como respuesta en la pregunta anterior, anote la cantidad del mismo especificando el tipo de materia.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP10S12" role="button" aria-expanded="false" aria-controls="collapseP10S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP10S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> Para cada tipo de procedimiento de contratación, en caso de que en la pregunta 2 no lo haya seleccionado, anote una "X" en la columna "No aplica" y deje el resto de la fila en blanco.<br>
                                    <i class="fas fa-cubes"></i> La suma de las cantidades registradas en la columna "Total" debe ser igual a la suma de las cantidades reportadas como respuesta en la pregunta anterior, así como corresponder a su desagregación por tipo de procedimiento de contratación.<br>
                                    <i class="fas fa-cubes"></i> Para cada tipo de procedimiento de contratación y tipo de materia, la información debe ser consistente con la reportada como respuesta en la pregunta 8.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <h6 id="infoMontosP10" class="text-danger d-none">
                                    <u>Monto total: <span id="infoTotalMontosP10" class="pr-4"></span></u>
                                    1er Procedimiento: <span id="infoTotalMontos1P10" class="pr-4"></span>
                                    2do Procedimiento: <span id="infoTotalMontos2P10" class="pr-4"></span>
                                    3er Procedimiento: <span id="infoTotalMontos3P10"></span>
                                    <br>
                                    4to Procedimiento: <span id="infoTotalMontos4P10" class="pr-4"></span>
                                    5to Procedimiento: <span id="infoTotalMontos5P10"></span>
                                </h6>
                                <form id="formPregunta10s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle" colspan="3" rowspan="2" width="50%">Tipo de procedimiento de contratación</td>
                                                <td class="text-center font-weight-bold align-middle" rowspan="2" width="20%">No aplica</td>
                                                <td class="text-center font-weight-bold align-middle" colspan="3">Monto asociado a los contratos realizados, según tipo de materia</td>
                                            </tr>
                                            <tr style="font-size: small;">
                                                <td class="text-center font-weight-bold align-middle">Total</td>
                                                <td class="text-center font-weight-bold align-middle">Adquisiciones, arrendamientos y servicios</td>
                                                <td class="text-center font-weight-bold align-middle">Obra pública y servicios relacionados con la misma</td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">1</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Adjudicación directa</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo1P10s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo1P10s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtMontoTotalContratosTipo1P10s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtMontoAdquisicionesTipo1P10s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                                <td>
                                                    <input id="txtMontoObraPublicaTipo1P10s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">2</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Invitación a cuando menos tres personas o invitación restringida</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo2P10s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo2P10s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtMontoTotalContratosTipo2P10s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtMontoAdquisicionesTipo2P10s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                                <td>
                                                    <input id="txtMontoObraPublicaTipo2P10s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">3</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Licitación pública nacional</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo3P10s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo3P10s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtMontoTotalContratosTipo3P10s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtMontoAdquisicionesTipo3P10s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                                <td>
                                                    <input id="txtMontoObraPublicaTipo3P10s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">4</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Licitación pública internacional</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo4P10s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo4P10s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtMontoTotalContratosTipo4P10s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtMontoAdquisicionesTipo4P10s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                                <td>
                                                    <input id="txtMontoObraPublicaTipo4P10s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="1">5</td>
                                                <td class="small text-center font-weight-bold px-2 align-middle" colspan="2">Otro procedimiento</td>
                                                <td>
                                                    <div class="form-check p-0 d-flex justify-content-center align-items-center">
                                                        <input type="checkbox" class="btn-check" id="checkNoAplicaProcedimientoTipo5P10s12" autocomplete="off">
                                                        <label class="btn btn-sm btn-outline-success text-white" for="checkNoAplicaProcedimientoTipo5P10s12"><i class="fas fa-2x fa-times"></i></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txtMontoTotalContratosTipo5P10s12" type="text" class="form-control w-auto text-center" value="0" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtMontoAdquisicionesTipo5P10s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                                <td>
                                                    <input id="txtMontoObraPublicaTipo5P10s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td>
                                                    <input id="txtMontoTotalContratosGralP10s12" type="text" class="form-control w-auto text-center font-weight-bold" value="0.00" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtMontoTotalGralAdquisicionesP10s12" type="text" class="form-control w-auto text-center font-weight-bold" value="0.00" required readonly>
                                                </td>
                                                <td>
                                                    <input id="txtMontoTotalGralObraPublicaP10s12" type="text" class="form-control w-auto text-center font-weight-bold" value="0.00" required readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP10s12"></textarea>
                                                        <label for="txtComentarioGeneralP10s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 10</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta11s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.3 Contratos</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">11.- </span>
                                Indique si durante el año 2020 la Administración Pública de su entidad federativa implementó algún esquema de contratos o convenios marco. En caso afirmativo, anote el total de contratos o convenios marco realizados, así como el monto asociado a estos.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP11S12" role="button" aria-expanded="false" aria-controls="collapseP11S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP11S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> En caso de que la Administración Pública de su entidad federativa no haya implementado algún esquema de contratos o convenios marco, o no cuente con información para determinarlo, indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta11s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-justify font-weight-bold" width="37%">¿La Administración Pública de su entidad federativa implementó algún esquema de contratos o convenios marco?
                                                    <span class="d-flex justify-content-center">(1. Sí / 2. No / 9. No se sabe)</span>
                                                </td>
                                                <td class="text-center font-weight-bold align-middle" width="30%">Total de contratos o convenios marco</td>
                                                <td class="text-center font-weight-bold align-middle">Monto asociado a los contratos o convenios marco</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 align-middle">
                                                    <select id="selectImplementoEsquema11s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input id="txtTotalContratosConvenios11s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtMontoAsociadoContratos11s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP11s12"></textarea>
                                                        <label for="txtComentarioGeneralP11s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 11</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta12s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.3 Contratos</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">12.- </span>
                                Indique si durante el año 2020 la Administración Pública de su entidad federativa implementó algún esquema de contrataciones o compras consolidadas. En caso afirmativo, anote el total de contrataciones o compras consolidadas realizadas, así como el monto asociado a estas.
                                <a class="text-warning" data-bs-toggle="collapse" href="#collapseP12S12" role="button" aria-expanded="false" aria-controls="collapseP12S12">NOTA...</a>
                            </label>
                            <div class="collapse ml-5" id="collapseP12S12">
                                <small class="text-justify">
                                    <i class="fas fa-cubes"></i> En caso de que la Administración Pública de su entidad federativa no haya implementado algún esquema de contrataciones o compras consolidadas, o no cuente con información para determinarlo, indíquelo en la columna correspondiente conforme al catálogo respectivo y deje el resto de la fila en blanco.
                                </small>
                            </div>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta12s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-bordered table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td class="text-justify font-weight-bold" width="37%">¿La Administración Pública de su entidad federativa implementó algún esquema de contrataciones o compras consolidadas?
                                                    <span class="d-flex justify-content-center">(1. Sí / 2. No / 9. No se sabe)</span>
                                                </td>
                                                <td class="text-center font-weight-bold align-middle" width="30%">Total de contrataciones o compras consolidadas</td>
                                                <td class="text-center font-weight-bold align-middle">Monto asociado a las contrataciones o compras consolidadas</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 align-middle">
                                                    <select id="selectImplementoComprasConsolidadas12s12" class="custom-select" required>
                                                        <option value="" selected disabled>?</option>
                                                        <option value="1">Sí</option>
                                                        <option value="2">No</option>
                                                        <option value="9">No se sabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input id="txtTotalContratacionesCompras12s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                                <td>
                                                    <input id="txtMontoAsociadoCompras12s12" type="number" class="form-control text-center" min="0" step="0.01" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP12s12"></textarea>
                                                        <label for="txtComentarioGeneralP12s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 12</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta13s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.3 Contratos</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">13.- </span>
                                Anote la cantidad de convenios modificatorios realizados durante el año 2020 por la Administración Pública de su entidad federativa con proveedores y/o contratistas.
                            </label>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta13s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td>
                                                    <input id="txtTotalConveniosModificatorios13s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                                <td class="text-center font-weight-bold align-middle">Total de convenios modificatorios</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP13s12"></textarea>
                                                        <label for="txtComentarioGeneralP13s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 13</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pregunta14s12" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="p-3 preguntaPregunta">
                            <h5 class="text-primary">XII. Contrataciones públicas</h5>
                            <h6 class="text-primary">XII.4 Estudios de impacto urbano y ambiental</h6>
                            <label class="text-justify letraLabel">
                                <span class="text-danger text-uppercase font-weight-bold h5">14.- </span>
                                Anote la cantidad de estudios de impacto urbano y ambiental presentados durante el año 2020 para la realización de obras públicas.
                            </label>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <form id="formPregunta14s12" class="needs-validation" novalidate>
                                    <table class="table table-sm table-responsive">
                                        <tbody>
                                            <tr style="font-size: small;">
                                                <td>
                                                    <input id="txtTotalUrbanoAmbiental14s12" type="number" class="form-control text-center" min="0" required>
                                                </td>
                                                <td class="text-center font-weight-bold align-middle">Total de estudios de impacto urbano y ambiental</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="text-justify letraLabel">
                                                        En caso de tener algún comentario u observación al dato registrado en la respuesta de la presente pregunta, o los datos que derivan de la misma, favor de anotarlo en el siguiente espacio. De lo contrario, déjelo en blanco.
                                                    </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP14s12"></textarea>
                                                        <label for="txtComentarioGeneralP14s12">Comentarios...</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w100 text-right">
                                        <button type="submit" class="btn btn-outline-primary btnSubmit">Guardar pregunta 14</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="finCuestionario" role="tabpanel">
                    <div class="cardPregunta shadow-sm">
                        <div class="px-5 py-3 preguntaPregunta">
                            <figure class="text-center mx-5 px-5">
                                <blockquote class="blockquote">
                                    <p>Fin del cuestionario...</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    Después de aceptar finalizar con el cuestionario le será posible descargar su reporte de este censo. Pero antes debe asegurarse de haber terminado de responder todas las preguntas, <cite title="Source Title">¡de ambas secciones!</cite>, y tener presente que no podrá volver a editarlas.
                                </figcaption>
                            </figure>
                        </div>
                        <div class="card border-0 preguntaRespuesta">
                            <div class="card-body">
                                <div class="row mx-1 d-flex align-items-center" style="height: 25vh;">
                                    <div id="contenedorBtnFinalizarCuestionario" class="col-12 text-center">
                                        <p class="mb-0">
                                            <u class="font-weight-bold text-uppercase">Atención.</u>
                                            Una vez finalizado el cuestionario no podrá volver a editar sus respuestas, únicamente podrá descargar un archivo PDF con su información registrada hasta ahora.
                                        </p>
                                        <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                            <button id="btnFinalizarCuestionario" class="btn btn-outline-primary" type="button">
                                                Finalizar cuestionario
                                                <i class="fas fa-lg fa-step-forward ml-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="contenedorBtnGenerarReporte" class="col-12 text-center d-none">
                                        <h5 class="font-weight-bold text-uppercase text-dark">Bien echo, ha finalizado exitosamente el censo nacional de gobiernos estatales 2021.</h5>
                                        <p class="mb-0">
                                            <u class="font-weight-bold text-uppercase">Módulo 1.</u>
                                            Administración Pública de la entidad federativa.
                                        </p>
                                        <p class="mb-0">
                                            <u class="font-weight-bold text-uppercase">Sección I.</u>
                                            Estructura organizacional y recursos.
                                            <span class="mx-3"></span>
                                            <u class="font-weight-bold text-uppercase">Sección XII.</u>
                                            Contrataciones públicas.
                                        </p>
                                        <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                            <button id="btnGenerarReporte" class="btn btn-outline-primary" type="button">
                                                Descargar reporte
                                                <i class="fas fa-lg fa-cloud-download-alt ml-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        </div>
    </div>
<?php
}
?>