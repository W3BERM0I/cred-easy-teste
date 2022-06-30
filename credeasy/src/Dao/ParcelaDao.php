<?php

namespace Sicredi\Credeasy\Dao;

require __DIR__ . '/../../vendor/autoload.php';

use Sicredi\Credeasy\Modelo\Parcela;

interface ParcelaDao
{
    public function insere(Parcela $parcela): Parcela;
}