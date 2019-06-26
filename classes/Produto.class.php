<?php

/**
 * Description of Cliente
 *
 * @author rf9co
 */
require_once 'Conexao.class.php';

class Produto {

  private $conn;
  private $idProduto;
  private $descricao;
  private $fabricante;

  public function __construct() {
    $this->conn = new Conexao();
  }

  public function __set($atributo, $valor) {
    $this->$atributo = $valor;
  }

  public function __get($atributo) {
    return $this->$atributo;
  }

  public function buscaUm($dado) {
    $this->idProduto = $dado;
    $query = $this->conn->conectar()->prepare("SELECT id,descricao,fabricante FROM produtos WHERE id = :idProduto;");
    $query->bindParam(':idProduto', $this->idProduto, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
  }

  public function buscaTodos() {
    try {
      $query = $this->conn->conectar()->prepare("SELECT id,descricao,fabricante FROM produtos ORDER BY id");
      $query->execute();
      return $query->fetchAll();
    } catch (PDOException $ex) {
      return 'Erro ao buscar os produtos' . $ex->getMessage();
    }
  }

  public function insere($dados) {

    $this->descricao = $dados[0];
    $this->fabricante = $dados[1];

    $query = $this->conn->conectar()->prepare("INSERT INTO public.produtos(descricao, fabricante)VALUES ('" . $this->descricao . "', '" . $this->fabricante . "');");

    if ($query->execute()) {
      return 1;
    } else {
      return 0;
    }
  }

  public function deleta($dados) {
    $this->idProduto = $dados;
    $query = $this->conn->conectar()->prepare("DELETE FROM public.produtos WHERE id = :idProduto;");
    $query->bindParam(':idProduto', $this->idProduto, PDO::PARAM_INT);
    if ($query->execute()) {
      return 1;
    } else {
      return 0;
    }
  }

  public function atualiza($dados) {
    $this->idProduto  = $dados[0];
    $this->descricao  = $dados[1];
    $this->fabricante = $dados[2];

    $query = $this->conn->conectar()->prepare("UPDATE public.produtos SET descricao='" .$this->descricao."', fabricante='".$this->fabricante."' WHERE id= ".$this->idProduto.";");

    if ($query->execute()) {
      return 1;
    } else {
      return 0;
    }
  }
}
