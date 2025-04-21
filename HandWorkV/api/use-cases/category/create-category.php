<?php

require_once __DIR__ . '/../../../app/database/connection.php';

use app\database\connection;

$input = json_decode(file_get_contents("php://input"), true);
$conn = connection::connect();
$database = getenv('DB_NAME');

$stmt = $conn->prepare("INSERT INTO $database.category (name) VALUES (?)");
$stmt->bind_param("s", $input['nome']);

echo json_encode(['success' => $stmt->execute()]);