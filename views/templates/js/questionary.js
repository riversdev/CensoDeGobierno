let preguntasContestadas = [], tituloTitular = '', cedulaTitular = '', totalHombres = null, totalMujeres = null, totalHombresIndigenas = null, totalMujeresIndigenas = null, totalHombresDiscapacitados = null, totalMujeresDiscapacitadas = null, totalPropios = null, totalRentados = null, totalOtros = null, totalComputadoras = null, totalImpresoras = null, totalMultifuncionales = null, totalServidores = null, totalTabletas = null, procedimientoDeContratacion1 = null, procedimientoDeContratacion2 = null, procedimientoDeContratacion3 = null, procedimientoDeContratacion4 = null, procedimientoDeContratacion5 = null, totalContratos1 = null, totalContratos2 = null, totalContratos3 = null, totalContratos4 = null, totalContratos5 = null, totalMontos1 = null, totalMontos2 = null, totalMontos3 = null, totalMontos4 = null, totalMontos5 = null

document.addEventListener('DOMContentLoaded', () => {
    // VERIFICACION DE CUESTIONARIO FINALIZADO, DE PREGUNTAS CONTESTADAS Y PREPARACION DE VALIDACION PARA FORMULARIOS
    verificarCuestionarioFinalizado().then((res) => {
        if (res != undefined && res == true) {
            finalizarCuestionarioEnDOM()
        }
        verificarPreguntasContestadas().then(() => {
            validarFormularios()
        })
    })

    // PREPARACION DE ACCIONES SIDEBAR
    const
        btnToggle = document.querySelector('.toggle-btn'),
        generalContainer = document.getElementById('generalContainer'),
        textoOM = document.getElementById('textoOM')

    btnToggle.addEventListener('click', function () {
        sidebar = document.getElementById('sidebar')
        sidebar.classList.toggle('active')
        if (sidebar.classList.contains('active')) {
            this.style.width = '200px'
            generalContainer.style.marginLeft = '200px'
            textoOM.classList.remove('d-none')
            btnToggle.style.marginLeft = '200px'
            document.querySelectorAll('.reduceList').forEach(element => element.classList.add('d-none'))
            document.querySelectorAll('.expandList').forEach(element => element.classList.remove('d-none'))
        } else {
            this.style.width = '90px'
            generalContainer.style.marginLeft = '90px'
            textoOM.classList.add('d-none')
            btnToggle.style.marginLeft = '90px'
            document.querySelectorAll('.reduceList').forEach(element => element.classList.remove('d-none'))
            document.querySelectorAll('.expandList').forEach(element => element.classList.add('d-none'))
        }
    });
    document.querySelector('#collapseSeccionI').addEventListener('show.bs.collapse', () => {
        document.getElementById('btnCollapseSeccionI').children[0].classList.replace('text-dark', 'text-white')
        document.getElementById('btnCollapseSeccionI').children[1].classList.replace('text-dark', 'text-white')
    })
    document.querySelector('#collapseSeccionI').addEventListener('hidden.bs.collapse', () => {
        document.getElementById('btnCollapseSeccionI').children[0].classList.replace('text-white', 'text-dark')
        document.getElementById('btnCollapseSeccionI').children[1].classList.replace('text-white', 'text-dark')
    })
    document.querySelector('#collapseSeccionXII').addEventListener('show.bs.collapse', () => {
        document.getElementById('btnCollapseSeccionXII').children[0].classList.replace('text-dark', 'text-white')
        document.getElementById('btnCollapseSeccionXII').children[1].classList.replace('text-dark', 'text-white')
    })
    document.querySelector('#collapseSeccionXII').addEventListener('hidden.bs.collapse', () => {
        document.getElementById('btnCollapseSeccionXII').children[0].classList.replace('text-white', 'text-dark')
        document.getElementById('btnCollapseSeccionXII').children[1].classList.replace('text-white', 'text-dark')
    })
    document.querySelector('#collapseFinCuestionario').addEventListener('show.bs.collapse', () => {
        document.getElementById('btnCollapseFinCuestionario').children[0].classList.replace('text-dark', 'text-white')
        document.getElementById('btnCollapseFinCuestionario').children[1].classList.replace('text-dark', 'text-white')
    })
    document.querySelector('#collapseFinCuestionario').addEventListener('hidden.bs.collapse', () => {
        document.getElementById('btnCollapseFinCuestionario').children[0].classList.replace('text-white', 'text-dark')
        document.getElementById('btnCollapseFinCuestionario').children[1].classList.replace('text-white', 'text-dark')
    });

    // PREPARACION DE MENU DE VIDEOS
    [].slice.call(document.querySelectorAll('button[data-bs-toggle="pill"]')).forEach(function (pill) {
        new bootstrap.Tab(pill)

        pill.addEventListener('shown.bs.tab', () => {
            pausarReproducciones()
        })
    })
    document.getElementById('modalVideosDeAyuda').addEventListener('hidden.bs.modal', () => {
        pausarReproducciones()
    })

    // BASE PREGUNTAS ------
    // PREGUNTA 1
    document.getElementById('txtInstitucion').value = nombreInstitucion
    document.getElementById('txtClasificacion').value = clasificacionInstitucion
    vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalGlosarioSubseccion1', 'btnModalPregunta1'])
    document.querySelector('#questionList a[href="#pregunta1s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        document.getElementById('txtInstitucion').value = nombreInstitucion
        document.getElementById('txtClasificacion').value = clasificacionInstitucion
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalGlosarioSubseccion1', 'btnModalPregunta1'])
    })
    if (clasificacionInstitucion == '1') {
        selectTipoInstitucion = document.getElementById('tipoInstitucion')
        option = document.createElement('option')
        option.value = '1'
        option.appendChild(document.createTextNode('1.- Oficina del(a) Gobernador(a)'))
        selectTipoInstitucion.append(option)
        option = document.createElement('option')
        option.value = '2'
        option.appendChild(document.createTextNode('2.- Secretaría'))
        selectTipoInstitucion.append(option)
        option = document.createElement('option')
        option.value = '3'
        option.appendChild(document.createTextNode('3.- Consejería Jurídica del Ejecutivo Estatal'))
        selectTipoInstitucion.append(option)
        option = document.createElement('option')
        option.value = '4'
        option.appendChild(document.createTextNode('4.- Órgano administrativo desconcentrado'))
        selectTipoInstitucion.append(option)
        option = document.createElement('option')
        option.value = '5'
        option.appendChild(document.createTextNode('5.- Otro tipo de institución de la Administración Pública Estatal Centralizada'))
        selectTipoInstitucion.append(option)
    } else if (clasificacionInstitucion == '2') {
        selectTipoInstitucion = document.getElementById('tipoInstitucion')
        option = document.createElement('option')
        option.value = '6'
        option.appendChild(document.createTextNode('6.- Organismo descentralizado'))
        selectTipoInstitucion.append(option)
        option = document.createElement('option')
        option.value = '7'
        option.appendChild(document.createTextNode('7.- Empresa de participación estatal mayoritaria'))
        selectTipoInstitucion.append(option)
        option = document.createElement('option')
        option.value = '8'
        option.appendChild(document.createTextNode('8.- Fideicomiso público'))
        selectTipoInstitucion.append(option)
        option = document.createElement('option')
        option.value = '9'
        option.appendChild(document.createTextNode('9.- Otro tipo de institución de la Administración Pública Estatal Paraestatal'))
        selectTipoInstitucion.append(option)
        option = document.createElement('option')
    }
    document.getElementById('funcionPrincipal').addEventListener('change', () => {
        verificarFuncionesIguales('funcionPrincipal')
        if (document.getElementById('funcionPrincipal').value == '29') {
            document.getElementById('contenedorFuncPriEspecifica').classList.remove('d-none')
            document.getElementById('funcPriEspecifica').setAttribute('required', '')
            verificarContenedoresVisibles(1, 1)
        } else {
            document.getElementById('contenedorFuncPriEspecifica').classList.add('d-none')
            document.getElementById('funcPriEspecifica').removeAttribute('required')
            document.getElementById('funcPriEspecifica').value = ''
            verificarContenedoresVisibles(1, 1)
        }
    })
    document.getElementById('funcionSecundariaUno').addEventListener('change', () => {
        verificarFuncionesIguales('funcionSecundariaUno')
        if (document.getElementById('funcionSecundariaUno').value == '29') {
            document.getElementById('contenedorPrimFuncSecundaria').classList.remove('d-none')
            document.getElementById('secUnoEspecifica').setAttribute('required', '')
            verificarContenedoresVisibles(1, 1)
        } else {
            document.getElementById('contenedorPrimFuncSecundaria').classList.add('d-none')
            document.getElementById('secUnoEspecifica').removeAttribute('required')
            document.getElementById('secUnoEspecifica').value = ''
            verificarContenedoresVisibles(1, 1)
        }
    })
    document.getElementById('funcionSecundariaDos').addEventListener('change', () => {
        verificarFuncionesIguales('funcionSecundariaDos')
        if (document.getElementById('funcionSecundariaDos').value == '29') {
            document.getElementById('contenedorSegFuncSecundaria').classList.remove('d-none')
            document.getElementById('secDosEspecifica').setAttribute('required', '')
            verificarContenedoresVisibles(1, 1)
        } else {
            document.getElementById('contenedorSegFuncSecundaria').classList.add('d-none')
            document.getElementById('secDosEspecifica').removeAttribute('required')
            document.getElementById('secDosEspecifica').value = ''
            verificarContenedoresVisibles(1, 1)
        }
    })
    document.getElementById('funcionSecundariaTres').addEventListener('change', () => {
        verificarFuncionesIguales('funcionSecundariaTres')
        if (document.getElementById('funcionSecundariaTres').value == '29') {
            document.getElementById('contenedorTerFuncSecundaria').classList.remove('d-none')
            document.getElementById('secTresEspecifica').setAttribute('required', '')
            verificarContenedoresVisibles(1, 1)
        } else {
            document.getElementById('contenedorTerFuncSecundaria').classList.add('d-none')
            document.getElementById('secTresEspecifica').removeAttribute('required')
            document.getElementById('secTresEspecifica').value = ''
            verificarContenedoresVisibles(1, 1)
        }
    })
    document.getElementById('funcionSecundariaCuatro').addEventListener('change', () => {
        verificarFuncionesIguales('funcionSecundariaCuatro')
        if (document.getElementById('funcionSecundariaCuatro').value == '29') {
            document.getElementById('contenedorCuarFuncSecundaria').classList.remove('d-none')
            document.getElementById('secCuatroEspecifica').setAttribute('required', '')
            verificarContenedoresVisibles(1, 1)
        } else {
            document.getElementById('contenedorCuarFuncSecundaria').classList.add('d-none')
            document.getElementById('secCuatroEspecifica').removeAttribute('required')
            document.getElementById('secCuatroEspecifica').value = ''
            verificarContenedoresVisibles(1, 1)
        }
    })
    document.getElementById('funcionSecundariaCinco').addEventListener('change', () => {
        verificarFuncionesIguales('funcionSecundariaCinco')
        if (document.getElementById('funcionSecundariaCinco').value == '29') {
            document.getElementById('contenedorQuinFuncSecundaria').classList.remove('d-none')
            document.getElementById('secCincoEspecifica').setAttribute('required', '')
            verificarContenedoresVisibles(1, 1)
        } else {
            document.getElementById('contenedorQuinFuncSecundaria').classList.add('d-none')
            document.getElementById('secCincoEspecifica').removeAttribute('required')
            document.getElementById('secCincoEspecifica').value = ''
            verificarContenedoresVisibles(1, 1)
        }
    })

    // PREGUNTA 2
    document.querySelector('#questionList a[href="#pregunta2s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        document.getElementById('txtInstitucionP2').value = nombreInstitucion
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalGlosarioSubseccion1'])
    })

    // PREGUNTA 3
    document.querySelector('#questionList a[href="#pregunta3s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        document.getElementById('txtInstitucionP3').value = nombreInstitucion
        if (idInstitucion == 0) {
            document.getElementById('txtFormaDesignacionP3').value = '1'
            document.getElementById('txtAfiliacionPartidistaP3').removeAttribute('disabled')
        }
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalGlosarioSubseccion1', 'btnModalPregunta3'])
    })
    document.getElementById('txtMismoTitularP3').addEventListener('change', () => {
        if (document.getElementById('txtMismoTitularP3').value == 'Si') {
            document.getElementById('contenedorSexoEspecificoP3').classList.add('d-none')
            document.getElementById('sexoEspecificoP3').removeAttribute('required')
            document.getElementById('sexoEspecificoP3').value = ''
            document.getElementById('contenedorNivelEscolaridadEspecificoP3').classList.add('d-none')
            document.getElementById('nivelEscolaridadEspecificoP3').removeAttribute('required')
            document.getElementById('nivelEscolaridadEspecificoP3').value = ''
            document.getElementById('contenedorIdMismoTitularP3').classList.remove('d-none')
            document.getElementById('txtClaveMismoTitularP3').setAttribute('required', '')
            document.getElementById('contenedorArchivosTitularP3').classList.add('d-none')
            document.getElementById('txtTituloP3').removeAttribute('required')
            document.getElementById('txtCedulaP3').removeAttribute('required')
            document.getElementById('txtTituloP3').value = ''
            document.getElementById('txtCedulaP3').value = ''
            document.getElementById('contenedorEmpleoAnteriorEspecificoP3').classList.add('d-none')
            document.getElementById('empleoAnteriorEspecificoP3').removeAttribute('required')
            document.getElementById('empleoAnteriorEspecificoP3').value = ''
            document.getElementById('contenedorPertenenciaIndigenaEspecificoP3').classList.add('d-none')
            document.getElementById('pertenenciaIndigenaEspecificoP3').removeAttribute('required')
            document.getElementById('pertenenciaIndigenaEspecificoP3').value = ''
            document.getElementById('contenedorCondicionDiscapacidadEspecificoP3').classList.add('d-none')
            document.getElementById('condicionDiscapacidadEspecificoP3').removeAttribute('required')
            document.getElementById('condicionDiscapacidadEspecificoP3').value = ''
            document.getElementById('contenedorFormaDesignacionEspecificaP3').classList.add('d-none')
            document.getElementById('formaDesignacionEspecificaP3').removeAttribute('required')
            document.getElementById('formaDesignacionEspecificaP3').value = ''
            document.getElementById('contenedorAfiliacionPartidistaEspecificaP3').classList.add('d-none')
            document.getElementById('afiliacionPartidistaEspecificaP3').removeAttribute('required')
            document.getElementById('afiliacionPartidistaEspecificaP3').value = ''
            tituloTitular = ''
            cedulaTitular = ''
            document.getElementById('contenedorTituloP3').innerHTML = ''
            document.getElementById('contenedorCedulaP3').innerHTML = ''
            verificarContenedoresVisibles(3, 1)
        } else {
            document.getElementById('contenedorIdMismoTitularP3').classList.add('d-none')
            document.getElementById('txtClaveMismoTitularP3').removeAttribute('required')
            if (document.getElementById('txtSexoP3').value == '9') {
                document.getElementById('contenedorSexoEspecificoP3').classList.remove('d-none')
                document.getElementById('sexoEspecificoP3').setAttribute('required', '')
            }
            if (document.getElementById('txtNivEscolaridadP3').value == '9') {
                document.getElementById('contenedorNivelEscolaridadEspecificoP3').classList.remove('d-none')
                document.getElementById('nivelEscolaridadEspecificoP3').setAttribute('required', '')
                document.querySelector('#txtEstatusEscolaridadP3 option[value="4"]').removeAttribute('disabled')
            }
            if (document.getElementById('txtEstatusEscolaridadP3').value == '9') {
                document.getElementById('contenedorEstatusEstudioEspecificoP3').classList.remove('d-none')
                document.getElementById('estatusEstudioEspecificoP3').setAttribute('required', '')
                document.getElementById('contenedorArchivosTitularP3').classList.add('d-none')
                document.getElementById('txtTituloP3').removeAttribute('required')
                document.getElementById('txtCedulaP3').removeAttribute('required')
                document.getElementById('txtTituloP3').value = ''
                document.getElementById('txtCedulaP3').value = ''
                tituloTitular = ''
                cedulaTitular = ''
                document.getElementById('contenedorTituloP3').innerHTML = ''
                document.getElementById('contenedorCedulaP3').innerHTML = ''
            }
            if (
                document.getElementById('txtEstatusEscolaridadP3').value == '3' ||
                document.getElementById('txtEstatusEscolaridadP3').value == '4'
            ) {
                document.getElementById('contenedorEstatusEstudioEspecificoP3').classList.add('d-none')
                document.getElementById('estatusEstudioEspecificoP3').removeAttribute('required')
                document.getElementById('estatusEstudioEspecificoP3').value = ''
                document.getElementById('contenedorArchivosTitularP3').classList.remove('d-none')
                document.getElementById('txtTituloP3').setAttribute('required', '')
                document.getElementById('txtCedulaP3').setAttribute('required', '')
            }
            if (
                document.getElementById('txtEmpleoAnteriorP3').value == '12' ||
                document.getElementById('txtEmpleoAnteriorP3').value == '99'
            ) {
                document.getElementById('contenedorEmpleoAnteriorEspecificoP3').classList.remove('d-none')
                document.getElementById('empleoAnteriorEspecificoP3').setAttribute('required', '')
            }
            if (
                document.getElementById('txtPertenenciaIndigenaP3').value == '24' ||
                document.getElementById('txtPertenenciaIndigenaP3').value == '99'
            ) {
                document.getElementById('contenedorPertenenciaIndigenaEspecificoP3').classList.remove('d-none')
                document.getElementById('pertenenciaIndigenaEspecificoP3').setAttribute('required', '')
            }
            if (
                document.getElementById('txtCondicionDiscapacidadP3').value == '9' ||
                document.getElementById('txtCondicionDiscapacidadP3').value == '99'
            ) {
                document.getElementById('contenedorCondicionDiscapacidadEspecificoP3').classList.remove('d-none')
                document.getElementById('condicionDiscapacidadEspecificoP3').setAttribute('required', '')
            }
            if (
                document.getElementById('txtFormaDesignacionP3').value == '6' ||
                document.getElementById('txtFormaDesignacionP3').value == '9'
            ) {
                document.getElementById('contenedorFormaDesignacionEspecificaP3').classList.remove('d-none')
                document.getElementById('formaDesignacionEspecificaP3').setAttribute('required', '')
                verificarContenedoresVisibles(3, 1)
            }
            if (
                document.getElementById('txtAfiliacionPartidistaP3').value == '11' ||
                document.getElementById('txtAfiliacionPartidistaP3').value == '99'
            ) {
                document.getElementById('contenedorAfiliacionPartidistaEspecificaP3').classList.remove('d-none')
                document.getElementById('afiliacionPartidistaEspecificaP3').setAttribute('required', '')
            }
            verificarContenedoresVisibles(3, 1)
        }
    })
    document.getElementById('txtSexoP3').addEventListener('change', () => {
        if (document.getElementById('txtSexoP3').value == '8') {
            document.getElementById('formPregunta3').reset()
            document.getElementById('txtSexoP3').value = '8'
            document.getElementById('txtInstitucionP3').value = nombreInstitucion
            document.getElementById('contenedorIdMismoTitularP3').classList.add('d-none')
            document.getElementById('txtClaveMismoTitularP3').removeAttribute('required')
            document.getElementById('txtClaveMismoTitularP3').value = ''
            document.getElementById('contenedorSexoEspecificoP3').classList.add('d-none')
            document.getElementById('sexoEspecificoP3').removeAttribute('required')
            document.getElementById('sexoEspecificoP3').value = ''
            document.getElementById('contenedorNivelEscolaridadEspecificoP3').classList.add('d-none')
            document.getElementById('nivelEscolaridadEspecificoP3').removeAttribute('required')
            document.getElementById('nivelEscolaridadEspecificoP3').value = ''
            document.getElementById('contenedorEstatusEstudioEspecificoP3').classList.add('d-none')
            document.getElementById('estatusEstudioEspecificoP3').removeAttribute('required')
            document.getElementById('estatusEstudioEspecificoP3').value = ''
            document.getElementById('contenedorArchivosTitularP3').classList.add('d-none')
            document.getElementById('txtTituloP3').removeAttribute('required')
            document.getElementById('txtCedulaP3').removeAttribute('required')
            document.getElementById('txtTituloP3').value = ''
            document.getElementById('txtCedulaP3').value = ''
            document.getElementById('contenedorEmpleoAnteriorEspecificoP3').classList.add('d-none')
            document.getElementById('empleoAnteriorEspecificoP3').removeAttribute('required')
            document.getElementById('empleoAnteriorEspecificoP3').value = ''
            document.getElementById('contenedorPertenenciaIndigenaEspecificoP3').classList.add('d-none')
            document.getElementById('pertenenciaIndigenaEspecificoP3').removeAttribute('required')
            document.getElementById('pertenenciaIndigenaEspecificoP3').value = ''
            document.getElementById('contenedorCondicionDiscapacidadEspecificoP3').classList.add('d-none')
            document.getElementById('condicionDiscapacidadEspecificoP3').removeAttribute('required')
            document.getElementById('condicionDiscapacidadEspecificoP3').value = ''
            document.getElementById('contenedorFormaDesignacionEspecificaP3').classList.add('d-none')
            document.getElementById('formaDesignacionEspecificaP3').removeAttribute('required')
            document.getElementById('formaDesignacionEspecificaP3').value = ''
            document.getElementById('contenedorAfiliacionPartidistaEspecificaP3').classList.add('d-none')
            document.getElementById('afiliacionPartidistaEspecificaP3').removeAttribute('required')
            document.getElementById('afiliacionPartidistaEspecificaP3').value = ''
            tituloTitular = ''
            cedulaTitular = ''
            document.getElementById('contenedorTituloP3').innerHTML = ''
            document.getElementById('contenedorCedulaP3').innerHTML = ''
            displayVisibles('none', 3, 1, 'vacanteTitular')
            verificarContenedoresVisibles(3, 1)
        } else if (document.getElementById('txtSexoP3').value == '9') {
            document.getElementById('contenedorSexoEspecificoP3').classList.remove('d-none')
            document.getElementById('sexoEspecificoP3').setAttribute('required', '')
            displayVisibles('block', 3, 1, 'vacanteTitular')
            verificarContenedoresVisibles(3, 1)
        } else {
            document.getElementById('contenedorSexoEspecificoP3').classList.add('d-none')
            document.getElementById('sexoEspecificoP3').removeAttribute('required')
            document.getElementById('sexoEspecificoP3').value = ''
            displayVisibles('block', 3, 1, 'vacanteTitular')
            verificarContenedoresVisibles(3, 1)
        }
    })
    document.getElementById('txtNivEscolaridadP3').addEventListener('change', () => {
        if (document.getElementById('txtNivEscolaridadP3').value == '9') {
            document.getElementById('contenedorNivelEscolaridadEspecificoP3').classList.remove('d-none')
            document.getElementById('nivelEscolaridadEspecificoP3').setAttribute('required', '')
            document.querySelector('#txtEstatusEscolaridadP3 option[value="4"]').removeAttribute('disabled')
            verificarContenedoresVisibles(3, 1)
        } else {
            document.getElementById('contenedorNivelEscolaridadEspecificoP3').classList.add('d-none')
            document.getElementById('nivelEscolaridadEspecificoP3').removeAttribute('required')
            document.getElementById('nivelEscolaridadEspecificoP3').value = ''
            if (document.getElementById('txtNivEscolaridadP3').value == '1') {
                if (document.getElementById('txtEstatusEscolaridadP3').value == '4') {
                    vaciarContenedoresArchivos()
                }
                if (document.getElementById('txtEstatusEscolaridadP3').value == '9') {
                    document.getElementById('contenedorEstatusEstudioEspecificoP3').classList.add('d-none')
                    document.getElementById('estatusEstudioEspecificoP3').removeAttribute('required')
                    document.getElementById('estatusEstudioEspecificoP3').value = ''
                }
                document.querySelector('#txtEstatusEscolaridadP3 option[value="4"]').removeAttribute('disabled')
                document.getElementById('txtEstatusEscolaridadP3').value = '8'
            } else if (
                document.getElementById('txtNivEscolaridadP3').value == '2' ||
                document.getElementById('txtNivEscolaridadP3').value == '3' ||
                document.getElementById('txtNivEscolaridadP3').value == '4'
            ) {
                document.querySelector('#txtEstatusEscolaridadP3 option[value="4"]').setAttribute('disabled', '')
                if (document.getElementById('txtEstatusEscolaridadP3').value == '4') {
                    document.getElementById('txtEstatusEscolaridadP3').value = ''
                    vaciarContenedoresArchivos()
                }
            } else {
                document.querySelector('#txtEstatusEscolaridadP3 option[value="4"]').removeAttribute('disabled')
            }
            verificarContenedoresVisibles(3, 1)
        }
    })
    document.getElementById('txtEstatusEscolaridadP3').addEventListener('change', () => {
        if (document.getElementById('txtEstatusEscolaridadP3').value != '8') {
            if (document.getElementById('txtNivEscolaridadP3').value == '1') {
                document.getElementById('txtNivEscolaridadP3').value = ''
            }
        }
        if (document.getElementById('txtEstatusEscolaridadP3').value == '9') {
            document.getElementById('contenedorEstatusEstudioEspecificoP3').classList.remove('d-none')
            document.getElementById('estatusEstudioEspecificoP3').setAttribute('required', '')
            document.getElementById('contenedorArchivosTitularP3').classList.add('d-none')
            document.getElementById('txtTituloP3').removeAttribute('required')
            document.getElementById('txtCedulaP3').removeAttribute('required')
            document.getElementById('txtTituloP3').value = ''
            document.getElementById('txtCedulaP3').value = ''
            tituloTitular = ''
            cedulaTitular = ''
            document.getElementById('contenedorTituloP3').innerHTML = ''
            document.getElementById('contenedorCedulaP3').innerHTML = ''
            verificarContenedoresVisibles(3, 1)
        } else if (
            document.getElementById('txtEstatusEscolaridadP3').value == '3' ||
            document.getElementById('txtEstatusEscolaridadP3').value == '4'
        ) {
            document.getElementById('contenedorEstatusEstudioEspecificoP3').classList.add('d-none')
            document.getElementById('estatusEstudioEspecificoP3').removeAttribute('required')
            document.getElementById('estatusEstudioEspecificoP3').value = ''
            document.getElementById('contenedorArchivosTitularP3').classList.remove('d-none')
            document.getElementById('txtTituloP3').setAttribute('required', '')
            document.getElementById('txtCedulaP3').setAttribute('required', '')
            verificarContenedoresVisibles(3, 1)
        } else {
            document.getElementById('contenedorEstatusEstudioEspecificoP3').classList.add('d-none')
            document.getElementById('estatusEstudioEspecificoP3').removeAttribute('required')
            document.getElementById('estatusEstudioEspecificoP3').value = ''
            document.getElementById('contenedorArchivosTitularP3').classList.add('d-none')
            document.getElementById('txtTituloP3').removeAttribute('required')
            document.getElementById('txtCedulaP3').removeAttribute('required')
            document.getElementById('txtTituloP3').value = ''
            document.getElementById('txtCedulaP3').value = ''
            tituloTitular = ''
            cedulaTitular = ''
            document.getElementById('contenedorTituloP3').innerHTML = ''
            document.getElementById('contenedorCedulaP3').innerHTML = ''
            verificarContenedoresVisibles(3, 1)
        }
    })
    document.getElementById('txtEmpleoAnteriorP3').addEventListener('change', () => {
        if (
            document.getElementById('txtEmpleoAnteriorP3').value == '12' ||
            document.getElementById('txtEmpleoAnteriorP3').value == '99'
        ) {
            document.getElementById('contenedorEmpleoAnteriorEspecificoP3').classList.remove('d-none')
            document.getElementById('empleoAnteriorEspecificoP3').setAttribute('required', '')
            verificarContenedoresVisibles(3, 1)
        } else {
            document.getElementById('contenedorEmpleoAnteriorEspecificoP3').classList.add('d-none')
            document.getElementById('empleoAnteriorEspecificoP3').removeAttribute('required')
            document.getElementById('empleoAnteriorEspecificoP3').value = ''
            verificarContenedoresVisibles(3, 1)
        }
    })
    document.getElementById('txtPertenenciaIndigenaP3').addEventListener('change', () => {
        if (
            document.getElementById('txtPertenenciaIndigenaP3').value == '24' ||
            document.getElementById('txtPertenenciaIndigenaP3').value == '99'
        ) {
            document.getElementById('contenedorPertenenciaIndigenaEspecificoP3').classList.remove('d-none')
            document.getElementById('pertenenciaIndigenaEspecificoP3').setAttribute('required', '')
            verificarContenedoresVisibles(3, 1)
        } else {
            document.getElementById('contenedorPertenenciaIndigenaEspecificoP3').classList.add('d-none')
            document.getElementById('pertenenciaIndigenaEspecificoP3').removeAttribute('required')
            document.getElementById('pertenenciaIndigenaEspecificoP3').value = ''
            verificarContenedoresVisibles(3, 1)
        }
    })
    document.getElementById('txtCondicionDiscapacidadP3').addEventListener('change', () => {
        if (
            document.getElementById('txtCondicionDiscapacidadP3').value == '9' ||
            document.getElementById('txtCondicionDiscapacidadP3').value == '99'
        ) {
            document.getElementById('contenedorCondicionDiscapacidadEspecificoP3').classList.remove('d-none')
            document.getElementById('condicionDiscapacidadEspecificoP3').setAttribute('required', '')
            verificarContenedoresVisibles(3, 1)
        } else {
            document.getElementById('contenedorCondicionDiscapacidadEspecificoP3').classList.add('d-none')
            document.getElementById('condicionDiscapacidadEspecificoP3').removeAttribute('required')
            document.getElementById('condicionDiscapacidadEspecificoP3').value = ''
            verificarContenedoresVisibles(3, 1)
        }
    })
    document.getElementById('txtFormaDesignacionP3').addEventListener('change', () => {
        if (idInstitucion == 0) {
            document.getElementById('txtFormaDesignacionP3').value = '1'
        } else {
            if (
                document.getElementById('txtFormaDesignacionP3').value == '6' ||
                document.getElementById('txtFormaDesignacionP3').value == '9'
            ) {
                document.getElementById('contenedorFormaDesignacionEspecificaP3').classList.remove('d-none')
                document.getElementById('formaDesignacionEspecificaP3').setAttribute('required', '')
                verificarContenedoresVisibles(3, 1)
            } else {
                document.getElementById('contenedorFormaDesignacionEspecificaP3').classList.add('d-none')
                document.getElementById('formaDesignacionEspecificaP3').removeAttribute('required')
                document.getElementById('formaDesignacionEspecificaP3').value = ''
                verificarContenedoresVisibles(3, 1)
            }
        }
    })
    document.getElementById('txtAfiliacionPartidistaP3').addEventListener('change', () => {
        if (
            document.getElementById('txtAfiliacionPartidistaP3').value == '11' ||
            document.getElementById('txtAfiliacionPartidistaP3').value == '99'
        ) {
            document.getElementById('contenedorAfiliacionPartidistaEspecificaP3').classList.remove('d-none')
            document.getElementById('afiliacionPartidistaEspecificaP3').setAttribute('required', '')
            verificarContenedoresVisibles(3, 1)
        } else {
            document.getElementById('contenedorAfiliacionPartidistaEspecificaP3').classList.add('d-none')
            document.getElementById('afiliacionPartidistaEspecificaP3').removeAttribute('required')
            document.getElementById('afiliacionPartidistaEspecificaP3').value = ''
            verificarContenedoresVisibles(3, 1)
        }
    })
    document.getElementById('txtTituloP3').addEventListener('change', function (e) {
        if (e.target.files[0] != undefined) {
            if (e.target.files[0].size <= 2097152) {
                if (e.target.files[0].type == 'application/pdf' || e.target.files[0].type.split('/')[0] == 'image') {
                    reader = new FileReader()
                    reader.readAsDataURL(e.target.files[0])
                    reader.onload = () => {
                        let contenedorTitulo = document.getElementById('contenedorTituloP3')
                        let pdf = document.createElement('object')
                        pdf.data = reader.result
                        tituloTitular = reader.result
                        pdf.type = e.target.files[0].type // application/pdf o image/jpeg por ejemplo
                        pdf.style = 'height: 35vh; width: 70vh;'
                        contenedorTitulo.innerHTML = ''
                        contenedorTitulo.append(pdf)
                    }
                } else {
                    document.getElementById('contenedorTituloP3').innerHTML = ''
                    document.getElementById('txtTituloP3').value = ''
                    alertify.error('El archivo solo puede ser un PDF o una imagen')
                }
            } else {
                document.getElementById('contenedorTituloP3').innerHTML = ''
                document.getElementById('txtTituloP3').value = ''
                alertify.error('El archivo sobrepasa el límite de tamaño (2MB)')
            }
        } else {
            document.getElementById('contenedorTituloP3').innerHTML = ''
        }
    })
    document.getElementById('txtCedulaP3').addEventListener('change', function (e) {
        if (e.target.files[0] != undefined) {
            if (e.target.files[0].size <= 2097152) {
                if (e.target.files[0].type == 'application/pdf' || e.target.files[0].type.split('/')[0] == 'image') {
                    reader = new FileReader()
                    reader.readAsDataURL(e.target.files[0])
                    reader.onload = () => {
                        let contenedorCedula = document.getElementById('contenedorCedulaP3')
                        let pdf = document.createElement('object')
                        pdf.data = reader.result
                        cedulaTitular = reader.result
                        pdf.type = e.target.files[0].type // application/pdf o image/jpeg por ejemplo
                        pdf.style = 'height: 35vh; width: 70vh;'
                        contenedorCedula.innerHTML = ''
                        contenedorCedula.append(pdf)
                    }
                } else {
                    document.getElementById('contenedorCedulaP3').innerHTML = ''
                    document.getElementById('txtCedulaP3').value = ''
                    alertify.error('El archivo solo puede ser un PDF o una imagen')
                }
            } else {
                document.getElementById('contenedorCedulaP3').innerHTML = ''
                document.getElementById('txtCedulaP3').value = ''
                alertify.error('El archivo sobrepasa el límite de tamaño (2MB)')
            }
        } else {
            document.getElementById('contenedorCedulaP3').innerHTML = ''
        }
    })

    // PREGUNTA 4
    document.querySelector('#questionList a[href="#pregunta4s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        document.getElementById('txtInstitucionP4').value = nombreInstitucion
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
    })
    document.getElementById('txtTotalHombresP4').addEventListener('input', () => {
        document.getElementById('txtTotalPersonalP4').value =
            (!isNaN(parseInt(document.getElementById('txtTotalHombresP4').value)) ? parseInt(document.getElementById('txtTotalHombresP4').value) : 0) +
            (!isNaN(parseInt(document.getElementById('txtTotalMujeresP4').value)) ? parseInt(document.getElementById('txtTotalMujeresP4').value) : 0)
    })
    document.getElementById('txtTotalMujeresP4').addEventListener('input', () => {
        document.getElementById('txtTotalPersonalP4').value =
            (!isNaN(parseInt(document.getElementById('txtTotalHombresP4').value)) ? parseInt(document.getElementById('txtTotalHombresP4').value) : 0) +
            (!isNaN(parseInt(document.getElementById('txtTotalMujeresP4').value)) ? parseInt(document.getElementById('txtTotalMujeresP4').value) : 0)
    })

    // PREGUNTA 5
    document.querySelector('#questionList a[href="#pregunta5s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionP5').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar la pregunta 4')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    elementosTotalesHombresP5 = [
        'txtTotalHombresConfianzaP5',
        'txtTotalHombresBaseP5',
        'txtTotalHombresEventualP5',
        'txtTotalHombresHonorariosP5',
        'txtTotalHombresOtroP5'
    ]
    elementosTotalesMujeresP5 = [
        'txtTotalMujeresConfianzaP5',
        'txtTotalMujeresBaseP5',
        'txtTotalMujeresEventualP5',
        'txtTotalMujeresHonorariosP5',
        'txtTotalMujeresOtroP5'
    ]
    escuchadoresParaSumaDeTotales('hombres', 'txtTotalPersonalP5', 'txtTotalHombresP5', elementosTotalesHombresP5, 5, 1)
    escuchadoresParaSumaDeTotales('mujeres', 'txtTotalPersonalP5', 'txtTotalMujeresP5', elementosTotalesMujeresP5, 5, 1)
    document.getElementById('txtTotalHombresOtroP5').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtroP5').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtroP5').value) > 0
        ) {
            document.getElementById('contenedorotroEspecificoP5').classList.remove('d-none')
            document.getElementById('otroEspecificoP5').setAttribute('required', '')
        } else {
            document.getElementById('contenedorotroEspecificoP5').classList.add('d-none')
            document.getElementById('otroEspecificoP5').removeAttribute('required')
            document.getElementById('otroEspecificoP5').value = ''
        }
    })
    document.getElementById('txtTotalMujeresOtroP5').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalMujeresOtroP5').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresOtroP5').value) > 0
        ) {
            document.getElementById('contenedorotroEspecificoP5').classList.remove('d-none')
            document.getElementById('otroEspecificoP5').setAttribute('required', '')
        } else {
            document.getElementById('contenedorotroEspecificoP5').classList.add('d-none')
            document.getElementById('otroEspecificoP5').removeAttribute('required')
            document.getElementById('otroEspecificoP5').value = ''
        }
    })

    // PREGUNTA 6
    document.querySelector('#questionList a[href="#pregunta6s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionP6').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar la pregunta 4')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    elementosTotalesHombresP6 = [
        'txtTotalHombresISSSTEP6',
        'txtTotalHombresISSEFHP6',
        'txtTotalHombresIMSSP6',
        'txtTotalHombresOtraP6',
        'txtTotalHombresSinSeguridadP6'
    ]
    elementosTotalesMujeresP6 = [
        'txtTotalMujeresISSSTEP6',
        'txtTotalMujeresISSEFHP6',
        'txtTotalMujeresIMSSP6',
        'txtTotalMujeresOtraP6',
        'txtTotalMujeresSinSeguridadP6'
    ]
    escuchadoresParaSumaDeTotales('hombres', 'txtTotalPersonalP6', 'txtTotalHombresP6', elementosTotalesHombresP6, 6, 1)
    escuchadoresParaSumaDeTotales('mujeres', 'txtTotalPersonalP6', 'txtTotalMujeresP6', elementosTotalesMujeresP6, 6, 1)
    document.getElementById('txtTotalHombresOtraP6').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtraP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtraP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresSinSeguridadP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresSinSeguridadP6').value) > 0
        ) {
            document.getElementById('contenedorOtroYsinSeguridadEspecificoP6').classList.remove('d-none')
            document.getElementById('otroYsinSeguridadEspecificoP6').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroYsinSeguridadEspecificoP6').classList.add('d-none')
            document.getElementById('otroYsinSeguridadEspecificoP6').removeAttribute('required')
            document.getElementById('otroYsinSeguridadEspecificoP6').value = ''
        }
    })
    document.getElementById('txtTotalMujeresOtraP6').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtraP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtraP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresSinSeguridadP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresSinSeguridadP6').value) > 0
        ) {
            document.getElementById('contenedorOtroYsinSeguridadEspecificoP6').classList.remove('d-none')
            document.getElementById('otroYsinSeguridadEspecificoP6').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroYsinSeguridadEspecificoP6').classList.add('d-none')
            document.getElementById('otroYsinSeguridadEspecificoP6').removeAttribute('required')
            document.getElementById('otroYsinSeguridadEspecificoP6').value = ''
        }
    })
    document.getElementById('txtTotalHombresSinSeguridadP6').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtraP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtraP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresSinSeguridadP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresSinSeguridadP6').value) > 0
        ) {
            document.getElementById('contenedorOtroYsinSeguridadEspecificoP6').classList.remove('d-none')
            document.getElementById('otroYsinSeguridadEspecificoP6').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroYsinSeguridadEspecificoP6').classList.add('d-none')
            document.getElementById('otroYsinSeguridadEspecificoP6').removeAttribute('required')
            document.getElementById('otroYsinSeguridadEspecificoP6').value = ''
        }
    })
    document.getElementById('txtTotalMujeresSinSeguridadP6').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtraP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtraP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresSinSeguridadP6').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresSinSeguridadP6').value) > 0
        ) {
            document.getElementById('contenedorOtroYsinSeguridadEspecificoP6').classList.remove('d-none')
            document.getElementById('otroYsinSeguridadEspecificoP6').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroYsinSeguridadEspecificoP6').classList.add('d-none')
            document.getElementById('otroYsinSeguridadEspecificoP6').removeAttribute('required')
            document.getElementById('otroYsinSeguridadEspecificoP6').value = ''
        }
    })

    // PREGUNTA 7
    document.querySelector('#questionList a[href="#pregunta7s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionP7').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar la pregunta 4')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    elementosTotalesHombresP7 = [
        'txtTotalHombres18a24P7',
        'txtTotalHombres25a29P7',
        'txtTotalHombres30a34P7',
        'txtTotalHombres35a39P7',
        'txtTotalHombres40a44P7',
        'txtTotalHombres45a49P7',
        'txtTotalHombres50a54P7',
        'txtTotalHombres55a59P7',
        'txtTotalHombres60yMasP7'
    ]
    elementosTotalesMujeresP7 = [
        'txtTotalMujeres18a24P7',
        'txtTotalMujeres25a29P7',
        'txtTotalMujeres30a34P7',
        'txtTotalMujeres35a39P7',
        'txtTotalMujeres40a44P7',
        'txtTotalMujeres45a49P7',
        'txtTotalMujeres50a54P7',
        'txtTotalMujeres55a59P7',
        'txtTotalMujeres60yMasP7'
    ]
    escuchadoresParaSumaDeTotales('hombres', 'txtTotalPersonalP7', 'txtTotalHombresP7', elementosTotalesHombresP7, 7, 1)
    escuchadoresParaSumaDeTotales('mujeres', 'txtTotalPersonalP7', 'txtTotalMujeresP7', elementosTotalesMujeresP7, 7, 1)

    // PREGUNTA 8
    document.querySelector('#questionList a[href="#pregunta8s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionP8').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar la pregunta 4')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    elementosTotalesHombresP8 = [
        'txtTotalHombresSinPagaP8',
        'txtTotalHombres1a5000P8',
        'txtTotalHombres5001a10000P8',
        'txtTotalHombres10001a15000P8',
        'txtTotalHombres15001a20000P8',
        'txtTotalHombres20001a25000P8',
        'txtTotalHombres25001a30000P8',
        'txtTotalHombres30001a35000P8',
        'txtTotalHombres35001a40000P8',
        'txtTotalHombres40001a45000P8',
        'txtTotalHombres45001a50000P8',
        'txtTotalHombres50001a55000P8',
        'txtTotalHombres55001a60000P8',
        'txtTotalHombres60001a65000P8',
        'txtTotalHombres65001a70000P8',
        'txtTotalHombresMasDe70000P8'
    ]
    elementosTotalesMujeresP8 = [
        'txtTotalMujeresSinPagaP8',
        'txtTotalMujeres1a5000P8',
        'txtTotalMujeres5001a10000P8',
        'txtTotalMujeres10001a15000P8',
        'txtTotalMujeres15001a20000P8',
        'txtTotalMujeres20001a25000P8',
        'txtTotalMujeres25001a30000P8',
        'txtTotalMujeres30001a35000P8',
        'txtTotalMujeres35001a40000P8',
        'txtTotalMujeres40001a45000P8',
        'txtTotalMujeres45001a50000P8',
        'txtTotalMujeres50001a55000P8',
        'txtTotalMujeres55001a60000P8',
        'txtTotalMujeres60001a65000P8',
        'txtTotalMujeres65001a70000P8',
        'txtTotalMujeresMasDe70000P8'
    ]
    escuchadoresParaSumaDeTotales('hombres', 'txtTotalPersonalP8', 'txtTotalHombresP8', elementosTotalesHombresP8, 8, 1)
    escuchadoresParaSumaDeTotales('mujeres', 'txtTotalPersonalP8', 'txtTotalMujeresP8', elementosTotalesMujeresP8, 8, 1)
    document.getElementById('txtTotalHombresSinPagaP8').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresSinPagaP8').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresSinPagaP8').value) > 0
        ) {
            document.getElementById('contenedorSinPagaEspecificoP8').classList.remove('d-none')
            document.getElementById('sinPagaEspecificoP8').setAttribute('required', '')
        } else {
            document.getElementById('contenedorSinPagaEspecificoP8').classList.add('d-none')
            document.getElementById('sinPagaEspecificoP8').removeAttribute('required')
            document.getElementById('sinPagaEspecificoP8').value = ''
        }
    })
    document.getElementById('txtTotalMujeresSinPagaP8').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresSinPagaP8').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresSinPagaP8').value) > 0
        ) {
            document.getElementById('contenedorSinPagaEspecificoP8').classList.remove('d-none')
            document.getElementById('sinPagaEspecificoP8').setAttribute('required', '')
        } else {
            document.getElementById('contenedorSinPagaEspecificoP8').classList.add('d-none')
            document.getElementById('sinPagaEspecificoP8').removeAttribute('required')
            document.getElementById('sinPagaEspecificoP8').value = ''
        }
    })

    // PREGUNTA 9
    document.querySelector('#questionList a[href="#pregunta9s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionP9').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar la pregunta 4')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    elementosTotalesHombresP9 = [
        'txtTotalHombresNingunoP9',
        'txtTotalHombresPresPriP9',
        'txtTotalHombresSecuP9',
        'txtTotalHombresPrepaP9',
        'txtTotalHombresTecnicaP9',
        'txtTotalHombresLicenciaturaP9',
        'txtTotalHombresMaestriaP9',
        'txtTotalHombresDoctoradoP9'
    ]
    elementosTotalesMujeresP9 = [
        'txtTotalMujeresNingunoP9',
        'txtTotalMujeresPresPriP9',
        'txtTotalMujeresSecuP9',
        'txtTotalMujeresPrepaP9',
        'txtTotalMujeresTecnicaP9',
        'txtTotalMujeresLicenciaturaP9',
        'txtTotalMujeresMaestriaP9',
        'txtTotalMujeresDoctoradoP9'
    ]
    escuchadoresParaSumaDeTotales('hombres', 'txtTotalPersonalP9', 'txtTotalHombresP9', elementosTotalesHombresP9, 9, 1)
    escuchadoresParaSumaDeTotales('mujeres', 'txtTotalPersonalP9', 'txtTotalMujeresP9', elementosTotalesMujeresP9, 9, 1)
    document.getElementById('txtTotalHombresNingunoP9').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresNingunoP9').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNingunoP9').value) > 0
        ) {
            document.getElementById('contenedorNingunoEspecificoP9').classList.remove('d-none')
            document.getElementById('ningunoEspecificoP9').setAttribute('required', '')
        } else {
            document.getElementById('contenedorNingunoEspecificoP9').classList.add('d-none')
            document.getElementById('ningunoEspecificoP9').removeAttribute('required')
            document.getElementById('ningunoEspecificoP9').value = ''
        }
    })
    document.getElementById('txtTotalMujeresNingunoP9').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresNingunoP9').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNingunoP9').value) > 0
        ) {
            document.getElementById('contenedorNingunoEspecificoP9').classList.remove('d-none')
            document.getElementById('ningunoEspecificoP9').setAttribute('required', '')
        } else {
            document.getElementById('contenedorNingunoEspecificoP9').classList.add('d-none')
            document.getElementById('ningunoEspecificoP9').removeAttribute('required')
            document.getElementById('ningunoEspecificoP9').value = ''
        }
    })

    // PREGUNTA 10
    document.querySelector('#questionList a[href="#pregunta10s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionP10').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar la pregunta 4')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    elementosTotalesHombresP10 = [
        'txtTotalHombresPertenecenP10',
        'txtTotalHombresNoPertenecenP10',
        'txtTotalHombresNoIdentificadoP10'
    ]
    elementosTotalesMujeresP10 = [
        'txtTotalMujeresPertenecenP10',
        'txtTotalMujeresNoPertenecenP10',
        'txtTotalMujeresNoIdentificadoP10'
    ]
    escuchadoresParaSumaDeTotales('hombres', 'txtTotalPersonalP10', 'txtTotalHombresP10', elementosTotalesHombresP10, 10, 1)
    escuchadoresParaSumaDeTotales('mujeres', 'txtTotalPersonalP10', 'txtTotalMujeresP10', elementosTotalesMujeresP10, 10, 1)
    document.getElementById('txtTotalHombresNoIdentificadoP10').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP10').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP10').value) > 0
        ) {
            document.getElementById('contenedorNoIdentificadoEspecificoP10').classList.remove('d-none')
            document.getElementById('noIdentificadoEspecificoP10').setAttribute('required', '')
        } else {
            document.getElementById('contenedorNoIdentificadoEspecificoP10').classList.add('d-none')
            document.getElementById('noIdentificadoEspecificoP10').removeAttribute('required')
            document.getElementById('noIdentificadoEspecificoP10').value = ''
        }
    })
    document.getElementById('txtTotalMujeresNoIdentificadoP10').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP10').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP10').value) > 0
        ) {
            document.getElementById('contenedorNoIdentificadoEspecificoP10').classList.remove('d-none')
            document.getElementById('noIdentificadoEspecificoP10').setAttribute('required', '')
        } else {
            document.getElementById('contenedorNoIdentificadoEspecificoP10').classList.add('d-none')
            document.getElementById('noIdentificadoEspecificoP10').removeAttribute('required')
            document.getElementById('noIdentificadoEspecificoP10').value = ''
        }
    })

    // PREGUNTA 11
    document.querySelector('#questionList a[href="#pregunta11s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1'] && preguntasContestadas['itemPregunta10s1']) {
            document.getElementById('txtInstitucionP11').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar las preguntas 4 y 10')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    elementosTotalesHombresP11 = [
        'txtTotalHombresChinantecoP11',
        'txtTotalHombresCholP11',
        'txtTotalHombresCoraP11',
        'txtTotalHombresHuastecoP11',
        'txtTotalHombresHuicholP11',
        'txtTotalHombresMayaP11',
        'txtTotalHombresMayoP11',
        'txtTotalHombresMazahuaP11',
        'txtTotalHombresMazatecoP11',
        'txtTotalHombresMixeP11',
        'txtTotalHombresMixtecoP11',
        'txtTotalHombresNahuatlP11',
        'txtTotalHombresOtomiP11',
        'txtTotalHombresTarascoPurepechaP11',
        'txtTotalHombresTarahumaraP11',
        'txtTotalHombresTepehuanoP11',
        'txtTotalHombresTlapanecoP11',
        'txtTotalHombresTotonacoP11',
        'txtTotalHombresTseltalP11',
        'txtTotalHombresTsotsilP11',
        'txtTotalHombresYaquiP11',
        'txtTotalHombresZapotecoP11',
        'txtTotalHombresZoqueP11',
        'txtTotalHombresOtroP11',
        'txtTotalHombresNoIdentificadoP11'
    ]
    elementosTotalesMujeresP11 = [
        'txtTotalMujeresChinantecoP11',
        'txtTotalMujeresCholP11',
        'txtTotalMujeresCoraP11',
        'txtTotalMujeresHuastecoP11',
        'txtTotalMujeresHuicholP11',
        'txtTotalMujeresMayaP11',
        'txtTotalMujeresMayoP11',
        'txtTotalMujeresMazahuaP11',
        'txtTotalMujeresMazatecoP11',
        'txtTotalMujeresMixeP11',
        'txtTotalMujeresMixtecoP11',
        'txtTotalMujeresNahuatlP11',
        'txtTotalMujeresOtomiP11',
        'txtTotalMujeresTarascoPurepechaP11',
        'txtTotalMujeresTarahumaraP11',
        'txtTotalMujeresTepehuanoP11',
        'txtTotalMujeresTlapanecoP11',
        'txtTotalMujeresTotonacoP11',
        'txtTotalMujeresTseltalP11',
        'txtTotalMujeresTsotsilP11',
        'txtTotalMujeresYaquiP11',
        'txtTotalMujeresZapotecoP11',
        'txtTotalMujeresZoqueP11',
        'txtTotalMujeresOtroP11',
        'txtTotalMujeresNoIdentificadoP11'
    ]
    escuchadoresParaSumaDeTotales('hombres', 'txtTotalPersonalP11', 'txtTotalHombresP11', elementosTotalesHombresP11, 11, 1)
    escuchadoresParaSumaDeTotales('mujeres', 'txtTotalPersonalP11', 'txtTotalMujeresP11', elementosTotalesMujeresP11, 11, 1)
    document.getElementById('txtTotalHombresOtroP11').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtroP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtroP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP11').value) > 0
        ) {
            document.getElementById('contenedorOtroNoIdentificadoEspecificoP11').classList.remove('d-none')
            document.getElementById('otroNoIdentificadoEspecificoP11').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroNoIdentificadoEspecificoP11').classList.add('d-none')
            document.getElementById('otroNoIdentificadoEspecificoP11').removeAttribute('required')
            document.getElementById('otroNoIdentificadoEspecificoP11').value = ''
        }
    })
    document.getElementById('txtTotalMujeresOtroP11').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtroP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtroP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP11').value) > 0
        ) {
            document.getElementById('contenedorOtroNoIdentificadoEspecificoP11').classList.remove('d-none')
            document.getElementById('otroNoIdentificadoEspecificoP11').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroNoIdentificadoEspecificoP11').classList.add('d-none')
            document.getElementById('otroNoIdentificadoEspecificoP11').removeAttribute('required')
            document.getElementById('otroNoIdentificadoEspecificoP11').value = ''
        }
    })
    document.getElementById('txtTotalHombresNoIdentificadoP11').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtroP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtroP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP11').value) > 0
        ) {
            document.getElementById('contenedorOtroNoIdentificadoEspecificoP11').classList.remove('d-none')
            document.getElementById('otroNoIdentificadoEspecificoP11').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroNoIdentificadoEspecificoP11').classList.add('d-none')
            document.getElementById('otroNoIdentificadoEspecificoP11').removeAttribute('required')
            document.getElementById('otroNoIdentificadoEspecificoP11').value = ''
        }
    })
    document.getElementById('txtTotalMujeresNoIdentificadoP11').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtroP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtroP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP11').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP11').value) > 0
        ) {
            document.getElementById('contenedorOtroNoIdentificadoEspecificoP11').classList.remove('d-none')
            document.getElementById('otroNoIdentificadoEspecificoP11').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroNoIdentificadoEspecificoP11').classList.add('d-none')
            document.getElementById('otroNoIdentificadoEspecificoP11').removeAttribute('required')
            document.getElementById('otroNoIdentificadoEspecificoP11').value = ''
        }
    })

    // PREGUNTA 12
    document.querySelector('#questionList a[href="#pregunta12s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionP12').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar la pregunta 4')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    elementosTotalesHombresP12 = [
        'txtTotalHombresConDiscapacidadP12',
        'txtTotalHombresSinDiscapacidadP12',
        'txtTotalHombresNoIdentificadoP12'
    ]
    elementosTotalesMujeresP12 = [
        'txtTotalMujeresConDiscapacidadP12',
        'txtTotalMujeresSinDiscapacidadP12',
        'txtTotalMujeresNoIdentificadoP12'
    ]
    escuchadoresParaSumaDeTotales('hombres', 'txtTotalPersonalP12', 'txtTotalHombresP12', elementosTotalesHombresP12, 12, 1)
    escuchadoresParaSumaDeTotales('mujeres', 'txtTotalPersonalP12', 'txtTotalMujeresP12', elementosTotalesMujeresP12, 12, 1)
    document.getElementById('txtTotalHombresNoIdentificadoP12').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP12').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP12').value) > 0
        ) {
            document.getElementById('contenedorNoIdentificadoEspecificoP12').classList.remove('d-none')
            document.getElementById('noIdentificadoEspecificoP12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorNoIdentificadoEspecificoP12').classList.add('d-none')
            document.getElementById('noIdentificadoEspecificoP12').removeAttribute('required')
            document.getElementById('noIdentificadoEspecificoP12').value = ''
        }
    })
    document.getElementById('txtTotalMujeresNoIdentificadoP12').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP12').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP12').value) > 0
        ) {
            document.getElementById('contenedorNoIdentificadoEspecificoP12').classList.remove('d-none')
            document.getElementById('noIdentificadoEspecificoP12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorNoIdentificadoEspecificoP12').classList.add('d-none')
            document.getElementById('noIdentificadoEspecificoP12').removeAttribute('required')
            document.getElementById('noIdentificadoEspecificoP12').value = ''
        }
    })

    // PREGUNTA 13
    document.querySelector('#questionList a[href="#pregunta13s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1'] && preguntasContestadas['itemPregunta12s1']) {
            document.getElementById('txtInstitucionP13').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar las preguntas 4 y 12')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    elementosTotalesHombresP13 = [
        'txtTotalHombresCaminarP13',
        'txtTotalHombresVerP13',
        'txtTotalHombresBrazosP13',
        'txtTotalHombresAprenderP13',
        'txtTotalHombresOirP13',
        'txtTotalHombresHablarP13',
        'txtTotalHombresBaniarseP13',
        'txtTotalHombresDepresionP13',
        'txtTotalHombresOtroP13',
        'txtTotalHombresNoIdentificadoP13'
    ]
    elementosTotalesMujeresP13 = [
        'txtTotalMujeresCaminarP13',
        'txtTotalMujeresVerP13',
        'txtTotalMujeresBrazosP13',
        'txtTotalMujeresAprenderP13',
        'txtTotalMujeresOirP13',
        'txtTotalMujeresHablarP13',
        'txtTotalMujeresBaniarseP13',
        'txtTotalMujeresDepresionP13',
        'txtTotalMujeresOtroP13',
        'txtTotalMujeresNoIdentificadoP13'
    ]
    escuchadoresParaSumaDeTotales('hombres', 'txtTotalPersonalP13', 'txtTotalHombresP13', elementosTotalesHombresP13, 13, 1)
    escuchadoresParaSumaDeTotales('mujeres', 'txtTotalPersonalP13', 'txtTotalMujeresP13', elementosTotalesMujeresP13, 13, 1)
    document.getElementById('txtTotalHombresOtroP13').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtroP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtroP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP13').value) > 0
        ) {
            document.getElementById('contenedorOtroYnoIdentificadoEspecificoP13').classList.remove('d-none')
            document.getElementById('otroYnoIdentificadoEspecificoP13').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroYnoIdentificadoEspecificoP13').classList.add('d-none')
            document.getElementById('otroYnoIdentificadoEspecificoP13').removeAttribute('required')
            document.getElementById('otroYnoIdentificadoEspecificoP13').value = ''
        }
    })
    document.getElementById('txtTotalMujeresOtroP13').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtroP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtroP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP13').value) > 0
        ) {
            document.getElementById('contenedorOtroYnoIdentificadoEspecificoP13').classList.remove('d-none')
            document.getElementById('otroYnoIdentificadoEspecificoP13').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroYnoIdentificadoEspecificoP13').classList.add('d-none')
            document.getElementById('otroYnoIdentificadoEspecificoP13').removeAttribute('required')
            document.getElementById('otroYnoIdentificadoEspecificoP13').value = ''
        }
    })
    document.getElementById('txtTotalHombresNoIdentificadoP13').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtroP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtroP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP13').value) > 0
        ) {
            document.getElementById('contenedorOtroYnoIdentificadoEspecificoP13').classList.remove('d-none')
            document.getElementById('otroYnoIdentificadoEspecificoP13').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroYnoIdentificadoEspecificoP13').classList.add('d-none')
            document.getElementById('otroYnoIdentificadoEspecificoP13').removeAttribute('required')
            document.getElementById('otroYnoIdentificadoEspecificoP13').value = ''
        }
    })
    document.getElementById('txtTotalMujeresNoIdentificadoP13').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotalHombresOtroP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresOtroP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalHombresNoIdentificadoP13').value) > 0 ||
            parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP13').value) > 0
        ) {
            document.getElementById('contenedorOtroYnoIdentificadoEspecificoP13').classList.remove('d-none')
            document.getElementById('otroYnoIdentificadoEspecificoP13').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroYnoIdentificadoEspecificoP13').classList.add('d-none')
            document.getElementById('otroYnoIdentificadoEspecificoP13').removeAttribute('required')
            document.getElementById('otroYnoIdentificadoEspecificoP13').value = ''
        }
    })

    // PREGUNTA 14
    document.querySelector('#questionList a[href="#pregunta14s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta1s1'] && preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionP14').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar las preguntas 1 y 4')
            !preguntasContestadas['itemPregunta1s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s1"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    document.querySelectorAll('input[name="btnRadioP14"]').forEach((elemento) => {
        elemento.addEventListener('change', function () {
            if (this.value == 'si') {
                contieneEducacion().then((resultado) => {
                    if (resultado != undefined) {
                        if (resultado == true) {
                            document.getElementById('contenedorPersonalFederalP14').classList.remove('d-none')
                            document.getElementById('txtTotalHombresP14').setAttribute('required', '')
                            document.getElementById('txtTotalMujeresP14').setAttribute('required', '')
                        } else if (resultado == false) {
                            document.getElementById(this.id).checked = false
                            alertify.error('Dentro de sus funciones no se registró alguna de educación')
                        } else {
                            document.getElementById(this.id).checked = false
                        }
                    } else {
                        document.getElementById(this.id).checked = false
                    }
                })
            } else {
                contieneEducacion().then((resultado) => {
                    if (resultado != undefined) {
                        if (resultado == true) {
                            document.getElementById('contenedorPersonalFederalP14').classList.add('d-none')
                            document.getElementById('txtTotalHombresP14').removeAttribute('required')
                            document.getElementById('txtTotalHombresP14').value = 0
                            document.getElementById('txtTotalMujeresP14').removeAttribute('required')
                            document.getElementById('txtTotalMujeresP14').value = 0
                            document.getElementById(this.id).checked = false
                            alertify.error('Dentro de sus funciones se registró alguna de educación')
                        } else if (resultado == false) { } else {
                            document.getElementById(this.id).checked = false
                        }
                    } else {
                        document.getElementById(this.id).checked = false
                    }
                })
            }
        })
    })
    document.getElementById('txtTotalHombresP14').addEventListener('input', () => {
        document.getElementById('txtTotalPersonalP14').value =
            (!isNaN(parseInt(document.getElementById('txtTotalHombresP14').value)) ? parseInt(document.getElementById('txtTotalHombresP14').value) : 0) +
            (!isNaN(parseInt(document.getElementById('txtTotalMujeresP14').value)) ? parseInt(document.getElementById('txtTotalMujeresP14').value) : 0)
    })
    document.getElementById('txtTotalMujeresP14').addEventListener('input', () => {
        document.getElementById('txtTotalPersonalP14').value =
            (!isNaN(parseInt(document.getElementById('txtTotalHombresP14').value)) ? parseInt(document.getElementById('txtTotalHombresP14').value) : 0) +
            (!isNaN(parseInt(document.getElementById('txtTotalMujeresP14').value)) ? parseInt(document.getElementById('txtTotalMujeresP14').value) : 0)
    })

    // PREGUNTA 15
    document.querySelector('#questionList a[href="#pregunta15s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta1s1'] && preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionP15').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y2'])
        } else {
            alertify.error('Antes debe contestar las preguntas 1 y 4')
            !preguntasContestadas['itemPregunta1s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s1"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    document.getElementById('txtContabilizoPersonalP15').addEventListener('change', function () {
        if (this.value == 'Si') {
            contieneSalud().then((resultado) => {
                if (resultado != undefined) {
                    if (resultado == true) {
                        document.getElementById('contenedorPersonalFederalP15').classList.remove('d-none')
                        document.getElementById('txtTotalHombresP15').setAttribute('required', '')
                        document.getElementById('txtTotalMujeresP15').setAttribute('required', '')
                    } else if (resultado == false) {
                        document.getElementById(this.id).value = ''
                        alertify.error('Dentro de sus funciones no se registró alguna de salud')
                    } else {
                        document.getElementById(this.id).value = ''
                    }
                } else {
                    document.getElementById(this.id).value = ''
                }
            })
        } else {
            contieneSalud().then((resultado) => {
                if (resultado != undefined) {
                    if (resultado == true) {
                        document.getElementById('contenedorPersonalFederalP15').classList.add('d-none')
                        document.getElementById('txtTotalHombresP15').removeAttribute('required')
                        document.getElementById('txtTotalHombresP15').value = 0
                        document.getElementById('txtTotalMujeresP15').removeAttribute('required')
                        document.getElementById('txtTotalMujeresP15').value = 0
                        document.getElementById(this.id).value = ''
                        alertify.error('Dentro de sus funciones se registró alguna de salud')
                    } else if (resultado == false) { } else {
                        document.getElementById(this.id).value = ''
                    }
                } else {
                    document.getElementById(this.id).value = ''
                }
            })
        }
    })
    document.getElementById('txtTotalHombresP15').addEventListener('input', () => {
        document.getElementById('txtTotalPersonalP15').value =
            (!isNaN(parseInt(document.getElementById('txtTotalHombresP15').value)) ? parseInt(document.getElementById('txtTotalHombresP15').value) : 0) +
            (!isNaN(parseInt(document.getElementById('txtTotalMujeresP15').value)) ? parseInt(document.getElementById('txtTotalMujeresP15').value) : 0)
    })
    document.getElementById('txtTotalMujeresP15').addEventListener('input', () => {
        document.getElementById('txtTotalPersonalP15').value =
            (!isNaN(parseInt(document.getElementById('txtTotalHombresP15').value)) ? parseInt(document.getElementById('txtTotalHombresP15').value) : 0) +
            (!isNaN(parseInt(document.getElementById('txtTotalMujeresP15').value)) ? parseInt(document.getElementById('txtTotalMujeresP15').value) : 0)
    })

    // PREGUNTA 16
    document.querySelector('#questionList a[href="#pregunta16s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        document.getElementById('txtInstitucionP16').value = nombreInstitucion
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y3'])
    })
    document.getElementById('txtElementosProfesionalizacionP16').addEventListener('change', () => {
        if (document.getElementById('txtElementosProfesionalizacionP16').value == '1') {
            document.getElementById('contenedorDisposicionNormativaP16').classList.remove('d-none')
            document.getElementById('txtDisposicionNormativaP16').setAttribute('required', '')
        } else {
            document.getElementById('contenedorDisposicionNormativaP16').classList.add('d-none')
            document.getElementById('txtDisposicionNormativaP16').removeAttribute('required')
            document.getElementById('txtDisposicionNormativaP16').value = ''
        }
    })

    // PREGUNTA 17
    document.querySelector('#questionList a[href="#pregunta17s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta16s1']) {
            contabaConElementos().then((resultado) => {
                if (resultado != undefined && resultado == false) {
                    alertify.confirm('Imposible registrar datos !', 'Ha registrado en la pregunta 16 que no contaba con elementos, mecanismos y/o esquemas de profesionalización para su personal, por cual no puede contestar las preguntas 17 y 18 ! <br><br><small>Presione "Ok" para cambiar su respuesta en la pregunta 16 ó "Cancelar" para ser redirigido a la pregunta 19 y continuar con el cuestionario</small>',
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta16s1"]')).show()
                        },
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta19s1"]')).show()
                        }).set('labels', { ok: 'Ok', cancel: 'Cancelar' });
                } else if (resultado != undefined && resultado == true) {
                    document.getElementById('txtInstitucionP17').value = nombreInstitucion
                    vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y3'])
                }
            })
        } else {
            alertify.error('Antes debe contestar la pregunta 16')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta16s1"]')).show()
        }
    })
    document.getElementById('checkOtrosP17').addEventListener('change', () => {
        if (document.getElementById('checkOtrosP17').checked) {
            document.getElementById('contenedorOtroEspecificoP17').classList.remove('d-none')
            document.getElementById('otroEspecificoP17').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroEspecificoP17').classList.add('d-none')
            document.getElementById('otroEspecificoP17').removeAttribute('required')
            document.getElementById('otroEspecificoP17').value = ''
        }
    })

    // PREGUNTA 18
    document.querySelector('#questionList a[href="#pregunta18s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta16s1']) {
            contabaConElementos().then((resultado) => {
                if (resultado != undefined && resultado == false) {
                    alertify.confirm('Imposible registrar datos !', 'Ha registrado en la pregunta 16 que no contaba con elementos, mecanismos y/o esquemas de profesionalización para su personal, por cual no puede contestar las preguntas 17 y 18 ! <br><br><small>Presione "Ok" para cambiar su respuesta en la pregunta 16 ó "Cancelar" para ser redirigido a la pregunta 19 y continuar con el cuestionario</small>',
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta16s1"]')).show()
                        },
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta19s1"]')).show()
                        }).set('labels', { ok: 'Ok', cancel: 'Cancelar' });
                } else if (resultado != undefined && resultado == true) {
                    document.getElementById('txtInstitucionP18').value = nombreInstitucion
                    vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y3'])
                }
            })
        } else {
            alertify.error('Antes debe contestar la pregunta 16')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta16s1"]')).show()
        }
    })
    document.getElementById('selectUnidadAdministrativaP18').addEventListener('change', () => {
        if (document.getElementById('selectUnidadAdministrativaP18').value == '1') {
            document.getElementById('contenedorUnidadAdministrativaP18').classList.remove('d-none')
            document.getElementById('txtUnidadAdministrativaP18').setAttribute('required', '')
        } else {
            document.getElementById('contenedorUnidadAdministrativaP18').classList.add('d-none')
            document.getElementById('txtUnidadAdministrativaP18').removeAttribute('required')
            document.getElementById('txtUnidadAdministrativaP18').value = ''
        }
    })

    // PREGUNTA 19
    document.querySelector('#questionList a[href="#pregunta19s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionP19').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion2y4'])
        } else {
            alertify.error('Antes debe contestar la pregunta 4')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    document.getElementById('selectAccionesFormativasP19').addEventListener('change', () => {
        if (document.getElementById('selectAccionesFormativasP19').value == '1') {
            document.getElementById('contenedorAccionesFormativasP19').classList.remove('d-none')
            document.getElementById('txtTotalImpartidasP19').setAttribute('required', '')
            document.getElementById('txtTotalImpartidasConcluidasP19').setAttribute('required', '')
            document.getElementById('txtTotalPersonalP19').setAttribute('required', '')
            document.getElementById('txtTotalHombresP19').setAttribute('required', '')
            document.getElementById('txtTotalMujeresP19').setAttribute('required', '')
        } else {
            document.getElementById('contenedorAccionesFormativasP19').classList.add('d-none')
            document.getElementById('txtTotalImpartidasP19').removeAttribute('required')
            document.getElementById('txtTotalImpartidasP19').value = 0
            document.getElementById('txtTotalImpartidasConcluidasP19').removeAttribute('required')
            document.getElementById('txtTotalImpartidasConcluidasP19').value = 0
            document.getElementById('txtTotalPersonalP19').removeAttribute('required')
            document.getElementById('txtTotalPersonalP19').value = 0
            document.getElementById('txtTotalHombresP19').removeAttribute('required')
            document.getElementById('txtTotalHombresP19').value = 0
            document.getElementById('txtTotalMujeresP19').removeAttribute('required')
            document.getElementById('txtTotalMujeresP19').value = 0
        }
    })
    document.getElementById('txtTotalHombresP19').addEventListener('input', () => {
        document.getElementById('txtTotalPersonalP19').value =
            (!isNaN(parseInt(document.getElementById('txtTotalHombresP19').value)) ? parseInt(document.getElementById('txtTotalHombresP19').value) : 0) +
            (!isNaN(parseInt(document.getElementById('txtTotalMujeresP19').value)) ? parseInt(document.getElementById('txtTotalMujeresP19').value) : 0)
    })
    document.getElementById('txtTotalMujeresP19').addEventListener('input', () => {
        document.getElementById('txtTotalPersonalP19').value =
            (!isNaN(parseInt(document.getElementById('txtTotalHombresP19').value)) ? parseInt(document.getElementById('txtTotalHombresP19').value) : 0) +
            (!isNaN(parseInt(document.getElementById('txtTotalMujeresP19').value)) ? parseInt(document.getElementById('txtTotalMujeresP19').value) : 0)
    })
    document.getElementById('txtTotalImpartidasConcluidasP19').addEventListener('input', function () {
        if (parseInt(this.value) > parseInt(document.getElementById('txtTotalImpartidasP19').value)) {
            this.value = document.getElementById('txtTotalImpartidasP19').value
            alertify.error('No ha registrado más acciones formativas')
        }
    })
    document.getElementById('txtTotalImpartidasP19').addEventListener('input', function () {
        if (parseInt(this.value) < parseInt(document.getElementById('txtTotalImpartidasConcluidasP19').value)) {
            document.getElementById('txtTotalImpartidasConcluidasP19').value = this.value
        }
    })

    // PREGUNTA 24
    document.querySelector('#questionList a[href="#pregunta24s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        document.getElementById('txtInstitucionP24').value = nombreInstitucion
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4', 'btnModalSubseccion4y1'])
    })
    elementosTotalesInmueblesP24 = [
        'txtTotalPropiosP24',
        'txtTotalRentadosP24',
        'txtTotalOtroP24'
    ]
    escuchadoresParaSumaDeTotales('inmueblesGeneral', 'txtTotalInmueblesP24', '', elementosTotalesInmueblesP24, 24, 1)
    document.getElementById('txtTotalOtroP24').addEventListener('input', function () {
        if (parseInt(this.value) > 0) {
            document.getElementById('contenedorOtroEspecificoP24').classList.remove('d-none')
            document.getElementById('otroEspecificoP24').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroEspecificoP24').classList.add('d-none')
            document.getElementById('otroEspecificoP24').removeAttribute('required')
            document.getElementById('otroEspecificoP24').value = ''
        }
    })

    // PREGUNTA 25
    document.querySelector('#questionList a[href="#pregunta25s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta1s1'] && preguntasContestadas['itemPregunta24s1']) {
            document.getElementById('txtInstitucionP25').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4', 'btnModalSubseccion4y1'])
        } else {
            alertify.error('Antes debe contestar las preguntas 1 y 24')
            !preguntasContestadas['itemPregunta1s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s1"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta24s1"]')).show()
        }
    })
    document.getElementById('selectApoyoEducativasP25').addEventListener('change', function () {
        if (this.value == '1') {
            contieneEducacion().then((resultado) => {
                if (resultado != undefined) {
                    if (resultado == true) {
                        // Todo bien
                    } else if (resultado == false) {
                        document.getElementById(this.id).value = ''
                        alertify.error('Dentro de sus funciones no se registró alguna de educación')
                    } else {
                        document.getElementById(this.id).value = ''
                    }
                } else {
                    document.getElementById(this.id).value = ''
                }
            })
        } else {
            contieneEducacion().then((resultado) => {
                if (resultado != undefined) {
                    if (resultado == true) {
                        document.getElementById(this.id).value = ''
                        alertify.error('Dentro de sus funciones se registró alguna de educación')
                    } else if (resultado == false) {
                        // Todo bien
                    } else {
                        document.getElementById(this.id).value = ''
                    }
                } else {
                    document.getElementById(this.id).value = ''
                }
            })
        }
    })

    // PREGUNTA 26
    document.querySelector('#questionList a[href="#pregunta26s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta1s1'] && preguntasContestadas['itemPregunta24s1'] && preguntasContestadas['itemPregunta25s1']) {
            contieneEducacion().then((resultado) => {
                if (resultado != undefined && resultado == false) {
                    alertify.confirm('Imposible registrar datos !', 'Ha registrado en la pregunta 25 que no se contabilizaron bienes inmuebles cuyo uso principal haya sido el apoyo a funciones educativas, por cual no puede contestar la pregunta 26 ! <br><br><small>Presione "Ok" para cambiar su respuesta en la pregunta 25 ó "Cancelar" para ser redirigido a la pregunta 27 y continuar con el cuestionario</small>',
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta25s1"]')).show()
                        },
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta27s1"]')).show()
                        }).set('labels', { ok: 'Ok', cancel: 'Cancelar' });
                } else if (resultado != undefined && resultado == true) {
                    document.getElementById('txtInstitucionP26').value = nombreInstitucion
                    vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4', 'btnModalSubseccion4y1'])
                }
            })
        } else {
            alertify.error('Antes debe contestar las preguntas 1, 24 y 25')
            !preguntasContestadas['itemPregunta1s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s1"]')).show() : !preguntasContestadas['itemPregunta24s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta24s1"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta25s1"]')).show()
        }
    })
    elementosTotalesInmueblesInstEducacionP26 = [
        'txtTotal1x1P26',
        'txtTotal1x2P26',
        'txtTotal1x3P26'
    ]
    elementosTotalesInmueblesInstOtraP26 = [
        'txtTotal2x1P26',
        'txtTotal2x2P26',
        'txtTotal2x3P26'
    ]
    escuchadoresParaSumaDeTotales('inmuebles1', 'txtTotalInmueblesP26', 'txtTotalInmuebles1P26', elementosTotalesInmueblesInstEducacionP26, 26, 1)
    escuchadoresParaSumaDeTotales('inmuebles2', 'txtTotalInmueblesP26', 'txtTotalInmuebles2P26', elementosTotalesInmueblesInstOtraP26, 26, 1)
    document.getElementById('txtTotal1x2P26').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotal1x2P26').value) > 0 ||
            parseInt(document.getElementById('txtTotal2x2P26').value) > 0
        ) {
            document.getElementById('contenedorOtraFuncionEspecificoP26').classList.remove('d-none')
            document.getElementById('otraFuncionEspecificoP26').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFuncionEspecificoP26').classList.add('d-none')
            document.getElementById('otraFuncionEspecificoP26').removeAttribute('required')
            document.getElementById('otraFuncionEspecificoP26').value = ''
        }
    })
    document.getElementById('txtTotal2x2P26').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotal1x2P26').value) > 0 ||
            parseInt(document.getElementById('txtTotal2x2P26').value) > 0
        ) {
            document.getElementById('contenedorOtraFuncionEspecificoP26').classList.remove('d-none')
            document.getElementById('otraFuncionEspecificoP26').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFuncionEspecificoP26').classList.add('d-none')
            document.getElementById('otraFuncionEspecificoP26').removeAttribute('required')
            document.getElementById('otraFuncionEspecificoP26').value = ''
        }
    })

    // PREGUNTA 27
    document.querySelector('#questionList a[href="#pregunta27s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta1s1'] && preguntasContestadas['itemPregunta24s1']) {
            document.getElementById('txtInstitucionP27').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4', 'btnModalSubseccion4y1'])
        } else {
            alertify.error('Antes debe contestar las preguntas 1 y 24')
            !preguntasContestadas['itemPregunta1s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s1"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta24s1"]')).show()
        }
    })
    document.getElementById('selectApoyoFuncionSaludP27').addEventListener('change', function () {
        if (this.value == '1') {
            contieneSalud().then((resultado) => {
                if (resultado != undefined) {
                    if (resultado == true) {
                        // Todo bien
                    } else if (resultado == false) {
                        document.getElementById(this.id).value = ''
                        alertify.error('Dentro de sus funciones no se registró alguna de salud')
                    } else {
                        document.getElementById(this.id).value = ''
                    }
                } else {
                    document.getElementById(this.id).value = ''
                }
            })
        } else {
            contieneSalud().then((resultado) => {
                if (resultado != undefined) {
                    if (resultado == true) {
                        document.getElementById(this.id).value = ''
                        alertify.error('Dentro de sus funciones se registró alguna de salud')
                    } else if (resultado == false) {
                        // Todo bien
                    } else {
                        document.getElementById(this.id).value = ''
                    }
                } else {
                    document.getElementById(this.id).value = ''
                }
            })
        }
    })

    // PREGUNTA 28
    document.querySelector('#questionList a[href="#pregunta28s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta1s1'] && preguntasContestadas['itemPregunta24s1'] && preguntasContestadas['itemPregunta27s1']) {
            contieneSalud().then((resultado) => {
                if (resultado != undefined && resultado == false) {
                    alertify.confirm('Imposible registrar datos !', 'Ha registrado en la pregunta 27 que no se contabilizaron bienes inmuebles cuyo uso principal haya sido el apoyo a funciones de salud, por cual no puede contestar la pregunta 28 ! <br><br><small>Presione "Ok" para cambiar su respuesta en la pregunta 27 ó "Cancelar" para ser redirigido a la pregunta 29 y continuar con el cuestionario</small>',
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta27s1"]')).show()
                        },
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta29s1"]')).show()
                        }).set('labels', { ok: 'Ok', cancel: 'Cancelar' });
                } else if (resultado != undefined && resultado == true) {
                    document.getElementById('txtInstitucionP28').value = nombreInstitucion
                    vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4', 'btnModalSubseccion4y1'])
                }
            })
        } else {
            alertify.error('Antes debe contestar las preguntas 1, 24 y 27')
            !preguntasContestadas['itemPregunta1s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s1"]')).show() : !preguntasContestadas['itemPregunta24s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta24s1"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta27s1"]')).show()
        }
    })
    elementosTotalesInmueblesInstSaludP28 = [
        'txtTotal1x1P28',
        'txtTotal1x2P28',
        'txtTotal1x3P28',
        'txtTotal1x4P28',
        'txtTotal1x5P28'
    ]
    elementosTotalesInmueblesInstOtraP28 = [
        'txtTotal2x1P28',
        'txtTotal2x2P28',
        'txtTotal2x3P28',
        'txtTotal2x4P28',
        'txtTotal2x5P28'
    ]
    escuchadoresParaSumaDeTotales('inmuebles1', 'txtTotalInmueblesP28', 'txtTotalInmuebles1P28', elementosTotalesInmueblesInstSaludP28, 28, 1)
    escuchadoresParaSumaDeTotales('inmuebles2', 'txtTotalInmueblesP28', 'txtTotalInmuebles2P28', elementosTotalesInmueblesInstOtraP28, 28, 1)
    document.getElementById('txtTotal1x4P28').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotal1x4P28').value) > 0 ||
            parseInt(document.getElementById('txtTotal2x4P28').value) > 0
        ) {
            document.getElementById('contenedorOtraFuncionEspecificoP28').classList.remove('d-none')
            document.getElementById('otraFuncionEspecificoP28').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFuncionEspecificoP28').classList.add('d-none')
            document.getElementById('otraFuncionEspecificoP28').removeAttribute('required')
            document.getElementById('otraFuncionEspecificoP28').value = ''
        }
    })
    document.getElementById('txtTotal2x4P28').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotal1x4P28').value) > 0 ||
            parseInt(document.getElementById('txtTotal2x4P28').value) > 0
        ) {
            document.getElementById('contenedorOtraFuncionEspecificoP28').classList.remove('d-none')
            document.getElementById('otraFuncionEspecificoP28').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFuncionEspecificoP28').classList.add('d-none')
            document.getElementById('otraFuncionEspecificoP28').removeAttribute('required')
            document.getElementById('otraFuncionEspecificoP28').value = ''
        }
    })

    // PREGUNTA 29
    document.querySelector('#questionList a[href="#pregunta29s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta1s1'] && preguntasContestadas['itemPregunta24s1']) {
            document.getElementById('txtInstitucionP29').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4', 'btnModalSubseccion4y1'])
        } else {
            alertify.error('Antes debe contestar las preguntas 1 y 24')
            !preguntasContestadas['itemPregunta1s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s1"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta24s1"]')).show()
        }
    })
    document.getElementById('selectRealizacionDeporteP29').addEventListener('change', function () {
        if (this.value == '1') {
            contieneDeporte().then((resultado) => {
                if (resultado != undefined) {
                    if (resultado == true) {
                        // Todo bien
                    } else if (resultado == false) {
                        document.getElementById(this.id).value = ''
                        alertify.error('Dentro de sus funciones no se registró alguna de activación física, cultura física y/o deporte')
                    } else {
                        document.getElementById(this.id).value = ''
                    }
                } else {
                    document.getElementById(this.id).value = ''
                }
            })
        } else {
            contieneDeporte().then((resultado) => {
                if (resultado != undefined) {
                    if (resultado == true) {
                        document.getElementById(this.id).value = ''
                        alertify.error('Dentro de sus funciones se registró alguna de activación física, cultura física y/o deporte')
                    } else if (resultado == false) {
                        // Todo bien
                    } else {
                        document.getElementById(this.id).value = ''
                    }
                } else {
                    document.getElementById(this.id).value = ''
                }
            })
        }
    })

    // PREGUNTA 30
    document.querySelector('#questionList a[href="#pregunta30s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta1s1'] && preguntasContestadas['itemPregunta24s1'] && preguntasContestadas['itemPregunta29s1']) {
            contieneDeporte().then((resultado) => {
                if (resultado != undefined && resultado == false) {
                    alertify.confirm('Imposible registrar datos !', 'Ha registrado en la pregunta 29 que no se contabilizaron bienes inmuebles cuyo uso principal fue la realización de activación física, cultura física y/o deporte, por cual no puede contestar la pregunta 30 ! <br><br><small>Presione "Ok" para cambiar su respuesta en la pregunta 29 ó "Cancelar" para ser redirigido a la pregunta 31 y continuar con el cuestionario</small>',
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta29s1"]')).show()
                        },
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta31s1"]')).show()
                        }).set('labels', { ok: 'Ok', cancel: 'Cancelar' });
                } else if (resultado != undefined && resultado == true) {
                    document.getElementById('txtInstitucionP30').value = nombreInstitucion
                    vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4', 'btnModalSubseccion4y1'])
                }
            })
        } else {
            alertify.error('Antes debe contestar las preguntas 1, 24 y 29')
            !preguntasContestadas['itemPregunta1s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s1"]')).show() : !preguntasContestadas['itemPregunta24s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta24s1"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta29s1"]')).show()
        }
    })
    elementosTotalesInmueblesInstDeporteP30 = [
        'txtTotal1x1P30',
        'txtTotal1x2P30',
        'txtTotal1x3P30',
        'txtTotal1x4P30',
        'txtTotal1x5P30',
        'txtTotal1x6P30',
        'txtTotal1x7P30'
    ]
    elementosTotalesInmueblesInstOtraP30 = [
        'txtTotal2x1P30',
        'txtTotal2x2P30',
        'txtTotal2x3P30',
        'txtTotal2x4P30',
        'txtTotal2x5P30',
        'txtTotal2x6P30',
        'txtTotal2x7P30'
    ]
    escuchadoresParaSumaDeTotales('inmuebles1', 'txtTotalInmueblesP30', 'txtTotalInmuebles1P30', elementosTotalesInmueblesInstDeporteP30, 30, 1)
    escuchadoresParaSumaDeTotales('inmuebles2', 'txtTotalInmueblesP30', 'txtTotalInmuebles2P30', elementosTotalesInmueblesInstOtraP30, 30, 1)
    document.getElementById('txtTotal1x6P30').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotal1x6P30').value) > 0 ||
            parseInt(document.getElementById('txtTotal2x6P30').value) > 0
        ) {
            document.getElementById('contenedorOtraFuncionEspecificaP30').classList.remove('d-none')
            document.getElementById('otraFuncionEspecificaP30').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFuncionEspecificaP30').classList.add('d-none')
            document.getElementById('otraFuncionEspecificaP30').removeAttribute('required')
            document.getElementById('otraFuncionEspecificaP30').value = ''
        }
    })
    document.getElementById('txtTotal2x6P30').addEventListener('input', () => {
        if (
            parseInt(document.getElementById('txtTotal1x6P30').value) > 0 ||
            parseInt(document.getElementById('txtTotal2x6P30').value) > 0
        ) {
            document.getElementById('contenedorOtraFuncionEspecificaP30').classList.remove('d-none')
            document.getElementById('otraFuncionEspecificaP30').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFuncionEspecificaP30').classList.add('d-none')
            document.getElementById('otraFuncionEspecificaP30').removeAttribute('required')
            document.getElementById('otraFuncionEspecificaP30').value = ''
        }
    })

    // PREGUNTA 31
    document.querySelector('#questionList a[href="#pregunta31s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        document.getElementById('txtInstitucionP31').value = nombreInstitucion
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4', 'btnModalSubseccion4y2'])
    })
    elementosTotalesVehiculosP31 = [
        'txtTotalAutomovilesP31',
        'txtTotalCamionesCamionetasP31',
        'txtTotalMotocicletasP31',
        'txtTotalBicicletasP31',
        'txtTotalHelicopterosP31',
        'txtTotalDronesP31',
        'txtTotalOtrosP31'
    ]
    escuchadoresParaSumaDeTotales('vehiculos', 'txtTotalGeneralP31', '', elementosTotalesVehiculosP31, 31, 1)
    document.getElementById('txtTotalOtrosP31').addEventListener('input', () => {
        if (parseInt(document.getElementById('txtTotalOtrosP31').value) > 0) {
            document.getElementById('contenedorOtroEspecificoP31').classList.remove('d-none')
            document.getElementById('otroEspecificoP31').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroEspecificoP31').classList.add('d-none')
            document.getElementById('otroEspecificoP31').removeAttribute('required')
            document.getElementById('otroEspecificoP31').value = ''
        }
    })

    // PREGUNTA 32
    document.querySelector('#questionList a[href="#pregunta32s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        document.getElementById('txtInstitucionP32').value = nombreInstitucion
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4'])
    })
    elementosTotalesLineasP32 = [
        'txtTotalLineasFijasP32',
        'txtTotalLineasMovilesP32'
    ]
    elementosTotalesAparatosP32 = [
        'txtTotalAparatosFijosP32',
        'txtTotalAparatosMovilesP32'
    ]
    escuchadoresParaSumaDeTotales('lineas', 'txtTotalLineasP32', '', elementosTotalesLineasP32, 32, 1)
    escuchadoresParaSumaDeTotales('aparatos', 'txtTotalAparatosP32', '', elementosTotalesAparatosP32, 32, 1)

    // PREGUNTA 33
    document.querySelector('#questionList a[href="#pregunta33s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        document.getElementById('txtInstitucionP33').value = nombreInstitucion
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4', 'btnModalSubseccion4y4'])
    })
    elementosTotalesComputadorasP33 = [
        'txtTotalComputadoraPersonalP33',
        'txtTotalComputadoraPortatilP33'
    ]
    elementosTotalesImpresorasP33 = [
        'txtTotalImpresoraPersonalP33',
        'txtTotalImpresoraCompartidaP33'
    ]
    escuchadoresParaSumaDeTotales('computadoras', 'txtTotalComputadorasP33', '', elementosTotalesComputadorasP33, 33, 1)
    escuchadoresParaSumaDeTotales('impresoras', 'txtTotalImpresorasP33', '', elementosTotalesImpresorasP33, 33, 1)
    document.getElementById('selectConexionRemotaP33').addEventListener('input', () => {
        if (
            document.getElementById('selectConexionRemotaP33').value == '2' ||
            document.getElementById('selectConexionRemotaP33').value == '9'
        ) {
            document.getElementById('contenedorConexionRemotaEspecificoP33').classList.remove('d-none')
            document.getElementById('conexionRemotaEspecificoP33').setAttribute('required', '')
        } else {
            document.getElementById('contenedorConexionRemotaEspecificoP33').classList.add('d-none')
            document.getElementById('conexionRemotaEspecificoP33').removeAttribute('required')
            document.getElementById('conexionRemotaEspecificoP33').value = ''
        }
    })

    // PREGUNTA 34
    document.querySelector('#questionList a[href="#pregunta34s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta1s1'] && preguntasContestadas['itemPregunta33s1']) {
            document.getElementById('txtInstitucionP34').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4'])
        } else {
            alertify.error('Antes debe contestar las preguntas 1 y 33')
            !preguntasContestadas['itemPregunta1s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s1"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta33s1"]')).show()
        }
    })

    // PREGUNTA 35
    document.querySelector('#questionList a[href="#pregunta35s1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta1s1'] && preguntasContestadas['itemPregunta33s1'] && preguntasContestadas['itemPregunta34s1']) {
            seContabilizoEquipoInformatico().then((resultado) => {
                if (resultado != undefined && resultado == true) {
                    document.getElementById('txtInstitucionP35').value = nombreInstitucion
                    vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4'])
                } else if (resultado != undefined && resultado == false) {
                    alertify.confirm('Imposible registrar datos !', 'Ha registrado en la pregunta 34 que no se contabilizaron computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas asignadas a profesores y estudiantes exclusivamente para ser utilizadas con fines educativos y de enseñanza, por cual no puede contestar la pregunta 35 ! <br><br><small>Presione "Ok" para cambiar su respuesta en la pregunta 34 ó "Cancelar" para ser redirigido a la pregunta de complemento de la sección 1 y continuar con el cuestionario</small>',
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta34s1"]')).show()
                        },
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#complementoS1"]')).show()
                        }).set('labels', { ok: 'Ok', cancel: 'Cancelar' });
                }
            })
            // contieneEducacion().then((resultado) => {
            //     if (resultado != undefined && resultado == false) {
            //         alertify.confirm('Imposible registrar datos !', 'Ha registrado en la pregunta 34 que no se contabilizaron computadoras, impresoras, multifuncionales, servidores y tabletas electrónicas asignadas a profesores y estudiantes exclusivamente para ser utilizadas con fines educativos y de enseñanza, por cual no puede contestar la pregunta 35 ! <br><br><small>Presione "Ok" para cambiar su respuesta en la pregunta 34 ó "Cancelar" para ser redirigido a la pregunta 1 de la sección 12 y continuar con el cuestionario</small>',
            //             function () {
            //                 new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta34s1"]')).show()
            //             },
            //             function () {
            //                 new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s12"]')).show()
            //             }).set('labels', { ok: 'Ok', cancel: 'Cancelar' });
            //     } else if (resultado != undefined && resultado == true) {
            //         document.getElementById('txtInstitucionP35').value = nombreInstitucion
            //         vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1', 'btnModalSubseccion4'])
            //     }
            // })
        } else {
            alertify.error('Antes debe contestar las preguntas 1, 33 y 34')
            !preguntasContestadas['itemPregunta1s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s1"]')).show() : !preguntasContestadas['itemPregunta33s1'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta33s1"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta34s1"]')).show()
        }
    })
    elementosTotalesComputadorasP35 = [
        'txtTotal1x1P35',
        'txtTotal1x2P35'
    ]
    elementosTotalesImpresorasP35 = [
        'txtTotal2x1P35',
        'txtTotal2x2P35'
    ]
    elementosTotalesMultifuncionalesP35 = [
        'txtTotal3x1P35',
        'txtTotal3x2P35'
    ]
    elementosTotalesServidoresP35 = [
        'txtTotal4x1P35',
        'txtTotal4x2P35'
    ]
    elementosTotalesTabletasP35 = [
        'txtTotal5x1P35',
        'txtTotal5x2P35'
    ]
    escuchadoresParaSumaDeTotales('computadorasP35', 'txtTotal1P35', '', elementosTotalesComputadorasP35, 35, 1)
    escuchadoresParaSumaDeTotales('impresorasP35', 'txtTotal2P35', '', elementosTotalesImpresorasP35, 35, 1)
    escuchadoresParaSumaDeTotales('multifuncionalesP35', 'txtTotal3P35', '', elementosTotalesMultifuncionalesP35, 35, 1)
    escuchadoresParaSumaDeTotales('servidoresP35', 'txtTotal4P35', '', elementosTotalesServidoresP35, 35, 1)
    escuchadoresParaSumaDeTotales('tabletasP35', 'txtTotal5P35', '', elementosTotalesTabletasP35, 35, 1)

    // PREGUNTA COMPLEMENTO SECCION 1
    document.querySelector('#questionList a[href="#complementoS1"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(12)
        if (preguntasContestadas['itemPregunta4s1']) {
            document.getElementById('txtInstitucionComplementoS1').value = nombreInstitucion
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS1'])
        } else {
            alertify.error('Antes debe contestar la pregunta 4')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
        }
    })
    document.getElementById('txtTotalHombresComplementoS1').addEventListener('input', () => {
        document.getElementById('txtTotalPersonalComplementoS1').value =
            (!isNaN(parseInt(document.getElementById('txtTotalHombresComplementoS1').value)) ? parseInt(document.getElementById('txtTotalHombresComplementoS1').value) : 0) +
            (!isNaN(parseInt(document.getElementById('txtTotalMujeresComplementoS1').value)) ? parseInt(document.getElementById('txtTotalMujeresComplementoS1').value) : 0)
    })
    document.getElementById('txtTotalMujeresComplementoS1').addEventListener('input', () => {
        document.getElementById('txtTotalPersonalComplementoS1').value =
            (!isNaN(parseInt(document.getElementById('txtTotalHombresComplementoS1').value)) ? parseInt(document.getElementById('txtTotalHombresComplementoS1').value) : 0) +
            (!isNaN(parseInt(document.getElementById('txtTotalMujeresComplementoS1').value)) ? parseInt(document.getElementById('txtTotalMujeresComplementoS1').value) : 0)
    })

    // PREGUNTA 1 SECCION 12
    document.querySelector('#questionList a[href="#pregunta1s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        document.getElementById('txtNombreNormativa1s12').removeAttribute('required')
        document.getElementById('txtNombreNormativa1s12').setAttribute('disabled', '')
        document.getElementById('txtNombreNormativa2s12').removeAttribute('required')
        document.getElementById('txtNombreNormativa2s12').setAttribute('disabled', '')
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12'])
    })
    document.getElementById('selectDisposicionNormativa1s12').addEventListener('change', () => {
        if (document.getElementById('selectDisposicionNormativa1s12').value == '1') {
            document.getElementById('txtNombreNormativa1s12').setAttribute('required', '')
            document.getElementById('txtNombreNormativa1s12').removeAttribute('disabled')
        } else {
            document.getElementById('txtNombreNormativa1s12').removeAttribute('required')
            document.getElementById('txtNombreNormativa1s12').setAttribute('disabled', '')
            document.getElementById('txtNombreNormativa1s12').value = ''
        }
    })
    document.getElementById('selectDisposicionNormativa2s12').addEventListener('change', () => {
        if (document.getElementById('selectDisposicionNormativa2s12').value == '1') {
            document.getElementById('txtNombreNormativa2s12').setAttribute('required', '')
            document.getElementById('txtNombreNormativa2s12').removeAttribute('disabled')
        } else {
            document.getElementById('txtNombreNormativa2s12').removeAttribute('required')
            document.getElementById('txtNombreNormativa2s12').setAttribute('disabled', '')
            document.getElementById('txtNombreNormativa2s12').value = ''
        }
    })

    // PREGUNTA 2 SECCION 12
    document.querySelector('#questionList a[href="#pregunta2s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        if (preguntasContestadas['itemPregunta1s12']) {
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12'])
        } else {
            alertify.error('Antes debe contestar la pregunta 1')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s12"]')).show()
        }
    })
    elementosMateria1P2S12 = [
        'checkAdjudicacion1P2s12',
        'checkInvitacion1P2s12',
        'checkLicitacionNacional1P2s12',
        'checkLicitacionInternacional1P2s12',
        'checkOtroProcedimiento1P2s12'
    ]
    elementosMateria2P2S12 = [
        'checkAdjudicacion2P2s12',
        'checkInvitacion2P2s12',
        'checkLicitacionNacional2P2s12',
        'checkLicitacionInternacional2P2s12',
        'checkOtroProcedimiento2P2s12'
    ]
    verificarElementosS12(elementosMateria1P2S12, 1, 1, 12)
    verificarElementosS12(elementosMateria2P2S12, 2, 1, 12)
    document.getElementById('checkNoAplica1P2s12').addEventListener('change', () => {
        if (document.getElementById('checkNoAplica1P2s12').checked) {
            contabaConDisposicion1P1S12().then((resultado) => {
                if (resultado != undefined && resultado == true) {
                    document.getElementById('checkNoAplica1P2s12').checked = false
                    alertify.alert('Imposible marcar que No Aplica !', 'Ha especificado el la pregunta 1 que su entidad federativa contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal en el tipo de materia de adquisiciones, arrendamientos y servicios, por lo que debe marcar algún procedimiento de contratación en esta fila.').set('label', 'Ok');
                } else if (resultado != undefined && resultado == false) {
                    habilitarChecks(elementosMateria1P2S12, 'deshabilitar')
                    document.getElementById('contenedorOtroProcedimiento1P2s12').classList.add('d-none')
                    document.getElementById('txtOtroProcedimiento1P2s12').removeAttribute('required')
                    document.getElementById('txtOtroProcedimiento1P2s12').value = ''
                } else {
                    document.getElementById('checkNoAplica1P2s12').checked = false
                }
            })
        } else {
            habilitarChecks(elementosMateria1P2S12, 'habilitar')
        }
    })
    document.getElementById('checkNoAplica2P2s12').addEventListener('change', () => {
        if (document.getElementById('checkNoAplica2P2s12').checked) {
            contabaConDisposicion2P1S12().then((resultado) => {
                if (resultado != undefined && resultado == true) {
                    document.getElementById('checkNoAplica2P2s12').checked = false
                    alertify.alert('Imposible marcar que No Aplica !', 'Ha especificado el la pregunta 1 que su entidad federativa contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal en el tipo de materia de obra pública y servicios relacionados con la misma, por lo que debe marcar algún procedimiento de contratación en esta fila.').set('label', 'Ok');
                } else if (resultado != undefined && resultado == false) {
                    habilitarChecks(elementosMateria2P2S12, 'deshabilitar')
                    document.getElementById('contenedorOtroProcedimiento2P2s12').classList.add('d-none')
                    document.getElementById('txtOtroProcedimiento2P2s12').removeAttribute('required')
                    document.getElementById('txtOtroProcedimiento2P2s12').value = ''
                } else {
                    document.getElementById('checkNoAplica2P2s12').checked = false
                }
            })
        } else {
            habilitarChecks(elementosMateria2P2S12, 'habilitar')
        }
    })
    document.getElementById('checkOtroProcedimiento1P2s12').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('contenedorOtroProcedimiento1P2s12').classList.remove('d-none')
            document.getElementById('txtOtroProcedimiento1P2s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroProcedimiento1P2s12').classList.add('d-none')
            document.getElementById('txtOtroProcedimiento1P2s12').removeAttribute('required')
            document.getElementById('txtOtroProcedimiento1P2s12').value = ''
        }
    })
    document.getElementById('checkOtroProcedimiento2P2s12').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('contenedorOtroProcedimiento2P2s12').classList.remove('d-none')
            document.getElementById('txtOtroProcedimiento2P2s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroProcedimiento2P2s12').classList.add('d-none')
            document.getElementById('txtOtroProcedimiento2P2s12').removeAttribute('required')
            document.getElementById('txtOtroProcedimiento2P2s12').value = ''
        }
    })

    // PREGUNTA 3 SECCION 12
    elementosMateria1P3S12 = [
        'checkMecanismo11P3s12',
        'checkMecanismo21P3s12',
        'checkMecanismo31P3s12',
        'checkMecanismo41P3s12',
        'checkMecanismo51P3s12',
        'checkMecanismo61P3s12',
        'checkMecanismo71P3s12',
        'checkMecanismo81P3s12',
        'checkMecanismo91P3s12',
        'checkMecanismo101P3s12',
        'checkMecanismo111P3s12',
        'checkMecanismo121P3s12',
        'checkMecanismo131P3s12',
        'checkMecanismo141P3s12',
        'checkMecanismo151P3s12',
        'checkMecanismo161P3s12'
    ]
    elementosMateria2P3S12 = [
        'checkMecanismo12P3s12',
        'checkMecanismo22P3s12',
        'checkMecanismo32P3s12',
        'checkMecanismo42P3s12',
        'checkMecanismo52P3s12',
        'checkMecanismo62P3s12',
        'checkMecanismo72P3s12',
        'checkMecanismo82P3s12',
        'checkMecanismo92P3s12',
        'checkMecanismo102P3s12',
        'checkMecanismo112P3s12',
        'checkMecanismo122P3s12',
        'checkMecanismo132P3s12',
        'checkMecanismo142P3s12',
        'checkMecanismo152P3s12',
        'checkMecanismo162P3s12'
    ]
    document.querySelector('#questionList a[href="#pregunta3s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        if (preguntasContestadas['itemPregunta1s12']) {
            habilitarChecks(elementosMateria1P3S12, 'deshabilitar')
            habilitarChecks(elementosMateria2P3S12, 'deshabilitar')
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12', 'btnModalPregunta3s12'])
        } else {
            alertify.error('Antes debe contestar la pregunta 1')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s12"]')).show()
        }
    })
    verificarElementosS12(elementosMateria1P3S12, 1, 3, 12)
    verificarElementosS12(elementosMateria2P3S12, 2, 3, 12)
    document.getElementById('checkNoAplica1P3s12').addEventListener('change', () => {
        if (document.getElementById('checkNoAplica1P3s12').checked) {
            habilitarChecks(elementosMateria1P3S12, 'deshabilitar')
            document.getElementById('selectContabaMecanismo1P3s12').setAttribute('disabled', '')
            document.getElementById('selectContabaMecanismo1P3s12').removeAttribute('required')
            document.getElementById('selectContabaMecanismo1P3s12').value = ''
            document.getElementById('contenedorOtroMecanismo1P3s12').classList.add('d-none')
            document.getElementById('txtOtroMecanismo1P3s12').removeAttribute('required')
            document.getElementById('txtOtroMecanismo1P3s12').value = ''
        } else {
            habilitarChecks(elementosMateria1P3S12, 'deshabilitar')
            document.getElementById('selectContabaMecanismo1P3s12').removeAttribute('disabled')
            document.getElementById('selectContabaMecanismo1P3s12').setAttribute('required', '')
        }
    })
    document.getElementById('checkNoAplica2P3s12').addEventListener('change', () => {
        if (document.getElementById('checkNoAplica2P3s12').checked) {
            habilitarChecks(elementosMateria2P3S12, 'deshabilitar')
            document.getElementById('selectContabaMecanismo2P3s12').setAttribute('disabled', '')
            document.getElementById('selectContabaMecanismo2P3s12').removeAttribute('required')
            document.getElementById('selectContabaMecanismo2P3s12').value = ''
            document.getElementById('contenedorOtroMecanismo2P3s12').classList.add('d-none')
            document.getElementById('txtOtroMecanismo2P3s12').removeAttribute('required')
            document.getElementById('txtOtroMecanismo2P3s12').value = ''
        } else {
            habilitarChecks(elementosMateria2P3S12, 'deshabilitar')
            document.getElementById('selectContabaMecanismo2P3s12').removeAttribute('disabled')
            document.getElementById('selectContabaMecanismo2P3s12').setAttribute('required', '')
        }
    })
    document.getElementById('selectContabaMecanismo1P3s12').addEventListener('change', () => {
        if (document.getElementById('selectContabaMecanismo1P3s12').value == '1') {
            habilitarChecks(elementosMateria1P3S12, 'habilitar')
        } else {
            habilitarChecks(elementosMateria1P3S12, 'deshabilitar')
            document.getElementById('contenedorOtroMecanismo1P3s12').classList.add('d-none')
            document.getElementById('txtOtroMecanismo1P3s12').removeAttribute('required')
            document.getElementById('txtOtroMecanismo1P3s12').value = ''
        }
    })
    document.getElementById('selectContabaMecanismo2P3s12').addEventListener('change', () => {
        if (document.getElementById('selectContabaMecanismo2P3s12').value == '1') {
            habilitarChecks(elementosMateria2P3S12, 'habilitar')
        } else {
            habilitarChecks(elementosMateria2P3S12, 'deshabilitar')
            document.getElementById('contenedorOtroMecanismo2P3s12').classList.add('d-none')
            document.getElementById('txtOtroMecanismo2P3s12').removeAttribute('required')
            document.getElementById('txtOtroMecanismo2P3s12').value = ''
        }
    })
    document.getElementById('checkMecanismo161P3s12').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('contenedorOtroMecanismo1P3s12').classList.remove('d-none')
            document.getElementById('txtOtroMecanismo1P3s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroMecanismo1P3s12').classList.add('d-none')
            document.getElementById('txtOtroMecanismo1P3s12').removeAttribute('required')
            document.getElementById('txtOtroMecanismo1P3s12').value = ''
        }
    })
    document.getElementById('checkMecanismo162P3s12').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('contenedorOtroMecanismo2P3s12').classList.remove('d-none')
            document.getElementById('txtOtroMecanismo2P3s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroMecanismo2P3s12').classList.add('d-none')
            document.getElementById('txtOtroMecanismo2P3s12').removeAttribute('required')
            document.getElementById('txtOtroMecanismo2P3s12').value = ''
        }
    })

    // PREGUNTA 4 SECCION 12
    document.querySelector('#questionList a[href="#pregunta4s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        document.getElementById('txtDireccionWeb4s12').setAttribute('disabled', '')
        document.getElementById('txtDireccionWeb4s12').removeAttribute('required')
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12'])
    })
    document.getElementById('selectCuentaSistema4s12').addEventListener('change', () => {
        if (document.getElementById('selectCuentaSistema4s12').value == '1') {
            document.getElementById('txtDireccionWeb4s12').setAttribute('required', '')
            document.getElementById('txtDireccionWeb4s12').removeAttribute('disabled')
        } else {
            document.getElementById('txtDireccionWeb4s12').removeAttribute('required')
            document.getElementById('txtDireccionWeb4s12').setAttribute('disabled', '')
            document.getElementById('txtDireccionWeb4s12').value = ''
        }
    })

    // PREGUNTA 5 SECCION 12
    document.querySelector('#questionList a[href="#pregunta5s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        if (preguntasContestadas['itemPregunta4s12']) {
            cuentaConSistemaElectronico().then((resultado) => {
                if (resultado != undefined && resultado == true) {
                    vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12'])
                } else if (resultado != undefined && resultado == false) {
                    alertify.confirm('Imposible registrar datos !', 'Ha registrado en la pregunta 4 que no cuenta con un sistema electrónico de contrataciones públicas, por cual no puede contestar la pregunta 5 ! <br><br><small>Presione "Ok" para cambiar su respuesta en la pregunta 4 ó "Cancelar" para ser redirigido a la pregunta 6 y continuar con el cuestionario</small>',
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s12"]')).show()
                        },
                        function () {
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta6s12"]')).show()
                        }).set('labels', { ok: 'Ok', cancel: 'Cancelar' });
                } else {
                    console.error(resultado);
                }
            })
        } else {
            alertify.error('Antes debe contestar la pregunta 4')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s12"]')).show()
        }
    })
    document.getElementById('checkEtapaProcedimiento1P5s12').addEventListener('change', function () {
        if (document.getElementById('checkEtapaProcedimiento9P5s12').checked) {
            this.checked = false
            alertify.error('Ya ha marcado que no sabe')
        }
    })
    document.getElementById('checkEtapaProcedimiento2P5s12').addEventListener('change', function () {
        if (document.getElementById('checkEtapaProcedimiento9P5s12').checked) {
            this.checked = false
            alertify.error('Ya ha marcado que no sabe')
        }
    })
    document.getElementById('checkEtapaProcedimiento3P5s12').addEventListener('change', function () {
        if (document.getElementById('checkEtapaProcedimiento9P5s12').checked) {
            this.checked = false
            alertify.error('Ya ha marcado que no sabe')
        }
    })
    document.getElementById('checkEtapaProcedimiento4P5s12').addEventListener('change', function () {
        if (document.getElementById('checkEtapaProcedimiento9P5s12').checked) {
            this.checked = false
            alertify.error('Ya ha marcado que no sabe')
        }
    })
    document.getElementById('checkEtapaProcedimiento5P5s12').addEventListener('change', function () {
        if (document.getElementById('checkEtapaProcedimiento9P5s12').checked) {
            this.checked = false
            alertify.error('Ya ha marcado que no sabe')
        }
    })
    document.getElementById('checkEtapaProcedimiento6P5s12').addEventListener('change', function () {
        if (document.getElementById('checkEtapaProcedimiento9P5s12').checked) {
            this.checked = false
            alertify.error('Ya ha marcado que no sabe')
        }
    })
    document.getElementById('checkEtapaProcedimiento7P5s12').addEventListener('change', function () {
        if (document.getElementById('checkEtapaProcedimiento9P5s12').checked) {
            this.checked = false
            alertify.error('Ya ha marcado que no sabe')
        }
    })
    document.getElementById('checkEtapaProcedimiento8P5s12').addEventListener('change', function () {
        if (document.getElementById('checkEtapaProcedimiento9P5s12').checked) {
            this.checked = false
            alertify.error('Ya ha marcado que no sabe')
        }
        if (this.checked) {
            document.getElementById('contenedorOtroProcedimientoP5s12').classList.remove('d-none')
            document.getElementById('inputEtapaProcedimientoP5s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroProcedimientoP5s12').classList.add('d-none')
            document.getElementById('inputEtapaProcedimientoP5s12').removeAttribute('required')
            document.getElementById('inputEtapaProcedimientoP5s12').value = ''
        }
    })
    document.getElementById('checkEtapaProcedimiento9P5s12').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('checkEtapaProcedimiento1P5s12').checked = false
            document.getElementById('checkEtapaProcedimiento2P5s12').checked = false
            document.getElementById('checkEtapaProcedimiento3P5s12').checked = false
            document.getElementById('checkEtapaProcedimiento4P5s12').checked = false
            document.getElementById('checkEtapaProcedimiento5P5s12').checked = false
            document.getElementById('checkEtapaProcedimiento6P5s12').checked = false
            document.getElementById('checkEtapaProcedimiento7P5s12').checked = false
            document.getElementById('checkEtapaProcedimiento8P5s12').checked = false
            document.getElementById('contenedorOtroProcedimientoP5s12').classList.add('d-none')
            document.getElementById('inputEtapaProcedimientoP5s12').removeAttribute('required')
            document.getElementById('inputEtapaProcedimientoP5s12').value = ''
        }
    })

    // PREGUNTA 6 SECCION 12
    document.querySelector('#questionList a[href="#pregunta6s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        habilitarSelects(['selectTipoFormato16s12', 'selectFrecuenciaActualizacion16s12', 'txtCantidadRegistrada16s12'], 'deshabilitar')
        habilitarSelects(['selectTipoFormato26s12', 'selectFrecuenciaActualizacion26s12', 'txtCantidadRegistrada26s12'], 'deshabilitar')
        habilitarSelects(['selectTipoFormato36s12', 'selectFrecuenciaActualizacion36s12', 'txtCantidadRegistrada36s12'], 'deshabilitar')
        habilitarSelects(['selectTipoFormato46s12', 'selectFrecuenciaActualizacion46s12', 'txtCantidadRegistrada46s12'], 'deshabilitar')
        habilitarSelects(['selectTipoFormato56s12', 'selectFrecuenciaActualizacion56s12', 'txtCantidadRegistrada56s12'], 'deshabilitar')
        habilitarSelects(['selectTipoFormato66s12', 'selectFrecuenciaActualizacion66s12', 'txtCantidadRegistrada66s12'], 'deshabilitar')
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12', 'btnModalGlosarioSubseccionXII2', 'btnModalPregunta6s12'])
    })
    document.getElementById('selectContabaSistema16s12').addEventListener('change', function () {
        if (document.getElementById('selectContabaSistema16s12').value == '1') {
            habilitarSelects(['selectTipoFormato16s12', 'selectFrecuenciaActualizacion16s12', 'txtCantidadRegistrada16s12'], 'habilitar')
        } else {
            habilitarSelects(['selectTipoFormato16s12', 'selectFrecuenciaActualizacion16s12', 'txtCantidadRegistrada16s12'], 'deshabilitar')
        }
    })
    document.getElementById('selectContabaSistema26s12').addEventListener('change', function () {
        if (document.getElementById('selectContabaSistema26s12').value == '1') {
            habilitarSelects(['selectTipoFormato26s12', 'selectFrecuenciaActualizacion26s12', 'txtCantidadRegistrada26s12'], 'habilitar')
        } else {
            habilitarSelects(['selectTipoFormato26s12', 'selectFrecuenciaActualizacion26s12', 'txtCantidadRegistrada26s12'], 'deshabilitar')
        }
    })
    document.getElementById('selectContabaSistema36s12').addEventListener('change', function () {
        if (document.getElementById('selectContabaSistema36s12').value == '1') {
            habilitarSelects(['selectTipoFormato36s12', 'selectFrecuenciaActualizacion36s12', 'txtCantidadRegistrada36s12'], 'habilitar')
        } else {
            habilitarSelects(['selectTipoFormato36s12', 'selectFrecuenciaActualizacion36s12', 'txtCantidadRegistrada36s12'], 'deshabilitar')
        }
    })
    document.getElementById('selectContabaSistema46s12').addEventListener('change', function () {
        if (document.getElementById('selectContabaSistema46s12').value == '1') {
            habilitarSelects(['selectTipoFormato46s12', 'selectFrecuenciaActualizacion46s12', 'txtCantidadRegistrada46s12'], 'habilitar')
        } else {
            habilitarSelects(['selectTipoFormato46s12', 'selectFrecuenciaActualizacion46s12', 'txtCantidadRegistrada46s12'], 'deshabilitar')
        }
    })
    document.getElementById('selectContabaSistema56s12').addEventListener('change', function () {
        if (document.getElementById('selectContabaSistema56s12').value == '1') {
            habilitarSelects(['selectTipoFormato56s12', 'selectFrecuenciaActualizacion56s12', 'txtCantidadRegistrada56s12'], 'habilitar')
        } else {
            habilitarSelects(['selectTipoFormato56s12', 'selectFrecuenciaActualizacion56s12', 'txtCantidadRegistrada56s12'], 'deshabilitar')
        }
    })
    document.getElementById('selectContabaSistema66s12').addEventListener('change', function () {
        if (document.getElementById('selectContabaSistema66s12').value == '1') {
            habilitarSelects(['selectTipoFormato66s12', 'selectFrecuenciaActualizacion66s12', 'txtCantidadRegistrada66s12'], 'habilitar')
        } else {
            habilitarSelects(['selectTipoFormato66s12', 'selectFrecuenciaActualizacion66s12', 'txtCantidadRegistrada66s12'], 'deshabilitar')
        }
    })
    document.getElementById('selectTipoFormato16s12').addEventListener('change', function () {
        if (this.value == '4') {
            document.getElementById('contenedorOtroFormatoTipo1P6s12').classList.remove('d-none')
            document.getElementById('inputOtroFormatoTipo1P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroFormatoTipo1P6s12').classList.add('d-none')
            document.getElementById('inputOtroFormatoTipo1P6s12').removeAttribute('required')
            document.getElementById('inputOtroFormatoTipo1P6s12').value = ''
        }
    })
    document.getElementById('selectTipoFormato26s12').addEventListener('change', function () {
        if (this.value == '4') {
            document.getElementById('contenedorOtroFormatoTipo2P6s12').classList.remove('d-none')
            document.getElementById('inputOtroFormatoTipo2P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroFormatoTipo2P6s12').classList.add('d-none')
            document.getElementById('inputOtroFormatoTipo2P6s12').removeAttribute('required')
            document.getElementById('inputOtroFormatoTipo2P6s12').value = ''
        }
    })
    document.getElementById('selectTipoFormato36s12').addEventListener('change', function () {
        if (this.value == '4') {
            document.getElementById('contenedorOtroFormatoTipo3P6s12').classList.remove('d-none')
            document.getElementById('inputOtroFormatoTipo3P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroFormatoTipo3P6s12').classList.add('d-none')
            document.getElementById('inputOtroFormatoTipo3P6s12').removeAttribute('required')
            document.getElementById('inputOtroFormatoTipo3P6s12').value = ''
        }
    })
    document.getElementById('selectTipoFormato46s12').addEventListener('change', function () {
        if (this.value == '4') {
            document.getElementById('contenedorOtroFormatoTipo4P6s12').classList.remove('d-none')
            document.getElementById('inputOtroFormatoTipo4P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroFormatoTipo4P6s12').classList.add('d-none')
            document.getElementById('inputOtroFormatoTipo4P6s12').removeAttribute('required')
            document.getElementById('inputOtroFormatoTipo4P6s12').value = ''
        }
    })
    document.getElementById('selectTipoFormato56s12').addEventListener('change', function () {
        if (this.value == '4') {
            document.getElementById('contenedorOtroFormatoTipo5P6s12').classList.remove('d-none')
            document.getElementById('inputOtroFormatoTipo5P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroFormatoTipo5P6s12').classList.add('d-none')
            document.getElementById('inputOtroFormatoTipo5P6s12').removeAttribute('required')
            document.getElementById('inputOtroFormatoTipo5P6s12').value = ''
        }
    })
    document.getElementById('selectTipoFormato66s12').addEventListener('change', function () {
        if (this.value == '4') {
            document.getElementById('contenedorOtroFormatoTipo6P6s12').classList.remove('d-none')
            document.getElementById('inputOtroFormatoTipo6P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtroFormatoTipo6P6s12').classList.add('d-none')
            document.getElementById('inputOtroFormatoTipo6P6s12').removeAttribute('required')
            document.getElementById('inputOtroFormatoTipo6P6s12').value = ''
        }
    })
    document.getElementById('selectFrecuenciaActualizacion16s12').addEventListener('change', function () {
        if (this.value == '11') {
            document.getElementById('contenedorOtraFrecuenciaTipo1P6s12').classList.remove('d-none')
            document.getElementById('inputOtraFrecuenciaTipo1P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFrecuenciaTipo1P6s12').classList.add('d-none')
            document.getElementById('inputOtraFrecuenciaTipo1P6s12').removeAttribute('required')
            document.getElementById('inputOtraFrecuenciaTipo1P6s12').value = ''
        }
    })
    document.getElementById('selectFrecuenciaActualizacion26s12').addEventListener('change', function () {
        if (this.value == '11') {
            document.getElementById('contenedorOtraFrecuenciaTipo2P6s12').classList.remove('d-none')
            document.getElementById('inputOtraFrecuenciaTipo2P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFrecuenciaTipo2P6s12').classList.add('d-none')
            document.getElementById('inputOtraFrecuenciaTipo2P6s12').removeAttribute('required')
            document.getElementById('inputOtraFrecuenciaTipo2P6s12').value = ''
        }
    })
    document.getElementById('selectFrecuenciaActualizacion36s12').addEventListener('change', function () {
        if (this.value == '11') {
            document.getElementById('contenedorOtraFrecuenciaTipo3P6s12').classList.remove('d-none')
            document.getElementById('inputOtraFrecuenciaTipo3P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFrecuenciaTipo3P6s12').classList.add('d-none')
            document.getElementById('inputOtraFrecuenciaTipo3P6s12').removeAttribute('required')
            document.getElementById('inputOtraFrecuenciaTipo3P6s12').value = ''
        }
    })
    document.getElementById('selectFrecuenciaActualizacion46s12').addEventListener('change', function () {
        if (this.value == '11') {
            document.getElementById('contenedorOtraFrecuenciaTipo4P6s12').classList.remove('d-none')
            document.getElementById('inputOtraFrecuenciaTipo4P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFrecuenciaTipo4P6s12').classList.add('d-none')
            document.getElementById('inputOtraFrecuenciaTipo4P6s12').removeAttribute('required')
            document.getElementById('inputOtraFrecuenciaTipo4P6s12').value = ''
        }
    })
    document.getElementById('selectFrecuenciaActualizacion56s12').addEventListener('change', function () {
        if (this.value == '11') {
            document.getElementById('contenedorOtraFrecuenciaTipo5P6s12').classList.remove('d-none')
            document.getElementById('inputOtraFrecuenciaTipo5P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFrecuenciaTipo5P6s12').classList.add('d-none')
            document.getElementById('inputOtraFrecuenciaTipo5P6s12').removeAttribute('required')
            document.getElementById('inputOtraFrecuenciaTipo5P6s12').value = ''
        }
    })
    document.getElementById('selectFrecuenciaActualizacion66s12').addEventListener('change', function () {
        if (this.value == '11') {
            document.getElementById('contenedorOtraFrecuenciaTipo6P6s12').classList.remove('d-none')
            document.getElementById('inputOtraFrecuenciaTipo6P6s12').setAttribute('required', '')
        } else {
            document.getElementById('contenedorOtraFrecuenciaTipo6P6s12').classList.add('d-none')
            document.getElementById('inputOtraFrecuenciaTipo6P6s12').removeAttribute('required')
            document.getElementById('inputOtraFrecuenciaTipo6P6s12').value = ''
        }
    })

    // PREGUNTA 7 SECCION 12
    document.querySelector('#questionList a[href="#pregunta7s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        if (preguntasContestadas['itemPregunta2s12']) {
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12', 'btnModalGlosarioSubseccionXII3'])
        } else {
            alertify.error('Antes debe contestar la pregunta 2')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta2s12"]')).show()
        }
    })
    elementosContratosP7 = [
        'txtContratosRealizadosTipo1P7s12',
        'txtContratosRealizadosTipo2P7s12',
        'txtContratosRealizadosTipo3P7s12',
        'txtContratosRealizadosTipo4P7s12',
        'txtContratosRealizadosTipo5P7s12'
    ]
    escuchadoresParaSumaDeTotales('contratosP7', 'txtTotalContratosProcedimientosP7s12', '', elementosContratosP7, 7, 12)
    document.getElementById('checkNoAplicaProcedimientoTipo1P7s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion1 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion1 == false) {
                    document.getElementById('txtContratosRealizadosTipo1P7s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosRealizadosTipo1P7s12').value = 0
                    document.getElementById('txtTotalContratosProcedimientosP7s12').value = obtenerSumaDeTotales('contratosP7', 7, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtContratosRealizadosTipo1P7s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo2P7s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion2 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion2 == false) {
                    document.getElementById('txtContratosRealizadosTipo2P7s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosRealizadosTipo2P7s12').value = 0
                    document.getElementById('txtTotalContratosProcedimientosP7s12').value = obtenerSumaDeTotales('contratosP7', 7, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtContratosRealizadosTipo2P7s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo3P7s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion3 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion3 == false) {
                    document.getElementById('txtContratosRealizadosTipo3P7s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosRealizadosTipo3P7s12').value = 0
                    document.getElementById('txtTotalContratosProcedimientosP7s12').value = obtenerSumaDeTotales('contratosP7', 7, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtContratosRealizadosTipo3P7s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo4P7s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion4 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion4 == false) {
                    document.getElementById('txtContratosRealizadosTipo4P7s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosRealizadosTipo4P7s12').value = 0
                    document.getElementById('txtTotalContratosProcedimientosP7s12').value = obtenerSumaDeTotales('contratosP7', 7, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtContratosRealizadosTipo4P7s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo5P7s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion5 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion5 == false) {
                    document.getElementById('txtContratosRealizadosTipo5P7s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosRealizadosTipo5P7s12').value = 0
                    document.getElementById('txtTotalContratosProcedimientosP7s12').value = obtenerSumaDeTotales('contratosP7', 7, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtContratosRealizadosTipo5P7s12').removeAttribute('disabled')
        }
    })

    // PREGUNTA 8 SECCION 12
    document.querySelector('#questionList a[href="#pregunta8s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        if (preguntasContestadas['itemPregunta2s12'] && preguntasContestadas['itemPregunta7s12']) {
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12', 'btnModalGlosarioSubseccionXII3'])
        } else {
            alertify.error('Antes debe contestar las preguntas 2 y 7')
            !preguntasContestadas['itemPregunta2s12'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta2s12"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta7s12"]')).show()
        }
    })
    elementosContratosAdquisicionesP8 = [
        'txtContratosAdquisicionesTipo1P8s12',
        'txtContratosAdquisicionesTipo2P8s12',
        'txtContratosAdquisicionesTipo3P8s12',
        'txtContratosAdquisicionesTipo4P8s12',
        'txtContratosAdquisicionesTipo5P8s12'
    ]
    elementosContratosObrasP8 = [
        'txtContratosObraPublicaTipo1P8s12',
        'txtContratosObraPublicaTipo2P8s12',
        'txtContratosObraPublicaTipo3P8s12',
        'txtContratosObraPublicaTipo4P8s12',
        'txtContratosObraPublicaTipo5P8s12'
    ]
    escuchadoresParaSumaDeTotales('contratos1P8', 'txtTotalContratosGralP8s12', 'txtTotalContratosGralAdquisicionesP8s12', elementosContratosAdquisicionesP8, 8, 12)
    escuchadoresParaSumaDeTotales('contratos2P8', 'txtTotalContratosGralP8s12', 'txtTotalContratosGralObraPublicaP8s12', elementosContratosObrasP8, 8, 12)
    escuchadoresParaSumaDeTotales('contratosP8p1', 'txtTotalContratosTipo1P8s12', '', ['txtContratosAdquisicionesTipo1P8s12', 'txtContratosObraPublicaTipo1P8s12'], 8, 12)
    escuchadoresParaSumaDeTotales('contratosP8p2', 'txtTotalContratosTipo2P8s12', '', ['txtContratosAdquisicionesTipo2P8s12', 'txtContratosObraPublicaTipo2P8s12'], 8, 12)
    escuchadoresParaSumaDeTotales('contratosP8p3', 'txtTotalContratosTipo3P8s12', '', ['txtContratosAdquisicionesTipo3P8s12', 'txtContratosObraPublicaTipo3P8s12'], 8, 12)
    escuchadoresParaSumaDeTotales('contratosP8p4', 'txtTotalContratosTipo4P8s12', '', ['txtContratosAdquisicionesTipo4P8s12', 'txtContratosObraPublicaTipo4P8s12'], 8, 12)
    escuchadoresParaSumaDeTotales('contratosP8p5', 'txtTotalContratosTipo5P8s12', '', ['txtContratosAdquisicionesTipo5P8s12', 'txtContratosObraPublicaTipo5P8s12'], 8, 12)
    document.getElementById('checkNoAplicaProcedimientoTipo1P8s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion1 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion1 == false) {
                    document.getElementById('txtContratosAdquisicionesTipo1P8s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosAdquisicionesTipo1P8s12').value = 0
                    document.getElementById('txtContratosObraPublicaTipo1P8s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosObraPublicaTipo1P8s12').value = 0
                    document.getElementById('txtTotalContratosTipo1P8s12').value = 0
                    document.getElementById('txtTotalContratosGralP8s12').value = obtenerSumaDeTotales('ambosContratosP8', 8, 12)
                    document.getElementById('txtTotalContratosGralAdquisicionesP8s12').value = obtenerSumaDeTotales('contratos1P8', 8, 12)
                    document.getElementById('txtTotalContratosGralObraPublicaP8s12').value = obtenerSumaDeTotales('contratos2P8', 8, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtContratosAdquisicionesTipo1P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosObraPublicaTipo1P8s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo2P8s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion2 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion2 == false) {
                    document.getElementById('txtContratosAdquisicionesTipo2P8s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosAdquisicionesTipo2P8s12').value = 0
                    document.getElementById('txtContratosObraPublicaTipo2P8s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosObraPublicaTipo2P8s12').value = 0
                    document.getElementById('txtTotalContratosTipo2P8s12').value = 0
                    document.getElementById('txtTotalContratosGralP8s12').value = obtenerSumaDeTotales('ambosContratosP8', 8, 12)
                    document.getElementById('txtTotalContratosGralAdquisicionesP8s12').value = obtenerSumaDeTotales('contratos1P8', 8, 12)
                    document.getElementById('txtTotalContratosGralObraPublicaP8s12').value = obtenerSumaDeTotales('contratos2P8', 8, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtContratosAdquisicionesTipo2P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosObraPublicaTipo2P8s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo3P8s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion3 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion3 == false) {
                    document.getElementById('txtContratosAdquisicionesTipo3P8s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosAdquisicionesTipo3P8s12').value = 0
                    document.getElementById('txtContratosObraPublicaTipo3P8s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosObraPublicaTipo3P8s12').value = 0
                    document.getElementById('txtTotalContratosTipo3P8s12').value = 0
                    document.getElementById('txtTotalContratosGralP8s12').value = obtenerSumaDeTotales('ambosContratosP8', 8, 12)
                    document.getElementById('txtTotalContratosGralAdquisicionesP8s12').value = obtenerSumaDeTotales('contratos1P8', 8, 12)
                    document.getElementById('txtTotalContratosGralObraPublicaP8s12').value = obtenerSumaDeTotales('contratos2P8', 8, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtContratosAdquisicionesTipo3P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosObraPublicaTipo3P8s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo4P8s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion4 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion4 == false) {
                    document.getElementById('txtContratosAdquisicionesTipo4P8s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosAdquisicionesTipo4P8s12').value = 0
                    document.getElementById('txtContratosObraPublicaTipo4P8s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosObraPublicaTipo4P8s12').value = 0
                    document.getElementById('txtTotalContratosTipo4P8s12').value = 0
                    document.getElementById('txtTotalContratosGralP8s12').value = obtenerSumaDeTotales('ambosContratosP8', 8, 12)
                    document.getElementById('txtTotalContratosGralAdquisicionesP8s12').value = obtenerSumaDeTotales('contratos1P8', 8, 12)
                    document.getElementById('txtTotalContratosGralObraPublicaP8s12').value = obtenerSumaDeTotales('contratos2P8', 8, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtContratosAdquisicionesTipo4P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosObraPublicaTipo4P8s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo5P8s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion5 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion5 == false) {
                    document.getElementById('txtContratosAdquisicionesTipo5P8s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosAdquisicionesTipo5P8s12').value = 0
                    document.getElementById('txtContratosObraPublicaTipo5P8s12').setAttribute('disabled', '')
                    document.getElementById('txtContratosObraPublicaTipo5P8s12').value = 0
                    document.getElementById('txtTotalContratosTipo5P8s12').value = 0
                    document.getElementById('txtTotalContratosGralP8s12').value = obtenerSumaDeTotales('ambosContratosP8', 8, 12)
                    document.getElementById('txtTotalContratosGralAdquisicionesP8s12').value = obtenerSumaDeTotales('contratos1P8', 8, 12)
                    document.getElementById('txtTotalContratosGralObraPublicaP8s12').value = obtenerSumaDeTotales('contratos2P8', 8, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtContratosAdquisicionesTipo5P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosObraPublicaTipo5P8s12').removeAttribute('disabled')
        }
    })

    // PREGUNTA 9 SECCION 12
    document.querySelector('#questionList a[href="#pregunta9s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        if (preguntasContestadas['itemPregunta2s12']) {
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12', 'btnModalGlosarioSubseccionXII3'])
        } else {
            alertify.error('Antes debe contestar la pregunta 2')
            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta2s12"]')).show()
        }
    })
    elementosMontosP9 = [
        'txtMontoContratosTipo1P9s12',
        'txtMontoContratosTipo2P9s12',
        'txtMontoContratosTipo3P9s12',
        'txtMontoContratosTipo4P9s12',
        'txtMontoContratosTipo5P9s12'
    ]
    escuchadoresParaSumaDeTotales('montosP9', 'txtMontoTotalContratosP9s12', '', elementosMontosP9, 9, 12)
    document.getElementById('checkNoAplicaProcedimientoTipo1P9s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion1 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion1 == false) {
                    document.getElementById('txtMontoContratosTipo1P9s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoContratosTipo1P9s12').value = 0
                    document.getElementById('txtMontoTotalContratosP9s12').value = obtenerSumaDeTotales('montosP9', 9, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtMontoContratosTipo1P9s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo2P9s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion2 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion2 == false) {
                    document.getElementById('txtMontoContratosTipo2P9s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoContratosTipo2P9s12').value = 0
                    document.getElementById('txtMontoTotalContratosP9s12').value = obtenerSumaDeTotales('montosP9', 9, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtMontoContratosTipo2P9s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo3P9s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion3 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion3 == false) {
                    document.getElementById('txtMontoContratosTipo3P9s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoContratosTipo3P9s12').value = 0
                    document.getElementById('txtMontoTotalContratosP9s12').value = obtenerSumaDeTotales('montosP9', 9, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtMontoContratosTipo3P9s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo4P9s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion4 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion4 == false) {
                    document.getElementById('txtMontoContratosTipo4P9s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoContratosTipo4P9s12').value = 0
                    document.getElementById('txtMontoTotalContratosP9s12').value = obtenerSumaDeTotales('montosP9', 9, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtMontoContratosTipo4P9s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo5P9s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion5 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion5 == false) {
                    document.getElementById('txtMontoContratosTipo5P9s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoContratosTipo5P9s12').value = 0
                    document.getElementById('txtMontoTotalContratosP9s12').value = obtenerSumaDeTotales('montosP9', 9, 12)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtMontoContratosTipo5P9s12').removeAttribute('disabled')
        }
    })

    // PREGUNTA 10 SECCION 12
    document.querySelector('#questionList a[href="#pregunta10s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        if (preguntasContestadas['itemPregunta2s12'] && preguntasContestadas['itemPregunta9s12']) {
            vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12', 'btnModalGlosarioSubseccionXII3'])
        } else {
            alertify.error('Antes debe contestar las preguntas 2 y 9')
            !preguntasContestadas['itemPregunta2s12'] ? new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta2s12"]')).show() : new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta9s12"]')).show()
        }
    })
    elementosMontosAdquisicionesP10 = [
        'txtMontoAdquisicionesTipo1P10s12',
        'txtMontoAdquisicionesTipo2P10s12',
        'txtMontoAdquisicionesTipo3P10s12',
        'txtMontoAdquisicionesTipo4P10s12',
        'txtMontoAdquisicionesTipo5P10s12'
    ]
    elementosMontosObrasP10 = [
        'txtMontoObraPublicaTipo1P10s12',
        'txtMontoObraPublicaTipo2P10s12',
        'txtMontoObraPublicaTipo3P10s12',
        'txtMontoObraPublicaTipo4P10s12',
        'txtMontoObraPublicaTipo5P10s12'
    ]
    escuchadoresParaSumaDeTotales('montos1P10', 'txtMontoTotalContratosGralP10s12', 'txtMontoTotalGralAdquisicionesP10s12', elementosMontosAdquisicionesP10, 10, 12)
    escuchadoresParaSumaDeTotales('montos2P10', 'txtMontoTotalContratosGralP10s12', 'txtMontoTotalGralObraPublicaP10s12', elementosMontosObrasP10, 10, 12)
    escuchadoresParaSumaDeTotales('contratosP10p1', 'txtMontoTotalContratosTipo1P10s12', '', ['txtMontoAdquisicionesTipo1P10s12', 'txtMontoObraPublicaTipo1P10s12'], 10, 12)
    escuchadoresParaSumaDeTotales('contratosP10p2', 'txtMontoTotalContratosTipo2P10s12', '', ['txtMontoAdquisicionesTipo2P10s12', 'txtMontoObraPublicaTipo2P10s12'], 10, 12)
    escuchadoresParaSumaDeTotales('contratosP10p3', 'txtMontoTotalContratosTipo3P10s12', '', ['txtMontoAdquisicionesTipo3P10s12', 'txtMontoObraPublicaTipo3P10s12'], 10, 12)
    escuchadoresParaSumaDeTotales('contratosP10p4', 'txtMontoTotalContratosTipo4P10s12', '', ['txtMontoAdquisicionesTipo4P10s12', 'txtMontoObraPublicaTipo4P10s12'], 10, 12)
    escuchadoresParaSumaDeTotales('contratosP10p5', 'txtMontoTotalContratosTipo5P10s12', '', ['txtMontoAdquisicionesTipo5P10s12', 'txtMontoObraPublicaTipo5P10s12'], 10, 12)
    document.getElementById('checkNoAplicaProcedimientoTipo1P10s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion1 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion1 == false) {
                    document.getElementById('txtMontoAdquisicionesTipo1P10s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoAdquisicionesTipo1P10s12').value = 0
                    document.getElementById('txtMontoObraPublicaTipo1P10s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoObraPublicaTipo1P10s12').value = 0
                    document.getElementById('txtMontoTotalContratosTipo1P10s12').value = 0
                    document.getElementById('txtMontoTotalContratosGralP10s12').value = (Math.round(obtenerSumaDeTotales('ambosMontosP10', 10, 12) * 100) / 100).toFixed(2)
                    document.getElementById('txtMontoTotalGralAdquisicionesP10s12').value = (Math.round(obtenerSumaDeTotales('montos1P10', 10, 12) * 100) / 100).toFixed(2)
                    document.getElementById('txtMontoTotalGralObraPublicaP10s12').value = (Math.round(obtenerSumaDeTotales('montos2P10', 10, 12) * 100) / 100).toFixed(2)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtMontoAdquisicionesTipo1P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoObraPublicaTipo1P10s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo2P10s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion2 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion2 == false) {
                    document.getElementById('txtMontoAdquisicionesTipo2P10s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoAdquisicionesTipo2P10s12').value = 0
                    document.getElementById('txtMontoObraPublicaTipo2P10s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoObraPublicaTipo2P10s12').value = 0
                    document.getElementById('txtMontoTotalContratosTipo2P10s12').value = 0
                    document.getElementById('txtMontoTotalContratosGralP10s12').value = (Math.round(obtenerSumaDeTotales('ambosMontosP10', 10, 12) * 100) / 100).toFixed(2)
                    document.getElementById('txtMontoTotalGralAdquisicionesP10s12').value = (Math.round(obtenerSumaDeTotales('montos1P10', 10, 12) * 100) / 100).toFixed(2)
                    document.getElementById('txtMontoTotalGralObraPublicaP10s12').value = (Math.round(obtenerSumaDeTotales('montos2P10', 10, 12) * 100) / 100).toFixed(2)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtMontoAdquisicionesTipo2P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoObraPublicaTipo2P10s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo3P10s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion3 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion3 == false) {
                    document.getElementById('txtMontoAdquisicionesTipo3P10s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoAdquisicionesTipo3P10s12').value = 0
                    document.getElementById('txtMontoObraPublicaTipo3P10s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoObraPublicaTipo3P10s12').value = 0
                    document.getElementById('txtMontoTotalContratosTipo3P10s12').value = 0
                    document.getElementById('txtMontoTotalContratosGralP10s12').value = (Math.round(obtenerSumaDeTotales('ambosMontosP10', 10, 12) * 100) / 100).toFixed(2)
                    document.getElementById('txtMontoTotalGralAdquisicionesP10s12').value = (Math.round(obtenerSumaDeTotales('montos1P10', 10, 12) * 100) / 100).toFixed(2)
                    document.getElementById('txtMontoTotalGralObraPublicaP10s12').value = (Math.round(obtenerSumaDeTotales('montos2P10', 10, 12) * 100) / 100).toFixed(2)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtMontoAdquisicionesTipo3P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoObraPublicaTipo3P10s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo4P10s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion4 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion4 == false) {
                    document.getElementById('txtMontoAdquisicionesTipo4P10s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoAdquisicionesTipo4P10s12').value = 0
                    document.getElementById('txtMontoObraPublicaTipo4P10s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoObraPublicaTipo4P10s12').value = 0
                    document.getElementById('txtMontoTotalContratosTipo4P10s12').value = 0
                    document.getElementById('txtMontoTotalContratosGralP10s12').value = (Math.round(obtenerSumaDeTotales('ambosMontosP10', 10, 12) * 100) / 100).toFixed(2)
                    document.getElementById('txtMontoTotalGralAdquisicionesP10s12').value = (Math.round(obtenerSumaDeTotales('montos1P10', 10, 12) * 100) / 100).toFixed(2)
                    document.getElementById('txtMontoTotalGralObraPublicaP10s12').value = (Math.round(obtenerSumaDeTotales('montos2P10', 10, 12) * 100) / 100).toFixed(2)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtMontoAdquisicionesTipo4P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoObraPublicaTipo4P10s12').removeAttribute('disabled')
        }
    })
    document.getElementById('checkNoAplicaProcedimientoTipo5P10s12').addEventListener('change', function () {
        if (this.checked) {
            obtenerProcedimientosDeContratacion().then(() => {
                if (procedimientoDeContratacion5 == true) {
                    alertify.error('Ha seleccionado este procedimiento en la pregunta 2')
                    this.checked = false
                } else if (procedimientoDeContratacion5 == false) {
                    document.getElementById('txtMontoAdquisicionesTipo5P10s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoAdquisicionesTipo5P10s12').value = 0
                    document.getElementById('txtMontoObraPublicaTipo5P10s12').setAttribute('disabled', '')
                    document.getElementById('txtMontoObraPublicaTipo5P10s12').value = 0
                    document.getElementById('txtMontoTotalContratosTipo5P10s12').value = 0
                    document.getElementById('txtMontoTotalContratosGralP10s12').value = (Math.round(obtenerSumaDeTotales('ambosMontosP10', 10, 12) * 100) / 100).toFixed(2)
                    document.getElementById('txtMontoTotalGralAdquisicionesP10s12').value = (Math.round(obtenerSumaDeTotales('montos1P10', 10, 12) * 100) / 100).toFixed(2)
                    document.getElementById('txtMontoTotalGralObraPublicaP10s12').value = (Math.round(obtenerSumaDeTotales('montos2P10', 10, 12) * 100) / 100).toFixed(2)
                } else {
                    this.checked = false
                }
            })
        } else {
            document.getElementById('txtMontoAdquisicionesTipo5P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoObraPublicaTipo5P10s12').removeAttribute('disabled')
        }
    })

    // PREGUNTA 11 SECCION 12
    document.querySelector('#questionList a[href="#pregunta11s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        document.getElementById('txtTotalContratosConvenios11s12').setAttribute('disabled', '')
        document.getElementById('txtTotalContratosConvenios11s12').value = 0
        document.getElementById('txtMontoAsociadoContratos11s12').setAttribute('disabled', '')
        document.getElementById('txtMontoAsociadoContratos11s12').value = 0
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12', 'btnModalGlosarioSubseccionXII3'])
    })
    document.getElementById('selectImplementoEsquema11s12').addEventListener('change', function () {
        if (this.value == '1') {
            document.getElementById('txtTotalContratosConvenios11s12').removeAttribute('disabled')
            document.getElementById('txtTotalContratosConvenios11s12').setAttribute('required', '')
            document.getElementById('txtMontoAsociadoContratos11s12').removeAttribute('disabled')
            document.getElementById('txtMontoAsociadoContratos11s12').setAttribute('required', '')
        } else {
            document.getElementById('txtTotalContratosConvenios11s12').setAttribute('disabled', '')
            document.getElementById('txtTotalContratosConvenios11s12').removeAttribute('required')
            document.getElementById('txtTotalContratosConvenios11s12').value = 0
            document.getElementById('txtMontoAsociadoContratos11s12').setAttribute('disabled', '')
            document.getElementById('txtMontoAsociadoContratos11s12').removeAttribute('required')
            document.getElementById('txtMontoAsociadoContratos11s12').value = 0
        }
    })

    // PREGUNTA 12 SECCION 12
    document.querySelector('#questionList a[href="#pregunta12s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        document.getElementById('txtTotalContratacionesCompras12s12').setAttribute('disabled', '')
        document.getElementById('txtTotalContratacionesCompras12s12').value = 0
        document.getElementById('txtMontoAsociadoCompras12s12').setAttribute('disabled', '')
        document.getElementById('txtMontoAsociadoCompras12s12').value = 0
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12', 'btnModalGlosarioSubseccionXII3'])
    })
    document.getElementById('selectImplementoComprasConsolidadas12s12').addEventListener('change', function () {
        if (this.value == '1') {
            document.getElementById('txtTotalContratacionesCompras12s12').removeAttribute('disabled')
            document.getElementById('txtTotalContratacionesCompras12s12').setAttribute('required', '')
            document.getElementById('txtMontoAsociadoCompras12s12').removeAttribute('disabled')
            document.getElementById('txtMontoAsociadoCompras12s12').setAttribute('required', '')
        } else {
            document.getElementById('txtTotalContratacionesCompras12s12').setAttribute('disabled', '')
            document.getElementById('txtTotalContratacionesCompras12s12').removeAttribute('required')
            document.getElementById('txtTotalContratacionesCompras12s12').value = 0
            document.getElementById('txtMontoAsociadoCompras12s12').setAttribute('disabled', '')
            document.getElementById('txtMontoAsociadoCompras12s12').removeAttribute('required')
            document.getElementById('txtMontoAsociadoCompras12s12').value = 0
        }
    })

    // PREGUNTA 13 SECCION 12
    document.querySelector('#questionList a[href="#pregunta13s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12', 'btnModalGlosarioSubseccionXII3'])
    })

    // PREGUNTA 14 SECCION 12
    document.querySelector('#questionList a[href="#pregunta14s12"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        vizualizarModalesAyuda(['btnModalInstrucccionesGeneralesS12', 'btnModalGlosarioSubseccionXII4'])
    })

    // FIN DEL CUESTIONARIO
    document.querySelector('#questionList a[href="#finCuestionario"]').addEventListener('shown.bs.tab', () => {
        quitarItemsActive(1)
        quitarItemsActive(12)
        document.getElementById('itemFinCuestionario').classList.remove('active')
        vizualizarModalesAyuda([''])
        document.getElementById('btnModalVideosDeAyuda').classList.add('d-none')
    })
    document.getElementById('btnFinalizarCuestionario').addEventListener('click', () => {
        alertify.confirm(
            'Finalizando cuestionario...',
            '<span class="font-weight-bold">¿Seguro de querer finalizar el cuestionario?</span> Recuerda que no podrás volver a hacer cambios en tus respuestas.',
            function () {
                showLoading()
                setTimeout(() => {
                    let preguntasFaltantes = 46, // Maximo total de preguntas
                        preguntasPorContestar = []
                    verificarPreguntasContestadas().then(() => {
                        preguntasContestadas['itemPregunta1s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 1, Sección 1')
                        preguntasContestadas['itemPregunta2s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 2, Sección 1')
                        preguntasContestadas['itemPregunta3s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 3, Sección 1')
                        preguntasContestadas['itemPregunta4s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 4, Sección 1')
                        preguntasContestadas['itemPregunta5s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 5, Sección 1')
                        preguntasContestadas['itemPregunta6s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 6, Sección 1')
                        preguntasContestadas['itemPregunta7s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 7, Sección 1')
                        preguntasContestadas['itemPregunta8s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 8, Sección 1')
                        preguntasContestadas['itemPregunta9s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 9, Sección 1')
                        preguntasContestadas['itemPregunta10s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 10, Sección 1')
                        preguntasContestadas['itemPregunta11s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 11, Sección 1')
                        preguntasContestadas['itemPregunta12s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 12, Sección 1')
                        preguntasContestadas['itemPregunta13s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 13, Sección 1')
                        preguntasContestadas['itemPregunta14s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 14, Sección 1')
                        preguntasContestadas['itemPregunta15s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 15, Sección 1')
                        preguntasContestadas['itemPregunta16s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 16, Sección 1')
                        contabaConElementos().then((res) => {
                            if (res != undefined && res == true) {
                                preguntasContestadas['itemPregunta17s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 17, Sección 1')
                                preguntasContestadas['itemPregunta18s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 18, Sección 1')
                            } else if (res != undefined && res == false) {
                                preguntasFaltantes -= 2
                            } else if (res != undefined && res == 'noContestada') {
                                preguntasPorContestar.push('Pregunta 17, Sección 1')
                                preguntasPorContestar.push('Pregunta 18, Sección 1')
                            } else {
                                console.error('Error de petición: ' + res)
                            }
                            preguntasContestadas['itemPregunta19s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 19, Sección 1')
                            preguntasContestadas['itemPregunta24s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 24, Sección 1')
                            preguntasContestadas['itemPregunta25s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 25, Sección 1')
                            seContabilizaronInmueblesEducacion().then((res) => {
                                if (res != undefined && res == true) {
                                    preguntasContestadas['itemPregunta26s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 26, Sección 1')
                                } else if (res != undefined && res == false) {
                                    preguntasFaltantes--
                                } else if (res != undefined && res == 'noContestada') {
                                    preguntasPorContestar.push('Pregunta 26, Sección 1')
                                } else {
                                    console.error('Error de petición: ' + res)
                                }
                                preguntasContestadas['itemPregunta27s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 27, Sección 1')
                                seContabilizaronInmueblesSalud().then((res) => {
                                    if (res != undefined && res == true) {
                                        preguntasContestadas['itemPregunta28s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 28, Sección 1')
                                    } else if (res != undefined && res == false) {
                                        preguntasFaltantes--
                                    } else if (res != undefined && res == 'noContestada') {
                                        preguntasPorContestar.push('Pregunta 28, Sección 1')
                                    } else {
                                        console.error('Error de petición: ' + res)
                                    }
                                    preguntasContestadas['itemPregunta29s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 29, Sección 1')
                                    seContabilizaronInmueblesDeporte().then((res) => {
                                        if (res != undefined && res == true) {
                                            preguntasContestadas['itemPregunta30s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 30, Sección 1')
                                        } else if (res != undefined && res == false) {
                                            preguntasFaltantes--
                                        } else if (res != undefined && res == 'noContestada') {
                                            preguntasPorContestar.push('Pregunta 30, Sección 1')
                                        } else {
                                            console.error('Error de petición: ' + res)
                                        }
                                        preguntasContestadas['itemPregunta31s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 31, Sección 1')
                                        preguntasContestadas['itemPregunta32s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 32, Sección 1')
                                        preguntasContestadas['itemPregunta33s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 33, Sección 1')
                                        preguntasContestadas['itemPregunta34s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 34, Sección 1')
                                        seContabilizoEquipoInformatico().then((res) => {
                                            if (res != undefined && res == true) {
                                                preguntasContestadas['itemPregunta35s1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 35, Sección 1')
                                            } else if (res != undefined && res == false) {
                                                preguntasFaltantes--
                                            } else if (res != undefined && res == 'noContestada') {
                                                preguntasPorContestar.push('Pregunta 35, Sección 1')
                                            } else {
                                                console.error('Error de petición: ' + res)
                                            }
                                            preguntasContestadas['itemComplementoS1'] ? preguntasFaltantes-- : preguntasPorContestar.push('Complemento, Sección 1')
                                            preguntasContestadas['itemPregunta1s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 1, Sección 12')
                                            preguntasContestadas['itemPregunta2s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 2, Sección 12')
                                            preguntasContestadas['itemPregunta3s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 3, Sección 12')
                                            preguntasContestadas['itemPregunta4s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 4, Sección 12')
                                            cuentaConSistemaElectronico().then((res) => {
                                                if (res != undefined && res == true) {
                                                    preguntasContestadas['itemPregunta5s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 5, Sección 12')
                                                } else if (res != undefined && res == false) {
                                                    preguntasFaltantes--
                                                } else if (res != undefined && res == 'noContestada') {
                                                    preguntasPorContestar.push('Pregunta 5, Sección 12')
                                                } else {
                                                    console.error('Error de petición: ' + res)
                                                }
                                                preguntasContestadas['itemPregunta6s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 6, Sección 12')
                                                preguntasContestadas['itemPregunta7s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 7, Sección 12')
                                                preguntasContestadas['itemPregunta8s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 8, Sección 12')
                                                preguntasContestadas['itemPregunta9s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 9, Sección 12')
                                                preguntasContestadas['itemPregunta10s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 10, Sección 12')
                                                preguntasContestadas['itemPregunta11s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 11, Sección 12')
                                                preguntasContestadas['itemPregunta12s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 12, Sección 12')
                                                preguntasContestadas['itemPregunta13s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 13, Sección 12')
                                                preguntasContestadas['itemPregunta14s12'] ? preguntasFaltantes-- : preguntasPorContestar.push('Pregunta 14, Sección 12')

                                                if (preguntasFaltantes == 0) {
                                                    finalizarCuestionarioEnBD().then((res) => {
                                                        if (res != undefined && res == 'success') {
                                                            finalizarCuestionarioEnDOM()
                                                            alertify.success('Cuestionario finalizado !')
                                                        } else if (res != undefined && res == 'error') {
                                                            alertify.error('Imposible finalizar cuestionario !')
                                                        }
                                                        hideLoading()
                                                    })
                                                } else {
                                                    alertify.alert('Imposible finalizar cuestionario !', ('Aún debe contestar las siguientes preguntas: <br><br><span class="font-weight-bold"><small><ul class="mb-0"><li>' + preguntasPorContestar.join('.</li><li>') + '.</li></ul></small></span>')).set('label', 'Ok');
                                                    hideLoading()
                                                }
                                            })
                                        })
                                    })
                                })
                            })
                        })
                    })
                }, 800)
            },
            function () {
                alertify.error('Cancelado')
            }
        ).set('labels', { ok: 'SI', cancel: 'Cancelar' })
    })
    document.getElementById('contenedorBtnGenerarReporte').addEventListener('click', () => {
        window.open('templates/questionaryReport2021.php', '_blank')
    })

    // CERRAR SESION
    document.getElementById('btnSalirCuestionario').addEventListener('click', () => {
        alertify.confirm(
            'Saliendo...',
            'Se requiere confirmación para cerrar la sesión',
            function () {
                cerrarSesion().then((res) => {
                    if (res != undefined && res == 'success') {
                        alertify.success('Sesión terminada !')
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

// FUNCIONES PARA VALIDACION PREGUNTAS 1 Y 3
verificarFuncionesIguales = (select) => {
    let listaSelects = [
        'funcionPrincipal',
        'funcionSecundariaUno',
        'funcionSecundariaDos',
        'funcionSecundariaTres',
        'funcionSecundariaCuatro',
        'funcionSecundariaCinco'
    ], x = 0;

    // ITERAR LAS FUNCIONES
    for (let i = 0; i < listaSelects.length; i++) {
        // NO HACER LA COMPARACION SI LA FUNCION RECIBIDA ES LA MISMA A LA ITERADA(es la misma :v)
        if (select != listaSelects[i]) {
            // NO HACER LA COMPARACION DE IGUALES SI LA FUNCION RECIBIDA ES 36(otra)
            if (document.getElementById(select).value != '29') {
                // AUMENTAR UN CONTADOR SI LA FUNCION RECIBIDA ES IGUAL A LA ITERADA
                if (document.getElementById(select).value == document.getElementById(listaSelects[i]).value) {
                    x++;
                }
            }
        }
    }

    // SI EL CONTADOR NO ES 0 EXISTEN REPETIDAS, SE NOTIFICA Y SE SELECCIONA --NO APLICA--(0) EN EL SELECT
    if (x != 0) {
        alertify.error('Las funciones no pueden repetirse');
        document.getElementById(select).selectedIndex = '0';
    }
}

verificarComentariosIguales = () => {
    let listaFunciones = [
        document.getElementById('funcPriEspecifica').value,
        document.getElementById('secUnoEspecifica').value,
        document.getElementById('secDosEspecifica').value,
        document.getElementById('secTresEspecifica').value,
        document.getElementById('secCuatroEspecifica').value,
        document.getElementById('secCincoEspecifica').value
    ];

    // PERMITIR HACER COMPARACIONES DE TODAS LAS FUNCIONES CON TODAS LAS FUNCIONES
    for (let i = 0; i < listaFunciones.length; i++) {
        for (let j = 0; j < listaFunciones.length; j++) {
            // NO HACER LAS VALIDACIONES CON LA MISMA FUNCION
            if (i != j) {
                // VERIFICAR SI EXISTEN O NO COMENTARIOS
                if (!sinComentarios()) {
                    // SI LA PRIMER FUNCION ITERADA ES LA UNICA, SOLO VALIDAR ESPACIOS
                    if (verificarFuncionUnica(i)) {
                        if (!verificarSoloEspacios(listaFunciones[i], 'parametro de relleno XD')) {
                            return false;
                        } else {
                            return true;
                        }
                    } else {
                        // NO HACER LAS VALIDACIONES CON LAS FUNCIONES VACIAS(validado desde el pattern)
                        if (listaFunciones[i] != '' && listaFunciones[j] != '') {
                            // REALIZAR LAS VALIDACIONES ENVIANDO LAS DOS CADENAS EN ITERACION
                            if (!compararCadenas(quitarAcentos(listaFunciones[i]), quitarAcentos(listaFunciones[j]))) {
                                return false;
                            }
                        }
                    }
                } else {
                    return true;
                }
            }
        }
    }
    return true;
}

verificarFuncionUnica = (index) => {
    let listaFunciones = [
        document.getElementById('funcPriEspecifica').value,
        document.getElementById('secUnoEspecifica').value,
        document.getElementById('secDosEspecifica').value,
        document.getElementById('secTresEspecifica').value,
        document.getElementById('secCuatroEspecifica').value,
        document.getElementById('secCincoEspecifica').value
    ], c = 0;

    for (let i = 0; i < listaFunciones.length; i++) {
        if (index != i) {
            if (listaFunciones[i] == '') {
                c++;
            }
        }
    }

    if (c == 5) {
        return true;
    } else {
        return false;
    }
}

quitarAcentos = (cadena) => {
    // CREACION DE OBJETO CON CLAVES EL ABC CON ACENTOS Y VALORES EL ABC SIN ACENTOS
    const acentos = { 'á': 'a', 'é': 'e', 'í': 'i', 'ó': 'o', 'ú': 'u', 'Á': 'A', 'É': 'E', 'Í': 'I', 'Ó': 'O', 'Ú': 'U' };
    // RETORNO DE LA CADENA RECONSTRUIDA DESPUES DE SEPARARLA POR LETRA Y SUSTITUIR CADA LETRA CON ACENTO CON EL VALOR DE SU CLAVE DE MAPEO DEL OBJETO ACENTOS
    return cadena.split('').map(letra => acentos[letra] || letra).join('').toString();
}

compararCadenas = (i, j) => {
    let verificarEspacios = verificarSoloEspacios(i, j);
    if (!verificarEspacios) {
        return false;
    } else {
        // CONVERSION DE LAS CADENAS SIN ESPACIOS A MINUSCULAS Y COMPARACION
        if (verificarEspacios[0].toLowerCase() == verificarEspacios[1].toLowerCase()) {
            return false;
        } else {
            return true;
        }
    }
}

verificarSoloEspacios = (i, j) => {
    let ii = i.split('');
    let jj = j.split('');
    let iiSinEspacios = '';
    let jjSinEspacios = '';
    let cii = 0;
    let cjj = 0;

    // CONTADOR DE ESPACIOS EN LA PRIMER CADENA Y CREACION DE PRIMER CADENA SIN ESPACIOS
    for (let i = 0; i < ii.length; i++) {
        if (ii[i] == ' ') {
            cii++;
        } else {
            iiSinEspacios += ii[i];
        }
    }

    // CONTADOR DE ESPACIOS EN LA SEGUNDA CADENA Y CREACION DE SEGUNDA CADENA SIN ESPACIOS
    for (let j = 0; j < jj.length; j++) {
        if (jj[j] == ' ') {
            cjj++;
        } else {
            jjSinEspacios += jj[j];
        }
    }

    // RETORNO A FALSO SI ALGUNA DE LAS CADENAS SOLO TIENE ESPACIOS O RETORNO DE LAS CADENAS SIN ESPACIOS
    if (cii == ii.length || cjj == jj.length) {
        return false;
    } else {
        return [iiSinEspacios, jjSinEspacios];
    }
}

sinComentarios = () => {
    let listaFunciones = [
        'funcPriEspecifica',
        'secUnoEspecifica',
        'secDosEspecifica',
        'secTresEspecifica',
        'secCuatroEspecifica',
        'secCincoEspecifica',
    ], c = 0;

    for (let i = 0; i < listaFunciones.length; i++) {
        if (!document.getElementById(listaFunciones[i]).hasAttribute('required')) {
            c++;
        }
    }

    if (c == 6) {
        return true;
    } else {
        return false;
    }
}

verificarContenedoresVisibles = (pregunta, seccion) => {
    if (pregunta == 1 && seccion == 1) {
        if (
            document.getElementById('contenedorFuncPriEspecifica').classList.contains('d-none') &&
            document.getElementById('contenedorPrimFuncSecundaria').classList.contains('d-none') &&
            document.getElementById('contenedorSegFuncSecundaria').classList.contains('d-none') &&
            document.getElementById('contenedorTerFuncSecundaria').classList.contains('d-none') &&
            document.getElementById('contenedorCuarFuncSecundaria').classList.contains('d-none') &&
            document.getElementById('contenedorQuinFuncSecundaria').classList.contains('d-none')
        ) {
            document.getElementById('contenedorFuncionesEspecificas').classList.add('d-none')
        } else {
            document.getElementById('contenedorFuncionesEspecificas').classList.remove('d-none')
        }
    } else if (pregunta == 3 && seccion == 1) {
        if (
            document.getElementById('contenedorSexoEspecificoP3').classList.contains('d-none') &&
            document.getElementById('contenedorNivelEscolaridadEspecificoP3').classList.contains('d-none') &&
            document.getElementById('contenedorEstatusEstudioEspecificoP3').classList.contains('d-none') &&
            document.getElementById('contenedorEmpleoAnteriorEspecificoP3').classList.contains('d-none') &&
            document.getElementById('contenedorPertenenciaIndigenaEspecificoP3').classList.contains('d-none') &&
            document.getElementById('contenedorCondicionDiscapacidadEspecificoP3').classList.contains('d-none') &&
            document.getElementById('contenedorFormaDesignacionEspecificaP3').classList.contains('d-none') &&
            document.getElementById('contenedorAfiliacionPartidistaEspecificaP3').classList.contains('d-none')
        ) {
            document.getElementById('contenedorCamposEspecificosP3').classList.add('d-none')
        } else {
            document.getElementById('contenedorCamposEspecificosP3').classList.remove('d-none')
        }
    }
}

displayVisibles = (display, pregunta, seccion, campo) => {
    if (pregunta == 3 && seccion == 1 && campo == 'mismoTitular') {
        if (display == 'none') {
            document.getElementById('txtSexoP3').classList.add('d-none')
            document.getElementById('txtEdadP3').classList.add('d-none')
            document.getElementById('txtIngresosP3').classList.add('d-none')
            document.getElementById('txtNivEscolaridadP3').classList.add('d-none')
            document.getElementById('txtEstatusEscolaridadP3').classList.add('d-none')
            document.getElementById('txtEmpleoAnteriorP3').classList.add('d-none')
            document.getElementById('txtAntiguedadServicioP3').classList.add('d-none')
            document.getElementById('txtAntiguedadCargoP3').classList.add('d-none')
            document.getElementById('txtPertenenciaIndigenaP3').classList.add('d-none')
            document.getElementById('txtCondicionDiscapacidadP3').classList.add('d-none')
            document.getElementById('txtFormaDesignacionP3').classList.add('d-none')
            document.getElementById('txtAfiliacionPartidistaP3').classList.add('d-none')
            document.getElementById('txtSexoP3').removeAttribute('required')
            document.getElementById('txtEdadP3').removeAttribute('required')
            document.getElementById('txtIngresosP3').removeAttribute('required')
            document.getElementById('txtNivEscolaridadP3').removeAttribute('required')
            document.getElementById('txtEstatusEscolaridadP3').removeAttribute('required')
            document.getElementById('txtEmpleoAnteriorP3').removeAttribute('required')
            document.getElementById('txtAntiguedadServicioP3').removeAttribute('required')
            document.getElementById('txtAntiguedadCargoP3').removeAttribute('required')
            document.getElementById('txtPertenenciaIndigenaP3').removeAttribute('required')
            document.getElementById('txtCondicionDiscapacidadP3').removeAttribute('required')
            document.getElementById('txtFormaDesignacionP3').removeAttribute('required')
            document.getElementById('txtAfiliacionPartidistaP3').removeAttribute('required')
        } else {
            document.getElementById('txtSexoP3').classList.remove('d-none')
            document.getElementById('txtEdadP3').classList.remove('d-none')
            document.getElementById('txtIngresosP3').classList.remove('d-none')
            document.getElementById('txtNivEscolaridadP3').classList.remove('d-none')
            document.getElementById('txtEstatusEscolaridadP3').classList.remove('d-none')
            document.getElementById('txtEmpleoAnteriorP3').classList.remove('d-none')
            document.getElementById('txtAntiguedadServicioP3').classList.remove('d-none')
            document.getElementById('txtAntiguedadCargoP3').classList.remove('d-none')
            document.getElementById('txtPertenenciaIndigenaP3').classList.remove('d-none')
            document.getElementById('txtCondicionDiscapacidadP3').classList.remove('d-none')
            document.getElementById('txtFormaDesignacionP3').classList.remove('d-none')
            document.getElementById('txtAfiliacionPartidistaP3').classList.remove('d-none')
            document.getElementById('txtSexoP3').setAttribute('required', '')
            document.getElementById('txtEdadP3').setAttribute('required', '')
            document.getElementById('txtIngresosP3').setAttribute('required', '')
            document.getElementById('txtNivEscolaridadP3').setAttribute('required', '')
            document.getElementById('txtEstatusEscolaridadP3').setAttribute('required', '')
            document.getElementById('txtEmpleoAnteriorP3').setAttribute('required', '')
            document.getElementById('txtAntiguedadServicioP3').setAttribute('required', '')
            document.getElementById('txtAntiguedadCargoP3').setAttribute('required', '')
            document.getElementById('txtPertenenciaIndigenaP3').setAttribute('required', '')
            document.getElementById('txtCondicionDiscapacidadP3').setAttribute('required', '')
            document.getElementById('txtFormaDesignacionP3').setAttribute('required', '')
            document.getElementById('txtAfiliacionPartidistaP3').setAttribute('required', '')
        }
    } else if (pregunta == 3 && seccion == 1 && campo == 'vacanteTitular') {
        if (display == 'none') {
            document.getElementById('txtEdadP3').classList.add('d-none')
            document.getElementById('txtIngresosP3').classList.add('d-none')
            document.getElementById('txtNivEscolaridadP3').classList.add('d-none')
            document.getElementById('txtEstatusEscolaridadP3').classList.add('d-none')
            document.getElementById('txtEmpleoAnteriorP3').classList.add('d-none')
            document.getElementById('txtAntiguedadServicioP3').classList.add('d-none')
            document.getElementById('txtAntiguedadCargoP3').classList.add('d-none')
            document.getElementById('txtPertenenciaIndigenaP3').classList.add('d-none')
            document.getElementById('txtCondicionDiscapacidadP3').classList.add('d-none')
            document.getElementById('txtFormaDesignacionP3').classList.add('d-none')
            document.getElementById('txtAfiliacionPartidistaP3').classList.add('d-none')
            document.getElementById('txtMismoTitularP3').classList.add('d-none')
            document.getElementById('txtEdadP3').removeAttribute('required')
            document.getElementById('txtIngresosP3').removeAttribute('required')
            document.getElementById('txtNivEscolaridadP3').removeAttribute('required')
            document.getElementById('txtEstatusEscolaridadP3').removeAttribute('required')
            document.getElementById('txtEmpleoAnteriorP3').removeAttribute('required')
            document.getElementById('txtAntiguedadServicioP3').removeAttribute('required')
            document.getElementById('txtAntiguedadCargoP3').removeAttribute('required')
            document.getElementById('txtPertenenciaIndigenaP3').removeAttribute('required')
            document.getElementById('txtCondicionDiscapacidadP3').removeAttribute('required')
            document.getElementById('txtFormaDesignacionP3').removeAttribute('required')
            document.getElementById('txtAfiliacionPartidistaP3').removeAttribute('required')
            document.getElementById('txtMismoTitularP3').removeAttribute('required')
        } else {
            document.getElementById('txtEdadP3').classList.remove('d-none')
            document.getElementById('txtIngresosP3').classList.remove('d-none')
            document.getElementById('txtNivEscolaridadP3').classList.remove('d-none')
            document.getElementById('txtEstatusEscolaridadP3').classList.remove('d-none')
            document.getElementById('txtEmpleoAnteriorP3').classList.remove('d-none')
            document.getElementById('txtAntiguedadServicioP3').classList.remove('d-none')
            document.getElementById('txtAntiguedadCargoP3').classList.remove('d-none')
            document.getElementById('txtPertenenciaIndigenaP3').classList.remove('d-none')
            document.getElementById('txtCondicionDiscapacidadP3').classList.remove('d-none')
            document.getElementById('txtFormaDesignacionP3').classList.remove('d-none')
            document.getElementById('txtAfiliacionPartidistaP3').classList.remove('d-none')
            document.getElementById('txtMismoTitularP3').classList.remove('d-none')
            document.getElementById('txtEdadP3').setAttribute('required', '')
            document.getElementById('txtIngresosP3').setAttribute('required', '')
            document.getElementById('txtNivEscolaridadP3').setAttribute('required', '')
            document.getElementById('txtEstatusEscolaridadP3').setAttribute('required', '')
            document.getElementById('txtEmpleoAnteriorP3').setAttribute('required', '')
            document.getElementById('txtAntiguedadServicioP3').setAttribute('required', '')
            document.getElementById('txtAntiguedadCargoP3').setAttribute('required', '')
            document.getElementById('txtPertenenciaIndigenaP3').setAttribute('required', '')
            document.getElementById('txtCondicionDiscapacidadP3').setAttribute('required', '')
            document.getElementById('txtFormaDesignacionP3').setAttribute('required', '')
            document.getElementById('txtAfiliacionPartidistaP3').setAttribute('required', '')
            document.getElementById('txtMismoTitularP3').setAttribute('required', '')
        }
    }
}

vaciarContenedoresArchivos = () => {
    document.getElementById('contenedorArchivosTitularP3').classList.add('d-none')
    document.getElementById('txtTituloP3').removeAttribute('required')
    document.getElementById('txtCedulaP3').removeAttribute('required')
    document.getElementById('txtTituloP3').value = ''
    document.getElementById('txtCedulaP3').value = ''
    tituloTitular = ''
    cedulaTitular = ''
    document.getElementById('contenedorTituloP3').innerHTML = ''
    document.getElementById('contenedorCedulaP3').innerHTML = ''
}

async function verificarMismoTitular(idMismoTitular) {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'verificarMismoTitular',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
                idMismoTitular,
                sexo: document.getElementById('txtSexoP3').value,
                edad: document.getElementById('txtEdadP3').value,
                ingresos: document.getElementById('txtIngresosP3').value,
                nivelEscolaridad: document.getElementById('txtNivEscolaridadP3').value,
                estatusEscolaridad: document.getElementById('txtEstatusEscolaridadP3').value,
                empleoAnterior: document.getElementById('txtEmpleoAnteriorP3').value,
                antiguedadServicio: document.getElementById('txtAntiguedadServicioP3').value,
                antiguedadCargo: document.getElementById('txtAntiguedadCargoP3').value,
                pertenenciaIndigena: document.getElementById('txtPertenenciaIndigenaP3').value,
                condicionDiscapacidad: document.getElementById('txtCondicionDiscapacidadP3').value,
                formaDesignacion: document.getElementById('txtFormaDesignacionP3').value,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            return resultado[1]
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
            return false
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};


// FUNCION PARA VALIDACION PREGUNTA 17
algunCheck = (pregunta, seccion) => {
    if (pregunta == 17 && seccion == 1) {
        if (
            document.getElementById('checkServicioP17').checked ||
            document.getElementById('checkReclutamientoP17').checked ||
            document.getElementById('checkPruebasP17').checked ||
            document.getElementById('checkCurricularP17').checked ||
            document.getElementById('checkActualizacionP17').checked ||
            document.getElementById('checkValidacionP17').checked ||
            document.getElementById('checkConcursosP17').checked ||
            document.getElementById('checkMecanismosP17').checked ||
            document.getElementById('checkProgramasP17').checked ||
            document.getElementById('checkEvaluacionP17').checked ||
            document.getElementById('checkEstimulosP17').checked ||
            document.getElementById('checkSeparacionP17').checked ||
            document.getElementById('checkOtrosP17').checked
        ) {
            return true
        } else {
            return false
        }
    }
}


// FUNCIONES CON PETICIONES PARA VALIDACION DE PERSONAL
async function obtenerConteoPersonal() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerConteoPersonal',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            totalHombres = parseInt(resultado[1])
            totalMujeres = parseInt(resultado[2])
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};

async function obtenerConteoPersonalIndigena() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerConteoPersonalIndigena',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            totalHombresIndigenas = parseInt(resultado[1])
            totalMujeresIndigenas = parseInt(resultado[2])
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};

async function obtenerConteoPersonalDiscapacitado() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerConteoPersonalDiscapacitado',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            totalHombresDiscapacitados = parseInt(resultado[1])
            totalMujeresDiscapacitadas = parseInt(resultado[2])
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};


// FUNCION CON PETICION PARA VALIDACION DE ELEMENTOS DE PROFESIONALIZACION
async function contabaConElementos() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'contabaConElementos',
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


// FUNCIONES CON PETICIONES PARA VALIDACION DE FUNCIONES PRINCIPALES Y SECUNDARIAS
async function contieneEducacion() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'contieneEducacion',
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

async function contieneEducacionPrincipal() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'contieneEducacionPrincipal',
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

async function contieneSalud() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'contieneSalud',
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

async function contieneSaludPrincipal() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'contieneSaludPrincipal',
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

async function contieneDeporte() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'contieneDeporte',
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

async function contieneDeportePrincipal() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'contieneDeportePrincipal',
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


// FUNCIONES CON PETICIONES PARA VALIDACION DE INMUEBLES
async function obtenerConteoInmuebles() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerConteoInmuebles',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            totalPropios = parseInt(resultado[1])
            totalRentados = parseInt(resultado[2])
            totalOtros = parseInt(resultado[3])
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};

async function seContabilizaronInmueblesEducacion() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'seContabilizaronInmueblesEducacion',
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

async function seContabilizaronInmueblesSalud() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'seContabilizaronInmueblesSalud',
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

async function seContabilizaronInmueblesDeporte() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'seContabilizaronInmueblesDeporte',
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


// FUNCION CON PETICION PARA VALIDACION DE EQUIPO INFORMATICO
async function obtenerConteoEquipoInformatico() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerConteoEquipoInformatico',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            totalComputadoras = parseInt(resultado[1])
            totalImpresoras = parseInt(resultado[2])
            totalMultifuncionales = parseInt(resultado[3])
            totalServidores = parseInt(resultado[4])
            totalTabletas = parseInt(resultado[5])
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};

async function seContabilizoEquipoInformatico() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'seContabilizoEquipoInformatico',
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


// FUNCIONES PARA VALIDACION DE SECCION 12
async function contabaConDisposicion1P1S12() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'contabaConDisposicion1P1S12',
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

async function contabaConDisposicion2P1S12() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'contabaConDisposicion2P1S12',
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

verificarElementosS12 = (elementos, tipoMateria, pregunta, seccion) => {
    if (pregunta == 1 && seccion == 12) {
        elementos.forEach(elemento => {
            document.getElementById(elemento).addEventListener('change', () => {
                if (document.getElementById(elemento).checked) {
                    if (tipoMateria == 1) {
                        contabaConDisposicion1P1S12().then((resultado) => {
                            if (resultado != undefined && resultado == true) {
                                document.getElementById(elemento).checked = true
                            } else if (resultado != undefined && resultado == false) {
                                document.getElementById(elemento).checked = false
                                alertify.alert('Imposible marcar procedimiento !', 'Ha especificado el la pregunta 1 que su entidad federativa no contaba o no sabe si contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal en el tipo de materia de adquisiciones, arrendamientos y servicios, por lo que solo puede marcar <span class="font-weight-bold">No Aplica</span> en esta fila.').set('label', 'Ok');
                            } else {
                                console.error('Error de peticion. ' + resultado);
                            }
                        })
                    } else if (tipoMateria == 2) {
                        contabaConDisposicion2P1S12().then((resultado) => {
                            if (resultado != undefined && resultado == true) {
                                document.getElementById(elemento).checked = true
                            } else if (resultado != undefined && resultado == false) {
                                document.getElementById(elemento).checked = false
                                alertify.alert('Imposible marcar procedimiento !', 'Ha especificado el la pregunta 1 que su entidad federativa no contaba o no sabe si contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal en el tipo de materia de obra pública y servicios relacionados con la misma, por lo que solo puede marcar <span class="font-weight-bold">No Aplica</span> en esta fila.').set('label', 'Ok');
                            } else {
                                console.error('Error de peticion. ' + resultado);
                            }
                        })
                    }
                }
            })
        })
    } else if (pregunta == 3 && seccion == 12) {
        elementos.forEach(elemento => {
            document.getElementById(elemento).addEventListener('change', () => {
                if (document.getElementById(elemento).checked) {
                    if (tipoMateria == 1) {
                        contabaConDisposicion1P1S12().then((resultado) => {
                            if (resultado != undefined && resultado == true) {
                                document.getElementById(elemento).checked = true
                            } else if (resultado != undefined && resultado == false) {
                                document.getElementById(elemento).checked = false
                                alertify.alert('Imposible marcar mecanismo de salvaguarda institucional !', 'Ha especificado el la pregunta 1 que su entidad federativa no contaba o no sabe si contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal en el tipo de materia de adquisiciones, arrendamientos y servicios, por lo que solo puede marcar <span class="font-weight-bold">No Aplica</span> en esta fila.').set('label', 'Ok');
                            } else {
                                console.error('Error de peticion. ' + resultado);
                            }
                        })
                    } else if (tipoMateria == 2) {
                        contabaConDisposicion2P1S12().then((resultado) => {
                            if (resultado != undefined && resultado == true) {
                                document.getElementById(elemento).checked = true
                            } else if (resultado != undefined && resultado == false) {
                                document.getElementById(elemento).checked = false
                                alertify.alert('Imposible marcar mecanismo de salvaguarda institucional !', 'Ha especificado el la pregunta 1 que su entidad federativa no contaba o no sabe si contaba con alguna disposición normativa que regulara las contrataciones públicas de la Administración Pública Estatal en el tipo de materia de obra pública y servicios relacionados con la misma, por lo que solo puede marcar <span class="font-weight-bold">No Aplica</span> en esta fila.').set('label', 'Ok');
                            } else {
                                console.error('Error de peticion. ' + resultado);
                            }
                        })
                    }
                }
            })
        })
    }
}

habilitarChecks = (elementos, accion) => {
    if (accion == 'habilitar') {
        elementos.forEach(elemento => {
            document.getElementById(elemento).removeAttribute('disabled')
            document.getElementById(elemento).checked = false
        })
    } else if (accion == 'deshabilitar') {
        elementos.forEach(elemento => {
            document.getElementById(elemento).setAttribute('disabled', '')
            document.getElementById(elemento).checked = false
        })
    }
}

async function cuentaConSistemaElectronico() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'cuentaConSistemaElectronico',
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

habilitarSelects = (elementos, accion) => {
    if (accion == 'habilitar') {
        elementos.forEach(elemento => {
            document.getElementById(elemento).setAttribute('required', '')
            document.getElementById(elemento).removeAttribute('disabled')
        })
    } else if (accion == 'deshabilitar') {
        elementos.forEach(elemento => {
            document.getElementById(elemento).removeAttribute('required')
            document.getElementById(elemento).setAttribute('disabled', '')
            document.getElementById(elemento).value = ''
        })
    }
}

async function obtenerProcedimientosDeContratacion() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerProcedimientosDeContratacion',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            procedimientoDeContratacion1 = resultado[1]
            procedimientoDeContratacion2 = resultado[2]
            procedimientoDeContratacion3 = resultado[3]
            procedimientoDeContratacion4 = resultado[4]
            procedimientoDeContratacion5 = resultado[5]
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};

async function obtenerConteoDeContratos() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerConteoDeContratos',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            totalContratos1 = parseInt(resultado[1])
            totalContratos2 = parseInt(resultado[2])
            totalContratos3 = parseInt(resultado[3])
            totalContratos4 = parseInt(resultado[4])
            totalContratos5 = parseInt(resultado[5])
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};

async function obtenerConteoDeMontos() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerConteoDeMontos',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            totalMontos1 = parseFloat(resultado[1])
            totalMontos2 = parseFloat(resultado[2])
            totalMontos3 = parseFloat(resultado[3])
            totalMontos4 = parseFloat(resultado[4])
            totalMontos5 = parseFloat(resultado[5])
        } else if (resultado[0] == 'error') {
            alertify.error(resultado[1])
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};


// LLENAR LABELS EN VISTAS CON LOS TOTALES GUARDADOS
llenarTotalesDePersonalEnVistas = () => {
    document.getElementById('infoPersonalP4').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP4').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP4').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP4').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalP5').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP5').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP5').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP5').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalP6').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP6').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP6').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP6').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalP7').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP7').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP7').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP7').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalP8').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP8').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP8').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP8').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalP9').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP9').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP9').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP9').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalP10').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP10').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP10').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP10').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalP12').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP12').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP12').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP12').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalP14').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP14').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP14').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP14').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalP15').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP15').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP15').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP15').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalP19').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP19').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresP19').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresP19').innerHTML = ''.innerHTML = totalMujeres

    document.getElementById('infoPersonalComplementoS1').classList.remove('d-none')
    document.getElementById('infoTotalPersonalComplementoS1').innerHTML = ''.innerHTML = (totalHombres + totalMujeres)
    document.getElementById('infoTotalHombresComplementoS1').innerHTML = ''.innerHTML = totalHombres
    document.getElementById('infoTotalMujeresComplementoS1').innerHTML = ''.innerHTML = totalMujeres
}

llenarTotalesDePersonalIndigenaEnVistas = () => {
    document.getElementById('infoPersonalIndigenaP10').classList.remove('d-none')
    document.getElementById('infoTotalPersonalIndigenaP10').innerHTML = ''.innerHTML = (totalHombresIndigenas + totalMujeresIndigenas)
    document.getElementById('infoTotalHombresIndigenaP10').innerHTML = ''.innerHTML = totalHombresIndigenas
    document.getElementById('infoTotalMujeresIndigenaP10').innerHTML = ''.innerHTML = totalMujeresIndigenas

    document.getElementById('infoPersonalP11').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP11').innerHTML = ''.innerHTML = (totalHombresIndigenas + totalMujeresIndigenas)
    document.getElementById('infoTotalHombresP11').innerHTML = ''.innerHTML = totalHombresIndigenas
    document.getElementById('infoTotalMujeresP11').innerHTML = ''.innerHTML = totalMujeresIndigenas
}

llenarTotalesDePersonalDiscapacitadoEnVistas = () => {
    document.getElementById('infoPersonalDiscapacitadoP12').classList.remove('d-none')
    document.getElementById('infoTotalPersonalDiscapacitadoP12').innerHTML = ''.innerHTML = (totalHombresDiscapacitados + totalMujeresDiscapacitadas)
    document.getElementById('infoTotalHombresDiscapacitadoP12').innerHTML = ''.innerHTML = totalHombresDiscapacitados
    document.getElementById('infoTotalMujeresDiscapacitadoP12').innerHTML = ''.innerHTML = totalMujeresDiscapacitadas

    document.getElementById('infoPersonalP13').classList.remove('d-none')
    document.getElementById('infoTotalPersonalP13').innerHTML = ''.innerHTML = (totalHombresDiscapacitados + totalMujeresDiscapacitadas)
    document.getElementById('infoTotalHombresP13').innerHTML = ''.innerHTML = totalHombresDiscapacitados
    document.getElementById('infoTotalMujeresP13').innerHTML = ''.innerHTML = totalMujeresDiscapacitadas
}

llenarTotalesDeInmueblesEnVistas = () => {
    document.getElementById('infoInmueblesP24').classList.remove('d-none')
    document.getElementById('infoTotalInmueblesP24').innerHTML = ''.innerHTML = (totalPropios + totalRentados + totalOtros)
    document.getElementById('infoTotalPropiosP24').innerHTML = ''.innerHTML = totalPropios
    document.getElementById('infoTotalRentadosP24').innerHTML = ''.innerHTML = totalRentados
    document.getElementById('infoTotalOtroP24').innerHTML = ''.innerHTML = totalOtros

    document.getElementById('infoInmueblesP26').classList.remove('d-none')
    document.getElementById('infoTotalInmueblesP26').innerHTML = ''.innerHTML = (totalPropios + totalRentados + totalOtros)
    document.getElementById('infoTotalPropiosP26').innerHTML = ''.innerHTML = totalPropios
    document.getElementById('infoTotalRentadosP26').innerHTML = ''.innerHTML = totalRentados
    document.getElementById('infoTotalOtroP26').innerHTML = ''.innerHTML = totalOtros

    document.getElementById('infoInmueblesP28').classList.remove('d-none')
    document.getElementById('infoTotalInmueblesP28').innerHTML = ''.innerHTML = (totalPropios + totalRentados + totalOtros)
    document.getElementById('infoTotalPropiosP28').innerHTML = ''.innerHTML = totalPropios
    document.getElementById('infoTotalRentadosP28').innerHTML = ''.innerHTML = totalRentados
    document.getElementById('infoTotalOtroP28').innerHTML = ''.innerHTML = totalOtros

    document.getElementById('infoInmueblesP30').classList.remove('d-none')
    document.getElementById('infoTotalInmueblesP30').innerHTML = ''.innerHTML = (totalPropios + totalRentados + totalOtros)
    document.getElementById('infoTotalPropiosP30').innerHTML = ''.innerHTML = totalPropios
    document.getElementById('infoTotalRentadosP30').innerHTML = ''.innerHTML = totalRentados
    document.getElementById('infoTotalOtroP30').innerHTML = ''.innerHTML = totalOtros
}

llenarTotalesDeEquipoInformaticoEnVistas = () => {
    document.getElementById('infoEquipoInformaticoP35').classList.remove('d-none')
    document.getElementById('infoTotalComputadorasP35').innerHTML = ''.innerHTML = totalComputadoras
    document.getElementById('infoTotalImpresorasP35').innerHTML = ''.innerHTML = totalImpresoras
    document.getElementById('infoTotalMultifuncionalesP35').innerHTML = ''.innerHTML = totalMultifuncionales
    document.getElementById('infoTotalServidoresP35').innerHTML = ''.innerHTML = totalServidores
    document.getElementById('infoTotalTabletasP35').innerHTML = ''.innerHTML = totalTabletas
}

llenarTotalesDeContratosEnVistas = () => {
    document.getElementById('infoContratosP7').classList.remove('d-none')
    document.getElementById('infoTotalContratosP7').innerHTML = ''.innerHTML = (totalContratos1 + totalContratos2 + totalContratos3 + totalContratos4 + totalContratos5)
    document.getElementById('infoTotalContratos1P7').innerHTML = ''.innerHTML = totalContratos1
    document.getElementById('infoTotalContratos2P7').innerHTML = ''.innerHTML = totalContratos2
    document.getElementById('infoTotalContratos3P7').innerHTML = ''.innerHTML = totalContratos3
    document.getElementById('infoTotalContratos4P7').innerHTML = ''.innerHTML = totalContratos4
    document.getElementById('infoTotalContratos5P7').innerHTML = ''.innerHTML = totalContratos5

    document.getElementById('infoContratosP8').classList.remove('d-none')
    document.getElementById('infoTotalContratosP8').innerHTML = ''.innerHTML = (totalContratos1 + totalContratos2 + totalContratos3 + totalContratos4 + totalContratos5)
    document.getElementById('infoTotalContratos1P8').innerHTML = ''.innerHTML = totalContratos1
    document.getElementById('infoTotalContratos2P8').innerHTML = ''.innerHTML = totalContratos2
    document.getElementById('infoTotalContratos3P8').innerHTML = ''.innerHTML = totalContratos3
    document.getElementById('infoTotalContratos4P8').innerHTML = ''.innerHTML = totalContratos4
    document.getElementById('infoTotalContratos5P8').innerHTML = ''.innerHTML = totalContratos5
}

llenarTotalesDeMontosEnVistas = () => {
    document.getElementById('infoMontosP9').classList.remove('d-none')
    document.getElementById('infoTotalMontosP9').innerHTML = ''.innerHTML = '$' + (totalMontos1 + totalMontos2 + totalMontos3 + totalMontos4 + totalMontos5)
    document.getElementById('infoTotalMontos1P9').innerHTML = ''.innerHTML = '$' + totalMontos1
    document.getElementById('infoTotalMontos2P9').innerHTML = ''.innerHTML = '$' + totalMontos2
    document.getElementById('infoTotalMontos3P9').innerHTML = ''.innerHTML = '$' + totalMontos3
    document.getElementById('infoTotalMontos4P9').innerHTML = ''.innerHTML = '$' + totalMontos4
    document.getElementById('infoTotalMontos5P9').innerHTML = ''.innerHTML = '$' + totalMontos5

    document.getElementById('infoMontosP10').classList.remove('d-none')
    document.getElementById('infoTotalMontosP10').innerHTML = ''.innerHTML = '$' + (totalMontos1 + totalMontos2 + totalMontos3 + totalMontos4 + totalMontos5)
    document.getElementById('infoTotalMontos1P10').innerHTML = ''.innerHTML = '$' + totalMontos1
    document.getElementById('infoTotalMontos2P10').innerHTML = ''.innerHTML = '$' + totalMontos2
    document.getElementById('infoTotalMontos3P10').innerHTML = ''.innerHTML = '$' + totalMontos3
    document.getElementById('infoTotalMontos4P10').innerHTML = ''.innerHTML = '$' + totalMontos4
    document.getElementById('infoTotalMontos5P10').innerHTML = ''.innerHTML = '$' + totalMontos5
}


// FUNCIONES DE USO GENERAL
quitarItemsActive = (seccion) => {
    let itemsSeccion1 = [
        'itemPregunta1s1',
        'itemPregunta2s1',
        'itemPregunta3s1',
        'itemPregunta4s1',
        'itemPregunta5s1',
        'itemPregunta6s1',
        'itemPregunta7s1',
        'itemPregunta8s1',
        'itemPregunta9s1',
        'itemPregunta10s1',
        'itemPregunta11s1',
        'itemPregunta12s1',
        'itemPregunta13s1',
        'itemPregunta14s1',
        'itemPregunta15s1',
        'itemPregunta16s1',
        'itemPregunta17s1',
        'itemPregunta18s1',
        'itemPregunta19s1',
        'itemPregunta24s1',
        'itemPregunta25s1',
        'itemPregunta26s1',
        'itemPregunta27s1',
        'itemPregunta28s1',
        'itemPregunta29s1',
        'itemPregunta30s1',
        'itemPregunta31s1',
        'itemPregunta32s1',
        'itemPregunta33s1',
        'itemPregunta34s1',
        'itemPregunta35s1',
        'itemComplementoS1'
    ]
    let itemsSeccion12 = [
        'itemPregunta1s12',
        'itemPregunta2s12',
        'itemPregunta3s12',
        'itemPregunta4s12',
        'itemPregunta5s12',
        'itemPregunta6s12',
        'itemPregunta7s12',
        'itemPregunta8s12',
        'itemPregunta9s12',
        'itemPregunta10s12',
        'itemPregunta11s12',
        'itemPregunta12s12',
        'itemPregunta13s12',
        'itemPregunta14s12'
    ]

    if (seccion == 1) {
        itemsSeccion1.forEach(item => document.getElementById(item).classList.remove('active'))
    } else if (seccion == 12) {
        itemsSeccion12.forEach(item => document.getElementById(item).classList.remove('active'))
    }
}

showLoading = () => {
    document.getElementById('loaderContainer').classList.remove('hideLoading')
    document.getElementById('loaderContainer').classList.add('showLoading')
}

hideLoading = () => {
    document.getElementById('loaderContainer').classList.remove('showLoading')
    document.getElementById('loaderContainer').classList.add('hideLoading')
}

vizualizarModalesAyuda = (modales) => {
    let botones = [
        'btnModalInstrucccionesGeneralesS1',
        'btnModalGlosarioSubseccion1',
        'btnModalPregunta1',
        'btnModalPregunta3',
        'btnModalSubseccion2y2',
        'btnModalSubseccion2y3',
        'btnModalSubseccion2y4',
        'btnModalSubseccion4',
        'btnModalSubseccion4y1',
        'btnModalSubseccion4y2',
        'btnModalSubseccion4y4',
        'btnModalInstrucccionesGeneralesS12',
        'btnModalPregunta3s12',
        'btnModalGlosarioSubseccionXII2',
        'btnModalPregunta6s12',
        'btnModalGlosarioSubseccionXII3',
        'btnModalGlosarioSubseccionXII4'
    ]

    botones.forEach(btn => {
        modales.includes(btn) ? document.getElementById(btn).classList.remove('d-none') : document.getElementById(btn).classList.add('d-none')
    })
}

pausarReproducciones = () => {
    listaVideos = [
        'videoCamposEspecificos',
        'videoCamposVacios',
        'videoEditarPreguntas',
        'videoFunciones',
        'videoIntroduccion',
        'videoPreguntasSinVizualizar',
        'videoPreguntasSinRespuesta',
        'videoFinalizarCuestionario'
    ]

    listaVideos.forEach(video => {
        document.getElementById(video).pause()
    })
}

async function verificarPreguntasContestadas() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'verificarPreguntasContestadas',
                idInstitucion,
                anioInstitucion,
                clasificacionInstitucion,
            }
        })
        preguntasContestadas = res.data;
    } catch (error) {
        console.error(error);
    }

    for (const pregunta in preguntasContestadas) {
        if (preguntasContestadas[pregunta]) {
            document.getElementById(pregunta).children[0].classList.replace('text-dark', 'text-white')
            document.getElementById(pregunta).children[0].classList.replace('bg-secondary', 'bg-primary')
            document.getElementById(pregunta).children[1].classList.replace('bg-secondary', 'bg-primary')
        } else {
            document.getElementById(pregunta).children[0].classList.replace('text-white', 'text-dark')
            document.getElementById(pregunta).children[0].classList.replace('bg-primary', 'bg-secondary')
            document.getElementById(pregunta).children[1].classList.replace('bg-primary', 'bg-secondary')
        }
    }

    if (preguntasContestadas['itemPregunta4s1']) {
        obtenerConteoPersonal().then(() => {
            llenarTotalesDePersonalEnVistas()
        })
        if (preguntasContestadas['itemPregunta10s1']) {
            obtenerConteoPersonalIndigena().then(() => {
                llenarTotalesDePersonalIndigenaEnVistas()
            })
        }
        if (preguntasContestadas['itemPregunta12s1']) {
            obtenerConteoPersonalDiscapacitado().then(() => {
                llenarTotalesDePersonalDiscapacitadoEnVistas()
            })
        }
    }

    if (preguntasContestadas['itemPregunta24s1']) {
        obtenerConteoInmuebles().then(() => {
            llenarTotalesDeInmueblesEnVistas()
        })
    }

    if (preguntasContestadas['itemPregunta33s1']) {
        obtenerConteoEquipoInformatico().then(() => {
            llenarTotalesDeEquipoInformaticoEnVistas()
        })
    }

    if (preguntasContestadas['itemPregunta7s12']) {
        obtenerConteoDeContratos().then(() => {
            llenarTotalesDeContratosEnVistas()
        })
    }

    if (preguntasContestadas['itemPregunta9s12']) {
        obtenerConteoDeMontos().then(() => {
            llenarTotalesDeMontosEnVistas()
        })
    }
}

escuchadoresParaSumaDeTotales = (genero, elemTotal, elemTotalGenero, listaElementos, pregunta, seccion) => {
    listaElementos.forEach(item => {
        document.getElementById(item).addEventListener('input', () => {
            if (
                genero == 'inmueblesGeneral' ||
                genero == 'vehiculos' ||
                genero == 'lineas' ||
                genero == 'aparatos' ||
                genero == 'computadoras' ||
                genero == 'impresoras' ||
                genero == 'computadorasP35' ||
                genero == 'impresorasP35' ||
                genero == 'multifuncionalesP35' ||
                genero == 'servidoresP35' ||
                genero == 'tabletasP35' ||
                genero == 'contratosP7' ||
                genero == 'contratosP8p1' ||
                genero == 'contratosP8p2' ||
                genero == 'contratosP8p3' ||
                genero == 'contratosP8p4' ||
                genero == 'contratosP8p5'
            ) {
                document.getElementById(elemTotal).value = obtenerSumaDeTotales(genero, pregunta, seccion)
            } else if (genero == 'inmuebles1' || genero == 'inmuebles2') {
                document.getElementById(elemTotal).value = obtenerSumaDeTotales((genero + 'Ambos'), pregunta, seccion)
                document.getElementById(elemTotalGenero).value = obtenerSumaDeTotales(genero, pregunta, seccion)
            } else if (genero == 'contratos1P8' || genero == 'contratos2P8') {
                document.getElementById(elemTotal).value = obtenerSumaDeTotales('ambosContratosP8', pregunta, seccion)
                document.getElementById(elemTotalGenero).value = obtenerSumaDeTotales(genero, pregunta, seccion)
            } else if (genero == 'montos1P10' || genero == 'montos2P10') {
                document.getElementById(elemTotal).value = (Math.round(obtenerSumaDeTotales('ambosMontosP10', pregunta, seccion) * 100) / 100).toFixed(2)
                document.getElementById(elemTotalGenero).value = (Math.round(obtenerSumaDeTotales(genero, pregunta, seccion) * 100) / 100).toFixed(2)
            } else if (
                genero == 'montosP9' ||
                genero == 'contratosP10p1' ||
                genero == 'contratosP10p2' ||
                genero == 'contratosP10p3' ||
                genero == 'contratosP10p4' ||
                genero == 'contratosP10p5'
            ) {
                document.getElementById(elemTotal).value = (Math.round(obtenerSumaDeTotales(genero, pregunta, seccion) * 100) / 100).toFixed(2)
            } else {
                document.getElementById(elemTotal).value = obtenerSumaDeTotales('ambos', pregunta, seccion)
                document.getElementById(elemTotalGenero).value = obtenerSumaDeTotales(genero, pregunta, seccion)
            }
        })
    })
}

obtenerSumaDeTotales = (genero, pregunta, seccion) => {
    if (genero == 'ambos') {
        if (pregunta == 5 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresConfianzaP5').value)) ? parseInt(document.getElementById('txtTotalHombresConfianzaP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresBaseP5').value)) ? parseInt(document.getElementById('txtTotalHombresBaseP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresEventualP5').value)) ? parseInt(document.getElementById('txtTotalHombresEventualP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresHonorariosP5').value)) ? parseInt(document.getElementById('txtTotalHombresHonorariosP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOtroP5').value)) ? parseInt(document.getElementById('txtTotalHombresOtroP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresConfianzaP5').value)) ? parseInt(document.getElementById('txtTotalMujeresConfianzaP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresBaseP5').value)) ? parseInt(document.getElementById('txtTotalMujeresBaseP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresEventualP5').value)) ? parseInt(document.getElementById('txtTotalMujeresEventualP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresHonorariosP5').value)) ? parseInt(document.getElementById('txtTotalMujeresHonorariosP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOtroP5').value)) ? parseInt(document.getElementById('txtTotalMujeresOtroP5').value) : 0)
        } else if (pregunta == 6 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresISSSTEP6').value)) ? parseInt(document.getElementById('txtTotalHombresISSSTEP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresISSSTEP6').value)) ? parseInt(document.getElementById('txtTotalMujeresISSSTEP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresISSEFHP6').value)) ? parseInt(document.getElementById('txtTotalHombresISSEFHP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresISSEFHP6').value)) ? parseInt(document.getElementById('txtTotalMujeresISSEFHP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresIMSSP6').value)) ? parseInt(document.getElementById('txtTotalHombresIMSSP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresIMSSP6').value)) ? parseInt(document.getElementById('txtTotalMujeresIMSSP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOtraP6').value)) ? parseInt(document.getElementById('txtTotalHombresOtraP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOtraP6').value)) ? parseInt(document.getElementById('txtTotalMujeresOtraP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresSinSeguridadP6').value)) ? parseInt(document.getElementById('txtTotalHombresSinSeguridadP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresSinSeguridadP6').value)) ? parseInt(document.getElementById('txtTotalMujeresSinSeguridadP6').value) : 0)
        } else if (pregunta == 7 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombres18a24P7').value)) ? parseInt(document.getElementById('txtTotalHombres18a24P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres18a24P7').value)) ? parseInt(document.getElementById('txtTotalMujeres18a24P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres25a29P7').value)) ? parseInt(document.getElementById('txtTotalHombres25a29P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres25a29P7').value)) ? parseInt(document.getElementById('txtTotalMujeres25a29P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres30a34P7').value)) ? parseInt(document.getElementById('txtTotalHombres30a34P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres30a34P7').value)) ? parseInt(document.getElementById('txtTotalMujeres30a34P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres35a39P7').value)) ? parseInt(document.getElementById('txtTotalHombres35a39P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres35a39P7').value)) ? parseInt(document.getElementById('txtTotalMujeres35a39P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres40a44P7').value)) ? parseInt(document.getElementById('txtTotalHombres40a44P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres40a44P7').value)) ? parseInt(document.getElementById('txtTotalMujeres40a44P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres45a49P7').value)) ? parseInt(document.getElementById('txtTotalHombres45a49P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres45a49P7').value)) ? parseInt(document.getElementById('txtTotalMujeres45a49P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres50a54P7').value)) ? parseInt(document.getElementById('txtTotalHombres50a54P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres50a54P7').value)) ? parseInt(document.getElementById('txtTotalMujeres50a54P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres55a59P7').value)) ? parseInt(document.getElementById('txtTotalHombres55a59P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres55a59P7').value)) ? parseInt(document.getElementById('txtTotalMujeres55a59P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres60yMasP7').value)) ? parseInt(document.getElementById('txtTotalHombres60yMasP7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres60yMasP7').value)) ? parseInt(document.getElementById('txtTotalMujeres60yMasP7').value) : 0)
        } else if (pregunta == 8 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresSinPagaP8').value)) ? parseInt(document.getElementById('txtTotalHombresSinPagaP8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresSinPagaP8').value)) ? parseInt(document.getElementById('txtTotalMujeresSinPagaP8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres1a5000P8').value)) ? parseInt(document.getElementById('txtTotalHombres1a5000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres1a5000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres1a5000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres5001a10000P8').value)) ? parseInt(document.getElementById('txtTotalHombres5001a10000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres5001a10000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres5001a10000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres10001a15000P8').value)) ? parseInt(document.getElementById('txtTotalHombres10001a15000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres10001a15000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres10001a15000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres15001a20000P8').value)) ? parseInt(document.getElementById('txtTotalHombres15001a20000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres15001a20000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres15001a20000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres20001a25000P8').value)) ? parseInt(document.getElementById('txtTotalHombres20001a25000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres20001a25000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres20001a25000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres25001a30000P8').value)) ? parseInt(document.getElementById('txtTotalHombres25001a30000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres25001a30000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres25001a30000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres30001a35000P8').value)) ? parseInt(document.getElementById('txtTotalHombres30001a35000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres30001a35000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres30001a35000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres35001a40000P8').value)) ? parseInt(document.getElementById('txtTotalHombres35001a40000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres35001a40000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres35001a40000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres40001a45000P8').value)) ? parseInt(document.getElementById('txtTotalHombres40001a45000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres40001a45000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres40001a45000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres45001a50000P8').value)) ? parseInt(document.getElementById('txtTotalHombres45001a50000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres45001a50000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres45001a50000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres50001a55000P8').value)) ? parseInt(document.getElementById('txtTotalHombres50001a55000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres50001a55000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres50001a55000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres55001a60000P8').value)) ? parseInt(document.getElementById('txtTotalHombres55001a60000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres55001a60000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres55001a60000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres60001a65000P8').value)) ? parseInt(document.getElementById('txtTotalHombres60001a65000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres60001a65000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres60001a65000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres65001a70000P8').value)) ? parseInt(document.getElementById('txtTotalHombres65001a70000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres65001a70000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres65001a70000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMasDe70000P8').value)) ? parseInt(document.getElementById('txtTotalHombresMasDe70000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMasDe70000P8').value)) ? parseInt(document.getElementById('txtTotalMujeresMasDe70000P8').value) : 0)
        } else if (pregunta == 9 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresNingunoP9').value)) ? parseInt(document.getElementById('txtTotalHombresNingunoP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresPresPriP9').value)) ? parseInt(document.getElementById('txtTotalHombresPresPriP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresSecuP9').value)) ? parseInt(document.getElementById('txtTotalHombresSecuP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresPrepaP9').value)) ? parseInt(document.getElementById('txtTotalHombresPrepaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTecnicaP9').value)) ? parseInt(document.getElementById('txtTotalHombresTecnicaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresLicenciaturaP9').value)) ? parseInt(document.getElementById('txtTotalHombresLicenciaturaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMaestriaP9').value)) ? parseInt(document.getElementById('txtTotalHombresMaestriaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresDoctoradoP9').value)) ? parseInt(document.getElementById('txtTotalHombresDoctoradoP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNingunoP9').value)) ? parseInt(document.getElementById('txtTotalMujeresNingunoP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresPresPriP9').value)) ? parseInt(document.getElementById('txtTotalMujeresPresPriP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresSecuP9').value)) ? parseInt(document.getElementById('txtTotalMujeresSecuP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresPrepaP9').value)) ? parseInt(document.getElementById('txtTotalMujeresPrepaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTecnicaP9').value)) ? parseInt(document.getElementById('txtTotalMujeresTecnicaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresLicenciaturaP9').value)) ? parseInt(document.getElementById('txtTotalMujeresLicenciaturaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMaestriaP9').value)) ? parseInt(document.getElementById('txtTotalMujeresMaestriaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresDoctoradoP9').value)) ? parseInt(document.getElementById('txtTotalMujeresDoctoradoP9').value) : 0)
        } else if (pregunta == 10 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresPertenecenP10').value)) ? parseInt(document.getElementById('txtTotalHombresPertenecenP10').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNoPertenecenP10').value)) ? parseInt(document.getElementById('txtTotalHombresNoPertenecenP10').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNoIdentificadoP10').value)) ? parseInt(document.getElementById('txtTotalHombresNoIdentificadoP10').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresPertenecenP10').value)) ? parseInt(document.getElementById('txtTotalMujeresPertenecenP10').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNoPertenecenP10').value)) ? parseInt(document.getElementById('txtTotalMujeresNoPertenecenP10').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP10').value)) ? parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP10').value) : 0)
        } else if (pregunta == 11 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresChinantecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresChinantecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresCholP11').value)) ? parseInt(document.getElementById('txtTotalHombresCholP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresCoraP11').value)) ? parseInt(document.getElementById('txtTotalHombresCoraP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresHuastecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresHuastecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresHuicholP11').value)) ? parseInt(document.getElementById('txtTotalHombresHuicholP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMayaP11').value)) ? parseInt(document.getElementById('txtTotalHombresMayaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMayoP11').value)) ? parseInt(document.getElementById('txtTotalHombresMayoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMazahuaP11').value)) ? parseInt(document.getElementById('txtTotalHombresMazahuaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMazatecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresMazatecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMixeP11').value)) ? parseInt(document.getElementById('txtTotalHombresMixeP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMixtecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresMixtecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNahuatlP11').value)) ? parseInt(document.getElementById('txtTotalHombresNahuatlP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOtomiP11').value)) ? parseInt(document.getElementById('txtTotalHombresOtomiP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTarascoPurepechaP11').value)) ? parseInt(document.getElementById('txtTotalHombresTarascoPurepechaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTarahumaraP11').value)) ? parseInt(document.getElementById('txtTotalHombresTarahumaraP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTepehuanoP11').value)) ? parseInt(document.getElementById('txtTotalHombresTepehuanoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTlapanecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresTlapanecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTotonacoP11').value)) ? parseInt(document.getElementById('txtTotalHombresTotonacoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTseltalP11').value)) ? parseInt(document.getElementById('txtTotalHombresTseltalP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTsotsilP11').value)) ? parseInt(document.getElementById('txtTotalHombresTsotsilP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresYaquiP11').value)) ? parseInt(document.getElementById('txtTotalHombresYaquiP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresZapotecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresZapotecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresZoqueP11').value)) ? parseInt(document.getElementById('txtTotalHombresZoqueP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOtroP11').value)) ? parseInt(document.getElementById('txtTotalHombresOtroP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNoIdentificadoP11').value)) ? parseInt(document.getElementById('txtTotalHombresNoIdentificadoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresChinantecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresChinantecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresCholP11').value)) ? parseInt(document.getElementById('txtTotalMujeresCholP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresCoraP11').value)) ? parseInt(document.getElementById('txtTotalMujeresCoraP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresHuastecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresHuastecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresHuicholP11').value)) ? parseInt(document.getElementById('txtTotalMujeresHuicholP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMayaP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMayaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMayoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMayoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMazahuaP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMazahuaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMazatecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMazatecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMixeP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMixeP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMixtecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMixtecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNahuatlP11').value)) ? parseInt(document.getElementById('txtTotalMujeresNahuatlP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOtomiP11').value)) ? parseInt(document.getElementById('txtTotalMujeresOtomiP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTarascoPurepechaP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTarascoPurepechaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTarahumaraP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTarahumaraP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTepehuanoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTepehuanoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTlapanecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTlapanecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTotonacoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTotonacoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTseltalP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTseltalP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTsotsilP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTsotsilP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresYaquiP11').value)) ? parseInt(document.getElementById('txtTotalMujeresYaquiP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresZapotecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresZapotecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresZoqueP11').value)) ? parseInt(document.getElementById('txtTotalMujeresZoqueP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOtroP11').value)) ? parseInt(document.getElementById('txtTotalMujeresOtroP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP11').value) : 0)
        } else if (pregunta == 12 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresConDiscapacidadP12').value)) ? parseInt(document.getElementById('txtTotalHombresConDiscapacidadP12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresSinDiscapacidadP12').value)) ? parseInt(document.getElementById('txtTotalHombresSinDiscapacidadP12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNoIdentificadoP12').value)) ? parseInt(document.getElementById('txtTotalHombresNoIdentificadoP12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresConDiscapacidadP12').value)) ? parseInt(document.getElementById('txtTotalMujeresConDiscapacidadP12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresSinDiscapacidadP12').value)) ? parseInt(document.getElementById('txtTotalMujeresSinDiscapacidadP12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP12').value)) ? parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP12').value) : 0)
        } else if (pregunta == 13 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresCaminarP13').value)) ? parseInt(document.getElementById('txtTotalHombresCaminarP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresVerP13').value)) ? parseInt(document.getElementById('txtTotalHombresVerP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresBrazosP13').value)) ? parseInt(document.getElementById('txtTotalHombresBrazosP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresAprenderP13').value)) ? parseInt(document.getElementById('txtTotalHombresAprenderP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOirP13').value)) ? parseInt(document.getElementById('txtTotalHombresOirP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresHablarP13').value)) ? parseInt(document.getElementById('txtTotalHombresHablarP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresBaniarseP13').value)) ? parseInt(document.getElementById('txtTotalHombresBaniarseP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresDepresionP13').value)) ? parseInt(document.getElementById('txtTotalHombresDepresionP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOtroP13').value)) ? parseInt(document.getElementById('txtTotalHombresOtroP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNoIdentificadoP13').value)) ? parseInt(document.getElementById('txtTotalHombresNoIdentificadoP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresCaminarP13').value)) ? parseInt(document.getElementById('txtTotalMujeresCaminarP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresVerP13').value)) ? parseInt(document.getElementById('txtTotalMujeresVerP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresBrazosP13').value)) ? parseInt(document.getElementById('txtTotalMujeresBrazosP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresAprenderP13').value)) ? parseInt(document.getElementById('txtTotalMujeresAprenderP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOirP13').value)) ? parseInt(document.getElementById('txtTotalMujeresOirP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresHablarP13').value)) ? parseInt(document.getElementById('txtTotalMujeresHablarP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresBaniarseP13').value)) ? parseInt(document.getElementById('txtTotalMujeresBaniarseP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresDepresionP13').value)) ? parseInt(document.getElementById('txtTotalMujeresDepresionP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOtroP13').value)) ? parseInt(document.getElementById('txtTotalMujeresOtroP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP13').value)) ? parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP13').value) : 0)
        } else {
            return 0
        }
    } else if (genero == 'hombres') {
        if (pregunta == 5 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresConfianzaP5').value)) ? parseInt(document.getElementById('txtTotalHombresConfianzaP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresBaseP5').value)) ? parseInt(document.getElementById('txtTotalHombresBaseP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresEventualP5').value)) ? parseInt(document.getElementById('txtTotalHombresEventualP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresHonorariosP5').value)) ? parseInt(document.getElementById('txtTotalHombresHonorariosP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOtroP5').value)) ? parseInt(document.getElementById('txtTotalHombresOtroP5').value) : 0)
        } else if (pregunta == 6 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresISSSTEP6').value)) ? parseInt(document.getElementById('txtTotalHombresISSSTEP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresISSEFHP6').value)) ? parseInt(document.getElementById('txtTotalHombresISSEFHP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresIMSSP6').value)) ? parseInt(document.getElementById('txtTotalHombresIMSSP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOtraP6').value)) ? parseInt(document.getElementById('txtTotalHombresOtraP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresSinSeguridadP6').value)) ? parseInt(document.getElementById('txtTotalHombresSinSeguridadP6').value) : 0)
        } else if (pregunta == 7 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombres18a24P7').value)) ? parseInt(document.getElementById('txtTotalHombres18a24P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres25a29P7').value)) ? parseInt(document.getElementById('txtTotalHombres25a29P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres30a34P7').value)) ? parseInt(document.getElementById('txtTotalHombres30a34P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres35a39P7').value)) ? parseInt(document.getElementById('txtTotalHombres35a39P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres40a44P7').value)) ? parseInt(document.getElementById('txtTotalHombres40a44P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres45a49P7').value)) ? parseInt(document.getElementById('txtTotalHombres45a49P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres50a54P7').value)) ? parseInt(document.getElementById('txtTotalHombres50a54P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres55a59P7').value)) ? parseInt(document.getElementById('txtTotalHombres55a59P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres60yMasP7').value)) ? parseInt(document.getElementById('txtTotalHombres60yMasP7').value) : 0)
        } else if (pregunta == 8 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresSinPagaP8').value)) ? parseInt(document.getElementById('txtTotalHombresSinPagaP8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres1a5000P8').value)) ? parseInt(document.getElementById('txtTotalHombres1a5000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres5001a10000P8').value)) ? parseInt(document.getElementById('txtTotalHombres5001a10000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres10001a15000P8').value)) ? parseInt(document.getElementById('txtTotalHombres10001a15000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres15001a20000P8').value)) ? parseInt(document.getElementById('txtTotalHombres15001a20000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres20001a25000P8').value)) ? parseInt(document.getElementById('txtTotalHombres20001a25000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres25001a30000P8').value)) ? parseInt(document.getElementById('txtTotalHombres25001a30000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres30001a35000P8').value)) ? parseInt(document.getElementById('txtTotalHombres30001a35000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres35001a40000P8').value)) ? parseInt(document.getElementById('txtTotalHombres35001a40000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres40001a45000P8').value)) ? parseInt(document.getElementById('txtTotalHombres40001a45000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres45001a50000P8').value)) ? parseInt(document.getElementById('txtTotalHombres45001a50000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres50001a55000P8').value)) ? parseInt(document.getElementById('txtTotalHombres50001a55000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres55001a60000P8').value)) ? parseInt(document.getElementById('txtTotalHombres55001a60000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres60001a65000P8').value)) ? parseInt(document.getElementById('txtTotalHombres60001a65000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombres65001a70000P8').value)) ? parseInt(document.getElementById('txtTotalHombres65001a70000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMasDe70000P8').value)) ? parseInt(document.getElementById('txtTotalHombresMasDe70000P8').value) : 0)
        } else if (pregunta == 9 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresNingunoP9').value)) ? parseInt(document.getElementById('txtTotalHombresNingunoP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresPresPriP9').value)) ? parseInt(document.getElementById('txtTotalHombresPresPriP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresSecuP9').value)) ? parseInt(document.getElementById('txtTotalHombresSecuP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresPrepaP9').value)) ? parseInt(document.getElementById('txtTotalHombresPrepaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTecnicaP9').value)) ? parseInt(document.getElementById('txtTotalHombresTecnicaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresLicenciaturaP9').value)) ? parseInt(document.getElementById('txtTotalHombresLicenciaturaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMaestriaP9').value)) ? parseInt(document.getElementById('txtTotalHombresMaestriaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresDoctoradoP9').value)) ? parseInt(document.getElementById('txtTotalHombresDoctoradoP9').value) : 0)
        } else if (pregunta == 10 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresPertenecenP10').value)) ? parseInt(document.getElementById('txtTotalHombresPertenecenP10').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNoPertenecenP10').value)) ? parseInt(document.getElementById('txtTotalHombresNoPertenecenP10').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNoIdentificadoP10').value)) ? parseInt(document.getElementById('txtTotalHombresNoIdentificadoP10').value) : 0)
        } else if (pregunta == 11 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresChinantecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresChinantecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresCholP11').value)) ? parseInt(document.getElementById('txtTotalHombresCholP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresCoraP11').value)) ? parseInt(document.getElementById('txtTotalHombresCoraP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresHuastecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresHuastecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresHuicholP11').value)) ? parseInt(document.getElementById('txtTotalHombresHuicholP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMayaP11').value)) ? parseInt(document.getElementById('txtTotalHombresMayaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMayoP11').value)) ? parseInt(document.getElementById('txtTotalHombresMayoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMazahuaP11').value)) ? parseInt(document.getElementById('txtTotalHombresMazahuaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMazatecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresMazatecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMixeP11').value)) ? parseInt(document.getElementById('txtTotalHombresMixeP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresMixtecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresMixtecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNahuatlP11').value)) ? parseInt(document.getElementById('txtTotalHombresNahuatlP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOtomiP11').value)) ? parseInt(document.getElementById('txtTotalHombresOtomiP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTarascoPurepechaP11').value)) ? parseInt(document.getElementById('txtTotalHombresTarascoPurepechaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTarahumaraP11').value)) ? parseInt(document.getElementById('txtTotalHombresTarahumaraP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTepehuanoP11').value)) ? parseInt(document.getElementById('txtTotalHombresTepehuanoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTlapanecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresTlapanecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTotonacoP11').value)) ? parseInt(document.getElementById('txtTotalHombresTotonacoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTseltalP11').value)) ? parseInt(document.getElementById('txtTotalHombresTseltalP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresTsotsilP11').value)) ? parseInt(document.getElementById('txtTotalHombresTsotsilP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresYaquiP11').value)) ? parseInt(document.getElementById('txtTotalHombresYaquiP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresZapotecoP11').value)) ? parseInt(document.getElementById('txtTotalHombresZapotecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresZoqueP11').value)) ? parseInt(document.getElementById('txtTotalHombresZoqueP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOtroP11').value)) ? parseInt(document.getElementById('txtTotalHombresOtroP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNoIdentificadoP11').value)) ? parseInt(document.getElementById('txtTotalHombresNoIdentificadoP11').value) : 0)
        } else if (pregunta == 12 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresConDiscapacidadP12').value)) ? parseInt(document.getElementById('txtTotalHombresConDiscapacidadP12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresSinDiscapacidadP12').value)) ? parseInt(document.getElementById('txtTotalHombresSinDiscapacidadP12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNoIdentificadoP12').value)) ? parseInt(document.getElementById('txtTotalHombresNoIdentificadoP12').value) : 0)
        } else if (pregunta == 13 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalHombresCaminarP13').value)) ? parseInt(document.getElementById('txtTotalHombresCaminarP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresVerP13').value)) ? parseInt(document.getElementById('txtTotalHombresVerP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresBrazosP13').value)) ? parseInt(document.getElementById('txtTotalHombresBrazosP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresAprenderP13').value)) ? parseInt(document.getElementById('txtTotalHombresAprenderP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOirP13').value)) ? parseInt(document.getElementById('txtTotalHombresOirP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresHablarP13').value)) ? parseInt(document.getElementById('txtTotalHombresHablarP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresBaniarseP13').value)) ? parseInt(document.getElementById('txtTotalHombresBaniarseP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresDepresionP13').value)) ? parseInt(document.getElementById('txtTotalHombresDepresionP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresOtroP13').value)) ? parseInt(document.getElementById('txtTotalHombresOtroP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHombresNoIdentificadoP13').value)) ? parseInt(document.getElementById('txtTotalHombresNoIdentificadoP13').value) : 0)
        } else {
            return 0
        }
    } else if (genero == 'mujeres') {
        if (pregunta == 5 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalMujeresConfianzaP5').value)) ? parseInt(document.getElementById('txtTotalMujeresConfianzaP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresBaseP5').value)) ? parseInt(document.getElementById('txtTotalMujeresBaseP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresEventualP5').value)) ? parseInt(document.getElementById('txtTotalMujeresEventualP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresHonorariosP5').value)) ? parseInt(document.getElementById('txtTotalMujeresHonorariosP5').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOtroP5').value)) ? parseInt(document.getElementById('txtTotalMujeresOtroP5').value) : 0)
        } else if (pregunta == 6 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalMujeresISSSTEP6').value)) ? parseInt(document.getElementById('txtTotalMujeresISSSTEP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresISSEFHP6').value)) ? parseInt(document.getElementById('txtTotalMujeresISSEFHP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresIMSSP6').value)) ? parseInt(document.getElementById('txtTotalMujeresIMSSP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOtraP6').value)) ? parseInt(document.getElementById('txtTotalMujeresOtraP6').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresSinSeguridadP6').value)) ? parseInt(document.getElementById('txtTotalMujeresSinSeguridadP6').value) : 0)
        } else if (pregunta == 7 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalMujeres18a24P7').value)) ? parseInt(document.getElementById('txtTotalMujeres18a24P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres25a29P7').value)) ? parseInt(document.getElementById('txtTotalMujeres25a29P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres30a34P7').value)) ? parseInt(document.getElementById('txtTotalMujeres30a34P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres35a39P7').value)) ? parseInt(document.getElementById('txtTotalMujeres35a39P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres40a44P7').value)) ? parseInt(document.getElementById('txtTotalMujeres40a44P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres45a49P7').value)) ? parseInt(document.getElementById('txtTotalMujeres45a49P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres50a54P7').value)) ? parseInt(document.getElementById('txtTotalMujeres50a54P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres55a59P7').value)) ? parseInt(document.getElementById('txtTotalMujeres55a59P7').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres60yMasP7').value)) ? parseInt(document.getElementById('txtTotalMujeres60yMasP7').value) : 0)
        } else if (pregunta == 8 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalMujeresSinPagaP8').value)) ? parseInt(document.getElementById('txtTotalMujeresSinPagaP8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres1a5000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres1a5000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres5001a10000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres5001a10000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres10001a15000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres10001a15000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres15001a20000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres15001a20000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres20001a25000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres20001a25000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres25001a30000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres25001a30000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres30001a35000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres30001a35000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres35001a40000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres35001a40000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres40001a45000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres40001a45000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres45001a50000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres45001a50000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres50001a55000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres50001a55000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres55001a60000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres55001a60000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres60001a65000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres60001a65000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeres65001a70000P8').value)) ? parseInt(document.getElementById('txtTotalMujeres65001a70000P8').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMasDe70000P8').value)) ? parseInt(document.getElementById('txtTotalMujeresMasDe70000P8').value) : 0)
        } else if (pregunta == 9 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalMujeresNingunoP9').value)) ? parseInt(document.getElementById('txtTotalMujeresNingunoP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresPresPriP9').value)) ? parseInt(document.getElementById('txtTotalMujeresPresPriP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresSecuP9').value)) ? parseInt(document.getElementById('txtTotalMujeresSecuP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresPrepaP9').value)) ? parseInt(document.getElementById('txtTotalMujeresPrepaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTecnicaP9').value)) ? parseInt(document.getElementById('txtTotalMujeresTecnicaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresLicenciaturaP9').value)) ? parseInt(document.getElementById('txtTotalMujeresLicenciaturaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMaestriaP9').value)) ? parseInt(document.getElementById('txtTotalMujeresMaestriaP9').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresDoctoradoP9').value)) ? parseInt(document.getElementById('txtTotalMujeresDoctoradoP9').value) : 0)
        } else if (pregunta == 10 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalMujeresPertenecenP10').value)) ? parseInt(document.getElementById('txtTotalMujeresPertenecenP10').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNoPertenecenP10').value)) ? parseInt(document.getElementById('txtTotalMujeresNoPertenecenP10').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP10').value)) ? parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP10').value) : 0)
        } else if (pregunta == 11 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalMujeresChinantecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresChinantecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresCholP11').value)) ? parseInt(document.getElementById('txtTotalMujeresCholP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresCoraP11').value)) ? parseInt(document.getElementById('txtTotalMujeresCoraP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresHuastecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresHuastecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresHuicholP11').value)) ? parseInt(document.getElementById('txtTotalMujeresHuicholP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMayaP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMayaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMayoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMayoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMazahuaP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMazahuaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMazatecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMazatecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMixeP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMixeP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresMixtecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresMixtecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNahuatlP11').value)) ? parseInt(document.getElementById('txtTotalMujeresNahuatlP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOtomiP11').value)) ? parseInt(document.getElementById('txtTotalMujeresOtomiP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTarascoPurepechaP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTarascoPurepechaP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTarahumaraP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTarahumaraP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTepehuanoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTepehuanoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTlapanecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTlapanecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTotonacoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTotonacoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTseltalP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTseltalP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresTsotsilP11').value)) ? parseInt(document.getElementById('txtTotalMujeresTsotsilP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresYaquiP11').value)) ? parseInt(document.getElementById('txtTotalMujeresYaquiP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresZapotecoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresZapotecoP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresZoqueP11').value)) ? parseInt(document.getElementById('txtTotalMujeresZoqueP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOtroP11').value)) ? parseInt(document.getElementById('txtTotalMujeresOtroP11').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP11').value)) ? parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP11').value) : 0)
        } else if (pregunta == 12 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalMujeresConDiscapacidadP12').value)) ? parseInt(document.getElementById('txtTotalMujeresConDiscapacidadP12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresSinDiscapacidadP12').value)) ? parseInt(document.getElementById('txtTotalMujeresSinDiscapacidadP12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP12').value)) ? parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP12').value) : 0)
        } else if (pregunta == 13 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalMujeresCaminarP13').value)) ? parseInt(document.getElementById('txtTotalMujeresCaminarP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresVerP13').value)) ? parseInt(document.getElementById('txtTotalMujeresVerP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresBrazosP13').value)) ? parseInt(document.getElementById('txtTotalMujeresBrazosP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresAprenderP13').value)) ? parseInt(document.getElementById('txtTotalMujeresAprenderP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOirP13').value)) ? parseInt(document.getElementById('txtTotalMujeresOirP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresHablarP13').value)) ? parseInt(document.getElementById('txtTotalMujeresHablarP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresBaniarseP13').value)) ? parseInt(document.getElementById('txtTotalMujeresBaniarseP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresDepresionP13').value)) ? parseInt(document.getElementById('txtTotalMujeresDepresionP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresOtroP13').value)) ? parseInt(document.getElementById('txtTotalMujeresOtroP13').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP13').value)) ? parseInt(document.getElementById('txtTotalMujeresNoIdentificadoP13').value) : 0)
        } else {
            return 0
        }
    } else if (genero == 'inmueblesGeneral') {
        if (pregunta == 24 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalPropiosP24').value)) ? parseInt(document.getElementById('txtTotalPropiosP24').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalRentadosP24').value)) ? parseInt(document.getElementById('txtTotalRentadosP24').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalOtroP24').value)) ? parseInt(document.getElementById('txtTotalOtroP24').value) : 0)
        } else {
            return 0
        }
    } else if (genero == 'inmuebles1Ambos' || genero == 'inmuebles2Ambos') {
        if (pregunta == 26 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal1x1P26').value)) ? parseInt(document.getElementById('txtTotal1x1P26').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x2P26').value)) ? parseInt(document.getElementById('txtTotal1x2P26').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x3P26').value)) ? parseInt(document.getElementById('txtTotal1x3P26').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x1P26').value)) ? parseInt(document.getElementById('txtTotal2x1P26').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x2P26').value)) ? parseInt(document.getElementById('txtTotal2x2P26').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x3P26').value)) ? parseInt(document.getElementById('txtTotal2x3P26').value) : 0)
        } else if (pregunta == 28 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal1x1P28').value)) ? parseInt(document.getElementById('txtTotal1x1P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x2P28').value)) ? parseInt(document.getElementById('txtTotal1x2P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x3P28').value)) ? parseInt(document.getElementById('txtTotal1x3P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x4P28').value)) ? parseInt(document.getElementById('txtTotal1x4P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x5P28').value)) ? parseInt(document.getElementById('txtTotal1x5P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x1P28').value)) ? parseInt(document.getElementById('txtTotal2x1P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x2P28').value)) ? parseInt(document.getElementById('txtTotal2x2P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x3P28').value)) ? parseInt(document.getElementById('txtTotal2x3P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x4P28').value)) ? parseInt(document.getElementById('txtTotal2x4P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x5P28').value)) ? parseInt(document.getElementById('txtTotal2x5P28').value) : 0)
        } else if (pregunta == 30 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal1x1P30').value)) ? parseInt(document.getElementById('txtTotal1x1P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x2P30').value)) ? parseInt(document.getElementById('txtTotal1x2P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x3P30').value)) ? parseInt(document.getElementById('txtTotal1x3P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x4P30').value)) ? parseInt(document.getElementById('txtTotal1x4P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x5P30').value)) ? parseInt(document.getElementById('txtTotal1x5P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x6P30').value)) ? parseInt(document.getElementById('txtTotal1x6P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x7P30').value)) ? parseInt(document.getElementById('txtTotal1x7P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x1P30').value)) ? parseInt(document.getElementById('txtTotal2x1P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x2P30').value)) ? parseInt(document.getElementById('txtTotal2x2P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x3P30').value)) ? parseInt(document.getElementById('txtTotal2x3P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x4P30').value)) ? parseInt(document.getElementById('txtTotal2x4P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x5P30').value)) ? parseInt(document.getElementById('txtTotal2x5P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x6P30').value)) ? parseInt(document.getElementById('txtTotal2x6P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x7P30').value)) ? parseInt(document.getElementById('txtTotal2x7P30').value) : 0)
        }
    } else if (genero == 'inmuebles1') {
        if (pregunta == 26 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal1x1P26').value)) ? parseInt(document.getElementById('txtTotal1x1P26').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x2P26').value)) ? parseInt(document.getElementById('txtTotal1x2P26').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x3P26').value)) ? parseInt(document.getElementById('txtTotal1x3P26').value) : 0)
        } else if (pregunta == 28 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal1x1P28').value)) ? parseInt(document.getElementById('txtTotal1x1P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x2P28').value)) ? parseInt(document.getElementById('txtTotal1x2P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x3P28').value)) ? parseInt(document.getElementById('txtTotal1x3P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x4P28').value)) ? parseInt(document.getElementById('txtTotal1x4P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x5P28').value)) ? parseInt(document.getElementById('txtTotal1x5P28').value) : 0)
        } else if (pregunta == 30 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal1x1P30').value)) ? parseInt(document.getElementById('txtTotal1x1P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x2P30').value)) ? parseInt(document.getElementById('txtTotal1x2P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x3P30').value)) ? parseInt(document.getElementById('txtTotal1x3P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x4P30').value)) ? parseInt(document.getElementById('txtTotal1x4P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x5P30').value)) ? parseInt(document.getElementById('txtTotal1x5P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x6P30').value)) ? parseInt(document.getElementById('txtTotal1x6P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x7P30').value)) ? parseInt(document.getElementById('txtTotal1x7P30').value) : 0)
        }
    } else if (genero == 'inmuebles2') {
        if (pregunta == 26 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal2x1P26').value)) ? parseInt(document.getElementById('txtTotal2x1P26').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x2P26').value)) ? parseInt(document.getElementById('txtTotal2x2P26').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x3P26').value)) ? parseInt(document.getElementById('txtTotal2x3P26').value) : 0)
        } else if (pregunta == 28 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal2x1P28').value)) ? parseInt(document.getElementById('txtTotal2x1P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x2P28').value)) ? parseInt(document.getElementById('txtTotal2x2P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x3P28').value)) ? parseInt(document.getElementById('txtTotal2x3P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x4P28').value)) ? parseInt(document.getElementById('txtTotal2x4P28').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x5P28').value)) ? parseInt(document.getElementById('txtTotal2x5P28').value) : 0)
        } else if (pregunta == 30 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal2x1P30').value)) ? parseInt(document.getElementById('txtTotal2x1P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x2P30').value)) ? parseInt(document.getElementById('txtTotal2x2P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x3P30').value)) ? parseInt(document.getElementById('txtTotal2x3P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x4P30').value)) ? parseInt(document.getElementById('txtTotal2x4P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x5P30').value)) ? parseInt(document.getElementById('txtTotal2x5P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x6P30').value)) ? parseInt(document.getElementById('txtTotal2x6P30').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x7P30').value)) ? parseInt(document.getElementById('txtTotal2x7P30').value) : 0)
        }
    } else if (genero == 'vehiculos') {
        if (pregunta == 31 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalAutomovilesP31').value)) ? parseInt(document.getElementById('txtTotalAutomovilesP31').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalCamionesCamionetasP31').value)) ? parseInt(document.getElementById('txtTotalCamionesCamionetasP31').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalMotocicletasP31').value)) ? parseInt(document.getElementById('txtTotalMotocicletasP31').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalBicicletasP31').value)) ? parseInt(document.getElementById('txtTotalBicicletasP31').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalHelicopterosP31').value)) ? parseInt(document.getElementById('txtTotalHelicopterosP31').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalDronesP31').value)) ? parseInt(document.getElementById('txtTotalDronesP31').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalOtrosP31').value)) ? parseInt(document.getElementById('txtTotalOtrosP31').value) : 0)
        }
    } else if (genero == 'lineas') {
        if (pregunta == 32 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalLineasFijasP32').value)) ? parseInt(document.getElementById('txtTotalLineasFijasP32').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalLineasMovilesP32').value)) ? parseInt(document.getElementById('txtTotalLineasMovilesP32').value) : 0)
        }
    } else if (genero == 'aparatos') {
        if (pregunta == 32 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalAparatosFijosP32').value)) ? parseInt(document.getElementById('txtTotalAparatosFijosP32').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalAparatosMovilesP32').value)) ? parseInt(document.getElementById('txtTotalAparatosMovilesP32').value) : 0)
        }
    } else if (genero == 'computadoras') {
        if (pregunta == 33 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalComputadoraPersonalP33').value)) ? parseInt(document.getElementById('txtTotalComputadoraPersonalP33').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalComputadoraPortatilP33').value)) ? parseInt(document.getElementById('txtTotalComputadoraPortatilP33').value) : 0)
        }
    } else if (genero == 'impresoras') {
        if (pregunta == 33 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotalImpresoraPersonalP33').value)) ? parseInt(document.getElementById('txtTotalImpresoraPersonalP33').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotalImpresoraCompartidaP33').value)) ? parseInt(document.getElementById('txtTotalImpresoraCompartidaP33').value) : 0)
        }
    } else if (genero == 'computadorasP35') {
        if (pregunta == 35 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal1x1P35').value)) ? parseInt(document.getElementById('txtTotal1x1P35').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal1x2P35').value)) ? parseInt(document.getElementById('txtTotal1x2P35').value) : 0)
        }
    } else if (genero == 'impresorasP35') {
        if (pregunta == 35 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal2x1P35').value)) ? parseInt(document.getElementById('txtTotal2x1P35').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal2x2P35').value)) ? parseInt(document.getElementById('txtTotal2x2P35').value) : 0)
        }
    } else if (genero == 'multifuncionalesP35') {
        if (pregunta == 35 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal3x1P35').value)) ? parseInt(document.getElementById('txtTotal3x1P35').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal3x2P35').value)) ? parseInt(document.getElementById('txtTotal3x2P35').value) : 0)
        }
    } else if (genero == 'servidoresP35') {
        if (pregunta == 35 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal4x1P35').value)) ? parseInt(document.getElementById('txtTotal4x1P35').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal4x2P35').value)) ? parseInt(document.getElementById('txtTotal4x2P35').value) : 0)
        }
    } else if (genero == 'tabletasP35') {
        if (pregunta == 35 && seccion == 1) {
            return (!isNaN(parseInt(document.getElementById('txtTotal5x1P35').value)) ? parseInt(document.getElementById('txtTotal5x1P35').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtTotal5x2P35').value)) ? parseInt(document.getElementById('txtTotal5x2P35').value) : 0)
        }
    } else if (genero == 'contratosP7') {
        if (pregunta == 7 && seccion == 12) {
            return (!isNaN(parseInt(document.getElementById('txtContratosRealizadosTipo1P7s12').value)) ? parseInt(document.getElementById('txtContratosRealizadosTipo1P7s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosRealizadosTipo2P7s12').value)) ? parseInt(document.getElementById('txtContratosRealizadosTipo2P7s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosRealizadosTipo3P7s12').value)) ? parseInt(document.getElementById('txtContratosRealizadosTipo3P7s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosRealizadosTipo4P7s12').value)) ? parseInt(document.getElementById('txtContratosRealizadosTipo4P7s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosRealizadosTipo5P7s12').value)) ? parseInt(document.getElementById('txtContratosRealizadosTipo5P7s12').value) : 0)
        }
    } else if (genero == 'ambosContratosP8') {
        if (pregunta == 8 && seccion == 12) {
            return (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo1P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo1P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo2P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo2P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo3P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo3P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo4P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo4P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo5P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo5P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo1P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo1P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo2P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo2P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo3P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo3P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo4P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo4P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo5P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo5P8s12').value) : 0)
        }
    } else if (genero == 'contratos1P8') {
        if (pregunta == 8 && seccion == 12) {
            return (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo1P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo1P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo2P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo2P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo3P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo3P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo4P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo4P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo5P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo5P8s12').value) : 0)
        }
    } else if (genero == 'contratos2P8') {
        if (pregunta == 8 && seccion == 12) {
            return (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo1P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo1P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo2P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo2P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo3P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo3P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo4P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo4P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo5P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo5P8s12').value) : 0)
        }
    } else if (genero == 'contratosP8p1') {
        if (pregunta == 8 && seccion == 12) {
            return (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo1P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo1P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo1P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo1P8s12').value) : 0)
        }
    } else if (genero == 'contratosP8p2') {
        if (pregunta == 8 && seccion == 12) {
            return (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo2P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo2P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo2P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo2P8s12').value) : 0)
        }
    } else if (genero == 'contratosP8p3') {
        if (pregunta == 8 && seccion == 12) {
            return (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo3P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo3P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo3P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo3P8s12').value) : 0)
        }
    } else if (genero == 'contratosP8p4') {
        if (pregunta == 8 && seccion == 12) {
            return (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo4P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo4P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo4P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo4P8s12').value) : 0)
        }
    } else if (genero == 'contratosP8p5') {
        if (pregunta == 8 && seccion == 12) {
            return (!isNaN(parseInt(document.getElementById('txtContratosAdquisicionesTipo5P8s12').value)) ? parseInt(document.getElementById('txtContratosAdquisicionesTipo5P8s12').value) : 0) +
                (!isNaN(parseInt(document.getElementById('txtContratosObraPublicaTipo5P8s12').value)) ? parseInt(document.getElementById('txtContratosObraPublicaTipo5P8s12').value) : 0)
        }
    } else if (genero == 'montosP9') {
        if (pregunta == 9 && seccion == 12) {
            return (!isNaN(parseFloat(document.getElementById('txtMontoContratosTipo1P9s12').value)) ? parseFloat(document.getElementById('txtMontoContratosTipo1P9s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoContratosTipo2P9s12').value)) ? parseFloat(document.getElementById('txtMontoContratosTipo2P9s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoContratosTipo3P9s12').value)) ? parseFloat(document.getElementById('txtMontoContratosTipo3P9s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoContratosTipo4P9s12').value)) ? parseFloat(document.getElementById('txtMontoContratosTipo4P9s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoContratosTipo5P9s12').value)) ? parseFloat(document.getElementById('txtMontoContratosTipo5P9s12').value) : 0)
        }
    } else if (genero == 'ambosMontosP10') {
        if (pregunta == 10 && seccion == 12) {
            return (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo1P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo1P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo2P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo2P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo3P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo3P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo4P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo4P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo5P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo5P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo1P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo1P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo2P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo2P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo3P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo3P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo4P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo4P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo5P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo5P10s12').value) : 0)
        }
    } else if (genero == 'montos1P10') {
        if (pregunta == 10 && seccion == 12) {
            return (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo1P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo1P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo2P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo2P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo3P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo3P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo4P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo4P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo5P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo5P10s12').value) : 0)
        }
    } else if (genero == 'montos2P10') {
        if (pregunta == 10 && seccion == 12) {
            return (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo1P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo1P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo2P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo2P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo3P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo3P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo4P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo4P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo5P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo5P10s12').value) : 0)
        }
    } else if (genero == 'contratosP10p1') {
        if (pregunta == 10 && seccion == 12) {
            return (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo1P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo1P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo1P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo1P10s12').value) : 0)
        }
    } else if (genero == 'contratosP10p2') {
        if (pregunta == 10 && seccion == 12) {
            return (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo2P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo2P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo2P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo2P10s12').value) : 0)
        }
    } else if (genero == 'contratosP10p3') {
        if (pregunta == 10 && seccion == 12) {
            return (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo3P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo3P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo3P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo3P10s12').value) : 0)
        }
    } else if (genero == 'contratosP10p4') {
        if (pregunta == 10 && seccion == 12) {
            return (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo4P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo4P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo4P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo4P10s12').value) : 0)
        }
    } else if (genero == 'contratosP10p5') {
        if (pregunta == 10 && seccion == 12) {
            return (!isNaN(parseFloat(document.getElementById('txtMontoAdquisicionesTipo5P10s12').value)) ? parseFloat(document.getElementById('txtMontoAdquisicionesTipo5P10s12').value) : 0) +
                (!isNaN(parseFloat(document.getElementById('txtMontoObraPublicaTipo5P10s12').value)) ? parseFloat(document.getElementById('txtMontoObraPublicaTipo5P10s12').value) : 0)
        }
    } else {
        return 0
    }
}

async function resetearFormularios(forms) {
    await forms.forEach(form => {
        document.getElementById(form).reset()
        if (form == 'formPregunta14') {
            document.getElementById('contenedorPersonalFederalP14').classList.add('d-none')
            document.getElementById('txtTotalHombresP14').removeAttribute('required')
            document.getElementById('txtTotalMujeresP14').removeAttribute('required')
        } else if (form == 'formPregunta15') {
            document.getElementById('contenedorPersonalFederalP15').classList.add('d-none')
            document.getElementById('txtTotalHombresP15').removeAttribute('required')
            document.getElementById('txtTotalMujeresP15').removeAttribute('required')
        } else if (form == 'formPregunta26') {
            document.getElementById('contenedorOtraFuncionEspecificoP26').classList.add('d-none')
            document.getElementById('otraFuncionEspecificoP26').removeAttribute('required')
        } else if (form == 'formPregunta28') {
            document.getElementById('contenedorOtraFuncionEspecificoP28').classList.add('d-none')
            document.getElementById('otraFuncionEspecificoP28').removeAttribute('required')
        } else if (form == 'formPregunta30') {
            document.getElementById('contenedorOtraFuncionEspecificaP30').classList.add('d-none')
            document.getElementById('otraFuncionEspecificaP30').removeAttribute('required')
        } else if (form == 'formPregunta5') {
            document.getElementById('contenedorotroEspecificoP5').classList.add('d-none')
            document.getElementById('otroEspecificoP5').removeAttribute('required')
        } else if (form == 'formPregunta6') {
            document.getElementById('contenedorOtroYsinSeguridadEspecificoP6').classList.add('d-none')
            document.getElementById('otroYsinSeguridadEspecificoP6').removeAttribute('required')
        } else if (form == 'formPregunta8') {
            document.getElementById('contenedorSinPagaEspecificoP8').classList.add('d-none')
            document.getElementById('sinPagaEspecificoP8').removeAttribute('required')
        } else if (form == 'formPregunta9') {
            document.getElementById('contenedorNingunoEspecificoP9').classList.add('d-none')
            document.getElementById('ningunoEspecificoP9').removeAttribute('required')
        } else if (form == 'formPregunta10') {
            document.getElementById('contenedorNoIdentificadoEspecificoP10').classList.add('d-none')
            document.getElementById('noIdentificadoEspecificoP10').removeAttribute('required')
        } else if (form == 'formPregunta11') {
            document.getElementById('contenedorOtroNoIdentificadoEspecificoP11').classList.add('d-none')
            document.getElementById('otroNoIdentificadoEspecificoP11').removeAttribute('required')
        } else if (form == 'formPregunta12') {
            document.getElementById('contenedorNoIdentificadoEspecificoP12').classList.add('d-none')
            document.getElementById('noIdentificadoEspecificoP12').removeAttribute('required')
        } else if (form == 'formPregunta13') {
            document.getElementById('contenedorOtroYnoIdentificadoEspecificoP13').classList.add('d-none')
            document.getElementById('otroYnoIdentificadoEspecificoP13').removeAttribute('required')
        } else if (form == 'formPregunta17') {
            document.getElementById('contenedorOtroEspecificoP17').classList.add('d-none')
            document.getElementById('otroEspecificoP17').removeAttribute('required')
        } else if (form == 'formPregunta18') {
            document.getElementById('contenedorUnidadAdministrativaP18').classList.add('d-none')
            document.getElementById('txtUnidadAdministrativaP18').removeAttribute('required')
        } else if (form == 'formPregunta35') {
            document.getElementById('contenedorOtraFuncionEspecificaP35').classList.add('d-none')
            document.getElementById('txtOtraFuncionEspecificaP35').removeAttribute('required')
        } else if (form == 'formPregunta19') {
            document.getElementById('contenedorAccionesFormativasP19').classList.add('d-none')
            document.getElementById('txtTotalImpartidasP19').removeAttribute('required')
            document.getElementById('txtTotalImpartidasConcluidasP19').removeAttribute('required')
            document.getElementById('txtTotalPersonalP19').removeAttribute('required')
            document.getElementById('txtTotalHombresP19').removeAttribute('required')
            document.getElementById('txtTotalMujeresP19').removeAttribute('required')
        } else if (form == 'formPregunta2s12') {
            document.getElementById('contenedorOtroProcedimiento1P2s12').classList.add('d-none')
            document.getElementById('txtOtroProcedimiento1P2s12').removeAttribute('required')
            document.getElementById('txtOtroProcedimiento1P2s12').value = ''
            document.getElementById('contenedorOtroProcedimiento2P2s12').classList.add('d-none')
            document.getElementById('txtOtroProcedimiento2P2s12').removeAttribute('required')
            document.getElementById('txtOtroProcedimiento2P2s12').value = ''
        } else if (form == 'formPregunta3s12') {
            document.getElementById('contenedorOtroMecanismo1P3s12').classList.add('d-none')
            document.getElementById('txtOtroMecanismo1P3s12').removeAttribute('required')
            document.getElementById('txtOtroMecanismo1P3s12').value = ''
            document.getElementById('contenedorOtroMecanismo2P3s12').classList.add('d-none')
            document.getElementById('txtOtroMecanismo2P3s12').removeAttribute('required')
            document.getElementById('txtOtroMecanismo2P3s12').value = ''
        } else if (form == 'formPregunta5s12') {
            document.getElementById('contenedorOtroProcedimientoP5s12').classList.add('d-none')
            document.getElementById('inputEtapaProcedimientoP5s12').removeAttribute('required')
            document.getElementById('inputEtapaProcedimientoP5s12').value = ''
        } else if (form == 'formPregunta7s12') {
            document.getElementById('txtContratosRealizadosTipo1P7s12').removeAttribute('disabled')
            document.getElementById('txtContratosRealizadosTipo2P7s12').removeAttribute('disabled')
            document.getElementById('txtContratosRealizadosTipo3P7s12').removeAttribute('disabled')
            document.getElementById('txtContratosRealizadosTipo4P7s12').removeAttribute('disabled')
            document.getElementById('txtContratosRealizadosTipo5P7s12').removeAttribute('disabled')
        } else if (form == 'formPregunta8s12') {
            document.getElementById('txtContratosAdquisicionesTipo1P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosObraPublicaTipo1P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosAdquisicionesTipo2P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosObraPublicaTipo2P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosAdquisicionesTipo3P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosObraPublicaTipo3P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosAdquisicionesTipo4P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosObraPublicaTipo4P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosAdquisicionesTipo5P8s12').removeAttribute('disabled')
            document.getElementById('txtContratosObraPublicaTipo5P8s12').removeAttribute('disabled')
        } else if (form == 'formPregunta9s12') {
            document.getElementById('txtMontoContratosTipo1P9s12').removeAttribute('disabled')
            document.getElementById('txtMontoContratosTipo2P9s12').removeAttribute('disabled')
            document.getElementById('txtMontoContratosTipo3P9s12').removeAttribute('disabled')
            document.getElementById('txtMontoContratosTipo4P9s12').removeAttribute('disabled')
            document.getElementById('txtMontoContratosTipo5P9s12').removeAttribute('disabled')
        } else if (form == 'formPregunta10s12') {
            document.getElementById('txtMontoAdquisicionesTipo1P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoObraPublicaTipo1P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoAdquisicionesTipo2P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoObraPublicaTipo2P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoAdquisicionesTipo3P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoObraPublicaTipo3P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoAdquisicionesTipo4P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoObraPublicaTipo4P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoAdquisicionesTipo5P10s12').removeAttribute('disabled')
            document.getElementById('txtMontoObraPublicaTipo5P10s12').removeAttribute('disabled')
        }
    })
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
                    alertify.error('Verifique su información')
                } else {
                    event.preventDefault()
                    event.stopPropagation()
                    if (form.id == 'formPregunta1') {
                        if (!verificarComentariosIguales()) {
                            alertify.error('Las funciones no pueden repetirse y/o estar vacías');
                        } else {
                            if (!preguntasContestadas['itemPregunta1s1']) {
                                enviarPregunta(1, 1)
                            } else {
                                alertify.confirm(
                                    'Editando pregunta...',
                                    '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 1?</span> Deberá volver a contestar todas las preguntas referentes a las funciones ejercidas por su institución.',
                                    function () {
                                        resetearFormularios(['formPregunta14', 'formPregunta15', 'formPregunta25', 'formPregunta26', 'formPregunta27', 'formPregunta28', 'formPregunta29', 'formPregunta30', 'formPregunta34', 'formPregunta35']).then(() => {
                                            enviarPregunta(1, 1)
                                        })
                                    },
                                    function () {
                                        alertify.error('Cancelado')
                                    }
                                ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                            }
                        }
                    } else if (form.id == 'formPregunta2') {
                        enviarPregunta(2, 1)
                    } else if (form.id == 'formPregunta3') {
                        if (document.getElementById('txtMismoTitularP3').value == 'Si') {
                            let idMismoTitular = document.getElementById('txtClaveMismoTitularP3').value
                            verificarMismoTitular(idMismoTitular).then((res) => {
                                if (res != undefined && res == true) {
                                    enviarPregunta(3, 1)
                                } else if (res != undefined && res == false) {
                                    alertify.alert('Imposible guardar datos !', 'La información registrada del titular con clave <span class="h5 text-dark font-weight-bold">' + idMismoTitular + '</span> es incorrecta.<br><br><small>Asegurese de que la información sea correcta y de que el titular que menciona ya haya sido registrado en este censo.</small>').set('label', 'Ok');
                                } else {
                                    console.error('Tipo de respuesta no definido en success: ' + res);
                                }
                            })
                        } else {
                            enviarPregunta(3, 1)
                        }
                    } else if (form.id == 'formPregunta4') {
                        if (!preguntasContestadas['itemPregunta4s1']) {
                            enviarPregunta(4, 1)
                        } else {
                            alertify.confirm(
                                'Editando pregunta...',
                                '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 4?</span> Deberá volver a contestar todas las preguntas referentes a características del personal.',
                                function () {
                                    resetearFormularios(['formPregunta5', 'formPregunta6', 'formPregunta7', 'formPregunta8', 'formPregunta9', 'formPregunta10', 'formPregunta11', 'formPregunta12', 'formPregunta13', 'formPregunta14', 'formPregunta15', 'formPregunta19', 'formComplementoS1']).then(() => {
                                        enviarPregunta(4, 1)
                                    })
                                },
                                function () {
                                    alertify.error('Cancelado')
                                }
                            ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                        }
                    } else if (form.id == 'formPregunta5') {
                        if (preguntasContestadas['itemPregunta4s1']) {
                            obtenerConteoPersonal().then(() => {
                                if (
                                    parseInt(document.getElementById('txtTotalHombresP5').value) == totalHombres &&
                                    parseInt(document.getElementById('txtTotalMujeresP5').value) == totalMujeres
                                ) {
                                    enviarPregunta(5, 1)
                                } else {
                                    alertify.alert('Imposible guardar datos !', 'El total de personal debe corresponder al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                }
                            });
                        } else {
                            alertify.error('Antes debe contestar la pregunta 4')
                            return 0
                        }
                    } else if (form.id == 'formPregunta6') {
                        if (preguntasContestadas['itemPregunta4s1']) {
                            obtenerConteoPersonal().then(() => {
                                if (
                                    parseInt(document.getElementById('txtTotalHombresP6').value) == totalHombres &&
                                    parseInt(document.getElementById('txtTotalMujeresP6').value) == totalMujeres
                                ) {
                                    enviarPregunta(6, 1)
                                } else {
                                    alertify.alert('Imposible guardar datos !', 'El total de personal debe corresponder al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                }
                            });
                        } else {
                            alertify.error('Antes debe contestar la pregunta 4')
                            return 0
                        }
                    } else if (form.id == 'formPregunta7') {
                        if (preguntasContestadas['itemPregunta4s1']) {
                            obtenerConteoPersonal().then(() => {
                                if (
                                    parseInt(document.getElementById('txtTotalHombresP7').value) == totalHombres &&
                                    parseInt(document.getElementById('txtTotalMujeresP7').value) == totalMujeres
                                ) {
                                    enviarPregunta(7, 1)
                                } else {
                                    alertify.alert('Imposible guardar datos !', 'El total de personal debe corresponder al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                }
                            });
                        } else {
                            alertify.error('Antes debe contestar la pregunta 4')
                            return 0
                        }
                    } else if (form.id == 'formPregunta8') {
                        if (preguntasContestadas['itemPregunta4s1']) {
                            obtenerConteoPersonal().then(() => {
                                if (
                                    parseInt(document.getElementById('txtTotalHombresP8').value) == totalHombres &&
                                    parseInt(document.getElementById('txtTotalMujeresP8').value) == totalMujeres
                                ) {
                                    enviarPregunta(8, 1)
                                } else {
                                    alertify.alert('Imposible guardar datos !', 'El total de personal debe corresponder al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                }
                            });
                        } else {
                            alertify.error('Antes debe contestar la pregunta 4')
                            return 0
                        }
                    } else if (form.id == 'formPregunta9') {
                        if (preguntasContestadas['itemPregunta4s1']) {
                            obtenerConteoPersonal().then(() => {
                                if (
                                    parseInt(document.getElementById('txtTotalHombresP9').value) == totalHombres &&
                                    parseInt(document.getElementById('txtTotalMujeresP9').value) == totalMujeres
                                ) {
                                    enviarPregunta(9, 1)
                                } else {
                                    alertify.alert('Imposible guardar datos !', 'El total de personal debe corresponder al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                }
                            });
                        } else {
                            alertify.error('Antes debe contestar la pregunta 4')
                            return 0
                        }
                    } else if (form.id == 'formPregunta10') {
                        if (preguntasContestadas['itemPregunta4s1']) {
                            obtenerConteoPersonal().then(() => {
                                if (
                                    parseInt(document.getElementById('txtTotalHombresP10').value) == totalHombres &&
                                    parseInt(document.getElementById('txtTotalMujeresP10').value) == totalMujeres
                                ) {
                                    if (!preguntasContestadas['itemPregunta10s1']) {
                                        enviarPregunta(10, 1)
                                    } else {
                                        alertify.confirm(
                                            'Editando pregunta...',
                                            '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 10?</span> Deberá volver a contestar todas las preguntas referentes a personal perteneciente a algún pueblo indígena.',
                                            function () {
                                                resetearFormularios(['formPregunta11']).then(() => {
                                                    enviarPregunta(10, 1)
                                                })
                                            },
                                            function () {
                                                alertify.error('Cancelado')
                                            }
                                        ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                                    }
                                } else {
                                    alertify.alert('Imposible guardar datos !', 'El total de personal debe corresponder al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                }
                            });
                        } else {
                            alertify.error('Antes debe contestar la pregunta 4')
                            return 0
                        }
                    } else if (form.id == 'formPregunta11') {
                        if (preguntasContestadas['itemPregunta4s1'] && preguntasContestadas['itemPregunta10s1']) {
                            obtenerConteoPersonalIndigena().then(() => {
                                if (
                                    parseInt(document.getElementById('txtTotalHombresP11').value) == totalHombresIndigenas &&
                                    parseInt(document.getElementById('txtTotalMujeresP11').value) == totalMujeresIndigenas
                                ) {
                                    enviarPregunta(11, 1)
                                } else {
                                    alertify.alert('Imposible guardar datos !', 'El total de personal debe corresponder al ya definido en la pregunta 10, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                }
                            });
                        } else {
                            alertify.error('Antes debe contestar las preguntas 4 y 10')
                            return 0
                        }
                    } else if (form.id == 'formPregunta12') {
                        if (preguntasContestadas['itemPregunta4s1']) {
                            obtenerConteoPersonal().then(() => {
                                if (
                                    parseInt(document.getElementById('txtTotalHombresP12').value) == totalHombres &&
                                    parseInt(document.getElementById('txtTotalMujeresP12').value) == totalMujeres
                                ) {
                                    if (!preguntasContestadas['itemPregunta12s1']) {
                                        enviarPregunta(12, 1)
                                    } else {
                                        alertify.confirm(
                                            'Editando pregunta...',
                                            '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 12?</span> Deberá volver a contestar todas las preguntas referentes a personal discapacitado.',
                                            function () {
                                                resetearFormularios(['formPregunta13']).then(() => {
                                                    enviarPregunta(12, 1)
                                                })
                                            },
                                            function () {
                                                alertify.error('Cancelado')
                                            }
                                        ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                                    }
                                } else {
                                    alertify.alert('Imposible guardar datos !', 'El total de personal debe corresponder al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                }
                            });
                        } else {
                            alertify.error('Antes debe contestar la pregunta 4')
                            return 0
                        }
                    } else if (form.id == 'formPregunta13') {
                        if (preguntasContestadas['itemPregunta4s1'] && preguntasContestadas['itemPregunta12s1']) {
                            obtenerConteoPersonalDiscapacitado().then(() => {
                                if (totalHombresDiscapacitados == 0 && totalMujeresDiscapacitadas == 0) {
                                    if (
                                        parseInt(document.getElementById('txtTotalHombresP13').value) == totalHombresDiscapacitados &&
                                        parseInt(document.getElementById('txtTotalMujeresP13').value) == totalMujeresDiscapacitadas
                                    ) {
                                        enviarPregunta(13, 1)
                                    } else {
                                        alertify.alert('Imposible guardar datos !', 'No registró personal discapacitado en la pregunta 12').set('label', 'Ok');
                                    }
                                } else {
                                    if (
                                        parseInt(document.getElementById('txtTotalHombresP13').value) >= totalHombresDiscapacitados &&
                                        parseInt(document.getElementById('txtTotalMujeresP13').value) >= totalMujeresDiscapacitadas
                                    ) {
                                        if (totalHombresDiscapacitados == 0 && parseInt(document.getElementById('txtTotalHombresP13').value) > 0) {
                                            alertify.alert('Imposible guardar datos !', 'No registró hombres discapacitados en la pregunta 12').set('label', 'Ok');
                                        } else if (totalMujeresDiscapacitadas == 0 && parseInt(document.getElementById('txtTotalMujeresP13').value) > 0) {
                                            alertify.alert('Imposible guardar datos !', 'No registró mujeres discapacitadas en la pregunta 12').set('label', 'Ok');
                                        } else {
                                            enviarPregunta(13, 1)
                                        }
                                    } else {
                                        alertify.alert('Imposible guardar datos !', 'El total de personal debe ser igual o mayor al ya definido en la pregunta 12, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                    }
                                }
                            });
                        } else {
                            alertify.error('Antes debe contestar las preguntas 4 y 12')
                            return
                        }
                    } else if (form.id == 'formPregunta14') {
                        if (preguntasContestadas['itemPregunta4s1']) {
                            if (
                                document.getElementById('btnRadioSiP14').checked ||
                                document.getElementById('btnRadioNoP14').checked ||
                                document.getElementById('btnRadioNoSeP14').checked
                            ) {
                                if (document.getElementById('btnRadioSiP14').checked) {
                                    obtenerConteoPersonal().then(() => {
                                        if (
                                            parseInt(document.getElementById('txtTotalHombresP14').value) <= totalHombres &&
                                            parseInt(document.getElementById('txtTotalMujeresP14').value) <= totalMujeres
                                        ) {
                                            enviarPregunta(14, 1)
                                        } else {
                                            alertify.alert('Imposible guardar datos !', 'El total de personal debe ser igual o menor al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                        }
                                    });
                                } else {
                                    enviarPregunta(14, 1)
                                }
                            } else {
                                alertify.error('Seleccione una opción')
                            }
                        } else {
                            alertify.error('Antes debe contestar la pregunta 4')
                            return 0
                        }
                    } else if (form.id == 'formPregunta15') {
                        if (preguntasContestadas['itemPregunta4s1']) {
                            if (document.getElementById('txtContabilizoPersonalP15').value == 'Si') {
                                obtenerConteoPersonal().then(() => {
                                    if (
                                        parseInt(document.getElementById('txtTotalHombresP15').value) <= totalHombres &&
                                        parseInt(document.getElementById('txtTotalMujeresP15').value) <= totalMujeres
                                    ) {
                                        enviarPregunta(15, 1)
                                    } else {
                                        alertify.alert('Imposible guardar datos !', 'El total de personal debe ser igual o menor al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                    }
                                });
                            } else {
                                enviarPregunta(15, 1)
                            }
                        } else {
                            alertify.error('Antes debe contestar la pregunta 4')
                            return 0
                        }
                    } else if (form.id == 'formPregunta16') {
                        if (!preguntasContestadas['itemPregunta16s1']) {
                            enviarPregunta(16, 1)
                        } else {
                            alertify.confirm(
                                'Editando pregunta...',
                                '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 16?</span> Deberá volver a contestar todas las preguntas referentes a profesionalización del personal.',
                                function () {
                                    resetearFormularios(['formPregunta17', 'formPregunta18']).then(() => {
                                        enviarPregunta(16, 1)
                                    })
                                },
                                function () {
                                    alertify.error('Cancelado')
                                }
                            ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                        }
                    } else if (form.id == 'formPregunta17') {
                        // if (algunCheck()) {
                        enviarPregunta(17, 1)
                        // } else {
                        //     alertify.error('Marque almenos una opción')
                        // }
                    } else if (form.id == 'formPregunta18') {
                        enviarPregunta(18, 1)
                    } else if (form.id == 'formPregunta19') {
                        if (document.getElementById('selectAccionesFormativasP19').value == '1') {
                            obtenerConteoPersonal().then(() => {
                                if (
                                    parseInt(document.getElementById('txtTotalHombresP19').value) <= totalHombres &&
                                    parseInt(document.getElementById('txtTotalMujeresP19').value) <= totalMujeres
                                ) {
                                    enviarPregunta(19, 1)
                                } else {
                                    alertify.alert('Imposible guardar datos !', 'El total de personal debe ser igual o menor al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                                }
                            });
                        } else {
                            enviarPregunta(19, 1)
                        }
                    } else if (form.id == 'formPregunta24') {
                        if (!preguntasContestadas['itemPregunta24s1']) {
                            enviarPregunta(24, 1)
                        } else {
                            alertify.confirm(
                                'Editando pregunta...',
                                '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 24?</span> Deberá volver a contestar todas las preguntas referentes a bienes inmuebles.',
                                function () {
                                    resetearFormularios(['formPregunta25', 'formPregunta26', 'formPregunta27', 'formPregunta28', 'formPregunta29', 'formPregunta30']).then(() => {
                                        enviarPregunta(24, 1)
                                    })
                                },
                                function () {
                                    alertify.error('Cancelado')
                                }
                            ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                        }
                    } else if (form.id == 'formPregunta25') {
                        enviarPregunta(25, 1)
                    } else if (form.id == 'formPregunta26') {
                        contieneEducacionPrincipal().then((res) => {
                            if (res != undefined) {
                                if (res == false && parseInt(document.getElementById('txtTotalInmuebles1P26').value) > 0) {
                                    alertify.alert('Imposible guardar datos !', 'Ha contado bienes inmuebles en el apartado 1., pero su función principal no es Educación!')
                                    return
                                } else {
                                    obtenerConteoInmuebles().then(() => {
                                        if (
                                            parseInt(document.getElementById('txtTotalInmueblesP26').value) <= (totalPropios + totalRentados + totalOtros)
                                        ) {
                                            enviarPregunta(26, 1)
                                        } else {
                                            alertify.alert('Imposible guardar datos !', 'El total de bienes inmuebles debe ser igual o menor a la suma del ya definido en la pregunta 24, así como corresponder a su desagregación por tipo de función principal').set('label', 'Ok');
                                        }
                                    })
                                }
                            } else {
                                return // Error en la peticion
                            }
                        })
                    } else if (form.id == 'formPregunta27') {
                        enviarPregunta(27, 1)
                    } else if (form.id == 'formPregunta28') {
                        contieneSaludPrincipal().then((res) => {
                            if (res != undefined) {
                                if (res == false && parseInt(document.getElementById('txtTotalInmuebles1P28').value) > 0) {
                                    alertify.alert('Imposible guardar datos !', 'Ha contado bienes inmuebles en el apartado 1., pero su función principal no es Salud!')
                                    return 0
                                } else {
                                    obtenerConteoInmuebles().then(() => {
                                        if (
                                            parseInt(document.getElementById('txtTotalInmueblesP28').value) <= (totalPropios + totalRentados + totalOtros)
                                        ) {
                                            enviarPregunta(28, 1)
                                        } else {
                                            alertify.alert('Imposible guardar datos !', 'El total de bienes inmuebles debe ser igual o menor a la suma del ya definido en la pregunta 24, así como corresponder a su desagregación por tipo de función principal').set('label', 'Ok');
                                        }
                                    })
                                }
                            } else {
                                return 0; // Error en la peticion
                            }
                        })
                    } else if (form.id == 'formPregunta29') {
                        enviarPregunta(29, 1)
                    } else if (form.id == 'formPregunta30') {
                        contieneDeportePrincipal().then((res) => {
                            if (res != undefined) {
                                if (res == false && parseInt(document.getElementById('txtTotalInmuebles1P30').value) > 0) {
                                    alertify.alert('Imposible guardar datos !', 'Ha contado bienes inmuebles en el apartado 1., pero su función principal no es Cultura física y/o deporte!')
                                    return 0
                                } else {
                                    obtenerConteoInmuebles().then(() => {
                                        if (
                                            parseInt(document.getElementById('txtTotalInmueblesP30').value) <= (totalPropios + totalRentados + totalOtros)
                                        ) {
                                            enviarPregunta(30, 1)
                                        } else {
                                            alertify.alert('Imposible guardar datos !', 'El total de bienes inmuebles debe ser igual o menor a la suma del ya definido en la pregunta 24, así como corresponder a su desagregación por tipo de función principal').set('label', 'Ok');
                                        }
                                    })
                                }
                            } else {
                                return 0; // Error en la peticion
                            }
                        })
                    } else if (form.id == 'formPregunta31') {
                        enviarPregunta(31, 1)
                    } else if (form.id == 'formPregunta32') {
                        enviarPregunta(32, 1)
                    } else if (form.id == 'formPregunta33') {
                        if (!preguntasContestadas['itemPregunta33s1']) {
                            enviarPregunta(33, 1)
                        } else {
                            alertify.confirm(
                                'Editando pregunta...',
                                '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 33?</span> Deberá volver a contestar todas las preguntas referentes a equipo informático.',
                                function () {
                                    resetearFormularios(['formPregunta34', 'formPregunta35']).then(() => {
                                        enviarPregunta(33, 1)
                                    })
                                },
                                function () {
                                    alertify.error('Cancelado')
                                }
                            ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                        }
                    } else if (form.id == 'formPregunta34') {
                        enviarPregunta(34, 1)
                    } else if (form.id == 'formPregunta35') {
                        contieneEducacionPrincipal().then((res) => {
                            if (res != undefined) {
                                if (
                                    res == false && parseInt(document.getElementById('txtTotal1x1P35').value) > 0 ||
                                    res == false && parseInt(document.getElementById('txtTotal2x1P35').value) > 0 ||
                                    res == false && parseInt(document.getElementById('txtTotal3x1P35').value) > 0 ||
                                    res == false && parseInt(document.getElementById('txtTotal4x1P35').value) > 0 ||
                                    res == false && parseInt(document.getElementById('txtTotal5x1P35').value) > 0
                                ) {
                                    alertify.alert('Imposible guardar datos !', 'Ha contado bienes inmuebles en alguno de los apartados 1.1, 2.1, 3.1, 4.1 ó 5.1, pero su función principal no es Educación!')
                                    return
                                } else {
                                    obtenerConteoEquipoInformatico().then(() => {
                                        let c = 0,
                                            totalExedido = []

                                        parseInt(document.getElementById('txtTotal1P35').value) <= totalComputadoras ? c++ : totalExedido.push('computadoras')
                                        parseInt(document.getElementById('txtTotal2P35').value) <= totalImpresoras ? c++ : totalExedido.push('impresoras')
                                        parseInt(document.getElementById('txtTotal3P35').value) <= totalMultifuncionales ? c++ : totalExedido.push('multifuncionales')
                                        parseInt(document.getElementById('txtTotal4P35').value) <= totalServidores ? c++ : totalExedido.push('servidores')
                                        parseInt(document.getElementById('txtTotal5P35').value) <= totalTabletas ? c++ : totalExedido.push('tabletas')

                                        if (c == 5) {
                                            enviarPregunta(35, 1)
                                        } else {
                                            alertify.alert('Imposible guardar datos !', ('El total de equipo informático de <span class="font-weight-bold">' + totalExedido.join(', ') + '</span>, debe ser igual o menor a la suma del ya definido en la pregunta 34, así como corresponder a su desagregación por tipo de función principal')).set('label', 'Ok');
                                        }
                                    })
                                }
                            } else {
                                return // Error en la peticion
                            }
                        })
                    } else if (form.id == 'formComplementoS1') {
                        obtenerConteoPersonal().then(() => {
                            if (
                                parseInt(document.getElementById('txtTotalHombresComplementoS1').value) <= totalHombres &&
                                parseInt(document.getElementById('txtTotalMujeresComplementoS1').value) <= totalMujeres
                            ) {
                                enviarPregunta('complemento', 1)
                            } else {
                                alertify.alert('Imposible guardar datos !', 'El total de personal debe ser menor o igual al ya definido en la pregunta 4, así como corresponder a su desagregación por sexo').set('label', 'Ok');
                            }
                        })
                    } else if (form.id == 'formPregunta1s12') {
                        if (!preguntasContestadas['itemPregunta1s12']) {
                            enviarPregunta(1, 12)
                        } else {
                            alertify.confirm(
                                'Editando pregunta...',
                                '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 1?</span> Deberá volver a contestar algunas de las preguntas referentes a ELEMENTOS Y MECANISMOS INSTITUCIONALES PARA LAS CONTRATACIONES PÚBLICAS y algunas referentes a CONTRATOS.',
                                function () {
                                    resetearFormularios(['formPregunta2s12', 'formPregunta3s12', 'formPregunta7s12', 'formPregunta8s12', 'formPregunta9s12', 'formPregunta10s12']).then(() => {
                                        enviarPregunta(1, 12)
                                    })
                                },
                                function () {
                                    alertify.error('Cancelado')
                                }
                            ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                        }
                    } else if (form.id == 'formPregunta2s12') {
                        if (!preguntasContestadas['itemPregunta2s12']) {
                            enviarPregunta(2, 12)
                        } else {
                            alertify.confirm(
                                'Editando pregunta...',
                                '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 2?</span> Deberá volver a contestar algunas de las preguntas referentes a CONTRATOS.',
                                function () {
                                    resetearFormularios(['formPregunta7s12', 'formPregunta8s12', 'formPregunta9s12', 'formPregunta10s12']).then(() => {
                                        enviarPregunta(2, 12)
                                    })
                                },
                                function () {
                                    alertify.error('Cancelado')
                                }
                            ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                        }
                    } else if (form.id == 'formPregunta3s12') {
                        enviarPregunta(3, 12)
                    } else if (form.id == 'formPregunta4s12') {
                        if (!preguntasContestadas['itemPregunta4s12']) {
                            enviarPregunta(4, 12)
                        } else {
                            alertify.confirm(
                                'Editando pregunta...',
                                '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 4?</span> Deberá volver a contestar la pregunta 5.',
                                function () {
                                    resetearFormularios(['formPregunta5s12']).then(() => {
                                        enviarPregunta(4, 12)
                                    })
                                },
                                function () {
                                    alertify.error('Cancelado')
                                }
                            ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                        }
                    } else if (form.id == 'formPregunta5s12') {
                        enviarPregunta(5, 12)
                    } else if (form.id == 'formPregunta6s12') {
                        enviarPregunta(6, 12)
                    } else if (form.id == 'formPregunta7s12') {
                        if (!preguntasContestadas['itemPregunta7s12']) {
                            obtenerProcedimientosDeContratacion().then(() => {
                                let c = 0,
                                    procedimientosExistentes = []

                                procedimientoDeContratacion1 == true && document.getElementById('checkNoAplicaProcedimientoTipo1P7s12').checked == false || procedimientoDeContratacion1 == false && document.getElementById('checkNoAplicaProcedimientoTipo1P7s12').checked == true ? c++ : procedimientosExistentes.push('Adjudicación directa')

                                procedimientoDeContratacion2 == true && document.getElementById('checkNoAplicaProcedimientoTipo2P7s12').checked == false || procedimientoDeContratacion2 == false && document.getElementById('checkNoAplicaProcedimientoTipo2P7s12').checked == true ? c++ : procedimientosExistentes.push('Invitación a cuando menos tres personas o invitación restringida')

                                procedimientoDeContratacion3 == true && document.getElementById('checkNoAplicaProcedimientoTipo3P7s12').checked == false || procedimientoDeContratacion3 == false && document.getElementById('checkNoAplicaProcedimientoTipo3P7s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública nacional')

                                procedimientoDeContratacion4 == true && document.getElementById('checkNoAplicaProcedimientoTipo4P7s12').checked == false || procedimientoDeContratacion4 == false && document.getElementById('checkNoAplicaProcedimientoTipo4P7s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública internacional')

                                procedimientoDeContratacion5 == true && document.getElementById('checkNoAplicaProcedimientoTipo5P7s12').checked == false || procedimientoDeContratacion5 == false && document.getElementById('checkNoAplicaProcedimientoTipo5P7s12').checked == true ? c++ : procedimientosExistentes.push('Otro procedimiento')

                                if (c == 5) {
                                    enviarPregunta(7, 12)
                                } else {
                                    alertify.alert('Imposible guardar datos !', ('Debe marcar los siguientes procedimientos como <u>NO APLICA</u> ya que en la pregunta 2 no los seleccionó: <br><br><span class="font-weight-bold"><small><ul class="mb-0"><li>' + procedimientosExistentes.join('.</li><li>') + '.</li></ul></small></span>')).set('label', 'Ok');
                                }
                            })
                        } else {
                            alertify.confirm(
                                'Editando pregunta...',
                                '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 7?</span> Deberá volver a contestar algunas de las preguntas referentes a CONTRATOS.',
                                function () {
                                    resetearFormularios(['formPregunta8s12', 'formPregunta9s12', 'formPregunta10s12']).then(() => {
                                        obtenerProcedimientosDeContratacion().then(() => {
                                            let c = 0,
                                                procedimientosExistentes = []

                                            procedimientoDeContratacion1 == true && document.getElementById('checkNoAplicaProcedimientoTipo1P7s12').checked == false || procedimientoDeContratacion1 == false && document.getElementById('checkNoAplicaProcedimientoTipo1P7s12').checked == true ? c++ : procedimientosExistentes.push('Adjudicación directa')

                                            procedimientoDeContratacion2 == true && document.getElementById('checkNoAplicaProcedimientoTipo2P7s12').checked == false || procedimientoDeContratacion2 == false && document.getElementById('checkNoAplicaProcedimientoTipo2P7s12').checked == true ? c++ : procedimientosExistentes.push('Invitación a cuando menos tres personas o invitación restringida')

                                            procedimientoDeContratacion3 == true && document.getElementById('checkNoAplicaProcedimientoTipo3P7s12').checked == false || procedimientoDeContratacion3 == false && document.getElementById('checkNoAplicaProcedimientoTipo3P7s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública nacional')

                                            procedimientoDeContratacion4 == true && document.getElementById('checkNoAplicaProcedimientoTipo4P7s12').checked == false || procedimientoDeContratacion4 == false && document.getElementById('checkNoAplicaProcedimientoTipo4P7s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública internacional')

                                            procedimientoDeContratacion5 == true && document.getElementById('checkNoAplicaProcedimientoTipo5P7s12').checked == false || procedimientoDeContratacion5 == false && document.getElementById('checkNoAplicaProcedimientoTipo5P7s12').checked == true ? c++ : procedimientosExistentes.push('Otro procedimiento')

                                            if (c == 5) {
                                                enviarPregunta(7, 12)
                                            } else {
                                                alertify.alert('Imposible guardar datos !', ('Debe marcar los siguientes procedimientos como <u>NO APLICA</u> ya que en la pregunta 2 no los seleccionó: <br><br><span class="font-weight-bold"><small><ul class="mb-0"><li>' + procedimientosExistentes.join('.</li><li>') + '.</li></ul></small></span>')).set('label', 'Ok');
                                            }
                                        })
                                    })
                                },
                                function () {
                                    alertify.error('Cancelado')
                                }
                            ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                        }
                    } else if (form.id == 'formPregunta8s12') {
                        if (!preguntasContestadas['itemPregunta8s12']) {
                            obtenerProcedimientosDeContratacion().then(() => {
                                let c = 0,
                                    procedimientosExistentes = []

                                procedimientoDeContratacion1 == true && document.getElementById('checkNoAplicaProcedimientoTipo1P8s12').checked == false || procedimientoDeContratacion1 == false && document.getElementById('checkNoAplicaProcedimientoTipo1P8s12').checked == true ? c++ : procedimientosExistentes.push('Adjudicación directa')

                                procedimientoDeContratacion2 == true && document.getElementById('checkNoAplicaProcedimientoTipo2P8s12').checked == false || procedimientoDeContratacion2 == false && document.getElementById('checkNoAplicaProcedimientoTipo2P8s12').checked == true ? c++ : procedimientosExistentes.push('Invitación a cuando menos tres personas o invitación restringida')

                                procedimientoDeContratacion3 == true && document.getElementById('checkNoAplicaProcedimientoTipo3P8s12').checked == false || procedimientoDeContratacion3 == false && document.getElementById('checkNoAplicaProcedimientoTipo3P8s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública nacional')

                                procedimientoDeContratacion4 == true && document.getElementById('checkNoAplicaProcedimientoTipo4P8s12').checked == false || procedimientoDeContratacion4 == false && document.getElementById('checkNoAplicaProcedimientoTipo4P8s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública internacional')

                                procedimientoDeContratacion5 == true && document.getElementById('checkNoAplicaProcedimientoTipo5P8s12').checked == false || procedimientoDeContratacion5 == false && document.getElementById('checkNoAplicaProcedimientoTipo5P8s12').checked == true ? c++ : procedimientosExistentes.push('Otro procedimiento')

                                if (c == 5) {
                                    obtenerConteoDeContratos().then(() => {
                                        if (
                                            parseInt(document.getElementById('txtTotalContratosTipo1P8s12').value) == totalContratos1 &&
                                            parseInt(document.getElementById('txtTotalContratosTipo2P8s12').value) == totalContratos2 &&
                                            parseInt(document.getElementById('txtTotalContratosTipo3P8s12').value) == totalContratos3 &&
                                            parseInt(document.getElementById('txtTotalContratosTipo4P8s12').value) == totalContratos4 &&
                                            parseInt(document.getElementById('txtTotalContratosTipo5P8s12').value) == totalContratos5
                                        ) {
                                            enviarPregunta(8, 12)
                                        } else {
                                            alertify.alert('Imposible guardar datos !', 'El total de contratos realizados debe corresponder al ya definido en la pregunta 7, así como corresponder a su desagregación por tipo de procedimiento de contratación').set('label', 'Ok');
                                        }
                                    })
                                } else {
                                    alertify.alert('Imposible guardar datos !', ('Debe marcar los siguientes procedimientos como <u>NO APLICA</u> ya que en la pregunta 2 no los seleccionó: <br><br><span class="font-weight-bold"><small><ul class="mb-0"><li>' + procedimientosExistentes.join('.</li><li>') + '.</li></ul></small></span>')).set('label', 'Ok');
                                }
                            })
                        } else {
                            alertify.confirm(
                                'Editando pregunta...',
                                '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 8?</span> Deberá volver a contestar algunas de las preguntas referentes a CONTRATOS.',
                                function () {
                                    resetearFormularios(['formPregunta9s12', 'formPregunta10s12']).then(() => {
                                        obtenerProcedimientosDeContratacion().then(() => {
                                            let c = 0,
                                                procedimientosExistentes = []

                                            procedimientoDeContratacion1 == true && document.getElementById('checkNoAplicaProcedimientoTipo1P8s12').checked == false || procedimientoDeContratacion1 == false && document.getElementById('checkNoAplicaProcedimientoTipo1P8s12').checked == true ? c++ : procedimientosExistentes.push('Adjudicación directa')

                                            procedimientoDeContratacion2 == true && document.getElementById('checkNoAplicaProcedimientoTipo2P8s12').checked == false || procedimientoDeContratacion2 == false && document.getElementById('checkNoAplicaProcedimientoTipo2P8s12').checked == true ? c++ : procedimientosExistentes.push('Invitación a cuando menos tres personas o invitación restringida')

                                            procedimientoDeContratacion3 == true && document.getElementById('checkNoAplicaProcedimientoTipo3P8s12').checked == false || procedimientoDeContratacion3 == false && document.getElementById('checkNoAplicaProcedimientoTipo3P8s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública nacional')

                                            procedimientoDeContratacion4 == true && document.getElementById('checkNoAplicaProcedimientoTipo4P8s12').checked == false || procedimientoDeContratacion4 == false && document.getElementById('checkNoAplicaProcedimientoTipo4P8s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública internacional')

                                            procedimientoDeContratacion5 == true && document.getElementById('checkNoAplicaProcedimientoTipo5P8s12').checked == false || procedimientoDeContratacion5 == false && document.getElementById('checkNoAplicaProcedimientoTipo5P8s12').checked == true ? c++ : procedimientosExistentes.push('Otro procedimiento')

                                            if (c == 5) {
                                                obtenerConteoDeContratos().then(() => {
                                                    if (
                                                        parseInt(document.getElementById('txtTotalContratosTipo1P8s12').value) == totalContratos1 &&
                                                        parseInt(document.getElementById('txtTotalContratosTipo2P8s12').value) == totalContratos2 &&
                                                        parseInt(document.getElementById('txtTotalContratosTipo3P8s12').value) == totalContratos3 &&
                                                        parseInt(document.getElementById('txtTotalContratosTipo4P8s12').value) == totalContratos4 &&
                                                        parseInt(document.getElementById('txtTotalContratosTipo5P8s12').value) == totalContratos5
                                                    ) {
                                                        enviarPregunta(8, 12)
                                                    } else {
                                                        alertify.alert('Imposible guardar datos !', 'El total de contratos realizados debe corresponder al ya definido en la pregunta 7, así como corresponder a su desagregación por tipo de procedimiento de contratación').set('label', 'Ok');
                                                    }
                                                })
                                            } else {
                                                alertify.alert('Imposible guardar datos !', ('Debe marcar los siguientes procedimientos como <u>NO APLICA</u> ya que en la pregunta 2 no los seleccionó: <br><br><span class="font-weight-bold"><small><ul class="mb-0"><li>' + procedimientosExistentes.join('.</li><li>') + '.</li></ul></small></span>')).set('label', 'Ok');
                                            }
                                        })
                                    })
                                },
                                function () {
                                    alertify.error('Cancelado')
                                }
                            ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                        }
                    } else if (form.id == 'formPregunta9s12') {
                        if (!preguntasContestadas['itemPregunta9s12']) {
                            obtenerProcedimientosDeContratacion().then(() => {
                                let c = 0,
                                    procedimientosExistentes = []

                                procedimientoDeContratacion1 == true && document.getElementById('checkNoAplicaProcedimientoTipo1P9s12').checked == false || procedimientoDeContratacion1 == false && document.getElementById('checkNoAplicaProcedimientoTipo1P9s12').checked == true ? c++ : procedimientosExistentes.push('Adjudicación directa')

                                procedimientoDeContratacion2 == true && document.getElementById('checkNoAplicaProcedimientoTipo2P9s12').checked == false || procedimientoDeContratacion2 == false && document.getElementById('checkNoAplicaProcedimientoTipo2P9s12').checked == true ? c++ : procedimientosExistentes.push('Invitación a cuando menos tres personas o invitación restringida')

                                procedimientoDeContratacion3 == true && document.getElementById('checkNoAplicaProcedimientoTipo3P9s12').checked == false || procedimientoDeContratacion3 == false && document.getElementById('checkNoAplicaProcedimientoTipo3P9s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública nacional')

                                procedimientoDeContratacion4 == true && document.getElementById('checkNoAplicaProcedimientoTipo4P9s12').checked == false || procedimientoDeContratacion4 == false && document.getElementById('checkNoAplicaProcedimientoTipo4P9s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública internacional')

                                procedimientoDeContratacion5 == true && document.getElementById('checkNoAplicaProcedimientoTipo5P9s12').checked == false || procedimientoDeContratacion5 == false && document.getElementById('checkNoAplicaProcedimientoTipo5P9s12').checked == true ? c++ : procedimientosExistentes.push('Otro procedimiento')

                                if (c == 5) {
                                    enviarPregunta(9, 12)
                                } else {
                                    alertify.alert('Imposible guardar datos !', ('Debe marcar los siguientes procedimientos como <u>NO APLICA</u> ya que en la pregunta 2 no los seleccionó: <br><br><span class="font-weight-bold"><small><ul class="mb-0"><li>' + procedimientosExistentes.join('.</li><li>') + '.</li></ul></small></span>')).set('label', 'Ok');
                                }
                            })
                        } else {
                            alertify.confirm(
                                'Editando pregunta...',
                                '<span class="font-weight-bold">¿Seguro de querer editar la pregunta 9?</span> Deberá volver a contestar la pregunta 10.',
                                function () {
                                    resetearFormularios(['formPregunta10s12']).then(() => {
                                        obtenerProcedimientosDeContratacion().then(() => {
                                            let c = 0,
                                                procedimientosExistentes = []

                                            procedimientoDeContratacion1 == true && document.getElementById('checkNoAplicaProcedimientoTipo1P9s12').checked == false || procedimientoDeContratacion1 == false && document.getElementById('checkNoAplicaProcedimientoTipo1P9s12').checked == true ? c++ : procedimientosExistentes.push('Adjudicación directa')

                                            procedimientoDeContratacion2 == true && document.getElementById('checkNoAplicaProcedimientoTipo2P9s12').checked == false || procedimientoDeContratacion2 == false && document.getElementById('checkNoAplicaProcedimientoTipo2P9s12').checked == true ? c++ : procedimientosExistentes.push('Invitación a cuando menos tres personas o invitación restringida')

                                            procedimientoDeContratacion3 == true && document.getElementById('checkNoAplicaProcedimientoTipo3P9s12').checked == false || procedimientoDeContratacion3 == false && document.getElementById('checkNoAplicaProcedimientoTipo3P9s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública nacional')

                                            procedimientoDeContratacion4 == true && document.getElementById('checkNoAplicaProcedimientoTipo4P9s12').checked == false || procedimientoDeContratacion4 == false && document.getElementById('checkNoAplicaProcedimientoTipo4P9s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública internacional')

                                            procedimientoDeContratacion5 == true && document.getElementById('checkNoAplicaProcedimientoTipo5P9s12').checked == false || procedimientoDeContratacion5 == false && document.getElementById('checkNoAplicaProcedimientoTipo5P9s12').checked == true ? c++ : procedimientosExistentes.push('Otro procedimiento')

                                            if (c == 5) {
                                                enviarPregunta(9, 12)
                                            } else {
                                                alertify.alert('Imposible guardar datos !', ('Debe marcar los siguientes procedimientos como <u>NO APLICA</u> ya que en la pregunta 2 no los seleccionó: <br><br><span class="font-weight-bold"><small><ul class="mb-0"><li>' + procedimientosExistentes.join('.</li><li>') + '.</li></ul></small></span>')).set('label', 'Ok');
                                            }
                                        })
                                    })
                                },
                                function () {
                                    alertify.error('Cancelado')
                                }
                            ).set('labels', { ok: 'SI', cancel: 'Cancelar' });
                        }
                    } else if (form.id == 'formPregunta10s12') {
                        obtenerProcedimientosDeContratacion().then(() => {
                            let c = 0,
                                procedimientosExistentes = []

                            procedimientoDeContratacion1 == true && document.getElementById('checkNoAplicaProcedimientoTipo1P10s12').checked == false || procedimientoDeContratacion1 == false && document.getElementById('checkNoAplicaProcedimientoTipo1P10s12').checked == true ? c++ : procedimientosExistentes.push('Adjudicación directa')

                            procedimientoDeContratacion2 == true && document.getElementById('checkNoAplicaProcedimientoTipo2P10s12').checked == false || procedimientoDeContratacion2 == false && document.getElementById('checkNoAplicaProcedimientoTipo2P10s12').checked == true ? c++ : procedimientosExistentes.push('Invitación a cuando menos tres personas o invitación restringida')

                            procedimientoDeContratacion3 == true && document.getElementById('checkNoAplicaProcedimientoTipo3P10s12').checked == false || procedimientoDeContratacion3 == false && document.getElementById('checkNoAplicaProcedimientoTipo3P10s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública nacional')

                            procedimientoDeContratacion4 == true && document.getElementById('checkNoAplicaProcedimientoTipo4P10s12').checked == false || procedimientoDeContratacion4 == false && document.getElementById('checkNoAplicaProcedimientoTipo4P10s12').checked == true ? c++ : procedimientosExistentes.push('Licitación pública internacional')

                            procedimientoDeContratacion5 == true && document.getElementById('checkNoAplicaProcedimientoTipo5P10s12').checked == false || procedimientoDeContratacion5 == false && document.getElementById('checkNoAplicaProcedimientoTipo5P10s12').checked == true ? c++ : procedimientosExistentes.push('Otro procedimiento')

                            if (c == 5) {
                                obtenerConteoDeMontos().then(() => {
                                    if (
                                        parseFloat(document.getElementById('txtMontoTotalContratosTipo1P10s12').value) == totalMontos1 &&
                                        parseFloat(document.getElementById('txtMontoTotalContratosTipo2P10s12').value) == totalMontos2 &&
                                        parseFloat(document.getElementById('txtMontoTotalContratosTipo3P10s12').value) == totalMontos3 &&
                                        parseFloat(document.getElementById('txtMontoTotalContratosTipo4P10s12').value) == totalMontos4 &&
                                        parseFloat(document.getElementById('txtMontoTotalContratosTipo5P10s12').value) == totalMontos5
                                    ) {
                                        enviarPregunta(10, 12)
                                    } else {
                                        alertify.alert('Imposible guardar datos !', 'El total de montos asociados a los contratos realizados debe corresponder a los ya definidos en la pregunta 9, así como corresponder a su desagregación por tipo de procedimiento de contratación').set('label', 'Ok');
                                    }
                                })
                            } else {
                                alertify.alert('Imposible guardar datos !', ('Debe marcar los siguientes procedimientos como <u>NO APLICA</u> ya que en la pregunta 2 no los seleccionó: <br><br><span class="font-weight-bold"><small><ul class="mb-0"><li>' + procedimientosExistentes.join('.</li><li>') + '.</li></ul></small></span>')).set('label', 'Ok');
                            }
                        })
                    } else if (form.id == 'formPregunta11s12') {
                        enviarPregunta(11, 12)
                    } else if (form.id == 'formPregunta12s12') {
                        enviarPregunta(12, 12)
                    } else if (form.id == 'formPregunta13s12') {
                        enviarPregunta(13, 12)
                    } else if (form.id == 'formPregunta14s12') {
                        enviarPregunta(14, 12)
                    }
                }
                form.classList.add('was-validated')
            }, false)
        })
}

enviarPregunta = (pregunta, seccion) => {
    showLoading()
    if (pregunta == 1 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        tipoInstitucion: document.getElementById('tipoInstitucion').value,
                        funcionPrincipal: document.getElementById('funcionPrincipal').value,
                        funcionSecUno: document.getElementById('funcionSecundariaUno').value,
                        funcionSecDos: document.getElementById('funcionSecundariaDos').value,
                        funcionSecTres: document.getElementById('funcionSecundariaTres').value,
                        funcionSecCuatro: document.getElementById('funcionSecundariaCuatro').value,
                        funcionSecCinco: document.getElementById('funcionSecundariaCinco').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneral').value,
                        funcionPrincipalEspecifica: document.getElementById('funcPriEspecifica').value,
                        funcionSecUnoEspecifica: document.getElementById('secUnoEspecifica').value,
                        funcionSecDosEspecifica: document.getElementById('secDosEspecifica').value,
                        funcionSecTresEspecifica: document.getElementById('secTresEspecifica').value,
                        funcionSecCuatroEspecifica: document.getElementById('secCuatroEspecifica').value,
                        funcionSecCincoEspecifica: document.getElementById('secCincoEspecifica').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta2s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 2 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        unidadDeGenero: document.getElementById('unidadGeneroP2').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP2').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta3s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 3 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        sexoTitular: document.getElementById('txtSexoP3').value,
                        edadTitular: document.getElementById('txtEdadP3').value,
                        ingresosTitular: document.getElementById('txtIngresosP3').value,
                        nivEscolaridadTitular: document.getElementById('txtNivEscolaridadP3').value,
                        estatusEscolaridadTitular: document.getElementById('txtEstatusEscolaridadP3').value,
                        empleoAnteriorTitular: document.getElementById('txtEmpleoAnteriorP3').value,
                        antiguedadServicioTitular: document.getElementById('txtAntiguedadServicioP3').value != '0' ? document.getElementById('txtAntiguedadServicioP3').value : 'NA',
                        antiguedadCargoTitular: document.getElementById('txtAntiguedadCargoP3').value,
                        pertenenciaIndigenaTitular: document.getElementById('txtPertenenciaIndigenaP3').value,
                        condicionDiscapacidadTitular: document.getElementById('txtCondicionDiscapacidadP3').value,
                        formaDesignacionTitular: document.getElementById('txtFormaDesignacionP3').value,
                        afiliacionPartidistaTitular: document.getElementById('txtAfiliacionPartidistaP3').value,
                        mismoTitular: document.getElementById('txtMismoTitularP3').value,
                        claveMismoTitular: document.getElementById('txtClaveMismoTitularP3').value,
                        sexoTitularEspecifico: document.getElementById('sexoEspecificoP3').value,
                        nivEscolaridadTitularEspecifico: document.getElementById('nivelEscolaridadEspecificoP3').value,
                        estatusEscolaridadTitularEspecifico: document.getElementById('estatusEstudioEspecificoP3').value,
                        empleoAnteriorTitularEspecifico: document.getElementById('empleoAnteriorEspecificoP3').value,
                        pertenenciaIndigenaTitularEspecifico: document.getElementById('pertenenciaIndigenaEspecificoP3').value,
                        condicionDiscapacidadTitularEspecifico: document.getElementById('condicionDiscapacidadEspecificoP3').value,
                        formaDesignacionTitularEspecifico: document.getElementById('formaDesignacionEspecificaP3').value,
                        afiliacionPartidistaTitularEspecifico: document.getElementById('afiliacionPartidistaEspecificaP3').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP3').value,
                        tituloTitular,
                        cedulaTitular,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    alertify.error('Imposible guardar datos !')
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 4 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP4').value,
                        totalHombres: document.getElementById('txtTotalHombresP4').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP4').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP4').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        obtenerConteoPersonal().then(() => {
                            alertify.success(resultado[1])
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta5s1"]')).show()
                            hideLoading()
                        })
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 5 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP5').value,
                        totalHombres: document.getElementById('txtTotalHombresP5').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP5').value,
                        totalHombresConfianza: document.getElementById('txtTotalHombresConfianzaP5').value,
                        totalMujeresConfianza: document.getElementById('txtTotalMujeresConfianzaP5').value,
                        totalHombresBase: document.getElementById('txtTotalHombresBaseP5').value,
                        totalMujeresBase: document.getElementById('txtTotalMujeresBaseP5').value,
                        totalHombresEventual: document.getElementById('txtTotalHombresEventualP5').value,
                        totalMujeresEventual: document.getElementById('txtTotalMujeresEventualP5').value,
                        totalHombresHonorarios: document.getElementById('txtTotalHombresHonorariosP5').value,
                        totalMujeresHonorarios: document.getElementById('txtTotalMujeresHonorariosP5').value,
                        totalHombresOtro: document.getElementById('txtTotalHombresOtroP5').value,
                        totalMujeresOtro: document.getElementById('txtTotalMujeresOtroP5').value,
                        otroEspecifico: document.getElementById('otroEspecificoP5').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP5').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta6s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 6 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP6').value,
                        totalHombres: document.getElementById('txtTotalHombresP6').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP6').value,
                        totalHombresISSSTE: document.getElementById('txtTotalHombresISSSTEP6').value,
                        totalMujeresISSSTE: document.getElementById('txtTotalMujeresISSSTEP6').value,
                        totalHombresISSEFH: document.getElementById('txtTotalHombresISSEFHP6').value,
                        totalMujeresISSEFH: document.getElementById('txtTotalMujeresISSEFHP6').value,
                        totalHombresIMSS: document.getElementById('txtTotalHombresIMSSP6').value,
                        totalMujeresIMSS: document.getElementById('txtTotalMujeresIMSSP6').value,
                        totalHombresOtra: document.getElementById('txtTotalHombresOtraP6').value,
                        totalMujeresOtra: document.getElementById('txtTotalMujeresOtraP6').value,
                        totalHombresSinSeguridad: document.getElementById('txtTotalHombresSinSeguridadP6').value,
                        totalMujeresSinSeguridad: document.getElementById('txtTotalMujeresSinSeguridadP6').value,
                        otroYsinSeguridadEspecifico: document.getElementById('otroYsinSeguridadEspecificoP6').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP6').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta7s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 7 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP7').value,
                        totalHombres: document.getElementById('txtTotalHombresP7').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP7').value,
                        totalHombres18a24: document.getElementById('txtTotalHombres18a24P7').value,
                        totalMujeres18a24: document.getElementById('txtTotalMujeres18a24P7').value,
                        totalHombres25a29: document.getElementById('txtTotalHombres25a29P7').value,
                        totalMujeres25a29: document.getElementById('txtTotalMujeres25a29P7').value,
                        totalHombres30a34: document.getElementById('txtTotalHombres30a34P7').value,
                        totalMujeres30a34: document.getElementById('txtTotalMujeres30a34P7').value,
                        totalHombres35a39: document.getElementById('txtTotalHombres35a39P7').value,
                        totalMujeres35a39: document.getElementById('txtTotalMujeres35a39P7').value,
                        totalHombres40a44: document.getElementById('txtTotalHombres40a44P7').value,
                        totalMujeres40a44: document.getElementById('txtTotalMujeres40a44P7').value,
                        totalHombres45a49: document.getElementById('txtTotalHombres45a49P7').value,
                        totalMujeres45a49: document.getElementById('txtTotalMujeres45a49P7').value,
                        totalHombres50a54: document.getElementById('txtTotalHombres50a54P7').value,
                        totalMujeres50a54: document.getElementById('txtTotalMujeres50a54P7').value,
                        totalHombres55a59: document.getElementById('txtTotalHombres55a59P7').value,
                        totalMujeres55a59: document.getElementById('txtTotalMujeres55a59P7').value,
                        totalHombres60yMas: document.getElementById('txtTotalHombres60yMasP7').value,
                        totalMujeres60yMas: document.getElementById('txtTotalMujeres60yMasP7').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP7').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta8s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 8 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP8').value,
                        totalHombres: document.getElementById('txtTotalHombresP8').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP8').value,
                        totalHombresSinPaga: document.getElementById('txtTotalHombresSinPagaP8').value,
                        totalMujeresSinPaga: document.getElementById('txtTotalMujeresSinPagaP8').value,
                        totalHombres1a5000: document.getElementById('txtTotalHombres1a5000P8').value,
                        totalMujeres1a5000: document.getElementById('txtTotalMujeres1a5000P8').value,
                        totalHombres5001a10000: document.getElementById('txtTotalHombres5001a10000P8').value,
                        totalMujeres5001a10000: document.getElementById('txtTotalMujeres5001a10000P8').value,
                        totalHombres10001a15000: document.getElementById('txtTotalHombres10001a15000P8').value,
                        totalMujeres10001a15000: document.getElementById('txtTotalMujeres10001a15000P8').value,
                        totalHombres15001a20000: document.getElementById('txtTotalHombres15001a20000P8').value,
                        totalMujeres15001a20000: document.getElementById('txtTotalMujeres15001a20000P8').value,
                        totalHombres20001a25000: document.getElementById('txtTotalHombres20001a25000P8').value,
                        totalMujeres20001a25000: document.getElementById('txtTotalMujeres20001a25000P8').value,
                        totalHombres25001a30000: document.getElementById('txtTotalHombres25001a30000P8').value,
                        totalMujeres25001a30000: document.getElementById('txtTotalMujeres25001a30000P8').value,
                        totalHombres30001a35000: document.getElementById('txtTotalHombres30001a35000P8').value,
                        totalMujeres30001a35000: document.getElementById('txtTotalMujeres30001a35000P8').value,
                        totalHombres35001a40000: document.getElementById('txtTotalHombres35001a40000P8').value,
                        totalMujeres35001a40000: document.getElementById('txtTotalMujeres35001a40000P8').value,
                        totalHombres40001a45000: document.getElementById('txtTotalHombres40001a45000P8').value,
                        totalMujeres40001a45000: document.getElementById('txtTotalMujeres40001a45000P8').value,
                        totalHombres45001a50000: document.getElementById('txtTotalHombres45001a50000P8').value,
                        totalMujeres45001a50000: document.getElementById('txtTotalMujeres45001a50000P8').value,
                        totalHombres50001a55000: document.getElementById('txtTotalHombres50001a55000P8').value,
                        totalMujeres50001a55000: document.getElementById('txtTotalMujeres50001a55000P8').value,
                        totalHombres55001a60000: document.getElementById('txtTotalHombres55001a60000P8').value,
                        totalMujeres55001a60000: document.getElementById('txtTotalMujeres55001a60000P8').value,
                        totalHombres60001a65000: document.getElementById('txtTotalHombres60001a65000P8').value,
                        totalMujeres60001a65000: document.getElementById('txtTotalMujeres60001a65000P8').value,
                        totalHombres65001a70000: document.getElementById('txtTotalHombres65001a70000P8').value,
                        totalMujeres65001a70000: document.getElementById('txtTotalMujeres65001a70000P8').value,
                        totalHombresMasDe70000: document.getElementById('txtTotalHombresMasDe70000P8').value,
                        totalMujeresMasDe70000: document.getElementById('txtTotalMujeresMasDe70000P8').value,
                        sinPagaEspecifico: document.getElementById('sinPagaEspecificoP8').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP8').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta9s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 9 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP9').value,
                        totalHombres: document.getElementById('txtTotalHombresP9').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP9').value,
                        totalHombresNinguno: document.getElementById('txtTotalHombresNingunoP9').value,
                        totalMujeresNinguno: document.getElementById('txtTotalMujeresNingunoP9').value,
                        totalHombresPresPri: document.getElementById('txtTotalHombresPresPriP9').value,
                        totalMujeresPresPri: document.getElementById('txtTotalMujeresPresPriP9').value,
                        totalHombresSecu: document.getElementById('txtTotalHombresSecuP9').value,
                        totalMujeresSecu: document.getElementById('txtTotalMujeresSecuP9').value,
                        totalHombresPrepa: document.getElementById('txtTotalHombresPrepaP9').value,
                        totalMujeresPrepa: document.getElementById('txtTotalMujeresPrepaP9').value,
                        totalHombresTecnica: document.getElementById('txtTotalHombresTecnicaP9').value,
                        totalMujeresTecnica: document.getElementById('txtTotalMujeresTecnicaP9').value,
                        totalHombresLicenciatura: document.getElementById('txtTotalHombresLicenciaturaP9').value,
                        totalMujeresLicenciatura: document.getElementById('txtTotalMujeresLicenciaturaP9').value,
                        totalHombresMaestria: document.getElementById('txtTotalHombresMaestriaP9').value,
                        totalMujeresMaestria: document.getElementById('txtTotalMujeresMaestriaP9').value,
                        totalHombresDoctorado: document.getElementById('txtTotalHombresDoctoradoP9').value,
                        totalMujeresDoctorado: document.getElementById('txtTotalMujeresDoctoradoP9').value,
                        ningunoEspecifico: document.getElementById('ningunoEspecificoP9').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP9').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta10s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 10 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP10').value,
                        totalHombres: document.getElementById('txtTotalHombresP10').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP10').value,
                        totalHombresPertenecen: document.getElementById('txtTotalHombresPertenecenP10').value,
                        totalMujeresPertenecen: document.getElementById('txtTotalMujeresPertenecenP10').value,
                        totalHombresNoPertenecen: document.getElementById('txtTotalHombresNoPertenecenP10').value,
                        totalMujeresNoPertenecen: document.getElementById('txtTotalMujeresNoPertenecenP10').value,
                        totalHombresNoIdentificado: document.getElementById('txtTotalHombresNoIdentificadoP10').value,
                        totalMujeresNoIdentificado: document.getElementById('txtTotalMujeresNoIdentificadoP10').value,
                        noIdentificadoEspecifico: document.getElementById('noIdentificadoEspecificoP10').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP10').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta11s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 11 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP11').value,
                        totalHombres: document.getElementById('txtTotalHombresP11').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP11').value,
                        totalHombresChinanteco: document.getElementById('txtTotalHombresChinantecoP11').value,
                        totalMujeresChinanteco: document.getElementById('txtTotalMujeresChinantecoP11').value,
                        totalHombresChol: document.getElementById('txtTotalHombresCholP11').value,
                        totalMujeresChol: document.getElementById('txtTotalMujeresCholP11').value,
                        totalHombresCora: document.getElementById('txtTotalHombresCoraP11').value,
                        totalMujeresCora: document.getElementById('txtTotalMujeresCoraP11').value,
                        totalHombresHuasteco: document.getElementById('txtTotalHombresHuastecoP11').value,
                        totalMujeresHuasteco: document.getElementById('txtTotalMujeresHuastecoP11').value,
                        totalHombresHuichol: document.getElementById('txtTotalHombresHuicholP11').value,
                        totalMujeresHuichol: document.getElementById('txtTotalMujeresHuicholP11').value,
                        totalHombresMaya: document.getElementById('txtTotalHombresMayaP11').value,
                        totalMujeresMaya: document.getElementById('txtTotalMujeresMayaP11').value,
                        totalHombresMayo: document.getElementById('txtTotalHombresMayoP11').value,
                        totalMujeresMayo: document.getElementById('txtTotalMujeresMayoP11').value,
                        totalHombresMazahua: document.getElementById('txtTotalHombresMazahuaP11').value,
                        totalMujeresMazahua: document.getElementById('txtTotalMujeresMazahuaP11').value,
                        totalHombresMazateco: document.getElementById('txtTotalHombresMazatecoP11').value,
                        totalMujeresMazateco: document.getElementById('txtTotalMujeresMazatecoP11').value,
                        totalHombresMixe: document.getElementById('txtTotalHombresMixeP11').value,
                        totalMujeresMixe: document.getElementById('txtTotalMujeresMixeP11').value,
                        totalHombresMixteco: document.getElementById('txtTotalHombresMixtecoP11').value,
                        totalMujeresMixteco: document.getElementById('txtTotalMujeresMixtecoP11').value,
                        totalHombresNahuatl: document.getElementById('txtTotalHombresNahuatlP11').value,
                        totalMujeresNahuatl: document.getElementById('txtTotalMujeresNahuatlP11').value,
                        totalHombresOtomi: document.getElementById('txtTotalHombresOtomiP11').value,
                        totalMujeresOtomi: document.getElementById('txtTotalMujeresOtomiP11').value,
                        totalHombresTarascoPurepecha: document.getElementById('txtTotalHombresTarascoPurepechaP11').value,
                        totalMujeresTarascoPurepecha: document.getElementById('txtTotalMujeresTarascoPurepechaP11').value,
                        totalHombresTarahumara: document.getElementById('txtTotalHombresTarahumaraP11').value,
                        totalMujeresTarahumara: document.getElementById('txtTotalMujeresTarahumaraP11').value,
                        totalHombresTepehuano: document.getElementById('txtTotalHombresTepehuanoP11').value,
                        totalMujeresTepehuano: document.getElementById('txtTotalMujeresTepehuanoP11').value,
                        totalHombresTlapaneco: document.getElementById('txtTotalHombresTlapanecoP11').value,
                        totalMujeresTlapaneco: document.getElementById('txtTotalMujeresTlapanecoP11').value,
                        totalHombresTotonaco: document.getElementById('txtTotalHombresTotonacoP11').value,
                        totalMujeresTotonaco: document.getElementById('txtTotalMujeresTotonacoP11').value,
                        totalHombresTseltal: document.getElementById('txtTotalHombresTseltalP11').value,
                        totalMujeresTseltal: document.getElementById('txtTotalMujeresTseltalP11').value,
                        totalHombresTsotsil: document.getElementById('txtTotalHombresTsotsilP11').value,
                        totalMujeresTsotsil: document.getElementById('txtTotalMujeresTsotsilP11').value,
                        totalHombresYaqui: document.getElementById('txtTotalHombresYaquiP11').value,
                        totalMujeresYaqui: document.getElementById('txtTotalMujeresYaquiP11').value,
                        totalHombresZapoteco: document.getElementById('txtTotalHombresZapotecoP11').value,
                        totalMujeresZapoteco: document.getElementById('txtTotalMujeresZapotecoP11').value,
                        totalHombresZoque: document.getElementById('txtTotalHombresZoqueP11').value,
                        totalMujeresZoque: document.getElementById('txtTotalMujeresZoqueP11').value,
                        totalHombresOtro: document.getElementById('txtTotalHombresOtroP11').value,
                        totalMujeresOtro: document.getElementById('txtTotalMujeresOtroP11').value,
                        totalHombresNoIdentificado: document.getElementById('txtTotalHombresNoIdentificadoP11').value,
                        totalMujeresNoIdentificado: document.getElementById('txtTotalMujeresNoIdentificadoP11').value,
                        puebloIndigenaEspecifico: document.getElementById('otroNoIdentificadoEspecificoP11').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP11').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta12s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 12 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP12').value,
                        totalHombres: document.getElementById('txtTotalHombresP12').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP12').value,
                        totalHombresConDiscapacidad: document.getElementById('txtTotalHombresConDiscapacidadP12').value,
                        totalMujeresConDiscapacidad: document.getElementById('txtTotalMujeresConDiscapacidadP12').value,
                        totalHombresSinDiscapacidad: document.getElementById('txtTotalHombresSinDiscapacidadP12').value,
                        totalMujeresSinDiscapacidad: document.getElementById('txtTotalMujeresSinDiscapacidadP12').value,
                        totalHombresNoIdentificado: document.getElementById('txtTotalHombresNoIdentificadoP12').value,
                        totalMujeresNoIdentificado: document.getElementById('txtTotalMujeresNoIdentificadoP12').value,
                        noIdentificadoEspecifico: document.getElementById('noIdentificadoEspecificoP12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta13s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 13 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP13').value,
                        totalHombres: document.getElementById('txtTotalHombresP13').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP13').value,
                        totalHombresCaminar: document.getElementById('txtTotalHombresCaminarP13').value,
                        totalMujeresCaminar: document.getElementById('txtTotalMujeresCaminarP13').value,
                        totalHombresVer: document.getElementById('txtTotalHombresVerP13').value,
                        totalMujeresVer: document.getElementById('txtTotalMujeresVerP13').value,
                        totalHombresBrazos: document.getElementById('txtTotalHombresBrazosP13').value,
                        totalMujeresBrazos: document.getElementById('txtTotalMujeresBrazosP13').value,
                        totalHombresAprender: document.getElementById('txtTotalHombresAprenderP13').value,
                        totalMujeresAprender: document.getElementById('txtTotalMujeresAprenderP13').value,
                        totalHombresOir: document.getElementById('txtTotalHombresOirP13').value,
                        totalMujeresOir: document.getElementById('txtTotalMujeresOirP13').value,
                        totalHombresHablar: document.getElementById('txtTotalHombresHablarP13').value,
                        totalMujeresHablar: document.getElementById('txtTotalMujeresHablarP13').value,
                        totalHombresBaniarse: document.getElementById('txtTotalHombresBaniarseP13').value,
                        totalMujeresBaniarse: document.getElementById('txtTotalMujeresBaniarseP13').value,
                        totalHombresDepresion: document.getElementById('txtTotalHombresDepresionP13').value,
                        totalMujeresDepresion: document.getElementById('txtTotalMujeresDepresionP13').value,
                        totalHombresOtro: document.getElementById('txtTotalHombresOtroP13').value,
                        totalMujeresOtro: document.getElementById('txtTotalMujeresOtroP13').value,
                        totalHombresNoIdentificado: document.getElementById('txtTotalHombresNoIdentificadoP13').value,
                        totalMujeresNoIdentificado: document.getElementById('txtTotalMujeresNoIdentificadoP13').value,
                        tipoDiscapacidadEspecifico: document.getElementById('otroYnoIdentificadoEspecificoP13').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP13').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta14s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 14 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP14').value,
                        totalHombres: document.getElementById('txtTotalHombresP14').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP14').value,
                        personalContabilizado: document.getElementById('btnRadioSiP14').checked ? '1' : document.getElementById('btnRadioNoP14').checked ? '2' : '9',
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP14').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta15s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 15 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalP15').value,
                        totalHombres: document.getElementById('txtTotalHombresP15').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP15').value,
                        personalContabilizado: document.getElementById('txtContabilizoPersonalP15').value == 'Si' ? '1' : document.getElementById('txtContabilizoPersonalP15').value == 'No' ? '2' : '9',
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP15').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta16s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 16 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        elementosProfesionalizacion: document.getElementById('txtElementosProfesionalizacionP16').value,
                        disposicionNormativa: document.getElementById('txtDisposicionNormativaP16').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP16').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        contabaConElementos().then((resultado) => {
                            if (resultado != undefined && resultado == true) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta17s1"]')).show()
                                hideLoading()
                            } else if (resultado != undefined && resultado == false) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta19s1"]')).show()
                                hideLoading()
                            } else {
                                hideLoading()
                            }
                        })
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 17 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        checkServicio: document.getElementById('checkServicioP17').checked ? 'X' : '',
                        checkReclutamiento: document.getElementById('checkReclutamientoP17').checked ? 'X' : '',
                        checkPruebas: document.getElementById('checkPruebasP17').checked ? 'X' : '',
                        checkCurricular: document.getElementById('checkCurricularP17').checked ? 'X' : '',
                        checkActualizacion: document.getElementById('checkActualizacionP17').checked ? 'X' : '',
                        checkValidacion: document.getElementById('checkValidacionP17').checked ? 'X' : '',
                        checkConcursos: document.getElementById('checkConcursosP17').checked ? 'X' : '',
                        checkMecanismos: document.getElementById('checkMecanismosP17').checked ? 'X' : '',
                        checkProgramas: document.getElementById('checkProgramasP17').checked ? 'X' : '',
                        checkEvaluacion: document.getElementById('checkEvaluacionP17').checked ? 'X' : '',
                        checkEstimulos: document.getElementById('checkEstimulosP17').checked ? 'X' : '',
                        checkSeparacion: document.getElementById('checkSeparacionP17').checked ? 'X' : '',
                        checkOtros: document.getElementById('checkOtrosP17').checked ? 'X' : '',
                        otroEspecifico: document.getElementById('otroEspecificoP17').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP17').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta18s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 18 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        contabaConUnidadAdministrativa: document.getElementById('selectUnidadAdministrativaP18').value,
                        unidadAdministrativa: document.getElementById('txtUnidadAdministrativaP18').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP18').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta19s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 19 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        seImpartieronAcciones: document.getElementById('selectAccionesFormativasP19').value,
                        accionesImpartidas: document.getElementById('txtTotalImpartidasP19').value,
                        accionesImpartidasConcluidas: document.getElementById('txtTotalImpartidasConcluidasP19').value,
                        totalPersonal: document.getElementById('txtTotalPersonalP19').value,
                        totalHombres: document.getElementById('txtTotalHombresP19').value,
                        totalMujeres: document.getElementById('txtTotalMujeresP19').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP19').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta24s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 24 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalInmuebles: document.getElementById('txtTotalInmueblesP24').value,
                        totalPropios: document.getElementById('txtTotalPropiosP24').value,
                        totalRentados: document.getElementById('txtTotalRentadosP24').value,
                        totalOtro: document.getElementById('txtTotalOtroP24').value,
                        otroEspecifico: document.getElementById('otroEspecificoP24').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP24').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta25s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 25 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        seContabilizaron: document.getElementById('selectApoyoEducativasP25').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP25').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        seContabilizaronInmueblesEducacion().then((resultado) => {
                            if (resultado != undefined && resultado == true) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta26s1"]')).show()
                                hideLoading()
                            } else if (resultado != undefined && resultado == false) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta27s1"]')).show()
                                hideLoading()
                            } else {
                                hideLoading()
                            }
                        })
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 26 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalInmuebles: document.getElementById('txtTotalInmueblesP26').value,
                        totalInmueblesPricipalEducativa: document.getElementById('txtTotalInmuebles1P26').value,
                        totalInmueblesOtraPrincipal: document.getElementById('txtTotalInmuebles2P26').value,
                        comoEscuelas1: document.getElementById('txtTotal1x1P26').value,
                        paraOtro1: document.getElementById('txtTotal1x2P26').value,
                        formaMixta1: document.getElementById('txtTotal1x3P26').value,
                        comoEscuelas2: document.getElementById('txtTotal2x1P26').value,
                        paraOtro2: document.getElementById('txtTotal2x2P26').value,
                        formaMixta2: document.getElementById('txtTotal2x3P26').value,
                        paraOtraFuncEducativaEspecifica: document.getElementById('otraFuncionEspecificoP26').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP26').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta27s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 27 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        seContabilizaron: document.getElementById('selectApoyoFuncionSaludP27').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP27').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        seContabilizaronInmueblesSalud().then((resultado) => {
                            if (resultado != undefined && resultado == true) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta28s1"]')).show()
                                hideLoading()
                            } else if (resultado != undefined && resultado == false) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta29s1"]')).show()
                                hideLoading()
                            } else {
                                hideLoading()
                            }
                        })
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 28 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalInmuebles: document.getElementById('txtTotalInmueblesP28').value,
                        totalInmueblesPricipalSalud: document.getElementById('txtTotalInmuebles1P28').value,
                        totalInmueblesOtraPrincipal: document.getElementById('txtTotalInmuebles2P28').value,
                        comoClinicas1: document.getElementById('txtTotal1x1P28').value,
                        comoCentrosDeSalud1: document.getElementById('txtTotal1x2P28').value,
                        comoHospitales1: document.getElementById('txtTotal1x3P28').value,
                        paraOtro1: document.getElementById('txtTotal1x4P28').value,
                        formaMixta1: document.getElementById('txtTotal1x5P28').value,
                        comoClinicas2: document.getElementById('txtTotal2x1P28').value,
                        comoCentrosDeSalud2: document.getElementById('txtTotal2x2P28').value,
                        comoHospitales2: document.getElementById('txtTotal2x3P28').value,
                        paraOtro2: document.getElementById('txtTotal2x4P28').value,
                        formaMixta2: document.getElementById('txtTotal2x5P28').value,
                        paraOtraFuncSaludEspecifica: document.getElementById('otraFuncionEspecificoP28').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP28').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta29s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 29 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        seContabilizaron: document.getElementById('selectRealizacionDeporteP29').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP29').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        seContabilizaronInmueblesDeporte().then((resultado) => {
                            if (resultado != undefined && resultado == true) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta30s1"]')).show()
                                hideLoading()
                            } else if (resultado != undefined && resultado == false) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta31s1"]')).show()
                                hideLoading()
                            } else {
                                hideLoading()
                            }
                        })
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 30 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalInmuebles: document.getElementById('txtTotalInmueblesP30').value,
                        totalInmueblesPricipalDeportes: document.getElementById('txtTotalInmuebles1P30').value,
                        totalInmueblesOtraPrincipal: document.getElementById('txtTotalInmuebles2P30').value,
                        destinadosActFisicas1: document.getElementById('txtTotal1x1P30').value,
                        destinadosRecreacionFisica1: document.getElementById('txtTotal1x2P30').value,
                        destinadosDeporte1: document.getElementById('txtTotal1x3P30').value,
                        destinadosDeporteAltoRendimiento1: document.getElementById('txtTotal1x4P30').value,
                        destinadosEventos1: document.getElementById('txtTotal1x5P30').value,
                        paraOtro1: document.getElementById('txtTotal1x6P30').value,
                        destinadosIndistintos1: document.getElementById('txtTotal1x7P30').value,
                        destinadosActFisicas2: document.getElementById('txtTotal2x1P30').value,
                        destinadosRecreacionFisica2: document.getElementById('txtTotal2x2P30').value,
                        destinadosDeporte2: document.getElementById('txtTotal2x3P30').value,
                        destinadosDeporteAltoRendimiento2: document.getElementById('txtTotal2x4P30').value,
                        destinadosEventos2: document.getElementById('txtTotal2x5P30').value,
                        paraOtro2: document.getElementById('txtTotal2x6P30').value,
                        destinadosIndistintos2: document.getElementById('txtTotal2x7P30').value,
                        paraOtraFuncSaludEspecifica: document.getElementById('otraFuncionEspecificaP30').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP30').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta31s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 31 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalGeneral: document.getElementById('txtTotalGeneralP31').value,
                        totalAutomoviles: document.getElementById('txtTotalAutomovilesP31').value,
                        totalCamionesCamionetas: document.getElementById('txtTotalCamionesCamionetasP31').value,
                        totalMotocicletas: document.getElementById('txtTotalMotocicletasP31').value,
                        totalBicicletas: document.getElementById('txtTotalBicicletasP31').value,
                        totalHelicopteros: document.getElementById('txtTotalHelicopterosP31').value,
                        totalDrones: document.getElementById('txtTotalDronesP31').value,
                        totalOtros: document.getElementById('txtTotalOtrosP31').value,
                        otroEspecifico: document.getElementById('otroEspecificoP31').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP31').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta32s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 32 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalLineas: document.getElementById('txtTotalLineasP32').value,
                        totalLineasFijas: document.getElementById('txtTotalLineasFijasP32').value,
                        totalLineasMoviles: document.getElementById('txtTotalLineasMovilesP32').value,
                        totalAparatos: document.getElementById('txtTotalAparatosP32').value,
                        totalAparatosFijos: document.getElementById('txtTotalAparatosFijosP32').value,
                        totalAparatosMoviles: document.getElementById('txtTotalAparatosMovilesP32').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP32').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta33s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 33 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalComputadoras: document.getElementById('txtTotalComputadorasP33').value,
                        totalComputadoraPersonal: document.getElementById('txtTotalComputadoraPersonalP33').value,
                        totalComputadoraPortatil: document.getElementById('txtTotalComputadoraPortatilP33').value,
                        totalImpresoras: document.getElementById('txtTotalImpresorasP33').value,
                        totalImpresoraPersonal: document.getElementById('txtTotalImpresoraPersonalP33').value,
                        totalImpresoraCompartida: document.getElementById('txtTotalImpresoraCompartidaP33').value,
                        totalMultifuncionales: document.getElementById('txtTotalMultifuncionalesP33').value,
                        totalServidores: document.getElementById('txtTotalServidoresP33').value,
                        totalTabletas: document.getElementById('txtTotalTabletasP33').value,
                        contoConServicios: document.getElementById('selectConexionRemotaP33').value,
                        contoConServiciosEspecifico: document.getElementById('conexionRemotaEspecificoP33').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP33').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta34s1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 34 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        seContabilizaron: document.getElementById('selectSeContabilizaronP34').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP34').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        seContabilizoEquipoInformatico().then((resultado) => {
                            if (resultado != undefined && resultado == true) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta35s1"]')).show()
                                hideLoading()
                            } else if (resultado != undefined && resultado == false) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#complementoS1"]')).show()
                                hideLoading()
                            } else {
                                hideLoading()
                            }
                        })
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 35 && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalComputadoras: document.getElementById('txtTotal1P35').value,
                        totalImpresoras: document.getElementById('txtTotal2P35').value,
                        totalMultifuncionales: document.getElementById('txtTotal3P35').value,
                        totalServidores: document.getElementById('txtTotal4P35').value,
                        totalTabletas: document.getElementById('txtTotal5P35').value,
                        totalComputadorasEducacion: document.getElementById('txtTotal1x1P35').value,
                        totalComputadorasOtra: document.getElementById('txtTotal1x2P35').value,
                        totalImpresorasEducacion: document.getElementById('txtTotal2x1P35').value,
                        totalImpresorasOtra: document.getElementById('txtTotal2x2P35').value,
                        totalMultifuncionalesEducacion: document.getElementById('txtTotal3x1P35').value,
                        totalMultifuncionalesOtra: document.getElementById('txtTotal3x2P35').value,
                        totalServidoresEducacion: document.getElementById('txtTotal4x1P35').value,
                        totalServidoresOtra: document.getElementById('txtTotal4x2P35').value,
                        totalTabletasEducacion: document.getElementById('txtTotal5x1P35').value,
                        totalTabletasOtra: document.getElementById('txtTotal5x2P35').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP35').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#complementoS1"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 'complemento' && seccion == 1) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalPersonal: document.getElementById('txtTotalPersonalComplementoS1').value,
                        totalHombres: document.getElementById('txtTotalHombresComplementoS1').value,
                        totalMujeres: document.getElementById('txtTotalMujeresComplementoS1').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralComplementoS1').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        obtenerConteoPersonal().then(() => {
                            alertify.success(resultado[1])
                            new bootstrap.Collapse(document.querySelector('#collapseSeccionI')).hide()
                            if (document.getElementById('btnCollapseSeccionXII').classList.contains('collapsed')) {
                                new bootstrap.Collapse(document.querySelector('#collapseSeccionXII')).show()
                            }
                            new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta1s12"]')).show()
                            hideLoading()
                        })
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 1 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        contabaConDisposicion1: document.getElementById('selectDisposicionNormativa1s12').value,
                        nombreDisposicion1: document.getElementById('txtNombreNormativa1s12').value,
                        contabaConDisposicion2: document.getElementById('selectDisposicionNormativa2s12').value,
                        nombreDisposicion2: document.getElementById('txtNombreNormativa2s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP1s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta2s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 2 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        checkNoAplica1: document.getElementById('checkNoAplica1P2s12').checked ? 'X' : '',
                        checkAdjudicacion1: document.getElementById('checkAdjudicacion1P2s12').checked ? 'X' : '',
                        checkInvitacion1: document.getElementById('checkInvitacion1P2s12').checked ? 'X' : '',
                        checkLicitacionNacional1: document.getElementById('checkLicitacionNacional1P2s12').checked ? 'X' : '',
                        checkLicitacionInternacional1: document.getElementById('checkLicitacionInternacional1P2s12').checked ? 'X' : '',
                        checkOtroProcedimiento1: document.getElementById('checkOtroProcedimiento1P2s12').checked ? 'X' : '',
                        checkNoAplica2: document.getElementById('checkNoAplica2P2s12').checked ? 'X' : '',
                        checkAdjudicacion2: document.getElementById('checkAdjudicacion2P2s12').checked ? 'X' : '',
                        checkInvitacion2: document.getElementById('checkInvitacion2P2s12').checked ? 'X' : '',
                        checkLicitacionNacional2: document.getElementById('checkLicitacionNacional2P2s12').checked ? 'X' : '',
                        checkLicitacionInternacional2: document.getElementById('checkLicitacionInternacional2P2s12').checked ? 'X' : '',
                        checkOtroProcedimiento2: document.getElementById('checkOtroProcedimiento2P2s12').checked ? 'X' : '',
                        checkOtroEspecifico1: document.getElementById('txtOtroProcedimiento1P2s12').value,
                        checkOtroEspecifico2: document.getElementById('txtOtroProcedimiento2P2s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP2s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta3s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 3 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        checkNoAplica1: document.getElementById('checkNoAplica1P3s12').checked ? 'X' : '',
                        contabaMecanismo1: document.getElementById('selectContabaMecanismo1P3s12').value,
                        checkNoAplica2: document.getElementById('checkNoAplica2P3s12').checked ? 'X' : '',
                        contabaMecanismo2: document.getElementById('selectContabaMecanismo2P3s12').value,
                        checkMecanismo1tipo1: document.getElementById('checkMecanismo11P3s12').checked ? 'X' : '',
                        checkMecanismo2tipo1: document.getElementById('checkMecanismo21P3s12').checked ? 'X' : '',
                        checkMecanismo3tipo1: document.getElementById('checkMecanismo31P3s12').checked ? 'X' : '',
                        checkMecanismo4tipo1: document.getElementById('checkMecanismo41P3s12').checked ? 'X' : '',
                        checkMecanismo5tipo1: document.getElementById('checkMecanismo51P3s12').checked ? 'X' : '',
                        checkMecanismo6tipo1: document.getElementById('checkMecanismo61P3s12').checked ? 'X' : '',
                        checkMecanismo7tipo1: document.getElementById('checkMecanismo71P3s12').checked ? 'X' : '',
                        checkMecanismo8tipo1: document.getElementById('checkMecanismo81P3s12').checked ? 'X' : '',
                        checkMecanismo9tipo1: document.getElementById('checkMecanismo91P3s12').checked ? 'X' : '',
                        checkMecanismo10tipo1: document.getElementById('checkMecanismo101P3s12').checked ? 'X' : '',
                        checkMecanismo11tipo1: document.getElementById('checkMecanismo111P3s12').checked ? 'X' : '',
                        checkMecanismo12tipo1: document.getElementById('checkMecanismo121P3s12').checked ? 'X' : '',
                        checkMecanismo13tipo1: document.getElementById('checkMecanismo131P3s12').checked ? 'X' : '',
                        checkMecanismo14tipo1: document.getElementById('checkMecanismo141P3s12').checked ? 'X' : '',
                        checkMecanismo15tipo1: document.getElementById('checkMecanismo151P3s12').checked ? 'X' : '',
                        checkMecanismo16tipo1: document.getElementById('checkMecanismo161P3s12').checked ? 'X' : '',
                        checkMecanismo1tipo2: document.getElementById('checkMecanismo12P3s12').checked ? 'X' : '',
                        checkMecanismo2tipo2: document.getElementById('checkMecanismo22P3s12').checked ? 'X' : '',
                        checkMecanismo3tipo2: document.getElementById('checkMecanismo32P3s12').checked ? 'X' : '',
                        checkMecanismo4tipo2: document.getElementById('checkMecanismo42P3s12').checked ? 'X' : '',
                        checkMecanismo5tipo2: document.getElementById('checkMecanismo52P3s12').checked ? 'X' : '',
                        checkMecanismo6tipo2: document.getElementById('checkMecanismo62P3s12').checked ? 'X' : '',
                        checkMecanismo7tipo2: document.getElementById('checkMecanismo72P3s12').checked ? 'X' : '',
                        checkMecanismo8tipo2: document.getElementById('checkMecanismo82P3s12').checked ? 'X' : '',
                        checkMecanismo9tipo2: document.getElementById('checkMecanismo92P3s12').checked ? 'X' : '',
                        checkMecanismo10tipo2: document.getElementById('checkMecanismo102P3s12').checked ? 'X' : '',
                        checkMecanismo11tipo2: document.getElementById('checkMecanismo112P3s12').checked ? 'X' : '',
                        checkMecanismo12tipo2: document.getElementById('checkMecanismo122P3s12').checked ? 'X' : '',
                        checkMecanismo13tipo2: document.getElementById('checkMecanismo132P3s12').checked ? 'X' : '',
                        checkMecanismo14tipo2: document.getElementById('checkMecanismo142P3s12').checked ? 'X' : '',
                        checkMecanismo15tipo2: document.getElementById('checkMecanismo152P3s12').checked ? 'X' : '',
                        checkMecanismo16tipo2: document.getElementById('checkMecanismo162P3s12').checked ? 'X' : '',
                        checkOtroEspecifico1: document.getElementById('txtOtroMecanismo1P3s12').value,
                        checkOtroEspecifico2: document.getElementById('txtOtroMecanismo2P3s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP3s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta4s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 4 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        contabaConSistema: document.getElementById('selectCuentaSistema4s12').value,
                        sitioDisponible: document.getElementById('txtDireccionWeb4s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP4s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        cuentaConSistemaElectronico().then((res) => {
                            if (res != undefined && res == true) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta5s12"]')).show()
                                hideLoading()
                            } else if (res != undefined && res == false) {
                                new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta6s12"]')).show()
                                hideLoading()
                            } else {
                                console.error(res);
                                hideLoading()
                            }
                        })
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 5 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        checkEtapa1: document.getElementById('checkEtapaProcedimiento1P5s12').checked ? 'X' : '',
                        checkEtapa2: document.getElementById('checkEtapaProcedimiento2P5s12').checked ? 'X' : '',
                        checkEtapa3: document.getElementById('checkEtapaProcedimiento3P5s12').checked ? 'X' : '',
                        checkEtapa4: document.getElementById('checkEtapaProcedimiento4P5s12').checked ? 'X' : '',
                        checkEtapa5: document.getElementById('checkEtapaProcedimiento5P5s12').checked ? 'X' : '',
                        checkEtapa6: document.getElementById('checkEtapaProcedimiento6P5s12').checked ? 'X' : '',
                        checkEtapa7: document.getElementById('checkEtapaProcedimiento7P5s12').checked ? 'X' : '',
                        checkEtapa8: document.getElementById('checkEtapaProcedimiento8P5s12').checked ? 'X' : '',
                        checkEtapa9: document.getElementById('checkEtapaProcedimiento9P5s12').checked ? 'X' : '',
                        otraEspecifica: document.getElementById('inputEtapaProcedimientoP5s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP5s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta6s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 6 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        contabaConElSistema1: document.getElementById('selectContabaSistema16s12').value,
                        contabaConElSistema2: document.getElementById('selectContabaSistema26s12').value,
                        contabaConElSistema3: document.getElementById('selectContabaSistema36s12').value,
                        contabaConElSistema4: document.getElementById('selectContabaSistema46s12').value,
                        contabaConElSistema5: document.getElementById('selectContabaSistema56s12').value,
                        contabaConElSistema6: document.getElementById('selectContabaSistema66s12').value,
                        tipoFormato1: document.getElementById('selectTipoFormato16s12').value,
                        tipoFormato2: document.getElementById('selectTipoFormato26s12').value,
                        tipoFormato3: document.getElementById('selectTipoFormato36s12').value,
                        tipoFormato4: document.getElementById('selectTipoFormato46s12').value,
                        tipoFormato5: document.getElementById('selectTipoFormato56s12').value,
                        tipoFormato6: document.getElementById('selectTipoFormato66s12').value,
                        frecuenciaActualizacion1: document.getElementById('selectFrecuenciaActualizacion16s12').value,
                        frecuenciaActualizacion2: document.getElementById('selectFrecuenciaActualizacion26s12').value,
                        frecuenciaActualizacion3: document.getElementById('selectFrecuenciaActualizacion36s12').value,
                        frecuenciaActualizacion4: document.getElementById('selectFrecuenciaActualizacion46s12').value,
                        frecuenciaActualizacion5: document.getElementById('selectFrecuenciaActualizacion56s12').value,
                        frecuenciaActualizacion6: document.getElementById('selectFrecuenciaActualizacion66s12').value,
                        cantidadRegistrada1: document.getElementById('txtCantidadRegistrada16s12').value,
                        cantidadRegistrada2: document.getElementById('txtCantidadRegistrada26s12').value,
                        cantidadRegistrada3: document.getElementById('txtCantidadRegistrada36s12').value,
                        cantidadRegistrada4: document.getElementById('txtCantidadRegistrada46s12').value,
                        cantidadRegistrada5: document.getElementById('txtCantidadRegistrada56s12').value,
                        cantidadRegistrada6: document.getElementById('txtCantidadRegistrada66s12').value,
                        otroFormatoEspecifico1: document.getElementById('inputOtroFormatoTipo1P6s12').value,
                        otroFormatoEspecifico2: document.getElementById('inputOtroFormatoTipo2P6s12').value,
                        otroFormatoEspecifico3: document.getElementById('inputOtroFormatoTipo3P6s12').value,
                        otroFormatoEspecifico4: document.getElementById('inputOtroFormatoTipo4P6s12').value,
                        otroFormatoEspecifico5: document.getElementById('inputOtroFormatoTipo5P6s12').value,
                        otroFormatoEspecifico6: document.getElementById('inputOtroFormatoTipo6P6s12').value,
                        otraFrecuenciaEspecifica1: document.getElementById('inputOtraFrecuenciaTipo1P6s12').value,
                        otraFrecuenciaEspecifica2: document.getElementById('inputOtraFrecuenciaTipo2P6s12').value,
                        otraFrecuenciaEspecifica3: document.getElementById('inputOtraFrecuenciaTipo3P6s12').value,
                        otraFrecuenciaEspecifica4: document.getElementById('inputOtraFrecuenciaTipo4P6s12').value,
                        otraFrecuenciaEspecifica5: document.getElementById('inputOtraFrecuenciaTipo5P6s12').value,
                        otraFrecuenciaEspecifica6: document.getElementById('inputOtraFrecuenciaTipo6P6s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP6s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta7s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 7 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        noAplica1: document.getElementById('checkNoAplicaProcedimientoTipo1P7s12').checked ? 'X' : '',
                        contratosRealizados1: document.getElementById('txtContratosRealizadosTipo1P7s12').value,
                        noAplica2: document.getElementById('checkNoAplicaProcedimientoTipo2P7s12').checked ? 'X' : '',
                        contratosRealizados2: document.getElementById('txtContratosRealizadosTipo2P7s12').value,
                        noAplica3: document.getElementById('checkNoAplicaProcedimientoTipo3P7s12').checked ? 'X' : '',
                        contratosRealizados3: document.getElementById('txtContratosRealizadosTipo3P7s12').value,
                        noAplica4: document.getElementById('checkNoAplicaProcedimientoTipo4P7s12').checked ? 'X' : '',
                        contratosRealizados4: document.getElementById('txtContratosRealizadosTipo4P7s12').value,
                        noAplica5: document.getElementById('checkNoAplicaProcedimientoTipo5P7s12').checked ? 'X' : '',
                        contratosRealizados5: document.getElementById('txtContratosRealizadosTipo5P7s12').value,
                        totalContratos: document.getElementById('txtTotalContratosProcedimientosP7s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP7s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta8s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 8 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        noAplicaProcedimientoTipo1: document.getElementById('checkNoAplicaProcedimientoTipo1P8s12').checked ? 'X' : '',
                        totalContratosTipo1: document.getElementById('txtTotalContratosTipo1P8s12').value,
                        contratosAdquisicionesTipo1: document.getElementById('txtContratosAdquisicionesTipo1P8s12').value,
                        contratosObraPublicaTipo1: document.getElementById('txtContratosObraPublicaTipo1P8s12').value,
                        noAplicaProcedimientoTipo2: document.getElementById('checkNoAplicaProcedimientoTipo2P8s12').checked ? 'X' : '',
                        totalContratosTipo2: document.getElementById('txtTotalContratosTipo2P8s12').value,
                        contratosAdquisicionesTipo2: document.getElementById('txtContratosAdquisicionesTipo2P8s12').value,
                        contratosObraPublicaTipo2: document.getElementById('txtContratosObraPublicaTipo2P8s12').value,
                        noAplicaProcedimientoTipo3: document.getElementById('checkNoAplicaProcedimientoTipo3P8s12').checked ? 'X' : '',
                        totalContratosTipo3: document.getElementById('txtTotalContratosTipo3P8s12').value,
                        contratosAdquisicionesTipo3: document.getElementById('txtContratosAdquisicionesTipo3P8s12').value,
                        contratosObraPublicaTipo3: document.getElementById('txtContratosObraPublicaTipo3P8s12').value,
                        noAplicaProcedimientoTipo4: document.getElementById('checkNoAplicaProcedimientoTipo4P8s12').checked ? 'X' : '',
                        totalContratosTipo4: document.getElementById('txtTotalContratosTipo4P8s12').value,
                        contratosAdquisicionesTipo4: document.getElementById('txtContratosAdquisicionesTipo4P8s12').value,
                        contratosObraPublicaTipo4: document.getElementById('txtContratosObraPublicaTipo4P8s12').value,
                        noAplicaProcedimientoTipo5: document.getElementById('checkNoAplicaProcedimientoTipo5P8s12').checked ? 'X' : '',
                        totalContratosTipo5: document.getElementById('txtTotalContratosTipo5P8s12').value,
                        contratosAdquisicionesTipo5: document.getElementById('txtContratosAdquisicionesTipo5P8s12').value,
                        contratosObraPublicaTipo5: document.getElementById('txtContratosObraPublicaTipo5P8s12').value,
                        totalContratosGral: document.getElementById('txtTotalContratosGralP8s12').value,
                        totalContratosGralAdquisiciones: document.getElementById('txtTotalContratosGralAdquisicionesP8s12').value,
                        totalContratosGralObraPublica: document.getElementById('txtTotalContratosGralObraPublicaP8s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP8s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta9s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 9 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        noAplica1: document.getElementById('checkNoAplicaProcedimientoTipo1P9s12').checked ? 'X' : '',
                        montoAsociado1: document.getElementById('txtMontoContratosTipo1P9s12').value,
                        noAplica2: document.getElementById('checkNoAplicaProcedimientoTipo2P9s12').checked ? 'X' : '',
                        montoAsociado2: document.getElementById('txtMontoContratosTipo2P9s12').value,
                        noAplica3: document.getElementById('checkNoAplicaProcedimientoTipo3P9s12').checked ? 'X' : '',
                        montoAsociado3: document.getElementById('txtMontoContratosTipo3P9s12').value,
                        noAplica4: document.getElementById('checkNoAplicaProcedimientoTipo4P9s12').checked ? 'X' : '',
                        montoAsociado4: document.getElementById('txtMontoContratosTipo4P9s12').value,
                        noAplica5: document.getElementById('checkNoAplicaProcedimientoTipo5P9s12').checked ? 'X' : '',
                        montoAsociado5: document.getElementById('txtMontoContratosTipo5P9s12').value,
                        montoTotal: document.getElementById('txtMontoTotalContratosP9s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP9s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta10s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 10 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        noAplicaProcedimientoTipo1: document.getElementById('checkNoAplicaProcedimientoTipo1P10s12').checked ? 'X' : '',
                        totalMontosTipo1: document.getElementById('txtMontoTotalContratosTipo1P10s12').value,
                        montosAdquisicionesTipo1: document.getElementById('txtMontoAdquisicionesTipo1P10s12').value,
                        montosObraPublicaTipo1: document.getElementById('txtMontoObraPublicaTipo1P10s12').value,
                        noAplicaProcedimientoTipo2: document.getElementById('checkNoAplicaProcedimientoTipo2P10s12').checked ? 'X' : '',
                        totalMontosTipo2: document.getElementById('txtMontoTotalContratosTipo2P10s12').value,
                        montosAdquisicionesTipo2: document.getElementById('txtMontoAdquisicionesTipo2P10s12').value,
                        montosObraPublicaTipo2: document.getElementById('txtMontoObraPublicaTipo2P10s12').value,
                        noAplicaProcedimientoTipo3: document.getElementById('checkNoAplicaProcedimientoTipo3P10s12').checked ? 'X' : '',
                        totalMontosTipo3: document.getElementById('txtMontoTotalContratosTipo3P10s12').value,
                        montosAdquisicionesTipo3: document.getElementById('txtMontoAdquisicionesTipo3P10s12').value,
                        montosObraPublicaTipo3: document.getElementById('txtMontoObraPublicaTipo3P10s12').value,
                        noAplicaProcedimientoTipo4: document.getElementById('checkNoAplicaProcedimientoTipo4P10s12').checked ? 'X' : '',
                        totalMontosTipo4: document.getElementById('txtMontoTotalContratosTipo4P10s12').value,
                        montosAdquisicionesTipo4: document.getElementById('txtMontoAdquisicionesTipo4P10s12').value,
                        montosObraPublicaTipo4: document.getElementById('txtMontoObraPublicaTipo4P10s12').value,
                        noAplicaProcedimientoTipo5: document.getElementById('checkNoAplicaProcedimientoTipo5P10s12').checked ? 'X' : '',
                        totalMontosTipo5: document.getElementById('txtMontoTotalContratosTipo5P10s12').value,
                        montosAdquisicionesTipo5: document.getElementById('txtMontoAdquisicionesTipo5P10s12').value,
                        montosObraPublicaTipo5: document.getElementById('txtMontoObraPublicaTipo5P10s12').value,
                        totalMontosGral: document.getElementById('txtMontoTotalContratosGralP10s12').value,
                        totalMontosGralAdquisiciones: document.getElementById('txtMontoTotalGralAdquisicionesP10s12').value,
                        totalMontosGralObraPublica: document.getElementById('txtMontoTotalGralObraPublicaP10s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP10s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta11s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 11 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        implementoEsquema: document.getElementById('selectImplementoEsquema11s12').value,
                        totalContratos: document.getElementById('txtTotalContratosConvenios11s12').value,
                        montoAsociado: document.getElementById('txtMontoAsociadoContratos11s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP11s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta12s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 12 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        implementoEsquema: document.getElementById('selectImplementoComprasConsolidadas12s12').value,
                        totalContrataciones: document.getElementById('txtTotalContratacionesCompras12s12').value,
                        montoAsociado: document.getElementById('txtMontoAsociadoCompras12s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP12s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta13s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 13 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalDeConvenios: document.getElementById('txtTotalConveniosModificatorios13s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP13s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#pregunta14s12"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    } else if (pregunta == 14 && seccion == 12) {
        (async function () {
            try {
                let res = await axios('controllers/questionaryController.php', {
                    method: 'POST',
                    data: {
                        tipoPeticion: 'guardarPregunta',
                        pregunta,
                        seccion,
                        idInstitucion,
                        nombreInstitucion,
                        clasificacionInstitucion,
                        anioInstitucion,
                        totalDeEstudios: document.getElementById('txtTotalUrbanoAmbiental14s12').value,
                        comentarioGeneral: document.getElementById('txtComentarioGeneralP14s12').value,
                    }
                })
                return res.data;
            } catch (error) {
                return error;
            }
        })().then((resultado) => {
            setTimeout(() => {
                if (resultado[0] == 'success') {
                    verificarPreguntasContestadas().then(() => {
                        alertify.success(resultado[1])
                        console.log();
                        new bootstrap.Collapse(document.querySelector('#collapseSeccionXII')).hide()
                        if (document.getElementById('btnCollapseFinCuestionario').classList.contains('collapsed')) {
                            new bootstrap.Collapse(document.querySelector('#collapseFinCuestionario')).show()
                        }
                        new bootstrap.Tab(document.querySelector('#questionList a[href="#finCuestionario"]')).show()
                        hideLoading()
                    })
                } else if (resultado[0] == 'error') {
                    alertify.error(resultado[1])
                    hideLoading()
                } else {
                    console.warn('Tipo de respuesta no definido. ' + resultado)
                    hideLoading()
                }
            }, 800)
        });
    }
}

async function finalizarCuestionarioEnBD() {
    try {
        let res = await axios('controllers/questionaryController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'finalizarCuestionarioEnBD',
                idInstitucion,
                nombreInstitucion,
                clasificacionInstitucion,
                anioInstitucion,
            }
        })
        resultado = res.data
        if (resultado[0] == 'success') {
            return 'success'
        } else if (resultado[0] == 'error') {
            console.error('Error: ' + resultado[1]);
            return 'error'
        } else {
            console.warn('Tipo de respuesta no definido. ' + resultado)
        }
    } catch (error) {
        console.error(error);
    }
};

finalizarCuestionarioEnDOM = () => {
    document.getElementById('contenedorItemsSeccionI').classList.add('d-none')
    document.getElementById('contenedorItemsSeccionXII').classList.add('d-none')
    document.getElementById('pregunta1s1').classList.remove('show', 'active')
    document.getElementById('finCuestionario').classList.add('show', 'active')
    document.getElementById('contenedorBtnFinalizarCuestionario').classList.add('d-none')
    document.getElementById('contenedorBtnGenerarReporte').classList.remove('d-none')
    new bootstrap.Tab(document.querySelector('#questionList a[href="#finCuestionario"]')).show()
    if (document.getElementById('btnCollapseFinCuestionario').classList.contains('collapsed')) {
        new bootstrap.Collapse(document.querySelector('#collapseFinCuestionario')).show()
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

async function cerrarSesion() {
    try {
        let res = await axios('controllers/questionaryController.php', {
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