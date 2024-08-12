document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = 'http://127.0.0.1:8000/api/almacen'; // Actualiza la URL base para que apunte al prefijo /api
    const form = document.getElementById("product-form");
    const tableBody = document.querySelector("#report-table tbody");
    const searchInput = document.getElementById("search");
    const downloadButton = document.getElementById("download-report");

    let products = []; // Inicialmente vacío, lo cargaremos desde la base de datos
    let editIndex = -1;

    // Cargar datos desde la base de datos al iniciar
    loadProducts();

    form.addEventListener("submit", async (event) => {
        event.preventDefault();

        const name = document.getElementById("name").value;
        const description = document.getElementById("description").value;
        const quantity = parseInt(document.getElementById("quantity").value);
        const status = quantity === 0 ? "Inexistente" : "Existente";

        try {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            let method = 'POST';
            let url = BASE_URL;
            let product;

            if (editIndex >= 0) { // Si estamos en modo de edición
                const id = products[editIndex].id;
                product = { id, name, description, quantity, status };
                method = 'PUT';
                url = `${BASE_URL}/${id}`;
            } else { // Si no estamos en modo de edición, creamos un nuevo producto
                product = { name, description, quantity, status };
            }

            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify(product)
            });

            const textData = await response.text(); // Captura la respuesta como texto
            console.log("Respuesta cruda (guardar producto):", textData); // Imprime la respuesta en la consola

            if (!response.ok) {
                throw new Error(textData);
            }

            if (response.headers.get('Content-Type').includes('application/json')) {
                const responseData = JSON.parse(textData); // Luego intenta analizarlo como JSON

                if (editIndex >= 0) { // Si estamos en modo de edición
                    products[editIndex] = responseData;
                    updateProductInTable(editIndex, responseData);
                    editIndex = -1; // Reiniciamos el índice de edición
                } else {
                    products.push(responseData);
                    addProductToTable(responseData);
                }
            } else {
                throw new Error('La respuesta del servidor no es JSON.');
            }

            form.reset(); // Limpiamos los campos de entrada
            searchInput.dispatchEvent(new Event('input')); // Actualizamos la tabla filtrada si hay una búsqueda activa

        } catch (error) {
            console.error('Error al guardar el producto en la base de datos:', error);
        }
    });

    searchInput.addEventListener("input", (event) => {
        const searchValue = event.target.value.toLowerCase();
        tableBody.innerHTML = "";

        const filteredProducts = products.filter(product => 
            product.name.toLowerCase().includes(searchValue) ||
            product.description.toLowerCase().includes(searchValue)
        );

        filteredProducts.forEach(product => addProductToTable(product));
    });

    downloadButton.addEventListener("click", () => {
        const csvContent = generateCSV(products);
        const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
        const url = URL.createObjectURL(blob);
        const link = document.createElement("a");
        link.setAttribute("href", url);
        link.setAttribute("download", "reporte_de_almacen.csv");
        link.style.visibility = "hidden";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    async function loadProducts() {
        try {
            const response = await fetch(BASE_URL);

            const textData = await response.text(); // Captura la respuesta como texto
            console.log("Respuesta cruda (cargar productos):", textData); // Imprime la respuesta en la consola

            if (!response.ok) {
                throw new Error(textData);
            }

            if (response.headers.get('Content-Type').includes('application/json')) {
                const data = JSON.parse(textData); // Luego intenta analizarlo como JSON
                products = data;
                tableBody.innerHTML = ""; // Limpiar la tabla antes de agregar productos
                products.forEach(product => addProductToTable(product)); // Agrega cada producto a la tabla
            } else {
                throw new Error('La respuesta del servidor no es JSON.');
            }

        } catch (error) {
            console.error('Error al cargar los productos desde la base de datos:', error);
        }
    }

    function addProductToTable(product) {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>${product.description}</td>
            <td>${product.quantity}</td>
            <td>${product.updated_at ? new Date(product.updated_at).toLocaleString() : 'Sin fecha'}</td>
            <td>${product.status}</td>
            <td>
                <button class="deleteButton">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 50 59" class="bin">
                        <path fill="#B5BAC1" d="M0 7.5C0 5.01472 2.01472 3 4.5 3H45.5C47.9853 3 50 5.01472 50 7.5V7.5C50 8.32843 49.3284 9 48.5 9H1.5C0.671571 9 0 8.32843 0 7.5V7.5Z"></path>
                        <path fill="#B5BAC1" d="M17 3C17 1.34315 18.3431 0 20 0H29.3125C30.9694 0 32.3125 1.34315 32.3125 3V3H17V3Z"></path>
                        <path fill="#B5BAC1" d="M2.18565 18.0974C2.08466 15.821 3.903 13.9202 6.18172 13.9202H43.8189C46.0976 13.9202 47.916 15.821 47.815 18.0975L46.1699 55.1775C46.0751 57.3155 44.314 59.0002 42.1739 59.0002H7.8268C5.68661 59.0002 3.92559 57.3155 3.83073 55.1775L2.18565 18.0974ZM18.0003 49.5402C16.6196 49.5402 15.5003 48.4209 15.5003 47.0402V24.9602C15.5003 23.5795 16.6196 22.4602 18.0003 22.4602C19.381 22.4602 20.5003 23.5795 20.5003 24.9602V47.0402C20.5003 48.4209 19.381 49.5402 18.0003 49.5402ZM29.5003 47.0402C29.5003 48.4209 30.6196 49.5402 32.0003 49.5402C33.381 49.5402 34.5003 48.4209 34.5003 47.0402V24.9602C34.5003 23.5795 33.381 22.4602 32.0003 22.4602C30.6196 22.4602 29.5003 23.5795 29.5003 24.9602V47.0402Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        <path fill="#B5BAC1" d="M2 13H48L47.6742 21.28H2.32031L2 13Z"></path>
                    </svg>
                    <span class="tooltip">Eliminar</span>
                </button>
            </td>
        `;
        tableBody.appendChild(row);

        // Agregar evento para editar producto
        row.addEventListener("click", () => {
            editIndex = products.findIndex(p => p.id === product.id);
            document.getElementById("name").value = product.name;
            document.getElementById("description").value = product.description;
            document.getElementById("quantity").value = product.quantity;
        });

        // Agregar evento para eliminar producto
        row.querySelector(".deleteButton").addEventListener("click", async (e) => {
            e.stopPropagation(); // Evitar que el clic en eliminar active la edición
            try {
                const response = await fetch(`${BASE_URL}/${product.id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                const textData = await response.text(); // Captura la respuesta como texto
                console.log("Respuesta cruda (eliminar producto):", textData); // Imprime la respuesta en la consola

                if (!response.ok) {
                    throw new Error(textData);
                }

                products = products.filter(p => p.id !== product.id);
                tableBody.removeChild(row);

            } catch (error) {
                console.error('Error al eliminar el producto:', error);
            }
        });
    }

    function updateProductInTable(index, product) {
        const rows = tableBody.querySelectorAll("tr");
        const row = rows[index];
        row.innerHTML = `
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>${product.description}</td>
            <td>${product.quantity}</td>
            <td>${product.updated_at ? new Date(product.updated_at).toLocaleString() : 'Sin fecha'}</td>
            <td>${product.status}</td>
            <td>
                <button class="deleteButton">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 50 59" class="bin">
                        <path fill="#B5BAC1" d="M0 7.5C0 5.01472 2.01472 3 4.5 3H45.5C47.9853 3 50 5.01472 50 7.5V7.5C50 8.32843 49.3284 9 48.5 9H1.5C0.671571 9 0 8.32843 0 7.5V7.5Z"></path>
                        <path fill="#B5BAC1" d="M17 3C17 1.34315 18.3431 0 20 0H29.3125C30.9694 0 32.3125 1.34315 32.3125 3V3H17V3Z"></path>
                        <path fill="#B5BAC1" d="M2.18565 18.0974C2.08466 15.821 3.903 13.9202 6.18172 13.9202H43.8189C46.0976 13.9202 47.916 15.821 47.815 18.0975L46.1699 55.1775C46.0751 57.3155 44.314 59.0002 42.1739 59.0002H7.8268C5.68661 59.0002 3.92559 57.3155 3.83073 55.1775L2.18565 18.0974ZM18.0003 49.5402C16.6196 49.5402 15.5003 48.4209 15.5003 47.0402V24.9602C15.5003 23.5795 16.6196 22.4602 18.0003 22.4602C19.381 22.4602 20.5003 23.5795 20.5003 24.9602V47.0402C20.5003 48.4209 19.381 49.5402 18.0003 49.5402ZM29.5003 47.0402C29.5003 48.4209 30.6196 49.5402 32.0003 49.5402C33.381 49.5402 34.5003 48.4209 34.5003 47.0402V24.9602C34.5003 23.5795 33.381 22.4602 32.0003 22.4602C30.6196 22.4602 29.5003 23.5795 29.5003 24.9602V47.0402Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        <path fill="#B5BAC1" d="M2 13H48L47.6742 21.28H2.32031L2 13Z"></path>
                    </svg>
                    <span class="tooltip">Eliminar</span>
                </button>
            </td>
        `;

        // Reagregar eventos para el nuevo contenido de la fila
        row.querySelector(".deleteButton").addEventListener("click", async (e) => {
            e.stopPropagation(); // Evitar que el clic en eliminar active la edición
            try {
                const response = await fetch(`${BASE_URL}/${product.id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                const textData = await response.text(); // Captura la respuesta como texto
                console.log("Respuesta cruda (eliminar producto):", textData); // Imprime la respuesta en la consola

                if (!response.ok) {
                    throw new Error(textData);
                }

                products = products.filter(p => p.id !== product.id);
                tableBody.removeChild(row);

            } catch (error) {
                console.error('Error al eliminar el producto:', error);
            }
        });
    }

    function generateCSV(products) {
        const headers = ["ID", "Nombre", "Descripción", "Cantidad", "Fecha de Actualización", "Estado"];
        const rows = products.map(product => [
            product.id,
            product.name,
            product.description,
            product.quantity,
            product.updated_at ? new Date(product.updated_at).toLocaleString() : 'Sin fecha',
            product.status
        ]);

        return [
            headers.join(","), // Cabecera
            ...rows.map(row => row.join(",")) // Filas
        ].join("\n");
    }
});
