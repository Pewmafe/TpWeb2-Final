{{> header}}
{{#usuarioAdmin}}
    <main>
        <section class="row justify-content-center m-3 ancho">
            <article class=" justify-content-center mt-4 ancho2">
                <h3 class="text-dark mb-3">Registrar empleado</h3>
                <form class="form-horizontal" role="form" action="/registroEmpleado/registroEmpleado" method="post" enctype="multipart/form-data">
                    <div class="intDatos">
                        <h2>Introduzca los datos del empleado.</h2>
                    </div>
                    <div class="form-group">
                        {{#nombreUsuarioError}}
                            <h5 class="text-danger">El nombre de usuario no existe.</h5>
                        {{/nombreUsuarioError}}
                        {{#registroExitoso}}
                            <h5 class="text-success">Se registro el empleado con exito.</h5>
                        {{/registroExitoso}}
                        <label for="nombreUsuario" class="col-12 control-label">*Nombre de usuario</label>
                        <div class="col-12">
                            <input type="text" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre de Usuario" class="form-control" value="{{nombreUsuario}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipoLicencia" class="col-12 control-label">*Tipo de licencia</label>
                        <div class="col-12">
                            <select name="tipoLicencia" id="tipoLicencia" class="custom-select form-control">
                                <option selected disabled>-</option>
                                <option value="auto">Auto</option>
                                <option value="camion">Camion</option>
                                <option value="tractor">Tractor</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rolAsignar" class="col-12 control-label">*Rol a asignar</label>
                        <div class="col-12">
                            <select name="rolAsignar" id="rolAsignar" class="custom-select form-control">
                                <option selected disabled>-</option>
                                <option value="1">Administrador</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Encargado</option>
                                <option value="4">Chofer</option>
                                <option value="5">Mecanico</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <span class="help-block alert alert-info">*Campos requeridos</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                </form>
            </article>

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