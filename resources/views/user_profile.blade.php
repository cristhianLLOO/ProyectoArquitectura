@extends('base_user')
@section('estilo')
<link rel="stylesheet" href="css/style_user_profile.css">
@endsection
@section('titulo')
<title>Usuario</title>
@endsection
@section('ajustes')
<div class="barr_busqueda">
    <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
    </form>
</div>
@endsection

@section('principal')
<div class="box">
    <div class="pedidos">
        <section class="section">
            <h2 class="pedidos__titulo">Mis Pedidos</h2>
            <a href="pago"><div class="pedidos__btn"><p class="pedidos__text">Pagado</p></div></a>
            <a href="#"><div class="pedidos__btn"><p class="pedidos__text">Procesando</p></div></a>
            <a href="#"><div class="pedidos__btn"><p class="pedidos__text">Enviado</p></div></a>
            <a href="#"><div class="pedidos__btn"><p class="pedidos__text">Comentarios</p></div></a>
            <a href="devolucion"><div class="pedidos__btn"><p class="pedidos__text">Devoluciones</p></div></a>
        </section>
    </div>
    <div class="bienvenida">
        <div class="favoritos">
        <h1 class="favoritos__titulo">Hola, nuevos usuarios</h1>
            <div class="fav_mas">
                <p class="favoritos__text">mis favoritos</p>
                <a class="favoritos__link" href="#">Más ></a>
            </div>
        </div>
        <div class="galeria">
            <img src="images/prueba.png" alt="" class="favoritos__img">
            <img src="images/prueba.png" alt="" class="favoritos__img">
            <img src="images/prueba.png" alt="" class="favoritos__img">
        </div>
    </div>
    <div class="usuario">
        <div class="usuario__img--div">
            <img src="images/user.png" alt="" class="usuario__img">
        </div>
        <h2 class="usuario__titulo">@auth {{Auth::user()->nombre}} {{Auth::user()->apellido}} @endauth</h2>
        <div class="usuario__box">
            <p class="usuario__text">Correo: @auth {{Auth::user()->email}} @endauth</p>
        </div>
        <div class="usuario__box">
            <p class="usuario__text">Contraseña</p>
        </div>
        <a href="cliente" class="usuario__link">Cambiar contraseña</a>
        <a href=" {{route('logout')}} ">Salir de la cuenta</a>
    </div>
</div>

@endsection
