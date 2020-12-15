{{>header}}
{{#usuarioChofer}}
    <main>
        <section class="container justify-content-center m-3 ancho">
            <h3 class="mt-2">Bienvenido a la seccion de reportes {{nombreChofer}} {{apellidoChofer}}</h3>

            <article>
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
                        <label for="posicion">Cargar posicion actual</label>
                        <button type="button" class="col-12 btn btn-outline-primary" onclick="getLocation()">Cargar Posicion</button>
                    </div>
                    <div class="col-12 col-md-6 form-group" id="latitudDiv">


                    </div>
                    <div class="col-12 col-md-6 form-group" id="longitudDiv">


                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <button type="submit" class=" btn btn-outline-success form-control">Relizar reporte </button>
                    </div>
                    <div>
                        <input type="hidden" name="idProforma" value="{{id_proforma}}">
                    </div>
                </form>
                <p id="resultado" class="text-danger"></p>
                <script>
                    var latitudDiv = document.getElementById("latitudDiv");
                    var longitudDiv = document.getElementById("longitudDiv");
                    var x = document.getElementById("resultado");

                    function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition, showError);
                        } else {
                            latitudDiv.innerHTML = "La Geolocalizacion no esta soportada en este browser.";
                        }
                    }


                    function showPosition(position) {
                        latitudDiv.innerHTML = ' <label for="latitud_actual">Latitud</label><input readonly class="form-control col-12" type="text" id="latitud_actual" name="latitud_actual" value="' +
                            position.coords.latitude + '">';
                        longitudDiv.innerHTML = '<label for="longitud_actual">Longitud</label><input readonly class="form-control col-12" type="text" id="longitud_actual" name="longitud_actual" value="' +
                            position.coords.longitude + '">';
                        loadMap(position.coords.latitude, position.coords.longitude);
                        document.getElementById("latitud").value(position.coords.latitude);
                        document.getElementById("longitud").value(position.coords.longitude);
                    }

                    function showError(error) {
                        switch (error.code) {
                            case error.PERMISSION_DENIED:
                                x.innerHTML = "El Usuario a denegado el acceso a la Geolocalizacion."
                                break;
                            case error.POSITION_UNAVAILABLE:
                                x.innerHTML = "La Informacion no esta disponible."
                                break;
                            case error.TIMEOUT:
                                x.innerHTML = "Time Out."
                                break;
                            case error.UNKNOWN_ERROR:
                                x.innerHTML = "Error desconocido."
                                break;
                        }
                    }
                </script>
            </article>
            <article class="row">
                <div class="col-6">
                    <a class="col-12 btn btn-outline-secondary btn-block p-1 my-1" href="/pdfProforma?idChofer={{idChofer}}&proformaID={{id_proforma}}">Ver Pdf De Proforma</a>
                </div>
            </article>
        </section>
    </main>
{{/usuarioChofer}}
{{^usuarioChofer}}
    {{> error404}}
{{/usuarioChofer}}
{{>footer}}