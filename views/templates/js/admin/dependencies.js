// VARIABLES Y CONSTANTES GLOBALES DEL MODULO DE DEPENDENCIAS
const modalDependencias = new bootstrap.Modal(document.getElementById('modalDependencias'))
const modalDependenciasEliminar = new bootstrap.Modal(document.getElementById('modalDependenciasEliminar'))
let dependencias = null,
    dependenciasEditar = null,
    dependenciasEliminar = null,
    vectorListaDependencias = []

document.addEventListener('DOMContentLoaded', () => {
    // LLENAR SELECTS DE AÑOS
    llenarSelectDeAnios('selectAnioDependencia')
    llenarSelectDeAnios('AnioDependencia')

    // CONSTRUCCION DE LA TABLA DE DEPENDENCIAS
    listarDependencias('all').then(() => { generarTablaDependencias() })

    // DATA LIST
    leerListaDependencias()

    // ESCUCHADOR SELECT DE AÑO DE LA NAVBAR
    document.getElementById('selectAnioDependencia').addEventListener('change', () => {
        listarDependencias(document.getElementById('selectAnioDependencia').value).then(() => {
            generarTablaDependencias()
        })
    })

    // ACCIONES BOTON GUARDAR USUARIO
    document.getElementById('btnAgregarDependencia').addEventListener('click', () => {
        document.getElementById('formDependencias').reset()
        document.getElementById('modalDependenciasLabel').innerHTML = 'Agregar Dependencia'
        document.getElementById('submitDependencia').innerHTML = 'Guardar'
        document.getElementById('formDependencias').classList.remove('was-validated')
    })
})

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

        let resultado = res.data

        if (resultado[0] == 'success') {
            dependencias = resultado[1]
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else if (resultado[0] == 'warn') {
            console.warn(resultado[1])
        } else {
            console.error('Tipo de respuesta no definido. ' + resultado)
        }
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
        i.className = 'fas fa-lg fa-id-card text-success w-25'
        a = document.createElement('a')
        a.className = 'btnContactoDependencia'
        a.id = 'btnContactoDependencia-' + dependencia['idInstitucion'] + '-' + dependencia['anioInstitucion']
        a.title = 'Contacto'
        a.append(i);
        td.append(a)
        i = document.createElement('i')
        i.className = 'fas fa-lg fa-edit text-info w-25'
        a = document.createElement('a')
        a.className = 'btnEditDependencia adminElement'
        a.id = 'btnEditDependencia-' + dependencia['idInstitucion'] + '-' + dependencia['anioInstitucion']
        a.title = 'Editar'
        a.append(i);
        td.append(a)
        i = document.createElement('i')
        i.className = 'fas fa-lg fa-trash-alt text-danger w-25'
        a = document.createElement('a')
        a.className = 'btnDeleteDependencia adminElement'
        a.id = 'btnDeleteDependencia-' + dependencia['idInstitucion'] + '-' + dependencia['anioInstitucion']
        a.title = 'Eliminar'
        a.append(i)
        td.append(a)
        i = document.createElement('i')
        i.className = dependencia['Finalizado'] == 1 ? 'fas fa-lg fa-power-off text-warning w-25' : 'fas fa-lg fa-power-off text-muted w-25'
        a = document.createElement('a')
        a.className = 'btnActiveDependencia adminElement'
        a.id = 'btnActive-' + dependencia['idInstitucion'] + '-' + dependencia['anioInstitucion'] + '-' + dependencia['Finalizado']
        a.title = 'Reactivar'
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
                listarDependencias(document.getElementById('selectAnioDependencia').value)
                    .then(() => { generarTablaDependencias() })
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
                listarDependencias(document.getElementById('selectAnioDependencia').value)
                    .then(() => { generarTablaDependencias() })
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
                    idDependencia: dependencia.datosDependencia.idDependencia,
                    anioDependencia: dependencia.datosDependencia.anioDependencia,
                    tipoDeEliminacion: dependencia.tipoPeticionEliminar
                }
            })
            respuesta = res.data
            if (respuesta[0] == 'success') {
                alertify.success(respuesta[1])
                listarDependencias(document.getElementById('selectAnioDependencia').value)
                    .then(() => { generarTablaDependencias() })
                document.getElementById('formDependenciaEliminar').reset()

            } else if (respuesta[0] == 'error') {
                alertify.error(respuesta[1])
            } else {
                console.warn('respuesta no definida ' + respuesta)
            }
        } catch (error) {
            console.log(error)
        }
    } else if (accion == 'activarCuestionario') {
        try {
            let res = await axios('controllers/adminController.php', {
                method: 'POST',
                data: {
                    tipoPeticion: 'activarCuestionarioDependencia',
                    idDependencia: dependencia['idDependencia'],
                    nombreDependencia: dependencia['nombreDependencia'],
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
                console.log('respuesta no definida' + respuesta)
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
    let elementosContacto = document.getElementsByClassName('btnContactoDependencia'),
        elementosEditar = document.getElementsByClassName('btnEditDependencia'),
        elementosEliminar = document.getElementsByClassName('btnDeleteDependencia'),
        elementosActivarCuestionario = document.getElementsByClassName('btnActiveDependencia')

    for (let i = 0; i < elementosContacto.length; i++) {
        document.getElementById(elementosContacto[i].id).addEventListener('click', function () {
            let idDependencia = this.id.split('-')[1],
                anioDependencia = this.id.split('-')[2],
                nombreDependencia = '',
                correoDependencia = '',
                telefonoDependencia = ''

            for (const dependencia in dependencias) {
                if (dependencias[dependencia].idInstitucion == idDependencia && dependencias[dependencia].anioInstitucion == anioDependencia) {
                    nombreDependencia = dependencias[dependencia]['nombreInstitucion']
                    correoDependencia = dependencias[dependencia]['correo']
                    telefonoDependencia = dependencias[dependencia]['telefono']
                    break
                }
            }

            alertify.alert('Información de contacto..', '<span class="fw-bold">' + anioDependencia + ', ' + nombreDependencia + '<br><br>Correo: ' + (correoDependencia != '' ? '<span class="fw-normal">' + correoDependencia + '</span>' : '<span class="fw-normal fst-italic text-warning">sin datos</span>') + '<br>Teléfono: ' + (telefonoDependencia != '' ? '<span class="fw-normal">' + telefonoDependencia + '</span>' : '<span class="fw-normal fst-italic text-warning">sin datos</span>') + '</span>')
        })
    }

    for (let i = 0; i < elementosEditar.length; i++) {
        document.getElementById(elementosEditar[i].id).addEventListener('click', function () {
            let idDependencia = this.id.split('-')[1],
                anioDependencia = this.id.split('-')[2],
                idDependenciaOriginal = '',
                nombreDependenciaOriginal = '',
                clasificacionDependenciaOriginal = '',
                anioDependenciaOriginal = ''

            dependenciasEditar = null

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
            document.getElementById('flexRadioDefault1').checked = false
            document.getElementById('flexRadioDefault12').checked = false
            let idDependencia = this.id.split('-')[1],
                anioDependencia = this.id.split('-')[2],
                nombreDependencia = ''

            dependenciasEliminar = null

            for (const dependencia in dependencias) {
                if (dependencias[dependencia].idInstitucion == idDependencia && dependencias[dependencia].anioInstitucion == anioDependencia) {
                    nombreDependencia = dependencias[dependencia]['nombreInstitucion']
                    break
                }
            }

            dependenciasEliminar = {
                'idDependencia': idDependencia,
                'anioDependencia': anioDependencia,
                'nombreDependencia': nombreDependencia
            }

            modalDependenciasEliminar.show()
        })
    }

    for (let i = 0; i < elementosActivarCuestionario.length; i++) {
        document.getElementById(elementosActivarCuestionario[i].id).addEventListener('click', function () {
            let idDependencia = this.id.split('-')[1],
                anioDependencia = this.id.split('-')[2],
                nombreDependencia = '',
                estadoCuestionario = this.id.split('-')[3]

            for (const dependencia in dependencias) {
                if (dependencias[dependencia].idInstitucion == idDependencia && dependencias[dependencia].anioInstitucion == anioDependencia) {
                    nombreDependencia = dependencias[dependencia]['nombreInstitucion']
                    break
                }
            }

            if (estadoCuestionario == 1) {
                alertify.confirm(
                    'Activando cuestionario...',
                    'Se requiere confirmación para reactivar el cuestionario a la dependencia <u>' + nombreDependencia + '</u>',
                    function () {
                        accionesDependencias({ idDependencia, nombreDependencia, anioDependencia }, 'activarCuestionario')
                    },
                    function () {
                        alertify.error('Cancelado')
                    }
                )
            } else if (estadoCuestionario == 0) {
                alertify.error('La dependencia aun no finaliza el cuestionario')
            }
        })
    }

    displayElementosAdministrador()
}


// LISTAR DEPENDENCIAS PARA DATALIST
async function leerListaDependencias() {
    try {
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'leerListaDependencias',
            }
        })
        if (res.data[0] == 'success') {
            vectorListaDependencias = []
            datalist = document.getElementById('listaDependencias')
            datalist.innerHTML = ''

            for (let i = 0; i < res.data[1].length; i++) {
                option = document.createElement('option')
                option.value = res.data[1][i]['dependencia']
                option.appendChild(document.createTextNode(res.data[1][i]['dependencia']))
                datalist.append(option)
                vectorListaDependencias.push(res.data[1][i]['dependencia'])
            }
        } else if (res.data[0] == 'error') {
            console.error(res.data[1]);
        } else {
            console.warn('Tipo de respuesta no definido. ' + res.data)
        }
    } catch (error) {
        console.error(error)
    }
}

quitarAcentos = (cadena) => {
    const acentos = {
        'á': 'a',
        'é': 'e',
        'í': 'i',
        'ó': 'o',
        'ú': 'u',
        'Á': 'A',
        'É': 'E',
        'Í': 'I',
        'Ó': 'O',
        'Ú': 'U'
    };
    return cadena.split('').map(letra => acentos[letra] || letra).join('').toString();
}

quitarEspacios = (i) => {
    let ii = i.split('');
    let iiSinEspacios = '';

    for (let i = 0; i < ii.length; i++) {
        if (ii[i] != ' ') {
            iiSinEspacios += ii[i];
        }
    }

    return iiSinEspacios;
}