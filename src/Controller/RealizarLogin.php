<?php

namespace User06\Mvc\Controller;

use User06\Mvc\Helper\FlashMessageTrait;
use User06\Mvc\Controller\InterfaceControladorRequisicao;

class realizarLogin implements InterfaceControladorRequisicao
{
  use FlashMessageTrait;
  public function processaRequisicao(): void
  {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (is_null($email) || $email === false) {
      $this->defineMensagem('danger', "O E-mail digitado não é um E-mail valido");
      header('Location: /login');
      return;
    }

    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $usuario = $this->repositorioDeUsuarios->findOneBy(['email' => $email]);

    if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
      $this->defineMensagem('danger', 'E-mail ou senha invalidos');
      header('Location: /login');
      return;
    }
    $_SESSION['logado'] = true;
    header('Location: /principal');
  }
}
