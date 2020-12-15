{{> header}}
{{#usuarioMecanico}}
<main>
    <h1 class="text-dark text-center">Mantenimiento</h1>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            {{#mantenimientoExito}}
            <div class="container alert alert-success alert-dismissible fade show" role="alert">
                <strong>Se finalizo el mantenimiento con exito.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{/mantenimientoExito}}
            <h3 class="text-center text-md-left text-dark mb-3"><i class="fas fa-tools"></i>Vehículos a mantener</h3>
            <div class="container table-responsive mb-5 mt-3">
                <table class="table table-dark table-striped table-bordered" style="width: 100%;" id="mydatatableVehiculosEnService">
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
                    {{#tablaCamionesService}}
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
                                <a class="btn btn-outline-success mt-2 botonFinalizarMantenimientoVehiculo" data-toggle="modal" data-target="#finalizarMantenimientoModal" data-patente="{{patente}}" data-idmecanico="{{id_mecanico}}" type="button">Finalizar service</a>
                            </div>
                        </td>
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
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </article>
    </section>
    <section>
        <div class="modal fade" id="finalizarMantenimientoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="staticBackdropLabel">Finalizar mantenimiento</h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark">
                        ¿Seguro que desea finalizar el mantenimiento?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Volver</button>
                        <form method="post" action="/mantenimiento/finalizarServiceDeUnVehiculo">
                            <input type="hidden" id="idMecanicoAFinalizarService" name="idMecanicoAFinalizarService" >
                            <button class="btn btn-outline-danger" id="botonFinalizarServiceDeUnVehiculoModal" name="botonFinalizarServiceDeUnVehiculoModal">Finalizar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
{{/usuarioMecanico}}
{{^usuarioMecanico}}
    {{> error404}}
{{/usuarioMecanico}}
{{> footer}}
