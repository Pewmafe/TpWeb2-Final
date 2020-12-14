{{> header}}
{{#usuarioEncargado}}
<main>
    <h1 class="text-dark text-center">Service</h1>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            {{#errorDatos}}
            <div class="container alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ocurrio un error. Vuelva a intentarlo.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{/errorDatos}}
            {{#registroMantenimientoExitoso}}
            <div class="container alert alert-success alert-dismissible fade show" role="alert">
                <strong>Se registro el service correctamente.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{/registroMantenimientoExitoso}}
            <h3 class="text-center text-md-left text-dark mb-3"><i class="fas fa-truck"></i>Vehículos libres</h3>
            <div class="container table-responsive mb-5 mt-3">
                <table class="table table-dark table-striped table-bordered" style="width: 100%;" id="mydatatableVehiculosService">
                    <thead>
                    <tr>
                        <th>Patente</th>
                        <th>Nro Chasis</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ultimo service</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {{#tablaCamionesLibres}}
                    <tr>
                        <td>{{patente}}</td>
                        <td>{{nro_chasis}}</td>
                        <td>{{marca}}</td>
                        <td>{{modelo}}</td>
                        <td>{{calendario_service}}</td>
                        <td class="dropdown dropleft">
                            <a class="btn btn-outline-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink{{patente}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="bg-dark dropdown-menu dropdown-menu-right row p-2" aria-labelledby="dropdownMenuLink{{patente}}" style="right: 1em;">
                                <a class="btn btn-outline-success mt-2 mandarAServiceBoton" data-toggle="modal" data-target="#mandarAServiceModal"  data-patente="{{patente}}" type="button">Mandar a service</a>
                                <a class="btn btn-outline-success mt-2" data-toggle="modal" data-target="#"  type="button">Historial de service</a>
                            </div>
                        </td>
                    </tr>
                    {{/tablaCamionesLibres}}
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Patente</th>
                        <th>Nro Chasis</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ultimo service</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <h3 class="text-center text-md-left text-dark mb-3"><i class="fas fa-tools"></i>Vehículos en mantenimiento</h3>
            <div class="container table-responsive mb-5 mt-3">
                <table class="table table-dark table-striped table-bordered" style="width: 100%;" id="mydatatableVehiculosEnService">
                    <thead>
                    <tr>
                        <th>Patente</th>
                        <th>Nro Chasis</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ultimo service</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{#tablaCamionesService}}
                    <tr>
                        <td>{{patente}}</td>
                        <td>{{nro_chasis}}</td>
                        <td>{{marca}}</td>
                        <td>{{modelo}}</td>
                        <td>{{calendario_service}}</td>
                    </tr>
                    {{/tablaCamionesService}}
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Patente</th>
                        <th>Nro Chasis</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ultimo service</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </article>
    </section>
    <section>
        <div class="modal fade" id="mandarAServiceModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="staticBackdropLabel">Modificar usuario</h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body container">
                        <form class="mandarAServiceFormulario" method="POST" action="/service/mandarUnVehiculoAMantenimiento">
                            <div class="form-group">
                                <label class="text-dark" for="mecanicosParaService">Mecanicos</label>
                                <select id="mecanicosParaService" name="mecanicosParaService" class="form-control">
                                </select>
                            </div>
                            <div id="mecanicoDatos"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Volver
                                </button>
                                <button type="submit" class="btn btn-outline-primary botonMandarAService" id="botonMandarAService" name="botonMandarAService">Mandar a service</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
{{/usuarioEncargado}}
{{^usuarioEncargado}}
    {{> error404}}
{{/usuarioEncargado}}
{{> footer}}
