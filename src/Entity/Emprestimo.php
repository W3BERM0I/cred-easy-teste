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
   * @Column(type="bigint", name="id")
   */
  private $id;
  /**
   * @Column(type="decimal", name="valor")
   */
  private $valor;

  /** @Column(type="integer", name="parcelas") */
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
  private $status;
  /**
   * @ManyToOne(targetEntity="Cliente")
   * @JoinColumn(name="id_cliente", referencedColumnName="id")
   */
  private $cliente;

  private $em;


  //construtor
  public function __construct(float $valor, int $qtdParcelas, string $dataDeSolicitacao, Cliente $cliente)
  {
    $this->valor = $valor;
    $this->qtdParcelas = $qtdParcelas;
    $this->taxaDeJuros = 3.5;
    $this->dataDeSolicitacao = $dataDeSolicitacao;
    $this->status = "SOLICITADO";
    $this->cliente = $cliente;
    $this->setValorFinal();
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setValor(float $valor)
  {
    $this->valor = $valor;
  }

  public function getValor()
  {
    return $this->valor;
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

  public function setStatus(string $status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setValorFinal(): void
  {
    $this->valorFinal = ((($this->valor / 100) * $this->taxaDeJuros) * $this->qtdParcelas) + $this->valor;
  }

  public function getValorFinal()
  {
    return $this->valorFinal;
  }

  public function getNomeCliente()
  {
    return $this->cliente->getNome();
  }
}
