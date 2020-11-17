{{> header}}
<main>
    <section class="ancho p-3">
        <article class="p-5">
            <h4 class=""><i class="fas fa-caret-right"></i>Configuracion de Usuario</h4>
            <h6 class="text-danger">{{nombreExistente}}</h6>
            <h6 class="text-success">{{modificacionExitosa}}</h6>
        </article>
        <article class="p-5 border-bottom row justify-content-between">
            <h5 class="col-4">Nombre de Usuario: </h5>
            <h5 class="col-4">{{nombreUsuario}}</h5>
            <h5 class="col-4 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="#">
                    Editar
                </button>
            </h5>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </article>
    </section>
</main>
{{> footer}}