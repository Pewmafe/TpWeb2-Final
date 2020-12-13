{{> header}}
{{#usuarioMecanico}}
<main>
    <h1 class="text-dark text-center">Mantenimiento</h1>
    <section>
    </section>
</main>
{{/usuarioMecanico}}
{{^usuarioMecanico}}
    {{> error404}}
{{/usuarioMecanico}}
{{> footer}}
