{{> header}}
<main>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            <h3 class="text-dark mb-3">Iniciar Sesion</h3>
            <form action="/login/login" class="login" name="form" id="form" method="post">
                <p class="text-danger"> {{loginError}}</p>
                <div class="form-group justify-content-center input-group">
                    <div class="input-group-append">
                        <span class="input-group-text icono-login"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" class="form-control mb-4">
                </div>
                <div class="form-group justify-content-center input-group">
                    <div class="input-group-append">
                        <span class="input-group-text icono-login"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" id="Contrasenia" name="Contrasenia" placeholder="Contraseña" class="form-control mb-4">
                </div>
                <div class="ancho text-center">
                    <input type="submit" class="btn btn-outline-primary btn-lg" name="" value="Iniciar sesion" href="#">
                </div>
            </form>
            <div class="p-4 text-center">¿Todavia no tienes una cuenta?<a href="/registro"> Create una aqu&iacute;</a></div>

        </article>

    </section>
</main>
{{> footer}}