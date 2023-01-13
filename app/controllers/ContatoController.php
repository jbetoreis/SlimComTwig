<?php

?><?php
namespace app\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ContatoController extends Controller{
    public function index(Request $request, Response $response, array $args){
        $this->view('contato', [
            'nome' => 'José',
            'title' => 'Página Contato' 
        ]);
        return $response;
    }
}

?>