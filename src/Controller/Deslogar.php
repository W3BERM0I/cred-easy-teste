<?php

namespace User06\Mvc\Controller;

class Deslogar implements InterfaceControladorRequisicao
{
  public function processaRequisicao(): void
  {
    session_destroy();
    header('Location: /primeira-tela');
  }
}
