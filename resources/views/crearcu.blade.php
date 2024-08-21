@extends('complemento')

<link rel="stylesheet" href="{{ asset('css/style_incomo.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@section('contenidoprincipal')
<section class="row d-flex justify-content-center align-items-center min-vh-150">
    <div class="col-md-20 col-lg-15 text-center login-container"> <!-- Aumenta aún más el ancho del formulario -->
        <img src="images/LOGOD&M.webp" alt="Imagen de perfil" class="img-fluid mb-4"> <!-- Logo dentro del formulario -->
        <h2>Bienvenido a Nuestro Equipo</h2>
        <div class="mt-4">
            <a href="/crearcuvended" class="btn btn-primary">Vendedor</a>
        </div>
        
        <div class="mt-4">
            <a href="/register" class="btn btn-primary">Comprador</a>
        </div>
    </div>
</section>
@endsection

@section('navuser')
<!-- Aquí va el contenido de la sección navuser -->
@endsection
