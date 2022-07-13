<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Helper\RenderizadorDeHtmlTrait;

class PrimeiraTela implements InterfaceControladorRequisicao
{
  use RenderizadorDeHtmlTrait;
  public function processaRequisicao(): void
  {
    echo $this->renderizaHtml('/primeira_tela.php', []);
  }
}
