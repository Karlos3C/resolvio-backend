@component('mail::message')
# Resetear contraseña

Para resetear tu contraseña, da click en el botón de "continuar" y agrega tu nueva contraseña

@component('mail::button', ['url' => $url])
Continuar
@endcomponent

Si usted no solicitó el cambio de contraseña puede ignorar este correo. En casos de continuar con solicitudes no realizadas por usted, contactenos.

Gracias,<br>
Resolvio Team
@endcomponent