<?php

include_once "../model/Conexao.php";
include_once "../model/usuarioModel.php";
use App\model\UsuarioModel;

$usuariomodel = new usuarioModel();


$action     = $_GET['action'];
$id         = $_POST['id'] == '' ? $_GET['id'] : $_POST['id'];
$nome       = $_POST['nome'];
$email      = $_POST['email'];
$telefone   = $_POST['telefone'];
$nascimento = $_POST['nascimento'];
$genero     = $_POST['genero'];
$perfil     = $_POST['perfil'];
if($action == 'editar'){

    $usuario = array('nome'=>$nome,'telefone'=>$telefone,'email'=>$email,'nasc'=>$nascimento,'genero'=>$genero,'perfil'=>$perfil,'id'=>$id);
    $update = $usuariomodel->editarUsuario($usuario);

    if($update == 1){
        header("location: ../../admin/usuario/editar?id={$id}&msg=1");
        exit;
    }else{
        header("location: ../../admin/usuario/editar?id={$id}&msg=2");
        exit;
    }

}else if($action == 'adicionar'){

    $usuario = array('nome'=>$nome,'telefone'=>$telefone,'email'=>$email,'nasc'=>$nascimento,'genero'=>$genero,'perfil'=>$perfil,'id'=>$id);
    $insert = $usuariomodel->cadastrarUsuario($usuario);

    if($insert == 1){
        header("location: ../../admin/usuario/adicionar?msg=1");
        exit;
    }else{
        header("location: ../../admin/usuario/adicionar?msg=2");
        exit;
    }
}else if($action == 'deletar'){
    $delete = $usuariomodel->deletarUsuario($id);
    if($delete == 1){
        header("location: ../../admin/usuario/?msg=1");
        exit;
    }else{
        header("location: ../../admin/usuario/?msg=2");
        exit;
    }

}