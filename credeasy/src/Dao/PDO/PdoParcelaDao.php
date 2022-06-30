<?php

namespace Sicredi\Credeasy\Dao\PDO;

require __DIR__ . '/../../../vendor/autoload.php';

use Sicredi\Credeasy\Dao\ParcelaDao;
use Sicredi\Credeasy\Modelo\Parcela;

class PdoParcelaDao implements ParcelaDao
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function insere(Parcela $parcela): Parcela
    {
        $sql = 'INSERT INTO parcela 
                    (numero, data_vencimento, multa, valor, status, emprestimo_id) 
                VALUES 
                    (:numero, :dataVencimento, :multa, :valor, :status, :idEmprestimo);';

        $stmt = $this->conexao->prepare($sql);

        $sucesso = $stmt->execute([
            ':numero' => $parcela->numero,
            ':dataVencimento' => $parcela->dataDeVencimento->format('Y-m-d'),
            ':multa' => $parcela->multa,
            ':valor' => $parcela->valor,
            ':status' => $parcela->status,
            ':idEmprestimo' => $parcela->emprestimo->id
        ]);

        if ($sucesso) {
            $parcela->id = $this->conexao->lastInsertId();
        }

        return $parcela;
    }

    }