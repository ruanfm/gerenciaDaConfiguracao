<?php

require_once './Produto.class.php';

$objProduto = new Produto();

$id = $_POST['id'];

if ($_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $retorno = ($objProduto->deleta($id));
    echo json_encode($retorno);
} 
else if ($_POST['action'] == 'insere') {
    $dados = [$_POST['descricao'], $_POST['fabricante']];
    $retorno = ($objProduto->insere($dados));
    echo json_encode($retorno);
}
else if($_POST['action'] == 'buscaIndividual'){
    $id = $_POST['id'];
    $retorno = ($objProduto->buscaUm($id));
    echo json_encode($retorno);
}
else if($_POST['action'] == 'editar'){
    $dados = [$_POST['id3'], $_POST['descricao3'], $_POST['fabricante3']];
    $retorno = ($objProduto->atualiza($dados));
    echo json_encode($retorno);
}