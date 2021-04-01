<script>
    verReporte = (tipoReporte) => {
        window.open(tipoReporte + '?anio=' + document.getElementById('jcbanio').value)
    }
</script>

<nav class="navbar navbar-expand-lg navbar-dark p-4" style="background-color: #082432;">
    <a class="navbar-brand" href="#">
        <img src="views/static/img/h.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        OFICIALÍA MAYOR
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li id="navItemUsuarios" class="nav-item mr-2 ml-0">
                <a class="nav-link" href="adminUsers.php">
                    <i class="fas fa-users-cog"></i>
                    Usuarios
                </a>
            </li>
            <li id="navItemDependencias" class="nav-item mx-2">
                <a class="nav-link" href="adminDependencias.php">
                    <i class="fas fa-university"></i>
                    Dependencias
                </a>
            </li>
            <li id="navItemResultados" class="nav-item mx-2">
                <a class="nav-link" href="adminResultados.php">
                    <i class="fas fa-newspaper"></i>
                    Resultados
                </a>
            </li>
            <li id="navItemGraficador" class="nav-item ml-2 mr-0">
                <a class="nav-link" href="graficador.php">
                    <i class="fas fa-chart-bar"></i>
                    Graficador
                </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto d-flex align-items-center">
                <!-- Users secondary navbar -->
                <a id="btnAgregarUsuario" class="nav-link d-none" href="#" data-toggle="modal" data-target="#addUser" style="font-size: x-small;">
                    <i class="fa fa-user-plus"></i>
                    Agregar Usuario
                </a>
                <!-- Dependencies secondary navbar -->
                <a id="btnAgregarDependencia" class="nav-link d-none" href="#" data-toggle="modal" data-target="#adddependencia" style="font-size: x-small;">
                    <i class="fas fa-university"></i>
                    Agregar Dependencia
                </a>
                <select id="variable" class="custom-select custom-select-sm mx-2 d-none">
                    <option value="1">Todos</option>
                    <?php
                    $anio = date("Y");
                    $res = 2017;
                    for ($i = $anio; $i >= $res; $i--) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                </select>
                <!-- Results secondary navbar -->
                <li id="dropdownReportes" class="nav-item dropdown ml-0 mr-3 d-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: x-small;">
                        <i class="fas fa-book"></i>
                        Reportes
                    </a>
                    <div class="dropdown-menu rounded shadow" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-link text-dark d-flex justify-content-between" onclick="verReporte('adminReporteGeneral.php')">
                            <i class="fas fa-lg fa-copy mr-2"></i>
                            GENERAL
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item nav-link text-dark d-flex justify-content-between" onclick="verReporte('adminReporteCentralizados.php')">
                            <i class="fas fa-lg fa-file mr-2"></i>
                            CENTRALIZADAS
                        </a>
                        <a class="dropdown-item nav-link text-dark d-flex justify-content-between" onclick="verReporte('adminReporteParaestatales.php')">
                            <i class="fas fa-lg fa-file mr-2"></i>
                            PARAESTATALES
                        </a>
                    </div>
                </li>
                <select id="jcbanio" class="custom-select custom-select-sm mx-2 d-none">
                    <?php
                    $anio2 = date("Y");
                    $res2 = 2019;
                    for ($i2 = $anio2; $i2 >= $res2; $i2--) {
                        echo '<option value="' . $i2 . '">' . $i2 . '</option>';
                    }
                    ?>
                </select>
                <a id="btnImprimirReporteGeneral" class="nav-link mr-2 d-none" href="#" data-toggle="tooltip" data-placement="bottom" title="Imprimir" onclick="print();">
                    <i class="fas fa-2x fa-print"></i>
                </a>
                <a id="btnExportarReporteGeneral" class="nav-link d-none" href="#" data-toggle="tooltip" data-placement="bottom" title="Exportar Excel" onclick="tablesToExcel(array1, array2, array3, array4, array5, array6, array7, array8, array9, array10, array11, array12, array13, array14, array15, array16, array17, array18, array19, array20, array21, array22, array23, array24, array25, array26, array27, array28, array29, array30, array31, 'myfile.xls')">
                    <i class="fas fa-2x fa-file-excel"></i>
                </a>
                <a id="btnImprimirReporteCentralizados" class="nav-link mr-2 d-none" href="#" data-toggle="tooltip" data-placement="bottom" title="Imprimir" onclick="print();">
                    <i class="fas fa-2x fa-print"></i>
                </a>
                <a id="btnImprimirReporteParaestatales" class="nav-link mr-2 d-none" href="#" data-toggle="tooltip" data-placement="bottom" title="Imprimir" onclick="print();">
                    <i class="fas fa-2x fa-print"></i>
                </a>
                <div class="d-none d-lg-block py-3 mx-2" style="border: 1px solid #6C757D;"></div>
                <a class="nav-link active" href="admini/logout.php">
                    <i class="fa fa-power-off"></i>
                    Cerrar Sesión
                </a>
            </ul>
        </form>
    </div>
</nav>