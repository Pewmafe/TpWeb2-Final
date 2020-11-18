{{> header}}
<main>
    <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/public/img/slider1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="bg-dark d-inline-block">Los mejores camiones</h5> <br>
                        <p class="bg-dark d-inline-block">Nuestros camiones son los mejores</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/public/img/slider2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="bg-dark d-inline-block">Los mejores camiones</h5> <br>
                        <p class="bg-dark d-inline-block">Nuestros camiones son los mejores</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/public/img/slider3.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="bg-dark d-inline-block">Los mejores camiones</h5> <br>
                        <p class="bg-dark d-inline-block">Nuestros camiones son los mejores</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section class="row justify-content-center m-3 ancho">
        <article class="col-12 col-md-6 justify-content-center  mt-2">
            <h3 class="text-dark text-center">Registrando a un nuevo Conductardo</h3>

            <div class="container">
                <form class="form-horizontal" role="form" action="/registro/registroUsuario" method="post" enctype="multipart/form-data">
                    <div class="intDatos">
                        <h2>Introduzca sus datos.</h2>
                    </div>

                    <div class="form-group">
                        {{#nombreUsuarioExistente}}
                        <h5 class="text-danger">Nombre de usuario ya existente</h5>
                        {{/nombreUsuarioExistente}}
                        <label for="NombreUsuario" class="col-12 control-label">*Nombre de usuario</label>
                        <div class="col-12">
                            <input type="text" id="NombreUsuario" name="NombreUsuario" placeholder="Nombre de Usuario" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contrasenia" class="col-12 control-label">*Contraseña</label>
                        <div class="col-12">
                            <input type="password" id="contrasenia" name="contrasenia" placeholder="Contraseña" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group p-3">
                        <div class="col-sm-9 col-sm-offset-3">
                            <span class="help-block alert alert-info">*Campos requeridos</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                </form>
            </div>


        </article>

    </section>
</main>
{{> footer}}