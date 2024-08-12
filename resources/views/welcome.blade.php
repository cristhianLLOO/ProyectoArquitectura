<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-logo">Logo</a>
            <div class="navbar-right">
                <ul class="navbar-menu">
                    <li><a href="#home">Proveedores</a></li>
                    <li><a href="#about">Empleados</a></li>
                    <li><a href="#services">Reportes</a></li>
                </ul>
                <div class="navbar-admin">
                    <img src="admin-photo.jpg" alt="Admin Photo" class="admin-photo">
                    
                    <!-- Botón de Notificaciones -->
                    <div class="notification-dropdown">
                        <button class="notification-button" id="notification-button">
                            <img src="images/campana.png" alt="Notificaciones" width="24" height="24">
                            <span class="notification-count">3</span>
                        </button>
                        <div class="notifications" id="notifications-container">
                            <!-- Ejemplo de notificaciones -->
                            <div class="notification-item">
                                <p><strong>Nuevo producto añadido:</strong> Producto X ha sido añadido.</p>
                                <small>Hace 2 minutos</small>
                            </div>
                            <div class="notification-item">
                                <p><strong>Producto actualizado:</strong> Producto Y ha sido actualizado.</p>
                                <small>Hace 10 minutos</small>
                            </div>
                            <div class="notification-item">
                                <p><strong>Producto eliminado:</strong> Producto Z ha sido eliminado.</p>
                                <small>Hace 30 minutos</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        <!-- Aquí va el contenido de la página -->
    </div>

    <script>
        // JavaScript para mostrar/ocultar el dropdown de notificaciones
        document.getElementById('notification-button').addEventListener('click', function() {
            var notificationsContainer = document.getElementById('notifications-container');
            notificationsContainer.classList.toggle('show');
        });
    </script>

</body>
</html>
