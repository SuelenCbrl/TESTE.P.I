<?php
require_once './APP/CLASSE/guiche.php';

// Verifica se os parâmetros id_guiche e estado foram passados via POST
if (isset($_POST['id_guiche']) && isset($_POST['estado'])) {
    $idGuiche = $_POST['id_guiche'];
    $estado = $_POST['estado']; // ATIVO ou INATIVO

    // Cria uma instância da classe Guiche
    $guiche = new Guiche();
    
    // Atualiza o estado do guichê no banco de dados
    $guiche->alternar_ativo($idGuiche, $estado);

    // Após a atualização, redireciona para a página de gerenciamento
    header("Location: teste-index.php");
    exit();
}

// Busca todos os guichês ativos e inativos do banco de dados
$guiche = new Guiche();
$guiches = $guiche->buscar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Guichês</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./APP/public/css/teste.css">
</head>
<body class="container mt-4">

    <h1 class="text-center mb-4">Gerenciamento de Guichês</h1>

    <section class="Area-Util-Projeto">
    
    <div id="tela-branca-Ponto-atendimento">
    <div class="tabela-responsiva-Ponto-atendimento">
        <table id="table table-striped" class="tabela-Ponto-atendimento">
            <thead class="cabecaTabelaPonto-atendimento">
                <tr class="topo-tabela-servicos">
                    <th scope="col" class="cabecalho-tabela1">Tipo</th>
                    <th scope="col" class="cabecalho-tabela2">Identificador</th>
                    <th scope="col" class="cabecalho-tabela3">Editar</th>
                    <th scope="col" class="cabecalho-tabela1">Desativar/Ativar</th>
                </tr>
            </thead>
            <tbody class="resto-tabela-Ponto-atendimento">
                
                <?php
                    
                    foreach($guiches as $guiche) {
                        $estadoAtivo = ($guiche->ativo == 'ATIVO') ? 'checked' : ''; 
                        echo '
                        <tr>
                            <td>'.$guiche->nome_guiche.'</td>
                            <td>'.$guiche->num_guiche.'</td>
                            <td><a href="./editar_guiche.php?id_guiche='.$guiche->id_guiche.'" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a></td>
                            <td>
                
                                <label class="switch">
                                    <input type="checkbox" class="toggle-btn" '.$estadoAtivo.' data-guiche-id="'.$guiche->id_guiche.'">
                                    <span class="slider"></span>
                                </label>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de confirmação -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja ativar/desativar este guichê?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="confirmForm" action="teste-index.php" method="POST">
                        <input type="hidden" id="guicheId" name="id_guiche" value="">
                        <input type="hidden" id="guicheEstado" name="estado" value="">
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Função para abrir o modal de confirmação ao alternar o estado do guichê
            const toggleGuicheState = (guicheId, estado) => {
                // Preenche os campos ocultos no formulário do modal com o ID do guichê e o estado
                document.getElementById('guicheId').value = guicheId;
                document.getElementById('guicheEstado').value = estado;

                // Exibe o modal de confirmação
                new bootstrap.Modal(document.getElementById('confirmModal')).show();
            };

            // Adiciona o evento de 'change' nos botões de toggle (ativar/desativar)
            document.querySelectorAll('.toggle-btn').forEach(button => {
                button.addEventListener('change', function () {
                    const guicheId = this.getAttribute('data-guiche-id');
                    const estado = this.checked ? 'ATIVO' : 'INATIVO';
                    toggleGuicheState(guicheId, estado);
                });
            });
        });
    </script>
</body>
</html>
