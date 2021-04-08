// VARIABLES Y CONSTANTES GLOBALES DEL MODULO DE DEPENDENCIAS
const modalDependencias = new bootstrap.Modal(document.getElementById('modalDependencias'))
let dependencias = null,
    dependenciasEditar = null;

document.addEventListener('DOMContentLoaded', () => {
    // LLENAR SELECTS DE AÑOS
    llenarSelectDeAnios('selectAnioDependencia')
    llenarSelectDeAnios('AnioDependencia')

    // CONSTRUCCION DE LA TABLA DE DEPENDENCIAS
    listarDependencias('all').then(() => { generarTablaDependencias() })

    // ESCUCHADOR SELECT DE AÑO DE LA NAVBAR
    document.getElementById('selectAnioDependencia').addEventListener('change', () => {
        listarDependencias(document.getElementById('selectAnioDependencia').value).then(() => {
            generarTablaDependencias()
        })
    })

    //ACCIONES BOTON GUARDAR USUARIO
    document.getElementById('btnAgregarDependencia').addEventListener('click', () => {
        document.getElementById('formDependencias').reset()
        document.getElementById('modalDependenciasLabel').innerHTML = 'Agregar Dependencia'
        document.getElementById('submitDependencia').innerHTML = 'Guardar'
    })
})

// LLENAR SELECTS DE AÑOS
llenarSelectDeAnios = (select) => {
    for (let anio = new Date().getFullYear(); anio >= 2017; anio--) {
        option = document.createElement('option')
        option.append(document.createTextNode(anio))
        option.value = anio
        document.getElementById(select).append(option)
    }
}

// LISTAR DEPENDENCIAS
async function listarDependencias(anioDependencia) {
    try {
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'listarDependencias',
                anioDependencia: anioDependencia
            }
        })
        dependencias = res.data
    } catch (error) {
        console.log(error)
    }
}

// GENERAR TABLA DEPENDENCIAS
generarTablaDependencias = () => {
    let table = document.createElement('table'),
        head = document.createElement('thead'),
        body = document.createElement('tbody'),
        tr = document.createElement('tr'),
        th = document.createElement('th')

    table.id = 'tablaDependencias'
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
    tr.appendChild(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Clasificación'))
    tr.appendChild(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Estatus'))
    tr.appendChild(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.className = 'text-center'
    th.appendChild(document.createTextNode('Acciones'))
    tr.append(th)
    head.append(tr)

    dependencias.forEach(dependencia => {
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
        td.append(dependencia['Clasificacion'] == 1 ? document.createTextNode('Centralizada') : document.createTextNode('Paraestatal'))
        tr.append(td)
        td = document.createElement('td')
        td.append(dependencia['Finalizado'] == 0 ? document.createTextNode('No finalizado') : document.createTextNode('Finalizado'))
        td.className = dependencia['Finalizado'] == 1 ? 'text-primary text-truncate' : 'text-muted small text-truncate'
        tr.append(td)
        td = document.createElement('td')
        td.className = 'text-center align-middle'
        td.style.width = '15%'
        i = document.createElement('i')
        i.className = 'fas fa-lg fa-user-edit text-info mx-0 w-25'
        a = document.createElement('a')
        a.className = 'btnEditDependencia'
        a.id = 'btnEditDependencia-' + dependencia['idInstitucion'] + '-' + dependencia['anioInstitucion']
        a.append(i);
        td.append(a)
        i = document.createElement('i')
        i.className = 'fa fa-lg fa-user-times text-danger mx-2 w-25'
        a = document.createElement('a')
        a.className = 'btnDeleteDependencia'
        a.id = 'btnDeleteDependencia-' + dependencia['idInstitucion'] + '-' + dependencia['anioInstitucion']
        a.append(i)
        td.append(a)
        i = document.createElement('i')
        i.className = dependencia['Finalizado'] == 1 ? 'fa fa-lg fa-power-off text-warning mx-0 w-25' : 'fa fa-lg fa-power-off text-muted mx-0 w-25'
        a = document.createElement('a')
        a.className = 'btnActive'
        a.id = 'btnActive-' + dependencia['idInstitucion']
        a.append(i)
        td.append(a)
        tr.append(td)
        body.append(tr)
    })

    table.append(head)
    table.append(body)
    document.getElementById('contenedorTablaDependencias').innerHTML = ''
    document.getElementById('contenedorTablaDependencias').append(table)

    listenerDeAccionesDependencias()
    aplicarDataTable('tablaDependencias')
}

async function accionesDependencias(dependencia, accion) {
    if (accion == 'agregar') {
        try {
            let res = await axios('controllers/adminController.php', {
                method: 'POST',
                data: {
                    tipoPeticion: 'guardarDependencia',
                    idDependencia: dependencia['idDependencia'],
                    anioDependencia: dependencia['anioDependencia'],
                    nombreDependencia: dependencia['nombreDependencia'],
                    clasificacionDependencia: dependencia['clasificacionDependencia']
                }
            })
            respuesta = res.data
            if (respuesta[0] == 'success') {
                alertify.success(respuesta[1])
                modalDependencias.hide()
                listarDependencias('all').then(() => { generarTablaDependencias() })
                document.getElementById('formDependencias').reset()
            } else if (respuesta[0] == 'error') {
                alertify.error(respuesta[1])
            } else {
                console.log('respuesta no definida ' + respuesta)
            }
        } catch (error) {
            console.log(error)
        }
    } else if (accion == 'editar') {
        try {
            let res = await axios('controllers/adminController.php', {
                method: 'POST',
                data: {
                    tipoPeticion: 'editarDependencia',
                    idDependencia: dependencia.datosNuevos.idDependencia,
                    idDependenciaOriginal: dependencia.datosViejos.idDependenciaOriginal,
                    anioDependencia: dependencia.datosNuevos.anioDependencia,
                    anioDependenciaOriginal: dependencia.datosViejos.anioDependenciaOriginal,
                    nombreDependencia: dependencia.datosNuevos.nombreDependencia,
                    nombreDependenciaOriginal: dependencia.datosViejos.nombreDependenciaOriginal,
                    clasificacionDependencia: dependencia.datosNuevos.clasificacionDependencia,
                    clasificacionDependenciaOriginal: dependencia.datosViejos.clasificacionDependenciaOriginal
                }
            })
            respuesta = res.data
            if (respuesta[0] == 'success') {
                alertify.success(respuesta[1])
                modalDependencias.hide()
                listarDependencias('all').then(() => { generarTablaDependencias() })
                document.getElementById('formDependencias').reset()
            } else if (respuesta[0] == 'error') {
                alertify.error(respuesta[1])
            } else {
                console.log('respuesta no definida ' + respuesta)
            }
        } catch (error) {
            console.log(error)
        }
    } else if (accion == 'eliminar') {
        try {
            let res = await axios('controllers/adminController.php', {
                method: 'POST',
                data: {
                    tipoPeticion: 'eliminarDependencia',
                    idDependencia: dependencia['idDependencia'],
                    anioDependencia: dependencia['anioDependencia']
                }
            })
            respuesta = res.data
            if (respuesta[0] == 'success') {
                alertify.success(respuesta[1])
                listarDependencias('all').then(() => { generarTablaDependencias() })
            } else if (respuesta[0] == 'error') {
                alertify.error(respuesta[1])
            } else {
                console.warn('respuesta no definida ' + respuesta)
            }
        } catch (error) {
            console.log(error)
        }
    }
}

recolectarDatosDependenciaGUI = () => {
    return {
        idDependencia: document.getElementById('txtIdDependencia').value,
        anioDependencia: document.getElementById('AnioDependencia').value,
        nombreDependencia: document.getElementById('txtDependencia').value,
        clasificacionDependencia: document.getElementById('clasificacionDependencia').value
    }
}

listenerDeAccionesDependencias = () => {
    let elementosEditar = document.getElementsByClassName('btnEditDependencia'),
        elementosEliminar = document.getElementsByClassName('btnDeleteDependencia')

    for (let i = 0; i < elementosEditar.length; i++) {
        document.getElementById(elementosEditar[i].id).addEventListener('click', function () {
            let idDependencia = this.id.split('-')[1],
                anioDependencia = this.id.split('-')[2]
            dependenciasEditar = null;
            let idDependenciaOriginal = '', nombreDependenciaOriginal = '', clasificacionDependenciaOriginal = '', anioDependenciaOriginal = ''
            for (const dependencia in dependencias) {
                if (dependencias[dependencia].idInstitucion == idDependencia && dependencias[dependencia].anioInstitucion == anioDependencia) {
                    /**
                     * Datos originales de la institucion
                     */
                    idDependenciaOriginal = dependencias[dependencia]['idInstitucion']
                    nombreDependenciaOriginal = dependencias[dependencia]['nombreInstitucion']
                    anioDependenciaOriginal = dependencias[dependencia]['anioInstitucion']
                    clasificacionDependenciaOriginal = dependencias[dependencia]['Clasificacion']

                    /**
                     * Datos Nuevos de la institucion
                     */
                    document.getElementById('txtIdDependencia').value = dependencias[dependencia]['idInstitucion']
                    document.getElementById('AnioDependencia').value = dependencias[dependencia]['anioInstitucion']
                    document.getElementById('txtDependencia').value = dependencias[dependencia]['nombreInstitucion']
                    document.getElementById('clasificacionDependencia').value = dependencias[dependencia]['Clasificacion']
                    document.getElementById('modalDependenciasLabel').innerHTML = 'Editar Dependencia'
                    document.getElementById('submitDependencia').innerHTML = 'Actualizar'
                    modalDependencias.show()
                    break
                }
            }

            dependenciasEditar = {
                'idDependenciaOriginal': idDependenciaOriginal,
                'nombreDependenciaOriginal': nombreDependenciaOriginal,
                'anioDependenciaOriginal': anioDependenciaOriginal,
                'clasificacionDependenciaOriginal': clasificacionDependenciaOriginal
            }

        })
    }

    for (let i = 0; i < elementosEliminar.length; i++) {
        document.getElementById(elementosEliminar[i].id).addEventListener('click', function () {
            let idDependencia = this.id.split('-')[1],
                anioDependencia = this.id.split('-')[2],
                nombreDependencia = ''

            for (const dependencia in dependencias) {
                if (dependencias[dependencia].idInstitucion == idDependencia && dependencias[dependencia].anioInstitucion == anioDependencia) {
                    nombreDependencia = dependencias[dependencia]['nombreInstitucion']
                    break
                }
            }
            alertify.confirm(
                'Eliminando usuario...',
                'Se require confirmación para eliminar a <u>' + nombreDependencia + '</u> y toda la informacion referente a esta dependencia.',
                function () {
                    accionesDependencias({ idDependencia, anioDependencia }, 'eliminar')
                },
                function () {
                    alertify.error('Cancelado')
                }
            ).set('labels', { ok: 'Confirmo', cancel: 'Cancelar' });
        })
    }
}
