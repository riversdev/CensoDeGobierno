<?php
require_once "connectionModel.php";

class Questionary
{

    public static function getTitular($idMismoTitular, $anioInstitucion, $sexo, $edad, $ingresos, $nivelEscolaridad, $estatusEscolaridad, $empleoAnterior, $antiguedadServicio, $antiguedadCargo, $pertenenciaIndigena, $condicionDiscapacidad, $formaDesignacion)
    {
        try {

            $SQL =
                "SELECT
                    a.sexo AS sexo,
                    a.edad AS edad,
                    a.rangoMensu AS rangoIngresos,
                    a.grad AS nivelEscolaridad,
                    a.stats AS estatus,
                    a.especialidad AS especialidad,
                    a.empreoAnter AS empleoAnterior,
                    a.antigueda AS antiguedad,
                    a.antigueda2 as antigueda2,
                    a.puebloIndigena as puebloIndigena,
                    a.discapacidad as discapacidad,
                    a.designacion AS formaDesignacion
            FROM tbl_pregunta2 AS a
            WHERE a.id_intu=$idMismoTitular AND a.anio = $anioInstitucion";
            $stmt = Connection::connect()->prepare($SQL);
            if ($stmt->execute()) {
                $row = $stmt->fetchAll();
                if (count($row) == 0) {
                    return ["error", "Clave no encontrada!"];
                } else {
                    if ($sexo == $row[0]['sexo'] && $edad == $row[0]['edad'] && $ingresos == $row[0]['rangoIngresos'] && $nivelEscolaridad == $row[0]['nivelEscolaridad'] && $estatusEscolaridad == $row[0]['estatus'] && $empleoAnterior == $row[0]['empleoAnterior'] && $antiguedadServicio == $row[0]['antiguedad'] && $antiguedadCargo == $row[0]['antigueda2'] && $pertenenciaIndigena == $row[0]['puebloIndigena'] && $condicionDiscapacidad == $row[0]['discapacidad'] && $formaDesignacion == $row[0]['formaDesignacion']) {
                        return ["success", true];
                    } else {
                        return ["success", false];
                    }
                }
            } else {
                return ["error", "Algo salio mal :("];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion1($idInstitucion, $nombreInstitucion, $clasificacionInstitucion, $tipoInstitucion, $funcionPrincipal, $funcionSecUno, $funcionSecDos, $funcionSecTres, $funcionSecCuatro, $funcionSecCinco, $funcionPrincipalEspecifica, $funcionSecUnoEspecifica, $funcionSecDosEspecifica, $funcionSecTresEspecifica, $funcionSecCuatroEspecifica, $funcionSecCincoEspecifica, $comentarioGeneral, $Status, $Anio)
    {
        # try catch para atrapar todo error posible
        try {
            #Variable donde se guardan las funciones especificas
            $comentarios = "";
            #contador
            #no se usa
            $array = array();
            #validar funciones especificas
            if ($funcionPrincipalEspecifica != "") {
                $array[] = "Función principal: " . $funcionPrincipalEspecifica;
            }
            if ($funcionSecUnoEspecifica != "") {
                $array[] = "Función secundaria 1: " . $funcionSecUnoEspecifica;
            }
            if ($funcionSecDosEspecifica != "") {
                $array[] = "Función secundaria 2: " . $funcionSecDosEspecifica;
            }
            if ($funcionSecTresEspecifica != "") {
                $array[] = "Función secundaria 3: " . $funcionSecTresEspecifica;
            }
            if ($funcionSecCuatroEspecifica != "") {
                $array[] = "Función secundaria 4: " . $funcionSecCuatroEspecifica;
            }
            if ($funcionSecCincoEspecifica != "") {
                $array[] = "Función secundaria 5: " . $funcionSecCincoEspecifica;
            }
            #Array que concatena con coma y punto al final
            foreach ($array as $value) {
                $comentarios .= $value . ", ";
            }
            $comentarios = substr($comentarios, 0, -2);
            $comentarios .= ".";

            # Consulta SQL
            $insertPregunta1 =
                "UPDATE tbl_instituciones
            SET tipoInstitucion = '" . $tipoInstitucion . "', 
                funcionPr = '" . $funcionPrincipal . "', 
                secUno = '" . $funcionSecUno . "',
                secDos='" . $funcionSecDos . "', 
                sectres = '" . $funcionSecTres . "', 
                secCuatro = '" . $funcionSecCuatro . "', 
                secCinco = '" . $funcionSecCinco . "', 
                comen2 = '" . $comentarios . "', 
                comentarios = '" . $comentarioGeneral . "', 
                `Status`= '" . $Status . "'
            WHERE id = '" . $idInstitucion . "' and anio = '" . $Anio . "'";
            #Se hace la consulta preparada
            $stmt = Connection::connect()->prepare($insertPregunta1);
            # Valida si fue exitosa
            $cont = 0;
            if ($stmt->execute()) {

                # Pregunta 14
                $borrarPregunta14 =
                    "DELETE FROM tbl_pregunta14_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                $stmt11 = Connection::connect()->prepare($borrarPregunta14);
                if ($stmt11->execute()) {
                    $cont = $cont + 1;
                } else {
                    return ["error", "borra pregunta 14"];
                }

                # Pregunta 15
                $borrarPregunta15 =
                    "DELETE FROM `tbl_preguntas9-3`
                        WHERE
                        id_institu = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                $stmt12 = Connection::connect()->prepare($borrarPregunta15);
                if ($stmt12->execute()) {
                    $cont = $cont + 1;
                } else {
                    return ["error", "borra pregunta 15"];
                }

                # PREGUNTA 25
                $borrarPregunta25 =
                    "DELETE FROM `tbl_pregunta16-1`
                 WHERE 
                 idIsnt = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                $stmt2 = Connection::connect()->prepare($borrarPregunta25);
                if ($stmt2->execute()) {
                    $cont = $cont + 1;
                } else {
                    return ["error", "Error al borrar la pregunta 25"];
                }

                # PREGUNTA 26
                $borrarPregunta26 =
                    "DELETE FROM `tbl_pregunta16-2_2021`
                 WHERE 
                 idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";

                $stmt3 = Connection::connect()->prepare($borrarPregunta26);
                if ($stmt3->execute()) {
                    $cont = $cont + 1;
                } else {
                    return ["error", "Error al borrar la pregunta 26"];
                }

                # PREGUNTA 27
                $borrarPregunta27 =
                    "DELETE FROM  `tbl_pregunta16-3`
                 WHERE 
                 idIsnt = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                $stmt4 = Connection::connect()->prepare($borrarPregunta27);
                if ($stmt4->execute()) {
                    $cont = $cont + 1;
                } else {
                    return ["error", "Error al borrar la pregunta 27"];
                }

                # PREGUNTA 28
                $borrarPregunta28 =
                    "DELETE FROM  `tbl_pregunta16-6`
                 WHERE 
                 idInst = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                $stmt5 = Connection::connect()->prepare($borrarPregunta28);
                if ($stmt5->execute()) {
                    $cont = $cont + 1;
                } else {
                    return ["error", "Error al borrar la pregunta 28"];
                }

                # PREGUNTA 29
                $borrarPregunta29 =
                    "DELETE FROM `tbl_pregunta16-7`
              WHERE 
              idInst = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                $stmt6 = Connection::connect()->prepare($borrarPregunta29);
                if ($stmt6->execute()) {
                    $cont = $cont + 1;
                } else {
                    return ["error", "Error al borrar la pregunta 29"];
                }

                # PREGUNTA 30
                $borrarPregunta30 =
                    "DELETE FROM  `tbl_pregunta28_2021`
              WHERE 
              idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";

                $stmt7 = Connection::connect()->prepare($borrarPregunta30);
                if ($stmt7->execute()) {
                    $cont = $cont + 1;
                } else {
                    return ["error", "Error al borrar la pregunta 30"];
                }

                # PREGUNTA 34
                $borrarPregunta34 =
                    "DELETE FROM `tbl_pregunta22-1`
                 WHERE 
                 idInst = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                $stmt34 = Connection::connect()->prepare($borrarPregunta34);
                if ($stmt34->execute()) {
                    $cont++;
                } else {
                    return ["error", "Error al borrar la pregunta 34"];
                }

                # PREGUNTA 35
                $borrarPregunta35 =
                    "DELETE FROM `tbl_pregunta22-2_2021`
                 WHERE 
                 idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";

                $stmt35 = Connection::connect()->prepare($borrarPregunta35);
                if ($stmt35->execute()) {
                    $cont++;
                } else {
                    return ["error", "Error al borrar la pregunta 35"];
                }

                if ($cont == 10) {
                    return ["success", "Pregunta 1 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos"];
                }

                # Si fallo
            } else {
                return ["error", "Error al guardar los datos"];
            }
            #Deteccion y impresion de errores SQL en consola
        } catch (Exception $e) {
            return ["warning", "Error SQL " . $e];
        }
    }
    public static function verificarPreguntas($query)
    {
        try {
            $stmt = Connection::connect()->prepare($query);
            if ($stmt->execute()) {
                return $stmt->fetchAll();
            } else {
                return "Algo salio mal! :(";
            }
        } catch (Exception $e) {
            return "ERROR SQL " . $e;
        }
    }
    public static function obtenerConteoDependencia($idInstitucion, $nombreInstitucion, $clasificacionInstitucion, $Anio)
    {
        try {
            if ($clasificacionInstitucion == 1) {
                $dependenciaUno = "SELECT *FROM tbl_instituciones 
                Where id = '" . $idInstitucion . "' and anio = '" . $Anio . "'";
                $stmt = Connection::connect()->prepare($dependenciaUno);
                if ($stmt->execute()) {
                    while ($datos = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $hombresUno = $datos['totalh1'];
                        $mujeresUno = $datos['toatlm1'];
                    }
                    return ["success", $hombresUno, $mujeresUno];
                } else {
                    return ["error", "Algo salio mal :("];
                }
            } else if ($clasificacionInstitucion == 2) {
                $dependenciaDos = "SELECT *FROM tbl_instituciones 
                WHERE id = '" . $idInstitucion . "' and anio = '" . $Anio . "'";
                $stmt = Connection::connect()->prepare($dependenciaDos);
                if ($stmt->execute()) {
                    while ($datos = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $hombresDos = $datos['totalh2'];
                        $mujeresDos = $datos['totalm2'];
                    }
                    return ["success", $hombresDos, $mujeresDos];
                }
            } else {
                return ["error", "Algo salio mal :("];
            }
        } catch (Exception $e) {

            return ["warning", "SQL ERROR " . $e];
        }
    }
    public static function obtenerConteoPersonalIndigena($idInstitucion, $nombreInstitucion, $anioInstitucion)
    {
        try {
            $preguntarConteo =
                "SELECT *FROM tbl_pregunta10_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarConteo);
            if ($stmt->execute()) {
                while ($datos = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $hombresIndigenas = $datos['puebloIndigenaH'];
                    $mujeresIndigenas = $datos['puebloIndigenaM'];
                }
                return ["success", $hombresIndigenas, $mujeresIndigenas];
            } else {
                return ["error", "Algo salio mal :("];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function obtenerConteoPersonalDispacacitado($idInstitucion, $anioInstitucion)
    {
        try {
            $obtenerConteoPersonalDiscapacitado =
                "SELECT *FROM tbl_pregunta12_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($obtenerConteoPersonalDiscapacitado);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $totalHombres = $row['discapacidadH'];
                    $totalMujeres = $row['discapacidadM'];
                }
                return ["success", $totalHombres, $totalMujeres];
            } else {
                return ["error", "Algo salio mal"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function contieneEducacion($idInstitucion, $anioInstitucion)
    {
        try {
            $contieneEducacion =
                "SELECT *FROM tbl_instituciones
                 WHERE id = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($contieneEducacion);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $funcionPrincipal = $row['funcionPr'];
                    $funcionSecundaria1 = $row['secUno'];
                    $funcionSecundaria2 = $row['secDos'];
                    $funcionSecundaria3 = $row['secTres'];
                    $funcionSecundaria4 = $row['secCuatro'];
                    $funcionSecundaria5 = $row['secCinco'];
                }

                if ($funcionPrincipal == 14 || $funcionSecundaria1 == 14 || $funcionSecundaria2 == 14 || $funcionSecundaria3 == 14 || $funcionSecundaria4 == 14 || $funcionSecundaria5 == 14) {
                    return ["success", true];
                } else {
                    return ["success", false];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function contieneSalud($idInstitucion, $anioInstitucion)
    {
        try {
            $contieneSalud =
                "SELECT *FROM tbl_instituciones
                WHERE id = '" . $idInstitucion . "' and anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($contieneSalud);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $funcionPrincipal = $row['funcionPr'];
                    $funcionSecundaria1 = $row['secUno'];
                    $funcionSecundaria2 = $row['secDos'];
                    $funcionSecundaria3 = $row['secTres'];
                    $funcionSecundaria4 = $row['secCuatro'];
                    $funcionSecundaria5 = $row['secCinco'];
                }

                if ($funcionPrincipal == 23 || $funcionSecundaria1 == 23 || $funcionSecundaria2 == 23 || $funcionSecundaria3 == 23 || $funcionSecundaria4 == 23 || $funcionSecundaria5 == 23) {
                    return ["success", true];
                } else {
                    return ["success", false];
                }
            }
        } catch (Exception $e) {
        }
    }
    public static function contieneDeporte($idInstitucion, $anioInstitucion)
    {
        try {
            $contieneDeporte =
                "SELECT *FROM tbl_instituciones
                WHERE id = '" . $idInstitucion . "' and anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($contieneDeporte);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $funcionPrincipal = $row['funcionPr'];
                    $funcionSecundaria1 = $row['secUno'];
                    $funcionSecundaria2 = $row['secDos'];
                    $funcionSecundaria3 = $row['secTres'];
                    $funcionSecundaria4 = $row['secCuatro'];
                    $funcionSecundaria5 = $row['secCinco'];
                }

                if ($funcionPrincipal == 9 || $funcionSecundaria1 == 9 || $funcionSecundaria2 == 9 || $funcionSecundaria3 == 9 || $funcionSecundaria4 == 9 || $funcionSecundaria5 == 9) {
                    return ["success", true];
                } else {
                    return ["success", false];
                }
            }
        } catch (Exception $e) {
        }
    }
    public static function contieneElementos($idInstitucion, $anioInstitucion)
    {
        try {
            $contabaConelementos =
                "SELECT * 
                FROM tbl_pregunta16_2021 
                WHERE idInstitucion = '" . $idInstitucion . "'
                    AND Anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($contabaConelementos);

            if ($stmt->execute()) {
                $respuesta = $stmt->fetchAll();

                if (count($respuesta) == 0) {
                    return ["success", "noContestada"];
                } else {
                    if ($respuesta[0]['Valor'] == "1") {
                        return ["success", true];
                    } else if ($respuesta[0]['Valor'] == "2" || $respuesta[0]['Valor'] == "9") {
                        return ["success", false];
                    }
                }
            } else {
                return ["error", "Intentelo denuevo"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function conteoTotalInmuebles($idInstitucion, $anioInstitucion)
    {
        try {
            $obtenerConteo =
                "SELECT *FROM tbl_pregunta16
                WHERE
                idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($obtenerConteo);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $totalPropios = $row['propios'];
                    $totalRentados = $row['retados'];
                    $totalOtros = $row['otro'];
                }
                return ["success", $totalPropios, $totalRentados, $totalOtros];
            } else {
                return ["error", "Algo salio mal :("];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL $e"];
        }
    }
    public static function conteoEquipoInformatico($idInstitucion, $anioInstitucion)
    {
        try {
            $obtenerConteoInformatico =
                "SELECT *FROM tbl_pregunta22
                WHERE
                idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($obtenerConteoInformatico);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $totalComputadoras = $row['totalC'];
                    $totalImpresoras = $row['totalI'];
                    $Multifuncionales = $row['multifuncionales'];
                    $Servidores = $row['servidores'];
                    $Tabletas = $row['tabletas'];
                }
                return ["success", $totalComputadoras, $totalImpresoras, $Multifuncionales, $Servidores, $Tabletas];
            } else {
                return ["error", "Algo salio mal!"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function contieneEducacionPrincipal($idInstitucion, $anioInstitucion)
    {
        try {
            $contieneEducacionPrincipal =
                "SELECT *FROM tbl_instituciones
                WHERE
                id = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($contieneEducacionPrincipal);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $contieneOno = $row['funcionPr'];
                }
                if ($contieneOno == 14) {
                    return ["success", true];
                } else {
                    return ["success", false];
                }
            } else {
                return ["error", "Error algo salio mal"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function contieneSaludPrincipal($idInstitucion, $anioInstitucion)
    {
        try {
            $contieneSaludPrincipal =
                "SELECT *FROM tbl_instituciones
                WHERE
                id = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($contieneSaludPrincipal);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $contieneOno = $row['funcionPr'];
                }
                if ($contieneOno == 23) {
                    return ["success", true];
                } else {
                    return ["success", false];
                }
            } else {
                return ["error", "Error algo salio mal"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function ContieneDeportePrincipal($idInstitucion, $anioInstitucion)
    {
        try {
            $contieneDeportePrincipal =
                "SELECT *FROM tbl_instituciones
                WHERE
                id = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($contieneDeportePrincipal);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $contieneOno = $row['funcionPr'];
                }
                if ($contieneOno == 9) {
                    return ["success", true];
                } else {
                    return ["success", false];
                }
            } else {
                return ["error", "Error algo salio mal"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function seContabilizoEducacion($idInstitucion, $anioInstitucion)
    {
        try {
            $seConto = "SELECT * FROM `tbl_pregunta16-1` WHERE idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($seConto);

            if ($stmt->execute()) {
                $respuesta = $stmt->fetchAll();

                if (count($respuesta) == 0) {
                    return ["success", "noContestada"];
                } else {
                    if ($respuesta[0]['opcion1'] == "1") {
                        return ["success", true];
                    } else if ($respuesta[0]['opcion1'] == "2" || $respuesta[0]['opcion1'] == "9") {
                        return ["success", false];
                    }
                }
            } else {
                return ["error", "Intentelo denuevo"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function seContabilizoSalud($idInstitucion, $anioInstitucion)
    {
        try {
            $seConto = "SELECT * FROM `tbl_pregunta16-3` WHERE idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($seConto);

            if ($stmt->execute()) {
                $respuesta = $stmt->fetchAll();

                if (count($respuesta) == 0) {
                    return ["success", "noContestada"];
                } else {
                    if ($respuesta[0]['opcion1'] == "1") {
                        return ["success", true];
                    } else if ($respuesta[0]['opcion1'] == "2" || $respuesta[0]['opcion1'] == "9") {
                        return ["success", false];
                    }
                }
            } else {
                return ["error", "Intentelo denuevo"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function seContabilizoDeporte($idInstitucion, $anioInstitucion)
    {
        try {
            $seConto = "SELECT *FROM `tbl_pregunta16-7` WHERE idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($seConto);

            if ($stmt->execute()) {
                $respuesta = $stmt->fetchAll();

                if (count($respuesta) == 0) {
                    return ["success", "noContestada"];
                } else {
                    if ($respuesta[0]['opcion1'] == "1") {
                        return ["success", true];
                    } else if ($respuesta[0]['opcion1'] == "2" || $respuesta[0]['opcion1'] == "9") {
                        return ["success", false];
                    }
                }
            } else {
                return ["error", "Intentelo denuevo"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function seContabilizoEquipoInformatico($idInstitucion, $anioInstitucion)
    {
        try {
            $seContoOno = "SELECT *FROM `tbl_pregunta22-1` WHERE idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($seContoOno);

            if ($stmt->execute()) {
                $respuesta = $stmt->fetchAll();

                if (count($respuesta) == 0) {
                    return ["success", "noContestada"];
                } else {
                    if ($respuesta[0]['opcion1'] == "1") {
                        return ["success", true];
                    } else if ($respuesta[0]['opcion1'] == "2" || $respuesta[0]['opcion1'] == "9") {
                        return ["success", false];
                    }
                }
            } else {
                return ["error", "Intentelo denuevo"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion2($idInstitucion, $nombreInstitucion, $unidadGenero, $comentarioGeneral, $Status, $Anio)
    {
        try {
            $preguntarSiExiste = "SELECT *FROM tbl_pregunta2_2021 
            WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $count = $stmt->fetchAll();
            if (count($count)) {

                $updateTablaPregunta2 =
                    "UPDATE tbl_pregunta2_2021 
                        SET 
                        Respuesta = '" . $unidadGenero . "', 
                        comentarios = '" . $comentarioGeneral . "' 
                        WhERE 
                        idInstitucion = '" . $idInstitucion . "' 
                        and Anio = '" . $Anio . "'";
                $stmt = Connection::connect()->prepare($updateTablaPregunta2);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 2 actualizada!"];
                } else {
                    return ["error", "Accion fallida!"];
                }
            } else {

                $insertPregunta2 = "INSERT INTO tbl_pregunta2_2021(
                        idInstitucion, 
                        nombreInstitucion, 
                        Respuesta, 
                        comentarios, 
                        `Status`, 
                        Anio)
                        VALUES
                        (
                            '$idInstitucion', 
                            '$nombreInstitucion', 
                            '$unidadGenero', 
                            '$comentarioGeneral', 
                            '$Status', 
                            '$Anio'
                        )";
                $stmt = Connection::connect()->prepare($insertPregunta2);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 2 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion3($idInstitucion, $nombreInstitucion, $sexoTitular, $edadTitular, $ingresosTitular, $nivEscolaridadTitular, $estatusEscolaridadTitular, $empleoAnteriorTitular, $antiguedadServicioTitular, $antiguedadCargoTitular, $pertenenciaIndigenaTitular, $condicionDescapacidadTitular, $formaDesignacionTitular, $afiliacionPartidistaTitular, $mimsoTitular, $idMismoTitular, $sexoTitularEspecifico, $nivEscolaridadTitularEspecifico, $empleoAnteriorTitularEspecifico, $pertenenciaIndigenaTitularEspecifico, $condicionDiscapacidadTitularEspecifico, $estatusEscolaridadTitularEspecifico, $formaDesignacionTitularEspecifico, $afiliacionPartidistaTitularEspecifica,  $comentarioGeneral, $Status, $Anio, $tituloTitular, $cedulaTitular)
    {
        try {
            #concatenacion para guardar en bd
            $comentarios = "";
            $array = [];

            if ($sexoTitularEspecifico != "") {
                $array[] = "Sexo del titular específico: " . $sexoTitularEspecifico;
            }
            if ($nivEscolaridadTitularEspecifico != "") {
                $array[] = "Nivel de escolaridad del titular específico: " . $nivEscolaridadTitularEspecifico;
            }
            if ($estatusEscolaridadTitularEspecifico != "") {
                $array[] = "Estatus de escolaridad del titular específico: " . $estatusEscolaridadTitularEspecifico;
            }
            if ($formaDesignacionTitularEspecifico != "") {
                $array[] = "Forma de designación del titular específico: " . $formaDesignacionTitularEspecifico;
            }
            if ($empleoAnteriorTitularEspecifico != "") {
                $array[] = "Empleo anterior específico: " . $empleoAnteriorTitularEspecifico;
            }
            if ($pertenenciaIndigenaTitularEspecifico != "") {
                $array[] = "Pertenencia indígena especifica: " . $pertenenciaIndigenaTitularEspecifico;
            }
            if ($condicionDiscapacidadTitularEspecifico != "") {
                $array[] = "Condición discapacidad específica: " . $condicionDiscapacidadTitularEspecifico;
            }
            if ($afiliacionPartidistaTitularEspecifica != "") {
                $array[] = "Afiliación partidista específica: " . $afiliacionPartidistaTitularEspecifica;
            }

            #Guardar con coma y punto al final
            foreach ($array as $value) {
                $comentarios .= $value . ", ";
            }
            $comentarios = substr($comentarios, 0, -2);
            $comentarios .= ".";

            #consultas preparadas
            $preguntarSiExiste = "SELECT *FROM tbl_pregunta2 
            WHERE id_intu = '" . $idInstitucion . "' and anio = '" . $Anio . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador)) {
                $updateTablaPregunta3 =
                    "UPDATE tbl_pregunta2 
                        SET
                        sexo = '" . $sexoTitular . "',
                        edad = '" . $edadTitular . "',
                        rangoMensu = '" . $ingresosTitular . "',
                        grad = '" . $nivEscolaridadTitular . "',
                        stats = '" . $estatusEscolaridadTitular . "',
                        antigueda = '" . $antiguedadServicioTitular . "',
                        antigueda2 = '" . $antiguedadCargoTitular . "',
                        empreoAnter = '" . $empleoAnteriorTitular . "',
                        puebloIndigena = '" . $pertenenciaIndigenaTitular . "',
                        discapacidad = '" . $condicionDescapacidadTitular . "',
                        designacion = '" . $formaDesignacionTitular . "',
                        afiliacionPartidista = '" . $afiliacionPartidistaTitular . "',
                        institular = '" . $idMismoTitular . "',
                        comentariosValidacion = '" . $comentarios . "',
                        comentarios = '" . $comentarioGeneral . "'
                        WHERE
                        id_intu = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta3);
                if ($stmt->execute()) {
                    $cont = 0;

                    #INSERTAR CEDULA
                    $insertarCedula =
                        "UPDATE tbl_pregunta2
                        SET cedula2 = '" . $cedulaTitular . "'
                        WHERE id_intu = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                    $stmt = Connection::connect()->prepare($insertarCedula);
                    if ($stmt->execute()) {
                        $cont++;
                    } else {
                        return ["warning", "error guardar cedula"];
                    }

                    #INSERTAR TITULO
                    $insertarTitulo =
                        "UPDATE tbl_pregunta2
                        SET titulo2 = '" . $tituloTitular . "'
                        WHERE id_intu = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                    $stmt2 = Connection::connect()->prepare($insertarTitulo);
                    if ($stmt2->execute()) {
                        $cont++;
                    } else {
                        return ["warning", "error guardar cedula"];
                    }

                    if ($cont == 2) {
                        return ["success", "Pregunta 3 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["error", "error al guardar pregunta 3!"];
                }
            } else {
                #INSERT
                $insertPregunta3 =
                    "INSERT INTO tbl_pregunta2
                    (
                        id_intu,
                        nombre_intu,
                        sexo,
                        edad,
                        rangoMensu,
                        grad,
                        stats,
                        antigueda,
                        antigueda2,
                        empreoAnter,
                        puebloIndigena,
                        discapacidad,
                        designacion,
                        afiliacionPartidista,
                        institular,
                        comentariosValidacion,
                        comentarios,
                        `Status`,
                        `anio`
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '$sexoTitular', 
                        '$edadTitular', 
                        '$ingresosTitular', 
                        '$nivEscolaridadTitular', 
                        '$estatusEscolaridadTitular', 
                        '$antiguedadServicioTitular', 
                        '$antiguedadCargoTitular', 
                        '$empleoAnteriorTitular', 
                        '$pertenenciaIndigenaTitular', 
                        '$condicionDescapacidadTitular', 
                        '$formaDesignacionTitular', 
                        '$afiliacionPartidistaTitular', 
                        '$idMismoTitular',
                        '$comentarios',
                        '$comentarioGeneral',
                        '$Status',
                        '$Anio'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta3);
                if ($stmt->execute()) {
                    $existir =
                        "SELECT *FROM tbl_pregunta2
                        WHERE
                        id_intu = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                    $stmt = Connection::connect()->prepare($existir);
                    $stmt->execute();
                    $co = $stmt->fetchAll();
                    if (count($co) > 0) {
                        $cont = 0;
                        #INSERTAR CEDULA
                        $insertarCedula =
                            "UPDATE tbl_pregunta2
                            SET cedula2 = '" . $cedulaTitular . "'
                            WHERE id_intu = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                        $stmt = Connection::connect()->prepare($insertarCedula);
                        if ($stmt->execute()) {
                            $cont++;
                        } else {
                            return ["warning", "error guardar cedula"];
                        }

                        #INSERTAR TITULO
                        $insertarTitulo =
                            "UPDATE tbl_pregunta2
                            SET titulo2 = '" . $tituloTitular . "'
                            WHERE id_intu = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";

                        $stmt2 = Connection::connect()->prepare($insertarTitulo);
                        if ($stmt2->execute()) {
                            $cont++;
                        } else {
                            return ["warning", "error guardar cedula"];
                        }


                        if ($cont == 2) {
                            return ["success", "Pregunta 3 guardada!"];
                        } else {
                            return ["error", "Error al guardar datos!"];
                        }
                    } else {
                        return ["error", "no sirve tu algoritmo!"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "SQL ERROR " . $e];
        }
    }
    public static function insertQuestion4($idInstitucion, $nombreInstitucion, $clasificacionInstitucion, $totalPersonal, $totalHombres, $totalMujeres, $comentarioGeneral, $Status, $Anio)
    {
        try {
            if ($clasificacionInstitucion == 1) {
                $updateTablaPregunta4 =
                    "UPDATE tbl_instituciones 
                    SET 
                    totalh1 = '" . $totalHombres . "', 
                    toatlm1 = '" . $totalMujeres . "', 
                    comentarios2='" . $comentarioGeneral . "'
                    WHERE id= '" . $idInstitucion . "' and anio = '" . $Anio . "' and clasificacionAd = '" . $clasificacionInstitucion . "'";
                # No funciono
                /*$InsertTablaRespaldo = "INSERT INTO tbl_pregunta9 (id_intitu, institucion, hombre, mujer, total, `Status`, anio)
                VALUES('$idInstitucion', '$nombreInstitucion', '$totalHombres', '$totalMujeres', '$totalPersonal', '$Status', '$Anio')";*/
                $stmt = Connection::connect()->prepare($updateTablaPregunta4);
                /*$stmt2 = Connection::connect()->prepare($InsertTablaRespaldo);*/
                $cont = 0;
                if ($stmt->execute()) {
                    # PREGUNTA 5
                    $borrarPregunta5 =
                        "DELETE FROM tbl_pregunta4
                        WHERE
                        id_inst = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt2 = Connection::connect()->prepare($borrarPregunta5);
                    if ($stmt2->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 5"];
                    }

                    # PREGUNTA 6
                    $borrarPregunta6 =
                        "DELETE FROM tbl_pregunta5
                        WHERE
                        idIns = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt3 = Connection::connect()->prepare($borrarPregunta6);
                    if ($stmt3->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 6"];
                    }

                    # PREGUNTA 7
                    $borrarPregunta7 =
                        "DELETE FROM tbl_pregunta6
                        WHERE
                        id_inti = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt4 = Connection::connect()->prepare($borrarPregunta7);
                    if ($stmt4->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 7"];
                    }

                    # PREGUNTA 8
                    $borrarPregunta8 =
                        "DELETE FROM tbl_pregunta7
                        WHERE
                        idIns = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt5 = Connection::connect()->prepare($borrarPregunta8);
                    if ($stmt5->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 8"];
                    }

                    # PREGUNTA 9
                    $borrarPregunta9 =
                        "DELETE FROM tbl_pregunta9_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt6 = Connection::connect()->prepare($borrarPregunta9);
                    if ($stmt6->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 9"];
                    }

                    # PREGUNTA 10
                    $borrarPregunta10 =
                        "DELETE FROM tbl_pregunta10_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt7 = Connection::connect()->prepare($borrarPregunta10);
                    if ($stmt7->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 10"];
                    }

                    # PREGUNTA 11
                    $borrarPregunta11 =
                        "DELETE FROM tbl_pregunta11_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt8 = Connection::connect()->prepare($borrarPregunta11);
                    if ($stmt8->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 11"];
                    }

                    # Pregunta 12
                    $borrarPregunta12 =
                        "DELETE FROM tbl_pregunta12_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt9 = Connection::connect()->prepare($borrarPregunta12);
                    if ($stmt9->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 12"];
                    }

                    # Pregunta 13
                    $borrarPregunta13 =
                        "DELETE FROM tbl_pregunta13_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt10 = Connection::connect()->prepare($borrarPregunta13);
                    if ($stmt10->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 13"];
                    }

                    # Pregunta 14
                    $borrarPregunta14 =
                        "DELETE FROM tbl_pregunta14_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt11 = Connection::connect()->prepare($borrarPregunta14);
                    if ($stmt11->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 14"];
                    }

                    # Pregunta 15
                    $borrarPregunta15 =
                        "DELETE FROM `tbl_preguntas9-3`
                        WHERE
                        id_institu = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt12 = Connection::connect()->prepare($borrarPregunta15);
                    if ($stmt12->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 15"];
                    }

                    #PREGUNTA 19
                    $borrarPregunta19 =
                        "DELETE FROM `tbl_pregunta19_2021`
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt13 = Connection::connect()->prepare($borrarPregunta19);
                    if ($stmt13->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 15"];
                    }

                    if ($cont == 12) {
                        return ["success", "Pregunta 4 guardada!"];
                    } else {
                        return ["error", "Error preguntas"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else if ($clasificacionInstitucion == 2) {
                $updateTablaPregunta4 =
                    "UPDATE tbl_instituciones 
                    SET 
                    totalh2 = '" . $totalHombres . "', 
                    totalm2 = '" . $totalMujeres . "', 
                    comentarios2='" . $comentarioGeneral . "'
                    WHERE id= '" . $idInstitucion . "' and anio = '" . $Anio . "' and clasificacionAd = '" . $clasificacionInstitucion . "'";
                #No funciono
                /*$InsertTablaRespaldo = "INSERT INTO tbl_pregunta9 (id_intitu, institucion, hombre, mujer, total, `Status`, anio)
                VALUES('$idInstitucion', '$nombreInstitucion', '$totalHombres', '$totalMujeres', '$totalPersonal', '$Status', '$Anio')";*/
                $stmt = Connection::connect()->prepare($updateTablaPregunta4);
                /*$stmt2 = Connection::connect()->prepare($InsertTablaRespaldo);*/
                $cont = 0;
                if ($stmt->execute()) {
                    # PREGUNTA 5
                    $borrarPregunta5 =
                        "DELETE FROM tbl_pregunta4
                        WHERE
                        id_inst = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt2 = Connection::connect()->prepare($borrarPregunta5);
                    if ($stmt2->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 5"];
                    }

                    # PREGUNTA 6
                    $borrarPregunta6 =
                        "DELETE FROM tbl_pregunta5
                        WHERE
                        idIns = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt3 = Connection::connect()->prepare($borrarPregunta6);
                    if ($stmt3->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 6"];
                    }

                    # PREGUNTA 7
                    $borrarPregunta7 =
                        "DELETE FROM tbl_pregunta6
                        WHERE
                        id_inti = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt4 = Connection::connect()->prepare($borrarPregunta7);
                    if ($stmt4->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 7"];
                    }

                    # PREGUNTA 8
                    $borrarPregunta8 =
                        "DELETE FROM tbl_pregunta7
                        WHERE
                        idIns = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt5 = Connection::connect()->prepare($borrarPregunta8);
                    if ($stmt5->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 8"];
                    }

                    # PREGUNTA 9
                    $borrarPregunta9 =
                        "DELETE FROM tbl_pregunta9_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt6 = Connection::connect()->prepare($borrarPregunta9);
                    if ($stmt6->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 9"];
                    }

                    # PREGUNTA 10
                    $borrarPregunta10 =
                        "DELETE FROM tbl_pregunta10_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt7 = Connection::connect()->prepare($borrarPregunta10);
                    if ($stmt7->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 10"];
                    }

                    # PREGUNTA 11
                    $borrarPregunta11 =
                        "DELETE FROM tbl_pregunta11_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt8 = Connection::connect()->prepare($borrarPregunta11);
                    if ($stmt8->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 11"];
                    }

                    # Pregunta 12
                    $borrarPregunta12 =
                        "DELETE FROM tbl_pregunta12_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt9 = Connection::connect()->prepare($borrarPregunta12);
                    if ($stmt9->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 12"];
                    }

                    # Pregunta 13
                    $borrarPregunta13 =
                        "DELETE FROM tbl_pregunta13_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt10 = Connection::connect()->prepare($borrarPregunta13);
                    if ($stmt10->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 13"];
                    }

                    # Pregunta 14
                    $borrarPregunta14 =
                        "DELETE FROM tbl_pregunta14_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt11 = Connection::connect()->prepare($borrarPregunta14);
                    if ($stmt11->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 14"];
                    }

                    # Pregunta 15
                    $borrarPregunta15 =
                        "DELETE FROM `tbl_preguntas9-3`
                        WHERE
                        id_institu = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                    $stmt12 = Connection::connect()->prepare($borrarPregunta15);
                    if ($stmt12->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 15"];
                    }

                    #PREGUNTA 19
                    $borrarPregunta19 =
                        "DELETE FROM `tbl_pregunta19_2021`
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";
                    $stmt13 = Connection::connect()->prepare($borrarPregunta19);
                    if ($stmt13->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "borra pregunta 15"];
                    }

                    #PREGUNTA COMPLEMENTO

                    $borrarComplemento =
                        "DELETE FROM tbl_complemento_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $Anio . "'";

                    $stmt14 = Connection::connect()->prepare($borrarComplemento);
                    if ($stmt14->execute()) {
                        $cont++;
                    } else {
                        return ["error", "borra pregunta complemento"];
                    }

                    if ($cont == 13) {
                        return ["success", "Pregunta 4 guardada!"];
                    } else {
                        return ["error", "Error preguntas"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                return ["warning", "Clasificacion no identificada revisar!"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion5($idInstitucion, $nombreInstitucion, $totalHombresConfianza, $totalMujeresConfianza, $totalHombresBase, $totalMujeresBase, $totalHombresEventual, $totalMujeresEventual, $totalHombresHonorarios, $totalMujeresHonorarios, $totalHombresOtro, $totalMujeresOtro, $otroEspecifico, $comentarioGeneral, $Status, $Anio, $totalPersonal, $totalHombres, $totalMujeres)
    {
        try {

            $comentarios = "";
            if ($otroEspecifico != "") {
                $comentarios = $comentarios . "Contratación especifico: " . $otroEspecifico;
            }
            $validarSiExiste = "SELECT * FROM tbl_pregunta4 
            WHERE id_inst = '" . $idInstitucion . "' and anio = '" . $Anio . "'";
            $stmt = Connection::connect()->prepare($validarSiExiste);
            $stmt->execute();
            $count = $stmt->fetchAll();
            if (count($count) > 0) {
                $updateTablaPregunta5 =
                    "UPDATE tbl_pregunta4
                     SET 
                     confianzah = '" . $totalHombresConfianza . "', 
                     confianzam = '" . $totalMujeresConfianza . "', 
                     baseh = '" . $totalHombresBase . "', 
                     basem = '" . $totalMujeresBase . "', 
                     eventualh = '" . $totalHombresEventual . "', 
                     eventualm = '" . $totalMujeresEventual . "', 
                     honorariosh = '" . $totalHombresHonorarios . "', 
                     honorariosm = '" . $totalMujeresHonorarios . "', 
                     otroh = '" . $totalHombresOtro . "', 
                     otrom = '" . $totalMujeresOtro . "',
                     totalHombres = '" . $totalHombres . "',
                     totalMujeres = '" . $totalMujeres . "',
                     totalPersonal = '" . $totalPersonal . "',
                     comentariosValidacion = '" . $comentarios . "', 
                     comentarios = '" . $comentarioGeneral . "', 
                     `Status` = '" . $Status . "', 
                     anio = '" . $Anio . "'
                    WHERE id_inst = '" . $idInstitucion . "' and anio = '" . $Anio . "'";
                $stmt = Connection::connect()->prepare($updateTablaPregunta5);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 5 actualizada!"];
                } else {
                    return ["error", "error al guardar los datos"];
                }
            } else {
                $insertPregunta5 = "INSERT INTO tbl_pregunta4 
                (
                    id_inst, 
                    nombre_inst, 
                    confianzah, 
                    confianzam, 
                    baseh, basem, 
                    eventualh, 
                    eventualm, 
                    honorariosh, 
                    honorariosm, 
                    otroh, 
                    otrom,
                    totalHombres,
                    totalMujeres,
                    totalPersonal,
                    comentariosValidacion, 
                    comentarios, 
                    `Status`, 
                    anio
                )
                VALUES
                (
                    '$idInstitucion', 
                    '$nombreInstitucion', 
                    '$totalHombresConfianza', 
                    '$totalMujeresConfianza', 
                    '$totalHombresBase', 
                    '$totalMujeresBase', 
                    '$totalHombresEventual', 
                    '$totalMujeresEventual', 
                    '$totalHombresHonorarios', 
                    '$totalMujeresHonorarios', 
                    '$totalHombresOtro', 
                    '$totalMujeresOtro',
                    '$totalHombres',
                    '$totalMujeres',
                    '$totalPersonal',
                    '$comentarios', 
                    '$comentarioGeneral', 
                    '$Status', 
                    '$Anio'
                )";
                $stmt = Connection::connect()->prepare($insertPregunta5);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 5 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion6($idInstitucion, $nombreInstitucion, $totalHombresISSSTE, $totalMujeresISSSTE, $totalHombresISSEFH, $totalMujeresISSEFH, $totalHombresIMSS, $totalMujeresIMSS, $totalHombresOtra, $totalMujeresOtra, $totalHombresSinSeguridad, $totalMujeresSinSeguridad, $otroYsinSeguridadEspecifico, $comentarioGeneral, $Status, $Anio, $totalPersonal, $totalHombres, $totalMujeres)
    {
        try {
            $comentarios = "";
            if ($otroYsinSeguridadEspecifico != "") {
                $comentarios = $comentarios . "Institución de seguridad específica: " . $otroYsinSeguridadEspecifico;
            }
            $validarSiExiste = "SELECT *FROM tbl_pregunta5 WHERE idIns = '" . $idInstitucion . "' and anio = '" . $Anio . "'";
            $stmt = Connection::connect()->prepare($validarSiExiste);
            $stmt->execute();
            $cont = $stmt->fetchAll();
            if (count($cont)) {
                $updateTablaPregunta6 =
                    "UPDATE tbl_pregunta5
                    SET 
                    isssteh = '" . $totalHombresISSSTE . "', 
                    isstem = '" . $totalMujeresISSSTE . "', 
                    issefhh = '" . $totalHombresISSEFH . "', 
                    issefhm = '" . $totalMujeresISSEFH . "', 
                    imssh = '" . $totalHombresIMSS . "', 
                    imssm = '" . $totalMujeresIMSS . "', 
                    otroh = '" . $totalHombresOtra . "', 
                    otrom = '" . $totalMujeresOtra . "', 
                    sinseguroh = '" . $totalHombresSinSeguridad . "', 
                    sinsegurom = '" . $totalMujeresSinSeguridad . "',
                    totalHombres = '" . $totalHombres . "',
                    totalMujeres = '" . $totalMujeres . "',
                    totalPersonal = '" . $totalPersonal . "',
                    comentariosValidacion = '" . $comentarios . "', 
                    comentarios = '" . $comentarioGeneral . "'
                    WHERE idIns = '" . $idInstitucion . "' and anio = '" . $Anio . "'";
                $stmt = Connection::connect()->prepare($updateTablaPregunta6);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 6 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos"];
                }
            } else {
                $insertPregunta6 = "INSERT INTO tbl_pregunta5
                (
                    idIns, 
                    nombreIns, 
                    isssteh, 
                    isstem, 
                    issefhh, 
                    issefhm, 
                    imssh, 
                    imssm, 
                    otroh, 
                    otrom, 
                    sinseguroh, 
                    sinsegurom,
                    totalHombres,
                    totalMujeres,
                    totalPersonal, 
                    comentariosValidacion, 
                    comentarios, 
                    `Status`, 
                    anio
                )
                VALUES
                (
                    '$idInstitucion', 
                    '$nombreInstitucion', 
                    '$totalHombresISSSTE', 
                    '$totalMujeresISSSTE', 
                    '$totalHombresISSEFH', 
                    '$totalMujeresISSEFH', 
                    '$totalHombresIMSS',
                    '$totalMujeresIMSS', 
                    '$totalHombresOtra', 
                    '$totalMujeresOtra', 
                    '$totalHombresSinSeguridad', 
                    '$totalMujeresSinSeguridad',
                    '$totalHombres',
                    '$totalMujeres',
                    '$totalPersonal',
                    '$comentarios', 
                    '$comentarioGeneral', 
                    '$Status', 
                    '$Anio'
                )";
                $stmt = Connection::connect()->prepare($insertPregunta6);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 6 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion7($idInstitucion, $nombreInstitucion, $totalHombres18a24, $totalMujeres18a24, $totalHombres25a29, $totalMujeres25a29, $totalHombres30a34, $totalMujeres30a34, $totalHombres35a39, $totalMujeres35a39, $totalHombres40a44, $totalMujeres40a44, $totalHombres45a49, $totalMujeres45a49, $totalHombres50a54, $totalMujeres50a54, $totalHombres55a59, $totalMujeres55a59, $totalHombres60yMas, $totalMujeres60yMas, $comentarioGeneral, $Status, $Anio, $totalPersonal, $totalHombres, $totalMujeres)
    {
        try {
            $preguntarSiExiste = "SELECT *FROM tbl_pregunta6 
            WHERE id_inti = '" . $idInstitucion . "' and anio = '" . $Anio . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador)) {
                $updateTablaPregunta7 =
                    "UPDATE tbl_pregunta6
                    SET 
                    `1824H` = '" . $totalHombres18a24 . "', 
                    `1824M` = '" . $totalMujeres18a24 . "', 
                    `2529H` = '" . $totalHombres25a29 . "', 
                    `2529M` = '" . $totalMujeres25a29 . "', 
                    `3034H` = '" . $totalHombres30a34 . "',  
                    `3034M` = '" . $totalMujeres30a34 . "', 
                    `3539H` = '" . $totalHombres35a39 . "', 
                    `3539M` = '" . $totalMujeres35a39 . "', 
                    `4044h` = '" . $totalHombres40a44 . "', 
                    `4044M` = '" . $totalMujeres40a44 . "', 
                    `4549H` = '" . $totalHombres45a49 . "', 
                    `4549M` = '" . $totalMujeres45a49 . "', 
                    `5054H` = '" . $totalHombres50a54 . "', 
                    `5054M` = '" . $totalMujeres50a54 . "', 
                    `5559H` = '" . $totalHombres55a59 . "', 
                    `5559M` = '" . $totalMujeres55a59 . "', 
                    `60H` = '" . $totalHombres60yMas . "', 
                    `60M` = '" . $totalMujeres60yMas . "',
                    totalHombres = '" . $totalHombres . "',
                    totalMujeres = '" . $totalMujeres . "',
                    totalPersonal = '" . $totalPersonal . "',
                    comentarios = '" . $comentarioGeneral . "'
                    WHERE id_inti = '" . $idInstitucion . "' and anio = '" . $Anio . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta7);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 7 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta7 = "INSERT INTO tbl_pregunta6
                (
                    id_inti, 
                    intitucion, 
                    `1824H`, 
                    `1824M`, 
                    `2529H`, 
                    `2529M`, 
                    `3034H`, 
                    `3034M`, 
                    `3539H`, 
                    `3539M`, 
                    `4044H`, 
                    `4044M`, 
                    `4549H`, 
                    `4549M`, 
                    `5054H`, 
                    `5054M`, 
                    `5559H`, 
                    `5559M`, 
                    `60H`, 
                    `60M`,
                    totalHombres,
                    totalMujeres,
                    totalPersonal, 
                    comentarios,
                    `Status`, 
                    anio
                )
                VALUES
                (
                    '$idInstitucion',
                    '$nombreInstitucion',
                    '$totalHombres18a24',
                    '$totalHombres18a24',
                    '$totalHombres25a29',
                    '$totalMujeres25a29',
                    '$totalHombres30a34',
                    '$totalMujeres30a34',
                    '$totalHombres35a39',
                    '$totalMujeres35a39',
                    '$totalHombres40a44',
                    '$totalMujeres40a44',
                    '$totalHombres45a49',
                    '$totalMujeres45a49',
                    '$totalHombres50a54',
                    '$totalMujeres50a54',
                    '$totalHombres55a59',
                    '$totalMujeres55a59',
                    '$totalHombres60yMas',
                    '$totalMujeres60yMas',
                    '$totalHombres',
                    '$totalMujeres',
                    '$totalPersonal',
                    '$comentarioGeneral',
                    '$Status',
                    '$Anio'
                )";
                $stmt = Connection::connect()->prepare($insertPregunta7);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 7 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion8($idInstitucion, $nombreInstitucion, $totalHombresSinPaga, $totalMujeresSinPaga, $totalHombres1a5000, $totalMujeres1a5000, $totalHombres5001a10000, $totalMujeres5001a10000, $totalHombres10001a15000, $totalMujeres10001a15000, $totalHombres15001a20000, $totalMujeres15001a20000, $totalHombres20001a25000, $totalMujeres20001a25000, $totalHombres25001a30000, $totalMujeres25001a30000, $totalHombres30001a35000, $totalMujeres30001a35000, $totalHombres35001a40000, $totalMujeres35001a40000, $totalHombres40001a45000, $totalMujeres40001a45000, $totalHombres45001a50000, $totalMujeres45001a50000, $totalHombres50001a55000, $totalMujeres50001a55000, $totalHombres55001a60000, $totalMujeres55001a60000, $totalHombres60001a65000, $totalMujeres60001a65000, $totalHombres65001a70000, $totalMujeres65001a70000, $totalHombresMasDe70000, $totalMujeresMasDe70000, $sinPagaEspecifico, $comentarioGeneral, $Status, $Anio, $totalPersonal, $totalHombres, $totalMujeres)
    {

        try {

            $comentarios = "";

            if ($sinPagaEspecifico != "") {
                $comentarios = $comentarios . "Pago específico: " . $sinPagaEspecifico;
            }

            $preguntarSiExiste = "SELECT *FROM tbl_pregunta7 WHERE idIns = '" . $idInstitucion . "' and anio = '" . $Anio . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                $updateTablaPregunta8 =
                    "UPDATE tbl_pregunta7
                     SET 
                     sinpagoh = '" . $totalHombresSinPaga . "', 
                     sinpagom = '" . $totalMujeresSinPaga . "', 
                     pago2h = '" . $totalHombres1a5000 . "', 
                     pago2m = '" . $totalMujeres1a5000 . "', 
                     pago3h = '" . $totalHombres5001a10000 . "', 
                     pago3m = '" . $totalMujeres5001a10000 . "', 
                     pago4h = '" . $totalHombres10001a15000 . "', 
                     pago4m = '" . $totalMujeres10001a15000 . "', 
                     pago5h = '" . $totalHombres15001a20000 . "', 
                     pago5m = '" . $totalMujeres15001a20000 . "', 
                     pago6h = '" . $totalHombres20001a25000 . "', 
                     pago6m = '" . $totalMujeres20001a25000 . "', 
                     pago7h = '" . $totalHombres25001a30000 . "', 
                     pago7m = '" . $totalMujeres25001a30000 . "', 
                     pago8h = '" . $totalHombres30001a35000 . "', 
                     pago8m = '" . $totalMujeres30001a35000 . "', 
                     pago9h = '" . $totalHombres35001a40000 . "', 
                     pago9m = '" . $totalMujeres35001a40000 . "', 
                     pago10h = '" . $totalHombres40001a45000 . "', 
                     pago10m = '" . $totalMujeres40001a45000 . "', 
                     pago11h = '" . $totalHombres45001a50000 . "', 
                     pago11m = '" . $totalMujeres45001a50000 . "', 
                     pago12h = '" . $totalHombres50001a55000 . "', 
                     pago12m = '" . $totalMujeres50001a55000 . "', 
                     pago13h = '" . $totalHombres55001a60000 . "', 
                     pago13m = '" . $totalMujeres55001a60000 . "', 
                     pago14h = '" . $totalHombres60001a65000 . "', 
                     pago14m = '" . $totalMujeres60001a65000 . "', 
                     pago15h = '" . $totalHombres65001a70000 . "', 
                     pago15m = '" . $totalMujeres65001a70000 . "', 
                     pago16h = '" . $totalHombresMasDe70000 . "', 
                     pago16m = '" . $totalMujeresMasDe70000 . "',
                     totalHombres = '" . $totalHombres . "',
                     totalMujeres = '" . $totalMujeres . "',
                     totalPersonal = '" . $totalPersonal . "',
                     comentariosValidacion = '" . $comentarios . "', 
                     comentarios = '" . $comentarioGeneral . "'
                     WHERE idIns = '" . $idInstitucion . "' and anio = '" . $Anio . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta8);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 8 actualizada!"];
                } else {
                    return ["error", "Error al actualizar la informacion!"];
                }
            } else {
                $insertPregunta8 = "INSERT INTO tbl_pregunta7
                (
                    idIns, 
                    nombreins, 
                    sinpagoh, 
                    sinpagom, 
                    pago2h, 
                    pago2m, 
                    pago3h, 
                    pago3m, 
                    pago4h, 
                    pago4m, 
                    pago5h, 
                    pago5m, 
                    pago6h, 
                    pago6m, 
                    pago7h, 
                    pago7m, 
                    pago8h, 
                    pago8m, 
                    pago9h, 
                    pago9m, 
                    pago10h, 
                    pago10m, 
                    pago11h, 
                    pago11m,
                    pago12h, 
                    pago12m, 
                    pago13h, 
                    pago13m, 
                    pago14h, 
                    pago14m, 
                    pago15h, 
                    pago15m, 
                    pago16h, 
                    pago16m,
                    totalHombres,
                    totalMujeres,
                    totalPersonal,
                    comentariosValidacion, 
                    comentarios, 
                    `Status`, 
                    anio
                )
                VALUES
                (
                    '$idInstitucion', 
                    '$nombreInstitucion', 
                    '$totalHombresSinPaga',
                    '$totalMujeresSinPaga',
                    '$totalHombres1a5000',
                    '$totalMujeres1a5000',
                    '$totalHombres5001a10000',
                    '$totalMujeres5001a10000',
                    '$totalHombres10001a15000',
                    '$totalMujeres10001a15000',
                    '$totalHombres15001a20000',
                    '$totalMujeres15001a20000',
                    '$totalHombres20001a25000$',
                    '$totalMujeres20001a25000',
                    '$totalHombres25001a30000',
                    '$totalMujeres25001a30000',
                    '$totalHombres30001a35000', 
                    '$totalMujeres30001a35000', 
                    '$totalHombres35001a40000',
                    '$totalMujeres35001a40000',
                    '$totalHombres40001a45000',
                    '$totalMujeres40001a45000',
                    '$totalHombres45001a50000',
                    '$totalMujeres45001a50000',
                    '$totalHombres50001a55000',
                    '$totalMujeres50001a55000',
                    '$totalHombres55001a60000',
                    '$totalMujeres55001a60000',
                    '$totalHombres60001a65000',
                    '$totalMujeres60001a65000',
                    '$totalHombres65001a70000',
                    '$totalMujeres65001a70000',
                    '$totalHombresMasDe70000', 
                    '$totalMujeresMasDe70000',
                    '$totalHombres',
                    '$totalMujeres',
                    '$totalPersonal',
                    '$comentarios',
                    '$comentarioGeneral',
                    '$Status',
                    '$Anio'
                )";

                $stmt = Connection::connect()->prepare($insertPregunta8);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 8 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion9($idInstitucion, $nombreInstitucion, $totalHombresNinguno, $totalMujeresNinguno, $totalHombresPresPri, $totalMujeresPresPri, $totalHombresSecu, $totalMujeresSecu, $totalHombresPrepa, $totalMujeresPrepa, $totalHombresTecnica, $totalMujeresTecnica, $totalHombresLicenciatura, $totalMujeresLicenciatura, $totalHombresMaestria, $totalMujeresMaestria, $totalHombresDoctorado, $totalMujeresDoctorado, $ningunoEspecifico, $comentarioGeneral, $Status, $Anio, $totalPersonal, $totalHombres, $totalMujeres)
    {
        try {
            $comentarios = "";
            if ($ningunoEspecifico != "") {
                $comentarios = $comentarios . "Nivel escolaridad específico: " . $ningunoEspecifico;
            }
            $preguntarSiExiste = "SELECT *FROM tbl_pregunta9_2021 
            WHERE idInstitucion = '" . $idInstitucion . "'and anio = '" . $Anio . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                $updateTablaPregunta9 =
                    "UPDATE tbl_pregunta9_2021
                    SET 
                    ningunoh = '" . $totalHombresNinguno . "', 
                    ningunom = '" . $totalMujeresNinguno . "', 
                    preescolarPh = '" . $totalHombresPresPri . "', 
                    prescolarPm = '" . $totalMujeresPresPri . "', 
                    secundariah = '" . $totalHombresSecu . "', 
                    secundariam = '" . $totalMujeresSecu . "', 
                    prepah = '" . $totalHombresPrepa . "', 
                    prepam = '" . $totalMujeresPrepa . "', 
                    carreratch = '" . $totalHombresTecnica . "', 
                    carreratcm = '" . $totalMujeresTecnica . "', 
                    licenciaturah = '" . $totalHombresLicenciatura . "',
                    licenciaturam = '" . $totalMujeresLicenciatura . "', 
                    maestriah = '" . $totalHombresMaestria . "', 
                    maestriam = '" . $totalMujeresMaestria . "', 
                    doctoradoh = '" . $totalHombresDoctorado . "', 
                    doctoradom = '" . $totalMujeresDoctorado . "',
                    totalHombres = '" . $totalHombres . "',
                    totalMujeres = '" . $totalMujeres . "',
                    totalPersonal = '" . $totalPersonal . "',
                    comentariosValidacion = '" . $comentarios . "', 
                    comentarios = '" . $comentarioGeneral . "'
                    WHERE idInstitucion = '" . $idInstitucion . "' AND anio = '" . $Anio . "'";
                $stmt = Connection::connect()->prepare($updateTablaPregunta9);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 9 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta9 = "INSERT INTO tbl_pregunta9_2021
                (
                    idInstitucion, 
                    nombreInstitucion, 
                    ningunoh, ningunom, 
                    preescolarPh, 
                    prescolarPm, 
                    secundariah, 
                    secundariam, 
                    prepah, 
                    prepam, 
                    carreratch, 
                    carreratcm, 
                    licenciaturah, 
                    licenciaturam, 
                    maestriah, 
                    maestriam, 
                    doctoradoh, 
                    doctoradom,
                    totalHombres,
                    totalMujeres,
                    totalPersonal,
                    comentariosValidacion, 
                    comentarios, 
                    `status`, 
                    anio
                )
                VALUES
                (
                    '$idInstitucion', 
                    '$nombreInstitucion', 
                    '$totalHombresNinguno', 
                    '$totalMujeresNinguno', 
                    '$totalHombresPresPri', 
                    '$totalMujeresPresPri', 
                    '$totalHombresSecu', 
                    '$totalMujeresSecu', 
                    '$totalHombresPrepa', 
                    '$totalMujeresPrepa', 
                    '$totalHombresTecnica', 
                    '$totalMujeresTecnica', 
                    '$totalHombresLicenciatura', 
                    '$totalMujeresLicenciatura', 
                    '$totalHombresMaestria', 
                    '$totalMujeresMaestria', 
                    '$totalHombresDoctorado', 
                    '$totalMujeresDoctorado',
                    '$totalHombres',
                    '$totalMujeres',
                    '$totalPersonal',
                    '$comentarios', 
                    '$comentarioGeneral', 
                    '$Status', 
                    '$Anio'
                )";
                $stmt = Connection::connect()->prepare($insertPregunta9);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 9 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion10($idInstitucion, $nombreInstitucion, $totalHombresPertenecen, $totalMujeresPertenecen, $totalHombresNoPertenecen, $totalMujeresNoPertenecen, $totalHombresNoIdentificado, $totalMujeresNoIdentificado, $noIdentificadoEspecifico, $comentarioGeneral, $Status, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres)
    {
        try {
            $comentarios = "";
            if ($noIdentificadoEspecifico != "") {
                $comentarios = $comentarios . "Lengua no identificada específica: " . $noIdentificadoEspecifico;
            }

            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta10_2021 
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                $updateTablaPregunta10 =
                    "UPDATE tbl_pregunta10_2021
                    SET
                    puebloIndigenaH = '" . $totalHombresPertenecen . "',
                    puebloIndigenaM = '" . $totalMujeresPertenecen . "',
                    noPuebloIndigenaH = '" . $totalHombresNoPertenecen . "',
                    noPuebloIndigenaM = '" . $totalMujeresNoPertenecen . "',
                    noidentificadoH = '" . $totalHombresNoIdentificado . "',
                    noIdentificadoM = '" . $totalMujeresNoIdentificado . "',
                    totalHombres = '" . $totalHombres . "',
                    totalMujeres = '" . $totalMujeres . "',
                    totalPersonal = '" . $totalPersonal . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta10);
                $cont = 0;
                if ($stmt->execute()) {

                    # PREGUNTA 11
                    $borrarPregunta11 =
                        "DELETE FROM tbl_pregunta11_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt2 = Connection::connect()->prepare($borrarPregunta11);
                    if ($stmt2->execute()) {
                        $cont++;
                    }

                    if ($cont == 1) {
                        return ["success", "Pregunta 10 actualizada!"];
                    } else {
                        return ["error", "Error al borrar pregunta 11"];
                    }
                } else {
                    return ["error", "Error al actualizar los datos!"];
                }
            } else {
                $insertPregunta10 =
                    "INSERT INTO tbl_pregunta10_2021
                (
                    idInstitucion,
                    nombreInstitucion,
                    puebloIndigenaH,
                    puebloIndigenaM,
                    noPuebloIndigenaH,
                    nopuebloIndigenaM,
                    noIdentificadoH,
                    noIdentificadoM,
                    totalHombres,
                    totalMujeres,
                    totalPersonal,
                    comentariosValidacion,
                    comentariosPregunta,
                    `Status`,
                    Anio
                )
                VALUES
                (
                    '$idInstitucion',
                    '$nombreInstitucion',
                    '$totalHombresPertenecen',
                    '$totalMujeresPertenecen',
                    '$totalHombresNoPertenecen',
                    '$totalMujeresNoPertenecen',
                    '$totalHombresNoIdentificado',
                    '$totalMujeresNoIdentificado',
                    '$totalHombres',
                    '$totalMujeres',
                    '$totalPersonal',
                    '$comentarios',
                    '$comentarioGeneral',
                    '$Status',
                    '$anioInstitucion'
                )";

                $stmt = Connection::connect()->prepare($insertPregunta10);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 10 guardada!"];
                } else {
                    return ["error", "error al guardar los datos"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion11($idInstitucion, $nombreInstitucion, $totalHombresChinanteco, $totalMujeresChinanteco, $totalHombresChol, $totalMujeresChol, $totalHombresCora, $totalMujeresCora, $totalHombresHuasteco, $totalMujeresHuasteco, $totalHombresHuichol, $totalMujeresHuichol, $totalHombresMaya, $totalMujeresMaya, $totalHombresMayo, $totalMujeresMayo, $totalHombresMazahua, $totalMujeresMazahua, $totalHombresMazateco, $totalMujeresMazateco, $totalHombresMixe, $totalMujeresMixe, $totalHombresMixteco, $totalMujeresMixteco, $totalHombresNahuatl, $totalMujeresNahuatl, $totalHombresOtomi, $totalMujeresOtomi, $totalHombresTarascoPurepecha, $totalMujeresTarascoPurepecha, $totalHombresTarahumara, $totalMujeresTarahumara, $totalHombresTepehuano, $totalMujeresTepehuano, $totalHombresTlapaneco, $totalMujeresTlapaneco, $totalHombresTotonaco, $totalMujeresTotonaco, $totalHombresTseltal, $totalMujeresTseltal, $totalHombresTsotsil, $totalMujeresTsotsil, $totalHombresYaqui, $totalMujeresYaqui, $totalHombresZapoteco, $totalMujeresZapoteco, $totalHombresZoque, $totalMujeresZoque, $totalHombresOtro, $totalMujeresOtro, $totalHombresNoIdentificado, $totalMujeresNoIdentificado, $puebloIndigenaEspecifico, $comentarioGeneral, $Status, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres)
    {
        try {
            $comentarios = "";
            if ($puebloIndigenaEspecifico != "") {
                $comentarios = $comentarios . "Pueblo indígena específico: " . $puebloIndigenaEspecifico;
            }
            #TOTALES
            #SUMARLOS Y LUEGO GUARDARLOS
            $totalChinanteco = $totalHombresChinanteco + $totalMujeresChinanteco;
            $totalChol = $totalHombresChol + $totalMujeresChol;
            $totalCora = $totalHombresCora + $totalMujeresCora;
            $totalHuasteco = $totalHombresHuasteco + $totalMujeresHuasteco;
            $totalHuichol = $totalHombresHuichol + $totalMujeresHuichol;
            $totalMaya = $totalHombresMaya + $totalMujeresMaya;
            $totalMayo = $totalHombresMayo + $totalMujeresMayo;
            $totalMazahua = $totalHombresMazahua + $totalMujeresMazahua;
            $totalMazateco = $totalHombresMazateco + $totalMujeresMazateco;
            $totalMixe = $totalHombresMixe + $totalMujeresMixe;
            $totaMixteco = $totalHombresMixteco + $totalMujeresMixteco;
            $totalNahuatl = $totalHombresNahuatl + $totalMujeresNahuatl;
            $totalOtomi = $totalHombresOtomi + $totalMujeresOtomi;
            $totalTarascoPurepecha = $totalHombresTarascoPurepecha + $totalMujeresTarascoPurepecha;
            $totalTarahumara = $totalHombresTarahumara + $totalMujeresTarahumara;
            $totalTepehuano = $totalHombresTepehuano + $totalMujeresTepehuano;
            $totalTlapaneco = $totalHombresTlapaneco + $totalMujeresTlapaneco;
            $totalTotonaco = $totalHombresTotonaco + $totalMujeresTotonaco;
            $totalTseltal = $totalHombresTseltal + $totalMujeresTseltal;
            $totalTsotsil = $totalHombresTsotsil + $totalMujeresTsotsil;
            $totalYaqui = $totalHombresYaqui + $totalMujeresYaqui;
            $totalZapoteco = $totalHombresZapoteco + $totalMujeresZapoteco;
            $totalZoque = $totalHombresZoque + $totalMujeresZoque;
            $totalOtro = $totalHombresOtro + $totalMujeresOtro;
            $totalNoIdentificado = $totalHombresNoIdentificado + $totalMujeresNoIdentificado;

            $preguntarSiExiste = "SELECT *FROM tbl_pregunta11_2021
            WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                $updateTablaPregunta11 =
                    "UPDATE tbl_pregunta11_2021
                    SET
                    chinantecoh = '" . $totalHombresChinanteco . "',
                    chinantecom = '" . $totalMujeresChinanteco . "',
                    chinantecototal = '" . $totalChinanteco . "',
                    cholh = '" . $totalHombresChol . "',
                    cholm = '" . $totalMujeresChol . "',
                    choltotal = '" . $totalChol . "',
                    corah = '" . $totalHombresCora . "', 
                    coram = '" . $totalMujeresCora . "',
                    coratotal = '" . $totalCora . "',
                    huastecoh = '" . $totalHombresHuasteco . "',
                    huastecom = '" . $totalMujeresHuasteco . "',
                    huastecototal = '" . $totalHuasteco . "',
                    huicholh = '" . $totalHombresHuichol . "',
                    huicholm = '" . $totalMujeresHuichol . "',
                    huicholtotal = '" . $totalHuichol . "',
                    mayah = '" . $totalHombresMaya . "',
                    mayam = '" . $totalMujeresMaya . "',
                    mayatotal = '" . $totalMaya . "',
                    mayoh = '" . $totalHombresMayo . "',
                    mayom = '" . $totalMujeresMayo . "',
                    mayototal = '" . $totalMayo . "',
                    mazahuah = '" . $totalHombresMazahua . "',
                    mazahuam = '" . $totalMujeresMazahua . "',
                    mazahuatotal = '" . $totalMazahua . "',
                    mazatecoh = '" . $totalHombresMazateco . "',
                    mazatecom = '" . $totalMujeresMazateco . "',
                    mazatecototal = '" . $totalMazateco . "',
                    mixeh = '" . $totalHombresMixe . "',
                    mixem = '" . $totalMujeresMixe . "',
                    mixetotal = '" . $totalMixe . "',
                    nahuatlh = '" . $totalHombresNahuatl . "',
                    nahuatlm = '" . $totalMujeresNahuatl . "',
                    nahuatltotal = '" . $totalNahuatl . "',
                    otomih = '" . $totalHombresOtomi . "',
                    otomim = '" . $totalMujeresOtomi . "',
                    otomitotal = '" . $totalOtomi . "',
                    tarascoh = '" . $totalHombresTarascoPurepecha . "',
                    tarascom = '" . $totalMujeresTarascoPurepecha . "',
                    tarascototal = '" . $totalTarascoPurepecha . "',
                    tarahumarah = '" . $totalHombresTarahumara . "',
                    tarahumaram = '" . $totalHombresTarahumara . "',
                    tarahumaratotal = '" . $totalTarahumara . "',
                    tepehuanoh = '" . $totalHombresTepehuano . "',
                    tepehuanom = '" . $totalMujeresTepehuano . "',
                    tepehuanototal = '" . $totalTepehuano . "',
                    tlapanecoh = '" . $totalHombresTlapaneco . "',
                    tlapanecom = '" . $totalMujeresTlapaneco . "',
                    tlapanecototal = '" . $totalTlapaneco . "',
                    totonacoh = '" . $totalHombresTotonaco . "',
                    totonacom = '" . $totalHombresTotonaco . "',
                    totonacototal = '" . $totalTotonaco . "',
                    tseltalh = '" . $totalHombresTseltal . "',
                    tseltalm = '" . $totalMujeresTseltal . "',
                    tseltaltotal = '" . $totalTseltal . "',
                    tsotsith = '" . $totalHombresTsotsil . "',
                    tsotsit = '" . $totalMujeresTsotsil . "',
                    tsotsittotal = '" . $totalTsotsil . "',
                    yaquih = '" . $totalHombresYaqui . "',
                    yaquim = '" . $totalMujeresYaqui . "',
                    yaquitotal = '" . $totalYaqui . "',
                    zapotecoh = '" . $totalHombresZapoteco . "',
                    zapotecom = '" . $totalMujeresZapoteco . "',
                    zapotecototal = '" . $totalZapoteco . "',
                    zoqueh = '" . $totalHombresZoque . "',
                    zoquem = '" . $totalMujeresZoque . "',
                    zoquetotal = '" . $totalZoque . "',
                    otroh = '" . $totalHombresOtro . "',
                    otrom = '" . $totalMujeresOtro . "',
                    otrototal = '" . $totalOtro . "',
                    noidentificadoh = '" . $totalHombresNoIdentificado . "',
                    noidentificadom = '" . $totalMujeresNoIdentificado . "',
                    noidentificadototal = '" . $totalNoIdentificado . "',
                    totalHombres = '" . $totalHombres . "',
                    totalMujeres = '" . $totalMujeres . "',
                    totalPersonal = '" . $totalPersonal . "',
                    comentariosValidacion = '" . $comentarios . "',
                    Comentarios = '" . $comentarioGeneral . "'
                    WHERE idInstitucion = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta11);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 11 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta11 =
                    "INSERT INTO tbl_pregunta11_2021
                (
                    idInstitucion,
                    nombreInstitucion,
                    chinantecoh,
                    chinantecom,
                    chinantecototal,
                    cholh,
                    cholm,
                    choltotal,
                    corah,
                    coram,
                    coratotal,
                    huastecoh,
                    huastecom,
                    huastecototal,
                    huicholh,
                    huicholm,
                    huicholtotal,
                    mayah,
                    mayam,
                    mayatotal,
                    mayoh,
                    mayom,
                    mayototal,
                    mazahuah,
                    mazahuam,
                    mazahuatotal,
                    mazatecoh,
                    mazatecom,
                    mazatecototal,
                    mixeh,
                    mixem,
                    mixetotal,
                    mixtecoh,
                    mixtecom,
                    mixtecototal,
                    nahuatlh,
                    nahuatlm,
                    nahuatltotal,
                    otomih,
                    otomim,
                    otomitotal,
                    tarascoh,
                    tarascom,
                    tarascototal,
                    tarahumarah,
                    tarahumaram,
                    tarahumaratotal,
                    tepehuanoh,
                    tepehuanom,
                    tepehuanototal,
                    tlapanecoh,
                    tlapanecom,
                    tlapanecototal,
                    totonacoh,
                    totonacom,
                    totonacototal,
                    tseltalh,
                    tseltalm,
                    tseltaltotal,
                    tsotsith,
                    tsotsit,
                    tsotsittotal,
                    yaquih,
                    yaquim,
                    yaquitotal,
                    zapotecoh,
                    zapotecom,
                    zapotecototal,
                    zoqueh,
                    zoquem,
                    zoquetotal,
                    otroh,
                    otrom,
                    otrototal,
                    noidentificadoh,
                    noidentificadom,
                    noidentificadototal,
                    totalHombres,
                    totalMujeres,
                    totalPersonal,
                    comentariosValidacion,
                    Comentarios,
                    `Status`,
                    Anio
                )
                VALUES
                (
                    '$idInstitucion',
                    '$nombreInstitucion',
                    '$totalHombresChinanteco',
                    '$totalMujeresChinanteco',
                    '$totalChinanteco',
                    '$totalHombresChol',
                    '$totalMujeresChol',
                    '$totalChol',
                    '$totalHombresCora',
                    '$totalHombresCora',
                    '$totalCora',
                    '$totalHombresHuasteco',
                    '$totalMujeresHuasteco',
                    '$totalHuasteco',
                    '$totalHombresHuichol',
                    '$totalMujeresHuichol',
                    '$totalHuichol',
                    '$totalHombresMaya',
                    '$totalMujeresMaya',
                    '$totalMaya',
                    '$totalHombresMayo',
                    '$totalMujeresMayo',
                    '$totalMayo',
                    '$totalHombresMazahua',
                    '$totalMujeresMazahua',
                    '$totalMazahua',
                    '$totalHombresMazateco',
                    '$totalMujeresMazateco',
                    '$totalMazateco',
                    '$totalHombresMixe',
                    '$totalMujeresMixe',
                    '$totalMixe',
                    '$totalHombresMixteco',
                    '$totalMujeresMixteco',
                    '$totaMixteco',
                    '$totalHombresNahuatl',
                    '$totalMujeresNahuatl',
                    '$totalNahuatl',
                    '$totalHombresOtomi',
                    '$totalMujeresOtomi',
                    '$totalOtomi',
                    '$totalHombresTarascoPurepecha',
                    '$totalMujeresTarascoPurepecha',
                    '$totalTarascoPurepecha',
                    '$totalHombresTarahumara',
                    '$totalMujeresTarahumara',
                    '$totalTarahumara',
                    '$totalHombresTepehuano',
                    '$totalMujeresTepehuano',
                    '$totalTepehuano',
                    '$totalHombresTlapaneco',
                    '$totalMujeresTlapaneco',
                    '$totalTlapaneco',
                    '$totalHombresTotonaco',
                    '$totalMujeresTotonaco',
                    '$totalTotonaco',
                    '$totalHombresTseltal',
                    '$totalMujeresTseltal',
                    '$totalTseltal',
                    '$totalHombresTsotsil',
                    '$totalMujeresTsotsil',
                    '$totalTsotsil',
                    '$totalHombresYaqui',
                    '$totalMujeresYaqui',
                    '$totalYaqui',
                    '$totalHombresZapoteco',
                    '$totalMujeresZapoteco',
                    '$totalZapoteco',
                    '$totalHombresZoque',
                    '$totalMujeresZoque',
                    '$totalZoque',
                    '$totalHombresOtro',
                    '$totalMujeresOtro',
                    '$totalOtro',
                    '$totalHombresNoIdentificado',
                    '$totalMujeresNoIdentificado',
                    '$totalNoIdentificado',
                    '$totalHombres',
                    '$totalMujeres',
                    '$totalPersonal',
                    '$comentarios',
                    '$comentarioGeneral',
                    '$Status',
                    '$anioInstitucion'
                )";
                $stmt = Connection::connect()->prepare($insertPregunta11);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 11 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion12($idInstitucion, $nombreInstitucion, $totalHombresConDiscapacidad, $totalMujeresConDiscapacidad, $totalHombresSinDiscapacidad, $totalMujeresSinDiscapacidad, $totalHombresNoIdentificado, $totalMujeresNoIdentificado, $noIdentificadoEspecifico, $comentarioGeneral, $Status, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres)
    {
        try {
            $comentarios = "";
            if ($noIdentificadoEspecifico != "") {
                $comentarios = $comentarios . "Tipo Discapacidad Específica: " . $noIdentificadoEspecifico;
            }
            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta12_2021 
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                $updateTablaPregunta12 =
                    "UPDATE tbl_pregunta12_2021
                    SET
                    discapacidadH = '" . $totalHombresConDiscapacidad . "',
                    discapacidadM = '" . $totalMujeresConDiscapacidad . "',
                    noDiscapacidadH = '" . $totalHombresSinDiscapacidad . "',
                    noDiscapacidadM = '" . $totalMujeresSinDiscapacidad . "',
                    noIdentificadoH = '" . $totalHombresNoIdentificado . "',
                    noIdentificadoM = '" . $totalMujeresNoIdentificado . "',
                    totalHombres = '" . $totalHombres . "',
                    totalMujeres = '" . $totalMujeres . "',
                    totalPersonal = '" . $totalPersonal . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta12);
                $contador = 0;
                if ($stmt->execute()) {
                    $borrarPregunta13 =
                        "DELETE FROM tbl_pregunta13_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt2 = Connection::connect()->prepare($borrarPregunta13);
                    if ($stmt2->execute()) {
                        $contador++;
                    } else {
                        return ["error", "Error al borrar pregunta 13"];
                    }

                    if ($contador == 1) {
                        return ["success", "Pregunta 12 actualizada!"];
                    } else {
                        return ["error", "Error al borrar pregunta 13"];
                    }
                } else {
                    return ["error", "Error al guardar los datos"];
                }
            } else {
                $insertPregunta12 =
                    "INSERT INTO tbl_pregunta12_2021
                (
                    idInstitucion,
                    nombreInstitucion,
                    discapacidadH,
                    discapacidadM,
                    noDiscapacidadH,
                    noDiscapacidadM,
                    noIdentificadoH,
                    noIdentificadoM,
                    totalHombres,
                    totalMujeres,
                    totalPersonal,
                    comentariosValidacion,
                    comentariosPregunta,
                    `Status`,
                    Anio
                )
                VALUES
                (
                    '$idInstitucion',
                    '$nombreInstitucion',
                    '$totalHombresConDiscapacidad',
                    '$totalMujeresConDiscapacidad',
                    '$totalHombresSinDiscapacidad',
                    '$totalMujeresSinDiscapacidad',
                    '$totalHombresNoIdentificado',
                    '$totalMujeresNoIdentificado',
                    '$totalHombres',
                    '$totalMujeres',
                    '$totalPersonal',
                    '$comentarios',
                    '$comentarioGeneral',
                    '$Status',
                    '$anioInstitucion'
                )";

                $stmt = Connection::connect()->prepare($insertPregunta12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 12 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion13($idInstitucion, $nombreInstitucion, $totalHombresCaminar, $totalMujeresCaminar, $totalHombresVer, $totalMujeresVer, $totalHombresBrazos, $totalMujeresBrazos, $totalHombresAprender, $totalMujeresAprender, $totalHombresOir, $totalMujeresOir, $totalHombresHablar, $totalMujeresHablar, $totalHombresBaniarse, $totalMujeresBaniarse, $totalHombresDepresion, $totalMujeresDepresion, $totalHombresOtro, $totalMujeresOtro, $totalHombresNoIdentificado, $totalMujeresNoIdentificado, $tipoDiscapacidadEspecifico, $comentarioGeneral, $Status, $anioInstitucion, $totalPersonal, $totalHombres, $totalMujeres)
    {
        try {
            $comentarios = "";
            if ($tipoDiscapacidadEspecifico != "") {
                $comentarios = $comentarios . "Tipo de discapacidad específica: " . $tipoDiscapacidadEspecifico;
            }
            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta13_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                $updateTablaPregunta13 =
                    "UPDATE tbl_pregunta13_2021 
                    SET
                    dCaminarH = '" . $totalHombresCaminar . "',
                    dCaminarM = '" . $totalMujeresCaminar . "',
                    dVerH = '" . $totalHombresVer . "',
                    dVerM = '" . $totalMujeresVer . "',
                    dMoverH = '" . $totalHombresBrazos . "',
                    dMoverM = '" . $totalMujeresBrazos . "',
                    dAprenderH = '" . $totalHombresAprender . "',
                    dAprenderM = '" . $totalMujeresAprender . "',
                    dOirH = '" . $totalHombresOir . "',
                    dOirM = '" . $totalMujeresOir . "',
                    dHablarM = '" . $totalHombresHablar . "',
                    dHablarM = '" . $totalMujeresHablar . "',
                    dBaniarseH = '" . $totalHombresBaniarse . "',
                    dBaniarseM = '" . $totalMujeresBaniarse . "',
                    dDepresionH = '" . $totalHombresDepresion . "',
                    dDepresionM = '" . $totalMujeresDepresion . "',
                    dOtroH = '" . $totalHombresOtro . "',
                    dOtroM = '" . $totalMujeresOtro . "',
                    noIdentificadoH = '" . $totalHombresNoIdentificado . "',
                    noIdentificadoM = '" . $totalMujeresNoIdentificado . "',
                    totalHombres = '" . $totalHombres . "',
                    totalMujeres = '" . $totalMujeres . "',
                    totalPersonal = '" . $totalPersonal . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariospregunta = '" . $comentarioGeneral . "'
                    WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta13);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 13 actualizada!"];
                } else {
                    return ["error", "Error al actualizar los datos!"];
                }
            } else {
                $insertPregunta13 =
                    "INSERT INTO tbl_pregunta13_2021
                (
                    idInstitucion,
                    nombreInstitucion,
                    dCaminarH,
                    dCaminarM,
                    dVerH,
                    dverM,
                    dMoverH,
                    dMoverM,
                    dAprenderH,
                    dAprenderM,
                    dOirH,
                    dOirM,
                    dHablarH,
                    dHablarM,
                    dBaniarseH,
                    dBaniarseM,
                    dDepresionH,
                    dDepresionM,
                    dOtroH,
                    dOtroM,
                    noIdentificadoH,
                    noIdentificadoM,
                    totalHombres,
                    totalMujeres,
                    totalPersonal,
                    comentariosValidacion,
                    comentariosPregunta,
                    `Status`,
                    Anio
                )
                VALUES
                (
                    '$idInstitucion',
                    '$nombreInstitucion',
                    '$totalHombresCaminar',
                    '$totalMujeresCaminar',
                    '$totalHombresVer',
                    '$totalMujeresVer',
                    '$totalHombresBrazos',
                    '$totalMujeresBrazos',
                    '$totalHombresAprender',
                    '$totalMujeresAprender',
                    '$totalHombresOir',
                    '$totalMujeresOir',
                    '$totalHombresHablar',
                    '$totalMujeresHablar',
                    '$totalHombresBaniarse',
                    '$totalMujeresBaniarse',
                    '$totalHombresDepresion',
                    '$totalMujeresDepresion',
                    '$totalHombresOtro',
                    '$totalMujeresOtro',
                    '$totalHombresNoIdentificado',
                    '$totalMujeresNoIdentificado',
                    '$totalHombres',
                    '$totalMujeres',
                    '$totalPersonal',
                    '$comentarios',
                    '$comentarioGeneral',
                    '$Status',
                    '$anioInstitucion'
                )";
                $stmt = Connection::connect()->prepare($insertPregunta13);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 13 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL " . $e];
        }
    }
    public static function insertQuestion14($idInstitucion, $nombreInstitucion, $personalContabilizado, $totalPersonal, $totalHombres, $totalMujeres, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta14_2021
            WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                if ($personalContabilizado == 1) {
                    $updateTablaPregunta14 =
                        "UPDATE tbl_pregunta14_2021
                        SET
                        Respuesta = '1',
                        Total = '" . $totalPersonal . "',
                        Hombres = '" . $totalHombres . "',
                        Mujeres = '" . $totalMujeres . "',
                        Comentarios = '" . $comentarioGeneral . "'
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 14 actualizada!"];
                    } else {
                        return ["error al guardar los datos!"];
                    }
                } else if ($personalContabilizado == 2) {
                    $updateTablaPregunta14 =
                        "UPDATE tbl_pregunta14_2021
                        SET
                        Respuesta = '2',
                        Total = '" . $totalPersonal . "',
                        Hombres = '" . $totalHombres . "',
                        Mujeres = '" . $totalMujeres . "',
                        Comentarios = '" . $comentarioGeneral . "'
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 14 actualizada!"];
                    } else {
                        return ["error al guardar los datos!"];
                    }
                } else if ($personalContabilizado == 9) {
                    $updateTablaPregunta14 =
                        "UPDATE tbl_pregunta14_2021
                        SET
                        Respuesta = '9',
                        Total = '" . $totalPersonal . "',
                        Hombres = '" . $totalHombres . "',
                        Mujeres = '" . $totalMujeres . "',
                        Comentarios = '" . $comentarioGeneral . "'
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 14 actualizada!"];
                    } else {
                        return ["error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Respuesta no enviada!"];
                }
            } else {
                if ($personalContabilizado == 1) {
                    $insertPregunta14 =
                        "INSERT INTO tbl_pregunta14_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Respuesta,
                        Total,
                        Hombres,
                        Mujeres,
                        Comentarios,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '1',
                        '$totalPersonal',
                        '$totalHombres',
                        '$totalMujeres',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";
                    $stmt = Connection::connect()->prepare($insertPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 14 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($personalContabilizado == 2) {
                    $insertPregunta14 =
                        "INSERT INTO tbl_pregunta14_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Respuesta,
                        Total,
                        Hombres,
                        Mujeres,
                        Comentarios,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '2',
                        '$totalPersonal',
                        '$totalHombres',
                        '$totalMujeres',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";
                    $stmt = Connection::connect()->prepare($insertPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 14 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($personalContabilizado == 9) {
                    $insertPregunta14 =
                        "INSERT INTO tbl_pregunta14_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Respuesta,
                        Total,
                        Hombres,
                        Mujeres,
                        Comentarios,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '9',
                        '$totalPersonal',
                        '$totalHombres',
                        '$totalMujeres',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";
                    $stmt = Connection::connect()->prepare($insertPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 14 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Respuesta no enviada!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion15($idInstitucion, $nombreInstitucion, $personalContabilizado, $totalPersonal, $totalHombres, $totalMujeres, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM `tbl_preguntas9-3`
            WHERE id_institu = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                if ($personalContabilizado == 1) {
                    $updateTablaPregunta14 =
                        "UPDATE `tbl_preguntas9-3`
                        SET
                        option1 = '1',
                        Total = '" . $totalPersonal . "',
                        Hombres = '" . $totalHombres . "',
                        Mujeres = '" . $totalMujeres . "',
                        Comentarios = '" . $comentarioGeneral . "'
                        WHERE
                        id_institu = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 15 actualizada!"];
                    } else {
                        return ["error al guardar los datos!"];
                    }
                } else if ($personalContabilizado == 2) {
                    $updateTablaPregunta14 =
                        "UPDATE `tbl_preguntas9-3`
                        SET
                        option1 = '2',
                        Total = '" . $totalPersonal . "',
                        Hombres = '" . $totalHombres . "',
                        Mujeres = '" . $totalMujeres . "',
                        Comentarios = '" . $comentarioGeneral . "'
                        WHERE
                        id_institu = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 15 actualizada!"];
                    } else {
                        return ["error al guardar los datos!"];
                    }
                } else if ($personalContabilizado == 9) {
                    $updateTablaPregunta14 =
                        "UPDATE `tbl_preguntas9-3`
                        SET
                        option1 = '9',
                        Total = '" . $totalPersonal . "',
                        Hombres = '" . $totalHombres . "',
                        Mujeres = '" . $totalMujeres . "',
                        Comentarios = '" . $comentarioGeneral . "'
                        WHERE
                        id_institu = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 15 actualizada!"];
                    } else {
                        return ["error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Respuesta no enviada!"];
                }
            } else {
                if ($personalContabilizado == 1) {
                    $insertPregunta14 =
                        "INSERT INTO `tbl_preguntas9-3`
                    (
                        id_institu,
                        institucion,
                        option1,
                        Total,
                        Hombres,
                        Mujeres,
                        Comentarios,
                        `Status`,
                        anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '1',
                        '$totalPersonal',
                        '$totalHombres',
                        '$totalMujeres',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";
                    $stmt = Connection::connect()->prepare($insertPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 15 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($personalContabilizado == 2) {
                    $insertPregunta14 =
                        "INSERT INTO `tbl_preguntas9-3`
                    (
                        id_institu,
                        institucion,
                        option1,
                        Total,
                        Hombres,
                        Mujeres,
                        Comentarios,
                        `Status`,
                        anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '2',
                        '$totalPersonal',
                        '$totalHombres',
                        '$totalMujeres',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";
                    $stmt = Connection::connect()->prepare($insertPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 15 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($personalContabilizado == 9) {
                    $insertPregunta14 =
                        "INSERT INTO `tbl_preguntas9-3`
                    (
                        id_institu,
                        institucion,
                        option1,
                        Total,
                        Hombres,
                        Mujeres,
                        Comentarios,
                        `Status`,
                        anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '9',
                        '$totalPersonal',
                        '$totalHombres',
                        '$totalMujeres',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";
                    $stmt = Connection::connect()->prepare($insertPregunta14);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 15 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Respuesta no enviada!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion16($idInstitucion, $nombreInstitucion, $elementosProfesionalizacion, $disposicionNormativa, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta16_2021
                WHERE idInstitucion = '" . $idInstitucion . "' and Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                if ($elementosProfesionalizacion == 1) {
                    $updateTablaPregunta16 =
                        "UPDATE tbl_pregunta16_2021
                        SET
                        Valor = '1',
                        disposicionNormativa = '" . $disposicionNormativa . "',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta16);
                    $cont = 0;
                    if ($stmt->execute()) {

                        # PREGUNTA 17
                        $borrarPregunta17 =
                            "DELETE FROM tbl_pregunta17_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                        $stmt2 = Connection::connect()->prepare($borrarPregunta17);
                        if ($stmt2->execute()) {
                            $cont = $cont + 1;
                        } else {
                            return ["error", "Error al borrar pregunta 17"];
                        }

                        #PREGUNTA 18
                        $borrarPregunta18 =
                            "DELETE FROM tbl_pregunta18_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                        $stmt3 = Connection::connect()->prepare($borrarPregunta18);
                        if ($stmt3->execute()) {
                            $cont = $cont + 1;
                        } else {
                            return ["error", "Error al borrar pregunta 17"];
                        }

                        if ($cont == 2) {
                            return ["success", "Pregunta 16 actualizada!"];
                        } else {
                            return ["error", "Error al guardar los datos!"];
                        }
                    } else {
                        return ["error", "Error al guardar datos!"];
                    }
                } else if ($elementosProfesionalizacion == 2) {
                    $updateTablaPregunta16 =
                        "UPDATE tbl_pregunta16_2021
                        SET
                        Valor = '2',
                        disposicionNormativa = '" . $disposicionNormativa . "',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta16);
                    $cont = 0;
                    if ($stmt->execute()) {
                        # PREGUNTA 17
                        $borrarPregunta17 =
                            "DELETE FROM tbl_pregunta17_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                        $stmt2 = Connection::connect()->prepare($borrarPregunta17);
                        if ($stmt2->execute()) {
                            $cont = $cont + 1;
                        } else {
                            return ["error", "Error al borrar pregunta 17"];
                        }

                        #PREGUNTA 18
                        $borrarPregunta18 =
                            "DELETE FROM tbl_pregunta18_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                        $stmt3 = Connection::connect()->prepare($borrarPregunta18);
                        if ($stmt3->execute()) {
                            $cont = $cont + 1;
                        } else {
                            return ["error", "Error al borrar pregunta 17"];
                        }

                        if ($cont == 2) {
                            return ["success", "Pregunta 16 actualizada!"];
                        } else {
                            return ["error", "Error al guardar los datos!"];
                        }
                    } else {
                        return ["error", "Error al guardar datos!"];
                    }
                } else if ($elementosProfesionalizacion == 9) {
                    $updateTablaPregunta16 =
                        "UPDATE tbl_pregunta16_2021
                        SET
                        Valor = '9',
                        disposicionNormativa = '" . $disposicionNormativa . "',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta16);
                    $cont = 0;
                    if ($stmt->execute()) {
                        # PREGUNTA 17
                        $borrarPregunta17 =
                            "DELETE FROM tbl_pregunta17_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                        $stmt2 = Connection::connect()->prepare($borrarPregunta17);
                        if ($stmt2->execute()) {
                            $cont = $cont + 1;
                        } else {
                            return ["error", "Error al borrar pregunta 17"];
                        }

                        #PREGUNTA 18
                        $borrarPregunta18 =
                            "DELETE FROM tbl_pregunta18_2021
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                        $stmt3 = Connection::connect()->prepare($borrarPregunta18);
                        if ($stmt3->execute()) {
                            $cont = $cont + 1;
                        } else {
                            return ["error", "Error al borrar pregunta 17"];
                        }

                        if ($cont == 2) {
                            return ["success", "Pregunta 16 actualizada!"];
                        } else {
                            return ["error", "Error al guardar los datos!"];
                        }
                    } else {
                        return ["error", "Error al guardar datos!"];
                    }
                } else {
                    return ["warning", "Error dato no coincide"];
                }
            } else {
                if ($elementosProfesionalizacion == 1) {
                    $insertPregunta16 =
                        "INSERT INTO tbl_pregunta16_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Valor,
                        disposicionNormativa,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '1',
                        '$disposicionNormativa',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta16);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 16 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($elementosProfesionalizacion == 2) {
                    $insertPregunta16 =
                        "INSERT INTO tbl_pregunta16_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Valor,
                        disposicionNormativa,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '2',
                        '$disposicionNormativa',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta16);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 16 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($elementosProfesionalizacion == 9) {
                    $insertPregunta16 =
                        "INSERT INTO tbl_pregunta16_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Valor,
                        disposicionNormativa,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '9',
                        '$disposicionNormativa',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta16);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 16 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Error dato no coincide"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion17($idInstitucion, $nombreInstitucion, $checkServicio, $checkReclutamiento, $checkPruebas, $checkCurricular, $checkActualizacion, $checkValidacion, $checkConcursos, $checkMecanismos, $checkProgramas, $checkEvaluacion, $checkEstimulos, $checkSeparacion, $checkOtros, $otroEspecifico, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $comentarios = "";
            if ($otroEspecifico != "") {
                $comentarios = $comentarios . "Otro específico: " . $otroEspecifico;
            }
            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta17_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                #UPDATE
                $updateTablaPregunta17 =
                    "UPDATE tbl_pregunta17_2021
                    SET
                    servicioCivil = '" . $checkServicio . "',
                    Reclutamiento = '" . $checkReclutamiento . "',
                    diseñoSeleccion = '" . $checkPruebas . "',
                    diseñoCurricular = '" . $checkCurricular . "',
                    actualizacionPerfil = '" . $checkActualizacion . "',
                    diseñoValidacion = '" . $checkValidacion . "',
                    concursosPublicos = '" . $checkConcursos . "',
                    Mecanismos = '" . $checkMecanismos . "',
                    programasCapacitacion = '" . $checkProgramas . "',
                    evaluacionImpacto = '" . $checkEvaluacion . "',
                    programasEstimulos = '" . $checkEstimulos . "',
                    separacionServicio = '" . $checkSeparacion . "',
                    Otro = '" . $checkOtros . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta17);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 17 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos"];
                }
            } else {
                #INSERT
                $insertPregunta17 =
                    "INSERT INTO tbl_pregunta17_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        servicioCivil,
                        Reclutamiento,
                        diseñoSeleccion,
                        diseñoCurricular,
                        actualizacionPerfil,
                        diseñoValidacion,
                        concursosPublicos,
                        Mecanismos,
                        programasCapacitacion,
                        evaluacionImpacto,
                        programasEstimulos,
                        separacionServicio,
                        Otro,
                        comentariosValidacion,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '$checkServicio',
                        '$checkReclutamiento',
                        '$checkPruebas',
                        '$checkCurricular',
                        '$checkActualizacion',
                        '$checkValidacion',
                        '$checkConcursos',
                        '$checkMecanismos',
                        '$checkProgramas',
                        '$checkEvaluacion',
                        '$checkEstimulos',
                        '$checkSeparacion',
                        '$checkOtros',
                        '$comentarios',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta17);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 17 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion18($idInstitucion, $nombreInstitucion, $contabaConUnidadAdministrativa, $unidadAdministrativa, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta18_2021
                WHERE idInstitucion = '" . $idInstitucion . "' and Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                if ($contabaConUnidadAdministrativa == 1) {
                    $updateTablaPregunta18 =
                        "UPDATE tbl_pregunta18_2021
                        SET
                        Respuesta = '1',
                        nombreUnidad = '" . $unidadAdministrativa . "',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta18);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 18 actualizada!"];
                    } else {
                        return ["error", "Error al guardar datos!"];
                    }
                } else if ($contabaConUnidadAdministrativa == 2) {
                    $updateTablaPregunta18 =
                        "UPDATE tbl_pregunta18_2021
                        SET
                        Respuesta = '2',
                        nombreUnidad = '" . $unidadAdministrativa . "',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta18);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 18 actualizada!"];
                    } else {
                        return ["error", "Error al guardar datos!"];
                    }
                } else if ($contabaConUnidadAdministrativa == 9) {
                    $updateTablaPregunta18 =
                        "UPDATE tbl_pregunta18_2021
                        SET
                        Respuesta = '9',
                        nombreUnidad = '" . $unidadAdministrativa . "',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta18);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 18 actualizada!"];
                    } else {
                        return ["error", "Error al guardar datos!"];
                    }
                } else {
                    return ["warning", "Error dato no coincide"];
                }
            } else {
                if ($contabaConUnidadAdministrativa == 1) {
                    $insertPregunta18 =
                        "INSERT INTO tbl_pregunta18_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Respuesta,
                        nombreUnidad,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '1',
                        '$unidadAdministrativa',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta18);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 18 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($contabaConUnidadAdministrativa == 2) {
                    $insertPregunta18 =
                        "INSERT INTO tbl_pregunta18_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Respuesta,
                        nombreUnidad,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '2',
                        '$unidadAdministrativa',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta18);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 18 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($contabaConUnidadAdministrativa == 9) {
                    $insertPregunta18 =
                        "INSERT INTO tbl_pregunta18_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Respuesta,
                        nombreUnidad,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '9',
                        '$unidadAdministrativa',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta18);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 18 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Error dato no coincide"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion19($idInstitucion, $nombreInstitucion, $seImpartieronAcciones, $accionesImpartidas, $accionesImpartidasConcluidas, $totalPersonal, $totalHombres, $totalMujeres, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta19_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador)) {
                #UPDATE
                if ($seImpartieronAcciones == 1) {
                    $updateTablaPregunta19 =
                        "UPDATE tbl_pregunta19_2021
                        SET
                        Respuesta = '1',
                        accionesFormativas = '" . $accionesImpartidas . "',
                        accionesFormativasC = '" . $accionesImpartidasConcluidas . "',
                        Total = '" . $totalPersonal . "',
                        Hombres = '" . $totalHombres . "',
                        Mujeres = '" . $totalMujeres . "',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta19);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 19 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($seImpartieronAcciones == 2) {
                    $updateTablaPregunta19 =
                        "UPDATE tbl_pregunta19_2021
                        SET
                        Respuesta = '2',
                        accionesFormativas = '" . $accionesImpartidas . "',
                        accionesFormativasC = '" . $accionesImpartidasConcluidas . "',
                        Total = '" . $totalPersonal . "',
                        Hombres = '" . $totalHombres . "',
                        Mujeres = '" . $totalMujeres . "',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta19);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 19 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($seImpartieronAcciones == 9) {
                    $updateTablaPregunta19 =
                        "UPDATE tbl_pregunta19_2021
                        SET
                        Respuesta = '9',
                        -accionesFormativas = '" . $accionesImpartidas . "',
                        accionesFormativasC = '" . $accionesImpartidasConcluidas . "',
                        Total = '" . $totalPersonal . "',
                        Hombres = '" . $totalHombres . "',
                        Mujeres = '" . $totalMujeres . "',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta19);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 19 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Error detectado no es 1,2,9"];
                }
            } else {
                #INSERT
                if ($seImpartieronAcciones == 1) {
                    $insertPregunta19 =
                        "INSERT INTO tbl_pregunta19_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Respuesta,
                        accionesFormativas,
                        accionesFormativasC,
                        Total,
                        Hombres,
                        Mujeres,
                        comentariosPregunta,
                        `Status`,
                        Anio  
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '1',
                        '$accionesImpartidas',
                        '$accionesImpartidasConcluidas',
                        '$totalPersonal',
                        '$totalHombres',
                        '$totalMujeres',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta19);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 19 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($seImpartieronAcciones == 2) {
                    $insertPregunta19 =
                        "INSERT INTO tbl_pregunta19_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Respuesta,
                        accionesFormativas,
                        accionesFormativasC,
                        Total,
                        Hombres,
                        Mujeres,
                        comentariosPregunta,
                        `Status`,
                        Anio  
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '2',
                        '$accionesImpartidas',
                        '$accionesImpartidasConcluidas',
                        '$totalPersonal',
                        '$totalHombres',
                        '$totalMujeres',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta19);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 19 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($seImpartieronAcciones == 9) {
                    $insertPregunta19 =
                        "INSERT INTO tbl_pregunta19_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Respuesta,
                        accionesFormativas,
                        accionesFormativasC,
                        Total,
                        Hombres,
                        Mujeres,
                        comentariosPregunta,
                        `Status`,
                        Anio  
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '9',
                        '$accionesImpartidas',
                        '$accionesImpartidasConcluidas',
                        '$totalPersonal',
                        '$totalHombres',
                        '$totalMujeres',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta19);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 19 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Error detectado no es 1,2,9"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion24($idInstitucion, $nombreInstitucion, $totalInmuebles, $totalPropios, $totalRentados, $totalOtro, $otroEspecifico, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $comentarios = "";
            if ($otroEspecifico != "") {
                $comentarios = $comentarios . "Bienes inmuebles específicos: " . $otroEspecifico;
            }
            $preguntarSiExiste2 =
                "SELECT *FROM tbl_pregunta16
                WHERE idInst = '" . $idInstitucion . "' AND anio  ='" . $anioInstitucion . "'";


            $stmt2 = Connection::connect()->prepare($preguntarSiExiste2);
            $stmt2->execute();
            $contador2 = $stmt2->fetchAll();

            if (count($contador2) > 0) {
                $updateTablaPregunta24_2 =
                    "UPDATE tbl_pregunta16
                SET
                propios = '" . $totalPropios . "',
                retados = '" . $totalRentados . "',
                otro = '" . $totalOtro . "',
                total = '" . $totalInmuebles . "',
                comentariosValidacion = '" . $comentarios . "',
                comentariosPregunta = '" . $comentarioGeneral . "'
                WHERE
                idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                $stmt2 = Connection::connect()->prepare($updateTablaPregunta24_2);
                $cont = 0;
                if ($stmt2->execute()) {

                    # PREGUNTA 25
                    $borrarPregunta25 =
                        "DELETE FROM `tbl_pregunta16-1`
                        WHERE 
                        idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt2 = Connection::connect()->prepare($borrarPregunta25);
                    if ($stmt2->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "Error al borrar la pregunta 25"];
                    }

                    # PREGUNTA 26
                    $borrarPregunta26 =
                        "DELETE FROM `tbl_pregunta16-2_2021`
                        WHERE 
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt3 = Connection::connect()->prepare($borrarPregunta26);
                    if ($stmt3->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "Error al borrar la pregunta 26"];
                    }

                    # PREGUNTA 27
                    $borrarPregunta27 =
                        "DELETE FROM  `tbl_pregunta16-3`
                        WHERE 
                        idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt4 = Connection::connect()->prepare($borrarPregunta27);
                    if ($stmt4->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "Error al borrar la pregunta 27"];
                    }

                    # PREGUNTA 28
                    $borrarPregunta28 =
                        "DELETE FROM  `tbl_pregunta16-6`
                        WHERE 
                        idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt5 = Connection::connect()->prepare($borrarPregunta28);
                    if ($stmt5->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "Error al borrar la pregunta 28"];
                    }

                    # PREGUNTA 29
                    $borrarPregunta29 =
                        "DELETE FROM `tbl_pregunta16-7`
                     WHERE 
                     idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt6 = Connection::connect()->prepare($borrarPregunta29);
                    if ($stmt6->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "Error al borrar la pregunta 29"];
                    }

                    # PREGUNTA 30
                    $borrarPregunta30 =
                        "DELETE FROM  `tbl_pregunta28_2021`
                     WHERE 
                     idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt7 = Connection::connect()->prepare($borrarPregunta30);
                    if ($stmt7->execute()) {
                        $cont = $cont + 1;
                    } else {
                        return ["error", "Error al borrar la pregunta 30"];
                    }

                    if ($cont == 6) {
                        return ["success", "Pregunta 24 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta24_2 =
                    "INSERT INTO tbl_pregunta16
                    (
                        idInst,
                        nombreInst,
                        propios,
                        retados,
                        otro,
                        total,
                        comentariosValidacion,
                        comentariosPregunta, 
                        `Status`,
                        anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '$totalPropios',
                        '$totalRentados',
                        '$totalOtro',
                        '$totalInmuebles',
                        '$comentarios',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                $stmt2 = Connection::connect()->prepare($insertPregunta24_2);

                if ($stmt2->execute()) {
                    return ["success", "Pregunta 24 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion25($idInstitucion, $nombreInstitucion, $seContabilizaron, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM `tbl_pregunta16-1`
                WHERE idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                if ($seContabilizaron == 1) {
                    $updateTablaPregunta25 =
                        "UPDATE `tbl_pregunta16-1`
                        SET
                        opcion1 = '1',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta25);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 25 actualizada!"];
                    } else {
                        return ["error", "Error al gaurdar los datos!"];
                    }
                } else if ($seContabilizaron == 2) {
                    $updateTablaPregunta25 =
                        "UPDATE `tbl_pregunta16-1`
                        SET
                        opcion1 = '2',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta25);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 25 actualizada!"];
                    } else {
                        return ["error", "Error al gaurdar los datos!"];
                    }
                } else if ($seContabilizaron == 9) {
                    $updateTablaPregunta25 =
                        "UPDATE `tbl_pregunta16-1`
                        SET
                        opcion1 = '9',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta25);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 25 actualizada!"];
                    } else {
                        return ["error", "Error al gaurdar los datos!"];
                    }
                } else {
                    return ["warning", "Algo salio mal :("];
                }
            } else {
                if ($seContabilizaron == 1) {
                    $insertPregunta25 =
                        "INSERT INTO `tbl_pregunta16-1`
                        (
                            idIsnt,
                            nombreInst,
                            opcion1,
                            comentariosPregunta,
                            `Status`,
                            anio
                        )
                        VALUES
                        (
                            '$idInstitucion',
                            '$nombreInstitucion',
                            '1',
                            '$comentarioGeneral',
                            '$Status',
                            '$anioInstitucion'
                        )";

                    $stmt = Connection::connect()->prepare($insertPregunta25);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 25 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($seContabilizaron == 2) {
                    $insertPregunta25 =
                        "INSERT INTO `tbl_pregunta16-1`
                        (
                            idIsnt,
                            nombreInst,
                            opcion1,
                            comentariosPregunta,
                            `Status`,
                            anio
                        )
                        VALUES
                        (
                            '$idInstitucion',
                            '$nombreInstitucion',
                            '2',
                            '$comentarioGeneral',
                            '$Status',
                            '$anioInstitucion'
                        )";

                    $stmt = Connection::connect()->prepare($insertPregunta25);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 25 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($seContabilizaron == 9) {
                    $insertPregunta25 =
                        "INSERT INTO `tbl_pregunta16-1`
                        (
                            idIsnt,
                            nombreInst,
                            opcion1,
                            comentariosPregunta,
                            `Status`,
                            anio
                        )
                        VALUES
                        (
                            '$idInstitucion',
                            '$nombreInstitucion',
                            '9',
                            '$comentarioGeneral',
                            '$Status',
                            '$anioInstitucion'
                        )";

                    $stmt = Connection::connect()->prepare($insertPregunta25);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 25 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Algo salio mal :("];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL $e"];
        }
    }

    public static function insertQuestion26($idInstitucion, $nombreInstitucion, $totalInmuebles, $totalInmueblesPricipalEducativa, $totalInmueblesOtraPrincipal, $comoEscuelas1, $paraOtro1, $formaMixta1, $comoEscuelas2, $paraOtro2, $formaMixta2, $paraOtraFuncEducativaEspecifica,  $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            # FUNCTION ESPECIFICA IF
            $comentarios = "";
            if ($paraOtraFuncEducativaEspecifica != "") {
                $comentarios = $comentarios . "Función educativa específica:" . $paraOtraFuncEducativaEspecifica;
            }
            $preguntarSiExiste =
                "SELECT *FROM `tbl_pregunta16-2_2021`
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                #UPDATE
                $updateTablaPregunta26 =
                    "UPDATE `tbl_pregunta16-2_2021`
                    SET
                    totalInEdu = '" . $totalInmuebles . "',
                    escuelas = '" . $comoEscuelas1 . "',
                    funcionesEducativas= '" . $paraOtro1 . "',
                    formaMixta = '" . $formaMixta1 . "',
                    Total1 = '" . $totalInmueblesPricipalEducativa . "',
                    escuelas2 = '" . $comoEscuelas2 . "',
                    duncionesEducativas2 = '" . $paraOtro2 . "',
                    formaMixta2 = '" . $formaMixta2 . "',
                    Total2 = '$totalInmueblesOtraPrincipal',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta26);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 26 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                #INSERT
                $insertPregunta26 =
                    "INSERT INTO `tbl_pregunta16-2_2021`
                    (
                        idInstitucion,
                        nombreInstitucion,
                        totalInEdu,
                        escuelas,
                        funcionesEducativas,
                        formaMixta,
                        Total1,
                        escuelas2,
                        duncionesEducativas2,
                        formaMixta2,
                        Total2,
                        comentariosValidacion,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '$totalInmuebles',
                        '$comoEscuelas1',
                        '$paraOtro1',
                        '$formaMixta1',
                        '$totalInmueblesPricipalEducativa',
                        '$comoEscuelas2',
                        '$paraOtro2',
                        '$formaMixta2',
                        '$totalInmueblesOtraPrincipal',
                        '$comentarios',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";
                $stmt = Connection::connect()->prepare($insertPregunta26);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 26 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion27($idInstitucion, $nombreInstitucion, $opcion, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM `tbl_pregunta16-3`
                WHERE idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                if ($opcion == 1) {
                    $updateTablaPregunta27 =
                        "UPDATE `tbl_pregunta16-3`
                        SET
                        opcion1 = '1',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta27);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 27 actualizada!"];
                    } else {
                        return ["error", "Error al gaurdar los datos!"];
                    }
                } else if ($opcion == 2) {
                    $updateTablaPregunta27 =
                        "UPDATE `tbl_pregunta16-3`
                        SET
                        opcion1 = '2',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta27);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 27 actualizada!"];
                    } else {
                        return ["error", "Error al gaurdar los datos!"];
                    }
                } else if ($opcion == 9) {
                    $updateTablaPregunta27 =
                        "UPDATE `tbl_pregunta16-3`
                        SET
                        opcion1 = '9',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idIsnt = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta27);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 27 actualizada!"];
                    } else {
                        return ["error", "Error al gaurdar los datos!"];
                    }
                } else {
                    return ["warning", "Checar bd"];
                }
            } else {
                if ($opcion == 1) {
                    $insertPregunta27 =
                        "INSERT INTO `tbl_pregunta16-3`
                        (
                           idIsnt,
                           nombreInst,
                           opcion1,
                           comentariosPregunta,
                           `Status`,
                           anio 
                        )
                        VALUES
                        (
                            '$idInstitucion',
                            '$nombreInstitucion',
                            '1',
                            '$comentarioGeneral',
                            '$Status',
                            '$anioInstitucion'
                        )";

                    $stmt = Connection::connect()->prepare($insertPregunta27);

                    if ($stmt->execute()) {
                        return ["success", "Pregunta 27 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($opcion == 2) {
                    $insertPregunta27 =
                        "INSERT INTO `tbl_pregunta16-3`
                    (
                       idIsnt,
                       nombreInst,
                       opcion1,
                       comentariosPregunta,
                       `Status`,
                       anio 
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '2',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta27);

                    if ($stmt->execute()) {
                        return ["success", "Pregunta 27 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($opcion == 9) {
                    $insertPregunta27 =
                        "INSERT INTO `tbl_pregunta16-3`
                    (
                       idIsnt,
                       nombreInst,
                       opcion1,
                       comentariosPregunta,
                       `Status`,
                       anio 
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '9',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta27);

                    if ($stmt->execute()) {
                        return ["success", "Pregunta 27 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Checar bd"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion28($idInstitucion, $nombreInstitucion, $totalInmuebles, $totalInmueblesPricipalSalud, $totalInmueblesOtraPrincipal, $comoClinicas1, $comoCentrosDeSalud1, $comoHospitales1, $paraOtro1, $formaMixta1, $comoClinicas2, $comoCentrosDeSalud2, $comoHospitales2, $paraOtro2, $formaMixta2, $paraOtraFuncSaludEspecifica, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $comentarios = "";
            if ($paraOtraFuncSaludEspecifica != "") {
                $comentarios = $comentarios . "Función de salud específica: " . $paraOtraFuncSaludEspecifica;
            }

            $preguntarSiExiste =
                "SELECT *FROM `tbl_pregunta16-6`
                WHERE idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $numRows = $stmt->fetchAll();
            if (count($numRows) > 0) {
                #UPDATE
                $updateTablaPregunta28 =
                    "UPDATE `tbl_pregunta16-6`
                    SET
                    totalApFun = '" . $totalInmuebles . "',
                    totalClinicas = '" . $comoClinicas1 . "',
                    totalCentroSalud = '" . $comoCentrosDeSalud1 . "',
                    totalHospitales = '" . $comoHospitales1 . "',
                    funcionesSalud = '" . $paraOtro1 . "',
                    Mixta = '" . $formaMixta1 . "',
                    total = '" . $totalInmueblesPricipalSalud . "',
                    totalotrafunclinica = '" . $comoClinicas2 . "',
                    totalotrafuncsa = '" . $comoCentrosDeSalud2 . "',
                    totalotrafunchos = '" . $comoHospitales2 . "',
                    funcionesSalud2 = '" . $paraOtro2 . "',
                    Mixta2 = '" . $formaMixta2 . "',
                    totalgral = '" . $totalInmueblesOtraPrincipal . "',
                    Comentario = '" . $comentarios . "',
                    comentarios = '" . $comentarioGeneral . "'
                    WHERE
                    idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta28);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 28 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                #INSERT
                $insertPregunta28 =
                    "INSERT INTO `tbl_pregunta16-6`
                (
                    idInst,
                    nombreInst,
                    totalApFun,
                    totalClinicas,
                    totalCentroSalud,
                    totalHospitales,
                    funcionesSalud,
                    Mixta,
                    total,
                    totalotrafunclinica,
                    totalotrafuncsa,
                    totalotrafunchos,
                    funcionesSalud2,
                    Mixta2,
                    totalgral,
                    Comentario,
                    comentarios,
                    `Status`,
                    anio
                )
                VALUES
                (
                    '$idInstitucion',
                    '$nombreInstitucion',
                    '$totalInmuebles',
                    '$comoClinicas1',
                    '$comoCentrosDeSalud1',
                    '$comoHospitales1',
                    '$paraOtro1',
                    '$formaMixta1',
                    '$totalInmueblesPricipalSalud',
                    '$comoClinicas2',
                    '$comoCentrosDeSalud2',
                    '$comoHospitales2',
                    '$paraOtro2',
                    '$formaMixta2',
                    '$totalInmueblesOtraPrincipal',
                    '$comentarios',
                    '$comentarioGeneral',
                    '$Status',
                    '$anioInstitucion'
                )";

                $stmt = Connection::connect()->prepare($insertPregunta28);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 28 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL : $e"];
        }
    }
    public static function insertQuestion29($idInstitucion, $nombreInstitucion, $opcion, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM `tbl_pregunta16-7`
                WHERE idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                if ($opcion == 1) {
                    $updateTablaPregunta29 =
                        "UPDATE `tbl_pregunta16-7`
                        SET
                        opcion1 = '1',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta29);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 29 actualizada!"];
                    } else {
                        return ["error", "Error al gaurdar los datos!"];
                    }
                } else if ($opcion == 2) {
                    $updateTablaPregunta29 =
                        "UPDATE `tbl_pregunta16-7`
                        SET
                        opcion1 = '2',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta29);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 29 actualizada!"];
                    } else {
                        return ["error", "Error al gaurdar los datos!"];
                    }
                } else if ($opcion == 9) {
                    $updateTablaPregunta29 =
                        "UPDATE `tbl_pregunta16-7`
                        SET
                        opcion1 = '9',
                        comentariosPregunta = '" . $comentarioGeneral . "'
                        WHERE
                        idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt = Connection::connect()->prepare($updateTablaPregunta29);
                    if ($stmt->execute()) {
                        return ["success", "Pregunta 29 actualizada!"];
                    } else {
                        return ["error", "Error al gaurdar los datos!"];
                    }
                } else {
                    return ["warning", "Checar bd"];
                }
            } else {
                if ($opcion == 1) {
                    $insertPregunta29 =
                        "INSERT INTO `tbl_pregunta16-7`
                        (
                           idInst,
                           nombreInst,
                           opcion1,
                           comentariosPregunta,
                           `Status`,
                           anio 
                        )
                        VALUES
                        (
                            '$idInstitucion',
                            '$nombreInstitucion',
                            '1',
                            '$comentarioGeneral',
                            '$Status',
                            '$anioInstitucion'
                        )";

                    $stmt = Connection::connect()->prepare($insertPregunta29);

                    if ($stmt->execute()) {
                        return ["success", "Pregunta 29 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($opcion == 2) {
                    $insertPregunta29 =
                        "INSERT INTO `tbl_pregunta16-7`
                    (
                       idInst,
                       nombreInst,
                       opcion1,
                       comentariosPregunta,
                       `Status`,
                       anio 
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '2',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta29);

                    if ($stmt->execute()) {
                        return ["success", "Pregunta 29 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else if ($opcion == 9) {
                    $insertPregunta29 =
                        "INSERT INTO `tbl_pregunta16-7`
                    (
                       idInst,
                       nombreInst,
                       opcion1,
                       comentariosPregunta,
                       `Status`,
                       anio 
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '9',
                        '$comentarioGeneral',
                        '$Status',
                        '$anioInstitucion'
                    )";

                    $stmt = Connection::connect()->prepare($insertPregunta29);

                    if ($stmt->execute()) {
                        return ["success", "Pregunta 29 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["warning", "Checar bd"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion30($idInstitucion, $nombreInstitucion, $totalInmuebles, $totalInmueblesPricipalDeportes, $totalInmueblesOtraPrincipal, $destinadosActFisicas1, $destinadosRecreacionFisica1, $destinadosDeporte1, $destinadosDeporteAltoRendimiento1, $destinadosEventos1, $paraOtro1, $destinadosIndistintos1, $destinadosActFisicas2, $destinadosRecreacionFisica2, $destinadosDeporte2, $destinadosDeporteAltoRendimiento2, $destinadosEventos2, $paraOtro2, $destinadosIndistintos2, $paraOtraFuncSaludEspecifica, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $comentarios = "";
            if ($paraOtraFuncSaludEspecifica != "") {
                $comentarios = $comentarios . "Función salud específica: " . $paraOtraFuncSaludEspecifica;
            }

            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta28_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                # UPDATE
                $updateTablaPregunta30 =
                    "UPDATE tbl_pregunta28_2021
                    SET
                    totalGeneral = '" . $totalInmuebles . "',
                    activacionFisica = '" . $destinadosActFisicas1 . "',
                    recreacionFisica = '" . $destinadosRecreacionFisica1 . "',
                    deporteSocial = '" . $destinadosDeporte1 . "',
                    altoRendimiento = '" . $destinadosDeporteAltoRendimiento1 . "',
                    eventosDeportivos = '" . $destinadosEventos1 . "',
                    Otros = '" . $paraOtro1 . "',
                    Indistinciones = '" . $destinadosIndistintos1 . "',
                    Total = '" . $totalInmueblesPricipalDeportes . "',
                    activacionFisica2 = '" . $destinadosActFisicas2 . "',
                    recreacionFisica2 = '" . $destinadosRecreacionFisica2 . "',
                    deporteSocial2 = '" . $destinadosDeporte2 . "',
                    altoRendimiento2 = '" . $destinadosDeporteAltoRendimiento2 . "',
                    eventosDeportivos2 = '" . $destinadosEventos2 . "',
                    Otros2 = '" . $paraOtro2 . "',
                    Indistinciones2 = '" . $destinadosIndistintos2 . "',
                    Total2 = '" . $totalInmueblesOtraPrincipal . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta30);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 30 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                # INSERT
                $insertPregunta30 =
                    "INSERT INTO tbl_pregunta28_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        totalGeneral,
                        activacionFisica,
                        recreacionFisica,
                        deporteSocial,
                        altoRendimiento,
                        eventosDeportivos,
                        Otros,
                        Indistinciones,
                        Total,
                        activacionFisica2,
                        recreacionFisica2,
                        deporteSocial2,
                        altoRendimiento2,
                        eventosDeportivos2,
                        Otros2,
                        Indistinciones2,
                        Total2,
                        comentariosValidacion,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '$totalInmuebles', 
                        '$destinadosActFisicas1', 
                        '$destinadosRecreacionFisica1', 
                        '$destinadosDeporte1', 
                        '$destinadosDeporteAltoRendimiento1', 
                        '$destinadosEventos1', 
                        '$paraOtro1', 
                        '$destinadosIndistintos1',
                        '$totalInmueblesPricipalDeportes', 
                        '$destinadosActFisicas2', 
                        '$destinadosRecreacionFisica2', 
                        '$destinadosDeporte2', 
                        '$destinadosDeporteAltoRendimiento2', 
                        '$destinadosEventos2', 
                        '$paraOtro2', 
                        '$destinadosIndistintos2', 
                        '$totalInmueblesOtraPrincipal', 
                        '$comentarios', 
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta30);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 30 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion31($idInstitucion, $nombreInstitucion, $totalGeneral, $totalAutomoviles, $totalCamionesCamionetas, $totalMotocicletas, $totalBicicletas, $totalHelicopteros, $totalDrones, $totalOtros, $otroEspecifico, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $comentarios = "";

            if ($otroEspecifico != "") {
                $comentarios = $comentarios . "Otro vehículo en específico: " . $otroEspecifico;
            }

            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta18
            WHERE
            idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                #UPDATE
                $updateTablaPregunta31 =
                    "UPDATE tbl_pregunta18
                    SET
                    automoviles = '" . $totalAutomoviles . "',
                    camionetas = '" . $totalCamionesCamionetas . "',
                    motocicletas = '" . $totalMotocicletas . "',
                    bicicletas = '" . $totalBicicletas . "',
                    helicopteros = '" . $totalHelicopteros . "',
                    drones = '" . $totalDrones . "',
                    otro = '" . $totalOtros . "',
                    total = '" . $totalGeneral . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta31);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 31 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta31 =
                    "INSERT INTO tbl_pregunta18
                (
                    idInst,
                    nombreInst,
                    automoviles,
                    camionetas,
                    motocicletas,
                    bicicletas,
                    helicopteros,
                    drones,
                    otro,
                    total,
                    comentariosValidacion,
                    comentariosPregunta,
                    `Status`,
                    anio
                )
                VALUES
                (
                    '$idInstitucion', 
                    '$nombreInstitucion',  
                    '$totalAutomoviles', 
                    '$totalCamionesCamionetas', 
                    '$totalMotocicletas', 
                    '$totalBicicletas', 
                    '$totalHelicopteros', 
                    '$totalDrones', 
                    '$totalOtros', 
                    '$totalGeneral',
                    '$comentarios', 
                    '$comentarioGeneral', 
                    '$Status', 
                    '$anioInstitucion'
                )";

                $stmt = Connection::connect()->prepare($insertPregunta31);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 31 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
        }
    }
    public static function insertQuestion32($idInstitucion, $nombreInstitucion, $totalLineasFijas, $totalLineasMoviles, $totalLineas, $totalAparatosFijos, $totalAparatosMoviles, $totalAparatos, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta20
                WHERE
                idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                # UPDATE
                $updateTablaPregunta32 =
                    "UPDATE tbl_pregunta20
                SET
                lineasfijas = '" . $totalLineasFijas . "',
                lineasmoviles = '" . $totalLineasMoviles . "',
                total1 = '" . $totalLineas . "',
                aparatosfijos = '" . $totalAparatosFijos . "',
                aparatosmoviles = '" . $totalAparatosMoviles . "',
                total2 = '" . $totalAparatos . "',
                comentariosPregunta = '" . $comentarioGeneral . "'
                WHERE
                idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta32);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 32 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta32 =
                    "INSERT INTO tbl_pregunta20
                (
                    idInst,
                    nombreInst,
                    lineasfijas,
                    lineasmoviles,
                    total1,
                    aparatosfijos,
                    aparatosmoviles,
                    total2,
                    comentariosPregunta,
                    `Status`,
                    anio
                )
                VALUES(
                    '$idInstitucion', 
                    '$nombreInstitucion', 
                    '$totalLineasFijas', 
                    '$totalLineasMoviles', 
                    '$totalLineas', 
                    '$totalAparatosFijos', 
                    '$totalAparatosMoviles', 
                    '$totalAparatos', 
                    '$comentarioGeneral', 
                    '$Status', 
                    '$anioInstitucion'
                )";

                $stmt = Connection::connect()->prepare($insertPregunta32);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 32 guardada!"];
                } else {
                    return ["error", "Error al guardar datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion33($idInstitucion, $nombreInstitucion, $totalComputadoraPersonal, $totalComputadoraPortatil, $totalComputadoras, $totalImpresoraPersonal, $totalImpresoraCompartida, $totalImpresoras, $totalMultifuncionales, $totalServidores, $totalTabletas, $contoConServicios, $comentarioGeneral, $Status, $anioInstitucion, $contoConServiciosEspecifico)
    {
        try {
            $comentarios = "";
            if ($contoConServiciosEspecifico != "") {
                $comentarios = $comentarios . "Especificación: " . $contoConServiciosEspecifico;
            }
            $preguntarSiExiste =
                "SELECT *FROM tbl_pregunta22
                WHERE
                idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $cont = $stmt->fetchAll();
            $con = 0;
            if (count($cont) > 0) {
                # UPDATE    
                $updateTablaPregunta33 =
                    "UPDATE tbl_pregunta22
                    SET
                    cumpuEscritorio = '" . $totalComputadoraPersonal . "',
                    compuPortatil = '" . $totalComputadoraPortatil . "',
                    totalC = '" . $totalComputadoras . "',
                    impresoraPersonal = '" . $totalImpresoraPersonal . "',
                    impresoraCompartida = '" . $totalImpresoraCompartida . "',
                    totalI = '" . $totalImpresoras . "',
                    multifuncionales = '" . $totalMultifuncionales . "',
                    servidores = '" . $totalServidores . "',
                    tabletas = '" . $totalTabletas . "',
                    conexionRemota = '" . $contoConServicios . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta33);
                if ($stmt->execute()) {

                    # PREGUNTA 34
                    $borrarPregunta34 =
                        "DELETE FROM `tbl_pregunta22-1`
                        WHERE 
                        idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                    $stmt2 = Connection::connect()->prepare($borrarPregunta34);
                    if ($stmt2->execute()) {
                        $con++;
                    } else {
                        return ["error", "Error al borrar la pregunta 34"];
                    }

                    # PREGUNTA 35
                    $borrarPregunta35 =
                        "DELETE FROM `tbl_pregunta22-2_2021`
                        WHERE 
                        idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt3 = Connection::connect()->prepare($borrarPregunta35);
                    if ($stmt3->execute()) {
                        $con++;
                    } else {
                        return ["error", "Error al borrar la pregunta 35"];
                    }

                    if ($con == 2) {
                        return ["success", "Pregunta 33 actualizada"];
                    } else {
                        return ["error", "Error al guardar datos eeeee!"];
                    }
                } else {
                    return ["error", "Error al guardar datos!"];
                }
            } else {
                #INSERT
                $insertPregunta33 =
                    "INSERT INTO tbl_pregunta22
                (
                    idInst,
                    nombreInst,
                    cumpuEscritorio,
                    compuPortatil,
                    totalC,
                    impresoraPersonal,
                    impresoraCompartida,
                    totalI,
                    multifuncionales,
                    servidores,
                    tabletas,
                    conexionRemota,
                    comentariosValidacion,
                    comentariosPregunta,
                    `Status`,
                    anio
                )
                VALUES
                (
                    '$idInstitucion', 
                    '$nombreInstitucion', 
                    '$totalComputadoraPersonal', 
                    '$totalComputadoraPortatil', 
                    '$totalComputadoras', 
                    '$totalImpresoraPersonal', 
                    '$totalImpresoraCompartida', 
                    '$totalImpresoras', 
                    '$totalMultifuncionales', 
                    '$totalServidores', 
                    '$totalTabletas', 
                    '$contoConServicios', 
                    '$comentarios',
                    '$comentarioGeneral', 
                    '$Status', 
                    '$anioInstitucion'
                )";

                $stmt = Connection::connect()->prepare($insertPregunta33);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 33 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion34($idInstitucion, $nombreInstitucion, $seContabilizaron, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $c = 0;
            $respuesta = "";
            if ($seContabilizaron == 1) {
                $respuesta = "1";
                #PREGUNTA 35
                $borrarPregunta35 =
                    "DELETE FROM `tbl_pregunta22-2_2021`
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($borrarPregunta35);
                if ($stmt->execute()) {
                    $c++;
                } else {
                    return ["error", "error al borrar pregunta 35"];
                }
            } else if ($seContabilizaron == 2) {
                $respuesta = "2";

                #PREGUNTA 35
                $borrarPregunta35 =
                    "DELETE FROM `tbl_pregunta22-2_2021`
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($borrarPregunta35);
                if ($stmt->execute()) {
                    $c++;
                } else {
                    return ["error", "error al borrar pregunta 35"];
                }
            } else if ($seContabilizaron == 9) {
                $respuesta = "9";
                #PREGUNTA 35
                $borrarPregunta35 =
                    "DELETE FROM `tbl_pregunta22-2_2021`
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($borrarPregunta35);
                if ($stmt->execute()) {
                    $c++;
                } else {
                    return ["error", "error al borrar pregunta 35"];
                }
            }

            $preguntarSiExiste =
                "SELECT *FROM `tbl_pregunta22-1`
                WHERE
                idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                # UPDATE
                $updateTablaPregunta34 =
                    "UPDATE `tbl_pregunta22-1`
                    SET
                    opcion1 = '" . $respuesta . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInst = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta34);
                if ($stmt->execute()) {
                    if ($c == 1) {
                        return ["success", "Pregunta 34 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                #INSERT
                $insertPregunta34 =
                    "INSERT INTO `tbl_pregunta22-1`
                    (
                        idInst,
                        nombreInst,
                        opcion1,
                        comentariosPregunta,
                        `Status`,
                        anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '$respuesta', 
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta34);
                if ($stmt->execute()) {
                    if ($c == 1) {
                        return ["success", "Pregunta 34 guardada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion35($idInstitucion, $nombreInstitucion, $totalComputadorasEducacion, $totalComputadorasOtra, $totalComputadoras, $totalImpresorasEducacion, $totalImpresorasOtra, $totalImpresoras, $totalMultifuncionalesEducacion, $totalMultifuncionalesOtra, $totalMultifuncionales, $totalServidoresEducacion, $totalServidoresOtra, $totalServidores, $totalTabletasEducacion, $totalTabletasOtra, $totalTabletas, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM `tbl_pregunta22-2_2021`
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                # UPDATE
                $updateTablaPregunta35 =
                    "UPDATE `tbl_pregunta22-2_2021`
                    SET
                    educacion1 = '" . $totalComputadorasEducacion . "',
                    principal1 = '" . $totalComputadorasOtra . "',
                    total1 = '" . $totalComputadoras . "',
                    educacion2 = '" . $totalImpresorasEducacion . "',
                    principal2 = '" . $totalImpresorasOtra . "',
                    total2 = '" . $totalImpresoras . "',
                    educacion3 = '" . $totalMultifuncionalesEducacion . "',
                    principal3 = '" . $totalMultifuncionalesOtra . "',
                    total3 = '" . $totalMultifuncionales . "',
                    educacionBasica = '" . $totalServidoresEducacion . "',
                    principal4 = '" . $totalServidoresOtra . "',
                    total4 = '" . $totalServidores . "',
                    educacionBasica2 = '" . $totalTabletasEducacion . "',
                    principal5 = '" . $totalTabletasOtra . "',
                    total6 = '" . $totalTabletas . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta35);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 35 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                #INSERT
                $insertPregunta35 =
                    "INSERT INTO `tbl_pregunta22-2_2021`
                    (
                        idInstitucion,
                        nombreInstitucion,
                        educacion1,
                        principal1,
                        total1,
                        educacion2,
                        principal2,
                        total2,
                        educacion3,
                        principal3,
                        total3,
                        educacionBasica,
                        principal4,
                        total4,
                        educacionBasica2,
                        principal5,
                        total6,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '$totalComputadorasEducacion', 
                        '$totalComputadorasOtra', 
                        '$totalComputadoras', 
                        '$totalImpresorasEducacion', 
                        '$totalImpresorasOtra', 
                        '$totalImpresoras', 
                        '$totalMultifuncionalesEducacion', 
                        '$totalMultifuncionalesOtra', 
                        '$totalMultifuncionales', 
                        '$totalServidoresEducacion', 
                        '$totalServidoresOtra', 
                        '$totalServidores', 
                        '$totalTabletasEducacion', 
                        '$totalTabletasOtra', 
                        '$totalTabletas', 
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta35);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 35 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function preguntaComplemento($idInstitucion, $nombreInstitucion, $totalPersonal, $totalHombres, $totalMujeres, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tbl_complemento_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = $stmt->fetchAll();
            if (count($c) > 0) {
                $updateComplemento =
                    "UPDATE tbl_complemento_2021
                    SET
                    Total = '" . $totalPersonal . "',
                    totalHombres = '" . $totalHombres . "',
                    totalMujeres = '" . $totalMujeres . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateComplemento);
                if ($stmt->execute()) {
                    return ["success", "Pregunta complemento actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertComplemento =
                    "INSERT INTO tbl_complemento_2021
                (
                    idInstitucion,
                    nombreInstitucion,
                    Total,
                    totalHombres,
                    totalMujeres,
                    comentariosPregunta,
                    `Status`,
                    Anio
                )
                VALUES
                (
                    '$idInstitucion', 
                    '$nombreInstitucion', 
                    '$totalPersonal', 
                    '$totalHombres', 
                    '$totalMujeres', 
                    '$comentarioGeneral', 
                    '$Status',
                    '$anioInstitucion'
                )";

                $stmt = Connection::connect()->prepare($insertComplemento);
                if ($stmt->execute()) {
                    return ["success", "Pregunta complemento guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL $e"];
        }
    }

    # ------------------------------ SECCION 12 -----------------------------------#

    public static function contabaConDisposicionP1($idInstitucion, $anioInstitucion)
    {
        try {
            $contabaOno =
                "SELECT *FROM tblpregunta1_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($contabaOno);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dato = $row['Respuesta'];
                }

                if ($dato == "1") {
                    return ["success", true];
                } else {
                    return ["success", false];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function contabaConDisposicion2P1($idInstitucion, $anioInstitucion)
    {
        try {
            $contabaOno =
                "SELECT *FROM tblpregunta1_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($contabaOno);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dato = $row['Respuesta2'];
                }

                if ($dato == "1") {
                    return ["success", true];
                } else {
                    return ["success", false];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function cuentaSistemaElectronico($idInstitucion, $anioInstitucion)
    {
        try {
            $cuentaOno = "SELECT * FROM tblpregunta4_2021 WHERE idInstitucion='" . $idInstitucion . "' AND Anio='" . $anioInstitucion . "'";
            $stmt = Connection::connect()->prepare($cuentaOno);

            if ($stmt->execute()) {
                $respuesta = $stmt->fetchAll();

                if (count($respuesta) == 0) {
                    return ["success", "noContestada"];
                } else {
                    if ($respuesta[0]['Respuesta'] == 1) {
                        return ["success", true];
                    } else if ($respuesta[0]['Respuesta'] == 2 || $respuesta[0]['Respuesta'] == 3 || $respuesta[0]['Respuesta'] == 9) {
                        return ["success", false];
                    }
                }
            } else {
                return ["error", "Intentelo denuevo"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function procedimientosContratacion($idInstitucion, $anioInstitucion)
    {
        try {
            $resp1 = false;
            $resp2 = false;
            $resp3 = false;
            $resp4 = false;
            $resp5 = false;

            $respuesta =
                "SELECT *FROM tblpregunta2_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($respuesta);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dato1 = $row['AdjudicacionDirecta'];
                    $dato2 = $row['adjudicacionDirecta2'];
                    $dato3 = $row['Invitacion'];
                    $dato4 = $row['Invitacion2'];
                    $dato5 = $row['licitacionPublicaN'];
                    $dato6 = $row['licitacionPublicaN2'];
                    $dato7 = $row['licitacionPublicaI'];
                    $dato8 = $row['licitacionPublicaI2'];
                    $dato9 = $row['Otro'];
                    $dato10 = $row['Otro2'];
                }

                if ($dato1 != "" || $dato2 != "") {
                    $resp1 = true;
                } else if ($dato1 != "" && $dato2 != "") {
                    $resp1 = true;
                } else {
                    $resp1 = false;
                }

                if ($dato3 != "" || $dato4 != "") {
                    $resp2 = true;
                } else if ($dato3 != "" && $dato4 != "") {
                    $resp2 = true;
                } else {
                    $resp2 = false;
                }

                if ($dato5 != "" || $dato6 != "") {
                    $resp3 = true;
                } else if ($dato5 != "" && $dato6 != "") {
                    $resp3 = true;
                } else {
                    $resp3 = false;
                }

                if ($dato7 != "" || $dato8 != "") {
                    $resp4 = true;
                } else if ($dato7 != "" && $dato8 != "") {
                    $resp4 = true;
                } else {
                    $resp4 = false;
                }

                if ($dato9 != "" || $dato10 != "") {
                    $resp5 = true;
                } else if ($dato9 != "" && $dato10 != "") {
                    $resp5 = true;
                } else {
                    $resp5 = false;
                }

                return ["success", $resp1, $resp2, $resp3, $resp4, $resp5];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function totalContratos($idInstitucion, $anioInstitucion)
    {
        try {
            $totalContratos =
                "SELECT *FROM tblpregunta7_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($totalContratos);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $contratos1 = $row['contratosReaiizados'];
                    $contratos2 = $row['contratosRealizados2'];
                    $contratos3 = $row['contratosRealizados3'];
                    $contratos4 = $row['contratosRealizados4'];
                    $contratos5 = $row['contratosRealizados5'];
                }

                return ["success", $contratos1, $contratos2, $contratos3, $contratos4, $contratos5];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function obtenerMontos($idInstitucion, $anioInstitucion)
    {
        try {
            $obtenerMontos =
                "SELECT *FROM tblpregunta9_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($obtenerMontos);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $monto1 = $row['montoAsociado'];
                    $monto2 = $row['montoAsociado2'];
                    $monto3 = $row['montoAsociado3'];
                    $monto4 = $row['montoAsociado4'];
                    $monto5 = $row['montoAsociado5'];
                }

                return ["success", $monto1, $monto2, $monto3, $monto4, $monto5];
            }
        } catch (Exception $e) {
        }
    }
    public static function insertQuestion1_12($idInstitucion, $nombreInstitucion, $contabaConDisposicion1, $nombreDisposicion1, $contabaConDisposicion2, $nombreDisposicion2, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tblpregunta1_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = 0;
            $con = $stmt->fetchAll();
            if (count($con) > 0) {
                $updateTablaPregunta1_12 =
                    "UPDATE tblpregunta1_2021
                    SET
                    Respuesta = '" . $contabaConDisposicion1 . "',
                    nombreDependencia = '" . $nombreDisposicion1 . "',
                    Respuesta2 = '" . $contabaConDisposicion2 . "',
                    nombreDependencia2 = '" . $nombreDisposicion2 . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta1_12);
                if ($stmt->execute()) {

                    #BORRAR PREGUNTAS

                    # PREGUNTA 2
                    $borrarPregunta2 =
                        "DELETE FROM tblpregunta2_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt2 = Connection::connect()->prepare($borrarPregunta2);
                    if ($stmt2->execute()) {
                        $c++;
                    } else {
                        return ["warning", "Pregunta 2 no elminada!"];
                    }

                    # PREGUNTA 3
                    $borrarPregunta3 =
                        "DELETE FROM tblpregunta3_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt3 = Connection::connect()->prepare($borrarPregunta3);
                    if ($stmt3->execute()) {
                        $c++;
                    } else {
                        return ["warning", "Pregunta 3 no elminada!"];
                    }

                    # PREGUNTA 7
                    $borrarPregunta7 =
                        "DELETE FROM tblpregunta7_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt4 = Connection::connect()->prepare($borrarPregunta7);
                    if ($stmt4->execute()) {
                        $c++;
                    } else {
                        return ["warning", "Pregunta 7 no elminada!"];
                    }

                    # PREGUNTA 8
                    $borrarPregunta8 =
                        "DELETE FROM tblpregunta8_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt5 = Connection::connect()->prepare($borrarPregunta8);
                    if ($stmt5->execute()) {
                        $c++;
                    } else {
                        return ["warning", "Pregunta 8 no elminada!"];
                    }

                    # PREGUNTA 9
                    $borrarPregunta9 =
                        "DELETE FROM tblpregunta9_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt6 = Connection::connect()->prepare($borrarPregunta9);
                    if ($stmt6->execute()) {
                        $c++;
                    } else {
                        return ["warning", "Pregunta 9 no elminada!"];
                    }

                    # PREGUNTA 10
                    $borrarPregunta10 =
                        "DELETE FROM tblpregunta10_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt7 = Connection::connect()->prepare($borrarPregunta10);
                    if ($stmt7->execute()) {
                        $c++;
                    } else {
                        return ["warning", "Pregunta 10 no elminada!"];
                    }

                    if ($c == 6) {
                        return ["success", "Pregunta 1 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta1_12 =
                    "INSERT INTO tblpregunta1_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        tipoMateria,
                        Respuesta,
                        nombreDependencia,
                        tipoMateria2,
                        Respuesta2,
                        nombreDependencia2,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '1',
                        '$contabaConDisposicion1', 
                        '$nombreDisposicion1', 
                        '2',
                        '$contabaConDisposicion2',                     
                        '$nombreDisposicion2', 
                        '$comentarioGeneral',
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta1_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 1 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion2_12($idInstitucion, $nombreInstitucion, $checkNoAplica1, $checkAdjudicacion1, $checkInvitacion1, $checkLicitacionNacional1, $checkLicitacionInternacional1, $checkOtroProcedimiento1, $checkNoAplica2, $checkAdjudicacion2, $checkInvitacion2, $checkLicitacionNacional2, $checkLicitacionInternacional2, $checkOtroProcedimiento2, $checkOtroEspecifico1, $checkOtroEspecifico2, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {

            $array = array();
            $comentarios = "";

            if ($checkOtroEspecifico1 != "") {
                $array[] = "Otro procedimiento específico 1: " . $checkOtroEspecifico1;
            }

            if ($checkOtroEspecifico2 != "") {
                $array[] = "Otro procedimiento específico 2: " . $checkOtroEspecifico2;
            }

            foreach ($array as $value) {
                $comentarios .= $value . ", ";
            }
            $comentarios = substr($comentarios, 0, -2);
            $comentarios .= ".";

            $preguntarSiExiste =
                "SELECT *FROM tblpregunta2_2021 
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            $c = 0;
            if (count($contador) > 0) {
                $updateTablaPregunta2_12 =
                    "UPDATE tblpregunta2_2021
                    SET
                    Condicion = '" . $checkNoAplica1 . "',
                    AdjudicacionDirecta = '" . $checkAdjudicacion1 . "',
                    Invitacion = '" . $checkInvitacion1 . "',
                    licitacionPublicaN = '" . $checkLicitacionNacional1 . "',
                    licitacionPublicaI = '" . $checkLicitacionInternacional1 . "',
                    Otro = '" . $checkOtroProcedimiento1 . "',
                    Condicion2 = '" . $checkNoAplica2 . "',
                    adjudicacionDirecta2 = '" . $checkAdjudicacion2 . "',
                    Invitacion2 = '" . $checkInvitacion2 . "',
                    licitacionPublicaN2 = '" . $checkLicitacionNacional2 . "',
                    licitacionPublicaI2 = '" . $checkLicitacionInternacional2 . "',
                    Otro2 = '" . $checkOtroProcedimiento2 . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta2_12);
                if ($stmt->execute()) {

                    # PREGUNTA 7
                    $borrarPregunta7 =
                        "DELETE FROM tblpregunta7_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt4 = Connection::connect()->prepare($borrarPregunta7);
                    if ($stmt4->execute()) {
                        $c++;
                    } else {
                        return ["warning", "Pregunta 7 no elminada!"];
                    }

                    # PREGUNTA 8
                    $borrarPregunta8 =
                        "DELETE FROM tblpregunta8_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt5 = Connection::connect()->prepare($borrarPregunta8);
                    if ($stmt5->execute()) {
                        $c++;
                    } else {
                        return ["warning", "Pregunta 8 no elminada!"];
                    }

                    # PREGUNTA 9
                    $borrarPregunta9 =
                        "DELETE FROM tblpregunta9_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt6 = Connection::connect()->prepare($borrarPregunta9);
                    if ($stmt6->execute()) {
                        $c++;
                    } else {
                        return ["warning", "Pregunta 9 no elminada!"];
                    }

                    # PREGUNTA 10
                    $borrarPregunta10 =
                        "DELETE FROM tblpregunta10_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt7 = Connection::connect()->prepare($borrarPregunta10);
                    if ($stmt7->execute()) {
                        $c++;
                    } else {
                        return ["warning", "Pregunta 10 no elminada!"];
                    }
                    if ($c == 4) {
                        return ["success", "Pregunta 2 actualizada!"];
                    } else {
                        return ["warning", "Error al guardar los datos!"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta2_12 =
                    "INSERT INTO tblpregunta2_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        TipoMateria,
                        Condicion,
                        AdjudicacionDirecta,
                        Invitacion,
                        licitacionPublicaN,
                        licitacionPublicaI,
                        Otro,
                        tipoMateria2,
                        Condicion2,
                        adjudicacionDirecta2,
                        Invitacion2,
                        licitacionPublicaN2,
                        licitacionPublicaI2,
                        Otro2,
                        comentariosValidacion,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion',
                        '1', 
                        '$checkNoAplica1', 
                        '$checkAdjudicacion1', 
                        '$checkInvitacion1', 
                        '$checkLicitacionNacional1', 
                        '$checkLicitacionInternacional1', 
                        '$checkOtroProcedimiento1', 
                        '2',
                        '$checkNoAplica2', 
                        '$checkAdjudicacion2', 
                        '$checkInvitacion2', 
                        '$checkLicitacionNacional2', 
                        '$checkLicitacionInternacional2', 
                        '$checkOtroProcedimiento2', 
                        '$comentarios',
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";
                $stmt = Connection::connect()->prepare($insertPregunta2_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 2 guardada!e"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
        }
    }

    public static function insertQuestion3_12($idInstitucion, $nombreInstitucion, $checkNoAplica1, $contabaMecanismo1, $checkMecanismo1tipo1, $checkMecanismo2tipo1, $checkMecanismo3tipo1, $checkMecanismo4tipo1, $checkMecanismo5tipo1, $checkMecanismo6tipo1, $checkMecanismo7tipo1, $checkMecanismo8tipo1, $checkMecanismo9tipo1, $checkMecanismo10tipo1, $checkMecanismo11tipo1, $checkMecanismo12tipo1, $checkMecanismo13tipo1, $checkMecanismo14tipo1, $checkMecanismo15tipo1, $checkMecanismo16tipo1, $checkNoAplica2, $contabaMecanismo2, $checkMecanismo1tipo2, $checkMecanismo2tipo2, $checkMecanismo3tipo2, $checkMecanismo4tipo2, $checkMecanismo5tipo2, $checkMecanismo6tipo2, $checkMecanismo7tipo2, $checkMecanismo8tipo2, $checkMecanismo9tipo2, $checkMecanismo10tipo2, $checkMecanismo11tipo2, $checkMecanismo12tipo2, $checkMecanismo13tipo2, $checkMecanismo14tipo2, $checkMecanismo15tipo2, $checkMecanismo16tipo2, $checkOtroEspecifico1, $checkOtroEspecifico2, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {

            $comentarios = "";
            $array = array();

            if ($checkOtroEspecifico1 != "") {
                $array[] = "Mecasnismo de salvaguarda institucional específico 1: " . $checkOtroEspecifico1;
            }
            if ($checkOtroEspecifico2 != "") {
                $array[] = "Mecanismo de salvaguarda institucional específico 2: " . $checkOtroEspecifico2;
            }

            foreach ($array as $value) {
                $comentarios .= $value . ", ";
            }
            $comentarios = substr($comentarios, 0, -2);
            $comentarios .= ".";

            $preguntarSiExiste =
                "SELECT *FROM tblpregunta3_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $con = $stmt->fetchAll();
            if (count($con) > 0) {
                $updateTablaPregunta3_12 =
                    "UPDATE tblpregunta3_2021
                    SET
                    Condicion = '" . $checkNoAplica1 . "',
                    Respuesta = '" . $contabaMecanismo1 . "',
                    Uno = '" . $checkMecanismo1tipo1 . "',
                    Dos = '" . $checkMecanismo2tipo1 . "',
                    Tres = '" . $checkMecanismo3tipo1 . "',
                    Cuatro = '" . $checkMecanismo4tipo1 . "',
                    Cinco = '" . $checkMecanismo5tipo1 . "',
                    Seis = '" . $checkMecanismo6tipo1 . "',
                    Siete = '" . $checkMecanismo7tipo1 . "',
                    Ocho = '" . $checkMecanismo8tipo1 . "',
                    Nueve = '" . $checkMecanismo9tipo1 . "',
                    Diez = '" . $checkMecanismo10tipo1 . "',
                    Once = '" . $checkMecanismo11tipo1 . "',
                    Doce = '" . $checkMecanismo12tipo1 . "',
                    Trece = '" . $checkMecanismo13tipo1 . "',
                    Catorce = '" . $checkMecanismo14tipo1 . "',
                    Quince = '" . $checkMecanismo15tipo1 . "',
                    DiezSeis = '" . $checkMecanismo16tipo1 . "',
                    Condicion2 = '" . $checkNoAplica2 . "',
                    Respuesta2 = '" . $contabaMecanismo2 . "',
                    Uno1 = '" . $checkMecanismo1tipo2 . "',
                    Dos2 = '" . $checkMecanismo2tipo2 . "',
                    Tres3 = '" . $checkMecanismo3tipo2 . "',
                    Cuatro4 = '" . $checkMecanismo4tipo2 . "',
                    Cinco5 = '" . $checkMecanismo5tipo2 . "',
                    Seis6 = '" . $checkMecanismo6tipo2 . "',
                    Siete7 = '" . $checkMecanismo7tipo2 . "',
                    Ocho8 = '" . $checkMecanismo8tipo2 . "',
                    Nueve9 = '" . $checkMecanismo9tipo2 . "',
                    Diez10 = '" . $checkMecanismo10tipo2 . "',
                    Once11 = '" . $checkMecanismo11tipo2 . "',
                    Doce12 = '" . $checkMecanismo12tipo2 . "',
                    Trece13 = '" . $checkMecanismo13tipo2 . "',
                    Catorce14 = '" . $checkMecanismo14tipo2 . "',
                    Quince15 = '" . $checkMecanismo15tipo2 . "',
                    DiezSeis16 = '" . $checkMecanismo16tipo2 . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta3_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 3 actualizada"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta3_12 =
                    "INSERT INTO tblpregunta3_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        tipoMatera,
                        Condicion,
                        Respuesta,
                        Uno,
                        Dos,
                        Tres,
                        Cuatro,
                        Cinco,
                        Seis,
                        Siete,
                        Ocho,
                        Nueve,
                        Diez,
                        Once,
                        Doce,
                        Trece,
                        Catorce,
                        Quince,
                        DiezSeis,
                        tipoMateria2,
                        Condicion2,
                        Respuesta2,
                        Uno1,
                        Dos2,
                        Tres3,
                        Cuatro4,
                        Cinco5,
                        Seis6,
                        Siete7,
                        Ocho8,
                        Nueve9,
                        Diez10,
                        Once11,
                        Doce12,
                        Trece13,
                        Catorce14,
                        Quince15,
                        DiezSeis16,
                        comentariosValidacion,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '1',
                        '$checkNoAplica1', 
                        '$contabaMecanismo1', 
                        '$checkMecanismo1tipo1', 
                        '$checkMecanismo2tipo1', 
                        '$checkMecanismo3tipo1', 
                        '$checkMecanismo4tipo1', 
                        '$checkMecanismo5tipo1', 
                        '$checkMecanismo6tipo1', 
                        '$checkMecanismo7tipo1', 
                        '$checkMecanismo8tipo1', 
                        '$checkMecanismo9tipo1', 
                        '$checkMecanismo10tipo1', 
                        '$checkMecanismo11tipo1', 
                        '$checkMecanismo12tipo1', 
                        '$checkMecanismo13tipo1', 
                        '$checkMecanismo14tipo1', 
                        '$checkMecanismo15tipo1', 
                        '$checkMecanismo16tipo1', 
                        '2',
                        '$checkNoAplica2', 
                        '$contabaMecanismo2', 
                        '$checkMecanismo1tipo2', 
                        '$checkMecanismo2tipo2', 
                        '$checkMecanismo3tipo2', 
                        '$checkMecanismo4tipo2', 
                        '$checkMecanismo5tipo2', 
                        '$checkMecanismo6tipo2', 
                        '$checkMecanismo7tipo2', 
                        '$checkMecanismo8tipo2', 
                        '$checkMecanismo9tipo2', 
                        '$checkMecanismo10tipo2', 
                        '$checkMecanismo11tipo2', 
                        '$checkMecanismo12tipo2', 
                        '$checkMecanismo13tipo2', 
                        '$checkMecanismo14tipo2', 
                        '$checkMecanismo15tipo2', 
                        '$checkMecanismo16tipo2', 
                        '$comentarios', 
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion' 
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta3_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 3 guardada!"];
                } else {
                    return ["Error al guardar lo datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion4_12($idInstitucion, $nombreInstitucion, $contabaConSistemas, $sitioDisponible, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tblpregunta4_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $con = 0;
            $c = $stmt->fetchAll();
            if (count($c) > 0) {
                $updateTablaPregunta4_12 =
                    "UPDATE tblpregunta4_2021
                    SET
                    Respuesta = '" . $contabaConSistemas . "',
                    Sitio = '" . $sitioDisponible . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta4_12);
                if ($stmt->execute()) {

                    $borrarPregunta5 =
                        "DELETE FROM tblpregunta5_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";
                    $stmt2 = Connection::connect()->prepare($borrarPregunta5);
                    if ($stmt2->execute()) {
                        $con++;
                    } else {
                        return ["warning", "Error al borrar pregunta 5"];
                    }

                    if ($con == 1) {
                        return ["success", "Pregunta 4 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["error" . "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta4_12 =
                    "INSERT INTO tblpregunta4_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Respuesta,
                        Sitio,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '$contabaConSistemas', 
                        '$sitioDisponible', 
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta4_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 4 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion5_12($idInstitucion, $nombreInstitucion, $checkEtapa1, $checkEtapa2, $checkEtapa3, $checkEtapa4, $checkEtapa5, $checkEtapa6, $checkEtapa7, $checkEtapa8, $checkEtapa9, $otraEspecifica, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $comentarios = "";
            if ($otraEspecifica != "") {
                $comentarios = $comentarios . "Etapa específica: " . $otraEspecifica;
            }

            $preguntarSiExiste =
                "SELECT *FROM tblpregunta5_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = $stmt->fetchAll();
            if (count($c) > 0) {
                $updateTablaPregunta5_12 =
                    "UPDATE tblpregunta5_2021
                    SET
                    Convocatoria = '" . $checkEtapa1 . "',
                    Junta = '" . $checkEtapa2 . "',
                    actoPresentacion = '" . $checkEtapa3 . "',
                    declaracionLicitacion = '" . $checkEtapa4 . "',
                    Cancelacion = '" . $checkEtapa5 . "',
                    emisionFallo = '" . $checkEtapa6 . "',
                    Contratacion = '" . $checkEtapa7 . "',
                    otraEtapa = '" . $checkEtapa8 . "',
                    noSabe = '" . $checkEtapa9 . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta5_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 5 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta5_12 =
                    "INSERT INTO tblpregunta5_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Convocatoria,
                        Junta,
                        actoPresentacion,
                        declaracionLicitacion,
                        Cancelacion,
                        emisionFallo,
                        Contratacion,
                        otraEtapa,
                        noSabe,
                        comentariosValidacion,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '$checkEtapa1', 
                        '$checkEtapa2', 
                        '$checkEtapa3', 
                        '$checkEtapa4', 
                        '$checkEtapa5', 
                        '$checkEtapa6', 
                        '$checkEtapa7', 
                        '$checkEtapa8', 
                        '$checkEtapa9', 
                        '$comentarios', 
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta5_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 5 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion6_12($idInstitucion, $nombreInstitucion, $contabaConElSistema1, $contabaConElSistema2, $contabaConElSistema3, $contabaConElSistema4, $contabaConElSistema5, $tipoFormato1, $tipoFormato2, $tipoFormato3, $tipoFormato4, $tipoFormato5, $frecuenciaActualizacion1, $frecuenciaActualizacion2, $frecuenciaActualizacion3, $frecuenciaActualizacion4, $frecuenciaActualizacion5, $cantidadRegistrada1, $cantidadRegistrada2, $cantidadRegistrada3, $cantidadRegistrada4, $cantidadRegistrada5, $otroFormatoEspecifico1, $otroFormatoEspecifico2, $otroFormatoEspecifico3, $otroFormatoEspecifico4, $otroFormatoEspecifico5, $otraFrecuenciaEspecifica1, $otraFrecuenciaEspecifica2, $otraFrecuenciaEspecifica3, $otraFrecuenciaEspecifica4, $otraFrecuenciaEspecifica5, $comentarioGeneral, $anioInstitucion, $contabaConElSistema6, $tipoFormato6, $frecuenciaActualizacion6, $cantidadRegistrada6, $otroFormatoEspecifico6, $otraFrecuenciaEspecifica6)
    {
        try {
            $comentarios = "";
            $array = array();
            if ($otroFormatoEspecifico1 != "") {
                $array[] = "Formato 1 específivo: " . $otroFormatoEspecifico1;
            }
            if ($otroFormatoEspecifico2 != "") {
                $array[] = "Formato 2 específivo: " . $otroFormatoEspecifico2;
            }
            if ($otroFormatoEspecifico3 != "") {
                $array[] = "Formato 3 específivo: " . $otroFormatoEspecifico3;
            }
            if ($otroFormatoEspecifico4 != "") {
                $array[] = "Formato 4 específivo: " . $otroFormatoEspecifico4;
            }
            if ($otroFormatoEspecifico5 != "") {
                $array[] = "Formato 5 específivo: " . $otroFormatoEspecifico5;
            }
            if ($otroFormatoEspecifico6 != "") {
                $array[] = "Formato 6 específivo: " . $otroFormatoEspecifico6;
            }

            if ($otraFrecuenciaEspecifica1 != "") {
                $array[] = "Frecuencia 1 específica: " . $otraFrecuenciaEspecifica1;
            }
            if ($otraFrecuenciaEspecifica2 != "") {
                $array[] = "Frecuencia 2 específica: " . $otraFrecuenciaEspecifica2;
            }
            if ($otraFrecuenciaEspecifica3 != "") {
                $array[] = "Frecuencia 3 específica: " . $otraFrecuenciaEspecifica3;
            }
            if ($otraFrecuenciaEspecifica4 != "") {
                $array[] = "Frecuencia 4 específica: " . $otraFrecuenciaEspecifica4;
            }
            if ($otraFrecuenciaEspecifica5 != "") {
                $array[] = "Frecuencia 5 específica: " . $otraFrecuenciaEspecifica5;
            }
            if ($otraFrecuenciaEspecifica6 != "") {
                $array[] = "Frecuencia 6 específica: " . $otraFrecuenciaEspecifica6;
            }

            foreach ($array as $value) {
                $comentarios .= $value . ", ";
            }
            $comentarios = substr($comentarios, 0, -2);
            $comentarios .= ".";

            $preguntarSiExiste =
                "SELECT *FROM tblpregunta6_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) > 0) {
                # UPDATE
                $updateTablaPregunta6_12 =
                    "UPDATE tblpregunta6_2021
                    SET
                    Respuesta = '" . $contabaConElSistema1 . "',
                    tipoFormato = '" . $tipoFormato1 . "',
                    Frecuencia = '" . $frecuenciaActualizacion1 . "',
                    cantidadRegistarda = '" . $cantidadRegistrada1 . "',
                    Respuesta2 = '" . $contabaConElSistema2 . "',
                    tipoFormato2 = '" . $tipoFormato2 . "',
                    Frecuencia2 = '" . $frecuenciaActualizacion2 . "',
                    cantidadRegistrada2 = '" . $cantidadRegistrada2 . "',
                    Respuesta3 = '" . $contabaConElSistema3 . "',
                    tipoFormato3 = '" . $tipoFormato3 . "',
                    Frecuencia3 = '" . $frecuenciaActualizacion3 . "',
                    cantidadRegistrada3 = '" . $cantidadRegistrada3 . "',
                    Respuesta4 = '" . $contabaConElSistema4 . "',
                    tipoFormato4 = '" . $tipoFormato4 . "',
                    Frecuencia4 = '" . $frecuenciaActualizacion4 . "',
                    cantidadRegistrada4 = '" . $cantidadRegistrada4 . "',
                    Respuesta5 = '" . $contabaConElSistema5 . "',
                    tipoFormato5 = '" . $tipoFormato5 . "',
                    Frecuencia5 = '" . $frecuenciaActualizacion5 . "',
                    cantidadRegistrada5 = '" . $cantidadRegistrada5 . "',
                    Respuesta6 = '" . $contabaConElSistema6 . "',
                    tipoFormato6 = '" . $tipoFormato6 . "',
                    Frecuencia6 = '" . $frecuenciaActualizacion6 . "',
                    cantidadRegistrada6 = '" . $cantidadRegistrada6 . "',
                    comentariosValidacion = '" . $comentarios . "',
                    comentariospregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta6_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 6 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                # INSERT
                $insertPregunta6_12 =
                    "INSERT INTO tblpregunta6_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        tipoSistema,
                        Respuesta,
                        tipoFormato,
                        Frecuencia,
                        cantidadRegistarda,
                        tipoSistema2,
                        Respuesta2,
                        tipoFormato2,
                        Frecuencia2,
                        cantidadRegistrada2,
                        tipoSistema3,
                        Respuesta3,
                        tipoFormato3,
                        Frecuencia3,
                        cantidadRegistrada3,
                        tipoSistema4,
                        Respuesta4,
                        tipoFormato4,
                        Frecuencia4,
                        cantidadRegistrada4,
                        tipoSistema5,
                        Respuesta5,
                        tipoFormato5,
                        Frecuencia5,
                        cantidadRegistrada5,
                        tipoSistema6,
                        Respuesta6,
                        tipoFormato6,
                        Frecuencia6,
                        cantidadRegistrada6,
                        comentariosValidacion,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion',
                        '$nombreInstitucion',
                        '1',
                        '$contabaConElSistema1',
                        '$tipoFormato1',
                        '$frecuenciaActualizacion1',
                        '$cantidadRegistrada1',
                        '2',
                        '$contabaConElSistema2',
                        '$tipoFormato2',
                        '$frecuenciaActualizacion2',
                        '$cantidadRegistrada2',
                        '3',
                        '$contabaConElSistema3',
                        '$tipoFormato3',
                        '$frecuenciaActualizacion3',
                        '$cantidadRegistrada3',
                        '4',
                        '$contabaConElSistema4',
                        '$tipoFormato4',
                        '$frecuenciaActualizacion4',
                        '$cantidadRegistrada4',
                        '5',
                        '$contabaConElSistema5',
                        '$tipoFormato5',
                        '$frecuenciaActualizacion5',
                        '$cantidadRegistrada5',
                        '6',
                        '$contabaConElSistema6',
                        '$tipoFormato6',
                        '$frecuenciaActualizacion6',
                        '$cantidadRegistrada6',
                        '$comentarios',
                        '$comentarioGeneral',
                        '1',
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta6_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 6 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SAL: $e"];
        }
    }

    public static function insertQuestion7_12($idInstitucion, $nombreInstitucion, $noAplica1, $contratosRealizados1, $noAplica2, $contratosRealizados2, $noAplica3, $contratosRealizados3, $noAplica4, $contratosRealizados4, $noAplica5, $contratosRealizados5, $comentarioGeneral, $Status, $anioInstitucion, $totalContratos)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tblpregunta7_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $con = 0;
            $c = $stmt->fetchAll();
            if (count($c) > 0) {
                $updateTablaPregunta7_12 =
                    "UPDATE tblpregunta7_2021
                    SET
                    Condicion = '" . $noAplica1 . "',
                    contratosReaiizados = '" . $contratosRealizados1 . "',
                    Condicion2 = '" . $noAplica2 . "',
                    contratosRealizados2 = '" . $contratosRealizados2 . "',
                    Condicion3 = '" . $noAplica3 . "',
                    contratosRealizados3 = '" . $contratosRealizados3 . "',
                    Condicion4 = '" . $noAplica4 . "',
                    contratosRealizados4 = '" . $contratosRealizados4 . "',
                    Condicion5 = '" . $noAplica5 . "',
                    contratosRealizados5 = '" . $contratosRealizados5 . "',
                    totalContratos = '" . $totalContratos . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta7_12);
                if ($stmt->execute()) {
                    # PREGUNTA 8
                    $borrarPregunta8 =
                        "DELETE FROM tblpregunta8_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt5 = Connection::connect()->prepare($borrarPregunta8);
                    if ($stmt5->execute()) {
                        $con++;
                    } else {
                        return ["warning", "Pregunta 8 no elminada!"];
                    }

                    # PREGUNTA 9
                    $borrarPregunta9 =
                        "DELETE FROM tblpregunta9_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt6 = Connection::connect()->prepare($borrarPregunta9);
                    if ($stmt6->execute()) {
                        $con++;
                    } else {
                        return ["warning", "Pregunta 9 no elminada!"];
                    }

                    # PREGUNTA 10
                    $borrarPregunta10 =
                        "DELETE FROM tblpregunta10_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt7 = Connection::connect()->prepare($borrarPregunta10);
                    if ($stmt7->execute()) {
                        $con++;
                    } else {
                        return ["warning", "Pregunta 10 no elminada!"];
                    }

                    if ($con == 3) {
                        return ["success", "Pregunta 7 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta7_12 =
                    "INSERT INTO tblpregunta7_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        tipoProcedimiento,
                        Condicion,
                        contratosReaiizados,
                        tipoProcedimiento2,
                        Condicion2,
                        contratosRealizados2,
                        tipoProcedimiento3,
                        Condicion3,
                        contratosRealizados3,
                        tipoProcedimiento4,
                        Condicion4,
                        contratosRealizados4,
                        tipoProcedimiento5,
                        Condicion5,
                        contratosRealizados5,
                        totalContratos,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '1',
                        '$noAplica1', 
                        '$contratosRealizados1', 
                        '2',
                        '$noAplica2', 
                        '$contratosRealizados2', 
                        '3',
                        '$noAplica3', 
                        '$contratosRealizados3', 
                        '4',
                        '$noAplica4', 
                        '$contratosRealizados4', 
                        '5',
                        '$noAplica5', 
                        '$contratosRealizados5', 
                        '$totalContratos',
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta7_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 7 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion8_12($idInstitucion, $nombreInstitucion, $noAplicaProcedimientoTipo1, $totalContratosTipo1, $contratosAdquisicionesTipo1, $contratosObraPublicaTipo1, $noAplicaProcedimientoTipo2, $totalContratosTipo2, $contratosAdquisicionesTipo2, $contratosObraPublicaTipo2, $noAplicaProcedimientoTipo3, $totalContratosTipo3, $contratosAdquisicionesTipo3, $contratosObraPublicaTipo3, $noAplicaProcedimientoTipo4, $totalContratosTipo4, $contratosAdquisicionesTipo4, $contratosObraPublicaTipo4, $noAplicaProcedimientoTipo5, $totalContratosTipo5, $contratosAdquisicionesTipo5, $contratosObraPublicaTipo5, $comentarioGeneral, $Status, $anioInstitucion, $totalContratosGral, $totalContratosGralAdquisiciones, $totalContratosGralObraPublica)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tblpregunta8_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = $stmt->fetchAll();
            $con = 0;
            if (count($c) > 0) {
                $updateTablaPregunta8_12 =
                    "UPDATE tblpregunta8_2021
                    SET
                    Condicion = '" . $noAplicaProcedimientoTipo1 . "',
                    Total = '" . $totalContratosTipo1 . "',
                    Adquisiciones = '" . $contratosAdquisicionesTipo1 . "',
                    otraPublica = '" . $contratosObraPublicaTipo1 . "',
                    Condicion2 = '" . $noAplicaProcedimientoTipo2 . "',
                    Total2 = '" . $totalContratosTipo2 . "',
                    Adquisiciones2 = '" . $contratosAdquisicionesTipo2 . "',
                    otraPublica2 = '" . $contratosObraPublicaTipo2 . "',
                    Condicion3 = '" . $noAplicaProcedimientoTipo3 . "',
                    Total3 = '" . $totalContratosTipo3 . "',
                    Adquisiciones3 = '" . $contratosAdquisicionesTipo3 . "',
                    otroProcedimiento3 = '" . $contratosObraPublicaTipo3 . "',
                    Condicion4 = '" . $noAplicaProcedimientoTipo4 . "',
                    Total4 = '" . $totalContratosTipo4 . "',
                    Adquisiciones4 = '" . $contratosAdquisicionesTipo4 . "',
                    otroProcedimiento4 = '" . $contratosObraPublicaTipo4 . "',
                    Condicion5 = '" . $noAplicaProcedimientoTipo5 . "',
                    Total5 = '" . $totalContratosTipo5 . "',
                    Adquisiciones5 = '" . $contratosAdquisicionesTipo5 . "',
                    otroProcedimiento5 = '" . $contratosObraPublicaTipo5 . "',
                    totalAquisiciones = '" . $totalContratosGralAdquisiciones . "',
                    totalObra = '" . $totalContratosGralObraPublica . "',
                    totalGeneral = '" . $totalContratosGral . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE 
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta8_12);
                if ($stmt->execute()) {

                    # PREGUNTA 9
                    $borrarPregunta9 =
                        "DELETE FROM tblpregunta9_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt6 = Connection::connect()->prepare($borrarPregunta9);
                    if ($stmt6->execute()) {
                        $con++;
                    } else {
                        return ["warning", "Pregunta 9 no elminada!"];
                    }

                    # PREGUNTA 10
                    $borrarPregunta10 =
                        "DELETE FROM tblpregunta10_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt7 = Connection::connect()->prepare($borrarPregunta10);
                    if ($stmt7->execute()) {
                        $con++;
                    } else {
                        return ["warning", "Pregunta 10 no elminada!"];
                    }

                    if ($con == 2) {
                        return ["success", "Pregunta 8 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta8_12 =
                    "INSERT INTO tblpregunta8_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        tipoProcedimiiento,
                        Condicion,
                        Total,
                        Adquisiciones,
                        otraPublica,
                        tipoProcedimiento2,
                        Condicion2,
                        Total2,
                        Adquisiciones2,
                        otraPublica2,
                        tipoProcedimiento3,
                        Condicion3,
                        Total3,
                        Adquisiciones3,
                        otroProcedimiento3,
                        tipoProcedimiento4,
                        Condicion4,
                        Total4,
                        Adquisiciones4,
                        otroProcedimiento4,
                        tipoProcedimiento5,
                        Condicion5,
                        Total5,
                        Adquisiciones5,
                        otroProcedimiento5,
                        totalAquisiciones,
                        totalObra,
                        totalGeneral,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion',
                        '1',
                        '$noAplicaProcedimientoTipo1', 
                        '$totalContratosTipo1', 
                        '$contratosAdquisicionesTipo1', 
                        '$contratosObraPublicaTipo1',
                        '2', 
                        '$noAplicaProcedimientoTipo2', 
                        '$totalContratosTipo2', 
                        '$contratosAdquisicionesTipo2', 
                        '$contratosObraPublicaTipo2', 
                        '3',
                        '$noAplicaProcedimientoTipo3', 
                        '$totalContratosTipo3', 
                        '$contratosAdquisicionesTipo3', 
                        '$contratosObraPublicaTipo3', 
                        '4',
                        '$noAplicaProcedimientoTipo4', 
                        '$totalContratosTipo4', 
                        '$contratosAdquisicionesTipo4', 
                        '$contratosObraPublicaTipo4', 
                        '5',
                        '$noAplicaProcedimientoTipo5', 
                        '$totalContratosTipo5', 
                        '$contratosAdquisicionesTipo5', 
                        '$contratosObraPublicaTipo5', 
                        '$totalContratosGralAdquisiciones',
                        '$totalContratosGralObraPublica',
                        '$totalContratosGral',
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta8_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 8 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion9_12($idInstitucion, $nombreInstitucion, $noAplica1, $montoAsociado1, $noAplica2, $montoAsociado2, $noAplica3, $montoAsociado3, $noAplica4, $montoAsociado4, $noAplica5, $montoAsociado5, $comentarioGeneral, $Status, $anioInstitucion, $montoTotal)
    {

        try {
            $preguntarSiExiste =
                "SELECT *FROM tblpregunta9_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = $stmt->fetchAll();
            $con = 0;
            if (count($c) > 0) {
                $updateTablaPregunta9_12 =
                    "UPDATE tblpregunta9_2021
                    SET
                    Condicion = '" . $noAplica1 . "',
                    MontoAsociado = '" . $montoAsociado1 . "',
                    Condicion2 = '" . $noAplica2 . "',
                    MontoAsociado2 = '" . $montoAsociado2 . "',
                    Condicion3 = '" . $noAplica3 . "',
                    MontoAsociado3 = '" . $montoAsociado3 . "',
                    Condicion4 = '" . $noAplica4 . "',
                    MontoAsociado4 = '" . $montoAsociado4 . "',
                    Condicion5 = '" . $noAplica5 . "',
                    MontoAsociado5 = '" . $montoAsociado5 . "',
                    montoTotalGeneral = '" . $montoTotal . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta9_12);
                if ($stmt->execute()) {

                    # PREGUNTA 10
                    $borrarPregunta10 =
                        "DELETE FROM tblpregunta10_2021
                        WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                    $stmt7 = Connection::connect()->prepare($borrarPregunta10);
                    if ($stmt7->execute()) {
                        $con++;
                    } else {
                        return ["warning", "Pregunta 10 no elminada!"];
                    }

                    if ($con == 1) {
                        return ["success", "Pregunta 9 actualizada!"];
                    } else {
                        return ["error", "Error al guardar los datos!"];
                    }
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta9_12 =
                    "INSERT INTO tblpregunta9_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        tipoProcedimiento,
                        Condicion,
                        montoAsociado,
                        tipoProcedimiento2,
                        Condicion2,
                        montoAsociado2,
                        tipoProcedimiento3,
                        Condicion3,
                        montoAsociado3,
                        tipoProcedimiento4,
                        Condicion4,
                        montoAsociado4,
                        tipoProcedimiento5,
                        Condicion5,
                        montoAsociado5,
                        montoTotalGeneral,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '1',
                        '$noAplica1', 
                        '$montoAsociado1', 
                        '2',
                        '$noAplica2', 
                        '$montoAsociado2', 
                        '3',
                        '$noAplica3', 
                        '$montoAsociado3', 
                        '4',
                        '$noAplica4', 
                        '$montoAsociado4', 
                        '5',
                        '$noAplica5', 
                        '$montoAsociado5', 
                        '$montoTotal',
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta9_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 9 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion10_12($idInstitucion, $nombreInstitucion, $noAplicaProcedimientoTipo1, $totalMontosTipo1, $montosAdquisicionesTipo1, $montosObraPublicaTipo1, $noAplicaProcedimientoTipo2, $totalMontosTipo2, $montosAdquisicionesTipo2, $montosObraPublicaTipo2, $noAplicaProcedimientoTipo3, $totalMontosTipo3, $montosAdquisicionesTipo3, $montosObraPublicaTipo3, $noAplicaProcedimientoTipo4, $totalMontosTipo4, $montosAdquisicionesTipo4, $montosObraPublicaTipo4, $noAplicaProcedimientoTipo5, $totalMontosTipo5, $montosAdquisicionesTipo5, $montosObraPublicaTipo5, $comentarioGeneral, $Status, $anioInstitucion, $totalMontosGral, $totalMontosGralAdquisiciones, $totalMontosGralObraPublica)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tblpregunta10_2021
                WHERE idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = $stmt->fetchAll();
            if (count($c) > 0) {
                $updateTablaPregunta10_12 =
                    "UPDATE tblpregunta10_2021
                    SET
                    Condicion = '" . $noAplicaProcedimientoTipo1 . "',
                    Total = '" . $totalMontosTipo1 . "',
                    Adquicisiones = '" . $montosAdquisicionesTipo1 . "',
                    otraPublica = '" . $montosObraPublicaTipo1 . "',
                    Condicion2 = '" . $noAplicaProcedimientoTipo2 . "',
                    Total2 = '" . $totalMontosTipo2 . "',
                    Adquisiciones2 = '" . $montosAdquisicionesTipo2 . "',
                    otraPublica2 = '" . $montosObraPublicaTipo2 . "',
                    Condicion3 = '" . $noAplicaProcedimientoTipo3 . "',
                    Total3 = '" . $totalMontosTipo3 . "',
                    Adquisiciones3 = '" . $montosAdquisicionesTipo3 . "',
                    otraPublica3 = '" . $montosObraPublicaTipo3 . "',
                    Condicion4 = '" . $noAplicaProcedimientoTipo4 . "',
                    Total4 = '" . $totalMontosTipo4 . "',
                    Adquisiciones4 = '" . $montosAdquisicionesTipo4 . "',
                    otraPublica4 = '" . $montosObraPublicaTipo4 . "',
                    Condicion5 = '" . $noAplicaProcedimientoTipo5 . "',
                    Total5 = '" . $totalMontosTipo5 . "',
                    Adquisiciones5 = '" . $montosAdquisicionesTipo5 . "',
                    otraPublica5 = '" . $montosObraPublicaTipo5 . "',
                    totalAdquisiciones = '" . $totalMontosGralAdquisiciones . "',
                    totalObra = '" . $totalMontosGralObraPublica . "',
                    totalGeneral = '" . $totalMontosGral . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta10_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 10 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta10_12 =
                    "INSERT INTO tblpregunta10_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Condicion,
                        Total,
                        Adquicisiones,
                        otraPublica,
                        Condicion2,
                        Total2,
                        Adquisiciones2,
                        otraPublica2,
                        Condicion3,
                        Total3,
                        Adquisiciones3,
                        otraPublica3,
                        Condicion4,
                        Total4,
                        Adquisiciones4,
                        otraPublica4,
                        Condicion5,
                        Total5,
                        Adquisiciones5,
                        otraPublica5,
                        totalAdquisiciones,
                        totalObra,
                        totalGeneral,
                        comentariosPregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '$noAplicaProcedimientoTipo1', 
                        '$totalMontosTipo1', 
                        '$montosAdquisicionesTipo1', 
                        '$montosObraPublicaTipo1', 
                        '$noAplicaProcedimientoTipo2', 
                        '$totalMontosTipo2', 
                        '$montosAdquisicionesTipo2', 
                        '$montosObraPublicaTipo2', 
                        '$noAplicaProcedimientoTipo3', 
                        '$totalMontosTipo3', 
                        '$montosAdquisicionesTipo3', 
                        '$montosObraPublicaTipo3', 
                        '$noAplicaProcedimientoTipo4', 
                        '$totalMontosTipo4', 
                        '$montosAdquisicionesTipo4', 
                        '$montosObraPublicaTipo4', 
                        '$noAplicaProcedimientoTipo5', 
                        '$totalMontosTipo5', 
                        '$montosAdquisicionesTipo5', 
                        '$montosObraPublicaTipo5', 
                        '$totalMontosGralAdquisiciones',
                        '$totalMontosGralObraPublica',
                        '$totalMontosGral',
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta10_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 10 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion11_12($idInstitucion, $nombreInstitucion, $implementoEsquema, $totalContratos, $montoAsociado, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tblpregunta11_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = $stmt->fetchAll();
            if (count($c) > 0) {
                $updateTablaPregunta11_12 =
                    "UPDATE tblpregunta11_2021
                    SET
                    Respuesta = '" . $implementoEsquema . "',
                    totalContratos = '" . $totalContratos . "',
                    Monto = '" . $montoAsociado . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta11_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 11 actualizada!"];
                }
            } else {

                $insertPregunta11_12 =
                    "INSERT INTO tblpregunta11_2021
                (
                    idInstitucion,
                    nombreInstitucion,
                    Respuesta,
                    totalContratos,
                    Monto,
                    comentariosPregunta,
                    `Status`,
                    Anio
                )
                VALUES
                (
                    '$idInstitucion', 
                    '$nombreInstitucion', 
                    '$implementoEsquema', 
                    '$totalContratos', 
                    '$montoAsociado', 
                    '$comentarioGeneral', 
                    '$Status', 
                    '$anioInstitucion'
                )";

                $stmt = Connection::connect()->prepare($insertPregunta11_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 11 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion12_12($idInstitucion, $nombreInstitucion, $implementoEsquema, $totalContrataciones, $montoAsociado, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tblpregunta12_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = $stmt->fetchAll();
            if (count($c) > 0) {
                $updateTablaPregunta12_12 =
                    "UPDATE tblpregunta12_2021
                    SET
                    Respuesta = '" . $implementoEsquema . "',
                    totalContratos = '" . $totalContrataciones . "',
                    Monto = '" . $montoAsociado . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta12_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 12 actualizada!"];
                }
            } else {

                $insertPregunta12_12 =
                    "INSERT INTO tblpregunta12_2021
                (
                    idInstitucion,
                    nombreInstitucion,
                    Respuesta,
                    totalContratos,
                    Monto,
                    comentariosPregunta,
                    `Status`,
                    Anio
                )
                VALUES
                (
                    '$idInstitucion', 
                    '$nombreInstitucion', 
                    '$implementoEsquema', 
                    '$totalContrataciones', 
                    '$montoAsociado', 
                    '$comentarioGeneral', 
                    '$Status', 
                    '$anioInstitucion'
                )";

                $stmt = Connection::connect()->prepare($insertPregunta12_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 12 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }
    public static function insertQuestion13_12($idInstitucion, $nombreInstitucion, $totalConvenios, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tblpregunta13_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = $stmt->fetchAll();
            if (count($c) > 0) {
                $updateTablaPregunta13_12 =
                    "UPDATE tblpregunta13_2021
                    SET
                    Total = '" . $totalConvenios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta13_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 13 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta13_12 =
                    "INSERT INTO tblpregunta13_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Total,
                        comentariospregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '$totalConvenios', 
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta13_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 13 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function insertQuestion14_12($idInstitucion, $nombreInstitucion, $totalDeEstudios, $comentarioGeneral, $Status, $anioInstitucion)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM tblpregunta14_2021
                WHERE
                idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = $stmt->fetchAll();
            if (count($c) > 0) {
                $updateTablaPregunta14_12 =
                    "UPDATE tblpregunta14_2021
                    SET
                    Total = '" . $totalDeEstudios . "',
                    comentariosPregunta = '" . $comentarioGeneral . "'
                    WHERE
                    idInstitucion = '" . $idInstitucion . "' AND Anio = '" . $anioInstitucion . "'";

                $stmt = Connection::connect()->prepare($updateTablaPregunta14_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 14 actualizada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            } else {
                $insertPregunta14_12 =
                    "INSERT INTO tblpregunta14_2021
                    (
                        idInstitucion,
                        nombreInstitucion,
                        Total,
                        comentariospregunta,
                        `Status`,
                        Anio
                    )
                    VALUES
                    (
                        '$idInstitucion', 
                        '$nombreInstitucion', 
                        '$totalDeEstudios', 
                        '$comentarioGeneral', 
                        '$Status', 
                        '$anioInstitucion'
                    )";

                $stmt = Connection::connect()->prepare($insertPregunta14_12);
                if ($stmt->execute()) {
                    return ["success", "Pregunta 14 guardada!"];
                } else {
                    return ["error", "Error al guardar los datos!"];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }


    #REPORTE INDIVIDUAL POR DEPENDENCIA

    # p == Pregunta, s == Seccion
    public static function obtenerConsulta($p, $s, $idInstitucion, $anioInstitucion, $clasificacionInstitucion)
    {
        #SECCION 1
        if ($p == 1 && $s == 1) {
            return "SELECT *FROM tbl_instituciones where id = '" . $idInstitucion . "' and anio = '" . $anioInstitucion . "' and clasificacionAd = '" . $clasificacionInstitucion . "'";
        } else if ($p == 2 && $s == 1) {
            return "SELECT *FROM tbl_pregunta2_2021 where idInstitucion = '" . $idInstitucion . "' and Anio = '" . $anioInstitucion . "'";
        } else if ($p == 3 && $s == 1) {
            return "SELECT *FROM tbl_pregunta2 where id_intu = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 5 && $s == 1) {
            return "SELECT *FROM tbl_pregunta4 where id_inst = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 6 && $s == 1) {
            return "SELECT *FROM tbl_pregunta5 where idIns = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 7 && $s == 1) {
            return "SELECT *FROM tbl_pregunta6 where id_inti = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 8 && $s == 1) {
            return "SELECT *FROM tbl_pregunta7 where idIns = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 9 && $s == 1) {
            return "SELECT *FROM tbl_pregunta9_2021 where idInstitucion = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 10 && $s == 1) {
            return "SELECT *FROM tbl_pregunta10_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 11 && $s == 1) {
            return "SELECT *FROM tbl_pregunta11_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 12 && $s == 1) {
            return "SELECT *FROM tbl_pregunta12_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 13 && $s == 1) {
            return "SELECT *FROM tbl_pregunta13_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 14 && $s == 1) {
            return "SELECT *FROM tbl_pregunta14_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 15 && $s == 1) {
            return "SELECT *FROM `tbl_preguntas9-3` where id_institu = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 16 && $s == 1) {
            return "SELECT *FROM tbl_pregunta16_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 17 && $s == 1) {
            return "SELECT *FROM tbl_pregunta17_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 18 && $s == 1) {
            return "SELECT *FROM tbl_pregunta18_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 19 && $s == 1) {
            return "SELECT *FROM tbl_pregunta19_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 20 && $s == 1) {
            return "SELECT *FROM tbl_pregunta20_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 24 && $s == 1) {
            return "SELECT *FROM tbl_pregunta16 where idInst = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 25 && $s == 1) {
            return "SELECT *FROM `tbl_pregunta16-1` where idIsnt = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 26 && $s == 1) {
            return "SELECT *FROM `tbl_pregunta16-2_2021` where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 27 && $s == 1) {
            return "SELECT *FROM `tbl_pregunta16-3` where idIsnt = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 28 && $s == 1) {
            return "SELECT *FROM `tbl_pregunta16-6` where idInst = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 29 && $s == 1) {
            return "SELECT *FROM `tbl_pregunta16-7` where idInst = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 30 && $s == 1) {
            return "SELECT *FROM `tbl_pregunta28_2021` where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 31 && $s == 1) {
            return "SELECT *FROM tbl_pregunta18 where idInst = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 32 && $s == 1) {
            return "SELECT *FROM tbl_pregunta20 where idInst = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 33 && $s == 1) {
            return "SELECT *FROM tbl_pregunta22 where idInst = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 34 && $s == 1) {
            return "SELECT *FROM `tbl_pregunta22-1` where idInst = $idInstitucion and anio = $anioInstitucion";
        } else if ($p == 35 && $s == 1) {
            return "SELECT *FROM `tbl_pregunta22-2_2021` where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 36 && $s == 1) {
            return "SELECT *FROM tbl_complemento_2021 WHERE idInstitucion = '" . $idInstitucion . "' AND  Anio = '" . $anioInstitucion . "'";
        }
        # SECCION 12
        else if ($p == 1 && $s == 12) {
            return "SELECT *FROM tblpregunta1_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 2 && $s == 12) {
            return "SELECT *FROM tblpregunta2_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 3 && $s == 12) {
            return "SELECT *FROM tblpregunta3_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 4 && $s == 12) {
            return "SELECT *FROM tblpregunta4_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 5 && $s == 12) {
            return "SELECT *FROM tblpregunta5_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 6 && $s == 12) {
            return "SELECT *FROM tblpregunta6_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 7 && $s == 12) {
            return "SELECT *FROM tblpregunta7_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 8 && $s == 12) {
            return "SELECT *FROM tblpregunta8_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 9 && $s == 12) {
            return "SELECT *FROM tblpregunta9_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 10 && $s == 12) {
            return "SELECT *FROM tblpregunta10_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 11 && $s == 12) {
            return "SELECT *FROM tblpregunta11_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 12 && $s == 12) {
            return "SELECT *FROM tblpregunta12_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 13 && $s == 12) {
            return "SELECT *FROM tblpregunta13_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        } else if ($p == 14 && $s == 12) {
            return "SELECT *FROM tblpregunta14_2021 where idInstitucion = $idInstitucion and Anio = $anioInstitucion";
        }
    }

    public static function generarReporte($query)
    {
        try {
            $stmt = Connection::connect()->prepare($query);
            if ($stmt->execute()) {
                return $stmt->fetchAll();
            } else {
                return ["error", "datos no encontrados!"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function terminarCenso($idInstitucion, $anioInstitucion)
    {
        try {
            $terminarCenso =
                "UPDATE altas_instituciones
                SET
                Finalizado = 1
                WHERE
                Clave = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($terminarCenso);
            if ($stmt->execute()) {
                return ["success", "Cuestionario Finalizado!"];
            } else {
                return ["error", "Cuestionario no finalizado!"];
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    public static function verificarFinalizacionCenso($idInstitucion, $anioInstitucion)
    {
        try {
            $comprobar =
                "SELECT *FROM altas_instituciones
                WHERE Clave = '" . $idInstitucion . "' AND anio = '" . $anioInstitucion . "'";

            $stmt = Connection::connect()->prepare($comprobar);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dato = $row['Finalizado'];
                }

                if ($dato == 1) {
                    return ["success", true];
                } else {
                    return ["success", false];
                }
            }
        } catch (Exception $e) {
            return ["warning", "ERROR SQL: $e"];
        }
    }

    #CERRAR SESION QUESTIONARY
    public static function cerrarSesion()
    {
        session_start();
        session_unset();
        session_destroy();

        return session_status() === PHP_SESSION_ACTIVE ? "error" : "success";
    }
    # @copyright CarlitosPC2810 Derechos Reservados
}
