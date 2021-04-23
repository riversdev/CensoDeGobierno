// VARIABLES Y CONSTANTES GLOBALES DEL INICIO
const modalRegistroDependencia = new bootstrap.Modal(document.getElementById('modalAddUser'))

let f = null

document.addEventListener('DOMContentLoaded', () => {
    f = new Date()
    validarFormularios()

    // ESCUCHADORES DE CLICKS EN OJOS PARA VER CONTRASEÑA
    botonesOjoContrasenia = document.getElementsByClassName('ojoContrasenia')
    for (let i = 0; i < botonesOjoContrasenia.length; i++) {
        botonesOjoContrasenia[i].addEventListener('click', function () {
            if (this.children[0].classList.contains('fa-eye')) {
                this.children[0].classList.replace('fa-eye', 'fa-eye-slash');
                this.parentElement.parentElement.children[0].children[1].type = 'text'
            } else if (this.children[0].classList.contains('fa-eye-slash')) {
                this.children[0].classList.replace('fa-eye-slash', 'fa-eye');
                this.parentElement.parentElement.children[0].children[1].type = 'password'
            }
        })
    }

    // LLENADO DEL SELECT DE DEPENDENCIAS EN LOGIN DE DEPENDENCIAS
    obtenerDependencias('all').then((res) => {
        if (res[0] != undefined && res[0] == 'success') {
            document.getElementById('txtInstitucionLogin').innerHTML = ''
            res[1].forEach(dependencia => {
                option = document.createElement('option')
                option.value = dependencia['claveDependencia']
                option.append(document.createTextNode(dependencia['nombreDependencia']))
                document.getElementById('txtInstitucionLogin').append(option)
            })
        } else if (res[0] != undefined && res[0] == 'error') {
            alertify.error(res[1])
        } else {
            console.warn('Tipo de respuesta no definido. ' + res)
        }
    })

    // ESCUCHADORES DE CLICK PARA LOS BOTONES DE REGRESO AL INICIO EN LOS LOGINS
    let botonesInicio = document.getElementsByClassName('btnInicio')
    for (let i = 0; i < botonesInicio.length; i++) {
        botonesInicio[i].addEventListener('click', () => {
            new bootstrap.Tab(document.querySelector('#myTab li button[id="home-tab"]')).show()
        })
    }

    // ESCUCHADOR DEL SELECT DE CLASIFICACION EN EL MODAL DE REGISTRO PARA LLENAR EL SELECT EN ESE MODAL
    document.getElementById('txtClasificacion').addEventListener('change', function () {
        obtenerDependencias(this.value).then((res) => {
            if (res[0] != undefined && res[0] == 'success') {
                document.getElementById('txtInstitucion').innerHTML = ''
                res[1].forEach(dependencia => {
                    option = document.createElement('option')
                    option.value = dependencia['claveDependencia']
                    option.append(document.createTextNode(dependencia['nombreDependencia']))
                    document.getElementById('txtInstitucion').append(option)
                })
            } else if (res[0] != undefined && res[0] == 'error') {
                alertify.error(res[1])
            } else {
                console.warn('Tipo de respuesta no definido. ' + res)
            }
        })
    })

    // RESETEO Y QUITAR VALDACION DEL FORMULARIO EN EL MODAL DE REGISTRO AL ABRIR EL MODAL
    document.getElementById('modalAddUser').addEventListener('show.bs.modal', () => {
        document.getElementById('formRegistrarDependencia').reset()
        document.getElementById('formRegistrarDependencia').classList.remove('was-validated')
    })
})

validarFormularios = () => {
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    event.preventDefault()
                    if (form.id == 'formRegistrarDependencia') {
                        registrarDependencia().then((res) => {
                            if (res[0] != undefined && res[0] == 'success') {
                                modalRegistroDependencia.hide()
                                alertify.success(res[1])
                            } else if (res[0] != undefined && res[0] == 'error') {
                                alertify.error(res[1])
                            } else {
                                console.warn('Tipo de respuesta no definido. ' + res)
                            }
                        })
                    } else if (form.id == 'formLoginDependencia') {
                        validarAcceso('dependencia', document.getElementById('txtInstitucionLogin').value, document.getElementById('txtContraseniaLogin').value).then((res) => {
                            if (res[0] != undefined && res[0] == 'success') {
                                if (res[1] == true) {
                                    alertify.success('Acceso correcto !')
                                    setTimeout(() => {
                                        location.href = 'questionary'
                                    }, 1000)
                                } else if (res[1] == false) {
                                    alertify.error('Datos incorrectos !')
                                } else {
                                    console.warn('Tipo de respuesta no definido. ' + res)
                                }
                            } else if (res[0] != undefined && res[0] == 'error') {
                                console.warn('Error. ' + res[1])
                            } else {
                                console.warn('Tipo de respuesta no definido. ' + res)
                            }
                        })
                    } else if (form.id == 'formLoginAdmin') {
                        validarAcceso('admin', document.getElementById('txtMailLoginAdmin').value, document.getElementById('txtContraseniaLoginAdmin').value).then((res) => {
                            if (res[0] != undefined && res[0] == 'success') {
                                if (res[1] == true) {
                                    alertify.success('Acceso correcto !')
                                    setTimeout(() => {
                                        location.href = 'root'
                                    }, 1000)
                                } else if (res[1] == false) {
                                    res[2] != undefined ? alertify.error(res[2]) : alertify.error('Datos incorrectos !')
                                } else {
                                    console.warn('Tipo de respuesta no definido. ' + res)
                                }
                            } else if (res[0] != undefined && res[0] == 'error') {
                                console.warn('Error. ' + res[1])
                            } else {
                                console.warn('Tipo de respuesta no definido. ' + res)
                            }
                        })
                    }
                }

                form.classList.add('was-validated')
            }, false)
        })
}

async function obtenerDependencias(clasificacion) {
    try {
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'obtenerDependencias',
                clasificacion,
                anio: f.getFullYear()
            }
        })
        return res.data
    } catch (error) {
        console.error(error);
    }
};

async function registrarDependencia() {
    try {
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'registrarDependencia',
                clasificacion: document.getElementById('txtClasificacion').value,
                clave: document.getElementById('txtInstitucion').value,
                dependencia: document.getElementById('txtInstitucion').options[document.getElementById('txtInstitucion').selectedIndex].text,
                correo: document.getElementById('txtCorreo').value,
                password: document.getElementById('txtContrasenia').value,
                telefono: document.getElementById('txtNumeroTelefonico').value,
                anio: f.getFullYear()
            }
        })
        return res.data
    } catch (error) {
        console.error(error);
    }
};

async function validarAcceso(tipoDeUsuario, usuario, contrasenia) {
    try {
        let res = await axios('controllers/adminController.php', {
            method: 'POST',
            data: {
                tipoPeticion: 'validarAcceso',
                tipoDeUsuario,
                usuario,
                contrasenia,
                anio: f.getFullYear()
            }
        })
        return res.data
    } catch (error) {
        console.error(error);
    }
};

// by Alejandro Ríos - RiversHIRSCH