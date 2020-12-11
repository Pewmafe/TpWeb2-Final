{{> header}}
{{#usuarioSupervisor}}
    <main>
        <section class="row justify-content-center m-3 ancho">
            <article class=" justify-content-center mt-4 ancho2">
                <h2 class="text-dark mb-3 text-center">Administrar los Equipos</h2>
                {{#bajaVehiculo}}
                    <h5 class="text-success">Se dio de baja el vehículo con éxito.</h5>
                {{/bajaVehiculo}}
                {{#bajaAcoplado}}
                    <h5 class="text-success">Se dio de baja el acoplado con éxito.</h5>
                {{/bajaAcoplado}}
                {{#modificarCamionExitosamente}}
                    <h5 class="text-success">Se modifico el vehículo con exito.</h5>
                {{/modificarCamionExitosamente}}
                {{#modificarAcopladoExitosamente}}
                    <h5 class="text-success">Se modifico el acoplado con exito.</h5>
                {{/modificarAcopladoExitosamente}}
                {{#patenteVehiculoError}}
                    <h5 class="text-danger">La patente del vehículo ya existe.</h5>
                {{/patenteVehiculoError}}
                {{#patenteAcopladoError}}
                    <h5 class="text-danger">La patente del acoplado ya existe.</h5>
                {{/patenteAcopladoError}}
                <h3 class="text-dark mb-3"><i class="fas fa-truck"></i> Administrar Vehículos</h3>
                <a href="/agregarVehiculo" class="btn btn-outline-primary">Agregar Vehículo</a>
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
                                <a class="btn btn-outline-primary mt-2 botonModificarCamion" data-toggle="modal" data-target="#modificarCamionModal" data-patente="{{patente}}" data-nrochasis="{{nro_chasis}}" data-nromotor="{{nro_motor}}" data-kilometraje="{{kilometraje}}" data-fabricacion="{{fabricacion}}" data-marca="{{marca}}" data-modelo="{{modelo}}" data-calendarioservice="{{calendario_service}}" type="button">Modificar Camion</a>
                                <a type="button" class="btn btn-outline-danger mt-2 botonDarDeBajaCamion" data-toggle="modal" data-target="#darDeBajaCamionModal" data-id="'{{patente}}'">Dar de baja Camion</a>
                            </div>
                        </div>
                    {{/tablaCamiones}}
                </div>

                <h3 class="text-dark mb-3"><i class="fas fa-truck-loading"></i> Administrar Acoplados</h3>
                <a href="/agregarAcoplado" class="btn btn-outline-primary">Agregar Acoplado</a>
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
                                <a href="#" class="mt-2 btn btn-outline-primary botonModificarAcoplado" data-toggle="modal" data-target="#modificarAcopladoModal" data-patente="{{patente}}" data-chasis="{{chasis}}" data-tipoacoplado="{{descripcion}}" type="button">Modificar Acoplado</a>
                                <a type="button" class="btn btn-outline-danger mt-2 botonDarDeBajaAcoplado" data-toggle="modal" data-target="#darDeBajaAcopladoModal" data-id="'{{patente}}'">Dar de baja acoplado</a>
                            </div>
                        </div>
                    {{/tablaAcoplados}}
                </div>

            </article>

        </section>
        <section>
            <div class="modal fade" id="darDeBajaCamionModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
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
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Volver</button>
                            <form method="post" action="/administrarEquipos/eliminarVehiculo">
                                <button class="btn btn-outline-danger" id="botonDarDeBajaCamionModal" name="botonDarDeBajaCamionModal">Baja</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="darDeBajaAcopladoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
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
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Volver</button>
                            <form method="post" action="/administrarEquipos/eliminarAcoplado">
                                <button class="btn btn-outline-danger" id="botonDarDeBajaAcopladoModal" name="botonDarDeBajaAcopladoModal">Baja</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modificarCamionModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="staticBackdropLabel">Modificar Vehículo</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body container">
                            <form class="formularioModificarCamion" method="POST" action="/administrarEquipos/modificarCamion">
                                <div class="form-group">
                                    <label class="text-dark" for="patente">Patente</label>
                                    <input type="text" class="form-control inputPatente" id="patente" name="patente" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="nroChasis">Nro de Chasis</label>
                                    <input type="text" class="form-control inputNroChasis" id="nroChasis" name="nroChasis" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="nroMotor">Nro de Motor</label>
                                    <input type="text" class="form-control inputNroMotor" id="nroMotor" name="nroMotor" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="kilometraje">Kilometraje</label>
                                    <input type="text" class="form-control inputKilometraje" id="kilometraje" name="kilometraje" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="fabricacion">Fecha de Fabricación</label>
                                    <input type="date" class="form-control inputFabricacion" id="fabricacion" name="fabricacion" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="marca">Marca</label>
                                    <input type="text" class="form-control inputMarca" id="marca" name="marca" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="modelo">Modelo</label>
                                    <input type="text" class="form-control inputModelo" id="modelo" name="modelo" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="calendarioService">Calendario de Service</label>
                                    <input type="date" class="form-control inputCalendarioService" id="calendarioService" name="calendarioService" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Volver</button>
                                    <button type="submit" class="btn btn-outline-primary" id="botonModificarCamion" name="botonModificarCamion">Modificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modificarAcopladoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="staticBackdropLabel">Modificar Acoplado</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body container">
                            <form class="formularioModificarAcoplado" method="POST" action="/administrarEquipos/modificarAcoplado">
                                <div class="form-group">
                                    <label class="text-dark" for="patente">Patente</label>
                                    <input type="text" class="form-control inputPatente" id="patente" name="patente" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="chasis">Nro de Chasis</label>
                                    <input type="text" class="form-control inputChasis" id="chasis" name="chasis" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="tipoAcoplado">Tipo de Acoplado</label>
                                    <select name="tipoAcoplado" id="tipoAcoplado" class="custom-select form-control selectRol">
                                        <option selected disabled>-</option>
                                        <option value="1">Araña</option>
                                        <option value="2">CarCarrier</option>
                                        <option value="3">Jaula</option>
                                        <option value="4">Granel</option>
                                        <option value="5">Tanque</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Volver</button>
                                    <button type="submit" class="btn btn-outline-primary" id="botonModificarAcoplado" name="botonModificarAcoplado">Modificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
{{/usuarioSupervisor}}
{{^usuarioSupervisor}}
    {{> error404}}
{{/usuarioSupervisor}}
{{> footer}}