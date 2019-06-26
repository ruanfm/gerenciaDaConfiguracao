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
        try {
            $this->idProduto = $dado;
            $query = $this->conn->conectar()->prepare("SELECT id,descricao,fabricante WHERE id =" . $this->idProduto);
            $query->bindParam(':idProduto', $this->idProduto, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        } catch (PDOException $ex) {
            return 'Erro ao buscar o produto' . $ex->getMessage();
        }
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
        try {
            $this->descricao = $dados['descricao'];
            $this->fabricante = $dados['fabricante'];

            $query = $this->conn->conectar()->prepare("INSERT INTO public.produtos(descricao, fabricante)VALUES (':descricao', ':fabricante');");

            $query->bindParam("descricao", $this->descricao, PDO::PARAM_STR);
            $query->bindParam("fabricante", $this->fabricante, PDO::PARAM_STR);

            if ($query->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Erro ao inserir o produto' . $ex->getMessage();
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
        try {
            $this->idProduto = $dados['idProduto'];
            $this->descricao = $dados['descricao'];
            $this->fabricante = $dados['fabricante'];

            $query = $this->conn->conectar()->prepare("UPDATE public.produtos SET 'descricao'=:descricao, 'fabricante'=:fabricante WHERE id=:idProduto');");
            $query->bindParam(':idProduto', $this->idProduto, PDO::PARAM_INT);
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
            $query->bindParam(':fabricante', $this->fabricante, PDO::PARAM_STR);

            if ($query->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Erro ao atualizar os produtos' . $ex->getMessage();
        }
    }

}
