<?php
require "../bootstrap.php";  // Inicializando
require "../config/bootstrap.php";  // DoctrineORM

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
    $group->get('', app\controllers\UserController::class . ':index');
    $group->get('/show/{id}', app\controllers\UserController::class . ':show');
    $group->post('/insert', app\controllers\UserController::class . ':insert');
    $group->put('/update/{id}', app\controllers\UserController::class . ':update');
    $group->delete('/delete/{id}', app\controllers\UserController::class . ':delete');
});

$app->get('/contato', 'app\controllers\ContatoController:index');

$app->run();
