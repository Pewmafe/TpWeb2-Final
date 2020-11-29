$(document).ready(function (){

    /************************BAJA USUARIOS**********************************/
    $(document).on("click", ".botonDarDeBajaUsuario", function () {
        var primaryKey = $(this).data('id');
        $(".modal-footer #botonDarDeBajaUsuarioModal").val(primaryKey);
    });

    $(document).on("click", ".botonDarDeBajaEmpleado", function () {
        var primaryKey = $(this).data('id');
        $(".modal-footer #botonDarDeBajaEmpleadoModal").val(primaryKey);
    });

    /************************BAJA EQUIPOS**********************************/
    $(document).on("click", ".botonDarDeBajaCamion", function () {
        var primaryKey = $(this).data('id');
        $(".modal-footer #botonDarDeBajaCamionModal").val(primaryKey);
    });

    $(document).on("click", ".botonDarDeBajaAcoplado", function () {
        var primaryKey = $(this).data('id');
        $(".modal-footer #botonDarDeBajaAcopladoModal").val(primaryKey);
    });

    /************************MODIFICACION USUARIOS**********************************/
    $(document).on("click", ".botonModificarUsuario", function () {
        var dni = $(this).data('dni');
        var nombreUsuario = $(this).data('nombreusuario');
        var nombre = $(this).data('nombre');
        var apellido = $(this).data('apellido');
        var fechanaci = $(this).data('fechanaci');

        $(".formularioModificarUsuario .modal-footer #botonModificar").val(dni);
        $(".formularioModificarUsuario .inputNombreUsuario").val(nombreUsuario);
        $(".formularioModificarUsuario .inputNombre").val(nombre);
        $(".formularioModificarUsuario .inputApellido").val(apellido);
        $(".formularioModificarUsuario .inputDni").val(dni);
        $(".formularioModificarUsuario .inputFechaNacimiento").val(fechanaci);
    });

    $(document).on("click", ".botonModificarEmpleado", function () {
        var dni = $(this).data('dni');
        var nombreUsuario = $(this).data('nombreusuario');
        var nombre = $(this).data('nombre');
        var apellido = $(this).data('apellido');
        var fechanaci = $(this).data('fechanaci');
        var tipoLicencia = $(this).data('tipolicencia');
        var rol = $(this).data('rol');
        var id = $(this).data('id');

        switch (rol) {
            case 'administrador':
                rol=1;
                break;
            case 'supervisor':
                rol=2;
                break;
            case 'encargado':
                rol=3;
                break;
            case 'chofer':
                rol=4;
                break;
            case 'mecanico':
                rol=5;
                break;
        }

        $(".formularioModificarEmpleado .modal-footer #botonModificar").val(dni);
        $(".formularioModificarEmpleado .inputNombreUsuario").val(nombreUsuario);
        $(".formularioModificarEmpleado .inputNombre").val(nombre);
        $(".formularioModificarEmpleado .inputApellido").val(apellido);
        $(".formularioModificarEmpleado .inputDni").val(dni);
        $(".formularioModificarEmpleado .inputFechaNacimiento").val(fechanaci);
        $(".formularioModificarEmpleado .selectTipoLicencia").val(tipoLicencia);
        $(".formularioModificarEmpleado .selectRol").val(rol);
        $(".formularioModificarEmpleado .modal-footer .idEmpleado").val(id);
    });

    /************************MODIFICACION EQUIPO**********************************/
    $(document).on("click", ".botonModificarCamion", function () {
        var patente = $(this).data('patente');
        var nroChasis = $(this).data('nrochasis');
        var nroMotor = $(this).data('nromotor');
        var kilometraje = $(this).data('kilometraje');
        var fabricacion = $(this).data('fabricacion');
        var marca = $(this).data('marca');
        var modelo = $(this).data('modelo');
        var calendarioService = $(this).data('calendarioservice');

        $(".formularioModificarCamion .modal-footer #botonModificarCamion").val(patente);
        $(".formularioModificarCamion .inputNroChasis").val(nroChasis);
        $(".formularioModificarCamion .inputKilometraje").val(kilometraje);
        $(".formularioModificarCamion .inputNroMotor").val(nroMotor);
        $(".formularioModificarCamion .inputPatente").val(patente);
        $(".formularioModificarCamion .inputFabricacion").val(fabricacion);
        $(".formularioModificarCamion .inputMarca").val(marca);
        $(".formularioModificarCamion .inputModelo").val(modelo);
        $(".formularioModificarCamion .inputCalendarioService").val(calendarioService);
    });

    $(document).on("click", ".botonModificarAcoplado", function () {
        var patente = $(this).data('patente');
        var chasis = $(this).data('chasis');
        var tipoAcoplado = $(this).data('tipoAcoplado');


        $(".formularioModificarAcoplado .modal-footer #botonModificarAcoplado").val(patente);
        $(".formularioModificarAcoplado .inputChasis").val(chasis);
        $(".formularioModificarAcoplado .inputTipoAcoplado").val(tipoAcoplado);
        $(".formularioModificarAcoplado .inputPatente").val(patente);

    });

    /************************JS VIAJE**********************************/
    $('#Activos').click(function () {
        $('.popup1').show("slow");
        $('.popup2').hide(1000);
        $('.popup3').hide(1000);
    });


    $('#Pendientes').click(function () {
        $('.popup2').show(1000);
        $('.popup1').hide(1000);
        $('.popup3').hide(1000);
    });


    $('#Finalizados').click(function () {
        $('.popup3').show(1000);
        $('.popup2').hide(1000);
        $('.popup1').hide(1000);
    });

    /************************COLLAPSE PROFORMA**********************************/
    $(document).on("click", ".inputSiHazard", function () {

        $("#hazard").collapse('show');
    });

    $(document).on("click", ".inputNoHazard", function () {

        $("#hazard").collapse('hide');
    });

    $(document).on("click", ".inputSiReefer", function () {

        $("#reefer").collapse('show');
    });

    $(document).on("click", ".inputNoReefer", function () {

        $("#reefer").collapse('hide');
    });

    $(document).on("click", ".inputRegistrarCliente", function () {

        $("#registrarCliente").collapse('show');
    });

    $(document).on("click", ".inputIngresarCuit", function () {

        $("#registrarCliente").collapse('hide');
    });

    /************************AJAX LOGIN**********************************/
    $("#loginFormulario").submit(function(event){
        event.preventDefault();
        var post_url = $(this).attr("action");
        var form_data = $(this).serialize();

        $.post( post_url, form_data, function(errorLogin) {
            if(errorLogin == true){
                $("#loginError").html("<span>Error en el usuario o la contrasenia</span>");
            }else{
                window.location = "/";
            }
        });
    });

    /************************AJAX REGISTRO**********************************/
    $("#registroFormulario").submit(function(event){
        event.preventDefault();
        var post_url = $(this).attr("action");
        var form_data = $(this).serialize();

        $.post( post_url, form_data, function(errorRegistro) {
            var json_data = jQuery.parseJSON(errorRegistro);
            $("#nombreUsuarioError").html("");
            $("#dniUsuarioError").html("");
            $("#registroExitoso").html("");

            if(json_data.nombreUsuarioError == true && json_data.dniError == true){
                $("#nombreUsuarioError").html("<span>Nombre de usuario ya existente</span>");
                $("#dniUsuarioError").html("<span>DNI de usuario ya existente</span>");
            }else if(json_data.nombreUsuarioError){
                $("#nombreUsuarioError").html("<span>Nombre de usuario ya existente</span>");
            }else if(json_data.dniError == true){
                $("#dniUsuarioError").html("<span>DNI de usuario ya existente</span>");
            }
            else{
                $("#registroExitoso").html("<span>Se registro con exito</span>");
                $("#NombreUsuario").val('');
                $("#nombre").val('');
                $("#apellido").val('');
                $("#fechaNacimiento").val('');
                $("#dni").val('');
                $("#contrasenia").val('');
            }
        });
    });

    /************************AJAX CREAR CLIENTE**********************************/
    $("#clienteRegistroFormulario").submit(function (event){
        event.preventDefault();

        var post_url = $(this).attr("action");
        var form_datos = $(this).serialize();

        $.post( post_url, form_datos, function(errorRegistro) {
            var jsonErrorRegistro = jQuery.parseJSON(errorRegistro);
            $("#clienteRegistroError").html("");
            $("#clienteRegistroExitoso").html("");

            if(jsonErrorRegistro.clienteCuitExistente == true){
                $("#clienteRegistroError").html("<span>El CUIT del cliente ya existe.</span>");
            }else if(jsonErrorRegistro.clienteDenominacion == false || jsonErrorRegistro.clienteNombre == false || jsonErrorRegistro.clienteApellido == false || jsonErrorRegistro.clienteCuit == false
                || jsonErrorRegistro.clienteLocalidad == false || jsonErrorRegistro.clienteCalle == false || jsonErrorRegistro.clienteAltura == false || jsonErrorRegistro.clienteTelefono == false){
                $("#clienteRegistroError").html("<span>Debe completar todos los campos.</span>");
            }else{
                $("#clienteRegistroExitoso").html("<span>Se registro el cliente con exito</span>");
                $("#clienteDenominacion").val('');
                $("#clienteNombre").val('');
                $("#clienteApellido").val('');
                $("#clienteCuit").val('');
                $("#clienteLocalidad").val('');
                $("#clienteCalle").val('');
                $("#clienteAltura").val('');
                $("#clienteTelefono").val('');
            }
        });
    });

    /************************AJAX PROFORMA**********************************/
    $("#crearProformaFormulario").submit(function (event){
        event.preventDefault();

        var post_url = $(this).attr("action");
        var form_datos = $(this).serialize();

        $.post( post_url, form_datos, function(datos) {
            var jsonErrorRegistro = jQuery.parseJSON(datos);
            $("#errorClienteCuit").html("");
            $("#errorCamposVacios").html("");
            $("#crearProformaExito").html("");

            var registroExitoso = true;
            if(jsonErrorRegistro.clienteCuitExistente == false){
                $("#errorClienteCuit").html("<span>No se encuentra registrado un cliente con ese CUIT.</span>");
                registroExitoso = false;
            }

            if(jsonErrorRegistro.camposVacios == true){
                $("#errorCamposVacios").html("<span>Debe completar todos los campos.</span>");
                registroExitoso = false;
            }

            if(registroExitoso){
                $("#crearProformaExito").html("<span>Se registro la proforma con exito</span>");
                $("#clienteRegistradoCuit").val('');
                $("#cargaTipo").val('');
                $("#cargaPeso").val('');
                $("#origenLocalidad").val('');
                $("#origenCalle").val('');
                $("#origenAltura").val('');
                $("#destinoLocalidad").val('');
                $("#destinoCalle").val('');
                $("#destinoAltura").val('');
                $("#fechaSalida").val('');
                $("#fechaLlegada").val('');
                $('td[name ="vehiculoRadios"]').val('');
                $('td[name ="acopladoRadios"]').val('');
                $('td[name ="choferRadios"]').val('');
            }
        });
    });
});
