<?php

require_once __DIR__ . '/../../../app/database/connection.php';

use app\database\connection;

$input = json_decode(file_get_contents("php://input"), true);
$conn = connection::connect();
$database = getenv('DB_NAME');

$stmt = $conn->prepare("UPDATE $database.category SET name = ? WHERE id_category = ?");
$stmt->bind_param("si", $input['nome'], $input['id_categoria']);

echo json_encode(['success' => $stmt->execute()]);