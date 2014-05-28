<?php
abstract class AbstractDBTest extends PHPUnit_Extensions_Database_TestCase
{
    // only instantiate pdo once for test clean-up/fixture load
    static private $pdo = null;

    // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
    private $conn = null;

    final public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new PDO( '127.0.0.1', 'root', 'adek!123' );
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, 'symfony_dev');
        }

        return $this->conn;
    }
}
