<?php

namespace User06\Mvc\Controller;

use User06\Mvc\Controller\InterfaceControladorRequisicao;
use User06\Mvc\Helper\RenderizadorDeHtmlTrait;

class Cadastrar implements InterfaceControladorRequisicao
{
  use RenderizadorDeHtmlTrait;
  public function processaRequisicao(): void
  {
    echo $this->renderizaHtml('/cadastrar.php', []);
  }
}
