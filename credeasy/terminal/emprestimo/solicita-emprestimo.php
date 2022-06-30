<?php

require __DIR__ . '/../../vendor/autoload.php';

use Sicredi\Credeasy\Dao\Doctrine\DoctrineClienteDao;
use Sicredi\Credeasy\Dao\Doctrine\DoctrineEmprestimoDao;
use Sicredi\Credeasy\Dao\Doctrine\DoctrineParcelaDao;
use Sicredi\Credeasy\Persistencia\EntityManagerFactory;
use Sicredi\Credeasy\Service\SolicitarEmprestimoService;


$valor = $argv[1];
$quantidadeDeParcelas = $argv[2];
$clienteId = $argv[3];

$entityManager = EntityManagerFactory::getEntityManager();

$clienteDao = new DoctrineClienteDao($entityManager);
$parcelaDao = new DoctrineParcelaDao($entityManager);
$emprestimoDao = new DoctrineEmprestimoDao($entityManager);

$service = new SolicitarEmprestimoService($clienteDao, $emprestimoDao, $parcelaDao);
try {
    $service->registraSolicitacaoDeEmprestimo($valor, $quantidadeDeParcelas, $clienteId);
} catch (DomainException $e) {
    echo "Falha ao registras solicitação de empréstimo! {$e->getMessage()}" . PHP_EOL;
}
