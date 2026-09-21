<?php

include("config/conexao.php");

$sql = "SELECT * FROM brinquedos ORDER BY id DESC";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Gestão de Brinquedos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h1>Gestão de Brinquedos</h1>

    <a href="cadastrar.php" class="btn btn-primary mb-3">
        Cadastrar brinquedo
    </a>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Faixa Etária</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>

            <?php while ($brinquedo = $resultado->fetch_assoc()) { ?>

                <tr>

                    <td>
                        <?= $brinquedo["id"] ?>
                    </td>

                    <td>
                        <?= $brinquedo["nome"] ?>
                    </td>

                    <td>
                        <?= $brinquedo["categoria"] ?>
                    </td>

                    <td>
                        <?= $brinquedo["faixa_etaria"] ?>
                    </td>

                    <td>
                        R$ <?= number_format($brinquedo["preco"], 2, ",", ".") ?>
                    </td>

                    <td>
                        <?= $brinquedo["quantidade"] ?>
                    </td>

                    <td>

                        <a href="editar.php?id=<?= $brinquedo["id"] ?>"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <a href="excluir.php?id=<?= $brinquedo["id"] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Deseja excluir este brinquedo?')">
                            Excluir
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>

</body>

</html>