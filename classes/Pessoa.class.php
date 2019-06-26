<?php

/**
 * Description of Cliente
 *
 * @author rf9co
 */
require_once 'Conexao.class.php';

class Pessoa {

    private $conn;
    private $idPessoa;
    private $nome;
    private $cpf;
    private $logradouro;
    private $numero;
    private $bairro;
    private $cidade;
    private $cep;
    private $estado;

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
      $this->idPessoa = $dado;
      $query = $this->conn->conectar()->prepare("SELECT id,nome, cpf, logradouro, numero, bairro, cidade, cep, estado FROM clientes WHERE id = :idPessoa;");
      $query->bindParam(':idPessoa', $this->idPessoa, PDO::PARAM_INT);
      $query->execute();
      return $query->fetch();
       
    }

    public function buscaTodos() {
        try {
            $query = $this->conn->conectar()->prepare("SELECT id, nome, cpf, logradouro, numero, bairro, cidade, cep, estado FROM clientes ORDER BY id");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            return 'Erro ao buscar a pessoa' . $ex->getMessage();
        }
    }

    public function insere($dados) {
    
      $this->nome       = $dados[0];
      $this->cpf        = $dados[1];
      $this->logradouro = $dados[2];
      $this->numero     = $dados[3];
      $this->bairro     = $dados[4];
      $this->cidade     = $dados[5];
      $this->cep        = $dados[6];
      $this->estado     = $dados[7];

      $query = $this->conn->conectar()->prepare("INSERT INTO public.clientes(nome, cpf, logradouro, numero, bairro, cidade, cep, estado) VALUES ('".$this->nome."', '".$this-cpf."', '".$this->logradouro."', ".$this->numero.", '".$this->bairro."', '".$this->cidade."', '".$this->cep."', '".$this->estado."');");
      
      if ($query->execute()) {
          return 1;
      } else {
          return 0;
      }
    }

    public function deleta($dados) {
        $this->idPessoa = $dados;
        $query = $this->conn->conectar()->prepare("DELETE FROM public.clientes WHERE id = :idPessoa;");
        $query->bindParam(':idPessoa', $this->idPessoa, PDO::PARAM_INT);
        if ($query->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function atualiza($dados) {
      
      $this->idPessoa   = $dados[0];
      $this->nome       = $dados[1];
      $this->cpf        = $dados[2];
      $this->logradouro = $dados[3];
      $this->numero     = $dados[4];
      $this->cidade     = $dados[5];
      $this->cep        = $dados[6];
      $this->estado     = $dados[7];

      $query = $this->conn->conectar()->prepare("UPDATE public.clientes SET nome=:nome, cpf=:cpf, logradouro=:logradouro, numero=:numero, cidade=:cidade, cep=:cep, estado=:estado WHERE id=:idPessoa);");
      $query->bindParam(':idPessoa',   $this->idPessoa,   PDO::PARAM_INT);
      $query->bindParam(':nome',       $this->nome,       PDO::PARAM_STR);
      $query->bindParam(':cpf',        $this->cpf,        PDO::PARAM_STR);
      $query->bindParam(':logradouro', $this->logradouro, PDO::PARAM_STR);
      $query->bindParam(':numero',     $this->numero,     PDO::PARAM_INT);
      $query->bindParam(':cidade',     $this->cidade,     PDO::PARAM_STR);
      $query->bindParam(':cep',        $this->cep,        PDO::PARAM_INT);
      $query->bindParam(':estado',     $this->estado,     PDO::PARAM_STR);

      if ($query->execute()) {
          return 1;
      } else {
          return 0;
      }
    }
}