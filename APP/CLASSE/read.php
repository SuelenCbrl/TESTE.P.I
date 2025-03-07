<?php

require __DIR__ . '/../DATABASE/Database.php';


$db = new Database();

$guiches = $db->read();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Guichês</title>
    <style>
        .btn-editar {
            background-color: #007bff;
            color: white;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 text-center">Guichês Cadastrados</h1>

        <!-- Tabela para listar os guichês cadastrados -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Guichê</th>
                    <th>Número do Guichê</th>
                    <th>Nome do Guichê</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
            
                foreach ($guiches as $guiche) {
                    echo '<tr>';
                    echo '<td>' . $guiche['id_guiche'] . '</td>';
                    echo '<td>' . $guiche['num_guiche'] . '</td>';
                    echo '<td>' . $guiche['nome_guiche'] . '</td>';
                    echo '<td>';
                    // Botão Editar
                    echo '<a href="editar_guiche.php?id_guiche=' . $guiche['id_guiche'] . '" class="btn btn-editar">Editar</a>';
                   
                    // Botão Excluir
                    echo '<a href="delete.php?id_guiche=' . $guiche['id_guiche'] . '" class="btn btn-delete" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
