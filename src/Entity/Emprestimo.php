<?php

namespace User06\Mvc\Entity;

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
   * @Column(type="integer")
   */
  private $idEmprestimo;
  /**
   * @Column(type="decimal")
   */
  private $valorDoEmprestimo;
  /**
   * @Column(type="decimal")
   */
  private $taxaDeJuros;
  /**
   * @Column(type="decimal")
   */
  private $valorFinal;
  /**
   * @Column(type="string")
   */
  private $dataDeSolicitacao;
  /**
   * @Column(type="string")
   */
  private $dataDeQuitacao;
  /**
   * @Column(type="string")
   */
  private $statusEmprestimo;
  /**
   * @ManyToOne(targetEntity="Cliente")
   * @JoinColumn(name="cliente_id", referencedColumnName="id")
   */
  private $cliente;


  //construtor
  public function __construct(int $idEmprestimo, float $valorDoEmprestimo, float $taxaDeJuros, string $dataDeSolicitacao, Cliente $cliente)
  {
    $this->idEmprestimo = $idEmprestimo;
    $this->valorDoEmprestimo = $valorDoEmprestimo;
    $this->taxaDeJuros = $taxaDeJuros;
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
