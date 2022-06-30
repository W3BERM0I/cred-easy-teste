<?php

namespace Sicredi\Credeasy\Dao;

require __DIR__ . '/../../vendor/autoload.php';

use Sicredi\Credeasy\Modelo\Cliente;

interface ClienteDao
{
    public function insere(Cliente $cliente): Cliente;
    
    public function listaTodos(): array;
    
    public function pesquisaPorId(int $id): Cliente;
}