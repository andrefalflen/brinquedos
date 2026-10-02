<?php

include("../config/conexao.php");

$id = $_GET["id"];

$sql = "SELECT * FROM brinquedos WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$brinquedo = $resultado->fetch_assoc();


if (isset($_POST["editar"])) {

    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $faixa_etaria = $_POST["faixa_etaria"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];


    if (
        empty($nome) ||
        empty($categoria) ||
        empty($faixa_etaria) ||
        empty($preco) ||
        empty($quantidade)
    ) {

        echo "Preencha todos os campos.";

    } else {

        $sql = "UPDATE brinquedos SET
                nome = ?,
                categoria = ?,
                faixa_etaria = ?,
                preco = ?,
                quantidade = ?
                WHERE id = ?";

        $stmt = $conexao->prepare($sql);

        if ($stmt) {

            $stmt->bind_param(
                "sssdii",
                $nome,
                $categoria,
                $faixa_etaria,
                $preco,
                $quantidade,
                $id
            );

            if ($stmt->execute()) {

                header("Location: ../index.php");
                exit;

            } else {

                echo "Erro ao editar o brinquedo.";

            }

        } else {

            echo "Erro ao preparar a atualização.";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Editar Brinquedo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h1>Editar Brinquedo</h1>

    <form method="POST">

        <label>Nome</label>

        <input
            type="text"
            name="nome"
            value="<?= $brinquedo["nome"] ?>"
            class="form-control mb-3"
        >

        <label>Categoria</label>

        <input
            type="text"
            name="categoria"
            value="<?= $brinquedo["categoria"] ?>"
            class="form-control mb-3"
        >

        <label>Faixa Etária</label>

        <input
            type="text"
            name="faixa_etaria"
            value="<?= $brinquedo["faixa_etaria"] ?>"
            class="form-control mb-3"
        >

        <label>Preço</label>

        <input
            type="number"
            step="0.01"
            name="preco"
            value="<?= $brinquedo["preco"] ?>"
            class="form-control mb-3"
        >

        <label>Quantidade</label>

        <input
            type="number"
            name="quantidade"
            value="<?= $brinquedo["quantidade"] ?>"
            class="form-control mb-3"
        >

        <button
            type="submit"
            name="editar"
            class="btn btn-warning">
            Salvar alterações
        </button>

        <a href="../index.php" class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>

</html>