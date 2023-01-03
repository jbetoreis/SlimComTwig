<?php
require "../bootstrap.php";  // Inicializando

use Slim\Http\Request;
use Slim\Http\Response;

/* $app->group('/admin', function() use($app){  // Agrupando tipos de requisição na rota /admin/...
    $app->get('/login', function(){  // requisição do tipo get na raiz
        echo "Hello World";
    });
});

$app->group('/site', function() use($app){  // Agrupando tipos de requisição na rota /admin/...
    $app->get('/contato', function(){  // requisição do tipo get na raiz
        echo "123";
    });
}); */


$app->get('/', 'app\controllers\HomeController:index');
$app->get('/user/show/{id}', 'app\controllers\UserController:show');

$app->run();

?>