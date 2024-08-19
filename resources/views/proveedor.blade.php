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
                <form id="add-provider-form" class="form-container" method="POST">
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

                <!-- Mensaje de éxito -->
                <div id="success-message" class="alert alert-success mt-3" style="display: none;">
                    Proveedor agregado exitosamente.
                </div>

                <!-- Mensaje de error -->
                <div id="error-message" class="alert alert-danger mt-3" style="display: none;">
                    Hubo un error al agregar el proveedor.
                </div>
                
            </div>
        </section>
    </div>

    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#add-provider-form').on('submit', function (e) {
                e.preventDefault(); // Previene la acción por defecto del formulario

                $.ajax({
                    type: 'POST',
                    url: "{{ route('proveedores.store') }}",
                    data: $(this).serialize(),
                    success: function (response) {
                        $('#success-message').show(); // Muestra el mensaje de éxito
                        $('#error-message').hide(); // Esconde el mensaje de error
                        $('#add-provider-form')[0].reset(); // Resetea el formulario
                    },
                    error: function (response) {
                        $('#error-message').show(); // Muestra el mensaje de error
                        $('#success-message').hide(); // Esconde el mensaje de éxito
                    }
                });
            });
        });
    </script>
</body>
</html>
