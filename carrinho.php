<?
session_start();

include "app/model/Conexao.php";
include "app/model/produtoModel.php";
use App\model\produtoModel;
$produtomodel = new produtoModel();

?>
<!doctype html>
<html lang="pt-BR">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hayashida Store</title>
    <script>

    </script>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1">HStore</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home</a>
            <a class="nav-item nav-link" href="#">Produtos</a>
        </div>
    </div>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i><sup><span class="badge badge-pill badge-danger"><?=count($_SESSION['carrinho'])?></span></sup></a>
        </li>
    </ul>
</nav>
<div class="container">
    <div class="row" style="margin-top: 5%">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Nome do Produto</b></td>
                    <td><b>Descrição do Produto</b></td>
                    <td><b>Valor Unitário</b></td>
                    <td><b>Quantidade</b></td>
                    <td colspan="2">&nbsp;</td>
                </tr>
            </thead>
                <?
                    $total = 0;
                    foreach($_SESSION['carrinho'] as $key => $value){
                    $produto = $produtomodel->detalheProduto($key);
                    $total += $value*$produto->valor;
                ?>
                <tr>
                    <td><?=$key?></td>
                    <td><?=$produto->titulo?></td>
                    <td><?=$produto->descricao?></td>
                    <td>R$ <?=number_format($produto->valor,2,',','.')?></td>
                    <td><input type="number" id="inputQtd<?=$key?>" class="form-control col-6 float-left" value="<?=$value?>" min="0" size="3" maxlength="3"/></td>
                    <td><a href="javascript:void(0)" onclick="editar(<?=$key?>,document.getElementById('inputQtd<?=$key?>').value)"   class="btn btn-primary"><i class="fa fa-edit"></i> </a></td>
                    <td><a href="javascript:void(0)" onclick="excluir(<?=$key?>)" class="btn btn-danger"><i class="fa fa-trash"></i> </a></td>
                </tr>
                <? } ?>
            <tr>
                <td colspan="5" class="text-right"><b>Valor Total</b></td>
                <td colspan="2"><b>R$ </b><?=number_format($total,2,',','.')?></td>
            </tr>
        </table>
        <inp class="col-12" style="margin-bottom: 10px">
            <a href="/estuda" class="btn-primary btn">Continuar Comprando</a>
            <a href="finalizar" class="btn-warning btn float-right">Finalizar Compra</a>
        </div>
    </div>
</div>
<nav class="navbar navbar-dark bg-secondary">
    <div class="col-12">&nbsp;</div>
</nav>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js" integrity="sha256-C6CB9UYIS9UJeqinPHWTHVqh/E1uhG5Twh+Y5qFQmYg=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    function editar(id,val)
    {
        $.ajax({
            type: "POST",
            url: 'function.php',
            data: { 'acao':'edt','id':id,'qtd':val},
            async: true,
            dataType: 'html',
            success: function(result,status) {
                console.log(result);
            }
        });
    }
    function excluir(id)
    {
        $.ajax({
            type: "POST",
            url: 'function.php',
            data: { 'acao':'del','id':id},
            async: true,
            dataType: 'html',
            success: function(result,status) {
                console.log(result);
            }
        });
    }
</script>
</body>
</html>