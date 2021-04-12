<?php
require_once "connectionModel.php";

class Questions
{
    public static function third($anio)
    {
        $SQL =
            "SELECT
                SUM(IF(a.clasificacionAd=1,a.totalh1,0)) AS hombresCentralizadas,
                SUM(IF(a.clasificacionAd=1,a.toatlm1,0)) AS mujeresCentralizadas,
                SUM(IF(a.clasificacionAd=2,a.totalh2,0)) AS hombresParaestatales,
                SUM(IF(a.clasificacionAd=2,a.totalm2,0)) AS mujeresParaestatales
            FROM tbl_instituciones AS a
            WHERE a.anio=$anio;";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function quarter($anio)
    {
        $SQL =
            "SELECT
                SUM(IF(a.confianzah!=0,a.confianzah,0)) AS confianzaH,
                SUM(IF(a.confianzam!=0,a.confianzam,0)) AS confianzaM,
                SUM(IF(a.baseh!=0,a.baseh,0)) AS baseH,
                SUM(IF(a.basem!=0,a.basem,0)) AS baseM,
                SUM(IF(a.eventualh!=0,a.eventualh,0)) AS eventualH,
                SUM(IF(a.eventualm!=0,a.eventualm,0)) AS eventualM,
                SUM(IF(a.honorariosh!=0,a.honorariosh,0)) AS honorariosH,
                SUM(IF(a.honorariosm!=0,a.honorariosm,0)) AS honorariosM,
                SUM(IF(a.otroh!=0,a.otroh,0)) AS otroH,
                SUM(IF(a.otrom!=0,a.otrom,0)) AS otroM
            FROM tbl_pregunta4 AS a
            WHERE a.anio=$anio;";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function fifth($anio)
    {
        $SQL =
            "SELECT
                SUM(IF(a.isssteh!=0,a.isssteh,0)) AS isssteH,
                SUM(IF(a.isstem!=0,a.isstem,0)) AS isssteM,
                SUM(IF(a.issefhh!=0,a.issefhh,0)) AS issefhH,
                SUM(IF(a.issefhm!=0,a.issefhm,0)) AS issefhM,
                SUM(IF(a.imssh!=0,a.imssh,0)) AS imssH,
                SUM(IF(a.imssm!=0,a.imssm,0)) AS imssM,
                SUM(IF(a.otroh!=0,a.otroh,0)) AS otraH,
                SUM(IF(a.otrom!=0,a.otrom,0)) AS otraM,
                SUM(IF(a.sinseguroh!=0,a.sinseguroh,0)) AS sinH,
                SUM(IF(a.sinsegurom!=0,a.sinsegurom,0)) AS sinM
            FROM tbl_pregunta5 AS a
            WHERE a.anio=$anio;";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function sixth($anio)
    {
        $SQL =
            "SELECT
                SUM(IF(a.1824H!=0,a.1824H,0)) AS c1824H,
                SUM(IF(a.1824M!=0,a.1824M,0)) AS c1824M,
                SUM(IF(a.2529H!=0,a.2529H,0)) AS c2529H,
                SUM(IF(a.2529M!=0,a.2529M,0)) AS c2529M,
                SUM(IF(a.3034H!=0,a.3034H,0)) AS c3034H,
                SUM(IF(a.3034M!=0,a.3034M,0)) AS c3034M,
                SUM(IF(a.3539H!=0,a.3539H,0)) AS c3539H,
                SUM(IF(a.3539M!=0,a.3539M,0)) AS c3539M,
                SUM(IF(a.4044H!=0,a.4044H,0)) AS c4044H,
                SUM(IF(a.4044M!=0,a.4044M,0)) AS c4044M,
                SUM(IF(a.4549H!=0,a.4549H,0)) AS c4549H,
                SUM(IF(a.4549M!=0,a.4549M,0)) AS c4549M,
                SUM(IF(a.5054H!=0,a.5054H,0)) AS c5054H,
                SUM(IF(a.5054M!=0,a.5054M,0)) AS c5054M,
                SUM(IF(a.5559H!=0,a.5559H,0)) AS c5559H,
                SUM(IF(a.5559M!=0,a.5559M,0)) AS c5559M,
                SUM(IF(a.60H!=0,a.60H,0)) AS c60H,
                SUM(IF(a.60M!=0,a.60M,0)) AS c60M
            FROM tbl_pregunta6 AS a
            WHERE a.anio=$anio;";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function seventh($anio)
    {
        $SQL =
            "SELECT
                SUM(IF(a.sinpagoh!=0,a.sinpagoh,0)) AS c0H,
                SUM(IF(a.sinpagom!=0,a.sinpagom,0)) AS c0M,
                SUM(IF(a.pago2h!=0,a.pago2h,0)) AS c1a5000H,
                SUM(IF(a.pago2m!=0,a.pago2m,0)) AS c1a5000M,
                SUM(IF(a.pago3h!=0,a.pago3h,0)) AS c5001a10000H,
                SUM(IF(a.pago3m!=0,a.pago3m,0)) AS c5001a10000M,
                SUM(IF(a.pago4h!=0,a.pago4h,0)) AS c10001a15000H,
                SUM(IF(a.pago4m!=0,a.pago4m,0)) AS c10001a15000M,
                SUM(IF(a.pago5h!=0,a.pago5h,0)) AS c15001a20000H,
                SUM(IF(a.pago5m!=0,a.pago5m,0)) AS c15001a20000M,
                SUM(IF(a.pago6h!=0,a.pago6h,0)) AS c20001a25000H,
                SUM(IF(a.pago6m!=0,a.pago6m,0)) AS c20001a25000M,
                SUM(IF(a.pago7h!=0,a.pago7h,0)) AS c25001a30000H,
                SUM(IF(a.pago7m!=0,a.pago7m,0)) AS c25001a30000M,
                SUM(IF(a.pago8h!=0,a.pago8h,0)) AS c30001a35000H,
                SUM(IF(a.pago8m!=0,a.pago8m,0)) AS c30001a35000M,
                SUM(IF(a.pago9h!=0,a.pago9h,0)) AS c35001a40000H,
                SUM(IF(a.pago9m!=0,a.pago9m,0)) AS c35001a40000M,
                SUM(IF(a.pago10h!=0,a.pago10h,0)) AS c40001a45000H,
                SUM(IF(a.pago10m!=0,a.pago10m,0)) AS c40001a45000M,
                SUM(IF(a.pago11h!=0,a.pago11h,0)) AS c45001a50000H,
                SUM(IF(a.pago11m!=0,a.pago11m,0)) AS c45001a50000M,
                SUM(IF(a.pago12h!=0,a.pago12h,0)) AS c50001a55000H,
                SUM(IF(a.pago12m!=0,a.pago12m,0)) AS c50001a55000M,
                SUM(IF(a.pago13h!=0,a.pago13h,0)) AS c55001a60000H,
                SUM(IF(a.pago13m!=0,a.pago13m,0)) AS c55001a60000M,
                SUM(IF(a.pago14h!=0,a.pago14h,0)) AS c60001a65000H,
                SUM(IF(a.pago14m!=0,a.pago14m,0)) AS c60001a65000M,
                SUM(IF(a.pago15h!=0,a.pago15h,0)) AS c65001a70000H,
                SUM(IF(a.pago15m!=0,a.pago15m,0)) AS c65001a70000M,
                SUM(IF(a.pago16h!=0,a.pago16h,0)) AS c70000aXH,
                SUM(IF(a.pago16m!=0,a.pago16m,0)) AS c70000aXM
            FROM tbl_pregunta7 AS a
            WHERE a.anio=$anio;";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function nineth($anio)
    {
        $SQL =
            "SELECT a.id,a.nombre,
                IF(a.clasificacionAd=1,a.totalh1,a.totalh2) AS totalH,
                IF(a.clasificacionAd=1,a.toatlm1,a.totalm2) AS totalM
            FROM tbl_instituciones AS a
            WHERE a.id!=0 && a.anio=$anio
            GROUP BY a.nombre
            ORDER BY a.nombre ASC;";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function fifteenth($anio)
    {
        $SQL =
            "SELECT b.clasificacionAd AS clasificacion,
                SUM(IF(a.propios!=0,a.propios,0)) AS propios,
                SUM(IF(a.retados!=0,a.retados,0)) AS rentados,
                SUM(IF(a.otro!=0,a.otro,0)) AS otros
            FROM tbl_pregunta16 AS a
            INNER JOIN tbl_instituciones AS b ON b.id=a.idInst
            WHERE a.anio=$anio AND b.anio=$anio
            GROUP BY b.clasificacionAd";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function sixteenth($anio)
    {
        $SQL =
            "SELECT a.idInst,a.nombreInst,
                IF(a.propios!=0,a.propios,0) AS propio,
                IF(a.retados!=0,a.retados,0) AS renta,
                IF(a.otro!=0,a.otro,0) AS otro
            FROM tbl_pregunta16 AS a
            WHERE a.anio=$anio
            GROUP BY a.nombreInst
            ORDER BY a.nombreInst ASC;";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function seventeenth($anio)
    {
        $SQL =
            "SELECT b.clasificacionAd AS clasificacion,
                SUM(IF(a.automoviles!=0,a.automoviles,0)) AS automoviles,
                SUM(IF(a.camionetas!=0,a.camionetas,0)) AS camionesCamionetas,
                SUM(IF(a.motocicletas!=0,a.motocicletas,0)) AS motocicletas,
                SUM(IF(a.bicicletas!=0,a.bicicletas,0)) AS bicicletas,
                SUM(IF(a.helicopteros!=0,a.helicopteros,0)) AS helicopteros,
                SUM(IF(a.drones!=0,a.drones,0)) AS drones,
                SUM(IF(a.otro!=0,a.otro,0)) AS otros
            FROM tbl_pregunta18 AS a
            INNER JOIN tbl_instituciones AS b ON b.id=a.idInst
            WHERE a.anio=$anio AND b.anio=$anio
            GROUP BY b.clasificacionAd";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function eighteenth($anio)
    {
        $SQL =
            "SELECT a.idInst,a.nombreInst,
                IF(a.automoviles!=0,a.automoviles,0) AS automoviles,
                IF(a.camionetas!=0,a.camionetas,0) AS camionesCamionetas,
                IF(a.motocicletas!=0,a.motocicletas,0) AS motocicletas,
                IF(a.bicicletas!=0,a.bicicletas,0) AS bicicletas,
                IF(a.helicopteros!=0,a.helicopteros,0) AS helicopteros,
                IF(a.drones!=0,a.drones,0) AS drones,
                IF(a.otro!=0,a.otro,0) AS otros
            FROM tbl_pregunta18 AS a
            WHERE a.anio=$anio
            GROUP BY a.nombreInst  
            ORDER BY a.nombreInst ASC";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function nineteenth($anio)
    {
        $SQL =
            "SELECT b.clasificacionAd,
                SUM(IF(a.lineasfijas!=0,a.lineasfijas,0)) AS lineasFijas,
                SUM(IF(a.lineasmoviles!=0,a.lineasmoviles,0)) AS lineasMoviles,
                SUM(IF(a.aparatosfijos!=0,a.aparatosfijos,0)) AS aparatosFijos,
                SUM(IF(a.aparatosmoviles!=0,a.aparatosmoviles,0)) AS aparatosMoviles
            FROM tbl_pregunta20 AS a
            INNER JOIN tbl_instituciones AS b ON b.id=a.idInst
            WHERE a.anio=$anio AND b.anio=$anio
            GROUP BY b.clasificacionAd";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function twentieth($anio)
    {
        $SQL =
            "SELECT a.idInst AS idInstitucion,b.nombre AS institucion,
                IF(a.lineasfijas!=0,a.lineasfijas,0) AS lineasFijas,
                IF(a.lineasmoviles!=0,a.lineasmoviles,0) AS lineasMoviles,
                IF(a.aparatosfijos!=0,a.aparatosfijos,0) AS aparatosFijos,
                IF(a.aparatosmoviles!=0,a.aparatosmoviles,0) AS aparatosMoviles
            FROM tbl_pregunta20 AS a
            INNER JOIN tbl_instituciones AS b ON b.id=a.idInst
            WHERE a.anio=$anio AND b.anio=$anio
            GROUP BY b.nombre  
            ORDER BY b.nombre ASC";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function twentyFirst($anio)
    {
        $SQL =
            "SELECT b.clasificacionAd AS clasificacion,
                SUM(IF(a.cumpuEscritorio!=0,a.cumpuEscritorio,0)) AS compuEscritorio,
                SUM(IF(a.compuPortatil!=0,a.compuPortatil,0)) AS compuPortatil,
                SUM(IF(a.impresoraPersonal!=0,a.impresoraPersonal,0)) AS impresoraPersonal,
                SUM(IF(a.impresoraCompartida!=0,a.impresoraCompartida,0)) AS impresoraCompartida,
                SUM(IF(a.multifuncionales!=0,a.multifuncionales,0)) AS multifuncionales,
                SUM(IF(a.servidores!=0,a.servidores,0)) AS servidores,
                SUM(IF(a.tabletas!=0,a.tabletas,0)) AS tabletas
            FROM tbl_pregunta22 AS a
            INNER JOIN tbl_instituciones AS b ON b.id=a.idInst
            WHERE a.anio=$anio AND b.anio=$anio
            GROUP BY b.clasificacionAd";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function twentySecond($anio)
    {
        $SQL =
            "SELECT a.nombreInst AS institucion,
                IF(a.cumpuEscritorio!=0,a.cumpuEscritorio,0) AS compuEscritorio,
                IF(a.compuPortatil!=0,a.compuPortatil,0) AS compuPortatil,
                IF(a.impresoraPersonal!=0,a.impresoraPersonal,0) AS impresoraPersonal,
                IF(a.impresoraCompartida!=0,a.impresoraCompartida,0) AS impresoraCompartida,
                IF(a.multifuncionales!=0,a.multifuncionales,0) AS multifuncionales,
                IF(a.servidores!=0,a.servidores,0) AS servidores,
                IF(a.tabletas!=0,a.tabletas,0) AS tabletas
            FROM tbl_pregunta22 AS a
            WHERE a.anio=$anio
            GROUP BY a.nombreInst
            ORDER BY a.nombreInst ASC";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function coronavirusPorTipoInstitucion($anio)
    {
        $SQL =
            "SELECT
                SUM(IF(b.Clasificacion_Adm=1,a.totalHombres,0)) AS hombresCentralizadas,
                SUM(IF(b.Clasificacion_Adm=1,a.totalMujeres,0)) AS mujeresCentralizadas,
                SUM(IF(b.Clasificacion_Adm=2,a.totalHombres,0)) AS hombresParaestatales,
                SUM(IF(b.Clasificacion_Adm=2,a.totalMujeres,0)) AS mujeresParaestatales
            FROM tbl_complemento_2021 AS a
            INNER JOIN altas_instituciones AS b ON b.Clave=a.idInstitucion
            WHERE a.anio=$anio AND b.anio=$anio";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function coronavirusPorDependencia($anio)
    {
        $SQL =
            "SELECT
                a.nombreInstitucion AS institucion,
                a.totalHombres AS hombres,
                a.totalMujeres AS mujeres
            FROM tbl_complemento_2021 AS a
            WHERE a.anio=$anio
            GROUP BY a.nombreInstitucion
            ORDER BY a.nombreInstitucion ASC";
        $stmt = Connection::connect()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
