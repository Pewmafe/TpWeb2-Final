{{> header}}
{{#usuarioSupervisor}}
<main>
    <section class="row justify-content-center m-3 ancho">
        <article class="col-12 col-md-6 justify-content-center  mt-2">
            <h1 class="text-dark text-center">Crear nueva proforma</h1>
            <div class="container">
                <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="">
                        <h3>Cliente</h3>
                    </div>
                    <div class="form-group">
                        <label for="denominacion" class="col-12 control-label">*Denominacion</label>
                        <div class="col-12">
                            <input type="text" id="denominacion" name="denominacion" placeholder="Denominacion" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="col-12 control-label">*Nombre</label>
                        <div class="col-12">
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre/s" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="col-12 control-label">*Apellido</label>
                        <div class="col-12">
                            <input type="text" id="apellido" name="apellido" placeholder="Apellido/s" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cuit" class="col-12 control-label">*Cuit</label>
                        <div class="col-12">
                            <input type="number" id="cuit" name="cuit" placeholder="CUIT" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-12 control-label">*Direccion</label>
                        <div class="col-12">
                            <input type="text" id="direccion" name="direccion" placeholder="Contraseña" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="col-12 control-label">*Telefono</label>
                        <div class="col-12">
                            <input type="text" id="telefono" name="telefono" placeholder="Contraseña" class="form-control" required>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="" class="col-12 control-label">Contacto 1</label>
                        <div class="col-12">
                            <input type="text" id="" name="" placeholder="Contraseña" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-12 control-label">Contacto 2</label>
                        <div class="col-12">
                            <input type="text" id="" name="" placeholder="Contraseña" class="form-control" required>
                        </div>
                    </div>-->
                    <hr>
                    <div class="">
                        <h3>Carga</h3>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-12 control-label">*Tipo de carga</label>
                        <div class="col-12">
                            <select name="" id="" class="custom-select form-control">
                                <option selected disabled>-</option>
                                {{#tablaTiposDeCarga}}
                                <option value="{{id}}">{{descripcion}}</option>
                                {{/tablaTiposDeCarga}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-12 control-label">*Peso en kilos</label>
                        <div class="col-12">
                            <input type="number" id="" name="" placeholder="" class="form-control" required>
                        </div>
                    </div>
                    <!--<div class="">
                        <h4>Hazard</h4>
                    </div>
                    <legend class="col-form-label col-sm-2 pt-0">¿Tiene?</legend>
                    <div class="col-sm-10 mb-3">
                        <div class="form-check">
                            <input class="form-check-input inputSiHazard" type="radio" name="hazardRadios" id="gridRadios1" value="option1" >
                            <label class="form-check-label" for="gridRadios1" >
                                si
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input inputNoHazard" type="radio" name="hazardRadios" id="gridRadios2" value="option2" checked>
                            <label class="form-check-label" for="gridRadios2">
                                no
                            </label>
                        </div>
                    </div>
                    <div id="hazard" class="collapse">
                        <div class="form-group">
                            <label for="" class="col-12 control-label">*IMO Class</label>
                            <div class="col-12">
                                <input type="text" id="" name="" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-12 control-label">*IMO Sclass</label>
                            <div class="col-12">
                                <input type="text" id="" name="" placeholder="" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <h4>Reefer</h4>
                    </div>
                    <legend class="col-form-label col-sm-2 pt-0">¿Tiene?</legend>
                    <div class="col-sm-10 mb-3">
                        <div class="form-check">
                            <input class="form-check-input inputSiReefer" type="radio" name="reeferRadios" id="gridRadios1" value="option1">
                            <label class="form-check-label" for="gridRadios1">
                                si
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input inputNoReefer" type="radio" name="reeferRadios" id="gridRadios2" value="option2" checked>
                            <label class="form-check-label" for="gridRadios2">
                                no
                            </label>
                        </div>
                    </div>
                    <div class="form-group collapse" id="reefer">
                        <label for="" class="col-12 control-label">*Temperatura C°</label>
                        <div class="col-12">
                            <input type="number" id="" name="" placeholder="" class="form-control" required>
                        </div>
                    </div>-->
                    <div class="">
                        <h3>Viaje</h3>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-12 control-label">*Origen</label>
                        <div class="col-12">
                            <select name="" id="" class="custom-select form-control">
                                <option selected disabled>-</option>
                                {{#tablaDestinos}}
                                <option value="{{id}}">{{descripcion}}</option>
                                {{/tablaDestinos}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-12 control-label">*Destino</label>
                        <div class="col-12">
                            <select name="" id="" class="custom-select form-control">
                                <option selected disabled>-</option>
                                {{#tablaDestinos}}
                                <option value="{{id}}">{{descripcion}}</option>
                                {{/tablaDestinos}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-12 control-label">*Fecha de salida</label>
                        <div class="col-12">
                            <input type="date" id="" name="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-12 control-label">*Fecha de llegada</label>
                        <div class="col-12">
                            <input type="date" id="" name="" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <h3>Equipo a asignar</h3>
                    </div>
                    <div>
                        <h4 class="text-center">*Vehiculo</h4>
                        <div class="row">
                            {{#tablaVehiculos}}
                            <div class="col-12 col-md-6 col-lg-4 p-2">
                                <div class="card mb-4 p-3 bg-dark">
                                    <h3 class="text-center border-bottom border-secondary text-light">Vehiculo</h3>
                                    <p class="text-light">
                                        <span class="h5 font-weight-bold">Patente </span>: {{patente}}
                                    </p>
                                    <p class="text-light">
                                        <span class="h5 font-weight-bold">Marca </span>: {{marca}}
                                    </p>
                                    <p class="text-light">
                                        <span class="h5 font-weight-bold">Modelo </span>: {{modelo}}
                                    </p>
                                    <p class="text-light">
                                        <span class="h5 font-weight-bold">Calendario service </span>: {{calendario_service}}
                                    </p>
                                    <div class="form-check text-center">
                                        <input class="form-check-input" type="radio" name="vehiculoRadios" id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">

                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{/tablaVehiculos}}
                        </div>
                    </div>
                    <div>
                        <h4 class="text-center">*Acoplado</h4>
                        <div class="row">
                            {{#tablaAcoplados}}
                            <div class="col-12 col-md-6 col-lg-4 p-2">
                                <div class="card mb-4 p-3 bg-dark">
                                    <h3 class="text-center border-bottom border-secondary text-light">Acoplado</h3>
                                    <p class="text-light">
                                        <span class="h5 font-weight-bold">Patente </span>: {{patente}}
                                    </p>
                                    <p class="text-light">
                                        <span class="h5 font-weight-bold">Tipo </span>: {{descripcion}}
                                    </p>
                                    <div class="form-check text-center">
                                        <input class="form-check-input" type="radio" name="acopladoRadios" id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">

                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{/tablaAcoplados}}
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <h3>*Chofer a asignar</h3>
                    </div>
                    <div class="row">
                        {{#tablaChoferes}}
                        <div class="col-12 col-md-6 col-lg-4 p-2">
                            <div class="card mb-4 p-3 bg-dark">
                                <h3 class="text-center border-bottom border-secondary text-light">Chofer</h3>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Nombre </span>: {{nombre}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Apellido </span>: {{apellido}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">DNI </span>: {{dni}}
                                </p>
                                <p class="text-light">
                                    <span class="h5 font-weight-bold">Tipo de licencia </span>: {{tipo_de_licencia}}
                                </p>
                                <div class="form-check text-center">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">

                                    </label>
                                </div>
                            </div>
                        </div>
                        {{/tablaChoferes}}
                    </div>
                    <div class="form-group p-3">
                        <div class="col-sm-9 col-sm-offset-3">
                            <span class="help-block alert alert-info">*Campos requeridos</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Crear proforma</button>
                </form>
            </div>
        </article>
    </section>
</main>
{{/usuarioSupervisor}}
{{^usuarioSupervisor}}
<main class="text-center">
    <h1>ERROR 404 PAGINA NO ENCONTRADA</h1>
    <a class="btn btn-outline-danger" href="/home">Volver al Inicio</a>
</main>
{{/usuarioSupervisor}}
{{> footer}}
