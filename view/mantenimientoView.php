{{> header}}
{{#usuarioMecanico}}
<main>
    <section>
        <h1>Mantenimiento</h1>
    </section>
</main>
{{/usuarioMecanico}}
{{^usuarioMecanico}}
    {{> error404}}
{{/usuarioMecanico}}
{{> footer}}
