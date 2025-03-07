<?php
require './APP/CLASSE/guiche.php';
if(isset($_GET['id_guiche'])){
    $id = $_GET['id_guiche'];
    $objUser = new Guiche();
    $user_delete = $objUser->buscar_por_id($id_guiche);
    $del= $user_delete->excluir();
    if($del){
        header('location: ./index.php');
    }
}
?>

