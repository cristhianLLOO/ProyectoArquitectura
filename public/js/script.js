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
        generatePDF(products);
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
        `;
        tableBody.appendChild(row);

        // Agregar evento para editar producto
        row.addEventListener("click", () => {
            editIndex = products.findIndex(p => p.id === product.id);
            document.getElementById("name").value = product.name;
            document.getElementById("description").value = product.description;
            document.getElementById("quantity").value = product.quantity;
        });
    }

    function generatePDF(products) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        const headers = ["ID", "Nombre", "Descripción", "Cantidad", "Fecha de Actualización", "Estado"];
        const rows = products.map(product => [
            product.id,
            product.name,
            product.description,
            product.quantity,
            product.updated_at ? new Date(product.updated_at).toLocaleString() : 'Sin fecha',
            product.status
        ]);

        doc.autoTable({
            head: [headers],
            body: rows,
            startY: 10,
            theme: 'grid',
        });

        doc.save('reporte_de_almacen.pdf');
    }
});
