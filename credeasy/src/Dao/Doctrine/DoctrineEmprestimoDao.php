<?php

namespace Sicredi\Credeasy\Dao\Doctrine;

require __DIR__ . '/../../../vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Sicredi\Credeasy\Dao\EmprestimoDao;
use Sicredi\Credeasy\Modelo\Emprestimo;

class DoctrineEmprestimoDao implements EmprestimoDao
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function insere(Emprestimo $emprestimo): Emprestimo
    {
        $this->em->persist($emprestimo);
        $this->em->flush();

        return $emprestimo;
    }

    public function listaTodos(): array
    {
        $clienteRepository = $this->em->getRepository(Emprestimo::class);
        return $clienteRepository->findAll();
    }

    public function pesquisaPorId(int $id): Emprestimo
    {
        return $this->em->find(Emprestimo::class, $id);
    }
}
