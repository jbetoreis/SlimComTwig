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
        require path() . '/config/bootstrap.php';

        $parametros = $request->getParsedBody();
        $user = new User();
        $user->setNome($parametros['user_nome']);
        $user->setEmail($parametros['user_email']);
        $entityManager->persist($user);
        $entityManager->flush();
        return $response;
    }
}

?>