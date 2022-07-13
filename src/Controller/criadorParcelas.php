<?php

namespace Sicredi\Credeasy\Controller;

use Sicredi\Credeasy\Entity\Emprestimo;
use Sicredi\Credeasy\Infra\EntityManagerCreator;
use Sicredi\Credeasy\Entity\Parcela;

class CriadorParcelas
{
  private $emprestimo;
  public function __construct(Emprestimo $emprestimo)
  {
    $this->emprestimo = $emprestimo;
  }

  public function criaParcelas(): array
  {
    $data = date('Y/m/d');
    for ($i = 1; $i < ($this->emprestimo->getQtdParcelas() + 1); $i++) {
      $parcela = new Parcela($i, ($this->emprestimo->getValorFinal() / $this->emprestimo->getqtdParcelas()), $data, $this->emprestimo);
      $arr[] = $parcela;
    }
    return $arr;
  }
}
