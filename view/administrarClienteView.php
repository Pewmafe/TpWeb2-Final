{{> header}}
{{#usuarioSupervisor}}
    <main>
        <section class="row justify-content-center m-3 ancho">
            <article class=" justify-content-center mt-4 ancho2">
                <h2 class="text-dark mb-3 text-center">Administrar todos los clientes</h2>
                {{#bajaCliente}}
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Se dio de baja el cliente con exito.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                {{/bajaCliente}}
                {{#modificarCliente}}
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Se modifico al cliente con exito.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                {{/modificarCliente}}
                {{#cuitExistente}}
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>El CUIT del cliente ya esta en uso.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                {{/cuitExistente}}
                <h3 class="text-center text-md-left text-dark mb-3"><i class="fas fa-user-tag"></i> Administrar clientes</h3>
                <a href="/crearProforma" class="btn btn-outline-primary">Registar cliente</a>
                <div class="container table-responsive mb-5 mt-3">
                    <table class="table table-dark table-striped table-bordered" style="width: 100%;" id="mydatatableClientes">
                        <thead>
                            <tr>
                                <th>Cuit</th>
                                <th>Nombre Apellido</th>
                                <th>Denominacion</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{#tablaClientes}}
                                <tr>
                                    <td>{{cuit}}</td>
                                    <td>{{nombre}} {{apellido}}</td>
                                    <td>{{denominacion}}</td>
                                    <td>{{email}}</td>
                                    <td class="dropdown dropleft">
                                        <a class="btn btn-outline-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink{{cuit}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        </a>

                                        <div class="bg-dark dropdown-menu dropdown-menu-right row p-2" aria-labelledby="dropdownMenuLink{{cuit}}" style="right: 1em;">
                                            <a class="mt-2 btn btn-outline-success btn-block botonModificarCliente" data-toggle="modal" data-target="#modificarClienteModal" data-nombre="{{nombre}}" data-apellido="{{apellido}}" data-cuit="{{cuit}}" data-denominacion="{{denominacion}}" data-email="{{email}}" data-telefono="{{telefono}}" data-calle="{{calle}}" data-altura="{{altura}}" data-contacto1="{{contacto1}}" data-contacto2="{{contacto2}}" type="button">Modificar</a>
                                            <a type="button" class="btn btn-outline-danger mt-2 btn-block botonDarDeBajaCliente" data-toggle="modal" data-target="#darDeBajaClienteModal" data-cuit="'{{cuit}}'">Dar de baja cliente</a></div>

                                    </td>
                                </tr>
                            {{/tablaClientes}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cuit</th>
                                <th>Nombre Apellido</th>
                                <th>Denominacion</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </article>
        </section>
        <section>
            <div class="modal fade" id="darDeBajaClienteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="staticBackdropLabel">Dar de baja cliente</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-dark">
                            ¿Seguro que desea dar de baja al cliente?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                            <form method="post" action="administrarCliente/darDeBajaCliente">
                                <button class="btn btn-danger" id="botonDarDeBajaClienteModal" name="botonDarDeBajaClienteModal">Baja</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modificarClienteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="staticBackdropLabel">Modificar cliente</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body container">
                            <form class="formularioModificarCliente" method="POST" action="/administrarCliente/modificarCliente">
                                <div class="form-group">
                                    <label class="text-dark" for="nombre">Nombre</label>
                                    <input type="text" class="form-control inputNombre" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="apellido">Apellido</label>
                                    <input type="text" class="form-control inputApellido" id="apellido" name="apellido" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="dni">CUIT</label>
                                    <input type="number" class="form-control inputCuit" id="cuit" name="cuit" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="denominacion">Denominacion</label>
                                    <input type="text" class="form-control inputDenomiacion" id="denominacion" name="denominacion" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="email">Email</label>
                                    <input type="text" class="form-control inputEmail" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="telefono">Telefono</label>
                                    <input type="number" class="form-control inputTelefono" id="telefono" name="telefono" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="calle">Calle</label>
                                    <input type="text" class="form-control inputCalle" id="calle" name="calle" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="altura">Altura</label>
                                    <input type="number" class="form-control inputAltura" id="altura" name="altura" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="contacto1">Contacto1</label>
                                    <input type="text" class="form-control inputContacto1" id="contacto1" name="contacto1">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="contacto2">Contacto2</label>
                                    <input type="text" class="form-control inputContacto2" id="contacto2" name="contacto2">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Volver</button>
                                    <button type="submit" class="btn btn-outline-primary" id="botonModificarCliente" name="botonModificarCliente">Modificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
{{/usuarioSupervisor}}
{{^usuarioSupervisor}}
    {{> error404}}
{{/usuarioSupervisor}}
{{> footer}}