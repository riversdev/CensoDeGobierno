<?php
require_once "../models/questionModel.php";

$data = json_decode(file_get_contents('php://input'), true);
$pregunta = $data['pregunta'];
$anio = $data['anio'];

switch ($pregunta) {
    case 3:
        $preguntaTres = Questions::third($anio);
        $cantidades = [
            ['Centralizadas', isset($preguntaTres[0]['hombresCentralizadas']) ? intval($preguntaTres[0]['hombresCentralizadas']) : 0, 'Hombres'],
            ['Paraestatales', isset($preguntaTres[0]['hombresParaestatales']) ? intval($preguntaTres[0]['hombresParaestatales']) : 0, 'Hombres'],
            ['Centralizadas', isset($preguntaTres[0]['mujeresCentralizadas']) ? intval($preguntaTres[0]['mujeresCentralizadas']) : 0, 'Mujeres'],
            ['Paraestatales', isset($preguntaTres[0]['mujeresParaestatales']) ? intval($preguntaTres[0]['mujeresParaestatales']) : 0, 'Mujeres'],
        ];
        echo json_encode($cantidades);
        break;

    case 4:
        $preguntaCuatro = Questions::quarter($anio);
        $cantidades = [
            ['Confianza', isset($preguntaCuatro[0]['confianzaH']) ? intval($preguntaCuatro[0]['confianzaH']) : 0, 'Hombres'],
            ['Confianza', isset($preguntaCuatro[0]['confianzaM']) ? intval($preguntaCuatro[0]['confianzaM']) : 0, 'Mujeres'],
            ['Base', isset($preguntaCuatro[0]['baseH']) ? intval($preguntaCuatro[0]['baseH']) : 0, 'Hombres'],
            ['Base', isset($preguntaCuatro[0]['baseM']) ? intval($preguntaCuatro[0]['baseM']) : 0, 'Mujeres'],
            ['Eventual', isset($preguntaCuatro[0]['eventualH']) ? intval($preguntaCuatro[0]['eventualH']) : 0, 'Hombres'],
            ['Eventual', isset($preguntaCuatro[0]['eventualM']) ? intval($preguntaCuatro[0]['eventualM']) : 0, 'Mujeres'],
            ['Honorarios', isset($preguntaCuatro[0]['honorariosH']) ? intval($preguntaCuatro[0]['honorariosH']) : 0, 'Hombres'],
            ['Honorarios', isset($preguntaCuatro[0]['honorariosM']) ? intval($preguntaCuatro[0]['honorariosM']) : 0, 'Mujeres'],
            ['Otro', isset($preguntaCuatro[0]['otroH']) ? intval($preguntaCuatro[0]['otroH']) : 0, 'Hombres'],
            ['Otro', isset($preguntaCuatro[0]['otroM']) ? intval($preguntaCuatro[0]['otroM']) : 0, 'Mujeres'],
        ];
        echo json_encode($cantidades);
        break;

    case 5:
        $preguntaCinco = Questions::fifth($anio);
        $cantidades = [
            ['ISSSTE', isset($preguntaCinco[0]['isssteH']) ? intval($preguntaCinco[0]['isssteH']) : 0, 'Hombres'],
            ['ISSSTE', isset($preguntaCinco[0]['isssteM']) ? intval($preguntaCinco[0]['isssteM']) : 0, 'Mujeres'],
            [
                'Institución de Seguridad Social de la entidad federativa u homóloga',
                isset($preguntaCinco[0]['issefhH']) ? intval($preguntaCinco[0]['issefhH']) : 0,
                'Hombres'
            ],
            [
                'Institución de Seguridad Social de la entidad federativa u homóloga',
                isset($preguntaCinco[0]['issefhM']) ? intval($preguntaCinco[0]['issefhM']) : 0,
                'Mujeres'
            ],
            ['IMSS', isset($preguntaCinco[0]['imssH']) ? intval($preguntaCinco[0]['imssH']) : 0, 'Hombres'],
            ['IMSS', isset($preguntaCinco[0]['imssM']) ? intval($preguntaCinco[0]['imssM']) : 0, 'Mujeres'],
            ['Otra institución', isset($preguntaCinco[0]['otraH']) ? intval($preguntaCinco[0]['otraH']) : 0, 'Hombres'],
            ['Otra institución', isset($preguntaCinco[0]['otraM']) ? intval($preguntaCinco[0]['otraM']) : 0, 'Mujeres'],
            ['Sin seguridad social', isset($preguntaCinco[0]['sinH']) ? intval($preguntaCinco[0]['sinH']) : 0, 'Hombres'],
            ['Sin seguridad social', isset($preguntaCinco[0]['sinM']) ? intval($preguntaCinco[0]['sinM']) : 0, 'Mujeres'],
        ];
        echo json_encode($cantidades);
        break;

    case 6:
        $preguntaSeis = Questions::sixth($anio);
        $cantidades = [
            ['18-24', isset($preguntaSeis[0]['c1824H']) ? intval($preguntaSeis[0]['c1824H']) : 0, 'Hombres'],
            ['18-24', isset($preguntaSeis[0]['c1824M']) ? intval($preguntaSeis[0]['c1824M']) : 0, 'Mujeres'],
            ['25-29', isset($preguntaSeis[0]['c2529H']) ? intval($preguntaSeis[0]['c2529H']) : 0, 'Hombres'],
            ['25-29', isset($preguntaSeis[0]['c2529M']) ? intval($preguntaSeis[0]['c2529M']) : 0, 'Mujeres'],
            ['30-34', isset($preguntaSeis[0]['c3034H']) ? intval($preguntaSeis[0]['c3034H']) : 0, 'Hombres'],
            ['30-34', isset($preguntaSeis[0]['c3034M']) ? intval($preguntaSeis[0]['c3034M']) : 0, 'Mujeres'],
            ['35-39', isset($preguntaSeis[0]['c3539H']) ? intval($preguntaSeis[0]['c3539H']) : 0, 'Hombres'],
            ['35-39', isset($preguntaSeis[0]['c3539M']) ? intval($preguntaSeis[0]['c3539M']) : 0, 'Mujeres'],
            ['40-44', isset($preguntaSeis[0]['c4044H']) ? intval($preguntaSeis[0]['c4044H']) : 0, 'Hombres'],
            ['40-44', isset($preguntaSeis[0]['c4044M']) ? intval($preguntaSeis[0]['c4044M']) : 0, 'Mujeres'],
            ['45-49', isset($preguntaSeis[0]['c4549H']) ? intval($preguntaSeis[0]['c4549H']) : 0, 'Hombres'],
            ['45-49', isset($preguntaSeis[0]['c4549M']) ? intval($preguntaSeis[0]['c4549M']) : 0, 'Mujeres'],
            ['50-54', isset($preguntaSeis[0]['c5054H']) ? intval($preguntaSeis[0]['c5054H']) : 0, 'Hombres'],
            ['50-54', isset($preguntaSeis[0]['c5054M']) ? intval($preguntaSeis[0]['c5054M']) : 0, 'Mujeres'],
            ['55-59', isset($preguntaSeis[0]['c5559H']) ? intval($preguntaSeis[0]['c5559H']) : 0, 'Hombres'],
            ['55-59', isset($preguntaSeis[0]['c5559M']) ? intval($preguntaSeis[0]['c5559M']) : 0, 'Mujeres'],
            ['60 +', isset($preguntaSeis[0]['c60H']) ? intval($preguntaSeis[0]['c60H']) : 0, 'Hombres'],
            ['60 +', isset($preguntaSeis[0]['c60M']) ? intval($preguntaSeis[0]['c60M']) : 0, 'Mujeres'],
        ];
        echo json_encode($cantidades);
        break;

    case 7:
        $preguntaSiete = Questions::seventh($anio);
        $cantidades = [
            ['Sin paga', isset($preguntaSiete[0]['c0H']) ? intval($preguntaSiete[0]['c0H']) : 0, 'Hombres'],
            ['Sin paga', isset($preguntaSiete[0]['c0M']) ? intval($preguntaSiete[0]['c0M']) : 0, 'Mujeres'],
            ['$1-$5,000', isset($preguntaSiete[0]['c1a5000H']) ? intval($preguntaSiete[0]['c1a5000H']) : 0, 'Hombres'],
            ['$1-$5,000', isset($preguntaSiete[0]['c1a5000M']) ? intval($preguntaSiete[0]['c1a5000M']) : 0, 'Mujeres'],
            ['$5,001-$10,000', isset($preguntaSiete[0]['c5001a10000H']) ? intval($preguntaSiete[0]['c5001a10000H']) : 0, 'Hombres'],
            ['$5,001-$10,000', isset($preguntaSiete[0]['c5001a10000M']) ? intval($preguntaSiete[0]['c5001a10000M']) : 0, 'Mujeres'],
            ['$10,001-$15,000', isset($preguntaSiete[0]['c10001a15000H']) ? intval($preguntaSiete[0]['c10001a15000H']) : 0, 'Hombres'],
            ['$10,001-$15,000', isset($preguntaSiete[0]['c10001a15000M']) ? intval($preguntaSiete[0]['c10001a15000M']) : 0, 'Mujeres'],
            ['$15,001-$20,000', isset($preguntaSiete[0]['c15001a20000H']) ? intval($preguntaSiete[0]['c15001a20000H']) : 0, 'Hombres'],
            ['$15,001-$20,000', isset($preguntaSiete[0]['c15001a20000M']) ? intval($preguntaSiete[0]['c15001a20000M']) : 0, 'Mujeres'],
            ['$20,001-$25,000', isset($preguntaSiete[0]['c20001a25000H']) ? intval($preguntaSiete[0]['c20001a25000H']) : 0, 'Hombres'],
            ['$20,001-$25,000', isset($preguntaSiete[0]['c20001a25000M']) ? intval($preguntaSiete[0]['c20001a25000M']) : 0, 'Mujeres'],
            ['$25,001-$30,000', isset($preguntaSiete[0]['c25001a30000H']) ? intval($preguntaSiete[0]['c25001a30000H']) : 0, 'Hombres'],
            ['$25,001-$30,000', isset($preguntaSiete[0]['c25001a30000M']) ? intval($preguntaSiete[0]['c25001a30000M']) : 0, 'Mujeres'],
            ['$30,001-$35,000', isset($preguntaSiete[0]['c30001a35000H']) ? intval($preguntaSiete[0]['c30001a35000H']) : 0, 'Hombres'],
            ['$30,001-$35,000', isset($preguntaSiete[0]['c30001a35000M']) ? intval($preguntaSiete[0]['c30001a35000M']) : 0, 'Mujeres'],
            ['$35,001-$40,000', isset($preguntaSiete[0]['c35001a40000H']) ? intval($preguntaSiete[0]['c35001a40000H']) : 0, 'Hombres'],
            ['$35,001-$40,000', isset($preguntaSiete[0]['c35001a40000M']) ? intval($preguntaSiete[0]['c35001a40000M']) : 0, 'Mujeres'],
            ['$40,001-$45,000', isset($preguntaSiete[0]['c40001a45000H']) ? intval($preguntaSiete[0]['c40001a45000H']) : 0, 'Hombres'],
            ['$40,001-$45,000', isset($preguntaSiete[0]['c40001a45000M']) ? intval($preguntaSiete[0]['c40001a45000M']) : 0, 'Mujeres'],
            ['$45,001-$50,000', isset($preguntaSiete[0]['c45001a50000H']) ? intval($preguntaSiete[0]['c45001a50000H']) : 0, 'Hombres'],
            ['$45,001-$50,000', isset($preguntaSiete[0]['c45001a50000M']) ? intval($preguntaSiete[0]['c45001a50000M']) : 0, 'Mujeres'],
            ['$50,001-$55,000', isset($preguntaSiete[0]['c50001a55000H']) ? intval($preguntaSiete[0]['c50001a55000H']) : 0, 'Hombres'],
            ['$50,001-$55,000', isset($preguntaSiete[0]['c50001a55000M']) ? intval($preguntaSiete[0]['c50001a55000M']) : 0, 'Mujeres'],
            ['$55,001-$60,000', isset($preguntaSiete[0]['c55001a60000H']) ? intval($preguntaSiete[0]['c55001a60000H']) : 0, 'Hombres'],
            ['$55,001-$60,000', isset($preguntaSiete[0]['c55001a60000M']) ? intval($preguntaSiete[0]['c55001a60000M']) : 0, 'Mujeres'],
            ['$60,001-$65,000', isset($preguntaSiete[0]['c60001a65000H']) ? intval($preguntaSiete[0]['c60001a65000H']) : 0, 'Hombres'],
            ['$60,001-$65,000', isset($preguntaSiete[0]['c60001a65000M']) ? intval($preguntaSiete[0]['c60001a65000M']) : 0, 'Mujeres'],
            ['$65,001-$70,000', isset($preguntaSiete[0]['c65001a70000H']) ? intval($preguntaSiete[0]['c65001a70000H']) : 0, 'Hombres'],
            ['$65,001-$70,000', isset($preguntaSiete[0]['c65001a70000M']) ? intval($preguntaSiete[0]['c65001a70000M']) : 0, 'Mujeres'],
            ['$70,000 +', isset($preguntaSiete[0]['c70000aXH']) ? intval($preguntaSiete[0]['c70000aXH']) : 0, 'Hombres'],
            ['$70,000 +', isset($preguntaSiete[0]['c70000aXM']) ? intval($preguntaSiete[0]['c70000aXM']) : 0, 'Mujeres'],
        ];
        echo json_encode($cantidades);
        break;

    case 9:
        $preguntaNueve = Questions::nineth($anio);
        echo json_encode($preguntaNueve);
        break;

    case 15:
        $preguntaQuince = Questions::fifteenth($anio);
        $cantidades = [
            ['Centralizadas', isset($preguntaQuince[0]['propios']) ? intval($preguntaQuince[0]['propios']) : 0, 'Propios'],
            ['Centralizadas', isset($preguntaQuince[0]['rentados']) ? intval($preguntaQuince[0]['rentados']) : 0, 'Rentados'],
            ['Centralizadas', isset($preguntaQuince[0]['otros']) ? intval($preguntaQuince[0]['otros']) : 0, 'Otros'],
            ['Paraestatales', isset($preguntaQuince[1]['propios']) ? intval($preguntaQuince[1]['propios']) : 0, 'Propios'],
            ['Paraestatales', isset($preguntaQuince[1]['rentados']) ? intval($preguntaQuince[1]['rentados']) : 0, 'Rentados'],
            ['Paraestatales', isset($preguntaQuince[1]['otros']) ? intval($preguntaQuince[1]['otros']) : 0, 'Otros'],
        ];
        echo json_encode($cantidades);
        break;

    case 16:
        $preguntaDieciseis = Questions::sixteenth($anio);
        echo json_encode($preguntaDieciseis);
        break;

    case 17:
        $preguntaDiecisiete = Questions::seventeenth($anio);
        $cantidades = [
            [
                'Centralizadas',
                isset($preguntaDiecisiete[0]['automoviles']) ? intval($preguntaDiecisiete[0]['automoviles']) : 0,
                'Automóviles'
            ],
            [
                'Centralizadas',
                isset($preguntaDiecisiete[0]['camionesCamionetas']) ? intval($preguntaDiecisiete[0]['camionesCamionetas']) : 0,
                'Camiones y camionetas'
            ],
            [
                'Centralizadas',
                isset($preguntaDiecisiete[0]['motocicletas']) ? intval($preguntaDiecisiete[0]['motocicletas']) : 0,
                'Motocicletas'
            ],
            [
                'Centralizadas',
                isset($preguntaDiecisiete[0]['bicicletas']) ? intval($preguntaDiecisiete[0]['bicicletas']) : 0,
                'Bicicletas'
            ],
            [
                'Centralizadas',
                isset($preguntaDiecisiete[0]['helicopteros']) ? intval($preguntaDiecisiete[0]['helicopteros']) : 0,
                'Helicópteros'
            ],
            [
                'Centralizadas',
                isset($preguntaDiecisiete[0]['drones']) ? intval($preguntaDiecisiete[0]['drones']) : 0,
                'Drones'
            ],
            [
                'Centralizadas',
                isset($preguntaDiecisiete[0]['otros']) ? intval($preguntaDiecisiete[0]['otros']) : 0,
                'Otros'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecisiete[1]['automoviles']) ? intval($preguntaDiecisiete[1]['automoviles']) : 0,
                'Automóviles'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecisiete[1]['camionesCamionetas']) ? intval($preguntaDiecisiete[1]['camionesCamionetas']) : 0,
                'Camiones y camionetas'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecisiete[1]['motocicletas']) ? intval($preguntaDiecisiete[1]['motocicletas']) : 0,
                'Motocicletas'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecisiete[1]['bicicletas']) ? intval($preguntaDiecisiete[1]['bicicletas']) : 0,
                'Bicicletas'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecisiete[1]['helicopteros']) ? intval($preguntaDiecisiete[1]['helicopteros']) : 0,
                'Helicópteros'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecisiete[1]['drones']) ? intval($preguntaDiecisiete[1]['drones']) : 0,
                'Drones'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecisiete[1]['otros']) ? intval($preguntaDiecisiete[1]['otros']) : 0,
                'Otros'
            ],
        ];
        echo json_encode($cantidades);
        break;

    case 18:
        $preguntaDieciocho = Questions::eighteenth($anio);
        echo json_encode($preguntaDieciocho);
        break;

    case 19:
        $preguntaDiecinueve = Questions::nineteenth($anio);
        $cantidades = [
            [
                'Centralizadas',
                isset($preguntaDiecinueve[0]['aparatosFijos']) ? intval($preguntaDiecinueve[0]['aparatosFijos']) : 0,
                'Aparatos fijos'
            ],
            [
                'Centralizadas',
                isset($preguntaDiecinueve[0]['aparatosMoviles']) ? intval($preguntaDiecinueve[0]['aparatosMoviles']) : 0,
                'Aparatos móviles'
            ],
            [
                'Centralizadas',
                isset($preguntaDiecinueve[0]['lineasFijas']) ? intval($preguntaDiecinueve[0]['lineasFijas']) : 0,
                'Líneas fijas'
            ],
            [
                'Centralizadas',
                isset($preguntaDiecinueve[0]['lineasMoviles']) ? intval($preguntaDiecinueve[0]['lineasMoviles']) : 0,
                'Líneas móviles'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecinueve[1]['aparatosFijos']) ? intval($preguntaDiecinueve[1]['aparatosFijos']) : 0,
                'Aparatos fijos'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecinueve[1]['aparatosMoviles']) ? intval($preguntaDiecinueve[1]['aparatosMoviles']) : 0,
                'Aparatos móviles'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecinueve[1]['lineasFijas']) ? intval($preguntaDiecinueve[1]['lineasFijas']) : 0,
                'Líneas fijas'
            ],
            [
                'Paraestatales',
                isset($preguntaDiecinueve[1]['lineasMoviles']) ? intval($preguntaDiecinueve[1]['lineasMoviles']) : 0,
                'Líneas móviles'
            ],
        ];
        echo json_encode($cantidades);
        break;

    case 20:
        $preguntaVeinte = Questions::twentieth($anio);
        echo json_encode($preguntaVeinte);
        break;

    case 21:
        $preguntaVeintiuno = Questions::twentyFirst($anio);
        $cantidades = [
            ['Centralizadas', isset($preguntaVeintiuno[0]['compuEscritorio']) ? intval($preguntaVeintiuno[0]['compuEscritorio']) : 0, 'Computadoras de escritorio'],
            ['Centralizadas', isset($preguntaVeintiuno[0]['compuPortatil']) ? intval($preguntaVeintiuno[0]['compuPortatil']) : 0, 'Computadoras portatiles'],
            ['Centralizadas', isset($preguntaVeintiuno[0]['impresoraPersonal']) ? intval($preguntaVeintiuno[0]['impresoraPersonal']) : 0, 'Impresoras personales'],
            ['Centralizadas', isset($preguntaVeintiuno[0]['impresoraCompartida']) ? intval($preguntaVeintiuno[0]['impresoraCompartida']) : 0, 'Impresoras compartidas'],
            ['Centralizadas', isset($preguntaVeintiuno[0]['multifuncionales']) ? intval($preguntaVeintiuno[0]['multifuncionales']) : 0, 'Multifuncionales'],
            ['Centralizadas', isset($preguntaVeintiuno[0]['servidores']) ? intval($preguntaVeintiuno[0]['servidores']) : 0, 'Servidores'],
            ['Centralizadas', isset($preguntaVeintiuno[0]['tabletas']) ? intval($preguntaVeintiuno[0]['tabletas']) : 0, 'Tabletas'],
            ['Paraestatales', isset($preguntaVeintiuno[1]['compuEscritorio']) ? intval($preguntaVeintiuno[1]['compuEscritorio']) : 0, 'Computadoras de escritorio'],
            ['Paraestatales', isset($preguntaVeintiuno[1]['compuPortatil']) ? intval($preguntaVeintiuno[1]['compuPortatil']) : 0, 'Computadoras portatiles'],
            ['Paraestatales', isset($preguntaVeintiuno[1]['impresoraPersonal']) ? intval($preguntaVeintiuno[1]['impresoraPersonal']) : 0, 'Impresoras personales'],
            ['Paraestatales', isset($preguntaVeintiuno[1]['impresoraCompartida']) ? intval($preguntaVeintiuno[1]['impresoraCompartida']) : 0, 'Impresoras compartidas'],
            ['Paraestatales', isset($preguntaVeintiuno[1]['multifuncionales']) ? intval($preguntaVeintiuno[1]['multifuncionales']) : 0, 'Multifuncionales'],
            ['Paraestatales', isset($preguntaVeintiuno[1]['servidores']) ? intval($preguntaVeintiuno[1]['servidores']) : 0, 'Servidores'],
            ['Paraestatales', isset($preguntaVeintiuno[1]['tabletas']) ? intval($preguntaVeintiuno[1]['tabletas']) : 0, 'Tabletas'],
        ];
        echo json_encode($cantidades);
        break;

    case 22:
        $preguntaVeintidos = Questions::twentySecond($anio);
        echo json_encode($preguntaVeintidos);
        break;

    case "coronavirusPorTipoInstitucion":
        $preguntaCoronavirus = Questions::coronavirusPorTipoInstitucion($anio);
        $cantidades = [
            ['Centralizadas', isset($preguntaCoronavirus[0]['hombresCentralizadas']) ? intval($preguntaCoronavirus[0]['hombresCentralizadas']) : 0, 'Hombres'],
            ['Paraestatales', isset($preguntaCoronavirus[0]['hombresParaestatales']) ? intval($preguntaCoronavirus[0]['hombresParaestatales']) : 0, 'Hombres'],
            ['Centralizadas', isset($preguntaCoronavirus[0]['mujeresCentralizadas']) ? intval($preguntaCoronavirus[0]['mujeresCentralizadas']) : 0, 'Mujeres'],
            ['Paraestatales', isset($preguntaCoronavirus[0]['mujeresParaestatales']) ? intval($preguntaCoronavirus[0]['mujeresParaestatales']) : 0, 'Mujeres'],
        ];
        echo json_encode($cantidades);
        break;

    case "coronavirusPorDependencia":
        $preguntaCoronavirus = Questions::coronavirusPorDependencia($anio);
        echo json_encode($preguntaCoronavirus);
        break;

    default:
        echo '
            <script>
                let container = document.getElementById("container"),
                msg = document.createTextNode("Gráfica no terminada :v !!!");
                container.innerHTML="";
                container.append(msg);
            </script>
        ';
        break;
}
