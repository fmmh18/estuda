<?php

namespace App\model;

class pedidoModel extends Conexao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function detalhePedido($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pedido WHERE id = :id");
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
        $stmt = $this->pdo->prepare("INSERT INTO pedido (data, total_itens, valor_total, status,situacao) VALUES (:data,:totitens,:tot,:status,:situacao)");
        $stmt->execute([':data'=>$pedido['data'],
                             ':totitens'=>$pedido['totitens'],
                             ':tot'=>$pedido['tot'],
                             ':status'=>1,
                             ':situacao'=>'Processando'
        ]);
        return $this->pdo->lastInsertId();
    }

    public function editarPedido($pedido)
    {
        $stmt = $this->pdo->prepare("UPDATE pedido SET data = :descricao,total_itens = :valor,valor_totel = :tot,status = :status,situacao = :situacao WHERE id = :id");
        $stmt->execute(array(':data'=>$pedido['data'],
            ':totitens'=>$pedido['totitens'],
            ':tot'=>$pedido['tot'],
            ':status'=>1,
            ':situacao'=>$pedido['situacao'],
            ':id'=>$pedido['id']
        ));
        return $stmt->rowCount();
    }

    public function cadastraritempedido($itempedido){
        $stmt = $this->pdo->prepare("INSERT INTO item_pedido (id_pedido,id_produto,qtd_produto,valor_item,valor_total) VALUES (:idpedido,:idproduto,:qtdproduto,:valoritem,:valortotal)");
        $stmt->execute(array(':idpedido'=>$itempedido['idpedido'],
            ':idproduto'=>$itempedido['idproduto'],
            ':qtdproduto'=>$itempedido['qtdproduto'],
            ':valoritem'=>$itempedido['valoritem'],
            ':valortotal'=>$itempedido['valortotal']
        ));
        return $stmt->rowCount();
    }

    public function deletarPedido($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM pedido WHERE id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->rowCount();
    }

}