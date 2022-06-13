<?php
if (count($_GET) > 0) {

    //pegar valores do formulário
    $id = $_GET["id"];

    include_once("conexao.php");

    $sql = "DELETE FROM tabela_teste WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}

header('Location: index.php');
