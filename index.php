<?
session_start();
$_SESSION['userID'] = md5(date('Y-m-d H:i:s'));

include "app/model/Conexao.php";
include "app/model/produtoModel.php";
use App\model\produtoModel;
$produtomodel = new produtoModel();
$produtos = $produtomodel->listarProduto();

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
        <? foreach($produtos as $key => $value) { ?>
            <div class="card m-auto" style="width: 18rem;margin-bottom: 10px !important;">
                <div class="card-body">
                <img src="https://s1.static.brasilescola.uol.com.br/artigos/-5be0989bbc0c9.jpg?i=https://brasilescola.uol.com.br/upload/conteudo/images/-5be0989bbc0c9.jpg" class="card-img-top" alt="...">
                    <h5 class="card-title"><?=$value->titulo?></h5>
                    <p class="card-text text-justify"><?=$value->descricao?></p>
                    <p><b>R$ <?=number_format($value->valor,2,',','.')?></b></p>
                    <input type="number" id="inputQtd" class="form-control col-8 float-left" min="0" size="3" maxlength="3"/> <a href="javascript:void(0);" onclick="adicionar(<?=$value->id?>,document.getElementById('inputQtd').value)" class="btn btn-primary col-3 float-right"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>

        <? }?>
        <? print_r($_SESSION); ?>
    </div>
</div>
<nav class="navbar   navbar-dark bg-secondary">
    <a class="navbar-brand text-center" href="#">direito ao Flávio Hayashida</a>
</nav>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js" integrity="sha256-C6CB9UYIS9UJeqinPHWTHVqh/E1uhG5Twh+Y5qFQmYg=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    function adicionar(id,val)
    {
        // alert(id + "qtd: "+val);
        $.ajax({
            type: "GET",
            url: 'function.php?acao=add&id='+id+'&qtd='+val,
            data: '',
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