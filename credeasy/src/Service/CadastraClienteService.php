<?php 

namespace Sicredi\Credeasy\Service;

use Sicredi\Credeasy\Dao\ClienteDao;
use Sicredi\Credeasy\Modelo\Cliente;

require __DIR__ . '/../../vendor/autoload.php';

class CadastraClienteService
{
    private $clienteDao;

    public function __construct(ClienteDao $clienteDao)
    {
        $this->clienteDao = $clienteDao;
    }


    public function cadastraCliente($nome, $cpf, $telefone, $endereco, $profissao, $renda, $email, $senha, $tipoDeUsuario): Cliente
    {
        $cliente = new Cliente($nome, $cpf, $telefone, $endereco, $profissao, $renda, $email, $senha, $tipoDeUsuario);
        return $this->clienteDao->insere($cliente);
    }

    public function listaClientes(): array
    {
        return $this->clienteDao->listaTodos();
    }
    
}
