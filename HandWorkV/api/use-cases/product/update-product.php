<?php
require_once __DIR__ . '/../../../app/database/connection.php';

use app\database\connection;

$input = json_decode(file_get_contents("php://input"), true);
$conn = connection::connect();
$database = getenv('DB_NAME');

$sql = "UPDATE $database.product SET name = ?, description = ?, price = ?, image = ?, contrast = ?, id_category = ?, id_admin = ? 
        WHERE id_product = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssdssiii",
    $input['nome'],
    $input['descricao'],
    $input['preco'],
    $input['imagem'],
    $input['destaque'],
    $input['id_categoria'],
    $input['id_admin'],
    $input['id_produto']
);

echo json_encode(['success' => $stmt->execute()]);