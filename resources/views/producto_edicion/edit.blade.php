<!-- resources/views/productos/edit.blade.php -->

@extends('base_user')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/interactividad.js') }}"></script>
@endsection

@section('titulo')
<title>Editar Producto</title>
@endsection

@section('ajustes')
<div class="barr_busqueda">
    <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Buscar">
        <button class="btn btn-primary" type="button">Buscar</button>
    </form>
    <div class="flex">
        <a href="/profile">
            <img src="{{ asset('images/user.png') }}" alt="" class="user__img">
            @if(auth()->user())
                {{ Auth::user()->nombre }}
            @endif
        </a>
        <a href="#">
            <img src="{{ asset('images/setting_logo.png') }}" alt="" class="user__img">
        </a>
    </div>
    <div class="carrito">
        <a href="{{ route('pago') }}">
            <img src="{{ asset('images/shopping-cart-svgrepo-com.svg') }}" alt="" class="img_carrito">
        </a>
    </div>
</div>
@endsection

@section('header')
<header>
    <!-- Aquí puedes incluir el contenido de tu header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mi Tienda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
@endsection

@section('principal')
<br><br>
<div class="container">
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', ['id' => $producto->id_producto]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" name="precio" class="form-control" value="{{ $producto->precio }}">
        </div>

        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <input type="text" name="categoria" class="form-control" value="{{ $producto->categoria }}">
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}">
        </div>

        <div class="form-group">
            <label for="imagen">Imagen del Producto:</label>
            <input type="file" name="imagen" class="form-control">
            @if($producto->path_imagen)
                <img src="{{ asset($producto->path_imagen) }}" alt="Imagen del producto" class="img-fluid mt-2" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection

@section('footer')
<footer>
    <div class="footer-content">
        <p>&copy; 2024 Mi Tienda. Todos los derechos reservados.</p>
        <ul class="social-media">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </div>
</footer>
@endsection
