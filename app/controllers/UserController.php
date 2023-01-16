<?php
namespace app\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use app\models\User;

class UserController extends Controller{
    public function show(Request $request, Response $response, array $args){
        $user = new User;
        $resultado = $user->all();
        $this->view('users', ['title' => 'Página Users', 'usuarios' => $resultado]);
        return $response;
    }

    public function insert(Request $request, Response $response, array $args){
        $parametros = $request->getParsedBody();
        json($parametros);
        return $response;
    }
}

?>