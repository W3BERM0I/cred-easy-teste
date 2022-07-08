<?php

namespace User06\Mvc\Entity;

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
  private $numeroParcela;
  /**
   * @Column(type="decimal")
   */
  private $valorParcela;
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
  private $valorParcelaPago;
  /**
   * @Column(type="string")
   */
  private $statusParcela;
  /**
   * @ManyToOne(targetEntity="Emprestimo")
   * @JoinColumn(name="emprestimo_id", referencedColumnName="id")
   */
  private $emprestimo;

  public function __construct(int $numeroParcela, float $valorParcela, string $dataVencimento, Emprestimo $emprestimo)
  {
    $this->setNumeroParcela($numeroParcela);
    $this->setValorParcela($valorParcela);
    $this->setDataVencimento($dataVencimento);
    $this->multa = 0.75;
    $this->statusParcela = 'ABERTA';
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
  public function setNumeroParcela(int $numeroParcela)
  {
    $this->numeroParcela = $numeroParcela;
  }

  public function getNumeroParcela()
  {
    return $this->numeroParcela;
  }

  public function setValorParcela(float $valorParcela)
  {
    $this->valorParcela = $valorParcela;
  }

  public function getValorParcela()
  {
    return $this->valorParcela;
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

  public function setValorParcelaPago(float $valorParcelaPago)
  {
    $this->valorParcelaPago = $valorParcelaPago;
  }

  public function getValorParcelaPago()
  {
    return $this->valorParcelaPago;
  }

  public function setStatusParcela(string $statusParcela)
  {
    $this->statusParcela = $statusParcela;
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
