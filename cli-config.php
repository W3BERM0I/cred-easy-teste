<?php

require_once __DIR__ . '/vendor/autoload.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
    (new \User06\Mvc\Infra\EntityManagerCreator())->getEntityManager()
);
