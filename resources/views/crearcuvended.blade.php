@extends('base')

@section('estilo')
<link rel="stylesheet" href="css/style_new_account.css">
@endsection

@section('titulo')
<title>Crear Cuenta</title>
@endsection

@section('principal')
<h1 class="title">Bienvenido a Nuestro Equipo</h1>
<h2 class="title">Iniciar Sesion</h2>
<div class="box">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form">
            <div class="campo">
                <label for="nombre" class="text">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="input" placeholder="Nombre" required>
            </div>
            <div class="campo">
                <label for="apellido" class="text">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="input" placeholder="Apellido" required>
            </div>
            <div class="campo">
                <label for="correo" class="text">Email</label>
                <input type="email" id="correo" name="email" class="input" placeholder="Email" required>
            </div>
            <div class="campo">
                <label for="telefono" class="text">Telefono</label>
                <input type="tel" id="telefono" name="telefono" class="input" placeholder="Telefono" required>
            </div>
            <div class="campo">
                <label for="contrasena" class="text">Contraseña</label>
                <input type="password" id="contrasena" name="password" class="input input_password" placeholder="Contraseña" required>
            </div>
            <div class="campo">
                <label for="confirmar_contrasena" class="text">Confirmar Contraseña</label>
                <input type="password" id="confirmar_contrasena" name="password_confirmation" class="input input_password" placeholder="Confirmar Contraseña" required>
            </div>
        </div>
        <div class="cont_btn">
            <button type="submit" class="btn_input">Crear Cuenta</button>
        </div>
    </form>
    <div class="redes">
        <div class="lineas">
            <div class="lineas_div"></div>
            <p class="linea__text">O</p>
            <div class="lineas_div"></div>
        </div>
        <div class="redes__logos">
            <a href="">
                <img src="images/Logo_de_Facebook.png" alt="" class="redes__logos--img"> 
            </a>
            <a href="">
                <img src="images/google_logo.png" alt="" class="redes__logos--img">
            </a>
            <a href="">
                <img src="images/github_logo.png" alt="" class="redes__logos--img">
            </a>
        </div>
    </div>
</div>
@endsection
