<?php

namespace Sicredi\Credeasy\Entity;

/**
 * @Entity
 * @Table(name="clientes")
 */
class Cliente
{
  /**
   * @Column(type="bigint") @Id @GeneratedValue
   */
  private $id;
  /**
   * @Column(type="string")
   */
  private $nome;
  /**
   * @Column(type="string")
   */
  private $cpf;
  /**
   * @Column(type="decimal")
   */
  private $renda;
  /**
   * @Column(type="string")
   */
  private $endereco;
  /**
   * @Column(type="string")
   */
  private $profissao;
  /**
   * @Column(name="telefone", type="string")
   */
  private $numeroTelefone;
  /**
   * @Column(type="string")
   */
  private $email;
  /**
   * @Column(type="string")
   */
  private $senha;
  /**
   * @Column(name="tipo_usuario", type="string")
   */
  private $tipoDeUsuario;

  public function __construct(string $nome, string $cpf, int $renda, string $endereco, string $profissao, string $numeroTelefone, string $email, string $senha, string $tipoUsuario)
  {
    $this->setNome($nome);
    $this->setCpf($cpf);
    $this->setRenda($renda);
    $this->setEndereco($endereco);
    $this->setProfissao($profissao);
    $this->setNumeroTelefone($numeroTelefone);
    $this->setEmail($email);
    $this->setSenha($senha);
    $this->setTipoDeUsuario($tipoUsuario);
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  private function setNome(string $nome)
  {
    $nomeValido = $this->validaNome($nome);
    if (!$nomeValido) {
      echo "nome é invalido";
      exit();
    }

    $this->nome = $nome;
  }

  public function getNome()
  {
    return $this->nome;
  }

  private function setCpf(string $cpf)
  {
    $this->cpf = $cpf;
  }

  public function getCpf()
  {
    return $this->cpf;
  }

  private function setRenda(int $renda)
  {
    $this->renda = $renda;
  }

  public function getRenda()
  {
    return $this->renda;
  }

  private function setEndereco(string $endereco)
  {
    $this->endereco = $endereco;
  }

  public function getEndereco()
  {
    return $this->endereco;
  }

  private function setProfissao(string $profissao)
  {
    $this->profissao = $profissao;
  }

  public function getProfissao()
  {
    return $this->profissao;
  }

  private function setNumeroTelefone(string $numeroTelefone)
  {
    $this->numeroTelefone = $numeroTelefone;
  }

  public function getNumeroTelefone()
  {
    return $this->numeroTelefone;
  }

  private function setEmail(string $email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }

  private function setSenha(string $senha)
  {
    
    $this->senha = password_hash($senha, PASSWORD_ARGON2I);
  }

  public function getSenha()
  {
    return $this->senha;
  }

  private function setTipoDeUsuario(string $tipoDeUsuario)
  {
    $this->tipoDeUsuario = $tipoDeUsuario;
  }

  public function getTipoDeUsuario()
  {
    return $this->tipoDeUsuario;
  }

  private function validaNome(string $nome)
  {
    return strlen($nome) >= 2;
  }

  public function senhaEstaCorreta(string $senhaPura): bool
  {
      return password_verify($senhaPura, $this->senha);
  }
}
