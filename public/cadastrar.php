<?php
include("../config/conexao.php");
if (isset($_POST["cadastrar"])) {
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

        $sql = "INSERT INTO brinquedos
                (nome, categoria, faixa_etaria, preco, quantidade)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);

        if ($stmt) {

            $stmt->bind_param(
                "sssdi",
                $nome,
                $categoria,
                $faixa_etaria,
                $preco,
                $quantidade
            );

            if ($stmt->execute()) {

                header("Location: ../index.php");
                exit;

            } else {

                echo "Erro ao cadastrar.";
            }
        } else {
            echo "Erro no comando.";

        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Cadastrar Brinquedo</title>

</head>

<body>

    <h1>Cadastrar Brinquedo</h1>

    <form method="POST">

        <label>Nome:</label>
        <br>
        <input type="text" name="nome">
        <br><br>
        <label>Categoria:</label>
        <br>
        <input type="text" name="categoria">
        <br><br>
        <label>Faixa Etária:</label>
        <br>
        <input type="text" name="faixa_etaria">
        <br><br>
        <label>Preço:</label>
        <br>
        <input type="number" step="0.01" name="preco">
        <br><br>
        <label>Quantidade:</label>
        <br>
        <input type="number" name="quantidade">
        <br><br>
        <button type="submit" name="cadastrar">
            Cadastrar
        </button>
    </form>
    <br>
    <a href="../index.php">Voltar</a>
</body>
</html>