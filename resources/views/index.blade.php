@extends('base_user')
@section('estilo')
<link rel="stylesheet" href="{{asset('css/style_index.css')}}">
@endsection
@section('scripts')
<script src="{{ asset('js/interactividad.js') }}"></script>
@endsection

@section('titulo')
<title>Pincipal</title>
@endsection
@section('ajustes')
<div class="barr_busqueda">
    <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Buscar">
        <button class="btn btn-primary" type="button">Buscar</button>
    </form>
    <div class="flex">
    <a href="/profile">
            <img src="{{asset('images/user.png')}}" alt="" class="user__img">
            @if(auth()->user())
                {{Auth::user()->nombre}}
            @endif
        </a>
        <a href="#">
            <img src="{{asset('images/setting_logo.png')}}" alt="" class="user__img">
        </a>
    </div>
    <div class="carrito">
        <a href=" {{route('pago')}} ">
            <img src="{{asset('images\shopping-cart-svgrepo-com.svg')}}" alt="" class="img_carrito">
        </a>
    </div>
</div>
@endsection


@section('principal')


<br>
<br>
<div class="box">
    <div class="ajustes">
        <div class="filtros">
            <h2>Ver todo</h2>
           
        </div>
        <div class="filtros_mas">
            <a href="#">
                <img src="{{asset('images/filtro_logo.png')}}" alt="" class="filtro--img">
            </a>
            <p>Todos los filtros</p>
        </div>
    </div>

    <div class="productos">
        @foreach ($product as $product)
        <div class="producto">
            <img src="{{asset($product->path_imagen)}}" alt="" class="img-fluid">
            <div class="producto__info">
                <h2 class="producto__titulo">{{$product->nombre}}</h2>
                <p class="producto__precio">${{number_format($product->precio)}}</p>
                
                <div class="cont_btn" >
                <a href="{{ route('ProdcutoVer', ['id' => $product->id_producto]) }}">Ver Producto</a>
                </div>
                

            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection
