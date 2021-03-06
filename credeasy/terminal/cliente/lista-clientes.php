<?php

require __DIR__ . '/../../vendor/autoload.php';

use Sicredi\Credeasy\Dao\Doctrine\DoctrineClienteDao;
use Sicredi\Credeasy\Persistencia\EntityManagerFactory;
use Sicredi\Credeasy\Service\CadastraClienteService;

$dao = new DoctrineClienteDao(EntityManagerFactory::getEntityManager());

$service = new CadastraClienteService($dao);
$clientes = $service->listaClientes();

print_r($clientes);
