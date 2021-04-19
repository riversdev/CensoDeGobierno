// VARIABLES GLOBALES DEL MODULO DE REPORTES
let reportes = null

document.addEventListener('DOMContentLoaded', () => {
    llenarSelectDeAnios('selectAnioReportes')
    actualizarCitasDeAnio(document.getElementById('selectAnioReportes').value)
    listarReportes(document.getElementById('selectAnioReportes').value).then(() => { generarTablaReportes() })

    document.getElementById('selectAnioReportes').addEventListener('change', function () {
        listarReportes(this.value).then(() => {
            actualizarCitasDeAnio(this.value)
            generarTablaReportes()
        })
    })

    document.getElementById('btnReporteGeneral').addEventListener('click', function () {
        generarReporte('general')
    })

    document.getElementById('btnReporteClasificacion').addEventListener('click', function () {
        generarReporte('porClasificacionAdmin')
    })
})


// OBTENER LISTADO DE DEPENDENCIAS PARA LOS REPORTES
async function listarReportes(anioDependencia) {
    try {
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'listarReportes',
                anioDependencia: anioDependencia
            }
        })

        let resultado = res.data
        console.log(resultado)
        if (resultado[0] == 'success') {
            reportes = resultado[1]
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else if (resultado[0] == 'warn') {
            console.warn(resultado[1])
        } else {
            console.error('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error)
    }
}


// GENERACION DE LA TABLA DE REPORTES, LLAMANDO A SUS ESCUCHADORES DE ACCIONES Y DATATABLES
generarTablaReportes = () => {
    let table = document.createElement('table'),
        head = document.createElement('thead'),
        body = document.createElement('tbody'),
        tr = document.createElement('tr'),
        th = document.createElement('th')

    table.id = 'tablaReportes'
    table.className += 'table table-hover table-sm'
    table.style.width = '100%'
    head.style.backgroundColor = '#F7F7F9'

    th.scope = 'col'
    th.appendChild(document.createTextNode('Clave'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Año'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Dependencia'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Clasificación'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.className = 'text-center'
    th.appendChild(document.createTextNode('Acciones'))
    tr.append(th)
    head.append(tr)

    reportes.forEach(dependencia => {
        tr = document.createElement('tr')
        th = document.createElement('th')
        th.scope = 'row'
        th.append(document.createTextNode(dependencia['idInstitucion']))
        tr.append(th)
        td = document.createElement('td')
        td.append(document.createTextNode(dependencia['anioInstitucion']))
        tr.append(td)
        td = document.createElement('td')
        td.append(document.createTextNode(dependencia['nombreInstitucion']))
        td.className = 'text-truncate'
        tr.append(td)
        td = document.createElement('td')
        td.append(dependencia['clasificacion'] == 1 ? document.createTextNode('Centralizada') : document.createTextNode('Paraestatal'))
        tr.append(td)
        td = document.createElement('td')
        td.className = 'text-center align-middle'
        td.style.width = '15%'
        a = document.createElement('a')
        a.className = 'btnReporteIndividual'
        a.id = 'btnReporteIndividual-' + dependencia['idInstitucion'] + '-' + dependencia['anioInstitucion']
        a.title = 'Generar reporte'
        i = document.createElement('i')
        i.className = 'fas fa-lg fa-address-book text-info mx-0 w-25'
        a.append(i)
        td.append(a)

        a = document.createElement('a')
        a.className = 'btnTituloReporte'
        a.id = 'btnTituloReporte-' + dependencia['idInstitucion'] + '-' + dependencia['anioInstitucion']
        a.title = 'Título del titular'
        i = document.createElement('i')
        if (dependencia['anioInstitucion'] == 2019 || dependencia['anioInstitucion'] == 2020) {
            i.className = dependencia['tituloArchivo'] != '' ? 'fas fa-lg fa-sticky-note text-warning mx-0 w-25' : 'fas fa-lg fa-sticky-note text-muted mx-0 w-25'
        } else {
            i.className = dependencia['tituloBinario'] != '' ? 'fas fa-lg fa-sticky-note text-warning mx-0 w-25' : 'fas fa-lg fa-sticky-note text-muted mx-0 w-25'
        }
        a.append(i)
        td.append(a)

        a = document.createElement('a')
        a.className = 'btnCedulaReporte'
        a.id = 'btnCedulaReporte-' + dependencia['idInstitucion'] + '-' + dependencia['anioInstitucion']
        a.title = 'Cédula del titular'
        i = document.createElement('i')
        if (dependencia['anioInstitucion'] == 2019 || dependencia['anioInstitucion'] == 2020) {
            i.className = dependencia['cedulaArchivo'] != '' ? 'fas fa-lg fa-sticky-note text-warning mx-0 w-25' : 'fas fa-lg fa-sticky-note text-muted mx-0 w-25'
        } else {
            i.className = dependencia['cedulaBinario'] != '' ? 'fas fa-lg fa-sticky-note text-warning mx-0 w-25' : 'fas fa-lg fa-sticky-note text-muted mx-0 w-25'
        }
        a.append(i)
        td.append(a)

        tr.append(td)
        body.append(tr)
    })

    table.append(head)
    table.append(body)
    document.getElementById('contenedorTablaReportesIndividuales').innerHTML = ''
    document.getElementById('contenedorTablaReportesIndividuales').append(table)

    listenersDeAccionesResultados()
    aplicarDataTable('tablaReportes')
}

listenersDeAccionesResultados = () => {
    let elementosReporteIndivudual = document.getElementsByClassName('btnReporteIndividual'),
        elementosTituloReporte = document.getElementsByClassName('btnTituloReporte'),
        elementosCedulaReporte = document.getElementsByClassName('btnCedulaReporte')

    for (let i = 0; i < elementosReporteIndivudual.length; i++) {
        document.getElementById(elementosReporteIndivudual[i].id).addEventListener('click', function () {
            let idDependencia = this.id.split('-')[1],
                anioDependencia = this.id.split('-')[2]

            if (anioDependencia == 2019 || anioDependencia == 2020) {
                window.open('oldIndividualReport?' + idDependencia + '&' + anioDependencia, '_blank')
            } else {
                window.open('questionaryReport?' + btoa(idDependencia) + '&' + btoa(anioDependencia), '_blank')
            }
        })
    }

    for (let i = 0; i < elementosTituloReporte.length; i++) {
        document.getElementById(elementosTituloReporte[i].id).addEventListener('click', function () {
            let idDependencia = this.id.split('-')[1],
                anioDependencia = this.id.split('-')[2]

            for (const reporte in reportes) {
                if (reportes[reporte].idInstitucion == idDependencia && reportes[reporte].anioInstitucion == anioDependencia) {
                    if (anioDependencia == 2019 || anioDependencia == 2020) {
                        if (reportes[reporte]['tituloArchivo'] != null && reportes[reporte]['tituloArchivo'] != '') {
                            this.href = 'views/static/archivosTitulares2019y2020/' + reportes[reporte]['tituloArchivo']
                            this.target = '_blank'
                        } else {
                            alertify.alert('<span class="font-weight-bold">Sin archivos</span>', 'Verifique el titular vacante o con clave de otra institución en el reporte individual de esta dependencia.')
                        }
                    } else {
                        console.log(reportes[reporte]['tituloBinario']);
                        if (reportes[reporte]['tituloBinario'] == 1 && reportes[reporte]['tituloBinario'] != null) {
                            obtenerTituloDependencia(idDependencia, anioDependencia).then((resultado) => {
                                if(resultado[0] == 'success'){
                                    alertify.success('Descargando titulo...')
                                    console.log(resultado[1])
                                    this.href = resultado[1]
                                    this.download = resultado[1]
                                }else if(resultado[0] == 'error'){
                                    console.error('Error al ejecutar peticion')
                                }else{
                                    console.warn('Respuesta no definida ' + resultado)
                                }
                            })
                            
                        } else {
                            alertify.alert('<span class="font-weight-bold">Sin archivos</span>', 'Verifique el titular vacante o con clave de otra institución en el reporte individual de esta dependencia.')
                        }
                    }
                    break
                }
            }
        })
    }

    for (let i = 0; i < elementosCedulaReporte.length; i++) {
        document.getElementById(elementosCedulaReporte[i].id).addEventListener('click', function () {
            let idDependencia = this.id.split('-')[1],
                anioDependencia = this.id.split('-')[2]

            for (const reporte in reportes) {
                if (reportes[reporte].idInstitucion == idDependencia && reportes[reporte].anioInstitucion == anioDependencia) {
                    if (anioDependencia == 2019 || anioDependencia == 2020) {
                        if (reportes[reporte]['cedulaArchivo'] != null && reportes[reporte]['cedulaArchivo'] != '') {
                            this.href = 'views/static/archivosTitulares2019y2020/' + reportes[reporte]['cedulaArchivo']
                            this.target = '_blank'
                        } else {
                            alertify.alert('<span class="font-weight-bold">Sin archivos</span>', 'Verifique el titular vacante o con clave de otra institución en el reporte individual de esta dependencia.')
                        }
                    } else {
                        console.log(reportes[reporte]['cedulaBinario']);
                        if(reportes[reporte]['cedulaBinario'] == 1 && reportes[reporte]['cedulaBinario'] != null){
                            obtenerCedulaDependencia(idDependencia, anioDependencia).then((resultado) => {
                                if(resultado[0] == 'success'){
                                    console.log('Descargando cedula...')
                                    this.href = resultado[1]
                                    this.download = resultado[1]
                                }else if(resultado[0] == 'error'){
                                    console.error('Error al ejecutar petición')
                                }else{
                                    console.warning('Respuesta no definida ' + resultado)
                                }
                            })   
                        }else {
                            alertify.alert('<span class="font-weight-bold">Sin archivos</span>', 'Verifique el titular vacante o con clave de otra institución en el reporte individual de esta dependencia.')
                        }
                    }
                    break
                }
            }
        })
    }
}

//PETICIONES PARA ABRIR ABRIR CEDULA Y TITULO
// SE HACE POR EL PESO DE LA CONSULTA QUE DEVUELVE EL TITULO Y CEDULA EN GENERAL DE TODAS LAS DEPENDENCIAS ES ESCESIVA EN PESO Y TRUENA LA PETICION

//OBTENER TITULO
async function obtenerTituloDependencia(idDependencia, anioDependencia){
    try{
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data:{
                tipoPeticion: 'obtenerTituloDependencia',
                idDependencia: idDependencia,
                anioDependencia: anioDependencia
            }
        })

        resultado = res.data
        return resultado
    }catch(error){
        console.error(error)
    }
}

//OBTENER CEDULA
async function obtenerCedulaDependencia(idDependencia, anioDependencia){
    try{
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerCedulaDependencia',
                idDependencia: idDependencia,
                anioDependencia: anioDependencia
            }
        })
        resultado = res.data
        return resultado
    }catch(error){  
        console.error(error)
    }
}

// ACTUALIZAR TEXTO DE LOS SPANS DE LAS CARDS DE REPORTE GENERAL Y POR CLASIFICACION
actualizarCitasDeAnio = (anio) => {
    let citasAnioReporte = document.getElementsByClassName('citaAnioReporte')
    for (let i = 0; i < citasAnioReporte.length; i++) {
        citasAnioReporte[i].innerHTML = ''
        citasAnioReporte[i].innerHTML = anio
    }
}


// GENERACION DE REPORTES
generarReporte = (tipoReporte) => {
    let anio = document.getElementById('selectAnioReportes').value

    if (tipoReporte == 'general') {
        if (anio == 2019 || anio == 2020) {
            window.open('oldGeneralReport?' + anio, '_blank')
        } else {
            window.open('questionaryReport?' + btoa('general') + '&' + btoa(anio), '_blank')
        }
    } else {
        let clasificacion = document.getElementById('selectClasificacionReporte').value

        if (anio == 2019 || anio == 2020) {
            if (clasificacion == 1) {
                window.open('oldCentralizedReport?' + anio, '_blank')
            } else {
                window.open('oldParastatalReport?' + anio, '_blank')
            }
        } else {
            if (clasificacion == 1) {
                window.open('questionaryReport?' + btoa('centralizadas') + '&' + btoa(anio), '_blank')
            } else {
                window.open('questionaryReport?' + btoa('paraestatales') + '&' + btoa(anio), '_blank')
            }
        }
    }
}