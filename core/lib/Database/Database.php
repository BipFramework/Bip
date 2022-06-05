<?php
namespace lib\Database;

use lib\Bip\Bip;
use lib\Exception\BipException;
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
     * @throws BipException
     */
    public function __construct()
    {
        $this->pdo = new PDO(Bip::getConfig()->get('databaseDsn'),Bip::getConfig()->get('databaseUsername'),Bip::getConfig()->get('databasePassword'));
    }


}