<?php
namespace lib;

class db {
    private $connection;
    public function __construct($conn_info){
        $this->connect($conn_info);
    }

    public function connect($conn_info){
        if(empty($this->connection)){
            $this->connection = new \PDO("mysql:host={$conn_info['DB_HOST']};port={$conn_info['DB_PORT']};dbname={$conn_info['DB_NAME']}", $conn_info['DB_USER'], $conn_info['DB_PWD'],
                array(
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_PERSISTENT => false,
                )
            );
        }
        return $this->connection;
    }

    public function query($sql,$params=array()){
        $statement = $this->connection->prepare($sql);
        $rs = $statement->execute($params);
        if($rs) return $statement->rowCount();
    }

    public function get_all($sql,$params=array()){
        $statement = $this->connection->prepare($sql);
        $rs = $statement->execute($params);
        if($rs) return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
