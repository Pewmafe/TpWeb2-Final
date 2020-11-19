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
