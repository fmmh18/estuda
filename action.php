<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
    include "app/model/Conexao.php";
    include "app/model/usuarioModel.php";
    include "app/model/produtoModel.php";
    include "app/model/pedidoModel.php";

    use App\model\usuarioModel;
    use App\model\produtoModel;
    use App\model\pedidoModel;

    $usuariomodel = new usuarioModel();
    $produtomodel = new produtoModel();
    $pedidomodel  = new pedidoModel();

if($_POST['acao'] == 'finalizar-compra')
{
    $total = 0;
    foreach($_SESSION['carrinho'] as $key => $value) {
        $produto = $produtomodel->detalheProduto($key);
        $total += $value * $produto->valor;
        $totalitem += $value;
    }
    $pedido = array('data'=>date('Y-m-d'),'totitens'=>$totalitem,'tot'=>$total);
    $insertpedido = $pedidomodel->cadastrarPedido($pedido);
    print_r($insertpedido);
    foreach($_SESSION['carrinho'] as $key => $value) {

    }
}