<?php
session_start();

if (isset($_SESSION['sesionActiva']) && $_SESSION['sesionActiva'] == "1") {
    if ($_SESSION['tipoUsuario'] == "dependencia") {
        header("Location: /CensoDeGobierno/questionary");
        exit;
    } elseif ($_SESSION['tipoUsuario'] == "admin") {
        header("Location: /CensoDeGobierno/admin");
        exit;
    } else {
        header("Location: /CensoDeGobierno");
        exit;
    }
} else {
?>
    <div style="height: 100vh;">
        <!-- Navegacion de bienvenida -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-4">
            <div class="container-fluid">
                <a class="navbar-brand text-dark" href="#">
                    <img src="views/static/img/h.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                    OFICIALÍA MAYOR
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav nav-pills ml-auto d-flex justify-content-center mr-0" id="myTab" role="tablist">
                        <li class="nav-item m-0" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                <i class="fas fa-home"></i>
                                INICIO
                            </button>
                        </li>
                        <li class="nav-item m-0" role="presentation">
                            <button class="nav-link" id="realizarCenso-tab" data-bs-toggle="tab" data-bs-target="#realizarCenso" type="button" role="tab" aria-controls="realizarCenso" aria-selected="false">
                                <i class="fas fa-file-alt"></i>
                                REALIZAR CENSO
                            </button>
                        </li>
                        <li class="nav-item m-0" role="presentation">
                            <button class="nav-link" id="iniciarSesion-tab" data-bs-toggle="tab" data-bs-target="#iniciarSesion" type="button" role="tab" aria-controls="iniciarSesion" aria-selected="false">
                                <i class="fas fa-lock"></i>
                                SOY ADMINISTRADOR
                            </button>
                        </li>
                    </ul>
                    <div class="d-none d-lg-block py-3 mx-3" style="border: 1px solid #6C757D;"></div>
                    <form class="form-inline my-2 my-lg-0">
                        <a class="nav-link text-dark w-100 text-end" href="http://oficialiamayor.hidalgo.gob.mx/" target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            Sitio Oficial
                        </a>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Bienvenida -->
        <div class="tab-content" id="myTabContent" style="height: 90%;">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="height: 100%;">
                <div class="row d-flex justify-content-center align-items-center m-0" style="background: url(views/static/img/hero.jpg); background-size: cover; background-position: center; height: 100%;">
                    <div class="col-lg-9 col-md-7 col-12 pl-5 text-center">
                        <h1 class="text-white" style="font-size: 35px;">Censo nacional de gobiernos estatales 2021</h1>
                        <p class="text-white" style="font-size: 20px;">
                            <u>Módulo 1.</u> Administración pública de la entidad federativa.
                        </p>
                        <p class="text-white" style="font-size: 20px;">
                            <span><u>Sección I.</u> Estructura organizacional y recursos.</span>
                            <span class="ml-5"><u>Sección XII.</u> Contrataciones públicas.</span>
                        </p>
                        <br>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddUser">
                            Realizar Registro
                        </button>
                    </div>
                    <div class="col-lg-3 col-md-5 col-12 pr-5">
                        <div class="row">
                            <div class="col-12 text-center mb-3">
                                <img src="views/static/img/censo2021.png" style="width: 300px;" class="shadow-lg">
                            </div>
                            <div class="col-12 text-center">
                                <img src="views/static/img/inegi2020.png" style="height: 150px;" class="shadow-lg bg-white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="realizarCenso" role="tabpanel" aria-labelledby="realizarCenso-tab" style="height: 95%;">
                <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100%;">
                    <div class="row mx-5" style="height: 60vh; width: 150vh;">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-items-center p-4 bg-dark shadow-lg" style="z-index: 2;">
                            <div class="text-white" style="opacity: .8;">
                                <div class="text-center">
                                    <i class="fa fa-university fa-4x mb-1"></i>
                                    <p class="text-center">
                                        <span style="color:#909090;">ESTADO</span>
                                        DE
                                        <strong class="text-primary">HIDALGO</strong>
                                    </p>
                                </div>
                                <h3 class="text-white text-center">
                                    Censo nacional de gobiernos estatales 2021
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-items-center p-4 bg-white shadow-lg my-3" style="z-index: 1;">
                            <div style="width: 100%;">
                                <form id="formLoginDependencia" class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-12 mb-3">
                                            <label for="txtInstitucionLogin">Seleccione su institución</label>
                                            <select class="custom-select" id="txtInstitucionLogin" required></select>
                                            <div class="valid-feedback">Correcto</div>
                                            <div class="invalid-feedback">Seleccione su institución</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-11 mb-3">
                                            <label for="txtContraseniaLogin">Contraseña</label>
                                            <input type="password" class="form-control" id="txtContraseniaLogin" required>
                                            <div class="valid-feedback">Correcto</div>
                                            <div class="invalid-feedback">Ingrese su contraseña</div>
                                        </div>
                                        <div class="col-1 mx-0 mt-4 pt-3 px-0 text-center">
                                            <a class="ojoContrasenia"><i class="fas fa-eye fa-lg"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-row d-flex justify-content-end">
                                        <button type="button" class="btn btn-transparent mr-3 btnInicio">
                                            <i class="fas fa-lg fa-undo-alt"></i>
                                            Inicio
                                        </button>
                                        <button type="submit" class="btn btn-outline-primary">
                                            Ingresar
                                            <i class="fas fa-lg fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="iniciarSesion" role="tabpanel" aria-labelledby="iniciarSesion-tab" style="height: 95%;">
                <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100%;">
                    <div class="row mx-5" style="height: 60vh; width: 150vh;">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-items-center p-4 bg-dark shadow-lg" style="z-index: 2;">
                            <div class="text-white" style="opacity: .8;">
                                <div class="text-center">
                                    <i class="fa fa-university fa-4x mb-1"></i>
                                    <p class="text-center">
                                        <span style="color:#909090;">ESTADO</span>
                                        DE
                                        <strong class="text-primary">HIDALGO</strong>
                                    </p>
                                </div>
                                <h3 class="text-white text-center">
                                    Censo nacional de gobiernos estatales <text id="año"></text>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-items-center p-4 bg-white shadow-lg my-3" style="z-index: 1;">
                            <div style="width: 100%;">
                                <form id="formLoginAdmin" class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-12 mb-3">
                                            <label for="txtMailLoginAdmin">Correo electrónico</label>
                                            <input type="email" class="form-control" id="txtMailLoginAdmin" autocomplete="off" required>
                                            <div class="valid-feedback">Correcto</div>
                                            <div class="invalid-feedback">Ingrese su correo</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-11 mb-3">
                                            <label for="txtContraseniaLoginAdmin">Contraseña</label>
                                            <input type="password" class="form-control" id="txtContraseniaLoginAdmin" required>
                                            <div class="valid-feedback">Correcto</div>
                                            <div class="invalid-feedback">Ingrese su contraseña</div>
                                        </div>
                                        <div class="col-1 mx-0 mt-4 pt-3 px-0 text-center">
                                            <a class="ojoContrasenia"><i class="fas fa-eye fa-lg"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-row d-flex justify-content-end">
                                        <button type="button" class="btn btn-transparent mr-3 btnInicio">
                                            <i class="fas fa-lg fa-undo-alt"></i>
                                            Inicio
                                        </button>
                                        <button type="submit" class="btn btn-outline-primary">
                                            Ingresar
                                            <i class="fas fa-lg fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAddUser" tabindex="-1" aria-labelledby="modalAddUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-header border-0" style="background: linear-gradient(to right, #e63c4d,#b91926);">
                        <h5 id="modalAddUserLabel" class="modal-title text-white">Registrar institución</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formRegistrarDependencia" class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <label for="txtClasificacion">Clasificación Administrativa</label>
                                    <select type="text" id="txtClasificacion" class="custom-select" autocomplete="off" required>
                                        <option value="" selected disabled>?</option>
                                        <option value="1">Administración Pública Centralizada</option>
                                        <option value="2">Administración Pública Paraestatal</option>
                                    </select>
                                    <div class="valid-feedback">Correcto</div>
                                    <div class="invalid-feedback">Seleccione una clasificación</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <div id="instinom"></div>
                                    <label for="txtInstitucion">Seleccione su institución</label>
                                    <select type="text" id="txtInstitucion" class="custom-select" autocomplete="off" required></select>
                                    <div class="valid-feedback">Correcto</div>
                                    <div class="invalid-feedback">Seleccione su institución</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <label for="txtCorreo" class="label-material">Correo electrónico</label>
                                    <input id="txtCorreo" type="email" required class="form-control" autocomplete="off">
                                    <div class="valid-feedback">Correcto</div>
                                    <div class="invalid-feedback">Ingrese un correo válido</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-5 mb-3">
                                    <label for="txtContrasenia" class="label-material">Contraseña</label>
                                    <input id="txtContrasenia" type="password" required class="form-control" autocomplete="off">
                                    <div class="valid-feedback">Correcto</div>
                                    <div class="invalid-feedback">Ingrese una contraseña</div>
                                </div>
                                <div class="col-1 mx-0 mt-4 pt-3 px-0 text-center">
                                    <a class="ojoContrasenia"><i class="fas fa-eye fa-lg"></i></a>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="txtNumeroTelefonico" class="label-material">Teléfono</label>
                                    <input id="txtNumeroTelefonico" type="number" required class="form-control" autocomplete="off">
                                    <div class="valid-feedback">Correcto</div>
                                    <div class="invalid-feedback">Ingrese un número telefónico válido</div>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <button id="registeruserI" type="submit" name="registeruserI" class="btn btn-outline-primary">
                                    Registrar
                                    <i class="fas fa-lg fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer de bienvenida -->
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

    <link rel="stylesheet" href="views/templates/css/welcome.css">
    <script src="views/templates/js/welcome.js"></script>
<?php
}
?>