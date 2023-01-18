<?php
require 'vendor/autoload.php';

// Dependencias Slim
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

// Dependencias Doctrine
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

// Boostrap Slim
$app = AppFactory::create();

$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true);

$app->addBodyParsingMiddleware();

// Bootstrap Doctrine
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__ . "/app/models/"),
    isDevMode: true,
);

// configuring the database connection
$connection = DriverManager::getConnection([
    'driver'         => 'pdo_pgsql',
    'user'           => 'postgres',
    'password'       => 'admin',
    'host'           => 'localhost',
    'port'           => 5432,
    'dbname'         => 'banco',
    'charset'        => 'UTF-8',
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
