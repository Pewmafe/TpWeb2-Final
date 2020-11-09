{{> header}}
<main>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            <h3 class="text-dark">Iniciar Sesion</h3>
            <form action="#" class="login" name="form" id="form">
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
                    <input type="password" id="Contraseña" name="Contraseña" placeholder="Contraseña" class="form-control mb-4">
                </div>
                <div>
                    <input type="submit" class="btn btn-outline-primary btn-lg" name="" value="Iniciar sesion" href="#">
                    <a href="/registro">Registrarse</a>
                </div>
            </form>

        </article>

    </section>
</main>
{{> footer}}
