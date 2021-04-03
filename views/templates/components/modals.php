<div class="modal fade" id="modalUsuarios" tabindex="-1" aria-labelledby="modalUsuariosLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title text-white" id="modalUsuariosLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <form id="formUsuarios" class="form-row card p-3 m-0 needs-validation" novalidate>
                    <input type="text" id="txtIdUsuario">
                    <div class="col-md-12 mb-3">
                        <label for="txtNombreUsuario" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="txtNombreUsuario" required />
                        <div class="valid-feedback">Correcto!</div>
                        <div class="invalid-feedback">Error!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="txtCorreoUsuario" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="txtCorreoUsuario" required />
                        <div class="valid-feedback">Correcto!</div>
                        <div class="invalid-feedback">Error!</div>
                    </div>
                    <div class="form-row m-0">
                        <div class="col-md-10 mb-3" id="contrasenia">
                            <label for="txtContraseniaUsuario" class="form-label">Contrasenia</label>
                            <input type="password" class="form-control" id="txtContraseniaUsuario" required />
                            <div class="valid-feedback">Correcto!</div>
                            <div class="invalid-feedback">Error!</div>
                        </div>
                        <div class="col-md-2 mx-0 mt-4 pt-3 px-0 text-center" id="contrasenia2">
                            <a id="ojo"><i class="fas fa-eye-slash fa-lg" id="ojito"></i></a>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3" id="contrasenia2">
                        <label for="txtCorreoUsuario" class="form-label">Telefono</label>
                        <input type="input" class="form-control" id="txtPhoneUsuario" required />
                        <div class="valid-feedback">Correcto!</div>
                        <div class="invalid-feedback">Error!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="txtOcupacionUsuario" class="form-label">Direccion General</label>
                        <input type="text" class="form-control" id="txtOcupacionUsuario" required />
                        <div class="valid-feedback">Correcto!</div>
                        <div class="invalid-feedback">Error!</div>
                    </div>
                    <div class="form-row m-0">
                        <div class="col-md-6 mb-3">
                            <label for="txtTipoUsuario" class="form-label">Tipo Usuario</label>
                            <select id="txtTipoUsuario" class="custom-select" aria-label="Select tipo de usuario" required>
                                <option value="" selected disabled>?</option>
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                            <div class="valid-feedback">Correcto!</div>
                            <div class="invalid-feedback">Selecciona una opción!</div>
                        </div>
                        <div class="col-md-6 mb-3 text-center">
                            <div class="form-check form-switch">
                                <label class="form-check-label mx-0" for="txtEstatusUsuario">Estatus</label><br>
                                <small class="text-danger">Inactivo</small>
                                <input class="form-check-input ml-1 mr-0" type="checkbox" id="txtEstatusUsuario">
                                <small class="text-primary ml-5">Activo</small>
                            </div>
                            <div class="valid-feedback">Correcto!</div>
                            <div class="invalid-feedback">Error!</div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-white mx-3" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>