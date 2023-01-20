<?php
namespace app\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\models\User;

class UserController extends Controller{
    public function index(Request $request, Response $response, array $args){
        $this->view('users', ['title' => 'Página Users']);
        
        return $response;
    }

    public function show(Request $request, Response $response, array $args){
        require path() . '/config/bootstrap.php';

        $repositorio = $entityManager->getRepository("app\models\User");
        $user = $repositorio->findBy([], ['id' => 'ASC']);
        $dados = array_map(function($e){
            return $e->serialize();
        }, $user);
        
        return $this->response($dados, $response, 200);
    }

    public function insert(Request $request, Response $response, array $args){
        require path() . '/config/bootstrap.php';

        $parametros = $request->getParsedBody();
        $user = new User();
        $user->setNome($parametros['user_nome']);
        $user->setEmail($parametros['user_email']);
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->response(['id' => $user->getId()], $response, 200);
    }
}

?>