<?php

require __DIR__ . '/../DATABASE/Database.php';




if (isset($_POST['cadastrar'])) {

    $num_guiche = $_POST['num_guiche'];
    $nome_guiche = $_POST['nome_guiche'];

    $db = new Database();

    $values = [
        'num_guiche' => $num_guiche,
        'nome_guiche' => $nome_guiche
    ];

    $res = $db->create($values);

    if ($res) {
        echo '<script> alert("Guichê cadastrado com sucesso!!") </script>';
    } else {
        echo '<script> alert("Erro ao cadastrar guichê!") </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro de Guichê</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 text-center">Cadastro de Guichê</h1>

        <form method="POST">
            <div class="mb-3">
                <label for="num_guiche" class="form-label">Número do Guichê</label>
                <input type="text" class="form-control" id="num_guiche" name="num_guiche" required>
            </div>

            <div class="mb-3">
                <label for="nome_guiche" class="form-label">Nome do Guichê</label>
                <input type="text" class="form-control" id="nome_guiche" name="nome_guiche" required>
            </div>

            <button type="reset" class="btn btn-danger">Cancelar</button>
            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
        </form>
        
        <a href="read.php">
            <button type="button" class="btn btn-secondary mt-3">Listar Guichês</button>
        </a>

    </div>
</body>
</html>
