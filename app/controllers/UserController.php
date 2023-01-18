<?php
namespace app\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use app\models\User;

class UserController extends Controller{
    public function show(Request $request, Response $response, array $args){
        $this->view('users', ['title' => 'Página Users']);
        return $response;
    }

    public function insert(Request $request, Response $response, array $args){
        $parametros = $request->getParsedBody();
        json($parametros);
        return $response;
    }
}

?>