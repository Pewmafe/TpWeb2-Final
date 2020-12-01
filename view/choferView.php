{{>header}}
<main>
    {{#usuarioChofer}}
    <section>
        <h1 class="text-center p-2">Bienvenido Chofer</h1>
        <h2 class="text-center ">{{nombreUsuario}}</h2>
    </section>
    <section class="p-3">
        <h4>Tus viajes</h4>
        <article>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link c-pointer" id="Activos">Activos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-pointer" id="Pendientes">Pendientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-pointer" id="Finalizados">Finalizados</a>
                </li>
            </ul>
        </article>
        <article class="popup1">
            <div>
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Estado</th>
                        <th scope="col">Desde</th>
                        <th scope="col">Hacia</th>
                        <th scope="col">Duracion Aproximada</th>
                        <th scope="col"></th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="text-success">Activo</th>
                        <td class="p-auto">Buenos Aires</td>
                        <td>Mendoza</td>
                        <td>12 horas</td>
                        <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6">Ver mas</a></td>

                    </tr>

                    </tbody>
                </table>
            </div>
        </article>
        <article class="chofer-hidden popup2">
            <div>
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Estado</th>
                        <th scope="col">Desde</th>
                        <th scope="col">Hacia</th>
                        <th scope="col">Duracion Aproximada</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="text-secondary">Pendiente</th>
                        <td>Buenos Aires</td>
                        <td>Mendoza</td>
                        <td>12 horas</td>
                        <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6">Ver mas</a></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-secondary">Pendiente</th>
                        <td>Buenos Aires</td>
                        <td>Mendoza</td>
                        <td>12 horas</td>
                        <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6">Ver mas</a></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-secondary">Pendiente</th>
                        <td>Buenos Aires</td>
                        <td>Mendoza</td>
                        <td>12 horas</td>
                        <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6">Ver mas</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </article>
        <article class="chofer-hidden popup3">
            <div>
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Estado</th>
                        <th scope="col">Desde</th>
                        <th scope="col">Hacia</th>
                        <th scope="col">Duracion Aproximada</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="text-danger">Finalizado</th>
                        <td>Buenos Aires</td>
                        <td>Mendoza</td>
                        <td>12 horas</td>
                        <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6">Ver mas</a></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-danger">Finalizado</th>
                        <td>Buenos Aires</td>
                        <td>Mendoza</td>
                        <td>12 horas</td>
                        <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6">Ver mas</a></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-danger">Finalizado</th>
                        <td>Buenos Aires</td>
                        <td>Mendoza</td>
                        <td>12 horas</td>
                        <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6">Ver mas</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </article>
        <article class="">
            <div>
                <div class="row">
                    {{#tablaProforma}}
                    <div class="col-12 col-md-6 col-lg-4 p-2">
                        <div class="card mb-4 p-3 bg-dark">
                            <h3 class="text-center border-bottom border-secondary text-light">Proforma</h3>
                            <p class="text-light">
                                <span class="h5 font-weight-bold">Nro proforma </span>: {{id}}
                            </p>
                            <p class="text-light">
                                <span class="h5 font-weight-bold">Cliente nombre </span>: {{nombre}}
                            </p>
                            <p class="text-light">
                                <span class="h5 font-weight-bold">Cliente apellido </span>: {{apellido}}
                            </p>
                            <p class="text-light">
                                <span class="h5 font-weight-bold">Calendario service </span>:
                            </p>
                            <p class="text-light">
                                <span class="h5 font-weight-bold">Origen </span>:
                            </p>
                            <p class="text-light">
                                <span class="h5 font-weight-bold">Destino </span>:
                            </p>
                            <img src="{{dirQR}}">
                        </div>
                    </div>
                    {{/tablaProforma}}
                </div>
            </div>
        </article>
    </section>
    {{/usuarioChofer}} {{^usuarioChofer}}
    <div class="text-center">
        <h1>ERROR 404 PAGINA NO ENCONTRADA</h1>
        <a class="btn btn-outline-danger" href="/home">Volver al Inicio</a>
    </div>
    {{/usuarioChofer}}

</main>
{{>footer}}