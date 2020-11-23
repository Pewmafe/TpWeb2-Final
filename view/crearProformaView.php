{{> header}}
{{#usuarioSupervisor}}
<main>
    <section>
      <h1>Nueva Proforma</h1>
    </section>
</main>
{{/usuarioSupervisor}}
{{^usuarioSupervisor}}
<main class="text-center">
    <h1>ERROR 404 PAGINA NO ENCONTRADA</h1>
    <a class="btn btn-outline-danger" href="/home">Volver al Inicio</a>
</main>
{{/usuarioSupervisor}}
{{> footer}}
