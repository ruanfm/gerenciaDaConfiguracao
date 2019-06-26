<?php

require_once './Pessoa.class.php';
$objPessoa = new Pessoa();

$id = $_POST['id'];

if ($_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $retorno = ($objPessoa->deleta($id));
    echo json_encode($retorno);
} 
else if ($_POST['action'] == 'insere') {
   $dados = [$_POST['nome']
          , $_POST['cpf']
          , $_POST['logradouro']
          , $_POST['numero']
          , $_POST['bairro']
          , $_POST['cidade']
          , $_POST['cep']
          , $_POST['estado']
           ];
  $retorno = ($objPessoa->insere($dados));
  echo json_encode($retorno);
}
else if($_POST['action'] == 'buscaIndividual'){
  $id = $_POST['id'];
  $retorno = ($objPessoa->buscaUm($id));
  echo json_encode($retorno);
}
else if($_POST['action'] == 'editar'){
    $dados = [$_POST['id2']
            , $_POST['nome2']
            , $_POST['cpf2']
            , $_POST['logradouro2']
            , $_POST['numero2']
            , $_POST['bairro2']
            , $_POST['cidade2']
            , $_POST['cep2']
            , $_POST['estado2']
             ];
    $retorno = ($objPessoa->atualiza($dados));
    echo json_encode($retorno);
}
