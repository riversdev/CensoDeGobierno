<?php
session_start();

if (!isset($_SESSION['sesionActiva']) || $_SESSION['sesionActiva'] != "1") {
    header("Location: /CensoDeGobierno");
    exit;
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../static/img/h.png">
        <title>Oficialía Mayor</title>
        <!-- Axios -->
        <script src="views/static/axios/axios.js"></script>
        <!-- bootstrap-5.0.0-beta2-dist -->
        <link rel="stylesheet" href="views/static/bootstrap/css/bootstrap.css">
        <script src="views/static/bootstrap/js/bootstrap.js"></script>
        <!-- Bootswatch LUX -->
        <link rel="stylesheet" href="views/static/bootswatch/bootswatch-lux.css">
        <!-- Main questionary report JS -->
        <script src="views\templates\js\questionaryReport.js"></script>

        <style>
            ._card-border {
                box-shadow: 0px 1px 3px 1px rgb(0 0 0 / 5%) !important
            }

            ._bg-blue {
                background: #092432;
            }

            ._header-dark {
                color: #2D2D2D;
            }

            ._header-size {
                font-size: small;
            }

            .table thead td {
                border-bottom: 2px solid rgba(0, 0, 0, 0.05) !important;
            }

            .table tfoot td {
                border-bottom: 2px solid rgba(0, 0, 0, 0.05) !important;
            }

            ._text-vertical {
                writing-mode: vertical-lr;
                transform: rotate(270deg);
                white-space: nowrap;
            }

            textarea {
                background-color: #fff !important;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid px-5">
            <div class="row px-2">
                <div class="col-md-12 text-center mt-1 py-2 _bg-blue">
                    <h4 class="text-white">CENSO NACIONAL DE GOBIERNOS ESTATALES 2021</h4>
                    <h5>Módulo 1: Administración pública de la entidad federativa</h5>
                    <button id="imprimirReporte" class="btn btn-outline-white" >Imprimir Reporte</button>
                </div>
                <!-- question 1 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.1 Estructura organizacional</h5>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">1.- </span>
                            Anote el nombre de cada una de las instituciones que conformaban la estructura orgánica de la Administración Pública de su entidad federativa al cierre del año 2020. Por cada una de estas, señale su clasificación administrativa, el tipo de institución del que se trate, la función principal ejercida y, de ser el caso, la o las funciones secundarias desarrolladas; utilizando para tal efecto el catálogo que se presenta en la barra de navegación superior.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="2" colspan="3" width="35%">Nombre de las instituciones</td>
                                        <td class="text-center align-middle" rowspan="2">Clasificación administrativa</td>
                                        <td class="text-center align-middle" rowspan="2">Tipo de institución</td>
                                        <td class="text-center align-middle" colspan="6" width="37%">Función ejercida</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle">Principal</td>
                                        <td class="text-center align-middle" colspan="5">Secundaria(s)</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP1S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP1s1" class="contenedorDeComentarios">
                                        <td colspan="9">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP1s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP1s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP1s1" class="contenedorDeComentarios">
                                        <td colspan="9">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneral" readonly></textarea>
                                                <label for="txtComentarioGeneral">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 2 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.1 Estructura organizacional</h5>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">2.- </span>
                            Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, si al cierre del año 2020 contaba con alguna unidad de género y/o enlace de género.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center w-50" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center">¿Cuenta con alguna unidad de género y/o enlace de género?</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP2S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tr id="contenedorComentariosGeneralP2s1" class="contenedorDeComentarios">
                                    <td colspan="2">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP2" readonly></textarea>
                                            <label for="txtComentarioGeneralP2">Comentarios...</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 3 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.1 Perfil de los titulares de las instituciones</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">3.- </span>
                            Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, los datos de su titular al cierre del año 2020, utilizando para tal efecto los catálogos que se presentan en la parte inferior de la siguiente tabla.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr style="font-size:11px;" class="text-dark">
                                        <td class="text-center align-middle" rowspan="3" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center" colspan="12">Perfil de los titulares de las instituciones de la Administración Pública de la entidad federativa</td>
                                        <td class="text-center align-middle px-1" rowspan="3">Institución con el mismo titular</td>
                                    </tr>
                                    <tr style="font-size:11px;" class="text-dark">
                                        <td class="text-center align-middle px-2" rowspan="2">Sexo</td>
                                        <td class="text-center align-middle px-2" rowspan="2">Edad</td>
                                        <td class="text-center align-middle px-2" rowspan="2">Ingresos brutos mensuales</td>
                                        <td class="text-center" colspan="2">Último grado de estudios</td>
                                        <td class="text-center align-middle px-2" rowspan="2">Empleo anterior</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Antiguedad en el servicio público</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Antiguedad en el cargo</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Pertenencia a pueblo indígena</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Condición de discapacidad</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Forma de designación</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Afiliación partidista</td>
                                    </tr>
                                    <tr style="font-size:11px;" class="text-dark">
                                        <td class="text-center px-1">Nivel de escolaridad</td>
                                        <td class="text-center px-1">Estatus</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP3S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP3s1" class="contenedorDeComentarios">
                                        <td colspan="9">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP3s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP3s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP3s1" class="contenedorDeComentarios">
                                        <td colspan="10">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP3" readonly></textarea>
                                                <label for="txtComentarioGeneralP3">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 4 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">4.- </span>
                            Anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de personal adscrito al cierre del año 2020, según su sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="2" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center align-middle" colspan="3">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center" width="18%">Total</td>
                                        <td class="text-center">Hombres</td>
                                        <td class="text-center">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP4S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP4s1" class="contenedorDeComentarios">
                                        <td colspan="4">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP4" readonly></textarea>
                                                <label for="txtComentarioGeneralP4">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 5 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">5.- </span>
                            De acuerdo con el total de personal que reportó como respuesta en la pregunta anterior, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su régimen de contratación y sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="3" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center" colspan="13">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según régimen de contratación y sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center px-3 align-middle" rowspan="2">Total</td>
                                        <td class="text-center px-2 align-middle" rowspan="2">Hombres</td>
                                        <td class="text-center px-2 align-middle" rowspan="2">Mujeres</td>
                                        <td class="text-center align-middle" colspan="2">Confianza</td>
                                        <td class="text-center align-middle" colspan="2">Base o sindicalizado</td>
                                        <td class="text-center align-middle" colspan="2">Eventual</td>
                                        <td class="text-center align-middle" colspan="2">Honorarios</td>
                                        <td class="text-center align-middle" colspan="2">Otro</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center px-1">Hombres</td>
                                        <td class="text-center px-1">Mujeres</td>
                                        <td class="text-center px-1">Hombres</td>
                                        <td class="text-center px-1">Mujeres</td>
                                        <td class="text-center px-1">Hombres</td>
                                        <td class="text-center px-1">Mujeres</td>
                                        <td class="text-center px-1">Hombres</td>
                                        <td class="text-center px-1">Mujeres</td>
                                        <td class="text-center px-1">Hombres</td>
                                        <td class="text-center px-1">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP5S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP5s1" class="contenedorDeComentarios">
                                        <td colspan="9">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP5s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP5s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP5s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP5" readonly></textarea>
                                                <label for="txtComentarioGeneralP5">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 6 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">6.- </span>
                            De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando la institución de seguridad social en la que se encontraba registrado y sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="3" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center" colspan="13">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según institución de seguridad social y sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle px-2" rowspan="2">Total</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Hombres</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Mujeres</td>
                                        <td class="text-center align-middle" colspan="2">Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado (ISSSTE)</td>
                                        <td class="text-center align-middle" colspan="2">Institución de Seguridad Social de la entidad federativa u homóloga</td>
                                        <td class="text-center align-middle" colspan="2">Instituto Mexicano del Seguro Social (IMSS)</td>
                                        <td class="text-center align-middle" colspan="2">Otra institución de seguridad social</td>
                                        <td class="text-center align-middle" colspan="2">Sin seguridad social</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center px-1">Hombres</td>
                                        <td class="text-center px-1">Mujeres</td>
                                        <td class="text-center px-1">Hombres</td>
                                        <td class="text-center px-1">Mujeres</td>
                                        <td class="text-center px-1">Hombres</td>
                                        <td class="text-center px-1">Mujeres</td>
                                        <td class="text-center px-1">Hombres</td>
                                        <td class="text-center px-1">Mujeres</td>
                                        <td class="text-center px-1">Hombres</td>
                                        <td class="text-center px-1">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP6S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP6s1" class="contenedorDeComentarios">
                                        <td colspan="9">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP6s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP6s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP6s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP6" readonly></textarea>
                                                <label for="txtComentarioGeneralP6">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 7 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">7.- </span>
                            De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su rango de edad y sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="3" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center align-middle" colspan="21">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según rango de edad y sexo</td>
                                    </tr>
                                    <tr class="text-dark" style="font-size:11px">
                                        <td class="text-center align-middle px-1" rowspan="2">Total</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Hombres</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Mujeres</td>
                                        <td class="text-center" colspan="2">De 18 a 24 años</td>
                                        <td class="text-center" colspan="2">De 25 a 29 años</td>
                                        <td class="text-center" colspan="2">De 30 a 34 años</td>
                                        <td class="text-center" colspan="2">De 35 a 39 años</td>
                                        <td class="text-center" colspan="2">De 40 a 44 años</td>
                                        <td class="text-center" colspan="2">De 45 a 49 años</td>
                                        <td class="text-center" colspan="2">De 50 a 54 años</td>
                                        <td class="text-center" colspan="2">De 55 a 59 años</td>
                                        <td class="text-center" colspan="2">De 60 años o más</td>
                                    </tr>
                                    <tr class="text-dark" style="height: 70px;font-size:11px">
                                        <td class="text-center align-middle _text-vertical px-0">Hombres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Hombres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Hombres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Hombres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Hombres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Hombres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Hombres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Hombres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Hombres</td>
                                        <td class="text-center align-middle _text-vertical px-0">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP7S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP7s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP7" readonly></textarea>
                                                <label for="txtComentarioGeneralP7">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 8 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">8.- </span>
                            De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su rango de ingresos y sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <div class="text-right px-2">
                                <h5>(Parte 1 de 2)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="3" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center align-middle" colspan="17">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según rango de ingresos y sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle px-2" rowspan="2">Total</td>
                                        <td class="text-center align-middle px-2" rowspan="2">Hombres</td>
                                        <td class="text-center align-middle px-2" rowspan="2">Mujeres</td>
                                        <td class="text-center align-middle" colspan="2">Sin paga</td>
                                        <td class="text-center" colspan="2">De 1 a 5,000 pesos</td>
                                        <td class="text-center" colspan="2">De 5,001 a 10,000 pesos</td>
                                        <td class="text-center" colspan="2">De 10,001 a 15,000 pesos</td>
                                        <td class="text-center" colspan="2">De 15,001 a 20,000 pesos</td>
                                        <td class="text-center" colspan="2">De 20,001 a 25,000 pesos</td>
                                        <td class="text-center" colspan="2">De 25,001 a 30,000 pesos</td>
                                    </tr>
                                    <tr class="text-center text-dark" style="font-size: 11px;height:70px">
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP8S1"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 2 de 2)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="3" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center align-middle" colspan="20">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según rango de ingresos y sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">

                                        <td class="text-center" colspan="2">De 30,001 a 35,000 pesos</td>
                                        <td class="text-center" colspan="2">De 35,001 a 40,000 pesos</td>
                                        <td class="text-center" colspan="2">De 40,001 a 45,000 pesos</td>
                                        <td class="text-center" colspan="2">De 45,001 a 50,000 pesos</td>
                                        <td class="text-center" colspan="2">De 50,001 a 55,000 pesos</td>
                                        <td class="text-center" colspan="2">De 55,001 a 60,000 pesos</td>
                                        <td class="text-center" colspan="2">De 60,001 a 65,000 pesos</td>
                                        <td class="text-center" colspan="2">De 65,001 a 70,000 pesos</td>
                                        <td class="text-center" colspan="2">Más de 70,000 pesos</td>
                                    </tr>
                                    <tr class="text-center text-dark" style="font-size: 11px;height:70px">
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>

                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP81S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP8s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP8s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP8s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP8s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP8" readonly></textarea>
                                                <label for="txtComentarioGeneralP8">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 9 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">9.- </span>
                            De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su nivel de escolaridad y sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="3" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center pl-5" colspan="19">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según nivel de escolaridad y sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle px-2" rowspan="2">Total</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Hombres</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Mujeres</td>
                                        <td class="text-center align-middle" colspan="2">Ninguno</td>
                                        <td class="text-center align-middle" colspan="2">Preescolar o primaria</td>
                                        <td class="text-center align-middle" colspan="2">Secundaria</td>
                                        <td class="text-center align-middle" colspan="2">Preparatoria</td>
                                        <td class="text-center align-middle" colspan="2">Carrera técnica o carrera comercial</td>
                                        <td class="text-center align-middle" colspan="2">Licenciatura</td>
                                        <td class="text-center align-middle" colspan="2">Maestría</td>
                                        <td class="text-center align-middle" colspan="2">Doctorado</td>
                                    </tr>
                                    <tr class="text-dark" style="font-size: 11px;height: 70px">
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP9S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP9s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP9s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP9s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP9s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP9" readonly></textarea>
                                                <label for="txtComentarioGeneralP9">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 10 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">10.- </span>
                            De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su condición de pertenencia a algún pueblo indígena y sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="3" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center" colspan="13">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según condición de pertenencia a algún pueblo indígena y sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle px-5" rowspan="2">Total</td>
                                        <td class="text-center align-middle px-4" rowspan="2">Hombres</td>
                                        <td class="text-center align-middle px-4" rowspan="2">Mujeres</td>
                                        <td class="text-center align-middle" colspan="2">Pertenece a algún pueblo indígena</td>
                                        <td class="text-center align-middle" colspan="2">No pertenece a algún pueblo indígena</td>
                                        <td class="text-center align-middle" colspan="2">No identificado</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center px-4">Hombres</td>
                                        <td class="text-center px-4">Mujeres</td>
                                        <td class="text-center px-4">Hombres</td>
                                        <td class="text-center px-4">Mujeres</td>
                                        <td class="text-center px-4">Hombres</td>
                                        <td class="text-center px-4">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP10S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP10s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP10s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP10s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP10s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP10" readonly></textarea>
                                                <label for="txtComentarioGeneralP10">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 11 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">11.- </span>
                            De acuerdo con el total de personal que reportó como respuesta en el apartado “Pertenece a algún pueblo indígena” de la pregunta anterior, anote la cantidad del mismo especificando su pueblo indígena de pertenencia y sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table>
                                <tbody id="identifierQuestionSumaTotalIndigenaP11S1">
                                    <tr class="text-center" style="font-size:14px">
                                        <td width="37%"></td>
                                        <td class="px-5">Total: 150</td>
                                        <td class="px-5">Hombres: 100</td>
                                        <td class="px-5">Mujeres: 50</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 1 de 4)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="5" colspan="3" width="22%">Nombre de las instituciones</td>
                                        <td class="align-middle" colspan="53">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa que pertenece a algún pueblo indígena, según sexo</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="50">Pueblo indígena de pertenencia</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="text-center" colspan="3">Chinanteco</td>
                                        <td class="text-center" colspan="3">Ch'ol</td>
                                        <td class="text-center" colspan="3">Cora</td>
                                        <td class="text-center" colspan="3">Huasteco</td>
                                        <td class="text-center" colspan="3">Huichol</td>
                                        <td class="text-center" colspan="3">Maya</td>
                                        <td class="text-center" colspan="3">Mayo</td>
                                    </tr>
                                    <tr style="font-size:11px;height:70px">
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionIndigena17P11S1"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 2 de 4)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="5" colspan="3" width="22%">Nombre de las instituciones</td>
                                        <td class="align-middle" colspan="18">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa que pertenece a algún pueblo indígena, según sexo</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="18">Pueblo indígena de pertenencia</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center" colspan="3">Mazahua</td>
                                        <td class="text-center" colspan="3">Mazateco</td>
                                        <td class="text-center" colspan="3">Mixe</td>
                                        <td class="text-center" colspan="3">Mixteco</td>
                                        <td class="text-center" colspan="3">Náhuatl</td>
                                        <td class="text-center" colspan="3">Otomí</td>
                                    </tr>
                                    <tr style="font-size:11px;height:70px">
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionIndigena813P11S1"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 3 de 4)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="5" colspan="3" width="22%">Nombre de las instituciones</td>
                                        <td class="align-middle" colspan="18">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa que pertenece a algún pueblo indígena, según sexo</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="18">Pueblo indígena de pertenencia</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center" colspan="3">Tarasco/Purép.</td>
                                        <td class="text-center" colspan="3">Tarahumara</td>
                                        <td class="text-center" colspan="3">Tepehuano</td>
                                        <td class="text-center" colspan="3">Tlapaneco</td>
                                        <td class="text-center" colspan="3">Totonaco</td>
                                        <td class="text-center" colspan="3">Tseltal</td>
                                    </tr>
                                    <tr style="font-size:11px;height:70px">
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionIndigena1419P11S1"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 4 de 4)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="5" colspan="3" width="22%">Nombre de las instituciones</td>
                                        <td class="align-middle" colspan="18">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa que pertenece a algún pueblo indígena, según sexo</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="18">Pueblo indígena de pertenencia</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center" colspan="3">Tsotsil</td>
                                        <td class="text-center" colspan="3">Yaqui</td>
                                        <td class="text-center" colspan="3">Zapoteco</td>
                                        <td class="text-center" colspan="3">Zoque</td>
                                        <td class="text-center" colspan="3">Otro</td>
                                        <td class="text-center" colspan="3">No identificado</td>
                                    </tr>
                                    <tr style="font-size:11px;height:70px">
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionIndigena2025P11S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP11s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP11s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP11s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP11s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP11" readonly></textarea>
                                                <label for="txtComentarioGeneralP11">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 12 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">12.- </span>
                            De acuerdo con el total de personal que reportó como respuesta en la pregunta 4, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de las mismas especificando su condición de discapacidad y sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered table-responsive">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="3" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center" colspan="13">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa, según condición de discapacidad y sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle px-2" rowspan="2">Total</td>
                                        <td class="text-center align-middle px-2" rowspan="2">Hombres</td>
                                        <td class="text-center align-middle px-2" rowspan="2">Mujeres</td>
                                        <td class="text-center" colspan="2">Con discapacidad</td>
                                        <td class="text-center" colspan="2">Sin discapacidad</td>
                                        <td class="text-center" colspan="2">No indentificado</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center px-2">Hombres</td>
                                        <td class="text-center px-2">Mujeres</td>
                                        <td class="text-center px-2">Hombres</td>
                                        <td class="text-center px-2">Mujeres</td>
                                        <td class="text-center px-2">Hombres</td>
                                        <td class="text-center px-2">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP12S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP12s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP12s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP12s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP12s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP12" readonly></textarea>
                                                <label for="txtComentarioGeneralP12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 13 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">13.- </span>
                            De acuerdo con el total de personal que reportó como respuesta en el apartado "Con discapacidad" de la pregunta anterior, anote la cantidad del mismo especificando su tipo de discapacidad y sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table>
                                <tbody id="identifierQuestionSumaTotalDiscapacidadP13S1">
                                    <tr class="text-center" style="font-size:15px">
                                        <td width="37%"></td>
                                        <td class="px-5" id="totalPersonalDiscapacidad">Total: 150</td>
                                        <td class="px-5" id="totalHombresDiscapacidad">Hombres: 100</td>
                                        <td class="px-5" id="totalMujeresDiscapacidad">Mujeres: 50</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 1 de 2)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="5" colspan="3" width="30%">Nombre de las instituciones</td>
                                        <td class="text-center align-middle" colspan="23">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa que cuenta con alguna discapacidad, según sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" colspan="20">Tipo de discapacidad</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" colspan="3" width="11%">Dificultad o impedimento para caminar, subir o bajar escalones usando sus piernas</td>
                                        <td class="text-center align-middle" colspan="3" width="11%">Dificultad o impedimento para ver, aun usando lentes</td>
                                        <td class="text-center align-middle" colspan="3" width="11%">Dificultad o impedimento para mover o usar sus brazos o manos</td>
                                        <td class="text-center align-middle" colspan="3" width="11%">Dificultad o impedimento para aprender, recordar o concentrarse por alguna condición intelectual, por ejemplo síndrome de Down</td>
                                        <td class="text-center align-middle" colspan="3" width="11%">Dificultad o impedimento para oír, aun usando aparato auditivo</td>
                                    </tr>
                                    <tr style="font-size:11px;height:70px">
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionDiscapacidad15P13S1"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 2 de 2)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="5" colspan="3" width="30%">Nombre de las instituciones</td>
                                        <td class="text-center  align-middle" colspan="23">Personal adscrito a las instituciones de la Administración Pública de la entidad federativa que cuenta con alguna discapacidad, según sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" colspan="20">Tipo de discapacidad</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" colspan="3" width="11%">Dificultad o impedimento para hablar o comunicarse (entender o ser entendido(a) por otros)</td>
                                        <td class="text-center align-middle" colspan="3" width="11%">Dificultad o impedimento para bañarse, vestirse o comer</td>
                                        <td class="text-center align-middle" colspan="3" width="11%">Dificultad o impedimento para realizar sus actividades diarias por alguna condicional emocional o mental, por ejemplo esquizofrenia o depresión</td>
                                        <td class="text-center align-middle" colspan="3" width="11%">Otro tipo de discapacidad</td>
                                        <td class="text-center align-middle" colspan="3" width="11%">No identificado</td>
                                    </tr>
                                    <tr style="font-size:11px;height:70px">
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                        <td class="align-middle _text-vertical px-0">Total</td>
                                        <td class="align-middle _text-vertical px-0">Hombres</td>
                                        <td class="align-middle _text-vertical px-0">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionDiscapacidad610P13S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP13s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP13s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP13s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP13s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP13" readonly></textarea>
                                                <label for="txtComentarioGeneralP13">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 14 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">14.- </span>
                            A partir de la información que reportó como respuesta para la(s) institución(es) de educación en la pregunta 4, señale si se contabilizó al personal que trabajaba en organismos descentralizados pagados con fondos federales. En caso afirmativo, anote la cantidad de este personal, según su sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered table-responsive">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle w-50" rowspan="2" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center align-middle" rowspan="2" width="20%">¿Se contabilizó al personal que trabajaba en organismos descentralizados pagados con fondos federales?</td>
                                        <td class="text-center" colspan="3">Personal pagado con fondos federales, según sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center">Total</td>
                                        <td class="text-center">Hombres</td>
                                        <td class="text-center">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP14S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tr id="contenedorComentariosGeneralP14s1" class="contenedorDeComentarios">
                                    <td>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP14" readonly></textarea>
                                            <label for="txtComentarioGeneralP14">Comentarios...</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 15 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.2 Características del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">15.- </span>
                            A partir de la información que reportó como respuesta para la(s) institución(es) de salud en la pregunta 4, señale si se contabilizó al personal que trabajaba en organismos descentralizados pagados con fondos federales. En caso afirmativo, anote la cantidad de este personal, según su sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered table-responsive">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle w-50" rowspan="2" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center align-middle" rowspan="2" width="20%">¿Se contabilizó al personal que trabajaba en organismos descentralizados pagados con fondos federales?</td>
                                        <td class="text-center" colspan="3">Personal pagado con fondos federales, según sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center">Total</td>
                                        <td class="text-center">Hombres</td>
                                        <td class="text-center">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP15S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tr id="contenedorComentariosGeneralP15s1" class="contenedorDeComentarios">
                                    <td>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP15" readonly></textarea>
                                            <label for="txtComentarioGeneralP15">Comentarios...</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 16 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.3 Profesionalización del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">16.- </span>
                            Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, si al cierre del año 2020 contaba con elementos, mecanismos y/o esquemas de profesionalización para su personal. En caso afirmativo, especifique el nombre de la disposición normativa donde se encuentren regulados o, en su defecto, la no regulación de los mismos.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" colspan="3" width="35%">Nombre de las instituciones</td>
                                        <td class="text-center">¿Contaba con elementos, mecanismos y/o esquemas de profesionalización para su personal?</td>
                                        <td class="text-center align-middle" width="35%">Nombre de la disposición normativa donde se encuentran regulados</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP16S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP16s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP16" readonly></textarea>
                                                <label for="txtComentarioGeneralP16">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 17 -->
                <div class="col-md-12 my-2 _card-border" id="contenedorP17S1">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.3 Profesionalización del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">17.- </span>
                            Señale, por cada una de las instituciones de la Administración Pública de su entidad federativa, los elementos, mecanismos y/o esquemas de profesionalización considerados en la pregunta anterior.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark text-center">
                                        <td class="align-middle" rowspan="2" colspan="3">Nombre de las instituciones</td>
                                        <td class="align-middle" colspan="13">Elementos, mecanismos y/o esquemas de profesionalización</td>
                                    </tr>
                                    <tr class="text-dark text-center" style="font-size: 11px">
                                        <td class="align-middle px-1">Servicio civil de carrera</td>
                                        <td class="align-middle px-1">Reclutamiento, selección e inducción</td>
                                        <td class="align-middle px-1">Diseño y selección de pruebas de ingreso</td>
                                        <td class="align-middle px-1">Diseño curricular</td>
                                        <td class="align-middle px-1">Actualización de perfiles de puesto</td>
                                        <td class="align-middle px-1">Diseño y validación de competencias</td>
                                        <td class="align-middle px-1">Concursos públicos y abiertos para la contratación</td>
                                        <td class="align-middle px-1">Mecanismos de evaluación del desempeño</td>
                                        <td class="align-middle px-1">Programas de capacitación</td>
                                        <td class="align-middle px-1">Evaluación de impacto de la capacitación</td>
                                        <td class="align-middle px-1">Programas de estímulos y recompensas</td>
                                        <td class="align-middle px-1">Separación del servicio</td>
                                        <td class="align-middle px-1">Otros</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP17S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP17s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP17s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP17s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP17s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP17" readonly></textarea>
                                                <label for="txtComentarioGeneralP17">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 18 -->
                <div class="col-md-12 my-2 _card-border" id="contenedorP18S1">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.3 Profesionalización del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">18.- </span>
                            Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, si al cierre del año 2020 contaba con alguna unidad administrativa o área que coordinara los esfuerzos en materia de profesionalización del personal. En caso afirmativo, anote el nombre de la misma.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="3">Nombre de las instituciones</td>
                                        <td class="align-middle" width="25%">¿Contaba con alguna unidad administrativa o área coordinadora de los esfuerzos en materia de profesionalización?</td>
                                        <td class="align-middle" width="35%">Nombre de la unidad administrativa o área coordinadora en materia de profesionalización del personal</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP18S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP18s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP18" readonly></textarea>
                                                <label for="txtComentarioGeneralP18">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 19 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.2 Recursos humanos</h5>
                        <h6 class="text-danger">I.2.4 Capacitación del personal</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">19.- </span>
                            Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, si durante el año 2020 se impartieron acciones formativas al personal adscrito a la misma. En caso afirmativo, anote la cantidad de acciones formativas impartidas, así como la cantidad de servidores públicos capacitados, según su sexo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="2" colspan="3">Nombre de las instituciones</td>
                                        <td class="align-middle" rowspan="2">¿Se impartieron acciones formativas al personal?</td>
                                        <td class="align-middle" rowspan="2">Acciones formativas impartidas</td>
                                        <td class="align-middle" rowspan="2">Acciones formativas impartidas y concluidas</td>
                                        <td class="align-middle" colspan="3">Servidores públicos capacitados adscritos a las instituciones de la Administración Pública de la entidad federativa, según sexo </td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td>Total</td>
                                        <td>Hombres</td>
                                        <td>Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP19S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP19s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP19" readonly></textarea>
                                                <label for="txtComentarioGeneralP19">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 24 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.1 Bienes inmuebles</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">24.- </span>
                            Anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de bienes inmuebles con los que contaba al cierre del año 2020, según tipo de posesión.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="2" colspan="3" width="38%">Nombre de las instituciones</td>
                                        <td class="align-middle" colspan="4">Bienes inmuebles, según tipo de posesión</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="px-5">Total</td>
                                        <td class="px-5">Propios</td>
                                        <td class="px-5">Rentados</td>
                                        <td class="px-5">Otro tipo de posesión</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP24S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP24s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP24s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP24s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP24s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP24" readonly></textarea>
                                                <label for="txtComentarioGeneralP24">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 25 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.1 Bienes inmuebles</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">25.- </span>
                            A partir de la información que reportó como respuesta en la pregunta anterior, señale si se contabilizaron bienes inmuebles cuyo uso principal haya sido el apoyo a funciones educativas.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="3" width="60%">Nombre de las instituciones</td>
                                        <td class="align-middle">¿Se contabilizaron bienes inmuebles cuyo uso principal haya sido el apoyo a funciones educativas?</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP25S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP25s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP25" readonly></textarea>
                                                <label for="txtComentarioGeneralP25">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 26 -->
                <div class="col-md-12 my-2 _card-border" id="contenedorHideP26s1">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.1 Bienes inmuebles</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">26.- </span>
                            De acuerdo con el total de bienes inmuebles que reportó como respuesta en la pregunta 24, anote la cantidad de los mismos que tuvieron como uso principal el apoyo a funciones educativas.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="5" colspan="3" width="25%">Nombre de las instituciones</td>
                                        <td class="align-middle" colspan="6">Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones educativas (1. + 2.)</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td colspan="2"></td>
                                        <td colspan="2">
                                            <input id="txtTotalInmueblesP26" type="number" value="0" min="0" class="form-control text-center w-100" readonly>
                                        </td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td colspan="3">1. Bienes inmuebles registrados por instituciones con función principal "Educación" (1.1 + 1.2 + 1.3)</td>
                                        <td colspan="3">2. Bienes inmuebles registrados por instituciones con otro tipo de función principal (2.1 + 2.2 + 2.3)</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td colspan="1"></td>
                                        <td colspan="1">
                                            <input id="txtTotalInmuebles1P26" type="number" value="0" min="0" class="form-control text-center w-100" readonly>
                                        </td>
                                        <td colspan="1"></td>
                                        <td colspan="1"></td>
                                        <td colspan="1">
                                            <input id="txtTotalInmuebles2P26" type="number" value="0" min="0" class="form-control text-center w-100" readonly>
                                        </td>
                                        <td colspan="1"></td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="px-3">1.1 Bienes inmuebles usados como escuelas</td>
                                        <td class="px-3">1.2 Bienes inmuebles usados para otro tipo de funciones educativas</td>
                                        <td class="px-3">1.3 Bienes inmuebles usados de forma mixta</td>
                                        <td class="px-3">2.1 Bienes inmuebles usados como escuelas</td>
                                        <td class="px-3">2.2 Bienes inmuebles usados para otro tipo de funciones educativas</td>
                                        <td class="px-3">2.3 Bienes inmuebles usados de forma mixta</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP26S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP26s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP26s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP26s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP26s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP26" readonly></textarea>
                                                <label for="txtComentarioGeneralP26">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 27 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.1 Bienes inmuebles</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">27.- </span>
                            A partir de la información que reportó como respuesta en la pregunta 24, señale si se contabilizaron bienes inmuebles cuyo uso principal fue el apoyo a funciones de salud.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="3" width="60%">Nombre de las instituciones</td>
                                        <td class="align-middle">¿Se contabilizaron bienes inmuebles cuyo uso principal fue el apoyo a funciones de salud?</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP27S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP27s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP27" readonly></textarea>
                                                <label for="txtComentarioGeneralP27">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 28 -->
                <div class="col-md-12 my-2 _card-border" id="contenedorHideP28s1">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.1 Bienes inmuebles</h6>
                        <label class="text-justify letraLabel">
                            <span class="front-weight-bold h5">28.-</span>
                            De acuerdo con el total de bienes inmuebles que reportó como respuesta en la pregunta 24, anote la cantidad de los mismos que tuvieron como uso principal el apoyo a funciones de salud.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="5" colspan="3">Nombre de las instituciones</td>
                                        <td class="" colspan="10">Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones de salud (1. + 2.)</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td colspan="4"></td>
                                        <td colspan="2" id="txtTotalInmueblesP28">
                                            300000
                                        </td>
                                        <td colspan="4"></td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td colspan="5">1. Bienes inmuebles registrados por instituciones con función principal "Salud" (1.1 + 1.2 + 1.3 + 1.4 + 1.5)</td>
                                        <td colspan="5">2. Bienes inmuebles registrados por instituciones con otro tipo de función principal (2.1 + 2.2 + 2.3 + 2.4 + 2.5)</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td colspan="2"></td>
                                        <td colspan="1" id="txtTotalInmuebles1P28">
                                            150000
                                        </td>
                                        <td colspan="2"></td>
                                        <td colspan="2"></td>
                                        <td colspan="1" id="txtTotalInmuebles2P28">
                                            150000
                                        </td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="px-1">1.1 Bienes inmuebles usados como clínicas</td>
                                        <td class="px-1">1.2 Bienes inmuebles usados como centros de salud</td>
                                        <td class="px-1">1.3 Bienes inmuebles usados como hospitales</td>
                                        <td class="px-1">1.4 Bienes inmuebles usados para otro tipo de apoyo a funciones de salud</td>
                                        <td class="px-1">1.5 Bienes inmuebles usados de forma mixta</td>

                                        <td class="px-1">2.1 Bienes inmuebles usados como clínicas</td>
                                        <td class="px-1">2.2 Bienes inmuebles usados como centros de salud</td>
                                        <td class="px-1">2.3 Bienes inmuebles usados como hospitales</td>
                                        <td class="px-1">2.4 Bienes inmuebles usados para otro tipo de apoyo a funciones de salud</td>
                                        <td class="px-1">2.5 Bienes inmuebles usados de forma mixta</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP28S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP28s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP28s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP28s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP28s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP28" readonly></textarea>
                                                <label for="txtComentarioGeneralP28">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 29 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.1 Bienes inmuebles</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">29.- </span>
                            A partir de la información que reportó como respuesta en la pregunta 24, señale si se contabilizaron bienes inmuebles cuyo uso principal fue la realización de activación física, cultura física y/o deporte.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered table-responsive">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" width="60%" colspan="3">Nombre de las instituciones</td>
                                        <td class="align-middle">¿Se contabilizaron bienes inmuebles cuyo uso principal fue la realización de activación física, cultura física y/o deporte?</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP29S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP29s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP29" readonly></textarea>
                                                <label for="txtComentarioGeneralP29">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 30 -->
                <div class="col-md-12 my-2 _card-border" id="contenedorHide30s1">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.1 Bienes inmuebles</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">30.-</span>
                            De acuerdo con el total de bienes inmuebles que reportó como respuesta en la pregunta 24, anote la cantidad de los mismos que tuvieron como uso principal la realización de activación física, cultura física y/o deporte.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr class="_header-size text-center">
                                        <td class="text-dark align-middle font-weight-bold px-3" id="txtTotalInmueblesP30">0</td>
                                        <td class="text-left px-3" colspan="6">Total de bienes inmuebles que tuvieron como uso principal la realización de activación física, cultura física y/o deporte (1. + 2.)</td>
                                    </tr>
                                    <tr class="_header-size text-center">
                                        <td></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotalInmuebles1P30">0</td>
                                        <td class="text-left align-middle px-3" colspan="5">
                                            1. Bienes inmuebles registrados por instituciones con función principal "Cultura física y/o deporte" (1.1 + 1.2 + 1.3 + 1.4 + 1.5 + 1.6 + 1.7)</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal1x1P30">0</td>
                                        <td class="text-left align-middle px-3">1.1 Bienes inmuebles destinados a la realización de actividades físicas y/o activación física</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal1x2P30">0</td>
                                        <td class="text-left align-middle px-3">1.2 Bienes inmuebles destinados a la realización de recreación física</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal1x3P30">0</td>
                                        <td class="text-left align-middle px-3">1.3 Bienes inmuebles destinados a la realización de deporte y/o deporte social</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal1x4P30">0</td>
                                        <td class="text-left align-middle px-3">1.4 Bienes inmuebles destinados a la realización de deporte de rendimiento y/o deporte de alto rendimiento</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal1x5P30">0</td>
                                        <td class="text-left align-middle px-3">1.5 Bienes inmuebles destinados a la realización de eventos deportivos, eventos deportivos masivos y/o eventos deportivos con fines de espectáculo</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal1x6P30">0</td>
                                        <td class="text-left align-middle px-3">1.6 Bienes inmuebles destinados a otro tipo de actividades de activación física, cultura física y deporte</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal1x7P30">0</td>
                                        <td class="text-left align-middle px-3">1.7 Bienes inmuebles destinados indistintamente a las funciones establecidas con anterioridad</td>
                                    </tr>
                                    <!-- Segunda Seccion -->
                                    <tr class="_header-size text-center">
                                        <td></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotalInmuebles2P30">0</td>
                                        <td class="text-left align-middle px-3" colspan="4">
                                            2. Bienes inmuebles registrados por instituciones con otro tipo de función principal (2.1 + 2.2 + 2.3 + 2.4 + 2.5 + 2.6 + 2.7)
                                        </td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal2x1P30">0</td>
                                        <td class="text-left align-middle px-3">2.1 Bienes inmuebles destinados a la realización de actividades físicas y/o activación física</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal2x2P30">0</td>
                                        <td class="text-left align-middle px-3">2.2 Bienes inmuebles destinados a la realización de recreación física</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal2x3P30">0</td>
                                        <td class="text-left align-middle px-3">2.3 Bienes inmuebles destinados a la realización de deporte y/o deporte social</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal2x4P30">0</td>
                                        <td class="text-left align-middle px-3">2.4 Bienes inmuebles destinados a la realización de deporte de rendimiento y/o deporte de alto rendimiento</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal2x5P30">0</td>
                                        <td class="text-left align-middle px-3">2.5 Bienes inmuebles destinados a la realización de eventos deportivos, eventos deportivos masivos y/o eventos deportivos con fines de espectáculo</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal2x6P30">0</td>
                                        <td class="text-left align-middle px-3">2.6 Bienes inmuebles destinados a otro tipo de actividades de activación física, cultura física y deporte</td>
                                    </tr>
                                    <tr class="_header-size">
                                        <td colspan="2"></td>
                                        <td class="text-dark text-center font-weight-bold align-middle" id="txtTotal2x7P30">0</td>
                                        <td class="text-left align-middle px-3">2.7 Bienes inmuebles destinados indistintamente a las funciones establecidas con anterioridad</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP30s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP30s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP30s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP30s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP30" readonly></textarea>
                                                <label for="txtComentarioGeneralP30">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 31 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.2 Parque vehicular</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">31.- </span>
                            Anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de vehículos en funcionamiento con los que contaba al cierre del año 2020, según tipo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="2" colspan="3" width="35%">Nombre de las instituciones</td>
                                        <td class="text-center" colspan="8">Vehículos en funcionamiento, según tipo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center px-3">Total</td>
                                        <td class="text-center px-2">Automóviles</td>
                                        <td class="text-center px-2">Camiones y camionetas</td>
                                        <td class="text-center px-2">Motocicletas</td>
                                        <td class="text-center px-2">Bicicletas</td>
                                        <td class="text-center px-2">Helicópteros</td>
                                        <td class="text-center px-2">Drones</td>
                                        <td class="text-center px-2">Otro tipo de vehiculos</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP31S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP31s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP31s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP31s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP31s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP31" readonly></textarea>
                                                <label for="txtComentarioGeneralP31">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 32 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.3 Líneas y aparatos telefónicos</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">32.- </span>
                            Anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de líneas telefónicas y aparatos telefónicos en funcionamiento con los que contaba al cierre del año 2020, según tipo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="2" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center" colspan="3">Líneas telefónicas en funcionamiento, según tipo</td>
                                        <td class="text-center" colspan="3">Aparatos telefónicos en funcionamiento, según tipo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center font-weight-bold px-4">Total</td>
                                        <td class="text-center px-3">Fijas</td>
                                        <td class="text-center px-3">Moviles</td>
                                        <td class="text-center font-weight-bold px-4">Total</td>
                                        <td class="text-center px-3">Fijos</td>
                                        <td class="text-center px-3">Moviles</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP32S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP32s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP32" readonly></textarea>
                                                <label for="txtComentarioGeneralP32">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 33 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.4 Equipo informático</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">33.- </span>
                            Anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de computadoras e impresoras, según tipo, así como de multifuncionales, servidores y tabletas electrónicas con los que contaba al cierre del año 2020. Asimismo, indique si durante el referido año contó con servicios de conexión remota.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="2" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center" colspan="6">Computadoras, según tipo</td>
                                        <td class="text-center" colspan="6">Impresoras, según tipo</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Multifuncionales</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Servidores</td>
                                        <td class="text-center align-middle px-1" rowspan="2">Tabletas electrónicas</td>
                                        <td class="text-center align-middle px-3" rowspan="2">¿Contó con servicios de conexión remota?</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle font-weight-bold px-3" colspan="2">Total</td>
                                        <td class="text-center align-middle px-2" colspan="2">Personales <small>(de escritorio)</small></td>
                                        <td class="text-center align-middle px-2" colspan="2">Portátiles</td>
                                        <td class="text-center align-middle font-weight-bold px-3" colspan="2">Total</td>
                                        <td class="text-center align-middle px-2" colspan="2">Para uso personal</td>
                                        <td class="text-center align-middle px-2" colspan="2">Para uso compartido</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP33S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP33s1" class="contenedorDeComentarios">
                                        <td colspan="9">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP33s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP33s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP33s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP33" readonly></textarea>
                                                <label for="txtComentarioGeneralP33">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 34 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.4 Equipo informático</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">34.- </span>
                            A partir de la información que reportó como respuesta en la pregunta anterior, señale si se contabilizaron computadoras, impresoras,multifuncionales, servidores y tabletas electrónicas asignadas a profesores y estudiantes exclusivamente para ser utilizadas con fines educativos y de enseñanza.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" width="60%" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-justify align-middle">¿Se contabilizaron computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas asignadas a profesores y estudiantes exclusivamente para ser utilizadas con fines educativos y de enseñanza?</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP34S1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP34s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP34" readonly></textarea>
                                                <label for="txtComentarioGeneralP34">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 35 -->
                <div class="col-md-12 my-2 _card-border" id="contenedorP30S1">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I.4 Recursos materiales</h5>
                        <h6 class="text-danger">I.4.4 Equipo informático</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">35.- </span>
                            De acuerdo con el total de computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas que reportó como respuesta en la pregunta 33, anote la cantidad de las mismas que se asignaron exclusivamente para ser utilizadas con fines educativos y de enseñanza.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr class="text-center text-dark">
                                        <td class="font-weight-bold" colspan="2" id="txtEsconder">Institucion : </td>
                                        <td class="font-weight-bold" colspan="10" id="txtnombreInstitucion">comision estatal para el desarrollo sostenible de los pueblos indigenas (cedspi)</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-justify px-3" colspan="2">1. Total de computadoras utilizadas exclusivamente con fines educativos y de enseñanza (1.1 + 1.2)</td>
                                        <td class="text-justify px-3" colspan="2">2. Total de impresoras utilizadas exclusivamente con fines educativos y de enseñanza (2.1 + 2.2)</td>
                                        <td class="text-justify px-3" colspan="2">3. Total de multifuncionales utilizados exclusivamente con fines educativos y de enseñanza (3.1 + 3.2)</td>
                                        <td class="text-justify px-3" colspan="2">4. Total de servidores utilizados exclusivamente con fines educativos y de enseñanza (4.1 + 4.2)</td>
                                        <td class="text-justify px-3" colspan="2">5. Total de tabletas electrónicas utilizadas exclusivamente con fines educativos y de enseñanza (5.1 + 5.2)</td>
                                    </tr>
                                    <tr class="text-center font-weight-bold">
                                        <td colspan="2" id="txtTotal1P35">
                                            0
                                        </td>
                                        <td colspan="2" id="txtTotal2P35">
                                            0
                                        </td>
                                        <td colspan="2" id="txtTotal3P35">
                                            0
                                        </td>
                                        <td colspan="2" id="txtTotal4P35">
                                            0
                                        </td>
                                        <td colspan="2" id="txtTotal5P35">
                                            0
                                        </td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center px-2">1.1 Registradas por instituciones con función principal "Educación"</td>
                                        <td class="text-center px-2">1.2 Registradas por instituciones con otro tipo de función principal</td>
                                        <td class="text-center px-2">2.1 Registradas por instituciones con función principal "Educación"</td>
                                        <td class="text-center px-2">2.2 Registradas por instituciones con otro tipo de función principal</td>
                                        <td class="text-center px-2">3.1 Registradas por instituciones con función principal "Educación"</td>
                                        <td class="text-center px-2">3.2 Registradas por instituciones con otro tipo de función principal</td>
                                        <td class="text-center px-2">4.1 Registrados por instituciones con función principal "Educación básica"</td>
                                        <td class="text-center px-2">4.2 Registrados por instituciones con otro tipo de función principal</td>
                                        <td class="text-center px-2">5.1 Registrados por instituciones con función principal "Educación básica"</td>
                                        <td class="text-center px-2">5.2 Registrados por instituciones con otro tipo de función principal</td>
                                    </tr>
                                    <tr class="text-center font-weight-bold">

                                        <td id="txtTotal1x1P35">
                                            0
                                        </td>
                                        <td id="txtTotal1x2P35">
                                            0
                                        </td>
                                        <td id="txtTotal2x1P35">
                                            0
                                        </td>
                                        <td id="txtTotal2x2P35">
                                            0
                                        </td>
                                        <td id="txtTotal3x1P35">
                                            0
                                        </td>
                                        <td id="txtTotal3x2P35">
                                            0
                                        </td>
                                        <td id="txtTotal4x1P35">
                                            0
                                        </td>
                                        <td id="txtTotal4x2P35">
                                            0
                                        </td>
                                        <td id="txtTotal5x1P35">
                                            0
                                        </td>
                                        <td id="txtTotal5x2P35">
                                            0
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP35s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP35s1" readonly></textarea>
                                                <label for="txtDatosEspecificosP35s1">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP35s1" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP35" readonly></textarea>
                                                <label for="txtComentarioGeneralP35">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Complement -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">I. Estructura organizacional y recursos</h5>
                        <label class="text-justify letraLabel">
                            <span class="text-uppercase font-weight-bold h6">Complemento.- </span>
                            Personal fallecido por COVID-19 adscrito a las instituciones de la Administración Pública de la entidad federativa.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" rowspan="2" colspan="3">Nombre de las instituciones</td>
                                        <td class="text-center" colspan="3">Personal fallecido por COVID-19 adscrito a las instituciones de la Administración Pública de la entidad federativa, según sexo</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center font-weight-bold">Total</td>
                                        <td class="text-center">Hombres</td>
                                        <td class="text-center">Mujeres</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionPComplementS1"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralComplementos1" class="contenedorDeComentarios">
                                        <td colspan="4">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralComplementoS1" readonly></textarea>
                                                <label for="txtComentarioGeneralComplementoS1">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 1 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.1 Elementos y mecanismos institucionales para las contrataciones públicas</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">1.- </span>
                            Indique, por cada uno de los tipos de materia, si al cierre del año 2020 su entidad federativa contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Púbica Estatal. En caso afirmativo, anote el nombre de dicha(s) disposición(es).
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" colspan="3" rowspan="2" width="22%">Nombre de instituciones</td>
                                        <td class="text-center font-weight-bold px-2 align-middle" colspan="6">1.- Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center font-weight-bold px-2 align-middle" colspan="6">2.- Obra pública y servicios relacionados con la misma</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center px-1" colspan="3" width="10%">¿Su entidad federativa contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal?</td>
                                        <td class="text-center align-middle" colspan="3" width="20%">Nombre de la disposición normativa</td>
                                        <td class="text-center px-1" colspan="3" width="10%">¿Su entidad federativa contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal?</td>
                                        <td class="text-center align-middle" colspan="3" width="20%">Nombre de la disposición normativa</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP1S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP1s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP1s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP1s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 2 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.1 Elementos y mecanismos institucionales para las contrataciones públicas</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">2.- </span>
                            Indique, por cada uno de los tipos de materia, los procedimientos de contratación contemplados al cierre del año 2020 en la disposición normativa que regulaba las contrataciones públicas de la Administración Pública de su entidad federativa.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <div class="text-right px-2">
                                <h5>(Parte 1 de 2)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="align-middle" colspan="1" rowspan="3" width="10%">No aplica</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="6">Tipo de materia: 1.- Adquisiciones, arrendamientos y servicios</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center" colspan="6" width="60%">Procedimientos de contratación</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle">Adjudicación directa</td>
                                        <td class="text-center align-middle" width="18%">Invitación a cuando menos tres personas o invitación restringida</td>
                                        <td class="text-center align-middle">Licitación pública nacional</td>
                                        <td class="text-center align-middle">Licitación pública internacional</td>
                                        <td class="text-center align-middle">Otro procedimiento (especifique)</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionMateria1P2S12"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 2 de 2)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="align-middle" colspan="1" rowspan="3" width="10%">No aplica</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="6">Tipo de materia: 2.- Obra pública y servicios relacionados con la misma</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center" colspan="6" width="60%">Procedimientos de contratación</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle">Adjudicación directa</td>
                                        <td class="text-center align-middle" width="18%">Invitación a cuando menos tres personas o invitación restringida</td>
                                        <td class="text-center align-middle">Licitación pública nacional</td>
                                        <td class="text-center align-middle">Licitación pública internacional</td>
                                        <td class="text-center align-middle">Otro procedimiento (especifique)</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionMateria2P2S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP2s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP2s12" readonly></textarea>
                                                <label for="txtDatosEspecificosP2s12">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP2s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP2s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP2s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 3 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.1 Elementos y mecanismos institucionales para las contrataciones públicas</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">3.- </span>
                            Indique, por cada uno de los tipos de materia, si al cierre del año 2020 la disposición normativa que regulaba las contrataciones públicas de la Administración Pública de su entidad federativa contaba con mecanismos de salvaguarda institucional. En caso afirmativo, señale los mecanismos de salvaguarda contemplados al cierre del referido año, utilizando para tal efecto el catálogo correspondiente.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <div class="text-right px-2">
                                <h5>(Parte 1 de 2)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="align-middle" colspan="1" rowspan="3" width="10%">No aplica</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="17">Tipo de materia: 1.- Adquisiciones, arrendamientos y servicios</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="1" rowspan="2">¿Contaba con mecanismos de salvaguarda institucional?</td>
                                        <td class="align-middle" colspan="16">Mecanismos de salvaguarda institucional(ver catálogo)</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle">1</td>
                                        <td class="align-middle">2</td>
                                        <td class="align-middle">3</td>
                                        <td class="align-middle">4</td>
                                        <td class="align-middle">5</td>
                                        <td class="align-middle">6</td>
                                        <td class="align-middle">7</td>
                                        <td class="align-middle">8</td>
                                        <td class="align-middle">9</td>
                                        <td class="align-middle">10</td>
                                        <td class="align-middle">11</td>
                                        <td class="align-middle">12</td>
                                        <td class="align-middle">13</td>
                                        <td class="align-middle">14</td>
                                        <td class="align-middle">15</td>
                                        <td class="align-middle">16</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionMateria1P3S12"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 2 de 2)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="align-middle" colspan="1" rowspan="3" width="10%">No aplica</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="17">Tipo de materia: 2.- Obra pública y servicios relacionados con la misma</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="1" rowspan="2">¿Contaba con mecanismos de salvaguarda institucional?</td>
                                        <td class="align-middle" colspan="16">Mecanismos de salvaguarda institucional(ver catálogo)</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle">1</td>
                                        <td class="align-middle">2</td>
                                        <td class="align-middle">3</td>
                                        <td class="align-middle">4</td>
                                        <td class="align-middle">5</td>
                                        <td class="align-middle">6</td>
                                        <td class="align-middle">7</td>
                                        <td class="align-middle">8</td>
                                        <td class="align-middle">9</td>
                                        <td class="align-middle">10</td>
                                        <td class="align-middle">11</td>
                                        <td class="align-middle">12</td>
                                        <td class="align-middle">13</td>
                                        <td class="align-middle">14</td>
                                        <td class="align-middle">15</td>
                                        <td class="align-middle">16</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionMateria2P3S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP3s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP3s12" readonly></textarea>
                                                <label for="txtDatosEspecificosP3s12">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP3s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP3s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP3s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 4 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.1 Elementos y mecanismos institucionales para las contrataciones públicas</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">4.- </span>
                            Indique si actualmente la Administración Pública de su entidad federativa cuenta con un sistema electrónico de contrataciones públicas. En caso afirmativo, especifique el lugar donde se encuentra disponible o, en su defecto, la no disponibilidad del mismo.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="3" width="32%">Nombre de instituciones</td>
                                        <td class="text-justify">¿La Administración Pública de su entidad federativa cuenta con un sistema electrónico de contrataciones públicas?</td>
                                        <td class="text-center align-middle" width="45%">Sitio donde se encuentra disponible el sistema electrónico de contrataciones públicas (URL):</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP4S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP4s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP4s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP4s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 5 -->
                <div class="col-md-12 my-2 _card-border" id="contenedorP5S12">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.1 Elementos y mecanismos institucionales para las contrataciones públicas</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">5.- </span>
                            Señale las etapas de los procedimientos de contratación registradas en el sistema electrónico de contrataciones públicas de la Administración Pública de su entidad federativa.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="3" width="22%">Nombre de instituciones</td>
                                        <td class="text-center align-middle px-1">1. Convocatoria pública e invitación</td>
                                        <td class="text-center align-middle px-1">2. Junta de aclaraciones</td>
                                        <td class="text-center align-middle px-1">3. Acto de presentación y apertura de proposiciones</td>
                                        <td class="text-center align-middle px-1">4. Declaración de licitación desierta</td>
                                        <td class="text-center align-middle px-1">5. Cancelación</td>
                                        <td class="text-center align-middle px-1">6. Emisión del fallo y adjudicación</td>
                                        <td class="text-center align-middle px-1">7. Contratación</td>
                                        <td class="text-center align-middle px-1">8. Otra etapa (especifique)</td>
                                        <td class="text-center align-middle px-1" width="8%">9. No se sabe</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP5S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP5s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP5s12" readonly></textarea>
                                                <label for="txtDatosEspecificosP5s12">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP5s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP5s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP5s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 6 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.2 Sistemas de información</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">6.- </span>
                            Indique, por cada uno de los sistemas de información listados, si la Administración Pública de su entidad federativa contaba con él al cierre del año 2020. En caso afirmativo, señale el tipo de formato en el que se encontraba y la frecuencia de la actualización de la información contenida, utilizando para tal efecto los catálogos que se presentan al final de la siguiente tabla. Asimismo, anote la cantidad de proveedores, proveedores sancionados, contratistas, contratistas sancionados, testigos sociales y servidores públicos, según corresponda, registrados en cada uno de dichos sistemas.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <div class="text-right px-2">
                                <h5>(Parte 1 de 3)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="2" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="font-weight-bold" colspan="4">1.- Sistema de proveedores</td>
                                        <td class="font-weight-bold" colspan="4">2.- Sistema de proveedores sancionados</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="text-justify align-middle" width="19%">¿La Administración Pública de su entidad federativa contaba con el sistema?</td>
                                        <td class="text-center align-middle" width="9%">Tipo de formato(ver catálogo)</td>
                                        <td class="text-center align-middle" width="12%">Frecuencia de actualización de la información(ver catálogo)</td>
                                        <td class="text-center align-middle" width="8%">Cantidad registrada</td>
                                        <td class="text-justify align-middle" width="19%">¿La Administración Pública de su entidad federativa contaba con el sistema?</td>
                                        <td class="text-center align-middle" width="9%">Tipo de formato(ver catálogo)</td>
                                        <td class="text-center align-middle" width="12%">Frecuencia de actualización de la información(ver catálogo)</td>
                                        <td class="text-center align-middle" width="8%">Cantidad registrada</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionTipoSistema12P6S12"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 2 de 3)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="2" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="font-weight-bold" colspan="4">3.- Sistema de contratistas</td>
                                        <td class="font-weight-bold" colspan="4">4.- Sistema de contratistas sancionados</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="text-justify align-middle" width="19%">¿La Administración Pública de su entidad federativa contaba con el sistema?</td>
                                        <td class="text-center align-middle" width="9%">Tipo de formato(ver catálogo)</td>
                                        <td class="text-center align-middle" width="12%">Frecuencia de actualización de la información(ver catálogo)</td>
                                        <td class="text-center align-middle" width="8%">Cantidad registrada</td>
                                        <td class="text-justify align-middle" width="19%">¿La Administración Pública de su entidad federativa contaba con el sistema?</td>
                                        <td class="text-center align-middle" width="9%">Tipo de formato(ver catálogo)</td>
                                        <td class="text-center align-middle" width="12%">Frecuencia de actualización de la información(ver catálogo)</td>
                                        <td class="text-center align-middle" width="8%">Cantidad registrada</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionTipoSistema34P6S12"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 3 de 3)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="2" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="font-weight-bold" colspan="4">5.- Sistema de testigos sociales</td>
                                        <td class="font-weight-bold" colspan="4">6.- Sistema de servidores públicos que intervienen en procedimientos de contratación pública</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="text-justify align-middle" width="19%">¿La Administración Pública de su entidad federativa contaba con el sistema?</td>
                                        <td class="text-center align-middle" width="9%">Tipo de formato(ver catálogo)</td>
                                        <td class="text-center align-middle" width="12%">Frecuencia de actualización de la información(ver catálogo)</td>
                                        <td class="text-center align-middle" width="8%">Cantidad registrada</td>
                                        <td class="text-justify align-middle" width="19%">¿La Administración Pública de su entidad federativa contaba con el sistema?</td>
                                        <td class="text-center align-middle" width="9%">Tipo de formato(ver catálogo)</td>
                                        <td class="text-center align-middle" width="12%">Frecuencia de actualización de la información(ver catálogo)</td>
                                        <td class="text-center align-middle" width="8%">Cantidad registrada</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionTipoSistema56P6S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosEspecificosP6s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtDatosEspecificosP6s12" readonly></textarea>
                                                <label for="txtDatosEspecificosP6s12">Especificaciones de la información...</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="contenedorComentariosGeneralP6s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP6s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP6s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 7 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.3 Contratos</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">7.- </span>
                            Anote la cantidad de contratos realizados durante el año 2020 por la Administración Pública de su entidad federativa con proveedores y/o contratistas, según el tipo de procedimiento de contratación.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table>
                                <tbody>
                                    <tr class="text-center" style="font-size:14px">
                                        <td class="text-justify align-middle px-3 py-2">* Total de contratos realizados:</td>
                                        <td class="text-dark font-weight-bold align-middle" id="identifierQuestionSumaTotalContratosP7S12">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="28%">Nombre de instituciones</td>
                                        <td colspan="10">Tipo de procedimiento de contratación</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="px-2 align-middle" colspan="2">1. Adjudicación directa</td>
                                        <td class="px-2 align-middle" colspan="2">2. Invitación a cuando menos tres personas o invitación restringida</td>
                                        <td class="px-2 align-middle" colspan="2">3. Licitación pública nacional</td>
                                        <td class="px-2 align-middle" colspan="2">4. Licitación pública internacional</td>
                                        <td class="px-2 align-middle" colspan="2">5. Otro procedimiento</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" width="12%">No aplica
                                        </td>
                                        <td class="align-middle">Contratos realizados</td>
                                        <td class="align-middle" width="12%">No aplica
                                        </td>
                                        <td class="align-middle">Contratos realizados</td>
                                        <td class="align-middle" width="12%">No aplica
                                        </td>
                                        <td class="align-middle">Contratos realizados</td>
                                        <td class="align-middle" width="12%">No aplica
                                        </td>
                                        <td class="align-middle">Contratos realizados</td>
                                        <td class="align-middle" width="12%">No aplica
                                        </td>
                                        <td class="align-middle">Contratos realizados</td>
                                    </tr>
                                </thead>
                                <tfoot id="identifierQuestionSumaContratosP7S12"></tfoot>
                                <tbody id="identifierQuestionP7S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP7s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP7s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP7s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 8 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.3 Contratos</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">8.- </span>
                            De acuerdo con el total de contratos que reportó como respuesta en la pregunta anterior, anote la cantidad de los mismos especificando el tipo de materia.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table>
                                <tbody id="identifierQuestionSumaTotalContratosP8S12">
                                    <tr class="text-center" style="font-size:14px">
                                        <td class="text-justify align-middle px-3" width="15%">Total de contratos realizados:</td>
                                        <td class="text-dark font-weight-bold align-middle" id="totalContratosP8S12">0</td>
                                        <td class="text-justify align-middle px-2" width="30%">Contratos realizados, según tipo de materia de Adquisiciones, arrendamientos y servicios:</td>
                                        <td class="text-dark font-weight-bold align-middle" id="totalContratos1P8S12">0</td>
                                        <td class="text-justify align-middle px-2" width="30%">Contratos realizados, según tipo de materia de Obra pública y servicios relacionados con la misma:</td>
                                        <td class="text-dark font-weight-bold align-middle px-2" id="totalContratos2P8S12">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 1 de 3)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="4">Tipo de procedimiento: 1.-Adjudicación directa</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="4">Tipo de procedimiento: 2.-Invitación a cuando menos tres personas o invitación restringida</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="1" rowspan="2" width="7%">No aplica</td>
                                        <td class="text-center" colspan="3" width="40%">Contratos realizados, según tipo de materia</td>
                                        <td class="align-middle" colspan="1" rowspan="2" width="8%">No aplica</td>
                                        <td class="text-center" colspan="3" width="40%">Contratos realizados, según tipo de materia</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" width="7%">Total</td>
                                        <td class="text-center align-middle" width="11%">Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center align-middle" width="12%">Obra pública y servicios relacionados con la misma</td>
                                        <td class="text-center align-middle" width="8%">Total</td>
                                        <td class="text-center align-middle" width="11%">Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center align-middle" width="12%">Obra pública y servicios relacionados con la misma</td>
                                    </tr>
                                </thead>
                                <tfoot id="identifierQuestionSumaContratos12P8S12"></tfoot>
                                <tbody id="identifierQuestionTipoProcedimiento12P8S12"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 2 de 3)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="4">Tipo de procedimiento: 3.-Licitación pública nacional</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="4">Tipo de procedimiento: 4.-Licitación pública internacional</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="1" rowspan="2" width="7%">No aplica</td>
                                        <td class="text-center" colspan="3" width="40%">Contratos realizados, según tipo de materia</td>
                                        <td class="align-middle" colspan="1" rowspan="2" width="8%">No aplica</td>
                                        <td class="text-center" colspan="3" width="40%">Contratos realizados, según tipo de materia</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" width="7%">Total</td>
                                        <td class="text-center align-middle" width="11%">Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center align-middle" width="12%">Obra pública y servicios relacionados con la misma</td>
                                        <td class="text-center align-middle" width="8%">Total</td>
                                        <td class="text-center align-middle" width="11%">Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center align-middle" width="12%">Obra pública y servicios relacionados con la misma</td>
                                    </tr>
                                </thead>
                                <tfoot id="identifierQuestionSumaContratos34P8S12"></tfoot>
                                <tbody id="identifierQuestionTipoProcedimiento34P8S12"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 3 de 3)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="4">Tipo de procedimiento: 5.-Otro procedimiento</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="1" rowspan="2" width="5%">No aplica</td>
                                        <td class="text-center" colspan="3" width="40%">Contratos realizados, según tipo de materia</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" width="8%">Total</td>
                                        <td class="text-center align-middle" width="11%">Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center align-middle" width="12%">Obra pública y servicios relacionados con la misma</td>
                                    </tr>
                                </thead>
                                <tfoot id="identifierQuestionSumaContratos5P8S12"></tfoot>
                                <tbody id="identifierQuestionTipoProcedimiento5P8S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP8s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP8s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP8s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 9 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.3 Contratos</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">9.- </span>
                            Anote el monto asociado a los contratos realizados durante el año 2020 por la Administración Pública de su entidad federativa con proveedores y/o contratistas, según el tipo de procedimiento de contratación.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr class="text-center" style="font-size:14px">
                                        <td class="text-justify align-middle px-3 py-2">* Monto asociado a los contratos realizados:</td>
                                        <td class="text-dark font-weight-bold align-middle" id="totalMontoP9S12">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="28%">Nombre de instituciones</td>
                                        <td colspan="10">Tipo de procedimiento de contratación</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="px-2 align-middle" colspan="2">1. Adjudicación directa</td>
                                        <td class="px-2 align-middle" colspan="2">2. Invitación a cuando menos tres personas o invitación restringida</td>
                                        <td class="px-2 align-middle" colspan="2">3. Licitación pública nacional</td>
                                        <td class="px-2 align-middle" colspan="2">4. Licitación pública internacional</td>
                                        <td class="px-2 align-middle" colspan="2">5. Otro procedimiento</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" width="7%">No aplica</td>
                                        <td class="align-middle" width="10%">Monto asociado a los contratos realizados</td>
                                        <td class="align-middle" width="7%">No aplica</td>
                                        <td class="align-middle" width="10%">Monto asociado a los contratos realizados</td>
                                        <td class="align-middle" width="7%">No aplica</td>
                                        <td class="align-middle" width="10%">Monto asociado a los contratos realizados</td>
                                        <td class="align-middle" width="7%">No aplica</td>
                                        <td class="align-middle" width="10%">Monto asociado a los contratos realizados</td>
                                        <td class="align-middle" width="7%">No aplica</td>
                                        <td class="align-middle" width="10%">Monto asociado a los contratos realizados</td>
                                    </tr>
                                </thead>
                                <tfoot id="identifierQuestionMontoAsociadoP9S12"></tfoot>
                                <tbody id="identifierQuestionP9S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP9s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP9s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP9s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 10 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.3 Contratos</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">10.- </span>
                            De acuerdo con el monto que reportó como respuesta en la pregunta anterior, anote la cantidad del mismo especificando el tipo de materia.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table>
                                <tbody>
                                    <tr class="text-center" style="font-size:14px">
                                        <td class="text-justify align-middle px-3" width="15%">Monto total asociado a los contratos realizados:</td>
                                        <td class="text-dark font-weight-bold align-middle" id="totalMontoP10S12">0</td>
                                        <td class="text-justify align-middle px-3" width="30%">Monto asociado a los contratos realizados, según tipo de materia de Adquisiciones, arrendamientos y servicios:</td>
                                        <td class="text-dark font-weight-bold align-middle" id="totalMonto1P10S12">0</td>
                                        <td class="text-justify align-middle px-3" width="30%">Monto asociado a los contratos realizados, según tipo de materia de Obra pública y servicios relacionados con la misma:</td>
                                        <td class="text-dark font-weight-bold align-middle px-2" id="totalMonto2P10S12">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 1 de 3)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="4">Tipo de procedimiento: 1.-Adjudicación directa</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="4">Tipo de procedimiento: 2.-Invitación a cuando menos tres personas o invitación restringida</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="1" rowspan="2" width="7%">No aplica</td>
                                        <td class="text-center" colspan="3" width="40%">Monto asociado a los contratos realizados, según tipo de materia</td>
                                        <td class="align-middle" colspan="1" rowspan="2" width="8%">No aplica</td>
                                        <td class="text-center" colspan="3" width="40%">Monto asociado a los contratos realizados, según tipo de materia</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" width="7%">Total</td>
                                        <td class="text-center align-middle" width="11%">Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center align-middle" width="12%">Obra pública y servicios relacionados con la misma</td>
                                        <td class="text-center align-middle" width="8%">Total</td>
                                        <td class="text-center align-middle" width="11%">Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center align-middle" width="12%">Obra pública y servicios relacionados con la misma</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionTipoProcedimiento12P10S12"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 2 de 3)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="4">Tipo de procedimiento: 3.-Licitación pública nacional</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="4">Tipo de procedimiento: 4.-Licitación pública internacional</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="1" rowspan="2" width="7%">No aplica</td>
                                        <td class="text-center" colspan="3" width="40%">Monto asociado a los contratos realizados, según tipo de materia</td>
                                        <td class="align-middle" colspan="1" rowspan="2" width="8%">No aplica</td>
                                        <td class="text-center" colspan="3" width="40%">Monto asociado a los contratos realizados, según tipo de materia</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" width="7%">Total</td>
                                        <td class="text-center align-middle" width="11%">Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center align-middle" width="12%">Obra pública y servicios relacionados con la misma</td>
                                        <td class="text-center align-middle" width="8%">Total</td>
                                        <td class="text-center align-middle" width="11%">Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center align-middle" width="12%">Obra pública y servicios relacionados con la misma</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionTipoProcedimiento34P10S12"></tbody>
                            </table>
                            <div class="text-right px-2">
                                <h5>(Parte 3 de 3)</h5>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" rowspan="3" colspan="3" width="25%">Nombre de instituciones</td>
                                        <td class="font-weight-bold px-2 align-middle" colspan="4">Tipo de procedimiento: 5.-Otro procedimiento</td>
                                    </tr>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="1" rowspan="2" width="7%">No aplica</td>
                                        <td class="text-center" colspan="3" width="40%">Monto asociado a los contratos realizados, según tipo de materia</td>
                                    </tr>
                                    <tr class="_header-size text-dark">
                                        <td class="text-center align-middle" width="7%">Total</td>
                                        <td class="text-center align-middle" width="11%">Adquisiciones, arrendamientos y servicios</td>
                                        <td class="text-center align-middle" width="12%">Obra pública y servicios relacionados con la misma</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionTipoProcedimiento5P10S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP10s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP10s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP10s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 11 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.3 Contratos</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">11.- </span>
                            Indique si durante el año 2020 la Administración Pública de su entidad federativa implementó algún esquema de contratos o convenios marco. En caso afirmativo, anote el total de contratos o convenios marco realizados, así como el monto asociado a estos.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="3" width="34%">Nombre de instituciones</td>
                                        <td class="text-justify align-middle" width="27%">¿La Administración Pública de su entidad federativa implementó algún esquema de contratos o convenios marco?
                                        </td>
                                        <td class="text-center align-middle" width="20%">Total de contratos o convenios marco</td>
                                        <td class="text-center align-middle">Monto asociado a los contratos o convenios marco</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP11S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP11s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP11s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP11s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 12 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.3 Contratos</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">12.- </span>
                            Indique si durante el año 2020 la Administración Pública de su entidad federativa implementó algún esquema de contrataciones o compras consolidadas. En caso afirmativo, anote el total de contrataciones o compras consolidadas realizadas, así como el monto asociado a estas.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="3" width="34%">Nombre de instituciones</td>
                                        <td class="text-justify align-middle" width="27%">¿La Administración Pública de su entidad federativa implementó algún esquema de contrataciones o compras consolidadas?</td>
                                        <td class="text-center align-middle" width="20%">Total de contrataciones o compras consolidadas</td>
                                        <td class="text-center align-middle">Monto asociado a las contrataciones o compras consolidadas</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP12S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP12s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP12s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP12s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 13 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.3 Contratos</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">13.- </span>
                            Anote la cantidad de convenios modificatorios realizados durante el año 2020 por la Administración Pública de su entidad federativa con proveedores y/o contratistas.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="3" width="34%">Nombre de instituciones</td>
                                        <td class="text-center align-middle" width="20%">Total de convenios modificatorios</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP13S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP13s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP13s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP13s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- question 14 -->
                <div class="col-md-12 my-2 _card-border">
                    <div class="px-1 py-3">
                        <h5 class="text-danger">XII. Contrataciones públicas</h5>
                        <h6 class="text-danger">XII.4 Estudios de impacto urbano y ambiental</h6>
                        <label class="text-justify letraLabel">
                            <span class="font-weight-bold h5">14.- </span>
                            Anote la cantidad de estudios de impacto urbano y ambiental presentados durante el año 2020 para la realización de obras públicas.
                        </label>
                    </div>
                    <div class="card border-0 preguntaRespuesta">
                        <div class="card-body px-0 py-0">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="_header-size text-center text-dark">
                                        <td class="align-middle" colspan="3" width="34%">Nombre de instituciones</td>
                                        <td class="text-center align-middle" width="20%">Total de estudios de impacto urbano y ambiental</td>
                                    </tr>
                                </thead>
                                <tbody id="identifierQuestionP14S12"></tbody>
                            </table>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr id="contenedorComentariosGeneralP14s12" class="contenedorDeComentarios">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Comentarios.." id="txtComentarioGeneralP14s12" readonly></textarea>
                                                <label for="txtComentarioGeneralP14s12">Comentarios...</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>