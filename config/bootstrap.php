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
    'user'           => 'postgres',
    'password'       => 'admin',
    'host'           => 'localhost',
    'port'           => 5432,
    'dbname'         => 'banco',
    'charset'        => 'UTF-8',
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
