<?php
namespace app\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController{
    public function show(Request $request, Response $response, array $args){
        print_r($args);
        return $response;
    }

    public function insert(Request $request, Response $response, array $args){
        $parametros = $request->getParsedBody();
        dd($parametros);
        return $response;
    }
}

?>