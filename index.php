<?php

include("config/conexao.php");

$sql = "SELECT * FROM brinquedos";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Brinquedos</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <h1>Gestão de Brinquedos</h1>

    <a href="public/cadastrar.php">Cadastrar brinquedo</a>

    <br><br>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Faixa Etária</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>

        <?php while ($brinquedo = $resultado->fetch_assoc()) { ?>

        <tr>

            <td><?= $brinquedo["id"] ?></td>

            <td><?= $brinquedo["nome"] ?></td>

            <td><?= $brinquedo["categoria"] ?></td>

            <td><?= $brinquedo["faixa_etaria"] ?></td>

            <td>R$ <?= $brinquedo["preco"] ?></td>

            <td><?= $brinquedo["quantidade"] ?></td>

            <td>

                <a href="public/editar.php?id=<?= $brinquedo["id"] ?>">
                    Editar
                </a>

                |

                <a href="public/excluir.php?id=<?= $brinquedo["id"] ?>"
                   onclick="return confirm('Deseja excluir este brinquedo?')">
                    Excluir
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</body>

</html>