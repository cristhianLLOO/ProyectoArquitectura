function addProvider() {
    const firstName = document.getElementById('first-name').value;
    const lastName = document.getElementById('last-name').value;
    const email = document.getElementById('email').value;
    const entrega = document.getElementById('entrega').value;
    const product = document.getElementById('product').value;
    const cantidad = document.getElementById('cantidad').value;

    if (firstName && lastName && email && entrega && cantidad) {
        // Aquí puedes agregar el código para enviar los datos a la base de datos si es necesario

        // Mostrar mensaje de éxito
        const message = document.getElementById('message');
        message.textContent = 'Proveedor agregado exitosamente.';

        // Limpiar el formulario
        document.getElementById('add-provider-form').reset();

        // Limpiar el mensaje después de 3 segundos
        setTimeout(() => {
            message.textContent = '';
        }, 3000);
    } else {
        alert('Por favor, complete todos los campos.');
    }
}

function showTab(tabId) {
    // Ocultar todo el contenido de las pestañas
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => content.classList.remove('active'));
    
    // Mostrar el contenido de la pestaña seleccionada
    document.getElementById(tabId).classList.add('active');
}
