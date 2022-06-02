<?php
namespace lib\Database;

use lib\Config\Config;
use PDO;

//abstract
class Database{
    private PDO $pdo;

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    /**
     * @throws \Exception
     */
    public function __construct(Config $config)
    {
        $this->pdo = new PDO($config->get('databaseDsn'),$config->get('databaseUsername'),$config->get('databasePassword'));
    }


}