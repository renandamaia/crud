<?php
try {
    $servername = "localhost";
    $username = "USUÁRIO DO SEU BANCO";
    $password = "SENHA DO SEU BANCO";
    $dbname = "NOME DO SEU BANCO";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $erro) {
    echo "Erro ao conectar com o Banco de dados";
}
