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
        $quantidade == ""
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

                echo "Erro ao editar.";

            }

        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Editar Brinquedo</title>
</head>
<body>
    <h1>Editar Brinquedo</h1>
    <form method="POST">
        <label>Nome:</label>
        <br>
        <input
            type="text"
            name="nome"
            value="<?= $brinquedo["nome"] ?>"
        >
        <br><br>

        <label>Categoria:</label>
        <br>
        <input
            type="text"
            name="categoria"
            value="<?= $brinquedo["categoria"] ?>"
        >
        <br><br>
        <label>Faixa Etária:</label>
        <br>
        <input
            type="text"
            name="faixa_etaria"
            value="<?= $brinquedo["faixa_etaria"] ?>"
        >
        <br><br>
        <label>Preço:</label>
        <br>
        <input
            type="number"
            step="0.01"
            name="preco"
            value="<?= $brinquedo["preco"] ?>"
        >
        <br><br>
        <label>Quantidade:</label>
        <br>
        <input
            type="number"
            name="quantidade"
            value="<?= $brinquedo["quantidade"] ?>"
        >
        <br><br>

        <button type="submit" name="editar">
            Salvar
        </button>
    </form>
    <br>
    <a href="../index.php">Voltar</a>
</body>
</html>