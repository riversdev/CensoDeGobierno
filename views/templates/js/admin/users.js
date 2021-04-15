// VARIABLES Y CONSTANTES GLOBALES DEL MODULO DE USUARIOS
const modalUsuarios = new bootstrap.Modal(document.getElementById('modalUsuarios'))
let usuarios = null

document.addEventListener('DOMContentLoaded', () => {
    // CONSTRUCCION DE LA TABLA DE USUARIOS
    listarUsuarios().then(() => { generarTablaUsuarios() })

    // FORMATEO DEL MODAL AL AGREGAR
    document.getElementById('btnAgregarUsuario').addEventListener('click', () => {
        document.getElementById('formUsuarios').reset()
        document.getElementById('modalUsuariosLabel').innerHTML = 'Guardar Usuario'
        document.getElementById('txtIdUsuario').value = ''
        document.getElementById('txtContraseniaUsuario').setAttribute('required', '')
        document.getElementById('formUsuarios').classList.remove('was-validated')
        document.getElementById('ojito').classList.remove('fa-eye-slash')
        document.getElementById('ojito').classList.add('fa-eye');
        document.getElementById('txtContraseniaUsuario').type = 'password'
    })

    // FUNCION DE OJO PARA PASSWORD
    document.getElementById('ojo').addEventListener('click', () => {
        var saber = document.getElementById('ojito').classList
        if (saber[1] == 'fa-eye') {
            document.getElementById('ojito').classList.remove('fa-eye')
            document.getElementById('ojito').classList.add('fa-eye-slash');
            document.getElementById('txtContraseniaUsuario').type = 'text'
        } else if (saber[1] == 'fa-eye-slash') {
            document.getElementById('ojito').classList.remove('fa-eye-slash')
            document.getElementById('ojito').classList.add('fa-eye');
            document.getElementById('txtContraseniaUsuario').type = 'password'
        }
    })
})

// LISTAR USUARIOS
async function listarUsuarios() {
    try {
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'listarUsuarios'
            }
        })

        let resultado = res.data

        if (resultado[0] == 'success') {
            usuarios = resultado[1]
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else if (resultado[0] == 'warn') {
            console.warn(resultado[1])
        } else {
            console.error('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
}

// RECOLECTAR DATOS DEL USUARIO DE LA GUI
recolectarDatosGUIUsuarios = () => {
    return {
        idUsuario: document.getElementById('txtIdUsuario').value,
        nombreUsuario: document.getElementById('txtNombreUsuario').value,
        correoUsuario: document.getElementById('txtCorreoUsuario').value,
        contraseniaUsuario: document.getElementById('txtContraseniaUsuario').value,
        phoneUsuario: document.getElementById('txtPhoneUsuario').value,
        ocupacionUsuario: document.getElementById('txtOcupacionUsuario').value,
        rolUsuario: document.getElementById('txtTipoUsuario').value,
        estatusUsuario: document.getElementById('txtEstatusUsuario').value
    }
}

// CRUD USUARIOS
async function enviarUsuario(usuario, accion) {
    if (accion == 'agregar') {
        try {
            let res = await axios('controllers/adminController.php', {
                method: 'POST',
                data: {
                    tipoPeticion: 'agregarUsuario',
                    nombreUsuario: usuario['nombreUsuario'],
                    correoUsuario: usuario['correoUsuario'],
                    contraseniaUsuario: usuario['contraseniaUsuario'],
                    phoneUsuario: usuario['phoneUsuario'],
                    ocupacionUsuario: usuario['ocupacionUsuario'],
                    rolUsuario: usuario['rolUsuario'],
                    estatusUsuario: usuario['estatusUsuario']
                }
            })
            respuesta = res.data
            if (respuesta[0] == 'success') {
                listarUsuarios().then(() => {
                    generarTablaUsuarios()
                    alertify.success(respuesta[1])
                    modalUsuarios.hide()
                    document.getElementById('formUsuarios').reset()
                    document.getElementById('txtIdUsuario').value = ''
                    document.getElementById('formUsuarios').classList.remove('was-validated')
                })
            } else if (respuesta[0] == 'error') {
                alertify.error(respuesta[1])
            } else {
                console.warn('Tipo de respuesta no definido. ' + respuesta);
            }
        } catch (error) {
            console.error(error);
        }
    } else if (accion == 'editar') {
        try {
            let res = await axios('controllers/adminController.php', {
                method: 'POST',
                data: {
                    tipoPeticion: 'editarUsuario',
                    idUsuario: usuario['idUsuario'],
                    nombreUsuario: usuario['nombreUsuario'],
                    correoUsuario: usuario['correoUsuario'],
                    phoneUsuario: usuario['phoneUsuario'],
                    ocupacionUsuario: usuario['ocupacionUsuario'],
                    rolUsuario: usuario['rolUsuario'],
                    estatusUsuario: usuario['estatusUsuario'],
                    contraseniaUsuario: usuario['contraseniaUsuario'],
                }
            })
            respuesta = res.data
            if (respuesta[0] == 'success') {
                listarUsuarios().then(() => {
                    generarTablaUsuarios()
                    alertify.success(respuesta[1])
                    modalUsuarios.hide()
                    document.getElementById('formUsuarios').reset()
                    document.getElementById('txtIdUsuario').value = ''
                    document.getElementById('formUsuarios').classList.remove('was-validated')
                })
            } else if (respuesta[0] == 'error') {
                alertify.error(respuesta[1])
            } else {
                console.warn('Tipo de respuesta no definido. ' + respuesta);
            }
        } catch (error) {
            console.error(error);
        }
    } else if (accion == 'eliminar') {
        try {
            let res = await axios('controllers/adminController.php', {
                method: 'POST',
                data: {
                    tipoPeticion: 'eliminarUsuario',
                    idUsuario: usuario
                }
            })
            respuesta = res.data
            if (respuesta[0] == 'success') {
                listarUsuarios().then(() => {
                    generarTablaUsuarios()
                    alertify.success(respuesta[1])
                })
            } else if (respuesta[0] == 'error') {
                alertify.error(respuesta[1])
            } else {
                console.warn('Tipo de respuesta no definido. ' + respuesta);
            }
        } catch (error) {
            console.error(error);
        }
    }
}

// TABLA USUARIOS
generarTablaUsuarios = () => {
    let table = document.createElement('table'),
        head = document.createElement('thead'),
        body = document.createElement('tbody'),
        tr = document.createElement('tr'),
        th = document.createElement('th')

    table.id = 'tablaUsuarios'
    table.className += 'table table-hover'
    table.style.width = '100%'
    head.style.backgroundColor = '#F7F7F9'
    th.scope = 'col'
    th.appendChild(document.createTextNode('#'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Nombre'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Tipo de usuario'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Email'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Teléfono'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Dirección general'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Fecha de registro'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.appendChild(document.createTextNode('Estatus'))
    tr.append(th)
    th = document.createElement('th')
    th.scope = 'col'
    th.className = 'text-center'
    th.appendChild(document.createTextNode('Acciones'))
    tr.append(th)
    head.append(tr)

    usuarios.forEach(user => {
        if (user['idUsuario'] != 0) {
            tr = document.createElement('tr')
            th = document.createElement('th')
            th.scope = 'row'
            th.append(document.createTextNode(user['idUsuario']))
            tr.append(th)
            td = document.createElement('td')
            td.append(document.createTextNode(user['nombreUsuario']))
            tr.append(td)
            td = document.createElement('td')
            td.append(document.createTextNode(user['tipoUsuario']))
            tr.append(td)
            td = document.createElement('td')
            td.append(document.createTextNode(user['emailUsuario']))
            tr.append(td)
            td = document.createElement('td')
            td.append(document.createTextNode(user['phoneUsuario']))
            tr.append(td)
            td = document.createElement('td')
            td.append(document.createTextNode(user['usuarioOcupacion']))
            tr.append(td)
            td = document.createElement('td')
            td.append(document.createTextNode(user['fechaRegistro']))
            tr.append(td)
            td = document.createElement('td')
            td.append(document.createTextNode(user['estatusUsuario']))
            td.className = user['estatusUsuario'] == 'Activo' ? 'text-primary' : 'text-muted'
            tr.append(td)
            td = document.createElement('td')
            td.className = 'text-center align-middle'
            i = document.createElement('i')
            i.className = 'fas fa-lg fa-user-edit text-info'
            a = document.createElement('a')
            a.className = 'btnEdit'
            a.id = 'btnEdit-' + user['idUsuario']
            a.append(i);
            td.append(a)
            i = document.createElement('i')
            i.className = 'fa fa-lg fa-user-times text-danger ml-4'
            a = document.createElement('a')
            a.className = 'btnDelete adminElement'
            a.id = 'btnDelete-' + user['idUsuario']
            a.append(i)
            td.append(a)
            tr.append(td)
            body.append(tr)
        }
    })

    table.append(head);
    table.append(body);
    document.getElementById('contenedorTablaUsuarios').innerHTML = ''
    document.getElementById('contenedorTablaUsuarios').append(table)

    listenersDeAccionesUsuarios()
    aplicarDataTable('tablaUsuarios')
}

// LISTENERS DE ACCIONES USUARIOS
listenersDeAccionesUsuarios = () => {
    let elementosEditar = document.getElementsByClassName('btnEdit'),
        elementosEliminar = document.getElementsByClassName('btnDelete')

    for (let i = 0; i < elementosEditar.length; i++) {
        document.getElementById(elementosEditar[i].id).addEventListener('click', function () {
            let idUsuario = this.id.split('-')[1]

            for (const usuario in usuarios) {
                if (usuarios[usuario].idUsuario == idUsuario) {
                    document.getElementById('txtIdUsuario').value = usuarios[usuario]['idUsuario']
                    document.getElementById('txtNombreUsuario').value = usuarios[usuario]['nombreUsuario']
                    document.getElementById('txtCorreoUsuario').value = usuarios[usuario]['emailUsuario']
                    document.getElementById('txtPhoneUsuario').value = usuarios[usuario]['phoneUsuario']
                    document.getElementById('txtOcupacionUsuario').value = usuarios[usuario]['usuarioOcupacion']
                    document.getElementById('txtTipoUsuario').value = usuarios[usuario]['tipoUsuario']
                    document.getElementById('txtEstatusUsuario').value = usuarios[usuario]['estatusUsuario']
                    document.getElementById('txtContraseniaUsuario').value = '';
                    document.getElementById('modalUsuariosLabel').innerHTML = 'Editar Usuario'
                    document.getElementById('txtContraseniaUsuario').removeAttribute('required')
                    document.getElementById('ojito').classList.remove('fa-eye-slash')
                    document.getElementById('ojito').classList.add('fa-eye');
                    document.getElementById('txtContraseniaUsuario').type = 'password'
                    modalUsuarios.show()
                    break
                }
            }
        })
    }

    for (let i = 0; i < elementosEliminar.length; i++) {
        document.getElementById(elementosEliminar[i].id).addEventListener('click', function () {
            var idUsuario = this.id.split('-')[1],
                nombreUsuario = ''

            for (const usuario in usuarios) {
                if (usuarios[usuario].idUsuario == idUsuario) {
                    nombreUsuario = usuarios[usuario]['nombreUsuario']
                    break
                }
            }

            alertify.confirm(
                'Eliminando usuario...',
                'Se require confirmación para eliminar a <u>' + nombreUsuario + '</u>.',
                function () {
                    enviarUsuario(idUsuario, 'eliminar')
                },
                function () {
                    alertify.error('Cancelado')
                }
            ).set('labels', { ok: 'Confirmo', cancel: 'Cancelar' });
        })
    }

    displayElementosAdministrador()
}