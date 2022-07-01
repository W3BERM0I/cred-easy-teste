<?php

namespace Sicredi\Credeasy\Persistencia;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    public static function getEntityManager(): EntityManagerInterface
    {
        $configuracoesDeConexao = [
            'host' => '127.0.0.1',
            'dbname' => 'credeasy',
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => 'ROOT',
            'port' => '3306'
        ];

        $diretorioRaiz = __DIR__ . '/../..';
        $diretorioDeScaneamento = $diretorioRaiz . '/src';
        $devMode = true;

        $configuracoesDoDoctrine = Setup::createAnnotationMetadataConfiguration(
            [$diretorioDeScaneamento],
            $devMode
        );

        return EntityManager::create($configuracoesDeConexao, $configuracoesDoDoctrine);
    }
}
