// VARIABLES GLOBALES DEL REPORTE DEL CUESTIONARIO 2021
let reporte, idInstitucion, anioInstitucion, clasificacionInstitucion, nombreInstitucion

document.addEventListener('DOMContentLoaded', () => {
    // DESCIFRAR PARAMETROS DE LA RUTA
    let parametros = window.location.href.split('?')[1].split('&')
    idInstitucion = atob(parametros[0])
    anioInstitucion = atob(parametros[1])

    // ESCUCHADOR PARA CERRAR LA VENTANA DESPUES DE IMPRIMIRLA
    window.addEventListener('afterprint', function () { this.close() }, false)

    // REPORTE INDIVIDUAL O CONCENTRADOS
    if (idInstitucion != 'general' && idInstitucion != 'centralizadas' && idInstitucion != 'paraestatales') {
        // OBTENER EL NOMBRE DE LA DEPENDENCIA
        recuperarNombreDependencia(idInstitucion, anioInstitucion).then(() => {
            // VERIFICAR SI EL CUESTIONARIO ESTA FINALIZADO, CERRAR LA VENTANA SI NO ES ASI
            verificarCuestionarioFinalizado().then((res) => {
                if (res != undefined && res == true) {
                    // OBTENER EL REPORTE HACIENDO USO DE LAS VARIABLES EN LA RUTA
                    obtenerReporte(idInstitucion, nombreInstitucion, clasificacionInstitucion, anioInstitucion).then(() => {
                        // PREGUNTA 1 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(clasificacionInstitucion, '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion1']['tipoInstitucion'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion1']['funcionPrincipal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion1']['funcionSecundaria1'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion1']['funcionSecundaria2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion1']['funcionSecundaria3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion1']['funcionSecundaria4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion1']['funcionSecundaria5'], '1', 'auto'))
                        document.getElementById('identifierQuestionP1S1').innerHTML = ''
                        document.getElementById('identifierQuestionP1S1').append(tr)
                        displayComentarios(reporte['pregunta1seccion1']['funcionesEspecificas'], 'contenedorComentariosEspecificosP1s1', 'txtDatosEspecificosP1s1')
                        displayComentarios(reporte['pregunta1seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP1s1', 'txtComentarioGeneral')

                        // PREGUNTA 2 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion1']['respuesta'], '1', 'auto'))
                        document.getElementById('identifierQuestionP2S1').innerHTML = ''
                        document.getElementById('identifierQuestionP2S1').append(tr)
                        displayComentarios(reporte['pregunta2seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP2s1', 'txtComentarioGeneralP2')

                        // PREGUNTA 3 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['sexo'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['edad'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['ingresosMensual'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['nivelEscolaridad'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['estatusEscolaridad'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['empleoAnterior'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['antiguedadServicio'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['antiguedadCargo'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['pertinenciaIndigena'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['condicionDiscapacidad'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['formaDesignacion'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['afiliacionPartidista'] != '' ? reporte['pregunta3seccion1']['afiliacionPartidista'] : 'NA', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion1']['idInstitular'] != '' ? reporte['pregunta3seccion1']['idInstitular'] : 'NA', 'auto'))
                        document.getElementById('identifierQuestionP3S1').innerHTML = ''
                        document.getElementById('identifierQuestionP3S1').append(tr)
                        displayComentarios(reporte['pregunta3seccion1']['conceptosEspecificos'], 'contenedorComentariosEspecificosP3s1', 'txtDatosEspecificosP3s1')
                        displayComentarios(reporte['pregunta3seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP3s1', 'txtComentarioGeneralP3')

                        // PREGUNTA 4 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta4seccion1']['totalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta4seccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta4seccion1']['totalMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP4S1').innerHTML = ''
                        document.getElementById('identifierQuestionP4S1').append(tr)
                        displayComentarios(reporte['pregunta4seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP4s1', 'txtComentarioGeneralP4')

                        // PREGUNTA 5 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['totalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['totalMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['confianzaHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['confianzaMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['baseHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['baseMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['eventualHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['eventualMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['honorariosHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['honorariosMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['otrosHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion1']['otrosMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP5S1').innerHTML = ''
                        document.getElementById('identifierQuestionP5S1').append(tr)
                        displayComentarios(reporte['pregunta5seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP5s1', 'txtDatosEspecificosP5s1')
                        displayComentarios(reporte['pregunta5seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP5s1', 'txtComentarioGeneralP5')

                        // PREGUNTA 6 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['totalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['totalMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['isssteHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['issteMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['issfhHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['issfhMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['imssHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['imssMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['otroHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['otroMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['sinSeguroHombre'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion1']['sinSeguroMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP6S1').innerHTML = ''
                        document.getElementById('identifierQuestionP6S1').append(tr)
                        displayComentarios(reporte['pregunta6seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP6s1', 'txtDatosEspecificosP6s1')
                        displayComentarios(reporte['pregunta6seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP6s1', 'txtComentarioGeneralP6')

                        // PREGUNTA 7 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['totalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['totalMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['1824Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['1824Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['2529Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['2529Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['3034Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['3034Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['3539Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['3539Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['4044Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['4044Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['4549Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['4549Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['5054Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['5054Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['5559Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['5559Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['60Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion1']['60Mujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP7S1').innerHTML = ''
                        document.getElementById('identifierQuestionP7S1').append(tr)
                        displayComentarios(reporte['pregunta7seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP7s1', 'txtComentarioGeneralP7')

                        // PREGUNTA 8 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['totalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['totalMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['sinPagaHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['sinPagaMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['1a1500Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['1a1500Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['5001a10000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['5001a10000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['10001a15000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['10001a15000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['15001a20000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['15001a20000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['20001a25000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['20001a25000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['25001a30000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['25001a30000Mujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP8S1').innerHTML = ''
                        document.getElementById('identifierQuestionP8S1').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['30001a35000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['30001a35000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['35001a40000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['35001a40000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['40001a45000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['40001a45000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['45001a50000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['45001a50000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['50001a55000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['50001a55000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['55001a60000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['55001a60000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['60001a65000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['60001a65000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['65001a70000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['65001a70000Mujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['mas70000Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion1']['mas70000Mujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP81S1').innerHTML = ''
                        document.getElementById('identifierQuestionP81S1').append(tr)
                        displayComentarios(reporte['pregunta8seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP8s1', 'txtDatosEspecificosP8s1')
                        displayComentarios(reporte['pregunta8seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP8s1', 'txtComentarioGeneralP8')

                        // PREGUNTA 9 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['totalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['totalMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['ningunoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['ningunoMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['prePriHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['prePriMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['secundariaHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['secundariaMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['preparatoriaHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['preparatoriaMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['carreraHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['carreraMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['licenciaturaHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['licenciaturaMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['maestriaHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['maestriaMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['doctoradoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion1']['doctoradoMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP9S1').innerHTML = ''
                        document.getElementById('identifierQuestionP9S1').append(tr)
                        displayComentarios(reporte['pregunta9seccion1']['datosEspecificod'], 'contenedorComentariosEspecificosP9s1', 'txtDatosEspecificosP9s1')
                        displayComentarios(reporte['pregunta9seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP9s1', 'txtComentarioGeneralP9')

                        // PREGUNTA 10 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion1']['totalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion1']['totalMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion1']['perteneceIndigenaH'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion1']['perteneceIndigenaM'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion1']['noPerteneceIndigenaH'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion1']['noPerteneneIndigenaM'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion1']['noIdentificadoH'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion1']['noIdentificadoM'], '1', 'auto'))
                        document.getElementById('identifierQuestionP10S1').innerHTML = ''
                        document.getElementById('identifierQuestionP10S1').append(tr)
                        displayComentarios(reporte['pregunta10seccion1']['datosEspecíficos'], 'contenedorComentariosEspecificosP10s1', 'txtDatosEspecificosP10s1')
                        displayComentarios(reporte['pregunta10seccion1']['comentariosPregunta'], 'contenedorComentariosGeneralP10s1', 'txtComentarioGeneralP10')

                        // PREGUNTA 11 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD('', '1', '37%'))
                        td = document.createElement('td')
                        td.className = 'text-center align-middle px-5'
                        td.appendChild(document.createTextNode('Total: ' + reporte['pregunta11seccion1']['totalPersonal']))
                        tr.append(td)
                        td = document.createElement('td')
                        td.className = 'text-center align-middle px-5'
                        td.appendChild(document.createTextNode('Hombres: ' + reporte['pregunta11seccion1']['totalHombres']))
                        tr.append(td)
                        td = document.createElement('td')
                        td.className = 'text-center align-middle px-5'
                        td.appendChild(document.createTextNode('Mujeres: ' + reporte['pregunta11seccion1']['totalMujeres']))
                        tr.append(td)
                        document.getElementById('identifierQuestionSumaTotalIndigenaP11S1').innerHTML = ''
                        document.getElementById('identifierQuestionSumaTotalIndigenaP11S1').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['chinantecoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['chinantecoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['chinantecoMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['cholTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['cholHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['cholMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['coraTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['coraHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['coraMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['huastecoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['huastecoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['huastecoMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['huicholTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['huicholHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['huicholMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mayaTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mayaHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mayaMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mayoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mayoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mayoMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionIndigena17P11S1').innerHTML = ''
                        document.getElementById('identifierQuestionIndigena17P11S1').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mazahuaTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mazahuaHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mazahuaMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mazatecoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mazatecoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mazatecoMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mixeTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mixeHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mixeMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mixtecoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mixtecoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['mixtecoMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['nahuatlTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['nahuatlHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['nahuatlMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['otomiTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['otomiHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['otomiMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionIndigena813P11S1').innerHTML = ''
                        document.getElementById('identifierQuestionIndigena813P11S1').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tarascoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tarascoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tarascoMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tarahumaraTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tarahumaraHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tarahumaraMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tepehuanoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tepehuanoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tepehuanoMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tlapanecoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tlapanecoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tlapanecoMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['totonacoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['totonacoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['totnacoMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tseltalTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tseltalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tseltalMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionIndigena1419P11S1').innerHTML = ''
                        document.getElementById('identifierQuestionIndigena1419P11S1').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tsotsitTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tsotsitHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['tsotsitMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['yaquiTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['yaquiHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['yaquiMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['zapotecoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['zapotecoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['zapotecoMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['zoqueTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['zoqueHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['zoqueMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['otroTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['otroHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['otroMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['noidentificadoTotal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['noIdentificadoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion1']['noIdentificadoMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionIndigena2025P11S1').innerHTML = ''
                        document.getElementById('identifierQuestionIndigena2025P11S1').append(tr)
                        displayComentarios(reporte['pregunta11seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP11s1', 'txtDatosEspecificosP11s1')
                        displayComentarios(reporte['pregunta11seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP11s1', 'txtComentarioGeneralP11')

                        // PREGUNTA 12 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion1']['totalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion1']['totalMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion1']['conDiscapacidadHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion1']['conDiscapacidadMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion1']['sinDiscapacidadHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion1']['sinDiscapacidadMujeres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion1']['noIdentificadoHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion1']['noIdentificadoMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP12S1').innerHTML = ''
                        document.getElementById('identifierQuestionP12S1').append(tr)
                        displayComentarios(reporte['pregunta12seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP12s1', 'txtDatosEspecificosP12s1')
                        displayComentarios(reporte['pregunta12seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP12s1', 'txtComentarioGeneralP12')

                        // PREGUNTA 13 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD('', '1', '37%'))
                        td = document.createElement('td')
                        td.className = 'text-center align-middle px-5'
                        td.appendChild(document.createTextNode('Total: ' + reporte['pregunta13seccion1']['totalPersonal']))
                        tr.append(td)
                        td = document.createElement('td')
                        td.className = 'text-center align-middle px-5'
                        td.appendChild(document.createTextNode('Hombres: ' + reporte['pregunta13seccion1']['totalHombres']))
                        tr.append(td)
                        td = document.createElement('td')
                        td.className = 'text-center align-middle px-5'
                        td.appendChild(document.createTextNode('Mujeres: ' + reporte['pregunta13seccion1']['totalMujeres']))
                        tr.append(td)
                        document.getElementById('identifierQuestionSumaTotalDiscapacidadP13S1').innerHTML = ''
                        document.getElementById('identifierQuestionSumaTotalDiscapacidadP13S1').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadCaminarHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadCaminarMujeres'])), '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadCaminarHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadCaminarMujeres'], '1', 'auto'))
                        tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadVerHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadaVerMujeres'])), '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadVerHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadaVerMujeres'], '1', 'auto'))
                        tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadMoverHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadMoverMuejeres'])), '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadMoverHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadMoverMuejeres'], '1', 'auto'))
                        tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadAprenderHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadAprenderMujeres'])), '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadAprenderHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadAprenderMujeres'], '1', 'auto'))
                        tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadOirHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadOirMujeres'])), '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadOirHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadOirMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionDiscapacidad15P13S1').innerHTML = ''
                        document.getElementById('identifierQuestionDiscapacidad15P13S1').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadHablarHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadHablarMujeres'])), '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadHablarHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadHablarMujeres'], '1', 'auto'))
                        tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadBaniarseHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadBaniarseMujeres'])), '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadBaniarseHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadBaniarseMujeres'], '1', 'auto'))
                        tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadDepresionHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadDepresionMujeres'])), '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadDepresionHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadDepresionMujeres'], '1', 'auto'))
                        tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['otraDiscapacidadHombres']) + parseInt(reporte['pregunta13seccion1']['otraDiscapacidadMujeres'])), '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['otraDiscapacidadHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['otraDiscapacidadMujeres'], '1', 'auto'))
                        tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadNoIdentificadaHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadNoIdentificadaMujeres'])), '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadNoIdentificadaHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadNoIdentificadaMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionDiscapacidad610P13S1').innerHTML = ''
                        document.getElementById('identifierQuestionDiscapacidad610P13S1').append(tr)
                        displayComentarios(reporte['pregunta13seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP13s1', 'txtDatosEspecificosP13s1')
                        displayComentarios(reporte['pregunta13seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP13s1', 'txtComentarioGeneralP13')

                        // PREGUNTA 14 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta14seccion1']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta14seccion1']['TotalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta14seccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta14seccion1']['totalMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP14S1').innerHTML = ''
                        document.getElementById('identifierQuestionP14S1').append(tr)
                        displayComentarios(reporte['pregunta14seccion1']['ComentarioGeneral'], 'contenedorComentariosGeneralP14s1', 'txtComentarioGeneralP14')

                        // PREGUNTA 15 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta15seccion1']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta15seccion1']['TotalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta15seccion1']['Hombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta15seccion1']['Mujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP15S1').innerHTML = ''
                        document.getElementById('identifierQuestionP15S1').append(tr)
                        displayComentarios(reporte['pregunta15seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP15s1', 'txtComentarioGeneralP15')

                        // PREGUNTA 16 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta16seccion1']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta16seccion1']['disposicionNormativa'], '1', 'auto'))
                        document.getElementById('identifierQuestionP16S1').innerHTML = ''
                        document.getElementById('identifierQuestionP16S1').append(tr)
                        displayComentarios(reporte['pregunta16seccion1']['comentarioGenera'], 'contenedorComentariosGeneralP16s1', 'txtComentarioGeneralP16')

                        // PREGUNTA 17 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['servicioCivil'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['Reclutamiento'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['diseñoSeleccion'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['diseñoCurricular'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['actualizacionPerfil'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['diseñoValidacion'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['concursosPublicos'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['Mecanismos'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['programasCapacitacion'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['evaluacionImpacto'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['programasEstimulos'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['separacionServicio'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta17seccion1']['Otro'], '1', 'auto'))
                        document.getElementById('identifierQuestionP17S1').innerHTML = ''
                        document.getElementById('identifierQuestionP17S1').append(tr)
                        displayComentarios(reporte['pregunta17seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP17s1', 'txtDatosEspecificosP17s1')
                        displayComentarios(reporte['pregunta17seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP17s1', 'txtComentarioGeneralP17')

                        // PREGUNTA 18 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta18seccion1']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta18seccion1']['nombreUnidad'], '1', 'auto'))
                        document.getElementById('identifierQuestionP18S1').innerHTML = ''
                        document.getElementById('identifierQuestionP18S1').append(tr)
                        displayComentarios(reporte['pregunta18seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP18s1', 'txtComentarioGeneralP18')

                        // PREGUNTA 19 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta19seccion1']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta19seccion1']['accionesFormativas'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta19seccion1']['accionesFormativasConcluidas'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta19seccion1']['TotalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta19seccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta19seccion1']['totalMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionP19S1').innerHTML = ''
                        document.getElementById('identifierQuestionP19S1').append(tr)
                        displayComentarios(reporte['pregunta19seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP19s1', 'txtComentarioGeneralP19')

                        // PREGUNTA 24 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta24seccion1']['totalInmuebles'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta24seccion1']['inmueblesPropios'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta24seccion1']['inmueblesRentados'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta24seccion1']['inmueblesOtros'], '1', 'auto'))
                        document.getElementById('identifierQuestionP24S1').innerHTML = ''
                        document.getElementById('identifierQuestionP24S1').append(tr)
                        displayComentarios(reporte['pregunta24seccion1']['datosEspecíficos'], 'contenedorComentariosEspecificosP24s1', 'txtDatosEspecificosP24s1')
                        displayComentarios(reporte['pregunta24seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP24s1', 'txtComentarioGeneralP24')

                        // PREGUNTA 25 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta25seccion1']['Respuesta'], '1', 'auto'))
                        document.getElementById('identifierQuestionP25S1').innerHTML = ''
                        document.getElementById('identifierQuestionP25S1').append(tr)
                        displayComentarios(reporte['pregunta25seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP25s1', 'txtComentarioGeneralP25')

                        // PREGUNTA 26 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta26seccion1']['escuelas1'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta26seccion1']['funcionesEducativas1'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta26seccion1']['formaMixta1'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta26seccion1']['escuelas2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta26seccion1']['funcionesEducativas2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta26seccion1']['formaMixta2'], '1', 'auto'))
                        document.getElementById('txtTotalInmueblesP26').value = reporte['pregunta26seccion1']['totalInmueblesEducacion']
                        document.getElementById('txtTotalInmuebles1P26').value = reporte['pregunta26seccion1']['totalFuncionPrincipalEducacion']
                        document.getElementById('txtTotalInmuebles2P26').value = reporte['pregunta26seccion1']['totalOtroTIpoFuncion']
                        document.getElementById('identifierQuestionP26S1').innerHTML = ''
                        document.getElementById('identifierQuestionP26S1').append(tr)
                        displayComentarios(reporte['pregunta26seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP26s1', 'txtDatosEspecificosP26s1')
                        displayComentarios(reporte['pregunta26seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP26s1', 'txtComentarioGeneralP26')

                        // PREGUNTA 27 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta27seccion1']['Respuesta'], '1', 'auto'))
                        document.getElementById('identifierQuestionP27S1').innerHTML = ''
                        document.getElementById('identifierQuestionP27S1').append(tr)
                        displayComentarios(reporte['pregunta27seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP27s1', 'txtComentarioGeneralP27')

                        // PREGUNTA 28 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta28seccion1']['totalClinicas'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta28seccion1']['totalCentroSalud'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta28seccion1']['totalHospitales'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta28seccion1']['totalFuncionesSalud'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta28seccion1']['totalMixta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta28seccion1']['totalOtraFuncionClinica'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta28seccion1']['totalOtraFuncionSalud'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta28seccion1']['totalOtraFuncionHospitales'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta28seccion1']['totalOtraFuncionesSalud'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta28seccion1']['totalOtraFuncionMixta'], '1', 'auto'))
                        document.getElementById('txtTotalInmueblesP28').innerHTML = reporte['pregunta28seccion1']['totalnmueblesSalud']
                        document.getElementById('txtTotalInmuebles1P28').innerHTML = reporte['pregunta28seccion1']['totalFuncionPrincipalSalud']
                        document.getElementById('txtTotalInmuebles2P28').innerHTML = reporte['pregunta28seccion1']['totalOtraFuncion']
                        document.getElementById('identifierQuestionP28S1').innerHTML = ''
                        document.getElementById('identifierQuestionP28S1').append(tr)
                        displayComentarios(reporte['pregunta28seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP28s1', 'txtDatosEspecificosP28s1')
                        displayComentarios(reporte['pregunta28seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP28s1', 'txtComentarioGeneralP28')

                        // PREGUNTA 29 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta29seccion1']['Respuesta'], '1', 'auto'))
                        document.getElementById('identifierQuestionP29S1').innerHTML = ''
                        document.getElementById('identifierQuestionP29S1').append(tr)
                        displayComentarios(reporte['pregunta29seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP29s1', 'txtComentarioGeneralP29')

                        // PREGUNTA 30 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        document.getElementById('txtTotalInmueblesP30').innerHTML = reporte['pregunta30seccion1']['totalInmueblesDeporte']
                        document.getElementById('txtTotalInmuebles1P30').innerHTML = reporte['pregunta30seccion1']['totalFuncionPrincipal']
                        document.getElementById('txtTotal1x1P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalActivacionFisica']
                        document.getElementById('txtTotal1x2P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalRecreacionFisica']
                        document.getElementById('txtTotal1x3P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalDeporteSocial']
                        document.getElementById('txtTotal1x4P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalAltoRendimiento']
                        document.getElementById('txtTotal1x5P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalEventosDeportivos']
                        document.getElementById('txtTotal1x6P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalOtros']
                        document.getElementById('txtTotal1x7P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalIndistinciones']
                        document.getElementById('txtTotalInmuebles2P30').innerHTML = reporte['pregunta30seccion1']['totalOtraFuncion']
                        document.getElementById('txtTotal2x1P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionActivacionFisica']
                        document.getElementById('txtTotal2x2P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionRecreacionFisica']
                        document.getElementById('txtTotal2x3P30').innerHTML = reporte['pregunta30seccion1']['otrafuncionDeporteSocial']
                        document.getElementById('txtTotal2x4P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionAltoRendimiento']
                        document.getElementById('txtTotal2x5P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionEventosDeportivos']
                        document.getElementById('txtTotal2x6P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionOtros']
                        document.getElementById('txtTotal2x7P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionIndistionciones']
                        displayComentarios(reporte['pregunta30seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP30s1', 'txtDatosEspecificosP30s1')
                        displayComentarios(reporte['pregunta30seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP30s1', 'txtComentarioGeneralP30')

                        // PREGUNTA 31 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta31seccion1']['totalVehiculos'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta31seccion1']['Automoviles'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta31seccion1']['Camionetas'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta31seccion1']['motocicletas'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta31seccion1']['bicicletas'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta31seccion1']['helicopteros'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta31seccion1']['drones'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta31seccion1']['otros'], '1', 'auto'))
                        document.getElementById('identifierQuestionP31S1').innerHTML = ''
                        document.getElementById('identifierQuestionP31S1').append(tr)
                        displayComentarios(reporte['pregunta31seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP31s1', 'txtDatosEspecificosP31s1')
                        displayComentarios(reporte['pregunta31seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP31s1', 'txtComentarioGeneralP31')

                        //PREGUNTA 32 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta32seccion1']['totalLineas'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta32seccion1']['lineasFijas'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta32seccion1']['lineasMoviles'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta32seccion1']['totalAparatos'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta32seccion1']['aparatosFijos'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta32seccion1']['aparatosMoviles'], '1', 'auto'))
                        document.getElementById('identifierQuestionP32S1').innerHTML = ''
                        document.getElementById('identifierQuestionP32S1').append(tr)
                        displayComentarios(reporte['pregunta32seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP32s1', 'txtComentarioGeneralP32')

                        //PREGUNTA 33 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta33seccion1']['totalComputadoras'], '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta33seccion1']['computadorasEscritorio'], '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta33seccion1']['computadorasPersonales'], '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta33seccion1']['totalImpresoras'], '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta33seccion1']['impresorasPersonal'], '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta33seccion1']['impresoraCompartida'], '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta33seccion1']['multifuncionales'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta33seccion1']['servidores'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta33seccion1']['tabletas'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta33seccion1']['conexionRemota'], '1', 'auto'))
                        document.getElementById('identifierQuestionP33S1').innerHTML = ''
                        document.getElementById('identifierQuestionP33S1').append(tr)
                        displayComentarios(reporte['pregunta33seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP33s1', 'txtDatosEspecificosP33s1')
                        displayComentarios(reporte['pregunta33seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP33s1', 'txtComentarioGeneralP33')

                        //PREGUNTA 34 SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta34seccion1']['Respuesta'], '1', 'auto'))
                        document.getElementById('identifierQuestionP34S1').innerHTML = ''
                        document.getElementById('identifierQuestionP34S1').append(tr)
                        displayComentarios(reporte['pregunta34seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP34s1', 'txtComentarioGeneralP34')

                        // PREGUNTA 35 SECCION 1
                        document.getElementById('txtnombreInstitucion').innerHTML = nombreInstitucion
                        document.getElementById('txtTotal1P35').innerHTML = reporte['pregunta35seccion1']['totalComputadoras']
                        document.getElementById('txtTotal2P35').innerHTML = reporte['pregunta35seccion1']['totalImpresoras']
                        document.getElementById('txtTotal3P35').innerHTML = reporte['pregunta35seccion1']['totalMultifuncionales']
                        document.getElementById('txtTotal4P35').innerHTML = reporte['pregunta35seccion1']['totalServidores']
                        document.getElementById('txtTotal5P35').innerHTML = reporte['pregunta35seccion1']['totalTablets']
                        document.getElementById('txtTotal1x1P35').innerHTML = reporte['pregunta35seccion1']['funcionPrincipalComputadorasEducacion']
                        document.getElementById('txtTotal1x2P35').innerHTML = reporte['pregunta35seccion1']['otraFuncionComputadorasEducacion']
                        document.getElementById('txtTotal2x1P35').innerHTML = reporte['pregunta35seccion1']['funcionPrincipalImpresorasEducacion']
                        document.getElementById('txtTotal2x2P35').innerHTML = reporte['pregunta35seccion1']['otraFuncionImpresorasEducacion']
                        document.getElementById('txtTotal3x1P35').innerHTML = reporte['pregunta35seccion1']['funcionPrincipalMultifuncionalesEducacion']
                        document.getElementById('txtTotal3x2P35').innerHTML = reporte['pregunta35seccion1']['otraFuncionMultifuncionalesEducacion']
                        document.getElementById('txtTotal4x1P35').innerHTML = reporte['pregunta35seccion1']['funcionPrincipalServidoresEducacion']
                        document.getElementById('txtTotal4x2P35').innerHTML = reporte['pregunta35seccion1']['otraFuncionServidoresEducacion']
                        document.getElementById('txtTotal5x1P35').innerHTML = reporte['pregunta35seccion1']['funcionPrincipalTabletsEducacion']
                        document.getElementById('txtTotal5x2P35').innerHTML = reporte['pregunta35seccion1']['otraFuncionTabletsEducacion']
                        displayComentarios(reporte['pregunta35seccion1']['datosEspecificos'], 'contenedorComentariosEspecificosP35s1', 'txtDatosEspecificosP35s1')
                        displayComentarios(reporte['pregunta35seccion1']['comentarioGeneral'], 'contenedorComentariosGeneralP35s1', 'txtComentarioGeneralP35')

                        // PREGUNTA COMPLEMENTO SECCION 1
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['preguntacomplementoseccion1']['TotalPersonal'], '1', 'auto'))
                        tr.append(crearTD(reporte['preguntacomplementoseccion1']['totalHombres'], '1', 'auto'))
                        tr.append(crearTD(reporte['preguntacomplementoseccion1']['totalMujeres'], '1', 'auto'))
                        document.getElementById('identifierQuestionPComplementS1').innerHTML = ''
                        document.getElementById('identifierQuestionPComplementS1').append(tr)
                        displayComentarios(reporte['preguntacomplementoseccion1']['comentarioGeneral'], 'contenedorComentariosGeneralComplementos1', 'txtComentarioGeneralComplementoS1')

                        // PREGUNTA 1 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion12']['RespuestaTipoMateria1'], '3', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion12']['nombreDependenciaTipoMateria1'], '3', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion12']['RespuestaTipoMateria2'], '3', 'auto'))
                        tr.append(crearTD(reporte['pregunta1seccion12']['nombreDependenciaTipoMateria2'], '3    ', 'auto'))
                        document.getElementById('identifierQuestionP1S12').innerHTML = ''
                        document.getElementById('identifierQuestionP1S12').append(tr)
                        displayComentarios(reporte['pregunta1seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP1s12', 'txtComentarioGeneralP1s12')

                        // PREGUNTA 2 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['AdjudicacionDirecta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['Invitacion'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['licitacionPublicaNacional'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['licitacionPublicaInternacional'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['Otro'], '1', 'auto'))
                        document.getElementById('identifierQuestionMateria1P2S12').innerHTML = ''
                        document.getElementById('identifierQuestionMateria1P2S12').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['Respuesta2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['adjudicacionDirecta2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['Invitacion2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['licitacionPublicaNacional2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['licitacionPublicaInternacional2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta2seccion12']['Otro2'], '1', 'auto'))
                        document.getElementById('identifierQuestionMateria2P2S12').innerHTML = ''
                        document.getElementById('identifierQuestionMateria2P2S12').append(tr)
                        displayComentarios(reporte['pregunta2seccion12']['datosEspecificos'], 'contenedorComentariosEspecificosP2s12', 'txtDatosEspecificosP2s12')
                        displayComentarios(reporte['pregunta2seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP2s12', 'txtComentarioGeneralP2s12')

                        // PREGUNTA 3 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['noAplica1'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['contabaConMecanismos1'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Uno'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Dos'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Tres'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Cuatro'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Cinco'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Seis'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Siete'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Ocho'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Nueve'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Diez'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Once'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Doce'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Trece'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Catorce'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Quince'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['DiezSeis'], '1', 'auto'))
                        document.getElementById('identifierQuestionMateria1P3S12').innerHTML = ''
                        document.getElementById('identifierQuestionMateria1P3S12').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['noAplica2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['contabaConMecanismos2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Uno1'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Dos2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Tres3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Cuatro4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Cinco5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Seis6'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Siete7'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Ocho8'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Nueve9'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Diez10'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Once11'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Doce12'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Trece13'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Catorce14'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['Quince15'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta3seccion12']['DiezSeis16'], '1', 'auto'))
                        document.getElementById('identifierQuestionMateria2P3S12').innerHTML = ''
                        document.getElementById('identifierQuestionMateria2P3S12').append(tr)
                        displayComentarios(reporte['pregunta3seccion12']['datosEspecificos'], 'contenedorComentariosEspecificosP3s12', 'txtDatosEspecificosP3s12')
                        displayComentarios(reporte['pregunta3seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP3s12', 'txtComentarioGeneralP3s12')

                        // PREGUNTA 4 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta4seccion12']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta4seccion12']['Sitio'], '1', 'auto'))
                        document.getElementById('identifierQuestionP4S12').innerHTML = ''
                        document.getElementById('identifierQuestionP4S12').append(tr)
                        displayComentarios(reporte['pregunta4seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP4s12', 'txtComentarioGeneralP4s12')

                        // PREGUNTA 5 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion12']['Convocatoria'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion12']['Junta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion12']['actoPresentacion'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion12']['declaracionLicitacion'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion12']['Cancelacion'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion12']['emisionFallo'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion12']['Contratacion'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion12']['otraEtapa'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta5seccion12']['noSeSabe'], '1', 'auto'))
                        document.getElementById('identifierQuestionP5S12').innerHTML = ''
                        document.getElementById('identifierQuestionP5S12').append(tr)
                        displayComentarios(reporte['pregunta5seccion12']['datosEspecificos'], 'contenedorComentariosEspecificosP5s12', 'txtDatosEspecificosP5s12')
                        displayComentarios(reporte['pregunta5seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP5s12', 'txtComentarioGeneralP5s12')

                        // PREGUNTA 6 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada2'], '1', 'auto'))
                        document.getElementById('identifierQuestionTipoSistema12P6S12').innerHTML = ''
                        document.getElementById('identifierQuestionTipoSistema12P6S12').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada4'], '1', 'auto'))
                        document.getElementById('identifierQuestionTipoSistema34P6S12').innerHTML = ''
                        document.getElementById('identifierQuestionTipoSistema34P6S12').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta6'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato6'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia6'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada6'], '1', 'auto'))
                        document.getElementById('identifierQuestionTipoSistema56P6S12').innerHTML = ''
                        document.getElementById('identifierQuestionTipoSistema56P6S12').append(tr)
                        displayComentarios(reporte['pregunta6seccion12']['datosEspecificos'], 'contenedorComentariosEspecificosP6s12', 'txtDatosEspecificosP6s12')
                        displayComentarios(reporte['pregunta6seccion12']['comentariosGeneral'], 'contenedorComentariosGeneralP6s12', 'txtComentarioGeneralP6s12')

                        // PREGUNTA 7 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion12']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion12']['contratosRealizados'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion12']['Respuesta2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion12']['contratosRealizados2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion12']['Respuesta3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion12']['contratosRealizados3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion12']['Respuesta4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion12']['contratosRealizados4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion12']['Respuesta5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta7seccion12']['contratosRealizados5'], '1', 'auto'))
                        document.getElementById('identifierQuestionP7S12').innerHTML = ''
                        document.getElementById('identifierQuestionP7S12').append(tr)
                        document.getElementById('identifierQuestionSumaTotalContratosP7S12').innerHTML = reporte['pregunta7seccion12']['totalContratos']
                        document.getElementById('identifierQuestionSumaContratosP7S12').classList.add('d-none')
                        displayComentarios(reporte['pregunta7seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP7s12', 'txtComentarioGeneralP7s12')

                        // PREGUNTA 8 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Total'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Adquisiciones'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['otraPublica'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Respuesta2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Total2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Adquisiciones2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['otraPublica2'], '1', 'auto'))
                        document.getElementById('identifierQuestionTipoProcedimiento12P8S12').innerHTML = ''
                        document.getElementById('identifierQuestionTipoProcedimiento12P8S12').append(tr)
                        document.getElementById('identifierQuestionSumaContratos12P8S12').classList.add('d-none')
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Respuesta3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Total3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Adquisiciones3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['otraPublica3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Respuesta4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Total4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Adquisiciones4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['otraPublica4'], '1', 'auto'))
                        document.getElementById('identifierQuestionTipoProcedimiento34P8S12').innerHTML = ''
                        document.getElementById('identifierQuestionTipoProcedimiento34P8S12').append(tr)
                        document.getElementById('identifierQuestionSumaContratos34P8S12').classList.add('d-none')
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Respuesta5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Total5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['Adquisiciones5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta8seccion12']['otraPublica5'], '1', 'auto'))
                        document.getElementById('identifierQuestionTipoProcedimiento5P8S12').innerHTML = ''
                        document.getElementById('identifierQuestionTipoProcedimiento5P8S12').append(tr)
                        document.getElementById('totalContratosP8S12').innerHTML = reporte['pregunta8seccion12']['totalGeneral']
                        document.getElementById('totalContratos1P8S12').innerHTML = reporte['pregunta8seccion12']['totalGeneralAdquisiciones']
                        document.getElementById('totalContratos2P8S12').innerHTML = reporte['pregunta8seccion12']['totalGeneralObras']
                        document.getElementById('identifierQuestionSumaContratos5P8S12').classList.add('d-none')
                        displayComentarios(reporte['pregunta8seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP8s12', 'txtComentarioGeneralP8s12')

                        // PREGUNTA 9 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion12']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion12']['monAsociado'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion12']['Respuesta2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion12']['monAsociado2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion12']['Respuesta3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion12']['monAsociado3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion12']['Respuesta4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion12']['monAsociado4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion12']['Respuesta5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta9seccion12']['monAsociado5'], '1', 'auto'))
                        document.getElementById('identifierQuestionP9S12').innerHTML = ''
                        document.getElementById('identifierQuestionP9S12').append(tr)
                        document.getElementById('totalMontoP9S12').innerHTML = reporte['pregunta9seccion12']['totalMonto']
                        document.getElementById('identifierQuestionMontoAsociadoP9S12').classList.add('d-none')
                        displayComentarios(reporte['pregunta9seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP9s12', 'txtComentarioGeneralP9s12')

                        // PREGUNTA 10 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['TotalMonto'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoAdquisiciones'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoObra1'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['Respuesta2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['TotalMonto2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoAdquisiciones2'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoObra12'], '1', 'auto'))
                        document.getElementById('identifierQuestionTipoProcedimiento12P10S12').innerHTML = ''
                        document.getElementById('identifierQuestionTipoProcedimiento12P10S12').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['Respuesta3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['TotalMonto3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoAdquisiciones3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoObra3'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['Respuesta4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['TotalMonto4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoAdquisiciones4'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoObra14'], '1', 'auto'))
                        document.getElementById('identifierQuestionTipoProcedimiento34P10S12').innerHTML = ''
                        document.getElementById('identifierQuestionTipoProcedimiento34P10S12').append(tr)
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['Respuesta5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['TotalMonto5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoAdquisiciones5'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoObra15'], '1', 'auto'))
                        document.getElementById('identifierQuestionTipoProcedimiento5P10S12').innerHTML = ''
                        document.getElementById('identifierQuestionTipoProcedimiento5P10S12').append(tr)
                        document.getElementById('totalMontoP10S12').innerHTML = reporte['pregunta10seccion12']['totalGeneralMaximo']
                        document.getElementById('totalMonto1P10S12').innerHTML = reporte['pregunta10seccion12']['totalMontoAdquisicionesGeneral']
                        document.getElementById('totalMonto2P10S12').innerHTML = reporte['pregunta10seccion12']['totalMontoObrasGeneral']
                        displayComentarios(reporte['pregunta10seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP10s12', 'txtComentarioGeneralP10s12')

                        // PREGUNTA 11 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion12']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion12']['totalContratos'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta11seccion12']['Monto'], '1', 'auto'))
                        document.getElementById('identifierQuestionP11S12').innerHTML = ''
                        document.getElementById('identifierQuestionP11S12').append(tr)
                        displayComentarios(reporte['pregunta11seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP11s12', 'txtComentarioGeneralP11s12')

                        // PREGUNTA 12 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion12']['Respuesta'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion12']['totalContratos'], '1', 'auto'))
                        tr.append(crearTD(reporte['pregunta12seccion12']['Monto'], '1', 'auto'))
                        document.getElementById('identifierQuestionP12S12').innerHTML = ''
                        document.getElementById('identifierQuestionP12S12').append(tr)
                        displayComentarios(reporte['pregunta12seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP12s12', 'txtComentarioGeneralP12s12')

                        // PREGUNTA 13 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta13seccion12']['Total'], '1', 'auto'))
                        document.getElementById('identifierQuestionP13S12').innerHTML = ''
                        document.getElementById('identifierQuestionP13S12').append(tr)
                        displayComentarios(reporte['pregunta13seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP13s12', 'txtComentarioGeneralP13s12')

                        // PREGUNTA 14 SECCION 12
                        tr = document.createElement('tr')
                        tr.append(crearTD(idInstitucion, '1', '5%'))
                        tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                        tr.append(crearTD(reporte['pregunta14seccion12']['Total'], '1', 'auto'))
                        document.getElementById('identifierQuestionP14S12').innerHTML = ''
                        document.getElementById('identifierQuestionP14S12').append(tr)
                        displayComentarios(reporte['pregunta14seccion12']['comentarioGeneral'], 'contenedorComentariosGeneralP14s12', 'txtComentarioGeneralP14s12')

                        // OCULTAR PREGUNTAS CONTESTADAS
                        ocultarPreguntasNoContestadas()

                        // IMPRMIR REPORTE
                        window.print()
                    })
                } else {
                    window.close()
                }
            })
        })
    } else {
        let contenedoresDeComentarios = document.getElementsByClassName('contenedorDeComentarios'),
            numerosConcentrados = {
                'general': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 100],
                'centralizadas': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
                'paraestatales': [21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85]
            }

        // OCULTAR TODOS LOS CONTENEDORES DE COMENTARIOS
        for (let i = 0; i < contenedoresDeComentarios.length; i++) {
            contenedoresDeComentarios[i].classList.add('d-none')
        }


        //VARIABLES PARA TOTALES EN LAS TABLAS
        let totalHombresGenerales = 0, totalMujeresGeneral=0, totalGeneralPersonal=0, totalPersonalContratacion = 0,  totalHombresContratacion =0, totalMujeresContratacion = 0, totalConfianzaHombres = 0, totalConfianzaMujeres = 0, totalBaseHombres = 0, totalBaseMujeres = 0, totalEventualHombres = 0, totalEventualMujeres = 0, totalHonorariosHombres = 0, totalHonorariosMujeres = 0, totalOtrosHombres = 0, totalOtrosMujeres = 0, totalSeguridadPersonal = 0, totalSeguridadHombres = 0, totalSeguridadMujeres = 0, totalISSSTEHombres = 0, totalISSSTEMujeres = 0, totalISSEFHombres = 0, totalISSEFMujeres = 0, totalIMSSHombres = 0, totalIMSSMujeres = 0, totalOtrosSeguridadHombres = 0, totalOtrosSeguridadMujeres = 0, totalSinSeguridadHombres = 0, totalSinSeguridadMujeres = 0, totalEdadesPersonal = 0, totalEdadesHombres = 0, totalEdadesMujeres = 0, total1824Hombres = 0, total1824Mujeres = 0, total2529Hombres = 0, total2529Mujeres = 0, total3034Hombres = 0, total3034Mujeres = 0, total3539Hombres = 0 , total3539Mujeres = 0, total4044Hombres = 0, total4044Mujeres = 0, total4549Hombres = 0, total4549Mujeres = 0, total5054Hombres = 0, total5054Mujeres = 0, total5559Hombres = 0, total5559Mujeres = 0, total60Hombres = 0, total60Mujeres = 0, totalPagaPersonal = 0, totalPagaHombre = 0, totalPagaMujeres = 0, totalSinPagaHombres = 0, totalSinPagaMujeres = 0, total1a1500Hombres = 0, total1a1500Mujeres = 0, total5001a10000Hombres = 0, total5001a10000Mujeres = 0, total10001a15000Hombres = 0, total10001a15000Mujeres = 0, total15001a20000Hombres = 0, total15001a20000Mujeres = 0, total20001a25000Hombres = 0, total20001a25000Mujeres = 0, total25001a30000Hombres = 0, total25001a30000Mujeres = 0, total30001a35000Hombres = 0, total30001a35000Mujeres = 0, total35001a40000Hombres = 0, total35001a40000Mujeres = 0, total40001a45000Hombres = 0, total40001a45000Mujeres = 0, total45001a50000Hombres = 0, total45001a50000Mujeres = 0, total50001a55000Hombres = 0, total50001a55000Mujeres = 0, total55001a60000Hombres = 0, total55001a60000Mujeres = 0,total60001a65000Hombres = 0, total60001a65000Mujeres = 0, total65001a70000Hombres = 0, total65001a70000Mujeres = 0, totalMas70000Hombres = 0 , totalMas70000Mujeres = 0, totalEscolaridadPersonal = 0, totalEscolaridadHombres = 0, totalEscolaridadMujeres = 0, totalNingunoHombres = 0, totalNingunoMujeres = 0, totalParaescolarHombres = 0, totalParaescolarMujeres = 0, totalSecundariaHombres = 0, totalSecundariaMujeres = 0, totalPreparatoriaHombres = 0, totalPreparatoriaMujeres = 0, totalCarreraHombres = 0, totalCarreraMujeres = 0, totalLicenciaturaHombres = 0, totallicenciaturaMujeres = 0, totalMaestriaHombres = 0, totalMaestriaMujeres = 0, totalDoctoradoHombres = 0, totalDoctoradoMujeres = 0, totalIndigenaPersonal = 0, totalIndigenaHombres = 0, totalIndigenaMujeres = 0, totalPertenecenIndigenaHombres = 0, totalPertenecenIndigenaMujeres = 0, totalNoPertenecenIndigenaHombres = 0, totalNoPertenecenIndigenaMujeres = 0, totalIndigenaNoIdentificadoHombres = 0, totalIndigenaNoIdentificadoMujeres = 0, totalChinanteco = 0, totalChinantecoHombres = 0, totalChinantecoMujeres = 0, totalChol = 0, totalCholHombres = 0, totalCholMujeres = 0, totalCora = 0, totalCoraHombres = 0, totalCoraMujeres = 0, totalHuasteco = 0, totalHuastecoHombres = 0, totalHuastecoMujeres = 0, totalHuichol = 0, totalHuicholHombres = 0, totalHuicholMujeres = 0, totalMaya = 0, totalMayaHombres = 0, totalMayaMujeres = 0, totalMayo = 0, totalMayoHombres = 0, totalMayoMujeres = 0, totalMazahua = 0, totalMazahuaHombres = 0, totalMazahuaMujeres = 0, totalMazateco = 0, totalMazatecoHombres = 0, totalMazatecoMujeres = 0, totalMixe = 0, totalMixeHombres = 0, totalMixeMujeres = 0, totalMixteco = 0, totalMixtecoHombres = 0, totalMixtecoMujeres = 0, totalNahuatl = 0, totalNahuatlHombres = 0, totalNahuatlMujeres = 0, totalOtomi = 0, totalOtomiHombres = 0, totalOtomiMujeres = 0, totalTarasco = 0, totalTarascoHombres = 0, totalTarascoMujeres = 0, totalTarahumara = 0, totalTarahumaraHombres = 0, totalTarahumaraMujeres = 0, totalTepehuano = 0, totalTepehuanoHombres = 0, totalTepehuanoMujeres= 0, totalTotonaco = 0, totalTotonacoHombres = 0, totalTotonacoMujeres = 0, totalTlapenaco = 0, totalTlapenacoHombres = 0, totalTlapenacoMujeres = 0, totalTseltal = 0, totalTseltalHombres = 0, totalTsetalMujeres = 0, totalTsotsil = 0, totalTsotsilHombres = 0, totalTsotsilMujeres = 0, totalYaqui = 0, totalYaquiHombres = 0, totalYaquiMujeres = 0, totalZapoteco = 0, totalZapotecoHombres = 0, totalZapotecoMujeres = 0, totalZoque = 0, totalZoqueHombres = 0, totalZoqueMujeres = 0, totalOtraLengua = 0, totalOtraLenguaHombres = 0, totalOtraLenguaMujeres = 0, totalNoIdentificadaLengua = 0, totalNoIdentificadaLenguaHombres = 0, totalNoIdentificadaLenguaMujeres = 0, totalDiscapacidadPersonal = 0, totalDiscapacidadHombres = 0, totalDiscapacidadMujeres = 0, totalConDiscapacidadHombres = 0, totalConDiscapacidadMujeres = 0, totalSinDiscapacidadaHombres = 0, totalSinDiscapacidadaMujeres = 0, totalNoIdentificadoDiscapacidadaHombres = 0, totalNoIdentificadoDiscapacidadaMujeres = 0, totalCaminar = 0, totalCaminarHombres = 0, totalCaminarMujeres = 0, totalVer = 0, totalVerHombres = 0, totalVerMujeres = 0, totalMover = 0, totalMoverHombres = 0, totalMoverMujeres = 0, totalAprender = 0, totalAprenderHombres = 0, totalAprenderMujeres = 0, totalOir = 0, totalOirHombres = 0, totalOirMujeres = 0, totalHablar = 0, totalHablarHombres = 0, totalHablarMujeres = 0, totalBaniarse = 0, totalBaniarseHombres = 0, totalBaniarseMujeres = 0, totalMoral = 0, totalMoralHombres = 0, totalMoralMujeres = 0, totalDiscapacidadDiferente = 0, totalDiscapacidadDiferenteHombres = 0, totalDiscapacidadDiferenteMujeres = 0, totalDiscapacidadNoIdentificado = 0, totalDiscapacidadNoIdentificadoHombres = 0, totalDiscapacidadNoIdentificadoMujeres = 0, fondos1General = 0, fondos1Hombres = 0, fondos1Mujeres = 0, fondos2General = 0, fondos2Hombres = 0, fondos2Mujeres = 0, accionesImpartidas = 0, accionesConcluidas = 0, accionesTotalPersonal = 0, accionesTotalHombres = 0, accionesMujeres = 0, totalInmuebles = 0, totalInmueblesPropios = 0, totalInmueblesRentados = 0, totalInmueblesOtros = 0

        numerosConcentrados[idInstitucion].forEach(idDependencia => {

            recuperarNombreDependencia(idDependencia, anioInstitucion).then((res) => {
                let nombreInstitucion = res[0]
                let clasificacionInstitucion = res[1]
                obtenerReporte(idDependencia, nombreInstitucion, clasificacionInstitucion, anioInstitucion).then(() => {
                    
                    // PREGUNTA 1 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(clasificacionInstitucion, '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion1']['tipoInstitucion'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion1']['funcionPrincipal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion1']['funcionSecundaria1'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion1']['funcionSecundaria2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion1']['funcionSecundaria3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion1']['funcionSecundaria4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion1']['funcionSecundaria5'], '1', 'auto'))
                    document.getElementById('identifierQuestionP1S1').append(tr)

                    // PREGUNTA 2 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion1']['respuesta'], '1', 'auto'))
                    document.getElementById('identifierQuestionP2S1').append(tr)

                    // PREGUNTA 3 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['sexo'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['edad'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['ingresosMensual'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['nivelEscolaridad'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['estatusEscolaridad'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['empleoAnterior'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['antiguedadServicio'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['antiguedadCargo'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['pertinenciaIndigena'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['condicionDiscapacidad'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['formaDesignacion'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['afiliacionPartidista'] != '' ? reporte['pregunta3seccion1']['afiliacionPartidista'] : 'NA', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion1']['idInstitular'] != '' ? reporte['pregunta3seccion1']['idInstitular'] : 'NA', 'auto'))
                    document.getElementById('identifierQuestionP3S1').append(tr)

                    // PREGUNTA 4 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta4seccion1']['totalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta4seccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta4seccion1']['totalMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP4S1').append(tr)
                    
                    totalHombresGenerales = totalHombresGenerales + parseInt(reporte['pregunta4seccion1']['totalHombres'])
                    totalMujeresGeneral = totalMujeresGeneral + parseInt(reporte['pregunta4seccion1']['totalMujeres'])
                    totalGeneralPersonal = totalGeneralPersonal + parseInt(reporte['pregunta4seccion1']['totalPersonal'])



                    // PREGUNTA 5 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['totalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['totalMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['confianzaHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['confianzaMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['baseHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['baseMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['eventualHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['eventualMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['honorariosHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['honorariosMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['otrosHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion1']['otrosMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP5S1').append(tr)

                    totalPersonalContratacion = totalPersonalContratacion + parseInt(reporte['pregunta5seccion1']['totalPersonal'])
                    totalHombresContratacion = totalHombresContratacion + parseInt(reporte['pregunta5seccion1']['totalHombres'])
                    totalMujeresContratacion = totalMujeresContratacion + parseInt(reporte['pregunta5seccion1']['totalMujeres'])
                    totalConfianzaHombres = totalConfianzaHombres + parseInt(reporte['pregunta5seccion1']['confianzaHombres'])
                    totalConfianzaMujeres = totalConfianzaMujeres + parseInt(reporte['pregunta5seccion1']['confianzaMujeres'])
                    totalBaseHombres = totalBaseHombres + parseInt(reporte['pregunta5seccion1']['baseHombres'])
                    totalBaseMujeres = totalBaseMujeres + parseInt(reporte['pregunta5seccion1']['baseMujeres'])
                    totalEventualHombres = totalEventualHombres + parseInt(reporte['pregunta5seccion1']['eventualHombres'])
                    totalEventualMujeres = totalEventualMujeres + parseInt(reporte['pregunta5seccion1']['eventualMujeres'])
                    totalHonorariosHombres = totalHonorariosHombres + parseInt(reporte['pregunta5seccion1']['honorariosHombres'])
                    totalHonorariosMujeres = totalHonorariosMujeres + parseInt(reporte['pregunta5seccion1']['honorariosMujeres'])
                    totalOtrosHombres = totalOtrosHombres + parseInt(reporte['pregunta5seccion1']['otrosHombres'])
                    totalOtrosMujeres = totalOtrosMujeres + parseInt(reporte['pregunta5seccion1']['otrosMujeres'])

                    // PREGUNTA 6 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['totalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['totalMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['isssteHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['issteMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['issfhHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['issfhMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['imssHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['imssMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['otroHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['otroMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['sinSeguroHombre'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion1']['sinSeguroMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP6S1').append(tr)

                    totalSeguridadPersonal = totalSeguridadPersonal + parseInt(reporte['pregunta6seccion1']['totalPersonal'])
                    totalSeguridadHombres = totalSeguridadHombres + parseInt(reporte['pregunta6seccion1']['totalHombres'])
                    totalSeguridadHombres = totalSeguridadMujeres + parseInt(reporte['pregunta6seccion1']['totalMujeres'])
                    totalISSSTEHombres = totalISSSTEHombres + parseInt(reporte['pregunta6seccion1']['isssteHombres'])
                    totalISSSTEMujeres = totalISSSTEMujeres + parseInt(reporte['pregunta6seccion1']['issteMujeres'])
                    totalISSEFHombres = totalISSEFHombres + parseInt(reporte['pregunta6seccion1']['issfhHombres'])
                    totalISSEFMujeres = totalISSEFMujeres + parseInt(reporte['pregunta6seccion1']['issfhMujeres'])
                    totalIMSSHombres = totalIMSSHombres + parseInt(reporte['pregunta6seccion1']['imssHombres'])
                    totalIMSSMujeres = totalIMSSMujeres + parseInt(reporte['pregunta6seccion1']['imssMujeres'])
                    totalOtrosSeguridadHombres = totalOtrosSeguridadHombres + parseInt(reporte['pregunta6seccion1']['otroHombres'])
                    totalOtrosSeguridadMujeres = totalOtrosSeguridadMujeres + parseInt(reporte['pregunta6seccion1']['otroMujeres'])
                    totalSinSeguridadHombres = totalSinSeguridadHombres + parseInt(reporte['pregunta6seccion1']['sinSeguroHombre'])
                    totalSinSeguridadMujeres = totalSinSeguridadMujeres + parseInt(reporte['pregunta6seccion1']['sinSeguroMujeres'])

                    // PREGUNTA 7 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['totalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['totalMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['1824Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['1824Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['2529Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['2529Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['3034Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['3034Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['3539Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['3539Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['4044Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['4044Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['4549Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['4549Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['5054Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['5054Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['5559Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['5559Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['60Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion1']['60Mujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP7S1').append(tr)

                    totalEdadesPersonal = totalEdadesPersonal + parseInt(reporte['pregunta7seccion1']['totalPersonal'])
                    totalEdadesHombres = totalEdadesHombres + parseInt(reporte['pregunta7seccion1']['totalHombres'])
                    totalEdadesMujeres = totalEdadesMujeres + parseInt(reporte['pregunta7seccion1']['totalMujeres'])
                    total1824Hombres = total1824Hombres + parseInt(reporte['pregunta7seccion1']['1824Hombres'])
                    total1824Mujeres = total1824Mujeres + parseInt(reporte['pregunta7seccion1']['1824Mujeres'])
                    total2529Hombres = total2529Hombres + parseInt(reporte['pregunta7seccion1']['2529Hombres'])
                    total2529Mujeres = total2529Mujeres + parseInt(reporte['pregunta7seccion1']['2529Mujeres'])
                    total3034Hombres = total3034Hombres + parseInt(reporte['pregunta7seccion1']['3034Hombres'])
                    total3034Mujeres = total3034Mujeres + parseInt(reporte['pregunta7seccion1']['3034Mujeres'])
                    total3539Hombres = total3539Hombres + parseInt(reporte['pregunta7seccion1']['3539Hombres'])
                    total3539Mujeres = total3539Mujeres + parseInt(reporte['pregunta7seccion1']['3539Mujeres'])
                    total4044Hombres = total4044Hombres + parseInt(reporte['pregunta7seccion1']['4044Hombres'])
                    total4044Mujeres = total4044Mujeres + parseInt(reporte['pregunta7seccion1']['4044Mujeres'])
                    total4549Hombres = total4549Hombres + parseInt(reporte['pregunta7seccion1']['4549Hombres'])
                    total4549Mujeres = total4549Mujeres + parseInt(reporte['pregunta7seccion1']['4549Mujeres'])
                    total5054Hombres = total5054Hombres + parseInt(reporte['pregunta7seccion1']['5054Hombres'])
                    total5054Mujeres = total5054Mujeres + parseInt(reporte['pregunta7seccion1']['5054Mujeres'])
                    total5559Hombres = total5559Hombres + parseInt(reporte['pregunta7seccion1']['5559Hombres'])
                    total5559Mujeres = total5559Mujeres + parseInt(reporte['pregunta7seccion1']['5559Mujeres'])
                    total60Hombres = total60Hombres + parseInt(reporte['pregunta7seccion1']['60Hombres'])
                    total60Mujeres = total60Mujeres + parseInt(reporte['pregunta7seccion1']['60Mujeres'])

                    // PREGUNTA 8 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['totalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['totalMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['sinPagaHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['sinPagaMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['1a1500Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['1a1500Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['5001a10000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['5001a10000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['10001a15000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['10001a15000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['15001a20000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['15001a20000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['20001a25000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['20001a25000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['25001a30000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['25001a30000Mujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP8S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['30001a35000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['30001a35000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['35001a40000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['35001a40000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['40001a45000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['40001a45000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['45001a50000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['45001a50000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['50001a55000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['50001a55000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['55001a60000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['55001a60000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['60001a65000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['60001a65000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['65001a70000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['65001a70000Mujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['mas70000Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion1']['mas70000Mujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP81S1').append(tr)

                    totalEdadesPersonal = totalEdadesPersonal + parseInt(reporte['pregunta8seccion1']['totalPersonal'])
                    totalEdadesHombres = totalEdadesHombres + parseInt(reporte['pregunta8seccion1']['totalHombres'])
                    totalEdadesMujeres = totalEdadesMujeres + parseInt(reporte['pregunta8seccion1']['totalMujeres'])
                    totalSinPagaHombres = totalSinPagaHombres + parseInt(reporte['pregunta8seccion1']['sinPagaHombres'])
                    totalSinPagaMujeres = totalSinPagaMujeres + parseInt(reporte['pregunta8seccion1']['sinPagaMujeres'])
                    total1a1500Hombres += parseInt(reporte['pregunta8seccion1']['1a1500Hombres'])
                    total1a1500Mujeres += parseInt(reporte['pregunta8seccion1']['1a1500Mujeres'])
                    total5001a10000Hombres += parseInt(reporte['pregunta8seccion1']['5001a10000Hombres'])
                    total5001a10000Mujeres += parseInt(reporte['pregunta8seccion1']['5001a10000Mujeres'])
                    total10001a15000Hombres += parseInt(reporte['pregunta8seccion1']['10001a15000Mujeres'])
                    total10001a15000Mujeres += parseInt(reporte['pregunta8seccion1']['10001a15000Mujeres'])
                    total15001a20000Hombres += parseInt(reporte['pregunta8seccion1']['15001a20000Hombres'])
                    total15001a20000Mujeres += parseInt(reporte['pregunta8seccion1']['15001a20000Mujeres'])
                    total20001a25000Hombres += parseInt(reporte['pregunta8seccion1']['20001a25000Hombres'])
                    total20001a25000Mujeres += parseInt(reporte['pregunta8seccion1']['20001a25000Mujeres'])
                    total25001a30000Hombres += parseInt(reporte['pregunta8seccion1']['25001a30000Hombres'])
                    total25001a30000Mujeres += parseInt(reporte['pregunta8seccion1']['25001a30000Mujeres'])
                    total30001a35000Hombres += parseInt(reporte['pregunta8seccion1']['30001a35000Hombres'])
                    total30001a35000Mujeres += parseInt(reporte['pregunta8seccion1']['30001a35000Mujeres'])
                    total35001a40000Hombres += parseInt(reporte['pregunta8seccion1']['35001a40000Hombres'])
                    total35001a40000Mujeres += parseInt(reporte['pregunta8seccion1']['35001a40000Mujeres'])
                    total40001a45000Hombres += parseInt(reporte['pregunta8seccion1']['40001a45000Hombres'])
                    total40001a45000Mujeres += parseInt(reporte['pregunta8seccion1']['40001a45000Mujeres'])
                    total45001a50000Hombres += parseInt(reporte['pregunta8seccion1']['45001a50000Hombres'])
                    total45001a50000Mujeres += parseInt(reporte['pregunta8seccion1']['45001a50000Mujeres'])
                    total50001a55000Hombres += parseInt(reporte['pregunta8seccion1']['50001a55000Hombres'])
                    total50001a55000Mujeres += parseInt(reporte['pregunta8seccion1']['50001a55000Mujeres'])
                    total55001a60000Hombres += parseInt(reporte['pregunta8seccion1']['55001a60000Hombres'])
                    total55001a60000Mujeres += parseInt(reporte['pregunta8seccion1']['55001a60000Mujeres'])
                    total60001a65000Hombres += parseInt(reporte['pregunta8seccion1']['60001a65000Hombres'])
                    total60001a65000Mujeres += parseInt(reporte['pregunta8seccion1']['60001a65000Mujeres'])
                    total65001a70000Hombres += parseInt(reporte['pregunta8seccion1']['65001a70000Hombres'])
                    total65001a70000Mujeres += parseInt(reporte['pregunta8seccion1']['65001a70000Mujeres'])
                    totalMas70000Hombres += parseInt(reporte['pregunta8seccion1']['mas70000Hombres'])
                    totalMas70000Mujeres += parseInt(reporte['pregunta8seccion1']['mas70000Mujeres'])

                    // PREGUNTA 9 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['totalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['totalMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['ningunoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['ningunoMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['prePriHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['prePriMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['secundariaHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['secundariaMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['preparatoriaHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['preparatoriaMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['carreraHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['carreraMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['licenciaturaHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['licenciaturaMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['maestriaHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['maestriaMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['doctoradoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion1']['doctoradoMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP9S1').append(tr)

                    totalEscolaridadPersonal += parseInt(reporte['pregunta9seccion1']['totalPersonal'])
                    totalEscolaridadHombres += parseInt(reporte['pregunta9seccion1']['totalHombres'])
                    totalEscolaridadMujeres += parseInt(reporte['pregunta9seccion1']['totalMujeres'])
                    totalNingunoHombres += parseInt(reporte['pregunta9seccion1']['ningunoHombres'])
                    totalNingunoMujeres += parseInt(reporte['pregunta9seccion1']['ningunoMujeres'])
                    totalParaescolarHombres += parseInt(reporte['pregunta9seccion1']['prePriHombres'])
                    totalParaescolarMujeres += parseInt(reporte['pregunta9seccion1']['prePriMujeres'])
                    totalSecundariaHombres += parseInt(reporte['pregunta9seccion1']['secundariaHombres'])
                    totalSecundariaMujeres += parseInt(reporte['pregunta9seccion1']['secundariaMujeres'])
                    totalPreparatoriaHombres += parseInt(reporte['pregunta9seccion1']['preparatoriaHombres'])
                    totalPreparatoriaMujeres += parseInt(reporte['pregunta9seccion1']['preparatoriaMujeres'])
                    totalCarreraHombres += parseInt(reporte['pregunta9seccion1']['carreraHombres'])
                    totalCarreraMujeres += parseInt(reporte['pregunta9seccion1']['carreraMujeres'])
                    totalLicenciaturaHombres += parseInt(reporte['pregunta9seccion1']['licenciaturaHombres'])
                    totallicenciaturaMujeres += parseInt(reporte['pregunta9seccion1']['licenciaturaMujeres'])
                    totalDoctoradoHombres += parseInt(reporte['pregunta9seccion1']['doctoradoHombres'])
                    totalDoctoradoMujeres += parseInt(reporte['pregunta9seccion1']['doctoradoMujeres'])

                    // PREGUNTA 10 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion1']['totalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion1']['totalMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion1']['perteneceIndigenaH'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion1']['perteneceIndigenaM'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion1']['noPerteneceIndigenaH'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion1']['noPerteneneIndigenaM'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion1']['noIdentificadoH'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion1']['noIdentificadoM'], '1', 'auto'))
                    document.getElementById('identifierQuestionP10S1').append(tr)

                    totalIndigenaPersonal += parseInt(reporte['pregunta10seccion1']['totalPersonal'])
                    totalIndigenaHombres += parseInt(reporte['pregunta10seccion1']['totalHombres'])
                    totalIndigenaMujeres += parseInt(reporte['pregunta10seccion1']['totalMujeres'])
                    totalPertenecenIndigenaHombres += parseInt(reporte['pregunta10seccion1']['perteneceIndigenaH'])
                    totalPertenecenIndigenaMujeres += parseInt(reporte['pregunta10seccion1']['perteneceIndigenaM'])
                    totalNoPertenecenIndigenaHombres += parseInt(reporte['pregunta10seccion1']['noPerteneceIndigenaH'])
                    totalNoPertenecenIndigenaMujeres += parseInt(reporte['pregunta10seccion1']['noPerteneceIndigenaM'])
                    totalIndigenaNoIdentificadoHombres += parseInt(reporte['pregunta10seccion1']['noIdentificadoH'])
                    totalIndigenaNoIdentificadoMujeres += parseInt(reporte['pregunta10seccion1']['noIdentificadoM'])

                    // PREGUNTA 11 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD('', '1', '37%'))
                    td = document.createElement('td')
                    td.className = 'text-center align-middle px-5'
                    td.appendChild(document.createTextNode('Total: ' + reporte['pregunta11seccion1']['totalPersonal']))
                    tr.append(td)
                    td = document.createElement('td')
                    td.className = 'text-center align-middle px-5'
                    td.appendChild(document.createTextNode('Hombres: ' + reporte['pregunta11seccion1']['totalHombres']))
                    tr.append(td)
                    td = document.createElement('td')
                    td.className = 'text-center align-middle px-5'
                    td.appendChild(document.createTextNode('Mujeres: ' + reporte['pregunta11seccion1']['totalMujeres']))
                    tr.append(td)
                    document.getElementById('identifierQuestionSumaTotalIndigenaP11S1').innerHTML = ''
                    document.getElementById('identifierQuestionSumaTotalIndigenaP11S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['chinantecoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['chinantecoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['chinantecoMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['cholTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['cholHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['cholMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['coraTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['coraHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['coraMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['huastecoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['huastecoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['huastecoMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['huicholTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['huicholHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['huicholMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mayaTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mayaHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mayaMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mayoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mayoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mayoMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionIndigena17P11S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mazahuaTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mazahuaHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mazahuaMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mazatecoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mazatecoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mazatecoMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mixeTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mixeHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mixeMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mixtecoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mixtecoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['mixtecoMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['nahuatlTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['nahuatlHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['nahuatlMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['otomiTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['otomiHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['otomiMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionIndigena813P11S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tarascoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tarascoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tarascoMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tarahumaraTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tarahumaraHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tarahumaraMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tepehuanoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tepehuanoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tepehuanoMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tlapanecoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tlapanecoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tlapanecoMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['totonacoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['totonacoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['totnacoMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tseltalTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tseltalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tseltalMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionIndigena1419P11S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tsotsitTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tsotsitHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['tsotsitMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['yaquiTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['yaquiHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['yaquiMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['zapotecoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['zapotecoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['zapotecoMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['zoqueTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['zoqueHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['zoqueMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['otroTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['otroHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['otroMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['noidentificadoTotal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['noIdentificadoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion1']['noIdentificadoMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionIndigena2025P11S1').append(tr)

                    totalChinanteco += parseInt(reporte['pregunta11seccion1']['chinantecoTotal'])
                    totalChinantecoHombres += parseInt(reporte['pregunta11seccion1']['chinantecoHombres'])
                    totalChinantecoMujeres += parseInt(reporte['pregunta11seccion1']['chinantecoMujeres'])
                    totalChol += parseInt(reporte['pregunta11seccion1']['cholTotal'])
                    totalCholHombres += parseInt(reporte['pregunta11seccion1']['cholHombres'])
                    totalCholMujeres += parseInt(reporte['pregunta11seccion1']['cholMujeres'])
                    totalHuasteco += parseInt(reporte['pregunta11seccion1']['huastecoTotal'])
                    totalHuastecoHombres += parseInt(reporte['pregunta11seccion1']['huastecoHombres'])
                    totalHuastecoMujeres += parseInt(reporte['pregunta11seccion1']['huastecoMujeres'])
                    totalHuichol += parseInt(reporte['pregunta11seccion1']['huicholTotal'])
                    totalHuicholHombres += parseInt(reporte['pregunta11seccion1']['huicholHombres'])
                    totalHuicholMujeres += parseInt(reporte['pregunta11seccion1']['huicholMujeres'])
                    totalMaya += parseInt(reporte['pregunta11seccion1']['mayaTotal'])
                    totalMayaHombres += parseInt(reporte['pregunta11seccion1']['mayaHombres'])
                    totalMayaMujeres += parseInt(reporte['pregunta11seccion1']['mayaMujeres'])
                    totalMayo += parseInt(reporte['pregunta11seccion1']['mayoTotal'])
                    totalMayoHombres += parseInt(reporte['pregunta11seccion1']['mayoHombres'])
                    totalMayoMujeres += parseInt(reporte['pregunta11seccion1']['mayoMujeres'])
                    totalMazahua += parseInt(reporte['pregunta11seccion1']['mazahuaTotal'])
                    totalMazahuaHombres += parseInt(reporte['pregunta11seccion1']['mazahuaHombres'])
                    totalMazahuaMujeres += parseInt(reporte['pregunta11seccion1']['mazahuaMujeres'])
                    totalMazateco += parseInt(reporte['pregunta11seccion1']['mazatecoTotal'])
                    totalMazatecoHombres += parseInt(reporte['pregunta11seccion1']['mazatecoHombres'])
                    totalMazatecoMujeres += parseInt(reporte['pregunta11seccion1']['mazatecoMujeres'])
                    totalMixe += parseInt(reporte['pregunta11seccion1']['mixeTotal'])
                    totalMixeHombres += parseInt(reporte['pregunta11seccion1']['mixeHombres'])
                    totalMixeMujeres += parseInt(reporte['pregunta11seccion1']['mixeMujeres'])
                    totalMixteco += parseInt(reporte['pregunta11seccion1']['mixtecoTotal'])
                    totalMixtecoHombres += parseInt(reporte['pregunta11seccion1']['mixtecoHombres'])
                    totalMixtecoMujeres += parseInt(reporte['pregunta11seccion1']['mixtecoMujeres'])
                    totalNahuatl += parseInt(reporte['pregunta11seccion1']['nahuatlTotal'])
                    totalNahuatlHombres += parseInt(reporte['pregunta11seccion1']['nahuatlHombres'])
                    totalNahuatlMujeres += parseInt(reporte['pregunta11seccion1']['nahuatlMujeres'])
                    totalOtomi += parseInt(reporte['pregunta11seccion1']['otomiTotal'])
                    totalOtomiHombres += parseInt(reporte['pregunta11seccion1']['otomiHombres'])
                    totalOtomiMujeres += parseInt(reporte['pregunta11seccion1']['otomiMujeres'])
                    totalTarasco += parseInt(reporte['pregunta11seccion1']['tarascoTotal'])
                    totalTarascoHombres += parseInt(reporte['pregunta11seccion1']['tarascoHombres'])
                    totalTarascoMujeres += parseInt(reporte['pregunta11seccion1']['tarascoMujeres'])
                    totalTarahumara += parseInt(reporte['pregunta11seccion1']['tarahumaraTotal'])
                    totalTarahumaraHombres += parseInt(reporte['pregunta11seccion1']['tarahumaraHombres'])
                    totalTarahumaraMujeres += parseInt(reporte['pregunta11seccion1']['tarahumaraMujeres'])
                    totalTepehuano += parseInt(reporte['pregunta11seccion1']['tepehuanoTotal'])
                    totalTepehuanoHombres += parseInt(reporte['pregunta11seccion1']['tepehuanoHombres'])
                    totalTepehuanoMujeres += parseInt(reporte['pregunta11seccion1']['tepehuanoMujeres'])
                    totalTlapenaco += parseInt(reporte['pregunta11seccion1']['tlapanecoTotal'])
                    totalTlapenacoHombres += parseInt(reporte['pregunta11seccion1']['tlapanecoHombres'])
                    totalTlapenacoMujeres += parseInt(reporte['pregunta11seccion1']['tlapanecoMujeres'])
                    totalTotonaco += parseInt(reporte['pregunta11seccion1']['totonacoTotal'])
                    totalTotonacoHombres += parseInt(reporte['pregunta11seccion1']['totonacoHombres'])
                    totalTotonacoMujeres += parseInt(reporte['pregunta11seccion1']['totnacoMujeres'])
                    totalTseltal += parseInt(reporte['pregunta11seccion1']['tseltalTotal'])
                    totalTseltalHombres += parseInt(reporte['pregunta11seccion1']['tseltalHombres'])
                    totalTsetalMujeres += parseInt(reporte['pregunta11seccion1']['tseltalMujeres'])
                    totalTsotsil += parseInt(reporte['pregunta11seccion1']['tsotsitTotal'])
                    totalTsotsilHombres += parseInt(reporte['pregunta11seccion1']['tsotsitHombres'])
                    totalTsotsilMujeres += parseInt(reporte['pregunta11seccion1']['tsotsitMujeres'])
                    totalYaqui += parseInt(reporte['pregunta11seccion1']['yaquiTotal'])
                    totalYaquiHombres += parseInt(reporte['pregunta11seccion1']['yaquiHombres'])
                    totalYaquiMujeres += parseInt(reporte['pregunta11seccion1']['yaquiMujeres'])
                    totalZapoteco += parseInt(reporte['pregunta11seccion1']['zapotecoTotal'])
                    totalZapotecoHombres += parseInt(reporte['pregunta11seccion1']['zapotecoHombres'])
                    totalZapotecoMujeres += parseInt(reporte['pregunta11seccion1']['zapotecoMujeres'])
                    totalOtraLengua += parseInt(reporte['pregunta11seccion1']['otroTotal'])
                    totalOtraLenguaHombres += parseInt(reporte['pregunta11seccion1']['otroHombres'])
                    totalOtraLenguaMujeres += parseInt(reporte['pregunta11seccion1']['otroMujeres'])
                    totalNoIdentificadaLengua += parseInt(reporte['pregunta11seccion1']['noidentificadoTotal'])
                    totalNoIdentificadaLenguaHombres += parseInt(reporte['pregunta11seccion1']['noIdentificadoHombres'])
                    totalNoIdentificadaLenguaMujeres += parseInt(reporte['pregunta11seccion1']['noIdentificadoMujeres'])

                    // PREGUNTA 12 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion1']['totalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion1']['totalMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion1']['conDiscapacidadHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion1']['conDiscapacidadMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion1']['sinDiscapacidadHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion1']['sinDiscapacidadMujeres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion1']['noIdentificadoHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion1']['noIdentificadoMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP12S1').append(tr)

                    totalDiscapacidadPersonal += parseInt(reporte['pregunta12seccion1']['totalPersonal'])
                    totalDiscapacidadHombres += parseInt(reporte['pregunta12seccion1']['totalHombres'])
                    totalDiscapacidadMujeres += parseInt(reporte['pregunta12seccion1']['totalMujeres'])
                    totalConDiscapacidadHombres += parseInt(reporte['pregunta12seccion1']['conDiscapacidadHombres'])
                    totalConDiscapacidadMujeres += parseInt(reporte['pregunta12seccion1']['conDiscapacidadMujeres'])
                    totalSinDiscapacidadaHombres += parseInt(reporte['pregunta12seccion1']['sinDiscapacidadHombres'])
                    totalSinDiscapacidadaMujeres += parseInt(reporte['pregunta12seccion1']['sinDiscapacidadMujeres'])
                    totalNoIdentificadoDiscapacidadaHombres += parseInt(reporte['pregunta12seccion1']['noIdentificadoHombres'])
                    totalNoIdentificadoDiscapacidadaMujeres += parseInt(reporte['pregunta12seccion1']['noIdentificadoMujeres'])

                    // PREGUNTA 13 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD('', '1', '37%'))
                    td = document.createElement('td')
                    td.className = 'text-center align-middle px-5'
                    td.appendChild(document.createTextNode('Total: ' + reporte['pregunta13seccion1']['totalPersonal']))
                    tr.append(td)
                    td = document.createElement('td')
                    td.className = 'text-center align-middle px-5'
                    td.appendChild(document.createTextNode('Hombres: ' + reporte['pregunta13seccion1']['totalHombres']))
                    tr.append(td)
                    td = document.createElement('td')
                    td.className = 'text-center align-middle px-5'
                    td.appendChild(document.createTextNode('Mujeres: ' + reporte['pregunta13seccion1']['totalMujeres']))
                    tr.append(td)
                    document.getElementById('identifierQuestionSumaTotalDiscapacidadP13S1').innerHTML = ''
                    document.getElementById('identifierQuestionSumaTotalDiscapacidadP13S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadCaminarHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadCaminarMujeres'])), '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadCaminarHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadCaminarMujeres'], '1', 'auto'))
                    tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadVerHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadaVerMujeres'])), '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadVerHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadaVerMujeres'], '1', 'auto'))
                    tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadMoverHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadMoverMuejeres'])), '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadMoverHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadMoverMuejeres'], '1', 'auto'))
                    tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadAprenderHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadAprenderMujeres'])), '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadAprenderHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadAprenderMujeres'], '1', 'auto'))
                    tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadOirHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadOirMujeres'])), '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadOirHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadOirMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionDiscapacidad15P13S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadHablarHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadHablarMujeres'])), '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadHablarHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadHablarMujeres'], '1', 'auto'))
                    tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadBaniarseHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadBaniarseMujeres'])), '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadBaniarseHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadBaniarseMujeres'], '1', 'auto'))
                    tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadDepresionHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadDepresionMujeres'])), '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadDepresionHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadDepresionMujeres'], '1', 'auto'))
                    tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['otraDiscapacidadHombres']) + parseInt(reporte['pregunta13seccion1']['otraDiscapacidadMujeres'])), '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['otraDiscapacidadHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['otraDiscapacidadMujeres'], '1', 'auto'))
                    tr.append(crearTD((parseInt(reporte['pregunta13seccion1']['discapacidadNoIdentificadaHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadNoIdentificadaMujeres'])), '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadNoIdentificadaHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion1']['discapacidadNoIdentificadaMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionDiscapacidad610P13S1').append(tr)

                    totalCaminar += parseInt(parseInt(reporte['pregunta13seccion1']['discapacidadCaminarHombres'] + parseInt(reporte['pregunta13seccion1']['discapacidadCaminarMujeres'])))
                    totalCaminarHombres += parseInt(reporte['pregunta13seccion1']['discapacidadCaminarHombres'])
                    totalCaminarMujeres += parseInt(reporte['pregunta13seccion1']['discapacidadCaminarMujeres'])
                    totalVer += parseInt(parseInt(reporte['pregunta13seccion1']['discapacidadVerHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadaVerMujeres']))
                    totalVerHombres += parseInt(reporte['pregunta13seccion1']['discapacidadVerHombres'])
                    totalVerMujeres += parseInt(reporte['pregunta13seccion1']['discapacidadaVerMujeres'])
                    totalMover += parseInt(parseInt(reporte['pregunta13seccion1']['discapacidadMoverHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadMoverMuejeres']))
                    totalMoverHombres += parseInt(reporte['pregunta13seccion1']['discapacidadMoverHombres'])
                    totalMoverMujeres += parseInt(reporte['pregunta13seccion1']['discapacidadMoverMuejeres'])
                    totalAprender += parseInt(parseInt(reporte['pregunta13seccion1']['discapacidadAprenderHombres'])+parseInt(reporte['pregunta13seccion1']['discapacidadAprenderMujeres']))
                    totalAprenderHombres += parseInt(reporte['pregunta13seccion1']['discapacidadAprenderHombres'])
                    totalAprenderMujeres += parseInt(reporte['pregunta13seccion1']['discapacidadAprenderMujeres'])
                    totalOir += parseInt(parseInt(reporte['pregunta13seccion1']['discapacidadOirHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadOirMujeres']))
                    totalOirHombres += parseInt(reporte['pregunta13seccion1']['discapacidadOirHombres'])
                    totalOirMujeres += parseInt(reporte['pregunta13seccion1']['discapacidadOirMujeres'])
                    totalHablar += parseInt(parseInt(reporte['pregunta13seccion1']['discapacidadHablarHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadHablarMujeres']))
                    totalHablarHombres += parseInt(reporte['pregunta13seccion1']['discapacidadHablarHombres'])
                    totalHablarMujeres += parseInt(reporte['pregunta13seccion1']['discapacidadHablarMujeres'])
                    totalBaniarse += parseInt(parseInt(reporte['pregunta13seccion1']['discapacidadBaniarseHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadBaniarseMujeres']))
                    totalBaniarseHombres += parseInt(reporte['pregunta13seccion1']['discapacidadBaniarseHombres'])
                    totalBaniarseMujeres += parseInt(reporte['pregunta13seccion1']['discapacidadBaniarseMujeres'])
                    totalMoral += parseInt(parseInt(reporte['pregunta13seccion1']['discapacidadDepresionHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadDepresionMujeres']))
                    totalMoralHombres += parseInt(reporte['pregunta13seccion1']['discapacidadDepresionHombres'])
                    totalMoralMujeres += parseInt(reporte['pregunta13seccion1']['discapacidadDepresionMujeres'])
                    totalDiscapacidadDiferente += parseInt(parseInt(reporte['pregunta13seccion1']['otraDiscapacidadHombres']) + parseInt(reporte['pregunta13seccion1']['otraDiscapacidadMujeres']))
                    totalDiscapacidadDiferenteHombres += parseInt(reporte['pregunta13seccion1']['otraDiscapacidadHombres'])
                    totalDiscapacidadDiferenteMujeres += parseInt(reporte['pregunta13seccion1']['otraDiscapacidadHombres'])
                    totalDiscapacidadNoIdentificado += parseInt(parseInt(reporte['pregunta13seccion1']['discapacidadNoIdentificadaHombres']) + parseInt(reporte['pregunta13seccion1']['discapacidadNoIdentificadaMujeres']))
                    totalDiscapacidadNoIdentificadoHombres += parseInt(reporte['pregunta13seccion1']['discapacidadNoIdentificadaHombres'])
                    totalDiscapacidadNoIdentificadoMujeres += parseInt(reporte['pregunta13seccion1']['discapacidadNoIdentificadaMujeres'])

                    
                    // PREGUNTA 14 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta14seccion1']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta14seccion1']['TotalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta14seccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta14seccion1']['totalMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP14S1').append(tr)

                    fondos1General += parseInt(reporte['pregunta14seccion1']['TotalPersonal'])
                    fondos1Hombres += parseInt(reporte['pregunta14seccion1']['totalHombres'])
                    fondos1Mujeres += parseInt(reporte['pregunta14seccion1']['totalMujeres'])

                    // PREGUNTA 15 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta15seccion1']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta15seccion1']['TotalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta15seccion1']['Hombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta15seccion1']['Mujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP15S1').append(tr)

                    fondos2General += parseInt(reporte['pregunta15seccion1']['TotalPersonal'])
                    fondos2Hombres += parseInt(reporte['pregunta15seccion1']['Hombres'])
                    fondos2Mujeres += parseInt(reporte['pregunta15seccion1']['Mujeres'])

                    // PREGUNTA 16 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta16seccion1']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta16seccion1']['disposicionNormativa'], '1', 'auto'))
                    document.getElementById('identifierQuestionP16S1').append(tr)

                    // PREGUNTA 17 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['servicioCivil'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['Reclutamiento'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['diseñoSeleccion'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['diseñoCurricular'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['actualizacionPerfil'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['diseñoValidacion'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['concursosPublicos'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['Mecanismos'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['programasCapacitacion'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['evaluacionImpacto'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['programasEstimulos'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['separacionServicio'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta17seccion1']['Otro'], '1', 'auto'))
                    document.getElementById('identifierQuestionP17S1').append(tr)

                    // PREGUNTA 18 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta18seccion1']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta18seccion1']['nombreUnidad'], '1', 'auto'))
                    document.getElementById('identifierQuestionP18S1').append(tr)

                    // PREGUNTA 19 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta19seccion1']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta19seccion1']['accionesFormativas'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta19seccion1']['accionesFormativasConcluidas'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta19seccion1']['TotalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta19seccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta19seccion1']['totalMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionP19S1').append(tr)

                    accionesImpartidas += parseInt(reporte['pregunta19seccion1']['accionesFormativas'])
                    accionesConcluidas += parseInt(reporte['pregunta19seccion1']['accionesFormativasConcluidas'])
                    accionesTotalPersonal += parseInt(reporte['pregunta19seccion1']['TotalPersonal'])
                    accionesTotalHombres += parseInt(reporte['pregunta19seccion1']['totalHombres'])
                    accionesMujeres += parseInt(reporte['pregunta19seccion1']['totalMujeres'])

                    // PREGUNTA 24 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta24seccion1']['totalInmuebles'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta24seccion1']['inmueblesPropios'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta24seccion1']['inmueblesRentados'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta24seccion1']['inmueblesOtros'], '1', 'auto'))
                    document.getElementById('identifierQuestionP24S1').append(tr)

                    totalInmuebles += parseInt(reporte['pregunta24seccion1']['totalInmuebles'])
                    totalInmueblesPropios += parseInt(reporte['pregunta24seccion1']['inmueblesPropios'])
                    totalInmueblesRentados += parseInt(reporte['pregunta24seccion1']['inmueblesRentados'])
                    totalInmueblesOtros += parseInt(reporte['pregunta24seccion1']['inmueblesOtros'])

                    // PREGUNTA 25 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta25seccion1']['Respuesta'], '1', 'auto'))
                    document.getElementById('identifierQuestionP25S1').append(tr)

                    // PREGUNTA 26 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta26seccion1']['escuelas1'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta26seccion1']['funcionesEducativas1'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta26seccion1']['formaMixta1'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta26seccion1']['escuelas2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta26seccion1']['funcionesEducativas2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta26seccion1']['formaMixta2'], '1', 'auto'))
                    document.getElementById('txtTotalInmueblesP26').value = reporte['pregunta26seccion1']['totalInmueblesEducacion']
                    document.getElementById('txtTotalInmuebles1P26').value = reporte['pregunta26seccion1']['totalFuncionPrincipalEducacion']
                    document.getElementById('txtTotalInmuebles2P26').value = reporte['pregunta26seccion1']['totalOtroTIpoFuncion']
                    document.getElementById('identifierQuestionP26S1').append(tr)

                    // PREGUNTA 27 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta27seccion1']['Respuesta'], '1', 'auto'))
                    document.getElementById('identifierQuestionP27S1').append(tr)

                    // PREGUNTA 28 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta28seccion1']['totalClinicas'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta28seccion1']['totalCentroSalud'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta28seccion1']['totalHospitales'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta28seccion1']['totalFuncionesSalud'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta28seccion1']['totalMixta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta28seccion1']['totalOtraFuncionClinica'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta28seccion1']['totalOtraFuncionSalud'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta28seccion1']['totalOtraFuncionHospitales'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta28seccion1']['totalOtraFuncionesSalud'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta28seccion1']['totalOtraFuncionMixta'], '1', 'auto'))
                    document.getElementById('txtTotalInmueblesP28').innerHTML = reporte['pregunta28seccion1']['totalnmueblesSalud']
                    document.getElementById('txtTotalInmuebles1P28').innerHTML = reporte['pregunta28seccion1']['totalFuncionPrincipalSalud']
                    document.getElementById('txtTotalInmuebles2P28').innerHTML = reporte['pregunta28seccion1']['totalOtraFuncion']
                    document.getElementById('identifierQuestionP28S1').append(tr)

                    // PREGUNTA 29 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta29seccion1']['Respuesta'], '1', 'auto'))
                    document.getElementById('identifierQuestionP29S1').append(tr)

                    // PREGUNTA 30 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    document.getElementById('txtTotalInmueblesP30').innerHTML = reporte['pregunta30seccion1']['totalInmueblesDeporte']
                    document.getElementById('txtTotalInmuebles1P30').innerHTML = reporte['pregunta30seccion1']['totalFuncionPrincipal']
                    document.getElementById('txtTotal1x1P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalActivacionFisica']
                    document.getElementById('txtTotal1x2P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalRecreacionFisica']
                    document.getElementById('txtTotal1x3P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalDeporteSocial']
                    document.getElementById('txtTotal1x4P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalAltoRendimiento']
                    document.getElementById('txtTotal1x5P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalEventosDeportivos']
                    document.getElementById('txtTotal1x6P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalOtros']
                    document.getElementById('txtTotal1x7P30').innerHTML = reporte['pregunta30seccion1']['funcionPrincipalIndistinciones']
                    document.getElementById('txtTotalInmuebles2P30').innerHTML = reporte['pregunta30seccion1']['totalOtraFuncion']
                    document.getElementById('txtTotal2x1P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionActivacionFisica']
                    document.getElementById('txtTotal2x2P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionRecreacionFisica']
                    document.getElementById('txtTotal2x3P30').innerHTML = reporte['pregunta30seccion1']['otrafuncionDeporteSocial']
                    document.getElementById('txtTotal2x4P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionAltoRendimiento']
                    document.getElementById('txtTotal2x5P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionEventosDeportivos']
                    document.getElementById('txtTotal2x6P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionOtros']
                    document.getElementById('txtTotal2x7P30').innerHTML = reporte['pregunta30seccion1']['otraFuncionIndistionciones']

                    // PREGUNTA 31 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta31seccion1']['totalVehiculos'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta31seccion1']['Automoviles'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta31seccion1']['Camionetas'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta31seccion1']['motocicletas'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta31seccion1']['bicicletas'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta31seccion1']['helicopteros'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta31seccion1']['drones'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta31seccion1']['otros'], '1', 'auto'))
                    document.getElementById('identifierQuestionP31S1').append(tr)

                    //PREGUNTA 32 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta32seccion1']['totalLineas'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta32seccion1']['lineasFijas'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta32seccion1']['lineasMoviles'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta32seccion1']['totalAparatos'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta32seccion1']['aparatosFijos'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta32seccion1']['aparatosMoviles'], '1', 'auto'))
                    document.getElementById('identifierQuestionP32S1').append(tr)

                    //PREGUNTA 33 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta33seccion1']['totalComputadoras'], '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta33seccion1']['computadorasEscritorio'], '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta33seccion1']['computadorasPersonales'], '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta33seccion1']['totalImpresoras'], '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta33seccion1']['impresorasPersonal'], '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta33seccion1']['impresoraCompartida'], '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta33seccion1']['multifuncionales'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta33seccion1']['servidores'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta33seccion1']['tabletas'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta33seccion1']['conexionRemota'], '1', 'auto'))
                    document.getElementById('identifierQuestionP33S1').append(tr)

                    //PREGUNTA 34 SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta34seccion1']['Respuesta'], '1', 'auto'))
                    document.getElementById('identifierQuestionP34S1').append(tr)

                    // PREGUNTA 35 SECCION 1
                    document.getElementById('txtnombreInstitucion').innerHTML = nombreInstitucion
                    document.getElementById('txtTotal1P35').innerHTML = reporte['pregunta35seccion1']['totalComputadoras']
                    document.getElementById('txtTotal2P35').innerHTML = reporte['pregunta35seccion1']['totalImpresoras']
                    document.getElementById('txtTotal3P35').innerHTML = reporte['pregunta35seccion1']['totalMultifuncionales']
                    document.getElementById('txtTotal4P35').innerHTML = reporte['pregunta35seccion1']['totalServidores']
                    document.getElementById('txtTotal5P35').innerHTML = reporte['pregunta35seccion1']['totalTablets']
                    document.getElementById('txtTotal1x1P35').innerHTML = reporte['pregunta35seccion1']['funcionPrincipalComputadorasEducacion']
                    document.getElementById('txtTotal1x2P35').innerHTML = reporte['pregunta35seccion1']['otraFuncionComputadorasEducacion']
                    document.getElementById('txtTotal2x1P35').innerHTML = reporte['pregunta35seccion1']['funcionPrincipalImpresorasEducacion']
                    document.getElementById('txtTotal2x2P35').innerHTML = reporte['pregunta35seccion1']['otraFuncionImpresorasEducacion']
                    document.getElementById('txtTotal3x1P35').innerHTML = reporte['pregunta35seccion1']['funcionPrincipalMultifuncionalesEducacion']
                    document.getElementById('txtTotal3x2P35').innerHTML = reporte['pregunta35seccion1']['otraFuncionMultifuncionalesEducacion']
                    document.getElementById('txtTotal4x1P35').innerHTML = reporte['pregunta35seccion1']['funcionPrincipalServidoresEducacion']
                    document.getElementById('txtTotal4x2P35').innerHTML = reporte['pregunta35seccion1']['otraFuncionServidoresEducacion']
                    document.getElementById('txtTotal5x1P35').innerHTML = reporte['pregunta35seccion1']['funcionPrincipalTabletsEducacion']
                    document.getElementById('txtTotal5x2P35').innerHTML = reporte['pregunta35seccion1']['otraFuncionTabletsEducacion']

                    // PREGUNTA COMPLEMENTO SECCION 1
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['preguntacomplementoseccion1']['TotalPersonal'], '1', 'auto'))
                    tr.append(crearTD(reporte['preguntacomplementoseccion1']['totalHombres'], '1', 'auto'))
                    tr.append(crearTD(reporte['preguntacomplementoseccion1']['totalMujeres'], '1', 'auto'))
                    document.getElementById('identifierQuestionPComplementS1').append(tr)

                    // PREGUNTA 1 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion12']['RespuestaTipoMateria1'], '3', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion12']['nombreDependenciaTipoMateria1'], '3', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion12']['RespuestaTipoMateria2'], '3', 'auto'))
                    tr.append(crearTD(reporte['pregunta1seccion12']['nombreDependenciaTipoMateria2'], '3    ', 'auto'))
                    document.getElementById('identifierQuestionP1S12').append(tr)

                    // PREGUNTA 2 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['AdjudicacionDirecta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['Invitacion'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['licitacionPublicaNacional'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['licitacionPublicaInternacional'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['Otro'], '1', 'auto'))
                    document.getElementById('identifierQuestionMateria1P2S12').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['Respuesta2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['adjudicacionDirecta2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['Invitacion2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['licitacionPublicaNacional2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['licitacionPublicaInternacional2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta2seccion12']['Otro2'], '1', 'auto'))
                    document.getElementById('identifierQuestionMateria2P2S12').append(tr)

                    // PREGUNTA 3 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['noAplica1'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['contabaConMecanismos1'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Uno'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Dos'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Tres'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Cuatro'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Cinco'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Seis'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Siete'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Ocho'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Nueve'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Diez'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Once'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Doce'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Trece'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Catorce'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Quince'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['DiezSeis'], '1', 'auto'))
                    document.getElementById('identifierQuestionMateria1P3S12').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['noAplica2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['contabaConMecanismos2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Uno1'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Dos2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Tres3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Cuatro4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Cinco5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Seis6'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Siete7'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Ocho8'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Nueve9'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Diez10'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Once11'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Doce12'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Trece13'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Catorce14'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['Quince15'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta3seccion12']['DiezSeis16'], '1', 'auto'))
                    document.getElementById('identifierQuestionMateria2P3S12').append(tr)

                    // PREGUNTA 4 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta4seccion12']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta4seccion12']['Sitio'], '1', 'auto'))
                    document.getElementById('identifierQuestionP4S12').append(tr)

                    // PREGUNTA 5 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion12']['Convocatoria'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion12']['Junta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion12']['actoPresentacion'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion12']['declaracionLicitacion'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion12']['Cancelacion'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion12']['emisionFallo'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion12']['Contratacion'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion12']['otraEtapa'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta5seccion12']['noSeSabe'], '1', 'auto'))
                    document.getElementById('identifierQuestionP5S12').append(tr)

                    // PREGUNTA 6 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada2'], '1', 'auto'))
                    document.getElementById('identifierQuestionTipoSistema12P6S12').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada4'], '1', 'auto'))
                    document.getElementById('identifierQuestionTipoSistema34P6S12').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Respuesta6'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['tipoFormato6'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['Frecuencia6'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta6seccion12']['cantidadRegistrada6'], '1', 'auto'))
                    document.getElementById('identifierQuestionTipoSistema56P6S12').append(tr)

                    // PREGUNTA 7 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion12']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion12']['contratosRealizados'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion12']['Respuesta2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion12']['contratosRealizados2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion12']['Respuesta3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion12']['contratosRealizados3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion12']['Respuesta4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion12']['contratosRealizados4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion12']['Respuesta5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta7seccion12']['contratosRealizados5'], '1', 'auto'))
                    document.getElementById('identifierQuestionP7S12').append(tr)
                    document.getElementById('identifierQuestionSumaTotalContratosP7S12').innerHTML = reporte['pregunta7seccion12']['totalContratos']
                    document.getElementById('identifierQuestionSumaContratosP7S12').classList.add('d-none')

                    // PREGUNTA 8 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Total'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Adquisiciones'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['otraPublica'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Respuesta2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Total2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Adquisiciones2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['otraPublica2'], '1', 'auto'))
                    document.getElementById('identifierQuestionTipoProcedimiento12P8S12').append(tr)
                    document.getElementById('identifierQuestionSumaContratos12P8S12').classList.add('d-none')
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Respuesta3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Total3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Adquisiciones3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['otraPublica3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Respuesta4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Total4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Adquisiciones4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['otraPublica4'], '1', 'auto'))
                    document.getElementById('identifierQuestionTipoProcedimiento34P8S12').append(tr)
                    document.getElementById('identifierQuestionSumaContratos34P8S12').classList.add('d-none')
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Respuesta5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Total5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['Adquisiciones5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta8seccion12']['otraPublica5'], '1', 'auto'))
                    document.getElementById('identifierQuestionTipoProcedimiento5P8S12').append(tr)
                    document.getElementById('totalContratosP8S12').innerHTML = reporte['pregunta8seccion12']['totalGeneral']
                    document.getElementById('totalContratos1P8S12').innerHTML = reporte['pregunta8seccion12']['totalGeneralAdquisiciones']
                    document.getElementById('totalContratos2P8S12').innerHTML = reporte['pregunta8seccion12']['totalGeneralObras']
                    document.getElementById('identifierQuestionSumaContratos5P8S12').classList.add('d-none')

                    // PREGUNTA 9 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion12']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion12']['monAsociado'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion12']['Respuesta2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion12']['monAsociado2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion12']['Respuesta3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion12']['monAsociado3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion12']['Respuesta4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion12']['monAsociado4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion12']['Respuesta5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta9seccion12']['monAsociado5'], '1', 'auto'))
                    document.getElementById('identifierQuestionP9S12').append(tr)
                    document.getElementById('totalMontoP9S12').innerHTML = reporte['pregunta9seccion12']['totalMonto']
                    document.getElementById('identifierQuestionMontoAsociadoP9S12').classList.add('d-none')

                    // PREGUNTA 10 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['TotalMonto'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoAdquisiciones'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoObra1'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['Respuesta2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['TotalMonto2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoAdquisiciones2'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoObra12'], '1', 'auto'))
                    document.getElementById('identifierQuestionTipoProcedimiento12P10S12').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['Respuesta3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['TotalMonto3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoAdquisiciones3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoObra3'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['Respuesta4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['TotalMonto4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoAdquisiciones4'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoObra14'], '1', 'auto'))
                    document.getElementById('identifierQuestionTipoProcedimiento34P10S12').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['Respuesta5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['TotalMonto5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoAdquisiciones5'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta10seccion12']['totalMontoObra15'], '1', 'auto'))
                    document.getElementById('identifierQuestionTipoProcedimiento5P10S12').append(tr)
                    document.getElementById('totalMontoP10S12').innerHTML = reporte['pregunta10seccion12']['totalGeneralMaximo']
                    document.getElementById('totalMonto1P10S12').innerHTML = reporte['pregunta10seccion12']['totalMontoAdquisicionesGeneral']
                    document.getElementById('totalMonto2P10S12').innerHTML = reporte['pregunta10seccion12']['totalMontoObrasGeneral']

                    // PREGUNTA 11 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion12']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion12']['totalContratos'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta11seccion12']['Monto'], '1', 'auto'))
                    document.getElementById('identifierQuestionP11S12').append(tr)

                    // PREGUNTA 12 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion12']['Respuesta'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion12']['totalContratos'], '1', 'auto'))
                    tr.append(crearTD(reporte['pregunta12seccion12']['Monto'], '1', 'auto'))
                    document.getElementById('identifierQuestionP12S12').append(tr)

                    // PREGUNTA 13 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta13seccion12']['Total'], '1', 'auto'))
                    document.getElementById('identifierQuestionP13S12').append(tr)

                    // PREGUNTA 14 SECCION 12
                    tr = document.createElement('tr')
                    tr.append(crearTD(idDependencia, '1', '5%'))
                    tr.append(crearTD(nombreInstitucion, '2', 'auto'))
                    tr.append(crearTD(reporte['pregunta14seccion12']['Total'], '1', 'auto'))
                    document.getElementById('identifierQuestionP14S12').append(tr)

                    // IMPRMIR REPORTE
                    
                    if (idDependencia == numerosConcentrados[idInstitucion].length) {
                        setTimeout(function() { 

                            //TOTALES PREGUNTA 4
                            tr = document.createElement('tr')
                            tr.append(crearTD('Total', '3', 'auto'))
                            tr.append(crearTD(totalGeneralPersonal, '1', 'auto'))
                            tr.append(crearTD(totalHombresGenerales, '1', 'auto'))
                            tr.append(crearTD(totalMujeresGeneral, '1', 'auto'))
                            document.getElementById('identifierQuestionP4S1').append(tr)

                            //TOTALES PREGUNTA 5
                            tr = document.createElement('tr')
                            tr.append(crearTD('Total', '3', 'auto'))
                            tr.append(crearTD(totalPersonalContratacion, '1', 'auto'))
                            tr.append(crearTD(totalHombresContratacion, '1', 'auto'))
                            tr.append(crearTD(totalMujeresContratacion, '1', 'auto'))
                            tr.append(crearTD(totalConfianzaHombres, '1', 'auto'))
                            tr.append(crearTD(totalConfianzaMujeres, '1', 'auto'))
                            tr.append(crearTD(totalBaseHombres, '1', 'auto'))
                            tr.append(crearTD(totalBaseMujeres, '1', 'auto'))
                            tr.append(crearTD(totalEventualHombres, '1', 'auto'))
                            tr.append(crearTD(totalEventualMujeres, '1', 'auto'))
                            tr.append(crearTD(totalHonorariosHombres, '1', 'auto'))
                            tr.append(crearTD(totalHonorariosMujeres, '1', 'auto'))
                            tr.append(crearTD(totalOtrosHombres, '1', 'auto'))
                            tr.append(crearTD(totalOtrosMujeres, '1', 'auto'))
                            document.getElementById('identifierQuestionP5S1').append(tr)

                            //TOTALES PREGUNTA 6
                            tr = document.createElement('tr')
                            tr.append(crearTD('Total', '3', 'auto'))
                            tr.append(crearTD(totalSeguridadPersonal, '1', 'auto'))
                            tr.append(crearTD(totalSeguridadHombres, '1', 'auto'))
                            tr.append(crearTD(totalSeguridadMujeres, '1', 'auto'))
                            tr.append(crearTD(totalISSSTEHombres, '1', 'auto'))
                            tr.append(crearTD(totalISSSTEMujeres, '1', 'auto'))
                            tr.append(crearTD(totalISSEFHombres, '1', 'auto'))
                            tr.append(crearTD(totalISSEFMujeres, '1', 'auto'))
                            tr.append(crearTD(totalIMSSHombres, '1', 'auto'))
                            tr.append(crearTD(totalIMSSMujeres, '1', 'auto'))
                            tr.append(crearTD(totalOtrosSeguridadHombres, '1', 'auto'))
                            tr.append(crearTD(totalOtrosSeguridadMujeres, '1', 'auto'))
                            tr.append(crearTD(totalSinSeguridadHombres, '1', 'auto'))
                            tr.append(crearTD(totalSinSeguridadMujeres, '1', 'auto'))
                            document.getElementById('identifierQuestionP6S1').append(tr)

                            //TOTALES PREGUNTA 7
                            tr = document.createElement('tr')
                            tr.append(crearTD('Total', '3', 'auto'))
                            tr.append(crearTD(totalEdadesPersonal, '1', 'auto'))
                            tr.append(crearTD(totalEdadesHombres, '1', 'auto'))
                            tr.append(crearTD(totalEdadesMujeres, '1', 'auto'))
                            tr.append(crearTD(total1824Hombres, '1', 'auto'))
                            tr.append(crearTD(total1824Mujeres, '1', 'auto'))
                            tr.append(crearTD(total2529Hombres, '1', 'auto'))
                            tr.append(crearTD(total2529Mujeres, '1', 'auto'))
                            tr.append(crearTD(total3034Hombres, '1', 'auto'))
                            tr.append(crearTD(total3034Mujeres, '1', 'auto'))
                            tr.append(crearTD(total3539Hombres, '1', 'auto'))
                            tr.append(crearTD(total3539Mujeres, '1', 'auto'))
                            tr.append(crearTD(total4044Hombres, '1', 'auto'))
                            tr.append(crearTD(total4044Mujeres, '1', 'auto'))
                            tr.append(crearTD(total4549Hombres, '1', 'auto'))
                            tr.append(crearTD(total4549Mujeres, '1', 'auto'))
                            tr.append(crearTD(total5054Hombres, '1', 'auto'))
                            tr.append(crearTD(total5054Mujeres, '1', 'auto'))
                            tr.append(crearTD(total5559Hombres, '1', 'auto'))
                            tr.append(crearTD(total5559Mujeres, '1', 'auto'))
                            tr.append(crearTD(total60Hombres, '1', 'auto'))
                            tr.append(crearTD(total60Mujeres, '1', 'auto'))
                            document.getElementById('identifierQuestionP7S1').append(tr)
                            
                            //TOTALES PREGUNTA 8
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalPagaPersonal, '1', 'auto'))
                    tr.append(crearTD(totalPagaHombre, '1', 'auto'))
                    tr.append(crearTD(totalPagaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalSinPagaHombres, '1', 'auto'))
                    tr.append(crearTD(totalSinPagaMujeres, '1', 'auto'))
                    tr.append(crearTD(total1a1500Hombres, '1', 'auto'))
                    tr.append(crearTD(total1a1500Mujeres, '1', 'auto'))
                    tr.append(crearTD(total50001a55000Hombres, '1', 'auto'))
                    tr.append(crearTD(total50001a55000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total10001a15000Hombres, '1', 'auto'))
                    tr.append(crearTD(total10001a15000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total15001a20000Hombres, '1', 'auto'))
                    tr.append(crearTD(total15001a20000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total20001a25000Hombres, '1', 'auto'))
                    tr.append(crearTD(total20001a25000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total25001a30000Hombres, '1', 'auto'))
                    tr.append(crearTD(total25001a30000Mujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionP8S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(total30001a35000Hombres, '1', 'auto'))
                    tr.append(crearTD(total30001a35000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total35001a40000Hombres, '1', 'auto'))
                    tr.append(crearTD(total35001a40000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total40001a45000Hombres, '1', 'auto'))
                    tr.append(crearTD(total40001a45000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total45001a50000Hombres, '1', 'auto'))
                    tr.append(crearTD(total45001a50000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total50001a55000Hombres, '1', 'auto'))
                    tr.append(crearTD(total50001a55000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total55001a60000Hombres, '1', 'auto'))
                    tr.append(crearTD(total55001a60000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total60001a65000Hombres, '1', 'auto'))
                    tr.append(crearTD(total60001a65000Mujeres, '1', 'auto'))
                    tr.append(crearTD(total65001a70000Hombres, '1', 'auto'))
                    tr.append(crearTD(total65001a70000Mujeres, '1', 'auto'))
                    tr.append(crearTD(totalMas70000Hombres, '1', 'auto'))
                    tr.append(crearTD(totalMas70000Mujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionP81S1').append(tr)
                    
                    //TOTALES PREGUNTA 10
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalEscolaridadPersonal, '1', 'auto'))
                    tr.append(crearTD(totalEscolaridadHombres, '1', 'auto'))
                    tr.append(crearTD(totalEscolaridadMujeres, '1', 'auto'))
                    tr.append(crearTD(totalNingunoHombres, '1', 'auto'))
                    tr.append(crearTD(totalNingunoMujeres, '1', 'auto'))
                    tr.append(crearTD(totalParaescolarHombres, '1', 'auto'))
                    tr.append(crearTD(totalParaescolarMujeres, '1', 'auto'))
                    tr.append(crearTD(totalSecundariaHombres, '1', 'auto'))
                    tr.append(crearTD(totalSecundariaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalPreparatoriaHombres, '1', 'auto'))
                    tr.append(crearTD(totalPreparatoriaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalCarreraHombres, '1', 'auto'))
                    tr.append(crearTD(totalCarreraMujeres, '1', 'auto'))
                    tr.append(crearTD(totalLicenciaturaHombres, '1', 'auto'))
                    tr.append(crearTD(totallicenciaturaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalMaestriaHombres, '1', 'auto'))
                    tr.append(crearTD(totalMaestriaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalDoctoradoHombres, '1', 'auto'))
                    tr.append(crearTD(totalDoctoradoMujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionP9S1').append(tr)
                    
                    //TOTALES PREGUNTA 11
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalIndigenaPersonal, '1', 'auto'))
                    tr.append(crearTD(totalIndigenaHombres, '1', 'auto'))
                    tr.append(crearTD(totalIndigenaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalPertenecenIndigenaHombres, '1', 'auto'))
                    tr.append(crearTD(totalPertenecenIndigenaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalNoPertenecenIndigenaHombres, '1', 'auto'))
                    tr.append(crearTD(totalNoPertenecenIndigenaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalIndigenaNoIdentificadoHombres, '1', 'auto'))
                    tr.append(crearTD(totalIndigenaNoIdentificadoMujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionP10S1').append(tr)

                    //TOTALES PREGUNTA 11
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalChinanteco, '1', 'auto'))
                    tr.append(crearTD(totalChinantecoHombres, '1', 'auto'))
                    tr.append(crearTD(totalChinantecoMujeres, '1', 'auto'))
                    tr.append(crearTD(totalChol, '1', 'auto'))
                    tr.append(crearTD(totalCholHombres, '1', 'auto'))
                    tr.append(crearTD(totalCholMujeres, '1', 'auto'))
                    tr.append(crearTD(totalCora, '1', 'auto'))
                    tr.append(crearTD(totalCoraHombres, '1', 'auto'))
                    tr.append(crearTD(totalCoraMujeres, '1', 'auto'))
                    tr.append(crearTD(totalHuasteco, '1', 'auto'))
                    tr.append(crearTD(totalHuastecoHombres, '1', 'auto'))
                    tr.append(crearTD(totalHuastecoMujeres, '1', 'auto'))
                    tr.append(crearTD(totalHuichol, '1', 'auto'))
                    tr.append(crearTD(totalHuicholHombres, '1', 'auto'))
                    tr.append(crearTD(totalHuicholMujeres, '1', 'auto'))
                    tr.append(crearTD(totalMaya, '1', 'auto'))
                    tr.append(crearTD(totalMayaHombres, '1', 'auto'))
                    tr.append(crearTD(totalMayaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalMayo, '1', 'auto'))
                    tr.append(crearTD(totalMayoHombres, '1', 'auto'))
                    tr.append(crearTD(totalMayoMujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionIndigena17P11S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalMazahua, '1', 'auto'))
                    tr.append(crearTD(totalMazahuaHombres, '1', 'auto'))
                    tr.append(crearTD(totalMazahuaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalMazateco, '1', 'auto'))
                    tr.append(crearTD(totalMazatecoHombres, '1', 'auto'))
                    tr.append(crearTD(totalMazatecoMujeres, '1', 'auto'))
                    tr.append(crearTD(totalMixe, '1', 'auto'))
                    tr.append(crearTD(totalMixeHombres, '1', 'auto'))
                    tr.append(crearTD(totalMixeMujeres, '1', 'auto'))
                    tr.append(crearTD(totalMixteco, '1', 'auto'))
                    tr.append(crearTD(totalMixtecoHombres, '1', 'auto'))
                    tr.append(crearTD(totalMixtecoMujeres, '1', 'auto'))
                    tr.append(crearTD(totalNahuatl, '1', 'auto'))
                    tr.append(crearTD(totalNahuatlHombres, '1', 'auto'))
                    tr.append(crearTD(totalNahuatlMujeres, '1', 'auto'))
                    tr.append(crearTD(totalOtomi, '1', 'auto'))
                    tr.append(crearTD(totalOtomiHombres, '1', 'auto'))
                    tr.append(crearTD(totalOtomiMujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionIndigena813P11S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalTarasco, '1', 'auto'))
                    tr.append(crearTD(totalTarascoHombres, '1', 'auto'))
                    tr.append(crearTD(totalTarascoMujeres, '1', 'auto'))
                    tr.append(crearTD(totalTarahumara, '1', 'auto'))
                    tr.append(crearTD(totalTarahumaraHombres, '1', 'auto'))
                    tr.append(crearTD(totalTarahumaraMujeres, '1', 'auto'))
                    tr.append(crearTD(totalTepehuano, '1', 'auto'))
                    tr.append(crearTD(totalTepehuanoHombres, '1', 'auto'))
                    tr.append(crearTD(totalTepehuanoMujeres, '1', 'auto'))
                    tr.append(crearTD(totalTlapenaco, '1', 'auto'))
                    tr.append(crearTD(totalTlapenacoHombres, '1', 'auto'))
                    tr.append(crearTD(totalTlapenacoMujeres, '1', 'auto'))
                    tr.append(crearTD(totalTotonaco, '1', 'auto'))
                    tr.append(crearTD(totalTotonacoHombres, '1', 'auto'))
                    tr.append(crearTD(totalTotonacoMujeres, '1', 'auto'))
                    tr.append(crearTD(totalTseltal, '1', 'auto'))
                    tr.append(crearTD(totalTseltalHombres, '1', 'auto'))
                    tr.append(crearTD(totalTsetalMujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionIndigena1419P11S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalTsotsil, '1', 'auto'))
                    tr.append(crearTD(totalTsotsilHombres, '1', 'auto'))
                    tr.append(crearTD(totalTsotsilMujeres, '1', 'auto'))
                    tr.append(crearTD(totalYaqui, '1', 'auto'))
                    tr.append(crearTD(totalYaquiHombres, '1', 'auto'))
                    tr.append(crearTD(totalYaquiMujeres, '1', 'auto'))
                    tr.append(crearTD(totalZapoteco, '1', 'auto'))
                    tr.append(crearTD(totalZapotecoHombres, '1', 'auto'))
                    tr.append(crearTD(totalZapotecoMujeres, '1', 'auto'))
                    tr.append(crearTD(totalZoque, '1', 'auto'))
                    tr.append(crearTD(totalZoqueHombres, '1', 'auto'))
                    tr.append(crearTD(totalZoqueMujeres, '1', 'auto'))
                    tr.append(crearTD(totalOtraLengua, '1', 'auto'))
                    tr.append(crearTD(totalOtraLenguaHombres, '1', 'auto'))
                    tr.append(crearTD(totalOtraLenguaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalNoIdentificadaLengua, '1', 'auto'))
                    tr.append(crearTD(totalNoIdentificadaLenguaHombres, '1', 'auto'))
                    tr.append(crearTD(totalNoIdentificadaLenguaMujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionIndigena2025P11S1').append(tr)

                    //TOTALES PREGUNTA 12
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalDiscapacidadPersonal, '1', 'auto'))
                    tr.append(crearTD(totalDiscapacidadHombres, '1', 'auto'))
                    tr.append(crearTD(totalDiscapacidadMujeres, '1', 'auto'))
                    tr.append(crearTD(totalConDiscapacidadHombres, '1', 'auto'))
                    tr.append(crearTD(totalConDiscapacidadMujeres, '1', 'auto'))
                    tr.append(crearTD(totalSinDiscapacidadaHombres, '1', 'auto'))
                    tr.append(crearTD(totalSinDiscapacidadaMujeres, '1', 'auto'))
                    tr.append(crearTD(totalNoIdentificadoDiscapacidadaHombres, '1', 'auto'))
                    tr.append(crearTD(totalNoIdentificadoDiscapacidadaMujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionP12S1').append(tr)

                    //TOTALES PREGUNTA 13
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalCaminar, '1', 'auto'))
                    tr.append(crearTD(totalCaminarHombres, '1', 'auto'))
                    tr.append(crearTD(totalCaminarMujeres, '1', 'auto'))
                    tr.append(crearTD(totalVer, '1', 'auto'))
                    tr.append(crearTD(totalVerHombres, '1', 'auto'))
                    tr.append(crearTD(totalVerMujeres, '1', 'auto'))
                    tr.append(crearTD(totalMover, '1', 'auto'))
                    tr.append(crearTD(totalMoverHombres, '1', 'auto'))
                    tr.append(crearTD(totalMoverMujeres, '1', 'auto'))
                    tr.append(crearTD(totalAprender, '1', 'auto'))
                    tr.append(crearTD(totalAprenderHombres, '1', 'auto'))
                    tr.append(crearTD(totalAprenderMujeres, '1', 'auto'))
                    tr.append(crearTD(totalOir, '1', 'auto'))
                    tr.append(crearTD(totalOirHombres, '1', 'auto'))
                    tr.append(crearTD(totalOirMujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionDiscapacidad15P13S1').append(tr)
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalHablar, '1', 'auto'))
                    tr.append(crearTD(totalHablarHombres, '1', 'auto'))
                    tr.append(crearTD(totalHablarMujeres, '1', 'auto'))
                    tr.append(crearTD(totalBaniarse, '1', 'auto'))
                    tr.append(crearTD(totalBaniarseHombres, '1', 'auto'))
                    tr.append(crearTD(totalBaniarseMujeres, '1', 'auto'))
                    tr.append(crearTD(totalMoral, '1', 'auto'))
                    tr.append(crearTD(totalMoralHombres, '1', 'auto'))
                    tr.append(crearTD(totalMoralMujeres, '1', 'auto'))
                    tr.append(crearTD(totalDiscapacidadDiferente, '1', 'auto'))
                    tr.append(crearTD(totalDiscapacidadDiferenteHombres, '1', 'auto'))
                    tr.append(crearTD(totalDiscapacidadDiferenteMujeres, '1', 'auto'))
                    tr.append(crearTD(totalDiscapacidadNoIdentificado, '1', 'auto'))
                    tr.append(crearTD(totalDiscapacidadNoIdentificadoHombres, '1', 'auto'))
                    tr.append(crearTD(totalDiscapacidadNoIdentificadoMujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionDiscapacidad610P13S1').append(tr)

                    // TOTALES PREUNTA 14
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '4', 'auto'))
                    tr.append(crearTD(fondos1General, '1', 'auto'))
                    tr.append(crearTD(fondos1Hombres, '1', 'auto'))
                    tr.append(crearTD(fondos1Mujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionP14S1').append(tr)

                    // TOTALES PREGUNTA 15
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '4', 'auto'))               
                    tr.append(crearTD(fondos2General, '1', 'auto'))
                    tr.append(crearTD(fondos2Hombres, '1', 'auto'))
                    tr.append(crearTD(fondos2Mujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionP15S1').append(tr)

                    // TOTALES PREGUNTA 19
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '4', 'auto'))
                    tr.append(crearTD(accionesImpartidas, '1', 'auto'))
                    tr.append(crearTD(accionesConcluidas, '1', 'auto'))
                    tr.append(crearTD(accionesTotalPersonal, '1', 'auto'))
                    tr.append(crearTD(accionesTotalHombres, '1', 'auto'))
                    tr.append(crearTD(accionesMujeres, '1', 'auto'))
                    document.getElementById('identifierQuestionP19S1').append(tr)

                    //TOTALES PREGUNTA 24
                    tr = document.createElement('tr')
                    tr.append(crearTD('Total', '3', 'auto'))
                    tr.append(crearTD(totalInmuebles, '1', 'auto'))
                    tr.append(crearTD(totalInmueblesPropios, '1', 'auto'))
                    tr.append(crearTD(totalInmueblesRentados, '1', 'auto'))
                    tr.append(crearTD(totalInmueblesOtros, '1', 'auto'))
                    document.getElementById('identifierQuestionP24S1').append(tr)

                            //MENSAJE DE FINALIZACION
                            alertify.success('Carga terminada !')
                        }, 1000)
                        // window.print()
                    }

                    
                })
            })
        })
            
    }
})

async function recuperarNombreDependencia(idInstitucion, anioInstitucion) {
    try {
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'nombreInstitucion',
                idInstitucion,
                anioInstitucion
            }
        })

        let resultado = res.data

        if (resultado[0] != undefined && resultado[0] == 'success') {
            nombreInstitucion = resultado[1]
            clasificacionInstitucion = resultado[2]

            return [nombreInstitucion, clasificacionInstitucion]
        } else if (resultado[0] != undefined && resultado[0] == 'error') {
            console.warn(resultado[1])
        } else {
            console.error(resultado)
        }
    } catch (error) {
        console.log(error)
    }
}

async function verificarCuestionarioFinalizado() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'verificarCuestionarioFinalizado',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            return resultado[1]
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};

async function obtenerReporte(idInstitucion, nombreInstitucion, clasificacionInstitucion, anioInstitucion) {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerReporte',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        reporte = res.data
    } catch (error) {
        console.error(error);
    }
}

crearTD = (textNode, colspan, width) => {
    td = document.createElement('td')
    td.setAttribute('colspan', colspan)
    td.style.width = width
    td.className = 'text-center align-middle'
    td.appendChild(document.createTextNode(textNode))
    return td
}

displayComentarios = (comentario, contenedor, textarea) => {
    if (comentario == '' || comentario == null || comentario == undefined || comentario == '.') {
        document.getElementById(contenedor).classList.add('d-none')
    } else {
        document.getElementById(textarea).value = comentario
    }
}

ocultarPreguntasNoContestadas = () => {
    if (reporte['pregunta16seccion1']['Respuesta'] != '1') {
        document.getElementById('contenedorP17S1').classList.add('d-none')
        document.getElementById('contenedorP18S1').classList.add('d-none')
    }
    if (reporte['pregunta25seccion1']['Respuesta'] != '1') {
        document.getElementById('contenedorHideP26s1').classList.add('d-none')
    }
    if (reporte['pregunta27seccion1']['Respuesta'] != '1') {
        document.getElementById('contenedorHideP28s1').classList.add('d-none')
    }
    if (reporte['pregunta29seccion1']['Respuesta'] != '1') {
        document.getElementById('contenedorHide30s1').classList.add('d-none')
    }
    if (reporte['pregunta34seccion1']['Respuesta'] != '1') {
        document.getElementById('contenedorP30S1').classList.add('d-none')
    }
    if (reporte['pregunta4seccion12']['Respuesta'] != '1') {
        document.getElementById('contenedorP5S12').classList.add('d-none')
    }
}