
<?php

require __DIR__ . '/../DATABASE/Database.php';


if (isset($_GET['id_guiche'])) {
    $id_guiche = $_GET['id_guiche'];

    $db = new Database();

    $res = $db->delete("id_guiche = $id_guiche");

    if ($res) {
        header('Location: read.php');
        exit; 
        
    } else {
        echo '<script>alert("Erro ao excluir guichê!"); window.location.href = "read.php";</script>';
    }
} else {
    echo '<script>alert("ID do Guichê não especificado!"); window.location.href = "read.php";</script>';
}
?>

