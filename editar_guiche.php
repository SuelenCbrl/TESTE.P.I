<?php
require_once './APP/CLASSE/guiche.php';

if (isset($_GET['id_guiche'])) {
    $id_guiche = $_GET['id_guiche'];
    $guicheObj = new Guiche();
    $gui_edit = $guicheObj->buscar_por_id($id_guiche);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $gui_edit->num_guiche = $_POST['num_guiche'];
        $gui_edit->nome_guiche = $_POST['nome_guiche'];
        $gui_edit->ativo = $_POST['ativo'];
        
        
        $gui_edit->editar();
        
        
        header('Location: gerenciar_guiches.php?success=true');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Guichê</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="container mt-4">
    <h1 class="text-center mb-4">Editar Guichê</h1>

    <form method="POST">
        <input type="hidden" name="id_guiche" value="<?php echo $gui_edit->id_guiche; ?>">

        <div class="mb-3">
            <label for="num_guiche" class="form-label">Número do Guichê</label>
            <input type="text" class="form-control" id="num_guiche" name="num_guiche" value="<?php echo $gui_edit->num_guiche; ?>" required>
        </div>

        <div class="mb-3">
            <label for="nome_guiche" class="form-label">Nome do Guichê</label>
            <input type="text" class="form-control" id="nome_guiche" name="nome_guiche" value="<?php echo $gui_edit->nome_guiche; ?>" required>
        </div>

        <div class="mb-3">
            <label for="ativo" class="form-label">Status</label>
            <select class="form-control" id="ativo" name="ativo">
                <option value="ATIVO" <?php echo $gui_edit->ativo == 'ATIVO' ? 'selected' : ''; ?>>Ativo</option>
                <option value="INATIVO" <?php echo $gui_edit->ativo == 'INATIVO' ? 'selected' : ''; ?>>Inativo</option>
            </select>
        </div>

        <div class="text-center">
            <!-- <button type="submit" class="btn btn-primary">Salvar Alterações</button> -->
            <a href="index.php" class="btn btn-primary">Salvar Alterações</a>
        </div>
    </form>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>
