<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
include_once "app/controller/produtoController.php";
use App\controller\produtoController;

$produtocontroller = new produtoController();

$produtos = $produtocontroller->produtoListar();

print_r($produtos);