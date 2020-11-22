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
                                <a href="registroEmpleado?nombreUsuario={{nombreUsuario}}" class="btn btn-primary">Hacerlo empleado</a>
                                <a  class="mt-2 btn btn-success botonModificarUsuario" data-toggle="modal" data-target="#modificarUsuarioModal"
                                    data-nombreusuario="{{nombreUsuario}}" data-nombre="{{nombre}}"
                                    data-apellido="{{apellido}}" data-dni="{{dni}}" data-fechanaci="{{fecha_nacimiento}}" type="button">Modificar</a>
                                <a type="button" class="btn btn-danger mt-2 botonDarDeBajaUsuario" data-toggle="modal" data-target="#darDeBajaUsuarioModal" data-id="'{{dni}}'">Dar de baja usuario</a>
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
                                    <span class="h5 font-weight-bold">Fecha nacimiento</span>: {{fecha_nacimiento}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Tipo de licencia </span>: {{tipo_de_licencia}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Rol </span>: {{descripcion}}
                                </p>
                                <a type="button" class="btn btn-danger mt-2 botonDarDeBajaEmpleado" data-toggle="modal" data-target="#darDeBajaEmpleadoModal" data-id="'{{id}}'">Dar de baja empleado</a>
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
                                <form class="formularioModificarUsuario" method="POST"  action="">
                                    <div class="form-group">
                                        <label class="text-dark" for="">Nombre de usuario</label>
                                        <input type="text" class="form-control inputNombreUsuario" id="" name="" >
                                        <button class="btn btn-primary" id="" name="">Modificar</button>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="">Nombre</label>
                                        <input type="text" class="form-control inputNombre" id="" name="" >
                                        <button class="btn btn-primary" id="" name="">Modificar</button>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="">Apellido</label>
                                        <input type="text" class="form-control inputApellido" id="" name="" >
                                        <button class="btn btn-primary" id="" name="">Modificar</button>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="">DNI</label>
                                        <input type="text" class="form-control inputDni" id="" name="" >
                                        <button class="btn btn-primary" id="" name="">Modificar</button>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="">Fecha nacimiento</label>
                                        <input type="date" class="form-control inputFechaNacimiento" id="" name="">
                                        <button class="btn btn-primary" id="" name="">Modificar</button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                        <button type="submit" class="btn btn-primary" id="botonModificar" name="botonModificar">Modificar</button>
                                    </div>
                                </form>

                                <!--<div class="form-group">
                                    <label class="text-dark" for="nombreHeroe">Nombre del Heroe</label>
                                    <input type="text" class="form-control" id="nombreHeroe" name="nombreHeroe" placeholder="Axe">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="text-dark" for="atributoHeroe">Atributo principal</label>
                                        <select class="form-control" id="atributoHeroe" name="atributoHeroe">
                                            <option disabled selected>Tipo de Atributo</option>
                                            <option value="Agilidad">Agilidad</option>
                                            <option value="Fuerza">Fuerza</option>
                                            <option value="Inteligencia">Inteligencia</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-dark" for="tipoAtaqueHeroe">Tipo de ataque</label>
                                        <select class="form-control" id="tipoAtaqueHeroe" name="tipoAtaqueHeroe">
                                            <option disabled selected>Tipo de Ataque</option>
                                            <option>Cuerpo a cuerpo</option>
                                            <option>Distancia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="historiaHeroe">Historia</label>
                                    <textarea class="form-control" id="historiaHeroe" name="historiaHeroe" rows="8"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="archivoImagen">Elegir imagen</label>
                                    <input type="file" class="form-control-file text-light" id="archivoImagen" name="archivoImagen">
                                </div>
                            </div>
                        </form>-->
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