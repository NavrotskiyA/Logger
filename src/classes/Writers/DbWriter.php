<?php

namespace classes\Writers;

use classes\Config\DbLoggerConfig;
use classes\Formaters\DbFormater;
use interfaces\WriterInterface;
use PDO;

class DbWriter implements WriterInterface
{
    private PDO $connection;
    private $statements = [];
    public function write($data)
    {
        $this->connect();

        DbLoggerConfig::tableCheck($this->connection);
        $this->prepareStatements();

        $formater = new DbFormater();
        $data = $formater->format($data);

        $this->connection->beginTransaction();
        try {
            $this->statements['main']->execute($data['main']);
            $id = $this->connection->query("SELECT LAST_INSERT_ID()")->fetch(3);
            foreach ($data['context'] as $value){
                $this->statements['context']->execute([$id[0], $value]);
            }
        } catch (PDOException $e){
            echo $e->getMessage();
            $this->connection->rollBack();
        }
        $this->connection->commit();
    }
    private function connect()
    {
        $config = require_once(__DIR__ . "/../Config/DbConnectionConfig.php");
        $this->connection = new PDO("mysql:host=".$config['host'].";dbname=".$config['dbname'], $config['user'], $config['password']);
    }
    private function prepareStatements()
    {
        $this->statements['main'] = $this->connection->prepare("INSERT INTO logs_dump(level,message) VALUES(?,?)");
        $this->statements['context'] = $this->connection->prepare("INSERT INTO logs_context(log_id,context) VALUES(?,?)");
    }


}