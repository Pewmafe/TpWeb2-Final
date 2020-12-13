{{> header}}
{{#usuarioMecanico}}
<main>
    <h1 class="text-dark text-center">Mantenimiento</h1>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
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
</main>
{{/usuarioMecanico}}
{{^usuarioMecanico}}
    {{> error404}}
{{/usuarioMecanico}}
{{> footer}}
