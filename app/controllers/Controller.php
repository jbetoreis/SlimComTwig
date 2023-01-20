<?php
namespace app\controllers;
use app\traits\View;
use Psr\Http\Message\ResponseInterface;

class Controller{
    use View;

    public static function response($data, ResponseInterface $response, int $statusCode=200)
    {
        $response->getBody()->write(json_encode($data));

        return $response->withStatus($statusCode)->withHeader('content-type', 'application/json');
    }
}
?>