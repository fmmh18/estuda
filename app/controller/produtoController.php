<?php

namespace App\controller;

include_once "../model/Conexao.php";
include_once "../model/produtoModel.php";
use App\model\produtoModel;

class produtoController
{
    public function produtoListar()
    {
        $produtomodel = new produtoModel();
        $produtos = $produtomodel->listarProduto();
        return $produtos;
    }
}