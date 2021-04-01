<?php
require_once "../models/questionaryModel.php";

$data = json_decode(file_get_contents('php://input'), true);
$tipoPeticion = $data["tipoPeticion"];

if ($tipoPeticion == "guardarPregunta") {
    $Pregunta = $data["pregunta"];
    $seccion = $data['seccion'];
    if ($Pregunta == "1" && $seccion == "1") {

        # Obtener datos que manda la peticion axios
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $clasificacionInstitucion = $data['clasificacionInstitucion'];
        $tipoInstitucion = $data['tipoInstitucion'];
        $funcionPrincipal = $data['funcionPrincipal'];
        $funcionSecUno = $data['funcionSecUno'];
        $funcionSecDos = $data['funcionSecDos'];
        $funcionSecTres = $data['funcionSecTres'];
        $funcionSecCuatro = $data['funcionSecCuatro'];
        $funcionSecCinco = $data['funcionSecCinco'];
        $funcionPrincipalEspecifica = $data['funcionPrincipalEspecifica'];
        $funcionSecUnoEspecifica = $data['funcionSecUnoEspecifica'];
        $funcionSecDosEspecifica = $data['funcionSecDosEspecifica'];
        $funcionSecTresEspecifica = $data['funcionSecTresEspecifica'];
        $funcionSecCuatroEspecifica = $data['funcionSecCuatroEspecifica'];
        $funcionSecCincoEspecifica = $data['funcionSecCincoEspecifica'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $Status = 1;
        $Anio = date("Y"); # Obtener año actual

        # Realizar funcion con los parametros y datos obtenidos
        $insercionTabla1 = Questionary::insertQuestion1($idInstitucion, $nombreInstitucion, $clasificacionInstitucion, $tipoInstitucion, $funcionPrincipal, $funcionSecUno, $funcionSecDos, $funcionSecTres, $funcionSecCuatro, $funcionSecCinco, $funcionPrincipalEspecifica, $funcionSecUnoEspecifica, $funcionSecDosEspecifica, $funcionSecTresEspecifica, $funcionSecCuatroEspecifica, $funcionSecCincoEspecifica, $comentarioGeneral, $Status, $Anio);

        # mandar respuesta al front end
        echo json_encode($insercionTabla1);
    } else if ($Pregunta == "2" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $unidadGenero = $data['unidadDeGenero'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $anio = $data['anioInstitucion'];

        $respuesta = Questionary::insertQuestion2($idInstitucion, $nombreInstitucion, $unidadGenero, $comentarioGeneral, 1, $anio);
        echo json_encode($respuesta);
    } else if ($Pregunta == "3" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anio = $data['anioInstitucion'];
        $sexoTitular = $data['sexoTitular'];
        $edadTitular = $data['edadTitular'];
        $ingresosTitular = $data['ingresosTitular'];
        $nivEscolaridadTitular = $data['nivEscolaridadTitular'];
        $estatusEscolaridadTitular = $data['estatusEscolaridadTitular'];
        $empleoAnteriorTitular = $data['empleoAnteriorTitular'];
        $antiguedadServicioTitular = $data['antiguedadServicioTitular'];
        $antiguedadCargoTitular = $data['antiguedadCargoTitular'];
        $pertenenciaIndigenaTitular = $data['pertenenciaIndigenaTitular'];
        $condicionDiscapacidadTitular = $data['condicionDiscapacidadTitular'];
        $formaDesignacionTitular = $data['formaDesignacionTitular'];
        $afiliacionPartidistaTitular = $data['afiliacionPartidistaTitular'];
        $mismoTitular = $data['mismoTitular'];
        $idMismoTitular = $data['claveMismoTitular'];
        $sexoTitularEspecifico = $data['sexoTitularEspecifico'];
        $nivEscolaridadTitularEspecifico = $data['nivEscolaridadTitularEspecifico'];
        $estatusEscolaridadTitularEspecifico = $data['estatusEscolaridadTitularEspecifico'];
        //
        $empleoAnteriorTitularEspecifico = $data['empleoAnteriorTitularEspecifico'];
        //
        $pertenenciaIndigenaTitularEspecifico = $data['pertenenciaIndigenaTitularEspecifico'];
        //
        $condicionDiscapacidadTitularEspecifico = $data['condicionDiscapacidadTitularEspecifico'];
        $formaDesignacionTitularEspecifico = $data['formaDesignacionTitularEspecifico'];
        $afiliacionPartidistaTitularEspecifico = $data['afiliacionPartidistaTitularEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $tituloTitular = $data['tituloTitular'];
        $cedulaTitular = $data['cedulaTitular'];



        //$res = Questionary::insertarCedula($idInstitucion, $nombreInstitucion, $cedulaTitular, $anio);
        //$res2 = Questionary::insertarTitulo($idInstitucion, $nombreInstitucion, $tituloTitular, $anio);
        $resp = Questionary::insertQuestion3($idInstitucion, $nombreInstitucion, $sexoTitular, $edadTitular, $ingresosTitular, $nivEscolaridadTitular, $estatusEscolaridadTitular, $empleoAnteriorTitular, $antiguedadServicioTitular, $antiguedadCargoTitular, $pertenenciaIndigenaTitular, $condicionDiscapacidadTitular, $formaDesignacionTitular, $afiliacionPartidistaTitular, $mismoTitular, $idMismoTitular, $sexoTitularEspecifico, $nivEscolaridadTitularEspecifico, $empleoAnteriorTitularEspecifico, $pertenenciaIndigenaTitularEspecifico, $condicionDiscapacidadTitularEspecifico, $estatusEscolaridadTitularEspecifico, $formaDesignacionTitularEspecifico, $afiliacionPartidistaTitularEspecifico,  $comentarioGeneral, 1, $anio, $tituloTitular, $cedulaTitular);
        //$array[0] = "success";
        //$array[1] = "Exito";
        echo json_encode($resp);
    } else if ($Pregunta == "4" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $clasificacionInstitucion = $data['clasificacionInstitucion'];
        $anio = $data['anioInstitucion'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuesta = Questionary::insertQuestion4($idInstitucion, $nombreInstitucion, $clasificacionInstitucion, $totalPersonal, $totalHombres, $totalMujeres, $comentarioGeneral, 1, $anio);

        echo json_encode($respuesta);
    } else if ($Pregunta == "5" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $clasificacionInstitucion = $data['clasificacionInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalHombresConfianza = $data['totalHombresConfianza'];
        $totalMujeresConfianza = $data['totalMujeresConfianza'];
        $totalHombresBase = $data['totalHombresBase'];
        $totalMujeresBase = $data['totalMujeresBase'];
        $totalHombresEventual = $data['totalHombresEventual'];
        $totalMujeresEventual = $data['totalMujeresEventual'];
        $totalHombresHonorarios = $data['totalHombresHonorarios'];
        $totalMujeresHonorarios = $data['totalMujeresHonorarios'];
        $totalHombresOtro = $data['totalHombresOtro'];
        $totalMujeresOtro = $data['totalMujeresOtro'];
        $otroEspecifico = $data['otroEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];

        $respuesta = Questionary::insertQuestion5($idInstitucion, $nombreInstitucion, $totalHombresConfianza, $totalMujeresConfianza, $totalHombresBase, $totalMujeresBase, $totalHombresEventual, $totalMujeresEventual, $totalHombresHonorarios, $totalMujeresHonorarios, $totalHombresOtro, $totalMujeresOtro, $otroEspecifico, $comentarioGeneral, 1, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres);

        echo json_encode($respuesta);
    } else if ($Pregunta == "6" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $clasificacionInstitucion = ['clasificacionInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalHombresISSSTE = $data['totalHombresISSSTE'];
        $totalMujeresISSSTE = $data['totalMujeresISSSTE'];
        $totalHombresISSEFH = $data['totalHombresISSEFH'];
        $totalMujeresISSEFH = $data['totalMujeresISSEFH'];
        $totalHombresIMSS = $data['totalHombresIMSS'];
        $totalMujeresIMSS = $data['totalMujeresIMSS'];
        $totalHombresOtra = $data['totalHombresOtra'];
        $totalMujeresOtra = $data['totalMujeresOtra'];
        $totalHombresSinSeguridad = $data['totalHombresSinSeguridad'];
        $totalMujeresSinSeguridad = $data['totalMujeresSinSeguridad'];
        $otroYsinSeguridadEspecifico = $data['otroYsinSeguridadEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];

        $resultado = Questionary::insertQuestion6($idInstitucion, $nombreInstitucion, $totalHombresISSSTE, $totalMujeresISSSTE, $totalHombresISSEFH, $totalMujeresISSEFH, $totalHombresIMSS, $totalMujeresIMSS, $totalHombresOtra, $totalMujeresOtra, $totalHombresSinSeguridad, $totalMujeresSinSeguridad, $otroYsinSeguridadEspecifico, $comentarioGeneral, 1, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres);

        echo json_encode($resultado);
    } else if ($Pregunta == "7" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalHombres18a24 = $data['totalHombres18a24'];
        $totalMujeres18a24 = $data['totalMujeres18a24'];
        $totalHombres25a29 = $data['totalHombres25a29'];
        $totalMujeres25a29 = $data['totalMujeres25a29'];
        $totalHombres30a34 = $data['totalHombres30a34'];
        $totalMujeres30a34 = $data['totalMujeres30a34'];
        $totalHombres35a39 = $data['totalHombres35a39'];
        $totalMujeres35a39 = $data['totalMujeres35a39'];
        $totalHombres40a44 = $data['totalHombres40a44'];
        $totalMujeres40a44 = $data['totalMujeres40a44'];
        $totalHombres45a49 = $data['totalHombres45a49'];
        $totalMujeres45a49 = $data['totalMujeres45a49'];
        $totalHombres50a54 = $data['totalHombres50a54'];
        $totalMujeres50a54 = $data['totalMujeres50a54'];
        $totalHombres55a59 = $data['totalHombres55a59'];
        $totalMujeres55a59 = $data['totalMujeres55a59'];
        $totalHombres60yMas = $data['totalHombres60yMas'];
        $totalMujeres60yMas = $data['totalMujeres60yMas'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];

        $respuesta = Questionary::insertQuestion7($idInstitucion, $nombreInstitucion, $totalHombres18a24, $totalMujeres18a24, $totalHombres25a29, $totalMujeres25a29, $totalHombres30a34, $totalMujeres30a34, $totalHombres35a39, $totalMujeres35a39, $totalHombres40a44, $totalMujeres40a44, $totalHombres45a49, $totalMujeres45a49, $totalHombres50a54, $totalMujeres50a54, $totalHombres55a59, $totalMujeres55a59, $totalHombres60yMas, $totalMujeres60yMas, $comentarioGeneral, 1, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres);

        echo json_encode($respuesta);
    } else if ($Pregunta == "8" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalHombresSinPaga = $data['totalHombresSinPaga'];
        $totalMujeresSinPaga = $data['totalMujeresSinPaga'];
        $totalHombres1a5000 = $data['totalHombres1a5000'];
        $totalMujeres1a5000 = $data['totalMujeres1a5000'];
        $totalHombres5001a10000 = $data['totalHombres5001a10000'];
        $totalMujeres5001a10000 = $data['totalMujeres5001a10000'];
        $totalHombres10001a15000 = $data['totalHombres10001a15000'];
        $totalMujeres10001a15000 = $data['totalMujeres10001a15000'];
        $totalHombres15001a20000 = $data['totalHombres15001a20000'];
        $totalMujeres15001a20000 = $data['totalMujeres15001a20000'];
        $totalHombres20001a25000 = $data['totalHombres20001a25000'];
        $totalMujeres20001a25000 = $data['totalMujeres20001a25000'];
        $totalHombres25001a30000 = $data['totalHombres25001a30000'];
        $totalMujeres25001a30000 = $data['totalMujeres25001a30000'];
        $totalHombres30001a35000 = $data['totalHombres30001a35000'];
        $totalMujeres30001a35000 = $data['totalMujeres30001a35000'];
        $totalHombres35001a40000 = $data['totalHombres35001a40000'];
        $totalMujeres35001a40000 = $data['totalMujeres35001a40000'];
        $totalHombres40001a45000 = $data['totalHombres40001a45000'];
        $totalMujeres40001a45000 = $data['totalMujeres40001a45000'];
        $totalHombres45001a50000 = $data['totalHombres45001a50000'];
        $totalMujeres45001a50000 = $data['totalMujeres45001a50000'];
        $totalHombres50001a55000 = $data['totalHombres50001a55000'];
        $totalMujeres50001a55000 = $data['totalMujeres50001a55000'];
        $totalHombres55001a60000 = $data['totalHombres55001a60000'];
        $totalMujeres55001a60000 = $data['totalMujeres55001a60000'];
        $totalHombres60001a65000 = $data['totalHombres60001a65000'];
        $totalMujeres60001a65000 = $data['totalMujeres60001a65000'];
        $totalHombres65001a70000 = $data['totalHombres65001a70000'];
        $totalMujeres65001a70000 = $data['totalMujeres65001a70000'];
        $totalHombresMasDe70000 = $data['totalHombresMasDe70000'];
        $totalMujeresMasDe70000 = $data['totalMujeresMasDe70000'];
        $sinPagaEspecifico = $data['sinPagaEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];

        $respuestaPregunta8 = Questionary::insertQuestion8(
            $idInstitucion,
            $nombreInstitucion,
            $totalHombresSinPaga,
            $totalMujeresSinPaga,
            $totalHombres1a5000,
            $totalMujeres1a5000,
            $totalHombres5001a10000,
            $totalMujeres5001a10000,
            $totalHombres10001a15000,
            $totalMujeres10001a15000,
            $totalHombres15001a20000,
            $totalMujeres15001a20000,
            $totalHombres20001a25000,
            $totalMujeres20001a25000,
            $totalHombres25001a30000,
            $totalMujeres25001a30000,
            $totalHombres30001a35000,
            $totalMujeres30001a35000,
            $totalHombres35001a40000,
            $totalMujeres35001a40000,
            $totalHombres40001a45000,
            $totalMujeres40001a45000,
            $totalHombres45001a50000,
            $totalMujeres45001a50000,
            $totalHombres50001a55000,
            $totalMujeres50001a55000,
            $totalHombres55001a60000,
            $totalMujeres55001a60000,
            $totalHombres60001a65000,
            $totalMujeres60001a65000,
            $totalHombres65001a70000,
            $totalMujeres65001a70000,
            $totalHombresMasDe70000,
            $totalMujeresMasDe70000,
            $sinPagaEspecifico,
            $comentarioGeneral,
            1,
            $anioInstitucion,
            $totalPersonal,
            $totalHombres,
            $totalMujeres
        );

        echo json_encode($respuestaPregunta8);
    } else if ($Pregunta == "9" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalHombresNinguno = $data['totalHombresNinguno'];
        $totalMujeresNinguno = $data['totalMujeresNinguno'];
        $totalHombresPresPri = $data['totalHombresPresPri'];
        $totalMujeresPresPri = $data['totalMujeresPresPri'];
        $totalHombresSecu = $data['totalHombresSecu'];
        $totalMujeresSecu = $data['totalMujeresSecu'];
        $totalHombresPrepa = $data['totalHombresPrepa'];
        $totalMujeresPrepa = $data['totalMujeresPrepa'];
        $totalHombresTecnica = $data['totalHombresTecnica'];
        $totalMujeresTecnica = $data['totalMujeresTecnica'];
        $totalHombresLicenciatura = $data['totalHombresLicenciatura'];
        $totalMujeresLicenciatura = $data['totalMujeresLicenciatura'];
        $totalHombresMaestria = $data['totalHombresMaestria'];
        $totalMujeresMaestria = $data['totalMujeresMaestria'];
        $totalHombresDoctorado = $data['totalHombresDoctorado'];
        $totalMujeresDoctorado = $data['totalMujeresDoctorado'];
        $ningunoEspecifico = $data['ningunoEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];

        $resultado = Questionary::insertQuestion9($idInstitucion, $nombreInstitucion, $totalHombresNinguno, $totalMujeresNinguno, $totalHombresPresPri, $totalMujeresPresPri, $totalHombresSecu, $totalMujeresSecu, $totalHombresPrepa, $totalMujeresPrepa, $totalHombresTecnica, $totalMujeresTecnica, $totalHombresLicenciatura, $totalMujeresLicenciatura, $totalHombresMaestria, $totalMujeresMaestria, $totalHombresDoctorado, $totalMujeresDoctorado, $ningunoEspecifico, $comentarioGeneral, 1, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres);

        echo json_encode($resultado);
    } else if ($Pregunta == "10" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalHombresPertenecen = $data['totalHombresPertenecen'];
        $totalMujeresPertenecen = $data['totalMujeresPertenecen'];
        $totalHombresNoPertenecen = $data['totalHombresNoPertenecen'];
        $totalMujeresNoPertenecen = $data['totalMujeresNoPertenecen'];
        $totalHombresNoIdentificado = $data['totalHombresNoIdentificado'];
        $totalMujeresNoIdentificado = $data['totalMujeresNoIdentificado'];
        $noIdentificadoEspecifico = $data['noIdentificadoEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];

        $resultado = Questionary::insertQuestion10($idInstitucion, $nombreInstitucion, $totalHombresPertenecen, $totalMujeresPertenecen, $totalHombresNoPertenecen, $totalMujeresNoPertenecen, $totalHombresNoIdentificado, $totalMujeresNoIdentificado, $noIdentificadoEspecifico, $comentarioGeneral, 1, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres);

        echo json_encode($resultado);
    } else if ($Pregunta == "11" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalHombresChinanteco = $data['totalHombresChinanteco'];
        $totalMujeresChinanteco = $data['totalMujeresChinanteco'];
        $totalHombresChol = $data['totalHombresChol'];
        $totalMujeresChol = $data['totalMujeresChol'];
        $totalHombresCora = $data['totalHombresCora'];
        $totalMujeresCora = $data['totalMujeresCora'];
        $totalHombresHuasteco = $data['totalHombresHuasteco'];
        $totalMujeresHuasteco = $data['totalMujeresHuasteco'];
        $totalHombresHuichol = $data['totalHombresHuichol'];
        $totalMujeresHuichol = $data['totalMujeresHuichol'];
        $totalHombresMaya = $data['totalHombresMaya'];
        $totalMujeresMaya = $data['totalMujeresMaya'];
        $totalHombresMayo = $data['totalHombresMayo'];
        $totalMujeresMayo = $data['totalMujeresMayo'];
        $totalHombresMazahua = $data['totalHombresMazahua'];
        $totalMujeresMazahua = $data['totalMujeresMazahua'];
        $totalHombresMazateco = $data['totalHombresMazateco'];
        $totalMujeresMazateco = $data['totalMujeresMazateco'];
        $totalHombresMixe = $data['totalHombresMixe'];
        $totalMujeresMixe = $data['totalMujeresMixe'];
        $totalHombresMixteco = $data['totalHombresMixteco'];
        $totalMujeresMixteco = $data['totalMujeresMixteco'];
        $totalHombresNahuatl = $data['totalHombresNahuatl'];
        $totalMujeresNahuatl = $data['totalMujeresNahuatl'];
        $totalHombresOtomi = $data['totalHombresOtomi'];
        $totalMujeresOtomi = $data['totalMujeresOtomi'];
        $totalHombresTarascoPurepecha = $data['totalHombresTarascoPurepecha'];
        $totalMujeresTarascoPurepecha = $data['totalMujeresTarascoPurepecha'];
        $totalHombresTarahumara = $data['totalHombresTarahumara'];
        $totalMujeresTarahumara = $data['totalMujeresTarahumara'];
        $totalHombresTepehuano = $data['totalHombresTepehuano'];
        $totalMujeresTepehuano = $data['totalMujeresTepehuano'];
        $totalHombresTlapaneco = $data['totalHombresTlapaneco'];
        $totalMujeresTlapaneco = $data['totalMujeresTlapaneco'];
        $totalHombresTotonaco = $data['totalHombresTotonaco'];
        $totalMujeresTotonaco = $data['totalMujeresTotonaco'];
        $totalHombresTseltal = $data['totalHombresTseltal'];
        $totalMujeresTseltal = $data['totalMujeresTseltal'];
        $totalHombresTsotsil = $data['totalHombresTsotsil'];
        $totalMujeresTsotsil = $data['totalMujeresTsotsil'];
        $totalHombresYaqui = $data['totalHombresYaqui'];
        $totalMujeresYaqui = $data['totalMujeresYaqui'];
        $totalHombresZapoteco = $data['totalHombresZapoteco'];
        $totalMujeresZapoteco = $data['totalMujeresZapoteco'];
        $totalHombresZoque = $data['totalHombresZoque'];
        $totalMujeresZoque = $data['totalMujeresZoque'];
        $totalHombresOtro = $data['totalHombresOtro'];
        $totalMujeresOtro = $data['totalMujeresOtro'];
        $totalHombresNoIdentificado = $data['totalHombresNoIdentificado'];
        $totalMujeresNoIdentificado = $data['totalMujeresNoIdentificado'];
        $puebloIndigenaEspecifico = $data['puebloIndigenaEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];

        $respuestaPregunta11 = Questionary::insertQuestion11($idInstitucion, $nombreInstitucion, $totalHombresChinanteco, $totalMujeresChinanteco, $totalHombresChol, $totalMujeresChol, $totalHombresCora, $totalMujeresCora, $totalHombresHuasteco, $totalMujeresHuasteco, $totalHombresHuichol, $totalMujeresHuichol, $totalHombresMaya, $totalMujeresMaya, $totalHombresMayo, $totalMujeresMayo, $totalHombresMazahua, $totalMujeresMazahua, $totalHombresMazateco, $totalMujeresMazateco, $totalHombresMixe, $totalMujeresMixe, $totalHombresMixteco, $totalMujeresMixteco, $totalHombresNahuatl, $totalMujeresNahuatl, $totalHombresOtomi, $totalMujeresOtomi, $totalHombresTarascoPurepecha, $totalMujeresTarascoPurepecha, $totalHombresTarahumara, $totalMujeresTarahumara, $totalHombresTepehuano, $totalMujeresTepehuano, $totalHombresTlapaneco, $totalMujeresTlapaneco, $totalHombresTotonaco, $totalMujeresTotonaco, $totalHombresTseltal, $totalMujeresTseltal, $totalHombresTsotsil, $totalMujeresTsotsil, $totalHombresYaqui, $totalMujeresYaqui, $totalHombresZapoteco, $totalMujeresZapoteco, $totalHombresZoque, $totalMujeresZoque, $totalHombresOtro, $totalMujeresOtro, $totalHombresNoIdentificado, $totalMujeresNoIdentificado, $puebloIndigenaEspecifico, $comentarioGeneral, 1, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres);

        echo json_encode($respuestaPregunta11);
    } else if ($Pregunta == "12" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalHombresConDiscapacidad = $data['totalHombresConDiscapacidad'];
        $totalMujeresConDiscapacidad = $data['totalMujeresConDiscapacidad'];
        $totalHombresSinDiscapacidad = $data['totalHombresSinDiscapacidad'];
        $totalMujeresSinDiscapacidad = $data['totalMujeresSinDiscapacidad'];
        $totalHombresNoIdentificado = $data['totalHombresNoIdentificado'];
        $totalMujeresNoIdentificado = $data['totalMujeresNoIdentificado'];
        $noIdentificadoEspecifico = $data['noIdentificadoEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];

        $respuestaPregunta12 = Questionary::insertQuestion12($idInstitucion, $nombreInstitucion, $totalHombresConDiscapacidad, $totalMujeresConDiscapacidad, $totalHombresSinDiscapacidad, $totalMujeresSinDiscapacidad, $totalHombresNoIdentificado, $totalMujeresNoIdentificado, $noIdentificadoEspecifico, $comentarioGeneral, 1, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres);

        echo json_encode($respuestaPregunta12);
    } else if ($Pregunta == "13" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalHombresCaminar = $data['totalHombresCaminar'];
        $totalMujeresCaminar = $data['totalMujeresCaminar'];
        $totalHombresVer = $data['totalHombresVer'];
        $totalMujeresVer = $data['totalMujeresVer'];
        $totalHombresBrazos = $data['totalHombresBrazos'];
        $totalMujeresBrazos = $data['totalMujeresBrazos'];
        $totalHombresAprender = $data['totalHombresAprender'];
        $totalMujeresAprender = $data['totalMujeresAprender'];
        $totalHombresOir = $data['totalHombresOir'];
        $totalMujeresOir = $data['totalMujeresOir'];
        $totalHombresHablar = $data['totalHombresHablar'];
        $totalMujeresHablar = $data['totalMujeresHablar'];
        $totalHombresBaniarse = $data['totalHombresBaniarse'];
        $totalMujeresBaniarse = $data['totalMujeresBaniarse'];
        $totalHombresDepresion = $data['totalHombresDepresion'];
        $totalMujeresDepresion = $data['totalMujeresDepresion'];
        $totalHombresOtro = $data['totalHombresOtro'];
        $totalMujeresOtro = $data['totalMujeresOtro'];
        $totalHombresNoIdentificado = $data['totalHombresNoIdentificado'];
        $totalMujeresNoIdentificado = $data['totalMujeresNoIdentificado'];
        $tipoDiscapacidadEspecifico = $data['tipoDiscapacidadEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];

        $respuestaPregunta13 = Questionary::insertQuestion13($idInstitucion, $nombreInstitucion, $totalHombresCaminar, $totalMujeresCaminar, $totalHombresVer, $totalMujeresVer, $totalHombresBrazos, $totalMujeresBrazos, $totalHombresAprender, $totalMujeresAprender, $totalHombresOir, $totalMujeresOir, $totalHombresHablar, $totalMujeresHablar, $totalHombresBaniarse, $totalMujeresBaniarse, $totalHombresDepresion, $totalMujeresDepresion, $totalHombresOtro, $totalMujeresOtro, $totalHombresNoIdentificado, $totalMujeresNoIdentificado, $tipoDiscapacidadEspecifico, $comentarioGeneral, 1, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres);

        echo json_encode($respuestaPregunta13);
    } else if ($Pregunta == "14" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];
        $personalContabilizado = $data['personalContabilizado'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta14 = Questionary::insertQuestion14($idInstitucion, $nombreInstitucion, $personalContabilizado, $totalPersonal, $totalHombres, $totalMujeres, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta14);
    } else if ($Pregunta == "15" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];
        $personalContabilizado = $data['personalContabilizado'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta15 = Questionary::insertQuestion15($idInstitucion, $nombreInstitucion, $personalContabilizado, $totalPersonal, $totalHombres, $totalMujeres, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta15);
    } else if ($Pregunta == "16" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $elementosProfesionalizacion = $data['elementosProfesionalizacion'];
        $disposicionNormativa = $data['disposicionNormativa'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta16 = Questionary::insertQuestion16($idInstitucion, $nombreInstitucion, $elementosProfesionalizacion, $disposicionNormativa, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta16);
    } else if ($Pregunta == "17" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $checkServicio = $data['checkServicio'];
        $checkReclutamiento = $data['checkReclutamiento'];
        $checkPruebas = $data['checkPruebas'];
        $checkCurricular = $data['checkCurricular'];
        $checkActualizacion = $data['checkActualizacion'];
        $checkValidacion = $data['checkValidacion'];
        $checkConcursos = $data['checkConcursos'];
        $checkMecanismos = $data['checkMecanismos'];
        $checkProgramas = $data['checkProgramas'];
        $checkEvaluacion = $data['checkEvaluacion'];
        $checkEstimulos = $data['checkEstimulos'];
        $checkSeparacion = $data['checkSeparacion'];
        $checkOtros = $data['checkOtros'];
        $otroEspecifico = $data['otroEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta17 = Questionary::insertQuestion17($idInstitucion, $nombreInstitucion, $checkServicio, $checkReclutamiento, $checkPruebas, $checkCurricular, $checkActualizacion, $checkValidacion, $checkConcursos, $checkMecanismos, $checkProgramas, $checkEvaluacion, $checkEstimulos, $checkSeparacion, $checkOtros, $otroEspecifico, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta17);
    } else if ($Pregunta == "18" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $contabaConUnidadAdministrativa = $data['contabaConUnidadAdministrativa'];
        $unidadAdministrativa = $data['unidadAdministrativa'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta18 = Questionary::insertQuestion18($idInstitucion, $nombreInstitucion, $contabaConUnidadAdministrativa, $unidadAdministrativa, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta18);
    } else if ($Pregunta == "19" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $seImpartieronAcciones = $data['seImpartieronAcciones'];
        $accionesImpartidas = $data['accionesImpartidas'];
        $accionesImpartidasConcluidas = $data['accionesImpartidasConcluidas'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta19 = Questionary::insertQuestion19($idInstitucion, $nombreInstitucion, $seImpartieronAcciones, $accionesImpartidas, $accionesImpartidasConcluidas, $totalPersonal, $totalHombres, $totalMujeres, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta19);
    } else if ($Pregunta == "24" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalInmuebles = $data['totalInmuebles'];
        $totalPropios = $data['totalPropios'];
        $totalRentados = $data['totalRentados'];
        $totalOtro = $data['totalOtro'];
        $otroEspecifico = $data['otroEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta24 = Questionary::insertQuestion24($idInstitucion, $nombreInstitucion, $totalInmuebles, $totalPropios, $totalRentados, $totalOtro, $otroEspecifico, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta24);
    } else if ($Pregunta == "25" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $seContabilizaron = $data['seContabilizaron'];
        $comentarioGeneral = $data['comentarioGeneral'];


        $respuestaPregunta25 = Questionary::insertQuestion25($idInstitucion, $nombreInstitucion, $seContabilizaron, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta25);
    } else if ($Pregunta == "26" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalInmuebles = $data['totalInmuebles'];
        $totalInmueblesPricipalEducativa = $data['totalInmueblesPricipalEducativa'];
        $totalInmueblesOtraPrincipal = $data['totalInmueblesOtraPrincipal'];
        $comoEscuelas1 = $data['comoEscuelas1'];
        $paraOtro1 = $data['paraOtro1'];
        $formaMixta1 = $data['formaMixta1'];
        $comoEscuelas2 = $data['comoEscuelas2'];
        $paraOtro2 = $data['paraOtro2'];
        $formaMixta2 = $data['formaMixta2'];
        $paraOtraFuncEducativaEspecifica = $data['paraOtraFuncEducativaEspecifica'];


        $respuestaPregunta26 = Questionary::insertQuestion26($idInstitucion, $nombreInstitucion, $totalInmuebles, $totalInmueblesPricipalEducativa, $totalInmueblesOtraPrincipal, $comoEscuelas1, $paraOtro1, $formaMixta1, $comoEscuelas2, $paraOtro2, $formaMixta2, $paraOtraFuncEducativaEspecifica, $comentarioGeneral, 1, $anioInstitucion);
        echo json_encode($respuestaPregunta26);
    } else if ($Pregunta == "27" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $seContabilizaron = $data['seContabilizaron'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta27 = Questionary::insertQuestion27($idInstitucion, $nombreInstitucion, $seContabilizaron, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta27);
    } else if ($Pregunta == "28" && $seccion == "1") {

        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalInmuebles = $data['totalInmuebles'];
        $totalInmueblesPricipalSalud = $data['totalInmueblesPricipalSalud'];
        $totalInmueblesOtraPrincipal = $data['totalInmueblesOtraPrincipal'];
        $comoClinicas1 = $data['comoClinicas1'];
        $comoCentrosDeSalud1 = $data['comoCentrosDeSalud1'];
        $comoHospitales1 = $data['comoHospitales1'];
        $paraOtro1 = $data['paraOtro1'];
        $formaMixta1 = $data['formaMixta1'];
        $comoClinicas2 = $data['comoClinicas2'];
        $comoCentrosDeSalud2 = $data['comoCentrosDeSalud2'];
        $comoHospitales2 = $data['comoHospitales2'];
        $paraOtro2 = $data['paraOtro2'];
        $formaMixta2 = $data['formaMixta2'];
        $paraOtraFuncSaludEspecifica = $data['paraOtraFuncSaludEspecifica'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta28 = Questionary::insertQuestion28($idInstitucion, $nombreInstitucion, $totalInmuebles, $totalInmueblesPricipalSalud, $totalInmueblesOtraPrincipal, $comoClinicas1, $comoCentrosDeSalud1, $comoHospitales1, $paraOtro1, $formaMixta1, $comoClinicas2, $comoCentrosDeSalud2, $comoHospitales2, $paraOtro2, $formaMixta2, $paraOtraFuncSaludEspecifica, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta28);
    } else if ($Pregunta == "29" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $seContabilizaron = $data['seContabilizaron'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta29 = Questionary::insertQuestion29($idInstitucion, $nombreInstitucion, $seContabilizaron, $comentarioGeneral, 1, $anioInstitucion);
        echo json_encode($respuestaPregunta29);
    } else if ($Pregunta == "30" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalInmuebles = $data['totalInmuebles'];
        $totalInmueblesPricipalDeportes = $data['totalInmueblesPricipalDeportes'];
        $totalInmueblesOtraPrincipal = $data['totalInmueblesOtraPrincipal'];
        $destinadosActFisicas1 = $data['destinadosActFisicas1'];
        $destinadosRecreacionFisica1 = $data['destinadosRecreacionFisica1'];
        $destinadosDeporte1 = $data['destinadosDeporte1'];
        $destinadosDeporteAltoRendimiento1 = $data['destinadosDeporteAltoRendimiento1'];
        $destinadosEventos1 = $data['destinadosEventos1'];
        $paraOtro1 = $data['paraOtro1'];
        $destinadosIndistintos1 = $data['destinadosIndistintos1'];
        $destinadosActFisicas2 = $data['destinadosActFisicas2'];
        $destinadosRecreacionFisica2 = $data['destinadosRecreacionFisica2'];
        $destinadosDeporte2 = $data['destinadosDeporte2'];
        $destinadosDeporteAltoRendimiento2 = $data['destinadosDeporteAltoRendimiento2'];
        $destinadosEventos2 = $data['destinadosEventos2'];
        $paraOtro2 = $data['paraOtro2'];
        $destinadosIndistintos2 = $data['destinadosIndistintos2'];
        $paraOtraFuncSaludEspecifica = $data['paraOtraFuncSaludEspecifica'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta30 = Questionary::insertQuestion30($idInstitucion, $nombreInstitucion, $totalInmuebles, $totalInmueblesPricipalDeportes, $totalInmueblesOtraPrincipal, $destinadosActFisicas1, $destinadosRecreacionFisica1, $destinadosDeporte1, $destinadosDeporteAltoRendimiento1, $destinadosEventos1, $paraOtro1, $destinadosIndistintos1, $destinadosActFisicas2, $destinadosRecreacionFisica2, $destinadosDeporte2, $destinadosDeporteAltoRendimiento2, $destinadosEventos2, $paraOtro2, $destinadosIndistintos2, $paraOtraFuncSaludEspecifica, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta30);
    } else if ($Pregunta == "31" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalGeneral = $data['totalGeneral'];
        $totalAutomoviles = $data['totalAutomoviles'];
        $totalCamionesCamionetas = $data['totalCamionesCamionetas'];
        $totalMotocicletas = $data['totalMotocicletas'];
        $totalBicicletas = $data['totalBicicletas'];
        $totalHelicopteros = $data['totalHelicopteros'];
        $totalDrones = $data['totalDrones'];
        $totalOtros = $data['totalOtros'];
        $otroEspecifico = $data['otroEspecifico'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta31 = Questionary::insertQuestion31($idInstitucion, $nombreInstitucion, $totalGeneral, $totalAutomoviles, $totalCamionesCamionetas, $totalMotocicletas, $totalBicicletas, $totalHelicopteros, $totalDrones, $totalOtros, $otroEspecifico, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta31);
    } else if ($Pregunta == "32" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalLineas = $data['totalLineas'];
        $totalLineasFijas = $data['totalLineasFijas'];
        $totalLineasMoviles = $data['totalLineasMoviles'];
        $totalAparatos = $data['totalAparatos'];
        $totalAparatosFijos = $data['totalAparatosFijos'];
        $totalAparatosMoviles = $data['totalAparatosMoviles'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta32 = Questionary::insertQuestion32($idInstitucion, $nombreInstitucion, $totalLineasFijas, $totalLineasMoviles, $totalLineas, $totalAparatosFijos, $totalAparatosMoviles, $totalAparatos, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta32);
    } else if ($Pregunta == "33" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalComputadoras = $data['totalComputadoras'];
        $totalComputadoraPersonal = $data['totalComputadoraPersonal'];
        $totalComputadoraPortatil = $data['totalComputadoraPortatil'];
        $totalImpresoras = $data['totalImpresoras'];
        $totalImpresoraPersonal = $data['totalImpresoraPersonal'];
        $totalImpresoraCompartida = $data['totalImpresoraCompartida'];
        $totalMultifuncionales = $data['totalMultifuncionales'];
        $totalServidores = $data['totalServidores'];
        $totalTabletas = $data['totalTabletas'];
        $contoConServicios = $data['contoConServicios'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $contoConServiciosEspecifico = $data['contoConServiciosEspecifico'];

        $respuestaPregunta33 = Questionary::insertQuestion33($idInstitucion, $nombreInstitucion, $totalComputadoraPersonal, $totalComputadoraPortatil, $totalComputadoras, $totalImpresoraPersonal, $totalImpresoraCompartida, $totalImpresoras, $totalMultifuncionales, $totalServidores, $totalTabletas, $contoConServicios, $comentarioGeneral, 1, $anioInstitucion, $contoConServiciosEspecifico);

        echo json_encode($respuestaPregunta33);
    } else if ($Pregunta == "34" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $seContabilizaron = $data['seContabilizaron'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta34 = Questionary::insertQuestion34($idInstitucion, $nombreInstitucion, $seContabilizaron, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta34);
    } else if ($Pregunta == "35" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalComputadoras = $data['totalComputadoras'];
        $totalImpresoras = $data['totalImpresoras'];
        $totalMultifuncionales = $data['totalMultifuncionales'];
        $totalServidores = $data['totalServidores'];
        $totalTabletas = $data['totalTabletas'];
        $totalComputadorasEducacion = $data['totalComputadorasEducacion'];
        $totalComputadorasOtra = $data['totalComputadorasOtra'];
        $totalImpresorasEducacion = $data['totalImpresorasEducacion'];
        $totalImpresorasOtra = $data['totalImpresorasOtra'];
        $totalMultifuncionalesEducacion = $data['totalMultifuncionalesEducacion'];
        $totalMultifuncionalesOtra = $data['totalMultifuncionalesOtra'];
        $totalServidoresEducacion = $data['totalServidoresEducacion'];
        $totalServidoresOtra = $data['totalServidoresOtra'];
        $totalTabletasEducacion = $data['totalTabletasEducacion'];
        $totalTabletasOtra = $data['totalTabletasOtra'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta35 = Questionary::insertQuestion35($idInstitucion, $nombreInstitucion, $totalComputadorasEducacion, $totalComputadorasOtra, $totalComputadoras, $totalImpresorasEducacion, $totalImpresorasOtra, $totalImpresoras, $totalMultifuncionalesEducacion, $totalMultifuncionalesOtra, $totalMultifuncionales, $totalServidoresEducacion, $totalServidoresOtra, $totalServidores, $totalTabletasEducacion, $totalTabletasOtra, $totalTabletas, $comentarioGeneral, 1, $anioInstitucion);
        echo json_encode($respuestaPregunta35);
    } else if ($Pregunta == "complemento" && $seccion == "1") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalPersonal = $data['totalPersonal'];
        $totalHombres = $data['totalHombres'];
        $totalMujeres = $data['totalMujeres'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaComplemento = Questionary::preguntaComplemento($idInstitucion, $nombreInstitucion, $totalPersonal, $totalHombres, $totalMujeres, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaComplemento);
    } else if ($Pregunta == "1" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $contabaConDisposicion1 = $data['contabaConDisposicion1'];
        $nombreDisposicion1 = $data['nombreDisposicion1'];
        $contabaConDisposicion2 = $data['contabaConDisposicion2'];
        $nombreDisposicion2 =  $data['nombreDisposicion2'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta1_12 = Questionary::insertQuestion1_12($idInstitucion, $nombreInstitucion, $contabaConDisposicion1, $nombreDisposicion1, $contabaConDisposicion2, $nombreDisposicion2, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta1_12);
    } else if ($Pregunta == "2" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $checkNoAplica1 = $data['checkNoAplica1'];
        $checkAdjudicacion1 = $data['checkAdjudicacion1'];
        $checkInvitacion1 = $data['checkInvitacion1'];
        $checkLicitacionNacional1 = $data['checkLicitacionNacional1'];
        $checkLicitacionInternacional1 = $data['checkLicitacionInternacional1'];
        $checkOtroProcedimiento1 = $data['checkOtroProcedimiento1'];
        $checkNoAplica2 = $data['checkNoAplica2'];
        $checkAdjudicacion2 = $data['checkAdjudicacion2'];
        $checkInvitacion2 = $data['checkInvitacion2'];
        $checkLicitacionNacional2 = $data['checkLicitacionNacional2'];
        $checkLicitacionInternacional2 = $data['checkLicitacionInternacional2'];
        $checkOtroProcedimiento2 = $data['checkOtroProcedimiento2'];
        $checkOtroEspecifico1 = $data['checkOtroEspecifico1'];
        $checkOtroEspecifico2 = $data['checkOtroEspecifico2'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta2_12 = Questionary::insertQuestion2_12($idInstitucion, $nombreInstitucion, $checkNoAplica1, $checkAdjudicacion1, $checkInvitacion1, $checkLicitacionNacional1, $checkLicitacionInternacional1, $checkOtroProcedimiento1, $checkNoAplica2, $checkAdjudicacion2, $checkInvitacion2, $checkLicitacionNacional2, $checkLicitacionInternacional2, $checkOtroProcedimiento2, $checkOtroEspecifico1, $checkOtroEspecifico2, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta2_12);
    } else if ($Pregunta == "3" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $checkNoAplica1 = $data['checkNoAplica1'];
        $contabaMecanismo1 = $data['contabaMecanismo1'];
        $checkMecanismo1tipo1 = $data['checkMecanismo1tipo1'];
        $checkMecanismo2tipo1 = $data['checkMecanismo2tipo1'];
        $checkMecanismo3tipo1 = $data['checkMecanismo3tipo1'];
        $checkMecanismo4tipo1 = $data['checkMecanismo4tipo1'];
        $checkMecanismo5tipo1 = $data['checkMecanismo5tipo1'];
        $checkMecanismo6tipo1 = $data['checkMecanismo6tipo1'];
        $checkMecanismo7tipo1 = $data['checkMecanismo7tipo1'];
        $checkMecanismo8tipo1 = $data['checkMecanismo8tipo1'];
        $checkMecanismo9tipo1 = $data['checkMecanismo9tipo1'];
        $checkMecanismo10tipo1 = $data['checkMecanismo10tipo1'];
        $checkMecanismo11tipo1 = $data['checkMecanismo11tipo1'];
        $checkMecanismo12tipo1 = $data['checkMecanismo12tipo1'];
        $checkMecanismo13tipo1 = $data['checkMecanismo13tipo1'];
        $checkMecanismo14tipo1 = $data['checkMecanismo14tipo1'];
        $checkMecanismo15tipo1 = $data['checkMecanismo15tipo1'];
        $checkMecanismo16tipo1 = $data['checkMecanismo16tipo1'];
        $checkNoAplica2 = $data['checkNoAplica2'];
        $contabaMecanismo2 = $data['contabaMecanismo2'];
        $checkMecanismo1tipo2 = $data['checkMecanismo1tipo2'];
        $checkMecanismo2tipo2 = $data['checkMecanismo2tipo2'];
        $checkMecanismo3tipo2 = $data['checkMecanismo3tipo2'];
        $checkMecanismo4tipo2 = $data['checkMecanismo4tipo2'];
        $checkMecanismo5tipo2 = $data['checkMecanismo5tipo2'];
        $checkMecanismo6tipo2 = $data['checkMecanismo6tipo2'];
        $checkMecanismo7tipo2 = $data['checkMecanismo7tipo2'];
        $checkMecanismo8tipo2 = $data['checkMecanismo8tipo2'];
        $checkMecanismo9tipo2 = $data['checkMecanismo9tipo2'];
        $checkMecanismo10tipo2 = $data['checkMecanismo10tipo2'];
        $checkMecanismo11tipo2 = $data['checkMecanismo11tipo2'];
        $checkMecanismo12tipo2 = $data['checkMecanismo12tipo2'];
        $checkMecanismo13tipo2 = $data['checkMecanismo13tipo2'];
        $checkMecanismo14tipo2 = $data['checkMecanismo14tipo2'];
        $checkMecanismo15tipo2 = $data['checkMecanismo15tipo2'];
        $checkMecanismo16tipo2 = $data['checkMecanismo16tipo2'];
        $checkOtroEspecifico1 = $data['checkOtroEspecifico1'];
        $checkOtroEspecifico2 = $data['checkOtroEspecifico2'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta3_12 = Questionary::insertQuestion3_12($idInstitucion, $nombreInstitucion, $checkNoAplica1, $contabaMecanismo1, $checkMecanismo1tipo1, $checkMecanismo2tipo1, $checkMecanismo3tipo1, $checkMecanismo4tipo1, $checkMecanismo5tipo1, $checkMecanismo6tipo1, $checkMecanismo7tipo1, $checkMecanismo8tipo1, $checkMecanismo9tipo1, $checkMecanismo10tipo1, $checkMecanismo11tipo1, $checkMecanismo12tipo1, $checkMecanismo13tipo1, $checkMecanismo14tipo1, $checkMecanismo15tipo1, $checkMecanismo16tipo1, $checkNoAplica2, $contabaMecanismo2, $checkMecanismo1tipo2, $checkMecanismo2tipo2, $checkMecanismo3tipo2, $checkMecanismo4tipo2, $checkMecanismo5tipo2, $checkMecanismo6tipo2, $checkMecanismo7tipo2, $checkMecanismo8tipo2, $checkMecanismo9tipo2, $checkMecanismo10tipo2, $checkMecanismo11tipo2, $checkMecanismo12tipo2, $checkMecanismo13tipo2, $checkMecanismo14tipo2, $checkMecanismo15tipo2, $checkMecanismo16tipo2, $checkOtroEspecifico1, $checkOtroEspecifico2, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta3_12);
    } else if ($Pregunta == "4" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $contabaConSistema = $data['contabaConSistema'];
        $sitioDisponible = $data['sitioDisponible'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta4_12 = Questionary::insertQuestion4_12($idInstitucion, $nombreInstitucion, $contabaConSistema, $sitioDisponible, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta4_12);
    } else if ($Pregunta == "5" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $checkEtapa1 = $data['checkEtapa1'];
        $checkEtapa2 = $data['checkEtapa2'];
        $checkEtapa3 = $data['checkEtapa3'];
        $checkEtapa4 = $data['checkEtapa4'];
        $checkEtapa5 = $data['checkEtapa5'];
        $checkEtapa6 = $data['checkEtapa6'];
        $checkEtapa7 = $data['checkEtapa7'];
        $checkEtapa8 = $data['checkEtapa8'];
        $checkEtapa9 = $data['checkEtapa9'];
        $otraEspecifica = $data['otraEspecifica'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta5_12 = Questionary::insertQuestion5_12($idInstitucion, $nombreInstitucion, $checkEtapa1, $checkEtapa2, $checkEtapa3, $checkEtapa4, $checkEtapa5, $checkEtapa6, $checkEtapa7, $checkEtapa8, $checkEtapa9, $otraEspecifica, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta5_12);
    } else if ($Pregunta == "6" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $contabaConElSistema1 = $data['contabaConElSistema1'];
        $contabaConElSistema2 = $data['contabaConElSistema2'];
        $contabaConElSistema3 = $data['contabaConElSistema3'];
        $contabaConElSistema4 = $data['contabaConElSistema4'];
        $contabaConElSistema5 = $data['contabaConElSistema5'];
        $contabaConElSistema6 = $data['contabaConElSistema6'];
        $tipoFormato1 = $data['tipoFormato1'];
        $tipoFormato2 = $data['tipoFormato2'];
        $tipoFormato3 = $data['tipoFormato3'];
        $tipoFormato4 = $data['tipoFormato4'];
        $tipoFormato5 = $data['tipoFormato5'];
        $tipoFormato6 = $data['tipoFormato6'];
        $frecuenciaActualizacion1 = $data['frecuenciaActualizacion1'];
        $frecuenciaActualizacion2 = $data['frecuenciaActualizacion2'];
        $frecuenciaActualizacion3 = $data['frecuenciaActualizacion3'];
        $frecuenciaActualizacion4 = $data['frecuenciaActualizacion4'];
        $frecuenciaActualizacion5 = $data['frecuenciaActualizacion5'];
        $frecuenciaActualizacion6 = $data['frecuenciaActualizacion6'];
        $cantidadRegistrada1 = $data['cantidadRegistrada1'];
        $cantidadRegistrada2 = $data['cantidadRegistrada2'];
        $cantidadRegistrada3 = $data['cantidadRegistrada3'];
        $cantidadRegistrada4 = $data['cantidadRegistrada4'];
        $cantidadRegistrada5 = $data['cantidadRegistrada5'];
        $cantidadRegistrada6 = $data['cantidadRegistrada6'];
        $otroFormatoEspecifico1 = $data['otroFormatoEspecifico1'];
        $otroFormatoEspecifico2 = $data['otroFormatoEspecifico2'];
        $otroFormatoEspecifico3 = $data['otroFormatoEspecifico3'];
        $otroFormatoEspecifico4 = $data['otroFormatoEspecifico4'];
        $otroFormatoEspecifico5 = $data['otroFormatoEspecifico5'];
        $otroFormatoEspecifico6 = $data['otroFormatoEspecifico6'];
        $otraFrecuenciaEspecifica1 = $data['otraFrecuenciaEspecifica1'];
        $otraFrecuenciaEspecifica2 = $data['otraFrecuenciaEspecifica2'];
        $otraFrecuenciaEspecifica3 = $data['otraFrecuenciaEspecifica3'];
        $otraFrecuenciaEspecifica4 = $data['otraFrecuenciaEspecifica4'];
        $otraFrecuenciaEspecifica5 = $data['otraFrecuenciaEspecifica5'];
        $otraFrecuenciaEspecifica6 = $data['otraFrecuenciaEspecifica6'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta6_2 = Questionary::insertQuestion6_12($idInstitucion, $nombreInstitucion, $contabaConElSistema1, $contabaConElSistema2, $contabaConElSistema3, $contabaConElSistema4, $contabaConElSistema5, $tipoFormato1, $tipoFormato2, $tipoFormato3, $tipoFormato4, $tipoFormato5, $frecuenciaActualizacion1, $frecuenciaActualizacion2, $frecuenciaActualizacion3, $frecuenciaActualizacion4, $frecuenciaActualizacion5, $cantidadRegistrada1, $cantidadRegistrada2, $cantidadRegistrada3, $cantidadRegistrada4, $cantidadRegistrada5, $otroFormatoEspecifico1, $otroFormatoEspecifico2, $otroFormatoEspecifico3, $otroFormatoEspecifico4, $otroFormatoEspecifico5, $otraFrecuenciaEspecifica1, $otraFrecuenciaEspecifica2, $otraFrecuenciaEspecifica3, $otraFrecuenciaEspecifica4, $otraFrecuenciaEspecifica5, $comentarioGeneral, $anioInstitucion, $contabaConElSistema6, $tipoFormato6, $frecuenciaActualizacion6, $cantidadRegistrada6, $otroFormatoEspecifico6, $otraFrecuenciaEspecifica6);
        echo json_encode($respuestaPregunta6_2);
    } else if ($Pregunta == "7" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $noAplica1 = $data['noAplica1'];
        $contratosRealizados1 = $data['contratosRealizados1'];
        $noAplica2 = $data['noAplica2'];
        $contratosRealizados2 = $data['contratosRealizados2'];
        $noAplica3 = $data['noAplica3'];
        $contratosRealizados3 = $data['contratosRealizados3'];
        $noAplica4 = $data['noAplica4'];
        $contratosRealizados4 = $data['contratosRealizados4'];
        $noAplica5 = $data['noAplica5'];
        $contratosRealizados5 = $data['contratosRealizados5'];
        $totalContratos = $data['totalContratos'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta7_12 = Questionary::insertQuestion7_12($idInstitucion, $nombreInstitucion, $noAplica1, $contratosRealizados1, $noAplica2, $contratosRealizados2, $noAplica3, $contratosRealizados3, $noAplica4, $contratosRealizados4, $noAplica5, $contratosRealizados5, $comentarioGeneral, 1, $anioInstitucion, $totalContratos);

        echo json_encode($respuestaPregunta7_12);
    } else if ($Pregunta == "8" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $noAplicaProcedimientoTipo1 = $data['noAplicaProcedimientoTipo1'];
        $totalContratosTipo1 = $data['totalContratosTipo1'];
        $contratosAdquisicionesTipo1 = $data['contratosAdquisicionesTipo1'];
        $contratosObraPublicaTipo1 = $data['contratosObraPublicaTipo1'];
        $noAplicaProcedimientoTipo2 = $data['noAplicaProcedimientoTipo2'];
        $totalContratosTipo2 = $data['totalContratosTipo2'];
        $contratosAdquisicionesTipo2 = $data['contratosAdquisicionesTipo2'];
        $contratosObraPublicaTipo2 = $data['contratosObraPublicaTipo2'];
        $noAplicaProcedimientoTipo3 = $data['noAplicaProcedimientoTipo3'];
        $totalContratosTipo3 = $data['totalContratosTipo3'];
        $contratosAdquisicionesTipo3 = $data['contratosAdquisicionesTipo3'];
        $contratosObraPublicaTipo3 = $data['contratosObraPublicaTipo3'];
        $noAplicaProcedimientoTipo4 = $data['noAplicaProcedimientoTipo4'];
        $totalContratosTipo4 = $data['totalContratosTipo4'];
        $contratosAdquisicionesTipo4 = $data['contratosAdquisicionesTipo4'];
        $contratosObraPublicaTipo4 = $data['contratosObraPublicaTipo4'];
        $noAplicaProcedimientoTipo5 = $data['noAplicaProcedimientoTipo5'];
        $totalContratosTipo5 = $data['totalContratosTipo5'];
        $contratosAdquisicionesTipo5 = $data['contratosAdquisicionesTipo5'];
        $contratosObraPublicaTipo5 = $data['contratosObraPublicaTipo5'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalContratosGral = $data['totalContratosGral'];
        $totalContratosGralAdquisiciones = $data['totalContratosGralAdquisiciones'];
        $totalContratosGralObraPublica = $data['totalContratosGralObraPublica'];

        $respuestaPregunta8_12 = Questionary::insertQuestion8_12($idInstitucion, $nombreInstitucion, $noAplicaProcedimientoTipo1, $totalContratosTipo1, $contratosAdquisicionesTipo1, $contratosObraPublicaTipo1, $noAplicaProcedimientoTipo2, $totalContratosTipo2, $contratosAdquisicionesTipo2, $contratosObraPublicaTipo2, $noAplicaProcedimientoTipo3, $totalContratosTipo3, $contratosAdquisicionesTipo3, $contratosObraPublicaTipo3, $noAplicaProcedimientoTipo4, $totalContratosTipo4, $contratosAdquisicionesTipo4, $contratosObraPublicaTipo4, $noAplicaProcedimientoTipo5, $totalContratosTipo5, $contratosAdquisicionesTipo5, $contratosObraPublicaTipo5, $comentarioGeneral, 1, $anioInstitucion, $totalContratosGral, $totalContratosGralAdquisiciones, $totalContratosGralObraPublica);

        echo json_encode($respuestaPregunta8_12);
    } else if ($Pregunta == "9" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $noAplica1 = $data['noAplica1'];
        $montoAsociado1 = $data['montoAsociado1'];
        $noAplica2 = $data['noAplica2'];
        $montoAsociado2 = $data['montoAsociado2'];
        $noAplica3 = $data['noAplica3'];
        $montoAsociado3 = $data['montoAsociado3'];
        $noAplica4 = $data['noAplica4'];
        $montoAsociado4 = $data['montoAsociado4'];
        $noAplica5 = $data['noAplica5'];
        $montoAsociado5 = $data['montoAsociado5'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $montoTotal = $data['montoTotal'];

        $respuestaPregunta9_12 = Questionary::insertQuestion9_12($idInstitucion, $nombreInstitucion, $noAplica1, $montoAsociado1, $noAplica2, $montoAsociado2, $noAplica3, $montoAsociado3, $noAplica4, $montoAsociado4, $noAplica5, $montoAsociado5, $comentarioGeneral, 1, $anioInstitucion, $montoTotal);

        echo json_encode($respuestaPregunta9_12);
    } else if ($Pregunta == "10" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $noAplicaProcedimientoTipo1 = $data['noAplicaProcedimientoTipo1'];
        $totalMontosTipo1 = $data['totalMontosTipo1'];
        $montosAdquisicionesTipo1 = $data['montosAdquisicionesTipo1'];
        $montosObraPublicaTipo1 = $data['montosObraPublicaTipo1'];
        $noAplicaProcedimientoTipo2 = $data['noAplicaProcedimientoTipo2'];
        $totalMontosTipo2 = $data['totalMontosTipo2'];
        $montosAdquisicionesTipo2 = $data['montosAdquisicionesTipo2'];
        $montosObraPublicaTipo2 = $data['montosObraPublicaTipo2'];
        $noAplicaProcedimientoTipo3 = $data['noAplicaProcedimientoTipo3'];
        $totalMontosTipo3 = $data['totalMontosTipo3'];
        $montosAdquisicionesTipo3 = $data['montosAdquisicionesTipo3'];
        $montosObraPublicaTipo3 = $data['montosObraPublicaTipo3'];
        $noAplicaProcedimientoTipo4 = $data['noAplicaProcedimientoTipo4'];
        $totalMontosTipo4 = $data['totalMontosTipo4'];
        $montosAdquisicionesTipo4 = $data['montosAdquisicionesTipo4'];
        $montosObraPublicaTipo4 = $data['montosObraPublicaTipo4'];
        $noAplicaProcedimientoTipo5 = $data['noAplicaProcedimientoTipo5'];
        $totalMontosTipo5 = $data['totalMontosTipo5'];
        $montosAdquisicionesTipo5 = $data['montosAdquisicionesTipo5'];
        $montosObraPublicaTipo5 = $data['montosObraPublicaTipo5'];
        $comentarioGeneral = $data['comentarioGeneral'];
        $totalMontosGral = $data['totalMontosGral'];
        $totalMontosGralAdquisiciones = $data['totalMontosGralAdquisiciones'];
        $totalMontosGralObraPublica = $data['totalMontosGralObraPublica'];

        $respuestaPregunta10_12 = Questionary::insertQuestion10_12($idInstitucion, $nombreInstitucion, $noAplicaProcedimientoTipo1, $totalMontosTipo1, $montosAdquisicionesTipo1, $montosObraPublicaTipo1, $noAplicaProcedimientoTipo2, $totalMontosTipo2, $montosAdquisicionesTipo2, $montosObraPublicaTipo2, $noAplicaProcedimientoTipo3, $totalMontosTipo3, $montosAdquisicionesTipo3, $montosObraPublicaTipo3, $noAplicaProcedimientoTipo4, $totalMontosTipo4, $montosAdquisicionesTipo4, $montosObraPublicaTipo4, $noAplicaProcedimientoTipo5, $totalMontosTipo5, $montosAdquisicionesTipo5, $montosObraPublicaTipo5, $comentarioGeneral, 1, $anioInstitucion, $totalMontosGral, $totalMontosGralAdquisiciones, $totalMontosGralObraPublica);
        echo json_encode($respuestaPregunta10_12);
    } else if ($Pregunta == "11" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $implementoEsquema = $data['implementoEsquema'];
        $totalContratos = $data['totalContratos'];
        $montoAsociado = $data['montoAsociado'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta11_12 = Questionary::insertQuestion11_12($idInstitucion, $nombreInstitucion, $implementoEsquema, $totalContratos, $montoAsociado, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta11_12);
    } else if ($Pregunta == "12" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $implementoEsquema = $data['implementoEsquema'];
        $totalContrataciones = $data['totalContrataciones'];
        $montoAsociado = $data['montoAsociado'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta12_12 = Questionary::insertQuestion12_12($idInstitucion, $nombreInstitucion, $implementoEsquema, $totalContrataciones, $montoAsociado, $comentarioGeneral, 1, $anioInstitucion);

        echo json_encode($respuestaPregunta12_12);
    } else if ($Pregunta == "13" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalDeConvenios = $data['totalDeConvenios'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta13_12 = Questionary::insertQuestion13_12($idInstitucion, $nombreInstitucion, $totalDeConvenios, $comentarioGeneral, 1, $anioInstitucion);
        echo json_encode($respuestaPregunta13_12);
    } else if ($Pregunta == "14" && $seccion == "12") {
        $idInstitucion = $data['idInstitucion'];
        $nombreInstitucion = $data['nombreInstitucion'];
        $anioInstitucion = $data['anioInstitucion'];
        $totalDeEstudios = $data['totalDeEstudios'];
        $comentarioGeneral = $data['comentarioGeneral'];

        $respuestaPregunta14_12 = Questionary::insertQuestion14_12($idInstitucion, $nombreInstitucion, $totalDeEstudios, $comentarioGeneral, 1, $anioInstitucion);
        echo json_encode($respuestaPregunta14_12);
    }
} else if ($tipoPeticion == 'verificarPreguntasContestadas') {
    $preguntasContestadas = [];
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];
    $clasificacionInstitucion = $data['clasificacionInstitucion'];
    $tbl_pregunta1 = "SELECT *FROM tbl_instituciones where id = '" . $idInstitucion . "' and anio = '" . $anioInstitucion . "' and clasificacionAd = '" . $clasificacionInstitucion . "' and tipoInstitucion != 0";
    $tbl_pregunta2 = "SELECT *FROM tbl_pregunta2_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta3 = "SELECT *FROM tbl_pregunta2 where id_intu = $idInstitucion and anio = $anioInstitucion";

    if ($clasificacionInstitucion == 1) {
        $tbl_pregunta4 = "SELECT *FROM tbl_instituciones where id = $idInstitucion and anio = $anioInstitucion and totalh1 >= 0 and toatlm1 >= 0";
    } else {
        $tbl_pregunta4 = "SELECT *FROM tbl_instituciones where id = $idInstitucion and anio = $anioInstitucion  and totalh2 >= 0 and totalm2 >= 0";
    }

    $tbl_pregunta5 = "SELECT *FROM tbl_pregunta4 where id_inst = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta6 = "SELECT *FROM tbl_pregunta5 where idIns = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta7 = "SELECT *FROM tbl_pregunta6 where id_inti = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta8 = "SELECT *FROM tbl_pregunta7 where idIns = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta9 = "SELECT *FROM tbl_pregunta9_2021 where idInstitucion = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta10 = "SELECT *FROM tbl_pregunta10_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta11 = "SELECT *FROM tbl_pregunta11_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta12 = "SELECT *FROM tbl_pregunta12_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta13 = "SELECT *FROM tbl_pregunta13_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta14 = "SELECT *FROM tbl_pregunta14_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta15 = "SELECT *FROM `tbl_preguntas9-3` where id_institu = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta16 = "SELECT *FROM tbl_pregunta16_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta17 = "SELECT *FROM tbl_pregunta17_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta18 = "SELECT *FROM tbl_pregunta18_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta19 = "SELECT *FROM tbl_pregunta19_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta24 = "SELECT *FROM tbl_pregunta16 where idInst = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta25 = "SELECT *FROM `tbl_pregunta16-1` where idIsnt = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta26 = "SELECT *FROM `tbl_pregunta16-2_2021` where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta27 = "SELECT *FROM `tbl_pregunta16-3` where idIsnt = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta28 = "SELECT *FROM `tbl_pregunta16-6` where idInst = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta29 = "SELECT *FROM `tbl_pregunta16-7` where idInst = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta30 = "SELECT *FROM `tbl_pregunta28_2021` where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta31 = "SELECT *FROM tbl_pregunta18 where idInst = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta32 = "SELECT *FROM tbl_pregunta20 where idInst = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta33 = "SELECT *FROM tbl_pregunta22 where idInst = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta34 = "SELECT *FROM `tbl_pregunta22-1` where idInst = $idInstitucion and anio = $anioInstitucion";
    $tbl_pregunta35 = "SELECT *FROM `tbl_pregunta22-2_2021` where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $complemento = "SELECT *FROM tbl_complemento_2021 WHERE idInstitucion = '" . $idInstitucion . "' AND  Anio = '" . $anioInstitucion . "'";

    # ------------------------seccion xx1

    $tbl_pregunta_1 = "SELECT *FROM tblpregunta1_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_2 = "SELECT *FROM tblpregunta2_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_3 = "SELECT *FROM tblpregunta3_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_4 = "SELECT *FROM tblpregunta4_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_5 = "SELECT *FROM tblpregunta5_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_6 = "SELECT *FROM tblpregunta6_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_7 = "SELECT *FROM tblpregunta7_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_8 = "SELECT *FROM tblpregunta8_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_9 = "SELECT *FROM tblpregunta9_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_9 = "SELECT *FROM tblpregunta9_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_10 = "SELECT *FROM tblpregunta10_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_11 = "SELECT *FROM tblpregunta11_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_12 = "SELECT *FROM tblpregunta12_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_13 = "SELECT *FROM tblpregunta13_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $tbl_pregunta_14 = "SELECT *FROM tblpregunta14_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
    $resultado = Questionary::verificarPreguntas($tbl_pregunta1);
    if (count($resultado) != 0) {
        $preguntasContestadas['itemPregunta1s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta1s1'] = false;
    }
    $resultado2 = Questionary::verificarPreguntas($tbl_pregunta2);
    if (count($resultado2) != 0) {
        $preguntasContestadas['itemPregunta2s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta2s1'] = false;
    }
    $resultado3 = Questionary::verificarPreguntas($tbl_pregunta3);
    if (count($resultado3) != 0) {
        $preguntasContestadas['itemPregunta3s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta3s1'] = false;
    }
    $resultado4 = Questionary::verificarPreguntas($tbl_pregunta4);
    if (count($resultado4) != 0) {
        $preguntasContestadas['itemPregunta4s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta4s1'] = false;
    }
    $resultado5 = Questionary::verificarPreguntas($tbl_pregunta5);
    if (count($resultado5) != 0) {
        $preguntasContestadas['itemPregunta5s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta5s1'] = false;
    }
    $resultado6 = Questionary::verificarPreguntas($tbl_pregunta6);
    if (count($resultado6) != 0) {
        $preguntasContestadas['itemPregunta6s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta6s1'] = false;
    }
    $resultado7 = Questionary::verificarPreguntas($tbl_pregunta7);
    if (count($resultado7) != 0) {
        $preguntasContestadas['itemPregunta7s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta7s1'] = false;
    }
    $resultado8 = Questionary::verificarPreguntas($tbl_pregunta8);
    if (count($resultado8) != 0) {
        $preguntasContestadas['itemPregunta8s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta8s1'] = false;
    }
    $resultado9 = Questionary::verificarPreguntas($tbl_pregunta9);
    if (count($resultado9) != 0) {
        $preguntasContestadas['itemPregunta9s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta9s1'] = false;
    }
    $resultado10 = Questionary::verificarPreguntas($tbl_pregunta10);
    if (count($resultado10) != 0) {
        $preguntasContestadas['itemPregunta10s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta10s1'] = false;
    }
    $resultado11 = Questionary::verificarPreguntas($tbl_pregunta11);
    if (count($resultado11) != 0) {
        $preguntasContestadas['itemPregunta11s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta11s1'] = false;
    }
    $resultado12 = Questionary::verificarPreguntas($tbl_pregunta12);
    if (count($resultado12) != 0) {
        $preguntasContestadas['itemPregunta12s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta12s1'] = false;
    }
    $resultado13 = Questionary::verificarPreguntas($tbl_pregunta13);
    if (count($resultado13) != 0) {
        $preguntasContestadas['itemPregunta13s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta13s1'] = false;
    }
    $resultado14 = Questionary::verificarPreguntas($tbl_pregunta14);
    if (count($resultado14) != 0) {
        $preguntasContestadas['itemPregunta14s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta14s1'] = false;
    }
    $resultado15 = Questionary::verificarPreguntas($tbl_pregunta15);
    if (count($resultado15) != 0) {
        $preguntasContestadas['itemPregunta15s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta15s1'] = false;
    }
    $resultado16 = Questionary::verificarPreguntas($tbl_pregunta16);
    if (count($resultado16) != 0) {
        $preguntasContestadas['itemPregunta16s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta16s1'] = false;
    }
    $resultado17 = Questionary::verificarPreguntas($tbl_pregunta17);
    if (count($resultado17) != 0) {
        $preguntasContestadas['itemPregunta17s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta17s1'] = false;
    }
    $resultado18 = Questionary::verificarPreguntas($tbl_pregunta18);
    if (count($resultado18) != 0) {
        $preguntasContestadas['itemPregunta18s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta18s1'] = false;
    }
    $resultado19 = Questionary::verificarPreguntas($tbl_pregunta19);
    if (count($resultado19) != 0) {
        $preguntasContestadas['itemPregunta19s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta19s1'] = false;
    }
    $resultado24 = Questionary::verificarPreguntas($tbl_pregunta24);
    if (count($resultado24) != 0) {
        $preguntasContestadas['itemPregunta24s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta24s1'] = false;
    }
    $resultado25 = Questionary::verificarPreguntas($tbl_pregunta25);
    if (count($resultado25) != 0) {
        $preguntasContestadas['itemPregunta25s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta25s1'] = false;
    }
    $resultado26 = Questionary::verificarPreguntas($tbl_pregunta26);
    if (count($resultado26) != 0) {
        $preguntasContestadas['itemPregunta26s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta26s1'] = false;
    }
    $resultado27 = Questionary::verificarPreguntas($tbl_pregunta27);
    if (count($resultado27) != 0) {
        $preguntasContestadas['itemPregunta27s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta27s1'] = false;
    }
    $resultado28 = Questionary::verificarPreguntas($tbl_pregunta28);
    if (count($resultado28) != 0) {
        $preguntasContestadas['itemPregunta28s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta28s1'] = false;
    }
    $resultado29 = Questionary::verificarPreguntas($tbl_pregunta29);
    if (count($resultado29) != 0) {
        $preguntasContestadas['itemPregunta29s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta29s1'] = false;
    }
    $resultado30 = Questionary::verificarPreguntas($tbl_pregunta30);
    if (count($resultado30) != 0) {
        $preguntasContestadas['itemPregunta30s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta30s1'] = false;
    }
    $resultado31 = Questionary::verificarPreguntas($tbl_pregunta31);
    if (count($resultado31) != 0) {
        $preguntasContestadas['itemPregunta31s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta31s1'] = false;
    }
    $resultado32 = Questionary::verificarPreguntas($tbl_pregunta32);
    if (count($resultado32) != 0) {
        $preguntasContestadas['itemPregunta32s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta32s1'] = false;
    }
    $resultado33 = Questionary::verificarPreguntas($tbl_pregunta33);
    if (count($resultado33) != 0) {
        $preguntasContestadas['itemPregunta33s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta33s1'] = false;
    }
    $resultado34 = Questionary::verificarPreguntas($tbl_pregunta34);
    if (count($resultado34) != 0) {
        $preguntasContestadas['itemPregunta34s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta34s1'] = false;
    }
    $resultado35 = Questionary::verificarPreguntas($tbl_pregunta35);
    if (count($resultado35) != 0) {
        $preguntasContestadas['itemPregunta35s1'] = true;
    } else {
        $preguntasContestadas['itemPregunta35s1'] = false;
    }
    $complemento = Questionary::verificarPreguntas($complemento);
    if (count($complemento) != 0) {
        $preguntasContestadas['itemComplementoS1'] = true;
    } else {
        $preguntasContestadas['itemComplementoS1'] = false;
    }
    #-------------------seccion 21
    $resultado_1 = Questionary::verificarPreguntas($tbl_pregunta_1);
    if (count($resultado_1) != 0) {
        $preguntasContestadas['itemPregunta1s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta1s12'] = false;
    }
    $resultado_2 = Questionary::verificarPreguntas($tbl_pregunta_2);
    if (count($resultado_2) != 0) {
        $preguntasContestadas['itemPregunta2s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta2s12'] = false;
    }
    $resultado_3 = Questionary::verificarPreguntas($tbl_pregunta_3);
    if (count($resultado_3) != 0) {
        $preguntasContestadas['itemPregunta3s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta3s12'] = false;
    }
    $resultado_4 = Questionary::verificarPreguntas($tbl_pregunta_4);
    if (count($resultado_4) != 0) {
        $preguntasContestadas['itemPregunta4s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta4s12'] = false;
    }
    $resultado_5 = Questionary::verificarPreguntas($tbl_pregunta_5);
    if (count($resultado_5) != 0) {
        $preguntasContestadas['itemPregunta5s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta5s12'] = false;
    }
    $resultado_6 = Questionary::verificarPreguntas($tbl_pregunta_6);
    if (count($resultado_6) != 0) {
        $preguntasContestadas['itemPregunta6s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta6s12'] = false;
    }
    $resultado_7 = Questionary::verificarPreguntas($tbl_pregunta_7);
    if (count($resultado_7) != 0) {
        $preguntasContestadas['itemPregunta7s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta7s12'] = false;
    }
    $resultado_8 = Questionary::verificarPreguntas($tbl_pregunta_8);
    if (count($resultado_8) != 0) {
        $preguntasContestadas['itemPregunta8s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta8s12'] = false;
    }
    $resultado_9 = Questionary::verificarPreguntas($tbl_pregunta_9);
    if (count($resultado_9) != 0) {
        $preguntasContestadas['itemPregunta9s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta9s12'] = false;
    }
    $resultado_10 = Questionary::verificarPreguntas($tbl_pregunta_10);
    if (count($resultado_10) != 0) {
        $preguntasContestadas['itemPregunta10s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta10s12'] = false;
    }
    $resultado_11 = Questionary::verificarPreguntas($tbl_pregunta_11);
    if (count($resultado_11) != 0) {
        $preguntasContestadas['itemPregunta11s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta11s12'] = false;
    }
    $resultado_12 = Questionary::verificarPreguntas($tbl_pregunta_12);
    if (count($resultado_12) != 0) {
        $preguntasContestadas['itemPregunta12s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta12s12'] = false;
    }
    $resultado_13 = Questionary::verificarPreguntas($tbl_pregunta_13);
    if (count($resultado_13) != 0) {
        $preguntasContestadas['itemPregunta13s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta13s12'] = false;
    }
    $resultado_14 = Questionary::verificarPreguntas($tbl_pregunta_14);
    if (count($resultado_14) != 0) {
        $preguntasContestadas['itemPregunta14s12'] = true;
    } else {
        $preguntasContestadas['itemPregunta14s12'] = false;
    }
    echo json_encode($preguntasContestadas);
} else if ($tipoPeticion == 'obtenerConteoPersonal') {
    $idInstitucion = $data['idInstitucion'];
    $nombreInstitucion = $data['nombreInstitucion'];
    $clasificacionInstitucion = $data['clasificacionInstitucion'];
    $Anio = $data['anioInstitucion'];
    $devolverRespuesta = Questionary::obtenerConteoDependencia($idInstitucion, $nombreInstitucion, $clasificacionInstitucion, $Anio);
    echo json_encode($devolverRespuesta);
} else if ($tipoPeticion == 'obtenerConteoPersonalIndigena') {
    $idInstitucion = $data['idInstitucion'];
    $nombreInstitucion = $data['nombreInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $respuestaConteoIndigena = Questionary::obtenerConteoPersonalIndigena($idInstitucion, $nombreInstitucion, $anioInstitucion);

    echo json_encode($respuestaConteoIndigena);
} else if ($tipoPeticion == 'obtenerConteoPersonalDiscapacitado') {
    $idInstitucion = $data['idInstitucion'];
    $nombreInstitucion = $data['nombreInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];
    $conteoPersonalDiscapacitado = Questionary::obtenerConteoPersonalDispacacitado($idInstitucion, $anioInstitucion);

    echo json_encode($conteoPersonalDiscapacitado);
} else if ($tipoPeticion == 'contieneEducacion') {
    $idInstitucion = $data['idInstitucion'];
    $nombreInstitucion = $data['nombreInstitucion'];
    $clasificacionInstitucion = $data['clasificacionInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $contieneEducacion = Questionary::contieneEducacion($idInstitucion, $anioInstitucion);

    echo json_encode($contieneEducacion);
} else if ($tipoPeticion == 'contieneSalud') {
    $idInstitucion = $data['idInstitucion'];
    $nombreInstitucion = $data['nombreInstitucion'];
    $clasificacionInstitucion = $data['clasificacionInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $contieneSalud = Questionary::contieneSalud($idInstitucion, $anioInstitucion);

    echo json_encode($contieneSalud);
} else if ($tipoPeticion == 'contieneDeporte') {
    $idInstitucion = $data['idInstitucion'];
    $nombreInstitucion = $data['nombreInstitucion'];
    $clasificacionInstitucion = $data['clasificacionInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $contieneDeporte = Questionary::contieneDeporte($idInstitucion, $anioInstitucion);

    echo json_encode($contieneDeporte);
} else if ($tipoPeticion == "contabaConElementos") {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $contabaConElementos = Questionary::contieneElementos($idInstitucion, $anioInstitucion);
    echo json_encode($contabaConElementos);
} else if ($tipoPeticion == "obtenerConteoInmuebles") {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];
    $obtenerConteoInmuebles = Questionary::conteoTotalInmuebles($idInstitucion, $anioInstitucion);

    echo json_encode($obtenerConteoInmuebles);
} else if ($tipoPeticion == "contieneEducacionPrincipal") {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];
    $contieneEducacionPrincipal = Questionary::contieneEducacionPrincipal($idInstitucion, $anioInstitucion);

    echo json_encode($contieneEducacionPrincipal);
} else if ($tipoPeticion == "contieneSaludPrincipal") {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];
    $contieneSaludPrincipal = Questionary::contieneSaludPrincipal($idInstitucion, $anioInstitucion);

    echo json_encode($contieneSaludPrincipal);
} else if ($tipoPeticion == "contieneDeportePrincipal") {

    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];
    $contieneDeportePrincipal = Questionary::contieneDeportePrincipal($idInstitucion, $anioInstitucion);

    echo json_encode($contieneDeportePrincipal);
} else if ($tipoPeticion == "seContabilizaronInmueblesEducacion") {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $contablizoEducacion = Questionary::seContabilizoEducacion($idInstitucion, $anioInstitucion);

    echo json_encode($contablizoEducacion);
} else if ($tipoPeticion == "seContabilizaronInmueblesSalud") {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $contablizoSalud = Questionary::seContabilizoSalud($idInstitucion, $anioInstitucion);

    echo json_encode($contablizoSalud);
} else if ($tipoPeticion == "seContabilizaronInmueblesDeporte") {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $contablizoDeporte = Questionary::seContabilizoDeporte($idInstitucion, $anioInstitucion);
    echo json_encode($contablizoDeporte);
} else if ($tipoPeticion == 'obtenerConteoEquipoInformatico') {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $conteoEquipoInformatico = Questionary::conteoEquipoInformatico($idInstitucion, $anioInstitucion);

    echo json_encode($conteoEquipoInformatico);
} else if ($tipoPeticion == 'seContabilizoEquipoInformatico') {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $seContabilizoEquipoInformatico = Questionary::seContabilizoEquipoInformatico($idInstitucion, $anioInstitucion);

    echo json_encode($seContabilizoEquipoInformatico);
} else if ($tipoPeticion == 'contabaConDisposicion1P1S12') {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $peticion1 = Questionary::contabaConDisposicionP1($idInstitucion, $anioInstitucion);
    echo json_encode($peticion1);
} else if ($tipoPeticion == 'contabaConDisposicion2P1S12') {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $peticion2 = Questionary::contabaConDisposicion2P1($idInstitucion, $anioInstitucion);
    echo json_encode($peticion2);
} else if ($tipoPeticion == 'cuentaConSistemaElectronico') {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $respuesta = Questionary::cuentaSistemaElectronico($idInstitucion, $anioInstitucion);

    echo json_encode($respuesta);
} else if ($tipoPeticion == 'obtenerProcedimientosDeContratacion') {

    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $respuesta = Questionary::procedimientosContratacion($idInstitucion, $anioInstitucion);
    echo json_encode($respuesta);
} else if ($tipoPeticion == 'obtenerConteoDeContratos') {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $respuesta = Questionary::totalContratos($idInstitucion, $anioInstitucion);
    echo json_encode($respuesta);
} else if ($tipoPeticion == 'obtenerConteoDeMontos') {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $respuesta = Questionary::obtenerMontos($idInstitucion, $anioInstitucion);

    echo json_encode($respuesta);
} else if ($tipoPeticion == 'obtenerReporte') {
    $id = $data['idInstitucion'];
    $nombre = $data['nombreInstitucion'];
    $clasificacion = $data['clasificacionInstitucion'];
    $anio = $data['anioInstitucion'];

    #SECCION 1

    $pregunta1 = Questionary::generarReporte(Questionary::obtenerConsulta(1, 1, $id, $anio, $clasificacion));
    $pregunta2 = Questionary::generarReporte(Questionary::obtenerConsulta(2, 1, $id, $anio, $clasificacion));
    $pregunta3 = Questionary::generarReporte(Questionary::obtenerConsulta(3, 1, $id, $anio, $clasificacion));
    if ($clasificacion == 1) {
        $tbl_pregunta4 = "SELECT totalh1, toatlm1, comentarios2 FROM tbl_instituciones where id = $id and anio = $anio";
    } else {
        $tbl_pregunta4 = "SELECT totalh2, totalm2, comentarios2 FROM tbl_instituciones where id = $id and anio = $anio";
    }
    $pregunta4 = Questionary::generarReporte($tbl_pregunta4);
    $pregunta5 = Questionary::generarReporte(Questionary::obtenerConsulta(5, 1, $id, $anio, $clasificacion));
    $pregunta6 = Questionary::generarReporte(Questionary::obtenerConsulta(6, 1, $id, $anio, $clasificacion));
    $pregunta7 = Questionary::generarReporte(Questionary::obtenerConsulta(7, 1, $id, $anio, $clasificacion));
    $pregunta8 = Questionary::generarReporte(Questionary::obtenerConsulta(8, 1, $id, $anio, $clasificacion));
    $pregunta9 = Questionary::generarReporte(Questionary::obtenerConsulta(9, 1, $id, $anio, $clasificacion));
    $pregunta10 = Questionary::generarReporte(Questionary::obtenerConsulta(10, 1, $id, $anio, $clasificacion));
    $pregunta11 = Questionary::generarReporte(Questionary::obtenerConsulta(11, 1, $id, $anio, $clasificacion));
    $pregunta12 = Questionary::generarReporte(Questionary::obtenerConsulta(12, 1, $id, $anio, $clasificacion));
    $pregunta13 = Questionary::generarReporte(Questionary::obtenerConsulta(13, 1, $id, $anio, $clasificacion));
    $pregunta14 = Questionary::generarReporte(Questionary::obtenerConsulta(14, 1, $id, $anio, $clasificacion));
    $pregunta15 = Questionary::generarReporte(Questionary::obtenerConsulta(15, 1, $id, $anio, $clasificacion));
    $pregunta16 = Questionary::generarReporte(Questionary::obtenerConsulta(16, 1, $id, $anio, $clasificacion));
    $pregunta17 = Questionary::generarReporte(Questionary::obtenerConsulta(17, 1, $id, $anio, $clasificacion));
    $pregunta18 = Questionary::generarReporte(Questionary::obtenerConsulta(18, 1, $id, $anio, $clasificacion));
    $pregunta19 = Questionary::generarReporte(Questionary::obtenerConsulta(19, 1, $id, $anio, $clasificacion));
    $pregunta24 = Questionary::generarReporte(Questionary::obtenerConsulta(24, 1, $id, $anio, $clasificacion));
    $pregunta25 = Questionary::generarReporte(Questionary::obtenerConsulta(25, 1, $id, $anio, $clasificacion));
    $pregunta26 = Questionary::generarReporte(Questionary::obtenerConsulta(26, 1, $id, $anio, $clasificacion));
    $pregunta27 = Questionary::generarReporte(Questionary::obtenerConsulta(27, 1, $id, $anio, $clasificacion));
    $pregunta28 = Questionary::generarReporte(Questionary::obtenerConsulta(28, 1, $id, $anio, $clasificacion));
    $pregunta29 = Questionary::generarReporte(Questionary::obtenerConsulta(29, 1, $id, $anio, $clasificacion));
    $pregunta30 = Questionary::generarReporte(Questionary::obtenerConsulta(30, 1, $id, $anio, $clasificacion));
    $pregunta31 = Questionary::generarReporte(Questionary::obtenerConsulta(31, 1, $id, $anio, $clasificacion));
    $pregunta32 = Questionary::generarReporte(Questionary::obtenerConsulta(32, 1, $id, $anio, $clasificacion));
    $pregunta33 = Questionary::generarReporte(Questionary::obtenerConsulta(33, 1, $id, $anio, $clasificacion));
    $pregunta34 = Questionary::generarReporte(Questionary::obtenerConsulta(34, 1, $id, $anio, $clasificacion));
    $pregunta35 = Questionary::generarReporte(Questionary::obtenerConsulta(35, 1, $id, $anio, $clasificacion));
    $pregunta36 = Questionary::generarReporte(Questionary::obtenerConsulta(36, 1, $id, $anio, $clasificacion));

    #SECCION 12
    $pregunta1_12 = Questionary::generarReporte(Questionary::obtenerConsulta(1, 12, $id, $anio, $clasificacion));
    $pregunta2_12 = Questionary::generarReporte(Questionary::obtenerConsulta(2, 12, $id, $anio, $clasificacion));
    $pregunta3_12 = Questionary::generarReporte(Questionary::obtenerConsulta(3, 12, $id, $anio, $clasificacion));
    $pregunta4_12 = Questionary::generarReporte(Questionary::obtenerConsulta(4, 12, $id, $anio, $clasificacion));
    $pregunta5_12 = Questionary::generarReporte(Questionary::obtenerConsulta(5, 12, $id, $anio, $clasificacion));
    $pregunta6_12 = Questionary::generarReporte(Questionary::obtenerConsulta(6, 12, $id, $anio, $clasificacion));
    $pregunta7_12 = Questionary::generarReporte(Questionary::obtenerConsulta(7, 12, $id, $anio, $clasificacion));
    $pregunta8_12 = Questionary::generarReporte(Questionary::obtenerConsulta(8, 12, $id, $anio, $clasificacion));
    $pregunta9_12 = Questionary::generarReporte(Questionary::obtenerConsulta(9, 12, $id, $anio, $clasificacion));
    $pregunta10_12 = Questionary::generarReporte(Questionary::obtenerConsulta(10, 12, $id, $anio, $clasificacion));
    $pregunta11_12 = Questionary::generarReporte(Questionary::obtenerConsulta(11, 12, $id, $anio, $clasificacion));
    $pregunta12_12 = Questionary::generarReporte(Questionary::obtenerConsulta(12, 12, $id, $anio, $clasificacion));
    $pregunta13_12 = Questionary::generarReporte(Questionary::obtenerConsulta(13, 12, $id, $anio, $clasificacion));
    $pregunta14_12 = Questionary::generarReporte(Questionary::obtenerConsulta(14, 12, $id, $anio, $clasificacion));

    $reporte = array(
        "pregunta1seccion1" => [
            'tipoInstitucion' => $pregunta1[0]['tipoInstitucion'],
            'funcionPrincipal' => $pregunta1[0]['funcionPr'],
            'funcionSecundaria1' => $pregunta1[0]['secUno'],
            'funcionSecundaria2' => $pregunta1[0]['secDos'],
            'funcionSecundaria3' => $pregunta1[0]['secTres'],
            'funcionSecundaria4' => $pregunta1[0]['secCuatro'],
            'funcionSecundaria5' => $pregunta1[0]['secCinco'],
            'funcionesEspecificas' => $pregunta1[0]['comen2'],
            'comentarioGeneral' => $pregunta1[0]['comentarios']

        ],

        "pregunta2seccion1" => [
            'respuesta' => $pregunta2[0][3],
            'comentarioGeneral' => $pregunta2[0][4]
        ],

        "pregunta3seccion1" => [
            'sexo' => $pregunta3[0][3],
            'edad' => $pregunta3[0][4],
            'ingresosMensual' => $pregunta3[0][5],
            'nivelEscolaridad' => $pregunta3[0][6],
            'estatusEscolaridad' => $pregunta3[0][7],
            'empleoAnterior' => $pregunta3[0][11],
            'antiguedadServicio' => $pregunta3[0][9],
            'antiguedadCargo' => $pregunta3[0][10],
            'pertinenciaIndigena' => $pregunta3[0][12],
            'condicionDiscapacidad' => $pregunta3[0][13],
            'formaDesignacion' => $pregunta3[0][14],
            'afiliacionPartidista' => $pregunta3[0][15],
            'idInstitular' => $pregunta3[0][16],
            'conceptosEspecificos' => $pregunta3[0][22],
            'comentarioGeneral' => $pregunta3[0][23]
        ],

        "pregunta4seccion1" => [
            'totalHombres' => $pregunta4[0][0],
            'totalMujeres' => $pregunta4[0][1],
            'totalPersonal' => $pregunta4[0][0] + $pregunta4[0][1],
            'comentarioGeneral' => $pregunta4[0]['comentarios2']
        ],

        "pregunta5seccion1" => [
            'confianzaHombres' => $pregunta5[0][3],
            'confianzaMujeres' => $pregunta5[0][4],
            'baseHombres' => $pregunta5[0][5],
            'baseMujeres' => $pregunta5[0][6],
            'eventualHombres' => $pregunta5[0][7],
            'eventualMujeres' => $pregunta5[0][8],
            'honorariosHombres' => $pregunta5[0][9],
            'honorariosMujeres' => $pregunta5[0][10],
            'otrosHombres' => $pregunta5[0][11],
            'otrosMujeres' => $pregunta5[0][12],
            'totalHombres' => $pregunta5[0]['totalHombres'],
            'totalMujeres' => $pregunta5[0]['totalMujeres'],
            'totalPersonal' => $pregunta5[0]['totalPersonal'],
            'datosEspecificos' => $pregunta5[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta5[0]['comentarios']
        ],

        "pregunta6seccion1" => [
            'isssteHombres' => $pregunta6[0][3],
            'issteMujeres' => $pregunta6[0][4],
            'issfhHombres' => $pregunta6[0][5],
            'issfhMujeres' => $pregunta6[0][6],
            'imssHombres' => $pregunta6[0][7],
            'imssMujeres' => $pregunta6[0][8],
            'otroHombres' => $pregunta6[0][9],
            'otroMujeres' => $pregunta6[0][10],
            'sinSeguroHombre' => $pregunta6[0][11],
            'sinSeguroMujeres' => $pregunta6[0][12],
            'totalHombres' => $pregunta6[0]['totalHombres'],
            'totalMujeres' => $pregunta6[0]['totalMujeres'],
            'totalPersonal' => $pregunta6[0]['totalPersonal'],
            'datosEspecificos' => $pregunta6[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta6[0]['comentarios']
        ],

        "pregunta7seccion1" => [
            '1824Hombres' => $pregunta7[0][3],
            '1824Mujeres' => $pregunta7[0][4],
            '2529Hombres' => $pregunta7[0][5],
            '2529Mujeres' => $pregunta7[0][6],
            '3034Hombres' => $pregunta7[0][7],
            '3034Mujeres' => $pregunta7[0][8],
            '3539Hombres' => $pregunta7[0][9],
            '3539Mujeres' => $pregunta7[0][10],
            '4044Hombres' => $pregunta7[0][11],
            '4044Mujeres' => $pregunta7[0][12],
            '4549Hombres' => $pregunta7[0][13],
            '4549Mujeres' => $pregunta7[0][14],
            '5054Hombres' => $pregunta7[0][15],
            '5054Mujeres' => $pregunta7[0][16],
            '5559Hombres' => $pregunta7[0][17],
            '5559Mujeres' => $pregunta7[0][18],
            '60Hombres' => $pregunta7[0][19],
            '60Mujeres' => $pregunta7[0][20],
            'totalHombres' => $pregunta7[0]['totalHombres'],
            'totalMujeres' => $pregunta7[0]['totalMujeres'],
            'totalPersonal' => $pregunta7[0]['totalPersonal'],
            'comentarioGeneral' => $pregunta7[0]['comentarios']
        ],

        "pregunta8seccion1" => [
            'sinPagaHombres' => $pregunta8[0]['sinpagoh'],
            'sinPagaMujeres' => $pregunta8[0]['sinpagom'],
            '1a1500Hombres' => $pregunta8[0]['pago2h'],
            '1a1500Mujeres' => $pregunta8[0]['pago2m'],
            '5001a10000Hombres' => $pregunta8[0]['pago3h'],
            '5001a10000Mujeres' => $pregunta8[0]['pago3m'],
            '10001a15000Hombres' => $pregunta8[0]['pago4h'],
            '10001a15000Mujeres' => $pregunta8[0]['pago4m'],
            '15001a20000Hombres' => $pregunta8[0]['pago5h'],
            '15001a20000Mujeres' => $pregunta8[0]['pago5m'],
            '20001a25000Hombres' => $pregunta8[0]['pago6h'],
            '20001a25000Mujeres' => $pregunta8[0]['pago6m'],
            '25001a30000Hombres' => $pregunta8[0]['pago7h'],
            '25001a30000Mujeres' => $pregunta8[0]['pago7m'],
            '30001a35000Hombres' => $pregunta8[0]['pago8h'],
            '30001a35000Mujeres' => $pregunta8[0]['pago8m'],
            '35001a40000Hombres' => $pregunta8[0]['pago9h'],
            '35001a40000Mujeres' => $pregunta8[0]['pago9m'],
            '40001a45000Hombres' => $pregunta8[0]['pago10h'],
            '40001a45000Mujeres' => $pregunta8[0]['pago10m'],
            '45001a50000Hombres' => $pregunta8[0]['pago11h'],
            '45001a50000Mujeres' => $pregunta8[0]['pago11m'],
            '50001a55000Hombres' => $pregunta8[0]['pago12h'],
            '50001a55000Mujeres' => $pregunta8[0]['pago12m'],
            '55001a60000Hombres' => $pregunta8[0]['pago13h'],
            '55001a60000Mujeres' => $pregunta8[0]['pago13m'],
            '60001a65000Hombres' => $pregunta8[0]['pago14h'],
            '60001a65000Mujeres' => $pregunta8[0]['pago14m'],
            '65001a70000Hombres' => $pregunta8[0]['pago15h'],
            '65001a70000Mujeres' => $pregunta8[0]['pago15m'],
            'mas70000Hombres' => $pregunta8[0]['pago16h'],
            'mas70000Mujeres' => $pregunta8[0]['pago16m'],
            'totalHombres' => $pregunta8[0]['totalHombres'],
            'totalMujeres' => $pregunta8[0]['totalMujeres'],
            'totalPersonal' => $pregunta8[0]['totalPersonal'],
            'datosEspecificos' => $pregunta8[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta8[0]['comentarios']
        ],

        "pregunta9seccion1" => [
            'ningunoHombres' => $pregunta9[0]['ningunoh'],
            'ningunoMujeres' => $pregunta9[0]['ningunom'],
            'prePriHombres' => $pregunta9[0]['preescolarPh'],
            'prePriMujeres' => $pregunta9[0]['prescolarPm'],
            'secundariaHombres' => $pregunta9[0]['secundariah'],
            'secundariaMujeres' => $pregunta9[0]['secundariam'],
            'preparatoriaHombres' => $pregunta9[0]['prepah'],
            'preparatoriaMujeres' => $pregunta9[0]['prepam'],
            'carreraHombres' => $pregunta9[0]['carreratch'],
            'carreraMujeres' => $pregunta9[0]['carreratcm'],
            'licenciaturaHombres' => $pregunta9[0]['licenciaturah'],
            'licenciaturaMujeres' => $pregunta9[0]['licenciaturam'],
            'maestriaHombres' => $pregunta9[0]['maestriah'],
            'maestriaMujeres' => $pregunta9[0]['maestriam'],
            'doctoradoHombres' => $pregunta9[0]['doctoradoh'],
            'doctoradoMujeres' => $pregunta9[0]['doctoradom'],
            'totalHombres' => $pregunta9[0]['totalHombres'],
            'totalMujeres' => $pregunta9[0]['totalMujeres'],
            'totalPersonal' => $pregunta9[0]['totalPersonal'],
            'datosEspecificod' => $pregunta9[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta9[0]['comentarios']
        ],

        "pregunta10seccion1" => [
            'perteneceIndigenaH' => $pregunta10[0]['puebloIndigenaH'],
            'perteneceIndigenaM' => $pregunta10[0]['puebloIndigenaM'],
            'noPerteneceIndigenaH' => $pregunta10[0]['noPuebloIndigenaH'],
            'noPerteneneIndigenaM' => $pregunta10[0]['noPuebloIndigenaM'],
            'noIdentificadoH' => $pregunta10[0]['noIdentificadoH'],
            'noIdentificadoM' => $pregunta10[0]['noIdentificadoM'],
            'totalHombres' => $pregunta10[0]['totalHombres'],
            'totalMujeres' => $pregunta10[0]['totalMujeres'],
            'totalPersonal' => $pregunta10[0]['totalPersonal'],
            'datosEspecíficos' => $pregunta10[0]['comentariosValidacion'],
            'comentariosPregunta' => $pregunta10[0]['comentariosPregunta']
        ],

        "pregunta11seccion1" => [
            'chinantecoHombres' => $pregunta11[0]['chinantecoh'],
            'chinantecoMujeres' => $pregunta11[0]['chinantecom'],
            'chinantecoTotal' => $pregunta11[0]['chinantecototal'],
            'cholHombres' => $pregunta11[0]['cholh'],
            'cholMujeres' => $pregunta11[0]['cholm'],
            'cholTotal' => $pregunta11[0]['choltotal'],
            'coraHombres' => $pregunta11[0]['corah'],
            'coraMujeres' => $pregunta11[0]['coram'],
            'coraTotal' => $pregunta11[0]['coratotal'],
            'huastecoHombres' => $pregunta11[0]['huastecoh'],
            'huastecoMujeres' => $pregunta11[0]['huastecom'],
            'huastecoTotal' => $pregunta11[0]['huastecototal'],
            'huicholHombres' => $pregunta11[0]['huicholh'],
            'huicholMujeres' => $pregunta11[0]['huicholm'],
            'huicholTotal' => $pregunta11[0]['huicholtotal'],
            'mayaHombres' => $pregunta11[0]['mayah'],
            'mayaMujeres' => $pregunta11[0]['mayam'],
            'mayaTotal' => $pregunta11[0]['mayatotal'],
            'mayoHombres' => $pregunta11[0]['mayoh'],
            'mayoMujeres' => $pregunta11[0]['mayom'],
            'mayoTotal' => $pregunta11[0]['mayototal'],
            'mazahuaHombres' => $pregunta11[0]['mazahuah'],
            'mazahuaMujeres' => $pregunta11[0]['mazahuam'],
            'mazahuaTotal' => $pregunta11[0]['mazahuatotal'],
            'mazatecoHombres' => $pregunta11[0]['mazatecoh'],
            'mazatecoMujeres' => $pregunta11[0]['mazatecom'],
            'mazatecoTotal' => $pregunta11[0]['mazatecototal'],
            'mixeHombres' => $pregunta11[0]['mixeh'],
            'mixeMujeres' => $pregunta11[0]['mixem'],
            'mixeTotal' => $pregunta11[0]['mixetotal'],
            'mixtecoHombres' => $pregunta11[0]['mixtecoh'],
            'mixtecoMujeres' => $pregunta11[0]['mixtecom'],
            'mixtecoTotal' => $pregunta11[0]['mixtecototal'],
            'nahuatlHombres' => $pregunta11[0]['nahuatlh'],
            'nahuatlMujeres' => $pregunta11[0]['nahuatlm'],
            'nahuatlTotal' => $pregunta11[0]['nahuatltotal'],
            'otomiHombres' => $pregunta11[0]['otomih'],
            'otomiMujeres' => $pregunta11[0]['otomim'],
            'otomiTotal' => $pregunta11[0]['otomitotal'],
            'tarascoHombres' => $pregunta11[0]['tarascoh'],
            'tarascoMujeres' => $pregunta11[0]['tarascom'],
            'tarascoTotal' => $pregunta11[0]['tarascototal'],
            'tarahumaraHombres' => $pregunta11[0]['tarahumarah'],
            'tarahumaraMujeres' => $pregunta11[0]['tarahumaram'],
            'tarahumaraTotal' => $pregunta11[0]['tarahumaratotal'],
            'tepehuanoHombres' => $pregunta11[0]['tepehuanoh'],
            'tepehuanoMujeres' => $pregunta11[0]['tepehuanom'],
            'tepehuanoTotal' => $pregunta11[0]['tepehuanototal'],
            'tlapanecoHombres' => $pregunta11[0]['tlapanecoh'],
            'tlapanecoMujeres' => $pregunta11[0]['tlapanecom'],
            'tlapanecoTotal' => $pregunta11[0]['tlapanecototal'],
            'totonacoHombres' => $pregunta11[0]['totonacoh'],
            'totnacoMujeres' => $pregunta11[0]['totonacom'],
            'totonacoTotal' => $pregunta11[0]['totonacototal'],
            'tseltalHombres' => $pregunta11[0]['tseltalh'],
            'tseltalMujeres' => $pregunta11[0]['tseltalm'],
            'tseltalTotal' => $pregunta11[0]['tseltaltotal'],
            'tsotsitHombres' => $pregunta11[0]['tsotsith'],
            'tsotsitMujeres' => $pregunta11[0]['tsotsit'],
            'tsotsitTotal' => $pregunta11[0]['tsotsittotal'],
            'yaquiHombres' => $pregunta11[0]['yaquih'],
            'yaquiMujeres' => $pregunta11[0]['yaquim'],
            'yaquiTotal' => $pregunta11[0]['yaquitotal'],
            'zapotecoHombres' => $pregunta11[0]['zapotecoh'],
            'zapotecoMujeres' => $pregunta11[0]['zapotecom'],
            'zapotecoTotal' => $pregunta11[0]['zapotecototal'],
            'zoqueHombres' => $pregunta11[0]['zoqueh'],
            'zoqueMujeres' => $pregunta11[0]['zoquem'],
            'zoqueTotal' => $pregunta11[0]['zoquetotal'],
            'otroHombres' => $pregunta11[0]['otroh'],
            'otroMujeres' => $pregunta11[0]['otrom'],
            'otroTotal' => $pregunta11[0]['otrototal'],
            'noIdentificadoHombres' => $pregunta11[0]['noidentificadoh'],
            'noIdentificadoMujeres' => $pregunta11[0]['noidentificadom'],
            'noidentificadoTotal' => $pregunta11[0]['noidentificadototal'],
            'totalHombres' => $pregunta11[0]['totalHombres'],
            'totalMujeres' => $pregunta11[0]['totalMujeres'],
            'totalPersonal' => $pregunta11[0]['totalPersonal'],
            'datosEspecificos' => $pregunta11[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta11[0]['Comentarios']
        ],

        "pregunta12seccion1" => [
            'conDiscapacidadHombres' => $pregunta12[0]['discapacidadH'],
            'conDiscapacidadMujeres' => $pregunta12[0]['discapacidadM'],
            'sinDiscapacidadHombres' => $pregunta12[0]['noDiscapacidadH'],
            'sinDiscapacidadMujeres' => $pregunta12[0]['noDiscapacidadM'],
            'noIdentificadoHombres' => $pregunta12[0]['noIdentificadoH'],
            'noIdentificadoMujeres' => $pregunta12[0]['noIdentificadoM'],
            'totalHombres' => $pregunta12[0]['totalHombres'],
            'totalMujeres' => $pregunta12[0]['totalMujeres'],
            'totalPersonal' => $pregunta12[0]['totalPersonal'],
            'datosEspecificos' => $pregunta12[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta12[0]['comentariosPregunta']
        ],

        "pregunta13seccion1" => [
            'discapacidadCaminarHombres' => $pregunta13[0]['dCaminarH'],
            'discapacidadCaminarMujeres' => $pregunta13[0]['dCaminarM'],
            'discapacidadVerHombres' => $pregunta13[0]['dVerH'],
            'discapacidadaVerMujeres' => $pregunta13[0]['dVerM'],
            'discapacidadMoverHombres' => $pregunta13[0]['dMoverH'],
            'discapacidadMoverMuejeres' => $pregunta13[0]['dMoverM'],
            'discapacidadAprenderHombres' => $pregunta13[0]['dAprenderH'],
            'discapacidadAprenderMujeres' => $pregunta13[0]['dAprenderM'],
            'discapacidadOirHombres' => $pregunta13[0]['dOirH'],
            'discapacidadOirMujeres' => $pregunta13[0]['dOirM'],
            'discapacidadHablarHombres' => $pregunta13[0]['dHablarH'],
            'discapacidadHablarMujeres' => $pregunta13[0]['dHablarM'],
            'discapacidadBaniarseHombres' => $pregunta13[0]['dBaniarseH'],
            'discapacidadBaniarseMujeres' => $pregunta13[0]['dBaniarseM'],
            'discapacidadDepresionHombres' => $pregunta13[0]['dDepresionH'],
            'discapacidadDepresionMujeres' => $pregunta13[0]['dDepresionM'],
            'otraDiscapacidadHombres' => $pregunta13[0]['dOtroH'],
            'otraDiscapacidadMujeres' => $pregunta13[0]['dOtroM'],
            'discapacidadNoIdentificadaHombres' => $pregunta13[0]['noIdentificadoH'],
            'discapacidadNoIdentificadaMujeres' => $pregunta13[0]['noIdentificadoM'],
            'totalHombres' => $pregunta13[0]['totalHombres'],
            'totalMujeres' => $pregunta13[0]['totalMujeres'],
            'totalPersonal' => $pregunta13[0]['totalPersonal'],
            'datosEspecificos' => $pregunta13[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta13[0]['comentariosPregunta']
        ],

        "pregunta14seccion1" => [
            'Respuesta' => $pregunta14[0]['Respuesta'],
            'TotalPersonal' => $pregunta14[0]['Total'],
            'totalHombres' => $pregunta14[0]['Hombres'],
            'totalMujeres' => $pregunta14[0]['Mujeres'],
            'ComentarioGeneral' => $pregunta14[0]['Comentarios']
        ],

        "pregunta15seccion1" => [
            'Respuesta' => $pregunta15[0]['option1'],
            'TotalPersonal' => $pregunta15[0]['Total'],
            'Hombres' => $pregunta15[0]['Hombres'],
            'Mujeres' => $pregunta15[0]['Mujeres'],
            'comentarioGeneral' => $pregunta15[0]['Comentarios']
        ],

        "pregunta16seccion1" => [
            'Respuesta' => $pregunta16[0]['Valor'],
            'disposicionNormativa' => $pregunta16[0]['disposicionNormativa'],
            'comentarioGenera' => $pregunta16[0]['comentariosPregunta']
        ],

        "pregunta17seccion1" => [
            'servicioCivil' => isset($pregunta17[0]['servicioCivil']) ? $pregunta17[0]['servicioCivil'] : "",
            'Reclutamiento' => isset($pregunta17[0]['Reclutamiento'])  ? $pregunta17[0]['Reclutamiento'] : "",
            'diseñoSeleccion' => isset($pregunta17[0]['diseñoSeleccion']) ? $pregunta17[0]['diseñoSeleccion'] : "",
            'diseñoCurricular' => isset($pregunta17[0]['diseñoCurricular']) ? $pregunta17[0]['diseñoCurricular'] : "",
            'actualizacionPerfil' => isset($pregunta17[0]['actualizacionPerfil']) ? $pregunta17[0]['actualizacionPerfil'] : "",
            'diseñoValidacion' => isset($pregunta17[0]['diseñoValidacion']) ? $pregunta17[0]['diseñoValidacion'] : "",
            'concursosPublicos' => isset($pregunta17[0]['concursosPublicos']) ? $pregunta17[0]['concursosPublicos'] : "",
            'Mecanismos' => isset($pregunta17[0]['Mecanismos']) ? $pregunta17[0]['Mecanismos'] : "",
            'programasCapacitacion' => isset($pregunta17[0]['programasCapacitacion']) ? $pregunta17[0]['programasCapacitacion'] : "",
            'evaluacionImpacto' => isset($pregunta17[0]['evaluacionImpacto']) ? $pregunta17[0]['evaluacionImpacto'] : "",
            'programasEstimulos' => isset($pregunta17[0]['programasEstimulos']) ? $pregunta17[0]['programasEstimulos'] : "",
            'separacionServicio' => isset($pregunta17[0]['separacionServicio']) ? $pregunta17[0]['separacionServicio'] : "",
            'Otro' => isset($pregunta17[0]['Otro']) ? $pregunta17[0]['Otro'] : "",
            'datosEspecificos' => isset($pregunta17[0]['comentariosValidacion']) ? $pregunta17[0]['comentariosValidacion'] : "",
            'comentarioGeneral' => isset($pregunta17[0]['comentariosPregunta']) ? $pregunta17[0]['comentariosPregunta'] : ""
        ],

        "pregunta18seccion1" => [
            'Respuesta' => isset($pregunta18[0]['Respuesta']) ? $pregunta18[0]['Respuesta'] : "",
            'nombreUnidad' => isset($pregunta18[0]['nombreUnidad']) ? $pregunta18[0]['nombreUnidad'] : "",
            'comentarioGeneral' => isset($pregunta18[0]['comentariosPregunta']) ? $pregunta18[0]['comentariosPregunta'] : ""
        ],

        "pregunta19seccion1" => [
            'Respuesta' => $pregunta19[0]['Respuesta'],
            'accionesFormativas' => $pregunta19[0]['accionesFormativas'],
            'accionesFormativasConcluidas' => $pregunta19[0]['accionesFormativasC'],
            'TotalPersonal' => $pregunta19[0]['Total'],
            'totalHombres' => $pregunta19[0]['Hombres'],
            'totalMujeres' => $pregunta19[0]['Mujeres'],
            'comentarioGeneral' => $pregunta19[0]['comentariosPregunta']
        ],

        "pregunta24seccion1" => [
            'inmueblesPropios' => $pregunta24[0]['propios'],
            'inmueblesRentados' => $pregunta24[0]['retados'],
            'inmueblesOtros' => $pregunta24[0]['otro'],
            'totalInmuebles' => $pregunta24[0]['total'],
            'datosEspecíficos' => $pregunta24[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta24[0]['comentariosPregunta']
        ],

        "pregunta25seccion1" => [
            'Respuesta' => $pregunta25[0]['opcion1'],
            'comentarioGeneral' => $pregunta25[0]['comentariosPregunta']
        ],

        "pregunta26seccion1" => [
            'totalInmueblesEducacion' => isset($pregunta26[0]['totalInEdu']) ? $pregunta26[0]['totalInEdu'] : "",
            'escuelas1' => isset($pregunta26[0]['escuelas']) ? $pregunta26[0]['escuelas'] : "",
            'funcionesEducativas1' => isset($pregunta26[0]['funcionesEducativas']) ? $pregunta26[0]['funcionesEducativas'] : "",
            'formaMixta1' => isset($pregunta26[0]['formaMixta']) ? $pregunta26[0]['formaMixta'] : "",
            'totalFuncionPrincipalEducacion' => isset($pregunta26[0]['Total1']) ? $pregunta26[0]['Total1'] : "",
            'escuelas2' => isset($pregunta26[0]['escuelas2']) ? $pregunta26[0]['escuelas2'] : "",
            'funcionesEducativas2' => isset($pregunta26[0]['duncionesEducativas2']) ? $pregunta26[0]['duncionesEducativas2'] : "",
            'formaMixta2' => isset($pregunta26[0]['formaMixta2']) ? $pregunta26[0]['formaMixta2'] : "",
            'totalOtroTIpoFuncion' => isset($pregunta26[0]['Total2']) ? $pregunta26[0]['Total2'] : "",
            'datosEspecificos' => isset($pregunta26[0]['comentariosValidacion']) ? $pregunta26[0]['comentariosValidacion'] : "",
            'comentarioGeneral' => isset($pregunta26[0]['comentariosPregunta']) ? $pregunta26[0]['comentariosPregunta'] : ""
        ],

        "pregunta27seccion1" => [
            'Respuesta' => $pregunta27[0]['opcion1'],
            'comentarioGeneral' => $pregunta27[0]['comentariosPregunta']
        ],

        "pregunta28seccion1" => [
            'totalnmueblesSalud' => isset($pregunta28[0]['totalApFun']) ? $pregunta28[0]['totalApFun'] : "",
            'totalClinicas' => isset($pregunta28[0]['totalClinicas']) ? $pregunta28[0]['totalClinicas'] : "",
            'totalCentroSalud' => isset($pregunta28[0]['totalCentroSalud']) ? $pregunta28[0]['totalCentroSalud'] : "",
            'totalHospitales' => isset($pregunta28[0]['totalHospitales']) ? $pregunta28[0]['totalHospitales'] : "",
            'totalFuncionesSalud' => isset($pregunta28[0]['funcionesSalud']) ? $pregunta28[0]['funcionesSalud'] : "",
            'totalMixta' => isset($pregunta28[0]['Mixta']) ? $pregunta28[0]['Mixta'] : "",
            'totalFuncionPrincipalSalud' => isset($pregunta28[0]['total']) ? $pregunta28[0]['total'] : "",
            'totalOtraFuncionClinica' => isset($pregunta28[0]['totalotrafunclinica']) ? $pregunta28[0]['totalotrafunclinica'] : "",
            'totalOtraFuncionSalud' => isset($pregunta28[0]['totalotrafuncsa']) ? $pregunta28[0]['totalotrafuncsa'] : "",
            'totalOtraFuncionHospitales' => isset($pregunta28[0]['totalotrafunchos']) ? $pregunta28[0]['totalotrafunchos'] : "",
            'totalOtraFuncionesSalud' => isset($pregunta28[0]['funcionesSalud2']) ? $pregunta28[0]['funcionesSalud2'] : "",
            'totalOtraFuncionMixta' => isset($pregunta28[0]['Mixta2']) ? $pregunta28[0]['Mixta2'] : "",
            'totalOtraFuncion' => isset($pregunta28[0]['Totalgral']) ? $pregunta28[0]['Totalgral'] : "",
            'datosEspecificos' => isset($pregunta28[0]['Comentario']) ? $pregunta28[0]['Comentario'] : "",
            'comentarioGeneral' => isset($pregunta28[0]['comentarios']) ? $pregunta28[0]['comentarios'] : ""
        ],

        "pregunta29seccion1" => [
            'Respuesta' => $pregunta29[0]['opcion1'],
            'comentarioGeneral' => $pregunta29[0]['comentariosPregunta']
        ],

        "pregunta30seccion1" => [
            'totalInmueblesDeporte' => isset($pregunta30[0]['totalGeneral']) ? $pregunta30[0]['totalGeneral'] : "",
            'funcionPrincipalActivacionFisica' => isset($pregunta30[0]['activacionFisica']) ? $pregunta30[0]['activacionFisica'] : "",
            'funcionPrincipalRecreacionFisica' => isset($pregunta30[0]['recreacionFisica']) ? $pregunta30[0]['recreacionFisica'] : "",
            'funcionPrincipalDeporteSocial' => isset($pregunta30[0]['deporteSocial']) ? $pregunta30[0]['deporteSocial'] : "",
            'funcionPrincipalAltoRendimiento' => isset($pregunta30[0]['altoRendimiento']) ? $pregunta30[0]['altoRendimiento'] : "",
            'funcionPrincipalEventosDeportivos' => isset($pregunta30[0]['eventosDeportivos']) ? $pregunta30[0]['eventosDeportivos'] : "",
            'funcionPrincipalOtros' => isset($pregunta30[0]['Otros']) ? $pregunta30[0]['Otros'] : "",
            'funcionPrincipalIndistinciones' => isset($pregunta30[0]['Indistinciones']) ? $pregunta30[0]['Indistinciones'] : "",
            'totalFuncionPrincipal' => isset($pregunta30[0]['Total']) ? $pregunta30[0]['Total'] : "",
            'otraFuncionActivacionFisica' => isset($pregunta30[0]['activacionFisica2']) ? $pregunta30[0]['activacionFisica2'] : "",
            'otraFuncionRecreacionFisica' => isset($pregunta30[0]['recreacionFisica2']) ? $pregunta30[0]['activacionFisica2'] : "",
            'otrafuncionDeporteSocial' => isset($pregunta30[0]['deporteSocial2']) ? $pregunta30[0]['activacionFisica2'] : "",
            'otraFuncionAltoRendimiento' => isset($pregunta30[0]['altoRendimiento2']) ? $pregunta30[0]['altoRendimiento2'] : "",
            'otraFuncionEventosDeportivos' => isset($pregunta30[0]['eventosDeportivos2']) ? $pregunta30[0]['eventosDeportivos2'] : "",
            'otraFuncionOtros' => isset($pregunta30[0]['Otros2']) ? $pregunta30[0]['Otros2'] : "",
            'otraFuncionIndistionciones' => isset($pregunta30[0]['Indistinciones2']) ? $pregunta30[0]['Indistinciones2'] : "",
            'totalOtraFuncion' => isset($pregunta30[0]['Total2']) ? $pregunta30[0]['Total2'] : "",
            'datosEspecificos' => isset($pregunta30[0]['comentariosValidacion']) ? $pregunta30[0]['comentariosValidacion'] : "",
            'comentarioGeneral' => isset($pregunta30[0]['comentariosPregunta']) ? $pregunta30[0]['comentariosPregunta'] : ""
        ],

        "pregunta31seccion1" => [
            'Automoviles' => $pregunta31[0]['automoviles'],
            'Camionetas' => $pregunta31[0]['camionetas'],
            'motocicletas' => $pregunta31[0]['motocicletas'],
            'bicicletas' => $pregunta31[0]['bicicletas'],
            'helicopteros' => $pregunta31[0]['helicopteros'],
            'drones' => $pregunta31[0]['drones'],
            'otros' => $pregunta31[0]['otro'],
            'totalVehiculos' => $pregunta31[0]['total'],
            'datosEspecificos' => $pregunta31[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta31[0]['comentariosPregunta']
        ],

        "pregunta32seccion1" => [
            'lineasFijas' => $pregunta32[0]['lineasfijas'],
            'lineasMoviles' => $pregunta32[0]['lineasmoviles'],
            'totalLineas' => $pregunta32[0]['total1'],
            'aparatosFijos' => $pregunta32[0]['aparatosfijos'],
            'aparatosMoviles' => $pregunta32[0]['aparatosmoviles'],
            'totalAparatos' => $pregunta32[0]['total2'],
            'comentarioGeneral' => $pregunta32[0]['comentariosPregunta']
        ],

        "pregunta33seccion1" => [
            'computadorasEscritorio' => $pregunta33[0]['cumpuEscritorio'],
            'computadorasPersonales' => $pregunta33[0]['compuPortatil'],
            'totalComputadoras' => $pregunta33[0]['totalC'],
            'impresorasPersonal' => $pregunta33[0]['impresoraPersonal'],
            'impresoraCompartida' => $pregunta33[0]['impresoraCompartida'],
            'totalImpresoras' => $pregunta33[0]['totalI'],
            'multifuncionales' => $pregunta33[0]['multifuncionales'],
            'servidores' => $pregunta33[0]['servidores'],
            'tabletas' => $pregunta33[0]['tabletas'],
            'conexionRemota' => $pregunta33[0]['conexionRemota'],
            'datosEspecificos' => $pregunta33[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta33[0]['comentariosPregunta']
        ],

        "pregunta34seccion1" => [
            'Respuesta' => $pregunta34[0]['opcion1'],
            'comentarioGeneral' => $pregunta34[0]['comentariosPregunta']
        ],

        "pregunta35seccion1" => [
            'funcionPrincipalComputadorasEducacion' => isset($pregunta35[0]['educacion1']) ? $pregunta35[0]['educacion1'] : "",
            'otraFuncionComputadorasEducacion' => isset($pregunta35[0]['principal1']) ? $pregunta35[0]['principal1'] : "",
            'totalComputadoras' => isset($pregunta35[0]['total1']) ? $pregunta35[0]['total1'] : "",
            'funcionPrincipalImpresorasEducacion' => isset($pregunta35[0]['educacion2']) ? $pregunta35[0]['educacion2'] : "",
            'otraFuncionImpresorasEducacion' => isset($pregunta35[0]['principal2']) ? $pregunta35[0]['principal2'] : "",
            'totalImpresoras' => isset($pregunta35[0]['total2']) ? $pregunta35[0]['total2'] : "",
            'funcionPrincipalMultifuncionalesEducacion' => isset($pregunta35[0]['educacion3']) ? $pregunta35[0]['educacion3'] : "",
            'otraFuncionMultifuncionalesEducacion' => isset($pregunta35[0]['principal3']) ? $pregunta35[0]['principal3'] : "",
            'totalMultifuncionales' => isset($pregunta35[0]['total3']) ? $pregunta35[0]['total3'] : "",
            'funcionPrincipalServidoresEducacion' => isset($pregunta35[0]['educacionBasica']) ? $pregunta35[0]['educacionBasica'] : "",
            'otraFuncionServidoresEducacion' => isset($pregunta35[0]['principal4']) ? $pregunta35[0]['principal4'] : "",
            'totalServidores' => isset($pregunta35[0]['total4']) ? $pregunta35[0]['total4'] : "",
            'funcionPrincipalTabletsEducacion' => isset($pregunta35[0]['educacionBasica2']) ? $pregunta35[0]['educacionBasica2'] : "",
            'otraFuncionTabletsEducacion' => isset($pregunta35[0]['principal5']) ? $pregunta35[0]['principal5'] : "",
            'totalTablets' => isset($pregunta35[0]['total6']) ? $pregunta35[0]['total6'] : "",
            'datosEspecificos' => isset($pregunta35[0]['comentariosValidacion']) ? $pregunta35[0]['comentariosValidacion'] : "",
            'comentarioGeneral' => isset($pregunta35[0]['comentariosPregunta']) ? $pregunta35[0]['comentariosPregunta'] : ""
        ],

        "preguntacomplementoseccion1" => [
            'TotalPersonal' => $pregunta36[0]['Total'],
            'totalHombres' => $pregunta36[0]['totalHombres'],
            'totalMujeres' => $pregunta36[0]['totalMujeres'],
            'comentarioGeneral' => $pregunta36[0]['comentariosPregunta']
        ],

        "pregunta1seccion12" => [
            'RespuestaTipoMateria1' => $pregunta1_12[0]['Respuesta'],
            'nombreDependenciaTipoMateria1' => $pregunta1_12[0]['nombreDependencia'],
            'RespuestaTipoMateria2' => $pregunta1_12[0]['Respuesta2'],
            'nombreDependenciaTipoMateria2' => $pregunta1_12[0]['nombreDependencia2'],
            'comentarioGeneral' => $pregunta1_12[0]['comentariosPregunta']
        ],

        "pregunta2seccion12" => [
            'Respuesta' => $pregunta2_12[0]['Condicion'],
            'AdjudicacionDirecta' => $pregunta2_12[0]['AdjudicacionDirecta'],
            'Invitacion' => $pregunta2_12[0]['Invitacion'],
            'licitacionPublicaNacional' => $pregunta2_12[0]['licitacionPublicaN'],
            'licitacionPublicaInternacional' => $pregunta2_12[0]['licitacionPublicaI'],
            'Otro' => $pregunta2_12[0]['Otro'],
            'Respuesta2' => $pregunta2_12[0]['Condicion2'],
            'adjudicacionDirecta2' => $pregunta2_12[0]['adjudicacionDirecta2'],
            'Invitacion2' => $pregunta2_12[0]['Invitacion2'],
            'licitacionPublicaNacional2' => $pregunta2_12[0]['licitacionPublicaN2'],
            'licitacionPublicaInternacional2' => $pregunta2_12[0]['licitacionPublicaI2'],
            'Otro2' => $pregunta2_12[0]['Otro2'],
            'datosEspecificos' => $pregunta2_12[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta2_12[0]['comentariosPregunta']
        ],

        "pregunta3seccion12" => [
            'noAplica1' => $pregunta3_12[0]['Condicion'],
            'contabaConMecanismos1' => $pregunta3_12[0]['Respuesta'],
            'Uno' => $pregunta3_12[0]['Uno'],
            'Dos' => $pregunta3_12[0]['Dos'],
            'Tres' => $pregunta3_12[0]['Tres'],
            'Cuatro' => $pregunta3_12[0]['Cuatro'],
            'Cinco' => $pregunta3_12[0]['Cinco'],
            'Seis' => $pregunta3_12[0]['Seis'],
            'Siete' => $pregunta3_12[0]['Siete'],
            'Ocho' => $pregunta3_12[0]['Ocho'],
            'Nueve' => $pregunta3_12[0]['Nueve'],
            'Diez' => $pregunta3_12[0]['DIez'],
            'Once' => $pregunta3_12[0]['Once'],
            'Doce' => $pregunta3_12[0]['Doce'],
            'Trece' => $pregunta3_12[0]['Trece'],
            'Catorce' => $pregunta3_12[0]['Catorce'],
            'Quince' => $pregunta3_12[0]['Quince'],
            'DiezSeis' => $pregunta3_12[0]['DiezSeis'],
            'noAplica2' => $pregunta3_12[0]['Condicion2'],
            'contabaConMecanismos2' => $pregunta3_12[0]['Respuesta2'],
            'Uno1' => $pregunta3_12[0]['Uno1'],
            'Dos2' => $pregunta3_12[0]['Dos2'],
            'Tres3' => $pregunta3_12[0]['Tres3'],
            'Cuatro4' => $pregunta3_12[0]['Cuatro4'],
            'Cinco5' => $pregunta3_12[0]['Cinco5'],
            'Seis6' => $pregunta3_12[0]['Seis6'],
            'Siete7' => $pregunta3_12[0]['Siete7'],
            'Ocho8' => $pregunta3_12[0]['Ocho8'],
            'Nueve9' => $pregunta3_12[0]['Nueve9'],
            'Diez10' => $pregunta3_12[0]['Diez10'],
            'Once11' => $pregunta3_12[0]['Once11'],
            'Doce12' => $pregunta3_12[0]['Doce12'],
            'Trece13' => $pregunta3_12[0]['Trece13'],
            'Catorce14' => $pregunta3_12[0]['Catorce14'],
            'Quince15' => $pregunta3_12[0]['Quince15'],
            'DiezSeis16' => $pregunta3_12[0]['DiezSeis16'],
            'datosEspecificos' => $pregunta3_12[0]['comentariosValidacion'],
            'comentarioGeneral' => $pregunta3_12[0]['comentariosPregunta']
        ],

        "pregunta4seccion12" => [
            'Respuesta' => $pregunta4_12[0]['Respuesta'],
            'Sitio' => $pregunta4_12[0]['Sitio'],
            'comentarioGeneral' => $pregunta4_12[0]['comentariosPregunta']
        ],

        "pregunta5seccion12" => [
            'Convocatoria' => isset($pregunta5_12[0]['Convocatoria']) ? $pregunta5_12[0]['Convocatoria'] : "",
            'Junta' => isset($pregunta5_12[0]['Junta']) ? $pregunta5_12[0]['Junta'] : "",
            'actoPresentacion' => isset($pregunta5_12[0]['actoPresentacion']) ? $pregunta5_12[0]['actoPresentacion'] : "",
            'declaracionLicitacion' => isset($pregunta5_12[0]['declaracionLicitacion']) ? $pregunta5_12[0]['declaracionLicitacion'] : "",
            'Cancelacion' => isset($pregunta5_12[0]['Cancelacion']) ? $pregunta5_12[0]['Cancelacion'] : "",
            'emisionFallo' => isset($pregunta5_12[0]['emisionFallo']) ? $pregunta5_12[0]['emisionFallo'] : "",
            'Contratacion' => isset($pregunta5_12[0]['Contratacion']) ? $pregunta5_12[0]['Contratacion'] : "",
            'otraEtapa' => isset($pregunta5_12[0]['otraEtapa']) ? $pregunta5_12[0]['otraEtapa'] : "",
            'noSeSabe' => isset($pregunta5_12[0]['noSabe']) ? $pregunta5_12[0]['noSabe'] : "",
            'datosEspecificos' => isset($pregunta5_12[0]['comentariosValidacion']) ? $pregunta5_12[0]['comentariosValidacion'] : "",
            'comentarioGeneral' => isset($pregunta5_12[0]['comentariosPregunta']) ? $pregunta5_12[0]['comentariosPregunta'] : ""
        ],

        "pregunta6seccion12" => [
            'Respuesta' => $pregunta6_12[0]['Respuesta'],
            'tipoFormato' => $pregunta6_12[0]['tipoFormato'],
            'Frecuencia' => $pregunta6_12[0]['Frecuencia'],
            'cantidadRegistrada' => $pregunta6_12[0]['cantidadRegistarda'],
            'Respuesta2' => $pregunta6_12[0]['Respuesta2'],
            'tipoFormato2' => $pregunta6_12[0]['tipoFormato2'],
            'Frecuencia2' => $pregunta6_12[0]['Frecuencia2'],
            'cantidadRegistrada2' => $pregunta6_12[0]['cantidadRegistrada2'],
            'Respuesta3' => $pregunta6_12[0]['Respuesta3'],
            'tipoFormato3' => $pregunta6_12[0]['tipoFormato3'],
            'Frecuencia3' => $pregunta6_12[0]['Frecuencia3'],
            'cantidadRegistrada3' => $pregunta6_12[0]['cantidadRegistrada3'],
            'Respuesta4' => $pregunta6_12[0]['Respuesta4'],
            'tipoFormato4' => $pregunta6_12[0]['tipoFormato4'],
            'Frecuencia4' => $pregunta6_12[0]['Frecuencia4'],
            'cantidadRegistrada4' => $pregunta6_12[0]['cantidadRegistrada4'],
            'Respuesta5' => $pregunta6_12[0]['Respuesta5'],
            'tipoFormato5' => $pregunta6_12[0]['tipoFormato5'],
            'Frecuencia5' => $pregunta6_12[0]['Frecuencia5'],
            'cantidadRegistrada5' => $pregunta6_12[0]['cantidadRegistrada5'],
            'Respuesta6' => $pregunta6_12[0]['Respuesta6'],
            'tipoFormato6' => $pregunta6_12[0]['tipoFormato6'],
            'Frecuencia6' => $pregunta6_12[0]['Frecuencia6'],
            'cantidadRegistrada6' => $pregunta6_12[0]['cantidadRegistrada6'],
            'datosEspecificos' => $pregunta6_12[0]['comentariosValidacion'],
            'comentariosGeneral' => $pregunta6_12[0]['comentariosPregunta']
        ],

        "pregunta7seccion12" => [
            'Respuesta' => $pregunta7_12[0]['Condicion'],
            'contratosRealizados' => $pregunta7_12[0]['contratosReaiizados'],
            'Respuesta2' => $pregunta7_12[0]['Condicion2'],
            'contratosRealizados2' => $pregunta7_12[0]['contratosRealizados2'],
            'Respuesta3' => $pregunta7_12[0]['Condicion3'],
            'contratosRealizados3' => $pregunta7_12[0]['contratosRealizados3'],
            'Respuesta4' => $pregunta7_12[0]['Condicion4'],
            'contratosRealizados4' => $pregunta7_12[0]['contratosRealizados4'],
            'Respuesta5' => $pregunta7_12[0]['Condicion5'],
            'contratosRealizados5' => $pregunta7_12[0]['contratosRealizados5'],
            'totalContratos' => $pregunta7_12[0]['totalContratos'],
            'comentarioGeneral' => $pregunta7_12[0]['comentariosPregunta']
        ],

        "pregunta8seccion12" => [
            'Respuesta' => $pregunta8_12[0]['Condicion'],
            'Total' => $pregunta8_12[0]['Total'],
            'Adquisiciones' => $pregunta8_12[0]['Adquisiciones'],
            'otraPublica' => $pregunta8_12[0]['otraPublica'],
            'Respuesta2' => $pregunta8_12[0]['Condicion2'],
            'Total2' => $pregunta8_12[0]['Total2'],
            'Adquisiciones2' => $pregunta8_12[0]['Adquisiciones2'],
            'otraPublica2' => $pregunta8_12[0]['otraPublica2'],
            'Respuesta3' => $pregunta8_12[0]['Condicion'],
            'Total3' => $pregunta8_12[0]['Total3'],
            'Adquisiciones3' => $pregunta8_12[0]['Adquisiciones3'],
            'otraPublica3' => $pregunta8_12[0]['otroProcedimiento3'],
            'Respuesta4' => $pregunta8_12[0]['Condicion4'],
            'Total4' => $pregunta8_12[0]['Total4'],
            'Adquisiciones4' => $pregunta8_12[0]['Adquisiciones4'],
            'otraPublica4' => $pregunta8_12[0]['otroProcedimiento4'],
            'Respuesta5' => $pregunta8_12[0]['Condicion5'],
            'Total5' => $pregunta8_12[0]['Total5'],
            'Adquisiciones5' => $pregunta8_12[0]['Adquisiciones5'],
            'otraPublica5' => $pregunta8_12[0]['otroProcedimiento5'],
            'totalGeneralAdquisiciones' => $pregunta8_12[0]['totalAquisiciones'],
            'totalGeneralObras' => $pregunta8_12[0]['totalObra'],
            'totalGeneral' => $pregunta8_12[0]['totalGeneral'],
            'comentarioGeneral' => $pregunta8_12[0]['comentariosPregunta']
        ],

        "pregunta9seccion12" => [
            'Respuesta' => $pregunta9_12[0]['Condicion'],
            'monAsociado' => $pregunta9_12[0]['montoAsociado'],
            'Respuesta2' => $pregunta9_12[0]['Condicion2'],
            'monAsociado2' => $pregunta9_12[0]['montoAsociado2'],
            'Respuesta3' => $pregunta9_12[0]['Condicion3'],
            'monAsociado3' => $pregunta9_12[0]['montoAsociado3'],
            'Respuesta4' => $pregunta9_12[0]['Condicion4'],
            'monAsociado4' => $pregunta9_12[0]['montoAsociado4'],
            'Respuesta5' => $pregunta9_12[0]['Condicion5'],
            'monAsociado5' => $pregunta9_12[0]['montoAsociado5'],
            'totalMonto' => $pregunta9_12[0]['montoTotalGeneral'],
            'comentarioGeneral' => $pregunta9_12[0]['comentariosPregunta']
        ],

        "pregunta10seccion12" => [
            'Respuesta' => $pregunta10_12[0]['Condicion'],
            'TotalMonto' => $pregunta10_12[0]['Total'],
            'totalMontoAdquisiciones' => $pregunta10_12[0]['Adquicisiones'],
            'totalMontoObra1' => $pregunta10_12[0]['otraPublica'],
            'Respuesta2' => $pregunta10_12[0]['Condicion2'],
            'TotalMonto2' => $pregunta10_12[0]['Total2'],
            'totalMontoAdquisiciones2' => $pregunta10_12[0]['Adquisiciones2'],
            'totalMontoObra12' => $pregunta10_12[0]['otraPublica2'],
            'Respuesta3' => $pregunta10_12[0]['Condicion3'],
            'TotalMonto3' => $pregunta10_12[0]['Total3'],
            'totalMontoAdquisiciones3' => $pregunta10_12[0]['Adquisiciones3'],
            'totalMontoObra3' => $pregunta10_12[0]['otraPublica3'],
            'Respuesta4' => $pregunta10_12[0]['Condicion4'],
            'TotalMonto4' => $pregunta10_12[0]['Total4'],
            'totalMontoAdquisiciones4' => $pregunta10_12[0]['Adquisiciones4'],
            'totalMontoObra14' => $pregunta10_12[0]['otraPublica4'],
            'Respuesta5' => $pregunta10_12[0]['Condicion5'],
            'TotalMonto5' => $pregunta10_12[0]['Total5'],
            'totalMontoAdquisiciones5' => $pregunta10_12[0]['Adquisiciones5'],
            'totalMontoObra15' => $pregunta10_12[0]['otraPublica5'],
            'totalMontoAdquisicionesGeneral' => $pregunta10_12[0]['totalAdquisiciones'],
            'totalMontoObrasGeneral' => $pregunta10_12[0]['totalObra'],
            'totalGeneralMaximo' => $pregunta10_12[0]['totalGeneral'],
            'comentarioGeneral' => $pregunta10_12[0]['comentariosPregunta']
        ],

        "pregunta11seccion12" => [
            'Respuesta' => $pregunta11_12[0]['Respuesta'],
            'totalContratos' => $pregunta11_12[0]['totalContratos'],
            'Monto' => $pregunta11_12[0]['Monto'],
            'comentarioGeneral' => $pregunta11_12[0]['comentariosPregunta']
        ],

        "pregunta12seccion12" => [
            'Respuesta' => $pregunta12_12[0]['Respuesta'],
            'totalContratos' => $pregunta12_12[0]['totalContratos'],
            'Monto' => $pregunta12_12[0]['Monto'],
            'comentarioGeneral' => $pregunta12_12[0]['comentariosPregunta']
        ],

        "pregunta13seccion12" => [
            'Total' => $pregunta13_12[0]['Total'],
            'comentarioGeneral' => $pregunta13_12[0]['comentariosPregunta']
        ],

        "pregunta14seccion12" => [
            'Total' => $pregunta14_12[0]['Total'],
            'comentarioGeneral' => $pregunta14_12[0]['comentariosPregunta']
        ]
    );

    echo json_encode($reporte);
} else if ($tipoPeticion == 'finalizarCuestionarioEnBD') {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $respuesta = Questionary::terminarCenso($idInstitucion, $anioInstitucion);

    echo json_encode($respuesta);
} else if ($tipoPeticion == 'verificarCuestionarioFinalizado') {
    $idInstitucion = $data['idInstitucion'];
    $anioInstitucion = $data['anioInstitucion'];

    $respuesta = Questionary::verificarFinalizacionCenso($idInstitucion, $anioInstitucion);

    echo json_encode($respuesta);
} else if ($tipoPeticion == 'verificarMismoTitular') {
    $anioInstitucion = $data['anioInstitucion'];
    $idMismoTitular = $data['idMismoTitular'];
    $sexo = $data['sexo'];
    $edad = $data['edad'];
    $ingresos = $data['ingresos'];
    $nivelEscolaridad = $data['nivelEscolaridad'];
    $estatusEscolaridad = $data['estatusEscolaridad'];
    $empleoAnterior = $data['empleoAnterior'];
    $antiguedadServicio = $data['antiguedadServicio'];
    $antiguedadCargo = $data['antiguedadCargo'];
    $pertenenciaIndigena = $data['pertenenciaIndigena'];
    $condicionDiscapacidad = $data['condicionDiscapacidad'];
    $formaDesignacion = $data['formaDesignacion'];

    $respuesta = Questionary::getTitular($idMismoTitular, $anioInstitucion, $sexo, $edad, $ingresos, $nivelEscolaridad, $estatusEscolaridad, $empleoAnterior, $antiguedadServicio, $antiguedadCargo, $pertenenciaIndigena, $condicionDiscapacidad, $formaDesignacion);

    echo json_encode($respuesta);
} else if($tipoPeticion == "cerrarSesion"){
    $respuesta = Questionary::cerrarSesion();

    echo json_encode($respuesta);
}

# @copyright CarlitosPC2810 Derechos Reservados
