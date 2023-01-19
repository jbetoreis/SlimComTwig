<?php
namespace app\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require "../app/src/bootstrap.php";

class UserController extends Controller{
    public function show(Request $request, Response $response, array $args){
        $this->view('users', ['title' => 'Página Users']);
        return $response;
    }

    public function insert(Request $request, Response $response, array $args){
        $parametros = $request->getParsedBody();
        
        /* $user->setNome($parametros->user_nome);
        $user->setEmail($parametros->user_email);
        $entityManager->persist($user);
        $entityManager->flush(); */
        return $response;
    }
}

?>