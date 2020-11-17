{{> header}}
{{#usuarioAdmin}}
<main>
    <section class="row justify-content-center m-3 ancho">
        <article class=" justify-content-center mt-4 ancho2">
            <h2 class="text-dark mb-3 text-center">Administrar todos los usuarios</h2>
            <p>{{registroEmpleadoExitoso}}</p>
            <h3 class="text-dark mb-3">Administrar usuarios</h3>
            <div class="row">
                {{#tablaUsuarios}}
                    <div class="col-12 col-md-6 col-lg-4 p-2">
                        <div class="card mb-4 p-3 bg-dark">
                            <h3 class="text-center border-bottom border-secondary text-light">Descripcion</h3>
                            <p class="text-light">
                                <span class="h5 font-weight-bold">Nombre de Usuario</span>: {{nombreUsuario}}
                            </p>
                            <a href="registroEmpleado" class="btn btn-primary">Hacerlo empleado</a>
                            <form class="text-center" method="post" action="administrarUsuarios/darDeBajaUsuario">
                                <button type="submit" name="botonDarDeBajaUsuario" class="btn btn-danger mt-2" value="{{id}}" >Dar de baja usuario</button>
                            </form>
                        </div>
                    </div>
                {{/tablaUsuarios}}
            </div>
            <h3 class="text-dark mb-3">Administrar empleados</h3>
            <div class="row">
                {{#tablaUsuariosEmpleados}}
                <div class="col-12 col-md-6 col-lg-4 p-2">
                    <div class="card mb-4 p-3 bg-dark">
                        <h3 class="text-center border-bottom border-secondary text-light">Descripcion</h3>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Nombre </span>: {{nombre}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Apellido </span>: {{apellido}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Nombre de usuario </span>: {{nombreUsuario}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">DNI </span>: {{dni}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Tipo de licencia </span>: {{tipo_de_licencia}}
                        </p>
                        <p class="text-light">
                            <span class="h5 font-weight-bold">Rol </span>: {{descripcion}}
                        </p>
                        <form class="text-center" method="post" action="administrarUsuarios/darDeBajaEmpleado">
                            <button type="submit" name="botonDarDeBajaEmpleado" class="btn btn-danger mt-2" value="{{dni}}" >Dar de baja empleado</button>
                        </form>
                    </div>
                </div>
                {{/tablaUsuariosEmpleados}}
            </div>
        </article>

    </section>
</main>
{{/usuarioAdmin}}
{{^usuarioAdmin}}
<main class="text-center">
    <h1>ERROR 404 PAGINA NO ENCONTRADA</h1>
    <a class="btn btn-outline-danger" href="/home">Volver al Inicio</a>
</main>
{{/usuarioAdmin}}
{{> footer}}
