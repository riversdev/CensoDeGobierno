document.addEventListener('DOMContentLoaded', () => {
    // VALIDACION DE FORMULARIOS
    validarFormularios()

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

    // ELEMENTOS VISIBLES EN LAS TABS
    var tabNavigationList = [].slice.call(document.querySelectorAll('#tabNavigation li a[data-bs-toggle="tab"]'))
    tabNavigationList.forEach(function (tabNavigationElement) {
        tabNavigationElement.addEventListener('shown.bs.tab', function () {
            vizualizarElementosNavegacion(this.id)
        })
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

    // VIZUALIZAR ELEMENTOS EN CUENTA DE ADMIN SEGUN EL ROL DE USUARIO
    displayElementosAdministrador()

    // MENSAJE DE BIENVENIDA
    alertify.success('Todo está listo !')
})

displayElementosAdministrador = () => {
    if (tipoUsuario == 'Usuario') {
        let adminElements = document.getElementsByClassName('adminElement')
        for (let i = 0; i < adminElements.length; i++) {
            adminElements[i].classList.add('d-none')
        }
    }
}

vizualizarElementosNavegacion = (tabVisible) => {
    arbolElementosOcultos = {
        'usuarios-tab': ['btnAgregarUsuario'],
        'dependencias-tab': ['btnAgregarDependencia', 'contenedorSelectAnioDependencia'],
        'reportes-tab': ['contenedorSelectAnioReportes']
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

    displayElementosAdministrador()
}

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
                        if (tipoUsuario != 'Usuario') {
                            if (document.getElementById('txtIdUsuario').value == '') {
                                enviarUsuario(recolectarDatosGUIUsuarios(), 'agregar')
                            } else {
                                enviarUsuario(recolectarDatosGUIUsuarios(), 'editar')
                            }
                        }
                    } else if (form.id == 'formDependencias') {
                        let valor = document.getElementById('submitDependencia').innerHTML
                        if (valor == 'Guardar') {
                            leerListaDependencias().then(() => {
                                let c = 0
                                for (let i = 0; i < vectorListaDependencias.length; i++) {
                                    if (quitarAcentos(quitarEspacios(vectorListaDependencias[i])) == quitarAcentos(quitarEspacios(document.getElementById('txtDependencia').value.toUpperCase()))) {
                                        break
                                    } else {
                                        c++
                                    }
                                }
                                if (c == vectorListaDependencias.length) {
                                    alertify.confirm('Guardando...', 'El nombre de la dependencia es diferente a cualquiera ya registrado, aun así desea guardarlo ?',
                                        function () {
                                            accionesDependencias(recolectarDatosDependenciaGUI(), 'agregar')
                                            leerListaDependencias();
                                        }, function () {
                                            alertify.error('Cancelado')
                                        }).set('labels', {
                                            ok: 'OK',
                                            cancel: 'Cancelar'
                                        });
                                } else {
                                    accionesDependencias(recolectarDatosDependenciaGUI(), 'agregar')
                                }
                            });
                        } else if (valor == 'Actualizar') {
                            leerListaDependencias().then(() => {
                                let c = 0
                                for (let i = 0; i < vectorListaDependencias.length; i++) {
                                    if (quitarAcentos(quitarEspacios(vectorListaDependencias[i])) == quitarAcentos(quitarEspacios(document.getElementById('txtDependencia').value.toUpperCase()))) {
                                        break
                                    } else {
                                        c++
                                    }
                                }
                                if (c == vectorListaDependencias.length) {
                                    alertify.confirm('Guardando...', 'El nombre de la dependencia es diferente a cualquiera ya registrado, aun así desea guardarlo ?',
                                        function () {
                                            accionesDependencias({ 'datosNuevos': recolectarDatosDependenciaGUI(), 'datosViejos': dependenciasEditar }, 'editar')
                                            leerListaDependencias();
                                        }, function () {
                                            alertify.error('Cancelado')
                                        }).set('labels', {
                                            ok: 'OK',
                                            cancel: 'Cancelar'
                                        });
                                } else {
                                    accionesDependencias({ 'datosNuevos': recolectarDatosDependenciaGUI(), 'datosViejos': dependenciasEditar }, 'editar')
                                }
                            });
                        } else {
                            console.warn('Botón inválido')
                        }
                    } else if (form.id == 'formDependenciaEliminar') {
                        let valorSelector = document.querySelector('input[name="flexRadioDefault"]:checked').value,
                            datosDependencia = dependenciasEliminar

                        alertify.confirm('Eliminando dependencia...',
                            'Se requiere confirmación para eliminar información de la dependencia <u>' + datosDependencia.nombreDependencia + '</u>',
                            function () {
                                accionesDependencias({ 'datosDependencia': datosDependencia, 'tipoPeticionEliminar': valorSelector }, 'eliminar')
                                modalDependenciasEliminar.hide()
                            },
                            function () {
                                alertify.error('Cancelado')
                            }
                        ).set('labels', { ok: 'Confirmo', cancel: 'Cancelar' })
                    }
                }

                form.classList.add('was-validated')
            }, false)
        })
}

llenarSelectDeAnios = (select) => {
    if (select == 'selectAnioReportes') {
        for (let anio = new Date().getFullYear(); anio >= 2019; anio--) {
            option = document.createElement('option')
            option.append(document.createTextNode(anio))
            option.value = anio
            document.getElementById(select).append(option)
        }
    } else {
        for (let anio = new Date().getFullYear(); anio >= 2017; anio--) {
            option = document.createElement('option')
            option.append(document.createTextNode(anio))
            option.value = anio
            document.getElementById(select).append(option)
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
    } else if (tabla == 'tablaDependencias') {
        $('#tablaDependencias').DataTable({
            'lengthMenu': [
                [8, 20, 50, -1],
                [8, 20, 50, 'Todos']
            ],
            'order': [
                [1, 'desc']
            ],
            responsive: 'true',
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
    } else if (tabla == 'tablaGraficas') {
        $("#tablaComparaciones").DataTable({
            scrollX: true,
            "lengthMenu": [
                [5, 20, 40, -1],
                [5, 20, 40, "Todos"]
            ],
            "order": [
                [1, "asc"]
            ],
            responsive: "true",
            "sDom": "<'row'<'col-lg-3 col-md-4 col-9'l><'col-lg-5 col-md-3 col-3'B><'col-lg-4 col-md-5 col-12'f>r>t<'row'<'col-md-7 col-12'i><'col-md-5 col-12'p>>",
            buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a excel',
                className: 'btn btn-sm btn-success bg-primary text-white'
            }],
            language: {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún dato disponible en esta tabla",
                sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "Buscar:",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                    sFirst: "Primero",
                    sLast: "Último",
                    sNext: "Siguiente",
                    sPrevious: "Anterior"
                },
                aria: {
                    SortAscending: ": Activar para ordenar la columna de manera ascendente",
                    SortDescending: ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    } else if (tabla == 'tablaReportes') {
        $('#tablaReportes').DataTable({
            'lengthMenu': [
                [8, 20, 50, -1],
                [8, 20, 50, 'Todos']
            ],
            'order': [
                [0, 'desc']
            ],
            responsive: 'true',
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