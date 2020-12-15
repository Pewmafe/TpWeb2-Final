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
            <article>
                <h3>Presione el boton para obtener las coordenadas a traves del navegador</h3>

                <button class="btn btn-warning" onclick="getLocation()">Obtener</button>

                <p id="resultado"></p>
                <script>
                    var x = document.getElementById("resultado");

                    function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition, showError);
                        } else {
                            x.innerHTML = "La Geolocalizacion no esta soportada en este browser.";
                        }
                    }

                    function showPosition(position) {
                        x.innerHTML = "Latitud: " + position.coords.latitude +
                            "<br>Longitud: " + position.coords.longitude;
                        loadMap(position.coords.latitude, position.coords.longitude);
                    }

                    function showError(error) {
                        switch(error.code) {
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
        </section>
    </main>
{{/usuarioChofer}}
{{^usuarioChofer}}
    {{> error404}}
{{/usuarioChofer}}
{{>footer}}