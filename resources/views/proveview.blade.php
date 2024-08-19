<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proveedores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <header class="mb-4">
            <h1>Lista de Proveedores</h1>
        </header>
        
        <section>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre del Proveedor</th>
                        <th>Compañía</th>
                        <th>Correo Electrónico</th>
                        <th>Fecha de Entrega</th>
                        <th>Nombre del Producto</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->first_name }}</td>
                            <td>{{ $proveedor->company }}</td>
                            <td>{{ $proveedor->email }}</td>
                            <td>{{ $proveedor->delivery_date }}</td>
                            <td>{{ $proveedor->product_name }}</td>
                            <td>{{ $proveedor->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
