<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar tus ajustes para el intercambio de recursos
    | entre orígenes cruzados o "CORS". Esto determina qué operaciones
    | de orígenes cruzados pueden ejecutarse en los navegadores web.
    |
    | Para aprender más: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'almacen', 'sanctum/csrf-cookie'], // Agrega 'almacen' a las rutas permitidas

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'], // Esto permite cualquier origen. Cámbialo si quieres restringir el acceso.

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Permite cualquier encabezado

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // Cambiar a 'true' si necesitas enviar cookies o encabezados de autenticación

];
