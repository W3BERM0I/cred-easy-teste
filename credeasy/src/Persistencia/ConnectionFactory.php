<?php

namespace Sicredi\Credeasy\Persistencia;

class ConnectionFactory
{
    public static function getConnection()
    {
        return new \PDO('mysql:host=localhost:3307;dbname=credeasy', 'root', '');
    }
}
