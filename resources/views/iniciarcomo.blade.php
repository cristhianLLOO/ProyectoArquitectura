<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/style_incomo.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <img src="images/LOGOD&M.webp" alt="Imagen de perfil">
        <h2>Bienvenido a Nuestro Equipo</h2>
        <!-- Botones que dirigen a diferentes vistas -->
        <a href="{{ route('loginvendedor') }}" class="btn btn-primary">Vendedor</a>
        <a href="{{ route('login') }}" class="btn btn-primary">Comprador</a>
        <a href="{{ route('crearcu') }}" class="btn btn-primary">Registrarse</a>
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Crear Proveedor</a>

        
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
