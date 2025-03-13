<?php
require_once './APP/CLASSE/guiche.php';

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
    <link rel="stylesheet" href="./APP/public/css/PontoAtendimentoCad.css">
</head>
<body class="container mt-4">

    <h1 class="text-center mb-4">Gerenciamento de Guichês</h1>

   

    <?php if (isset($_GET['success']) || isset($_GET['error'])): ?>
    <div class="alert <?php echo isset($_GET['success']) ? 'alert-success' : 'alert-danger'; ?> alert-dismissible fade show" role="alert">
        <?php echo isset($_GET['success']) ? 'Guichê criado com sucesso!' : 'Erro ao criar guichê. Tente novamente.'; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


    <section class="Area-Util-Projeto">
        <div id="tela-branca-Ponto-atendimento">
            <div class="tabela-responsiva-Ponto-atendimento">
            
                <div class="card p-4 shadow-sm mb-4">
                    <h4 class="mb-3">Criar Novo Guichê</h4>
                    <form action="criar_guiche.php" method="POST" onsubmit="return confirmarCriacao()">
                        <table class="table tabela-Ponto-atendimento">
                            <tbody>
                                <tr>
                                    <td><label for="num_guiche" class="form-label">Número do Guichê</label></td>
                                    <td><input type="text" class="form-control" id="num_guiche" name="num_guiche" required></td>
                                </tr>
                                <tr>
                                    <td><label for="nome_guiche" class="form-label">Nome do Guichê</label></td>
                                    <td><input type="text" class="form-control" id="nome_guiche" name="nome_guiche" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i> Criar Guichê</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>

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
                            $estadoAtivo = ($guiche->ativo == 'ATIVO') ? 'active' : '';
                            echo '
                              <tr>
                                  <td>'.$guiche->nome_guiche.'</td>
                                  <td>'.$guiche->num_guiche.'</td>
                                  <td><a href="./editar_guiche.php?id_guiche='.$guiche->id_guiche.'"class="btn btn-primary"><i class="bi bi-pencil-square"></i></td>
                                  <td>
                                    <a href="./inativar_guiche.php?id_guiche='.$guiche->id_guiche.'">
                                      <div class="toggle-btn '.$estadoAtivo.'">
                                        <div class="circulo"></div>
                                      </div>
                                    </a>
                                  </td>


                              </tr>
                            ';
                        }
                  ?>
                  
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="botoesVoltar-Cadastrar">
                <button type="button" class="botao-voltar" onclick="window.location.href='menuadm_servicos.php';">Voltar</button>
                <button type="submit" class="botao-cadastro">Cadastrar</button>
            </div>
        </div>
        
    </section>

<script src="./APP/public/js/ativar.js" defer></script>
