<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="views/static/img/h.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            OFICIALÍA MAYOR
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="nav navbar-nav mr-auto" id="tabNavigation" role="tablist">
                <li class="nav-item mx-1" role="presentation">
                    <a href="#" class="nav-link active" id="usuarios-tab" data-bs-toggle="tab" data-bs-target="#usuarios" type="button" role="tab" aria-controls="usuarios" aria-selected="true">
                        <i class="fas fa-users-cog"></i>
                        Usuarios
                    </a>
                </li>
                <li class="nav-item mx-1" role="presentation">
                    <a href="#" class="nav-link" id="dependencias-tab" data-bs-toggle="tab" data-bs-target="#dependencias" type="button" role="tab" aria-controls="dependencias" aria-selected="false">
                        <i class="fas fa-university"></i>
                        Dependencias
                    </a>
                </li>
                <li class="nav-item mx-1" role="presentation">
                    <a href="#" class="nav-link" id="resultados-tab" data-bs-toggle="tab" data-bs-target="#resultados" type="button" role="tab" aria-controls="resultados" aria-selected="false">
                        <i class="fas fa-newspaper"></i>
                        Resultados
                    </a>
                </li>
                <li class="nav-item mx-1" role="presentation">
                    <a href="#" class="nav-link" id="graficador-tab" data-bs-toggle="tab" data-bs-target="#graficador" type="button" role="tab" aria-controls="graficador" aria-selected="false">
                        <i class="fas fa-chart-bar"></i>
                        Graficador
                    </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto d-flex align-items-center">
                    <a id="btnAgregarUsuario" class="nav-link d-none" href="#" data-toggle="modal" data-target="#addUser" style="font-size: x-small;">
                        <i class="fa fa-user-plus"></i>
                        Agregar Usuario
                    </a>
                    <a id="btnAgregarDependencia" class="nav-link d-none" href="#" data-toggle="modal" data-target="#adddependencia" style="font-size: x-small;">
                        <i class="fas fa-university"></i>
                        Agregar Dependencia
                    </a>
                </ul>
                <div class="d-none d-lg-block py-3 mx-2" style="border: 1px solid #6C757D;"></div>
                <a class="nav-link text-white active pl-2 pr-0" href="#" id="btnSalirAdmin">
                    <i class="fa fa-power-off"></i>
                    Salir
                </a>
            </form>
        </div>
    </div>
</nav>