<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Sicredi\Credeasy\Dao\Doctrine\DoctrineClienteDao;
use Sicredi\Credeasy\Modelo\Cliente;
use Sicredi\Credeasy\Persistencia\EntityManagerFactory;

$entityManager = EntityManagerFactory::getEntityManager();

$clienteDao = new DoctrineClienteDao($entityManager);

$listaClientes = $clienteDao->listaTodos();

foreach ($listaClientes as $cliente) {
  echo $cliente;
}

echo "conectei!!!!" . PHP_EOL;
