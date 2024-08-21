document.querySelectorAll('.clasific, .colores').forEach(select => {
    select.addEventListener('change', function() {
        const products = document.querySelectorAll('.producto');
        products.forEach(product => {
            product.style.opacity = 0;
            setTimeout(() => {
                product.style.opacity = 1;
            }, 500);
        });
    });
});
