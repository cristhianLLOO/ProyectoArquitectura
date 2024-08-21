@extends('base_user')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/style_carrito.css') }}">
@endsection

@section('titulo')
<title>Carrito</title>
@endsection

@section('principal')
<div class="box">
    <div class="opciones">
        <div class="part1">
            <div class="envInter">
                <p>Envio internacional</p>
            </div>
            <h1 class="carrito__title">Carrito de compras</h1>
        </div>
        <div class="seguir">
            <a href="{{ route('index') }}">Seguir comprando ></a>
        </div>
    </div>
    <div class="carrito">
        <div>
            @foreach ($productos as $key => $product)
                <div class="productos">
                    <img src="{{ asset($product->path_imagen) }}" alt="" class="productos__img">
                    <div class="desc">
                        <div class="articulo">
                            <h3 class="desc__title">{{ $product->nombre }}</h3>
                            <p class="desc__text">${{ number_format($product->precio) }}</p>
                        </div>
                        <div class="desc__opc">
                            <input type="number" name="cantidad[{{ $key }}]" value="{{ $carrito[$key]->cantidad }}">
                            <a href="{{ route('dropShop', ['id' => $product->id_producto]) }}">
                                <img src="{{ asset('images/trash-svgrepo-com.svg') }}" alt="" class="desc__img">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="total">
            <h2 class="total__title">Resumen del pedido</h2>
            <p>Subtotal</p>
            <p class="total__text">${{ number_format($total) }}</p>
            <p>Impuesto %16</p>
            <p class="total__text">${{ number_format($total * 0.16) }}</p>
            <p>Total</p>
            <p class="total__text">${{ number_format(($total * 0.16) + $total) }}</p>

            <div class="total__b">
                <a href="{{ route('pago') }}">
                    <button class="total__btn">
                        Pagar Ahora
                    </button>
                </a>
                <br>
                
                <br>
                <a href="{{ route('profile') }}">
                    <button class="total__btn">
                        Ver Historial de Compras
                    </button>
                </a>

            </div>
        </div>
    </div>
</div>
@endsection
