<?php

namespace App\controller;

include "../model/Conexao.php";
include "../model/produtoModel.php";
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