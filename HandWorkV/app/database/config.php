<?php

function loadEnv() {
    $required_vars = ['DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME'];

    foreach ($required_vars as $var) {
        $value = getenv($var);
        if ($value === false) {
            die("Erro: Variable '$var' not found.");
        }
        putenv("$var=$value");
    }
}

loadEnv();
?>