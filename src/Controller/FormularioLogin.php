<?php

namespace User06\Mvc\Controller;

use User06\Mvc\Helper\RenderizadorDeHtmlTrait;

class FormularioLogin implements InterfaceControladorRequisicao
{
  use RenderizadorDeHtmlTrait;
  public function processaRequisicao(): void
  {
    echo $this->renderizaHtml('entrar.php', []);
  }
}
