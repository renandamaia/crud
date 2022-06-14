<?php

include_once("conexao.php");

// seleciona no banco de dados os dados para listar na tela
$consulta = $conn->prepare("SELECT * FROM tabela_teste ORDER BY nome");
$consulta->execute();
$dados = $consulta->fetchALL();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="icon.ico">

    <script>
        $(function() {
            $("#busca").keyup(function() {
                //Recuperar o valor do campo
                var busca = $(this).val();
                var dados = {
                    nome: busca
                }
                $.post('busca.php', dados, function(retorna) {
                    //Mostra dentro do <spam> os resultado obtidos 
                    $(".resultBusca").html(retorna);
                });
            });
        });
    </script>
</head>

<body>
    <nav class="text-white h5 bg-dark">
        <p class="text-center">CRUD</p>
    </nav><br>

    <div class="container container-sm justify-content-center bg-light text-black border border-secondary rounded">
        <br>
        <div class=" input-group mb-3">
            <span class="input-group-text">Localizar</span>
            <input class="form-control" autofocus required type="text" id="busca" name="busca">
        </div>
        <p>
            <?php if ($_SESSION['input'] != null) : ?>
                <!-- Class que recebe o retorno da pesquisa do js -->
                <span class="resultBusca"></span>
            <?php endif; ?>
    </div>
    <p>

    <div class="container container-sm justify-content-center bg-light text-black border border-secondary rounded">
        <p>
        <p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Cadastrar
            </button>
        <p>

        <h5>Lista de cadastro</h5>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Código</th>
                <th>Ação</th>
            </tr>

            <?php foreach ($dados as $c) : ?>
                <tr>
                    <td><?= $c["id"]; ?></td>
                    <td><?= $c["nome"]; ?></td>
                    <td><?= $c["codigo"]; ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="crudFormRead.php?id=<?= $c['id'] ?>">Ver</a>
                        <a class="btn btn-warning btn-sm" href="crudFormUpdate.php?id=<?= $c['id'] ?>">Editar</a>
                        <a class="btn btn-danger btn-sm" href="crudDelete.php?id=<?= $c['id'] ?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Modal CREATE-->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">CREATE</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="crudCreate.php" method="POST">

                        <div class="form-group">
                            <label>Nome : </label>
                            <input type="text" required class="form-control" name="nome" id="nome">
                        </div>

                        <div class="form-group">
                            <label>Código : </label>
                            <input type="number" required class="form-control" name="codigo" id="codigo">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim modal CREATE -->

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
</body>


</html>
