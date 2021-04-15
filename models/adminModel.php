<?php
require_once "connectionModel.php";

class AdminModel
{

    // VERIFICAR QUE UN ID DE UNA DEPENDENCIA NO PUEDA EXISTIR MAS DE UNA VEZ
    public static function verificarIdExistente($idDependencia, $anioDependencia)
    {
        try {
            $SQL = "SELECT a.Clave AS idDependencia, a.Institucion AS nombreDependencia, a.anio AS anioDependencia
                    FROM altas_instituciones AS a
                    WHERE a.Clave=$idDependencia AND a.anio=$anioDependencia";
            $stmt = Connection::connect()->prepare($SQL);
            if ($stmt->execute()) {
                return $stmt->fetchAll();
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return 0;
        }
        $stmt = null;
    }

    // OBTENER DEPENDENCIAS DE LA BASE DE DATOS FILTTRADAS POR AÑO O EN GENERAL
    public static function obtenerDependencias($clasificacion, $anio)
    {
        try {
            $obtenerDependencias = "";
            if ($clasificacion == "all") {
                $obtenerDependencias =
                    "SELECT
                        d.Clave AS claveDependencia,
                        d.Institucion AS nombreDependencia
                    FROM altas_instituciones AS d
                    WHERE d.anio = '" . $anio . "'";
            } else {
                $obtenerDependencias =
                    "SELECT
                        d.Clave AS claveDependencia,
                        d.Institucion AS nombreDependencia
                    FROM altas_instituciones AS d
                    WHERE d.Clasificacion_Adm = '" . $clasificacion . "' AND d.anio = '" . $anio . "'";
            }
            $stmt = Connection::connect()->prepare($obtenerDependencias);
            if ($stmt->execute()) {
                $contador = $stmt->fetchAll();
                if (count($contador) == 0) {
                    return ["error", "No hay registros existentes"];
                } else {
                    return ["success", $contador];
                }
            } else {
                return ["error", "Imposible obtener las dependencias !"];
            }
        } catch (Exception $e) {
            return ["error", "Error al conectar a la base de datos! " . $e];
        }
    }

    // REGISTRAR CONTRASEÑA, TELEFONO Y CORREO PARA QUE LE DEPENDENCIA PUEDA ACCEDER A REALIZAR EL CENSO
    public static function registrarDependencia($clasificacion, $clave, $dependencia, $correo, $password, $telefono, $anio)
    {
        try {
            $SQL = "SELECT * FROM tbl_instituciones WHERE id=$clave AND anio=$anio";
            $stmt = Connection::connect()->prepare($SQL);

            if ($stmt->execute()) {
                if (count($stmt->fetchAll()) != 0) {
                    return ["error", "La institución ya se ha registrado !"];
                } else {
                    $stmt = null;
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $SQL =
                        "INSERT INTO tbl_instituciones (id, nombre, password, clasificacionAd, anio) VALUES
                            ($clave, '$dependencia', '$hash', '$clasificacion', $anio)";
                    $stmt = Connection::connect()->prepare($SQL);

                    if ($stmt->execute()) {
                        $stmt = null;
                        $SQL =
                            "UPDATE altas_instituciones SET
                                correo='$correo',
                                telefono='$telefono'
                            WHERE Clave=$clave AND anio=$anio";
                        $stmt = Connection::connect()->prepare($SQL);

                        if ($stmt->execute()) {
                            return ["success", "Registro exitoso !"];
                        } else {
                            return ["error",  "Imposible realizar registro !"];
                        }
                    } else {
                        return ["error",  "Imposible realizar registro !"];
                    }
                }
            } else {
                return ["error", "Imposible realizar registro !"];
            }
        } catch (Exception $e) {
            return ["warn", "Imposible conectar a la base de datos! " . $e];
        }
    }

    // LOGEO TANTO DEL USUARIO Y LA DEPENDENCIA DE IGUAL MANERA INICIALIZAR LAS VARIABLES DE SESIÓN
    public static function accesoUsuario($tipoDeUsuario, $usuario, $contrasenia, $anio)
    {
        try {
            # OBTENER DATOS DE LA BD A COMPARAR
            if ($tipoDeUsuario == "dependencia") {
                $obtenerDatos =
                    "SELECT
                        d.id AS idDependencia,
                        d.password AS contraseniaDependencia,
                        d.nombre AS nombreDependencia,
                        d.clasificacionAd AS clasificacionDependencia,
                        d.anio AS anioDependencia
                    FROM tbl_instituciones as d
                    WHERE d.id = '" . $usuario . "'
                    AND d.anio = '" . $anio . "'";
                $stmt = Connection::connect()->prepare($obtenerDatos);
                if ($stmt->execute()) {
                    $resultados = $stmt->fetchAll();
                    if (count($resultados) > 0 && password_verify($contrasenia, $resultados[0]['contraseniaDependencia'])) {
                        session_start();
                        $_SESSION['sesionActiva'] = "1";
                        $_SESSION['idDependencia'] = $resultados[0]['idDependencia'];
                        $_SESSION['nombreDependencia'] = $resultados[0]['nombreDependencia'];
                        $_SESSION['clasificacionDependencia'] = $resultados[0]['clasificacionDependencia'];
                        $_SESSION['anioDependencia'] = $resultados[0]['anioDependencia'];
                        $_SESSION['tipoUsuario'] = "dependencia";
                        return ["success", true];
                    } else {
                        return ["success", false];
                    }
                } else {
                    return ["error", "Error al ejecutar la consulta !"];
                }
            } else if ($tipoDeUsuario == "admin") {
                $SQL =
                    "SELECT
                        u.user_id AS idUsuario,
                        u.user_password_hash AS contraseniaUsuario,
                        u.user_status AS estatusUsuario,
                        u.user_tipe AS tipoUsuario
                    FROM users AS u
                    WHERE u.user_email='$usuario'";
                $stmt = Connection::connect()->prepare($SQL);

                if ($stmt->execute()) {
                    $res = $stmt->fetchAll();
                    if (count($res) > 0) {
                        if ($res[0]['estatusUsuario'] == "Activo") {
                            if (password_verify($contrasenia, $res[0]['contraseniaUsuario'])) {
                                session_start();
                                $_SESSION['sesionActiva'] = "1";
                                $_SESSION['idUsuario'] = $res[0]['idUsuario'];
                                $_SESSION['tipoUsuario'] = "admin";
                                $_SESSION['rolUsuario'] = $res[0]['tipoUsuario'];
                                return ["success", true];
                            } else {
                                return ["success", false];
                            }
                        } else {
                            return ["success", false, "Usuario inactivo !"];
                        }
                    } else {
                        return ["success", false];
                    }
                } else {
                    return ["error", "Imposible verificar usuario !"];
                }
            }
        } catch (Exception $e) {
            return ["warn", "Imposible conectar a la base de datos!" . $e];
        }
    }

    // CIERRE DE SESIÓN DEL ADMINISTRADOR O USUARIO
    public static function cerrarSesion()
    {
        session_start();
        session_unset();
        session_destroy();

        return session_status() === PHP_SESSION_ACTIVE ? "error" : "success";
    }


    # CRUD DEPENDENCIAS

    // OBTENER TODAS LAS DEPENDENCIAS QUE EXISTAN EN LA BASE DE DATOS YA SEA FILTRADO POR AÑO O LAS DEPENDENCIAS EN GENERAL
    public static function listarDependencias($anio)
    {
        try {
            $listarDependencias = "";
            if ($anio == "all") {
                $listarDependencias =
                    "SELECT
                        a.Clave AS idInstitucion,
                        a.Institucion AS nombreInstitucion,
                        a.Clasificacion_Adm AS Clasificacion,
                        a.anio AS anioInstitucion,
                        a.finalizado AS Finalizado,
                        a.correo AS correo,
                        a.telefono AS telefono
                    FROM altas_instituciones as a";
            } else {
                $listarDependencias =
                    "SELECT
                        a.Clave AS idInstitucion,
                        a.Institucion AS nombreInstitucion,
                        a.Clasificacion_Adm AS Clasificacion,
                        a.anio AS anioInstitucion,
                        a.finalizado AS Finalizado,
                        a.correo AS correo,
                        a.telefono AS telefono
                    FROM altas_instituciones as a
                    WHERE a.anio=$anio";
            }
            $stmt = Connection::connect()->prepare($listarDependencias);

            if ($stmt->execute()) {
                return ["success", $stmt->fetchAll()];
            } else {
                return ["error", "Imposible obtener dependencias !"];
            }
        } catch (Exception $e) {
            return ["warn", "Error al conectar a la base de datos! " . $e];
        }
    }

    // REGISTRAR UNA NUEVA DEPENDENCIA 
    public static function guardarDependencia($idDependencia, $anioDependencia, $nombreDependencia, $clasificacionDependencia)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM altas_instituciones WHERE Clave = '" . $idDependencia . "' AND anio = '" . $anioDependencia . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->rowCount();
            if ($contador != 0) {
                return ["error", "Ya se ha registrado esa clave en <u>$anioDependencia</u> !"];
            } else {
                $agregarDependencia =
                    "INSERT INTO altas_instituciones
                    (
                        Clave,
                        Institucion,
                        Clasificacion_Adm,
                        `Status`,
                        anio,
                        Finalizado
                    )
                    VALUES
                    (
                        '$idDependencia',
                        '$nombreDependencia',
                        '$clasificacionDependencia',
                        '1',
                        '$anioDependencia',
                        '0'
                    )";
                $stmt = Connection::connect()->prepare($agregarDependencia);
                if ($stmt->execute()) {
                    return ["success", "Dependencia registrada !"];
                } else {
                    return ["error", "Imposible registrar dependencia !"];
                }
            }
        } catch (Exception $e) {
            return ["error", "Imposible conectar a la base de datos " . $e];
        }
    }

    //ACTUALIZAR LOS DATOS DE LA DEPENDENCIA
    public static function editarDependencia($idDependencia, $idDependenciaOriginal, $anioDependencia, $anioDependenciaOriginal, $nombreDependencia, $nombreDependenciaOriginal, $clasificacion, $clasificacionOriginal, $tablas)
    {
        $c = 0; # CONTADOR DE CONSULTAS EXITOSAS
        $errores = array(); # ARREGLO DE NOMBRES DE LAS TABLAS DE CONSULTAS ERRONEAS

        # ACTUALIZAR (ESTATUS = 0) EN TODAS LAS TABLAS DE LA LISTA DONDE EL AÑO SEA DIFERENTE AL ACTUAL
        for ($i = 0; $i < count($tablas); $i++) {
            # CREACION DE VARIABLES CON LOS NOMBRES DE LOS CAMPOS DE CADA TABLA (no se hace en la consulta porque no se admiten los arreglos en la cadena xD)
            $tablaCadena = $tablas[$i]['tabla'];
            $idCadena = $tablas[$i]['campos'][0];
            $nombreCadena = $tablas[$i]['campos'][1];
            $anioCadena = $tablas[$i]['campos'][2];

            # CREACION DEL SQL PARA ACTUALIZAR CADA TABLA
            if ($tablas[$i]['tabla'] == "altas_instituciones") {
                $SQL = "UPDATE $tablaCadena
                        SET $idCadena = $idDependencia,
                            $nombreCadena = '$nombreDependencia',
                            $anioCadena = $anioDependencia,
                            Clasificacion_Adm = $clasificacion
                        WHERE
                            $idCadena = $idDependenciaOriginal AND
                            $nombreCadena = '$nombreDependenciaOriginal' AND
                            $anioCadena = $anioDependenciaOriginal AND
                            Clasificacion_Adm = $clasificacionOriginal";
            } elseif ($tablas[$i]['tabla'] == "tbl_instituciones") {
                $SQL = "UPDATE $tablaCadena
                        SET $idCadena = $idDependencia,
                            $nombreCadena = '$nombreDependencia',
                            $anioCadena = $anioDependencia,
                            clasificacionAd = $clasificacion
                        WHERE
                            $idCadena = $idDependenciaOriginal AND
                            $nombreCadena = '$nombreDependenciaOriginal' AND
                            $anioCadena = $anioDependenciaOriginal AND
                            clasificacionAd = $clasificacionOriginal";
            } else {
                $SQL = "UPDATE $tablaCadena
                        SET $idCadena = $idDependencia,
                            $nombreCadena = '$nombreDependencia',
                            $anioCadena = $anioDependencia
                        WHERE
                            $idCadena = $idDependenciaOriginal AND
                            $nombreCadena = '$nombreDependenciaOriginal' AND
                            $anioCadena = $anioDependenciaOriginal";
            }

            # ALMACENADO DE LA CONSULTA PREPARADA EN EL STMT
            $stmt = Connection::connect()->prepare($SQL);

            # EJECUCION DE LA CONSULTA CON MANEJO DE ERRORES
            try {
                $stmt->execute() ? $c++ : array_push($errores, $tablas[$i]['tabla']); # No se utiliza el else
            } catch (Exception $e) {
                array_push($errores, $tablas[$i]['tabla']);
            }

            # IGUALACION DEL STMT A NULL PARA LA PROXIMA CONSULTA
            $stmt = null;
        }

        # VERIFICACION DE QUE TODAS LAS CONSULTAS FUERON EXITOSAS O NO
        if ($c != count($tablas)) {
            return ["error", "Imposible editar la dependencia en todas las tablas, errores en las tablas: " . json_encode($errores)];
        } else {
            return ["success", "Dependencia actualizada !"];
        }
    }

    // ELIMINAR LA DEPENDENCIA YA SEA SOLO SUS RESULTADOS DURANTE EL AÑO SELECCIONADO O LA DEPENDENCIA EN GENERAL
    public static function elminarDependencia($idDependencia, $anioDependencia, $tablasAll, $tablaHistorial, $tipoDeEliminacion)
    {
        $c = 0; // CONTADOR DE CONSULTAS EJECUTADAS
        $errores = array(); // ARRAY PARA ATRAPAR ERRORES
        $tablas = []; // VARIABLE PARA GUARDAR ARRAY
        $mensajeSuccess = ""; // VARIABLE DE GUARDADO
        //REASIGNAR TABLAS PARA DISMINUIR CODIGO
        $tipoDeEliminacion == "all" ? $tablas = $tablasAll : $tablas = $tablaHistorial;
        $tipoDeEliminacion == "all" ? $mensajeSuccess = ["success", "Dependencia eliminada !"] : $mensajeSuccess = ["success", "Resultados eliminados !"];
        // RECORRER ARBOL DE TABLAS DONDE ESTAN LAS TABLAS Y SUS CAMPOS
        for ($i = 0; $i < count($tablas); $i++) {

            // ATRAPAR DATOS DEL ARRAY EN VARIABLES DE LO CONTRARIO NO FUNCIONA XD
            $tablaCadena = $tablas[$i]['tabla'];
            $idCadena = $tablas[$i]['campos'][0];
            $anioCadena = $tablas[$i]['campos'][2];

            // CREACION DEL LA VARIABLE SQL
            $deleteTablas =
                "DELETE FROM $tablaCadena
                 WHERE $idCadena = '" . $idDependencia . "' AND $anioCadena = '" . $anioDependencia . "'";
            $stmt = Connection::connect()->prepare($deleteTablas);

            //EJECUCION DE CONSULTAS
            try {
                $stmt->execute() ? $c++ : array_push($errores, $tablas[$i]['tabla']);
            } catch (Exception $e) {
                array_push($errores,  $e);
            }

            // MANDAR NULL LA VARIABLE STMT PARA NUEVO USO
            $stmt = null;
        }

        if ($c != count($tablas)) {
            return ["error", "Error al eliminar la dependencia en todas las tablas " . json_encode($errores)];
        } else {
            return $mensajeSuccess;
        }
    }

    // EN CASO DE LA DEPENDENCIA TERMINE SU CUESTIONARIO CON DATOS ERRONEOS REACTIVARLE EL CUESTIONARIO PARA CORRECION DE LA INFORMACIÓN YA REGISTRADA
    public static function activarCuestionario($idDependencia, $nombreDependencia, $anioDependencia)
    {
        try {
            $cambiarEstadoCuestionario =
                "UPDATE altas_instituciones
                SET
                    Finalizado  = 0
                WHERE Clave = '" . $idDependencia . "' AND anio = '" . $anioDependencia . "'";

            $stmt = Connection::connect()->prepare($cambiarEstadoCuestionario);
            if ($stmt->execute()) {
                return ["success", "Cuestionario reactivado !"];
            } else {
                return ["error", "Error al activar cuestionario ! "];
            }
        } catch (Exception $e) {
            return ["error", "Error al conectar a la base de datos"];
        }
    }

    // OBTENER DATOS DE TODAS LAS DEPENDENCIAS DE LA BASE DE DATOS PARA USO EN UN DATALIST EN EL MODAL DEL CRUD DE AGREGAR O EDITAR LA DEPENDENCIA
    public static function leerListaDependencias()
    {
        try {
            $SQL = "SELECT UPPER(a.Institucion) AS dependencia FROM altas_instituciones AS a GROUP BY UPPER(a.Institucion) ORDER BY a.Institucion ASC";
            $stmt = Connection::connect()->prepare($SQL);
            if ($stmt->execute()) {
                return ["success", $stmt->fetchAll()];
            } else {
                return ["error", "Imposible leer dependencias !"];
            }
        } catch (Exception $e) {
            return ["error", "Imposible leer dependencias !"];
        }
        $stmt = null;
    }


    # CRUD USUARIOS

    // OBTENER LOS USUARIOS DE LA BASE DE DATOS PARA MOSTRARLOS
    public static function listarUsuarios()
    {
        try {
            $SQL =
                "SELECT 
                    u.user_id AS idUsuario,
                    u.user_name AS nombreUsuario,
                    u.user_email AS emailUsuario,
                    u.user_phone AS phoneUsuario,
                    u.user_dirge AS usuarioOcupacion,
                    DATE(u.user_register) AS fechaRegistro,
                    u.user_tipe AS tipoUsuario,
                    u.user_status AS estatusUsuario,
                    u.user_password_hash AS userPasswd
                FROM users AS u";
            $stmt = Connection::connect()->prepare($SQL);

            if ($stmt->execute()) {
                return ["success", $stmt->fetchAll()];
            } else {
                return ["error", "Imposible obtener usuarios !"];
            }
        } catch (Exception $e) {
            return ["error", "Error al conectar a la base datos! " . $e];
        }
    }

    // AGREGAR UN NUEVO USUARIO A LA BASE DE DATOS
    public static function agregarUsuario($nombreUsuario, $correoUsuario, $phoneUsuario, $ocupacionUsuario, $rolUsuario, $estatusUsuario, $contraseniaUsuario)
    {
        try {
            $correoRepetido =
                "SELECT *FROM users WHERE user_email = '" . $correoUsuario . "'";
            $stmt = Connection::connect()->prepare($correoRepetido);
            $stmt->execute();
            $existente = $stmt->rowCount();
            if ($existente > 0) {
                return ["error", "Ya se ha registrado el correo !"];
            } else {
                $userRegister = date("Y-m-d H:i:s");
                $passwordUsuario = password_hash($contraseniaUsuario, PASSWORD_DEFAULT);
                $insertarDatos =
                    "INSERT INTO users
                (
                    `user_name`,
                    `user_password_hash`,
                    `user_email`,
                    `user_register`,
                    `user_phone`,
                    `user_tipe`,
                    `user_status`,
                    `user_dirge`
                )
                VALUES
                (
                    '$nombreUsuario',
                    '$passwordUsuario',
                    '$correoUsuario',
                    '$userRegister',
                    '$phoneUsuario',
                    '$rolUsuario',
                    '$estatusUsuario',
                    '$ocupacionUsuario'
                )";

                $stmt = Connection::connect()->prepare($insertarDatos);
                if ($stmt->execute()) {
                    return ["success", "Usuario registrado !"];
                } else {
                    return ["error", "Imposible registrar usuario !"];
                }
            }
        } catch (Exception $e) {
            return ["error", "Error en el servidor !" . $e];
        }
    }

    // ELIMINAR UN USUARIO DE LA BASE DE DATOS
    public static function eliminarUsuario($id)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM users WHERE `user_id` = '" . $id . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $c = $stmt->fetchAll();
            if (count($c) != 0) {
                $borrarUsuario =
                    "DELETE FROM users WHERE `user_id` = '" . $id . "'";
                $stmt = Connection::connect()->prepare($borrarUsuario);
                if ($stmt->execute()) {
                    return ["success", "Usuario eliminado !"];
                } else {
                    return ["error", "Imposible eliminar usuario !"];
                }
            } else {
                return ["error", "El usuario no existe !"];
            }
        } catch (Exception $e) {
            return ["warn", "Error en el servidor ! " . $e];
        }
    }

    // ACTUALIZAR LOS DATOS DE UN USUARIO EN LA BASE DE DATOS
    public static function editarUsuario($idUsuario, $nombreUsuario, $correoUsuario, $phoneUsuario, $ocupacionUsuario, $rolUsuario, $estatusUsuario, $contraseniaUsuario)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM users WHERE `user_id` = '" . $idUsuario . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->fetchAll();
            if (count($contador) != 0) {
                $editarUsuario = "";
                if ($contraseniaUsuario != "" && $contraseniaUsuario != null) {
                    $passwordUsuario = password_hash($contraseniaUsuario, PASSWORD_DEFAULT);
                    $editarUsuario =
                        "UPDATE users
                        SET
                            `user_name` = '" . $nombreUsuario . "',
                            `user_password_hash` = '" . $passwordUsuario . "',
                            `user_email` = '" . $correoUsuario . "',
                            `user_phone` = '" . $phoneUsuario . "',
                            `user_tipe` = '" . $rolUsuario . "',
                            `user_status` = '" . $estatusUsuario . "',
                            `user_dirge` = '" . $ocupacionUsuario . "'
                        WHERE `user_id` = '" . $idUsuario . "'";
                } else {
                    $editarUsuario =
                        "UPDATE users
                        SET
                            `user_name` = '" . $nombreUsuario . "',
                            `user_email` = '" . $correoUsuario . "',
                            `user_phone` = '" . $phoneUsuario . "',
                            `user_tipe` = '" . $rolUsuario . "',
                            `user_status` = '" . $estatusUsuario . "',
                            `user_dirge` = '" . $ocupacionUsuario . "'
                        WHERE `user_id` = '" . $idUsuario . "'";
                }
                $stmt = Connection::connect()->prepare($editarUsuario);
                if ($stmt->execute()) {
                    return ["success", "Usuario actualizado !"];
                } else {
                    return ["error", "Imposible actualizar usuario !"];
                }
            } else {
                return ["error", "El usuario no existe !"];
            }
        } catch (Exception $e) {
            return ["warn", "Error en el servidor ! " . $e];
        }
    }

    # REPORTES

    // MOSTRAR LOS REPORTES INDIVIDUALES DE IGUAL MANERA EL TITULO Y CEDULA DEL TITULAR DE LA INSTITUCION
    public static function listarReportes($anio)
    {
        try {
            $SQL =
                "SELECT
                    a.Clave AS idInstitucion,
                    a.Institucion AS nombreInstitucion,
                    a.Clasificacion_Adm AS clasificacion,
                    b.tituloo AS tituloArchivo,
                    b.cedula AS cedulaArchivo,
                    b.titulo2 AS tituloBinario,
                    b.cedula2 AS cedulaBinario,
                    a.anio AS anioInstitucion
                FROM altas_instituciones as a
                INNER JOIN tbl_pregunta2 AS b ON b.id_intu=a.Clave
                WHERE a.anio=$anio AND b.anio=$anio AND a.finalizado=1";
            $stmt = Connection::connect()->prepare($SQL);

            if ($stmt->execute()) {
                return ["success", $stmt->fetchAll()];
            } else {
                return ["error", "Imposible obtener resultados!"];
            }
        } catch (Exception $e) {
            return ["warn", "Error al conectar a la base de datos! " . $e];
        }
    }

    // OBTENER EL NOMBRE DE LA INSTITUCION ESTA FUNCION SE OCUPA EN EL JS DE QUESTIONARYREPORT 
    public static function nombreInstitucion($id, $anio)
    {
        try {
            $obtenerNombre =
                "SELECT Institucion FROM altas_instituciones WHERE Clave = $id AND anio = $anio";

            $stmt = Connection::connect()->prepare($obtenerNombre);
            if ($stmt->execute()) {
                $datos = $stmt->fetchAll();
                return $datos[0][0];
            } else {
                return "algo salio mal xd";
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
}
