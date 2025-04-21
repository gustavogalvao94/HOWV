<?php

require_once __DIR__ . '/../../../app/database/connection.php';

use app\database\connection;

$input = json_decode(file_get_contents("php://input"), true);
$conn = connection::connect();
$database = getenv('DB_NAME');

$stmt = $conn->prepare("
    INSERT INTO $database.product 
        (name, description, price, image, contrast, id_category, id_admin) 
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "ssdssii",
    $input['nome'],
    $input['descricao'],
    $input['preco'],
    $input['imagem'],
    $input['destaque'],
    $input['id_categoria'],
    $input['id_admin'] // ou defina fixo se ainda não estiver usando login
);

echo json_encode(['success' => $stmt->execute()]);