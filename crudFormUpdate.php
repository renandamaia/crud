<?php

if (count($_GET) > 0) {

    $id = $_GET["id"];

    include_once("conexao.php");

    // seleciona no banco de dados o cadastro = id
    $consulta = $conn->prepare("SELECT * FROM tabela_teste WHERE id = " . $id);
    $consulta->execute();
    $crud = $consulta->fetchALL();
}
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
    <p>
    <div class="container container-sm justify-content-center bg-light text-black border border-secondary rounded">

        <form action="crudUpdate.php" method="POST">
            <h2>UPDATE</h2>
            <br>

            <div class="form-group">
                <label>Id: </label>
                <input type="number" readonly value="<?= $crud[0]['id']; ?>" class="form-control" name="id" id="id">
            </div>

            <div class="form-group">
                <label>Nome da máquina: </label>
                <input type="text" required value="<?= $crud[0]['nome']; ?>" class="form-control" name="nome" id="nome">
            </div>

            <div class="form-group">
                <label>Código: </label>
                <input type="number" required value="<?= $crud[0]['codigo']; ?>" class="form-control" name="codigo" id="codigo">
            </div>
            <br>

            <a href="index.php" type="button" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
        <br>
    </div>
</body>

</html>