<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['admin_nome'])) {
    header('Location: login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="public/css/admin.css" />
</head>
<body>
<div class="container">
    <h1>Painel Administrativo</h1>

    <section>
        <h2>Produtos</h2>
        <form id="productForm">
            <input type="hidden" id="id_product" />
            <input type="text" id="name" placeholder="Nome do Produto" required />
            <textarea id="description" placeholder="Descrição"></textarea>
            <input type="number" step="0.01" id="price" placeholder="Preço" required />
            <input type="text" id="image" placeholder="URL da Imagem" />
            <select id="id_category"></select>
            <label><input type="checkbox" id="contrast" /> Destaque</label>
            <button type="submit">Salvar Produto</button>
        </form>

        <ul id="listProducts"></ul>
    </section>

    <hr>

    <section>
        <h2>Categorias</h2>
        <form id="categoryForm">
            <input type="hidden" id="category_id" />
            <input type="text" id="category_name" placeholder="Nome da Categoria" required />
            <button type="submit">Salvar Categoria</button>
        </form>

        <ul id="listCategories"></ul>
    </section>
</div>

<script src="public/js/admin.js"></script>
</body>
</html>