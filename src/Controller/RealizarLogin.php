<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Entity\Cliente;
use Sicredi\Credeasy\Infra\EntityManagerCreator;
use Sicredi\Credeasy\Helper\FlashMessageTrait;
use Sicredi\Credeasy\Controller\InterfaceControladorRequisicao;

class RealizarLogin implements InterfaceControladorRequisicao
{
  use FlashMessageTrait;

   /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioDeUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCliente = $entityManager
            ->getRepository(Cliente::class);
    }

  public function processaRequisicao(): void
  {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (is_null($email) || $email === false) {
      $this->defineMensagem('danger', "O E-mail digitado não é um E-mail valido");
      header('Location: /login');
      return;
    }

    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $cliente = $this->repositorioDeCliente->findOneBy(['email' => $email]);

    if (is_null($cliente) || !$cliente->senhaEstaCorreta($senha)) {
      $this->defineMensagem('danger', 'E-mail ou senha invalidos');
      header('Location: /login');
      return;
    }
    $_SESSION['logado'] = true;
    header('Location: /principal');
  }
}
