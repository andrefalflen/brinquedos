<?php

include("../config/conexao.php");

$id = $_GET["id"];

$sql = "DELETE FROM brinquedos WHERE id = ?";

$stmt = $conexao->prepare($sql);

if ($stmt) {

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {

        header("Location: ../index.php");
        exit;

    } else {

        echo "Erro ao excluir o brinquedo.";

    }

} else {

    echo "Erro ao preparar a exclusão.";

}

?>