<?php
$estado = $_GET['estado'];

$cidadesPorEstado = [
  "PR" => ["Curitiba", "Londrina", "Maringá", "Cascavel"],
  "SP" => ["São Paulo", "Campinas", "Santos", "Ribeirão Preto"],
  "RJ" => ["Rio de Janeiro", "Niterói", "Petrópolis", "Volta Redonda"],
  "MG" => ["Belo Horizonte", "Uberlândia", "Contagem", "Juiz de Fora"]
];

$cidades = [];

if (array_key_exists($estado, $cidadesPorEstado)) {
  $cidades = $cidadesPorEstado[$estado];
}

header('Content-Type: application/json');
echo json_encode($cidades);