<?php

use app\database\connection;

session_start();
require_once __DIR__ . '/../../../app/database/connection.php';

$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$database = getenv('DB_NAME');

if (empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos']);
    exit;
}

$conn = connection::connect();
$sql = "SELECT * FROM $database.admin WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if ($senha === $user['senha']) {
        $_SESSION['admin_id'] = $user['id_admin'];
        $_SESSION['admin_nome'] = $user['nome'];

        echo json_encode(['success' => true]);
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Senha incorreta.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
}