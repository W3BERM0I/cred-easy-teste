<?php

namespace Sicredi\Credeasy\Dao;

require __DIR__ . '/../../vendor/autoload.php';

use Sicredi\Credeasy\Modelo\Emprestimo;

interface EmprestimoDao
{
    public function insere(Emprestimo $emprestimo): Emprestimo;
    public function listaEmprestimos(): array;
    public function listaEmprestimoId(int $id): Emprestimo;
}
