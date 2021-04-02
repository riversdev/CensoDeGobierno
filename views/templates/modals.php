<div class="modal fade" id="modalUsuarios" tabindex="-1" aria-labelledby="modalPrendaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title text-white" id="modalPrendaLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <form id="formUsuarios" class="form-row card p-3 m-0">
                    <input type="hidden" id="txtIdUsuario">
                    <div class="col-md-12 mb-3">
                        <label for="txtNombreUsuario" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="txtNombreUsuario" required />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="txtCorreoUsuario" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="txtCorreoUsuario" required />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="txtOcupacionUsuario" class="form-label">Direccion General</label>
                        <input type="text" class="form-control" id="txtOcupacionUsuario" required />
                    </div>
                    <div class="form-row m-0">
                        <div class="col-md-6 mb-3">
                            <label for="txtTipoUsuario" class="form-label">Tipo Usuario</label>
                            <input type="text" class="form-control" id="txtOcupacionUsuario" required />
                        </div>
                        <div class="col-md-6 mb-3 text-center">
                            <div class="form-check form-switch">
                                <label class="form-check-label mx-0" for="txtEstatusUsuario">Estatus</label><br>
                                <input class="form-check-input mt-4 mx-0" type="checkbox" id="txtEstatusUsuario">
                            </div>
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