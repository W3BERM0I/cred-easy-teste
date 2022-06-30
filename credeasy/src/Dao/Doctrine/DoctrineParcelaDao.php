<?php

namespace Sicredi\Credeasy\Dao\Doctrine;

require __DIR__ . '/../../../vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Sicredi\Credeasy\Dao\ParcelaDao;
use Sicredi\Credeasy\Modelo\Parcela;

class DoctrineParcelaDao implements ParcelaDao
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function insere(Parcela $parcela): Parcela
    {
        $this->em->persist($parcela);
        $this->em->flush();

        return $parcela;
    }

}