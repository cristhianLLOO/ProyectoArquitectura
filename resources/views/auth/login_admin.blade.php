<link rel="stylesheet" href="css/style_login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="box">
    <form class="form_container" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form">
            <div class="title_container">
                <p class="title">Bienvenido a Nuestro Equipo Administrador</p>
                <span class="subtitle">Comienza a utilizar nuestra aplicación, simplemente <br>
                    crea una cuenta y disfruta de la experiencia.</span>
            </div>

            <div class="input_container">
                <label class="input_label" for="email_field">Correo Electrónico</label>
                <svg fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg" class="icon">
                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#141B34" d="M7 8.5L9.94202 10.2394C11.6572 11.2535 12.3428 11.2535 14.058 10.2394L17 8.5"></path>
                    <path stroke-linejoin="round" stroke-width="1.5" stroke="#141B34" d="M2.01577 13.4756C2.08114 16.5412 2.11383 18.0739 3.24496 19.2094C4.37608 20.3448 5.95033 20.3843 9.09883 20.4634C11.0393 20.5122 12.9607 20.5122 14.9012 20.4634C18.0497 20.3843 19.6239 20.3448 20.7551 19.2094C21.8862 18.0739 21.9189 16.5412 21.9842 13.4756C22.0053 12.4899 22.0053 11.5101 21.9842 10.5244C21.9189 7.45886 21.8862 5.92609 20.7551 4.79066C19.6239 3.65523 18.0497 3.61568 14.9012 3.53657C12.9607 3.48781 11.0393 3.48781 9.09882 3.53656C5.95033 3.61566 4.37608 3.65521 3.24495 4.79065C2.11382 5.92608 2.08114 7.45885 2.01576 10.5244C1.99474 11.5101 1.99475 12.4899 2.01577 13.4756Z"></path>
                </svg>
                <input placeholder="name@mail.com" title="Correo Electrónico" name="email" type="email" class="input_field" id="email_field" required>
            </div>

            <div class="input_container">
                <label class="input_label" for="password_field">Contraseña</label>
                <svg fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg" class="icon">
                    <path stroke-linecap="round" stroke-width="1.5" stroke="#141B34" d="M18 11.0041C17.4166 9.91704 16.273 9.15775 14.9519 9.0993C13.477 9.03404 11.9788 9 10.329 9C8.6794 9 7.18123 9.03404 5.70625 9.0993C4.38514 9.15775 3.24153 9.91704 2.65808 11.0041"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" stroke="#141B34" d="M20 13.0041C19.4166 11.917 18.273 11.1578 16.9519 11.0993C15.477 11.034 13.9788 11 12.329 11C10.6794 11 9.18123 11.034 7.70625 11.0993C6.38514 11.1578 5.24153 11.917 4.65808 13.0041"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" stroke="#141B34" d="M22 15.0041C21.4166 13.917 20.273 13.1578 18.9519 13.0993C17.477 13.034 15.9788 13 14.329 13C12.6794 13 11.1812 13.034 9.70625 13.0993C8.38514 13.1578 7.24153 13.917 6.65808 15.0041"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" stroke="#141B34" d="M10 15H14"></path>
                </svg>
                <input placeholder="Min. 8 caracteres" title="Contraseña" name="password" type="password" class="input_field" id="password_field" required>
            </div>

            @if ($errors->has('email'))
                <span class="error">El correo electrónico no es válido</span>
            @endif
            
            @if (!$errors->has('email') && $errors->has('password'))
                <span class="error">La contraseña no es válida</span>
            @endif
        </div>

        <a href="/recupcont">
            <h2 class="title2">¿Olvidaste tu contraseña?</h2>
        </a>

        <div class="cont_btn">
            <button type="submit" class="sign-in_btn">Iniciar Sesión</button>
        </div>

        <h6 class="title3">¿No tienes cuenta?</h6>

        <div class="cont_btn">
            <a href="/register"><button type="button" class="sign-in_btn">Regístrate</button></a>
        </div>

        <div class="lineas">
            <div class="lineas_div"></div>
            <p class="linea__text">O</p>
            <div class="lineas_div"></div>
        </div>

        <div class="social_icons">
            <a href="https://www.facebook.com" target="_blank" class="social_icon"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com" target="_blank" class="social_icon"><i class="fab fa-instagram"></i></a>
            <a href="https://www.twitter.com" target="_blank" class="social_icon"><i class="fab fa-twitter"></i></a>
        </div>
    </form>
</div>
