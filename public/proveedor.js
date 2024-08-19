async function addProvider(event) {
    event.preventDefault(); // Evita el envío tradicional del formulario

    const form = document.getElementById('add-provider-form');
    const formData = new FormData(form);
    const csrfToken = document.querySelector('input[name="_token"]').value;

    try {
        const response = await fetch(form.action, { // Utiliza la acción del formulario
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json' // Asegura que la respuesta sea en formato JSON
            }
        });

        const responseText = await response.text();
        console.log(responseText);

        try {
            const data = JSON.parse(responseText);

            if (response.ok) {
                // Si la respuesta es exitosa (200 OK)
                const modalContainer = document.createElement('div');
                modalContainer.className = 'modal-container';
                modalContainer.innerHTML = `
                    <div class="modal-card"> 
                        <button type="button" class="dismiss">×</button> 
                        <div class="header"> 
                            <div class="image">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#000000" d="M20 7L9.00004 18L3.99994 13"></path> </g></svg>
                            </div> 
                            <div class="content">
                                <span class="title">Agregado exitosamente</span> 
                                <p class="message">Muchas gracias en tienda "" te agradecemos por tu participación</p> 
                            </div> 
                            <div class="actions">
                                <button type="button" class="history">Ok</button> 
                            </div> 
                        </div> 
                    </div>
                `;

                // Añadir el modal al body
                document.body.appendChild(modalContainer);
                modalContainer.style.display = 'flex'; // Mostrar el modal

                // Vincula la funcionalidad para cerrar el modal
                modalContainer.querySelector('.dismiss').addEventListener('click', () => {
                    modalContainer.remove(); // Elimina el modal al cerrar
                });

                // Vincula la funcionalidad para cerrar el modal con el botón "Ok"
                modalContainer.querySelector('.history').addEventListener('click', () => {
                    modalContainer.remove(); // Elimina el modal al hacer clic en "Ok"
                });

                form.reset(); // Reinicia el formulario tras el envío exitoso
            } else {
                // Si la respuesta no es exitosa (por ejemplo, 400 Bad Request)
                alert('Error: ' + (data.message || 'Ocurrió un error al procesar la solicitud.'));
            }
        } catch (e) {
            // Si la respuesta no es un JSON válido
            console.error('Error al procesar la respuesta JSON:', e);
            alert('Ocurrió un error inesperado al procesar la solicitud.');
        }

    } catch (error) {
        console.error('Error al enviar la solicitud:', error);
        alert('Ocurrió un error inesperado.');
    }
}

// Vincula la función al evento de envío del formulario
document.getElementById('add-provider-form').addEventListener('submit', addProvider);
