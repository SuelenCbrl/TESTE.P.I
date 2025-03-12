<?php
require_once './APP/CLASSE/guiche.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $guiche = new Guiche();
    $guiche->num_guiche = $_POST['num_guiche'];
    $guiche->nome_guiche = $_POST['nome_guiche'];


    $resultado = $guiche->criar();

    if ($resultado) {
       header("Location: index.php?success=1");
    } else {
        header("Location: index.php?error=1");
    }
}
?>
