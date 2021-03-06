{{> header}}
{{#usuarioSupervisor}}
    <main>
        <section class="row justify-content-center m-3 ancho">
            <article class=" justify-content-center mt-4 ancho2">
                <h3 class="text-dark mb-3">Agregar Acoplado</h3>
                <form class="form-horizontal" role="form" action="/agregarAcoplado/agregarAcoplado" method="post" enctype="multipart/form-data">
                    <div class="intDatos">
                        <h2>Introduzca la descripcion del acoplado.</h2>
                    </div>
                    <div class="form-group">
                        {{#patenteAcopladoError}}
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>La patente ya esta registrada.</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        {{/patenteAcopladoError}}
                        {{#agregoAcopladoExitosamente}}
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Se agrego el acoplado correctamente.</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        {{/agregoAcopladoExitosamente}}
                        <label for="patente" class="col-12 control-label"><span class="text-info">*</span>Patente</label>
                        <div class="col-12">
                            <input type="text" id="patente" name="patente" placeholder="Patente" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="chasis" class="col-12 control-label"><span class="text-info">*</span>Número de Chasis</label>
                        <div class="col-12">
                            <input type="number" id="chasis" name="chasis" placeholder="Número de Chasis" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipoAcoplado" class="col-12 control-label"><span class="text-info">*</span>Tipo de acoplado</label>
                        <div class="col-12">
                            <select name="tipoAcoplado" id="tipoAcoplado" class="custom-select form-control">
                                <option selected disabled>-</option>
                                <option value="1">Araña</option>
                                <option value="2">CarCarrier</option>
                                <option value="3">Jaula</option>
                                <option value="4">Granel</option>
                                <option value="5">Tanque</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <span class="help-block alert alert-info"><span class="text-info">*</span>Campos requeridos</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-block">Agregar Acoplado</button>
                </form>
            </article>

        </section>
    </main>
{{/usuarioSupervisor}}
{{^usuarioSupervisor}}
    {{> error404}}
{{/usuarioSupervisor}}
{{> footer}}