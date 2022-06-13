<?php
if (count($_POST) > 0) {
    
    //pegar valores do formulário
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $codigo = $_POST["codigo"];

    include_once("conexao.php");

    $sql = "UPDATE tabela_teste SET 
            nome = ?, codigo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $codigo, $id]);
}

header('Location: index.php');
