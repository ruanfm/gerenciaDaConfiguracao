<?php

<<<<<<< HEAD
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
=======
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

>>>>>>> 233b9ad7af0fea4f48858c5d79511aa873e8507b
