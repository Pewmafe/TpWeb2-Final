{{> header}}
<main>
    <section class="ancho p-3 row">
        <article class="col-12 col-md-3">
            <h4 class=""><i class="fas fa-caret-right"></i> Configuracion de Usuario</h4>
            <h6 class="text-danger">{{nombreExistente}}</h6>
            <h6 class="text-success">{{modificacionExitosa}}</h6>
        </article>
        <article class="col-12 col-md-9 pt-4  justify-content-between">
            <div class="row border-bottom">
                <h5 class="col-4">Nombre de Usuario: </h5>
                <h5 class="col-4">{{nombreUsuario}}</h5>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cambiarNombre"
                            href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarNombre" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Nombre de Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/ModificarUsuario/modificarNombreUsuario" class="form-horizontal"
                                      method="post">
                                    <div class="form-group">
                                        <label for="nombre" class="control-label">Nombre de usuario actual:
                                            {{nombreUsuario}}</label>
                                        <div class="col-12">
                                            <input type="text" name="nombre" id="nombre" class="form-control"
                                                   placeholder="Ingrese el nuevo nombre de usuario">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 border-bottom">
                <h5 class="col-4">Contrase&ntilde;a de Usuario: </h5>
                <h5 class="col-4">{{contrasenia}}</h5>
                <h5 class="col-4 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cambiarPass"
                            href="#">
                        Editar
                    </button>
                </h5>
                <div class="modal fade" id="cambiarPass" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Contrase&ntilde;a de Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/ModificarUsuario/modificarPasswordUsuario" class="form-horizontal"
                                      method="post">
                                    <div class="form-group">
                                        <label for="pass" class="control-label">Contrase&ntilde;a de usuario actual:
                                            {{contrasenia}}</label>
                                        <div class="col-12">
                                            <input type="password" name="pass" id="pass" class="form-control"
                                                   placeholder="Ingrese su nueva contrase&ntilde;a de usuario">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</main>
{{> footer}}