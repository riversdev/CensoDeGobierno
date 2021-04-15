<?php
session_start();

if ($_SESSION['valida'] != "1") {
  header('Location: logout.php');
  exit;
} else {
  require_once("conexion/db.php");
  require_once("conexion/conexion.php");
  $anio = $_GET['anio'];
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Oficialía Mayor</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.green.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/h.png">
    <link rel="stylesheet" type="text/css" href="css/style_page.css">
    <!-- jQuery-3.5.1 -->
    <script src="rivers\static\jquery-3.5.1.min.js"></script>
    <!-- fontawesome-free-5.14.0-web -->
    <link rel="stylesheet" href="rivers\static\fontawesome\css\all.css">
    <script src="rivers\static\fontawesome\js\all.js"></script>
    <!-- AlertifyJS 1.13.1 -->
    <link rel="stylesheet" href="rivers\static\alertifyjs\css\alertify.css">
    <link rel="stylesheet" href="rivers\static\alertifyjs\css\themes\default.css">
    <script src="rivers\static\alertifyjs\js\alertify.js"></script>
    <script type="text/javascript">
      window.print();
      window.addEventListener("afterprint", function() {
        this.close();
      }, false);
    </script>
  </head>

  <body>
    <!-- header Section-->
    <div class="row mx-3">
      <div class="col-2 d-flex justify-content-start align-items-center">
        <img src="img/logo_ofi.png" style="height: 70px;">
      </div>
      <div class="col-8 text-center"><br>
        <h1 style="font-size: 35px;">
          Censo Nacional de Gobierno, Seguridad Pública y Sistema Penitenciario Estatales <?php echo $anio; ?>
        </h1>
        <h3>Módulo 1: Administración pública de la entidad federativa</h3>
        <!-- <h3 class="text-center"><u>Instituciones paraestatales <?php echo $anio; ?></u></h3> -->
      </div>
      <div class="col-2 d-flex justify-content-end align-items-center">
        <img src="img/hidal.png" style="height: 100px;">
      </div>
    </div>

    <div class="row m-3">
      <div class="col-12">
        <!--pregunta 1-->
        <div class="col-lg-12" id="1">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Instituciones Centralizadas de la Administración Pública de la Entidad Federativa.</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="2" align="center"><b>Clave</b></td>
                      <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                      <td colspan="1"><b>Clasificación Administrativa</b></td>
                      <td colspan="8" align="center"><b>Función ejercida</b></td>
                    </tr>
                    <tr>
                      <td style="font-size:11px"><b>1. Administración Pública Centralizada.<br>2. Administración Pública Paraestatal.</b></td>
                      <td align="center"><b>Principal</b></td>
                      <td colspan="6"><b>Secundaria(s)</b></td>
                    </tr>
                    <tr>
                      <?php
                      $pre1 = mysqli_query($con, "SELECT * FROM tbl_instituciones WHERE anio=$anio");
                      while ($rs1 = mysqli_fetch_array($pre1)) {
                        $nombre = $rs1['nombre'];
                        $clasificacionAd = $rs1['clasificacionAd'];
                        $funcionPr = $rs1['funcionPr'];
                        $secUno = $rs1['secUno'];
                        $secDos = $rs1['secDos'];
                        $secTres = $rs1['secTres'];
                        $secCuatro = $rs1['secCuatro'];
                        $secCinco = $rs1['secCinco'];
                        /* $totalh1=['totalh1'];
                          $toatlm1=['toatlm1'];
                          $totalh2=['totalh2'];
                          $totalm2=['totalm2'];
                          $comen2=['comen2'];*/
                        if ($funcionPr == "NO APLICA1") {
                          $funcionPr = "NO APLICA";
                          //$rs1['id'];
                        }
                      ?>
                        <td class="text-center"><label><?php echo $rs1['id']; ?></label></td>
                        <td><label><?php echo $nombre;  ?></label></td>
                        <td class="text-center"><label><?php if ($clasificacionAd == "1") {
                                                          echo "1";
                                                        } else {
                                                          echo "2";
                                                        } ?></label></td>
                        <td><label><?php if ($funcionPr == "NO APLICA1") {
                                      echo "NO APLICA";
                                    } else {
                                      echo $funcionPr;
                                    } ?></label></td>
                        <td><label><?php if ($secUno == "NO APLICA2") {
                                      echo "NO APLICA";
                                    } else {
                                      echo $secUno;
                                    } ?></label></td>
                        <td><label><?php if ($secDos == "NO APLICA3") {
                                      echo "NO APLICA";
                                    } else {
                                      echo $secDos;
                                    } ?></label></td>
                        <td><label><?php if ($secTres == "NO APLICA4") {
                                      echo "NO APLICA";
                                    } else {
                                      echo $secTres;
                                    } ?></label></td>
                        <td><label><?php if ($secCuatro == "NO APLICA5") {
                                      echo "NO APLICA";
                                    } else {
                                      echo $secCuatro;
                                    } ?></label></td>
                        <td><label><?php if ($secCinco == "NO APLICA6") {
                                      echo "NO APLICA";
                                    } else {
                                      echo $secCinco;
                                    } ?></label></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 1-->

        <!--pregunta 2-->
        <div class="col-lg-12" id="2">
          <div class="card">
            <h3 class="h4" style="padding-left:15px">I.2 Recursos Humanos</h3>
            <h4 class="h4" style="padding-left:15px">I.2.1 Perfil de los titulares de las instituciones </h4>
            <div class="card-header d-flex align-items-center">
              <label class="text-justify">Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, los datos de su titular al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio - 1; ?>, utilizando para tal efecto los catálogos que se presentan en la parte inferior de la siguiente tabla.</label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="3" align="center"><b>Clave</b></td>
                      <td rowspan="3" align="center"><b>Nombre de la Institución</b></td>
                      <td colspan="9" align="center"><b>Perfiles de los titulares de las Instituciones de la Administración Pública de la entidad federativa</b></td>
                      <td rowspan="3" align="center"><b>Institución con el mismo titular</b></td>
                      <td rowspan="3"><b>Vacante</b></td>
                    </tr>
                    <tr>
                      <td rowspan="2" align="center" width="80px"><b>Sexo</b></td>
                      <td rowspan="2" align="center"><b>Edad</b></td>
                      <td rowspan="2" align="center" width="8%"><b>Rango de ingresos mensual</b></td>
                      <td colspan="3" align="center"><b>Ultimo grado de estudios</b></td>
                      <td rowspan="2" align="center"><b>Antigüedad en el servicio público</b></td>
                      <td rowspan="2" align="center"><b>Empleo anterior</b></td>
                      <td rowspan="2" align="center"><b>Forma de designación</b></td>
                      <!--<td rowspan="2" align="center">Institución con el mismo titular</td>
                             <td rowspan="2">Vacante</td>-->
                    </tr>
                    <tr>
                      <td align="center">Nivel de escolaridad</td>
                      <td>Estatus</td>
                      <td>Especialidad</td>
                    </tr>
                    <tr>
                      <?php
                      $pre2 = mysqli_query($con, "SELECT tbl_pregunta2.id_intu,tbl_pregunta2.nombre_intu, tbl_pregunta2.sexo, tbl_pregunta2.edad, tbl_pregunta2.rangoMensu, tbl_pregunta2.grad, tbl_pregunta2.stats, tbl_pregunta2.especialidad,tbl_pregunta2.antigueda, tbl_pregunta2.empreoAnter, tbl_pregunta2.designacion,tbl_pregunta2.institular, tbl_pregunta2.vacant, tbl_pregunta2.tituloo, tbl_pregunta2.cedula FROM `tbl_pregunta2` INNER JOIN tbl_instituciones ON tbl_pregunta2.id_intu=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta2.anio=$anio order by tbl_pregunta2.id_intu asc");
                      while ($rs2 = mysqli_fetch_array($pre2)) {
                        $sexo = $rs2['sexo'];
                        $edad = $rs2['edad'];
                        $rangoMensu = $rs2['rangoMensu'];
                        $grad = $rs2['grad'];
                        $stats = $rs2['stats'];
                        $specialida = $rs2['especialidad'];
                        $antigueda = $rs2['antigueda'];
                        $empreoAnter = $rs2['empreoAnter'];
                        $designac = $rs2['designacion'];
                        $institular = $rs2['institular'];
                        $vacant = $rs2['vacant'];
                        $tituloo = $rs2['tituloo'];
                        $cedula = $rs2['cedula'];
                        if ($vacant == "Si") { ?>
                          <th class="text-center font-weight-normal"><?php echo $rs2['id_intu']; ?></th>
                          <th class="text-left font-weight-normal"><?php echo $rs2['nombre_intu']; ?></th>
                          <td class="text-center font-weight-normal"><b style="color:var(--success);">VAC</b></td>
                          <td class="text-center font-weight-normal"></td>
                          <td class="text-center font-weight-normal"></td>
                          <td class="text-center font-weight-normal"></td>
                          <td class="text-center font-weight-normal"></td>
                          <td class="text-center font-weight-normal"></td>
                          <td class="text-center font-weight-normal"></td>
                          <td class="text-center font-weight-normal"></td>
                          <td class="text-center font-weight-normal"></td>
                          <td class="text-center font-weight-normal"></td>
                          <td class="text-center font-weight-normal"></td>
                        <?php
                        } else {
                        ?>
                          <th class="text-center font-weight-normal"><?php echo $rs2['id_intu']; ?></th>
                          <th class="text-left font-weight-normal"><?php echo $rs2['nombre_intu']; ?></th>
                          <td class="text-center font-weight-normal"><?php echo $sexo; ?></td>
                          <td class="text-center font-weight-normal"><?php echo $edad; ?></td>
                          <td class="text-center font-weight-normal"><?php echo $rangoMensu; ?></td>
                          <td class="text-center font-weight-normal"><?php echo $grad; ?></td>
                          <td class="text-center font-weight-normal"><?php echo $stats; ?></td>
                          <td class="text-center font-weight-normal"><?php echo $specialida; ?></td>
                          <td class="text-center font-weight-normal"><?php echo $antigueda; ?></td>
                          <td class="text-center font-weight-normal"><?php echo $empreoAnter; ?></td>
                          <td class="text-center font-weight-normal"><?php echo $designac; ?></td>
                          <td class="text-center font-weight-normal"><?php echo $institular; ?></td>
                          <td class="text-center font-weight-normal"><?php echo $vacant; ?></td>
                        <?php } ?>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 2-->

        <!--pregunta 3-->
        <div class="col-lg-12" id="3">
          <div class="card">
            <h3 class="h4" style="padding-left:15px">I.2.2 Características del personal</h3>
            <div class="card-header d-flex align-items-center">
              <p>Pregunta 3 : Anote la cantidad de personal adscrito a las instituciones de la Administración Pública de su entidad federativa al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio - 1; ?>, según sexo y clasificación administrativa de la institución de adscripción.</p>
            </div>
            <div class="card-body">
              <?php
              $pre3 = mysqli_query($con, "SELECT SUM(totalh1) as H FROM `tbl_instituciones` WHERE clasificacionAd='1' AND anio=$anio");
              while ($rs3 = mysqli_fetch_array($pre3)) {
                $totalh1 = $rs3['H'];
              }
              ?>
              <?php
              $p = mysqli_query($con, "SELECT SUM(toatlm1) as M FROM `tbl_instituciones` WHERE clasificacionAd='1' AND anio=$anio");
              while ($rs33 = mysqli_fetch_array($p)) {
                $totalm1 = $rs33['M'];
              }
              $sum1 = $totalh1 + $totalm1;
              ?>
              <h4 style="text-align: left;"> 1. Personal en instituciones de la Administración Pública Centralizada <span class="ml-5">Total: <?php echo $sum1; ?></span></h4><br>
              <div class="row" style="text-align: left">
                <div class="col-md-2">
                  <label><?php echo $totalh1; ?></label>
                </div>
                <div class="col-md-10">
                  <label><b>1.1 Hombres</b></label>
                </div>
                <br><br>
                <div class="col-md-2">
                  <label><?php echo $totalm1; ?></label>
                </div>
                <div class="col-md-10">
                  <label><b>1.2 Mujeres</b></label>
                </div>
                <br><br>
              </div>
              <?php
              $preee = mysqli_query($con, "SELECT SUM(totalh2) as H2 FROM `tbl_instituciones` WHERE clasificacionAd='2' AND anio=$anio");
              while ($rs34 = mysqli_fetch_array($preee)) {
                $totalh2 = $rs34['H2'];
              }
              ?>
              <?php
              $pw = mysqli_query($con, "SELECT SUM(totalm2) as M2 FROM `tbl_instituciones` WHERE clasificacionAd='2' AND anio=$anio");
              while ($rsw = mysqli_fetch_array($pw)) {
                $totalm2 = $rsw['M2'];
              }
              $sum2 = $totalh2 + $totalm2;
              $to = $sum2 + $sum1;
              ?>
              <h4 style="text-align: left;">2. Personal en instituciones de la Administración Pública Paraestatal <span class="ml-5">Total: <?php echo $sum2; ?></span></h4><br>
              <div class="row" style="text-align: left;">
                <div class="col-md-2">
                  <label><?php echo $totalh2; ?></label>
                </div>
                <div class="col-md-10">
                  <label><b>2.1 Hombres</b></label>
                </div>
                <br><br>
                <div class="col-md-2">
                  <label><?php echo $totalm2; ?></label>
                </div>
                <div class="col-md-10">
                  <label><b>2.2 Mujeres</b></label>
                </div>
              </div>
              <br>
              <h3>Total del personal: <span class="ml-5 font-weight-bold"><?php echo $to; ?></span></h3>
            </div>
          </div>
        </div>
        <!--fin pregunta 3-->

        <!--pregunta 4-->
        <div class="col-lg-12" id="4">
          <div class="card">
            <h3 class="h4" style="padding-left:16px"> Pregunta 4 </h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de personal que reportó como respuesta en la pregunta anterior, anote la cantidad del mismo especificando su régimen de contratación y sexo.</label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <!-- <td rowspan="2"><b>#</b></td> -->
                      <td rowspan="2" colspan="2" align="center"><b>Régimen de contratación</b></td>
                      <td colspan="3" align="center"><b>Personal adscrito a las instituciones de la Administración Pública, según sexo</b></td>
                    </tr>
                    <tr>
                      <!-- <td ><b>#</b></td>-->
                      <!--<td ><b>Régimen de contratación</b></td>-->
                      <td align="center"><b>Total</b></td>
                      <td align="center"><b>Hombres</b></td>
                      <td align="center"><b>Mujeres</b></td>
                    </tr>
                    <tr>
                      <?php
                      $pre4 = mysqli_query($con, "SELECT SUM(confianzah) as confianzahh, SUM(confianzam) as confianzam, SUM(baseh) as baseh, SUM(basem) as basem, SUM(eventualh) as eventualh, SUM(eventualm) as eventualm, SUM(honorariosh) as honorariosh, SUM(honorariosm) as honorariosm, SUM(otroh) as otroh, SUM(otrom) as otrom FROM tbl_pregunta4 INNER JOIN tbl_instituciones ON tbl_pregunta4.id_inst=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta4.anio=$anio");
                      while ($rs4 = mysqli_fetch_array($pre4)) {
                        $confianzah = $rs4['confianzahh'];
                        $confianzam = $rs4['confianzam'];
                        $baseh = $rs4['baseh'];
                        $basem = $rs4['basem'];
                        $eventualh = $rs4['eventualh'];
                        $eventualm = $rs4['eventualm'];
                        $honorariosh = $rs4['honorariosh'];
                        $honorariosm = $rs4['honorariosm'];
                        $otroh = $rs4['otroh'];
                        $otrom = $rs4['otrom'];
                      }
                      ?>
                      <td>1</td>
                      <td>Confianza</td>
                      <td style="text-align: center;"><b><?php echo $t1 = $confianzah + $confianzam; ?></b></td>
                      <td style="text-align: center;"><?php echo $confianzah; ?></td>
                      <td style="text-align: center;"><?php echo $confianzam; ?></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Base o sindicalización</td>
                      <td style="text-align: center;"><b><?php echo $t2 = $baseh + $basem; ?></b></td>
                      <td style="text-align: center;"><?php echo $baseh; ?></td>
                      <td style="text-align: center;"><?php echo $basem; ?></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Eventual</td>
                      <td style="text-align: center;"><b><?php echo $t3 = $eventualh + $eventualm; ?></b></td>
                      <td style="text-align: center;"><?php echo $eventualh; ?></td>
                      <td style="text-align: center;"><?php echo $eventualm; ?></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Honorarios</td>
                      <td style="text-align: center;"><b><?php echo $t4 = $honorariosh + $honorariosm; ?></b></td>
                      <td style="text-align: center;"><?php echo $honorariosh; ?></td>
                      <td style="text-align: center;"><?php echo $honorariosm; ?></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Otros</td>
                      <td style="text-align: center;"><b><?php echo $t5 = $otroh + $otrom; ?></b></td>
                      <td style="text-align: center;"><?php echo $otroh; ?></td>
                      <td style="text-align: center;"><?php echo $otrom; ?></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align: right;"><b>TOTAL</b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $t1 + $t2 + $t3 + $t4 + $t5; ?></b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $confianzah + $baseh + $eventualh + $honorariosh + $otroh; ?></b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $confianzam + $basem + $eventualm + $honorariosm + $otrom; ?></b></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 4-->

        <!--pregunta 5-->
        <div class="col-lg-12" id="5">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 5</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de personal que reportó como respuesta en la pregunta 3, anote la cantidad del mismo especificando la institución de seguridad social en la que se encontraba registrado y sexo.</label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <!--<td rowspan="2"><b>#</b></td>-->
                      <td rowspan="2" colspan="2" align="center"><b>Institución de seguridad social</b></td>
                      <td colspan="3" align="center"><b>Personal adscrito a las instituciones de la Administración Pública, según sexo</b></td>
                    </tr>
                    <tr>
                      <!--<td ><b>#</b></td>
                              <td ><b>Institución de seguridad social</b></td>-->
                      <td align="center"><b>Total</b></td>
                      <td align="center"><b>Hombres</b></td>
                      <td align="center"><b>Mujeres</b></td>
                    </tr>
                    <tr>
                      <?php
                      $pre5 = mysqli_query($con, "SELECT SUM(isssteh) as isssteh, SUM(isstem) as isstem, SUM(issefhh) as issefhh, SUM(issefhm) as issefhm, SUM(imssh) as imssh, SUM(imssm) as imssm, SUM(otroh) as otroh, SUM(otrom) as otrom, SUM(sinseguroh) as sinseguroh, SUM(sinsegurom) as sinsegurom FROM `tbl_pregunta5` INNER JOIN tbl_instituciones ON tbl_pregunta5.idIns=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta5.anio=$anio");
                      if ($rs5 = mysqli_fetch_array($pre5)) {
                        $isssteh = $rs5['isssteh'];
                        $isstem = $rs5['isstem'];
                        $issefhh = $rs5['issefhh'];
                        $issefhm = $rs5['issefhm'];
                        $imssh = $rs5['imssh'];
                        $imssm = $rs5['imssm'];
                        $otroh = $rs5['otroh'];
                        $otrom = $rs5['otrom'];
                        $sinseguroh = $rs5['sinseguroh'];
                        $sinsegurom = $rs5['sinsegurom'];
                      }
                      ?>
                      <td>1</td>
                      <td>Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado (ISSSTE)</td>
                      <td style="text-align: center;"><b><?php echo $tt1 = $isssteh + $isstem;  ?></b></td>
                      <td style="text-align: center;"><?php echo $isssteh; ?></td>
                      <td style="text-align: center;"><?php echo $isstem; ?></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Institución de Seguridad Social de la entidad federativa u homóloga</td>
                      <td style="text-align: center;"><b><?php echo $tt2 = $issefhh + $issefhm;  ?></b></td>
                      <td style="text-align: center;"><?php echo $issefhh; ?></td>
                      <td style="text-align: center;"><?php echo $issefhm; ?></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Instituto Mexicano del Seguro Social (IMSS)</td>
                      <td style="text-align: center;"><b><?php echo $tt3 = $imssh + $imssm;  ?></b></td>
                      <td style="text-align: center;"><?php echo $imssh; ?></td>
                      <td style="text-align: center;"><?php echo $imssm; ?></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Otra institución de Seguridad Social</td>
                      <td style="text-align: center;"><b><?php echo $tt4 = $otroh + $otrom; ?></b></td>
                      <td style="text-align: center;"><?php echo $otroh; ?></td>
                      <td style="text-align: center;"><?php echo $otrom; ?></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Sin seguridad social</td>
                      <td style="text-align: center;"><b><?php echo $tt5 = $sinseguroh + $sinsegurom; ?></b></td>
                      <td style="text-align: center;"><?php echo $sinseguroh; ?></td>
                      <td style="text-align: center;"><?php echo $sinsegurom; ?></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align: right;"><b>TOTAL</b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $tt1 + $tt2 + $tt3 + $tt4 + $tt5; ?></b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $isssteh + $issefhh + $imssh + $otroh + $sinseguroh; ?></b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $isstem + $issefhm + $imssm + $otrom + $sinsegurom; ?></b></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 5-->

        <!--pregunta 6-->
        <div class="col-lg-12" id="6">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 6</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de personal que reportó como respuesta en la pregunta 3, anote la cantidad del mismo especificando su rango de edad y sexo.</label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <!--<td rowspan="2"><b>#</b></td>-->
                      <td rowspan="2" colspan="2" align="center"><b>Rango de Edad</b></td>
                      <td colspan="3" align="center"><b>Personal adscrito a las instituciones de la Administración Pública, según sexo</b></td>
                    </tr>
                    <tr>
                      <!--<td colspan="2">Rango de Edad</td>-->
                      <td align="center"><b>Total</b></td>
                      <td align="center"><b>Hombres</b></td>
                      <td align="center"><b>Mujeres</b></td>
                    </tr>
                    <?php
                    $pre6 = mysqli_query($con, "SELECT SUM(1824H) as 1824H, SUM(1824M) as 1824M, SUM(2529H) as 2529H, SUM(2529M) as 2529M, SUM(3034H) as 3034H, SUM(3034M) as 3034M, SUM(3539H) as 3539H, SUM(3539M) as 3539M, SUM(4044H) as 4044H, SUM(4044M) as 4044M, SUM(4549H) as 4549H, SUM(4549M) as 4549M, SUM(5054H) as 5054H, SUM(5054M) as 5054M, SUM(5559H) as 5559H, SUM(5559M) as 5559M, SUM(60H) as 60H, SUM(60M) as 60M FROM `tbl_pregunta6` INNER JOIN tbl_instituciones ON tbl_pregunta6.id_inti=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta6.anio=$anio");
                    if ($rs6 = mysqli_fetch_array($pre6)) {
                      $H1 = $rs6['1824H'];
                      $M1 = $rs6['1824M'];
                      $H2 = $rs6['2529H'];
                      $M2 = $rs6['2529M'];
                      $H3 = $rs6['3034H'];
                      $M3 = $rs6['3034M'];
                      $H4 = $rs6['3539H'];
                      $M4 = $rs6['3539M'];
                      $H5 = $rs6['4044H'];
                      $M5 = $rs6['4044M'];
                      $H6 = $rs6['4549H'];
                      $M6 = $rs6['4549M'];
                      $H7 = $rs6['5054H'];
                      $M7 = $rs6['5054M'];
                      $H8 = $rs6['5559H'];
                      $M8 = $rs6['5559M'];
                      $H9 = $rs6['60H'];
                      $M9 = $rs6['60M'];
                    }
                    ?>
                    <tr>
                      <td>1</td>
                      <td>De 18 a 24 años</td>
                      <td style="text-align: center;"><b><?php echo $su1824 = $H1 + $M1; ?></b></td>
                      <td style="text-align: center;"><?php echo $H1; ?></td>
                      <td style="text-align: center;"><?php echo $M1; ?></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>De 25 a 29 años</td>
                      <td style="text-align: center;"><b><?php echo $su2529 = $H2 + $M2; ?></b></td>
                      <td style="text-align: center;"><?php echo $H2; ?></td>
                      <td style="text-align: center;"><?php echo $M2; ?></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>De 30 a 34 años</td>
                      <td style="text-align: center;"><b><?php echo $su3034 = $H3 + $M3; ?></b></td>
                      <td style="text-align: center;"><?php echo $H3; ?></td>
                      <td style="text-align: center;"><?php echo $M3; ?></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>De 35 a 39 años</td>
                      <td style="text-align: center;"><b><?php echo $su3539 = $H4 + $M4; ?></b></td>
                      <td style="text-align: center;"><?php echo $H4; ?></td>
                      <td style="text-align: center;"><?php echo $M4; ?></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>De 40 a 44 años</td>
                      <td style="text-align: center;"><b><?php echo $su4044 = $H5 + $M5; ?></b></td>
                      <td style="text-align: center;"><?php echo $H5; ?></td>
                      <td style="text-align: center;"><?php echo $M5; ?></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>De 45 a 49 años</td>
                      <td style="text-align: center;"><b><?php echo $su4549 = $H6 + $M6; ?> </b></td>
                      <td style="text-align: center;"><?php echo $H6 ?></td>
                      <td style="text-align: center;"><?php echo $M6;; ?></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>De 50 a 54 años</td>
                      <td style="text-align: center;"><b><?php echo $su5054 = $H7 + $M7; ?> </b></td>
                      <td style="text-align: center;"><?php echo $H7; ?></td>
                      <td style="text-align: center;"><?php echo $M7; ?></td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>De 55 a 59 años</td>
                      <td style="text-align: center;"><b><?php echo $su5559 = $H8 + $M8; ?> </b></td>
                      <td style="text-align: center;"><?php echo $H8; ?></td>
                      <td style="text-align: center;"><?php echo $M8; ?></td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>De 60 años o más</td>
                      <td style="text-align: center;"><b><?php echo $su60 = $H9 + $M9; ?> </b></td>
                      <td style="text-align: center;"><?php echo $H9; ?></td>
                      <td style="text-align: center;"><?php echo $M9; ?></td>
                    </tr>
                    <tr>
                      <th colspan="2" style="text-align: right;"><b>TOTAL</b></th>
                      <th style="text-align: center; font-size: 16px;"><?php echo $su1824 + $su2529 + $su3034 + $su3539 + $su4044 + $su4549 + $su5054 + $su5559 + $su60; ?></th>
                      <td class="font-weight-bold" style="text-align: center; font-size: 16px;"><?php echo $H1 + $H2 + $H3 + $H4 + $H5 + $H6 + $H7 + $H8 + $H9; ?></td>
                      <td class="font-weight-bold" style="text-align: center; font-size: 16px;"><?php echo $M1 + $M2 + $M3 + $M4 + $M5 + $M6 + $M7 + $M8 + $M9; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 6-->

        <!--pregunta 7-->
        <div class="col-lg-12" id="7">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 7</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de personal que reportó como respuesta en la pregunta 3, anote la cantidad del mismo especificando su rango de ingresos mensual y sexo.</label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead>
                  </thead>
                  <tbody>
                    <tr>
                      <!--<td rowspan="2"><b>#</b></td>-->
                      <td rowspan="2" colspan="2" align="center"><b>Rango de ingresos mensual</b></td>
                      <td colspan="3" align="center"><b>Personal adscrito a las instituciones de la Administración Pública, según sexo</b></td>
                    </tr>
                    <tr>
                      <!--<td ><b>#</b></td>
                              <td ><b>Rango de ingresos mensual</b></td>-->
                      <td align="center"><b>Total</b></td>
                      <td align="center"><b>Hombres</b></td>
                      <td align="center"><b>Mujeres</b></td>
                    </tr>
                    <?php
                    $pre7 = mysqli_query($con, "SELECT SUM(sinpagoh) as sinpagoh, SUM(sinpagom) as sinpagom, SUM(pago2h) as pago2h, SUM(pago2m) as pago2m, SUM(pago3h) as pago3h, SUM(pago3m) as pago3m, SUM(pago4h) as pago4h, SUM(pago4m) as pago4m, SUM(pago5h) as pago5h, SUM(pago5m) as pago5m, SUM(pago6h) as pago6h, SUM(pago6m) as pago6m, SUM(pago7h) as pago7h, SUM(pago7m) as pago7m, SUM(pago8h) as pago8h, SUM(pago8m) as pago8m, SUM(pago9h) as pago9h, SUM(pago9m) as pago9m, SUM(pago10h) as pago10h, SUM(pago10m) as pago10m, SUM(pago11h) as pago11h, SUM(pago11m) as pago11m, SUM(pago12h) as pago12h, SUM(pago12m) as pago12m, SUM(pago13h) as pago13h, SUM(pago13m) as pago13m, SUM(pago14h) as pago14h, SUM(pago14m) as pago14m, SUM(pago15h) as pago15h, SUM(pago15m) as pago15m, SUM(pago16h) as pago16h, SUM(pago16m) as pago16m FROM `tbl_pregunta7` INNER JOIN tbl_instituciones ON tbl_pregunta7.idIns=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta7.anio=$anio");
                    if ($rs7 = mysqli_fetch_array($pre7)) {
                      $sinpagoh = $rs7['sinpagoh'];
                      $sinpagom = $rs7['sinpagom'];
                      $pago2h = $rs7['pago2h'];
                      $pago2m = $rs7['pago2m'];
                      $pago3h = $rs7['pago3h'];
                      $pago3m = $rs7['pago3m'];
                      $pago4h = $rs7['pago4h'];
                      $pago4m = $rs7['pago4m'];
                      $pago5h = $rs7['pago5h'];
                      $pago5m = $rs7['pago5m'];
                      $pago6h = $rs7['pago6h'];
                      $pago6m = $rs7['pago6m'];
                      $pago7h = $rs7['pago7h'];
                      $pago7m = $rs7['pago7m'];
                      $pago8h = $rs7['pago8h'];
                      $pago8m = $rs7['pago8m'];
                      $pago9h = $rs7['pago9h'];
                      $pago9m = $rs7['pago9m'];
                      $pago10h = $rs7['pago10h'];
                      $pago10m = $rs7['pago10m'];
                      $pago11h = $rs7['pago11h'];
                      $pago11m = $rs7['pago11m'];
                      $pago12h = $rs7['pago12h'];
                      $pago12m = $rs7['pago12m'];
                      $pago13h = $rs7['pago13h'];
                      $pago13m = $rs7['pago13m'];
                      $pago14h = $rs7['pago14h'];
                      $pago14m = $rs7['pago14m'];
                      $pago15h = $rs7['pago15h'];
                      $pago15m = $rs7['pago15m'];
                      $pago16h = $rs7['pago16h'];
                      $pago16m = $rs7['pago16m'];
                      $topagoh = $sinpagoh + $pago2h + $pago3h + $pago4h + $pago5h + $pago6h + $pago7h + $pago8h + $pago9h + $pago10h + $pago11h + $pago12h + $pago13h + $pago14h + $pago15h + $pago16h;
                      $totpagom = $sinpagom + $pago2m + $pago3m + $pago4m + $pago5m + $pago6m + $pago7m + $pago8m + $pago9m + $pago10m + $pago11m + $pago12m + $pago13m + $pago14m + $pago15m + $pago16m;
                      $totall = $topagoh + $totpagom;
                    }
                    ?>
                    <tr>
                      <td>1</td>
                      <td>Sin paga</td>
                      <td style="text-align: center;"><b> <?php echo $sinpagoh + $sinpagom; ?></b></td>
                      <td style="text-align: center;"> <?php echo $sinpagoh; ?></td>
                      <td style="text-align: center;"> <?php echo $sinpagom; ?></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>De 1 a 5,000 pesos</td>
                      <td style="text-align: center;"><b> <?php echo $pago2h + $pago2m; ?></b></td>
                      <td style="text-align: center;"> <?php echo $pago2h; ?></td>
                      <td style="text-align: center;"> <?php echo $pago2m; ?></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>De 5,001 a 10,000 pesos</td>
                      <td style="text-align: center;"><b> <?php echo $pago3h + $pago3m; ?></b></td>
                      <td style="text-align: center;"> <?php echo $pago3h; ?></td>
                      <td style="text-align: center;"> <?php echo $pago3m; ?></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>De 10,001 a 15,000 pesos</td>
                      <td style="text-align: center;"><b> <?php echo $pago4h + $pago4m; ?></b></td>
                      <td style="text-align: center;"> <?php echo $pago4h; ?></td>
                      <td style="text-align: center;"> <?php echo $pago4m; ?></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>De 15,001 a 20,000 pesos</td>
                      <td style="text-align: center;"><b> <?php echo $pago5h + $pago5m; ?></b></td>
                      <td style="text-align: center;"> <?php echo $pago5h; ?></td>
                      <td style="text-align: center;"> <?php echo $pago5m; ?></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>De 20,001 a 25,000 pesos</td>
                      <td style="text-align: center;"><b> <?php echo $pago6h + $pago6m; ?></b></td>
                      <td style="text-align: center;"> <?php echo $pago6h; ?></td>
                      <td style="text-align: center;"> <?php echo $pago6m; ?></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>De 25,001 a 30,000 pesos</td>
                      <td style="text-align: center;"><b><?php echo $pago7h + $pago7m; ?></b></td>
                      <td style="text-align: center;"><?php echo $pago7h; ?></td>
                      <td style="text-align: center;"> <?php echo $pago7m; ?></td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>De 30,001 a 35,000 pesos</td>
                      <td style="text-align: center;"><b><?php echo $pago8h + $pago8m; ?></b></td>
                      <td style="text-align: center;"><?php echo $pago8h; ?></td>
                      <td style="text-align: center;"><?php echo $pago8m; ?></td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>De 35,001 a 40,000 pesos</td>
                      <td style="text-align: center;"><b><?php echo $pago9h + $pago9m; ?></b></td>
                      <td style="text-align: center;"><?php echo $pago9h; ?></td>
                      <td style="text-align: center;"><?php echo $pago9m; ?></td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>De 40,001 a 45,000 pesos</td>
                      <td style="text-align: center;"><b><?php echo $pago10h + $pago10m; ?></b></td>
                      <td style="text-align: center;"><?php echo $pago10h; ?></td>
                      <td style="text-align: center;"><?php echo $pago10m; ?></td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>De 45,001 a 50,000 pesos</td>
                      <td style="text-align: center;"><b><?php echo $pago11h + $pago11m; ?></b></td>
                      <td style="text-align: center;"><?php echo $pago11h; ?></td>
                      <td style="text-align: center;"><?php echo $pago11m; ?></td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>De 50,001 a 55,000 pesos</td>
                      <td style="text-align: center;"><b><?php echo $pago12h + $pago12m; ?></b></td>
                      <td style="text-align: center;"><?php echo $pago12h; ?></td>
                      <td style="text-align: center;"><?php echo $pago12m; ?></td>
                    </tr>
                    <tr>
                      <td>13</td>
                      <td>De 55,001 a 60,000 pesos</td>
                      <td style="text-align: center;"><b><?php echo $pago13h + $pago13m; ?></b></td>
                      <td style="text-align: center;"><?php echo $pago13h; ?></td>
                      <td style="text-align: center;"><?php echo $pago13m; ?></td>
                    </tr>
                    <tr>
                      <td>14</td>
                      <td>De 60,001 a 65,000 pesos</td>
                      <td style="text-align: center;"><b><?php echo $pago14h + $pago14m; ?></b></td>
                      <td style="text-align: center;"><?php echo $pago14h; ?></td>
                      <td style="text-align: center;"><?php echo $pago14m; ?></td>
                    </tr>
                    <tr>
                      <td>15</td>
                      <td>De 65,001 a 70,000 pesos</td>
                      <td style="text-align: center;"><b><?php echo $pago15h + $pago15m; ?></b></td>
                      <td style="text-align: center;"><?php echo $pago15h; ?></td>
                      <td style="text-align: center;"><?php echo $pago15m; ?></td>
                    </tr>
                    <tr>
                      <td>16</td>
                      <td>Más de 70,000 pesos</td>
                      <td style="text-align: center;"><b><?php echo $pago16h + $pago16m; ?></b></td>
                      <td style="text-align: center;"><?php echo $pago16h; ?></td>
                      <td style="text-align: center;"><?php echo $pago16m; ?></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align: right;"><b>TOTAL</b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $totall; ?></b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $topagoh; ?></b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $totpagom; ?></b></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 7-->

        <!--pregunta 8-->
        <div class="col-lg-12" id="8">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 8</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de personal que reportó como respuesta en la pregunta 3, anote la cantidad del mismo especificando su nivel de escolaridad y sexo.</label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="2" colspan="2" align="center"><b>Nivel de escolaridad</b></td>
                      <td colspan="3" align="center"><b>Personal adscrito a las instituciones de la Administración Pública, según sexo</b></td>
                    </tr>
                    <tr>
                      <!--<td colspan="2">Grado de estudios concluido</td>-->
                      <td align="center"><b>Total</b></td>
                      <td align="center"><b>Hombres</b></td>
                      <td align="center"><b>Mujeres</b></td>
                    </tr>
                    <?php
                    $pre8 = mysqli_query($con, "SELECT SUM(h1) as h1, SUM(m1) as m1, SUM(h2) as h2, SUM(m2) as m2, SUM(h3) as h3, SUM(m3) as m3, SUM(h4) as h4, SUM(m4) as m4, SUM(h5) as h5, SUM(m5) as m5, SUM(h6) as h6, SUM(m6) as m6, SUM(h7) as h7, SUM(m7) as m7, SUM(h8) as h8, SUM(m8) as m8  FROM `tbl_pregunta8` INNER JOIN tbl_instituciones ON tbl_pregunta8.id_inst=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta8.anio=$anio");
                    if ($rs8 = mysqli_fetch_array($pre8)) {
                      $h1 = $rs8['h1'];
                      $m1 = $rs8['m1'];
                      $h2 = $rs8['h2'];
                      $m2 = $rs8['m2'];
                      $h3 = $rs8['h3'];
                      $m3 = $rs8['m3'];
                      $h4 = $rs8['h4'];
                      $m4 = $rs8['m4'];
                      $h5 = $rs8['h5'];
                      $m5 = $rs8['m5'];
                      $h6 = $rs8['h6'];
                      $m6 = $rs8['m6'];
                      $h7 = $rs8['h7'];
                      $m7 = $rs8['m7'];
                      $h8 = $rs8['h8'];
                      $m8 = $rs8['m8'];
                      $sumhh = $h1 + $h2 + $h3 + $h4 + $h5 + $h6 + $h7 + $h8;
                      $summm = $m1 + $m2 + $m3 + $m4 + $m5 + $m6 + $m7 + $m8;
                    }
                    ?>
                    <tr>
                      <td>1</td>
                      <td>Ninguno</td>
                      <td class="font-weight-bold" style="text-align: center;"><?php echo $h1 + $m1; ?></td>
                      <td style="text-align: center;"><?php echo $h1; ?></td>
                      <td style="text-align: center;"><?php echo $m1; ?></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Preescolar o primaria</td>
                      <td class="font-weight-bold" style="text-align: center;"><?php echo $h2 + $m2; ?></td>
                      <td style="text-align: center;"><?php echo $h2; ?></td>
                      <td style="text-align: center;"><?php echo $m2; ?></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Secundaria</td>
                      <td class="font-weight-bold" style="text-align: center;"><?php echo $h3 + $m3; ?></td>
                      <td style="text-align: center;"><?php echo $h3; ?></td>
                      <td style="text-align: center;"><?php echo $m3; ?></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Preparatoria</td>
                      <td class="font-weight-bold" style="text-align: center;"><?php echo $h4 + $m4; ?></td>
                      <td style="text-align: center;"><?php echo $h4; ?></td>
                      <td style="text-align: center;"><?php echo $m4; ?></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Carrera técnica o comercial</td>
                      <td class="font-weight-bold" style="text-align: center;"><?php echo $h5 + $m5; ?></td>
                      <td style="text-align: center;"><?php echo $h5; ?></td>
                      <td style="text-align: center;"><?php echo $m5; ?></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Licenciatura</td>
                      <td class="font-weight-bold" style="text-align: center;"><?php echo $h6 + $m6; ?></td>
                      <td style="text-align: center;"><?php echo $h6; ?></td>
                      <td style="text-align: center;"><?php echo $m6; ?></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Maestría</td>
                      <td class="font-weight-bold" style="text-align: center;"><?php echo $h7 + $m7; ?></td>
                      <td style="text-align: center;"><?php echo $h7; ?></td>
                      <td style="text-align: center;"><?php echo $m7; ?></td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>Doctorado</td>
                      <td class="font-weight-bold" style="text-align: center;"><?php echo $h8 + $m8; ?></td>
                      <td style="text-align: center;"><?php echo $h8; ?></td>
                      <td style="text-align: center;"><?php echo $m8; ?></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align: right;"><b>TOTAL</b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $sumhh + $summm; ?></b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $sumhh; ?></b></td>
                      <td style="text-align: center; font-size: 16px;"><b><?php echo $summm; ?></b></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 8-->

        <!-- pregunta 9-->
        <div class="col-lg-12" id="9">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 9</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de personal que reportó como respuesta en la pregunta 3, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad del mismo especificando su sexo.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="2" align="center"><b>Clave</b></td>
                      <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                      <td colspan="3" align="center"><b>Personal adscrito a las instituciones de la Administración Pública, según sexo</b></td>
                    </tr>
                    <tr>
                      <td align="center"><b>Total</b></td>
                      <td align="center">Hombre</td>
                      <td align="center">Mujeres</td>
                    </tr>
                    <?php
                    $sqqq = mysqli_query($con, "SELECT * FROM tbl_instituciones WHERE anio=$anio order by id asc");
                    while ($rr = mysqli_fetch_array($sqqq)) {
                      $h1 = $rr['totalh1'];
                      $m1 = $rr['toatlm1'];
                      $h2 = $rr['totalh2'];
                      $m2 = $rr['totalm2'];
                      $clasificacionAd2 = $rr['clasificacionAd'];
                      $ar[] = $h1 + $h2;
                      $hom = array_sum($ar);
                      $ar2[] = $m1 + $m2;
                      $muj = array_sum($ar2);
                      $tt = $hom + $muj;
                    ?>
                      <tr>
                        <td align="center"><?php if (isset($rr['id'])) {
                                              echo $rr['id'];
                                            } ?></td>
                        <td><?php if (isset($rr['nombre'])) {
                              echo $rr['nombre'];
                            } ?></td>
                        <td class="font-weight-bold" align="center"><?php if ($clasificacionAd2 == "1") {
                                                                      echo $asum = $h1 + $m1;
                                                                    } else {
                                                                      echo $asum1 = $h2 + $m2;
                                                                    }  ?></td>
                        <td align="center"><?php if ($clasificacionAd2 == "1") {
                                              echo $h1;
                                            } else {
                                              echo $h2;
                                            } ?></td>
                        <td align="center"><?php if ($clasificacionAd2 == "1") {
                                              echo $m1;
                                            } else {
                                              echo $m2;
                                            }  ?></td>
                      </tr>
                    <?php } ?>
                    <tr>
                      <td class="text-right font-weight-bold" colspan="2"> TOTAL</td>
                      <td class="text-center font-weight-bold"><?php echo $tt; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $hom; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $muj; ?></td>
                    </tr>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 9-->

        <!--pregunta 9.1 -->
        <div class="col-lg-12" id="10">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 10</h3>
            <div class="card-header d-flex align-items-center">
              <label>A partir de la información que reportó como respuesta para la(s) institución(es) de educación (básica, media superior y superior) en la pregunta anterior, señale si se contabilizó al personal que trabajaba en organismos descentralizados pagados con fondos federales.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead>
                  </thead>
                  <tbody>
                    <tr>
                      <td rowspan="2" align="center"><b>Clave</b></td>
                      <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                    </tr>
                    <tr>
                      <td align="center" width="9%"><b>Si</b></td>
                      <td align="center" width="9%"><b>No</b></td>
                      <td align="center" width="9%"><b>No se sabe</b></td>
                    </tr>
                    <?php
                    $sqfondosf = mysqli_query($con, "SELECT nueveuno.id_institu,nueveuno.institucion,nueveuno.option1 FROM `tbl_pregunta9-1` nueveuno inner join tbl_instituciones ins on nueveuno.id_institu=ins.id where ins.anio=$anio AND nueveuno.anio=$anio order by nueveuno.id_institu asc");
                    while ($respf = mysqli_fetch_array($sqfondosf)) {
                      $opcionselec = $respf['option1'];
                    ?>
                      <tr>
                        <td class="text-center"><?php if (isset($respf['id_institu'])) {
                                                  echo $respf['id_institu'];
                                                } ?></td>
                        <td><?php if (isset($respf['institucion'])) {
                              echo $respf['institucion'];
                            } ?></td>
                        <td align="center"><?php if ($opcionselec == "Si") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            }  ?></td>
                        <td align="center"><?php if ($opcionselec == "No") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                        <td align="center"><?php if ($opcionselec == "No se sabe") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 9.1 -->

        <!--pregunta 9.2 -->
        <div class="col-lg-12" id="11">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 11</h3>
            <div class="card-header d-flex align-items-center">
              <label>A partir del total de personal que reportó como respuesta para la(s) institución(es) de educación (básica, media superior y superior) en la pregunta 9, anote la cantidad del mismo que trabajaba en organismos descentralizados pagados con fondos federales, según nivel educativo.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <?php
                    $pre92 = mysqli_query($con, "SELECT
                                                  SUM((
                                                      SELECT
                                                        SUM(c.eduBasica)
                                                      FROM `tbl_pregunta9-2` AS c
                                                      WHERE        
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.funcionPr='4' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secUno='4' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secDos='4' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secTres='4' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secCuatro='4' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secCinco='4'
                                                  )) AS eduBasica,
                                                  SUM((
                                                      SELECT
                                                        SUM(c.eduMedia)
                                                      FROM `tbl_pregunta9-2` AS c
                                                      WHERE        
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.funcionPr='5' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secUno='5' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secDos='5' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secTres='5' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secCuatro='5' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secCinco='5'
                                                  )) AS eduMedia,
                                                  SUM((
                                                      SELECT
                                                        SUM(c.eduSuperior)
                                                      FROM `tbl_pregunta9-2` AS c
                                                      WHERE        
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.funcionPr='6' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secUno='6' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secDos='6' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secTres='6' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secCuatro='6' OR
                                                      
                                                        c.id_institu=a.id_institu AND
                                                        c.anio=$anio AND
                                                        a.anio=$anio AND
                                                        b.anio=$anio AND
                                                        b.secCinco='6'
                                                  )) AS eduSuperior
                                              FROM `tbl_pregunta9-2` AS a
                                              INNER JOIN tbl_instituciones AS b ON b.id=a.id_institu
                                              WHERE a.anio=$anio AND b.anio=$anio");
                    if ($rs92 = mysqli_fetch_array($pre92)) {
                      $eduBasica = $rs92['eduBasica'];
                      $eduMedia = $rs92['eduMedia'];
                      $eduSuperior = $rs92['eduSuperior'];
                      $total2 = $eduBasica + $eduMedia + $eduSuperior;
                    }
                    ?>
                    <tr>
                      <td>Personal registrado en <b>instituciones de educación básica</b>, pagado con fondos federales</td>
                      <td style="text-align: center; font-size: 18px;"><b><?php if (isset($eduBasica)) {
                                                                            echo $eduBasica;
                                                                          } else {
                                                                            echo "0";
                                                                          } ?></b></td>
                    </tr>
                    <tr>
                      <td>Personal registrado en <b>instituciones de educación media superior</b> pagado con fondos federales</td>
                      <td style="text-align: center; font-size: 18px;"><b><?php if (isset($eduMedia)) {
                                                                            echo $eduMedia;
                                                                          } else {
                                                                            echo "0";
                                                                          } ?></b></td>
                    </tr>
                    <tr>
                      <td>Personal registrado en <b>instituciones de educación superior</b> pagado con fondos federales</td>
                      <td style="text-align: center; font-size: 18px;"><b><?php if (isset($eduSuperior)) {
                                                                            echo $eduSuperior;
                                                                          } else {
                                                                            echo "0";
                                                                          } ?></b></td>
                    </tr>
                    <tr>
                      <th style="text-align: right;">Total de personal pagado con fondos federales</th>
                      <td style="text-align: center; font-size: 18px;"><b><?php if (isset($total2)) {
                                                                            echo $total2;
                                                                          } else {
                                                                            echo "0";
                                                                          } ?></b></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 9.2 -->

        <!--pregunta 9.3 -->
        <div class="col-lg-12" id="12">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 12</h3>
            <div class="card-header d-flex align-items-center">
              <label>A partir de la información que reportó como respuesta para la(s) institución(es) de salud en la pregunta 9, señale si se contabilizó al personal que trabajaba en organismos descentralizados pagados con fondos federales.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="2" align="center"><b>Clave</b></td>
                      <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                    </tr>
                    <tr>
                      <td align="center" width="9%"><b>Si</b></td>
                      <td align="center" width="9%"><b>No</b></td>
                      <td align="center" width="9%"><b>No se sabe</b></td>
                    </tr>
                    <?php
                    $sqfondosfsa = mysqli_query($con, "SELECT nuevetres.id_institu,nuevetres.institucion,nuevetres.option1 FROM `tbl_preguntas9-3` nuevetres inner join tbl_instituciones ins on nuevetres.id_institu=ins.id where ins.anio=$anio AND nuevetres.anio=$anio order by nuevetres.id_institu asc");
                    while ($respfsa = mysqli_fetch_array($sqfondosfsa)) {
                      $opcionselec = $respfsa['option1'];
                    ?>
                      <tr>
                        <td class="text-center"><?php if (isset($respfsa['id_institu'])) {
                                                  echo $respfsa['id_institu'];
                                                } ?></td>
                        <td><?php if (isset($respfsa['institucion'])) {
                              echo $respfsa['institucion'];
                            } ?></td>
                        <td align="center"><?php if ($opcionselec == "Si") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            }  ?></td>
                        <td align="center"><?php if ($opcionselec == "No") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                        <td align="center"><?php if ($opcionselec == "No se sabe") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 9.3 -->

        <!--pregunta 9.4 -->
        <div class="col-lg-12" id="13">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 13</h3>
            <div class="card-header d-flex align-items-center">
              <label>A partir del total de personal que reportó como respuesta para la(s) institución(es) de salud en la pregunta 9, anote la cantidad del mismo que trabajaba en organismos descentralizados pagados con fondos federales.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead>
                  </thead>
                  <tbody>
                    <?php
                    $pre94 = mysqli_query($con, "SELECT SUM(fondo) as fondo FROM `tbl_pregunta9-4` INNER JOIN tbl_instituciones ON `tbl_pregunta9-4`.id_institu=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND `tbl_pregunta9-4`.anio=$anio");
                    if ($rs94 = mysqli_fetch_array($pre94)) {
                      $fondo = $rs94['fondo'];
                    }
                    ?>
                    <tr>
                      <td style="font-size: 16px;"><b>Total de personal pagado con fondos federales.</b></td>
                      <td style="text-align: center; font-size: 18px;"><?php if (isset($fondo)) {
                                                                          echo $fondo;
                                                                        } else {
                                                                          echo "0";
                                                                        } ?></td>
                    </tr>
                  </tbody>
                </table>
                <div class="row" style="margin-left: 40%;"></div>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 9.4 -->

        <!--pregunta 10 -->
        <div class="col-lg-12" id="14">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">I.2.3 Profesionalización del personal</h3>
            <h3 class="h4" style="padding-left:16px">Pregunta 14</h3>
            <div class="card-header d-flex align-items-center">
              <label>Indique si al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio - 1; ?> la Administración Pública de su entidad federativa contaba con alguna institución que coordinara los esfuerzos en materia de profesionalización del personal. En caso afirmativo, anote el nombre de la misma.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead>
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="instituto" id="instituto" value="<?php echo $nombre; ?>">
                  </thead>
                  <tbody>
                    <tr>
                      <td align="center"><b>Clave</b></td>
                      <td align="center"><b>Nombre de las instituciones</b></td>
                      <td width="20%"><b>¿Contaba con alguna institución coordinadora de los esfuerzos en materia de profesionalización?</b></td>
                      <td align="center"><b>Nombre de la institución coordinadora en la materia de profesionalización</b></td>
                    </tr>
                    <?php
                    $pre10 = mysqli_query($con, "SELECT * FROM `tbl_pregunta10` INNER JOIN tbl_instituciones ON tbl_pregunta10.id_institu=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta10.anio=$anio order by id_institu asc");
                    while ($rs10 = mysqli_fetch_array($pre10)) {
                      $idclave = $rs10['id_institu'];
                      $sele = $rs10['sele'];
                      $inst = $rs10['institucion'];
                      $nombreInti = $rs10['nombreInti'];
                    ?>
                      <tr>
                        <td style="font-size: 14px;" align="center"><?php echo $idclave; ?></td>
                        <td style="font-size: 14px;"><?php echo $inst; ?></td>
                        <td style="font-size: 14px;" align="center">
                          <?php if ($sele == "Si") {
                            echo "1";
                          } else if ($sele == "No") {
                            echo "2";
                          } else {
                            echo "9";
                          }
                          ?>
                        </td>
                        <td style="text-align: center; font-size: 14px;"><?php if ($sele == "Si") {
                                                                            echo $nombreInti;
                                                                          } else {
                                                                            echo "";
                                                                          } ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 10 -->

        <!--pregunta 11 -->
        <div class="col-lg-12" id="15">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 15</h3>
            <div class="card-header d-flex align-items-center">
              <label>Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, si al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio - 1; ?> implementaba esquemas y/o mecanismos de profesionalización de su personal. En caso afirmativo, señale los elementos de profesionalización considerados.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="3" align="center"><b>Clave</b></td>
                      <td rowspan="3" align="center"><b>Nombre de las instituciones</b></td>
                      <td rowspan="3" style="font-size:9px" align="center"><b>¿Implementaba esquemas y/o mecanismos de profesionalización de su personal?</b></td>
                      <td rowspan="2" colspan="13" align="center"><b>Elementos de profesionalización</b></td>
                    </tr>
                    <tr></tr>
                    <tr>
                      <td style="font-size:9px"><text><b>Servicio cívil de carrrera</b></text></td>
                      <td style="font-size:9px"><text><b>Reclutamiento, selección e inducción</b></text></td>
                      <td style="font-size:9px"><text><b>Diseño y selección de pruebas de ingresos</b></text></td>
                      <td style="font-size:9px"><text><b>Diseño curricular</b></text></td>
                      <td style="font-size:9px"><text><b>Actualización de perfiles de puesto</b></text></td>
                      <td style="font-size:9px"><text><b>Diseño y validación de competencias</b></text></td>
                      <td style="font-size:9px"><text><b>Concursos públicos y abiertos para la contratación</b></text></td>
                      <td style="font-size:9px"><text><b>Mecanismos de evaluación del desempeño</b></text></td>
                      <td style="font-size:9px"><text><b>Programas de capacitación</b></text></td>
                      <td style="font-size:9px"><text><b>Evaluación de impacto de la capacitación</b></text></td>
                      <td style="font-size:9px"><text><b>Programas de estímulos y recompensas</b></text></td>
                      <td style="font-size:9px"><text><b>Separación del servicio</b></text></td>
                      <td style="font-size:9px"><text><b>Otros</b></text></td>
                    </tr>
                    <?php
                    $pre11 = mysqli_query($con, "SELECT * FROM `tbl_pregunta11` INNER JOIN tbl_instituciones ON tbl_pregunta11.id_institu=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta11.anio=$anio order by id_institu asc");
                    while ($rs11 = mysqli_fetch_array($pre11)) {
                      $idin = $rs11['id_institu'];
                      $iss = $rs11['institucion'];
                      $opti = $rs11['opti'];
                      $eleme1 = $rs11['eleme1'];
                      $eleme2 = $rs11['eleme2'];
                      $eleme3 = $rs11['eleme3'];
                      $eleme4 = $rs11['eleme4'];
                      $eleme5 = $rs11['eleme5'];
                      $eleme6 = $rs11['eleme6'];
                      $eleme7 = $rs11['eleme7'];
                      $eleme8 = $rs11['eleme8'];
                      $eleme9 = $rs11['eleme9'];
                      $eleme10 = $rs11['eleme10'];
                      $eleme11 = $rs11['eleme11'];
                      $eleme12 = $rs11['eleme12'];
                      $eleme13 = $rs11['eleme13'];
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $idin; ?></td>
                        <td><?php echo $iss; ?></td>
                        <td style="text-align: center;"><?php
                                                        if ($opti == "Si") {
                                                          echo "1";
                                                          # code...
                                                        } else if ($opti == "No") {
                                                          echo "2";
                                                        } else {
                                                          echo "9";
                                                        } ?></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme1 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme2 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme3 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme4 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?> </b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme5 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme6 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme7 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme8 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme9 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme10 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme11 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme12 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                        <td align="center" style="font-size: 18px;"><b><?php if ($opti == "Si" and $eleme13 != "") {
                                                                          echo "X";
                                                                        } else {
                                                                          echo "";
                                                                        } ?></b></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 11 -->

        <!--pregunta 15 -->
        <div class="col-lg-12" id="16">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 22</h3>
            <div class="card-header d-flex align-items-center">
              <label>Anote la cantidad de bienes inmuebles con los que contaban las instituciones de la Administración Pública de su entidad federativa al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio - 1; ?>, según clasificación administrativa de la institución de referencia y tipo de posesión.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="3"><b>Clasificación administrativa</b></td>
                      <td colspan="4"><b>Bienes inmuebles, según tipo de posesión</b></td>
                    </tr>
                    <tr>
                      <td rowspan="2"><b>Total</b></td>
                      <td colspan="3"><b>Tipo de posesión</b></td>
                    </tr>
                    <tr>
                      <!--<td ></td>-->
                      <!--<td><b></b></td>-->
                      <td><b>Propios</b></td>
                      <td><b>Rentados</b></td>
                      <td><b>Otro tipo de posesión</b></td>
                    </tr>
                    <?php
                    $se15 = mysqli_query($con, "SELECT SUM(tbl_pregunta15.admcpropio) as admcpropioo, SUM(tbl_pregunta15.admcrenta) as admcrenta, SUM(tbl_pregunta15.admncotro) as admncotro FROM `tbl_pregunta15` INNER JOIN tbl_instituciones ON tbl_instituciones.id=tbl_pregunta15.idInst WHERE tbl_instituciones.clasificacionAd='1' AND tbl_instituciones.anio=$anio AND tbl_pregunta15.anio=$anio");
                    if ($rsss = mysqli_fetch_array($se15)) {
                      $admcpropio = $rsss['admcpropioo'];
                      $admcrenta = $rsss['admcrenta'];
                      $admncotro = $rsss['admncotro'];
                    }
                    ?>
                    <?php
                    $se152 = mysqli_query($con, "SELECT SUM(tbl_pregunta15.admcpropio) as admcpropioo, SUM(tbl_pregunta15.admcrenta) as admcrenta, SUM(tbl_pregunta15.admncotro) as admncotro FROM `tbl_pregunta15` INNER JOIN tbl_instituciones ON tbl_instituciones.id=tbl_pregunta15.idInst WHERE tbl_instituciones.clasificacionAd='2' AND tbl_instituciones.anio=$anio AND tbl_pregunta15.anio=$anio");
                    if ($rsss2 = mysqli_fetch_array($se152)) {
                      $admcpropio2 = $rsss2['admcpropioo'];
                      $admcrenta2 = $rsss2['admcrenta'];
                      $admncotro2 = $rsss2['admncotro'];
                    }
                    ?>
                    <tr>
                      <td>Instituciones de la Administración Pública Centralizada</td>
                      <td class="text-center font-weight-bold"><?php echo $ssum1 = $admcpropio + $admcrenta + $admncotro; ?></td>
                      <td><?php echo $admcpropio; ?></td>
                      <td><?php echo $admcrenta; ?></td>
                      <td><?php echo $admncotro; ?></td>
                    </tr>
                    <tr>
                      <td>Instituciones de la Administración Pública Paraestatal</td>
                      <td class="text-center font-weight-bold"><?php echo $ssum2 = $admcpropio2 + $admcrenta2 + $admncotro2; ?></td>
                      <td><?php echo $admcpropio2; ?></td>
                      <td><?php echo $admcrenta2; ?></td>
                      <td><?php echo $admncotro2; ?></td>
                    </tr>
                    <tr>
                      <td class="text-right font-weight-bold">TOTAL</td>
                      <td class="text-center font-weight-bold" style="font-size: 16px;"><b><?php echo $ssum1 + $ssum2; ?></b></td>
                      <td class="text-center font-weight-bold"><?php echo $admcpropio + $admcpropio2; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $admcrenta + $admcrenta2; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $admncotro + $admncotro2; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 15 -->

        <!--pregunta 16-->
        <div class="col-lg-12" id="17">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 23</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de bienes inmuebles que reportó como respuesta en la pregunta anterior, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de los mismos especificando el tipo de posesión.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="3"><b>Clave</b></td>
                      <td rowspan="3" width="40%"><b>Nombre de las instituciones</b></td>
                      <td><b></b></td>
                      <td colspan="4"><b>Bienes inmuebles, según tipo de posesión</b></td>
                    </tr>
                    <tr>
                      <td rowspan="2"><b>Total</b></td>
                      <td colspan="3"><b>Tipo de posesión</b></td>
                    </tr>
                    <tr>
                      <!--<td ><b>Total</b></td>-->
                      <td><b>Propios</b></td>
                      <td><b>Rentados</b></td>
                      <td><b>Otro tipo de posesión</b></td>
                    </tr>
                    <?php
                    $sqlC = mysqli_query($con, "SELECT * FROM  tbl_pregunta15 INNER JOIN tbl_instituciones ON tbl_pregunta15.idInst=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta15.anio=$anio order by idInst asc");
                    while ($rss = mysqli_fetch_array($sqlC)) {
                      $admcpropio = $rss['admcpropio'];
                      $admcrenta = $rss['admcrenta'];
                      $admncotro = $rss['admncotro'];
                      $s1[] = $admcpropio;
                      $s2[] = $admcrenta;
                      $s3[] = $admncotro;
                    ?>
                      <tr>
                        <td><?php echo $rss['idInst']; ?></td>
                        <td class="text-left"><?php echo $rss['nombreIns']; ?></td>
                        <td><b><label><?php echo $admcpropio + $admcrenta + $admncotro; ?></label></b></td>
                        <td><label><?php echo $admcpropio; ?></label></td>
                        <td><label><?php echo $admcrenta; ?></label></td>
                        <td><label><?php echo $admncotro; ?></label></td>
                      </tr>
                    <?php } ?>
                    <tr>
                      <th class="font-weight-bold text-right" colspan="2">Total</th>
                      <td class="font-weight-bold"><?php echo array_sum($s1) + array_sum($s2) + array_sum($s3); ?></td>
                      <td class="font-weight-bold"><?php echo array_sum($s1); ?></td>
                      <td class="font-weight-bold"><?php echo array_sum($s2); ?></td>
                      <td class="font-weight-bold"><?php echo array_sum($s3); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 16-->

        <!--pregunta 16.1 -->
        <div class="col-lg-12" id="18">
          <div class="card">
            <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>
               <h3 style="text-align: justify;">I.4.1 Bienes inmuebles</h3>
                <br>-->
            <h3 class="h4" style="padding-left:16px">Pregunta 24</h3>
            <div class="card-header d-flex align-items-center">
              <label>A partir de la información que reportó como respuesta en la pregunta anterior, señale si se contabilizaron bienes inmuebles cuyo uso principal fue el apoyo a funciones educativas.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead>
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="instituto" id="instituto" value="<?php echo $nombre; ?>">
                  </thead>
                  <tbody>
                    <tr>
                      <td rowspan="2"><b>Clave</b></td>
                      <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                    </tr>
                    <tr>
                      <td align="center"><b>Si</b></td>
                      <td align="center"><b>No</b></td>
                      <td align="center"><b>No se sabe</b></td>
                    </tr>
                    <?php
                    $sqeducativas = mysqli_query($con, "SELECT * FROM `tbl_pregunta16-3` diestres inner join tbl_instituciones ins on diestres.idIsnt=ins.id where ins.anio=$anio AND diestres.anio=$anio order by idIsnt asc");
                    while ($respedu = mysqli_fetch_array($sqeducativas)) {
                      $opcionedu = $respedu['opcion1'];
                    ?>
                      <tr>
                        <td><?php if (isset($respedu['idIsnt'])) {
                              echo $respedu['idIsnt'];
                            } ?></td>
                        <td class="text-left"><?php if (isset($respedu['nombreInst'])) {
                                                echo $respedu['nombreInst'];
                                              } ?></td>
                        <td align="center"><?php if ($opcionedu == "Si") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            }  ?></td>
                        <td align="center"><?php if ($opcionedu == "No") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                        <td align="center"><?php if ($opcionedu == "No se sabe") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 16.1 -->

        <!--pregunta 16.2 -->
        <div class="col-lg-12" id="19">
          <div class="card">
            <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>
            <h3 style="text-align: justify;">I.4.1 Bienes inmuebles</h3>
              <br>-->
            <h3 class="h4" style="padding-left:16px">Pregunta 25</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de bienes inmuebles que reportó como respuesta en la pregunta 23, anote la cantidad de los mismos que tuvieron como uso principal el apoyo a funciones educativas.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <?php
                    /*$pre16_2=mysqli_query($con, "SELECT SUM(eduBasica) as eduBasica, SUM(edMedSup) as edMedSup, SUM(edSup) as edSup, SUM(otroescuela) as otroescuela, SUM(Total) as Total,
                      SUM(otroeducbasic) as otroeducbasic, SUM(otroedmedsup) as otroedmedsup, SUM(otroedusup) as otroedusup, SUM(otrofuncpri) as otrofuncpri, SUM(otroTotal) as otroTotal, SUM(Totalgraldir) as Totalgraldir
                      FROM `tbl_pregunta16-2` WHERE Status='1'");
                      if($rs16_2=mysqli_fetch_array($pre16_2)) 
                      {
                      $eduBasica=$rs16_2['eduBasica'];
                      $edMedSup=$rs16_2['edMedSup'];
                      $edSup=$rs16_2['edSup'];
                      $edotro=$rs16_2['otroescuela'];
                      $total=$rs16_2['Total'];
                      $eduBasicaotro=$rs16_2['otroeducbasic'];
                      $edMedSupotro=$rs16_2['otroedmedsup'];
                      $edSupotro=$rs16_2['otroedusup'];
                      $edotrotro=$rs16_2['otrofuncpri'];
                      $totalotro=$rs16_2['otroTotal'];
                      $totalgral=$rs16_2['Totalgraldir'];
                      }*/
                    $pre16_2b = mysqli_query($con, "SELECT SUM(eduBasica) as eduBasica,SUM(otroescuela) as otroescuela, SUM(Total) as Total, SUM(otroeducbasic) as otroeducbasic,SUM(otrofuncpri) as otrofuncpri,SUM(otroTotal) as otroTotal FROM `tbl_pregunta16-2` diezdos INNER JOIN tbl_instituciones inst ON diezdos.idInst=inst.id WHERE inst.funcionPr='4' AND diezdos.anio=$anio AND inst.anio=$anio");
                    if ($rs16_2b = mysqli_fetch_array($pre16_2b)) {
                      $eduBasicar = $rs16_2b['eduBasica'];
                      $eduBasicaor = $rs16_2b['otroescuela'];
                      $eduBasicaotror = $rs16_2b['otroeducbasic'];
                      $eduBasicafunr = $rs16_2b['otrofuncpri'];
                    }
                    $pre16_2m = mysqli_query($con, "SELECT SUM(edMedSup) as edMedSup,SUM(otroescuela) as otroescuela, SUM(Total) as Total, SUM(otroedmedsup) as otroedmedsup,SUM(otrofuncpri) as otrofuncpri,SUM(otroTotal) as otroTotal FROM `tbl_pregunta16-2` diezdos INNER JOIN tbl_instituciones inst ON diezdos.idInst=inst.id WHERE inst.funcionPr='5' AND diezdos.anio=$anio AND inst.anio=$anio");
                    if ($rs16_2m = mysqli_fetch_array($pre16_2m)) {
                      $eduMediar = $rs16_2m['edMedSup'];
                      $eduMediaor = $rs16_2m['otroescuela'];
                      $eduMediaotror = $rs16_2m['otroedmedsup'];
                      $eduMediafunr = $rs16_2m['otrofuncpri'];
                    }
                    $pre16_2s = mysqli_query($con, "SELECT SUM(edSup) as edSup,SUM(otroescuela) as otroescuela, SUM(Total) as Total, SUM(otroedusup) as otroedusup,SUM(otrofuncpri) as otrofuncpri, SUM(otroTotal) as otroTotal FROM `tbl_pregunta16-2` diezdos INNER JOIN tbl_instituciones inst ON diezdos.idInst=inst.id WHERE inst.funcionPr='6' AND diezdos.anio=$anio AND inst.anio=$anio");
                    if ($rs16_2s = mysqli_fetch_array($pre16_2s)) {
                      $eduSuper = $rs16_2s['edSup'];
                      $eduSupeor = $rs16_2s['otroescuela'];
                      $eduSupeotror = $rs16_2s['otroedusup'];
                      $eduSupefunr = $rs16_2s['otrofuncpri'];
                    }
                    $eduBasica = $eduBasicar;
                    $edMedSup = $eduMediar;
                    $edSup = $eduSuper;
                    $edotro = $eduBasicaor + $eduMediaor + $eduSupeor;
                    $total = $eduBasica + $edMedSup + $edSup + $edotro;
                    $eduBasicaotro = $eduBasicaotror;
                    $edMedSupotro = $eduMediaotror;
                    $edSupotro = $eduSupeotror;
                    $edotrotro = $eduBasicafunr + $eduMediafunr + $eduSupefunr;
                    $totalotro = $eduBasicaotro + $edMedSupotro + $edSupotro + $edotrotro;
                    $totalgral = $total + $totalotro;
                    ?>
                    <tr>
                      <td align="right" width="80%"><b>Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones educativas</b></td>
                      <td align="center" style="font-size:15px" bgcolor="DFE9F1"><b><label><?php if (isset($totalgral)) {
                                                                                              echo $totalgral;
                                                                                            } else {
                                                                                              echo "No aplica para esta institución";
                                                                                            }  ?></label></b></td>
                    </tr>
                    <tr>
                      <td align="right"><b>1. Bienes inmuebles usados como escuelas</b></td>
                      <td align="center" style="font-size:15px"><b><label><?php if (isset($total)) {
                                                                            echo $total;
                                                                          } else {
                                                                            echo "No aplica para esta institución";
                                                                          }  ?></label></b></td>
                    </tr>
                    <tr>
                      <td align="right">1.1 Registrados por instituciones con función principal "Educación básica"</td>
                      <td class="text-center"><label><?php if (isset($eduBasica)) {
                                                        echo $eduBasica;
                                                      } else {
                                                        echo "No aplica para esta institución";
                                                      }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.2 Registrados por instituciones con función principal "Educación media superior"</b></td>
                      <td class="text-center"><label><?php if (isset($edMedSup)) {
                                                        echo $edMedSup;
                                                      } else {
                                                        echo "No aplica para esta institución";
                                                      }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.3 Registrados por instituciones con función principal "Educación superior"</td>
                      <td class="text-center"><label><?php if (isset($edSup)) {
                                                        echo $edSup;
                                                      } else {
                                                        echo "No aplica para esta institución";
                                                      }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.4 Registrados por instituciones con otro tipo de función principal</td>
                      <td class="text-center"><label><?php if (isset($edotro)) {
                                                        echo $edotro;
                                                      } else {
                                                        echo "No aplica para esta institución";
                                                      }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right"><b>2. Bienes inmuebles usados para otro tipo de apoyo a funciones educativas</b></td>
                      <td align="center" style="font-size:15px"><b><label><?php if (isset($totalotro)) {
                                                                            echo $totalotro;
                                                                          } else {
                                                                            echo "No aplica para esta institución";
                                                                          }  ?></label></b></td>
                    </tr>
                    <tr>
                      <td align="right">2.1 Registrados por instituciones con función principal "Educación básica"</td>
                      <td class="text-center"><label><?php if (isset($eduBasicaotro)) {
                                                        echo $eduBasicaotro;
                                                      } else {
                                                        echo "No aplica para esta institución";
                                                      }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.2 Registrados por instituciones con función principal "Educación media superior"</b></td>
                      <td class="text-center"><label><?php if (isset($edMedSupotro)) {
                                                        echo $edMedSupotro;
                                                      } else {
                                                        echo "No aplica para esta institución";
                                                      }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.3 Registrados por instituciones con función principal "Educación superior"</td>
                      <td class="text-center"><label><?php if (isset($edSupotro)) {
                                                        echo $edSupotro;
                                                      } else {
                                                        echo "No aplica para esta institución";
                                                      }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.4 Registrados por instituciones con otro tipo de función principal</td>
                      <td class="text-center"><label><?php if (isset($edotrotro)) {
                                                        echo $edotrotro;
                                                      } else {
                                                        echo "No aplica para esta institución";
                                                      }  ?></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 16.2 -->

        <!--pregunta 16.3
      <div class="col-lg-12" id="20">
        <div class="card">
          <h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>
          <h3 style="text-align: justify;">I.4.1 Bienes inmuebles</h3>
          <br>

          <label style="text-align: justify;">De acuerdo con el total de bienes inmuebles anotados para la(s) institución(es) de educación (básica, media superior y superior) en la respuesta de la pregunta 16, indique si se contabilizaron los bienes inmuebles cuyo uso principal fue el apoyo a funciones educativas. </label>
          <div class="card-header d-flex align-items-center">
            <h3 class="h4">Pregunta 16.3</h3>

          </div>
          <div class="card-body">
            <div class="table-responsive" style="text-align: center;">
              <table class="table table-sm table-bordered" id="refresh">
                <thead>

                </thead>
                <tbody>
                  <?php
                  /*$pre16_3=mysqli_query($con, "SELECT * FROM `tbl_pregunta16-3` WHERE opcion1='Si' ");

                          if($rs16_3=mysqli_fetch_array($pre16_3)) 
                          {
                          $opci=$rs16_3['opcion1'];
                          }
                          ?>
                          <tr>
                            <th>Resultado</th>
                            <td><center><label><?php if($opci=="Si"){echo "Si";}elseif($opci=="No"){echo "No Aplica";}elseif($opci=="No se sabe"){echo "No se sabe"; }*/ ?></label></center>
                  </td>
                  </tr>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      fin pregunta 16.3 -->

        <!--pregunta 16.4
      <div class="col-lg-12" id="21">
        <div class="card">
          <h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>
          <h3 style="text-align: justify;">I.4.1 Bienes inmuebles</h3>
          <br>

          <label style="text-align: justify;">De acuerdo con la respuesta anterior anote la cantidad de bienes inmuebles que tuvieron como uso principal el apoyo a funciones educativas. </label>
          <div class="card-header d-flex align-items-center">
            <h3 class="h4">Pregunta 16.4</h3>

          </div>
          <div class="card-body">
            <div class="table-responsive" style="text-align: center;">
              <table class="table table-sm table-bordered" id="refresh">
                <thead>

                </thead>
                <tbody>

                  <tr>
                    <td>
                      <label style="text-align: right;"><b>Total de bienes inmuebles</b></label>
                    </td>
                    <?php
                    /*$pre16_4=mysqli_query($con, "SELECT SUM(totalBienesInm) as totalBienesInm FROM `tbl_pregunta16-4` ");

                              if($rs16_4=mysqli_fetch_array($pre16_4)) 
                              {
                              $totalBienesInmu=$rs16_4['totalBienesInm'];
                              }
                              ?>
                            <td><label><?php if(isset($totalBienesInmu)){echo $totalBienesInmu;}else{echo "No aplica";}*/ ?></label></td>
                  </tr>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      fin pregunta 16.4 -->

        <!--pregunta 16.5 -->
        <div class="col-lg-12" id="20">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 26</h3>
            <div class="card-header d-flex align-items-center">
              <label>A partir de la información que reportó como respuesta en la pregunta 23, señale si se contabilizaron bienes inmuebles cuyo uso principal fue el apoyo a funciones de salud.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="2" align="center"><b>Clave</b></td>
                      <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                    </tr>
                    <tr>
                      <td align="center" width="9%"><b>Si</b></td>
                      <td align="center" width="9%"><b>No</b></td>
                      <td align="center" width="9%"><b>No se sabe</b></td>
                    </tr>
                    <?php
                    $sqsalud = mysqli_query($con, "SELECT * FROM `tbl_pregunta16-5` diezcinco INNER JOIN tbl_instituciones ins on diezcinco.idIsnt=ins.id where ins.anio=$anio AND diezcinco.anio=$anio order by idIsnt asc");
                    while ($respsalud = mysqli_fetch_array($sqsalud)) {
                      $opcionsa = $respsalud['opcion1'];
                    ?>
                      <tr>
                        <td align="center"><?php if (isset($respsalud['idIsnt'])) {
                                              echo $respsalud['idIsnt'];
                                            } ?></td>
                        <td class="text-left"><?php if (isset($respsalud['nombreInst'])) {
                                                echo $respsalud['nombreInst'];
                                              } ?></td>
                        <td align="center"><?php if ($opcionsa == "Si") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            }  ?></td>
                        <td align="center"><?php if ($opcionsa == "No") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                        <td align="center"><?php if ($opcionsa == "No se sabe") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 16.5 -->

        <!--pregunta 16.6 -->
        <div class="col-lg-12" id="21">
          <div class="card">
            <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>
            <h3 style="text-align: justify;">I.4.1 Bienes inmuebles</h3>
                <br>-->
            <h3 class="h4" style="padding-left:16px">Pregunta 27</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de bienes inmuebles que reportó como respuesta en la pregunta 23, anote la cantidad de los mismos que tuvieron como uso principal el apoyo a funciones de salud.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <?php
                    $pre16_6 = mysqli_query($con, "SELECT SUM(totalClinicas) as totalClinicas, SUM(totalCentroSalud) as totalCentroSalud, SUM(totalHospitales) as totalHospitales, SUM(totalotrosalud) as totalotrosalud, SUM(total) as total,SUM(totalotrafunclinica) as totalotrafunclinica, SUM(totalotrafuncsa) as totalotrafuncsa, SUM(totalotrafunchos) as totalotrafunchos, SUM(totalotrafuncotro) as totalotrafuncotro, SUM(totalotra) as totalotra,SUM(Totalgral) as Totalgral FROM `tbl_pregunta16-6` WHERE anio=$anio");
                    if ($rs16_6 = mysqli_fetch_array($pre16_6)) {
                      $totalClinicas = $rs16_6['totalClinicas'];
                      $totalCentroSalud = $rs16_6['totalCentroSalud'];
                      $totalHospitales = $rs16_6['totalHospitales'];
                      $totalotrosalud = $rs16_6['totalotrosalud'];
                      $total = $rs16_6['total'];
                      $totalClinicasotro = $rs16_6['totalotrafunclinica'];
                      $totalCentroSaludotro = $rs16_6['totalotrafuncsa'];
                      $totalHospitalesotro = $rs16_6['totalotrafunchos'];
                      $totalotrosaludotro = $rs16_6['totalotrafuncotro'];
                      $totalotro = $rs16_6['totalotra'];
                      $totalgral = $rs16_6['Totalgral'];
                    }
                    ?>
                    <tr>
                      <td align="center"><b>Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones de salud</b></td>
                      <td width="10%" align="center" style="font-size:17px"><b><label><?php if (isset($totalgral)) {
                                                                                        if ($totalgral == 0) {
                                                                                          echo $total;
                                                                                        } else {
                                                                                          echo $totalgral;
                                                                                        }
                                                                                      } else {
                                                                                        echo "No aplica para este instituto";
                                                                                      }  ?></label></b></td>
                    </tr>
                    <tr>
                      <td align="right"><b>1. Bienes inmuebles registrados por instituciones con función principal "Salud"</b></td>
                      <td align="center" style="font-size:17px"><b><label><?php if (isset($total)) {
                                                                            echo $total;
                                                                          } else {
                                                                            echo "No aplica para este instituto";
                                                                          }  ?></label></b></td>
                    </tr>
                    <tr>
                      <td align="right">1.1 Bienes inmuebles usados como clínicas</td>
                      <td align="center"><label><?php if (isset($totalClinicas)) {
                                                  echo $totalClinicas;
                                                } else {
                                                  echo "No aplica para este instituto";
                                                }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.2 Bienes inmuebles usados como centros de salud</td>
                      <td align="center"><label><?php if (isset($totalCentroSalud)) {
                                                  echo $totalCentroSalud;
                                                } else {
                                                  echo "No aplica para este instituto";
                                                }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.3 Bienes inmuebles usados como hospitales</td>
                      <td align="center"><label><?php if (isset($totalHospitales)) {
                                                  echo $totalHospitales;
                                                } else {
                                                  echo "No aplica para este instituto";
                                                }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.4 Bienes inmuebles usados para otro tipo de apoyo a funciones de salud</td>
                      <td align="center"><label><?php if (isset($totalotrosalud)) {
                                                  echo $totalotrosalud;
                                                } else {
                                                  echo "No aplica para este instituto";
                                                }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right"><b>2. Bienes inmuebles registrados por instituciones con otro tipo de función principal</b></td>
                      <td align="center" style="font-size:17px"><b><label><?php if (isset($totalotro)) {
                                                                            echo $totalotro;
                                                                          } else {
                                                                            echo "No aplica para este instituto";
                                                                          }  ?></label></b></td>
                    </tr>
                    <tr>
                      <td align="right">2.1 Bienes inmuebles usados como clínicas</td>
                      <td align="center"><label><?php if (isset($totalClinicasotro)) {
                                                  echo $totalClinicasotro;
                                                } else {
                                                  echo "No aplica para este instituto";
                                                }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.2 Bienes inmuebles usados como centros de salud</td>
                      <td align="center"><label><?php if (isset($totalCentroSaludotro)) {
                                                  echo $totalCentroSaludotro;
                                                } else {
                                                  echo "No aplica para este instituto";
                                                }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.3 Bienes inmuebles usados como hospitales</td>
                      <td align="center"><label><?php if (isset($totalHospitalesotro)) {
                                                  echo $totalHospitalesotro;
                                                } else {
                                                  echo "No aplica para este instituto";
                                                }  ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.4 Bienes inmuebles usados para otro tipo de apoyo a funciones de salud</td>
                      <td align="center"><label><?php if (isset($totalotrosaludotro)) {
                                                  echo $totalotrosaludotro;
                                                } else {
                                                  echo "No aplica para este instituto";
                                                }  ?></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 16.6 -->

        <!--pregunta 16.7 -->
        <div class="col-lg-12" id="22">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 28</h3>
            <div class="card-header d-flex align-items-center">
              <label>A partir de la información que reportó como respuesta en la pregunta 23, señale si se contabilizaron bienes inmuebles cuyo uso principal fue la realización de activación física, cultura física y deporte.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="2"><b>Clave</b></td>
                      <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                    </tr>
                    <tr>
                      <td align="center" width="9%"><b>Si</b></td>
                      <td align="center" width="9%"><b>No</b></td>
                      <td align="center" width="9%"><b>No se sabe</b></td>
                    </tr>
                    <?php
                    $sqfisicadepor = mysqli_query($con, "SELECT * FROM `tbl_pregunta16-7` where anio=$anio order by idInst asc");
                    while ($respfisicadepor = mysqli_fetch_array($sqfisicadepor)) {
                      $opcionfide = $respfisicadepor['opcion1'];
                    ?>
                      <tr>
                        <td><?php if (isset($respfisicadepor['idInst'])) {
                              echo $respfisicadepor['idInst'];
                            } ?></td>
                        <td class="text-left"><?php if (isset($respfisicadepor['nombreInst'])) {
                                                echo $respfisicadepor['nombreInst'];
                                              } ?></td>
                        <td align="center"><?php if ($opcionfide == "Si") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            }  ?></td>
                        <td align="center"><?php if ($opcionfide == "No") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                        <td align="center"><?php if ($opcionfide == "No se sabe") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 16.7 -->

        <!--pregunta 16.8 -->
        <div class="col-lg-12" id="23">
          <div class="card">
            <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>
              <h3 style="text-align: justify;">I.4.1 Bienes inmuebles</h3>
                <br>-->
            <h3 class="h4" style="padding-left:16px">Pregunta 29</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de bienes inmuebles que reportó como respuesta en la pregunta 23, anote la cantidad de los mismos que tuvieron como uso principal la realización de activación física, cultura física y deporte. </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <?php
                    /*$pre16_8=mysqli_query($con, "SELECT SUM(bienesInActFi) as bienesInActFi, SUM(bienesInActRec) as bienesInActRec, SUM(bienesInDep) as bienesInDep, SUM(bienesInDepRend) as bienesInDepRend, SUM(bienesInEventDep) as bienesInEventDep,SUM(bienescinco) as bienescinco, SUM(otros) as otros, SUM(total) as total,SUM(bienesotrotipfis) as bienesotrotipfis, SUM(bienesotrotiprec) as bienesotrotiprec, SUM(bienesotrotipdeps) as bienesotrotipdeps, SUM(bienesotrotipalto) as bienesotrotipalto, SUM(bienesotrotipeven) as bienesotrotipeven,SUM(bienesotrotipcinco) as bienesotrotipcinco, SUM(bienesotrotipotros) as bienesotrotipotros, SUM(totalotros) as totalotros,SUM(Totalgral) as Totalgral FROM `tbl_pregunta16-8` WHERE Status='1'");*/
                    if ($anio == 2019) {
                      $pre16_8 = mysqli_query($con, "SELECT SUM(bienesInActFi) as bienesInActFi, SUM(bienesInActRec) as bienesInActRec, SUM(bienesInDep) as bienesInDep, SUM(bienesInDepRend) as bienesInDepRend, SUM(bienesInEventDep) as bienesInEventDep,SUM(bienescinco) as bienescinco, SUM(otros) as otros, SUM(total) as total,SUM(bienesotrotipfis) as bienesotrotipfis, SUM(bienesotrotiprec) as bienesotrotiprec, SUM(bienesotrotipdeps) as bienesotrotipdeps, SUM(bienesotrotipalto) as bienesotrotipalto, SUM(bienesotrotipeven) as bienesotrotipeven,SUM(bienesotrotipcinco) as bienesotrotipcinco, SUM(bienesotrotipotros) as bienesotrotipotros, SUM(totalotros) as totalotros,SUM(Totalgral) as Totalgral FROM `tbl_pregunta16-8` pregdocho INNER JOIN tbl_instituciones AS inst ON pregdocho.idInst=inst.id WHERE
                    pregdocho.anio=$anio AND
                    inst.anio=$anio");
                    } else {
                      $pre16_8 = mysqli_query($con, "SELECT SUM(bienesInActFi) as bienesInActFi, SUM(bienesInActRec) as bienesInActRec, SUM(bienesInDep) as bienesInDep, SUM(bienesInDepRend) as bienesInDepRend, SUM(bienesInEventDep) as bienesInEventDep,SUM(bienescinco) as bienescinco, SUM(otros) as otros, SUM(total) as total,SUM(bienesotrotipfis) as bienesotrotipfis, SUM(bienesotrotiprec) as bienesotrotiprec, SUM(bienesotrotipdeps) as bienesotrotipdeps, SUM(bienesotrotipalto) as bienesotrotipalto, SUM(bienesotrotipeven) as bienesotrotipeven,SUM(bienesotrotipcinco) as bienesotrotipcinco, SUM(bienesotrotipotros) as bienesotrotipotros, SUM(totalotros) as totalotros,SUM(Totalgral) as Totalgral FROM `tbl_pregunta16-8` pregdocho INNER JOIN tbl_instituciones AS inst ON pregdocho.idInst=inst.id WHERE
                    pregdocho.anio=$anio AND
                    inst.anio=$anio AND
                    inst.funcionPr='9'");
                    }
                    if ($rs16_8 = mysqli_fetch_array($pre16_8)) {
                      $bienesInActFi = $rs16_8['bienesInActFi'];
                      $bienesInActRec = $rs16_8['bienesInActRec'];
                      $bienesInDep = $rs16_8['bienesInDep'];
                      $bienesInDepRend = $rs16_8['bienesInDepRend'];
                      $bienesInEventDep = $rs16_8['bienesInEventDep'];
                      $bienesIotros = $rs16_8['bienescinco'];
                      $otros = $rs16_8['otros'];
                      $total = $rs16_8['total'];
                      $bienesInActFiotros = $rs16_8['bienesotrotipfis'];
                      $bienesInActRecotros = $rs16_8['bienesotrotiprec'];
                      $bienesInDepotros = $rs16_8['bienesotrotipdeps'];
                      $bienesInDepRendotros = $rs16_8['bienesotrotipalto'];
                      $bienesInEventDepotros = $rs16_8['bienesotrotipeven'];
                      $bienesIotrosotros = $rs16_8['bienesotrotipcinco'];
                      $otrosotros = $rs16_8['bienesotrotipotros'];
                      $totalotros = $rs16_8['totalotros'];
                      $totalgral = $rs16_8['Totalgral'];
                    }
                    ?>
                    <tr>
                      <td align="right"><b>Total de bienes inmuebles que tuvieron como uso principal la realización de activación física, cultura física y deporte</b></td>
                      <td align="center" width="10%"><b><label><?php if (isset($totalgral)) {
                                                                  if ($totalgral == 0) {
                                                                    echo $total;
                                                                  } else {
                                                                    echo $totalgral;
                                                                  }
                                                                } else {
                                                                  echo "No aplica";
                                                                } ?></label></b></td>
                    </tr>
                    <tr>
                      <td bgcolor="E3ECF4" align="right"><b>1. Bienes inmuebles registrados por instituciones con función principal "Cultura física y/o deporte"</b></td>
                      <td align="center"><b><label><?php if (isset($total)) {
                                                      echo $total;
                                                    } else {
                                                      echo "No aplica";
                                                    } ?></label></b></td>
                    </tr>
                    <tr>
                      <td align="right">1.1 Bienes inmuebles destinados a la realización de actividades físicas y/o activación física</td>
                      <td class="text-center"><label><?php if (isset($bienesInActFi)) {
                                                        echo $bienesInActFi;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.2 Bienes inmuebles destinados a la realización de recreación física</td>
                      <td class="text-center"><label><?php if (isset($bienesInActRec)) {
                                                        echo $bienesInActRec;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.3 Bienes inmuebles destinados a la realización de deporte y/o deporte social</td>
                      <td class="text-center"><label><?php if (isset($bienesInDep)) {
                                                        echo $bienesInDep;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.4 Bienes inmuebles destinados a la realización de deporte de rendimiento y/o deporte de alto rendimiento</td>
                      <td class="text-center"><label><?php if (isset($bienesInDepRend)) {
                                                        echo $bienesInDepRend;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.5 Bienes inmuebles destinados a la realización de eventos deportivos, eventos deportivos masivos y/o eventos deportivos con fines de espectáculo</td>
                      <td class="text-center"><label><?php if (isset($bienesInEventDep)) {
                                                        echo $bienesInEventDep;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.6 Bienes inmuebles destinados indistintamente a las cinco funciones establecidas con anterioridad</td>
                      <td class="text-center"><label><?php if (isset($bienesIotros)) {
                                                        echo $bienesIotros;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">1.7 Bienes inmuebles destinados a otro tipo de actividades de activación física, cultura física y deporte</td>
                      <td class="text-center"><label><?php if (isset($otros)) {
                                                        echo $otros;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td bgcolor="E3ECF4" align="right"><b>2. Bienes inmuebles registrados por instituciones con otro tipo de función principal</b></td>
                      <td align="center"><b><label><?php if (isset($totalotros)) {
                                                      echo $totalotros;
                                                    } else {
                                                      echo "No aplica";
                                                    } ?></label></b></td>
                    </tr>
                    <tr>
                      <td align="right">2.1 Bienes inmuebles destinados a la realización de actividades físicas y/o activación física</td>
                      <td class="text-center"><label><?php if (isset($bienesInActFiotros)) {
                                                        echo $bienesInActFiotros;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.2 Bienes inmuebles destinados a la realización de recreación física</td>
                      <td class="text-center"><label><?php if (isset($bienesInActRecotros)) {
                                                        echo $bienesInActRecotros;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.3 Bienes inmuebles destinados a la realización de deporte y/o deporte social</td>
                      <td class="text-center"><label><?php if (isset($bienesInDepotros)) {
                                                        echo $bienesInDepotros;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.4 Bienes inmuebles destinados a la realización de deporte de rendimiento y/o deporte de alto rendimiento</td>
                      <td class="text-center"><label><?php if (isset($bienesInDepRendotros)) {
                                                        echo $bienesInDepRendotros;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.5 Bienes inmuebles destinados a la realización de eventos deportivos, eventos deportivos masivos y/o eventos deportivos con fines de espectáculo</td>
                      <td class="text-center"><label><?php if (isset($bienesInEventDepotros)) {
                                                        echo $bienesInEventDepotros;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.6 Bienes inmuebles destinados indistintamente a las cinco funciones establecidas con anterioridad</td>
                      <td class="text-center"><label><?php if (isset($bienesIotrosotros)) {
                                                        echo $bienesIotrosotros;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td align="right">2.7 Bienes inmuebles destinados a otro tipo de actividades de activación física, cultura física y deporte</td>
                      <td class="text-center"><label><?php if (isset($otrosotros)) {
                                                        echo $otrosotros;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 16.8 -->

        <!--pregunta 17 -->
        <div class="col-lg-12" id="24">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">I.4.2 Parque vehicular</h3>
            <h3 class="h4" style="padding-left:16px">Pregunta 30</h3>
            <div class="card-header d-flex align-items-center">
              <label>Anote la cantidad de vehículos en funcionamiento con los que contaban las instituciones de la Administración Pública de su entidad federativa al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio - 1; ?>, según tipo y clasificación administrativa de la institución de referencia.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="3"><b>Clasificación administrativa</b></td>
                      <td colspan="5"><b>Vehículos en funcionamiento, según tipo</b></td>
                    </tr>
                    <tr>
                      <td rowspan="2"><b>Total</b></td>
                      <td colspan="4"><b>Tipo</b></td>
                    </tr>
                    <tr>
                      <td><b>Automóviles</b></td>
                      <td><b>Camiones y camionetas</b></td>
                      <td><b>Motocicletas</b></td>
                      <td><b>Otro</b></td>
                    </tr>
                    <?php
                    $sa = mysqli_query($con, "SELECT SUM(tbl_pregunta17.admcauto) as admcauto, SUM(tbl_pregunta17.admccamioneta) as admccamioneta, SUM(tbl_pregunta17.admcmoto) as admcmoto, SUM(tbl_pregunta17.admcotro) as admcotro, SUM(tbl_pregunta17.total) as total FROM `tbl_pregunta17` INNER JOIN tbl_instituciones ON tbl_instituciones.id=tbl_pregunta17.idIns WHERE tbl_instituciones.clasificacionAd='1' AND tbl_instituciones.anio=$anio AND tbl_pregunta17.anio=$anio");
                    if ($rs17 = mysqli_fetch_array($sa)) {
                      $admcauto = $rs17['admcauto'];
                      $uto[] = $admcauto;
                      $admccamioneta = $rs17['admccamioneta'];
                      $neta[] = $admccamioneta;
                      $admcmoto = $rs17['admcmoto'];
                      $moto[] = $admcmoto;
                      $admcotro = $rs17['admcotro'];
                      $cotro[] = $admcotro;
                      $total = $rs17['total'];
                      $bu1[] = $total;
                    }
                    ?>
                    <?php
                    $sa2 = mysqli_query($con, "SELECT SUM(tbl_pregunta17.admcauto) as admcauto, SUM(tbl_pregunta17.admccamioneta) as admccamioneta, SUM(tbl_pregunta17.admcmoto) as admcmoto, SUM(tbl_pregunta17.admcotro) as admcotro, SUM(tbl_pregunta17.total) as total FROM `tbl_pregunta17` INNER JOIN tbl_instituciones ON tbl_instituciones.id=tbl_pregunta17.idIns WHERE tbl_instituciones.clasificacionAd='2' AND tbl_instituciones.anio=$anio AND tbl_pregunta17.anio=$anio");
                    if ($rs172 = mysqli_fetch_array($sa2)) {
                      $admcauto2 = $rs172['admcauto'];
                      $uto2[] = $admcauto2;
                      $admccamioneta2 = $rs172['admccamioneta'];
                      $neta2[] = $admccamioneta2;
                      $admcmoto2 = $rs172['admcmoto'];
                      $moto2[] = $admcmoto2;
                      $admcotro2 = $rs172['admcotro'];
                      $cotro2[] = $admcotro2;
                      $total2 = $rs172['total'];
                      $bu2[] = $total2;
                    }
                    ?>
                    <tr>
                      <td>Instituciones de la Administración Pública Centralizada </td>
                      <td class="text-center font-weight-bold"><label><?php echo $total; ?></label></td>
                      <td><label><?php echo $admcauto; ?></label></td>
                      <td><label><?php echo $admccamioneta; ?></label></td>
                      <td><label><?php echo $admcmoto; ?></label></td>
                      <td><label><?php echo $admcotro; ?></label></td>
                    </tr>
                    <tr>
                      <td>Instituciones de la Administración Pública Paraestatal</td>
                      <td class="text-center font-weight-bold"><label><?php echo $total2; ?></label></td>
                      <td><label><?php echo $admcauto2; ?></label></td>
                      <td><label><?php echo $admccamioneta2; ?></label></td>
                      <td><label><?php echo $admcmoto2; ?></label></td>
                      <td><label><?php echo $admcotro2; ?></label></td>
                    </tr>
                    <tr>
                      <th class="text-right font-weight-bold">TOTAL</th>
                      <td class="text-center font-weight-bold"><?php echo array_sum($bu1) + array_sum($bu2); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($uto) + array_sum($uto2); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($neta) + array_sum($neta2); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($moto) + array_sum($moto2); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($cotro) + array_sum($cotro2); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 17 -->

        <!--pregunta 18 -->
        <div class="col-lg-12" id="25">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 31</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de vehículos en funcionamiento que reportó como respuesta en la pregunta anterior, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de los mismos especificando su tipo.</label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <!--<td rowspan="2"><b>Clave</b></td>-->
                      <td rowspan="3" align="center"><b>Clave</b></td>
                      <td rowspan="3" align="center"><b>Nombre de las instituciones</b></td>
                      <td colspan="5" align="center"> <b>Vehículos en funcionamiento, según tipo</b></td>
                    </tr>
                    <tr>
                      <td rowspan="2"><b>Total</b></td>
                      <td colspan="4" align="center"><b>Tipo</b></td>
                    </tr>
                    <tr>
                      <td align="center"><b>Automóviles</b></td>
                      <td align="center"><b>Camiones y camionetas</b></td>
                      <td align="center"><b>Motocicletas</b></td>
                      <td align="center"><b>Otro</b></td>
                    </tr>
                    <?php
                    $sqlCeee = mysqli_query($con, "SELECT * FROM `tbl_pregunta17` INNER JOIN tbl_instituciones ON tbl_pregunta17.idIns=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta17.anio=$anio order by idIns asc");
                    while ($rsr = mysqli_fetch_array($sqlCeee)) {
                      $idds = $rsr['idIns'];
                      $noms = $rsr['nombreIns'];
                      $admcauto = $rsr['admcauto'];
                      $aduto[] = $admcauto;
                      $admccamioneta = $rsr['admccamioneta'];
                      $adneta[] = $admccamioneta;
                      $admcmoto = $rsr['admcmoto'];
                      $admoto[] = $admcmoto;
                      $admcotro = $rsr['admcotro'];
                      $adotr[] = $admcotro;
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $idds; ?></td>
                        <td class="text-left"><?php echo $noms; ?></td>
                        <td class="text-center font-weight-bold"><?php echo $tor = $rsr['total'];
                                                                  $toota[] = $tor; ?></td>
                        <td class="text-center"><?php echo $admcauto; ?></td>
                        <td class="text-center"><?php echo $admccamioneta; ?></td>
                        <td class="text-center"><?php echo $admcmoto; ?></td>
                        <td class="text-center"><?php echo $admcotro; ?></td>
                      </tr>
                    <?php } ?>
                    <tr>
                      <td class="text-right font-weight-bold" colspan="2">TOTAL</td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($toota); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($aduto); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($adneta); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($admoto); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($adotr); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 18 -->

        <!--pregunta 19 -->
        <div class="col-lg-12" id="26">
          <div class="card">
            <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>-->
            <h3 style="text-align: justify;">I.4.3 Líneas y aparatos telefónicos</h3>
            <h3 class="h4" style="padding-left:16px">Pregunta 32</h3>
            <div class="card-header d-flex align-items-center">
              <label>Anote la cantidad de líneas telefónicas y aparatos telefónicos en funcionamiento con los que contaban las instituciones de la Administración Pública de su entidad federativa al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio - 1; ?>, según tipo y clasificación administrativa de la institución de referencia. </label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="3"><b>Clasificación Administrativa</b></td>
                      <td colspan="3"><b>Líneas telefónicas en funcionamiento, según tipo</b></td>
                      <td colspan="3"><b>Aparatos telefónicos en funcionamiento, según tipo </b></td>
                    </tr>
                    <tr>
                      <td rowspan="2"><b>Total</b></td>
                      <td colspan="2"><b>Tipo</b></td>
                      <td rowspan="2"><b>Total</b></td>
                      <td colspan="3"><b>Tipo</b></td>
                    </tr>
                    <tr>
                      <td><b>Fíjas</b></td>
                      <td><b>Móviles</b></td>
                      <td><b>Fíjos</b></td>
                      <td><b>Móviles</b></td>
                    </tr>
                    <?php
                    $saaa = mysqli_query($con, "SELECT SUM(tbl_pregunta19.admcfijos1) as admcfijos1, SUM(tbl_pregunta19.admcmoviles1) as admcmoviles1, SUM(tbl_pregunta19.admcfijos2) as admcfijos2, SUM(tbl_pregunta19.admcmoviles2) as admcmoviles2, SUM(tbl_pregunta19.total) as total  FROM tbl_pregunta19 INNER JOIN tbl_instituciones ON tbl_instituciones.id=tbl_pregunta19.idIns WHERE tbl_instituciones.clasificacionAd='1' AND tbl_instituciones.anio=$anio AND tbl_pregunta19.anio=$anio");
                    if ($rs19 = mysqli_fetch_array($saaa)) {
                      $admcfijos1 = $rs19['admcfijos1'];
                      $admcmoviles1 = $rs19['admcmoviles1'];
                      $admcfijos2 = $rs19['admcfijos2'];
                      $admcmoviles2 = $rs19['admcmoviles2'];
                      $total = $rs19['total'];
                    }
                    ?>
                    <?php
                    $saaaw = mysqli_query($con, "SELECT SUM(tbl_pregunta19.admcfijos1) as admcfijos1, SUM(tbl_pregunta19.admcmoviles1) as admcmoviles1, SUM(tbl_pregunta19.admcfijos2) as admcfijos2, SUM(tbl_pregunta19.admcmoviles2) as admcmoviles2, SUM(tbl_pregunta19.total) as total  FROM tbl_pregunta19 INNER JOIN tbl_instituciones ON tbl_instituciones.id=tbl_pregunta19.idIns WHERE tbl_instituciones.clasificacionAd='2' AND tbl_instituciones.anio=$anio AND tbl_pregunta19.anio=$anio");
                    if ($rs19w = mysqli_fetch_array($saaaw)) {
                      $admcfijos1w = $rs19w['admcfijos1'];
                      $admcmoviles1w = $rs19w['admcmoviles1'];
                      $admcfijos2w = $rs19w['admcfijos2'];
                      $admcmoviles2w = $rs19w['admcmoviles2'];
                      $totalw = $rs19w['total'];
                    }
                    ?>
                    <tr>
                      <td>Instituciones de la Administración Pública Centralizada </td>
                      <td class="text-center font-weight-bold"><label><?php echo $va1 = $admcfijos1 + $admcmoviles1; ?></label></td>
                      <td><label><?php echo $admcfijos1; ?></label></td>
                      <td><label><?php echo $admcmoviles1; ?></label></td>
                      <td class="text-center font-weight-bold"><label><?php echo $va3 = $admcfijos2 + $admcmoviles2; ?></label></td>
                      <td><label><?php echo $admcfijos2; ?></label></td>
                      <td><label><?php echo $admcmoviles2; ?></label></td>
                    </tr>
                    <tr>
                      <td>Instituciones de la Administración Pública Paraestatal</td>
                      <td class="text-center font-weight-bold"><label><?php echo $va2 = $admcfijos1w + $admcmoviles1w; ?></label></td>
                      <td><label><?php echo $admcfijos1w; ?></label></td>
                      <td><label><?php echo $admcmoviles1w; ?></label></td>
                      <td class="text-center font-weight-bold"><label><?php echo $va4 = $admcfijos2w + $admcmoviles2w; ?></label></td>
                      <td><label><?php echo $admcfijos2w; ?></label></td>
                      <td><label><?php echo $admcmoviles2w; ?></label></td>
                    </tr>
                    <tr>
                      <th class="text-right font-weight-bold">TOTAL</th>
                      <td class="text-center font-weight-bold"><?php echo $va1 + $va2; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $admcfijos1 + $admcfijos1w; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $admcmoviles1 + $admcmoviles1w; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $va3 + $va4; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $admcfijos2 + $admcfijos2w; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $admcmoviles2 + $admcmoviles2w; ?></td>
                    </tr>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 19 -->

        <!--pregunta 20 -->
        <div class="col-lg-12" id="27">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 33</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de líneas telefónicas y aparatos telefónicos en funcionamiento que reportó como respuesta en la pregunta anterior, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de los mismos especificando su tipo.</label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="3" align="center"><b>Clave</b></td>
                      <td rowspan="3" align="center"><b>Nombre de las instituciones</b></td>
                      <td colspan="3" align="center"><b>Líneas telefónicas en funcionamiento, según tipo</b></td>
                      <td colspan="3" align="center"><b>Aparatos telefónicos en funcionamiento, según tipo</b></td>
                    </tr>
                    <tr>
                      <td rowspan="2" align="center"><b>Total</b></td>
                      <td colspan="2" align="center"><b>Tipo</b></td>
                      <td rowspan="2" align="center"><b>Total</b></td>
                      <td colspan="2" align="center"><b>Tipo</b></td>
                    </tr>
                    <tr>
                      <td align="center"><b>Fijas</b></td>
                      <td align="center"><b>Móviles</b></td>
                      <td align="center"><b>Fijos</b></td>
                      <td align="center"><b>Móviles</b></td>
                    </tr>
                    <?php
                    $sqlCeeee = mysqli_query($con, "SELECT * FROM `tbl_pregunta19` INNER JOIN tbl_instituciones ON tbl_pregunta19.idIns=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta19.anio=$anio order by idIns asc");
                    while ($rsmesu = mysqli_fetch_array($sqlCeeee)) {
                      $admcfijos1C = $rsmesu['admcfijos1'];
                      $admcmoviles1C = $rsmesu['admcmoviles1'];
                      $admcfijos2C = $rsmesu['admcfijos2'];
                      $admcmoviles2C = $rsmesu['admcmoviles2'];
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $rsmesu['idIns']; ?></td>
                        <td class="text-left"><?php echo $rsmesu['nombreIns']; ?></td>
                        <td class="text-center font-weight-bold"><label><?php echo $suumC = $admcfijos1C + $admcmoviles1C;
                                                                        $raC[] = $suumC; ?></label></td>
                        <td class="text-center"><label><?php echo $admcfijos1C;
                                                        $raosC[] = $admcfijos1C; ?></label></td>
                        <td class="text-center"><label><?php echo $admcmoviles1C;
                                                        $raesC[] = $admcmoviles1C; ?></label></td>
                        <td class="text-center font-weight-bold"><label><?php echo $suumC2 = $admcfijos2C + $admcmoviles2C;
                                                                        $raC2[] = $suumC2; ?></label></td>
                        <td class="text-center"><label><?php echo $admcfijos2C;
                                                        $rajosC2[] = $admcfijos2C; ?></label></td>
                        <td class="text-center"><label><?php echo $admcmoviles2C;
                                                        $ralesC2[] = $admcmoviles2C; ?></label></td>
                      </tr>
                    <?php } ?>
                    <tr>
                      <th class="text-right font-weight-bold" colspan="2">TOTAL</th>
                      <td class="text-center font-weight-bold"><?php echo array_sum($raC); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($raosC); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($raesC); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($raC2); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($rajosC2); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($ralesC2); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 20 -->

        <!--pregunta 21 -->
        <div class="col-lg-12" id="28">
          <div class="card">
            <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>-->
            <h3 style="padding-left:15px">I.4.4 Equipo informático</h3>
            <h3 class="h4" style="padding-left:16px">Pregunta 34</h3>
            <div class="card-header d-flex align-items-center">
              <label>Anote la cantidad de computadoras e impresoras, según tipo, así como de multifuncionales, servidores y tabletas electrónicas con los que contaban las instituciones de la Administración Pública de su entidad federativa al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio - 1; ?>, según clasificación administrativa de la institución de referencia.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="3"><b>Clasificación Administrativa</b></td>
                      <td colspan="3"><b>Computadoras, según tipo</b></td>
                      <td colspan="3"><b>Impresoras, según tipo</b></td>
                      <td rowspan="2"><b>Multifuncionales</b></td>
                      <td rowspan="2"><b>Servidores</b></td>
                      <td rowspan="2"><b>Tabletas electrónicas</b></td>
                    </tr>
                    <tr>
                      <td rowspan="2"><b>Total</b></td>
                      <td colspan="2"><b>Tipo</b></td>
                      <td rowspan="2"><b>Total</b></td>
                      <td colspan="2"><b>Tipo</b></td>
                    </tr>
                    <tr>
                      <td><b>Personales (de escritorio) </b></td>
                      <td><b>Portátiles</b></td>
                      <td><b>Para uso personal</b></td>
                      <td><b>Para uso compartido</b></td>
                      <td><b>Total</b></td>
                      <td><b>Total</b></td>
                      <td><b>Total</b></td>
                    </tr>
                    <?php
                    $que21 = mysqli_query($con, "SELECT SUM(tbl_pregunta21.admccompues) as admccompues, SUM(tbl_pregunta21.admccomppo) as admccomppo, SUM(tbl_pregunta21.admcimpper) as admcimpper, SUM(tbl_pregunta21.admcimpcom) as admcimpcom, SUM(tbl_pregunta21.totalcmultf) as totalcmultf, SUM(tbl_pregunta21.totalcserv) as totalcserv, SUM(tbl_pregunta21.totalctablet) as totalctablet FROM `tbl_pregunta21` INNER JOIN tbl_instituciones ON tbl_instituciones.id=tbl_pregunta21.idIns WHERE tbl_instituciones.clasificacionAd='1' AND tbl_instituciones.anio=$anio AND tbl_pregunta21.anio=$anio");
                    $rss21 = mysqli_fetch_array($que21);
                    $admccompues = $rss21['admccompues'];
                    $admccomppo = $rss21['admccomppo'];
                    $s = $admccompues + $admccomppo;
                    $admcimpper = $rss21['admcimpper'];
                    $admcimpcom = $rss21['admcimpcom'];
                    $s222 = $admcimpper + $admcimpcom;
                    $totalcmultf = $rss21['totalcmultf'];
                    $totalcserv = $rss21['totalcserv'];
                    $totalctablet = $rss21['totalctablet'];
                    ?>
                    <tr>
                      <td>Instituciones de la Administración Pública Centralizada </td>
                      <td class="text-center font-weight-bold"><label><?php echo $s; ?></label></td>
                      <td><label><?php echo $admccompues; ?></label></td>
                      <td><label><?php echo $admccomppo; ?></label></td>
                      <td class="text-center font-weight-bold"><label><?php echo $s222; ?></label></td>
                      <td><label><?php echo $admcimpper; ?></label></td>
                      <td><label><?php echo $admcimpcom; ?></label></td>
                      <td class="text-center font-weight-bold"><label><?php echo $totalcmultf; ?></label></td>
                      <td class="text-center font-weight-bold"><label><?php echo $totalcserv; ?></label></td>
                      <td class="text-center font-weight-bold"><label><?php echo $totalctablet; ?></label></td>
                    </tr>
                    <?php
                    $que212 = mysqli_query($con, "SELECT SUM(tbl_pregunta21.admccompues) as admccompues, SUM(tbl_pregunta21.admccomppo) as admccomppo, SUM(tbl_pregunta21.admcimpper) as admcimpper, SUM(tbl_pregunta21.admcimpcom) as admcimpcom, SUM(tbl_pregunta21.totalcmultf) as totalcmultf, SUM(tbl_pregunta21.totalcserv) as totalcserv, SUM(tbl_pregunta21.totalctablet) as totalctablet FROM `tbl_pregunta21` INNER JOIN tbl_instituciones ON tbl_instituciones.id=tbl_pregunta21.idIns WHERE tbl_instituciones.clasificacionAd='2' AND tbl_instituciones.anio=$anio AND tbl_pregunta21.anio=$anio");
                    $rss212 = mysqli_fetch_array($que212);
                    $admccompues2 = $rss212['admccompues'];
                    $admccomppo2 = $rss212['admccomppo'];
                    $s2 = $admccompues2 + $admccomppo2;
                    $admcimpper2 = $rss212['admcimpper'];
                    $admcimpcom2 = $rss212['admcimpcom'];
                    $s22 = $admcimpper2 + $admcimpcom2;
                    $totalcmultf2 = $rss212['totalcmultf'];
                    $totalcserv2 = $rss212['totalcserv'];
                    $totalctablet2 = $rss212['totalctablet'];
                    ?>
                    <tr>
                      <td>Instituciones de la Administración Pública Paraestatal </td>
                      <td class="text-center font-weight-bold"><label><?php echo $s2; ?></label></td>
                      <td><label><?php echo $admccompues2; ?></label></td>
                      <td><label><?php echo $admccomppo2; ?></label></td>
                      <td class="text-center font-weight-bold"><label><?php echo $s22; ?></label></td>
                      <td><label><?php echo $admcimpper2; ?></label></td>
                      <td><label><?php echo $admcimpcom2; ?></label></td>
                      <td class="text-center font-weight-bold"><label><?php echo $totalcmultf2; ?></label></td>
                      <td class="text-center font-weight-bold"><label><?php echo $totalcserv2; ?></label></td>
                      <td class="text-center font-weight-bold"><label><?php echo $totalctablet2; ?></label></td>
                    </tr>
                    <tr>
                      <th class="text-right font-weight-bold">TOTAL</th>
                      <td class="text-center font-weight-bold"><?php echo $s + $s2; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $admccompues + $admccompues2; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $admccomppo + $admccomppo2; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $s222 + $s22; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $admcimpper + $admcimpper2; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $admcimpcom + $admcimpcom2; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $totalcmultf + $totalcmultf2; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $totalcserv + $totalcserv2; ?></td>
                      <td class="text-center font-weight-bold"><?php echo $totalctablet + $totalctablet2; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 21 -->

        <!--pregunta 22 -->
        <div class="col-lg-12" id="29">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 35</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas que reportó como respuesta en la pregunta anterior, anote, por cada una de las instituciones de la Administración Pública de su entidad federativa, la cantidad de los mismos especificando su tipo.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table table-sm table-bordered" id="refresh">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="3" class="text-center"><b>Clave</b></td>
                      <td rowspan="3"><b>Nombre de las instituciones</b></td>
                      <td colspan="3" align="center"><b>Computadoras, según tipo</b></td>
                      <td colspan="3" align="center"><b>Impresoras, según tipo</b></td>
                      <td rowspan="2"><b>Multifuncionales</b></td>
                      <td rowspan="2"><b>Servidores</b></td>
                      <td rowspan="2" align="center"><b>Tabletas electrónicas</b></td>
                    </tr>
                    <tr>
                      <td rowspan="2"><b>Total</b></td>
                      <td colspan="2" align="center"><b>Tipo</b></td>
                      <td rowspan="2"><b>Total</b></td>
                      <td colspan="2" align="center"><b>Tipo</b></td>
                    </tr>
                    <tr>
                      <td><b>Personales (de escritorio) </b></td>
                      <td><b>Portátiles</b></td>
                      <td><b>Para uso personal</b></td>
                      <td><b>Para uso compartido</b></td>
                      <td align="center"><b>Total</b></td>
                      <td align="center"><b>Total</b></td>
                      <td align="center"><b>Total</b></td>
                    </tr>
                    <?php
                    $sqlCCCe = mysqli_query($con, "SELECT * FROM `tbl_pregunta21` INNER JOIN tbl_instituciones ON tbl_pregunta21.idIns=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND tbl_pregunta21.anio=$anio order by idIns asc");
                    while ($rrss = mysqli_fetch_array($sqlCCCe)) {
                      $nindddtt = $rrss['idIns'];
                      $nnnombrrett = $rrss['nombreInst'];
                      $admccompuestt = $rrss['admccompues'];
                      $puestt[] = $admccompuestt;
                      $admccomppott = $rrss['admccomppo'];
                      $comppott[] = $admccomppott;
                      $admcimppertt = $rrss['admcimpper'];
                      $mpperrtt[] = $admcimppertt;
                      $admcimpcomtt = $rrss['admcimpcom'];
                      $pcomtt[] = $admcimpcomtt;
                      $totalcmultftt = $rrss['totalcmultf'];
                      $multftt[] = $totalcmultftt;
                      $totalcservtt = $rrss['totalcserv'];
                      $servtt[] = $totalcservtt;
                      $totalctablettt = $rrss['totalctablet'];
                      $ablettt[] = $totalctablettt;
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $nindddtt; ?></td>
                        <td class="text-left"><?php echo $nnnombrrett; ?></td>
                        <td class="text-center font-weight-bold"><?php echo $suAra1 = $admccompuestt + $admccomppott;
                                                                  $ara1[] = $suAra1; ?></td>
                        <td class="text-center"><?php echo $admccompuestt; ?></td>
                        <td class="text-center"><?php echo $admccomppott; ?></td>
                        <td class="text-center font-weight-bold"><?php echo $suAra2 = $admcimppertt + $admcimpcomtt;
                                                                  $ara2[] = $suAra2; ?></td>
                        <td class="text-center"><?php echo $admcimppertt; ?> </td>
                        <td class="text-center"><?php echo $admcimpcomtt; ?></td>
                        <td class="text-center font-weight-bold"><?php echo $totalcmultftt; ?></td>
                        <td class="text-center font-weight-bold"><?php echo $totalcservtt; ?></td>
                        <td class="text-center font-weight-bold"><?php echo $totalctablettt; ?></td>
                      </tr>
                    <?php } ?>
                    <tr>
                      <th class="text-right font-weight-bold" colspan="2">TOTAL</th>
                      <td class="text-center font-weight-bold"><?php echo array_sum($ara1); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($puestt); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($comppott); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($ara2); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($mpperrtt); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($pcomtt); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($multftt); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($servtt); ?></td>
                      <td class="text-center font-weight-bold"><?php echo array_sum($ablettt); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 22 -->

        <!--pregunta 22.1 -->
        <div class="col-lg-12" id="30">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 36</h3>
            <div class="card-header d-flex align-items-center">
              <label>A partir de la información que reportó como respuesta en la pregunta anterior, indique si se contabilizaron computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas que estaban asignadas a profesores y estudiantes exclusivamente para ser utilizadas con fines educativos y de enseñanza.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered">
                  <thead></thead>
                  <tbody>
                    <tr>
                      <td rowspan="2" align="center"><b>Clave</b></td>
                      <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                    </tr>
                    <tr>
                      <td align="center" width="9%"><b>Si</b></td>
                      <td align="center" width="9%"><b>No</b></td>
                      <td align="center" width="9%"><b>No se sabe</b></td>
                    </tr>
                    <?php
                    $sqensenaza = mysqli_query($con, "SELECT * FROM `tbl_pregunta22-1` veintedos inner join tbl_instituciones ins on veintedos.idInst=ins.id where ins.anio=$anio AND veintedos.anio=$anio order by idInst asc");
                    while ($respensenaza = mysqli_fetch_array($sqensenaza)) {
                      $opcionense = $respensenaza['opcion1'];
                    ?>
                      <tr>
                        <td class="text-center"><?php if (isset($respensenaza['idInst'])) {
                                                  echo $respensenaza['idInst'];
                                                } ?></td>
                        <td><?php if (isset($respensenaza['nombreInst'])) {
                              echo $respensenaza['nombreInst'];
                            } ?></td>
                        <td align="center"><?php if ($opcionense == "Si") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            }  ?></td>
                        <td align="center"><?php if ($opcionense == "No") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                        <td align="center"><?php if ($opcionense == "No se sabe") {
                                              echo "X";
                                            } else {
                                              echo "";
                                            } ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 22.1 -->

        <!--pregunta 22.2 -->
        <div class="col-lg-12" id="31">
          <div class="card">
            <h3 class="h4" style="padding-left:16px">Pregunta 37</h3>
            <div class="card-header d-flex align-items-center">
              <label>De acuerdo con el total de computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas que reportó como respuesta en la pregunta 35, anote la cantidad de las mismas que se asignaron exclusivamente para ser utilizadas con fines educativos y de enseñanza.
              </label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered">
                  <thead></thead>
                  <tbody>
                    <?php
                    $pre22_2 = mysqli_query($con, "SELECT SUM(CompuEdBasica) as CompuEdBasica, SUM(CompuEdMediaS) as CompuEdMediaS,  SUM(CompuEdSup) as CompuEdSup, SUM(CompuEdotro) as CompuEdotro, SUM(totalComFEduc) as totalComFEduc,
                      SUM(ImpreEdBasica) as ImpreEdBasica, SUM(ImpreEdMediaS) as ImpreEdMediaS, SUM(ImpreEdSup) as ImpreEdSup,SUM(ImpreEdotro) as ImpreEdotro,SUM(totalImpFEduc) as totalImpFEduc,
                      SUM(MultifEdBasica) as MultifEdBasica, SUM(MultifEdMediaS) as MultifEdMediaS, SUM(MultifEdSup) as MultifEdSup,SUM(MultifEdotro) as MultifEdotro,SUM(totalMultifFEduc) as totalMultifFEduc,
                      SUM(ServEdBasica) as ServEdBasica, SUM(ServEdMediaS) as ServEdMediaS, SUM(ServEdSup) as ServEdSup, SUM(ServEdotro) as ServEdotro, SUM(totalServidoresFEduc) as totalServidoresFEduc,
                      SUM(TabletsEdBasica) as TabletsEdBasica, SUM(TabletsEdMediaS) as TabletsEdMediaS, SUM(TabletsEdSup) as TabletsEdSup,SUM(TabletsEdotro) as TabletsEdotro,SUM(totalTabletsFEduc) as totalTabletsFEduc FROM `tbl_pregunta22-2` INNER JOIN tbl_instituciones ON `tbl_pregunta22-2`.idInst=tbl_instituciones.id WHERE tbl_instituciones.anio=$anio AND `tbl_pregunta22-2`.anio=$anio");
                    if ($rs22_2 = mysqli_fetch_array($pre22_2)) {
                      $CompuEdBasica = $rs22_2['CompuEdBasica'];
                      $CompuEdMediaS = $rs22_2['CompuEdMediaS'];
                      $CompuEdSup = $rs22_2['CompuEdSup'];
                      $CompuEdotro = $rs22_2['CompuEdotro'];
                      $su1 = $rs22_2['totalComFEduc'];
                      $ImpreEdBasica = $rs22_2['ImpreEdBasica'];
                      $ImpreEdMediaS = $rs22_2['ImpreEdMediaS'];
                      $ImpreEdSup = $rs22_2['ImpreEdSup'];
                      $ImpreEdotro = $rs22_2['ImpreEdotro'];
                      $su2 = $rs22_2['totalImpFEduc'];
                      $MultifEdBasica = $rs22_2['MultifEdBasica'];
                      $MultifEdMediaS = $rs22_2['MultifEdMediaS'];
                      $MultifEdSup = $rs22_2['MultifEdSup'];
                      $MultifEdotro = $rs22_2['MultifEdotro'];
                      $su3 = $rs22_2['totalMultifFEduc'];
                      $ServEdBasica = $rs22_2['ServEdBasica'];
                      $ServEdMediaS = $rs22_2['ServEdMediaS'];
                      $ServEdSup = $rs22_2['ServEdSup'];
                      $ServEdSupotro = $rs22_2['ServEdotro'];
                      $su4 = $rs22_2['totalServidoresFEduc'];
                      $TabletsEdBasica = $rs22_2['TabletsEdBasica'];
                      $TabletsEdMediaS = $rs22_2['TabletsEdMediaS'];
                      $TabletsEdSup = $rs22_2['TabletsEdSup'];
                      $TabletsEdotro = $rs22_2['TabletsEdotro'];
                      $su5 = $rs22_2['totalTabletsFEduc'];
                    }
                    ?>
                    <tr>
                      <td style="text-align: right;" bgcolor="DFE9F1"><b>1. Total de computadoras utilizadas exclusivamente con fines educativos y de enseñanza</b></td>
                      <td width="10%" align="center"><b><label><?php if (isset($su1)) {
                                                                  echo $su1;
                                                                } else {
                                                                  echo "No aplica";
                                                                } ?></label></b></td>
                    </tr>
                    <tr>
                      <td>1.1 Registradas por instituciones con función principal "Educación básica"</td>
                      <td class="text-center"><label><?php if (isset($CompuEdBasica)) {
                                                        echo $CompuEdBasica;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>1.2 Registradas por instituciones con función principal "Educación media superior"</td>
                      <td class="text-center"><label><?php if (isset($CompuEdMediaS)) {
                                                        echo $CompuEdMediaS;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>1.3 Registradas por instituciones con función principal "Educación superior"</td>
                      <td class="text-center"><label><?php if (isset($CompuEdSup)) {
                                                        echo $CompuEdSup;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>1.4 Registradas por instituciones con otro tipo de función principal</td>
                      <td class="text-center"><label><?php if (isset($CompuEdotro)) {
                                                        echo $CompuEdotro;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td style="text-align: right;" bgcolor="DFE9F1"><b>2. Total de impresoras utilizadas exclusivamente con fines educativos y de enseñanza</b></td>
                      <td class="text-center" align="center"><b><label><?php if (isset($su2)) {
                                                                          echo $su2;
                                                                        } else {
                                                                          echo "No aplica";
                                                                        } ?></label></b></td>
                    </tr>
                    <tr>
                      <td>2.1 Registradas por instituciones con función principal "Educación básica"</td>
                      <td class="text-center"><label><?php if (isset($ImpreEdBasica)) {
                                                        echo $ImpreEdBasica;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>2.2 Registradas por instituciones con función principal "Educación media superior"</td>
                      <td class="text-center"><label><?php if (isset($ImpreEdMediaS)) {
                                                        echo $ImpreEdMediaS;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>2.3 Registradas por instituciones con función principal "Educación superior"</td>
                      <td class="text-center"><label><?php if (isset($ImpreEdSup)) {
                                                        echo $ImpreEdSup;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>2.4 Registradas por instituciones con otro tipo de función principal</td>
                      <td class="text-center"><label><?php if (isset($ImpreEdotro)) {
                                                        echo $ImpreEdotro;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td style="text-align: right;" bgcolor="DFE9F1"><b>3. Total de multifuncionales utilizados exclusivamente con fines educativos y de enseñanza</b></td>
                      <td align="center"><b><label><?php if (isset($su3)) {
                                                      echo $su3;
                                                    } else {
                                                      echo "No aplica";
                                                    } ?></label></b></td>
                    </tr>
                    <tr>
                      <td>3.1 Registradas por instituciones con función principal "Educación básica"</td>
                      <td class="text-center"><label><?php if (isset($MultifEdBasica)) {
                                                        echo $MultifEdBasica;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>3.2 Registradas por instituciones con función principal "Educación media superior"</td>
                      <td class="text-center"><label><?php if (isset($MultifEdMediaS)) {
                                                        echo $MultifEdMediaS;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>3.3 Registradas por instituciones con función principal "Educación superior"</td>
                      <td class="text-center"><label><?php if (isset($MultifEdSup)) {
                                                        echo $MultifEdSup;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>3.4 Registradas por instituciones con otro tipo de función principal</td>
                      <td class="text-center"><label><?php if (isset($MultifEdotro)) {
                                                        echo $MultifEdotro;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td style="text-align: right;" bgcolor="DFE9F1"><b>4. Total de servidores utilizados exclusivamente con fines educativos y de enseñanza</b></td>
                      <td align="center"><b><label><?php if (isset($su4)) {
                                                      echo $su4;
                                                    } else {
                                                      echo "No aplica";
                                                    } ?></label></b></td>
                    </tr>
                    <tr>
                      <td>4.1 Registrados por instituciones con función principal "Educación básica"</td>
                      <td class="text-center"><label><?php if (isset($ServEdBasica)) {
                                                        echo $ServEdBasica;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>4.2 Registrados por instituciones con función principal "Educación media superior"</td>
                      <td class="text-center"><label><?php if (isset($ServEdMediaS)) {
                                                        echo $ServEdMediaS;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>4.3 Registrados por instituciones con función principal "Educación superior"</td>
                      <td class="text-center"><label><?php if (isset($ServEdSup)) {
                                                        echo $ServEdSup;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>4.4 Registradas por instituciones con otro tipo de función principal</td>
                      <td class="text-center"><label><?php if (isset($ServEdSupotro)) {
                                                        echo $ServEdSupotro;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td style="text-align: right;" bgcolor="DFE9F1"><b>5. Total de tabletas electrónicas utilizadas exclusivamente con fines educativos y de enseñanza</b></td>
                      <td align="center"><b><label><?php if (isset($su5)) {
                                                      echo $su5;
                                                    } else {
                                                      echo "No aplica";
                                                    } ?></label></b></td>
                    </tr>
                    <tr>
                      <td>5.1 Registrados por instituciones con función principal "Educación básica"</td>
                      <td class="text-center"><label><?php if (isset($TabletsEdBasica)) {
                                                        echo $TabletsEdBasica;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>5.2 Registrados por instituciones con función principal "Educación media superior"</td>
                      <td class="text-center"><label><?php if (isset($TabletsEdMediaS)) {
                                                        echo $TabletsEdMediaS;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>5.3 Registrados por instituciones con función principal "Educación superior"</td>
                      <td class="text-center"><label><?php if (isset($TabletsEdSup)) {
                                                        echo $TabletsEdSup;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                    <tr>
                      <td>5.4 Registradas por instituciones con otro tipo de función principal</td>
                      <td class="text-center"><label><?php if (isset($TabletsEdotro)) {
                                                        echo $TabletsEdotro;
                                                      } else {
                                                        echo "No aplica";
                                                      } ?></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--fin pregunta 22.2 -->

      </div>
    </div>
  </body>

  </html>
<?php
}
?>