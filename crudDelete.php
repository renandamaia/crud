<?php

include_once("conexao.php");

$id = 0;

if (!empty($_GET['id'])) {

    $id = $_REQUEST['id'];

    // seleciona no banco de dados os dados para listar na tela
    $consulta = $conn->prepare("SELECT * FROM tabela_teste WHERE id = $id");
    $consulta->execute();
    $crud = $consulta->fetchALL();
}

if (!empty($_POST)) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tabela_teste WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header('Location: index.php');
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
        <div class="span10 offset1">
            <div class="row">
                <h2 class="well">DELETE</h2>
            </div>
            <p>
            <form class="form-horizontal" action="crudDelete.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <div class="alert alert-danger"> Deseja excluir o contato <?php echo $crud[0]['nome']; ?>?
                </div>
                <div class="form actions">
                    <button type="submit" class="btn btn-danger">Sim</button>
                    <a href="index.php" type="button" class="btn btn-primary">N??o</a>
                </div>
            </form>
        </div>
        <br>
    </div>