<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark py-4 px-3 shadow-sm" style="z-index: 1;">
    <div id="btnToggle" class="toggle-btn">
        <i class="fas fa-lg fa-sliders-h"></i>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <button id="btnModalVideosDeAyuda" type="button" class="btn btn-transparent nav-link fw-light py-1" data-bs-toggle="modal" data-bs-target="#modalVideosDeAyuda">
                Guía rápida
            </button>
            <button id="btnModalInstrucccionesGeneralesS1" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalInstruccionesGeneralesS1">
                Instrucciones generales
            </button>
            <button id="btnModalGlosarioSubseccion1" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalGlosarioSubseccion1">
                Glosario de la subsección
            </button>
            <button id="btnModalPregunta1" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalPregunta1">
                Catálogos
            </button>
            <button id="btnModalPregunta3" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalPregunta3">
                Catálogos
            </button>
            <button id="btnModalSubseccion2y2" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalSubseccion2y2">
                Características del personal
            </button>
            <button id="btnModalSubseccion2y3" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalSubseccion2y3">
                Profesionalización del personal
            </button>
            <button id="btnModalSubseccion2y4" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalSubseccion2y4">
                Capacitación del personal
            </button>
            <button id="btnModalSubseccion4" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalSubseccion4">
                Recursos materiales
            </button>
            <button id="btnModalSubseccion4y1" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalSubseccion4y1">
                Bienes inmuebles
            </button>
            <button id="btnModalSubseccion4y2" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalSubseccion4y2">
                Parque vehicular
            </button>
            <button id="btnModalSubseccion4y4" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalSubseccion4y4">
                Equipo Informático
            </button>
            <button id="btnModalInstrucccionesGeneralesS12" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalInstruccionesGeneralesS12">
                Instrucciones generales
            </button>
            <button id="btnModalPregunta3s12" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalPregunta3s12">
                Catálogos
            </button>
            <button id="btnModalGlosarioSubseccionXII2" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalGlosarioSubseccionXII2">
                Glosario de la subsección
            </button>
            <button id="btnModalPregunta6s12" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalPregunta6s12">
                Catálogos
            </button>
            <button id="btnModalGlosarioSubseccionXII3" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalGlosarioSubseccionXII3">
                Instrucciones generales
            </button>
            <button id="btnModalGlosarioSubseccionXII4" type="button" class="btn btn-transparent nav-link fw-light py-1 ml-2 d-none" data-bs-toggle="modal" data-bs-target="#modalGlosarioSubseccionXII4">
                Glosario de la subsección
            </button>
        </ul>
        <div class="d-none d-lg-block py-3 mx-3" style="border: 1px solid #6C757D;"></div>
        <form class="form-inline my-2 my-lg-0 d-flex justify-content-end">
            <a class="nav-link text-white" href="http://oficialiamayor.hidalgo.gob.mx/" target="_blank">
                <i class="fas fa-external-link-alt"></i>
                Sitio Oficial
            </a>
            <a class="nav-link text-white" id="btnSalirCuestionario" href="#">
                <i class="fas fa-power-off"></i>
                Salir
            </a>
        </form>
    </div>
</nav>

<!-- MODAL DE AYUDA VIDEOS -->
<div class="modal fade" id="modalVideosDeAyuda" tabindex="-1" aria-labelledby="modalVideosDeAyudaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalVideosDeAyudaLabel">Posibles errores</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3 w-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-video5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-video5" type="button" role="tab" aria-controls="v-pills-video5" aria-selected="false">Introducción</button>
                        <button class="nav-link" id="v-pills-video1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-video1" type="button" role="tab" aria-controls="v-pills-video1" aria-selected="true">Campos específicos</button>
                        <button class="nav-link" id="v-pills-video2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-video2" type="button" role="tab" aria-controls="v-pills-video2" aria-selected="false">Campos vacíos</button>
                        <button class="nav-link" id="v-pills-video3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-video3" type="button" role="tab" aria-controls="v-pills-video3" aria-selected="false">Editar preguntas</button>
                        <button class="nav-link" id="v-pills-video4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-video4" type="button" role="tab" aria-controls="v-pills-video4" aria-selected="false">Funciones ejercidas</button>
                        <button class="nav-link" id="v-pills-video6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-video6" type="button" role="tab" aria-controls="v-pills-video6" aria-selected="false">Preguntas sin visualizar</button>
                        <button class="nav-link" id="v-pills-video7-tab" data-bs-toggle="pill" data-bs-target="#v-pills-video7" type="button" role="tab" aria-controls="v-pills-video7" aria-selected="false">Preguntas sin responder</button>
                        <button class="nav-link" id="v-pills-video8-tab" data-bs-toggle="pill" data-bs-target="#v-pills-video8" type="button" role="tab" aria-controls="v-pills-video8" aria-selected="false">Finalizar cuestionario</button>
                    </div>
                    <div class="tab-content w-100 d-flex align-items-center justify-content-center" id="v-pills-tabContent">
                        <div class="tab-pane fade" id="v-pills-video1" role="tabpanel" aria-labelledby="v-pills-video1-tab">
                            <video id="videoCamposEspecificos" src="views/static/video/CamposEspecificos2.mp4" width=854 height=480 controls allowfullscreen></video>
                        </div>
                        <div class="tab-pane fade" id="v-pills-video2" role="tabpanel" aria-labelledby="v-pills-video2-tab">
                            <video id="videoCamposVacios" src="views/static/video/CampoVacio.mp4" width=854 height=480 controls allowfullscreen></video>
                        </div>
                        <div class="tab-pane fade" id="v-pills-video3" role="tabpanel" aria-labelledby="v-pills-video3-tab">
                            <video id="videoEditarPreguntas" src="views/static/video/editarPreguntas.mp4" width=854 height=480 controls allowfullscreen></video>
                        </div>
                        <div class="tab-pane fade" id="v-pills-video4" role="tabpanel" aria-labelledby="v-pills-video4-tab">
                            <video id="videoFunciones" src="views/static/video/funcionesPrincipales.mp4" width=854 height=480 controls allowfullscreen></video>
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-video5" role="tabpanel" aria-labelledby="v-pills-video5-tab">
                            <video id="videoIntroduccion" src="views/static/video/introduccion.mp4" width=854 height=480 controls allowfullscreen></video>
                        </div>
                        <div class="tab-pane fade" id="v-pills-video6" role="tabpanel" aria-labelledby="v-pills-video6-tab">
                            <video id="videoPreguntasSinVizualizar" src="views/static/video/PreguntasDepender.mp4" width=854 height=480 controls allowfullscreen></video>
                        </div>
                        <div class="tab-pane fade" id="v-pills-video7" role="tabpanel" aria-labelledby="v-pills-video7-tab">
                            <video id="videoPreguntasSinRespuesta" src="views/static/video/preguntasEnGris.mp4" width=854 height=480 controls allowfullscreen></video>
                        </div>
                        <div class="tab-pane fade" id="v-pills-video8" role="tabpanel" aria-labelledby="v-pills-video8-tab">
                            <video id="videoFinalizarCuestionario" src="views/static/video/terminarCuestionario.mp4" width=854 height=480 controls allowfullscreen></video>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- MODALES DE AYUDA -->
<!-- Modal Instrucciones generales para las preguntas de la sección 1 -->
<div class="modal fade" id="modalInstruccionesGeneralesS1" tabindex="-1" aria-labelledby="modalInstruccionesGeneralesS1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalInstruccionesGeneralesS1Label">Instrucciones generales para las preguntas de la sección 1</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.-</span>
                        Periodo de referencia de los datos:
                    </span>
                <ul>
                    <li><span class="font-weight-bold">Durante el año: </span> información se refiere a lo existente del 1 de enero al 31 de diciembre de 2020.</li>
                    <li><span class="font-weight-bold">Al cierre del año: </span> la información se refiere a lo existente al 31 de diciembre de 2020.</li>
                </ul>
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 2.-</span>
                        Administración Pública Estatal Paraestatal:
                    </span> se refiere a las instituciones o entidades de la Administración Pública de la entidad federativa que, de acuerdo con la ley orgánica respectiva, fueron creadas para auxiliar al Poder Ejecutivo Estatal, tales como: los organismos descentralizados, las empresas de participación estatal, los fideicomisos públicos y las demás instituciones que la disposición en la materia establezca.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 3.-</span>
                        Función ejercida:
                    </span> se refiere a las funciones genéricas desarrolladas por las instituciones que integran a las administraciones públicas en el ámbito federal, estatal y municipal; funciones que se constituyen a partir de los objetivos que fundamentan su creación. Para efectos de este censo se consideran 29 funciones, mismas que se detallan en el glosario del presente cuestionario.
                </p>
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 4.-</span>
                        Instituciones:
                    </span> se refiere a aquellas organizaciones públicas que forman parte de la Administración Pública de la entidad federativa y, en consecuencia, se encuentran previstas en la respectiva ley orgánica; mismas que fueron creadas para el ejercicio de las atribuciones y despacho de los asuntos que corresponden al titular del Poder Ejecutivo Estatal.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal Glosario de la subsección -->
<div class="modal fade" id="modalGlosarioSubseccion1" tabindex="-1" aria-labelledby="modalGlosarioSubseccion1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalGlosarioSubseccion1Label">Glosario de la subsección</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.-</span>
                        Administración Pública Estatal Centralizada:
                    </span> se refiere al conjunto de instituciones o dependencias de la Administración Pública de la entidad federativa que, de acuerdo con la ley orgánica respectiva, fueron creadas para el despacho de los negocios de orden administrativo encomendados al Poder Ejecutivo Estatal, tales como: la oficina del(a) Gobernador(a) u homóloga, las secretarías, la consejería jurídica u homóloga y las demás instituciones que la disposición
                    normativa en la materia establezca.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 2.-</span>
                        Administración Pública Estatal Paraestatal:
                    </span> se refiere a las instituciones o entidades de la Administración Pública de la entidad federativa que, de acuerdo con la ley orgánica respectiva, fueron creadas para auxiliar al Poder Ejecutivo Estatal, tales como: los organismos descentralizados, las empresas de participación estatal, los fideicomisos públicos y las demás instituciones que la disposición en la materia establezca.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 3.-</span>
                        Función ejercida:
                    </span> se refiere a las funciones genéricas desarrolladas por las instituciones que integran a las administraciones públicas en el ámbito federal, estatal y municipal; funciones que se constituyen a partir de los objetivos que fundamentan su creación. Para efectos de este censo se consideran 29 funciones, mismas que se detallan en el glosario del presente cuestionario.
                </p>
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 4.-</span>
                        Instituciones:
                    </span> se refiere a aquellas organizaciones públicas que forman parte de la Administración Pública de la entidad federativa y, en consecuencia, se encuentran previstas en la respectiva ley orgánica; mismas que fueron creadas para el ejercicio de las atribuciones y despacho de los asuntos que corresponden al titular del Poder Ejecutivo Estatal.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal pregunta 1 -->
<div class="modal fade" id="modalPregunta1" tabindex="-1" aria-labelledby="modalPregunta1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalPregunta1Label">Catálogos</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de clasificación administrativa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Administración Pública Estatal Centralizada</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Administración Pública Estatal Paraestatal</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de tipo de institución</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Oficina del(a) Gobernador(a)a</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Secretaría</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Consejería Jurídica del Ejecutivo Estatal</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Órgano administrativo desconcentrado</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Otro tipo de institución de la Administración Pública Estatal Centralizada</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Organismo descentralizado</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Empresa de participación estatal mayoritaria</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Fideicomiso público</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Otro tipo de institución de la Administración Pública Estatal Paraestatal</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de funcion ejercida</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Agricultura y desarrollo rural</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Arte, cultura y otras manifestaciones sociales</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Asuntos financieros y hacendarios</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Asuntos indígenas</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Asuntos jurídicos</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Ciencia, tecnología e innovación</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Combustibles y energía</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Comunicaciones y transportes</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Cultura física y/o deporte</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>Desarrollo agrario, territorial, urbano y vivienda</td>
                                </tr>
                                <tr>
                                    <td>11.</td>
                                    <td>Desarrollo social</td>
                                </tr>
                                <tr>
                                    <td>12.</td>
                                    <td>Despacho del ejecutivo</td>
                                </tr>
                                <tr>
                                    <td>13.</td>
                                    <td>Economía</td>
                                </tr>
                                <tr>
                                    <td>14.</td>
                                    <td>Educación</td>
                                </tr>
                                <tr>
                                    <td>15.</td>
                                    <td>Función pública</td>
                                </tr>
                                <tr>
                                    <td>16.</td>
                                    <td>Gobierno y política interior</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>Igualdad de género y/o derechos de las mujeres</td>
                                </tr>
                                <tr>
                                    <td>18.</td>
                                    <td>Justicia</td>
                                </tr>
                                <tr>
                                    <td>19.</td>
                                    <td>Medio ambiente y ecología</td>
                                </tr>
                                <tr>
                                    <td>20.</td>
                                    <td>Protección civil</td>
                                </tr>
                                <tr>
                                    <td>21.</td>
                                    <td>Protección y seguridad social</td>
                                </tr>
                                <tr>
                                    <td>22.</td>
                                    <td>Reinserción social</td>
                                </tr>
                                <tr>
                                    <td>23.</td>
                                    <td>Salud</td>
                                </tr>
                                <tr>
                                    <td>24</td>
                                    <td>Seguridad pública o seguridad ciudadana</td>
                                </tr>
                                <tr>
                                    <td>25.</td>
                                    <td>Servicios públicos</td>
                                </tr>
                                <tr>
                                    <td>26.</td>
                                    <td>Servicios registrales, administrativos y patrimoniales</td>
                                </tr>
                                <tr>
                                    <td>27.</td>
                                    <td>Trabajo</td>
                                </tr>
                                <tr>
                                    <td>28.</td>
                                    <td>Turismo</td>
                                </tr>
                                <tr>
                                    <td>29.</td>
                                    <td>Otra función (especifique)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal pregunta 3 -->
<div class="modal fade" id="modalPregunta3" tabindex="-1" aria-labelledby="modalPregunta3Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalPregunta3Label">Catálogos</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de sexo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Hombre</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Mujer</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Vacante</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>No se sabe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo nivel escolaridad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Ninguno</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Preescolar o primaria</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Secundaria</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Preparatoria</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Carrera técnica o carrera comercial</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Licenciatura</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Maestría</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Doctorado</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>No se sabe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de estatus de nivel escolaridad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Cursando</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>inconcluso</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Concluido</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Titulado</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>No aplica</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>No se sabe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de pueblo indígena</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Chinanteco</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Ch'ol</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Cora</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Huasteco</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Huichol</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Maya</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Mayo</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Mazahua</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Mazateco</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>Mixe</td>
                                </tr>
                                <tr>
                                    <td>11.</td>
                                    <td>Mixteco</td>
                                </tr>
                                <tr>
                                    <td>12.</td>
                                    <td>Náhuatl</td>
                                </tr>
                                <tr>
                                    <td>13.</td>
                                    <td>Otomí</td>
                                </tr>
                                <tr>
                                    <td>14.</td>
                                    <td>Tarasco/Purépecha</td>
                                </tr>
                                <tr>
                                    <td>15.</td>
                                    <td>Tarahumara</td>
                                </tr>
                                <tr>
                                    <td>16.</td>
                                    <td>Tepehuano</td>
                                </tr>
                                <tr>
                                    <td>17.</td>
                                    <td>Tlapaneco</td>
                                </tr>
                                <tr>
                                    <td>18.</td>
                                    <td>Totonaco</td>
                                </tr>
                                <tr>
                                    <td>19.</td>
                                    <td>Tseltal</td>
                                </tr>
                                <tr>
                                    <td>20.</td>
                                    <td>Tsotsil</td>
                                </tr>
                                <tr>
                                    <td>21.</td>
                                    <td>Yaqui</td>
                                </tr>
                                <tr>
                                    <td>22.</td>
                                    <td>Zapoteco</td>
                                </tr>
                                <tr>
                                    <td>23.</td>
                                    <td>Zoque</td>
                                </tr>
                                <tr>
                                    <td>24.</td>
                                    <td>Otro</td>
                                </tr>
                                <tr>
                                    <td>25.</td>
                                    <td>Ninguno</td>
                                </tr>
                                <tr>
                                    <td>99.</td>
                                    <td>No se sabe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de empleo anterior</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Gobierno federal</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Gobierno estatal</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Gobierno municipal</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Negocio propio</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Empleado sector privado</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Cargo de elección popular</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Representación sindical </td>
                                </tr>

                                <tr>
                                    <td>8.</td>
                                    <td>Cargo en partido político</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Sector social (Organizaciones de la sociedad civil)</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>Academia (Profesor / investigador de tiempo completo)</td>
                                </tr>
                                <tr>
                                    <td>11.</td>
                                    <td>Es primer trabajo</td>
                                </tr>
                                <tr>
                                    <td>12.</td>
                                    <td>Otro</td>
                                </tr>
                                <tr>
                                    <td>99.</td>
                                    <td>No se sabe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de condición de discapacidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Dificultad o impedimento para caminar, subir o bajar escalones usando sus piernas</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Dificultad o impedimento para ver, aún usando lentes</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Dificultad o impedimento para mover o usar sus brazos o manos</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Dificultad o impedimento para aprender, recordar o concentrarse por alguna condición intelectual, por ejemplo síndrome de Down</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Dificultad o impedimento para oír, aún usando aparato auditivo</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Dificultad o impedimento para hablar o comunicarse (entender o ser entendido(a) por otros)</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Dificultad o impedimento para bañarse, vestirse o comer</td>
                                </tr>

                                <tr>
                                    <td>8.</td>
                                    <td>Dificultad o impedimento para realizar sus actividades diarias por alguna condicional emocional o mental, por ejemplo esquizofrenia o depresión</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Otra</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>Ninguna</td>
                                </tr>
                                <tr>
                                    <td>99.</td>
                                    <td>No se sabe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de forma de designación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Elección popular</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Gobernador(a) o Jefe(a) de Gobierno de la Ciudad de México</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Gobernador(a) o Jefe(a) de Gobierno de la Ciudad de México, con aprobación del Congreso Estatal</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Congreso Estatal</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Congreso Estatal, a propuesta de alguna instancia del Poder Ejecutivo Estatal</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Otra forma de designación</td>
                                </tr>
                                <tr>
                                    <td>99.</td>
                                    <td>No se sabe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de afiliación partidista</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Movimiento de Regeneración Nacional (MORENA)</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Partido Acción Nacional (PAN)</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Partido de la Revolución Democrática (PRD)</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Partido del Trabajo (PT)</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Partido Encuentro Social (PES)</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Partido Movimiento Ciudadano (MC)</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Partido Nueva Alianza (PANAL)</td>
                                </tr>

                                <tr>
                                    <td>8.</td>
                                    <td>Partido Revolucionario Institucional (PRI)</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Partido Verde Ecologista de México (PVEM)</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>Sin partido político</td>
                                </tr>
                                <tr>
                                    <td>11.</td>
                                    <td>Otro partido político (especifique )</td>
                                </tr>
                                <tr>
                                    <td>99.</td>
                                    <td>No se sabe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal preguntas 4-15 -->
<div class="modal fade" id="modalSubseccion2y2" tabindex="-1" aria-labelledby="modalSubseccion2y2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalSubseccion2y2Label">Características del personal</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.-</span>
                    </span>
                    Debe considerar la totalidad del personal que laboraba en las instituciones de la Administración Pública de su entidad federativa, de todos los tipos de régimen de contratación (confianza, base y/o sindicalizado, eventual, honorarios o cualquier otro tipo).
                </p>
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 2.-</span>
                    </span>
                    Para cada institución, en las preguntas 5, 6, 7, 8, 9, 10 y 12 la cantidad registrada en la columna "Total" debe ser igual a la cantidad reportada como respuesta en la columna "Total" de la pregunta 4, así como corresponder a su desagregación por sexo.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal pregunta 16-18 -->
<div class="modal fade" id="modalSubseccion2y3" tabindex="-1" aria-labelledby="modalSubseccion2y3Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalSubseccion2y3Label">Profesionalización del personal</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="modal-title mb-1">Instrucción general para las preguntas del apartado:</h6>
                <p class="text-justify mb-4">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        Para cada institución,
                    </span>en caso de que seleccione el código "2" o "9" en la columna "¿Contaba con elementos, mecanismos y/o esquemas de profesionalización para su personal?" de la pregunta 16, no puede registrar información en las preguntas 17 y 18.
                </p>
                <h6 class="modal-title mb-1">Glosario del apartado:</h6>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        Actualización de perfiles de puesto:
                    </span>se refiere a la actualización permanente de la información necesaria para la definición de los perfiles y afinidad de los
                    puestos; por lo que dicha información permitirá identificar al servidor público como candidato para ocupar vacantes de distinto perfil.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 2.-</span>
                        Concursos públicos y abiertos para la contratación:
                    </span>se refiere al mecanismo publicado a través de medios electrónicos establecidos por la institución, el
                    cual tiene por objetivo reclutar a aquellas personas que cumplen con los requerimientos establecidos para determinado perfil.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 3.-</span>
                        Diseño curricular:
                    </span>: se refiere a los mecanismos que permiten establecer criterios, competencias, objetivos y contenidos curriculares para ser utilizados como
                    una herramienta de análisis estructural, aplicados a la sección de candidatos a ocupar determinadas vacantes
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 4.-</span>
                        Diseño y selección de pruebas de ingreso:
                    </span>se refiere a los mecanismos destinados a atraer a los mejores candidatos para ocupar los puestos, a través de
                    la exposición de los méritos de estos durante su trayectoria profesional, en un entorno donde permee la igualdad de oportunidades y la imparcialidad, así como la realización de evaluaciones objetivas y transparentes.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 5.-</span>
                        Diseño y validación de competencias:
                    </span>se refiere a la valoración de capacidades de los aspirantes a ingresar o de los servidores públicos de carrera, con
                    base en los conocimientos, habilidades y experiencia que posee para ocupar determinado puesto
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 6.-</span>
                        Evaluación de impacto de la capacitación:
                    </span>se refiere a la evaluación de resultados de los programas de capacitación que se impartieron, con base en las
                    valoraciones del desempeño de los servidores públicos que participaron, buscando el desarrollo de la capacitación en la proporción que se identifiquen
                    deficiencias
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 7.-</span>
                        Mecanismos de evaluación del desempeño:
                    </span>se refiere a aquellos procesos, métodos y mecanismos de medición, cualitativos y cuantitativos, para el
                    cumplimiento de las funciones y metas individuales y colectivas de los servidores públicos de carrera, en función de sus capacidades y del perfil determinado para
                    el puesto que ocupan
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 8.-</span>
                        Profesionalización del personal:
                    </span>se refiere al conjunto de procedimientos homologados y estructurados que facilitan la consolidación de la formación inicial,
                    actualización, especialización y, en términos generales, el desarrollo profesional de los servidores públicos adscritos a determinada institución
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 9.-</span>
                        Programas de capacitación:
                    </span>se refiere a aquellas acciones de capacitación y/o actualización impartidas a los servidores públicos de carrera por medio de
                    instituciones educativas, de investigación científica o tecnológica, así como por expertos en la materia. Dichas acciones deberán ser consistentes, aplicar el uso de técnicas y metodologías adecuadas y no deberán representar menos de cuarenta horas efectivas anuales
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 10.-</span>
                        Programas de estímulos y recompensas:
                    </span>se refiere al otorgamiento de reconocimientos e incentivos, así como a la cantidad neta que se entrega al servidor público de carrera de manera extraordinaria con motivo de la productividad, eficacia y eficiencia.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 11.-</span>
                        Reclutamiento, selección e inducción:
                    </span>se refiere a las acciones que, con motivo de la existencia de una vacante o la creación de una nueva, se inician los procedimientos de reclutamiento de aspirantes a ocupar dichos puestos; posteriormente, la selección de estos mediante la revisión curricular, exámenes de conocimientos, habilidades y aptitudes, así como de entrevistas; y finalmente, una vez que se ha seleccionado al personal que cumple con las características necesarias para el perfil del puesto, se le brinda la orientación e inducción necesaria para su inclusión dentro de la institución
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 12.-</span>
                        Separación del servicio:
                    </span>se refiere al proceso para determinar que el nombramiento de un servidor público de carrera deja de surtir efectos, sin
                    responsabilidad para la institución y, si se procede a autorizar a un servidor público de carrera titular para que deje de desempeñar las funciones de su puesto de manera temporal, así como lo relativo a la suspensión de los efectos del nombramiento respectivo.
                </p>
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 13.-</span>
                        Servicio civil de carrera:
                    </span>se refiere a un conjunto de acciones sistemáticas mediante las cuales los servidores públicos pueden ingresar, permanecer y desarrollarse profesionalmente dentro de la institución, proporcionando a su vez niveles altos de eficiencia y eficacia que redunden en el cumplimiento óptimo de los objetivos institucionales.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal pregunta 19 -->
<div class="modal fade" id="modalSubseccion2y4" tabindex="-1" aria-labelledby="modalSubseccion2y4Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalSubseccion2y4Label">Capacitación del personal</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="modal-title mb-1">Instrucción general para las preguntas del apartado:</h6>
                <p class="text-justify mb-4">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        Únicamente
                    </span>debe considerar aquellas acciones formativas que hayan realizado o consideren realizar alguna evaluación para su acreditación, por lo que no debe considerar aquellas de carácter informativo o de naturaleza similar.
                </p>
                <h6 class="modal-title mb-1">Glosario del apartado:</h6>
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.-</span>
                        Acciones formativas:
                    </span>
                    se refiere a las acciones orientadas, en este caso a los servidores públicos de la Administración Pública de la entidad federativa, a la adquisición de conocimientos y competencias personales e interpersonales para el ejercicio de la función pública, mismas que conllevan algún tipo de evaluación para su acreditación; como lo son: cursos, talleres, diplomados, maestrías, entre otros
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal pregunta 24-35 -->
<div class="modal fade" id="modalSubseccion4" tabindex="-1" aria-labelledby="modalSubseccion4Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalSubseccion4Label">Recursos materiales</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="modal-title mb-1">Instrucción general para las preguntas del apartado:</h6>
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                    </span>Si los bienes inmuebles, vehículos, computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas albergaban o fueron utilizados por más de una institución de la Administración Pública de la entidad federativa, debe registrarlos únicamente en la institución que los tenga bajo resguardo oficial o registrados en sus inventarios correspondientes.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal pregunta 24-30 -->
<div class="modal fade" id="modalSubseccion4y1" tabindex="-1" aria-labelledby="modalSubseccion4y1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalSubseccion4y1Label">Bienes inmuebles</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="modal-title mb-1">Instrucción general para las preguntas del apartado:</h6>
                <p class="text-justify mb-4">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        No
                    </span>debe considerar aquellos bienes inmuebles que correspondan a reservas territoriales, vialidades, áreas naturales protegidas, u otro de características similares, que no se encontraban asignados al ejercicio específico de las funciones de alguna de las instituciones que conformaban a la Administración Pública de su entidad federativa.
                </p>
                <h6 class="modal-title mb-1">Glosario del apartado:</h6>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.-</span>
                        Activación física:
                    </span>
                    se refiere al ejercicio o movimiento del cuerpo humano que se realiza para mejora de la aptitud y de la salud física y mental de las personas.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 2.-</span>
                        Deporte:
                    </span>
                    se refiere a la actividad física organizada y reglamentada que tiene por finalidad preservar y mejorar la salud física y mental, el desarrollo social, ético e intelectual de las personas, con el logro de resultados en competiciones
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 3.-</span>
                        Deporte de alto rendimiento:
                    </span>
                    se refiere al deporte que se practica con altas exigencias técnicas y científicas de preparación y entrenamiento, que permite al deportista la participación en preselecciones y selecciones nacionales que representan al país en competiciones y pruebas oficiales de carácter internacional.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 4.-</span>
                        Deporte de rendimiento:
                    </span>
                    se refiere al deporte que promueve, fomenta y estimula el que todas las personas puedan mejorar su nivel de calidad deportiva como aficionados, pudiendo integrarse al deporte de alto rendimiento o, en su caso, sujetarse adecuadamente a una relación laboral por la práctica del deporte
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 5.-</span>
                        Deporte social:
                    </span>
                    se refiere al deporte que promueve, fomenta y estimula el que todas las personas sin distinción de género, edad, discapacidad, condición social, religión, opiniones, preferencias o estado civil, tengan igualdad de participación en actividades deportivas con finalidades recreativas, educativas y de salud o rehabilitación
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 6.-</span>
                        Evento deportivo:
                    </span>
                    se refiere a cualquier encuentro entre deportistas afiliados a las asociaciones o sociedades deportivas que se realice conforme a las normas establecidas por estas y por los organismos rectores del deporte
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 7.-</span>
                        Evento deportivo con fines de espectáculo:
                    </span>
                    se refiere a cualquier evento deportivo en el que se condicione el acceso de los aficionados o espectadores al
                    pago de una tarifa para presenciarlo
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 8.-</span>
                        Evento deportivo masivo:
                    </span>
                    se refiere a cualquier evento deportivo abierto al público, sin importar el número de personas que se encuentren reunidas, que se realice en instalaciones deportivas, estadios, recintos o edificios deportivos, y que tenga una capacidad de aforo igual o superior al resultado de multiplicar por cien
                    el número mínimo de competidores que, conforme al reglamento o normatividad de la disciplina que corresponda, deba estar activo dentro de un área de competencia; o bien, aquel que se realice en lugares abiertos, cuando el número de competidores sea igual o mayor a doscientos.
                </p>
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 9.-</span>
                        Recreación física:
                    </span>
                    se refiere a la actividad física con fines lúdicos que permiten la utilización positiva del tiempo libre.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal pregunta 31 -->
<div class="modal fade" id="modalSubseccion4y2" tabindex="-1" aria-labelledby="modalSubseccion4y2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalSubseccion4y2Label">Parque vehicular</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        Parque vehicular:
                    </span> se refiere a todos los vehículos o medios de transporte en funcionamiento con los que cuentan las instituciones de la Administración Pública de la entidad federativa para el ejercicio de sus funciones, comprendiendo automóviles, camiones, camionetas, motocicletas, y cualquier otro de características similares.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal pregunta 33 -->
<div class="modal fade" id="modalSubseccion4y4" tabindex="-1" aria-labelledby="modalSubseccion4y4Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalSubseccion4y4Label">Equipo informático</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="modal-title mb-1">Glosario del apartado:</h6>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        Multifuncional:
                    </span> se refiere al dispositivo que tiene la particularidad de integrar, en una máquina, las funciones de varios dispositivos, permitiendo realizar varias tareas de modo simultáneo. Incorpora diferentes funciones de otros equipos o multitareas que permiten escanear, imprimir y fotocopiar a la vez, además de la capacidad de almacenar documentos en red.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 2.- </span>
                        Servicios de conexión remota:
                    </span> se refiere a los servicios que posibilitan a los usuarios conectarse por red a otro ordenador como si se accediera desde el propio ordenador, permitiendo utilizar y/o extraer información y datos. Un ejemplo de estos servicios es la VPN, que permite conectar una o más computadoras a una red privada utilizando internet.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal Instrucciones generales para las preguntas de la sección 12 -->
<div class="modal fade" id="modalInstruccionesGeneralesS12" tabindex="-1" aria-labelledby="modalInstruccionesGeneralesS12Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalInstruccionesGeneralesS12Label">Instrucciones generales para las preguntas de la sección 12</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        Periodo de referencia de los datos:
                    </span>
                <ul>
                    <li><span class="font-weight-bold">Durante el año: </span> la información se refiere a lo existente del 1 de enero al 31 de diciembre de 2020.</li>
                    <li><span class="font-weight-bold">Al cierre del año: </span> la información se refiere a lo existente al 31 de diciembre de 2020.</li>
                    <li><span class="font-weight-bold">Actualmente: </span> la información se refiere a lo existente al momento del llenado del cuestionario.</li>
                </ul>
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 2.- </span>
                    </span> Los catálogos utilizados en el presente cuestionario corresponden a denominaciones estándar, de tal forma que si el nombre de alguna clasificación no coincide exactamente con la utilizada en su institución, debe registrar los datos en aquella que sea homóloga.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 3.- </span>
                    </span> Para efectos de esta sección, no debe considerar al Sistema Electrónico de Información Pública Gubernamental “CompraNet”, ni aquellos procedimientos llevados a cabo mediante dicho sistema.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 4.- </span>
                    </span> En caso de que los registros con los que cuente no le permitan desglosar la información de acuerdo con los requerimientos solicitados, anote "NS" (No se sabe) en las celdas donde no disponga de información. En el recuadro para comentarios de cada pregunta debe proporcionar una justificación respecto del uso del "NS" en determinado reactivo.
                </p>
                <p class="text-justify mb-4">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 5.- </span>
                    </span> No deje celdas en blanco, salvo en los casos en que la instrucción así lo solicite.
                </p>
                <h6 class="modal-title mb-1">Glosario de la sección:</h6>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        Contrataciones públicas:
                    </span> se refiere a aquellas compras de bienes, servicios y obra pública realizadas por la Administración Pública de su entidad federativa, las cuales tienen como objetivo salvaguardar el interés general y eficientar el gasto público.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 2.- </span>
                        Contratista:
                    </span> se refiere a aquella persona (física o moral) que celebre contratos de obras públicas, o de servicios relacionados con las mismas, con la Administración Pública de la entidad federativa.
                </p>
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 3.- </span>
                        Proveedor:
                    </span> se refiere a la persona (física o moral) que celebre contratos de adquisiciones, arrendamientos o servicios con la Administración Pública de la entidad federativa.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal pregunta 3 seccion 12 -->
<div class="modal fade" id="modalPregunta3s12" tabindex="-1" aria-labelledby="modalPregunta3s12Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalPregunta3s12Label">Catálogos</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de mecanismos de salvaguarda institucional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Programas anuales de contrataciones públicas</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Comités de adquisiciones, arrendamientos y servicios / obra pública</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Investigación de mercado</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Control de prácticas monopólicas</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Integridad de los particulares que participan en los procedimientos de contratación pública</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Testigos sociales</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Metodologías homólogas de riesgos (incluyendo corrupción y mayor uso de TIC para gestión de riesgos, controles y seguimiento)</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Criterios de justificación técnica y económica para la definición de las contrataciones públicas</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Verificación del cumplimiento de las condiciones de las contrataciones públicas</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>Junta de aclaraciones</td>
                                </tr>
                                <tr>
                                    <td>11.</td>
                                    <td>Mecanismos de solución de controversias</td>
                                </tr>
                                <tr>
                                    <td>12.</td>
                                    <td>Instituciones de vigilancia y auditoría de los procedimientos de contratación pública</td>
                                </tr>
                                <tr>
                                    <td>13.</td>
                                    <td>Mecanismos para la denuncia de irregularidades y hechos de corrupción en los procedimientos de contratación pública</td>
                                </tr>
                                <tr>
                                    <td>14.</td>
                                    <td>Sanciones</td>
                                </tr>
                                <tr>
                                    <td>15.</td>
                                    <td>Perfiles y requerimientos mínimos de competencias para servidores que participan en los procedimientos de contratación pública</td>
                                </tr>
                                <tr>
                                    <td>16.</td>
                                    <td>Otro mecanismo de salvaguarda institucional (especifique)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal Glosario de la subsección XII2 -->
<div class="modal fade" id="modalGlosarioSubseccionXII2" tabindex="-1" aria-labelledby="modalGlosarioSubseccionXII2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalGlosarioSubseccionXII2Label">Glosario de la subsección</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        Sistemas de información:
                    </span> se refiere al conjunto de componentes interconectados que permiten captar, procesar, administrar y almacenar información relevante para los procesos desempeñados por determinada institución.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal pregunta 6 seccion 12 -->
<div class="modal fade" id="modalPregunta6s12" tabindex="-1" aria-labelledby="modalPregunta6s12Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalPregunta6s12Label">Catálogos</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de formato de registro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Libro o bitácora (papel)</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Hoja de cálculo</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Aplicación informática</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Otro formato (especifique)</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>No se sabe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Catálogo de frecuencia de actualización de la información</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Diario</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Semanal</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Quincenal</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Mensual</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Bimestral</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Trimestral</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Cuatrimestral</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Semestral</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Anual</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>Periodos mayores a un año</td>
                                </tr>
                                <tr>
                                    <td>11.</td>
                                    <td>Otra frecuencia de actualización (especifique)</td>
                                </tr>
                                <tr>
                                    <td>99.</td>
                                    <td>No se sabe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal Glosario de la subsección XII3 -->
<div class="modal fade" id="modalGlosarioSubseccionXII3" tabindex="-1" aria-labelledby="modalGlosarioSubseccionXII3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalGlosarioSubseccionXII3">Instrucciones generales</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="modal-title mb-1">Instrucciones generales para las preguntas del apartado:</h6>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                    </span> Únicamente desagregue dos decimales para las cifras registradas en las preguntas correspondientes.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 2.- </span>
                    </span> Las cifras deben anotarse en pesos mexicanos (no deberá agregarse la frase “miles o millones de pesos”).
                </p>
                <p class="text-justify mb-4">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 3.- </span>
                    </span> No debe considerar aquellos contratos derivados del uso de recursos provenientes de fondos federales, ni de cualquier tipo de recurso que sea distinto a los generados por la entidad federativa.
                </p>
                <h6 class="modal-title mb-1">Glosario de la subsección:</h6>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        Contrataciones o compras consolidadas:
                    </span> se refiere a la agrupación de los requerimientos de las distintas dependencias, entidades y órganos desconcentrados de la Administración Pública de la entidad federativa para la compra conjunta de bienes de uso generalizado.
                </p>
                <p class="text-justify">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 2.- </span>
                        Contratos o convenios marco:
                    </span> se refiere a la contratación basada en un acuerdo de voluntades que celebra una dependencia o entidad con uno o más posibles proveedores, mediante los cuales se establecen las especificaciones técnicas y de calidad, alcances, precios y condiciones que regularán la adquisición o arrendamiento de bienes muebles, o la prestación de servicios.
                </p>
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 3.- </span>
                        Convenios modificatorios:
                    </span> se refiere a aquellos documentos en los cuales, de común acuerdo entre la Administración Pública de la entidad federativa y los proveedores y/o contratistas, se llevan a cabo modificaciones en las cláusulas del contenido de un contrato o convenio firmado con anterioridad, sin que ello signifique la terminación o renovación de este último.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>

<!-- Modal Glosario de la subsección XII4 -->
<div class="modal fade" id="modalGlosarioSubseccionXII4" tabindex="-1" aria-labelledby="modalGlosarioSubseccionXII2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #006f3e,#6fb430);">
                <h5 class="modal-title text-white" id="modalGlosarioSubseccionXII2Label">Glosario de la subsección</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-justify mb-0">
                    <span class="font-weight-bold">
                        <span class="text-primary"><i class="fas fa-lg fa-caret-right"></i> 1.- </span>
                        Estudios de impacto urbano y ambiental:
                    </span> se refiere a los estudios técnicos especializados que incluyen la descripción de las alteraciones urbanas y ambientales que se generan por determinada obra o actividad que se pretende realizar, así como las medidas preventivas de mitigación y compensación ambiental, las cuales tienen como objetivo evitar y/o reducir los efectos negativos en el entorno y en el ambiente.
                </p>
            </div>
            <div class="modal-footer" style="background: linear-gradient(to left, #006f3e,#6fb430);"></div>
        </div>
    </div>
</div>