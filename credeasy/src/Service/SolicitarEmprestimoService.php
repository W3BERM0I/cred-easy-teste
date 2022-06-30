<?php 

namespace Sicredi\Credeasy\Service;

use DateInterval;
use DateTimeImmutable;
use DomainException;
use Exception;
use PDOException;
use Sicredi\Credeasy\Dao\ClienteDao;
use Sicredi\Credeasy\Dao\EmprestimoDao;
use Sicredi\Credeasy\Dao\ParcelaDao;
use Sicredi\Credeasy\Modelo\Emprestimo;
use Sicredi\Credeasy\Modelo\Parcela;
use Sicredi\Credeasy\Persistencia\ConnectionFactory;

require __DIR__ . '/../../vendor/autoload.php';


class SolicitarEmprestimoService
{
    private $clienteDao;
    private $emprestimoDao;
    private $parcelaDao;

    public function __construct(ClienteDao $clienteDao, EmprestimoDao $emprestimoDao, ParcelaDao $parcelaDao)
    {
        $this->clienteDao = $clienteDao;
        $this->parcelaDao = $parcelaDao;
        $this->emprestimoDao = $emprestimoDao; 
    }


    public function registraSolicitacaoDeEmprestimo(float $valor, int $quantidadeDeParcelas, int $idCliente)
    {
        try {
            $cliente = $this->clienteDao->pesquisaPorId($idCliente);
            
            $dataDaSolicitacao = new DateTimeImmutable();
            $emprestimo = new Emprestimo($valor, 0, $dataDaSolicitacao, $cliente);
            
            $emprestimoSalvo = $this->emprestimoDao->insere($emprestimo);

            $vencimentoDaProximaParcela = $dataDaSolicitacao->add(new DateInterval('P1M'));
            $valorDaParcela = $valor / $quantidadeDeParcelas;

            for ($i = 1; $i <= $quantidadeDeParcelas; $i++) {
                $parcela = new Parcela($i, $valorDaParcela, $vencimentoDaProximaParcela, $emprestimoSalvo);
                $this->parcelaDao->insere($parcela);

                $vencimentoDaProximaParcela = $vencimentoDaProximaParcela->add(new DateInterval('P1M'));
            }
        } catch (PDOException $e) {
            throw new DomainException('Falha ao persistir informações de empréstimo.', 123, $e);
        }

    }
}
