<?php
require_once "connectionModel.php";

class AdminModel
{
    public static function revalidarDependenciasAnuales($tablas)
    {
        $anio = date("Y"); # AÑO ACTUAL
        $c = 0; # CONTADOR DE CONSULTAS EXITOSAS
        $errores = array(); # ARREGLO DE NOMBRES DE LAS TABLAS DE CONSULTAS ERRONEAS

        # ACTUALIZAR (ESTATUS = 0) EN TODAS LAS TABLAS DE LA LISTA DONDE EL AÑO SEA DIFERENTE AL ACTUAL
        for ($i = 0; $i < count($tablas); $i++) {
            $SQL = "UPDATE $tablas[$i] SET Status = 0 WHERE anio != $anio";
            $stmt = Connection::connect()->prepare($SQL);
            try {
                $stmt->execute() ? $c++ : array_push($errores, "$tablas[$i]"); # No se utiliza el else
            } catch (Exception $e) {
                array_push($errores, $tablas[$i]);
            }
            $stmt = null;
        }

        # VERIFICACION DE QUE TODAS LAS CONSULTAS FUERON EXITOSAS O NO
        if ($c != count($tablas)) {
            echo "error|Imposible revalidar todas las dependencias, errores en las tablas: " . json_encode($errores);
        } else {
            echo "success|Dependencias revalidadas exitosamente !";
        }
    }

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

    public static function listarResultados($anio)
    {
        try {
            if ($anio == "all") {
                $listarResultados =
                    "SELECT
                    d.id_intu AS idInstitucion,
                    d.nombre_intu AS nombreInstitucion,
                    d.cedula2 AS cedulaBlob,
                    d.titulo2 AS tituloBlob,
                    d.tituloo AS Titulo,
                    d.cedula AS Cedula
                FROM tbl_pregunta2";
            } else {
                $listarResultados =
                    "SELECT
                    d.id_intu AS idInstitucion,
                    d.nombre_intu AS nombreInstitucion,
                    d.cedula2 AS cedulaBlob,
                    d.titulo2 AS tituloBlob,
                    d.tituloo AS Titulo,
                    d.cedula AS Cedula
                FROM tbl_pregunta2
                WHERE
                    d.anio = '" . $anio . "'";
            }

            $stmt = Connection::connect()->prepare($listarResultados);
            if ($stmt->execute()) {
                $contador = $stmt->fetchAll();
                if (count($contador) == 0) {
                    return ["error", "No hay resultados registrados!"];
                } else {
                    return $stmt->fetchAll();
                }
            } else {
                return ["error", "Imposible ejecutar la consulta!"];
            }
        } catch (Exception $e) {
            return ["error", "Imposible conectar a la base de datos! " . $e];
        }
    }

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
                return ["error", "Imposible ejecutar la consulta!"];
            }
        } catch (Exception $e) {
            return ["error", "Error al conectar a la base de datos! " . $e];
        }
    }

    public static function registrarDependencia($clasificacion, $institucion, $password, $anio)
    {
        try {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $contador = 0;
            $preguntarSiExiste =
                "SELECT *FROM tbl_instituciones 
                WHERE id = '" . $institucion . "' AND anio = '" . $anio . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            if ($stmt->execute()) {
                $contador = $stmt->fetchAll();
                if (count($contador) != 0) {
                    return ["error", "Imposible registrar la institucion nuevamente!"];
                } else {
                    //OBTENER NOMBRE DEPENDENCIA
                    $obtenerNombreDependencia =
                        "SELECT 
                            t.Institucion AS nombreInstitucion
                        FROM altas_instituciones AS t                         
                        WHERE t.Clave = '" . $institucion . "' AND t.anio = '" . $anio . "'";

                    $ejecutar = Connection::connect()->prepare($obtenerNombreDependencia);
                    $ejecutar->execute();
                    $row = $ejecutar->fetchAll();
                    $nombreDependencia = $row[0][0];

                    //INSERTAR DATOS DE LA DEPENDENCIA

                    $insertarDatosDependencia =
                        "INSERT INTO tbl_instituciones
                        (
                            id,
                            nombre,
                            `password`,
                            clasificacionAd,
                            anio
                        )
                        VALUES
                        (
                            '$institucion',
                            '$nombreDependencia',
                            '$password',
                            '$clasificacion',
                            '$anio'
                        )";

                    $ejecutarInsert = Connection::connect()->prepare($insertarDatosDependencia);
                    if ($ejecutarInsert->execute()) {
                        return ["success", "Registro exitoso!"];
                    } else {
                        return ["error",  "Error intentelo de nuevo o mas tarde!"];
                    }
                }
            } else {
                return ["error", "Error al ejecutar la consulta sql!"];
            }
        } catch (Exception $e) {
            return ["error", "Imposible conectar a la base de datos! " . $e];
        }
    }

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
                    return ["error", "Error, intente de nuevo o mas tarde!"];
                }
            } else if ($tipoDeUsuario == "admin") {
                $obtenerDatos =
                    "SELECT
                        u.user_id AS idUsuario,
                        u.user_password_hash AS contraseniaUsuario,
                        u.user_status AS estatusUsuario
                    FROM users AS u
                    WHERE u.user_email = '" . $usuario . "'";

                $stmt = Connection::connect()->prepare($obtenerDatos);
                if ($stmt->execute()) {
                    $resultados = $stmt->fetchAll();
                    if ($resultados[0]['estatusUsuario'] == "Activo" && count($resultados) > 0) {
                        if (count($resultados) > 0 && password_verify($contrasenia, $resultados[0]['contraseniaUsuario']) && $resultados[0]['estatusUsuario'] == "Activo") {
                            session_start();
                            $_SESSION['sesionActiva'] = "1";
                            $_SESSION['idUsuario'] = $resultados[0]['idUsuario'];
                            $_SESSION['tipoUsuario'] = "admin";
                            return ["success", true];
                        } else {
                            return ["success", false];
                        }
                    } elseif ($resultados[0]['estatusUsuario'] == "Inactivo" && count($resultados) > 0) {
                        return ["success", false, "Usuario Inactivo !"];
                    } else {
                        return ["success", false];
                    }
                } else {
                    return ["error", "Error, intente de nuevo o mas tarde!"];
                }
            }
        } catch (Exception $e) {
            return ["error", "Imposible conectar a la base de datos!" . $e];
        }
    }

    public static function cerrarSesion()
    {
        session_start();
        session_unset();
        session_destroy();

        return session_status() === PHP_SESSION_ACTIVE ? "error" : "success";
    }

    
    #CRUD DEPENDENCIAS
    public static function listarDependencias($anio)
    {
        try {
            $listarDependencias = "";
            if ($anio == "all") {
                $listarDependencias =
                    "SELECT
                    d.Clave AS idInstitucion,
                    d.Institucion AS nombreInstitucion,
                    d.Clasificacion_Adm AS Clasificacion,
                    d.anio AS anioInstitucion,
                    d.finalizado AS Finalizado
                FROM altas_instituciones as d";
            } else {
                $listarDependencias =
                    "SELECT
                    d.Clave AS idInstitucion,
                    d.Institucion AS nombreInstitucion,
                    d.Clasificacion_Adm AS Clasificacion,
                    d.anio AS anioInstitucion,
                    d.finalizado AS Finalizado
                FROM altas_instituciones as d 
                WHERE
                d.anio = '" . $anio . "'";
            }
            $stmt = Connection::connect()->prepare($listarDependencias);
            if ($stmt->execute()) {
                $contador = $stmt->fetchAll();
                if (count($contador) == 0) {
                    return ["error", "No hay dependencias registradas!"];
                } else {
                    return $contador;
                }
            } else {
                return ["error", "Imposible ejecutar consulta!"];
            }
        } catch (Exception $e) {
            return ["error", "Error al conectar a la base de datos! " . $e];
        }
    }

    public static function guardarDependencia($idDependencia, $anioDependencia, $nombreDependencia, $clasificacionDependencia)
    {
        try {
            $preguntarSiExiste =
                "SELECT *FROM altas_instituciones WHERE Clave = '" . $idDependencia . "' AND anio = '" . $anioDependencia . "'";
            $stmt = Connection::connect()->prepare($preguntarSiExiste);
            $stmt->execute();
            $contador = $stmt->rowCount();
            if ($contador != 0) {
                return ["error", "Ya se ha registrado esa clave !"];
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
            return ["success", "Dependencia editada exitosamente !"];
        }
    }

    public static function elminarDependencia($idDependencia, $anioDependencia, $tablasAll, $tablaHistorial, $tipoDeEliminacion)
    {
        $c = 0; // CONTADOR DE CONSULTAS EJECUTADAS
        $errores = array(); // ARRAY PARA ATRAPAR ERRORES
        $tablas = []; // VARIABLE PARA GUARDAR ARRAY
        //REASIGNAR TABLAS PARA DISMINUIR CODIGO
        $tipoDeEliminacion == "all" ? $tablas = $tablasAll : $tablas = $tablaHistorial;
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
            return ["success", "Dependencia eliminada !"];
        }
    }

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
                return ["success", "Cuestionario de <u> $nombreDependencia </u> ha sido activado nuevamente !"];
            } else {
                return ["error", "Error al activar cuestionario ! "];
            }
        } catch (Exception $e) {
            return ["error", "Error al conectar a la base de datos"];
        }
    }


    # CRUD USUARIOS
    public static function listarUsuarios()
    {
        try {
            $listarUsuarios =
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
            $stmt = Connection::connect()->prepare($listarUsuarios);
            if ($stmt->execute()) {
                $contador = $stmt->fetchAll();
                if (count($contador) == 0) {
                    return ["error", "No hay usuarios registrados!"];
                } else {
                    return $contador;
                }
            } else {
                return ["error", "imposible ejecutar la consulta!"];
            }
        } catch (Exception $e) {
            return ["error", "Error al conectar a la base datos! " . $e];
        }
    }

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
}
