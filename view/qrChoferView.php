{{>header}}
{{#usuarioChofer}}
    <main>
        <section class="container justify-content-center m-3 ancho">
            <h3 class="mt-2">Bienvenido a la seccion de reportes {{nombreChofer}}</h3>

            <article >
                <form class="row" action="/qrChofer/crearSeguimiento" method="POST">
                    <div class="col-12 col-md-6 form-group">
                        <label for="combustible">Combustible cargado hasta ahora</label>
                        <input type="number" class="form-control" id="combustible" name="combustible">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="kilometros">Kilometros recorridos hasta ahora</label>
                        <input type="number" class="form-control" id="kilometros" name="kilometros">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="peajes">Pejaes abonados hasta ahora</label>
                        <input type="number" class="form-control" id="peajes" name="peajes">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="combustible">Cargar posicion actual</label>
                        <button class="col-12 btn btn-outline-primary">Cargar Posicion</button>
                    </div>
                </form>
            </article>
        </section>
    </main>
{{/usuarioChofer}}
{{^usuarioChofer}}
    {{> error404}}
{{/usuarioChofer}}
{{>footer}}