<?php

require __DIR__ . '/../../vendor/autoload.php';

use Sicredi\Credeasy\Dao\Doctrine\DoctrineClienteDao;
use Sicredi\Credeasy\Persistencia\EntityManagerFactory;
use Sicredi\Credeasy\Service\CadastraClienteService;

$nome = $argv[1];
$cpf = $argv[2];
$telefone = $argv[3];
$endereco = $argv[4];
$profissao = $argv[5];
$renda = $argv[6];
    
$email= $argv[7];
$senha = $argv[8];
$tipoDeUsuario = $argv[9];

$dao = new DoctrineClienteDao(EntityManagerFactory::getEntityManager());

$cadastraClienteService = new CadastraClienteService($dao);
$clienteCadastrado = $cadastraClienteService->cadastraCliente($nome, 
    $cpf,
    $telefone,
    $endereco,
    $profissao,
    $renda,
    $email,
    $senha,
    $tipoDeUsuario
);

echo "Cliente ({$clienteCadastrado->id}) {$clienteCadastrado->nome} cadastrado(a) com sucesso." . PHP_EOL;

