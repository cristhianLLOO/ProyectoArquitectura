<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            z-index: 1000;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            height: 40px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 25px;
            position: relative;
            white-space: nowrap;
            overflow: hidden;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar ul li .icon {
            margin-right: 20px;
            font-size: 18px;
            min-width: 30px;
            text-align: center;
        }

        .sidebar ul li:hover {
            background-color: #575757;
            cursor: pointer;
        }

        .sidebar ul ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            padding-left: 20px;
            display: none;
        }

        .sidebar ul ul li {
            padding: 10px 25px;
            background-color: #444;
        }

        .sidebar ul ul li a {
            color: #b8b8b8;
        }

        .sidebar ul li.active > ul {
            display: block;
        }

        .top-right-section {
            position: fixed;
            top: 10px;
            right: 20px;
            display: flex;
            align-items: center;
            z-index: 1100;
        }

        .top-right-section .notifications {
            position: relative;
            margin-right: 20px;
        }

        .top-right-section .notifications .icon {
            font-size: 24px;
            color: black;
            cursor: pointer;
            position: relative;
        }

        .top-right-section .notifications .badge {
            background-color: red;
            color: white;
            padding: 2px 6px;
            border-radius: 50%;
            font-size: 12px;
            position: absolute;
            bottom: -2px;
            right: 12px;
        }

        .top-right-section .dropdown {
            display: none;
            position: absolute;
            top: 40px;
            right: 0;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 2000;
            width: 250px;
            max-height: 200px;
            overflow-y: auto;
        }

        .top-right-section .dropdown ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .top-right-section .dropdown ul li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .top-right-section .dropdown ul li:hover {
            background-color: #f1f1f1;
        }

        .top-right-section .profile {
            display: flex;
            align-items: center;
            position: relative;
        }

        .top-right-section .profile img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid #3ba55d;
        }

        .top-right-section .profile::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 15px;
            height: 15px;
            background-color: #3ba55d;
            border-radius: 50%;
            border: 2px solid #333;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
            height: 100vh;
        }

        .provider-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .provider-card {
            background-color: #3b3e45;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .provider-card:hover {
            background-color: #4a4e57;
        }

        .provider-info {
            display: flex;
            flex-direction: column;
        }

        .provider-info h3 {
            margin: 0;
            font-size: 18px;
            color: #ffffff;
        }

        .provider-info .details {
            display: none;
            flex-direction: column;
            margin-top: 10px;
        }

        .provider-info .details span {
            font-size: 14px;
            color: #b9bbbe;
            margin-bottom: 5px;
        }

        .provider-info .details .highlight {
            color: #43b581;
        }

        .top-right-section .notifications:hover .dropdown {
            display: block;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .content {
                margin-left: 70px;
            }

            .sidebar ul li .icon {
                font-size: 28px;
            }

            .sidebar ul li {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="#"><i class="fas fa-home icon"></i><span>Inicio</span></a></li>
            <li>
                <a href="#"><i class="fas fa-box icon"></i><span>Productos</span><i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li><a href="#">Lista de Productos</a></li>
                    <li><a href="#">Agregar Producto</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-file-alt icon"></i><span>Reportes</span><i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('almacenview') }}">Almacen</a></li>
                    <li><a href="#">Tienda</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-user icon"></i><span>Proveedores</span><i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('proveedores.index') }}">Lista de proveedores</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fas fa-address-book icon"></i><span>Contactos</span></a></li>
            <li><a href="#"><i class="fas fa-map-marker-alt icon"></i><span>Sedes</span></a></li>
            <li><a href="#"><i class="fas fa-cogs icon"></i><span>Configuración</span></a></li>
        </ul>
    </div>

    <div class="top-right-section">
        <div class="notifications">
            <i class="fas fa-bell icon"></i>
            <span class="badge" id="notif-count">0</span>
            <div class="dropdown" id="notif-dropdown">
                <ul id="notif-list">
                    <li>No hay notificaciones</li>
                </ul>
            </div>
        </div>
        <div class="profile">
            <img src="https://via.placeholder.com/40" alt="Admin Profile" id="admin-profile">
        </div>
    </div>

    <div class="content" id="main-content">
        <h1>Bienvenido al Panel de Administrador</h1>

        <div class="provider-grid">
            <div class="provider-card" onclick="toggleDetails(this)">
                <div class="provider-info">
                    <h3>Proveedor 1</h3>
                    <div class="details">
                        <span class="highlight">Fecha de entrega: 20/08/2024</span>
                        <span>Producto: Ejemplo de Producto 1</span>
                    </div>
                </div>
            </div>

            <div class="provider-card" onclick="toggleDetails(this)">
                <div class="provider-info">
                    <h3>Proveedor 2</h3>
                    <div class="details">
                        <span class="highlight">Fecha de entrega: 21/08/2024</span>
                        <span>Producto: Ejemplo de Producto 2</span>
                    </div>
                </div>
            </div>

            <div class="provider-card" onclick="toggleDetails(this)">
                <div class="provider-info">
                    <h3>Papel y mas</h3>
                    <div class="details">
                        <span class="highlight">Telefono: 7134342334</span>
                        <span>Correo electrónico: papelmas@example.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const submenuLinks = document.querySelectorAll('.sidebar ul li > a');
            const sidebarLinks = document.querySelectorAll('.sidebar ul li ul li a');
            const profileImg = document.getElementById('admin-profile');
            const notifIcon = document.querySelector('.top-right-section .notifications .icon');
            const notifCount = document.getElementById('notif-count');
            const notifList = document.getElementById('notif-list');
            const sidebar = document.getElementById('sidebar');
            const content = document.querySelector('.content');

            submenuLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    const parentLi = this.parentNode;
                    const subMenu = parentLi.querySelector('ul');
                    if (subMenu) {
                        e.preventDefault();
                        parentLi.classList.toggle('active');
                    }
                });
            });

            sidebarLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    const url = this.getAttribute('href');

                    if (url && url !== '#') {
                        fetch(url)
                            .then(response => response.text())
                            .then(html => {
                                content.innerHTML = html;
                            })
                            .catch(error => console.error('Error al cargar el contenido:', error));
                    }
                });
            });

            profileImg.addEventListener('click', () => {
                window.location.href = "cambiar_datos.html";
            });
        });

        function toggleDetails(card) {
            const details = card.querySelector('.details');
            if (details.style.display === 'none' || details.style.display === '') {
                details.style.display = 'flex';
            } else {
                details.style.display = 'none';
            }
        }
    </script>
</body>
</html>
