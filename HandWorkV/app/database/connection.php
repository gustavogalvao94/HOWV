<?php

namespace app\database;

use mysqli;

class connection
{
    public static function connect()
    {
        $host = getenv('DB_HOST');
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASSWORD');
        $database = getenv('DB_NAME');

        $conn = new mysqli($host, $user, $pass, $database);

        if ($conn->connect_error) {
            die("connection Fail: " . $conn->connect_error);
        }

        return $conn;
    }
}