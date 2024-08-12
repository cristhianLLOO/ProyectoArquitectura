<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proveedor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('Almacen.css') }}">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Crear Proveedor</h1>
        </header>
        
        <section class="settings">
            <div id="general" class="tab-content active">
                <form id="add-provider-form" class="form-container" method="POST" action="{{ route('proveedores.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="first-name">Nombre del proveedor</label>
                        <input type="text" id="first-name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="company">Compañía</label>
                        <input type="text" id="company" name="company" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="delivery_date">Fecha de entrega</label>
                        <input type="date" id="delivery_date" name="delivery_date" required>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Nombre del producto</label>
                        <input type="text" id="product_name" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Cantidad</label>
                        <input type="number" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="add-button">Entregar</button>
                    </div>
                </form>
                <div id="message" class="message"></div>
                <script src="{{ asset('proveedores.js') }}"></script>
            </div>
        </section>
    </div>

</body>
</html>


