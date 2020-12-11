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
                        <h5 class="bg-dark d-inline-block">La mejor calidad</h5> <br>
                        <p class="bg-dark d-inline-block">Las marcas mas caras de camiones y acoplados</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/public/img/slider3.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="bg-dark d-inline-block">Seguridad ante todo</h5> <br>
                        <p class="bg-dark d-inline-block">Contamos con todas las medidas de seguridad que existen</p>
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
        <h5 class="text-success text-center">Se registro con exito.</h5>
    {{/registroExitoso}}
    {{#agregoVehExitosamente}}
        <h5 class="text-success text-center">Se agregó el vehículo exitosamente.</h5>
    {{/agregoVehExitosamente}}
    {{#agregoAcopladoExitosamente}}
        <h5 class="text-success text-center">Se agregó el acoplado exitosamente.</h5>
    {{/agregoAcopladoExitosamente}}
    <div class="text-center p-4">
        <h2 class="text-center d-inline-block border-bottom text-center">Bienvenido a Camionardo</h2>
    </div>
    <section class="row justify-content-center m-3 ancho ">
        <article class="col-12 col-md-6 border-right borde-login">

            <h3> EL NEGOCIO</h3>
            <p class="p-1">Camionardo nace como una empresa de Servicios Logísticos Integrales para Campañas Promocionales dirigidas al Consumo Masivo, con una filosofía de negocio que se adapta a los nuevos entornos económicos y empresariales. Nuestra especialidad es efectuar la colocación de sus productos y materiales promocionales en los diferentes puntos de venta, un servicio con una demanda al alza que ofrecemos apostando por la calidad, la profesionalidad y los precios ajustados.</P>

            <h3>NUESTRA EXPERIENCIA</h3>
            <p class="p-1">Este proyecto surge a partir de la experiencia de más de 10 años acumulada por sus fundadores en el sector de Servicios de Tercerización Logística. Ambos somos profesionales de esta actividad y deseamos emprender una nueva etapa profesional con nuestra empresa. Nuestra estrategia se basa en ofrecer servicios de movimientos de carga en la forma más eficiente.</P>

                <h3>GESTIÓN DEL TIEMPO</h3>
            <p class="p-1">La administración del tiempo, es nuestra principal propuesta como empresa de Servicios de Logística y por sobre todo tener la flexibilidad necesaria para poder elegir el modo de transporte e implementación más eficaz para cada tarea.

                <h3>RECURSOS HUMANOS</h3>
            <p class="p-1">Contamos con una plantilla de personal calificado para efectuar la colocación de productos y material promocional y una flota de vehículos eficaz y diversificada que nos permitirá ofrecer al cliente la mejor solución para sus envíos en función del tipo de mercancía, la zona de entrega, el tráfico, la urgencia, etc.</P>

                <h3>ALIANZAS ESTRATÉGICAS</h3>
            <p class="p-1">Esto será posible mediante un modelo de negocio que combina los recursos propios con la colaboración de transportistas autónomos y acuerdos con empresas nacionales. Este sistema nos permitirá centrarnos en nuestro nicho de mercado (la prestación de servicios de Soluciones Logísticas Integrales para Campañas Promocionales dirigidas al Consumo Masivo) al tiempo que ofrecemos un servicio integral que satisface todas las necesidades del cliente.</P>

        </article>
        <article class="col-12 col-md-6 justify-content-center">
            <div class="referencia">
                <img src="/public/img/camion.jfif" alt="Camion" srcset="" class="img-fluid" style="width: 100%">
            </div>
            <div style="margin: 1%" id="map"></div>
        </article>
    </section>
    <br>
</main>
{{> footer}}