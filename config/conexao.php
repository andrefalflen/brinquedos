<?php

mysqli_report(MYSQLI_REPORT_OFF);

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "gestao_brinquedos";

$conexao = new mysqli($servidor, $usuario, $senha, $banco,3307);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

