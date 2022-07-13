<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Entity\Cliente;
use Sicredi\Credeasy\Infra\EntityManagerCreator;

class EfetuaCadastro implements InterfaceControladorRequisicao
{
    private $em;

    public function __construct()
    {
        $this->em = (new EntityManagerCreator())->getEntityManager();
    }

     public function processaRequisicao(): void
     {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
        $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
        $profissao = filter_input(INPUT_POST, 'profissao', FILTER_SANITIZE_STRING);
        $renda = filter_input(INPUT_POST, 'renda', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        $cliente = new Cliente($nome, $cpf, $renda, $endereco, $profissao, $telefone, $email, $senha, 'COMUN');
        $this->em->persist($cliente);
        $this->em->flush();

        header('Location: /login');
        return;
    }
}