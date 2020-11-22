{{> header}}
<main>
    <section>
        <h3 class="text-center p-2">Bienvenido a la Configuraci&oacute;n</h3>
    </section>
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

            {{#cambioNombreDelUsuario}}
            <h6 class="text-success">Nombre del Usuario Cambiado exitosamente</h6>
            {{/cambioNombreDelUsuario}}
            {{#cambioApellidoUsuario}}
            <h6 class="text-success">Apellido de Usuario Cambiado exitosamente</h6>
            {{/cambioApellidoUsuario}}
            {{#cambioDniUsuario}}
            <h6 class="text-success">Dni del Usuario Cambiado exitosamente</h6>
            {{/cambioDniUsuario}}
            {{#cambioNacimientoUsuario}}
            <h6 class="text-success">Nacimiento del Usuario Cambiado exitosamente</h6>
            {{/cambioNacimientoUsuario}}
        </article>
        <article class="col-12 col-md-9 pt-4">

            <div class="row border-bottom">
                <h5 class="col-4 font-weight-bold">Nombre de Usuario: </h5>
                <h7 class="col-4">{{nombreUsuario}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#cambiarNombre" href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarNombre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Nombre de Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarNombreUsuario" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="nombre" class="control-label">Nombre de usuario actual:
                                            {{nombreUsuario}}</label>
                                        <div class="col-12">
                                            <input type="text" name="nombre" id="nombre" class="form-control bg-dark text-white" placeholder="Ingrese el nuevo nombre de usuario">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                            Cerrar
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
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#cambiarPass" href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Contrase&ntilde;a de Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarPasswordUsuario" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="pass" class="control-label">Contrase&ntilde;a de usuario actual:
                                            {{contrasenia}}</label>
                                        <div class="col-12">
                                            <input type="password" name="pass" id="pass" class="form-control bg-dark text-white" placeholder="Ingrese su nueva contrase&ntilde;a de usuario">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                            Cerrar
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
                <h5 class="col-4 font-weight-bold">Nombre del Usuario: </h5>
                <h7 class="col-4">{{nombreDelUsuario}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#cambiarNombreEmpleado" href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarNombreEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Nombre de Empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarNombreDelUsuario" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="nombreDelUsuario" class="control-label">Nombre del usuario actual:
                                            {{nombreDelUsuario}}</label>
                                        <div class="col-12">
                                            <input type="text" name="nombreDelUsuario" id="nombreDelUsuario" class="form-control bg-dark text-white" placeholder="Ingrese el nuevo nombre del usario">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                            Cerrar
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
                <h5 class="col-4 font-weight-bold">Apellido del Usuario: </h5>
                <h7 class="col-4">{{apellidoUsuario}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#cambiarApellidoEmpleado" href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarApellidoEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Apellido del Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarApellidoUsuario" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="apellidoUsuario" class="control-label">Apellido de empleado actual:
                                            {{apellidoUsuario}}</label>
                                        <div class="col-12">
                                            <input type="text" name="apellidoUsuario" id="apellidoUsuario" class="form-control bg-dark text-white" placeholder="Ingrese el nuevo apellido del Usuario">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                            Cerrar
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
                <h5 class="col-4 font-weight-bold">Dni del Usuario: </h5>
                <h7 class="col-4">{{dniUsuario}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#cambiarDniEmpleado" href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarDniEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Dni del Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarDniUsuario" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="dniUsuario" class="control-label">Dni del usuario actual:
                                            {{dniUsuario}}</label>
                                        <div class="form-group">
                                            <div class="col-12">
                                                <input type="number" name="dniUsuario" id="dniUsuario" class="form-control bg-dark text-white" placeholder="Ingrese el nuevo dni del Usuario">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                            Cerrar
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
                <h5 class="col-4 font-weight-bold">Fecha de nacimiento del Usuario: </h5>
                <h7 class="col-4">{{nacimientoUsuario}}</h7>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#cambiarNacimientoEmpleado" href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarNacimientoEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Fecha de nacimiento del Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <form action="/ModificarUsuario/modificarNacimientoUsuario" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="nacimientoUsuario" class="control-label">Fecha de nacimiento del
                                            usuario actual:
                                            {{nacimientoUsuario}}</label>
                                        <div class="form-group">
                                            <div class="col-12">
                                                <input type="date" id="nacimientoUsuario" name="nacimientoUsuario" class="form-control bg-dark text-white">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                            Cerrar
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
                {{#licenciaEmpleadoModificado}}
                    <h6 class="text-success">Licencia de Empleaaasdasdo Cambiado exitosamente</h6>
                {{/licenciaEmpleadoModificado}}

            </article>

            <article class="col-12 col-md-9 pt-4">

                <div class="row border-bottom">
                    <h5 class="col-4 font-weight-bold">Tipo de licencia del Empleado: </h5>
                    <h7 class="col-4">{{licenciaEmpleado}}</h7>
                    <h5 class="col-4 text-right">
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#cambiarLicenciaEmpleado" href="#">
                            Editar
                        </button>
                    </h5>
                    <div class="modal fade" id="cambiarLicenciaEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Licencia de Empleado</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body bg-dark text-white">

                                    <form action="/ModificarUsuario/modificarLicenciaEmpleado" class="form-horizontal" method="post">
                                        <div class="form-group">
                                            <label for="licenciaEmpleado" class="control-label">Licencia de empleado actual:
                                                {{licenciaEmpleado}}</label>
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <select name="licenciaEmpleado" id="licenciaEmpleado" class="custom-select form-control bg-dark text-white">
                                                        <option selected disabled>-</option>
                                                        <option value="auto">Auto</option>
                                                        <option value="camion">Camion</option>
                                                        <option value="tractor">Tractor</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                                Cerrar
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