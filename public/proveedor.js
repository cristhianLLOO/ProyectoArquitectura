// Función para manejar el envío del formulario de agregar proveedor
async function addProvider(event) {
    event.preventDefault(); // Evita que el formulario se envíe de la forma tradicional

    const form = document.getElementById('add-provider-form');
    const formData = new FormData(form);
    const csrfToken = document.querySelector('input[name="_token"]').value;

    try {
        const response = await fetch('{{ route("proveedores.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        // Asegúrate de manejar tanto respuestas JSON como otros posibles tipos de respuesta
        const contentType = response.headers.get('content-type');
        let data;
        if (contentType && contentType.includes('application/json')) {
            data = await response.json();
        } else {
            data = { message: 'Proveedor agregado exitosamente.' };
        }

        const message = document.getElementById('message');
        if (data.message) {
            message.textContent = data.message;
            form.reset(); // Reinicia el formulario tras el envío exitoso
        } else {
            message.textContent = 'Ocurrió un error al agregar el proveedor.';
        }

        setTimeout(() => {
            message.textContent = '';
        }, 3000);

    } catch (error) {
        console.error('Error:', error);
        const message = document.getElementById('message');
        message.textContent = 'Ocurrió un error inesperado.';
        setTimeout(() => {
            message.textContent = '';
        }, 3000);
    }
}

// Vincula la función al evento de envío del formulario
document.getElementById('add-provider-form').addEventListener('submit', addProvider);
