<?php

namespace Sicredi\Credeasy\Entity;

/**
 * @Entity
 * @Table(name="Parcelas")
 */
class Parcela
{
  /**
   * @Column(type="bigint") @Id @GeneratedValue
   */
  private $id;

  /** @Column(type="integer", name="numero") */
  private $numero;
  /**
   * @Column(type="decimal")
   */
  private $valor;
  /**
   * @Column(type="date")
   */
  private $dataVencimento;
  /**
   * @Column(type="date")
   */
  private $dataPagamento;
  /**
   * @Column(type="decimal")
   */
  private $multa;
  /**
   * @Column(type="decimal")
   */
  private $valorPago;
  /**
   * @Column(type="string")
   */
  private $status;
  /**
   * @ManyToOne(targetEntity="Emprestimo")
   * @JoinColumn(name="emprestimo_id", referencedColumnName="id")
   */
  private $emprestimo;

  public function __construct(int $numero, float $valor, string $dataVencimento, Emprestimo $emprestimo)
  {
    $this->setNumero($numero);
    $this->setValor($valor);
    $this->setDataVencimento($dataVencimento);
    $this->multa = 0.75;
    $this->status = 'ABERTA';
    $this->emprestimo = $emprestimo;
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }
  public function setParcela(int $numero)
  {
    $this->numero = $numero;
  }

  public function getParcela(): int
  {
    return $this->parcela;
  }

  public function setNumero(int $numero)
  {
    $this->numero = $numero;
  }

  public function getNumero()
  {
    return $this->numero;
  }

  public function setValor(float $valor)
  {
    $this->valor = $valor;
  }

  public function getValor()
  {
    return $this->valor;
  }

  public function setDataVencimento(string $dataVencimento)
  {
    $this->dataVencimento = $dataVencimento;
  }

  public function getDataVencimento()
  {
    return $this->dataVencimento;
  }

  public function setDataPagamento(string $dataPagamento)
  {
    $this->dataPagamento = $dataPagamento;
  }

  public function getDataPagamento()
  {
    return $this->dataPagamento;
  }

  public function setMulta(float $multa)
  {
    $this->multa = $multa;
  }

  public function getMulta()
  {
    return $this->multa;
  }

  public function setValorPago(float $valorPago)
  {
    $this->valorPago = $valorPago;
  }

  public function getValorPago()
  {
    return $this->valorPago;
  }

  public function setStatus(string $status)
  {
    $this->status = $status;
  }

  public function getStatusParcela()
  {
    return $this->statusParcela;
  }

  public function getNomeTitularEmprestimo()
  {
    return $this->emprestimo->getNomeCliente();
  }
}
