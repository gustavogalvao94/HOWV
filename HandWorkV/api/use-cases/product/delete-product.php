<?php
require_once __DIR__ . '/../../../app/database/connection.php';

use app\database\connection;

$id = isset($_GET['id']) ? $_GET['id'] : null;
$database = getenv('DB_NAME');

if ($id) {
    $conn = connection::connect();
    $stmt = $conn->prepare("DELETE FROM $database.product WHERE id_product = ?");
    $stmt->bind_param("i", $id);
    echo json_encode(['success' => $stmt->execute()]);
} else {
    echo json_encode(['success' => false, 'message' => 'ID não informado']);
}