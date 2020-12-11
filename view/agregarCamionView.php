{{> header}}
{{#usuarioSupervisor}}
    <main>
        <section class="row justify-content-center m-3 ancho">
            <article class=" justify-content-center mt-4 ancho2">
                <h3 class="text-dark mb-3">Agregar Vehículo</h3>
                <form class="form-horizontal" role="form" action="/agregarVehiculo/agregarVehiculo" method="post" enctype="multipart/form-data">
                    <div class="intDatos">
                        <h2>Introduzca la descripcion del vehículo.</h2>
                    </div>
                    <div class="form-group">
                        {{#patenteVehiculoError}}
                            <h5 class="text-danger">La patente ya está registrada.</h5>
                        {{/patenteVehiculoError}}
                        {{#agregoVehExitosamente}}
                            <h5 class="text-success">Se agregó el vehículo correctamente.</h5>
                        {{/agregoVehExitosamente}}
                        <label for="patente" class="col-12 control-label">*Patente</label>
                        <div class="col-12">
                            <input type="text" id="patente" name="patente" placeholder="Patente" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nroChasis" class="col-12 control-label"><span class="text-info">*</span>Número de Chasis</label>
                        <div class="col-12">
                            <input type="number" id="nroChasis" name="nroChasis" placeholder="Número de Chasis" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nroMotor" class="col-12 control-label"><span class="text-info">*</span>Número de motor</label>
                        <div class="col-12">
                            <input type="number" id="nroMotor" name="nroMotor" placeholder="Número de motor" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kilometraje" class="col-12 control-label"><span class="text-info">*</span>Kilometraje</label>
                        <div class="col-12">
                            <input type="number" id="kilometraje" name="kilometraje" placeholder="Kilometraje" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fabricacion" class="col-12 control-label"><span class="text-info">*</span>Fecha de Fabricación</label>
                        <div class="col-12">
                            <input type="date" id="fabricacion" name="fabricacion" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="marca" class="col-12 control-label"><span class="text-info">*</span>Marca</label>
                        <div class="col-12">
                            <input type="text" id="marca" name="marca" placeholder="Marca" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modelo" class="col-12 control-label"><span class="text-info">*</span>Modelo</label>
                        <div class="col-12">
                            <input type="text" id="modelo" name="modelo" placeholder="Modelo" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="calendarioService" class="col-12 control-label"><span class="text-info">*</span>Calendario de Service</label>
                        <div class="col-12">
                            <input type="date" id="calendarioService" name="calendarioService" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <span class="help-block alert alert-info"><span class="text-info">*</span>Campos requeridos</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Agregar Vehículo</button>
                </form>
            </article>

        </section>
    </main>
{{/usuarioSupervisor}}
{{^usuarioSupervisor}}
    {{> error404}}
{{/usuarioSupervisor}}
{{> footer}}