<?php
require_once "../models/adminModel.php";

$data = json_decode(file_get_contents('php://input'), true);
$tipoPeticion = $data["tipoPeticion"];

if ($tipoPeticion == "revalidarDependenciasAnuales") {
    $tablas = [
        "altas_instituciones",
        "tbl_instituciones",
        "tbl_pregunta2",
        "tbl_pregunta4",
        "tbl_pregunta5",
        "tbl_pregunta6",
        "tbl_pregunta7",
        "tbl_pregunta8",
        "tbl_pregunta9",
        "`tbl_pregunta9-1`",
        "`tbl_pregunta9-2`",
        "`tbl_preguntas9-3`",
        "`tbl_pregunta9-4`",
        "tbl_pregunta10",
        "tbl_pregunta11",
        "tbl_pregunta15",
        "tbl_pregunta16",
        "`tbl_pregunta16-1`",
        "`tbl_pregunta16-2`",
        "`tbl_pregunta16-3`",
        "`tbl_pregunta16-4`",
        "`tbl_pregunta16-5`",
        "`tbl_pregunta16-6`",
        "`tbl_pregunta16-7`",
        "`tbl_pregunta16-8`",
        "tbl_pregunta17",
        "tbl_pregunta18",
        "tbl_pregunta19",
        "tbl_pregunta20",
        "tbl_pregunta21",
        "tbl_pregunta22",
        "`tbl_pregunta22-1`",
        "`tbl_pregunta22-2`"
    ]; # 29 tablas hasta 2020

    $resultado = AdminModel::revalidarDependenciasAnuales($tablas);
    echo $resultado;
} else if ($tipoPeticion == "leerListaDependencias") {
    $dependencias = AdminModel::leerListaDependencias();
    echo json_encode($dependencias);
} else if ($tipoPeticion == "editarDependencia") {
    $idDependencia = $data['idDependencia'];
    $idDependenciaOriginal = $data['idDependenciaOriginal'];
    $anioDependencia = $data['anioDependencia'];
    $anioDependenciaOriginal = $data['anioDependenciaOriginal'];
    $nombreDependencia = $data['nombreDependencia'];
    $nombreDependenciaOriginal = $data['nombreDependenciaOriginal'];
    $clasificacion = $data['clasificacion'];
    $clasificacionOriginal = $data['clasificacionOriginal'];
    $tablas = [
        ["tabla" => "altas_instituciones", "campos" => ["Clave", "Institucion", "anio"]],
        ["tabla" => "tbl_instituciones", "campos" => ["id", "nombre", "anio"]],
        ["tabla" => "tbl_pregunta2", "campos" => ["id_intu", "nombre_intu", "anio"]],
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
        ["tabla" => "tbl_pregunta10", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta11", "campos" => ["id_institu", "institucion", "anio"]],
        ["tabla" => "tbl_pregunta15", "campos" => ["idInst", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta16", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-1`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-2`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-3`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-4`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-5`", "campos" => ["idIsnt", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-6`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-7`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta16-8`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta17", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta18", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta19", "campos" => ["idIns", "nombreIns", "anio"]],
        ["tabla" => "tbl_pregunta20", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta21", "campos" => ["idIns", "nombreInst", "anio"]],
        ["tabla" => "tbl_pregunta22", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-1`", "campos" => ["idInst", "nombreInst", "anio"]],
        ["tabla" => "`tbl_pregunta22-2`", "campos" => ["idInst", "nombreInst", "anio"]]
    ];

    if ($idDependencia != $idDependenciaOriginal || $anioDependencia != $anioDependenciaOriginal) {
        $idExistente = AdminModel::verificarIdExistente($idDependencia, $anioDependencia);

        if ($idExistente != 0) {
            if (count($idExistente) == 0) {
                $resultado = AdminModel::editarDependencia($idDependencia, $idDependenciaOriginal, $anioDependencia, $anioDependenciaOriginal, $nombreDependencia, $nombreDependenciaOriginal, $clasificacion, $clasificacionOriginal, $tablas);
                echo $resultado;
            } else {
                echo "alert|La clave <u>" . $idExistente[0]['idDependencia'] . "</u> ya existe en el año <u>" . $idExistente[0]['anioDependencia'] . "</u> y le pertenece a <u>" . $idExistente[0]['nombreDependencia'] . "</u>.";
            }
        } else {
            echo "error|Imposible verificar si el nuevo ID existe !";
        }
    } else {
        $resultado = AdminModel::editarDependencia($idDependencia, $idDependenciaOriginal, $anioDependencia, $anioDependenciaOriginal, $nombreDependencia, $nombreDependenciaOriginal, $clasificacion, $clasificacionOriginal, $tablas);
        echo $resultado;
    }
} else if ($tipoPeticion == "listarUsuarios") {
    $listarUsuarios = AdminModel::listarUsuarios();
    json_encode($listarUsuarios);
} else if ($tipoPeticion == "listarDependencias") {
    $anio = $data['anioDependencia'];
    $listarDependencias = AdminModel::listarDependencias($anio);
    json_encode($listarDependencias);
} else if ($tipoPeticion == "listarResultados") {
    $anio = $data['anioDependencia'];
    $listarResultados = AdminModel::listarResultados($anio);
    json_encode($listarResultados);
} else if ($tipoPeticion == "obtenerDependencias"){
    $clasificacion = $data['clasificacion'];
    $obtenerDependencias = AdminModel::obtenerDependencias($clasificacion);
    echo json_encode($obtenerDependencias);
}