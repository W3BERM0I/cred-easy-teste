<?php

namespace Sicredi\Credeasy\Dao\Doctrine;

use Doctrine\ORM\EntityManager;
use Sicredi\Credeasy\Dao\ClienteDao;
use Sicredi\Credeasy\Modelo\Cliente;
use Sicredi\Credeasy\Persistencia\EntityManagerFactory;

require __DIR__ . '/../../../vendor/autoload.php';


class DoctrineClienteDao implements ClienteDao
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    
    public function insere(Cliente $cliente): Cliente
    {
        $this->em->persist($cliente);
        $this->em->flush();

        return $cliente;
    }

    public function listaTodos(): array
    {
        $clienteRepository = $this->em->getRepository(Cliente::class);
        return $clienteRepository->findAll();
    }

    public function pesquisaPorId(int $id): Cliente
    {
        return $this->em->find(Cliente::class, $id);
    }
}