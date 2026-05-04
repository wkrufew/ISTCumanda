<x-mail::message>

<x-slot:header>
        <x-mail::header :url="config('app.url')">
            {{ config('app.name') }}
        </x-mail::header>
</x-slot:header>

# Solicitud de Información

Hola,

Has recibido una nueva solicitud de información a través del formulario de contacto de tu sitio web.

## Datos del Usuario

<x-mail::panel>
    <b>Nombre: </b>{{ $data['name'] }} <br>
    <b>Correo: </b>{{ $data['email'] }}<br>
    <b>Teléfono: </b>{{ $data['phone'] }} <br>
    <b>Cédula: </b>{{ $data['document'] }} <br>
    <b>Tecnologéa: </b>{{ $data['tecnologia'] }} <br>
    <b>Mensaje: </b>{{ $data['description'] }} <br>
</x-mail::panel>

Atentamente,<br>
{{ config('app.name') }}

</x-mail::message>
