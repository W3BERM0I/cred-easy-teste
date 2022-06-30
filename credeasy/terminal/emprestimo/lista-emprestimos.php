<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Sicredi\Credeasy\Dao\Doctrine\DoctrineEmprestimoDao;
use Sicredi\Credeasy\Persistencia\EntityManagerFactory;
use Sicredi\Credeasy\Service\ListaEmprestimoService;

$dao = new DoctrineEmprestimoDao(EntityManagerFactory::getEntityManager());

$service = new ListaEmprestimoService($dao);
$emprestimos = $service->listaEmprestimos();

foreach ($emprestimos as $emprestimo) {
  echo $emprestimo->valor;
}

/*


$service = new CadastraClienteService($dao);
$clientes = $service->listaClientes();

foreach ($clientes as $cliente) {
    echo $cliente->nome . PHP_EOL;
}
 */