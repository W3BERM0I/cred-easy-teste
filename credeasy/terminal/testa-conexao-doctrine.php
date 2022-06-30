<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Sicredi\Credeasy\Persistencia\EntityManagerFactory;

$entityManager = EntityManagerFactory::getEntityManager();
var_dump($entityManager->getConnection());