<?php

namespace App\model;

class PedidoModel extends Conexao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function detalhePedido($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pedido WHERE idpedido = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function listarPedido()
    {
        $pedido = $this->pdo->query("SELECT * FROM pedido")->fetchAll(\PDO::FETCH_OBJ);
        return $pedido;
    }

    public function cadastrarPedido($pedido)
    {
        $stmt = $this->pdo->prepare("INSERT INTO pedido (datapedido, totitenspedido, totpedido, statuspedido) VALUES (:data,:totitens,:tot,:status)");
        $stmt->execute(array(':data'=>$pedido['data'],
                             ':totitens'=>$pedido['totitens'],
                             ':tot'=>$pedido['tot'],
                             ':status'=>1
        ));
        return $stmt->rowCount();
    }

    public function editarPedido($pedido)
    {
        $stmt = $this->pdo->prepare("UPDATE pedido SET datapedido = :descricao,totitenspedido = :valor,totpedido = :tot,statuspedido = :status WHERE idpedido = :id");
        $stmt->execute(array(':data'=>$pedido['data'],
            ':totitens'=>$pedido['totitens'],
            ':tot'=>$pedido['tot'],
            ':status'=>1,
            ':id'=>$pedido['id']
        ));
        return $stmt->rowCount();
    }

    public function deletarPedido($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM pedido WHERE idpedido = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->rowCount();
    }

}