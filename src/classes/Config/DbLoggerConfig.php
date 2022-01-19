<?php
namespace classes\Config;

class DbLoggerConfig
{

    public static function tableCheck(\PDO $connection)
    {
        $check = $connection->query("SHOW TABLES LIKE 'logs_dump'")->fetchAll();
        if(empty($check)){
            self::makeTables($connection);
        }
    }
    private static function makeTables(\PDO $connection)
    {
        try {
            $connection->query("CREATE TABLE logs_dump(id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, level varchar(20), message varchar(300) NOT NULL DEFAULT '', created_at timestamp DEFAULT CURRENT_TIMESTAMP )");
            $connection->query("CREATE TABLE logs_context(id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, log_id int UNSIGNED, context varchar(255), FOREIGN KEY (log_id) REFERENCES logs_dump(id) ON DELETE CASCADE )");
        } catch (\PDOException $e){
            echo $e->getMessage();
        }
    }


}