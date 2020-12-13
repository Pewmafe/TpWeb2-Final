{{> header}}
{{#usuarioEncargado}}
<main>
    <h1 class="text-dark text-center">Service</h1>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            <h3 class="text-center text-md-left text-dark mb-3"><i class="fas fa-truck"></i>Vehículos</h3>
            <div class="container table-responsive mb-5 mt-3">
                <table class="table table-dark table-striped table-bordered" style="width: 100%;" id="mydatatableEquipos">
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
                    {{#tablaCamiones}}
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
                                <a class="btn btn-outline-success mt-2 botonModificarCamion" data-toggle="modal" data-target="#modificarCamionModal" data-patente="{{patente}}" data-nrochasis="{{nro_chasis}}" data-nromotor="{{nro_motor}}" data-kilometraje="{{kilometraje}}" data-fabricacion="{{fabricacion}}" data-marca="{{marca}}" data-modelo="{{modelo}}" data-calendarioservice="{{calendario_service}}" type="button">Mandar a mantenimiento</a>
                            </div>

                        </td>
                    </tr>
                    {{/tablaCamiones}}
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
</main>
{{/usuarioEncargado}}
{{^usuarioEncargado}}
    {{> error404}}
{{/usuarioEncargado}}
{{> footer}}
