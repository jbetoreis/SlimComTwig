<?php
namespace app\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller{
    public function index(Request $request, Response $response, array $args){
        $this->view('home', [
            'nome' => 'José',
            'title' => 'Página Home' 
        ]);
        return $response;
    }
    public function mensagem(Request $request, Response $response, array $args){
        json(["msg" => "Olá Mundo"]);
        return $response;
    }
}

?>