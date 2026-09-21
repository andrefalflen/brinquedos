<?php

include("config/conexao.php");

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "DELETE FROM brinquedos WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {

        header("Location: index.php");
        exit;

    } else {

        echo "Erro ao excluir o brinquedo: " . $stmt->error;
    }

    $stmt->close();

} else {

    echo "ID do brinquedo não informado.";
}
?>