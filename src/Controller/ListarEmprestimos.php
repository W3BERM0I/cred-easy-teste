<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Entity\Emprestimo;
use Sicredi\Credeasy\Helper\RenderizadorDeHtmlTrait;
use Sicredi\Credeasy\Infra\EntityManagerCreator;

class ListarEmprestimos implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtmlTrait;
    private $em;

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('listar_emprestimo.php', []);
    }

    public function listaEmprestimos(): array
    {
        $this->em = ((new EntityManagerCreator)->getEntityManager())->getRepository(Emprestimo::class);
        $emprestimos = $this->em->findAll();
        return $emprestimos;
    }
}