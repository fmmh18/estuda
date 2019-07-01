<?
$id = $_GET['id'];
include_once "../../app/model/Conexao.php";
include_once "../../app/model/usuarioModel.php";
$usuariomodel = new \App\model\usuarioModel();
$usuario = $usuariomodel->detalheUsuario($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Paper Dashboard 2 by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="blue" data-active-color="primary">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="../../assets/img/logo-small.png">
                </div>
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                HStore
                <!-- <div class="logo-image-big">
                  <img src="../assets/img/logo-big.png">
                </div> -->
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active ">
                    <a href="../">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="../pedido/">
                        <i class="nc-icon nc-diamond"></i>
                        <p>Pedidos</p>
                    </a>
                </li>
                <li>
                    <a href="../produto/">
                        <i class="nc-icon nc-diamond"></i>
                        <p>Produtos</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="nc-icon nc-pin-3"></i>
                        <p>Usuários</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo">Editar Usuário</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>

        </nav>
        <div class="content">
            <div class="row">
                <div class="col-12">
                <form method="post" action="../../app/controller/usuarioController.php?action=editar" id="forEdt">
                    <input type="hidden" name="id" value="<?=$usuario->id?>" />
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?=$usuario->nome?>" />
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$usuario->telefone?>" />
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?=$usuario->email?>" />
                    </div>
                    <div class="form-group">
                        <label for="data">Data Nascimento</label>
                        <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?=$usuario->nascimento?>" />
                    </div>
                    <div class="form-group">
                        <label for="genero">Gênero</label>
                        <select name="genero" id="genero" class="form-control">
                            <option value="M" <? if($usuario->genero == 'M'){ echo "selected"; }?>>Masculino</option>
                            <option value="F" <? if($usuario->genero == 'F'){ echo "selected"; }?>>Feminino</option>
                            <option value="O" <? if($usuario->genero == 'O'){ echo "selected"; }?>>Outro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="perfil">Perfil</label>
                        <select name="perfil" id="perfil" class="form-control">
                            <option value="1" <? if($usuario->perfil == 1){ echo "selected"; }?>>Administrador</option>
                            <option value="2" <? if($usuario->perfil == 2){ echo "selected"; }?>>Comum</option>
                        </select>
                    </div>
                    <input type="submit" value="editar" class="btn btn-primary btn-block" name="acao" />
                </form>
                </div>
            </div>
        </div>
        <footer class="footer footer-black  footer-white ">
            <div class="container-fluid">
                <div class="row">
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com/" target="_blank">Blog</a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/license" target="_blank">Licenses</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.min.js"></script>
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap.min.js"></script>
<script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
<script>
    $( "#forEdt" ).validate({
    debug: true,
    rules: {
        nome:{
            required: true
        },
        email:{
            required: true
        }
    },
        messages: {
        nome:{required:'Campo nome é obrigatório.'},
        email:{required:'Campo email é obrigatório.'}
        }
    });
</script>
<!-- Chart JS -->
<script src="../../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
<? if($_GET['msg'] == 1){ ?>
    <script>
        $.notify({
            title: "Sucesso",
            message: "Editado com sucesso"
        },{
            type: 'success'
        });
    </script>
<? }else if($_GET['msg'] == 2){ ?>
    <script>
        $.notify({
            title: "Erro",
            message: "Erro ao Editar"
        },{
            type: 'danger'
        });
    </script>
<? } ?>
</body>

</html>