<?php

namespace Sicredi\Credeasy\Controller;

class Deslogar implements InterfaceControladorRequisicao
{
  public function processaRequisicao(): void
  {
    session_destroy();
    header('Location: /primeira-tela');
  }
}
