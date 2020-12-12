{{>header}}
{{#usuarioChofer}}
    <main>
        {{#usuarioSupervisor}}
            {{>ViajesAdmin}}
        {{/usuarioSupervisor}}
        {{^usuarioSupervisor}}
            {{>ViajesChofer}}
        {{/usuarioSupervisor}}
    </main>
{{/usuarioChofer}}
{{^usuarioChofer}}
    {{> error404}}
{{/usuarioChofer}}
{{>footer}}