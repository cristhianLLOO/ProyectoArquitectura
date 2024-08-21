@extends('base_user')

@section('titulo')
    <title>Ver Producto</title>
@endsection

@section('estilo')
    <style>
        .producto-detalle {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
            border: 4px solid #2C52A5;
            margin: 20px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .img-container {
            flex: 1;
            text-align: center;
            animation: slideInLeft 1s ease-in-out;
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .center-image {
            max-width: 300px;
            max-height: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .center-image:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .texto-detalle {
            flex: 1;
            padding-left: 20px;
            animation: slideInRight 1s ease-in-out;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .btn.btn-primary {
            transition: all 0.3s ease;
            background-color: #2C52A5;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
        }

        .btn.btn-primary:hover {
            background-color: #1B3871;
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(44, 82, 165, 0.4);
        }
    </style>
@endsection

@section('principal')
    <div class="producto-detalle">
        <div class="img-container">
            <img src="{{ asset($producto->path_imagen) }}" alt="{{ $producto->nombre }}" class="center-image">
        </div>
        <div class="texto-detalle">
            <h2>{{ $producto->nombre }}</h2>
            <p>Precio: ${{ number_format($producto->precio) }}</p>
            <p>Especificaciones:</p>
            <ul>
                <li>Stock: {{ $producto->stock }}</li>
                <li>Categoría: {{ $producto->categoria }}</li>
                <li>Descripción: {{ $producto->descripcion }}</li>
            </ul>
            <form method="POST" action="{{ route('agregarAlCarrito') }}">
                @csrf
                <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" value="1" min="1" max="{{ $producto->stock }}">
                <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
            </form>
        </div>
    </div>
@endsection
