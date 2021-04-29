<?php

namespace Core\Database;

use PDO;
use Core\Database\DotEnv;
class DB
{
    private static $connection;

    protected $db_connect;

    protected $servername;

    protected $username;

    protected $password;

    protected $dbname;

    protected $port;

    public function __construct()
    {
        (new DotEnv(__DIR__ . '/.env'))->load();

         $this->db_connect = getenv('DB_CONNECTION');

         $this->servername = getenv('DB_HOST');

         $this->username   = getenv('DB_USERNAME');

         $this->password   = getenv('DB_PASSWORD');

         $this->dbname     = getenv('DB_DATABASE');

         $this->port       = getenv('DB_PORT');

        try {

            self::$connection = new PDO(
                "$this->db_connect:host=$this->servername;
                port= $this->port;
                dbname=$this->dbname",
                $this->username,
                $this->password);
        }
        catch(PDOException $e) {

            echo "Error: " . $e->getMessage();

        }
    }

    public static function query($sql = '')
    {
        $stmt = (self::$connection)->query($sql);

        return $stmt;
    }

    public static function fetch($sql, $class = \stdClass::class)
    {
        $stmt = self::query($sql);

        if(!$stmt)
        {
            throw new \Exception(self::$connection->getMessage());
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

}