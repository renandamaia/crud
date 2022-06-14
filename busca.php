<?php

session_start();

// BUSCA SEM REFRESH
include_once('conexao.php');

$nome = $_POST["nome"];

// seleciona no banco de dados os dados para listar na tela
$consulta = $conn->prepare("SELECT * FROM tabela_teste WHERE nome LIKE '%" . $nome . "%' ORDER BY nome");
$consulta->execute();
$crud = $consulta->fetchALL();

//Desenha o html aqui para apresentar a etiqueta no est_saida_form_add.php
if (($nome != null) || ($nome != '')) {
    echo "
        <table class='table table-striped'>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Código</th>
                <th>Ação</th>
            </tr>";
    foreach ($crud as $c) :
        echo "
            <tr>
                <td>" . $c['id'] . "</td>
                <td>" . $c['nome'] . "</td>
                <td>" . $c['codigo'] . "</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='crudFormRead.php?id=" . $c['id'] . "'>Ver</a>
                    <a class='btn btn-warning btn-sm' href='crudFormUpdate.php?id=" . $c['id'] . "'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='crudDelete.php?id=" . $c['id'] . "'>Deletar</a>
                </td>
            </tr>
        
";

    endforeach;
    echo " </table>";
}
