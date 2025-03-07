<?php
require_once './APP/CLASSE/guiche.php';
$usuario = new Guiche();
$dados = $usuario->buscar();
print_r($dados);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./APP/public/css/PontoAtendimentoCad.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<section class="Area-Util-Projeto">
        <div id="PontoAtendimentoCad">        
                <div class="topo-tela-PontoAtendimentoCad">
                    <div class="campo-busca">
                        <input id="buscar-Ponto-atendimento" type="text" placeholder="Buscar Registro">
                    </div>
                    <div class="sev"><p id="Ponto-atendimento">Ponto de Atendimento</p></div>
                    <div class="linha-divisoria-Ponto-atendimento"></div>
                </div>
            <div id="tela-branca-Ponto-atendimento"> 
              <div class="tabela-responsiva-Ponto-atendimento">
                <table id="table table-striped" class="tabela-Ponto-atendimento">
                  <thead class="cabecaTabelaPonto-atendimento">
                    <tr class="topo-tabela-servicos">
                      <th scope="col" class="cabecalho-tabela1">Tipo</th>
                      <th scope="col" class="cabecalho-tabela2">Identificador</th>
                      <th scope="col" class="cabecalho-tabela3">Editar</th>
                      <th scope="col" class="cabecalho-tabela1">Ativar/ Desativar</th>
                    </tr>
                  </thead>
                  <tbody class="resto-tabela-Ponto-atendimento">
                <?PHP
                    foreach($dados as $usuario){
                        echo
                        '
                    <tr>
                        
                        <td>'.$usuario->num_guiche.'</td>
                        <td>'.$usuario->nome_guiche.'</td>
                        <td><a href="./editar_guiche.php?id_user='.$usuario->id_guiche.'"class="btn btn-primary"><i class="bi bi-pencil-square"></i></td>
                        <td><a href="./excluir_guiche.php?id_guiche='.$usuario->id_guiche.'"class="btn btn-danger"> <i class="bi bi-trash"></i></td>
                    </tr>
                    ';
                    }
                ?>
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