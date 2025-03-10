<?php
require './APP/CLASSE/guiche.php';
$id_guiche = isset($_GET['id_guiche']) ? $_GET['id_guiche'] : null;
    $objUser = new Guiche();
    $user_delete = $objUser->buscar_por_id($id_guiche);
    $del= $user_delete->excluir();
    if($del){
        header('location: ./index.php');
    }

?>