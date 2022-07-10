<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Helper\RenderizadorDeHtmlTrait;

class SolicitarEmprestimo implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtmlTrait;
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('/solicitar_emprestimo.php', []);
    }
}