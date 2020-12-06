{{>header}}
{{#usuarioChofer}}
<main>


    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            <h3 class="text-dark mb-3">Agregar combustible</h3>
            <form action="#" class="agregar" name="form" id="agregarCombustible" method="post">
                <div class="form-group col-md-6">
                    <label for="agregarCombustible">*Cantidad de combustible</label>
                    <input type="number" class="form-control" id="agregarCombustible" name="agregarCombustible">
                    <button type="submit" class="btn btn-primary btn-block">Agregar</button>
                </div>




</main>
{{/usuarioChofer}}
{{^usuarioChofer}}
    {{> error404}}
{{/usuarioChofer}}
{{>footer}}
