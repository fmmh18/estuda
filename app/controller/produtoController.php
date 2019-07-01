<?php

include_once "../model/Conexao.php";
include_once "../model/produtoModel.php";
use App\model\produtoModel;

$produtomodel = new produtoModel();


$action     = $_GET['action'];
$id         = $_POST['id'] == '' ? $_GET['id'] : $_POST['id'];
$titulo     = $_POST['titulo'];
$valor      = $_POST['valor'];
$descricao  = $_POST['descricao'];

if($action == 'editar'){

    $produto = array('titulo'=>$titulo,'descricao'=>$descricao,'valor'=>$valor,'id'=>$id);
    $update = $produtomodel->editarProduto($produto);

    if($update == 1){
        header("location: ../../admin/produto/editar?id={$id}&msg=1");
        exit;
    }else{
        header("location: ../../admin/produto/editar?id={$id}&msg=2");
        exit;
    }

}else if($action == 'adicionar'){

    $produto = array('titulo'=>$titulo,'descricao'=>$descricao,'valor'=>$valor);
    $insert = $produtomodel->cadastrarProduto($produto);

    if($insert == 1){
        header("location: ../../admin/produto/adicionar?msg=1");
        exit;
    }else{
        header("location: ../../admin/produto/adicionar?msg=2");
        exit;
    }
}else if($action == 'deletar'){
    $delete = $produtomodel->deletarProduto($id);
    if($delete == 1){
        header("location: ../../admin/produto/?msg=1");
        exit;
    }else{
        header("location: ../../admin/produto/?msg=2");
        exit;
    }

}