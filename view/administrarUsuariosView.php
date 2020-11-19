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
                <h3 class="text-dark mb-3">Administrar usuarios</h3>
                <div class="row">
                    {{#tablaUsuarios}}
                        <div class="col-12 col-md-6 col-lg-4 p-2">
                            <div class="card mb-4 p-3 bg-dark">
                                <h3 class="text-center border-bottom border-secondary text-light">Descripcion</h3>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Nombre de Usuario</span>: {{nombreUsuario}}
                                </p>
                                <a href="registroEmpleado" class="btn btn-primary">Hacerlo empleado</a>
                                <a type="button" class="btn btn-danger mt-2 botonDarDeBajaUsuario" data-toggle="modal" data-target="#darDeBajaUsuarioModal" data-id="'{{id}}'">Dar de baja usuario</a>
                            </div>
                        </div>
                    {{/tablaUsuarios}}
                </div>
                <h3 class="text-dark mb-3">Administrar empleados</h3>
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
                                    <span class="h5 font-weight-bold">Tipo de licencia </span>: {{tipo_de_licencia}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Rol </span>: {{descripcion}}
                                </p>
                                <a type="button" class="btn btn-danger mt-2 botonDarDeBajaEmpleado" data-toggle="modal" data-target="#darDeBajaEmpleadoModal" data-id="'{{dni}}'">Dar de baja empleado</a>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                            <form method="post" action="administrarUsuarios/darDeBajaUsuario">
                                <button class="btn btn-danger" id="botonDarDeBajaUsuarioModal" name="botonDarDeBajaUsuarioModal">Baja</button>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                            <form method="post" action="administrarUsuarios/darDeBajaEmpleado">
                                <button class="btn btn-danger" id="botonDarDeBajaEmpleadoModal" name="botonDarDeBajaEmpleadoModal">Baja</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
{{/usuarioAdmin}}
{{^usuarioAdmin}}
    <main class="text-center">
        <h1>ERROR 404 PAGINA NO ENCONTRADA</h1>
        <a class="btn btn-outline-danger" href="/home">Volver al Inicio</a>
    </main>
{{/usuarioAdmin}}
{{> footer}}