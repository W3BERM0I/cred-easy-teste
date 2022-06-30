<?php
namespace Sicredi\Credeasy\Modelo;

use DateTimeImmutable;
use Sicredi\Credeasy\Modelo\Cliente;

/**
 * @Entity
 * @Table(name="emprestimo")
 */
class Emprestimo {

    /**
     * @Id
     * @GeneratedValue
     * @Column(type="bigint")
     */
    public $id;

    /**
     * @Column(type="decimal", precision=10, scale=2)
     */
    public $valor;

    /**
     * @Column(type="decimal", precision=10, scale=2, name="taxa_juros")
     */
    public $taxaDeJuros;

    /**
     * @Column(type="date", name="data_solicitacao")
     */
    public $dataDeSolicitacao;

    /**
     * @Column(type="decimal", precision=10, scale=2, name="valor_pago")
     */
    public $valorPago;

    /**
     * @Column(type="date", name="data_quitacao")
     */
    public $dataDeQuitacao;

    /**
     * @Column(type="string")
     */
    public $status;
    
    /**
     * @ManyToOne(targetEntity="Cliente")
     * @JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    public $cliente;

    public function __construct(float $valor, float $taxaDeJuros, DateTimeImmutable $dataDeSolicitacao, Cliente $cliente)
    {
        $this->valor = $valor;
        $this->taxaDeJuros = $taxaDeJuros;
        $this->dataDeSolicitacao = $dataDeSolicitacao;
        $this->cliente = $cliente;
        $this->status = "SOLICITADO";
    }

    public function aprova() {
        if ($this->status != "SOLICITADO") {
            echo "Só é possível aprovar empréstimo SOLICITADOS." . PHP_EOL;
            exit();
        }

        $this->status = 'APROVADO';
    }

    public function efetuaQuitacao(float $valorFinal) {
        $valorMinimoEsperado = $this->valor * (1 + ($this->taxaDeJuros / 100));
        if ($valorFinal < $valorMinimoEsperado) {
            echo "Valor final é menor que o mínimo esperado pela taxa de juros contratada: $valorFinal." . PHP_EOL;
            exit();
        }

        $this->valorFinal = $valorFinal;
        $this->status = "QUITADO";
        $this->dataDeQuitacao = new \DateTimeImmutable();
    }
    
}