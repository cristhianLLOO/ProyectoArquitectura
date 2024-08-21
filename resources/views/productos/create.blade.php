@extends('base_user')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/style_nuevopro.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/interactividad.js') }}"></script>
@endsection

@section('titulo')
<title>Agregar Producto</title>
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

@section('principal')
<br>
<br>
<div class="box">
    <div class="ajustes">
        <div class="filtros">
            <h2>Agregar Nuevo Producto</h2>
        </div>
    </div>

    <div class="formulario_producto">
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="imagen">Subir Imagen del Producto</label>
                <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror">
                @error('imagen')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="imagen_url">O Ingresar URL de la Imagen</label>
                <input type="url" name="imagen_url" class="form-control @error('imagen_url') is-invalid @enderror" value="{{ old('imagen_url') }}">
                @error('imagen_url')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                @error('nombre')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select name="categoria" class="form-control @error('categoria') is-invalid @enderror">
                    <option value="">Seleccionar Proveedor</option>
                    <option value="CASTORES">CASTORES</option>
                    <option value="TRESGUERRAS">TRESGUERRAS</option>
                    <option value="GONZALEZ">GONZALEZ</option>
                </select>
                @error('categoria')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}">
                @error('precio')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}">
                @error('stock')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>
    </div>
</div>
@endsection
