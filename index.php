<?php

include_once("conexao.php");

// seleciona no banco de dados os dados para listar na tela
$consulta = $conn->prepare("SELECT * FROM tabela_teste");
$consulta->execute();
$crud = $consulta->fetchALL();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="icon.ico">
</head>

<body>

    <nav class="text-white h5 bg-dark">
        <p class="text-center">CRUD</p>
    </nav><br>

    <!-- Botão abre modal cadastrar -->
    <div class="container container-sm">
        <div class="container justify-content-center bg-light text-black border border-secondary rounded">
            <br>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastrar">
                Cadastrar
            </button>
            <br><br>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="crudCadastrar.php" method="POST">

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
    </div>
    <!-- Fim modal cadastrar-->

    <div class="container container-sm"><br>
        <?php if (isset($crud)) : ?>
            <h5>Cadastro</h5>
            <table class="table table-hover table-sm">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Código</th>
                </tr>

                <?php foreach ($crud as $c) : ?>
                    <tr>
                        <td><?= $c["id"]; ?></td>
                        <td><?= $c["nome"]; ?></td>
                        <td><?= $c["codigo"]; ?></td>
                        <td>
                            <a class="btn btn-outline-warning btn-sm" href="crudFormEditar.php?id=<?= $c['id'] ?>">Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-outline-danger btn-sm" href="crudDelete.php?id=<?= $c['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>