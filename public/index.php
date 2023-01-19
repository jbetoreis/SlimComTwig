<?php
require "../bootstrap.php";  // Inicializando
require "../app/src/bootstrap.php";  // DoctrineORM

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

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

$app->group('/home', function (RouteCollectorProxy $group) {
    $group->get('', 'app\controllers\HomeController:index');
    $group->get('/msg', 'app\controllers\HomeController:mensagem');
});

$app->group('/users', function (RouteCollectorProxy $group) {
    $group->get('/show', app\controllers\UserController::class . ':show');
    $group->post('/insert', app\controllers\UserController::class . ':insert');
});

$app->get('/contato', 'app\controllers\ContatoController:index');

$app->run();
