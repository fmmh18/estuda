<?
session_start();

if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
} //adiciona produto

if($_POST['acao'] == 'add') {
    $id = intval($_POST['id']);
    $qtd = intval($_POST['qtd']);
    if (!isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] = $qtd;
    }
}
if($_POST['acao'] == 'del') {
    $id = intval($_POST['id']);
    if (isset($_SESSION['carrinho'][$id])) {
        unset($_SESSION['carrinho'][$id]);
    }
}
if($_POST['acao'] == 'edt'){
    $prod[$_POST['id']] = $_POST['qtd'];
   // print_r($prod);exit;
    if(is_array($prod)){
        foreach($prod as $id => $qtd){
            $id  = intval($id);
            $qtd = intval($qtd);
            if(!empty($qtd) || $qtd <> 0){
                $_SESSION['carrinho'][$id] = $qtd;
            }else{
                unset($_SESSION['carrinho'][$id]);
            }
        }
    }
}