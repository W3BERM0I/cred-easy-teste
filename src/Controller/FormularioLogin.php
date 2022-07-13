<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Helper\RenderizadorDeHtmlTrait;

class FormularioLogin implements InterfaceControladorRequisicao
{
  use RenderizadorDeHtmlTrait;
  public function processaRequisicao(): void
  {
    echo $this->renderizaHtml('/entrar.php', []);
  }
}
