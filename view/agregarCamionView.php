{{> header}}
{{#usuarioAdmin}}
<main>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            <h3 class="text-dark mb-3">Agregar Vehículo</h3>
            <form class="form-horizontal" role="form" action="/registroEmpleado/registroEmpleado" method="post" enctype="multipart/form-data">
                <div class="intDatos">
                    <h2>Introduzca la descripcion del vehículo.</h2>
                </div>
                <div class="form-group">
                    <p class="text-danger">{{nombreUsuarioError}}</p>
                    <p class="text-danger">{{dniUsuarioError}}</p>
                    <label for="patente" class="col-12 control-label">*Patente</label>
                    <div class="col-12">
                        <input type="text" id="patente" name="patente" placeholder="Patente" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nroChasis" class="col-12 control-label">*Número de Chasis</label>
                    <div class="col-12">
                        <input type="text" id="nroChasis" name="nroChasis" placeholder="Número de Chasis" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nroMotor" class="col-12 control-label">*Número de motor</label>
                    <div class="col-12">
                        <input type="text" id="nroMotor" name="nroMotor" placeholder="Número de motor" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fabricacion" class="col-12 control-label">*Fecha de Fabricación</label>
                    <div class="col-12">
                        <input type="date" id="fabricacion" name="fabricacion" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dni" class="col-12 control-label">*Dni</label>
                    <div class="col-12">
                        <input type="number" id="dni" name="dni" placeholder="DNI" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipoLicencia" class="col-12 control-label">*Tipo de licencia</label>
                    <div class="col-12">
                        <select name="tipoLicencia" id="tipoLicencia" class="custom-select form-control">
                            <option selected disabled>-</option>
                            <option value="auto">Auto</option>
                            <option value="camion">Camion</option>
                            <option value="tractor">Tractor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rolAsignar" class="col-12 control-label">*Rol a asignar</label>
                    <div class="col-12">
                        <select name="rolAsignar" id="rolAsignar" class="custom-select form-control">
                            <option selected disabled>-</option>
                            <option value="1">Administrador</option>
                            <option value="2">Supervisor</option>
                            <option value="3">Encargado</option>
                            <option value="4">Chofer</option>
                            <option value="5">Mecanico</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block alert alert-info">*Campos requeridos</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </form>
        </article>

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