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
    {{#registroExitoso}}
    <h3 class="text-success text-center">Se registro con exito.</h3>
    {{/registroExitoso}}
    <div class="text-center p-4">
        <h2 class="text-center d-inline-block border-bottom text-center">Bienvenido a Camionardo</h2>
    </div>
    <section class="row justify-content-center m-3 ancho ">
        <article class="col-12 col-md-6 border-right borde-login">
            
            <p class="p-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis repellat perferendis
                nesciunt laudantium non, at quisquam suscipit natus obcaecati autem necessitatibus ut a. Aliquid
                fugit animi hic voluptatum reprehenderit amet!</p>
            <p class="p-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis repellat perferendis
                nesciunt laudantium non, at quisquam suscipit natus obcaecati autem necessitatibus ut a. Aliquid
                fugit animi hic voluptatum reprehenderit amet!</p>
            <p class="p-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis repellat perferendis
                nesciunt laudantium non, at quisquam suscipit natus obcaecati autem necessitatibus ut a. Aliquid
                fugit animi hic voluptatum reprehenderit amet!</p>

        </article>
        <article class="col-12 col-md-6 justify-content-center">
            <div class="referencia">
                <img src="/public/img/camion.jfif" alt="Camion" srcset="" class="img-fluid" style="width: 100%">
            </div>
        </article>
    </section>

</main>
{{> footer}}