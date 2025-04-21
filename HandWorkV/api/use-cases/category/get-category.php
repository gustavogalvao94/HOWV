<?php

require_once __DIR__ . '/../../../app/database/connection.php';

use app\database\connection;

$conn = connection::connect();
$database = getenv('DB_NAME');

$sql = "SELECT id_category AS id_categoria, name AS nome FROM $database.category";
$result = $conn->query($sql);

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

echo json_encode($categories);
