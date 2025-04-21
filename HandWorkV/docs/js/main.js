document.addEventListener('DOMContentLoaded', async () => {
    const API = {
        products: '/api/use-cases/product/get-product.php'
    };

    const productList = document.getElementById('product-list');

    async function loadProducts() {
        const res = await fetch(API.products);
        const products = await res.json();

        productList.innerHTML = '';

        products.forEach(product => {
            const productItem = document.createElement('div');
            productItem.classList.add('product-item');

            productItem.innerHTML = `
                <img src="${product.imagem}" alt="${product.nome}">
                <h3>${product.nome}</h3>
                <p>${product.descricao}</p>
                <p class="price">R$ ${product.preco}</p>
            `;

            productList.appendChild(productItem);
        });
    }

    loadProducts();
});


window.onload = function() {
    const isAdminLoggedIn = sessionStorage.getItem('admin_id') && sessionStorage.getItem('admin_nome');
    const currentPage = window.location.pathname;

    if (currentPage.includes('admin.html') && !isAdminLoggedIn) {
        window.location.href = 'login.html';
    }
    if (currentPage.includes('login.html') && isAdminLoggedIn) {
        window.location.href = 'admin.html';
    }
    if (isAdminLoggedIn && currentPage.includes('admin.html')) {
        document.getElementById('adminContent').style.display = 'block';
    }
};