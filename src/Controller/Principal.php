<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Helper\RenderizadorDeHtmlTrait;

class Principal implements InterfaceControladorRequisicao
{
  use RenderizadorDeHtmlTrait;
  public function processaRequisicao(): void
  {
    echo $this->renderizaHtml('/principal.php', []);
  }
}
