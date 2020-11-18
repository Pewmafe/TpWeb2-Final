{{> header}}
<main>
    <section class="ancho p-3 row">
        <article class="col-12 col-md-3">
            <h4><i class="fas fa-caret-right"></i> Configuracion de Usuario</h4>
            {{#cambioNombre}}
            <h6 class="text-success">Nombre de Usuario cambiado exitosamente</h6>
            {{/cambioNombre}}

            {{#cambioPassword}}
            <h6 class="text-success">Contraseña de Usuario cambiado exitosamente</h6>
            {{/cambioPassword}}

            {{#nombreExistente}}
            <h6 class="text-danger">Nombre de usuario Existente</h6>
            {{/nombreExistente}}

        </article>
        <article class="col-12 col-md-9 pt-4">

            <div class="row border-bottom">
                <h5 class="col-4 font-weight-bold">Nombre de Usuario: </h5>
                <h7 class="col-4">{{nombreUsuario}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#cambiarNombre"
                            href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarNombre" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Nombre de Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarNombreUsuario" class="form-horizontal"
                                      method="post">
                                    <div class="form-group">
                                        <label for="nombre" class="control-label">Nombre de usuario actual:
                                            {{nombreUsuario}}</label>
                                        <div class="col-12">
                                            <input type="text" name="nombre" id="nombre" class="form-control bg-dark text-white"
                                                   placeholder="Ingrese el nuevo nombre de usuario">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar
                                        </button>
                                        <button type="submit" class="btn btn-outline-success">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 border-bottom">
                <h5 class="col-4 font-weight-bold">Contrase&ntilde;a de Usuario: </h5>
                <h7 class="col-4">{{contrasenia}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#cambiarPass"
                            href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarPass" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Contrase&ntilde;a de Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarPasswordUsuario" class="form-horizontal"
                                      method="post">
                                    <div class="form-group">
                                        <label for="pass" class="control-label">Contrase&ntilde;a de usuario actual:
                                            {{contrasenia}}</label>
                                        <div class="col-12">
                                            <input type="password" name="pass" id="pass" class="form-control bg-dark text-white"
                                                   placeholder="Ingrese su nueva contrase&ntilde;a de usuario">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar
                                        </button>
                                        <button type="submit" class="btn btn-outline-success">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </article>
    </section>

    <hr style="width: 90%">

    <section class="ancho row p-3">
        {{#usuarioEsEmpleado}}
        <article class="col-12 col-md-3">
            <h4><i class="fas fa-caret-right"></i> Configuracion de Empleado</h4>
            {{#cambioNombreEmpleado}}
            <h6 class="text-success">Nombre de Empleado Cambiado exitosamente</h6>
            {{/cambioNombreEmpleado}}
            {{#cambioApellidoEmpleado}}
            <h6 class="text-success">Apellido de Empleaaasdasdo Cambiado exitosamente</h6>
            {{/cambioApellidoEmpleado}}
            {{#licenciaEmpleadoModificado}}
            <h6 class="text-success">Licencia de Empleaaasdasdo Cambiado exitosamente</h6>
            {{/licenciaEmpleadoModificado}}
            {{#dniEmpleadoModificado}}
            <h6 class="text-success">Dni de Empleaaasdasdo Cambiado exitosamente</h6>
            {{/dniEmpleadoModificado}}
            {{#nacimientoEmpleadoModificado}}
            <h6 class="text-success">Nacimiento de Empleaaasdasdo Cambiado exitosamente</h6>
            {{/nacimientoEmpleadoModificado}}
        </article>

        <article class="col-12 col-md-9 pt-4">

            <div class="row border-bottom">
                <h5 class="col-4 font-weight-bold">Nombre de Empleado: </h5>
                <h7 class="col-4">{{nombreEmpleado}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal"
                            data-target="#cambiarNombreEmpleado"
                            href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarNombreEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Nombre de Empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarNombreEmpleado" class="form-horizontal"
                                      method="post">
                                    <div class="form-group">
                                        <label for="nombreEmpleado" class="control-label">Nombre de empleado actual:
                                            {{nombreEmpleado}}</label>
                                        <div class="col-12">
                                            <input type="text" name="nombreEmpleado" id="nombreEmpleado"
                                                   class="form-control bg-dark text-white"
                                                   placeholder="Ingrese el nuevo nombre de empleado">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar
                                        </button>
                                        <button type="submit" class="btn btn-outline-success">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 border-bottom">
                <h5 class="col-4 font-weight-bold">Apellido de Empleado: </h5>
                <h7 class="col-4">{{apellidoEmpleado}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal"
                            data-target="#cambiarApellidoEmpleado"
                            href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarApellidoEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Apellido de Empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarApellidoEmpleado" class="form-horizontal"
                                      method="post">
                                    <div class="form-group">
                                        <label for="apellidoEmpleado" class="control-label">Apellido de empleado actual:
                                            {{apellidoEmpleado}}</label>
                                        <div class="col-12">
                                            <input type="text" name="apellidoEmpleado" id="apellidoEmpleado"
                                                   class="form-control bg-dark text-white"
                                                   placeholder="Ingrese el nuevo apellido de empleado">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar
                                        </button>
                                        <button type="submit" class="btn btn-outline-success">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 border-bottom">
                <h5 class="col-4 font-weight-bold">Tipo de licencia del Empleado: </h5>
                <h7 class="col-4">{{licenciaEmpleado}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal"
                            data-target="#cambiarLicenciaEmpleado"
                            href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarLicenciaEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Licencia de Empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body bg-dark text-white">

                                <form action="/ModificarUsuario/modificarLicenciaEmpleado" class="form-horizontal"
                                      method="post">
                                    <div class="form-group">
                                        <label for="licenciaEmpleado" class="control-label">Licencia de empleado actual:
                                            {{licenciaEmpleado}}</label>
                                        <div class="form-group">
                                            <div class="col-12">
                                                <select name="licenciaEmpleado" id="licenciaEmpleado"
                                                        class="custom-select form-control bg-dark text-white">
                                                    <option selected disabled>-</option>
                                                    <option value="auto">Auto</option>
                                                    <option value="camion">Camion</option>
                                                    <option value="tractor">Tractor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar
                                        </button>
                                        <button type="submit" class="btn btn-outline-success">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 border-bottom">
                <h5 class="col-4 font-weight-bold">Dni del Empleado: </h5>
                <h7 class="col-4">{{dniEmpleado}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal"
                            data-target="#cambiarDniEmpleado"
                            href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarDniEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Dni de Empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarDniEmpleado" class="form-horizontal"
                                      method="post">
                                    <div class="form-group">
                                        <label for="dniEmpleado" class="control-label">Dni de empleado actual:
                                            {{dniEmpleado}}</label>
                                        <div class="form-group">
                                            <div class="col-12">
                                                <input type="number" name="dniEmpleado" id="dniEmpleado"
                                                       class="form-control bg-dark text-white"
                                                       placeholder="Ingrese el nuevo dni de empleado">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar
                                        </button>
                                        <button type="submit" class="btn btn-outline-success">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 border-bottom">
                <h5 class="col-4 font-weight-bold">Fecha de nacimiento del Empleado: </h5>
                <h7 class="col-4">{{nacimientoEmpleado}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal"
                            data-target="#cambiarNacimientoEmpleado"
                            href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarNacimientoEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Fecha de nacimiento de
                                    Empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarNacimientoEmpleado" class="form-horizontal"
                                      method="post">
                                    <div class="form-group">
                                        <label for="nacimientoEmpleado" class="control-label">Fecha de nacimiento de
                                            empleado actual:
                                            {{nacimientoEmpleado}}</label>
                                        <div class="form-group">
                                            <div class="col-12">
                                                <input type="date" id="nacimientoEmpleado" name="nacimientoEmpleado"
                                                       class="form-control bg-dark text-white">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar
                                        </button>
                                        <button type="submit" class="btn btn-outline-success">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </article>
        {{/usuarioEsEmpleado}}
    </section>
</main>
{{> footer}}