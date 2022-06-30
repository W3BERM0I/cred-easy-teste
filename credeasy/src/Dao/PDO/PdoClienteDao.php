<?php

namespace Sicredi\Credeasy\Dao\PDO;

require __DIR__ . '/../../../vendor/autoload.php';

use DomainException;
use Sicredi\Credeasy\Dao\ClienteDao;
use Sicredi\Credeasy\Modelo\Cliente;

class PdoClienteDao implements ClienteDao
{
    private $conexao;

    public function __construct($conexao) // Injeção de Dependência : Padrão DI (Dependency Injection)
    {
        $this->conexao = $conexao;
    }

    public function insere(Cliente $cliente): Cliente
    {
        $sql = 'INSERT INTO cliente 
                    (nome, cpf, telefone, endereco, profissao, renda, email, senha, tipo_usuario) 
                VALUES 
                    (:nome, :cpf, :telefone, :endereco, :profissao, :renda, :email, :senha, :tipo_usuario);';
        $stmt = $this->conexao->prepare($sql);

        $sucesso = $stmt->execute([
            ':nome' => $cliente->nome,
            ':cpf' => $cliente->cpf,
            ':telefone' => $cliente->telefone,
            ':endereco' => $cliente->endereco,
            ':profissao' => $cliente->profissao,
            ':renda' => $cliente->renda,
            ':email' => $cliente->email,
            ':senha' => $cliente->senha,
            ':tipo_usuario' => $cliente->tipoDeUsuario
        ]);

        if ($sucesso) {
            $cliente->id = $this->conexao->lastInsertId();
        }

        return $cliente;
    }

    public function listaTodos(): array
    {
        $query = 'SELECT * FROM cliente;';
        $stmt = $this->conexao->query($query);

        $clientes = [];
        foreach ($stmt->fetchAll() as $registro) {
            $clientes[] = $this->populaCliente($registro);
        }

        return $clientes;
    }

    public function pesquisaPorId(int $id): Cliente
    {
        $query = 'SELECT * FROM cliente WHERE id = :id;';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        $registro = $stmt->fetch();

        if (!$registro) {
            throw new DomainException("Cliente de id inexistente: $id");
        }

        $cliente = $this->populaCliente($registro);
        
        return $cliente;
    }

    private function populaCliente(array $registro): Cliente
    {
        $cliente = new Cliente(
            $registro['nome'], 
            $registro['cpf'], 
            $registro['telefone'], 
            $registro['endereco'], 
            $registro['profissao'], 
            $registro['renda'], 
            $registro['email'], 
            $registro['senha'], 
            $registro['tipo_usuario']
        );

        $cliente->id = $registro['id'];
        return $cliente;
    }
    
}