<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        /* Estilos generales del botón */
        .btn-create {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #115DFC; /* Color de fondo */
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Efecto hover */
        .btn-create:hover {
            background-color: #0e4bb3; /* Color de fondo en hover */
            transform: scale(1.05); /* Efecto de escala */
        }

        /* Efecto focus */
        .btn-create:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);
        }

        /* Estilos de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        /* Estilos de contenedor */
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Productos</h1>
        <!-- Botón para agregar un nuevo producto -->
        <a href="{{ route('productos.create') }}" class="btn btn-create">Agregar Nuevo Producto</a>
        <br><br>

        @if($productos->isEmpty())
            <p>No hay productos disponibles.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td><img src="{{ asset('storage/' . $producto->path_imagen) }}" alt="{{ $producto->nombre }}" width="100"></td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>${{ $producto->precio }}</td>
                            <td>{{ $producto->categoria }}</td>
                            <td>{{ $producto->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
