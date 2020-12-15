{{> header}}
{{#usuarioEncargado}}
<main>
    <h1 class="text-dark text-center">Historial service</h1>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            <h3 class="text-center text-md-left text-dark mb-3"><i class="fas fa-file-invoice"></i> Historial</h3>
            <div class="container table-responsive mb-5 mt-3">
                <table class="table table-dark table-striped table-bordered" style="width: 100%;" id="mydatatableVehiculosService">
                    <thead>
                    <tr>
                        <th>Patente vehiculo</th>
                        <th>Km unidad</th>
                        <th>nombre mecanico</th>
                        <th>apellido mecanico</th>
                        <th>dni mecanico</th>
                        <th>Fecha del service</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{#tablaMantenimientos}}
                    <tr>
                        <td>{{patente_vehiculo}}</td>
                        <td>{{km_unidad}}</td>
                        <td>{{nombre}}</td>
                        <td>{{apellido}}</td>
                        <td>{{dni}}</td>
                        <td>{{fecha_service}}</td>
                    </tr>
                    {{/tablaMantenimientos}}
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Patente vehiculo</th>
                        <th>Km unidad</th>
                        <th>nombre mecanico</th>
                        <th>apellido mecanico</th>
                        <th>dni mecanico</th>
                        <th>Fecha del service</th>
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

