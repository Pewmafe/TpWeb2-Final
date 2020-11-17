{{> header}}
<main>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            <h1>admin tractores</h1>
            <a href="#" class="btn btn-primary">Agregar Vehículo</a>
            <div class="row">
                {{#tablaCamiones}}
                <div class="col-12 col-md-6 col-lg-4 p-2">
                    <div class="card mb-4 p-3 bg-dark">
                        <h3 class="text-center border-bottom border-secondary text-light">Descripcion</h3>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Patente</span>: {{patente}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Nro de Chasis</span>: {{nro_chasis}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Nro de Motor</span>: {{nro_motor}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Kilometraje</span>: {{kilometraje}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Fabricacion</span>: {{fabricacion}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Marca</span>: {{marca}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Modelo</span>: {{modelo}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Clendario de Service</span>: {{calendario_service}}
                        </p>
                        <a href="#" class="btn btn-primary">Modificar Camion</a>
                        <a href="#" class="btn btn-danger mt-2">Dar de baja Camion</a>
                    </div>
                </div>
                {{/tablaCamiones}}
            </div>

            <h1>admin acoplados</h1>
            <a href="#" class="btn btn-primary">Agregar Acoplado</a>
            <div class="row">
                {{#tablaAcoplados}}
                <div class="col-12 col-md-6 col-lg-4 p-2">
                    <div class="card mb-4 p-3 bg-dark">
                        <h3 class="text-center border-bottom border-secondary text-light">Descripcion</h3>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Patente</span>: {{patente}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Chasis</span>: {{chasis}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Tipo</span>: {{descripcion}}
                        </p>
                        <a href="#" class="btn btn-primary">Modificar Camion</a>
                        <a href="" class="btn btn-danger mt-2">Dar de baja Camion</a>
                    </div>
                </div>
                {{/tablaAcoplados}}
            </div>

        </article>

    </section>
</main>
{{> footer}}