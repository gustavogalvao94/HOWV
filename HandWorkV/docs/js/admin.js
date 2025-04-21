document.addEventListener('DOMContentLoaded', () => {
    const productForm = document.getElementById('productForm');
    const categoryForm = document.getElementById('categoryForm');
    const listProducts = document.getElementById('listProducts');
    const listCategories = document.getElementById('listCategories');
    const selectCategory = document.getElementById('id_category');

    const API = {
        products: '/api/use-cases/product',
        categories: '/api/use-cases/category'
    };

    async function loadCategories() {
        const res = await fetch(`${API.categories}/get-category.php`);
        const categories = await res.json();
        selectCategory.innerHTML = '';
        listCategories.innerHTML = '';

        categories.forEach(cat => {
            const option = document.createElement('option');
            option.value = cat.id_categoria;
            option.textContent = cat.nome;
            selectCategory.appendChild(option);

            const li = document.createElement('li');
            li.innerHTML = `
        ${cat.nome}
        <button onclick="editCategory(${cat.id_categoria}, '${cat.nome}')">✏️</button>
        <button onclick="deleteCategory(${cat.id_categoria})">🗑️</button>
      `;
            listCategories.appendChild(li);
        });
    }

    async function loadProducts() {
        const res = await fetch(`${API.products}/get-product.php`);
        const products = await res.json();
        listProducts.innerHTML = '';

        products.forEach(prod => {
            const li = document.createElement('li');
            li.innerHTML = `
        <strong>${prod.nome}</strong> - R$ ${prod.preco}<br>
        <button onclick="editProduct(${prod.id_produto})">✏️</button>
        <button onclick="deleteProduct(${prod.id_produto})">🗑️</button>
      `;
            listProducts.appendChild(li);
        });
    }

    productForm.addEventListener('submit', async e => {
        e.preventDefault();
        const data = {
            id_produto: document.getElementById('id_product').value,
            nome: document.getElementById('name').value,
            descricao: document.getElementById('description').value,
            preco: document.getElementById('price').value,
            imagem: document.getElementById('image').value,
            destaque: document.getElementById('contrast').checked ? 1 : 0,
            id_categoria: document.getElementById('id_category').value
        };

        const url = data.id_produto ? `${API.products}/update-product.php` : `${API.products}/create-product.php`;

        await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });

        productForm.reset();
        loadProducts();
    });

    categoryForm.addEventListener('submit', async e => {
        e.preventDefault();
        const data = {
            id_categoria: document.getElementById('category_id').value,
            nome: document.getElementById('category_name').value
        };

        const url = data.id_categoria
            ? `${API.categories}/update-category.php`
            : `${API.categories}/create-category.php`;

        await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });

        categoryForm.reset();
        loadCategories();
    });

    window.editProduct = async (id) => {
        const res = await fetch(`${API.products}/get-product.php?id=${id}`);
        const prod = await res.json();
        document.getElementById('id_product').value = prod.id_produto;
        document.getElementById('name').value = prod.nome;
        document.getElementById('description').value = prod.descricao;
        document.getElementById('price').value = prod.preco;
        document.getElementById('image').value = prod.imagem;
        document.getElementById('contrast').checked = prod.destaque === 1;
        document.getElementById('id_category').value = prod.id_categoria;
    };

    window.deleteProduct = async (id) => {
        await fetch(`${API.products}/delete-product.php?id=${id}`, { method: 'DELETE' });
        loadProducts();
    };

    window.editCategory = (id, name) => {
        document.getElementById('category_id').value = id;
        document.getElementById('category_name').value = name;
    };

    window.deleteCategory = async (id) => {
        await fetch(`${API.categories}/delete-category.php?id=${id}`, { method: 'DELETE' });
        loadCategories();
    };

    loadCategories();
    loadProducts();
});
