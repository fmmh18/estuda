<?php

namespace App\controller;
use App\model\usuarioModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class usuarioController
{
    public function usuarioCadastrar(Request $request, Response $response, array $args)
    {
        $usuariomodel = new usuarioModel();

    }
}