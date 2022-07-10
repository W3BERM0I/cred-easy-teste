<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Entity\Cliente;
use Sicredi\Credeasy\Infra\EntityManagerCreator;
use Sicredi\Credeasy\Entity\Emprestimo;

class CriaEmprestimo implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {
        $this->em = ((new EntityManagerCreator)->getEntityManager());
        $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
        $qtdParcelas = filter_input(INPUT_POST, 'qtdParcelas', FILTER_SANITIZE_STRING);
        // $cliente = $_SESSION['cliente'];
        $data =  date('Y/m/d');
        $cliente = (($this->em->getRepository(Cliente::class))->find(1));

        $emprestimo = new Emprestimo($valor, $qtdParcelas, $data, $cliente);
        $this->em->persist($emprestimo);
        $this->em->flush();

        header('Location: /principal');
        return;
    }
}