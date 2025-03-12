

<?php
require_once './APP/CLASSE/guiche.php';

$guiche = new Guiche();
$guiches = $guiche->buscar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Guichês</title>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    
  
    <link rel="stylesheet" href="./APP/public/css/PontoAtendimentoCad.css">
</head>
<body class="container mt-4">

    <h1 class="text-center mb-4">Gerenciamento de Guichês</h1>

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">Guichê criado com sucesso!</div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert alert-danger">Erro ao criar guichê. Tente novamente.</div>
    <?php endif; ?>


    
    <div class="card p-4 shadow-sm mb-4">
        <h4 class="mb-3">Criar Novo Guichê</h4>
        <form action="criar_guiche.php" method="POST" onsubmit="return confirmarCriacao()">
            <div class="mb-3">
                <label for="num_guiche" class="form-label">Número do Guichê</label>
                <input type="text" class="form-control" id="num_guiche" name="num_guiche" required>
            </div>
            <div class="mb-3">
                <label for="nome_guiche" class="form-label">Nome do Guichê</label>
                <input type="text" class="form-control" id="nome_guiche" name="nome_guiche" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i> Criar Guichê</button>
        </form>
    </div>

  
    <div class="card p-4 shadow-sm">
        <h4 class="mb-3">Lista de Guichês</h4>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Número</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Ativar/Inativar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($guiches as $g): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($g->nome_guiche); ?></td>
                            <td><?php echo htmlspecialchars($g->num_guiche); ?></td>
                            <td>
                                <a href="editar_guiche.php?id_guiche=<?php echo $g->id_guiche; ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                            </td>
                            <td>
                                <a href="inativar_guiche.php?id_guiche=<?php echo $g->id_guiche; ?>" class="btn btn-<?php echo $g->ativo ? 'danger' : 'success'; ?> btn-sm" onclick="return confirmarAlteracao()">
                                    <i class="bi <?php echo $g->ativo ? 'bi-x-circle' : 'bi-check-circle'; ?>"></i>
                                    <?php echo $g->ativo ? 'Inativar' : 'Ativar'; ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        function confirmarCriacao() {
            return confirm("Tem certeza que deseja criar este guichê?");
        }

        function confirmarAlteracao() {
            return confirm("Tem certeza que deseja alterar o status deste guichê?");
        }
    </script>
</body>
</html>

<script src="./APP/public/js/ativar.js" defer></script>
