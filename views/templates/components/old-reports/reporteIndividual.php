<?php
session_start();
if ($_SESSION['valida'] != "1") {
  header('Location: logout.php');
  exit;
}

require_once("conexion/db.php");
require_once("conexion/conexion.php");

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_apepa = $_SESSION['user_apepa'];
$user_apema = $_SESSION['user_apema'];

$id_insti = base64_decode($_GET['id_insti']);
$anio = base64_decode($_GET['anio']);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Oficialia Mayor</title>
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
  <link rel="stylesheet" type="text/css" href="alertifyjss/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="alertifyjss/css/alertify.min.css">
  <link rel="stylesheet" type="text/css" href="alertifyjss/css/themes/default.css">
  <script src="alertifyjss/alertify.js"></script>
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
    </div>
    <div class="col-2 d-flex justify-content-end align-items-center">
      <img src="img/hidal.png" style="height: 100px;">
    </div>
  </div>

  <div class="row m-3">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <!--pregunta 1-->
      <div class="col-lg-12" id="1">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="h4">Instituciones de la Administración Pública de la Entidad Federativa.</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered" id="refresh">
                <thead></thead>
                <tbody>
                  <tr>
                    <td rowspan="2" colspan="2" align="center">Nombre de las instituciones</td>
                    <td colspan="1">Clasificación Administrativa</td>
                    <td colspan="8" align="center">Función ejercida</td>
                  </tr>
                  <tr>
                    <td style="font-size:11px">1. Administración Pública Centralizada.<br>2. Administración Pública Paraestatal.</td>
                    <td align="center">Principal</td>
                    <td colspan="6">Secundaria(s)</td>
                  </tr>
                  <tr>
                    <?php
                    $pre1 = mysqli_query($con, "SELECT * FROM tbl_instituciones WHERE id='" . $id_insti . "' and anio = '" . $anio . "'");
                    if ($rs1 = mysqli_fetch_array($pre1)) {
                      $nombre = $rs1['nombre'];
                      $clasificacionAd = $rs1['clasificacionAd'];
                      $funcionPr = $rs1['funcionPr'];
                      $secUno = $rs1['secUno'];
                      $secDos = $rs1['secDos'];
                      $secTres = $rs1['secTres'];
                      $secCuatro = $rs1['secCuatro'];
                      $secCinco = $rs1['secCinco'];
                      $comentariosPregunta1 = $rs1['comentarios'];
                      if ($funcionPr == "NO APLICA1") {
                        $funcionPr = "NO APLICA";
                      }
                    } else {
                      header('location: adminResultados.php');
                    }
                    ?>
                    <td><label>#1</label></td>
                    <td><label><b><?php echo $nombre;  ?></b></label></td>
                    <td><label><?php if ($clasificacionAd == "1") {
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
                  <?php
                  # COMENTARIOS PREGUNTA 1
                  if (isset($comentariosPregunta1) && $comentariosPregunta1 != '') {
                  ?>
                    <tr>
                      <td colspan="2" class="text-center">
                        <b>Comentarios</b>
                      </td>
                      <td colspan="8">
                        <?php echo $comentariosPregunta1; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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
            <label class="text-justify">Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, los datos de su titular al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio; ?>, utilizando para tal efecto los catálogos que se presentan en la parte inferior de la siguiente tabla.</label>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered" id="refresh">
                <thead></thead>
                <tbody>
                  <tr>
                    <td rowspan="3" colspan="2" align="center">Nombre de la Institución</td>
                    <td colspan="9" align="center">Perfiles de los titulares de las Instituciones de la Administración Pública de la entidad federativa</td>
                    <td rowspan="3" align="center">Institución con el mismo titular</td>
                    <td rowspan="3">Vacante</td>
                  </tr>
                  <tr>
                    <td rowspan="2" width="80px">Sexo</td>
                    <td rowspan="2">Edad</td>
                    <td rowspan="2" width="8%" align="center">Rango de ingresos mensual</td>
                    <td colspan="3" align="center">Ultimo grado de estudios</td>
                    <td rowspan="2" align="center">Empleo anterior</td>
                    <td rowspan="2" align="center">Antigüedad en el servicio público</td>
                    <td rowspan="2" align="center">Forma de designación</td>
                  </tr>
                  <tr>
                    <td align="center">Nivel de escolaridad</td>
                    <td>Estatus</td>
                    <td>Especialidad</td>
                  </tr>
                  <tr>
                    <?php
                    $pre2 = mysqli_query($con, "SELECT * FROM `tbl_pregunta2` WHERE id_intu='" . $id_insti . "' and anio = '" . $anio . "'");
                    if ($rs2 = mysqli_fetch_array($pre2)) {
                      $ins = $rs2['id_intu'];
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
                      $comentariosPregunta2 = $rs2['comentarios'];
                    }
                    if ($vacant == "Si") { ?>
                      <td><?php echo $ins; ?></td>
                      <th><?php echo $rs2['nombre_intu']; ?></th>
                      <td align="center"><b style="color:var(--success);">VAC</b></td>
                      <td><b style="color:var(--success);"></b></td>
                      <td><b style="color:var(--success);"></b></td>
                      <td><b style="color:var(--success);"></b></td>
                      <td><b style="color:var(--success);"></b></td>
                      <td><b style="color:var(--success);"></b></td>
                      <td><b style="color:var(--success);"></b></td>
                      <td><b style="color:var(--success);"></b></td>
                      <td><b style="color:var(--success);"></b></td>
                      <td><b style="color:var(--success);"></b></td>
                      <td><b style="color:var(--success);"></b></td>
                    <?php
                    } else {
                    ?>
                      <td><?php echo $ins; ?></td>
                      <th><?php echo $rs2['nombre_intu']; ?></th>
                      <td align="center"><?php echo $sexo; ?></td>
                      <td align="center"><?php echo $edad; ?></td>
                      <td align="center"><?php echo $rangoMensu; ?></td>
                      <td align="center"><?php echo $grad; ?></td>
                      <td align="center"><?php echo $stats; ?></td>
                      <td align="center"><?php echo $specialida; ?></td>
                      <td align="center"><?php echo $empreoAnter; ?></td>
                      <td align="center"><?php echo $antigueda; ?></td>
                      <td align="center"><?php echo $designac; ?></td>
                      <td align="center"><?php echo $institular; ?></td>
                      <td align="center"><?php echo $vacant; ?></td>
                    <?php } ?>
                  </tr>
                  <?php
                  # COMENTARIOS PREGUNTA 2
                  if (isset($comentariosPregunta2) && $comentariosPregunta2 != '') {
                  ?>
                    <tr>
                      <td colspan="3" class="text-center">
                        <b>Comentarios</b>
                      </td>
                      <td colspan="10">
                        <?php echo $comentariosPregunta2; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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
            <p>Pregunta 3 : Anote la cantidad de personal adscrito a las instituciones de la Administración Pública de su entidad federativa al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio; ?>, según sexo y clasificación administrativa de la institución de adscripción.</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered" id="refresh">
                <thead></thead>
                <tbody>
                  <tr style="text-align: center;">
                    <td><b>Total del Personal</b></td>
                    <td><b>Total de hombres</b></td>
                    <td><b>Total de mujeres</b></td>
                    <td><b>Comentarios</b></td>
                  </tr>
                  <tr>
                    <?php
                    $pre3 = mysqli_query($con, "SELECT * FROM `tbl_instituciones` WHERE id='" . $id_insti . "' and anio = $anio");
                    if ($rs3 = mysqli_fetch_array($pre3)) {
                      $clasificacionAd = $rs3['clasificacionAd'];
                      $totalh1 = $rs3['totalh1'];
                      $toatlm1 = $rs3['toatlm1'];
                      $suma1 = $totalh1 + $toatlm1;
                      $totalh2 = $rs3['totalh2'];
                      $totalm2 = $rs3['totalm2'];
                      $suma2 = $totalh2 + $totalm2;
                      $comen2 = $rs3['comen2'];
                    }
                    ?> <td style="font-size: 18px; text-align: center;"><?php if ($clasificacionAd == '1') {
                                                                          echo                           $suma1;
                                                                        } else {
                                                                          echo $suma2;
                                                                        } ?></td>
                    <td style="font-size: 18px; text-align: center;"><?php if ($clasificacionAd == '1') {
                                                                        echo $totalh1;
                                                                      } else {
                                                                        echo $totalh2;
                                                                      } ?></td>
                    <td style="font-size: 18px; text-align: center;"><?php if ($clasificacionAd == '1') {
                                                                        echo $toatlm1;
                                                                      } else {
                                                                        echo $totalm2;
                                                                      } ?></td>
                    <td style="font-size: 14px; text-align: justify;"><?php if ($comen2 == '') {
                                                                        echo 'No se registraron comentarios.';
                                                                      } else {
                                                                        echo $comen2;
                                                                      } ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
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
                    <td rowspan="2"><b>#</b></td>
                    <td rowspan="2" align="center"><b>Régimen de contratación</b></td>
                    <td colspan="3" align="center"><b>Personal adscrito a las instituciones de la Administración Pública, según sexo</b></td>
                  </tr>
                  <tr>
                    <td align="center"><b>Total</b></td>
                    <td align="center"><b>Hombres</b></td>
                    <td align="center"><b>Mujeres</b></td>
                  </tr>
                  <tr>
                    <?php
                    $pre4 = mysqli_query($con, "SELECT * FROM tbl_pregunta4 WHERE id_inst='" . $id_insti . "' and anio=$anio");
                    if ($rs4 = mysqli_fetch_array($pre4)) {
                      $confianzah = $rs4['confianzah'];
                      $confianzam = $rs4['confianzam'];
                      $baseh = $rs4['baseh'];
                      $basem = $rs4['basem'];
                      $eventualh = $rs4['eventualh'];
                      $eventualm = $rs4['eventualm'];
                      $honorariosh = $rs4['honorariosh'];
                      $honorariosm = $rs4['honorariosm'];
                      $otroh = $rs4['otroh'];
                      $otrom = $rs4['otrom'];
                      $array1[] = $confianzah + $confianzam;
                      $su1 = array_sum($array1);
                      $array2[] = $baseh + $basem;
                      $su2 = array_sum($array2);
                      $array3[] = $eventualh + $eventualm;
                      $su3 = array_sum($array3);
                      $array4[] = $honorariosh + $honorariosm;
                      $su4 = array_sum($array4);
                      $array5[] = $otroh + $otrom;
                      $su5 = array_sum($array5);
                      $arrayh[] = $confianzah + $baseh + $eventualh + $honorariosh + $otroh;
                      $sumh = array_sum($arrayh);
                      $arraym[] = $confianzam + $basem + $eventualm + $honorariosm + $otrom;
                      $summ = array_sum($arraym);
                      $sumhm = $sumh + $summ;
                      $comentariosPregunta4 = $rs4['comentarios'];
                    }
                    ?>
                    <td>1</td>
                    <td>Confianza</td>
                    <td style="text-align: center;"><b><?php echo $su1; ?></b></td>
                    <td style="text-align: center;"><?php echo $confianzah; ?></td>
                    <td style="text-align: center;"><?php echo $confianzam; ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Base o sindicalizado</td>
                    <td style="text-align: center;"><b><?php echo $su2; ?></b></td>
                    <td style="text-align: center;"><?php echo $baseh; ?></td>
                    <td style="text-align: center;"><?php echo $basem; ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Eventual</td>
                    <td style="text-align: center;"><b><?php echo $su3; ?></b></td>
                    <td style="text-align: center;"><?php echo $eventualh; ?></td>
                    <td style="text-align: center;"><?php echo $eventualm; ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Honorarios</td>
                    <td style="text-align: center;"><b><?php echo $su4; ?></b></td>
                    <td style="text-align: center;"><?php echo $honorariosh; ?></td>
                    <td style="text-align: center;"><?php echo $honorariosm; ?></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Otros</td>
                    <td style="text-align: center;"><b><?php echo $su5; ?></b></td>
                    <td style="text-align: center;"><?php echo $otroh; ?></td>
                    <td style="text-align: center;"><?php echo $otrom; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td style="text-align: right;"><b>Total:</b></td>
                    <td style="text-align: center; font-size: 16px;"><b><?php echo $sumhm; ?></b></td>
                    <td style="text-align: center; font-size: 16px;"><b><?php echo $sumh; ?></b></td>
                    <td style="text-align: center; font-size: 16px;"><b><?php echo $summ; ?></b></td>
                  </tr>
                  <?php
                  # COMENTARIOS PREGUNTA 4
                  if (isset($comentariosPregunta4) && $comentariosPregunta4 != '') {
                  ?>
                    <tr>
                      <td colspan="2" class="text-center">
                        <b>Comentarios</b>
                      </td>
                      <td colspan="3">
                        <?php echo $comentariosPregunta4; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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
                    <td rowspan="2" colspan="2" align="center"><b>Institución de seguridad social</b></td>
                    <td colspan="3" align="center"><b>Personal adscrito a las instituciones de la Administración Pública, según sexo</b></td>
                  </tr>
                  <tr>
                    <td align="center"><b>Total</b></td>
                    <td align="center"><b>Hombres</b></td>
                    <td align="center"><b>Mujeres</b></td>
                  </tr>
                  <tr>
                    <?php
                    $pre5 = mysqli_query($con, "SELECT * FROM `tbl_pregunta5` WHERE idIns='" . $id_insti . "' and anio = $anio");
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
                      $arrayissste[] = $isssteh + $isstem;
                      $suissste = array_sum($arrayissste);
                      $arrayissefh[] = $issefhh + $issefhm;
                      $suissefh = array_sum($arrayissefh);
                      $arrayimss[] = $imssh + $imssm;
                      $suimss = array_sum($arrayimss);
                      $arrayotro[] = $otroh + $otrom;
                      $suotro = array_sum($arrayotro);
                      $arrayss[] = $sinseguroh + $sinsegurom;
                      $suss = array_sum($arrayss);
                      $arrayhom[] = $isssteh + $issefhh + $imssh + $otroh + $sinseguroh;
                      $suhom = array_sum($arrayhom);
                      $arraymuj[] = $isstem + $issefhm + $imssm + $otrom + $sinsegurom;
                      $sumuj = array_sum($arraymuj);
                      $arraysto[] = $suhom + $sumuj;
                      $sutot = array_sum($arraysto);
                      $comentariosPregunta5 = $rs5['comentarios'];
                    }
                    ?>
                    <td>1</td>
                    <td>Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado (ISSSTE)</td>
                    <td style="text-align: center;"><b><?php echo $suissste;  ?></b></td>
                    <td style="text-align: center;"><?php echo $isssteh; ?></td>
                    <td style="text-align: center;"><?php echo $isstem; ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Institución de Seguridad Social de la entidad federativa u homóloga</td>
                    <td style="text-align: center;"><b><?php echo $suissefh  ?></b></td>
                    <td style="text-align: center;"><?php echo $issefhh; ?></td>
                    <td style="text-align: center;"><?php echo $issefhm; ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Instituto Mexicano del Seguro Social (IMSS)</td>
                    <td style="text-align: center;"><b><?php echo $suimss;  ?></b></td>
                    <td style="text-align: center;"><?php echo $imssh; ?></td>
                    <td style="text-align: center;"><?php echo $imssm; ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Otra institución de Seguridad Social</td>
                    <td style="text-align: center;"><b><?php echo $suotro; ?></b></td>
                    <td style="text-align: center;"><?php echo $otroh; ?></td>
                    <td style="text-align: center;"><?php echo $otrom; ?></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Sin seguridad social</td>
                    <td style="text-align: center;"><b><?php echo $suss; ?></b></td>
                    <td style="text-align: center;"><?php echo $sinseguroh; ?></td>
                    <td style="text-align: center;"><?php echo $sinsegurom; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td style="text-align: right;"><b>Total:</b></td>
                    <td style="text-align: center; font-size: 16px;"><b><?php echo $sutot; ?></b></td>
                    <td style="text-align: center; font-size: 16px;"><b><?php echo $suhom; ?></b></td>
                    <td style="text-align: center; font-size: 16px;"><b><?php echo $sumuj; ?></b></td>
                  </tr>
                  <?php
                  # COMENTARIOS PREGUNTA 5
                  if (isset($comentariosPregunta5) && $comentariosPregunta5 != '') {
                  ?>
                    <tr>
                      <td colspan="2" class="text-center">
                        <b>Comentarios</b>
                      </td>
                      <td colspan="3">
                        <?php echo $comentariosPregunta5; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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
                  $pre6 = mysqli_query($con, "SELECT * FROM `tbl_pregunta6` WHERE id_inti='" . $id_insti . "' and anio = $anio");
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
                    $array1824[] = $H1 + $M1;
                    $su1824 = array_sum($array1824);
                    $array2529[] = $H2 + $M2;
                    $su2529 = array_sum($array2529);
                    $array3034[] = $H3 + $M3;
                    $su3034 = array_sum($array3034);
                    $array3539[] = $H4 + $M4;
                    $su3539 = array_sum($array3539);
                    $array4044[] = $H5 + $M5;
                    $su4044 = array_sum($array4044);
                    $array4549[] = $H6 + $M6;
                    $su4549 = array_sum($array4549);
                    $array5054[] = $H7 + $M7;
                    $su5054 = array_sum($array5054);
                    $array5559[] = $H8 + $M8;
                    $su5559 = array_sum($array5559);
                    $array60[] = $H9 + $M9;
                    $su60 = array_sum($array60);
                    $atoth[] = $H1 + $H2 + $H3 + $H4 + $H5 + $H6 + $H7 + $H8 + $H9;
                    $sumaa = array_sum($atoth);
                    $atotm[] = $M1 + $M2 + $M3 + $M4 + $M5 + $M6 + $M7 + $M8 + $M9;
                    $sumaam = array_sum($atotm);
                    $artot[] = $sumaa + $sumaam;
                    $sumtot = array_sum($artot);
                  }
                  ?>
                  <tr>
                    <td>1</td>
                    <td>De 18 a 24 años</td>
                    <td style="text-align: center;"><b><?php echo $su1824; ?></b></td>
                    <td style="text-align: center;"><?php echo $H1; ?></td>
                    <td style="text-align: center;"><?php echo $M1; ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>De 25 a 29 años</td>
                    <td style="text-align: center;"><b><?php echo $su2529; ?></b></td>
                    <td style="text-align: center;"><?php echo $H2; ?></td>
                    <td style="text-align: center;"><?php echo $M2; ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>De 30 a 34 años</td>
                    <td style="text-align: center;"><b><?php echo $su3034; ?></b></td>
                    <td style="text-align: center;"><?php echo $H3; ?></td>
                    <td style="text-align: center;"><?php echo $M3; ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>De 35 a 39 años</td>
                    <td style="text-align: center;"><b><?php echo $su3539; ?></b></td>
                    <td style="text-align: center;"><?php echo $H4; ?></td>
                    <td style="text-align: center;"><?php echo $M4; ?></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>De 40 a 44 años</td>
                    <td style="text-align: center;"><b><?php echo $su4044; ?></b></td>
                    <td style="text-align: center;"><?php echo $H5; ?></td>
                    <td style="text-align: center;"><?php echo $M5; ?></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>De 45 a 49 años</td>
                    <td style="text-align: center;"><b><?php echo $su4549; ?> </b></td>
                    <td style="text-align: center;"><?php echo $H6 ?></td>
                    <td style="text-align: center;"><?php echo $M6;; ?></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>De 50 a 54 años</td>
                    <td style="text-align: center;"><b><?php echo $su5054; ?> </b></td>
                    <td style="text-align: center;"><?php echo $H7; ?></td>
                    <td style="text-align: center;"><?php echo $M7; ?></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>De 55 a 59 años</td>
                    <td style="text-align: center;"><b><?php echo $su5559; ?> </b></td>
                    <td style="text-align: center;"><?php echo $H8; ?></td>
                    <td style="text-align: center;"><?php echo $M8; ?></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>De 60 años o más</td>
                    <td style="text-align: center;"><b><?php echo $su60; ?> </b></td>
                    <td style="text-align: center;"><?php echo $H9; ?></td>
                    <td style="text-align: center;"><?php echo $M9; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <th style="text-align: right;"><b>Total</b></th>
                    <th style="text-align: center; font-size: 16px;"><?php echo $sumtot; ?></th>
                    <td style="text-align: center; font-size: 16px;"><?php echo $sumaa; ?></td>
                    <td style="text-align: center; font-size: 16px;"><?php echo $sumaam; ?></td>
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
                    <td align="center"><b>Total</b></td>
                    <td align="center"><b>Hombres</b></td>
                    <td align="center"><b>Mujeres</b></td>
                  </tr>
                  <?php
                  $pre7 = mysqli_query($con, "SELECT * FROM `tbl_pregunta7` WHERE idIns='" . $id_insti . "' and anio = $anio");
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
                    <td></td>
                    <td style="text-align: right;"><b>Total:</b></td>
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
                  $pre8 = mysqli_query($con, "SELECT * FROM `tbl_pregunta8` WHERE id_inst='" . $id_insti . "' and anio = $anio");
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
                    <td style="text-align: center;"><?php echo $h1 + $m1; ?></td>
                    <td style="text-align: center;"><?php echo $h1; ?></td>
                    <td style="text-align: center;"><?php echo $m1; ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Preescolar o primaria</td>
                    <td style="text-align: center;"><?php echo $h2 + $m2; ?></td>
                    <td style="text-align: center;"><?php echo $h2; ?></td>
                    <td style="text-align: center;"><?php echo $m2; ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Secundaria</td>
                    <td style="text-align: center;"><?php echo $h3 + $m3; ?></td>
                    <td style="text-align: center;"><?php echo $h3; ?></td>
                    <td style="text-align: center;"><?php echo $m3; ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Preparatoria</td>
                    <td style="text-align: center;"><?php echo $h4 + $m4; ?></td>
                    <td style="text-align: center;"><?php echo $h4; ?></td>
                    <td style="text-align: center;"><?php echo $m4; ?></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Carrera técnica o comercial</td>
                    <td style="text-align: center;"><?php echo $h5 + $m5; ?></td>
                    <td style="text-align: center;"><?php echo $h5; ?></td>
                    <td style="text-align: center;"><?php echo $m5; ?></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Licenciatura</td>
                    <td style="text-align: center;"><?php echo $h6 + $m6; ?></td>
                    <td style="text-align: center;"><?php echo $h6; ?></td>
                    <td style="text-align: center;"><?php echo $m6; ?></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Maestría</td>
                    <td style="text-align: center;"><?php echo $h7 + $m7; ?></td>
                    <td style="text-align: center;"><?php echo $h7; ?></td>
                    <td style="text-align: center;"><?php echo $m7; ?></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Doctorado</td>
                    <td style="text-align: center;"><?php echo $h8 + $m8; ?></td>
                    <td style="text-align: center;"><?php echo $h8; ?></td>
                    <td style="text-align: center;"><?php echo $m8; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td style="text-align: right;"><b>Total</b></td>
                    <td style="text-align: center; font-size: 16px;"><b><?php echo $sumhh + $summ; ?></b></td>
                    <td style="text-align: center; font-size: 16px;"><b><?php echo $sumhh; ?></b></td>
                    <td style="text-align: center; font-size: 16px;"><b><?php echo $summ; ?></b></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--fin pregunta 8-->

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
                    <td rowspan="2">Clave</td>
                    <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                  </tr>
                  <tr>
                    <td align="center" width="9%"><b>Si</b></td>
                    <td align="center" width="9%"><b>No</b></td>
                    <td align="center" width="9%"><b>No se sabe</b></td>
                  </tr>
                  <?php
                  $pre91 = mysqli_query($con, "SELECT * FROM `tbl_pregunta9-1` WHERE id_institu='" . $id_insti . "' and anio = $anio");
                  if ($rs91 = mysqli_fetch_array($pre91)) {
                    $opcioonn1 = $rs91['option1'];
                  }
                  ?>
                  <tr>
                    <td><?php if (isset($rs91['id_institu'])) {
                          echo $rs91['id_institu'];
                        } ?></td>
                    <td><?php if (isset($rs91['institucion'])) {
                          echo $rs91['institucion'];
                        } ?></td>
                    <td align="center"><?php if ($opcioonn1 == "Si") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        }  ?></td>
                    <td align="center"><?php if ($opcioonn1 == "No") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>
                    <td align="center"><?php if ($opcioonn1 == "No se sabe") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>

                  </tr>
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
                  $pre92 = mysqli_query($con, "SELECT * FROM `tbl_pregunta9-2` WHERE id_institu='" . $id_insti . "' and anio = $anio");
                  if ($rs92 = mysqli_fetch_array($pre92)) {
                    $eduBasica = $rs92['eduBasica'];
                    $eduMedia = $rs92['eduMedia'];
                    $eduSuperior = $rs92['eduSuperior'];
                    $total2 = $eduBasica + $eduMedia + $eduSuperior;
                  }
                  ?>
                  <tr>
                    <td>Personal anotado en <b>instituciones de educación básica</b>, pagado con fondos federales</td>
                    <td style="text-align: center; font-size: 18px;"><b><?php if (isset($eduBasica)) {
                                                                          echo $eduBasica;
                                                                        } else {
                                                                          echo "0";
                                                                        } ?></b></td>
                  </tr>
                  <tr>
                    <td>Personal anotado en <b>instituciones de educación media superior</b> pagado con fondos federales</td>
                    <td style="text-align: center; font-size: 18px;"><b><?php if (isset($eduMedia)) {
                                                                          echo $eduMedia;
                                                                        } else {
                                                                          echo "0";
                                                                        } ?></b></td>
                  </tr>
                  <tr>
                    <td>Personal anotado en <b>instituciones de educación superior</b> pagado con fondos federales</td>
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
                    <td rowspan="2">Clave</td>
                    <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                  </tr>
                  <tr>
                    <td align="center" width="9%"><b>Si</b></td>
                    <td align="center" width="9%"><b>No</b></td>
                    <td align="center" width="9%"><b>No se sabe</b></td>
                  </tr>
                  <?php
                  $pre93 = mysqli_query($con, "SELECT * FROM `tbl_preguntas9-3` WHERE id_institu='" . $id_insti . "' and anio = $anio");
                  if ($rs93 = mysqli_fetch_array($pre93)) {
                    $opcion3 = $rs93['option1'];
                  }
                  ?>
                  <tr>
                    <td><?php if (isset($rs93['id_institu'])) {
                          echo $rs93['id_institu'];
                        } ?></td>
                    <td><?php if (isset($rs93['institucion'])) {
                          echo $rs93['institucion'];
                        } ?></td>
                    <td align="center"><?php if ($opcion3 == "Si") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        }  ?></td>
                    <td align="center"><?php if ($opcion3 == "No") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>
                    <td align="center"><?php if ($opcion3 == "No se sabe") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>
                  </tr>
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
                  $pre94 = mysqli_query($con, "SELECT * FROM `tbl_pregunta9-4` WHERE id_institu='" . $id_insti . "' and anio = $anio");
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
              <div class="row" style="margin-left: 40%;">
              </div>
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
            <label>Indique si al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio; ?> la Administración Pública de su entidad federativa contaba con alguna institución que coordinara los esfuerzos en materia de profesionalización del personal. En caso afirmativo, anote el nombre de la misma.
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
                    <td align="center" colspan="2"><b>Nombre de las instituciones</b></td>
                    <td width="20%"><b>¿Contaba con alguna institución coordinadora de los esfuerzos en materia de profesionalización?</b></td>
                    <td align="center"><b>Nombre de la institución coordinadora en la materia de profesionalización</b></td>
                  </tr>
                  <?php
                  $pre10 = mysqli_query($con, "SELECT * FROM `tbl_pregunta10` WHERE id_institu='" . $id_insti . "' and anio = $anio");
                  if ($rs10 = mysqli_fetch_array($pre10)) {
                    $idclave = $rs10['id_institu'];
                    $sele = $rs10['sele'];
                    $inst = $rs10['institucion'];
                    $nombreInti = $rs10['nombreInti'];
                    $comentariosPregunta10 = $rs10['comentarios'];
                  }
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
                    <td style="text-align: center; font-size: 14px;">
                      <?php if ($sele == "Si") {
                        echo $nombreInti;
                      } else {
                        echo "";
                      } ?>
                    </td>
                  </tr>
                  <?php
                  # COMENTARIOS PREGUNTA 10
                  if (isset($comentariosPregunta10) && $comentariosPregunta10 != '') {
                  ?>
                    <tr>
                      <td colspan="2" class="text-center">
                        <b>Comentarios</b>
                      </td>
                      <td colspan="2">
                        <?php echo $comentariosPregunta10; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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
            <label>Indique, por cada una de las instituciones de la Administración Pública de su entidad federativa, si al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio; ?> implementaba esquemas y/o mecanismos de profesionalización de su personal. En caso afirmativo, señale los elementos de profesionalización considerados.
            </label>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered" id="refresh">
                <thead></thead>
                <tbody>
                  <tr>
                    <!--<td rowspan="3">Clave</td>-->
                    <td rowspan="3" colspan="2" align="center">Nombre de las instituciones</td>
                    <td rowspan="3" style="font-size:9px" align="center">¿Implementaba esquemas y/o mecanismos de profesionalización de su personal?</td>
                    <td rowspan="2" colspan="13" align="center">Elementos de profesionalización</td>
                  </tr>
                  <tr></tr>
                  <tr>
                    <td style="font-size:9px"><text>Servicio cívil de carrrera</text></td>
                    <td style="font-size:9px"><text>Reclutamiento, selección e inducción</text></td>
                    <td style="font-size:9px"><text>Diseño y selección de pruebas de ingresos</text></td>
                    <td style="font-size:9px"><text>Diseño curricular</text></td>
                    <td style="font-size:9px"><text>Actualización de perfiles de puesto</text></td>
                    <td style="font-size:9px"><text>Diseño y validación de competencias</text></td>
                    <td style="font-size:9px"><text>Concursos públicos y abiertos para la contratación</text></td>
                    <td style="font-size:9px"><text>Mecanismos de evaluación del desempeño</text></td>
                    <td style="font-size:9px"><text>Programas de capacitación</text></td>
                    <td style="font-size:9px"><text>Evaluación de impacto de la capacitación</text></td>
                    <td style="font-size:9px"><text>Programas de estímulos y recompensas</text></td>
                    <td style="font-size:9px"><text>Separación del servicio</text></td>
                    <td style="font-size:9px"><text>Otros</text></td>
                  </tr>
                  <?php
                  $pre11 = mysqli_query($con, "SELECT * FROM `tbl_pregunta11` WHERE id_institu='" . $id_insti . "' and anio = $anio");
                  if ($rs11 = mysqli_fetch_array($pre11)) {
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
                    $comentariosPregunta11 = $rs11['comentarios'];
                  }
                  ?>
                  <tr>
                    <td><?php echo $idin; ?></td>
                    <td><?php echo $iss; ?></td>
                    <td style="text-align: center;">
                      <?php
                      if ($opti == "Si") {
                        echo "1";
                        # code...
                      } else if ($opti == "No") {
                        echo "2";
                      } else {
                        echo "9";
                      } ?>
                    </td>
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
                  <?php
                  # COMENTARIOS PREGUNTA 11
                  if (isset($comentariosPregunta11) && $comentariosPregunta11 != '') {
                  ?>
                    <tr>
                      <td colspan="3" class="text-center">
                        <b>Comentarios</b>
                      </td>
                      <td colspan="13">
                        <?php echo $comentariosPregunta11; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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
            <label>Anote la cantidad de bienes inmuebles con los que contaban las instituciones de la Administración Pública de su entidad federativa al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio; ?>, según clasificación administrativa de la institución de referencia y tipo de posesión.
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
                  $clasify = mysqli_query($con, "SELECT * FROM tbl_instituciones WHERE id='" . $id_insti . "' and anio = $anio");
                  if ($result = mysqli_fetch_array($clasify)) {
                    $clasiresul = $result['clasificacionAd'];
                    $pre15 = mysqli_query($con, "SELECT * FROM `tbl_pregunta15` WHERE idInst='" . $id_insti . "'and anio = $anio");
                    $rs15 = mysqli_fetch_array($pre15);
                    $nombreinsti = $rs15['nombreIns'];
                    $admcpropio = $rs15['admcpropio'];
                    $admcrenta = $rs15['admcrenta'];
                    $admncotro = $rs15['admncotro'];
                    if ($rs15['comentario'] != '' && $rs15['comentarios'] != '') {
                      $comentario = $rs15['comentario'] . ', ' . $rs15['comentarios'];
                    } elseif ($rs15['comentario'] != '' && $rs15['comentarios'] == '') {
                      $comentario = $rs15['comentario'];
                    } elseif ($rs15['comentario'] == '' && $rs15['comentarios'] != '') {
                      $comentario = $rs15['comentarios'];
                    } else {
                      $comentario = '-';
                    }
                    if ($clasiresul == "1") { ?>
                      <tr>
                        <td>Instituciones de la Administración Pública Centralizada</td>
                        <td><?php echo $ssum1 = $admcpropio + $admcrenta + $admncotro; ?></td>
                        <td><?php echo $admcpropio; ?></td>
                        <td><?php echo $admcrenta; ?></td>
                        <td><?php echo $admncotro; ?></td>
                      </tr>
                      <tr>
                        <td align="right">TOTAL</td>
                        <td style="font-size: 16px;"><b><?php echo $ssum1 = $admcpropio + $admcrenta + $admncotro; ?></b></td>
                        <td><?php echo $admcpropio; ?></td>
                        <td><?php echo $admcrenta; ?></td>
                        <td><?php echo $admncotro; ?></td>
                      </tr>
                    <?php
                    } else { ?>
                      <tr>
                        <td>Instituciones de la Administración Pública Paraestatal</td>
                        <td><?php echo $ssum1 = $admcpropio + $admcrenta + $admncotro; ?></td>
                        <td><?php echo $admcpropio; ?></td>
                        <td><?php echo $admcrenta; ?></td>
                        <td><?php echo $admncotro; ?></td>
                      </tr>
                      <tr>
                        <td align="right">TOTAL</td>
                        <td style="font-size: 16px;"><b><?php echo $ssum1 = $admcpropio + $admcrenta + $admncotro; ?></b></td>
                        <td><?php echo $admcpropio; ?></td>
                        <td><?php echo $admcrenta; ?></td>
                        <td><?php echo $admncotro; ?></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                  <tr>
                    <th>Comentarios</th>
                    <td colspan="4"><?php if (isset($comentario)) {
                                      echo $comentario;
                                    } else {
                                      echo "";
                                    }  ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--fin pregunta 15 -->

      <!--pregunta 16.1 -->
      <div class="col-lg-12" id="18">
        <div class="card">
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
                    <td rowspan="2">Clave</td>
                    <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                  </tr>
                  <tr>
                    <td align="center" width="9%"><b>Si</b></td>
                    <td align="center" width="9%"><b>No</b></td>
                    <td align="center" width="9%"><b>No se sabe</b></td>
                  </tr>
                  <?php
                  $pre16_1 = mysqli_query($con, "SELECT * FROM `tbl_pregunta16-3` WHERE idIsnt='" . $id_insti . "' and anio = $anio");

                  if ($rs16_1 = mysqli_fetch_array($pre16_1)) {
                    $opc = $rs16_1['opcion1'];
                  }
                  ?>
                  <tr>
                    <td><?php if (isset($rs16_1['idIsnt'])) {
                          echo $rs16_1['idIsnt'];
                        } ?></td>
                    <td><?php if (isset($rs16_1['nombreInst'])) {
                          echo $rs16_1['nombreInst'];
                        } ?></td>
                    <td align="center"><?php if ($opc == "Si") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        }  ?></td>
                    <td align="center"><?php if ($opc == "No") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>
                    <td align="center"><?php if ($opc == "No se sabe") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>
                  </tr>
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
                  $pre16_2 = mysqli_query($con, "SELECT * FROM `tbl_pregunta16-2` WHERE idInst='" . $id_insti . "' and anio = $anio");
                  if ($rs16_2 = mysqli_fetch_array($pre16_2)) {
                    $eduBasicaas = $rs16_2['eduBasica'];
                    $edMedSupp = $rs16_2['edMedSup'];
                    $edSupp = $rs16_2['edSup'];
                    $edotrop = $rs16_2['otroescuela'];
                    $totalp = $rs16_2['Total'];
                    $eduBasicaotrop = $rs16_2['otroeducbasic'];
                    $edMedSupotrop = $rs16_2['otroedmedsup'];
                    $edSupotrop = $rs16_2['otroedusup'];
                    $edotrotrop = $rs16_2['otrofuncpri'];
                    $totalotrop = $rs16_2['otroTotal'];
                    $totalgralp = $rs16_2['Totalgraldir'];
                    $comentariosPregunta16_2 = $rs16_2['Comentario'];
                  }
                  ?>
                  <tr>
                    <td align="right" width="80%"><b>Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones educativas</b></td>
                    <td align="center" style="font-size:15px" bgcolor="DFE9F1"><b><label><?php if (isset($totalgralp)) {
                                                                                            echo $totalgralp;
                                                                                          } else {
                                                                                            echo "No aplica para esta institución";
                                                                                          }  ?></label></b></td>
                  </tr>
                  <tr>
                    <td align="right"><b>1. Bienes inmuebles usados como escuelas</b></td>
                    <td align="center" style="font-size:15px"><b><label><?php if (isset($totalp)) {
                                                                          echo $totalp;
                                                                        } else {
                                                                          echo "No aplica para esta institución";
                                                                        }  ?></label></b></td>
                  </tr>
                  <tr>
                    <td align="right">1.1 Registrados por instituciones con función principal "Educación básica"</td>
                    <td><label><?php if (isset($eduBasicaas)) {
                                  echo $eduBasicaas;
                                } else {
                                  echo "No aplica para esta institución";
                                }  ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">1.2 Registrados por instituciones con función principal "Educación media superior"</b></td>
                    <td><label><?php if (isset($edMedSupp)) {
                                  echo $edMedSupp;
                                } else {
                                  echo "No aplica para esta institución";
                                }  ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">1.3 Registrados por instituciones con función principal "Educación superior"</td>
                    <td><label><?php if (isset($edSupp)) {
                                  echo $edSupp;
                                } else {
                                  echo "No aplica para esta institución";
                                }  ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">1.4 Registrados por instituciones con otro tipo de función principal</td>
                    <td><label><?php if (isset($edotrop)) {
                                  echo $edotrop;
                                } else {
                                  echo "No aplica para esta institución";
                                }  ?></label></td>
                  </tr>

                  <tr>
                    <td align="right"><b>2. Bienes inmuebles usados para otro tipo de apoyo a funciones educativas</b></td>
                    <td align="center" style="font-size:15px"><b><label><?php if (isset($totalotrop)) {
                                                                          echo $totalotrop;
                                                                        } else {
                                                                          echo "No aplica para esta institución";
                                                                        }  ?></label></b></td>
                  </tr>
                  <tr>
                    <td align="right">2.1 Registrados por instituciones con función principal "Educación básica"</td>
                    <td><label><?php if (isset($eduBasicaotrop)) {
                                  echo $eduBasicaotrop;
                                } else {
                                  echo "No aplica para esta institución";
                                }  ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">2.2 Registrados por instituciones con función principal "Educación media superior"</b></td>
                    <td><label><?php if (isset($edMedSupotrop)) {
                                  echo $edMedSupotrop;
                                } else {
                                  echo "No aplica para esta institución";
                                }  ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">2.3 Registrados por instituciones con función principal "Educación superior"</td>
                    <td><label><?php if (isset($edSupotrop)) {
                                  echo $edSupotrop;
                                } else {
                                  echo "No aplica para esta institución";
                                }  ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">2.4 Registrados por instituciones con otro tipo de función principal</td>
                    <td><label><?php if (isset($edotrotrop)) {
                                  echo $edotrotrop;
                                } else {
                                  echo "No aplica para esta institución";
                                }  ?></label></td>
                  </tr>
                  <?php
                  # COMENTARIOS PREGUNTA 16-2
                  if (isset($comentariosPregunta16_2) && $comentariosPregunta16_2 != '') {
                  ?>
                    <tr>
                      <td colspan="2">
                        <b class="px-5">Comentarios</b>
                        <?php echo $comentariosPregunta16_2; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--fin pregunta 16.2 -->

      <!--pregunta 16.3 -->
      <!--<div class="col-lg-12" id="18">
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
                          /*$pre16_3=mysqli_query($con, "SELECT * FROM `tbl_pregunta16-3` WHERE idIsnt='".$id_insti."' ");
                        if($rs16_3=mysqli_fetch_array($pre16_3)) 
                        {
                        $opci=$rs16_3['opcion1'];
                        }
                        ?>
                        <tr>
                          <th>Resultado</th>
                          <td><center><label><?php if($opci=="Si"){echo "Si";}elseif($opci=="No"){echo "No Aplica";}elseif($opci=="No se sabe"){echo "No se sabe"; }*/ ?></label></center>                       </td>
                        </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>-->
      <!--fin pregunta 16.3 -->

      <!--pregunta 16.4 -->
      <!--<div class="col-lg-12" id="19">
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
                              /*$pre16_4=mysqli_query($con, "SELECT * FROM `tbl_pregunta16-4` WHERE idInst='".$id_insti."' ");

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
                </div>-->
      <!--fin pregunta 16.4 -->

      <!--pregunta 16.5 -->
      <div class="col-lg-12" id="20">
        <div class="card">
          <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>
              <h3 style="text-align: justify;">I.4.1 Bienes inmuebles</h3>
              <br>
              <label style="text-align: justify;">De acuerdo con el total de bienes inmuebles anotados para la(s) institución(es) de salud en la respuesta de la pregunta 16, indique si se contabilizaron los bienes inmuebles cuyo uso principal fue el de clínicas, centros de salud y hospitales. </label>-->
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
                    <td rowspan="2">Clave</td>
                    <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                  </tr>
                  <tr>
                    <td align="center" width="9%"><b>Si</b></td>
                    <td align="center" width="9%"><b>No</b></td>
                    <td align="center" width="9%"><b>No se sabe</b></td>
                  </tr>
                  <?php
                  $pre16_5 = mysqli_query($con, "SELECT * FROM `tbl_pregunta16-5` WHERE idIsnt='" . $id_insti . "' and anio = $anio");
                  if ($rs16_5 = mysqli_fetch_array($pre16_5)) {
                    $opci5 = $rs16_5['opcion1'];
                  }
                  ?>
                  <tr>
                    <td><?php if (isset($rs16_5['idIsnt'])) {
                          echo $rs16_5['idIsnt'];
                        } ?></td>
                    <td><?php if (isset($rs16_5['nombreInst'])) {
                          echo $rs16_5['nombreInst'];
                        } ?></td>
                    <td align="center"><?php if ($opci5 == "Si") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        }  ?></td>
                    <td align="center"><?php if ($opci5 == "No") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>
                    <td align="center"><?php if ($opci5 == "No se sabe") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>

                  </tr>
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
                  $pre16_6 = mysqli_query($con, "SELECT * FROM `tbl_pregunta16-6` WHERE idInst='" . $id_insti . "' and anio = $anio");
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
                    $comentariosPregunta16_6 = $rs16_6['Comentario'];
                  }
                  ?>
                  <tr>
                    <td align="center"><b>Total de bienes inmuebles que tuvieron como uso principal el apoyo a funciones de salud</b></td>
                    <td width="10%" align="center" style="font-size:17px"><b><label><?php if (isset($totalgral)) {
                                                                                      echo $totalgral;
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
                  <?php
                  # COMENTARIOS PREGUNTA 16-6
                  if (isset($comentariosPregunta16_6) && $comentariosPregunta16_6 != '') {
                  ?>
                    <tr>
                      <td colspan="2">
                        <b class="px-5">Comentarios</b>
                        <?php echo $comentariosPregunta16_6; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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
          <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>
                  <h3 style="text-align: justify;">I.4.1 Bienes inmuebles</h3>
              <br>-->
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
                    <td rowspan="2">Clave</td>
                    <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                  </tr>
                  <tr>
                    <td align="center" width="9%"><b>Si</b></td>
                    <td align="center" width="9%"><b>No</b></td>
                    <td align="center" width="9%"><b>No se sabe</b></td>
                  </tr>
                  <?php
                  $pre16_7 = mysqli_query($con, "SELECT * FROM `tbl_pregunta16-7` WHERE idInst='" . $id_insti . "' and anio = $anio");
                  if ($respfisicadepor = mysqli_fetch_array($pre16_7)) {
                    $opci7 = $respfisicadepor['opcion1'];
                  }
                  ?>
                  <tr>
                    <td><?php if (isset($respfisicadepor['idInst'])) {
                          echo $respfisicadepor['idInst'];
                        } ?></td>
                    <td><?php if (isset($respfisicadepor['nombreInst'])) {
                          echo $respfisicadepor['nombreInst'];
                        } ?></td>
                    <td align="center"><?php if ($opci7 == "Si") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        }  ?></td>
                    <td align="center"><?php if ($opci7 == "No") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>
                    <td align="center"><?php if ($opci7 == "No se sabe") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>

                  </tr>
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
                  $pre16_8 = mysqli_query($con, "SELECT * FROM `tbl_pregunta16-8` WHERE idInst='" . $id_insti . "' and anio = $anio");
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
                    $comentariosPregunta16_8 = $rs16_8['Comentario'];
                  }
                  ?>
                  <tr>
                    <td align="right"><b>Total de bienes inmuebles que tuvieron como uso principal la realización de activación física, cultura física y deporte</b></td>
                    <td align="center" width="10%"><b><label><?php if (isset($totalgral)) {
                                                                echo $totalgral;
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
                    <td><label><?php if (isset($bienesInActFi)) {
                                  echo $bienesInActFi;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">1.2 Bienes inmuebles destinados a la realización de recreación física</td>
                    <td><label><?php if (isset($bienesInActRec)) {
                                  echo $bienesInActRec;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">1.3 Bienes inmuebles destinados a la realización de deporte y/o deporte social</td>
                    <td><label><?php if (isset($bienesInDep)) {
                                  echo $bienesInDep;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">1.4 Bienes inmuebles destinados a la realización de deporte de rendimiento y/o deporte de alto rendimiento</td>
                    <td><label><?php if (isset($bienesInDepRend)) {
                                  echo $bienesInDepRend;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">1.5 Bienes inmuebles destinados a la realización de eventos deportivos, eventos deportivos masivos y/o eventos deportivos con fines de espectáculo</td>
                    <td><label><?php if (isset($bienesInEventDep)) {
                                  echo $bienesInEventDep;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">1.6 Bienes inmuebles destinados indistintamente a las cinco funciones establecidas con anterioridad</td>
                    <td><label><?php if (isset($bienesIotros)) {
                                  echo $bienesIotros;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">1.7 Bienes inmuebles destinados a otro tipo de actividades de activación física, cultura física y deporte</td>
                    <td><label><?php if (isset($otros)) {
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
                    <td><label><?php if (isset($bienesInActFiotros)) {
                                  echo $bienesInActFiotros;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">2.2 Bienes inmuebles destinados a la realización de recreación física</td>
                    <td><label><?php if (isset($bienesInActRecotros)) {
                                  echo $bienesInActRecotros;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">2.3 Bienes inmuebles destinados a la realización de deporte y/o deporte social</td>
                    <td><label><?php if (isset($bienesInDepotros)) {
                                  echo $bienesInDepotros;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">2.4 Bienes inmuebles destinados a la realización de deporte de rendimiento y/o deporte de alto rendimiento</td>
                    <td><label><?php if (isset($bienesInDepRendotros)) {
                                  echo $bienesInDepRendotros;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">2.5 Bienes inmuebles destinados a la realización de eventos deportivos, eventos deportivos masivos y/o eventos deportivos con fines de espectáculo</td>
                    <td><label><?php if (isset($bienesInEventDepotros)) {
                                  echo $bienesInEventDepotros;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">2.6 Bienes inmuebles destinados indistintamente a las cinco funciones establecidas con anterioridad</td>
                    <td><label><?php if (isset($bienesIotrosotros)) {
                                  echo $bienesIotrosotros;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <tr>
                    <td align="right">2.7 Bienes inmuebles destinados a otro tipo de actividades de activación física, cultura física y deporte</td>
                    <td><label><?php if (isset($otrosotros)) {
                                  echo $otrosotros;
                                } else {
                                  echo "No aplica";
                                } ?></label></td>
                  </tr>
                  <?php
                  # COMENTARIOS PREGUNTA 16-8
                  if (isset($comentariosPregunta16_8) && $comentariosPregunta16_8 != '') {
                  ?>
                    <tr>
                      <td colspan="2">
                        <b class="px-5">Comentarios</b>
                        <?php echo $comentariosPregunta16_8; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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
            <label>Anote la cantidad de vehículos en funcionamiento con los que contaban las instituciones de la Administración Pública de su entidad federativa al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio; ?>, según tipo y clasificación administrativa de la institución de referencia.
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
                  $sa = mysqli_query($con, "SELECT * FROM tbl_instituciones WHERE id='" . $id_insti . "' and anio = $anio");
                  if ($rs = mysqli_fetch_array($sa)) {
                    $clasi = $rs['clasificacionAd'];
                    $pre17 = mysqli_query($con, "SELECT * FROM `tbl_pregunta17` WHERE idIns='" . $id_insti . "' and anio = $anio");
                    $rs17 = mysqli_fetch_array($pre17);
                    $admcauto = $rs17['admcauto'];
                    $admccamioneta = $rs17['admccamioneta'];
                    $admcmoto = $rs17['admcmoto'];
                    $admcotro = $rs17['admcotro'];
                    $total = $rs17['total'];
                    if ($rs17['comentario'] != '' && $rs17['comentarios'] != '') {
                      $comentario = $rs17['comentario'] . ', ' . $rs17['comentarios'];
                    } elseif ($rs17['comentario'] != '' && $rs17['comentarios'] == '') {
                      $comentario = $rs17['comentario'];
                    } elseif ($rs17['comentario'] == '' && $rs17['comentarios'] != '') {
                      $comentario = $rs17['comentarios'];
                    } else {
                      $comentario = '-';
                    }
                    if ($clasi == "1") { ?>
                      <tr>
                        <td>Instituciones de la Administración Pública Centralizada </td>
                        <td><label><?php echo $total; ?></label></td>
                        <td><label><?php echo $admcauto; ?></label></td>
                        <td><label><?php echo $admccamioneta; ?></label></td>
                        <td><label><?php echo $admcmoto; ?></label></td>
                        <td><label><?php echo $admcotro; ?></label></td>
                      </tr>
                      <tr>
                        <th>TOTAL</th>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $admcauto; ?></td>
                        <td><?php echo $admccamioneta; ?></td>
                        <td><?php echo $admcmoto; ?></td>
                        <td><?php echo $admcotro; ?></td>
                      </tr>
                    <?php
                    } else { ?>
                      <tr>
                        <td>Instituciones de la Administración Pública Paraestatal</td>
                        <td><label><?php echo $total; ?></label></td>
                        <td><label><?php echo $admcauto; ?></label></td>
                        <td><label><?php echo $admccamioneta; ?></label></td>
                        <td><label><?php echo $admcmoto; ?></label></td>
                        <td><label><?php echo $admcotro; ?></label></td>
                      </tr>
                      <tr>
                        <th>TOTAL</th>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $admcauto; ?></td>
                        <td><?php echo $admccamioneta; ?></td>
                        <td><?php echo $admcmoto; ?></td>
                        <td><?php echo $admcotro; ?></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                  <tr>
                    <th>Comentarios</th>
                    <td colspan="5"><?php if (isset($comentario)) {
                                      echo $comentario;
                                    } else {
                                      echo "";
                                    }  ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--fin pregunta 17 -->

      <!--pregunta 19 -->
      <div class="col-lg-12" id="26">
        <div class="card">
          <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>-->
          <h3 style="text-align: justify;">I.4.3 Líneas y aparatos telefónicos</h3>
          <h3 class="h4" style="padding-left:16px">Pregunta 32</h3>
          <div class="card-header d-flex align-items-center">
            <label>Anote la cantidad de líneas telefónicas y aparatos telefónicos en funcionamiento con los que contaban las instituciones de la Administración Pública de su entidad federativa al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio; ?>, según tipo y clasificación administrativa de la institución de referencia. </label>
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
                  $saa = mysqli_query($con, "SELECT * FROM tbl_instituciones WHERE id='" . $id_insti . "' and anio = $anio");
                  if ($rs19 = mysqli_fetch_array($saa)) {
                    $clasii = $rs19['clasificacionAd'];
                    $pre19 = mysqli_query($con, "SELECT * FROM `tbl_pregunta19` WHERE idIns='" . $id_insti . "' and anio = $anio");
                    $rs19 = mysqli_fetch_array($pre19);
                    $admcfijos1 = $rs19['admcfijos1'];
                    $admcmoviles1 = $rs19['admcmoviles1'];
                    $admcfijos2 = $rs19['admcfijos2'];
                    $admcmoviles2 = $rs19['admcmoviles2'];
                    $total = $rs19['total'];
                    $comentarios2 = $rs19['comentarios'];
                    $sum2[] = $admcfijos1 + $admcmoviles1;
                    $sum3 = array_sum($sum2);
                    $ar[] = $admcfijos2 + $admcmoviles2;
                    $sum4 = array_sum($ar);
                    if ($clasii == "1") { ?>
                      <tr>
                        <td>Instituciones de la Administración Pública Centralizada </td>
                        <td><label><?php echo $sum3; ?></label></td>
                        <td><label><?php echo $admcfijos1; ?></label></td>
                        <td><label><?php echo $admcmoviles1; ?></label></td>

                        <td><label><?php echo $sum4; ?></label></td>
                        <td><label><?php echo $admcfijos2; ?></label></td>
                        <td><label><?php echo $admcmoviles2; ?></label></td>
                      </tr>
                    <?php
                    } else { ?>
                      <tr>
                        <td>Instituciones de la Administración Pública Paraestatal</td>
                        <td><label><?php echo $sum3; ?></label></td>
                        <td><label><?php echo $admcfijos1; ?></label></td>
                        <td><label><?php echo $admcmoviles1; ?></label></td>
                        <td><label><?php echo $sum4; ?></label></td>
                        <td><label><?php echo $admcfijos2; ?></label></td>
                        <td><label><?php echo $admcmoviles2; ?></label></td>
                      </tr>
                      <tr>
                        <th>Total</th>
                        <td><?php echo $sum3; ?></td>
                        <td><?php echo $admcfijos1; ?></td>
                        <td><?php echo $admcmoviles1; ?></td>
                        <td><?php echo $sum4; ?></td>
                        <td><?php echo $admcfijos2; ?></td>
                        <td><?php echo $admcmoviles2; ?></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                  <tr>
                    <th>Comentarios</th>
                    <td colspan="6"><?php if (isset($comentarios2)) {
                                      echo $comentarios2;
                                    } else {
                                      echo "";
                                    } ?></td>
                  </tr>
                </tbody>
              </table>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--fin pregunta 19 -->

      <!--pregunta 21 -->
      <div class="col-lg-12" id="28">
        <div class="card">
          <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>-->
          <h3 style="padding-left:15px">I.4.4 Equipo informático</h3>
          <h3 class="h4" style="padding-left:16px">Pregunta 34</h3>
          <div class="card-header d-flex align-items-center">
            <label>Anote la cantidad de computadoras e impresoras, según tipo, así como de multifuncionales, servidores y tabletas electrónicas con los que contaban las instituciones de la Administración Pública de su entidad federativa al cierre del año <?php /* echo date("Y", strtotime(date("Y") . "- 1 year")); */ echo $anio; ?>, según clasificación administrativa de la institución de referencia.
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
                  $sa21 = mysqli_query($con, "SELECT * FROM tbl_instituciones WHERE id='" . $id_insti . "' and anio = $anio");
                  if ($rs21 = mysqli_fetch_array($sa21)) {
                    $clasi21 = $rs21['clasificacionAd'];
                    $que21 = mysqli_query($con, "SELECT * FROM `tbl_pregunta21` WHERE idIns='" . $id_insti . "' and anio = $anio");
                    $rss21 = mysqli_fetch_array($que21);
                    $admccompues = $rss21['admccompues'];
                    $admccomppo = $rss21['admccomppo'];
                    $s = $admccompues + $admccomppo;
                    $admcimpper = $rss21['admcimpper'];
                    $admcimpcom = $rss21['admcimpcom'];
                    $s2 = $admcimpper + $admcimpcom;
                    $totalcmultf = $rss21['totalcmultf'];
                    $totalcserv = $rss21['totalcserv'];
                    $totalctablet = $rss21['totalctablet'];
                    $comentario21 = $rss21['comentario'];
                    if ($clasi21 == "1") { ?>
                      <tr>
                        <td>Instituciones de la Administración Pública Centralizada </td>
                        <td><label><?php echo $s; ?></label></td>
                        <td><label><?php echo $admccompues; ?></label></td>
                        <td><label><?php echo $admccomppo; ?></label></td>
                        <td><label><?php echo $s2; ?></label></td>
                        <td><label><?php echo $admcimpper; ?></label></td>
                        <td><label><?php echo $admcimpcom; ?></label></td>
                        <td><label><?php echo $totalcmultf; ?></label></td>
                        <td><label><?php echo $totalcserv; ?></label></td>
                        <td><label><?php echo $totalctablet; ?></label></td>
                      </tr>
                      <tr>
                        <td>Total</td>
                        <td><label><?php echo $s; ?></label></td>
                        <td><label><?php echo $admccompues; ?></label></td>
                        <td><label><?php echo $admccomppo; ?></label></td>
                        <td><label><?php echo $s2; ?></label></td>
                        <td><label><?php echo $admcimpper; ?></label></td>
                        <td><label><?php echo $admcimpcom; ?></label></td>
                        <td><label><?php echo $totalcmultf; ?></label></td>
                        <td><label><?php echo $totalcserv; ?></label></td>
                        <td><label><?php echo $totalctablet; ?></label></td>
                      </tr>
                    <?php
                    } else { ?>
                      <tr>
                        <td>Instituciones de la Administración Pública Paraestatal </td>
                        <td><label><?php echo $s; ?></label></td>
                        <td><label><?php echo $admccompues; ?></label></td>
                        <td><label><?php echo $admccomppo; ?></label></td>
                        <td><label><?php echo $s2; ?></label></td>
                        <td><label><?php echo $admcimpper; ?></label></td>
                        <td><label><?php echo $admcimpcom; ?></label></td>
                        <td><label><?php echo $totalcmultf; ?></label></td>
                        <td><label><?php echo $totalcserv; ?></label></td>
                        <td><label><?php echo $totalctablet; ?></label></td>
                      </tr>
                      <tr>
                        <td>Total</td>
                        <td><label><?php echo $s; ?></label></td>
                        <td><label><?php echo $admccompues; ?></label></td>
                        <td><label><?php echo $admccomppo; ?></label></td>
                        <td><label><?php echo $s2; ?></label></td>
                        <td><label><?php echo $admcimpper; ?></label></td>
                        <td><label><?php echo $admcimpcom; ?></label></td>
                        <td><label><?php echo $totalcmultf; ?></label></td>
                        <td><label><?php echo $totalcserv; ?></label></td>
                        <td><label><?php echo $totalctablet; ?></label></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                  <tr>
                    <th>Comentarios</th>
                    <td colspan="9"><?php if (isset($comentario21)) {
                                      echo $comentario21;
                                    } else {
                                      echo "";
                                    } ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--fin pregunta 21 -->

      <!--pregunta 22.1 -->
      <div class="col-lg-12" id="30">
        <div class="card">
          <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>
                  <h3 style="text-align: justify;">I.4.4 Equipo Informático</h3>
              <br>-->
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
                    <td rowspan="2">Clave</td>
                    <td rowspan="2" align="center"><b>Nombre de las instituciones</b></td>
                  </tr>
                  <tr>
                    <td align="center" width="9%"><b>Si</b></td>
                    <td align="center" width="9%"><b>No</b></td>
                    <td align="center" width="9%"><b>No se sabe</b></td>
                  </tr>
                  <?php
                  $pre22_1 = mysqli_query($con, "SELECT * FROM `tbl_pregunta22-1` WHERE idInst='" . $id_insti . "' and anio = $anio");
                  if ($rs22_1 = mysqli_fetch_array($pre22_1)) {
                    $opci22_1 = $rs22_1['opcion1'];
                  }
                  ?>
                  <tr>
                    <td><?php if (isset($rs22_1['idInst'])) {
                          echo $rs22_1['idInst'];
                        } ?></td>
                    <td><?php if (isset($rs22_1['nombreInst'])) {
                          echo $rs22_1['nombreInst'];
                        } ?></td>
                    <td align="center"><?php if ($opci22_1 == "Si") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        }  ?></td>
                    <td align="center"><?php if ($opci22_1 == "No") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>
                    <td align="center"><?php if ($opci22_1 == "No se sabe") {
                                          echo "X";
                                        } else {
                                          echo "";
                                        } ?></td>
                  </tr>
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
          <!--<h2 style="text-align: justify;">I.4 Recursos Materiales</h2><br>
                  <h3 style="text-align: justify;">I.4.4 Equipo Informático</h3>
              <br>-->
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
                  $pre22_2 = mysqli_query($con, "SELECT * FROM `tbl_pregunta22-2` WHERE idInst='" . $id_insti . "' and anio = $anio");
                  if ($rs22_2 = mysqli_fetch_array($pre22_2)) {
                    $CompuEdBasica = $rs22_2['CompuEdBasica'];
                    $CompuEdMediaS = $rs22_2['CompuEdMediaS'];
                    $CompuEdSup = $rs22_2['CompuEdSup'];
                    $CompuEdotro = $rs22_2['CompuEdotro'];
                    $su11 = $rs22_2['totalComFEduc'];
                    $ImpreEdBasica = $rs22_2['ImpreEdBasica'];
                    $ImpreEdMediaS = $rs22_2['ImpreEdMediaS'];
                    $ImpreEdSup = $rs22_2['ImpreEdSup'];
                    $ImpreEdotro = $rs22_2['ImpreEdotro'];
                    $su22 = $rs22_2['totalImpFEduc'];
                    $MultifEdBasica = $rs22_2['MultifEdBasica'];
                    $MultifEdMediaS = $rs22_2['MultifEdMediaS'];
                    $MultifEdSup = $rs22_2['MultifEdSup'];
                    $MultifEdotro = $rs22_2['MultifEdotro'];
                    $su33 = $rs22_2['totalMultifFEduc'];
                    $ServEdBasica = $rs22_2['ServEdBasica'];
                    $ServEdMediaS = $rs22_2['ServEdMediaS'];
                    $ServEdSup = $rs22_2['ServEdSup'];
                    $ServEdSupotro = $rs22_2['ServEdotro'];
                    $su44 = $rs22_2['totalServidoresFEduc'];
                    $TabletsEdBasica = $rs22_2['TabletsEdBasica'];
                    $TabletsEdMediaS = $rs22_2['TabletsEdMediaS'];
                    $TabletsEdSup = $rs22_2['TabletsEdSup'];
                    $TabletsEdotro = $rs22_2['TabletsEdotro'];
                    $su55 = $rs22_2['totalTabletsFEduc'];
                    $comentariosPregunta22_2 = $rs22_2['comentarios'];
                  }
                  ?>
                  <tr>
                    <td style="text-align: right;" bgcolor="DFE9F1"><b>1. Total de computadoras utilizadas exclusivamente con fines educativos y de enseñanza:</b></td>
                    <td width="10%" align="center"><b><label><?php if (isset($su11)) {
                                                                echo $su11;
                                                              } else {
                                                                echo "No aplica";
                                                              } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>1.1 Registradas por instituciones con función principal "Educación básica"</td>
                    <td><b><label><?php if (isset($CompuEdBasica)) {
                                    echo $CompuEdBasica;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>1.2 Registradas por instituciones con función principal "Educación media superior"</td>
                    <td><b><label><?php if (isset($CompuEdMediaS)) {
                                    echo $CompuEdMediaS;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>1.3 Registradas por instituciones con función principal "Educación superior"</td>
                    <td><b><label><?php if (isset($CompuEdSup)) {
                                    echo $CompuEdSup;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>1.4 Registradas por instituciones con otro tipo de función principal</td>
                    <td><b><label><?php if (isset($CompuEdotro)) {
                                    echo $CompuEdotro;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>

                  <tr>
                    <td style="text-align: right;" bgcolor="DFE9F1"><b>2. Total de impresoras utilizadas exclusivamente con fines educativos y de enseñanza:</b></td>
                    <td align="center"><b><label><?php if (isset($su22)) {
                                                    echo $su22;
                                                  } else {
                                                    echo "No aplica";
                                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>2.1 Registradas por instituciones con función principal "Educación básica"</td>
                    <td><b><label><?php if (isset($ImpreEdBasica)) {
                                    echo $ImpreEdBasica;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>2.2 Registradas por instituciones con función principal "Educación media superior"</td>
                    <td><b><label><?php if (isset($ImpreEdMediaS)) {
                                    echo $ImpreEdMediaS;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>2.3 Registradas por instituciones con función principal "Educación superior"</td>
                    <td><b><label><?php if (isset($ImpreEdSup)) {
                                    echo $ImpreEdSup;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>2.4 Registradas por instituciones con otro tipo de función principal</td>
                    <td><b><label><?php if (isset($ImpreEdotro)) {
                                    echo $ImpreEdotro;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>

                  <tr>
                    <td style="text-align: right;" bgcolor="DFE9F1"><b>3. Total de multifuncionales utilizados exclusivamente con fines educativos y de enseñanza</b></td>
                    <td align="center"><b><label><?php if (isset($su33)) {
                                                    echo $su33;
                                                  } else {
                                                    echo "No aplica";
                                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>3.1 Registradas por instituciones con función principal "Educación básica"</td>
                    <td><b><label><?php if (isset($MultifEdBasica)) {
                                    echo $MultifEdBasica;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>3.2 Registradas por instituciones con función principal "Educación media superior"</td>
                    <td><b><label><?php if (isset($MultifEdMediaS)) {
                                    echo $MultifEdMediaS;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>3.3 Registradas por instituciones con función principal "Educación superior"</td>
                    <td><b><label><?php if (isset($MultifEdSup)) {
                                    echo $MultifEdSup;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>3.4 Registradas por instituciones con otro tipo de función principal</td>
                    <td><b><label><?php if (isset($MultifEdotro)) {
                                    echo $MultifEdotro;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td style="text-align: right;" bgcolor="DFE9F1"><b>4. Total de servidores utilizados exclusivamente con fines educativos y de enseñanza</b></td>
                    <td align="center"><b><label><?php if (isset($su44)) {
                                                    echo $su44;
                                                  } else {
                                                    echo "No aplica";
                                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>4.1 Registrados por instituciones con función principal "Educación básica"</td>
                    <td><b><label><?php if (isset($ServEdBasica)) {
                                    echo $ServEdBasica;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>4.2 Registrados por instituciones con función principal "Educación media superior"</td>
                    <td><b><label><?php if (isset($ServEdMediaS)) {
                                    echo $ServEdMediaS;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>4.3 Registrados por instituciones con función principal "Educación superior"</td>
                    <td><b><label><?php if (isset($ServEdSup)) {
                                    echo $ServEdSup;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>4.4 Registradas por instituciones con otro tipo de función principal</td>
                    <td><b><label><?php if (isset($ServEdSupotro)) {
                                    echo $ServEdSupotro;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>

                  <tr>
                    <td style="text-align: right;" bgcolor="DFE9F1"><b>5. Total de tabletas electrónicas utilizadas exclusivamente con fines educativos y de enseñanza</b></td>
                    <td align="center"><b><label><?php if (isset($su55)) {
                                                    echo $su55;
                                                  } else {
                                                    echo "No aplica";
                                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>5.1 Registrados por instituciones con función principal "Educación básica"</td>
                    <td><b><label><?php if (isset($TabletsEdBasica)) {
                                    echo $TabletsEdBasica;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>5.2 Registrados por instituciones con función principal "Educación media superior"</td>
                    <td><b><label><?php if (isset($TabletsEdMediaS)) {
                                    echo $TabletsEdMediaS;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>5.3 Registrados por instituciones con función principal "Educación superior"</td>
                    <td><b><label><?php if (isset($TabletsEdSup)) {
                                    echo $TabletsEdSup;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <tr>
                    <td>5.4 Registradas por instituciones con otro tipo de función principal</td>
                    <td><b><label><?php if (isset($TabletsEdotro)) {
                                    echo $TabletsEdotro;
                                  } else {
                                    echo "No aplica";
                                  } ?></label></b></td>
                  </tr>
                  <?php
                  # COMENTARIOS PREGUNTA 22-2
                  if (isset($comentariosPregunta22_2) && $comentariosPregunta22_2 != '') {
                  ?>
                    <tr>
                      <td colspan="2">
                        <b class="px-5">Comentarios</b>
                        <?php echo $comentariosPregunta22_2; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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