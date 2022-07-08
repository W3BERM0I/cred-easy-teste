<?php

namespace User06\Mvc\Infra;

require_once __DIR__ . '../../../vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
  public function getEntityManager(): EntityManagerInterface
  {
    $paths = [__DIR__ . '/../Entity'];
    $isDevMode = false;

    $dbParams = [
      'host' => '127.0.0.1',
      'dbname' => 'credeasy',
      'driver' => 'pdo_mysql',
      'user' => 'root',
      'password' => 'ROOT',
      'port' => '3306'
    ];

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
    return EntityManager::create($dbParams, $config);
  }
}
