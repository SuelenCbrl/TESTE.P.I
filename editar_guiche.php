<?php
require './APP/CLASSE/guiche.php';

if(isset($_GET['id_guiche'])){
    $id_guiche = $_GET['id_guiche'];
    $objGuiche = new Guiche();
    $guiche_edit = $objGuiche->buscar_por_id($id_guiche);
}

if(isset($_POST['editar'])){
    if (isset($_POST['nome_guiche']) && isset($_POST['num_guiche'])) {
        $nome_guiche = $_POST['nome_guiche'];
        $num_guiche = $_POST['num_guiche'];

        $guiche_edit->nome_guiche = $nome_guiche;
        $guiche_edit->num_guiche = $num_guiche;

        $res = $guiche_edit->editar();

        if($res){
            echo "<script>alert('Editado com Sucesso') </script>";
        }else{
            echo "<script>alert('Erro ao editar') </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title> 
    </head>
<body class="pagina">
    <main class="modal-container">
        <section class="modal">
            <h1 class="titulo">Edição Ponto de Atendimento</h1>
            <hr class="linha-horizontal">
            <div class="inf-modal">
                <div class="container">
                    <label class="label"><b>Nome do Ponto de Atendimento</b></label>
                    <form method="POST">
                        <input type="text" class="input-text" name="nome_guiche" value="<?php echo isset($guiche_edit) ? htmlspecialchars($guiche_edit->nome_guiche) : ''; ?>" placeholder="Guichê" required>
                </div>
            </div>
            <div class="servico">
                <label class="label"><b>Número / Letra</b></label>
                <input type="text" class="input-text" name="num_guiche" value="<?php echo isset($guiche_edit) ? htmlspecialchars($guiche_edit->num_guiche) : ''; ?>" placeholder="1" required>
            </div>
            <div class="button-group">
                <button class="botao-modal cancel" onclick="window.history.back();">Voltar</button>
                <button type="submit" name="editar" class="botao-modal save">Salvar</button>
            </div>
            </form>
        </section>
    </main>
    <script src="./modal.js"></script>
</body>
</html>