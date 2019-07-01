<?php

include_once "../model/Conexao.php";
include_once "../model/pedidoModel.php";
use App\model\pedidoModel;

$pedidomodel = new pedidoModel();


$action     = $_GET['action'];
$id         = $_POST['id'] == '' ? $_GET['id'] : $_POST['id'];
$titulo     = $_POST['titulo'];
$valor      = $_POST['valor'];
$descricao  = $_POST['descricao'];

if($action == 'editar'){

    $pedido = array('titulo'=>$titulo,'descricao'=>$descricao,'valor'=>$valor,'id'=>$id);
    $update = $pedidomodel->editarPedido($pedido);

    if($update == 1){
        header("location: ../../admin/pedido/editar?id={$id}&msg=1");
        exit;
    }else{
        header("location: ../../admin/pedido/editar?id={$id}&msg=2");
        exit;
    }

}else if($action == 'adicionar'){

    $pedido = array('titulo'=>$titulo,'descricao'=>$descricao,'valor'=>$valor);
    $insert = $pedidomodel->cadastrarPedido($pedido);

    if($insert == 1){
        header("location: ../../admin/pedido/adicionar?msg=1");
        exit;
    }else{
        header("location: ../../admin/pedido/adicionar?msg=2");
        exit;
    }
}else if($action == 'deletar'){
    $delete = $pedidomodel->deletarPedido($id);
    if($delete == 1){
        header("location: ../../admin/pedido/?msg=1");
        exit;
    }else{
        header("location: ../../admin/pedido/?msg=2");
        exit;
    }

}