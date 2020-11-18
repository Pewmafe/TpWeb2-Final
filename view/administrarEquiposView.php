{{> header}}
{{#usuarioAdmin}}
<main>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            <h1>admin tractores</h1>
            <a href="/agregarVehiculo" class="btn btn-primary">Agregar Vehículo</a>
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
                        <a href="#" class="btn btn-secondary mt-2">Dar de baja Camion</a>
                        <a type="button" class="btn btn-danger mt-2 botonDarDeBajaCamion" data-toggle="modal" data-target="#darDeBajaCamionModal" data-id="'{{patente}}'">Dar de baja Camion</a>
                    </div>
                </div>
                {{/tablaCamiones}}
            </div>

            <h1>admin acoplados</h1>
            <a href="/agregarAcoplado" class="btn btn-primary">Agregar Acoplado</a>
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
                        <a href="" class="btn btn-secondary mt-2">Dar de baja acoplado</a>
                        <a type="button" class="btn btn-danger mt-2 botonDarDeBajaAcoplado" data-toggle="modal" data-target="#darDeBajaAcopladoModal" data-id="'{{patente}}'">Dar de baja acoplado</a>
                    </div>
                </div>
                {{/tablaAcoplados}}
            </div>

        </article>

    </section>
    <section>
        <div class="modal fade" id="darDeBajaCamionModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="staticBackdropLabel">Dar de baja camion</h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark">
                        ¿Seguro que desea dar de baja el camion?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                        <form  method="post" action="/administrarEquipos/eliminarVehiculo">
                            <button class="btn btn-danger" id="botonDarDeBajaCamionModal" name="botonDarDeBajaCamionModal">Baja</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="darDeBajaAcopladoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="staticBackdropLabel">Dar de baja acoplado</h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark">
                        ¿Seguro que desea dar de baja el acoplado?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                        <form  method="post" action="/administrarEquipos/eliminarAcoplado">
                            <button class="btn btn-danger" id="botonDarDeBajaAcopladoModal" name="botonDarDeBajaAcopladoModal">Baja</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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