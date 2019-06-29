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
        <div class="col-6">
            <p ><h5>Comprar com sua conta</h5></p>
            <form method="post" action="action">
                <input type="hidden" name="acao" value="finalizar-compra"/>
                <div class="form-group">
                    <label for="inputNome"><b>E-mail</b></label>
                    <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="inputSenha"><b>Senha</b></label>
                    <input type="password" class="form-control" id="inputSenha" name="inputSenha" placeholder="Senha">
                </div>
                <input type="submit" name="button" value="Acessar" class="btn btn-primary float-right"/>
            </form>
        </div>
        <div class="col-6">
            <p><h5>Criar uma nova conta</h5></p>
            <form method="post" action="action">
                <input type="hidden" name="acao" value="finalizar-compra"/>
                <div class="form-group">
                    <label for="inputNome"><b>Nome</b></label>
                    <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="inputEmail"><b>E-mail</b></label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail">
                </div>
                <input type="submit" name="button"  value="Cadastrar" class="btn btn-primary float-right"/>
            </form>
        </div>
    </div>
    <div class="col-12">&nbsp;</div>
</div>
<nav class="navbar navbar-dark bg-secondary">
    <div class="col-12">&nbsp;</div>
</nav>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js" integrity="sha256-C6CB9UYIS9UJeqinPHWTHVqh/E1uhG5Twh+Y5qFQmYg=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>