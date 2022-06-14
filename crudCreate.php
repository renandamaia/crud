<?php
if (count($_POST) > 0) {

    //pegar valores do formulário
    $nome = $_POST["nome"];
    $codigo = $_POST["codigo"];

    include_once("conexao.php");

    $sql = "INSERT INTO tabela_teste 
        (nome, codigo) 
        VALUES 
        (?,?)";
    $stmt = $conn->prepare($sql);

    $stmt->execute([$nome, $codigo]);
}

header('Location: index.php');
