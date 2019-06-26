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
    $retorno = explode(',',$retorno);
    echo json_encode($retorno);
}
else if($_POST['action'] == 'editar'){
    $dados = [$_POST['nome']
            , $_POST['cpf']
            , $_POST['logradouro']
            , $_POST['numero']
            , $_POST['bairro']
            , $_POST['cidade']
            , $_POST['cep']
            , $_POST['estado']
             ];
    $retorno = ($objPessoa->atualiza($dados));
    echo json_encode($retorno);
}