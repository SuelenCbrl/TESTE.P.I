<?php
require './APP/CLASSE/guiche.php';
$id_guiche = isset($_GET['id_guiche']) ? $_GET['id_guiche'] : null;
    $objUser = new Guiche();
    $user_delete = $objUser->buscar_por_id($id_guiche);

if(isset($_POST['editar'])){

        $nome_guiche = $_POST['nome_guiche'];
        $num_guiche = $_POST['num_guiche'];
        $user_edit->nome_guiche = $nome_guiche;
        $user_edit->num_guiche = $num_guiche;

        $res = $user_edit->editar();

if($res){
      echo "<script>alert('Editado com Sucesso') </script>";
}else{
      echo "<script>alert('Erro ao editar') </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <span class="title">Editar</span>
            <form  method="post">
                <label>Tipo</label>
                <input type="text" name="Tipo" value="<?= htmlspecialchars($nome_guiche['nome_guiche']) ?>" required><br><br>

                <label>Identificador</label>
                <input type="text" name="Identificador" value="<?= htmlspecialchars($num_guiche['num_guiche']) ?>" required><br><br>


    </div>
</body>
</html>