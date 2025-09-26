@component('mail::message')
# Código de Invitación

Tu token de invitación es:

@component('mail::panel')
{{ $token }}
@endcomponent

Usa este código para verificar tu cuenta de usuario.
@component('mail::button', ['url' => $url])
Verificar mi cuenta
@endcomponent

Gracias,<br>
Resolvio Team
@endcomponent