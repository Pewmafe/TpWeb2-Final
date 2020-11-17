$(document).on("click", ".botonDarDeBajaUsuario", function () {
    var primaryKey = $(this).data('id');
    $(".modal-footer #botonDarDeBajaUsuarioModal").val( primaryKey );
});

$(document).on("click", ".botonDarDeBajaEmpleado", function () {
    var primaryKey = $(this).data('id');
    $(".modal-footer #botonDarDeBajaEmpleadoModal").val( primaryKey );
});
