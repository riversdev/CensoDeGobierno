let usuarios = null;
document.addEventListener('DOMContentLoaded', () => {

    listarUsuarios().then(() => { generarTabla() })
    alertify.success('Todo está listo !')
    
    // ACCIONES DE LAS TABS
    document.getElementById('btnTabHome').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('home-tab')).show()
    })
    document.getElementById('btnTabUsuarios').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('usuarios-tab')).show()
        listarUsuarios().then(() => { generarTabla() })
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
    tabNavigationList.forEach(function(tabNavigationElement) {
        tabNavigationElement.addEventListener('shown.bs.tab', function() {
            vizualizarElementosNavegacion(this.id)
        })
    })


    // CERRAR SESION
    document.getElementById('btnSalirAdmin').addEventListener('click', () => {
        alertify.confirm(
            'Saliendo...',
            'Se requiere confirmación para cerrar la sesión',
            function() {
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
            function() {
                alertify.error('Cancelado')
            }
        ).set('labels', { ok: 'Confirmo', cancel: 'Cancelar' });
    })
})

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


//PETICION PARA LISTAR USUARIOS
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

//TABLA USUARIOS

generarTabla = () => {
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
        th.appendChild(document.createTextNode('NOMBRE'))
        tr.append(th)
        th = document.createElement('th')
        th.scope = 'col'
        th.appendChild(document.createTextNode('CORREO'))
        tr.append(th)
        th = document.createElement('th')
        th.scope = 'col'
        th.appendChild(document.createTextNode('DIRECCIÓN GENERAL'))
        tr.append(th)
        th = document.createElement('th')
        th.scope = 'col'
        th.appendChild(document.createTextNode('REGISTRADO'))
        tr.append(th)
        th = document.createElement('th')
        th.scope = 'col'
        th.appendChild(document.createTextNode('STATUS'))
        tr.append(th)
        th = document.createElement('th')
        th.scope = 'col'
        th.className = 'text-center'
        th.appendChild(document.createTextNode('ACCIONES'))
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
            td.append(document.createTextNode(user['emailUsuario']))
            tr.append(td)
            td = document.createElement('td')
            td.append(document.createTextNode(user['usuarioOcupacion']))
            tr.append(td)
            td = document.createElement('td')
            td.append(document.createTextNode(user['fechaRegistro']))
            tr.append(td)
            td = document.createElement('td')
            td.append(document.createTextNode(user['estatusUsuario']))
            tr.append(td)
            td = document.createElement('td')
            td.className = 'd-flex justify-content-around'
            i = document.createElement('i')
            i.className = 'fas fa-lg fa-user-edit text-info'
            a = document.createElement('a')
            a.className = 'btnEdit'
            a.id = 'btnEdit' + user['idUsuario']
            a.append(i);
            td.append(a)
            i = document.createElement('i')
            i.className = 'fa fa-lg fa-user-times text-danger'
            a = document.createElement('a')
            a.className = 'btnDelete'
            a.id = 'btnDelete' + user['idUsuario']
            a.append(i)
            td.append(a)
            tr.append(td)
            body.append(tr)
        })


        table.append(head);
        table.append(body);
        document.getElementById('contenedorTablaUsuarios').innerHTML = ''
        document.getElementById('contenedorTablaUsuarios').append(table)
        listenersDeAcciones()
        //aplicarDataTable()
    }
    /*aplicarDataTable = () => {
        $('#tablaUsuarios').DataTable({
            scrollX: true,
            'lengthMenu': [
                [5, 20, 40, -1],
                [5, 20, 40, 'Todos']
            ],
            'order': [
                [0, 'asc']
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
    }*/

    //RECOLECTAR DATOS

    recolectarDatosGUI = () => {
        return {
            idUsuario: document.getElementById('txtIdUsuario').value,
            nombreUsuario: document.getElementById('txtNombreUsuario').value,
            apUsuario: document.getElementById('txtApUsuario').value,
            amUsuario: document.getElementById('txtAmUsuario').value,
            correoUsuario: document.getElementById('txtCorreoUsuario').value,
            ocupacionUsuario: document.getElementById('txtOcupacionUsuario').value,
            rolUsuario: document.getElementById('txtTipoUsuario').value,
            estatusUsuario: document.getElementById('txtEstatusUsuario').value
        }
    }

    listenersDeAcciones = () => {
        let elementosEditar = document.getElementsByClassName('btnEdit'),
            elementosEliminar = document.getElementsByClassName('btnDelete')
    
        for (let i = 0; i < elementosEditar.length; i++) {
            document.getElementById(elementosEditar[i].id).addEventListener('click', function () {
                let fila = [];
                let nombres  = [
                    'idUsuario',
                    'nombreUsuario',
                    'correoUsuario',
                    'ocupacionUsuario',
                    'fechaRegistro',
                    'estatusUsuario'
                ];
                for (let i = 0; i < this.parentElement.parentElement.children.length-1; i++) {
                    fila[nombres[i]] = this.parentElement.parentElement.children[i].innerHTML
                }
                console.log(fila)

                document.getElementById('txtIdUsuario').value = fila['idUsuario']
                document.getElementById('txtNombreUsuario').value = fila['nombreUsuario']
                document.getElementById('txtCorreoUsuario').value = fila['correoUsuario']
                document.getElementById('txtOcupacionUsuario').value = fila['ocupacionUsuario']
                document.getElementById('txtEstatusUsuario').value = fila['estatusUsuario']
                new bootstrap.Modal(document.getElementById('modalUsuarios')).show()
            })
        }
    
        for (let i = 0; i < elementosEliminar.length; i++) {
            document.getElementById(elementosEliminar[i].id).addEventListener('click', function () {
                idPrenda = this.parentElement.parentElement.children[0].innerHTML
                alertify.confirm(
                    'Eliminando pregunta...',
                    'Seguro de quere eliminar la prenda "' + this.parentElement.parentElement.children[1].innerHTML + '" ?',
                    function () {
                        enviarPrenda(idPrenda, 'eliminar')
                    },
                    function () {
                        alertify.error('Cancelado')
                    }
                ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
            })
        }
    }