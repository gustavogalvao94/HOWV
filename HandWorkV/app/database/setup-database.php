<?php

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Fail to connect: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database '$database' created.<br>";
} else {
    die("Error creating app.database: " . $conn->error);
}

$conn->select_db($database);

$tables = [

    "CREATE TABLE IF NOT EXISTS Admin (
        id_admin INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )",

    "CREATE TABLE IF NOT EXISTS Category (
        id_category INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL
    )",

    "CREATE TABLE IF NOT EXISTS Product (
        id_product INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        description TEXT,
        price DECIMAL(10, 2) NOT NULL,
        image VARCHAR(255),
        contrast BOOLEAN DEFAULT FALSE,
        id_category INT,
        id_admin INT,
        FOREIGN KEY (id_category) REFERENCES Category(id_category),
        FOREIGN KEY (id_admin) REFERENCES Admin(id_admin)
    )",
];

foreach ($tables as $sql) {
    if ($conn->query($sql) === TRUE) {
        echo "Success.<br>";
    } else {
        echo "Fail: " . $conn->error . "<br>";
    }
}


$checkAdmin = "SELECT * FROM $database.admin WHERE email = 'admin@admin.com'";
$result = $conn->query($checkAdmin);

if ($result->num_rows === 0) {
    $defaultPassword = password_hash('admin@123', PASSWORD_DEFAULT);
    $insertAdmin = "INSERT INTO $database.admin (nome, email, senha) VALUES ('Administrador', 'admin@admin.com', '$defaultPassword')";
}

$conn->close();
