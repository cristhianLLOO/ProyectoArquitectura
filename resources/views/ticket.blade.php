@extends('base_user')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/style_pago.css') }}">
@endsection

@section('titulo')
<title>Ticket de Pago</title>
@endsection

@section('principal')
<div class="box">
    <div class="ticket">
        <img src="{{ $logo }}" alt="Logo de la Empresa" style="width: 100px; height: auto;">
        <h2>{{ $empresa }}</h2>
        <h3>¡Pago Realizado!</h3>
        <p>Método de Pago: {{ $metodoPago }}</p>
        <p>Monto Total: ${{ number_format($monto, 2) }}</p>
        <p>Fecha: {{ $fechaPago }}</p>
        
        <h4>Productos Comprados:</h4>
        <ul>
            @if(count($productos) > 0)
                @foreach ($productos as $producto)
                    <li>{{ $producto['nombre'] }} - ${{ number_format($producto['precio'], 2) }} x {{ $producto['cantidad'] }} = ${{ number_format($producto['subtotal'], 2) }}</li>
                @endforeach
            @else
                <li>No hay productos disponibles.</li>
            @endif
        </ul>

        <div class="codigo-barras">
            <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $codigoBarras }}&code=Code128&translate-esc=on" alt="Código de Barras">
        </div>
    </div>
</div>
@endsection
