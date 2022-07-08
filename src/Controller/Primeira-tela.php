<?php

namespace User06\Mvc\Controller;

use User06\Mvc\Helper\RenderizadorDeHtmlTrait;

class PrimeiraTela implements InterfaceControladorRequisicao
{
  use RenderizadorDeHtmlTrait;
  public function processaRequisicao(): void
  {
    echo $this->renderizaHtml('primeira_tela.php', []);
  }
}
