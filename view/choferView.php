{{>header}}
{{#usuarioChofer}}
    <main>
        {{#usuarioSupervisor}}
            <section>
                <h1 class="p-2"><i class="fas fa-user-shield"></i> {{nombreUsuario}}</h1>
            </section>
        {{/usuarioSupervisor}}
        {{^usuarioSupervisor}}
            <section>
                <h1 class="text-center p-2">Bienvenido Chofer</h1>
                <h2 class="text-center ">{{nombreUsuario}}</h2>
            </section>
        {{/usuarioSupervisor}}

        <section class="p-3">
            {{#usuarioSupervisor}}
                <h4>Viajes</h4>
            {{/usuarioSupervisor}}
            {{^usuarioSupervisor}}
                <h4>Tus viajes</h4>
            {{/usuarioSupervisor}}
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
                <div class="table-responsive">
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
                            {{#tablaDeViajesActivo}}
                                <tr>
                                    <th scope="row" class="text-success">{{estado}}</th>
                                    <td class="p-auto">{{partida}}</td>
                                    <td>{{destino}}</td>
                                    <td>{{tiempo_estimado}}</td>
                                    <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6" href="/pdfProforma?idChofer={{idChofer}}&proformaID={{id_proforma}}">Ver
                                            mas</a></td>
                                </tr>
                            {{/tablaDeViajesActivo}}
                            {{^tablaDeViajesActivo}}
                                <th scope="row" class="text-success">(vacio)</th>
                                <td class="p-auto">(vacio)</td>
                                <td>(vacio)</td>
                                <td>(vacio)</td>
                                <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6" href="/Chofer">Ver mas</a>
                                </td>
                            {{/tablaDeViajesActivo}}
                        </tbody>
                    </table>
                </div>
            </article>
            <article class="chofer-hidden popup2">
                <div class="table-responsive">
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
                            {{#tablaDeViajesPendientes}}
                                <tr>
                                    <th scope="row" class="text-secondary">{{estado}}</th>
                                    <td class="p-auto">{{partida}}</td>
                                    <td>{{destino}}</td>
                                    <td>{{tiempo_estimado}}</td>
                                    <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6" href="/pdfProforma?idChofer={{idChofer}}&proformaID={{id_proforma}}">Ver
                                            mas</a></td>
                                </tr>
                            {{/tablaDeViajesPendientes}}
                            {{^tablaDeViajesPendientes}}
                                <th scope="row" class="text-secondary">(vacio)</th>
                                <td class="p-auto">(vacio)</td>
                                <td>(vacio)</td>
                                <td>(vacio)</td>
                                <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6" href="/Chofer">Ver mas</a>
                                </td>
                            {{/tablaDeViajesPendientes}}
                        </tbody>
                    </table>
                </div>
            </article>
            <article class="chofer-hidden popup3">
                <div class="table-responsive">
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
                            {{#tablaDeViajesFinalizados}}
                                <tr>
                                    <th scope="row" class="text-danger">{{estado}}</th>
                                    <td class="p-auto">{{partida}}</td>
                                    <td>{{destino}}</td>
                                    <td>{{tiempo_estimado}}</td>
                                    <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6" href="/pdfProforma?idChofer={{idChofer}}&proformaID={{id_proforma}}">Ver
                                            mas</a></td>
                                </tr>
                            {{/tablaDeViajesFinalizados}}
                            {{^tablaDeViajesFinalizados}}
                                <th scope="row" class="text-danger">(vacio)</th>
                                <td class="p-auto">(vacio)</td>
                                <td>(vacio)</td>
                                <td>(vacio)</td>
                                <td class="text-right"><a class="btn btn-outline-secondary p-1 mt--6" href="/Chofer">Ver mas</a>
                                </td>
                            {{/tablaDeViajesFinalizados}}
                        </tbody>
                    </table>
                </div>
            </article>

        </section>
    </main>
{{/usuarioChofer}}
{{^usuarioChofer}}
    {{> error404}}
{{/usuarioChofer}}
{{>footer}}