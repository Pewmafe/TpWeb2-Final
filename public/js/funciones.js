$(document).on("click", ".botonDarDeBajaUsuario", function () {
    var primaryKey = $(this).data('id');
    $(".modal-footer #botonDarDeBajaUsuarioModal").val( primaryKey );
});

$(document).on("click", ".botonDarDeBajaEmpleado", function () {
    var primaryKey = $(this).data('id');
    $(".modal-footer #botonDarDeBajaEmpleadoModal").val( primaryKey );
});

$(document).on("click", ".botonDarDeBajaCamion", function () {
    var primaryKey = $(this).data('id');
    $(".modal-footer #botonDarDeBajaCamionModal").val( primaryKey );
});

$(document).on("click", ".botonDarDeBajaAcoplado", function () {
    var primaryKey = $(this).data('id');
    $(".modal-footer #botonDarDeBajaAcopladoModal").val( primaryKey );
});

$(document).on("click", ".botonModificarUsuario", function () {
    var dni = $(this).data('dni');
    var nombreUsuario = $(this).data('nombreusuario');
    var nombre = $(this).data('nombre');
    var apellido = $(this).data('apellido');
    var fechanaci = $(this).data('fechanaci');
    $(".formularioModificarUsuario .inputNombreUsuario").val( nombreUsuario );
    $(".formularioModificarUsuario .inputNombre").val( nombre );
    $(".formularioModificarUsuario .inputApellido").val( apellido );
    $(".formularioModificarUsuario .inputDni").val( dni );
    $(".formularioModificarUsuario .inputFechaNacimiento").val( fechanaci );
});
