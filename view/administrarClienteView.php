{{> header}}
{{#usuarioSupervisor}}
<main>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            <h2 class="text-dark mb-3 text-center">Administrar todos los clientes</h2>
            {{#bajaCliente}}
            <h5 class="text-success">Se dio de baja el cliente con exito.</h5>
            {{/bajaCliente}}
            {{#modificarCliente}}
            <h5 class="text-success">Se modifico al cliente con exito.</h5>
            {{/modificarCliente}}
            {{#cuitClienteExistente}}
            <h5 class="text-danger">CUIT cliente ya existe.</h5>
            {{/cuitClienteExistente}}
            <h3 class="text-dark mb-3">Administrar clientes</h3>
            <div class="row">
                {{#tablaClientes}}
                <div class="col-12 col-md-6 col-lg-4 p-2">
                    <div class="card mb-4 p-3 bg-dark">
                        <h3 class="text-center border-bottom border-secondary text-light">Descripcion</h3>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Nombre</span>: {{nombre}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Apellido</span>: {{apellido}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">CUIT</span>: {{dni}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Fecha nacimiento</span>: {{fecha_nacimiento}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Denominacion</span>: {{denominacion}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Email</span>: {{email}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Telefono</span>: {{telefono}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Direccion</span>: {{direccion}}
                        </p>
                        {{#contacto1}}
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Contacto1</span>: {{contacto1}}
                        </p>
                        {{/contacto1}}
                        {{^contacto1}}
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Contacto1</span>: No disponible
                        </p>
                        {{/contacto1}}
                        {{#contacto2}}
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Contacto2</span>: {{contacto2}}
                        </p>
                        {{/contacto2}}
                        {{^contacto2}}
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Contacto2</span>: No disponible
                        </p>
                        {{/contacto2}}
                        <a class="mt-2 btn btn-success botonModificarUsuario" data-toggle="modal" data-target="#modificarUsuarioModal" <!--data-nombrecliente="{{nombre}}" data-nombre="{{nombre}}" data-apellido="{{apellido}}" data-dni="{{dni}}" data-fechanaci="{{fecha_nacimiento}}" type="button">Modificar</a>
                        <a type="button" class="btn btn-danger mt-2 botonDarDeBajaUsuario" data-toggle="modal" data-target="#darDeBajaUsuarioModal" data-id="'{{dni}}'"-->>Dar de baja usuario</a>
                    </div>
                </div>
                {{/tablaClientes}}
            </div>
        </article>
    </section>
    <section>
        <!--<div class="modal fade" id="darDeBajaUsuarioModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                <button type="submit" class="btn btn-primary" id="botonModificar" name="botonModificar">Modificar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
    </section>
</main>
{{/usuarioSupervisor}}
{{^usuarioSupervisor}}
    {{> error404}}
{{/usuarioSupervisor}}
{{> footer}}
