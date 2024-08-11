<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('Almacen.css') }}">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Proveedores</h1>
        </header>
        
        <section class="settings">
            <div id="general" class="tab-content active">
            <form id="add-provider-form" action="{{ route('proveedores.store') }}" method="POST">     
    @csrf
    <div class="form-group">
        <label for="first-name">Nombre del proveedor</label>
        <input type="text" id="first-name" name="first_name">
    </div>
    <div class="form-group">
        <label for="last-name">Compañía</label>
        <input type="text" id="last-name" name="last_name">
    </div>
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="entrega">Fecha de entrega</label>
        <input type="text" id="entrega" name="entrega">
    </div>
    <div class="form-group">
        <label for="product">Nombre del producto</label>
        <input type="text" id="product" name="product">
    </div>
    <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="text" id="cantidad" name="cantidad">
    </div>
    <div class="form-group">
        <button type="submit" class="add-button">Entregar</button>
    </div>
</form>

                <div id="message" class="message"></div>
            </div>
        </section>
    </div>
    <script src="{{ asset('almacen.js') }}"></script>
</body>
</html>
