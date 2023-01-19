<?php
// Dependencias Doctrine
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;


// Bootstrap Doctrine
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(path() . "/app/models/"),
    isDevMode: true,
);

// configuring the database connection
$connection = DriverManager::getConnection([
    'driver'         => 'pdo_pgsql',
    'user'           => 'beto',
    'password'       => 'postgres',
    'host'           => '10.4.3.151',
    'port'           => 5432,
    'dbname'         => 'beto',
    'charset'        => 'UTF-8',
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
