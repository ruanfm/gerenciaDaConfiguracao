<?php

<<<<<<< HEAD
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
        try {
            $this->idPessoa = $dado;
            $query = $this->conn->conectar()->prepare("SELECT id,nome, cpf, logradouro, numero, bairro, cidade, cep, estado FROM clientes WHERE id =" . $this->idPessoa);
            $query->bindParam(':idPessoa', $this->idPessoa, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        } catch (PDOException $ex) {
            return 'Erro ao buscar a pessoa' . $ex->getMessage();
        }
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
      try {
          $this->nome       = $dados['nome'];
          $this->cpf        = $dados['cpf'];
          $this->logradouro = $dados['logradouro'];
          $this->numero     = $dados['numero'];
          $this->bairro     = $dados['bairro'];
          $this->cidade     = $dados['cidade'];
          $this->cep        = $dados['cep'];
          $this->estado     = $dados['estado'];
          
          $query = $this->conn->conectar()->prepare("INSERT INTO public.clientes(nome, cpf, logradouro, numero, bairro, cidade, cep, estado) VALUES (':nome', ':cpf', ':logradouro', ':numero', ':bairro', ':cidade', ':cep', ':estado');");

          $query->bindParam("nome",       $this->nome,        PDO::PARAM_STR);
          $query->bindParam("cpf",        $this->cpf,         PDO::PARAM_STR);
          $query->bindParam("logradouro", $this->logradouro,  PDO::PARAM_STR);
          $query->bindParam("numero",     $this->numero,      PDO::PARAM_INT);
          $query->bindParam("bairro",     $this->bairro,      PDO::PARAM_STR);
          $query->bindParam("cidade",     $this->cidade,      PDO::PARAM_STR);
          $query->bindParam("cep",        $this->cep,         PDO::PARAM_STR);
          $query->bindParam("estado",     $this->estado,      PDO::PARAM_STR);

          if ($query->execute()) {
              return 'ok';
          } else {
              return 'erro';
          }
      } catch (PDOException $ex) {
          return 'Erro ao inserir a pessoa' . $ex->getMessage();
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
        try {
            $this->idPessoa   = $dados['idPessoa'];
            $this->nome       = $dados['nome'];
            $this->cpf        = $dados['cpf'];
            $this->logradouro = $dados['logradouro'];
            $this->numero     = $dados['numero'];
            $this->cidade     = $dados['cidade'];
            $this->cep        = $dados['cep'];
            $this->estado     = $dados['estado'];

            $query = $this->conn->conectar()->prepare("UPDATE public.clientes SET 'nome'=:nome, 'cpf'=:cpf, 'logradouro'=:logradouro, 'numero'=:numero, 'cidade'=:cidade, 'cep'=:cep, 'estado'=:estado WHERE id=:idPessoa');");
            $query->bindParam(':idPessoa',   $this->idPessoa,   PDO::PARAM_INT);
            $query->bindParam(':nome',       $this->nome,       PDO::PARAM_STR);
            $query->bindParam(':cpf',        $this->cpf,        PDO::PARAM_STR);
            $query->bindParam(':logradouro', $this->logradouro, PDO::PARAM_STR);
            $query->bindParam(':numero',     $this->numero,     PDO::PARAM_INT);
            $query->bindParam(':cidade',     $this->cidade,     PDO::PARAM_STR);
            $query->bindParam(':cep',        $this->cep,        PDO::PARAM_INT);
            $query->bindParam(':estado',     $this->estado,     PDO::PARAM_STR);
            
            if ($query->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Erro ao atualizar a pessoa' . $ex->getMessage();
        }
    }

}
=======
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

>>>>>>> 233b9ad7af0fea4f48858c5d79511aa873e8507b
