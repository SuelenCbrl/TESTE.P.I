<?php
require_once  './APP/CLASSE/guiche.php';
if(isset($_GET['id_guiche'])){
    $id_guiche = $_GET['id_guiche'];
    $guiObj = new Guiche();
    $gui_edit =$guiObj->buscar_por_id($id_guiche);
    print_r($gui_edit);
}
?>
