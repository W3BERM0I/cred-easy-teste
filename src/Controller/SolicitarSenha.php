<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Helper\RenderizadorDeHtmlTrait;

class SolicitarSenha implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtmlTrait;
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('/recuperarSenha.php', []);
    }
}