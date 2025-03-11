<?php
require './APP/CLASSE/guiche.php';
if(isset($_GET['id_guiche'])){
    $id_guiche = $_GET['id_guiche'];
    $objUser = new Guiche();
    $user_alternar = $objUser->buscar_por_id($id_guiche);
    //print_r($user_alternar);
    $user_alternar->alternar_ativo($user_alternar->id_guiche, $user_alternar->ativo);
    if($user_alternar){
        header('location: ./index.php');
    }
}
    

?>