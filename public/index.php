<?php
require "../bootstrap.php";  // Inicializando

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/* $app->group('/admin', function() use($app){  // Agrupando tipos de requisição na rota /admin/...
    $app->get('/login', function(){
        echo "Hello World";
    });
});

$app->group('/site', function() use($app){  // Agrupando tipos de requisição na rota /admin/...
    $app->get('/contato', function(){
        echo "123";
    });
}); */



$app->get('/', 'app\controllers\HomeController:index');
$app->get('/msg', 'app\controllers\HomeController:mensagem');

$app->get('/contato', 'app\controllers\ContatoController:index');
$app->get('/user/show/{id}', app\controllers\UserController::class . ':show');
$app->post('/user/insert', app\controllers\UserController::class . ':insert');

$app->run();

?>