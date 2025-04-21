<?php

use app\database\connection;

require_once './connection.php';

$conn = connection::connect();

echo "connection successfully!";