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
        if($args['id'] == 'all'){
            $condicao = [];
        }else{
            $condicao = ['id'=>base64_decode($args['id'])];
        }

        $repositorio = $entityManager->getRepository("app\models\User");
        $user = $repositorio->findBy($condicao, ['id' => 'ASC']);
        $dados = array_map(function($e){
            return $e->serialize();
        }, $user);

        // Criptografia
        for($i = 0;$i < count($dados); $i++){
            $dados[$i]['id_enc'] = base64_encode($dados[$i]['id']);
        }
        
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
        return $this->response(['id' => $user->getId(), 'id_enc' => base64_encode($user->getId())], $response, 200);
    }

    public function update(Request $request, Response $response, array $args){
        require path() . '/config/bootstrap.php';

        $parametros = $request->getParsedBody();
        $user_id = base64_decode($args['id']);
        $repositorio = $entityManager->getRepository("app\models\User");
        $user = $repositorio->find($user_id);
        if(!$user){
            return $this->response(['aviso!' => 'Usuário não encontrado'], $response, 404);
        }

        $user->setNome($parametros['user_nome']);
        $user->setEmail($parametros['user_email']);
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->response(['id' => $user->getId()], $response, 200);
    }
    
    public function delete(Request $request, Response $response, array $args){
        require path() . '/config/bootstrap.php';

        $user_id = base64_decode($args['id']);
        $repositorio = $entityManager->getRepository("app\models\User");
        $user = $repositorio->find($user_id);
        if(!$user){
            return $this->response(['aviso!' => 'Usuário não encontrado'], $response, 404);
        }
        
        $entityManager->remove($user);
        $entityManager->flush();
        return $this->response(['id' => $user_id], $response, 200);
    }
}

?>