<?php

namespace Sicredi\Credeasy\Dao\PDO;

require __DIR__ . '/../../../vendor/autoload.php';

use Sicredi\Credeasy\Dao\EmprestimoDao;
use Sicredi\Credeasy\Modelo\Emprestimo;

class PdoEmprestimoDao implements EmprestimoDao
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function insere(Emprestimo $emprestimo): Emprestimo
    {
        $sql = 'INSERT INTO emprestimo 
                    (data_solicitacao, taxa_juros, valor, status, cliente_id) 
                VALUES 
                    (:dataSolicitacao, :taxa, :valor, :status, :idCliente);';

        $stmt = $this->conexao->prepare($sql);

        $sucesso = $stmt->execute([
            ':dataSolicitacao' => $emprestimo->dataDeSolicitacao->format('Y-m-d'),
            ':taxa' => $emprestimo->taxaDeJuros,
            ':valor' => $emprestimo->valor,
            ':status' => $emprestimo->status,
            ':idCliente' => $emprestimo->cliente->id
        ]);

        if ($sucesso) {
            $emprestimo->id = $this->conexao->lastInsertId();
        }

        return $emprestimo;
    }

       
}