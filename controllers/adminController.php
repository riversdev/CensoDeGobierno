<?php
require_once "../models/adminModel.php";

$data = json_decode(file_get_contents('php://input'), true);
$tipoPeticion = $data["tipoPeticion"];

//TODAS ESTAS FUNCIONES DENTRO DE LOS IF ESTAN COMENTADAS EN EL ARCHIVO DE adminModel.php 

// ESTAS PETICIONES QUE MANDA AXIOS PARA EL MANEJO DE LA INFORMACION DEL ADMINISTRADOR

if ($tipoPeticion == "leerListaDependencias") {
    $dependencias = AdminModel::leerListaDependencias();
    echo json_encode($dependencias);
} else if ($tipoPeticion == "editarDependencia") {
    $idDependencia = $data['idDependencia'];
    $idDependenciaOriginal = $data['idDependenciaOriginal'];
    $anioDependencia = $data['anioDependencia'];
    $anioDependenciaOriginal = $data['anioDependenciaOriginal'];
    $nombreDependencia = $data['nombreDependencia'];
    $nombreDependenciaOriginal = $data['nombreDependenciaOriginal'];
    $clasificacion = $data['clasificacionDependencia'];
    $clasificacionOriginal = $data['clasificacionDependenciaOriginal'];
    $tablas = [
        ["tabla" => "altas_instituciones", "campos" => ["Clave", "Institucion", "anio"]],
        ["tabla" => "tblpregunta1_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta2_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta3_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta4_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta5_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta6_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta7_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta8_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta9_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta10_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta11_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta12_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta13_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta14_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_complemento_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_instituciones", "campos" => ["id", "nombre", "anio"]],
        ["tabla" => "tbl_pregunta2", "campos" => ["id_intu", "nombre_intu", "anio"]],
        ["tabla" => "tbl_pregunta2_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta4", "campos" => ["id_inst", "nombre_inst", "anio"]],
        ["tabla" => "tbl_pregunta5", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta6", "campos" => ["id_inti", "intitucion", "anio"]],
        ["tabla" => "tbl_pregunta7", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta8", "campos" => ["id_inst", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta9", "campos" => ["id_intitu", "institucion", "anio"]],
        ["tabla" => "`tbl_pregunta9-1`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "`tbl_pregunta9-2`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "`tbl_preguntas9-3`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "`tbl_pregunta9-4`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta10_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta10", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta11", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta11_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta12_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta13_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta14_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta15", "campos" => ["idInst", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta16", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-1`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-2`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-2_2021`", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "`tbl_pregunta16-3`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-4`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-5`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-6`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-7`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-8`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta16_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta17", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta17_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta18", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta18_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta19", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta19_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta20", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta21", "campos" => ["idIns", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta21_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta22", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-1`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-2`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-2_2021`", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta22_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta23_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta28_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]]
    ];

    if ($idDependencia != $idDependenciaOriginal || $anioDependencia != $anioDependenciaOriginal) {
        $idExistente = AdminModel::verificarIdExistente($idDependencia, $anioDependencia);

        if ($idExistente != 0) {
            if (count($idExistente) == 0) {
                $resultado = AdminModel::editarDependencia($idDependencia, $idDependenciaOriginal, $anioDependencia, $anioDependenciaOriginal, $nombreDependencia, $nombreDependenciaOriginal, $clasificacion, $clasificacionOriginal, $tablas);
                echo json_encode($resultado);
            } else {
                echo json_encode(["error", "La clave <u>" . $idExistente[0]['idDependencia'] . "</u> ya existe en el año <u>" . $idExistente[0]['anioDependencia'] . "</u> y le pertenece a <u>" . $idExistente[0]['nombreDependencia'] . "</u>."]);
            }
        } else {
            echo json_encode(["error", "Imposible verificar si el nuevo ID existe !"]);
        }
    } else {
        $resultado = AdminModel::editarDependencia($idDependencia, $idDependenciaOriginal, $anioDependencia, $anioDependenciaOriginal, $nombreDependencia, $nombreDependenciaOriginal, $clasificacion, $clasificacionOriginal, $tablas);
        echo json_encode($resultado);
    }
} else if ($tipoPeticion == "listarUsuarios") {

    $listarUsuarios = AdminModel::listarUsuarios();
    echo json_encode($listarUsuarios);
} else if ($tipoPeticion == "listarDependencias") {
    echo json_encode(AdminModel::listarDependencias($data['anioDependencia']));
} else if ($tipoPeticion == "obtenerDependencias") {
    $clasificacion = $data['clasificacion'];
    $anio = $data['anio'];
    $obtenerDependencias = AdminModel::obtenerDependencias($clasificacion, $anio);
    echo json_encode($obtenerDependencias);
} else if ($tipoPeticion == "registrarDependencia") {
    echo json_encode(AdminModel::registrarDependencia($data['clasificacion'], $data['clave'], $data['dependencia'], $data['correo'], $data['password'], $data['telefono'], $data['anio']));
} else if ($tipoPeticion == "validarAcceso") {
    $tipoDeUsuario = $data['tipoDeUsuario'];
    $usuario = $data['usuario'];
    $contrasenia = $data['contrasenia'];
    $anio = $data['anio'];

    $respuesta = AdminModel::accesoUsuario($tipoDeUsuario, $usuario, $contrasenia, $anio);
    echo json_encode($respuesta);
} else if ($tipoPeticion == "cerrarSesion") {

    $respuesta = AdminModel::cerrarSesion();

    echo json_encode($respuesta);
} else if ($tipoPeticion == "eliminarUsuario") {

    $id = $data['idUsuario'];
    $respuesta = AdminModel::eliminarUsuario($id);

    echo json_encode($respuesta);
} else if ($tipoPeticion == "agregarUsuario") {
    $nombreUsuario = $data['nombreUsuario'];
    $correoUsuario = $data['correoUsuario'];
    $contraseniaUsuario = $data['contraseniaUsuario'];
    $phoneUsuario = $data['phoneUsuario'];
    $ocupacionUsuario = $data['ocupacionUsuario'];
    $rolUsuario = $data['rolUsuario'];
    $estatusUsuario = $data['estatusUsuario'];

    $respuesta = AdminModel::agregarUsuario($nombreUsuario, $correoUsuario, $phoneUsuario, $ocupacionUsuario, $rolUsuario, $estatusUsuario, $contraseniaUsuario);

    echo json_encode($respuesta);
} else if ($tipoPeticion == "editarUsuario") {
    $idUsuario = $data['idUsuario'];
    $nombreUsuario = $data['nombreUsuario'];
    $correoUsuario = $data['correoUsuario'];
    $phoneUsuario = $data['phoneUsuario'];
    $ocupacionUsuario = $data['ocupacionUsuario'];
    $rolUsuario = $data['rolUsuario'];
    $estatusUsuario = $data['estatusUsuario'];
    $contraseniaUsuario = $data['contraseniaUsuario'];

    $respuesta = AdminModel::editarUsuario($idUsuario, $nombreUsuario, $correoUsuario, $phoneUsuario, $ocupacionUsuario, $rolUsuario, $estatusUsuario, $contraseniaUsuario);

    echo json_encode($respuesta);
} else if ($tipoPeticion == "guardarDependencia") {
    $idDependencia = $data['idDependencia'];
    $anioDependencia = $data['anioDependencia'];
    $nombreDependencia = $data['nombreDependencia'];
    $clasificacionDependencia = $data['clasificacionDependencia'];

    $respuesta = AdminModel::guardarDependencia($idDependencia, $anioDependencia, $nombreDependencia, $clasificacionDependencia);

    echo json_encode($respuesta);
} else if ($tipoPeticion == "eliminarDependencia") {
    $idDependencia = $data['idDependencia'];
    $anioDependencia = $data['anioDependencia'];
    $tipoDeEliminacion = $data['tipoDeEliminacion'];
    $tablasAll = [
        ["tabla" => "altas_instituciones", "campos" => ["Clave", "Institucion", "anio"]],
        ["tabla" => "tblpregunta1_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta2_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta3_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta4_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta5_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta6_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta7_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta8_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta9_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta10_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta11_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta12_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta13_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta14_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_complemento_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_instituciones", "campos" => ["id", "nombre", "anio"]],
        ["tabla" => "tbl_pregunta2", "campos" => ["id_intu", "nombre_intu", "anio"]],
        ["tabla" => "tbl_pregunta2_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta4", "campos" => ["id_inst", "nombre_inst", "anio"]],
        ["tabla" => "tbl_pregunta5", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta6", "campos" => ["id_inti", "intitucion", "anio"]],
        ["tabla" => "tbl_pregunta7", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta8", "campos" => ["id_inst", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta9", "campos" => ["id_intitu", "institucion", "anio"]],
        ["tabla" => "`tbl_pregunta9-1`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "`tbl_pregunta9-2`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "`tbl_preguntas9-3`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "`tbl_pregunta9-4`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta10_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta10", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta11", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta11_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta12_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta13_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta14_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta15", "campos" => ["idInst", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta16", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-1`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-2`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-2_2021`", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "`tbl_pregunta16-3`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-4`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-5`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-6`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-7`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-8`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta16_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta17", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta17_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta18", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta18_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta19", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta19_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta20", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta21", "campos" => ["idIns", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta21_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta22", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-1`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-2`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-2_2021`", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta22_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta23_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta28_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]]
    ];
    $tablaHistorial = [
        ["tabla" => "tblpregunta1_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta2_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta3_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta4_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta5_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta6_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta7_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta8_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta9_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta10_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta11_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta12_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta13_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tblpregunta14_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_complemento_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_instituciones", "campos" => ["id", "nombre", "anio"]],
        ["tabla" => "tbl_pregunta2", "campos" => ["id_intu", "nombre_intu", "anio"]],
        ["tabla" => "tbl_pregunta2_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta4", "campos" => ["id_inst", "nombre_inst", "anio"]],
        ["tabla" => "tbl_pregunta5", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta6", "campos" => ["id_inti", "intitucion", "anio"]],
        ["tabla" => "tbl_pregunta7", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta8", "campos" => ["id_inst", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta9", "campos" => ["id_intitu", "institucion", "anio"]],
        ["tabla" => "`tbl_pregunta9-1`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "`tbl_pregunta9-2`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "`tbl_preguntas9-3`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "`tbl_pregunta9-4`", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta10_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta10", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta11", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta11_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta12_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta13_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta14_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta15", "campos" => ["idInst", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta16", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-1`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-2`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-2_2021`", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "`tbl_pregunta16-3`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-4`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-5`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-6`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-7`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-8`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta16_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta17", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta17_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta18", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta18_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta19", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta19_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta20", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta21", "campos" => ["idIns", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta21_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta22", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-1`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-2`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-2_2021`", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta22_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta23_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]],
        ["tabla" => "tbl_pregunta28_2021", "campos" => ["idInstitucion", "nombreInstitucion", "Anio"]]
    ];

    $respuesta = AdminModel::elminarDependencia($idDependencia, $anioDependencia, $tablasAll, $tablaHistorial, $tipoDeEliminacion);
    echo json_encode($respuesta);
} else if ($tipoPeticion == "activarCuestionarioDependencia") {
    $idDependencia = $data['idDependencia'];
    $nombreDependencia = $data['nombreDependencia'];
    $anioDependencia = $data['anioDependencia'];

    $respuesta = AdminModel::activarCuestionario($idDependencia, $nombreDependencia, $anioDependencia);

    echo json_encode($respuesta);
} else if ($tipoPeticion == "listarReportes") {
    echo json_encode(AdminModel::listarReportes($data['anioDependencia']));
} else if ($tipoPeticion == 'nombreInstitucion') {
    echo json_encode(AdminModel::nombreInstitucion($data['idInstitucion'], $data['anioInstitucion']));
} else if ($tipoPeticion == "obtenerTituloDependencia"){
    echo json_encode(AdminModel::obtenerTituloDependencia($data['idDependencia'], $data['anioDependencia']));
} else if($tipoPeticion == "obtenerCedulaDependencia"){
    echo json_encode(AdminModel::obtenerCedulaDependencia($data['idDependencia'], $data['anioDependencia']));
}
