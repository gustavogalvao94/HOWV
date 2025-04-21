<?php

require_once __DIR__ . '/../../../app/database/connection.php';

use app\database\connection;

$conn = connection::connect();
$database = getenv('DB_NAME');

$id = $_GET['id'] ?? null;

$sql = "SELECT 
            p.id_product AS id_produto,
            p.name AS nome,
            p.description AS descricao,
            p.price AS preco,
            p.image AS imagem,
            p.contrast AS destaque,
            p.id_category AS id_categoria,
            p.id_admin AS id_admin
        FROM $database.product p";

if ($id) {
    $sql .= " WHERE p.id_product = " . intval($id);
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
    echo json_encode($product);
} else {
    $result = $conn->query($sql);
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products);
}