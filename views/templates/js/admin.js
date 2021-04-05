let usuarios = null,
    modalUsuarios = new bootstrap.Modal(document.getElementById('modalUsuarios'))

document.addEventListener('DOMContentLoaded', () => {
    listarUsuarios().then(() => {
        generarTablaUsuarios()
        validarFormularios()
        alertify.success('Todo está listo !')
    })

    // ACCIONES DE LAS TABS
    document.getElementById('btnTabHome').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('home-tab')).show()
    })
    document.getElementById('btnTabUsuarios').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('usuarios-tab')).show()
    })
    document.getElementById('btnTabDependencias').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('dependencias-tab')).show()
    })
    document.getElementById('btnTabReportes').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('reportes-tab')).show()
    })
    document.getElementById('btnTabGraficador').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('graficador-tab')).show()
    })
    // elementos visibles en las tabs
    var tabNavigationList = [].slice.call(document.querySelectorAll('#tabNavigation li a[data-bs-toggle="tab"]'))
    tabNavigationList.forEach(function (tabNavigationElement) {
        tabNavigationElement.addEventListener('shown.bs.tab', function () {
            vizualizarElementosNavegacion(this.id)
        })
    })

    document.getElementById('btnAgregarUsuario').addEventListener('click', () => {
        document.getElementById('formUsuarios').reset()
        document.getElementById('modalUsuariosLabel').innerHTML = 'Guardar Usuario'
        document.getElementById('txtIdUsuario').value = ''
        document.getElementById('txtContraseniaUsuario').setAttribute('required', '')
        document.getElementById('formUsuarios').classList.remove('was-validated')
    })

    //FUNCION DE OJO PARA PASSWORD
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

    // CERRAR SESION
    document.getElementById('btnSalirAdmin').addEventListener('click', () => {
        alertify.confirm(
            'Saliendo...',
            'Se requiere confirmación para cerrar la sesión',
            function () {
                cerrarSesion().then((res) => {
                    if (res != undefined && res == 'success') {
                        alertify.success('Sesión terminada !')
                        setTimeout(() => {
                            location.href = ''
                        }, 1000)
                    } else if (res != undefined && res == 'error') {
                        alertify.error('Imposible cerrar sesión !')
                    } else {
                        console.warn('Tipo de respuesta no definido. ' + res)
                    }
                })
            },
            function () {
                alertify.error('Cancelado')
            }
        ).set('labels', { ok: 'Confirmo', cancel: 'Cancelar' });
    })
})

// FUNCIONES DE USO GENERAL
validarFormularios = () => {
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    alertify.error('Verifique sus datos !')
                } else {
                    event.preventDefault()
                    if (form.id == 'formUsuarios') {
                        // LISTENER PARA EL SUBMIT DEL FORMULARIO
                        document.getElementById('txtIdUsuario').value == '' ? enviarUsuario(recolectarDatosGUIUsuarios(), 'agregar') : enviarUsuario(recolectarDatosGUIUsuarios(), 'editar')
                        // ELIMINAR ID OCULTO CUANDO SE AGREGA
                        document.getElementById('btnAgregarUsuario').addEventListener('click', () => {
                            document.getElementById('formUsuarios').reset()
                            document.getElementById('txtIdUsuario').value = ''
                        })
                    }
                }

                form.classList.add('was-validated')
            }, false)
        })
}

vizualizarElementosNavegacion = (tabVisible) => {
    arbolElementosOcultos = {
        'usuarios-tab': ['btnAgregarUsuario'],
        'dependencias-tab': ['btnAgregarDependencia']
    }

    for (const lista in arbolElementosOcultos) {
        if (lista == tabVisible) {
            arbolElementosOcultos[lista].forEach(elemento => {
                document.getElementById(elemento).classList.remove('d-none')
            })
        } else {
            arbolElementosOcultos[lista].forEach(elemento => {
                document.getElementById(elemento).classList.add('d-none')
            })
        }
    }
}

aplicarDataTable = (tabla) => {
    if (tabla == 'tablaUsuarios') {
        $('#tablaUsuarios').DataTable({
            'lengthMenu': [
                [5, 20, 50, -1],
                [5, 20, 50, 'Todos']
            ],
            'order': [
                [0, "asc"]
            ],
            responsive: 'true',
            columnDefs: [
                {
                    targets: [0],
                    visible: false,
                    searchable: true
                }, {
                    targets: [3],
                    visible: false,
                    searchable: true
                }, {
                    targets: [5],
                    visible: false,
                    searchable: true
                },
            ],
            language: {
                sProcessing: 'Procesando...',
                sLengthMenu: 'Mostrar _MENU_ registros',
                sZeroRecords: 'No se encontraron resultados',
                sEmptyTable: 'Ningún dato disponible en esta tabla',
                sInfo: 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
                sInfoEmpty: 'Mostrando registros del 0 al 0 de un total de 0 registros',
                sInfoFiltered: '(filtrado de un total de _MAX_ registros)',
                sInfoPostFix: '',
                sSearch: 'Buscar:',
                sUrl: '',
                sInfoThousands: ',',
                sLoadingRecords: 'Cargando...',
                oPaginate: {
                    sFirst: 'Primero',
                    sLast: 'Último',
                    sNext: 'Siguiente',
                    sPrevious: 'Anterior'
                },
                aria: {
                    SortAscending: ': Activar para ordenar la columna de manera ascendente',
                    SortDescending: ': Activar para ordenar la columna de manera descendente'
                }
            }
        });
    }
}

async function cerrarSesion() {
    try {
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'cerrarSesion',
            }
        })
        return res.data
    } catch (error) {
        console.error(error);
    }
};


// USUARIOS
// PETICION PARA LISTAR USUARIOS
async function listarUsuarios() {
    try {
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'listarUsuarios'
            }
        })
        usuarios = res.data
    } catch (error) {
        console.error(error);
    }
}

// PETICION CRUD USUARIOS
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
        a.className = 'btnDelete'
        a.id = 'btnDelete-' + user['idUsuario']
        a.append(i)
        td.append(a)
        tr.append(td)
        body.append(tr)
    })

    table.append(head);
    table.append(body);
    document.getElementById('contenedorTablaUsuarios').innerHTML = ''
    document.getElementById('contenedorTablaUsuarios').append(table)
    listenersDeAccionesUsuarios()
    aplicarDataTable('tablaUsuarios')
}

// RECOLECTAR DATOS DEL USUARIO
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
}
