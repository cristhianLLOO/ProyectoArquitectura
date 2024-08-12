<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pagina de almacen</title>
    <!-- Usar la función asset() de Laravel para vincular el archivo CSS -->
    <link rel="stylesheet" href="{{ asset('Reprote.css') }}">
</head>
<body>
    <div class="container">
        <h1>Reporte de almacén</h1>
        <div class="form-container">
            <h2>Productos</h2>
            <form id="product-form" action="{{ route('almacen.store') }}" method="POST">
                @csrf <!-- Agrega el token CSRF aquí -->
                <input type="hidden" id="product-id">
                <div class="input-container">
                    <input type="text" id="name" name="name" class="input" placeholder="Nombre del producto">
                </div>
                <div class="input-container">
                    <input type="text" id="description" name="description" class="input" placeholder="Descripción del producto">
                </div>
                <div class="input-container">
                    <input type="number" id="quantity" name="quantity" class="input" placeholder="Cantidad">
                </div>
                <button type="submit">Añadir</button>
            </form>
        </div>
        
        <div class="report-container">            
            <div class="group-container">
                <div class="group">
                    <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                    <input placeholder="Buscar" type="search" class="input search-input" id="search">
                </div>
                <button class="button" id="download-report" type="button">
                    <span class="button__text">Descargar</span>
                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                </button>
            </div>
            <table id="report-table">
                <thead>
                    <tr>
                        <th class="text_th">ID</th>
                        <th class="text_th">Nombre</th>
                        <th class="text_th">Descripción</th>
                        <th class="text_th">Cantidad</th>
                        <th class="text_th">Fecha y hora</th>
                        <th class="text_th">Estado</th>
                        <th class="text_th"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <!-- Usar la función asset() de Laravel para vincular el archivo JS -->
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>