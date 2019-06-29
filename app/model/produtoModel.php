<?php

namespace App\model;


class produtoModel extends Conexao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function detalheProduto($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produto WHERE id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function listarProduto()
    {
        $produto = $this->pdo->query("SELECT * FROM produto")->fetchAll(\PDO::FETCH_OBJ);
        return $produto;
    }

    public function cadastrarProduto($produto)
    {
        $stmt = $this->pdo->prepare("INSERT INTO produto (titulo,descricao,valor) VALUES (:titulo,:descricao,:valor)");
        $stmt->execute(array(':titulo'=>$produto['titulo'],':descricao'=>$produto['descricao'],
                             ':valor'=>$produto['valor']
        ));
        return $stmt->rowCount();
    }

    public function editarProduto($produto)
    {
        $stmt = $this->pdo->prepare("UPDATE produto SET descricao = :descricao,valor = :valor WHERE idproduto  = :id");
        $stmt->execute(array(':descricao'=>$produto['descricao'],
                             ':valor'=>$produto['valor'],
                             ':id'=>$produto['id']
        ));
        return $stmt->rowCount();
    }

    public function deletarProduto($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM produto WHERE id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->rowCount();
    }

}