{{> header}}
{{#usuarioAdmin}}
    <main>
        <section class="row justify-content-center m-3 ancho">
            <article class=" justify-content-center mt-4 ancho2">
                <h2 class="text-dark mb-3 text-center">Administrar todos los usuarios</h2>
                {{#bajaUsuario}}
                    <h5 class="text-success">Se dio de baja el usuario con exito.</h5>
                {{/bajaUsuario}}
                {{#bajaEmpleado}}
                    <h5 class="text-success">Se dio de baja el empleado con exito.</h5>
                {{/bajaEmpleado}}
                {{#modificarUsuario}}
                    <h5 class="text-success">Se modifico al usuario con exito.</h5>
                {{/modificarUsuario}}
                {{#modificarEmpleado}}
                    <h5 class="text-success">Se modifico al empleado con exito.</h5>
                {{/modificarEmpleado}}
                {{#nombreUsuarioExistente}}
                    <h5 class="text-danger">Nombre de usuario ya existe.</h5>
                {{/nombreUsuarioExistente}}
                {{#dniExistente}}
                    <h5 class="text-danger">DNI de usuario ya existe.</h5>
                {{/dniExistente}}
                <h3 class="text-dark mb-3"><i class="fas fa-user"></i> Administrar usuarios</h3>
                <div class="row">
                    {{#tablaUsuarios}}
                        <div class="col-12 col-md-6 col-lg-4 p-2">
                            <div class="card mb-4 p-3 bg-dark">
                                <h3 class="text-center border-bottom border-secondary text-light">Descripcion</h3>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Nombre de Usuario</span>: {{nombreUsuario}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Nombre</span>: {{nombre}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Apellido</span>: {{apellido}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">DNI</span>: {{dni}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Fecha nacimiento</span>: {{fecha_nacimiento}}
                                </p>
                                <a href="registroEmpleado?nombreUsuario={{nombreUsuario}}" class="btn btn-outline-primary">Hacerlo empleado</a>
                                <a class="mt-2 btn btn-outline-success botonModificarUsuario" data-toggle="modal" data-target="#modificarUsuarioModal" data-nombreusuario="{{nombreUsuario}}" data-nombre="{{nombre}}" data-apellido="{{apellido}}" data-dni="{{dni}}" data-fechanaci="{{fecha_nacimiento}}" type="button">Modificar</a>
                                <a type="button" class="btn btn-outline-danger mt-2 botonDarDeBajaUsuario" data-toggle="modal" data-target="#darDeBajaUsuarioModal" data-id="'{{dni}}'">Dar de baja usuario</a>
                            </div>
                        </div>
                    {{/tablaUsuarios}}
                </div>
                <h3 class="text-dark mb-3"><i class="fas fa-user-tie"></i> Administrar empleados</h3>
                <div class="row">
                    {{#tablaUsuariosEmpleados}}
                        <div class="col-12 col-md-6 col-lg-4 p-2">
                            <div class="card mb-4 p-3 bg-dark">
                                <h3 class="text-center border-bottom border-secondary text-light">Descripcion</h3>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Nombre de usuario </span>: {{nombreUsuario}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Nombre </span>: {{nombre}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Apellido </span>: {{apellido}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">DNI </span>: {{dni}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Fecha nacimiento</span>: {{fecha_nacimiento}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Tipo de licencia </span>: {{tipo_de_licencia}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Rol </span>: {{descripcion}}
                                </p>
                                <a class="mt-2 btn btn-outline-success botonModificarEmpleado" data-toggle="modal" data-target="#modificarEmpleadoModal" data-nombreusuario="{{nombreUsuario}}" data-nombre="{{nombre}}" data-apellido="{{apellido}}" data-dni="{{dni}}" data-id="{{id}}" data-fechanaci="{{fecha_nacimiento}}" data-tipolicencia="{{tipo_de_licencia}}" data-rol="{{descripcion}}" type="button">Modificar</a>
                                <a type="button" class="btn btn-outline-danger mt-2 botonDarDeBajaEmpleado" data-toggle="modal" data-target="#darDeBajaEmpleadoModal" data-id="'{{id}}'">Dar de baja empleado</a>
                            </div>
                        </div>
                    {{/tablaUsuariosEmpleados}}
                </div>
            </article>
        </section>
        <section>
            <div class="modal fade" id="darDeBajaUsuarioModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="staticBackdropLabel">Dar de baja usuario</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-dark">
                            ¿Seguro que desea dar de baja al usuario?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Volver</button>
                            <form method="post" action="administrarUsuarios/darDeBajaUsuario">
                                <button class="btn btn-outline-danger" id="botonDarDeBajaUsuarioModal" name="botonDarDeBajaUsuarioModal">Baja</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="darDeBajaEmpleadoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="staticBackdropLabel">Dar de baja empleado</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-dark">
                            ¿Seguro que desea dar de baja al empleado?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Volver</button>
                            <form method="post" action="administrarUsuarios/darDeBajaEmpleado">
                                <button class="btn btn-outline-danger" id="botonDarDeBajaEmpleadoModal" name="botonDarDeBajaEmpleadoModal">Baja</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modificarUsuarioModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="staticBackdropLabel">Modificar usuario</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body container">
                            <form class="formularioModificarUsuario" method="POST" action="/administrarUsuarios/modificarUsuario">
                                <div class="form-group">
                                    <label class="text-dark" for="nombreUsuario">Nombre de usuario</label>
                                    <input type="text" class="form-control inputNombreUsuario" id="nombreUsuario" name="nombreUsuario" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="nombre">Nombre</label>
                                    <input type="text" class="form-control inputNombre" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="apellido">Apellido</label>
                                    <input type="text" class="form-control inputApellido" id="apellido" name="apellido" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="dni">DNI</label>
                                    <input type="text" class="form-control inputDni" id="dni" name="dni" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="fechaNacimiento">Fecha nacimiento</label>
                                    <input type="date" class="form-control inputFechaNacimiento" id="fechaNacimiento" name="fechaNacimiento" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Volver</button>
                                    <button type="submit" class="btn btn-outline-primary" id="botonModificar" name="botonModificar">Modificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modificarEmpleadoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="staticBackdropLabel">Modificar empleado</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body container">
                            <form class="formularioModificarEmpleado" method="POST" action="/administrarUsuarios/modificarEmpleado">
                                <div class="form-group">
                                    <label class="text-dark" for="nombreUsuario">Nombre de usuario</label>
                                    <input type="text" class="form-control inputNombreUsuario" id="nombreUsuario" name="nombreUsuario" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="nombre">Nombre</label>
                                    <input type="text" class="form-control inputNombre" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="apellido">Apellido</label>
                                    <input type="text" class="form-control inputApellido" id="apellido" name="apellido" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="dni">DNI</label>
                                    <input type="text" class="form-control inputDni" id="dni" name="dni" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="fechaNacimiento">Fecha nacimiento</label>
                                    <input type="date" class="form-control inputFechaNacimiento" id="fechaNacimiento" name="fechaNacimiento" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="tipoLicencia">Tipo de licencia</label>
                                    <select name="tipoLicencia" id="tipoLicencia" class="custom-select form-control selectTipoLicencia">
                                        <option disabled>-</option>
                                        <option value="auto">Auto</option>
                                        <option value="camion">Camion</option>
                                        <option value="tractor">Tractor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="rol">Rol</label>
                                    <select name="rol" id="rol" class="custom-select form-control selectRol">
                                        <option selected disabled>-</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Supervisor</option>
                                        <option value="3">Encargado</option>
                                        <option value="4">Chofer</option>
                                        <option value="5">Mecanico</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                    <input type="hidden" class="idEmpleado" id="idEmpleado" name="idEmpleado">
                                    <button type="submit" class="btn btn-primary" id="botonModificar" name="botonModificar">Modificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
{{/usuarioAdmin}}
{{^usuarioAdmin}}
    {{> error404}}
{{/usuarioAdmin}}
{{> footer}}