<?
session_start();

if(empty($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
} //adiciona produto

if($_GET['acao'] == 'add') {
    $id = intval($_GET['id']);
    $qtd = intval($_GET['qtd']);
    if (empty($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] = $qtd;
    }else{
        $_SESSION['carrinho'][$id] = $qtd+$qtd;
    }
}