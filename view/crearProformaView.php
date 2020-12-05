{{> header}}
{{#usuarioSupervisor}}
<main>
    <section class="row justify-content-center m-3 ancho">
        <article class="col-12 col-md-6 justify-content-center  mt-2">
            <h1 class="text-dark text-center">Crear nueva proforma</h1>
            <div class="container">
                <h4 class="col-form-label col-sm-8 pt-0">¿Necesita registrar un cliente?</h4>
                <div class="col-sm-10 mb-3">
                    <div class="form-check">
                        <input class="form-check-input inputRegistrarCliente" type="radio" name="registroClienteRadios" id="registroClienteRadios1" >
                        <label class="form-check-label" for="registroClienteRadios1" >
                            si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input inputIngresarCuit" type="radio" name="registroClienteRadios" id="registroClienteRadios2" checked>
                        <label class="form-check-label" for="registroClienteRadios2">
                            no
                        </label>
                    </div>
                </div>
                <div id="registrarCliente" class="collapse">
                    <h3 class="text-center">Registro cliente</h3>
                    <form class="form-horizontal" role="form" id="clienteRegistroFormulario" action="/crearProforma/registrarCliente" method="post">
                        <div class="form-group" >
                            <label for="clienteDenominacion" class="col-12 control-label"><span class="text-info">*</span>Denominacion</label>
                            <div class="col-12">
                                <input type="text" id="clienteDenominacion" name="clienteDenominacion" placeholder="Denominacion" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clienteNombre" class="col-12 control-label"><span class="text-info">*</span>Nombre</label>
                            <div class="col-12">
                                <input type="text" id="clienteNombre" name="clienteNombre" placeholder="Nombre/s" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clienteApellido" class="col-12 control-label"><span class="text-info">*</span>Apellido</label>
                            <div class="col-12">
                                <input type="text" id="clienteApellido" name="clienteApellido" placeholder="Apellido/s" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clienteCuit" class="col-12 control-label"><span class="text-info">*</span>Cuit</label>
                            <div class="col-12">
                                <input type="number" id="clienteCuit" name="clienteCuit" placeholder="CUIT" class="form-control" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="clienteProvincia"><span class="text-info">*</span>Provincia</label>
                                <select id="clienteProvincia" name="clienteProvincia" class="form-control">
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="clienteLocalidad"><span class="text-info">*</span>Localidad</label>
                                <select id="clienteLocalidad" name="clienteLocalidad" class="form-control">
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="clienteCalle"><span class="text-info">*</span>Calle</label>
                                <input type="text" class="form-control" id="clienteCalle" name="clienteCalle">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="clienteAltura"><span class="text-info">*</span>Altura</label>
                                <input type="number" class="form-control" id="clienteAltura" name="clienteAltura">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clienteTelefono" class="col-12 control-label"><span class="text-info">*</span>Telefono</label>
                            <div class="col-12">
                                <input type="text" id="clienteTelefono" name="clienteTelefono" placeholder="44662894" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clienteEmail" class="col-12 control-label"><span class="text-info">*</span>Email</label>
                            <div class="col-12">
                                <input type="text" id="clienteEmail" name="clienteEmail" placeholder="email@email.com" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clienteContacto1" class="col-12 control-label">Contacto 1</label>
                            <div class="col-12">
                                <input type="text" id="clienteContacto1" name="clienteContacto1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clienteContacto2" class="col-12 control-label">Contacto 2</label>
                            <div class="col-12">
                                <input type="text" id="clienteContacto2" name="clienteContacto2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group p-3">
                            <div class="col-sm-9 col-sm-offset-3">
                                <span class="help-block alert alert-info">*Campos requeridos</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Registrar cliente</button>
                        <h5 class="text-danger" id="clienteRegistroError"></h5>
                        <h5 class="text-success" id="clienteRegistroExitoso"></h5>
                    </form>
                </div>
            </div>
        </article>
    </section>
    <hr>
    <section class="row justify-content-center m-3 ancho">
        <article class="col-12 col-md-6 justify-content-center  mt-2">
            <h3 class="text-center">Crear proforma</h3>
            <form class="form-horizontal" id="crearProformaFormulario" role="form" action="/crearProforma/crearProforma" method="post">
                <div class="">
                    <h4>Cliente</h4>
                </div>
                <div class="form-group">
                    <label for="clienteRegistradoCuit" class="col-12 control-label"><span class="text-info">*</span>Cuit</label>
                    <div class="col-12">
                        <input type="number" id="clienteRegistradoCuit" name="clienteRegistradoCuit" placeholder="CUIT" class="form-control" >
                    </div>
                </div>
                <hr>
                <div class="">
                    <h4>Carga</h4>
                </div>
                <div class="form-group">
                    <label for="cargaTipo" class="col-12 control-label"><span class="text-info">*</span>Tipo de carga</label>
                    <div class="col-12">
                        <select name="cargaTipo" id="cargaTipo" class="custom-select form-control">
                            <option selected disabled>-</option>
                            {{#tablaTiposDeCarga}}
                            <option value="{{id_tipo_carga}}">{{descripcion}}</option>
                            {{/tablaTiposDeCarga}}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cargaPeso" class="col-12 control-label"><span class="text-info">*</span>Peso en kilos</label>
                    <div class="col-12">
                        <input type="number" id="cargaPeso" name="cargaPeso" placeholder="" class="form-control" required>
                    </div>
                </div>
                <div class="">
                    <h4>Hazard</h4>
                </div>
                <legend class="col-form-label col-sm-2 pt-0">¿Tiene?</legend>
                <div class="col-sm-10 mb-3">
                    <div class="form-check">
                        <input class="form-check-input inputSiHazard" type="radio" name="hazardRadios" id="hazardRadios1" value="si" >
                        <label class="form-check-label" for="hazardRadios1" >
                            si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input inputNoHazard" type="radio" name="hazardRadios" id="hazardRadios2" value="no" checked>
                        <label class="form-check-label" for="hazardRadios2">
                            no
                        </label>
                    </div>
                </div>
                <div id="hazard" class="collapse">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="imoClass"><span class="text-info">*</span>IMO class</label>
                            <select id="imoClass" name="imoClass" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="imoSubClass"><span class="text-info">*</span>IMO sub class</label>
                            <select id="imoSubClass" name="imoSubClass" class="form-control">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="">
                    <h4>Reefer</h4>
                </div>
                <legend class="col-form-label col-sm-2 pt-0">¿Tiene?</legend>
                <div class="col-sm-10 mb-3">
                    <div class="form-check">
                        <input class="form-check-input inputSiReefer" type="radio" name="reeferRadios" id="reeferRadios1" value="si">
                        <label class="form-check-label" for="reeferRadios1">
                            si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input inputNoReefer" type="radio" name="reeferRadios" id="reeferRadios2" value="no" checked>
                        <label class="form-check-label" for="reeferRadios2">
                            no
                        </label>
                    </div>
                </div>
                <div class="form-group collapse" id="reefer">
                    <label for="reeferTemperatura" class="col-12 control-label"><span class="text-info">*</span>Temperatura C°</label>
                    <div class="col-12">
                        <input type="number" id="reeferTemperatura" name="reeferTemperatura" placeholder="" class="form-control">
                    </div>
                </div>
                <div class="">
                    <h4>Viaje</h4>
                </div>
                <h5><span class="text-info">*</span>Origen</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="origenProvincia"><span class="text-info">*</span>Provincia</label>
                        <select id="origenProvincia" name="origenProvincia" class="form-control">
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="origenLocalidad"><span class="text-info">*</span>Localidad</label>
                        <select id="origenLocalidad" name="origenLocalidad" class="form-control">
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="origenCalle"><span class="text-info">*</span>Calle</label>
                        <input type="text" class="form-control" id="origenCalle" name="origenCalle">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="origenAltura"><span class="text-info">*</span>Altura</label>
                        <input type="number" class="form-control" id="origenAltura" name="origenAltura">
                    </div>
                </div>
                <h5><span class="text-info">*</span>Destino</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="destinoProvincia"><span class="text-info">*</span>Provincia</label>
                        <select id="destinoProvincia" name="destinoProvincia" class="form-control">
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="destinoLocalidad"><span class="text-info">*</span>Localidad</label>
                        <select id="destinoLocalidad" name="destinoLocalidad" class="form-control">
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="destinoCalle"><span class="text-info">*</span>Calle</label>
                        <input type="text" class="form-control" id="destinoCalle" name="destinoCalle">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="destinoAltura"><span class="text-info">*</span>Altura</label>
                        <input type="number" class="form-control" id="destinoAltura" name="destinoAltura">
                    </div>
                </div>
                <div class="form-group">
                    <label for="fechaSalida" class="col-12 control-label"><span class="text-info">*</span>Fecha de salida</label>
                    <div class="col-12">
                        <input type="datetime-local" id="fechaSalida" name="fechaSalida" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fechaLlegada" class="col-12 control-label"><span class="text-info">*</span>Fecha de llegada</label>
                    <div class="col-12">
                        <input type="datetime-local" id="fechaLlegada" name="fechaLlegada" class="form-control" required>
                    </div>
                </div>
                <hr>
                <div class="">
                    <h4>Equipo a asignar</h4>
                </div>
                <div>
                    <h4 class="text-center"><span class="text-info">*</span>Vehiculo</h4>
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
                                    <input class="form-check-input" type="radio" name="vehiculoRadios" id="vehiculoRadios{{patente}}" value="{{patente}}">
                                    <label class="form-check-label" for="vehiculoRadios{{patente}}"></label>
                                </div>
                            </div>
                        </div>
                        {{/tablaVehiculos}}
                    </div>
                </div>
                <div>
                    <h4 class="text-center"><span class="text-info">*</span>Acoplado</h4>
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
                                    <input class="form-check-input" type="radio" name="acopladoRadios" id="acopladoRadios{{patente}}" value="{{patente}}">
                                    <label class="form-check-label" for="acopladoRadios{{patente}}"></label>
                                </div>
                            </div>
                        </div>
                        {{/tablaAcoplados}}
                    </div>
                </div>
                <hr>
                <div class="">
                    <h4><span class="text-info">*</span>Chofer a asignar</h4>
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
                                <input class="form-check-input" type="radio" name="choferRadios" id="choferRadios{{id}}" value="{{id}}">
                                <label class="form-check-label" for="choferRadios{{id}}">
                                </label>
                            </div>
                        </div>
                    </div>
                    {{/tablaChoferes}}
                </div>
                <div class="form-group p-3">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block alert alert-info"><span class="text-info">*</span>Campos requeridos</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Crear proforma</button>
                <h5 class="text-danger" id="errorClienteCuit"></h5>
                <h5 class="text-danger" id="errorCamposVacios"></h5>
                <h5 class="text-success" id="crearProformaExito"></h5>
            </form>
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
