<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Controller\InterfaceControladorRequisicao;
use Sicredi\Credeasy\Helper\RenderizadorDeHtmlTrait;

class Cadastrar implements InterfaceControladorRequisicao
{
  use RenderizadorDeHtmlTrait;
  public function processaRequisicao(): void
  {
    echo $this->renderizaHtml('/cadastrar.php', []);
  }
}
