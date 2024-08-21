function togglePassword(inputId) {
    var input = document.getElementById(inputId);
    var icon = document.getElementById('toggle' + inputId.charAt(0).toUpperCase() + inputId.slice(1) + 'Icon');

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }

    // Añadir la clase de rotación para animar el ícono
    icon.classList.add('rotate');

    // Remover la clase de rotación después de la animación
    setTimeout(function() {
        icon.classList.remove('rotate');
    }, 300); // La duración debe coincidir con la del CSS
}
