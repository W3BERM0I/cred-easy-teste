<?php

namespace Sicredi\Credeasy\Entity;

/**
 * @Entity
 * @Table(name="emprestimos")
 */
class Emprestimo
{
  //atributos
  /**
   * @Id
   * @GeneratedValue
   * @Column(type="integer", name="id")
   */
  private $idEmprestimo;
  /**
   * @Column(type="decimal", name="valor")
   */
  private $valorDoEmprestimo;

  /** @Column(type="integer", name="Parcelas") */
  private $qtdParcelas;
  /**
   * @Column(type="decimal", name="taxa_juros")
   */


  private $taxaDeJuros;
  /**
   * @Column(type="decimal", name="valor_pago")
   */
  private $valorFinal;
  /**
   * @Column(type="string", name="data_solicitacao")
   */
  private $dataDeSolicitacao;
  /**
   * @Column(type="string", name="data_quitacao")
   */
  private $dataDeQuitacao;
  /**
   * @Column(type="string", name="status")
   */
  private $statusEmprestimo;
  /**
   * @ManyToOne(targetEntity="Cliente")
   * @JoinColumn(name="id_cliente", referencedColumnName="id")
   */
  private $cliente;


  //construtor
  public function __construct(float $valorDoEmprestimo, int $qtdParcelas, string $dataDeSolicitacao, Cliente $cliente)
  {
    $this->valorDoEmprestimo = $valorDoEmprestimo;
    $this->qtdParcelas = $qtdParcelas;
    $this->taxaDeJuros = 3.5;
    $this->dataDeSolicitacao = $dataDeSolicitacao;
    $this->statusEmprestimo = "SOLICITADO";
    $this->cliente = $cliente;
  }

  public function setIdEmprestimo(int $idEmprestimo)
  {
    $this->idEmprestimo = $idEmprestimo;
  }

  public function getIdEmprestimo()
  {
    return $this->idEmprestimo;
  }

  public function setValorDoEmprestimo(float $valorDoEmprestimo)
  {
    $this->valorDoEmprestimo = $valorDoEmprestimo;
  }

  public function getValorDoEmprestimo()
  {
    return $this->valorDoEmprestimo;
  }

  public function setQtdParcelas(int $qtdParcelas): void
  {
    $this->qtdParcelas = $qtdParcelas;
  }

  public function getQtdParcelas(): int
  {
    return $this->qtdParcelas;
  }

  public function setTaxaDeJuros(float $taxaDeJuros)
  {
    $this->taxaJuros = $taxaDeJuros;
  }

  public function getTaxaDeJuros()
  {
    return $this->taxaDeJuros;
  }

  public function setDataDeSolicitacao(string $dataDeSolicitacao)
  {
    $this->dataDeSolicitacao = $dataDeSolicitacao;
  }

  public function getDataDeSolicitacao()
  {
    return $this->dataDeSolicitacao;
  }

  public function setStatusEmprestimo(string $statusEmprestimo)
  {
    $this->statusEmprestimo = $statusEmprestimo;
  }

  public function getStatusEmprestimo()
  {
    return $this->statusEmprestimo;
  }

  public function getNomeCliente()
  {
    return $this->cliente->getNome();
  }
}
