<?php

namespace Sicredi\Credeasy\Service;

require __DIR__ . '/../../vendor/autoload.php';

use Sicredi\Credeasy\Dao\Doctrine\DoctrineEmprestimoDao;
use Sicredi\Credeasy\Dao\EmprestimoDao;
use Sicredi\Credeasy\Modelo\Emprestimo;

class ListaEmprestimoService
{
  private EmprestimoDao $dao;

  public function __construct(EmprestimoDao $emprestimoDao)
  {
    $this->dao = $emprestimoDao;
  }

  public function listaEmprestimos(): array
  {
    return $this->dao->listaEmprestimos();
  }

  public function listaEmprestimoId(int $id): Emprestimo
  {
    return $this->dao->listaEmprestimoId($id);
  }
}
