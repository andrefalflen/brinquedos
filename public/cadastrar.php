<?php

include("config/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

        $sql = "INSERT INTO brinquedos 
                (nome, categoria, faixa_etaria, preco, quantidade)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);

        $stmt->bind_param(
            "sssdi",
            $nome,
            $categoria,
            $faixa_etaria,
            $preco,
            $quantidade
        );

        if ($stmt->execute()) {

            header("Location: index.php");
            exit;

        } else {

            echo "Erro ao cadastrar: " . $stmt->error;

        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Cadastrar Brinquedo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h1>Cadastrar Brinquedo</h1>

    <form method="POST">

        <div class="mb-3">

            <label>Nome</label>

            <input type="text"
                   name="nome"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Categoria</label>

            <input type="text"
                   name="categoria"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Faixa Etária</label>

            <input type="text"
                   name="faixa_etaria"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Preço</label>

            <input type="number"
                   step="0.01"
                   name="preco"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Quantidade</label>

            <input type="number"
                   name="quantidade"
                   class="form-control">

        </div>

        <button type="submit" class="btn btn-success">
            Cadastrar
        </button>

        <a href="index.php" class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>

</html>