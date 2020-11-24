$(document).on("click", ".botonDarDeBajaUsuario", function () {
    var primaryKey = $(this).data('id');
    $(".modal-footer #botonDarDeBajaUsuarioModal").val(primaryKey);
});

$(document).on("click", ".botonDarDeBajaEmpleado", function () {
    var primaryKey = $(this).data('id');
    $(".modal-footer #botonDarDeBajaEmpleadoModal").val(primaryKey);
});

$(document).on("click", ".botonDarDeBajaCamion", function () {
    var primaryKey = $(this).data('id');
    $(".modal-footer #botonDarDeBajaCamionModal").val(primaryKey);
});

$(document).on("click", ".botonDarDeBajaAcoplado", function () {
    var primaryKey = $(this).data('id');
    $(".modal-footer #botonDarDeBajaAcopladoModal").val(primaryKey);
});

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

$(document).ready(function () {
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
});

