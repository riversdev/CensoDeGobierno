// VARIABLES Y CONSTANTES GLOBALES DEL MODULO DE DEPENDENCIAS
const modalDependencias = new bootstrap.Modal(document.getElementById('modalDependencias'))
let dependencias = null

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
        a.className = 'btnEdit'
        a.id = 'btnEdit-' + dependencia['idInstitucion']
        a.append(i);
        td.append(a)
        i = document.createElement('i')
        i.className = 'fa fa-lg fa-user-times text-danger mx-2 w-25'
        a = document.createElement('a')
        a.className = 'btnDelete'
        a.id = 'btnDelete-' + dependencia['idInstitucion']
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

    aplicarDataTable('tablaDependencias')
}

async function accionesDependencias(dependencia, accion){
    if(accion == 'agregar'){
        try{
            let res = await axios('controllers/adminController.php', {
                method: 'POST',
                data:{
                    tipoPeticion: 'guardarDependencia',
                    idDependencia: dependencia['idDependencia'],
                    anioDependencia: dependencia['anioDependencia'],
                    nombreDependencia: dependencia['nombreDependencia'],
                    clasificacionDependencia: dependencia['Clasificacion']
                }
            })
            respuesta = res.data
            console.log(respuesta)
            if(respuesta[0] == 'success'){
                alertify.success(respuesta[1])
                modalDependencias.hide()
                listarDependencias('all').then(() => {generarTablaDependencias()})
                document.getElementById('formDependencias').reset()
            }else if(respuesta[0] == 'error'){
                alertify.error(respuesta[1])
            }else{
                console.log('respuesta no definida ' + respuesta)
            }
        }catch(error){
            console.log(error)
        }
    }else if(accion == 'editar'){

    }else if(accion == 'eliminar'){
        
    }
}


recolectarDatosDependencia = () =>{
    return {
        idDependencia: document.getElementById('txtIdDependencia').value,
        anioDependencia: document.getElementById('AnioDependencia').value,
        nombreDependencia: document.getElementById('txtDependencia').value,
        Clasificacion: document.getElementById('clasificacionDependencia').value
    }
}