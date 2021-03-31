f = null

document.addEventListener('DOMContentLoaded', () => {
    f = new Date()
    validarFormularios()

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

    botonesInicio = document.getElementsByClassName('btnInicio')
    for (let i = 0; i < botonesInicio.length; i++) {
        botonesInicio[i].addEventListener('click', () => {
            new bootstrap.Tab(document.querySelector('#myTab li button[id="home-tab"]')).show()
        })
    }

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
                                        location.href = 'home'
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
                claveDependencia: document.getElementById('txtInstitucion').value,
                nombreDependencia: document.getElementById('txtInstitucion').options[document.getElementById('txtInstitucion').selectedIndex].text,
                password: document.getElementById('txtContrasenia').value,
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